<?php

namespace App\Helper;

use Illuminate\Support\Facades\Session;
use App\FinicialCalculator as Calculator;
use App\FinicialQuestion as Question;

class AuthHelper 
{
    
    public static function createQuestion($user){
        $question =  new Question();
        $question->user_id = $user;
        $question->step1 =   Session::get('step1') || '';
        $question->step2 =   Session::get('step2') || '';
        $question->step3 =   Session::get('step3') || '';
        $question->step4 =   Session::get('step4') || '';
        $question->step5 =   Session::get('step5') || '';
        $question->step6 =   Session::get('step6') || '';
        $question->step7 =   Session::get('step7') || '';
        $question->save();
    } 

    public static function createCalculator($user){
        $calulator =  new Calculator();
        $calulator->user_id = $user;   
        $calulator->currency =   Session::get('currency');
        $calulator->mortgage =   (Session::get('mortgage')) ? Session::get('mortgage') : 0;
        $calulator->periodic_savings =   (Session::get('periodic_savings')) ? Session::get('periodic_savings') : 0;
        $calulator->education =   (Session::get('education')) ? Session::get('education') : 0;
        $calulator->expenses =  (Session::get('expenses')) ? Session::get('expenses') : 0; 
        $calulator->utility =   (Session::get('utility')) ? Session::get('utility') : 0;  ;
        $calulator->mobility =   (Session::get('mobility')) ? Session::get('mobility')  : 0;  ;
        $calulator->dept_repay =   (Session::get('dept_pay')) ? Session::get('dept_pay') : 0; 
        $calulator->charity =   (Session::get('charity')) ? Session::get('charity') : 0;
        $calulator->other_income =  (Session::get('income')) ? Session::get('income')  : 0; 
        $calulator->extra_save =   (Session::get('extra')) ? Session::get('extra')  : 0; 
        $calulator->roce =   (Session::get('roce')) ? Session::get('roce') : 0; 
        $calulator->investment =   (Session::get('investment')) ? Session::get('investment') : 0; 
        // $calulator->cost =   Session::get('cost');
        // $calulator->saving =   Session::get('saving');
        $calulator->save();
    } 

}
