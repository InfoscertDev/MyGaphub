<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Wheel\LiabilityAccount as Liability;
use App\Wheel\MortgageAccount as Mortgage;
use App\Wheel\HomeEquity;
use App\Helper\GapAccountCalculator as GapAccount;
use App\FinicialCalculator as Calculator;

use App\SevenG\CreditFin as Credit;
use App\SevenG\DeptFin as Debt;
use App\Helper\GapExchangeHelper;
use App\Helper\ArchiveAccount;
use App\SevenG\BespokeKPI;
use App\UserAudit as Audit;
use App\Helper\GapExchangeHelper as Exchange;
use App\Wheel\BespokeWheel;

class LiabilitiesApi extends Controller
{
    
    public function storeLiability(Request $request)
    { 
        $user = $request->user();
        $validator = Validator::make($request->all(), [
            'lcreditor' => 'required|max:50',
            'credit_type' => 'required',
            'currency' => 'required',
            // 'period_pay' => 'required|integer|min:0',
            'baseline' => 'required|integer|min:0',
            'current' => 'required|integer|min:0',
            'target_date' => 'date|after:today'
        ]);  

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $calculator = Calculator::where('user_id', $user->id)->first();
        $liability = new Liability();
        $liability->user_id = $user->id;
        $liability->automated = $request->automated_rate;
        $liability->creditor_name = $request->lcreditor;
        $liability->account_type = $request->credit_type;
        $liability->account_details = $request->lia_detail;
        $liability->account_currency = $request->currency;
        $liability->baseline = $request->baseline;
        $liability->current = $request->current;
        $liability->interest_rate = $request->interest;
        $liability->periodical_pay = $request->period_pay;
        $liability->target_date = $request->target_date;
        $liability->isAnalytics = ($request->analytics == 'true') ? 1 : 0;
        if(strtolower($request->credit_type) == 'secured loans' 
                    || strtolower($request->credit_type) == 'others'){
            $liability->credit_id = 0; 
        }else{
            $liability->credit_id = 1; 
        }
        $liability->save(); 
        $success = true;

        $myaccount = Liability::where('user_id', $user->id)->latest()->get();
        $account_items = Liability::where('user_id', $user->id)->count();
        $account_detail = GapAccount::calcLiabilitiesAccount($myaccount, $user);
        GapAccount::saveUpdatedTiles($user, 'liabilities', $account_items + 1, $account_detail['sum'] );

        return response()->json(compact('success', 'liability'));
    }

    public function updateLiability(Request $request, $id){
        $user = $request->user();
        $validator = Validator::make($request->all(),[
            'period_pay' => 'required|integer|min:0',
            'baseline' => 'required|integer|min:0',
            'current' => 'required|integer|min:0',
            'interest' => 'required|numeric',
            'target_date' => 'nullable|date'
        ]);
 
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        } 
        // info(['Rewach',  $id,$request->seveng, $request->account]);
        // Credit Liability 
        if($request->seveng == 'pakmamkanknmjkmnzkmnjmnd'){
            $credit = Credit::where('user_id', $user->id)->first();
            $credit->creditor_name = $request->creditor;
            $credit->account_type = $request->credit_type;
            $credit->account_details = $request->lia_detail;
            $credit->baseline = $request->baseline;
            $credit->current = $request->current;
            $credit->interest_rate = $request->interest;
            $credit->periodical_pay = $request->period_pay;
            $credit->extra = $request->pay_strategy;  
            $credit->isAnalytics =  ($request->analytics == 'true') ? 1 : 0;
            $credit->target_date = $request->target_date;
            $credit->save(); 
        }elseif($request->account){
            // Bespoke Liability
            if($request->account = "lapakoihangbshjbsxhgbxuhxbshxbxujahnzoazjmsozklnsz"){
                $bespoke = BespokeKPI::where('user_id', $user->id)->where('id', $request->bespoke)->first();
                $wheel = BespokeWheel::where('bespoke_id', $bespoke->id)->first();
                if($bespoke){
                    $bespoke->kpi_details = $request->lia_detail;
                    $bespoke->baseline = $request->baseline;
                    $bespoke->current = $request->current;
                    if($request->paid_off) $bespoke->current = 0;
                    $bespoke->dept_interest = $request->interest; 
                    $bespoke->extra = $request->pay_strategy; 
                     
                    $bespoke->isAnalytics =  ($request->analytics == 'true') ? 1 : 0;  
                    $wheel->account_alias = $request->alias;
                    $wheel->target_date = $request->target_date;
                    $wheel->periodical_pay = $request->period_pay;
                    $bespoke->save();
                    $wheel->save();
                } 
            } else{
                return response()->json(['error' => 'Liability not found']);
            } 
        }else{ 
            // Liability Account
            $liability = Liability::where('user_id', $user->id)->where('id', $id)->first();
            
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
                $liability->isAnalytics =  ($request->analytics == 'true') ? 1 : 0;
                $liability->save(); 

            }else{ 
                return response()->json(['error' => 'Liability not found']);
            }
        }
        $success = 'Liability Information updated successfully';

        $myaccount = Liability::where('user_id', $user->id)->latest()->get();
        $account_items = Liability::where('user_id', $user->id)->count();
        $account_detail = GapAccount::calcLiabilitiesAccount($myaccount, $user);
        GapAccount::saveUpdatedTiles($user, 'liabilities', $account_items + 1, $account_detail['sum'] );

        return response()->json(compact('success'));
    } 

    public function liability(Request $request){
        $user = $request->user(); 
        $archive =  $request->get('archive');
        $header =  $request->get('header');
        $access =  $request->get('access');
        $account =  $request->get('account');
        $archive =  $request->get('archive');
        $kpi =  $request->get('kpi');
        $crd =  $request->get('crd');
        $alo =  $request->get('alo');

        if($header){
           return ArchiveAccount::liabilityArchiveAction($user, $header, $access, $account,$kpi);
        }
        
        if($crd && $alo){
            $res =  GapExchangeHelper::submitAllocation($user, $crd, $alo);
            return response()->json(compact('res'));
        }
        $seveng = []; 
        $audit = Audit::where('user_id', $user->id)->select('is_allocated')->first();
        if($archive){
            $liabilities = Liability::where('user_id', $user->id)->where('isArchive', 1)->latest()->get();
        } else{
            $liabilities = Liability::where('user_id', $user->id)->where('isArchive', 0)->where('credit_id', 0)->latest()->get();
            $seveng = Liability::where('user_id', $user->id)->where('credit_id', 1)->latest()->get(); 
        } 
       
        $liabilities_items = Liability::where('user_id', $user->id)->count();
        $liabilities_detail = GapAccount::calcLiabilitiesAccount($liabilities, $user, $archive, $seveng);
        
        $calculator = Calculator::where('user_id', $user->id)->first();
        $credit = Credit::where('user_id', $user->id)->first();
        $credit = Exchange::switchToCreditAccount($credit, 'Credit', $calculator->currency);
       
        if($archive){
            $bespokes = Exchange::wheelKPIAccount($user, $calculator->currency, $archive)['liabilities'];
        }else{
            $bespokes = Exchange::wheelKPIAccount($user, $calculator->currency, $archive)['liabilities'];
        }
        foreach($seveng as $money){
            $money->currency = explode(' ',$money->account_currency)[0]; 
            $money->chart = GapAccount::liabilityDetailChart($money);
            // Repair Credit Allocation 
            if($money->account_currency != $calculator->currency){
                $money->isAnalytics = 0;
                $money->account_currency = $calculator->currency;
                // $money->save();
            } 
        } 
        foreach($liabilities as $money){
            $money->currency = explode(' ',$money->account_currency)[0]; 
            $money->chart = GapAccount::liabilityDetailChart($money);
        } foreach($bespokes as $money){
            $money->currency = explode(' ',$money->account_currency)[0]; 
            $money->chart = GapAccount::liabilityDetailChart($money);
        } 
       
        return response()->json(compact('audit','archive','liabilities','liabilities_detail','seveng','bespokes','credit'));
    }
    
    public function storeMortgage(Request $request)
    {
        $user = $request->user();
        $validator = Validator::make($request->all(), [
            'creditor' => 'required|max:50',
            'description' => 'required',
            'secure_against' => 'required',
            'open_bal' => 'required|integer|min:0',
            'current_bal' => 'required|integer|min:0',
            'interest' => 'required|integer',
            'month_pay' => 'required|integer|min:0'
        ]);  
 
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $mortgage = new Mortgage();
        $mortgage->user_id = $user->id;
        $mortgage->creditor_name = $request->creditor;
        $mortgage->description = $request->description;
        $mortgage->secured_against = $request->secure_against;
        $mortgage->details = $request->detail;
        $mortgage->open_balance = $request->open_bal;
        $mortgage->current_balance = $request->current_bal;
        $mortgage->monthly_pay = $request->month_pay;
        $mortgage->interest_rate = $request->interest;
        $mortgage->repayment_plan = $request->repay;
        
        $mortgage->isResidecial = ($request->residential == 'Yes') ? 1: 0;
        $mortgage->isAnalytics = ($request->analytics == 'true') ? 1 : 0;
        // $mortgage->target_date = $request->target_date;
        // $mortgage->mortgage_paid = $request->repay;
        // $mortgage->repayment_plan = $request->repay;
        $success = true;
        $mortgage->save();
        $myaccount = Mortgage::where('user_id', $user->id)->latest()->get();
        $account_items = Mortgage::where('user_id', $user->id)->count();
        $account_detail = GapAccount::calcMortgagesAccount($myaccount, $user);
        GapAccount::saveUpdatedTiles($user, 'mortgage', $account_items + 1, $account_detail['sum'] );

        return response()->json(compact('success', 'mortgage'));
    } 

    public function updateMortgage(Request $request, $id){
        $user = $request->user();
        $validator = Validator::make($request->all(),[
            'open_balance' => 'required|integer|min:0',
            'current' => 'required|integer|min:0',
            'repayment' => 'required|integer|min:0'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        
        if($request->seveng == 'pakmamkanknmjkmnzkmnjmnd'){
            $dept = Debt::where('user_id', $user->id)->first();
            $dept->details = $request->detail;
            $dept->baseline = $request->open_balance;
            $dept->current = $request->current;
            $dept->monthly_pay = $request->repayment; 
            $dept->interest_rate = $request->interest;
            $dept->extra = $request->pay_strategy;
            $dept->target_date = $request->target_date;
            if($request->paid_off) $dept->current = 0;

            $dept->creditor_name = $request->creditor_name;
            $dept->description = $request->description;
            $dept->secured_against = $request->secured_against;
            $dept->save(); 
        }else{ 
            $mortgage = Mortgage::where('user_id', $user->id)->where('id', $id)->first();
            $mortgage->details = $request->description;
            $mortgage->open_balance = $request->open_balance;
            $mortgage->current_balance = $request->current;
            if($request->paid_off) $mortgage->current_balance = 0;
            $mortgage->monthly_pay = $request->repayment;
            $mortgage->interest_rate = $request->interest;
            $mortgage->extra = $request->pay_strategy;
            $mortgage->target_date = $request->target_date;
            $mortgage->save(); 
        }
        $success = 'Mortgage Information updated successfully';
        $myaccount = Mortgage::where('user_id', $user->id)->latest()->get();
        $account_items = Mortgage::where('user_id', $user->id)->count();
        $account_detail = GapAccount::calcMortgagesAccount($myaccount, $user);
        GapAccount::saveUpdatedTiles($user, 'mortgage', $account_items + 1, $account_detail['sum'] );
        return response()->json(compact('success'));
    }
    
    public function mortgage(Request $request){
        $user = $request->user(); 
        $header =  $request->get('header');
        $access =  $request->get('access');
        $account =  $request->get('account');
        $archive =  $request->get('archive');
        if($header){
           return ArchiveAccount::mortgageArchiveAction($user, $header, $access, $account);
        }
        $mortgages = Mortgage::where('user_id', $user->id)->latest()->get();
        if($archive){
            $mortgages = Mortgage::where('user_id', $user->id)->where('isArchive', 1)->latest()->get();
            $debt = Debt::where('user_id', $user->id)->where('isArchive', 1)->first();
        }else{
            $mortgages = Mortgage::where('user_id', $user->id)->where('isArchive', 0)->latest()->get();
            $debt = null;
        }
        $mortgages_items = Mortgage::where('user_id', $user->id)->count();
         // Include SevenG
        $primary_resident = Mortgage::where('user_id', $user->id)->where('secured_against','Primary Residential Home')
                                ->where('isArchive', 0)->first();
        $primary_debt = Debt::where('user_id', $user->id)->first();

        if($primary_resident && $primary_debt->isArchive){
            $debt = null;
        }else{ 
            $debt = ($primary_debt->isArchive) ? $debt : $primary_debt;
            $calculator = Calculator::where('user_id', $user->id)->first();
            if($primary_debt->isArchive == 0 || isset($debt)) $debt = Exchange::switchToDebtAccount($debt, 'Debt', $calculator->currency);
        } 
        $seveng = ($debt) ? [$debt]: []; 

        $mortgages_detail = GapAccount::calcMortgagesAccount($mortgages, $user, $archive);
        
        $calculator = Calculator::where('user_id', $user->id)->first();
        $dept = Debt::where('user_id', $user->id)->first();
        $dept = Exchange::switchToDebtAccount($dept, 'Debt', $calculator->currency);
        $seveng = [$dept];
        
       
        foreach($mortgages as $money){
            $money->chart = GapAccount::mortgageDetailChart($money);
        }
        foreach($seveng as $money){
            $money->chart = GapAccount::mortgageDetailChart($money);
        }  
        return response()->json(compact('mortgages','mortgages_detail', 'seveng'));
    }
}
