<?php

namespace App\Helper;
use App\FinicialCalculator as Calculator;

use App\Models\Asset\SeedBudgetAllocation;
use App\Models\Asset\RecordBudgetSpent;
use App\Asset\SeedBudget as Budget;
use App\DiscretionaryBudget as Philantrophy;

class AllocationHelpers{
    public static function monthlyRecurssionChecker($user){
        $current_period = date('Y-m').'-01';
        $last_period = date("Y-m-d", strtotime ( '-1 month' , strtotime ( $current_period ) )) ;

        $current_seed = Budget::where('user_id', $user->id)->where('period', $current_period)->first();
        $last_seed = Budget::where('user_id', $user->id)->where('period', $last_period)->first();

        if(!$current_seed){
            $seed =  Budget::firstOrCreate(['user_id' => $user->id, 'period' => $current_period]);
            $seed->budget_amount = isset($last_seed) ? $last_seed->budget_amount : 0;
            $seed->priviewed = 0;
            $seed->save();

            // Budget Allocations
            $current_allocations = SeedBudgetAllocation::where('user_id', $user->id)
                                    ->where('period', $last_period)->where('status',1)
                                    ->get()->toArray();

            foreach ($current_allocations as $allocation) {
                $newallocation = (array) $allocation;
                $newallocation['period'] = $current_period;
                SeedBudgetAllocation::create($newallocation);
            }
        }

        $seed = ['savings', 'education', 'discretionary'];
        $expenditures = ['accommodation', 'transportation', 'family', 'utilities', 'debt_repayment'];

        foreach ($seed as $categoty) {
            SeedBudgetAllocation::firstOrCreate([
                'user_id' => $user->id,
                'period' => $current_period,
                'seed_category' => $categoty,
                'label' => 'Miscellaneous',
            ]);
        }

        foreach ($expenditures as $categoty) {
            SeedBudgetAllocation::firstOrCreate([
                'user_id' => $user->id,
                'period' => $current_period,
                'seed_category' => 'expenditure',
                'expenditure' => $categoty,
                'label' => 'Miscellaneous',
            ]);
        }

    }

    public static function getAllocatedSeedDetail($user, $package =  null){
        $current_period = date('Y-m').'-01';
        $target_period = date('Y-m',  strtotime("+1 month")).'-01';
        $period = ($package == 'target') ? $target_period : $current_period;

        $savings_allocation = SeedBudgetAllocation::where('seed_category', 'savings')
                         ->where('user_id', $user->id)->where('period', $period)->get();
        $education_allocation = SeedBudgetAllocation::where('seed_category', 'education')
                         ->where('user_id', $user->id)->where('period', $period)->get();
        $expenditure_allocation = SeedBudgetAllocation::where('seed_category', 'expenditure')
                         ->where('user_id', $user->id)->where('period', $period)->get();
        $discretionary_allocation = SeedBudgetAllocation::where('seed_category', 'discretionary')
                         ->where('user_id', $user->id)->where('period', $period)->get();

        $record_spent = RecordBudgetSpent::where('user_id', $user->id)
                            ->where('period', $period)->pluck('amount');

        $total_spent = array_sum($record_spent->toArray());

        $savings = array_sum(array_column($savings_allocation->toArray(), 'amount'));
        $education = array_sum(array_column($education_allocation->toArray(), 'amount'));
        $expenditure = array_sum(array_column($expenditure_allocation->toArray(), 'amount'));
        $discretionary = array_sum(array_column($discretionary_allocation->toArray(), 'amount'));


        $table = compact('savings', 'education', 'expenditure', 'discretionary');
        $total = array_sum($table);
        $seed = [
            'savings' => ($savings) ? round(($savings / $total) * 100) : 0,
            'education' => ($education) ? round(($education / $total) * 100) : 0,
            'expenditure' => ($expenditure) ? ($expenditure / $total) * 100 : 0,
            'discretionary' => ($discretionary) ? ($discretionary / $total) * 100 : 0
        ];
        $seed_web = [
            ($savings) ? round(($savings / $total) * 100) : 0,
            ($education) ? round(($education / $total) * 100) : 0,
            ($expenditure) ? round(($expenditure / $total) * 100): 0,
            ($discretionary) ? round(($discretionary / $total) * 100) : 0
        ];

        return  compact('total_spent','table', 'seed', 'seed_web','total');
    }

    /**
     * An average Seed: The is a verage moving value of allocated budget for the last 6 months
    */
    public static function averageSeedDetail($user){
        $calculator = Calculator::where('user_id', $user->id)->first();
        $year = (int)date('Y') + 1;
        $target = $year.'-01-01';

        $current_period = strtotime(date('Y-m').'-01');
        $from = date('Y-m-d' , strtotime("-7 months",  $current_period));
        $to = date('Y-m-d' , strtotime("-1 months",  $current_period));
        // Load the last 6 months without current month and next year
        $seeds =  SeedBudgetAllocation::where('user_id', $user->id)
                        ->whereBetween('period', [$from, $to])
                        ->orderBy('period', 'ASC')->get();

        $total_seeds = Budget::where('user_id', $user->id)
                        ->whereBetween('period', [$from, $to])
                        ->selectRaw('count(*) as total, period')
                        ->groupBy('period')->get();

        $total_seeds = count($total_seeds);

        $periodic_seeds = $seeds->groupBy('period');

        $periods = array_column($seeds->toArray(), 'period','period');
        $historic_seed = [];

        foreach($periodic_seeds as $period => $p_seeds) {
            $historic_seed[$period] = AllocationHelpers::getSeedAverage($calculator,$p_seeds, $total_seeds);
        }

        $average_seed = AllocationHelpers::getSeedAverage($calculator, $seeds, $total_seeds);

        return compact('average_seed', 'historic_seed', 'periods','total_seeds');
    }

    public static function averageSeedExpenditure($user){
        $calculator = Calculator::where('user_id', $user->id)->first();
        $year = (int)date('Y') + 1;
        $target = $year.'-01-01';
        $current_period = strtotime(date('Y-m').'-01');
        $from = date('Y-m-d' , strtotime("-7 months",  $current_period));
        $to = date('Y-m-d' , strtotime("-1 months",  $current_period));

        $seeds =  SeedBudgetAllocation::where('user_id', $user->id)
                        ->where('seed_category', 'expenditure')
                        ->whereBetween('period', [$from, $to])
                        ->latest()->get()->toArray();

        $total_seeds = Budget::where('user_id', $user->id)
                        ->whereBetween('period', [$from, $to])
                        ->selectRaw('count(*) as total, period')
                        ->groupBy('period')->get();
        $total_seeds = count($total_seeds);

        $values = array(); $percentages = array();
        $labels = array('accommodation', 'transportation', 'family', 'utilities', 'debt_repayment');


        $calculator_expenditure = [$calculator->mortgage, $calculator->mobility,
                                    $calculator->expenses, $calculator->utility ,
                                   $calculator->dept_repay];
        $accommodation = array();
        $transportation = array();
        $family = array();
        $utilities = array();
        $debt_repayment = array();

        foreach ($seeds as $seed) {
           if($seed['expenditure'] == 'accommodation') array_push($accommodation, $seed);
           if($seed['expenditure'] == 'transportation') array_push($transportation, $seed);
           if($seed['expenditure'] == 'family') array_push($family, $seed);
           if($seed['expenditure'] == 'utilities') array_push($utilities, $seed);
           if($seed['expenditure'] == 'debt_repayment') array_push($debt_repayment, $seed);
        }

        $accommodation = array_sum(array_column($accommodation, 'amount'));
        $transportation = array_sum(array_column($transportation, 'amount'));
        $family = array_sum(array_column($family, 'amount'));
        $utilities = array_sum(array_column($utilities, 'amount'));
        $debt_repayment = array_sum(array_column($debt_repayment, 'amount'));

        if($total_seeds > 1){
            // After 2 months
           $values = [
                ($accommodation / $total_seeds ), $transportation / $total_seeds,
                $family / $total_seeds, $utilities / $total_seeds,
                $debt_repayment / $total_seeds
           ];
        }else{
            // Before 2 months of  use
            $total_seeds += 1;
            $values = [
                ($accommodation + $calculator_expenditure[0]) / $total_seeds, ($transportation  + $calculator_expenditure[1]) / $total_seeds,
                ($family + $calculator_expenditure[2]) / $total_seeds, ($utilities +  $calculator_expenditure[3]) / $total_seeds,
                ($debt_repayment +  $calculator_expenditure[4]) / $total_seeds
            ];
        }


        return compact('labels', 'values');
    }

    public static function averageSeedPhilantrophy($user){
        $philantrophy = Philantrophy::where('user_id', $user->id)->first();
        $year = (int)date('Y') + 1;
        $target = $year.'-01-01';
        $current_period = strtotime(date('Y-m').'-01');
        $from = date('Y-m-d' , strtotime("-7 months",  $current_period));
        $to = date('Y-m-d' , strtotime("-1 months",  $current_period));

        $seeds =  SeedBudgetAllocation::where('user_id', $user->id)
                        ->where('seed_category', 'discretionary')
                        ->whereBetween('period', [$from, $to])
                        ->latest()->get()->toArray();

                        $total_seeds = Budget::where('user_id', $user->id)
                        ->whereBetween('period', [$from, $to])
                        ->count();

        $values = array();
        $labels = array('Charitable Giving', 'Extended Family Support', 'Personal Conviction Commitments', 'Others');

        $charity = array();
        $extended = array();
        $personal = array();
        $others = array();

        foreach ($seeds as $seed) {
            if($seed['label'] == $labels[0]){ array_push($charity, $seed);}
            else if($seed['label'] == $labels[1]){ array_push($extended, $seed);}
            elseif($seed['label'] == $labels[2]){ array_push($personal, $seed);}
            else{ array_push($others, $seed);}
        }

        $charity = array_sum(array_column($charity, 'amount'));
        $extended = array_sum(array_column($extended, 'amount'));
        $personal = array_sum(array_column($personal, 'amount'));
        $others = array_sum(array_column($others, 'amount'));

        // info([$total_seeds, count($seeds) ]);
        if($total_seeds){
            // After 2 months
           $values = [
                ($charity / $total_seeds), $extended / $total_seeds,
                ($personal / $total_seeds), $others / $total_seeds
           ];
        }else{
            // Before 2 months of  use
            $total_seeds += 1;
            $values = [
                ($charity + $philantrophy->charity) / $total_seeds,
                ($extended + $philantrophy->family_support) / $total_seeds,
                ($personal + $philantrophy->personal_commitments) / $total_seeds,
                ($others + $philantrophy->others) / $total_seeds
            ];
        }
        return compact('labels', 'values');
    }

    private static function filterExpenditure($value){
        if($value == 'family'){
            $value = 'Home & Family';
        }else if ($value == 'debt_repayment') {
            $value = 'Debt Repayment';
        }else if($value){
           $value = ucfirst($value);
        }
        return $value;
    }

    private static function getSeedAverage($calculator,$seeds, $total_seeds = 1){
        $savings = [];
        $education = [];
        $expenditure = [];
        $discretionary = [];

        foreach ($seeds as $seed ) {
            if($seed->seed_category == 'savings') array_push(($savings), $seed);
            if($seed->seed_category == 'education') array_push($education, $seed);
            if($seed->seed_category == 'expenditure') array_push($expenditure, ($seed));
            if($seed->seed_category == 'discretionary') array_push($discretionary, $seed);
        }


        $mortgage = isset($calculator->mortgage) ? $calculator->mortgage : 0;
        $calc_expenditure =  $mortgage + $calculator->mobility + $calculator->utility +
                        $calculator->expenses + $calculator->dept_repay;

        $avg_period =  $total_seeds > 1 ? ($total_seeds)  : 1;

        $savings = array_column($savings, 'amount');
        $education = array_column($education, 'amount');
        $expenditure = array_column($expenditure, 'amount');
        $discretionary = array_column($discretionary, 'amount');

        if(count($seeds) > 1){
            // After 2 months
            $savings =  round(array_sum($savings) / $avg_period, 2);
            $education = round(array_sum($education) / $avg_period, 2);
            $expenditure = round(array_sum($expenditure)  / $avg_period,2);
            $discretionary = round(array_sum($discretionary) / $avg_period, 2);
        }else{
            // Before 2 months of  use
            $savings = (array_sum($savings) + $calculator->periodic_savings) / $avg_period;
            $education = (array_sum($education) + $calculator->education) / $avg_period;
            $expenditure = (array_sum($expenditure) + $calc_expenditure) / $avg_period;
            $discretionary = (array_sum($discretionary) + ($calculator->charity)) / $avg_period;
        }

        $table =  compact('savings', 'education', 'expenditure', 'discretionary') ;
        //array('savings' => number_format($savings, 2), 'education' => number_format($education, 2), 'expenditure' => number_format($expenditure) , 'discretionary' => number_format($discretionary));

        $total = array_sum($table);

        $seed = [
            'savings' => ($savings) ? round(($savings / $total) * 100) : 0,
            'education' => ($education) ? round(($education / $total) * 100) : 0,
            'expenditure' => ($expenditure) ? round($expenditure / $total) * 100 : 0,
            'discretionary' => ($discretionary) ? round($discretionary / $total) * 100 : 0
        ];

        $seed_web = [
            ($savings) ? round(($savings / $total) * 100) : 0,
            ($education) ? round(($education / $total) * 100) : 0,
            ($expenditure) ? round(($expenditure / $total) * 100): 0,
            ($discretionary) ? round(($discretionary / $total) * 100) : 0
        ];

        return  compact('table', 'seed','seed_web', 'total');
    }

    public static function monthlySeedDetail($user, $period){
        $seeds =  SeedBudgetAllocation::where('user_id', $user->id)
                                ->where('period', $period)
                                ->latest()->get();
        $savings = [];
        $education = [];
        $expenditure = [];
        $discretionary = [];

        foreach ($seeds as $seed ) {
            if($seed->seed_category == 'savings') array_push($savings, $seed);
            if($seed->seed_category == 'education') array_push($education, $seed);
            if($seed->seed_category == 'expenditure') array_push($expenditure, $seed);
            if($seed->seed_category == 'discretionary') array_push($discretionary, $seed);
        }

        $seed = [
            'savings' => array_sum(array_column($savings, 'amount')),
            'education' => array_sum(array_column($education, 'amount')),
            'expenditure' => array_sum(array_column($expenditure, 'amount')),
            'discretionary' => array_sum(array_column($discretionary, 'amount'))
        ];

        $total = array_sum($seed);

        return compact('seed', 'total');
    }

    public static function allocationSummay($allocated, $records){
        $sum = []; $total_spent = 0;

        foreach($records as $account){
            array_push($sum, $account->amount);
        }
        $amount = ( $allocated->amount ) ? $allocated->amount : 1;
        $total_spent = array_sum($sum);
        $total_left = round($amount - $total_spent, 2);
        $left_percentage = ($total_spent > 0) ?  round(( $total_spent / $amount ) * 100) : 100;

        $spent_percentage = ($left_percentage != 100) ? 100 - $left_percentage : $left_percentage;
        return compact('total_spent', 'total_left', 'spent_percentage', 'left_percentage');
    }

}

