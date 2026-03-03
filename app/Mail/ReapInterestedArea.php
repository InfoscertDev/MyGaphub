<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReapInterestedArea extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $profile;
    protected $reap_interest;
    
    /**
     * Create a new message instance.
     * 
     * @return void
     */
    public function __construct($user, $profile,$reap_interest)
    {
        $this->user = $user;
        $this->profile = $profile;
        $this->reap_interest = $reap_interest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "REAP Interest";
        return $this->subject($subject)
                    ->view('email.interest_areas')
                    ->with([ 
                        'user' => $this->user, 
                        'profile' => $this->user, 
                        'reap_interest' => $this->reap_interest
                    ]); 
    }
}
