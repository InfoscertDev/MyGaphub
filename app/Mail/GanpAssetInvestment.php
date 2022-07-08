<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GanpAssetInvestment extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $profile;
    protected $units;
    protected $asset;
    
    /**
    * Create a new message instance.
    *
    * @return void
    */
   public function __construct($user, $profile, $asset, $units)
   {
       $this->user = $user;
       $this->asset = $asset;
       $this->profile = $profile;
       $this->units = $units;
   }

   /**
    * Build the message.
    *
    * @return $this
    */
   public function build()
   {
       $subject = "GANP Reservation";
       return $this->subject($subject)
                   ->view('email.ganp_interest')
                   ->with([ 
                       'user' => $this->user, 
                       'profile' => $this->profile, 
                       'units' => $this->units, 
                       'asset' => $this->asset
                   ]); 
   } 
}
