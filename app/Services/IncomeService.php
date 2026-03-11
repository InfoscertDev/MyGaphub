<?php

namespace App\Services;

use App\Helpers\AllocationHelpers;
use App\Helpers\ArchiveAccount;
use App\Helpers\CalculatorClass as Fin;
use App\Helpers\GapAccountCalculator as GapAccount;
use App\Helpers\GapExchangeHelper;
use App\Helpers\IncomeHelper;
use App\Helpers\WheelClass as Wheel;
use App\Models\Asset\NonPortfolioRecord;
use App\Asset\PortfolioAsset;
use App\UserAudit as Audit;
use App\Wheel\IncomeAccount as Income;

class IncomeService
{
    public function __construct(private IncomeHelper $incomeHelper) {}

    public function getIncomeList($user, array $filters): array
    {
        [
            'header'  => $header,
            'access'  => $access,
            'account' => $account,
            'archive' => $archive,
            'period'  => $period,
            'income'  => $income,
            'crd'     => $crd,
            'alo'     => $alo,
        ] = $filters;

        if ($header) {
            if ($period) {
                return $this->incomeHelper->addNewNonPorfolioRecord($user, $income, $header, $access, $period);
            }
            if ($account) {
                return ArchiveAccount::incomeArchiveAction($user, $header, $access, $account);
            }
        }

        if ($crd && $alo) {
            $res = GapExchangeHelper::submitIncomeAllocation($user, $crd, $alo);
            return compact('res');
        }

        $portfolio_asset = PortfolioAsset::where('user_id', $user->id)
            ->where('asset_category', 'existing')
            ->where('isArchive', 0)
            ->get();

        $incomes = Income::where('user_id', $user->id)
            ->where('isArchive', $archive ? 1 : 0)
            ->orderBy('income_date', 'DESC')
            ->get();

        foreach ($incomes as $money) {
            $money->currency = explode(' ', $money->income_currency)[0];
            $money->chart    = $money->income_type === 'portfolio'
                ? $this->incomeHelper->portfolioDetailChart($user, $money)
                : $this->incomeHelper->nonPortfolioDetailChart($user, $money);
        }

        $fin            = Fin::finicial($user);
        $income_info    = IncomeHelper::analyseIncome($user, $fin['portfolio']);
        $income_detail  = GapAccount::calcIncomeAccount($user, $incomes);
        $income_audit   = Audit::where('user_id', $user->id)->select('income_allocated')->first();
        $income_channels = $this->incomeHelper->getIncomeChannels($user, $incomes, $income_info['total_portfolio']);
        $income_chart   = $this->incomeHelper->getIncomeCharacteristics($user);

        return compact('incomes', 'portfolio_asset', 'income_detail', 'income_channels', 'income_chart', 'income_info', 'income_audit');
    }

    public function getNonPortfolioDetail($user, int $id): array
    {
        $backgrounds    = GapAccount::accountBackground();
        $income         = Income::where('user_id', $user->id)->where('id', $id)->firstOrFail();

        $non_portfolios = NonPortfolioRecord::where('user_id', $user->id)
            ->where('income_id', $income->id)
            ->orderBy('period', 'DESC')
            ->limit(6)
            ->get();

        foreach ($non_portfolios as $portfolio) {
            $portfolio->net_income = $portfolio->amount - array_sum([
                $portfolio->tithe,
                $portfolio->taxes,
                $portfolio->others,
            ]);
        }

        $chart = $this->incomeHelper->nonPortfolioRecordChart($non_portfolios);

        return compact('income', 'non_portfolios', 'chart', 'backgrounds');
    }

    public function storeIncome($user, $request): bool
    {
        return IncomeHelper::addNewIncome($user, $request);
    }

    public function updateIncome($user, $request, int $id): Income
    {
        $income = Income::where('user_id', $user->id)->where('id', $id)->firstOrFail();

        if ($request->has('automated')) {
            $income->automated = $request->automated_rate ?? false;
        }
        if ($request->has('income_date')) {
            $income->income_date = $request->income_date;
        }
        if ($request->has('income_frequency')) {
            $income->income_frequency = $request->income_frequency;
        }

        $income->save();

        Wheel::updateIncomeTile($user);

        return $income;
    }

    public function updateIncomeRecord($user, $request, int $id): bool
    {
        $period = $request->record_period . '-01';
        return IncomeHelper::updateNonPeriodRecord($user, $period, $id, $request);
    }
}
