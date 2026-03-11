<?php

namespace App\Services;

use App\Asset\PortfolioAsset;
use App\Asset\PortfoloAssetRecord;
use App\Enums\PortfolioToken;
use App\Helpers\PortfolioHelper;
use App\Helpers\ArchiveAccount;
use App\Models\AcquisitionCms;
use App\Models\AcquisitionOpportunityCms;
use App\Models\GapAssetType;
use Illuminate\Support\Facades\Storage;

class PortfolioService
{
    // =========================================================================
    // INDEX
    // =========================================================================

    /**
     * Build all data for the main portfolio listing.
     */
    public function getPortfolioOverview($user, array $params): array
    {
        $periods = $this->resolvePeriods($params);
        $from    = $periods['from'];
        $to      = $periods['to'];

        $portfolio = PortfolioAsset::where('user_id', $user->id)
            ->when($from && $to, fn($q) => $q->whereBetween('created_at', [$from, $to]))
            ->where('isArchive', 0)
            ->get();

        $portfolio_asset = PortfolioAsset::where('user_id', $user->id)
            ->where('income_id', 0)
            ->where('isArchive', 0)
            ->where('asset_category', PortfolioToken::CATEGORY_EXISTING)
            ->get();

        $global          = PortfolioHelper::globalPortfolio($user);
        $existing_report = PortfolioHelper::activateBRAID($user, PortfolioToken::CATEGORY_EXISTING, $portfolio);
        $desired_report  = PortfolioHelper::activateBRAID($user, PortfolioToken::CATEGORY_DESIRED, $portfolio);
        $roi_watch       = PortfolioHelper::roiWatch($user, $portfolio);

        $current_period  = strtotime(date('Y-m') . '-01');
        $current_from    = date('Y-m-d', strtotime('-2 months', $current_period));
        $current_to      = date('Y-m-d', strtotime('-1 months', $current_period));
        $previous_from   = date('Y-m-d', strtotime('-3 months', $current_period));
        $previous_to     = date('Y-m-d', strtotime('-2 months', $current_period));

        $currentRoi  = PortfolioHelper::getPreviousRoi($user, $current_from, $current_to);
        $previousRoi = PortfolioHelper::getPreviousRoi($user, $previous_from, $previous_to);
        $roi_trend   = PortfolioHelper::roiTrend($currentRoi, $previousRoi);

        return compact('roi_watch', 'roi_trend', 'existing_report', 'desired_report', 'global', 'portfolio_asset');
    }

    // =========================================================================
    // ASSET TYPES
    // =========================================================================

    public function getAssetTypes(): array
    {
        return [
            'business'     => GapAssetType::where('acqusition', 'business')->whereStatus(1)->get(),
            'risk'         => GapAssetType::where('acqusition', 'risk')->whereStatus(1)->get(),
            'appreciating' => GapAssetType::where('acqusition', 'appreciating')->whereStatus(1)->get(),
            'intellectual' => GapAssetType::where('acqusition', 'intellectual')->whereStatus(1)->get(),
            'depreciating' => GapAssetType::where('acqusition', 'depreciating')->whereStatus(1)->get(),
        ];
    }

    // =========================================================================
    // INFORMATION (CMS + asset types)
    // =========================================================================

    public function getInformation(): array
    {
        $acquisition = AcquisitionCms::all();
        $opportunies = AcquisitionOpportunityCms::all();
        $asset_types = $this->getAssetTypes();

        return compact('acquisition', 'opportunies', 'asset_types');
    }

    // =========================================================================
    // STORE ASSET
    // =========================================================================

    public function storeAsset($user, $request): array
    {
        return PortfolioHelper::addNewPortfolioAsset($user, $request);
    }

    // =========================================================================
    // INVESTMENT (BRAID table view)
    // =========================================================================

    public function getInvestment($user, ?string $archive): array
    {
        $business_details     = PortfolioHelper::existingDetailChart($user, PortfolioToken::CLASS_BUSINESS);
        $risk_details         = PortfolioHelper::existingDetailChart($user, PortfolioToken::CLASS_RISK);
        $appreciating_details = PortfolioHelper::existingDetailChart($user, PortfolioToken::CLASS_APPRECIATING);
        $intellectual_details = PortfolioHelper::existingDetailChart($user, PortfolioToken::CLASS_INTELLECTUAL);
        $depreciating_details = PortfolioHelper::existingDetailChart($user, PortfolioToken::CLASS_DEPRECIATING);

        $braid_table    = PortfolioHelper::groupBraidPortfolio($user, $archive);
        $braid_details  = compact(
            'business_details', 'risk_details',
            'appreciating_details', 'intellectual_details', 'depreciating_details'
        );
        $investment_sum = PortfolioHelper::investmentFunds($user)['investment'];

        return compact('archive', 'braid_table', 'braid_details', 'investment_sum');
    }

    // =========================================================================
    // BRAID GROUP (single asset class view)
    // =========================================================================

    public function getBraid($user, string $braid, ?string $archive, array $params): array
    {
        $periods = $this->resolvePeriods($params);

        $group           = PortfolioHelper::groupPortfolio($user, $braid, $archive, $periods);
        $existing        = $group['existing'];
        $desired         = $group['desired'];
        $existing_details = PortfolioHelper::existingDetailChart($user, $braid, $periods);

        return compact('existing', 'archive', 'desired', 'existing_details');
    }

    // =========================================================================
    // BRAID ASSET DETAIL
    // =========================================================================

    /**
     * Returns asset detail + financial records for a single portfolio asset.
     * Also handles period record creation and archive actions when header is set.
     *
     * @return array  ['action' => true, 'response' => JsonResponse]  — for header-triggered responses
     *                ['asset' => ..., ...]                           — for normal data responses
     *                ['not_found' => true]                           — asset not found
     */
    public function getAssetDetail($user, string $braid, int $id, array $params): array
    {
        $asset  = PortfolioAsset::where('user_id', $user->id)->where('id', $id)->first();
        $header  = $params['header'] ?? null;
        $access  = $params['access'] ?? null;
        $period  = $params['period'] ?? null;
        $account = $params['account'] ?? null;
        $archive = $params['archive'] ?? null;

        $periods = $this->resolvePeriods($params);
        $from    = $periods['from'];
        $to      = $periods['to'];

        // Header-triggered side-effects — return early
        if ($header) {
            if ($period) {
                return [
                    'action'   => true,
                    'response' => PortfolioHelper::addNewRecordPeriod($user, $asset, $header, $access, $period),
                ];
            }
            if ($account) {
                return [
                    'action'   => true,
                    'response' => ArchiveAccount::portfolioArchiveAction($user, $header, $access, $account),
                ];
            }
        }

        if (!$asset) {
            return ['not_found' => true];
        }

        $asset_financial = PortfoloAssetRecord::where('user_id', $user->id)
            ->when($from && $to, fn($q) => $q->whereBetween('period', [$from, $to]))
            ->where('portfolio_asset_id', $asset->id)
            ->orderBy('period', 'ASC')
            ->get();

        $asset_financial_record = PortfolioHelper::assetFinancialChart($asset_financial);
        $asset_financial_detail = PortfolioHelper::assetFinancialDetail($user, $asset, $asset_financial);

        return compact('asset', 'archive', 'asset_financial', 'asset_financial_detail', 'asset_financial_record');
    }

    // =========================================================================
    // UPDATE PHOTO
    // =========================================================================

    public function updatePhoto($user, int $id, $request): array
    {
        $asset = PortfolioAsset::where('user_id', $user->id)->where('id', $id)->first();

        if (!$asset) {
            return ['not_found' => true];
        }

        $ext      = $request->file('photo')->extension();
        $filename = $user->id . '_' . sha1(time()) . rand(100000, 999999) . '.' . $ext;
        $ref_path = 'public/' . date('Y') . '/portfolio';

        $upload_path = $request->file('photo')->storeAs($ref_path, $filename);

        if (isset($asset->photo)) {
            Storage::delete($asset->photo);
        }

        $asset->photo = $upload_path;
        $asset->save();

        return ['asset' => $asset];
    }

    // =========================================================================
    // UPDATE ASSET DETAILS
    // =========================================================================

    public function updateDetails($user, int $id, $request): array
    {
        $asset = PortfolioAsset::where('user_id', $user->id)->where('id', $id)->first();

        if (!$asset) {
            return ['not_found' => true];
        }

        $asset->name             = $request->asset_name;
        $asset->location         = $request->location;
        $asset->description      = $request->description;
        $asset->asset_value      = $request->asset_value;
        $asset->monthly_roi      = $request->income;
        $asset->portfolio_type_id = $request->portfolio_type;

        if ($request->hasFile('asset_document')) {
            PortfolioHelper::uploadPortfolioDocument($user, $asset, $request);
        }

        $asset->save();

        return ['asset' => $asset];
    }

    // =========================================================================
    // UPDATE ASSET RECORDS (financial period data)
    // =========================================================================

    public function updateRecords($user, int $id, string $period, $request): bool
    {
        return PortfolioHelper::updatePeriodRecord($user, $period, $id, $request);
    }

    // =========================================================================
    // UPDATE ASSET NOTE
    // =========================================================================

    public function updateNote($user, int $id, string $period, $request): bool
    {
        return PortfolioHelper::updateNoteRecord($user, $period, $id, $request);
    }

    // =========================================================================
    // DESTROY
    // =========================================================================

    public function deleteAsset($user, int $id): array
    {
        $portfolio = PortfolioAsset::where('user_id', $user->id)->where('id', $id)->first();

        if (!$portfolio) {
            return ['not_found' => true];
        }

        $name = $portfolio->name;

        $count = PortfoloAssetRecord::where('user_id', $user->id)
            ->where('portfolio_asset_id', $portfolio->id)
            ->count();

        PortfoloAssetRecord::where('user_id', $user->id)
            ->where('portfolio_asset_id', $portfolio->id)
            ->delete();

        $portfolio->delete();

        return ['name' => $name, 'count' => $count];
    }

    // =========================================================================
    // PRIVATE HELPERS
    // =========================================================================

    /**
     * Resolves from/to date range from request params.
     * Supports: month, timeframe (3/6/12 months), period_from/period_to.
     */
    private function resolvePeriods(array $params): array
    {
        $from            = $params['period_from'] ?? null;
        $to              = $params['period_to']   ?? null;
        $timeframe       = $params['timeframe']   ?? null;
        $selected_month  = $params['month']       ?? null;
        $current_period  = strtotime(date('Y-m') . '-01');

        if ($selected_month) {
            $month_date = strtotime($selected_month . '-01');
            $from = date('Y-m-d', $month_date);
            $to   = date('Y-m-t', $month_date);
        } else {
            if ($timeframe === '3 Months') {
                $from = date('Y-m-d', strtotime('-4 months', $current_period));
                $to   = date('Y-m-d', strtotime('-1 months', $current_period));
            } elseif ($timeframe === '6 Months') {
                $from = date('Y-m-d', strtotime('-7 months', $current_period));
                $to   = date('Y-m-d', strtotime('-1 months', $current_period));
            } elseif ($timeframe === '1 Year') {
                $from = date('Y-m-d', strtotime('-13 months', $current_period));
                $to   = date('Y-m-d', strtotime('-1 months', $current_period));
            }

            if ($from && $to) {
                $from = date('Y-m-d', strtotime($from . '-01'));
                $to   = date('Y-m-t', strtotime($to   . '-01'));
            }
        }

        return compact('from', 'to');
    }
}
