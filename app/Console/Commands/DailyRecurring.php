<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\User;
use App\Models\Asset\RecordBudgetSpent;
use App\Models\Asset\SeedBudgetAllocation;


class DailyRecurring extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:recurring';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $this->recurringRecordSpend();
    }

    public function recurringRecordSpend(){
        $todayDay = date('d');
        $current_period = date('Y-m').'-01';
        $last_period = date("Y-m-d", strtotime ( '-1 month' , strtotime ( $current_period ) )) ;

        $records = RecordBudgetSpent::whereDay('date', $todayDay)
                    ->where('recuring', 1)->get()->toArray();

        foreach($records as $spent){
            $new_spent = (array) $spent; //json_decode(json_encode($spent), true);
            $new_spent['date'] = date('Y-m-d');
            $new_spent['period'] = $current_period;
            RecordBudgetSpent::create($new_spent);
        }

        // Recurring Allocation
        $allocations = SeedBudgetAllocation::whereDay('date', $todayDay)
                         ->where('recuring', 1)->get()->toArray();

        foreach($allocations as $new_spent){
            $payload = [
                'user_id' => $new_spent->user_id,
                'recuring' => $new_spent->recuring,
                'allocation_id' => $new_spent->allocation_id,
                'period' =>   $current_period,
                'date' =>  date('Y-m-d'),
                'label' => $new_spent->label,
                'amount' => $new_spent->amount,
            ];

            RecordBudgetSpent::create($payload);
        }
    }
}
