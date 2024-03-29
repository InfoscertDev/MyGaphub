<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AccountLouckout extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */ 
    public function build()
    {
        $subject = "Account Lockout Notification";
        return $this->subject($subject)
                    ->view('email.account_lockout')
                    // ->text('emails.campaign_published_plain')
                    ->with([ 
                        'user' => $this->user
                    ]); 
    }
}
