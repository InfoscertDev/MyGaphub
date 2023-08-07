<?php

namespace App\Helper;

use App\Wheel\HomeEquity;
use App\UserAudit as Audit;
use App\UserAudit;
use App\Wheel\LiabilityAccount as Liability;
use App\Wheel\MortgageAccount as Mortgage;
use App\Wheel\PensionAccount as Pension;
use Carbon\Carbon;
use App\DiscretionaryBudget as Philantrophy;
use App\SevenG\AlphaFin as Alpha;
use App\SevenG\BetaFin as Beta;
use App\SevenG\CreditFin as Credit;
use App\SevenG\DeptFin as Dept;
use App\SevenG\EducationFin as Education;
use App\Helper\CalculatorClass as Fin;
use App\SevenG\BespokeKPI;
use App\Wheel\CashAccount as Cash;
use App\Helper\AllocationHelpers;

class GapAccountCalculator
{
    // private static $archive =  Input::get('archive');

    public static function calcCashAccount($cash, $user, $archive = false, $convert = true){
        $alpha = Alpha::where('user_id', $user->id)->first();
        $beta = Beta::where('user_id', $user->id)->first();
        $education = Education::where('user_id', $user->id)->first();

        $seveng = [$alpha, $beta, $education];
        $labels = ['Alpha', 'Beta', 'Education'];

        $values = []; $sum = [];
        if ($archive) {
            $labels = [];
            $seveng = [];
            $bespokes = BespokeKPI::where('user_id', $user->id)->where('isArchive', 1)->latest()->limit(7)->get();
        } else {
            $bespokes = BespokeKPI::where('user_id', $user->id)->where('isArchive', 0)->latest()->limit(7)->get();
        }

        // SevenG  and Bespoke
        foreach($seveng as $money){
            array_push($values,  $money->current);
            array_push($sum,  $money->current);
        }
        foreach($bespokes as $bespoke){
            if($bespoke->bespoke_type == 'saveup'){
                array_push($labels,  $bespoke->kpi_name);
                array_push($values,  $bespoke->current);
                array_push($sum,  $bespoke->current);
            }
        }

        foreach($cash as $money){
            if($convert){}
            $current = GapExchangeHelper::convert_currency($user,
                            $money->account_currency,$money->current, $money->automated
            );
            array_push($values,$current);
            // array_push($sum,$current);
        }
        $sum = array_sum($values);
        $percentages = [];
        foreach($values as $money){
            array_push($percentages, round(($money / ($sum ? $sum : 1)) * 100));
        }
        // Add Cash Labels
        foreach($cash as $money){
            array_push($labels, $money->account_name);
        }
        // $sum = array_sum($convert_sum);
        // var_dump(count($labels), count($values), count($percentages),'</br>');
        return compact('sum', 'labels', 'values', 'percentages' );
    }

    public static function initCashAccount($cash){
        foreach($cash as $money){
            return $money->currency = explode($money->account_currency, ' ')[0];
        }
        return $cash;
    }

    public static function calcAssetAccount($user,$cash, $equity){

        $percentages = [];
        $labels = ['Investments', 'Cash', 'Pension','Home Equity'];
        $funds = PortfolioHelper::investmentFunds($user);
        $cash_detail = GapAccountCalculator::calcCashAccount($cash, $user);

        $retirement = Pension::where('user_id', $user->id)->where('isArchive', 0)->latest()->get();
        $equ_detail = GapAccountCalculator::calcEquityAccount($equity);
        $pension_detail = GapAccountCalculator::calcPensionAccount($retirement);
        $pension = $pension_detail['sum'];
        $equity =  $equ_detail['sum'];

        $values = [ $funds['investment'], $cash_detail['sum'], $pension, $equity ];

        $sum = array_sum([$funds['investment'], $cash_detail['sum']]);

        foreach($values as $money){
            array_push($percentages, round(($money / ($sum ? $sum : 1)) * 100));
        }

        return compact('sum', 'labels', 'values', 'percentages', 'pension', 'equity' );
    }

    public static function calcMortgagesAccount($accounts, $user, $archive = false, $convert = true){
        $values = []; $labels = [];
        $seveng = [];
        $debt = Dept::where('user_id', $user->id)->where('isArchive', 0)->first();
        if($debt){
            array_push($labels, 'Debt');
            array_push($seveng, $debt);
        }
        if ($archive) {
            $bespokes = []; $labels = [];
            $seveng = [];
        }
        foreach($seveng as $money){
            array_push($values,  $money->current);
        }
        foreach($accounts as $account){
            if($convert){ }
            array_push($values, $account->current_balance);
        }
        $sum = array_sum($values);
        $percentages = [];
        foreach($seveng as $money){
            array_push($percentages, round(($money->current / ($sum ? $sum : 1)) * 100));
        }
        foreach($accounts as $account){
            array_push($percentages,round(($account->current_balance / ($sum ? $sum : 1)) * 100));
        }
        // Add Mortgage Labels
        foreach($accounts as $account){
            array_push($labels, $account->creditor_name);
        }

        return compact('sum', 'labels', 'values', 'percentages' );
    }

    public static function calcLiabilitiesAccount($accounts, $user, $archive = false, $seveng = []){
        $values = []; $labels = [];
        $sum  = [];
        $user_baseline = [];
        $user_current = [];
        if ($archive) {
           $bespokes = BespokeKPI::where('user_id', $user->id)->where('isArchive', 1)->latest()->limit(7)->get();
        } else {
           $bespokes = BespokeKPI::where('user_id', $user->id)->where('isArchive', 0)->latest()->limit(7)->get();
        }
        // var_dump( 'CK <br/>'. count($seveng) ) ;
        foreach($seveng as $money){
            $current = GapExchangeHelper::convert_currency($user, $money->account_currency,$money->current, $money->automated);
            array_push($labels,  $money->creditor_name);
            array_push($values,  $current);
            $baseline = GapExchangeHelper::convert_currency($user, $money->account_currency,$money->baseline, $money->automated);
            array_push($user_current, $current);
            array_push($user_baseline, $baseline);
        }
        foreach($bespokes as $bespoke){
            if($bespoke->bespoke_type == 'dept'){
                array_push($labels,  $bespoke->kpi_name);
                array_push($values,  $bespoke->current);
                array_push($sum,$bespoke->current);
            }
        }
        foreach($accounts as $account){
            $current = GapExchangeHelper::convert_currency($user, $account->account_currency,$account->current, $account->automated);
            array_push($values, $current);
        }
        $sum = array_sum($values);
        $percentages = [];
        foreach($values as $money){
                array_push($percentages, round(($money / ($sum ? $sum : 1)) * 100));
        }
        // Add Liabilites Labels
        foreach($accounts as $account){
            array_push($labels, $account->creditor_name);
        }
        $user_current = array_sum($user_current);
        $user_baseline = array_sum($user_baseline);

        return compact('sum', 'labels', 'values', 'percentages', 'user_current', 'user_baseline' );
    }

    public static function netWorthVariable($user){
        $mortgages = Mortgage::where('user_id', $user->id)->where('isArchive', 0)->get();
        $liability = Liability::where('user_id', $user->id)->where('isArchive', 0)->get();
        $equity = HomeEquity::where('user_id', $user->id)->where('isArchive', 0)->get();
        $cash = Cash::where('user_id', $user->id)->where('isArchive', 0)->get();
        $retirement = Pension::where('user_id', $user->id)->where('isArchive', 0)->latest()->get();

        $funds = PortfolioHelper::investmentFunds($user);

        $mort_act = GapAccountCalculator::calcMortgagesAccount($mortgages, $user);
        $lia_act= GapAccountCalculator::calcLiabilitiesAccount($liability, $user);
        $equ_act = GapAccountCalculator::calcEquityAccount($equity);
        $cash_act = GapAccountCalculator::calcCashAccount($cash, $user);
        $pension_act = GapAccountCalculator::calcPensionAccount($retirement);

        $current_asset = $cash_act['sum'] +  $funds['investment'] ;

        return [
                'mortgage' => $mort_act['sum'], 'liability' => $lia_act['sum'],
                'equity' => $equ_act['sum'],  'pension' => $pension_act['sum'],
                'home' => $equ_act['home'], 'asset' => $current_asset
        ];
    }

    public static function calcNetWorth($user){
        $networth = GapAccountCalculator::netWorthVariable($user);

        $funds = PortfolioHelper::investmentFunds($user);
        $liability = (int)$networth['liability'];
        $mortgage = (int)$networth['mortgage'];
        $home = (int)$networth['home'];
        $pension = (int)$networth['pension'];

        $asset =  (int)$networth['asset'] + $pension;

        $equity = $home - $mortgage;
        $sum = ($asset)  - ($liability);

        $labels = ['Assets', 'Liabilities', 'Pensions', 'Home Equity'];
        $values = [$asset, $liability, $pension, $equity];
        return compact('sum', 'labels', 'values', 'equity', 'liability', 'pension','asset');
    }

    public static function homeNetWorth($user){
        $networth = GapAccountCalculator::netWorthVariable($user);
        $liability = (int)$networth['liability'];
        $pension = (int)$networth['pension'];
        $equity = (int)$networth['equity'];
        $funds = PortfolioHelper::investmentFunds($user); ;

        $asset =  array_sum([$networth['asset'], $pension, $equity]);
        $sum = ($asset)  - ($liability);
        // var_dump($equity);
        $labels = ['Assets', 'Liabilities'];
        $values = [$asset, $liability];
        return compact('sum','labels', 'values');
    }

    public static function calcEquityAccount($accounts){
        $values = []; $labels = [];  $homes = [];
        foreach($accounts as $account){
            array_push($values, $account->market_value - ($account->mortgage ? $account->mortgage->current_balance : 0));
            // array_push($values, 0);
        }
        foreach($accounts as $account){
            array_push($homes, $account->market_value);
        }
        foreach($accounts as $account){
            array_push($labels, str_limit($account->location, 25));
        }
        $sum = array_sum($values);

        $percentages = [];
        foreach($accounts as $account){
            $eq =  $account->market_value - ($account->mortgage ? $account->mortgage->current_balance : 0);
            array_push($percentages, round(($eq / ($sum ? $sum : 1)) * 100) );
        }

        $home = array_sum($homes);
        return compact('sum', 'labels', 'values', 'percentages', 'home' );
    }

    public static function calcProtectionAccount($accounts){
        $values = []; $labels = [];  $premium = [];
        foreach($accounts as $account){
            array_push($values,  $account->premium_pay);
            array_push($premium,  $account->sum_assured);
            array_push($labels, $account->protection_category);
        }
        $sum = array_sum($premium);
        $percentages = [];
        $total = array_sum($values);
        foreach($accounts as $account){
            array_push($percentages,  round(($account->premium_pay / ($total ? $total : 1)) * 100));
        }
        return compact('sum', 'labels', 'values', 'percentages' );
    }

    public static function calcRoiInvestment($improve){
        $exp = ($improve['monthly_asset'] * 12 ) * 100 ;
        $shortfall = $improve['monthly_asset'] - $improve['portfolio'];
        $asset_require = (($shortfall * 12) * 100) / ($improve['roce'] ? $improve['roce'] : 1) ;
        $time_finiancial = ($asset_require / ($improve['investment'] ? $improve['investment'] : 1) ) / 12 ;
        // $time_finiancial = number_format((int)$time_finiancial, 0);
        $invest = $exp / ($improve['roce'] ? $improve['roce'] : 1);

        return compact('shortfall', 'asset_require', 'time_finiancial', 'invest');
    }

    public static function pensionPOT($pensions, $dob,$average_seed){
             // Year of Birth
        $yob  = date('Y', strtotime($dob));
        $current_year = date('Y');
        foreach ($pensions as $pension) {
            $start_month = Carbon::create($pension->created_at)->startOfMonth();
            $end_month   = Carbon::now()->startOfMonth();
            $total_month =  $start_month->diffInMonths($end_month);
            // 'Accrued Monthly Income' under 'Retirement Year' Formular is
            // {Balance (Retirement Year) x Accrued Monthly Income (Current Year)} / Balance (Current Year);
            if($total_month <= 1){
                $current_year_bal =  $pension->current;
            }else{
                $current_year_bal =  $pension->current + ($pension->monthly_contribution * ((int)$total_month - 1));
            }

            $current_year_accured =  $pension->assured_income;
            $assured_intrest = ($current_year_accured * 12 ) / ($pension->current + $pension->monthly_contribution);
            $year_retirement = ($yob + $pension->retirement_age) ;
            $year_to_retirement = $year_retirement - $current_year;
            $retire_balance = (($pension->monthly_contribution * 12) * ($year_to_retirement) ) + ($current_year_bal);

            if($total_month <= 1){
                $accured_current_income = $current_year_accured;
            }else{
                $accured_current_income = ($current_year_bal * $assured_intrest) / 12;
            }
            $accured_retire_income = ($retire_balance * $current_year_accured) / $current_year_bal;

            $seed = $average_seed['total'] ? $average_seed['total'] : 1;
            $percentage_cos = ($accured_current_income / $seed) * 100;

            $pension->year_retirement = $year_to_retirement;
            $pension->current_year_bal = $current_year_bal;
            $pension->accured_current_income  = number_format($accured_current_income, 2);
            $pension->retire_balance  = number_format($retire_balance, 2);
            $pension->retire_income  = number_format($accured_retire_income, 2);
            $pension->percentage_cos  = number_format($percentage_cos,2);
        }
        return $pensions;
    }

    public static function calcPensionAccount($accounts){
        $values = []; $labels = [];
        foreach($accounts as $account){
            array_push($values, $account->current);
        }
        foreach($accounts as $account){
            array_push($labels, $account->name);
        }
        $sum = array_sum($values);
        $percentages = [];
        foreach($accounts as $account){
            array_push($percentages, round(($account->current / ($sum ? $sum : 1)) * 100));
        }
        return compact('sum', 'labels', 'values', 'percentages' );
    }

    public static function incomeAccount($accounts){

        foreach($accounts as $account){
            if($account->income_type == 'portfolio'){
                // var_dump($account->income_name, $account->amount);
                // $portfolio = PortfolioAsset::find($account->portfolio_asset_id);
                // $account->amount = $portfolio->monthly_roi;
                // $account->income_name = $portfolio->name;
            }
            return $accounts;
        }
     }
    public static function calcIncomeAccount($user, $accounts){
        $values = []; $labels = [];
        $sum = [];
        foreach($accounts as $account){
            $amount = GapExchangeHelper::convert_currency($user, $account->income_currency,$account->amount, $account->automated);
            // array_push($values, $account->amount);
            array_push($values, $amount);
        }
        foreach($accounts as $account){
            array_push($labels, $account->income_name);
        }
        $sum = array_sum($values);
        $percentages = [];
        foreach($values as $money){
            array_push($percentages, round(($money / ($sum ? $sum : 1)) * 100));
        }
        // foreach($accounts as $account){
        //     array_push($percentages, round(($account->amount / ($sum ? $sum : 1)) * 100));
        // }
        // $sum = array_sum($convert_sum);
        return compact('sum', 'labels', 'values', 'percentages' );
    }

    public static function calcExpenditure($user,$expenditure){
        $total_seed =  AllocationHelpers::averageSeedDetail($user)['average_seed'];
        $averageSeed = CalculatorClass::getAverageSeed($user);
        $values = []; $labels = [];
        if($total_seed){
            $expenditure->mortgage = $averageSeed->accomodation;
            $expenditure->mobility = $averageSeed->mobility;
            $expenditure->expenses = $averageSeed->expenses;
            $expenditure->utility = $averageSeed->utilities;
            $expenditure->dept_repay = $averageSeed->debt_repay;
        }

        $values = [$expenditure->mortgage, $expenditure->mobility, $expenditure->expenses,$expenditure->utility,
                         $expenditure->dept_repay];
        $labels = ['Accommodation', 'Mobility', 'General Expenses', 'Utility', 'Debt Services'];
        $sum = array_sum($values);
        return compact('sum', 'labels', 'values');
    }

    public static function calcPhilantrophy($user){
        $averageSeed = CalculatorClass::getAverageSeed($user);
        $values = []; $labels = [];
        $values = [$averageSeed->charity, $averageSeed->family_support, $averageSeed->personal_commitments, $averageSeed->others ];

        $labels = ['Charitable Giving', 'Extended Family Support', 'Personal Commitments', 'Others'];
        $sum = array_sum($values);
        return compact('sum', 'labels', 'values');
    }

    public static function cashDetailChart($cash){
        $date = Carbon::parse($cash->created_at);
        $monthName1 = $date->format('M');
        $label1 = $cash->current;
        $labels = [$monthName1];
        $values = [$label1];
        $target = $cash->target;
        return compact('labels', 'values', 'target');
    }

    public static function liabilityDetailChart($account){
        $date = Carbon::parse($account->created_at);
        $monthName1 = $date->format('M');
        $label1 = $account->current;
        $labels = [$monthName1];
        $values = [$label1];
        $target = $account->baseline;
        return compact('labels', 'values', 'target');
    }

    public static function mortgageDetailChart($account){
        $date = Carbon::parse($account->created_at);
        $monthName1 = $date->format('M');
        $label1 = $account->current_balance;
        $labels = [$monthName1];
        $values = [$label1];
        $target = $account->open_balance;
        return compact('labels', 'values', 'target');
    }

    public static function incomeDetailChart($account){
        $date = Carbon::parse($account->created_at);
        $monthName1 = $date->format('M');
        $label1 = $account->amount;
        $labels = [$monthName1];
        $values = [$label1];
        $target = $account->amount * 1.25;
        return compact('labels', 'values', 'target');
    }

    public static function currentILab($user, $cash_accounts){
        $networth = GapAccountCalculator::netWorthVariable($user);
        // Portfolio
        $fin =  Fin::finicial($user);
        $portfolio = $fin['portfolio'];
        $investment = $fin['investment'];
        $non_portfolio = $fin['non_portfolio'];
        $income = $non_portfolio + $portfolio;
        // Net Worth
        $cash = GapAccountCalculator::calcCashAccount($cash_accounts, $user)['sum'];
        $equity = round((int)$networth['equity'], 2);
        $asset = array_sum([$investment, $cash ]);
        // SEED
        $savings = 0;
        $expenditure = round($fin['expenditure'],2);
        $education = round($fin['calculator']->education,2);
        $periodic_saving = round($fin['calculator']->periodic_savings, 2);
        $discretionary = round($fin['calculator']->charity,2);
        $budget = round(($periodic_saving + $education + $expenditure + $discretionary), 2);
        // Liabilities
        $credit = (int)$networth['liability'];
        $mortgage = (int)$networth['mortgage'];
        $liabilities = $credit + $mortgage;


        $current_ilab = collect(compact('investment', 'equity', 'savings', 'credit', 'mortgage', 'non_portfolio',
                                    'portfolio', 'periodic_saving', 'education', 'expenditure', 'discretionary'));

        $ilabs = collect( compact('asset', 'liabilities', 'income', 'budget'));

        return  compact('ilabs', 'current_ilab');
    }

    public static function targetedILab($ilab){
        $asset = [$ilab->investment, $ilab->equity, $ilab->savings];
        $liabilities = [$ilab->credit, $ilab->mortgage];
        $income = [$ilab->non_portfolio, $ilab->asset_portfolio];
        $budget = [$ilab->periodic_savings, $ilab->education, $ilab->expenditure, $ilab->discretionary];

        $asset = array_sum($asset);
        $liabilities = array_sum($liabilities);
        $income = array_sum($income);
        $budget = round(array_sum($budget), 2);

        $investment = $ilab->investment; $equity = $ilab->equity;
        $savings = $ilab->savings; $credit = $ilab->credit;
        $mortgage = $ilab->mortgage; $non_portfolio = $ilab->non_portfolio;
        $portfolio = $ilab->asset_portfolio; $periodic_savings = $ilab->periodic_savings;
        $education = $ilab->education;$expenditure = $ilab->expenditure;
        $discretionary = $ilab->discretionary;

        $ilabs = compact('asset', 'liabilities', 'income', 'budget');
        $target_ilab = compact('investment', 'equity', 'savings', 'credit', 'mortgage', 'non_portfolio',
            'portfolio', 'periodic_savings', 'education', 'expenditure', 'discretionary');

        return compact('ilabs', 'target_ilab');
    }

    public static function updatedTiles($user){
        $audit = UserAudit::where('user_id', $user->id)->first();
        $wheel = [];
        if (!$audit->wheel_point_at) {
            $audit->wheel_point_at = $wheel;
        }
        return collect($audit->wheel_point_at);
    }

    public static function saveUpdatedTiles($user, $accountname, $total, $sum){
        // Rename some mispelt section
        if($accountname =='liabilities')  $accountname = 'liability';
        if($accountname =='philantropy')  $accountname = 'philanthropy';

        $audit = UserAudit::where('user_id', $user->id)->first();

        if(!$audit){
            $audit = new Audit();
            $audit->user_id = $user->id;
            $audit->save();
        }
        $wheel = [];
        $tile =  [
            'account_name' => $accountname,
            'account_type' => ($total > 1) ? 'Multiple Accounts': 'Single Account',
            'sum' => $sum,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if (isset($audit->wheel_point_at)) {
            $wheel = ($audit->wheel_point_at);
            // Confirm if last Account is not the same as the current account
            $key = array_search($accountname, array_column($wheel, 'account_name'));

            if($sum == 0 || (is_int($key) && $key >= 0)){
                if(isset($wheel[$key])) {
                    unset($wheel[$key]);
                    $wheel = array_values($wheel);
                }
            }

            if(count($wheel) >= 8)  array_pop($wheel);
            if ($sum != 0) array_unshift($wheel, $tile);

            $audit->wheel_point_at =  ($wheel);
            $audit->save();
        }else{
            array_push($wheel, $tile);
            $audit->wheel_point_at =  ($wheel);
            $audit->save();
        }

        return collect($audit->wheel_point_at);
    }

    public static function creditAllocated($user){
        $liabilities = Liability::where('user_id', $user->id)->where('isArchive', 0)->latest()->get();
        $credit = Credit::where('user_id', $user->id)->first();
        $current = [];
        $baseline = [];
        foreach($liabilities as $creditor){
            if($creditor->credit_id == 1){
                array_push($current,$creditor->current);
                array_push($baseline,$creditor->baseline);
            }
        }
        $allocate = array_sum($current);
        $baseline = array_sum($baseline);
        $current = $allocate;
        $total =  $credit->current -  (int)$allocate;
        // info('Reach');
        return compact('allocate', 'current', 'baseline', 'total');
    }

    public static function accountBackground(){
       return  [
            "#581845",
            "#FF5733",
            "#FFC300",
            "#DAF7A6",
            "#2471A3",
            "#148F77",
            "#7D6608",
            "#17202A",
            "#F9EBEA",
            "#ED3237",
            "#494949",
            "#000000"
       ];
    }

    public static function initUserChartity($user){
        $philantrophy = new Philantrophy();
        $philantrophy->user_id = $user->id;
        $philantrophy->charity = 0;   $philantrophy->family_support = 0;
        $philantrophy->personal_commitments = 0;   $philantrophy->others = 0;
        $philantrophy->allocated = 0;
        $philantrophy->save();
        return $philantrophy;
    }
}
