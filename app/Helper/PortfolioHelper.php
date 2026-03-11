<?php

namespace App\Helpers;

use App\Asset\PortfolioAsset;
use App\Asset\PortfoloAssetRecord;
use App\Enums\PortfolioToken;
use App\Helpers\CurrencyHelper;      // replaces GapExchangeHelper::convert_currency
use App\Helpers\AccountMapper;       // replaces GapExchangeHelper::switchTo* / wheelKPIAccount
use App\Models\UserSetting;
use App\Wheel\IncomeAccount;

/**
 * PortfolioHelper
 *
 * Stateless helper for all portfolio computation, chart building,
 * asset record management and document uploads.
 *
 * DEPENDENCY CHANGES (from legacy GapExchangeHelper):
 *   GapExchangeHelper::convert_currency()  →  CurrencyHelper::convert()
 *   GapExchangeHelper::wheelKPIAccount()   →  AccountMapper::wheelKPIAccount()
 */
class PortfolioHelper
{
    // =========================================================================
    // SECTION 1 — GLOBAL / GEOGRAPHIC SPREAD
    // =========================================================================

    /**
     * Calculates the continental spread of the user's existing portfolio
     * based on the currency of each asset.
     */
    public static function globalPortfolio($user): array
    {
        $portfolio = PortfolioAsset::where('user_id', $user->id)
            ->where('asset_category', PortfolioToken::CATEGORY_EXISTING)
            ->where('isArchive', 0)
            ->select('asset_currency')
            ->get();

        $north_america = 0; $europe = 0; $africa = 0;
        $asia = 0; $austrailia = 0; $south_america = 0;

        foreach ($portfolio as $asset) {
            $currency = $asset->asset_currency ? explode(' ', $asset->asset_currency)[1] : null;

            if (!$currency) continue;

            if (in_array($currency, ['USD', 'CAD'])) {
                $north_america++;
            } elseif (in_array($currency, ['EUR', 'CHF', 'RUB', 'GBP'])) {
                $europe++;
            } elseif (in_array($currency, ['NGN', 'GHS', 'ZAR'])) {
                $africa++;
            } elseif (in_array($currency, ['JPY', 'CNY', 'SAR', 'AED', 'IDR', 'INR'])) {
                $asia++;
            } elseif (in_array($currency, ['MXN', 'BRL'])) {
                $south_america++;
            } elseif ($currency === 'AUD') {
                $austrailia++;
            }
        }

        $total = array_sum([$north_america, $europe, $africa, $asia, $austrailia, $south_america]);

        if ($total) {
            $north_america = round(($north_america / $total) * 100);
            $south_america = round(($south_america / $total) * 100);
            $asia          = round(($asia          / $total) * 100);
            $africa        = round(($africa        / $total) * 100);
            $austrailia    = round(($austrailia    / $total) * 100);
            $europe        = round(($europe        / $total) * 100);
        }

        return compact('north_america', 'europe', 'africa', 'asia', 'austrailia', 'south_america');
    }

    // =========================================================================
    // SECTION 2 — CURRENCY CONVERSION HELPERS
    // =========================================================================

    /**
     * Converts all financial fields on a collection of assets to the user's
     * preferred base currency. Adds converted_* virtual attributes.
     *
     * Uses CurrencyHelper::convert() (replaces GapExchangeHelper::convert_currency).
     */
    public static function convertAssetValue($user, $assets): array
    {
        $preference = UserSetting::where('user_id', $user->id)
            ->where('setting_key', 'preferences')
            ->first();

        $preferred_base_currency = $preference
            ? ($preference->setting_value['preferred_currency'] ?? null)
            : null;

        foreach ($assets as $asset) {
            $asset->converted_asset_value            = CurrencyHelper::convert($user, $asset->asset_currency, $asset->asset_value, $asset->automated, $preferred_base_currency);
            $asset->converted_monthly_roi            = CurrencyHelper::convert($user, $asset->asset_currency, $asset->monthly_roi, $asset->automated, $preferred_base_currency);
            $asset->converted_projected_market_value = CurrencyHelper::convert($user, $asset->asset_currency, $asset->projected_market_value, $asset->automated, $preferred_base_currency);
        }

        return is_array($assets) ? $assets : $assets->all();
    }

    // =========================================================================
    // SECTION 3 — INVESTMENT FUND TOTALS
    // =========================================================================

    public static function investmentFunds($user): array
    {
        $investment_funds = PortfolioAsset::where('user_id', $user->id)
            ->where('asset_category', PortfolioToken::CATEGORY_EXISTING)
            ->where('isArchive', 0)
            ->get();

        $funds      = self::convertAssetValue($user, $investment_funds);
        $investment = array_sum(array_column($funds, 'converted_asset_value'));

        return compact('investment');
    }

    // =========================================================================
    // SECTION 4 — BRAID ACTIVATION (values & incomes per class)
    // =========================================================================

    /**
     * Splits a portfolio collection by BRAID class and returns
     * total values and incomes per class for the given asset category.
     */
    public static function activateBRAID($user, string $type, $portfolio): array
    {
        $business = []; $risk = []; $appreciate = [];
        $intellect = []; $depreciate = [];

        foreach ($portfolio as $asset) {
            match (true) {
                $asset->asset_class === PortfolioToken::CLASS_BUSINESS     && $asset->asset_category === $type => array_push($business,   $asset),
                $asset->asset_class === PortfolioToken::CLASS_RISK         && $asset->asset_category === $type => array_push($risk,        $asset),
                $asset->asset_class === PortfolioToken::CLASS_APPRECIATING && $asset->asset_category === $type => array_push($appreciate,  $asset),
                $asset->asset_class === PortfolioToken::CLASS_INTELLECTUAL && $asset->asset_category === $type => array_push($intellect,   $asset),
                $asset->asset_class === PortfolioToken::CLASS_DEPRECIATING && $asset->asset_category === $type => array_push($depreciate,  $asset),
                default => null,
            };
        }

        $toValue  = fn($group) => array_sum(array_column(self::convertAssetValue($user, $group), 'converted_asset_value'));
        $toIncome = fn($group) => array_sum(array_column(self::convertAssetValue($user, $group), 'converted_monthly_roi'));

        $business   = self::convertAssetValue($user, $business);
        $risk       = self::convertAssetValue($user, $risk);
        $appreciate = self::convertAssetValue($user, $appreciate);
        $intellect  = self::convertAssetValue($user, $intellect);
        $depreciate = self::convertAssetValue($user, $depreciate);

        $values  = [
            array_sum(array_column($business,   'converted_asset_value')),
            array_sum(array_column($risk,       'converted_asset_value')),
            array_sum(array_column($appreciate, 'converted_asset_value')),
            array_sum(array_column($intellect,  'converted_asset_value')),
            array_sum(array_column($depreciate, 'converted_asset_value')),
        ];
        $incomes = [
            array_sum(array_column($business,   'converted_monthly_roi')),
            array_sum(array_column($risk,       'converted_monthly_roi')),
            array_sum(array_column($appreciate, 'converted_monthly_roi')),
            array_sum(array_column($intellect,  'converted_monthly_roi')),
            array_sum(array_column($depreciate, 'converted_monthly_roi')),
        ];

        return compact('values', 'incomes');
    }

    // =========================================================================
    // SECTION 5 — ROI CALCULATIONS
    // =========================================================================

    public static function roiWatch($user, $portfolio): array
    {
        $bus = []; $risk = []; $appreciate = [];
        $intellect = []; $depreciate = [];
        $braid = ['B' => 0, 'R' => 0, 'A' => 0, 'I' => 0, 'D' => 0];

        foreach ($portfolio as $asset) {
            if ($asset->asset_category !== PortfolioToken::CATEGORY_EXISTING) continue;
            match ($asset->asset_class) {
                PortfolioToken::CLASS_BUSINESS     => array_push($bus,        $asset),
                PortfolioToken::CLASS_RISK         => array_push($risk,       $asset),
                PortfolioToken::CLASS_APPRECIATING => array_push($appreciate, $asset),
                PortfolioToken::CLASS_INTELLECTUAL => array_push($intellect,  $asset),
                PortfolioToken::CLASS_DEPRECIATING => array_push($depreciate, $asset),
                default                            => null,
            };
        }

        $total_portfolio = max(
            count($bus) + count($risk) + count($appreciate) + count($intellect) + count($depreciate),
            1
        );

        $braid['B'] = round((count($bus)        / $total_portfolio) * 100);
        $braid['R'] = round((count($risk)       / $total_portfolio) * 100);
        $braid['A'] = round((count($appreciate) / $total_portfolio) * 100);
        $braid['I'] = round((count($intellect)  / $total_portfolio) * 100);
        $braid['D'] = round((count($depreciate) / $total_portfolio) * 100);

        $braid_roi = array_values($braid);

        $calcGroupRoi = function ($group) use ($user): array {
            $converted = self::convertAssetValue($user, $group);
            return array_map(function ($b) {
                $income = $b->converted_monthly_roi * 12;
                $value  = $b->converted_asset_value ?: 1;
                return ($income / $value) * 100;
            }, $converted);
        };

        $avgRoi = function (array $rois, int $count): float {
            return $count ? array_sum($rois) / $count : 0;
        };

        $bus_roi         = $calcGroupRoi($bus);
        $risk_roi        = $calcGroupRoi($risk);
        $appreciate_roi  = $calcGroupRoi($appreciate);
        $intellect_roi   = $calcGroupRoi($intellect);
        $depreciate_roi  = $calcGroupRoi($depreciate);

        $roi = [
            $avgRoi($bus_roi,        count($bus)),
            $avgRoi($risk_roi,       count($risk)),
            $avgRoi($appreciate_roi, count($appreciate)),
            $avgRoi($intellect_roi,  count($intellect)),
            $avgRoi($depreciate_roi, count($depreciate)),
        ];

        return compact('total_portfolio', 'braid', 'braid_roi', 'roi');
    }

    public static function roiTrend(array $currentRoi, array $previousRoi): array
    {
        $trend = [];
        foreach ($currentRoi as $index => $value) {
            $prev      = $previousRoi[$index] ?? 0;
            $diff      = $value - $prev;
            $direction = $diff > 0 ? 'increasing' : ($diff < 0 ? 'decreasing' : 'neutral');
            $trend[]   = ['change' => round($diff, 2), 'direction' => $direction];
        }
        return $trend;
    }

    public static function getPreviousRoi($user, string $from, string $to): array
    {
        $portfolio = PortfolioAsset::where('user_id', $user->id)
            ->where('isArchive', 0)
            ->whereBetween('created_at', [$from, $to])
            ->get();

        return self::roiWatch($user, $portfolio)['roi'];
    }

    // =========================================================================
    // SECTION 6 — PORTFOLIO GROUPING
    // =========================================================================

    public static function groupPortfolio($user, string $type, ?string $archive, array $period = []): array
    {
        $query = PortfolioAsset::where('user_id', $user->id)
            ->where('isArchive', $archive ? 1 : 0)
            ->where('asset_class', $type)
            ->when(
                isset($period['from']) && isset($period['to']),
                fn($q) => $q->whereBetween('created_at', [$period['from'], $period['to']])
            )
            ->latest();

        $existing = []; $desired = [];
        foreach ($query->get() as $asset) {
            $asset->asset_category === PortfolioToken::CATEGORY_EXISTING
                ? array_push($existing, $asset)
                : array_push($desired, $asset);
        }

        return compact('existing', 'desired');
    }

    public static function groupBraidPortfolio($user, ?string $archive): array
    {
        $assets = PortfolioAsset::where('user_id', $user->id)
            ->where('asset_category', PortfolioToken::CATEGORY_EXISTING)
            ->where('isArchive', $archive ? 1 : 0)
            ->latest()->get();

        $groups = [
            PortfolioToken::CLASS_BUSINESS     => [],
            PortfolioToken::CLASS_RISK         => [],
            PortfolioToken::CLASS_APPRECIATING => [],
            PortfolioToken::CLASS_INTELLECTUAL => [],
            PortfolioToken::CLASS_DEPRECIATING => [],
        ];

        foreach ($assets as $asset) {
            if (isset($groups[$asset->asset_class])) {
                $groups[$asset->asset_class][] = $asset;
            }
        }

        return [
            'business'     => $groups[PortfolioToken::CLASS_BUSINESS],
            'risk'         => $groups[PortfolioToken::CLASS_RISK],
            'appreciating' => $groups[PortfolioToken::CLASS_APPRECIATING],
            'intellectual' => $groups[PortfolioToken::CLASS_INTELLECTUAL],
            'depreciating' => $groups[PortfolioToken::CLASS_DEPRECIATING],
        ];
    }

    // =========================================================================
    // SECTION 7 — CHART BUILDERS
    // =========================================================================

    public static function assetFinancialDetail($user, $asset, $financials, bool $convert = true): array
    {
        $expenditure_labels = [];
        $asset_values = []; $revenue = [];
        $expenditure  = []; $net = [];
        $percentage_changes = ['revenue' => 0, 'expenditure' => 0, 'net' => 0];

        $latest = array_slice($financials->toArray(), -6);

        foreach ($latest as $rec) {
            $expenditure_labels[] = date('M', strtotime($rec['period'])) . ' ' . date('Y', strtotime($rec['period']));

            if ($convert) {
                $revenue[]     = CurrencyHelper::convert($user, $asset->asset_currency, $rec['revenue'],    $asset->automated);
                $expenditure[] = CurrencyHelper::convert($user, $asset->asset_currency, $rec['expenditure'], $asset->automated);
                $net[]         = CurrencyHelper::convert($user, $asset->asset_currency, $rec['net_income'],  $asset->automated);
                $asset_values[] = CurrencyHelper::convert($user, $asset->asset_currency, $rec['amount'],    $asset->automated);
            } else {
                $revenue[]     = $rec['revenue'];
                $expenditure[] = $rec['expenditure'];
                $net[]         = $rec['net_income'];
                $asset_values[] = $rec['amount'];
            }
        }

        if (count($revenue) >= 2) {
            $li = count($revenue) - 1;
            $pi = $li - 1;
            $pctChange = fn($new, $old) => $old != 0 ? (($new - $old) / abs($old)) * 100 : 0;

            $percentage_changes = [
                'revenue'     => $pctChange($revenue[$li],     $revenue[$pi]),
                'expenditure' => $pctChange($expenditure[$li], $expenditure[$pi]),
                'net'         => $pctChange($net[$li],         $net[$pi]),
            ];
        }

        return compact('expenditure_labels', 'asset_values', 'revenue', 'expenditure', 'net', 'percentage_changes');
    }

    public static function assetFinancialChart($assets): array
    {
        $expenditure_labels = [];
        $management = []; $taxes = []; $maintenance = [];
        $others = []; $revenue = []; $expenditure = []; $net = [];

        foreach (array_slice($assets->toArray(), -6) as $rec) {
            $expenditure_labels[] = date('M', strtotime($rec['period'])) . ' ' . date('Y', strtotime($rec['period']));
            $management[]  = $rec['management'];
            $taxes[]       = $rec['taxes'];
            $maintenance[] = $rec['maintenance'];
            $others[]      = $rec['others'];
            $revenue[]     = $rec['revenue'];
            $expenditure[] = $rec['expenditure'];
            $net[]         = $rec['net_income'];
        }

        $curriculum = [array_sum($revenue), array_sum($expenditure), array_sum($net)];

        return compact('expenditure_labels', 'management', 'taxes', 'maintenance', 'others', 'curriculum');
    }

    public static function existingDetailChart($user, string $braid = '', array $periods = []): array
    {
        $existing = PortfolioAsset::join('portfolo_asset_records', 'portfolio_assets.id', '=', 'portfolo_asset_records.portfolio_asset_id')
            ->where('portfolio_assets.user_id', $user->id)
            ->where('portfolio_assets.asset_class', $braid)
            ->when(
                isset($periods['from']) && isset($periods['to']),
                fn($q) => $q->whereBetween('period', [$periods['from'], $periods['to']])
            )
            ->orderBy('period', 'DESC')
            ->get();

        $labels = []; $label_asset = []; $period = [];
        $values = []; $incomes = [];
        $current_period_amount = 0;
        $current_period_income = 0;

        foreach ($existing as $asset) {
            if (count($period) >= 6) break;

            $period_date = strtotime($asset->period);

            if (end($period) !== $asset->period) {
                if ($current_period_amount > 0) {
                    $values[]  = $current_period_amount;
                    $incomes[] = $current_period_income;
                }
                $label_asset[] = date('F Y', $period_date);
                $labels[]      = date('M Y', $period_date);
                $period[]      = $asset->period;

                $current_period_amount = 0;
                $current_period_income = 0;
            }

            $expenditure = $asset->management + $asset->taxes + $asset->maintenance + $asset->others;
            $net_income  = ($asset->revenue - $expenditure) ?: $asset->net_income;

            $current_period_amount += CurrencyHelper::convert($user, $asset->asset_currency, $asset->amount, $asset->automated);
            $current_period_income += CurrencyHelper::convert($user, $asset->asset_currency, $net_income,    $asset->automated);
        }

        if ($current_period_amount > 0) {
            $values[]  = $current_period_amount;
            $incomes[] = $current_period_income;
        }

        return [
            'labels'        => $labels,
            'label_asset'   => $label_asset,
            'asset_incomes' => $incomes,
            'asset_values'  => $values,
        ];
    }

    // =========================================================================
    // SECTION 8 — ASSET RECORD MANAGEMENT
    // =========================================================================

    public static function addNewPortfolioAsset($user, $request)
    {
        $last_period = date('Y-m-d', strtotime('-1 months', strtotime(date('Y-m') . '-01')));

        $portfolio                      = new PortfolioAsset();
        $portfolio->user_id             = $user->id;
        $portfolio->asset_category      = $request->asset_category;
        $portfolio->asset_class         = $request->asset_class;
        $portfolio->asset_type          = 'manual';
        $portfolio->portfolio_type_id   = $request->portfolio_type;
        $portfolio->automated           = $request->automated_rate;
        $portfolio->asset_currency      = $request->currency;
        $portfolio->name                = $request->asset_name;
        $portfolio->description         = $request->description;
        $portfolio->asset_value         = $request->asset_value;
        $portfolio->monthly_roi         = $request->monthly_roi;
        $portfolio->credit_value        = $request->credit_value;
        $portfolio->projected_market_value = $request->projected_value;
        $portfolio->save();

        $asset_records                      = new PortfoloAssetRecord();
        $asset_records->user_id             = $user->id;
        $asset_records->portfolio_asset_id  = $portfolio->id;
        $asset_records->period              = $last_period;
        $asset_records->amount              = (float) $portfolio->asset_value;
        $asset_records->net_income          = $portfolio->monthly_roi;
        $asset_records->save();

        $success = true;
        return response()->json(compact('success', 'portfolio'));
    }

    public static function addNewRecordPeriod($user, $asset, string $header, string $access, string $period)
    {
        if ($header !== PortfolioToken::PERIOD_HEADER) {
            return response()->json(['success' => false, 'info' => 'Incorrect Header']);
        }

        $last_record = PortfoloAssetRecord::where('user_id', $user->id)
            ->where('portfolio_asset_id', $asset->id)
            ->orderBy('period', 'DESC')
            ->first();

        $success = true;

        switch ($access) {
            case PortfolioToken::ACCESS_CURRENT_PERIOD:
                $current      = date('Y-m-d', strtotime(date('Y-m') . '-01'));
                $asset_record = PortfoloAssetRecord::firstOrCreate(
                    ['user_id' => $user->id, 'portfolio_asset_id' => $asset->id, 'period' => $current],
                    ['amount' => $last_record->amount ?? $asset->asset_value]
                );
                $asset_record->income = $asset->monthly_roi;
                return response()->json(compact('success', 'asset_record'));

            case PortfolioToken::ACCESS_CHECK_PERIOD:
                $current      = date('Y-m-d', strtotime($period . '-01'));
                $asset_record = PortfoloAssetRecord::where('user_id', $user->id)
                    ->where('portfolio_asset_id', $asset->id)
                    ->where('period', $current)->first();
                return response()->json(compact('success', 'asset_record'));

            case PortfolioToken::ACCESS_ADD_NEW_PERIOD:
                $current      = date('Y-m-d', strtotime($period . '-01'));
                $asset_record = PortfoloAssetRecord::firstOrCreate(
                    ['user_id' => $user->id, 'portfolio_asset_id' => $asset->id, 'period' => $current],
                    ['amount' => $asset->asset_value]
                );
                return response()->json(compact('success', 'asset_record'));

            default:
                return response()->json(['success' => false, 'info' => 'Incorrect Access Token']);
        }
    }

    public static function updatePeriodRecord($user, string $period, int $asset_id, $request): bool
    {
        $fields = [
            'amount'               => $request->amount,
            'revenue'              => $request->revenue,
            'management'           => $request->management,
            'taxes'                => $request->taxes,
            'others'               => $request->others,
            'maintenance'          => $request->maintenance,
            'maintenance_details'  => $request->maintenance_details,
            'note'                 => $request->note,
        ];

        $record = PortfoloAssetRecord::firstOrNew([
            'user_id'            => $user->id,
            'portfolio_asset_id' => $asset_id,
            'period'             => $period,
        ]);

        // Touch linked income account on update
        if ($record->exists) {
            $income = IncomeAccount::where('user_id', $user->id)->where('portfolio_asset_id', $asset_id)->first();
            if ($income) $income->touch();
        }

        foreach ($fields as $key => $value) {
            $record->$key = $value;
        }
        $record->save();

        return true;
    }

    public static function updateNoteRecord($user, string $period, int $asset_id, $request): bool
    {
        $record = PortfoloAssetRecord::firstOrNew([
            'user_id'            => $user->id,
            'portfolio_asset_id' => $asset_id,
            'period'             => $period,
        ]);
        $record->note = $request->note;
        $record->save();

        return true;
    }

    // =========================================================================
    // SECTION 9 — DOCUMENT UPLOAD
    // =========================================================================

    public static function uploadPortfolioDocument($user, $asset, $request): bool
    {
        $request->validate([
            'asset_document_name' => 'required',
            'asset_document'      => 'required|max:7140',
        ]);

        $ext      = $request->file('asset_document')->extension();
        $filename = $user->id . sha1(time()) . rand(100000, 999999) . '.' . $ext;
        $ref_path = 'public/portfolio/' . date('Y');

        $upload_path = $request->file('asset_document')->storeAs($ref_path, $filename);
        $entry       = "$request->asset_document_name|$upload_path";

        foreach (['document1','document2','document3','document4','document5','document6','document7','document8'] as $slot) {
            if (!$asset->$slot) {
                $asset->$slot = $entry;
                $asset->save();
                return true;
            }
        }

        return false; // all 8 slots full
    }

    // =========================================================================
    // SECTION 10 — MISC / STYLING
    // =========================================================================

    public static function accountBackground(): array
    {
        return ['#8C8D86', '#E6C069', '#897B61', '#8DAB8E', '#77A2BB', '#E28394'];
    }
}
