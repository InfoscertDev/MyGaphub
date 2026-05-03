<?php

namespace App\Services;

use App\Enums\ArchiveToken;
use App\Helpers\WheelClass as Wheel;
use App\Models\Asset\PortfolioAsset;
use App\Models\SevenG\BespokeKPI;
use App\Models\Wheel\CashAccount;
use App\Models\Wheel\HomeEquity;
use App\Models\Wheel\IncomeAccount;
use App\Models\Wheel\LiabilityAccount as Liability;
use App\Models\Wheel\MortgageAccount as Mortgage;
use App\Models\Wheel\PensionAccount;
use App\Models\Wheel\ProtectionAccount;
use App\Models\SevenG\DeptFin as Debt;

class ArchiveService
{
    /**
     * Maps each account type header token to:
     *   - model:    the Eloquent model class to query
     *   - tile:     the WheelClass tile update method to call after action
     *   - bespoke:  whether this type supports bespoke (KPI) sub-accounts
     *   - debt:     whether ID <= 0 should fall back to the Debt model (mortgage only)
     */
    private const ACCOUNT_MAP = [
        ArchiveToken::CASH => [
            'model'   => CashAccount::class,
            'tile'    => 'updateCashTile',
            'bespoke' => true,
        ],
        ArchiveToken::LIABILITY => [
            'model'   => Liability::class,
            'tile'    => 'updateLiabilityTile',
            'bespoke' => true,
        ],
        ArchiveToken::MORTGAGE => [
            'model'   => Mortgage::class,
            'tile'    => 'updateMortgageTile',
            'debt'    => true,
        ],
        ArchiveToken::PROTECTION => [
            'model'   => ProtectionAccount::class,
            'tile'    => 'updateProtectionTile',
        ],
        ArchiveToken::PENSION => [
            'model'   => PensionAccount::class,
            'tile'    => 'updatePensionTile',
        ],
        ArchiveToken::INCOME => [
            'model'   => IncomeAccount::class,
            'tile'    => 'updateIncomeTile',
            'income'  => true,   // requires false flag on tile update
        ],
        ArchiveToken::PORTFOLIO => [
            'model'   => PortfolioAsset::class,
            'tile'    => 'updateIncomeTile',
            'portfolio' => true, // must also cascade to linked IncomeAccount
        ],
        ArchiveToken::EQUITY => [
            'model'   => HomeEquity::class,
            'tile'    => null,   // equity tile update not implemented yet
        ],
    ];

    /**
     * Perform archive or unarchive on any supported account type.
     *
     * Decision: Returns a plain array instead of a JsonResponse so the result
     * flows through the controller's ApiResponse trait — keeping the response
     * shape consistent with the rest of the v2 API. The old ArchiveAccount
     * static methods are left intact for any legacy v1 routes still calling them.
     *
     * @param  mixed       $user
     * @param  string      $header   Account type token (see ArchiveToken)
     * @param  string      $access   Action token: ARCHIVE or UNARCHIVE
     * @param  int         $account  Account ID
     * @param  int|null    $bespoke  Optional bespoke KPI ID
     * @return array{success: bool, message: string}
     */
    public function handle($user, string $header, string $access, int $account, ?int $bespoke = null): array
    {
        $config = self::ACCOUNT_MAP[$header] ?? null;

        if (!$config) {
            return ['success' => false, 'message' => 'Invalid account type.'];
        }

        $isArchiving = ($access === ArchiveToken::ARCHIVE);
        $action      = $isArchiving ? 'archived' : 'unarchived';

        // --- Bespoke KPI path (cash & liability support this) ---
        if ($bespoke && ($config['bespoke'] ?? false)) {
            return $this->handleBespoke($user, $bespoke, $isArchiving, $config, $action);
        }

        // --- Mortgage: ID <= 0 means act on the Debt model instead ---
        if (($config['debt'] ?? false) && $account <= 0) {
            return $this->handleDebt($user, $isArchiving, $config, $action);
        }

        // --- Standard path ---
        $record = $config['model']::where('user_id', $user->id)->where('id', $account)->first();

        if (!$record) {
            return ['success' => false, 'message' => 'Account not found.'];
        }

        $record->isArchive = $isArchiving ? 1 : 0;

        // Portfolio must cascade archive state to its linked income account
        if ($config['portfolio'] ?? false) {
            $this->cascadePortfolioArchive($user, $record, $isArchiving);
        }

        $record->save();

        $this->refreshTile($user, $config);

        // Liability: pass account ID when credit tile needs reallocation
        if ($header === ArchiveToken::LIABILITY && $record->credit_id == 1) {
            Wheel::updateLiabilityTile($user, $account);
        }

        return ['success' => true, 'message' => "The account has been {$action}."];
    }

    /**
     * Archive/unarchive a BespokeKPI record and disable analytics on archive.
     */
    private function handleBespoke($user, int $bespokeId, bool $isArchiving, array $config, string $action): array
    {
        $record = BespokeKPI::where('user_id', $user->id)->where('id', $bespokeId)->first();

        if (!$record) {
            return ['success' => false, 'message' => 'Bespoke account not found.'];
        }

        $record->isArchive = $isArchiving ? 1 : 0;

        // Disable analytics when archiving a bespoke KPI
        if ($isArchiving) {
            $record->isAnalytics = 0;
        }

        $record->save();

        $this->refreshTile($user, $config);

        return ['success' => true, 'message' => "The account has been {$action}."];
    }

    /**
     * Mortgage special case: when account ID is 0 or negative, target the Debt record.
     */
    private function handleDebt($user, bool $isArchiving, array $config, string $action): array
    {
        $record = Debt::where('user_id', $user->id)->first();

        if (!$record) {
            return ['success' => false, 'message' => 'Account not found.'];
        }

        $record->isArchive = $isArchiving ? 1 : 0;
        $record->save();

        $this->refreshTile($user, $config);

        return ['success' => true, 'message' => "The account has been {$action}."];
    }

    /**
     * When archiving/unarchiving a portfolio asset, the linked income account
     * must mirror the same archive state to stay in sync.
     */
    private function cascadePortfolioArchive($user, PortfolioAsset $asset, bool $isArchiving): void
    {
        $income = IncomeAccount::where('user_id', $user->id)
            ->where('portfolio_asset_id', $asset->id)
            ->first();

        if ($income) {
            $income->isArchive = $isArchiving ? 1 : 0;
            $income->save();
        }
    }

    /**
     * Trigger the appropriate WheelClass tile refresh after any archive action.
     * Income and portfolio tiles require the $isUpdate = false flag.
     */
    private function refreshTile($user, array $config): void
    {
        $method = $config['tile'] ?? null;

        if (!$method) return;

        $needsFalseFlag = ($config['income'] ?? false) || ($config['portfolio'] ?? false);

        $needsFalseFlag
            ? Wheel::$method($user, false)
            : Wheel::$method($user);
    }
}
