<?php

namespace App\Helper;
use App\FinicialCalculator as Calculator;

use App\Models\Asset\SeedBudgetAllocation;
use App\Models\Asset\RecordBudgetSpent;
use App\Asset\SeedBudget as Budget;

class AllocationHelpers{
    // ALTER TABLE `seed_budgets` CHANGE `budget_amount` `budget_amount` DOUBLE NULL DEFAULT '0', CHANGE `priviewed` `priviewed` INT(4) NULL DEFAULT '0';
    public static function monthlyRecurssionChecker($user){
        $current_period = date('Y-m').'-01';
        $last_period = date("Y-m-d", strtotime ( '-1 month' , strtotime ( $current_period ) )) ;
        // $last_period = date($current_period, strtotime("-1 Month"));

        $current_seed = Budget::where('user_id', $user->id)->where('period', $current_period)->first();
        $last_seed = Budget::where('user_id', $user->id)->where('period', $last_period)->first();

        // info([$current_seed, $last_seed]);

        // || ($seed->budget_amount == 0 && $last_seed)
        if(!$current_seed ){
            $seed =  Budget::firstOrCreate(['user_id' => $user->id, 'period' => $current_period]);
            // $seed->user_id = $user->id;
            // $seed->period = $current_period;
            $seed->budget_amount = isset($last_seed) ? $last_seed->budget_amount : 0;
            $seed->priviewed = 0;
            $seed->save();

            // Budget Allocations
            $allocations = SeedBudgetAllocation::where('user_id', $user->id)->where('period', $current_period)
                                ->where('status',1)->get()->toArray();


            $current_allocations = SeedBudgetAllocation::where('user_id', $user->id)
                                    ->where('period', $last_period)->where('status',1)
                                    ->get()->toArray();

            foreach ($current_allocations as $allocation) {
                $newallocation = (array) $allocation;
                $newallocation['period'] = $current_period;
                SeedBudgetAllocation::create($newallocation);
            }
        }
    }

    public static function getAllocatedSeedDetail($user){
        $current_period = date('Y-m').'-01';

        $savings_allocation = SeedBudgetAllocation::where('seed_category', 'savings')
                         ->where('user_id', $user->id)->where('period', $current_period)->get();
        $education_allocation = SeedBudgetAllocation::where('seed_category', 'education')
                         ->where('user_id', $user->id)->where('period', $current_period)->get();
        $expenditure_allocation = SeedBudgetAllocation::where('seed_category', 'expenditure')
                         ->where('user_id', $user->id)->where('period', $current_period)->get();
        $discretionary_allocation = SeedBudgetAllocation::where('seed_category', 'discretionary')
                         ->where('user_id', $user->id)->where('period', $current_period)->get();

        $record_spent = RecordBudgetSpent::where('user_id', $user->id)->where('period', $current_period)->get();

        $savings = array_sum(array_column($savings_allocation->toArray(), 'amount'));
        $education = array_sum(array_column($education_allocation->toArray(), 'amount'));
        $expenditure = array_sum(array_column($expenditure_allocation->toArray(), 'amount'));
        $discretionary = array_sum(array_column($discretionary_allocation->toArray(), 'amount'));
        $total_spent = array_sum(array_column($record_spent->toArray(), 'amount'));


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
                        ->latest()->get();

        $periodic_seeds = $seeds->groupBy('period');

        $periods = array_column($seeds->toArray(), 'period','period');
        $historic_seed = [];

        foreach($periodic_seeds as $period => $p_seeds) {
            $historic_seed[$period] = AllocationHelpers::getSeedAverage($calculator,$p_seeds);
        }

        $average_seed = AllocationHelpers::getSeedAverage($calculator,$seeds);
        // info($average_seed);

        return compact('average_seed', 'historic_seed', 'periods');
    }

    private static function getSeedAverage($calculator,$seeds){
        $savings = [];
        $education = [];
        $expenditure = [];
        $discretionary = [];

        foreach ($seeds as $seed ) {
            // info($seed->seed_category);
            if($seed->seed_category == 'savings') array_push(($savings), $seed);
            if($seed->seed_category == 'education') array_push($education, $seed);
            if($seed->seed_category == 'expenditure') array_push($expenditure, ($seed));
            if($seed->seed_category == 'discretionary') array_push($discretionary, $seed);
        }

        $mortgage = isset($calculator->mortgage) ? $calculator->mortgage : 0;
        $calc_expenditure =  $mortgage + $calculator->mobility + $calculator->utility +
                        $calculator->expenses + $calculator->dept_repay;

        $avg_savings = ( count($savings) > 1) ? count($savings)  : 1;
        $avg_education = ( count($education) > 1) ? count($education)  : 1;
        $avg_expenditure = ( count($expenditure) > 1) ? count($expenditure)  : 1;
        $avg_discretionary = ( count($discretionary) > 1) ? count($discretionary)  : 1;

        $savings = array_column($savings, 'amount');
        $education = array_column($education, 'amount');
        $expenditure = array_column($expenditure, 'amount');
        $discretionary = array_column($discretionary, 'amount');
        //  && $period == false
        if(count($seeds) > 1){
            // After 2 months
            $savings =  round(array_sum($savings) / $avg_savings, 2);
            $education = round(array_sum($education) / $avg_education, 2);
            $expenditure = round(array_sum($expenditure)  / $avg_expenditure,2);
            $discretionary = round(array_sum($discretionary) / $avg_discretionary, 2);
        }else{
            // Before 2 months of  use
            $savings = (array_sum($savings) + $calculator->periodic_savings) / $avg_savings;
            $education = (array_sum($education) + $calculator->education) / $avg_education;
            $expenditure = (array_sum($expenditure) + $calc_expenditure) / $avg_expenditure;
            $discretionary = (array_sum($discretionary) + ($calculator->charity)) / $avg_discretionary;
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
        $total_spent = array_sum($sum);
        $total_left = $allocated->amount - $total_spent;
        $left_percentage = ($total_spent > 0) ?  round(( $total_spent / $allocated->amount ) * 100) : 100;
        // info([$total_spent > 0, $left_percentage]);
        $spent_percentage = ($left_percentage != 100) ? 100 - $left_percentage : $left_percentage;
        return compact('total_spent', 'total_left', 'spent_percentage', 'left_percentage');
    }

}

