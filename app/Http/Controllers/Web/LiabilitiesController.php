<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\UserAudit as Audit;
use App\Http\Controllers\Controller;
use App\Helper\GapAccountCalculator as GapAccount;
use App\Helper\AnalyticsClass as SevenG;
use App\FinicialCalculator as Calculator;
use App\Helper\CalculatorClass;

use App\Helper\ArchiveAccount;
use App\Helper\GapExchangeHelper;
use App\Helper\GapExchangeHelper as Exchange;
use App\Helper\HelperClass;
use App\Helper\IncomeHelper;

use App\SevenG\BespokeKPI;
use App\Wheel\BespokeWheel;
use App\Wheel\LiabilityAccount as Liability;
use App\Wheel\MortgageAccount as Mortgage;
use App\SevenG\CreditFin as Credit;
use App\SevenG\DeptFin as Debt;

class LiabilitiesController extends Controller
{
    // Liaility

    public function liability(Request $request){
        $user = auth()->user();
        $header =  $request->get('header');
        $access =  $request->get('access');
        $account =  $request->get('account');
        $archive =  $request->get('archive');
        $kpi =  $request->get('kpi');
        $crd =  $request->get('crd');
        $alo =  $request->get('alo');

        $audit = Audit::where('user_id', $user->id)->select('is_allocated')->first();

        if($header){
           return ArchiveAccount::liabilityArchiveAction($user, $header, $access, $account,$kpi);
        }
        if($crd && $alo){
           $res =  GapExchangeHelper::submitAllocation($user, $crd, $alo);
           if($res){
               return redirect('/home/360/liability')->with(['success' => 'Credit Allocated Succesfully ']);
            }else{
               return redirect('/home/360/liability')->with(['error' => 'Error Allocating Credit']);
           }
        }

        $seveng = [];
        $isValid = SevenG::isSevenGVal($user);

        if($archive){
            $liabilities = Liability::where('user_id', $user->id)->where('isArchive', 1)->latest()->get();
            // $seveng = Liability::where('user_id', $user->id)->where('isArchive', 1)->where('credit_id', 1)->latest()->get();
        }else{
            $liabilities = Liability::where('user_id', $user->id)->where('isArchive', 0)->where('credit_id', 0)->latest()->get();
            $seveng = Liability::where('user_id', $user->id)->where('isArchive', 0)->where('credit_id', 1)->latest()->get();
        }

        $calculator = Calculator::where('user_id', $user->id)->first();
        $currency = explode(" ", $calculator->currency)[0];
        $user_currency = $calculator->currency;
        $currencies = HelperClass::popularCurrenciens();
        $equity_info = GapExchangeHelper::availabeleMortgages($user);
        $fin = CalculatorClass::finicial($user);
        $income_detail = IncomeHelper::analyseIncome($user, $fin['portfolio']);
        $net = GapAccount::netWorthVariable($user);
        $net_detail = GapAccount::calcNetWorth($user);
        $backgrounds = GapAccount::accountBackground();

        $liabilities_items = Liability::where('user_id', $user->id)->count();
        $credit = Credit::where('user_id', $user->id)->first();
        $credit = Exchange::switchToCreditAccount($credit, 'Credit', $calculator->currency);

        if($archive){
            $bespokes = Exchange::wheelKPIAccount($user, $calculator->currency, $archive)['liabilities'];
        }else{
            $bespokes = Exchange::wheelKPIAccount($user, $calculator->currency, $archive)['liabilities'];
        }
        $liabilities_detail = GapAccount::calcLiabilitiesAccount($liabilities, $user, $archive);
         // var_dump($seveng); return;
        $allocated = GapAccount::creditAllocated($user)['allocate'];
        $total_credit =  $credit->current - (int)$allocated;
        // if($total_credit <= 0) $total_credit = 0;
        foreach($seveng as $money){
            $money->currency = explode(' ',$money->account_currency)[0];
            $money->chart = GapAccount::liabilityDetailChart($money);
        }

        foreach($liabilities as $key => $money){
            $money->currency = explode(' ',$money->account_currency)[0];
            $money->chart = GapAccount::liabilityDetailChart($money);
        }

        foreach($bespokes as $money){
            $money->currency = explode(' ',$money->account_currency)[0];
            $money->chart = GapAccount::liabilityDetailChart($money);
        }

        return view('user.360.liabilities', compact('isValid','currency' , 'currencies','net_detail' ,'net','backgrounds','equity_info','income_detail','liabilities',
            'bespokes', 'total_credit','seveng','credit','liabilities_detail', 'audit','archive','user_currency'));
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeLiability(Request $request)
    {
        $user = auth()->user();

        $this->validate($request, [
            'lia_creditor' => 'required|max:20',
            'credit_type' => 'required',
            'currency' => 'required',
            'baseline' => 'required|integer|min:0',
            'current' => 'required|integer|min:0',
            'target_date' => 'nullable|date|after:today'
        ]);

        $calculator = Calculator::where('user_id', $user->id)->first();
        $liabilities_items = Liability::where('user_id', $user->id)->count();

        if ($liabilities_items <= 12) {
            $liability = new Liability();
            $liability->user_id = $user->id;
            $liability->automated = $request->automated_rate;
            $liability->creditor_name = $request->lia_creditor;
            $liability->account_type = $request->credit_type;
            $liability->account_details = $request->lia_detail;
            $liability->account_currency = $request->currency;
            $liability->baseline = $request->baseline;
            $liability->current = $request->current;
            $liability->interest_rate = $request->interest;
            $liability->periodical_pay = $request->period_pay;
            $liability->target_date = $request->target_date;
            $liability->isAnalytics = ($request->analytics == 'on') ? 1 : 0;
            if(strtolower($request->credit_type) == 'secured loans'
                    || strtolower($request->credit_type) == 'others'){
                        $liability->credit_id = 0;
            }else{
                $liability->credit_id = 1;
            }
            $liability->save();
            // if($request->snioj2isjdmniondcjnfc == "ajknsjkndjckndcjknjksdncjmdnc"){
            //     $credit = Credit::where('user_id', $user->id)->first();
            // $allocated = GapAccount::creditAllocated($user)['allocate'];
            //     $liability->isAnalytics = 0;
            //     $liability->account_currency = $calculator->currency;
            //     $total =  $credit->current - ((int)$allocated + (int)$request->current);

            //     if($total < 0){
            //        return redirect()->back()->with('error', 'You can not allocate more than your Credit Balance');
            //     }
            // }


            $myaccount = Liability::where('user_id', $user->id)->latest()->get();
            $account_items = Liability::where('user_id', $user->id)->count();
            $account_detail = GapAccount::calcLiabilitiesAccount($myaccount, $user);
            GapAccount::saveUpdatedTiles($user, 'liabilities', $account_items + 1, $account_detail['sum'] );

            return redirect('/home/360/liability')->with(['success' => 'New Liability Account saved successfully']);
        }else{
            return redirect('/home/360/liability')->with(['error' => "You can't add more than 12 Liability Account"]);
        }
    }

    public function updateLiability(Request $request, $id)
    {
        $user = auth()->user();
        $this->validate($request, [
            'sjnxjknsxkjnxijnsxknixncio' => 'required',
            'period_pay' => 'required|integer|min:0',
            'baseline' => 'required|integer|min:0',
            'current' => 'required|integer|min:0',
            'target_date' => 'nullable|date'
        ],[
            'sjnxjknsxkjnxijnsxknixncio.required' => 'Token required'
        ]);
        // if($request->pakmamkanknmjkmnzkmnjmnd  ){
        if($request->pakmamkank){
            $credit = Credit::where('user_id', $user->id)->first();
            $credit->creditor_name = $request->creditor;
            $credit->account_type = $request->credit_type;
            $credit->account_details = $request->lia_detail;
            // $credit->baseline = $request->baseline;
            // $credit->current = $request->current;
            $credit->interest_rate = $request->interest;
            $credit->periodical_pay = $request->period_pay;
            $credit->extra = $request->pay_strategy;
            $credit->target_date = $request->target_date;
            $credit->save();
        }elseif($request->aksnjknsjnsjnsxjxn){
            if($request->aksnjknsjnsjnsxjxn == "lapakoihangbshjbsxhgbxuhxbshxbxujahnzoazjmsozklnsz"){
                $bespoke = BespokeKPI::where('user_id', $user->id)->where('id', $request->sjnxjknsxkjnxijnsxknixncio)->first();
                $wheel = BespokeWheel::where('bespoke_id', $bespoke->id)->first();
                // return $wheel;
                if($bespoke){
                    $bespoke->kpi_details = $request->lia_detail;
                    $bespoke->baseline = $request->baseline;
                    $bespoke->current = $request->current;
                    if($request->paid_off) $bespoke->current = 0;
                    $bespoke->dept_interest = $request->interest;
                    $bespoke->extra = $request->pay_strategy;

                    $bespoke->isAnalytics = ($request->analytics == 'on') ? 1 : 0;
                    $wheel->account_alias = $request->alias;
                    $wheel->target_date = $request->target_date;
                    $wheel->periodical_pay = $request->period_pay;
                    $bespoke->save();
                    $wheel->save();
                }
            } else{
                return redirect('/home/360/liability')->with(['error' => 'Liability not found']);
            }
        }else{
            $liability = Liability::where('user_id', $user->id)->where('id', $request->sjnxjknsxkjnxijnsxknixncio)->first();
            if($liability){
                $liability->account_details = $request->lia_detail;
                $liability->automated = $request->automated_rate;
                $liability->baseline = $request->baseline;
                $liability->current = $request->current;
                if($request->paid_off) $liability->current = 0;
                $liability->interest_rate = $request->interest;
                $liability->periodical_pay = $request->period_pay;
                $liability->extra = $request->pay_strategy;
                $liability->target_date = $request->target_date;
                $liability->isAnalytics = ($request->analytics == 'on') ? 1 : 0;
                $liability->save();
            }
        }
        $myaccount = Liability::where('user_id', $user->id)->latest()->get();
        $account_items = Liability::where('user_id', $user->id)->count();
        $account_detail = GapAccount::calcLiabilitiesAccount($myaccount, $user);
        GapAccount::saveUpdatedTiles($user, 'liability', $account_items + 1, $account_detail['sum'] );
        return redirect('/home/360/liability')->with(['success' => 'Liability Information updated successfully']);
    }

    // Mortgage
    public function mortgage(Request $request){
        $user = auth()->user();
        $isValid = SevenG::isSevenGVal($user);

        $header =  $request->get('header');
        $access =  $request->get('access');
        $account =  $request->get('account');
        $archive =  $request->get('archive');

        if($header){
           return ArchiveAccount::mortgageArchiveAction($user, $header, $access, $account);
        }

        $fin = CalculatorClass::finicial($user);
        $income_detail = IncomeHelper::analyseIncome($user, $fin['portfolio']);
        $calculator = Calculator::where('user_id', $user->id)->first();
        $currency = explode(" ", $calculator->currency)[0];
        $currencies = HelperClass::popularCurrenciens();
        $equity_info = GapExchangeHelper::availabeleMortgages($user);

        if($archive){
            $mortgages = Mortgage::where('user_id', $user->id)->where('isArchive', 1)->latest()->get();
            $debt = Debt::where('user_id', $user->id)->where('isArchive', 1)->first();
        }else{
            $mortgages = Mortgage::where('user_id', $user->id)->where('isArchive', 0)->latest()->get();
            $debt = null;
        }

        $net = GapAccount::netWorthVariable($user);
        $net_detail = GapAccount::calcNetWorth($user);
        $backgrounds = GapAccount::accountBackground();
        $mortgages_items = Mortgage::where('user_id', $user->id)->where('isArchive', 0)->count();

        // Include SevenG
        $primary_resident = Mortgage::where('user_id', $user->id)->where('secured_against','Primary Residential Home')
                                ->where('isArchive', 0)->first();
        $primary_debt = Debt::where('user_id', $user->id)->first();

        if($primary_resident && $primary_debt->isArchive){
            $debt = null;
        }else{
            $debt = ($primary_debt->isArchive) ? $debt : $primary_debt;
            if($primary_debt->isArchive == 0 || isset($debt)) $debt = Exchange::switchToDebtAccount($debt, 'Debt', $calculator->currency);
        }
        $seveng = ($debt) ? [$debt]: [];

        $mortgages_detail = GapAccount::calcMortgagesAccount($mortgages, $user, $archive);

        foreach($mortgages as $money){
            $money->chart = GapAccount::mortgageDetailChart($money);
        }
        foreach($seveng as $money){
            $money->chart = GapAccount::mortgageDetailChart($money);
        }
        return view('user.360.mortgage', compact('isValid','currency','archive' , 'currencies','net_detail' ,'net','backgrounds',
                                    'mortgages','equity_info','income_detail', 'seveng', 'mortgages_detail'));
    }

    public function storeMortgage(Request $request)
    {
        $user = auth()->user();

        $this->validate($request, [
            // 'repay' => 'integer|min:0',
            'mor_creditor' => 'required|max:20',
            'mor_description' => 'required',
            'secure_against' => 'required',
            'open_bal' => 'required|integer|min:0',
            'cur_bal' => 'required|integer|min:0',
            'month_pay' => 'required|integer|min:0'
        ]);

        $mortgages_items = Mortgage::where('user_id', $user->id)->where('isArchive', 0)->count();

        if($mortgages_items <= 11){
            if ($request->secure_against == 'Primary Residential Home') {
                $primary_resident = Mortgage::where('user_id', $user->id)->where('secured_against','Primary Residential Home')
                                        ->where('isArchive', 0)->first();
                if($primary_resident)  return redirect('/home/360/mortgage')->with(['error' => "You can not have multiple Primary Residential Home"]);
            }
            $mortgage = new Mortgage();
            $mortgage->user_id = $user->id;
            $mortgage->creditor_name = $request->mor_creditor;
            $mortgage->description = $request->mor_description;
            $mortgage->secured_against = $request->secure_against;
            $mortgage->details = $request->detail;
            $mortgage->open_balance = $request->open_bal;
            $mortgage->current_balance = $request->cur_bal;
            $mortgage->monthly_pay = $request->month_pay;
            $mortgage->interest_rate = $request->interest;
            $mortgage->repayment_plan = $request->repay;

            $mortgage->isResidecial = $request->residential;
            $mortgage->isAnalytics = ($request->analytics == 'on') ? 1 : 0;
            // $mortgage->target_date = $request->target_date;
            // $mortgage->mortgage_paid = $request->repay;
            // $mortgage->repayment_plan = $request->repay;
            $mortgage->save();
            $myaccount = Mortgage::where('user_id', $user->id)->where('isArchive', 0)->latest()->get();
            $account_items = Mortgage::where('user_id', $user->id)->where('isArchive', 0)->count();
            $account_detail = GapAccount::calcMortgagesAccount($myaccount, $user);
            GapAccount::saveUpdatedTiles($user, 'mortgage', $account_items + 1, $account_detail['sum'] );

            return redirect('/home/360/mortgage')->with(['success' => 'New Mortgage Account saved successfully']);
        }else{
            return redirect('/home/360/mortgage')->with(['error' => "You can't add more than 12 Mortgage Account"]);
        }
    }

    public function updateMortgage(Request $request, $id) {
        $user = auth()->user();
        $this->validate($request, [
            'sjnxjknsxkjnxijnsxknixncio' => 'required',
            'open_balance' => 'required|integer|min:0',
            'current' => 'required|integer|min:0',
            'repayment' => 'required|integer|min:0'
        ], [
            'sjnxjknsxkjnxijnsxknixncio' => 'Token expired'
        ]);

        if($request->pakmamkanknmjkmnzkmnjmnd  ){
            $this->validate($request, ['creditor' => 'required|max:20']);
            $dept = Debt::where('user_id', $user->id)->first();
            $dept->details = $request->detail;
            $dept->baseline = $request->open_balance;
            $dept->current = $request->current;
            $dept->monthly_pay = $request->repayment;
            $dept->interest_rate = $request->interest;
            $dept->extra = $request->pay_strategy;
            $dept->target_date = $request->target_date;
            if($request->paid_off) $dept->current = 0;

            $dept->creditor_name = $request->creditor;
            $dept->description = $request->description;
            $dept->secured_against = $request->secure_against;
            $dept->save();
        }else{
            $mortgage = Mortgage::where('user_id', $user->id)->where('id', $request->sjnxjknsxkjnxijnsxknixncio)->first();
            $mortgage->details = $request->detail;
            $mortgage->open_balance = $request->open_balance;
            $mortgage->current_balance = $request->current;
            if($request->paid_off) $mortgage->current_balance = 0;
            $mortgage->monthly_pay = $request->repayment;
            $mortgage->interest_rate = $request->interest;
            $mortgage->extra = $request->pay_strategy;
            $mortgage->target_date = $request->target_date;
            $mortgage->save();
        }
        $myaccount = Mortgage::where('user_id', $user->id)->where('isArchive', 0)->latest()->get();
        $account_items = Mortgage::where('user_id', $user->id)->where('isArchive', 0)->count();
        $account_detail = GapAccount::calcMortgagesAccount($myaccount, $user);
        GapAccount::saveUpdatedTiles($user, 'mortgage', $account_items + 1, $account_detail['sum'] );
        // return;
        return redirect('/home/360/mortgage')->with(['success' => 'Mortgage Information updated successfully']);
    }

}
