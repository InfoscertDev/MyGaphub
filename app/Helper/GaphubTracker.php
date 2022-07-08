<?php
namespace App\Helper;

use App\Models\GaphubSectionTracker;

class GaphubTracker{

    protected $user;
    protected $tracker;

    public function __construct($user){
        $this->user = $user;
        $tracker = GaphubSectionTracker::where('user_id', $user->id)->first();
        if(!$tracker) {
            $tracker = new GaphubSectionTracker(); 
            $tracker->user_id = $user->id;
            $tracker->save(); 
        }
        $this->tracker = $tracker;
    }
 
    public function reapPropertyTracker($listing){ 
        // info($listing);
        if(strtolower($listing) == "reap uk"){
            if ($this->tracker->reap_uk == 2) {
                IntegrationParties::join_sendinblue_contact($this->user, 30);
            }else if($this->tracker->reap_uk <= 3){
                $this->tracker->reap_uk = $this->tracker->reap_uk + 1;
                $this->tracker->save();
            }
        }

        if(strtolower($listing) == "reap us"){
            if ($this->tracker->reap_us == 3) {
               IntegrationParties::join_sendinblue_contact($this->user, 31);
            }else if($this->tracker->reap_us <= 3){
                $this->tracker->reap_us = $this->tracker->reap_us + 1;
                $this->tracker->save();
            }
        }
        
        if(strtolower($listing) == "reap nigeria"){
            if ($this->tracker->reap_nigeria == 2) {
               IntegrationParties::join_sendinblue_contact($this->user, 32);
            }else if($this->tracker->reap_nigeria <= 3){
                $this->tracker->reap_nigeria = $this->tracker->reap_nigeria + 1;
                $this->tracker->save(); 
            }
        }
    }

}