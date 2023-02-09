<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmailReminder extends Mailable
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
        $subject = "REMINDER: Please Verify Your Email ". $this->user->email;
        info($subject); 
        return $this->subject($subject)  
                    ->view('email.validate_email_reminder')
                    ->with([  
                        'user' => $this->user
                    ]); 
    }
}
