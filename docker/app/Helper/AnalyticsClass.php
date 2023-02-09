<?php

namespace App\Helper;
use App\SevenG\AlphaFin as Alpha;
use App\SevenG\BetaFin as Beta;
use App\SevenG\CreditFin as Credit;
use App\SevenG\DeptFin as Dept;
use App\SevenG\EducationFin as Education;
use App\SevenG\FreedomFin as Freedom;
use App\SevenG\GrandFin as Grand;
use App\FinicialQuestion as Question; 


use App\Wheel\MortgageAccount as Mortgage;
use App\Wheel\LiabilityAccount as Liability;
use App\Helper\CalculatorClass as Fin;
use App\Helper\GapAccountCalculator as GapAccount;
use App\Helper\HelperClass as Helper;
use App\UserAudit;
 
class AnalyticsClass {

    public static function isSevenGVal($user){
        $alpha = Alpha::where('user_id', $user->id)->first();
        $beta = Beta::where('user_id', $user->id)->first();
        $credit = Credit::where('user_id', $user->id)->first();
        $dept = Dept::where('user_id', $user->id)->first();
        $education = Education::where('user_id', $user->id)->first();
        $freedom = Freedom::where('user_id', $user->id)->first();
        $grand = Grand::where('user_id', $user->id)->first();

        if(!$alpha->main  || !$beta->main || !$credit->main || !$dept->main 
            || !$education->main || !$freedom->main  || !$grand->main){
            return false;
        }else{
            return true;
        }
    }

    public static function initBudgetValue($user, $credit, $debt,$freedom, $grand){
        $audit = UserAudit::where('user_id', $user->id)->select('is_allocated')->first();
        $fin =  Fin::finicial($user);
        if($audit->is_allocated){
            $seveng = $seveng = Liability::where('user_id', $user->id)->where('isArchive', 0)->where('credit_id', 1)->latest()->get(); 
            $allocated = GapAccount::calcLiabilitiesAccount([], $user, false, $seveng);
            $credit->baseline = $allocated['user_baseline']; 
            $credit->current = $allocated['user_current'];
        }  
        if($debt->isArchive){
            $primary_resident = Mortgage::where('user_id', $user->id)->where('secured_against','Primary Residential Home')
                                ->where('isArchive', 0)->first();
            if($primary_resident){
                $debt->baseline = $primary_resident->open_balance; 
                $debt->current = $primary_resident->current_balance;   
            }
        }
        if($freedom){ 
            $freedom->target = $fin['cost']; 
            $freedom->current = $fin['portfolio']; 
        }   
        if(!$grand->main){ 
            $grand->current = $fin['calculator']->charity;
        } 
    }
 
    public static function valSevenG($user){
        $alpha = Alpha::where('user_id', $user->id)->first();
        $beta = Beta::where('user_id', $user->id)->first();
        $credit = Credit::where('user_id', $user->id)->first();
        $debt = Dept::where('user_id', $user->id)->first();
        $education = Education::where('user_id', $user->id)->first();
        $freedom = Freedom::where('user_id', $user->id)->first();
        $grand = Grand::where('user_id', $user->id)->first();
        AnalyticsClass::initBudgetValue($user,$credit, $debt,$freedom, $grand);

        if ($alpha->current > 0 && $alpha->target > 0) {
          $step1 = $alpha->current * 100 / $alpha->target;
          $step1 = ((int)$step1 > 100) ? 100: (int)$step1;
          $step1 = ((int)$step1 <= 0) ? 0: (int)$step1;
        }else{
            $step1 = 0;
        }
 
        if($beta->is_purchased){
            $step2 = 100;
        }else{
            if ($beta->current > 0 && $beta->target > 0) {
              $step2 = ($beta->current * 100) / $beta->target;
              $step2 = ((int)$step2 > 100) ? 100: (int)$step2;
              $step2 = ((int)$step2 <= 0) ? 0: (int)$step2;
            }else{
                $step2 = 0;
            } 
        }

        if ($credit->current > 0 && $credit->baseline > 0) {
            $step3 = (($credit->baseline - $credit->current) * 100) / $credit->baseline;
            $step3 = ((int)$step3 >= 100) ? 100: (int)$step3;
            $step3 = ((int)$step3 <= 0) ? 0: (int)$step3;
        }else{
            if($credit->baseline == 0) $step3 = 0; 
            if($credit->current == 0) $step3 = 100; 
        } 

        if ($debt->current > 0 && $debt->baseline > 0) { 
            $step4 =  ($debt->baseline - $debt->current) * 100 / $debt->baseline;
            $step4 = ((int)$step4 > 100) ? 100: (int)$step4;
            $step4 = ((int)$step4 <= 0) ? 0: (int)$step4;
        }else{
            if($debt->baseline == 0) $step4 = 0; 
            if($debt->current == 0) $step4= 100; 
        }

        if ($education->current > 0 && $education->target > 0) {
            $step5 = ($education->current * 100) / $education->target;
            $step5 = ((int)$step5 > 100) ? 100: (int)$step5;
            $step5 = ((int)$step5 <= 0) ? 0: (int)$step5;
        }else{
            $step5 = 0;
        }

        if ($freedom->current > 0 && $freedom->target > 0) {
            $step6 = ($freedom->current * 100) / $freedom->target;
            $step6 = ((int)$step6 > 100) ? 100: (int)$step6;
            $step6 = ((int)$step6 <= 0) ? 0: (int)$step6;
        }else{
            $step6 = 0;
        }

        if ($grand->current > 0 && $grand->target > 0) {
            $step7 = ($grand->current * 100) / $grand->target;
            $step7 = ((int)$step7 > 100) ? 100: (int)$step7;
            $step7 = ((int)$step7 <= 0) ? 0: (int)$step7;
        }else{
            $step7 = 0;
        }
        
        // return compact('step1', 'step2', 'step3', 'step4', 'step5','step6','step7');
        return compact('step7', 'step6', 'step5', 'step4', 'step3','step2','step1');
    }

    public static function initSevenG($user){
        $alpha = Alpha::where('user_id', $user->id)->first();
        $beta = Beta::where('user_id', $user->id)->first();
        $credit = Credit::where('user_id', $user->id)->first();
        $dept = Dept::where('user_id', $user->id)->first();
        $education = Education::where('user_id', $user->id)->first();
        $freedom = Freedom::where('user_id', $user->id)->first();
        $grand = Grand::where('user_id', $user->id)->first();
        
        if (!$alpha)  Alpha::create([ 'user_id' => $user->id]);
        if (!$beta)  Beta::create([ 'user_id' => $user->id]);
        if (!$credit)  Credit::create([ 'user_id' => $user->id]);
        if (!$dept)  Dept::create([ 'user_id' => $user->id]);
        if (!$education)  Education::create([ 'user_id' => $user->id]);
        if (!$freedom)  Freedom::create([ 'user_id' => $user->id]);
        if (!$grand)  Grand::create([ 'user_id' => $user->id]);
    }
    
    public static function stepBack($user, $mains){
        $questions = Question::where('user_id', $user->id)->first();
        $quest = Helper::convertToSnapshot($questions);
        $seveng = AnalyticsClass::valSevenG($user);
        $steps = []; $backgrounds = [];

        foreach ($quest as $key => $val) {
            $i = (int)$key + (int)1;
            if($mains[$key] == 1){
                $step = $seveng[$key];
                $val = 1;
            }else{
                $step = $quest[$key];
                $val = 0; 
            } 
            $bg = ($val)  ? Helper::numPercentageColor($step) : '#494949';
            array_push($steps, $step);
            array_push($backgrounds, $bg);
        }
        return compact('steps', 'backgrounds');
    }

    public static function seveng_steps(){
        // Variable
        $user = auth()->user();
        AnalyticsClass::initSevenG($user);
         // Analytics
        $alpha = Alpha::where('user_id', $user->id)->select('current','target')->first();
        $beta = Beta::where('user_id', $user->id)->select('current','target')->first();
        $credit = Credit::where('user_id', $user->id)->select('current','baseline')->first();
        $debt = Dept::where('user_id', $user->id)->select('current','baseline')->first();
        $education = Education::where('user_id', $user->id)->select('current','target')->first();
        $freedom = Freedom::where('user_id', $user->id)->select('current','target')->first();
        $grand = Grand::where('user_id', $user->id)->select('current','target')->first();
        
        $seveng = ['grand'=>$grand,'freedom'=>$freedom, 'education'=>$education, 'debt'=>$debt
                    ,'credit'=>$credit,'beta'=>$beta, 'alpha'=> $alpha ]; 
        
        return compact('seveng');
        
    }

    public static function valBespoke($bespoke){
        // var_dump($bespoke[0]); return;
        $bespokes = []; 
        for ($index=0; $index <= 6; $index++) { 
            $name = '';  $value = 0; $bg = '';
            if(isset($bespoke[$index]) ){
                if($bespoke[$index]->bespoke_type == 'saveup') {
                    $value = ($bespoke[$index]->current > 0 && $bespoke[$index]->target > 0) ? $bespoke[$index]->current * 100 /  $bespoke[$index]->target : 0;
                }else if($bespoke[$index]->bespoke_type == 'dept') {
                    $value = ($bespoke[$index]->current > 0 && $bespoke[$index]->baseline > 0) ? ($bespoke[$index]->baseline - $bespoke[$index]->current) * 100 / $bespoke[$index]->baseline : 0;
                }
                $value = ((int)$value > 100) ? 100: (int)$value;
                $value = ((int)$value <= 0) ? 0: (int)$value;
                $value = number_format($value);
                $name = $bespoke[$index]->kpi_name;
                $bg = HelperClass::numPercentageColor($value);
                $custom = compact('name', 'value', 'bg');
            }else{
                $custom = compact('name', 'value', 'bg');
            }
            array_push($bespokes, $custom);
        } 
        return $bespokes;
    }
}