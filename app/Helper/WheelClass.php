<?php

namespace App\Helper;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Wheel\HomeEquity;
use App\Wheel\CashAccount as Cash;
use App\Wheel\LiabilityAccount as Liability;
use App\Wheel\MortgageAccount as Mortgage;
use App\Wheel\ProtectionAccount as Protection;
use App\Wheel\IncomeAccount as Income;
use App\Helper\GapAccountCalculator as GapAccount;

use App\DiscretionaryBudget as Philantrophy;
use App\SevenG\GrandFin as Grand;

use App\FinicialCalculator as Calculator;
use App\SevenG\CreditFin as Credit;
use App\SevenG\DeptFin as Debt;
use App\Wheel\PensionAccount as Pension;
class WheelClass extends Controller
{
    // This Class manage wheel update and Interactions

    public static function updateCashTile($user){
        $mycash = Cash::where('user_id', $user->id)->where('isArchive', 0)->latest()->get();
        $cash_items = Cash::where('user_id', $user->id)->count();
        $cash_detail = GapAccount::calcCashAccount($mycash, $user);
        GapAccount::saveUpdatedTiles($user, 'cash', $cash_items + 3, $cash_detail['sum'] );
    }

    public static function updateLiabilityTile($user, $credit = 0){
        $myaccount = Liability::where('user_id', $user->id)->where('isArchive', 0)->latest()->get();
        $account_items = Liability::where('user_id', $user->id)->count();
        $account_detail = GapAccount::calcLiabilitiesAccount($myaccount, $user);
        if($credit){
            $credit = Credit::where('user_id', $user->id)->first();
            $allocated = GapAccount::creditAllocated($user)['allocate'];
            $credit->current = $allocated;
            $credit->save();
        }
        GapAccount::saveUpdatedTiles($user, 'liabilities', $account_items + 1, $account_detail['sum'] );
    }

    public static function updateMortgageTile($user){
        $myaccount = Mortgage::where('user_id', $user->id)->where('isArchive', 0)->latest()->get();
        $account_items = Mortgage::where('user_id', $user->id)->count();
        $account_detail = GapAccount::calcMortgagesAccount($myaccount, $user);
        GapAccount::saveUpdatedTiles($user, 'mortgage', $account_items + 1, $account_detail['sum'] );
    }

    public static function updateIncomeTile($user, $isUpdate = true){
        $myaccount = Income::where('user_id', $user->id)->where('isArchive', 0)->latest()->get();
        $account_items = Income::where('user_id', $user->id)->count();
        $account_detail = GapAccount::calcIncomeAccount($user, $myaccount);
        $fin = CalculatorClass::finicial($user);  
        $income_detail = IncomeHelper::analyseIncome($user,$fin['portfolio']);
        $calculator = Calculator::where('user_id', $user->id)->first();
        if($isUpdate){
            if($income_detail['portfolio_diff'] < 0){
                $calculator->other_income = $income_detail['income_portfolio'];
                $calculator->save();
            } 
        }else{ 
            $calculator->other_income = $income_detail['income_portfolio'];
            $calculator->save();
        }
        GapAccount::saveUpdatedTiles($user, 'income', $account_items, $account_detail['sum'] );
    }
    
    public static function equityDetails($user){
        $equity = HomeEquity::where('user_id', $user->id)->where('isArchive', 0)->latest()->get();
        $equity_items = HomeEquity::where('user_id', $user->id)->count();
        $equity_detail = GapAccount::calcEquityAccount($equity);
        foreach ($equity as $eq) {
           $eq->mortgage;
           $eq->equity =  $eq->market_value -  ($eq->mortgage ? $eq->mortgage->current_balance : 0);
           $eq->ownership = round($eq->equity / (($eq->market_value  > 0) ? $eq->market_value : 1)) * 100;
           $eq->chart = [ 'labels' => ['Mortgage', 'Home Equity'], 
                        'values' => [($eq->mortgage ? $eq->mortgage->current_balance : 0), $eq->equity ] ];
        } 
        $backgrounds = GapAccount::accountBackground();
        return compact('backgrounds','equity','equity_detail');
    }

    public static function primaryEquityDetails($user){
        $debt = Debt::where('user_id', $user->id)->first();
        $primary = null;
        if(isset($debt->equity_id)){
            $primary = HomeEquity::find($debt->equity_id);
            if($primary){
                $primary->mortgage;
                $primary->equity =  $primary->market_value -  ($primary->mortgage ? $primary->mortgage->current_balance : 0);
                $primary->ownership = round(($primary->equity /  (($primary->market_value  > 0) ? $primary->market_value : 1)) * 100);
                $total = $primary->equity + $primary->market_value; 
                $primary->per_mortgage = round((($primary->mortgage ? $primary->mortgage->current_balance : 0) / $primary->market_value) * 100);
                $primary->chart = [ 'labels' => ['Mortgage', 'Home Equity'], 
                             'values' => [$primary->per_mortgage, $primary->ownership ] ];
            }
        } 
        return compact('primary');
    }
    public static function updateProtectionTile($user){
        $myaccount = Protection::where('user_id', $user->id)->where('isArchive', 0)->latest()->get();
        $account_items = Protection::where('user_id', $user->id)->count();
        $account_detail = GapAccount::calcProtectionAccount($myaccount, $user);
        GapAccount::saveUpdatedTiles($user, 'protection', $account_items, $account_detail['sum'] );
    }

    public static function updatePensionTile($user){
        $myaccount = Pension::where('user_id', $user->id)->where('isArchive', 0)->latest()->get();
        $account_items = Pension::where('user_id', $user->id)->count();
        $account_detail = GapAccount::calcPensionAccount($myaccount, $user);
        GapAccount::saveUpdatedTiles($user, 'retirement', $account_items, $account_detail['sum'] );
    }

    public static function updateGivingTile($user){
        $myaccount  = Philantrophy::where('user_id', $user->id)->first();
        $account_items = Grand::where('user_id', $user->id)->count();
        $account_detail = GapAccount::calcPhilantrophy($myaccount, $user);
        GapAccount::saveUpdatedTiles($user, 'philanthropy', $account_items, $account_detail['sum'] );
    }
}
 