<?php

namespace App\Console\Commands;

use App\Helper\IntegrationParties;
use App\Mail\SevegValidate;
use App\User;
use App\Models\Asset\RecordBudgetSpent;
use Illuminate\Console\Command;
use App\Helper\AnalyticsClass;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmailReminder;
use App\Models\Notification;

class DailyReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'MyGaphub Daily Reminder';

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
       $this->monthlyHistoricReport();
       return;
       $this->validateEmailReminder();

       $this->analyticsValidation();
    }

    public function validateEmailReminder(){
        $unvalidated_users = User::whereNull('email_verified_at')->get();
        // info(['Prperaing to send to  mail to unvalidated users', count($unvalidated_users)]);
        foreach($unvalidated_users as $user){
            info('Email '.$user->email);
            Mail::to($user->email)->send(new VerifyEmailReminder($user));
        }
    }

    public function analyticsValidation(){
        // $last_week = date("Y-m-d",strtotime("-7 days", strtotime(date('Y-m-d')) ) );
        // Mail::to('dev.kabiruwahab@gmail.com')->send(new SevegValidate($unvalidated_users[0]));
        $unvalidated_users = User::whereNotNull('email_verified_at')->get();
        info(['Prperaing to send to  mail to unvalidated users', count($unvalidated_users)]);
        foreach($unvalidated_users as $user){
            $date = strtotime($user->created_at);
            $current_charge = date('l', $date);
            $isToday = date('l') == $current_charge;
            if($isToday){
                $isValid = AnalyticsClass::isSevenGVal($user);
                if(!$isValid){
                    info('SevenG Email '.$user->email);
                    Mail::to($user->email)->send(new SevegValidate($user));
                }
            }
        }
    }

    public function monthlyHistoricReport(){
        $today = date('d');
        $last_period = date("Y-m-d",strtotime("-1 months", strtotime(date('Y-m').'-01')) );
        $unvalidated_users = User::whereNotNull('email_verified_at')->get();

        foreach($unvalidated_users as $user){
            if($today == 22){
                $notification = new Notification();
                $notification->user_id =  $user->id;
                $notification->action = route('seed.periodic_history', $last_period);
                $notification->title = "SEED (Budget) Report";
                $notification->category = "seed_report";
                $notification->message =  "Your SEED (Budget) report for last month is ready to view";
                $notification->save();
            }
        }
    }

}
