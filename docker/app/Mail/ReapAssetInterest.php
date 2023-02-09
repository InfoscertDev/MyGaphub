<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReapAssetInterest extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $asset;
    protected $profile;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $profile,$asset)
    {
        $this->user = $user;
        $this->asset = $asset;
        $this->profile = $profile;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "REAP Reservation";
        return $this->subject($subject)
                    ->view('email.reap_interest')
                    ->with([ 
                        'user' => $this->user, 
                        'profile' => $this->profile, 
                        'asset' => $this->asset
                    ]); 
    }
}
