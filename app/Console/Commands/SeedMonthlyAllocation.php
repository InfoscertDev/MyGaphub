<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Asset\SeedBudgetAllocation;
use App\Models\Asset\RecordBudgetSpent;
use App\Asset\SeedBudget as Budget;

class SeedMonthlyAllocation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'allocation:recurring';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Monthly Recurring for allocated SEED on MyGaphub';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $current_period = date('Y-m').'-01';
        $last_period = date("Y-m-d", strtotime ( '-1 month' , strtotime ( $current_period ) )) ;

        // $current_seed = Budget::where('user_id', $user->id)->where('period', $current_period)->first();
        // $last_seed = Budget::where('user_id', $user->id)->where('period', $last_period)->first();
        $budgets =  Budget::where('period', $last_period)->get()->toArray();

        foreach ($budgets as $budget) {
            $user = $budget->user_id;
            $last_seed = Budget::where('user_id', $user)->where('period', $last_period)->first();

            $seed =  Budget::firstOrCreate([
                'user_id' => $user,
                'period' => $current_period
            ]);

            $seed->budget_amount = isset($last_seed) ? $last_seed->budget_amount : 0;
            $seed->priviewed = 0;
            $seed->save();

            // Budget Allocations
            $allocations = SeedBudgetAllocation::where('user_id', $user)->where('period', $current_period)
                                ->where('status',1)->get()->toArray();


            $current_allocations = SeedBudgetAllocation::where('user_id', $user)
                                    ->where('period', $last_period)->where('status',1)
                                    ->get()->toArray();

            foreach ($current_allocations as $allocation) {
                $newallocation = (array) $allocation;
                $newallocation['period'] = $current_period;
                SeedBudgetAllocation::create($newallocation);
            }
        }
    }
}
