<?php

namespace App\Helper;
use App\FinicialCalculator as Calculator;

use App\Models\Asset\SeedBudgetAllocation;
use App\Models\Asset\RecordBudgetSpent;

class AllocationHelpers{

    protected static function monthlyRecurssionChecker(){
        $month = date('m')-1;
        $current_period = date('Y-m').'-01';
        $last_period =  date('Y-').$month.'-01';
        // Budget Allocations
        $allocations = SeedBudgetAllocation::where('period', $current_period)->where('status',1)
        ->where('recuring',1)->get()->toArray();

        if(!count($allocations)){
            $allocations = SeedBudgetAllocation::where('period', $last_period)->where('status',1)
            ->where('recuring',1)->get()->toArray();
            foreach ($allocations as $allocation) {
                $newallocation = (array) $allocation;
                $newallocation['period'] = $current_period;
                SeedBudgetAllocation::create($newallocation);
            }
        }
    }

    public static function getAllocatedSeedDetail($user){
        $current_period = date('Y-m').'-01';

        AllocationHelpers::monthlyRecurssionChecker();

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
     * An averafe Seed: The is a verage moving value of allocated budget for the last 6 months
    */
    public static function averageSeedDetail($user){
        $calculator = Calculator::where('user_id', $user->id)->first();
        $year = (int)date('Y') + 1;
        $target = $year.'-01-01';
        // Load the last 6 months without current month and next year
        $seeds =  SeedBudgetAllocation::where('user_id', $user->id)->where('period', '!=', $target)
                        ->where('period', '!=', date('Y-m').'-01')
                        ->latest()->limit(6)->get();
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

        // info(compact('savings', 'education', 'expenditure', 'discretionary'));
        $mortgage = isset($calculator->mortgage) ? $calculator->mortgage : 0;
        $calc_expenditure =  $mortgage + $calculator->mobility + $calculator->utility +
                        $calculator->expenses + $calculator->dept_repay;


        $avg_savings = ( count($savings) > 1) ? count($savings)  : 1;
        $avg_education = ( count($education) > 1) ? count($education)  : 1;
        $avg_expenditure = ( count($expenditure) > 1) ? count($expenditure)  : 1;
        $avg_discretionary = ( count($discretionary) > 1) ? count($discretionary)  : 1;

        if(count($savings) > 1){
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

        return  compact('table', 'seed','seed_web', 'total');
    }

    public static function allocationSummay($allocated, $records){
        $sum = []; $total_spent = 0;

        foreach($records as $account){
            array_push($sum, $account->amount);
        }
        $total_spent = array_sum($sum);

        $total_left = $allocated->amount - $total_spent;
        $left_percentage = ($total_spent) ?  round(( $total_spent / $allocated->amount ) * 100) : 100;
        $spent_percentage = 100 - $left_percentage;
        return compact('total_spent', 'total_left', 'spent_percentage', 'left_percentage');
    }

}

