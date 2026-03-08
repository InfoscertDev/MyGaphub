<?php

namespace App\Helper;

use App\FinicialCalculator as Calculator;
use App\Helper\CalculatorClass;
use App\Helper\GapAccountCalculator as GapAccount;
use App\Helper\IncomeHelper;
use App\SevenG\CreditFin as Credit;
use App\SevenG\DeptFin as Debt;
use App\DiscretionaryBudget as Philantrophy;
use App\SevenG\GrandFin as Grand;
use App\Wheel\CashAccount as Cash;
use App\Wheel\HomeEquity;
use App\Wheel\IncomeAccount as Income;
use App\Wheel\LiabilityAccount as Liability;
use App\Wheel\MortgageAccount as Mortgage;
use App\Wheel\PensionAccount as Pension;
use App\Wheel\ProtectionAccount as Protection;

/**
 * WheelClass
 *
 * Manages tile recalculation and wheel-level data reads.
 * Each `update*Tile` method recomputes the summary values for a
 * given wheel segment and persists them via GapAccount::saveUpdatedTiles.
 *
 * These are called after any create/update/archive operation that
 * would change a segment's total or item count.
 */
class WheelClass
{
    // -------------------------------------------------------------------------
    // Tile refresh methods
    // -------------------------------------------------------------------------

    /**
     * Recalculate and persist the Cash wheel tile.
     * Item count offset of +3 accounts for the SevenG cash accounts (Alpha, Beta, Education).
     */
    public static function updateCashTile($user): void
    {
        $accounts      = Cash::where('user_id', $user->id)->where('isArchive', 0)->latest()->get();
        $count         = Cash::where('user_id', $user->id)->count();
        $detail        = GapAccount::calcCashAccount($accounts, $user);

        GapAccount::saveUpdatedTiles($user, 'cash', $count + 3, $detail['sum']);
    }

    /**
     * Recalculate and persist the Liabilities wheel tile.
     * When $credit is truthy, also updates the CreditFin current balance
     * from the latest allocation calculation.
     */
    public static function updateLiabilityTile($user, $credit = 0): void
    {
        $accounts = Liability::where('user_id', $user->id)->where('isArchive', 0)->latest()->get();
        $count    = Liability::where('user_id', $user->id)->count();
        $detail   = GapAccount::calcLiabilitiesAccount($accounts, $user);

        if ($credit) {
            $creditRecord        = Credit::where('user_id', $user->id)->first();
            $allocated           = GapAccount::creditAllocated($user)['allocate'];
            $creditRecord->current = $allocated;
            $creditRecord->save();
        }

        // +1 accounts for the primary debt record displayed in the tile
        GapAccount::saveUpdatedTiles($user, 'liabilities', $count + 1, $detail['sum']);
    }

    /**
     * Recalculate and persist the Mortgage wheel tile.
     * +1 accounts for the primary residential debt.
     */
    public static function updateMortgageTile($user): void
    {
        $accounts = Mortgage::where('user_id', $user->id)->where('isArchive', 0)->latest()->get();
        $count    = Mortgage::where('user_id', $user->id)->count();
        $detail   = GapAccount::calcMortgagesAccount($accounts, $user);

        GapAccount::saveUpdatedTiles($user, 'mortgage', $count + 1, $detail['sum']);
    }

    /**
     * Recalculate and persist the Income wheel tile.
     *
     * @param  bool  $isUpdate  When true, only updates calculator.other_income
     *                          if portfolio has dipped below zero (conservative update).
     *                          Pass false on archive/unarchive to force a full sync.
     */
    public static function updateIncomeTile($user, bool $isUpdate = true): void
    {
        $accounts      = Income::where('user_id', $user->id)->where('isArchive', 0)->latest()->get();
        $count         = Income::where('user_id', $user->id)->count();
        $detail        = GapAccount::calcIncomeAccount($user, $accounts);
        $fin           = CalculatorClass::finicial($user);
        $income_detail = IncomeHelper::analyseIncome($user, $fin['portfolio']);
        $calculator    = Calculator::where('user_id', $user->id)->first();

        // Sync calculator.other_income with the latest portfolio income value
        $shouldSync = !$isUpdate || $income_detail['portfolio_diff'] < 0;
        if ($shouldSync) {
            $calculator->other_income = $income_detail['income_portfolio'];
            $calculator->save();
        }

        GapAccount::saveUpdatedTiles($user, 'income', $count, $detail['sum']);
    }

    /**
     * Recalculate and persist the Protection wheel tile.
     */
    public static function updateProtectionTile($user): void
    {
        $accounts = Protection::where('user_id', $user->id)->where('isArchive', 0)->latest()->get();
        $count    = Protection::where('user_id', $user->id)->count();
        $detail   = GapAccount::calcProtectionAccount($accounts, $user);

        GapAccount::saveUpdatedTiles($user, 'protection', $count, $detail['sum']);
    }

    /**
     * Recalculate and persist the Retirement/Pension wheel tile.
     */
    public static function updatePensionTile($user): void
    {
        $accounts = Pension::where('user_id', $user->id)->where('isArchive', 0)->latest()->get();
        $count    = Pension::where('user_id', $user->id)->count();
        $detail   = GapAccount::calcPensionAccount($accounts, $user);

        GapAccount::saveUpdatedTiles($user, 'retirement', $count, $detail['sum']);
    }

    /**
     * Recalculate and persist the Giving/Philanthropy wheel tile.
     */
    public static function updateGivingTile($user): void
    {
        $account = Philantrophy::where('user_id', $user->id)->first();
        $count   = Grand::where('user_id', $user->id)->count();
        $detail  = GapAccount::calcPhilantrophy($account, $user);

        GapAccount::saveUpdatedTiles($user, 'philanthropy', $count, $detail['sum']);
    }

    // -------------------------------------------------------------------------
    // Equity read helpers (used by EquityService and GapExchangeHelper)
    // -------------------------------------------------------------------------

    /**
     * Return full equity list with computed ownership percentages and chart data.
     * Used as a read helper — does not persist any tile data.
     */
    public static function equityDetails($user): array
    {
        $equity       = HomeEquity::where('user_id', $user->id)->where('isArchive', 0)->latest()->get();
        $equity_detail = GapAccount::calcEquityAccount($equity, $user);
        $backgrounds  = GapAccount::accountBackground();

        foreach ($equity as $eq) {
            $eq->mortgage;
            $balance     = $eq->mortgage?->current_balance ?? 0;
            $marketValue = $eq->market_value > 0 ? $eq->market_value : 1;

            $eq->equity    = $eq->market_value - $balance;
            $eq->ownership = round(($eq->equity / $marketValue) * 100);
            $eq->chart     = [
                'labels' => ['Mortgage', 'Home Equity'],
                'values' => [$balance, $eq->equity],
            ];
        }

        return compact('backgrounds', 'equity', 'equity_detail');
    }

    /**
     * Return computed details for the primary residential equity (linked to DeptFin).
     * Returns ['primary' => null] when no primary equity is set.
     */
    public static function primaryEquityDetails($user): array
    {
        $debt    = Debt::where('user_id', $user->id)->first();
        $primary = null;

        if (!empty($debt?->equity_id)) {
            $primary = HomeEquity::find($debt->equity_id);

            if ($primary) {
                $primary->mortgage;
                $balance     = $primary->mortgage?->current_balance ?? 0;
                $marketValue = $primary->market_value > 0 ? $primary->market_value : 1;

                $primary->equity       = $primary->market_value - $balance;
                $primary->ownership    = round(($primary->equity / $marketValue) * 100);
                $primary->per_mortgage = round(($balance / $marketValue) * 100);
                $primary->chart        = [
                    'labels' => ['Mortgage', 'Home Equity'],
                    'values' => [$primary->per_mortgage, $primary->ownership],
                ];
            }
        }

        return compact('primary');
    }
}