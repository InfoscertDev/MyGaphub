<?php

namespace App\Helpers;

use App\Enums\SevenGType;
use App\Models\SevenG\BespokeKPI;
use App\Models\Wheel\BespokeWheel;
use App\Models\Wheel\CashAccount;
use App\Models\Wheel\LiabilityAccount as Liability;
use stdClass;

/**
 * AccountMapper
 *
 * Handles all account type transformations — converting between
 * SevenG models, Bespoke KPIs, and the standard Cash/Liability
 * account shapes expected by the wheel UI.
 *
 * Extracted from GapExchangeHelper to give each concern its own home.
 */
class AccountMapper
{
    // -------------------------------------------------------------------------
    // SevenG → Cash / Liability shape
    // -------------------------------------------------------------------------

    /**
     * Dress a SevenG model (Alpha, Beta, Education) to look like a CashAccount
     * so the wheel UI can render it uniformly.
     */
    public static function toCashAccount(mixed $account, string $name, string $currency): mixed
    {
        $account->account_name     = $name;
        $account->account_purpose  = self::sevenGCashPurpose($name);
        $account->account_alias    = strtolower($name);
        $account->account_currency = $currency;

        return $account;
    }

    /**
     * Dress a CreditFin model to look like a liability account.
     */
    public static function toCreditAccount(mixed $account, string $name, string $currency): mixed
    {
        $account->alias            = $name;
        $account->account_currency = $currency;
        $account->account_type     = $account->account_type ?: 'Others';

        return $account;
    }

    /**
     * Dress a DeptFin model to look like a Mortgage/Debt account.
     * Forces ID to -1 so the UI can distinguish it from real mortgages.
     */
    public static function toDebtAccount(mixed $account, string $name, string $currency): mixed
    {
        $account->alias            = $name;
        $account->id               = -1;
        $account->account_currency = $currency;
        $account->open_balance     = $account->baseline;
        $account->current_balance  = $account->current;
        $account->secured_against  = 'Primary Residential Home';

        return $account;
    }

    /**
     * Build an empty mortgage-shaped object as a safe null placeholder.
     */
    public static function emptyMortgage(): stdClass
    {
        $account                  = new stdClass();
        $account->alias           = '';
        $account->id              = 0;
        $account->account_currency = '';
        $account->open_balance    = 0;
        $account->current_balance = 0;
        $account->secured_against = '';

        return $account;
    }

    // -------------------------------------------------------------------------
    // Bespoke KPI → Cash / Liability shape
    // -------------------------------------------------------------------------

    /**
     * Map a collection of BespokeKPI (saveup type) records to the cash account
     * shape, attaching wheel-level metadata (alias, fund, target_date).
     * Sets account_header so the frontend can route updates back correctly.
     */
    public static function kpiToCash(iterable $bespokes, string $currency): iterable
    {
        foreach ($bespokes as $bespoke) {
            $bespoke->account_name     = $bespoke->kpi_name;
            $bespoke->account_purpose  = $bespoke->savings_purposes;
            $bespoke->account_type     = $bespoke->cash_keptin;
            $bespoke->account_details  = $bespoke->kpi_details;
            $bespoke->account_currency = $currency;
            $bespoke->account_alias    = $bespoke->wheel->account_alias;
            $bespoke->account_location = $bespoke->wheel->fund;
            $bespoke->target_date      = $bespoke->wheel->target_date;
            $bespoke->account_header   = SevenGType::BESPOKE;
        }

        return $bespokes;
    }

    /**
     * Map a collection of BespokeKPI (dept type) records to the liability account
     * shape. Sets account_header so the frontend can route updates back correctly.
     */
    public static function kpiToLiability(iterable $bespokes, string $currency): iterable
    {
        foreach ($bespokes as $bespoke) {
            $bespoke->creditor_name    = $bespoke->kpi_name;
            $bespoke->account_type     = $bespoke->dept_types;
            $bespoke->account_details  = $bespoke->kpi_details;
            $bespoke->pay_strategy     = $bespoke->extra;
            $bespoke->interest_rate    = $bespoke->dept_interest;
            $bespoke->account_currency = $currency;
            $bespoke->account_alias    = $bespoke->wheel->account_alias;
            $bespoke->target_date      = $bespoke->wheel->target_date;
            $bespoke->periodical_pay   = $bespoke->wheel->periodical_pay;
            $bespoke->account_header   = 'lapakoihangbshjbsxhgbxuhxbshxbxujahnzoazjmsozklnsz';
        }

        return $bespokes;
    }

    // -------------------------------------------------------------------------
    // Cash / Liability → Bespoke shape (reverse mapping for analytics wheel)
    // -------------------------------------------------------------------------

    /**
     * Convert CashAccount records flagged as analytics into the bespoke shape
     * so they can appear in the SevenG wheel alongside real KPIs.
     */
    public static function cashToBespoke(iterable $cash): iterable
    {
        foreach ($cash as $bespoke) {
            $bespoke->kpi_name        = $bespoke->account_name;
            $bespoke->savings_purposes = $bespoke->account_purpose;
            $bespoke->cash_keptin     = $bespoke->account_type;
            $bespoke->kpi_details     = $bespoke->account_details;
            $bespoke->pay             = $bespoke->extra;
            $bespoke->bespoke_type    = 'saveup';
            $bespoke->account_header  = 'aznjzbhxjnsxjbnxhsjgczbhzbvcjhbxvnbjhjzcb';
        }

        return $cash;
    }

    /**
     * Convert LiabilityAccount records flagged as analytics into the bespoke shape.
     */
    public static function liabilityToBespoke(iterable $liabilities): iterable
    {
        foreach ($liabilities as $bespoke) {
            $bespoke->kpi_name       = $bespoke->creditor_name;
            $bespoke->dept_types     = $bespoke->account_type;
            $bespoke->kpi_details    = $bespoke->account_details;
            $bespoke->extra          = $bespoke->extra;
            $bespoke->dept_interest  = $bespoke->interest_rate;
            $bespoke->bespoke_type   = 'dept';
            $bespoke->account_header = 'skjnaznkszxjnszjnzjnzjnmhjzbnhjxvgyzbjhbxc';
        }

        return $liabilities;
    }

    /**
     * Build the combined bespoke wheel entries from analytics-flagged
     * cash and liability accounts (used when total bespoke KPIs <= 7).
     */
    public static function bespokeInWheel($user, int $total): \Illuminate\Support\Collection
    {
        $wheel = collect();

        if ($total <= 7) {
            $cash       = CashAccount::where('user_id', $user->id)->where('isAnalytics', 1)->latest()->get();
            $liability  = Liability::where('user_id', $user->id)->where('isAnalytics', 1)->latest()->get();

            foreach (self::cashToBespoke($cash) as $item)      $wheel->push($item);
            foreach (self::liabilityToBespoke($liability) as $item) $wheel->push($item);
        }

        return $wheel;
    }

    /**
     * Fetch and partition BespokeKPI accounts into cash and liability buckets,
     * initialising missing BespokeWheel records on the fly.
     * Returns ['cash' => [...], 'liabilities' => [...]]
     */
    public static function wheelKPIAccounts($user, string $currency, bool $archive = false): array
    {
        $bespokes = BespokeKPI::where('user_id', $user->id)
            ->where('isArchive', $archive ? 1 : 0)
            ->latest()
            ->limit(7)
            ->get();

        // Ensure every KPI has a BespokeWheel record
        foreach ($bespokes as $bespoke) {
            if (!BespokeWheel::where('bespoke_id', $bespoke->id)->exists()) {
                BespokeWheel::create(['bespoke_id' => $bespoke->id]);
            }
            $bespoke->wheel; // eager-load the relationship
        }

        $cash        = [];
        $liabilities = [];

        foreach ($bespokes as $bespoke) {
            if ($bespoke->bespoke_type === 'saveup') {
                $cash[] = $bespoke;
            } elseif ($bespoke->bespoke_type === 'dept') {
                $liabilities[] = $bespoke;
            }
        }

        return [
            'cash'        => self::kpiToCash(collect($cash), $currency),
            'liabilities' => self::kpiToLiability(collect($liabilities), $currency),
        ];
    }

    // -------------------------------------------------------------------------
    // Private helpers
    // -------------------------------------------------------------------------

    /**
     * Map a SevenG name to its default cash account purpose label.
     */
    private static function sevenGCashPurpose(string $name): string
    {
        return match (strtolower($name)) {
            'alpha'     => 'Rainy Day Fund',
            'beta'      => 'Home Purchase Savings',
            'education' => 'Children Education',
            default     => '',
        };
    }
}
