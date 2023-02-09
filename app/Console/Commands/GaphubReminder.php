<?php

namespace App\Console\Commands;

use App\Helper\IntegrationParties;
use App\Models\Notification;
use Illuminate\Console\Command;

use App\Reminder;
use Illuminate\Support\Facades\Mail;
use Pusher\Pusher;

class GaphubReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gaphub:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A command that send Email to gaphub users for reminder that due for the day';

    /**
     * Create a new command instance.
     *r
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $today = date('Y-m-d');
        // $from = date('Y-m-d', strtotime($to. '-20 days')); 
        $reminders = Reminder::where('alerted', 0) 
                        ->whereDate('alert', '<=', $today)
                        ->whereDate('date', '>=', $today)
                        ->get();
        
        // st
        $subject = 'Today Reminder'; 
        foreach ($reminders as $index => $reminder) {
            $reminder->user; 
            if($reminder->user){ 
                // SMS Reminder
                if($reminder->sms){
                    echo "SMS \n";
                   $integrations = new IntegrationParties(); 
                   $profile = $reminder->user->profile;
                   if($profile->phone){
                       $message = "This is a reminder on your $reminder->name which is $reminder->amount bill";
                       $sms_reminder = $integrations->send_sendinblue_sms($profile, $message);
                       info($sms_reminder); 
                   }
                }
                // Push Notification Reminder
                if($reminder->push){
                    // echo var_dump(env('PUSHER_APP_KEY'),env('PUSHER_APP_SECRET'),env('PUSHER_APP_ID'));
                    echo "Push Notification Triggerd \n";

                    $options = array(
                        'cluster' => env('PUSHER_APP_CLUSTER', 'eu'),
                        'encrypted' => true
                    ); 
                    $pusher = new Pusher(
                        env('PUSHER_APP_KEY', '68b4813f8472fce44d8f'),
                        env('PUSHER_APP_SECRET', 'b2e47a793c6eb9bd3401'),
                        env('PUSHER_APP_ID', '1254739'), 
                        $options
                    );
                    
                    $message = "This is a reminder on your $reminder->name which is $reminder->amount bill";
                    $data = compact('message');
                    $pusher->trigger('reminder-channel', 'App\Events\Reminder', $data);
                    // 
                    if($reminder->amount){
                        $notification = new Notification();
                        $notification->user_id = $reminder->user_id;
                        $notification->action = '/home/reminder';   
                        $notification->title = "Payment Alert";
                        $notification->category = "payment";
                        $notification->message =  "Payment alert details";
                        $notification->save();
                    }else{
                        $notification = new Notification();
                        $notification->user_id = $reminder->user_id;
                        $notification->action = '/home/reminder';  
                        $notification->title = "Reminder Alert";
                        $notification->category = "reminder"; 
                        $notification->message =  "Reminder alert details";
                        $notification->save();
                    } 
                }
                
            }
        }  
        echo strval('Completed '. count($reminders));
    } 


    
}
