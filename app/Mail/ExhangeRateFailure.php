<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExhangeRateFailure extends Mailable
{
    use Queueable, SerializesModels;

    protected $emial;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "Exchange Rate Failure";
        return $this->subject($subject) 
                    ->view('email.exchange_failure');
    }
}
