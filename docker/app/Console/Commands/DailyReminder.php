<?php

namespace App\Console\Commands;

use App\Helper\IntegrationParties;
use App\Mail\SevegValidate;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Helper\AnalyticsClass;
use App\Mail\VerifyEmailReminder;
 
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
       $this->validateEmailReminder();
       
       $this->analyticsValidation();
    } 

    public function validateEmailReminder(){
        $unvalidated_users = User::whereNull('email_verified_at')->get();
        info(['Prperaing to send to  mail to unvalidated users', count($unvalidated_users)]);
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
}
