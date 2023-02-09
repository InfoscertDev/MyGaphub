<?php

namespace App\Helper;
use App\UserAudit as Audit;

class ListedInfo 
{
    public static function addToReapAlert($user, $reap){
        $audit = Audit::where('user_id', $user->id)->first();
        $wheel = [];
        if (!$audit->reap_alert) {
            $wheel = $wheel;
        }else{
            $wheel = json_decode($audit->reap_alert);
        }
        $wheel = (array)$wheel;
        if (!in_array($reap, $wheel)) {
            array_push($wheel,$reap);
        }
        $audit->reap_alert = json_encode(array_unique($wheel));
        $audit->save(); 
        return $audit;
    } 

}
