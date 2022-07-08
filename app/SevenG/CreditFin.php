<?php

namespace App\SevenG;

use Illuminate\Database\Eloquent\Model;

use App\Helper\GapAccountCalculator;
use App\UserAudit;
use App\WHeel\LiabilityAccount;
use stdClass;

class CreditFin extends Model
{
    protected $fillable = ['user_id'];

 
    // public function getCurrentAttribute($value){
    //     $user = new stdClass();
    //     $user->id =  $this->user_id;
    //     $audit = UserAudit::where('user_id', $this->user_id)->select('is_allocated')->first();
    //     $liabilities = LiabilityAccount::where('user_id', $this->user_id)->where('isArchive', 1)->where('credit_id', 0)->latest()->get();
    //     $liabilities_detail = GapAccountCalculator::calcLiabilitiesAccount($liabilities, $user);
    //     if($audit->is_allocated){ 
    //         $cb = $liabilities_detail['user_current'];
    //     }else{
    //         $cb = $value;
    //     } 
    //     return $cb;
    // }

    // public function getBaselineAttribute($value){
    //     $user = new stdClass();
    //     $user->id =  $this->user_id;
    //     $audit = UserAudit::where('user_id', $this->user_id)->select('is_allocated')->first();
    //     $liabilities = LiabilityAccount::where('user_id', $this->user_id)->where('isArchive', 1)->where('credit_id', 0)->latest()->get();
    //     $liabilities_detail = GapAccountCalculator::calcLiabilitiesAccount($liabilities, $user);
    //     if($audit->is_allocated){ 
    //         $cb = $liabilities_detail['user_baseline'];
    //     }else{
    //         $cb = $value;
    //     } 
    //     return $cb;
    // } 


}
