<?php

namespace App\Services;

use App\Enums\PortfolioToken;
use App\Helpers\ArchiveAccount;
use App\Helpers\GapExchangeHelper;
use App\Helpers\GapAccountCalculator as GapAccount;
use App\FinicialCalculator as Calculator;
use App\SevenG\BespokeKPI;
use App\SevenG\CreditFin as Credit;
use App\SevenG\DeptFin as Debt;
use App\UserAudit as Audit;
use App\Helpers\GapExchangeHelper as Exchange;
use App\Wheel\BespokeWheel;
use App\Wheel\LiabilityAccount as Liability;
use App\Wheel\MortgageAccount as Mortgage;

class LiabilityService
{
    // =========================================================================
    // LIABILITIES — LIST
    // =========================================================================

    /**
     * Returns the full liability listing payload.
     * Handles archive actions and allocation submissions when params are set.
     *
     * @return array  ['action' => true, 'response' => JsonResponse]  — early-exit actions
     *                [full liability data]                           — normal list
     */
    public function getLiabilities($user, array $params): array
    {
        // Archive action
        if ($params['header']) {
            return [
                'action'   => true,
                'response' => ArchiveAccount::liabilityArchiveAction(
                    $user,
                    $params['header'],
                    $params['access'],
                    $params['account'],
                    $params['kpi']
                ),
            ];
        }

        // Allocation submission
        if ($params['crd'] && $params['alo']) {
            $res = GapExchangeHelper::submitAllocation($user, $params['crd'], $params['alo']);
            return ['action' => true, 'response' => response()->json(compact('res'))];
        }

        $archive    = $params['archive'];
        $audit      = Audit::where('user_id', $user->id)->select('is_allocated')->first();
        $calculator = Calculator::where('user_id', $user->id)->first();
        $seveng     = [];

        if ($archive) {
            $liabilities = Liability::where('user_id', $user->id)
                ->where('isArchive', 1)->latest()->get();

            $bespokes = Exchange::wheelKPIAccount($user, $calculator->currency, $archive)['liabilities'];
        } else {
            $liabilities = Liability::where('user_id', $user->id)
                ->where('isArchive', 0)->where('credit_id', 1)->latest()->get();

            $bespokes = Exchange::wheelKPIAccount($user, $calculator->currency, $archive)['liabilities'];

            $seveng = Liability::where('user_id', $user->id)
                ->where('credit_id', 1)->latest()->get();
        }

        $liabilities_items  = count($liabilities);
        $liabilities_detail = GapAccount::calcLiabilitiesAccount($liabilities, $user, $archive);

        $credit = Credit::where('user_id', $user->id)->first();
        $credit = Exchange::switchToCreditAccount($credit, 'Credit', $calculator->currency);

        // Attach currency and chart to each collection
        $collections = [$seveng, $liabilities, $bespokes];
        foreach ($collections as $collection) {
            foreach ($collection as $money) {
                $money->currency = explode(' ', $money->account_currency)[0];
                $money->chart    = GapAccount::liabilityDetailChart($money);

                if ($collection === $seveng && $money->account_currency != $calculator->currency) {
                    $money->isAnalytics    = 0;
                    $money->account_currency = $calculator->currency;
                }
            }
        }

        return compact(
            'audit', 'liabilities', 'liabilities_items',
            'liabilities_detail', 'seveng', 'bespokes', 'credit'
        );
    }

    // =========================================================================
    // LIABILITIES — STORE
    // =========================================================================

    public function storeLiability($user, $request): array
    {
        $calculator = Calculator::where('user_id', $user->id)->first();

        $liability                   = new Liability();
        $liability->user_id          = $user->id;
        $liability->automated        = $request->automated_rate;
        $liability->creditor_name    = $request->lcreditor;
        $liability->account_type     = $request->credit_type;
        $liability->account_details  = $request->lia_detail;
        $liability->account_currency = $request->currency;
        $liability->baseline         = $request->baseline;
        $liability->current          = $request->current;
        $liability->interest_rate    = $request->interest;
        $liability->periodical_pay   = $request->period_pay;
        $liability->target_date      = $request->target_date;
        $liability->isAnalytics      = ($request->analytics === 'true') ? 1 : 0;

        $creditless = ['secured loans', 'others'];
        $liability->credit_id = in_array(strtolower($request->credit_type), $creditless) ? 0 : 1;
        $liability->save();

        $this->refreshLiabilityTile($user);

        return ['liability' => $liability];
    }

    // =========================================================================
    // LIABILITIES — UPDATE
    // =========================================================================

    public function updateLiability($user, int $id, $request): bool
    {
        // SevenG Credit
        if ($request->seveng === PortfolioToken::SEVENG_CREDIT_TOKEN) {
            $credit                = Credit::where('user_id', $user->id)->first();
            $credit->creditor_name = $request->creditor;
            $credit->account_type  = $request->credit_type;
            $credit->account_details = $request->lia_detail;
            $credit->baseline      = $request->baseline;
            $credit->current       = $request->current;
            $credit->interest_rate = $request->interest;
            $credit->periodical_pay = $request->period_pay;
            $credit->extra         = $request->pay_strategy;
            $credit->isAnalytics   = ($request->analytics === 'true') ? 1 : 0;
            $credit->target_date   = $request->target_date;
            $credit->save();

        } elseif ($request->account === PortfolioToken::BESPOKE_LIABILITY_TOKEN) {
            // Bespoke Liability
            $bespoke = BespokeKPI::where('user_id', $user->id)->where('id', $request->bespoke)->firstOrFail();
            $wheel   = BespokeWheel::where('bespoke_id', $bespoke->id)->firstOrFail();

            $bespoke->kpi_details   = $request->lia_detail;
            $bespoke->baseline      = $request->baseline;
            $bespoke->current       = $request->paid_off ? 0 : $request->current;
            $bespoke->dept_interest = $request->interest;
            $bespoke->extra         = $request->pay_strategy;
            $bespoke->isAnalytics   = ($request->analytics === 'true') ? 1 : 0;

            $wheel->account_alias  = $request->alias;
            $wheel->target_date    = $request->target_date;
            $wheel->periodical_pay = $request->period_pay;

            $bespoke->save();
            $wheel->save();

        } else {
            // Standard Liability
            $liability = Liability::where('user_id', $user->id)->where('id', $id)->firstOrFail();

            $liability->account_details  = $request->lia_detail;
            $liability->automated        = $request->automated_rate;
            $liability->baseline         = $request->baseline;
            $liability->current          = $request->paid_off ? 0 : $request->current;
            $liability->interest_rate    = $request->interest;
            $liability->periodical_pay   = $request->period_pay;
            $liability->extra            = $request->pay_strategy;
            $liability->target_date      = $request->target_date;
            $liability->isAnalytics      = ($request->analytics === 'true') ? 1 : 0;
            $liability->save();
        }

        $this->refreshLiabilityTile($user);

        return true;
    }

    // =========================================================================
    // MORTGAGE — LIST
    // =========================================================================

    public function getMortgages($user, array $params): array
    {
        $header  = $params['header']  ?? null;
        $access  = $params['access']  ?? null;
        $account = $params['account'] ?? null;
        $archive = $params['archive'] ?? null;

        if ($header) {
            return [
                'action'   => true,
                'response' => ArchiveAccount::mortgageArchiveAction($user, $header, $access, $account),
            ];
        }

        $calculator = Calculator::where('user_id', $user->id)->first();
        $dept       = Debt::where('user_id', $user->id)->first();
        $dept       = Exchange::switchToDebtAccount($dept, 'Debt', $calculator->currency);
        $seveng     = [$dept];

        if ($archive) {
            $mortgages = Mortgage::where('user_id', $user->id)->where('isArchive', 1)->latest()->get();
        } else {
            $mortgages = Mortgage::where('user_id', $user->id)->where('isArchive', 0)->latest()->get();
        }

        $mortgages_detail = GapAccount::calcMortgagesAccount($mortgages, $user, $archive);

        foreach ($mortgages as $money) {
            $money->chart = GapAccount::mortgageDetailChart($money);
        }
        foreach ($seveng as $money) {
            $money->chart = GapAccount::mortgageDetailChart($money);
        }

        return compact('mortgages', 'mortgages_detail', 'seveng');
    }

    // =========================================================================
    // MORTGAGE — STORE
    // =========================================================================

    public function storeMortgage($user, $request): array
    {
        $mortgage                  = new Mortgage();
        $mortgage->user_id         = $user->id;
        $mortgage->creditor_name   = $request->creditor;
        $mortgage->description     = $request->description;
        $mortgage->secured_against = $request->secure_against;
        $mortgage->details         = $request->detail;
        $mortgage->open_balance    = $request->open_bal;
        $mortgage->current_balance = $request->current_bal;
        $mortgage->monthly_pay     = $request->month_pay;
        $mortgage->interest_rate   = $request->interest;
        $mortgage->repayment_plan  = $request->repay;
        $mortgage->isResidecial    = ($request->residential === 'Yes') ? 1 : 0;
        $mortgage->isAnalytics     = ($request->analytics === 'true') ? 1 : 0;
        $mortgage->save();

        $this->refreshMortgageTile($user);

        return ['mortgage' => $mortgage];
    }

    // =========================================================================
    // MORTGAGE — UPDATE
    // =========================================================================

    public function updateMortgage($user, int $id, $request): bool
    {
        if ($request->seveng === PortfolioToken::SEVENG_CREDIT_TOKEN) {
            $dept                  = Debt::where('user_id', $user->id)->firstOrFail();
            $dept->details         = $request->detail;
            $dept->baseline        = $request->open_balance;
            $dept->current         = $request->paid_off ? 0 : $request->current;
            $dept->monthly_pay     = $request->repayment;
            $dept->interest_rate   = $request->interest;
            $dept->extra           = $request->pay_strategy;
            $dept->target_date     = $request->target_date;
            $dept->creditor_name   = $request->creditor_name;
            $dept->description     = $request->description;
            $dept->secured_against = $request->secured_against;
            $dept->save();
        } else {
            $mortgage                  = Mortgage::where('user_id', $user->id)->where('id', $id)->firstOrFail();
            $mortgage->details         = $request->description;
            $mortgage->open_balance    = $request->open_balance;
            $mortgage->current_balance = $request->paid_off ? 0 : $request->current;
            $mortgage->monthly_pay     = $request->repayment;
            $mortgage->interest_rate   = $request->interest;
            $mortgage->extra           = $request->pay_strategy;
            $mortgage->target_date     = $request->target_date;
            $mortgage->save();
        }

        $this->refreshMortgageTile($user);

        return true;
    }

    // =========================================================================
    // PRIVATE TILE REFRESH HELPERS
    // =========================================================================

    private function refreshLiabilityTile($user): void
    {
        $myaccount      = Liability::where('user_id', $user->id)->latest()->get();
        $account_items  = Liability::where('user_id', $user->id)->count();
        $account_detail = GapAccount::calcLiabilitiesAccount($myaccount, $user);
        GapAccount::saveUpdatedTiles($user, 'liabilities', $account_items + 1, $account_detail['sum']);
    }

    private function refreshMortgageTile($user): void
    {
        $myaccount      = Mortgage::where('user_id', $user->id)->latest()->get();
        $account_items  = Mortgage::where('user_id', $user->id)->count();
        $account_detail = GapAccount::calcMortgagesAccount($myaccount, $user);
        GapAccount::saveUpdatedTiles($user, 'mortgage', $account_items + 1, $account_detail['sum']);
    }
}
