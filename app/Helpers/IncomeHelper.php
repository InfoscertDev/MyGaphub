<?php

namespace App\Helper;

use App\Asset\PortfolioAsset;
use App\Asset\PortfoloAssetRecord;
use App\Enums\PortfolioToken;
use App\Helpers\CurrencyHelper;       // replaces GapExchangeHelper::convert_currency
use App\Models\Asset\NonPortfolioRecord;
use App\User;
use App\Wheel\IncomeAccount as Income;
use App\Wheel\IncomeAccount;
use Carbon\Carbon;

/**
 * IncomeHelper
 *
 * Stateless helper for income analysis, channel calculations,
 * characteristics, and period record management.
 *
 * DEPENDENCY CHANGES (from legacy GapExchangeHelper):
 *   GapExchangeHelper::convert_currency()  →  CurrencyHelper::convert()
 */
class IncomeHelper
{
    // =========================================================================
    // SECTION 1 — INCOME ANALYSIS
    // =========================================================================

    /**
     * Summarises the user's income split: portfolio vs non-portfolio,
     * and compares against the current financial period value.
     */
    public static function analyseIncome($user, $fin): array
    {
        $incomes = Income::where('user_id', $user->id)->where('isArchive', 0)->get();

        $current_portfolio  = $fin ?? 0;
        $income_portfolios     = [];
        $income_non_portfolios = [];

        $portfolio_asset = PortfolioAsset::where('user_id', $user->id)
            ->where('isArchive', 0)
            ->where('income_id', 0)
            ->where('asset_category', PortfolioToken::CATEGORY_EXISTING)
            ->get();

        foreach ($incomes as $asset) {
            $value = CurrencyHelper::convert($user, $asset->income_currency, $asset->amount, $asset->automated);
            if ($asset->income_type === 'portfolio') {
                $income_portfolios[] = $value;
            } elseif ($asset->income_type === 'non_portfolio') {
                $income_non_portfolios[] = $value;
            }
        }

        $income_portfolio     = array_sum($income_portfolios);
        $income_non_portfolio = array_sum($income_non_portfolios);
        $total_portfolio      = $income_portfolio + $income_non_portfolio;
        $portfolio_diff       = $current_portfolio - $income_portfolio;
        $isPortfolio          = $income_portfolio > $current_portfolio;

        return compact(
            'current_portfolio', 'income_portfolio', 'income_non_portfolio',
            'portfolio_diff', 'total_portfolio', 'portfolio_asset', 'isPortfolio'
        );
    }

    // =========================================================================
    // SECTION 2 — ADD INCOME
    // =========================================================================

    public static function addNewIncome($user, $request): bool
    {
        $last_period = date('Y-m-d', strtotime('-1 months', strtotime(date('Y-m') . '-01')));

        $income                   = new Income();
        $income->user_id          = $user->id;
        $income->income_type      = $request->income_type;
        $income->automated        = $request->automated_rate;
        $income->amount           = $request->amount;
        $income->channel          = $request->channel;
        $income->income_name      = $request->income_name;
        $income->income_currency  = $request->currency;
        $income->portfolio_asset_id = $request->portfolio_asset;
        $income->income_date      = $request->income_date;
        $income->income_frequency = $request->income_frequency;
        $income->status           = $request->status;

        if ($request->income_type === 'portfolio') {
            $income->income_name      = '';
            $income->income_currency  = '';
            $income->amount           = 0;
            $income->income_frequency = 'Monthly';
            $income->channel          = '';
        }

        $income->save();

        if ($request->income_type === 'portfolio') {
            $asset = PortfolioAsset::where('user_id', $user->id)->where('id', $request->portfolio_asset)->firstOrFail();
            $asset->income_id = $income->id;
            $asset->save();
        } else {
            $record             = new NonPortfolioRecord();
            $record->user_id    = $user->id;
            $record->income_id  = $income->id;
            $record->period     = $last_period;
            $record->amount     = $request->amount;
            $record->save();
        }

        WheelClass::updateIncomeTile($user);

        return true;
    }

    // =========================================================================
    // SECTION 3 — INCOME CHANNELS
    // =========================================================================

    /**
     * Groups income amounts by channel and returns
     * absolute values and percentage breakdown.
     */
    public function getIncomeChannels($user, $incomes, float $total_portfolio): array
    {
        if (!$incomes) {
            $incomes = Income::where('user_id', $user->id)->where('isArchive', 0)->latest()->get();
        }

        $primary = []; $hustle = []; $business = []; $risk = [];
        $appreciating = []; $intellectual = []; $depreciating = [];

        foreach ($incomes as $asset) {
            $value   = CurrencyHelper::convert($user, $asset->income_currency, $asset->amount, $asset->automated);
            $channel = strtolower($asset->channel);
            $type    = $asset->income_type;

            match (true) {
                $type === 'portfolio' && $channel === 'business'     => array_push($business,     $value),
                $type === 'portfolio' && $channel === 'risk'         => array_push($risk,         $value),
                $type === 'portfolio' && $channel === 'appreciating' => array_push($appreciating, $value),
                $type === 'portfolio' && $channel === 'intellectual' => array_push($intellectual,  $value),
                $type === 'portfolio' && $channel === 'depreciating' => array_push($depreciating,  $value),
                $type === 'non_portfolio' && $channel === 'primary employment' => array_push($primary, $value),
                $type === 'non_portfolio'                            => array_push($hustle,        $value),
                default => null,
            };
        }

        $denominator = $total_portfolio ?: 1;
        $pct = fn($sum) => round(($sum / $denominator) * 100);

        $primary      = array_sum($primary);
        $hustle       = array_sum($hustle);
        $business     = array_sum($business);
        $risk         = array_sum($risk);
        $appreciating = array_sum($appreciating);
        $intellectual = array_sum($intellectual);
        $depreciating = array_sum($depreciating);

        $values = compact('primary', 'hustle', 'business', 'risk', 'appreciating', 'intellectual', 'depreciating');
        $percentages = [
            'primary'      => $pct($primary),
            'hustle'       => $pct($hustle),
            'business'     => $pct($business),
            'risk'         => $pct($risk),
            'appreciating' => $pct($appreciating),
            'intellectual' => $pct($intellectual),
            'depreciating' => $pct($depreciating),
        ];

        return compact('values', 'percentages');
    }

    // =========================================================================
    // SECTION 4 — INCOME CHARACTERISTICS (3-month trend)
    // =========================================================================

    public function getIncomeCharacteristics(User $user): array
    {
        $start_period = date('Y-m-d', strtotime('-1 months', strtotime(date('Y-m') . '-01')));
        $last_period  = date('Y-m-d', strtotime('-3 months', strtotime(date('Y-m') . '-01')));

        $portfolio = PortfoloAssetRecord::where('user_id', $user->id)
            ->whereBetween('period', [$last_period, $start_period])
            ->orderBy('period', 'ASC')->get();

        $non_portfolio = NonPortfolioRecord::where('user_id', $user->id)
            ->whereBetween('period', [$last_period, $start_period])
            ->orderBy('period', 'ASC')->get();

        $non_portfolio_values = $this->aggregatePeiodicValue($user, $non_portfolio);
        $portfolio_values     = $this->portfolioPeiodicValue($user, $portfolio);

        $periods = [
            date('M', strtotime('-2 months', strtotime($start_period))),
            date('M', strtotime('-1 months', strtotime($start_period))),
            date('M', strtotime($start_period)),
        ];

        $past_month = ($portfolio_values[1] ?? 0) + ($non_portfolio_values[1] ?? 0);
        $last_month = ($portfolio_values[2] ?? 0) + ($non_portfolio_values[2] ?? 0);
        $hasImprove = $last_month >= $past_month;

        return compact('periods', 'non_portfolio_values', 'portfolio_values', 'hasImprove');
    }

    // =========================================================================
    // SECTION 5 — PERIODIC VALUE AGGREGATORS
    // =========================================================================

    public function aggregatePeiodicValue(User $user, object $assets): array
    {
        $month1 = date('Y-m-d', strtotime('-1 months', strtotime(date('Y-m') . '-01')));
        $month2 = date('Y-m-d', strtotime('-2 months', strtotime(date('Y-m') . '-01')));
        $month3 = date('Y-m-d', strtotime('-3 months', strtotime(date('Y-m') . '-01')));
        $groups = [];

        foreach ($assets as $asset) {
            $asset_info = IncomeAccount::find($asset->income_id);
            $groups[$asset->period][] = CurrencyHelper::convert(
                $user,
                $asset_info->income_currency ?? '',
                $asset->amount,
                $asset_info->automated ?? false
            );
        }

        return [
            isset($groups[$month3]) ? array_sum($groups[$month3]) : 0,
            isset($groups[$month2]) ? array_sum($groups[$month2]) : 0,
            isset($groups[$month1]) ? array_sum($groups[$month1]) : 0,
        ];
    }

    public function portfolioPeiodicValue(User $user, object $assets): array
    {
        $month1 = date('Y-m-d', strtotime('-1 months', strtotime(date('Y-m') . '-01')));
        $month2 = date('Y-m-d', strtotime('-2 months', strtotime(date('Y-m') . '-01')));
        $month3 = date('Y-m-d', strtotime('-3 months', strtotime(date('Y-m') . '-01')));
        $groups = [];

        foreach ($assets as $asset) {
            $asset_info = PortfolioAsset::find($asset->portfolio_asset_id);
            $groups[$asset->period][] = CurrencyHelper::convert(
                $user,
                $asset_info->asset_currency ?? '',
                $asset->net_income,
                $asset_info->automated ?? false
            );
        }

        return [
            isset($groups[$month3]) ? array_sum($groups[$month3]) : 0,
            isset($groups[$month2]) ? array_sum($groups[$month2]) : 0,
            isset($groups[$month1]) ? array_sum($groups[$month1]) : 0,
        ];
    }

    // =========================================================================
    // SECTION 6 — NON-PORTFOLIO PERIOD MANAGEMENT
    // =========================================================================

    public function addNewNonPortfolioRecord($user, int $income_id, string $header, string $access, string $period)
    {
        $income = Income::find($income_id);

        if ($header !== PortfolioToken::PERIOD_HEADER || !$income || $income->income_type !== 'non_portfolio') {
            return response()->json(['success' => false, 'info' => 'Incorrect Information']);
        }

        $success = true;

        switch ($access) {
            case PortfolioToken::ACCESS_NP_CHECK_PERIOD:
                $current = $period . '-01';
                $record  = NonPortfolioRecord::where('user_id', $user->id)
                    ->where('income_id', $income->id)
                    ->where('period', $current)->first();
                return response()->json(['success' => (bool) $record, 'asset_records' => $record]);

            case PortfolioToken::ACCESS_NP_ADD_PERIOD:
                $current = $period . '-01';
                $record  = NonPortfolioRecord::firstOrCreate(
                    ['user_id' => $user->id, 'income_id' => $income->id, 'period' => $current],
                    ['amount' => 0]
                );
                return response()->json(compact('success', 'record'));

            default:
                return response()->json(['success' => false, 'info' => 'Incorrect Access Token']);
        }
    }

    public static function updateNonPeriodRecord($user, string $period, int $income_id, $request): bool
    {
        $record = NonPortfolioRecord::where('user_id', $user->id)
            ->where('income_id', $income_id)
            ->where('period', $period)->first();

        if (!$record) return false;

        $income = Income::where('user_id', $user->id)->where('id', $income_id)->first();
        if ($income) {
            if (isset($request->automated_rate))   $income->automated        = $request->automated_rate;
            if (isset($request->income_date))       $income->income_date      = $request->income_date;
            if (isset($request->income_frequency))  $income->income_frequency = $request->income_frequency;
            $income->touch();
        }

        $record->amount = $request->amount;
        $record->note   = $request->note;
        $record->tithe  = $request->tithe;
        $record->taxes  = $request->taxes;
        $record->others = $request->others;
        $record->save();

        return true;
    }

    // =========================================================================
    // SECTION 7 — CHART BUILDERS
    // =========================================================================

    public function nonPortfolioDetailChart($user, $account): array
    {
        $labels = []; $values = [];

        $records = NonPortfolioRecord::where('user_id', $user->id)
            ->where('income_id', $account->id)
            ->orderBy('period', 'ASC')->limit(6)->get();

        foreach ($records as $record) {
            $labels[] = Carbon::parse($record->period)->format('M');
            $values[] = $record->amount;
        }

        $target = count($records) ? max($values) * 1.25 : $account->amount * 1.10;

        return compact('labels', 'values', 'target');
    }

    public function nonPortfolioRecordChart($non_portfolio): array
    {
        $label_asset = []; $labels = [];
        $values = []; $tithe_values = []; $taxes_values = [];
        $other_values = []; $net_values = [];

        foreach ($non_portfolio as $asset) {
            $label_asset[] = date('M', strtotime($asset->period)) . ' ' . date('Y', strtotime($asset->period));
            $values[]      = $asset->amount;
            $tithe_values[] = $asset->tithe;
            $taxes_values[] = $asset->taxes;
            $other_values[] = $asset->others;
            $net_values[]   = $asset->amount - array_sum([$asset->tithe, $asset->taxes, $asset->others]);
        }

        return compact('labels', 'label_asset', 'values', 'tithe_values', 'taxes_values', 'net_values', 'other_values');
    }

    public function portfolioDetailChart($user, $account): array
    {
        $labels = []; $values = [];

        $records = PortfoloAssetRecord::where('user_id', $user->id)
            ->where('portfolio_asset_id', $account->portfolio_asset_id)
            ->orderBy('period', 'ASC')->limit(6)->get();

        foreach ($records as $record) {
            $labels[] = Carbon::parse($record->period)->format('M');
            $values[] = $record->net_income;
        }

        $target = count($records) ? max($values) * 1.25 : $account->amount * 1.10;

        return compact('labels', 'values', 'target');
    }

    public function portfolioIncomeRecord($user, $account): object
    {
        $records = PortfoloAssetRecord::where('user_id', $user->id)
            ->where('portfolio_asset_id', $account->portfolio_asset_id)
            ->orderBy('period', 'DESC')->limit(6)->get();

        $last_period = date('Y-m-d', strtotime('-1 month', strtotime(date('Y-m') . '-01')));

        foreach ($records as $record) {
            $record->isCurrent = $record->period === $last_period;
            $record->period    = Carbon::parse($record->period)->format('F Y');
        }

        return $records;
    }

    public function nonPortfolioIncomeRecord($user, $account): object
    {
        $records = NonPortfolioRecord::where('user_id', $user->id)
            ->where('income_id', $account->id)
            ->orderBy('period', 'DESC')->limit(6)->get();

        $last_period = date('Y-m-d', strtotime('-1 month', strtotime(date('Y-m') . '-01')));

        foreach ($records as $record) {
            $record->net_income = $record->amount - array_sum([$record->tithe, $record->taxes, $record->others]);
            $record->isCurrent  = $record->period === $last_period;
            $record->period     = Carbon::parse($record->period)->format('F Y');
        }

        return $records;
    }
}
