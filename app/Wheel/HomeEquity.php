<?php

namespace App\Wheel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use App\SevenG\DeptFin as Debt;
use App\Helper\GapExchangeHelper as Exchange;
use App\Wheel\MortgageAccount as Mortgage;

class HomeEquity extends Model
{ 
    public $appends = [ 'mortgage' ]; 
    
    public function getMortgageAttribute($value){
        // var_dump((int)$this->mortgage_id);
        if($this->mortgage_id <  0){
            $value = $this->switchToDebtAccount();
        }else if((int)$this->mortgage_id > 0){
            $value = Mortgage::find($this->mortgage_id);
        }else{ 
            $value = Exchange::emptyMortgage();
        }
        return $value;
    }


    public function switchToDebtAccount(){
        $user = Auth::user(); 
        $debt = Debt::where('user_id', $user->id)->first();
        $debt = Exchange::switchToDebtAccount($debt, 'Debt','');
        if($debt->isArchive){
            return Mortgage::where('user_id', $user->id)->where('secured_against','Primary Residential Home')
                            ->where('isArchive', 0)->first();;
        }
        return $debt;
    }
}