<?php

namespace App\Http\Controllers\API\v2;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Helper\IncomeHelper;
use App\Helper\CalculatorClass as Fin;
use App\FinicialCalculator as Calculator;

use App\Helper\GapExchangeHelper;
use App\Helper\ArchiveAccount;
use App\Wheel\IncomeAccount as Income;
use App\Asset\PortfolioAsset;
use App\Helper\CalculatorClass;
use App\Helper\GapAccountCalculator as GapAccount;
use App\Wheel\ProtectionAccount as Protection;
use App\Wheel\PensionAccount as Pension;
use App\Helper\WheelClass as Wheel;
use App\User;
use App\UserAudit as Audit;


class IndependenceAPI extends Controller
{
    public function storeProtection(Request  $request){
        $user = $request->user();
        Validator::extend('before_or_equal', function($attribute, $value, $parameters, $validator) {
            return strtotime($validator->getData()[$parameters[0]]) >= strtotime($value);
          }, 'Date entered is not correct.'); 
          
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'type' => 'required',
            'details' => 'required',
            'contact' => 'required',
            'premium' => 'required',
            'pay_freq' => 'required',
            'pay_type' => 'required', 
            'cover_start' => 'required|date|before:yesterday|before_or_equal:cover_end',
            'cover_end' => 'required|date',
            'document'=>'required',
        ]);  
        
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        // Validator   
        $document = '';
        if($request->hasFile('document')){
            $request->validate(['document'=>'min: 5|max:5000|mimes:docx,pdf,doc,txt']);
            $fileType = $request->file('document')->getClientMimeType();
            $ext = $request->file('document')->getClientOriginalExtension();
            $fileNameStore = sha1(time()). rand(100000, 999999) . '.'.$ext;
            $document = $request->file('document')->storeAs('public/user', $fileNameStore);
        } 

        $protection = new Protection();
        $protection->user_id = $user->id;
        $protection->protection_category = $request->category;
        $protection->protection_type = $request->type;
        $protection->details =     $request->details;
        $protection->provider_contact =     $request->contact;
        $protection->sum_assured =     $request->sum_assured;
        $protection->premium_pay =     $request->premium;
        $protection->pay_frequency =    $request->pay_freq;
        $protection->payment_type =    $request->pay_type;

        $protection->cover_start =     $request->cover_start;
        $protection->cover_end =     $request->cover_end;
        $protection->document =     $document;
        $protection->save();
        $success = true; 
        Wheel::updateProtectionTile($user);
        return response()->json(compact('success', 'protection'));
    }
 
    public function protection(Request $request){
        $user = $request->user(); 
        $header =  $request->get('header');
        $access =  $request->get('access');
        $account =  $request->get('account');
        $archive =  $request->get('archive');
        if($header){
           return ArchiveAccount::protectionArchiveAction($user, $header, $access, $account);
        }
        
        if($archive){
            $protection = Protection::where('user_id', $user->id)->where('isArchive', 1)->latest()->get();
        }else{
            $protection = Protection::where('user_id', $user->id)->where('isArchive', 0)->latest()->get();
        }

        $protection_items = Protection::where('user_id', $user->id)->count();
        $protection_detail = GapAccount::calcProtectionAccount($protection);
         
        return response()->json(compact('protection','protection_detail'));
    } 

    public function updateProtection(Request $request, $id){
        Validator::extend('before_or_equal', function($attribute, $value, $parameters, $validator) {
            return strtotime($validator->getData()[$parameters[0]]) >= strtotime($value);
          }, 'Date entered is not correct.');
         $user = $request->user();  

        $validator = Validator::make($request->all(), [
            'details' => 'required',
            'provider_contact' => 'required',
            'premium_pay' => 'required',
            'sum_assured' => 'required|numeric|min:0',
            'pay_frequently' => 'required',
            'pay_typed' => 'required', 
            'protection_type' => 'required', 
            'cover_start' => 'required|date|before:yesterday|before_or_equal:cover_end',
            'cover_end' => 'required|date'
        ]); 
         
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
  
        $protection =  Protection::where('user_id', $user->id)->where('id', $id)->first();;
        // $protection->user_id = $user->id;
        $protection->details =     $request->details;
        $protection->sum_assured =     $request->sum_assured;
        $protection->provider_contact = $request->provider_contact;
        $protection->pay_frequency =    $request->pay_frequently;
        $protection->protection_type = $request->protection_type;
        $protection->premium_pay =     $request->premium_pay;
        $protection->payment_type =    $request->pay_typed;

        $protection->cover_start =     $request->cover_start;
        $protection->cover_end =     $request->cover_end;
        $protection->save(); 
        $success = true;  
        Wheel::updateProtectionTile($user);
        return response()->json(compact('success', 'protection'));
    }

    public function storeRetirement(Request $request){
        $max_year = date('Y-m-d', strtotime('-18 years'));
        $validator = Validator::make($request->all(), [
            'pension_name' => 'required',
            'pension_type' => 'required',
            'current' => 'required|numeric:min:0',
            'assured_income' => 'required|numeric:min:0',
            'monthly_cont' => 'required|numeric|min:0',
            'pension_provider' => 'required',
            'retire_age' => 'required',
            'dob' => 'date|before:'.$max_year
        ], [
            'date.before' => 'Input a correct date of Birth: GAPhub user must be at least 18 years of age.',
        ]); 

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = $request->user(); 
        $user = User::find($user->id); 
        $profile = $user->profile;  
        if($request->dob && !$profile->date_of_birth){
            $profile->date_of_birth = $request->dob;
            $profile->dob_count = $profile->dob_count + 1;
            $profile->save(); 
        }

        $pension_items = Pension::where('user_id', $user->id)->count();
        if($pension_items <= 12){
            $pension = new Pension();
            $pension->user_id = $user->id; 
            $pension->name = $request->pension_name;
            $pension->pension_type = $request->pension_type;
            $pension->provider = $request->pension_provider;
            $pension->current = $request->current;
            $pension->assured_income = $request->assured_income;
            // $pension->dob = $request->dob;
            $pension->percentage_cos = 0;
            $pension->monthly_contribution = $request->monthly_cont;
            $pension->retirement_age = $request->retire_age;
            $pension->save();
            $success = true;  
            $myaccount = Pension::where('user_id', $user->id)->latest()->get();
            $account_items = Pension::where('user_id', $user->id)->count();
            $account_detail = GapAccount::calcPensionAccount($myaccount, $user);
            GapAccount::saveUpdatedTiles($user, 'retirement', $account_items, $account_detail['sum'] );

            return response()->json(compact('success', 'pension'));
        }else{
            $success = false;  $msg = "You can't add more than 12 Pension Account"; 
            return response()->json(compact('success', 'pension'));
        }
    }

    public function retirement(Request $request){
        $user = $request->user(); 
        $header =  $request->get('header');
        $access =  $request->get('access');
        $account =  $request->get('account');
        $archive =  $request->get('archive');
        if($header){
           return ArchiveAccount::pensionArchiveAction($user, $header, $access, $account);
        }
       
        if($archive){
            $retirement = Pension::where('user_id', $user->id)->where('isArchive', 1)->latest()->get();
        }else{
            $retirement = Pension::where('user_id', $user->id)->where('isArchive', 0)->latest()->get();
        }
        
        $profile = $user->user_profile;
        $dob = $profile->date_of_birth;
 
        if($dob){
            $average_seed = CalculatorClass::averageSeedDetail($user)['total'];
            $retirement = GapAccount::pensionPOT($retirement, $dob, $average_seed);
        } 
        $retirement_items = Pension::where('user_id', $user->id)->count();
        $retirement_detail = GapAccount::calcPensionAccount($retirement);
        $backgrounds = GapAccount::accountBackground();
        return response()->json(compact('retirement','retirement_detail'));
    } 
    
    public function roi_status(Request $request){
        $user = $request->user(); 
        $fin =  Fin::finicial($user);
        $monthly_asset = $fin['cost']; $saving = $fin['saving'];
        $portfolio = $fin['portfolio']; $roce = $fin['roce'];
        $investment = $fin['investment'];
        $improve_status = compact('monthly_asset', 'saving', 'portfolio', 'roce', 'investment');
        $roi_detail = GapAccount::calcRoiInvestment($improve_status); 
        return response()->json(compact('improve_status','roi_detail'));
    }

    public function improveRoi(Request $request){
        $user = $request->user(); 
        $validator = Validator::make($request->all(), [
            'investment'  => 'required|numeric|min:10',
            'roce'  => 'required|integer|min:1'  
        ]); 
        $calculate = Calculator::where('user_id', $user->id)->first();
        $calculate->roce = $request->roce;
        $calculate->investment = $request->investment;
        $calculate->save(); 
        return response()->json(compact('calculate'));
    }
    
    public function income(Request $request){
        $user = $request->user();
        $header =  $request->get('header');
        $access =  $request->get('access');
        $account =  $request->get('account');
        $archive =  $request->get('archive');
        $period =  $request->get('period');
        $income =  $request->get('income');
        $crd =  $request->get('crd');
        $alo =  $request->get('alo');
        if($header){ 
           // Periodical Helper 
            if($period){
                $income_helper = new IncomeHelper();
                return $income_helper->addNewNonPorfolioRecord($user, $income, $header, $access, $period);
            }  
            // Archive Income 
            if($account) return ArchiveAccount::incomeArchiveAction($user, $header, $access, $account);
        } 

        if($crd && $alo){
            $res =  GapExchangeHelper::submitIncomeAllocation($user, $crd, $alo);
            return response()->json(compact('res'));
        }

        $portfolio_asset =  PortfolioAsset::where('user_id', $user->id)->where('asset_category', 'existing')->where('isArchive', 0)->get();
        if($archive){
            $incomes = Income::where('user_id', $user->id)->where('isArchive', 1)->orderBy('income_date', 'DESC')->get();
        }else{
            $incomes = Income::where('user_id', $user->id)->where('isArchive', 0)->orderBy('income_date', 'DESC')->get();
        } 
        $income_helper = new IncomeHelper();
        foreach($incomes as $money){ 
            $money->currency = explode(" ", $money->income_currency)[0];
            if($money->income_type == 'portfolio') {
                $money->chart = $income_helper->portfolioDetailChart($user,$money);  
            }else{
                $money->chart = $income_helper->nonPortfolioDetailChart($user,$money); 
            }
        }
        $fin = Fin::finicial($user);

        $income_info = IncomeHelper::analyseIncome($user, $fin['portfolio']);
        $income_detail = GapAccount::calcIncomeAccount($user,$incomes);
        $income_audit = Audit::where('user_id', $user->id)->select('income_allocated')->first();
        
        $income_channels = $income_helper->getIncomeChannels($user, $incomes, $income_info['total_portfolio']);
        $income_chart = $income_helper->getIncomeCharacteristics($user);
        return response()->json(compact('incomes','portfolio_asset','income_detail','income_channels', 'income_chart','income_info', 'income_audit'));
    }
     
    public function storeIncome(Request $request){
        $user = $request->user(); 
        $validator = Validator::make($request->all(), [
            'income_type' => 'required|in:portfolio,non_portfolio',
            'income_date' => 'nullable|date|before:today',
           
        ]);
        if($request->income_type == 'non_portfolio'){
            $validator = Validator::make($request->all(),[
                'amount' => 'required|numeric',
                'income_name' => 'required|max:50',
                'channel' => 'required'
            ]);    
        }else{
             $validator = Validator::make($request->all(),['portfolio_asset' => 'required|integer']);
        }  
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $new_income = IncomeHelper::addNewIncome($user, $request);
        return response()->json(['success' => $new_income,'msg' => 'New Income Account has been saved succesfully']); 
    }

    
    public function updateIncome(Request $request, $id){
        $user = $request->user(); 
        $validator = Validator::make($request->all(), [
            // 'income_type' => 'required|in:portfolio,non_portfolio',
            'income_date' => 'nullable|date|before:today'
        ]);
         
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        // if($request->income_type == 'non_portfolio'){
        //     $validator = Validator::make($request->all(),['income_value' => 'required|numeric']);  
        // }else{
        //     $validator = Validator::make($request->all(),['portfolio_asset' => 'required|integer']);
        // }
        $success = true;
        $income =  Income::where('user_id', $user->id)->where('id', $id)->first();
        $income->automated = $request->automated_rate; 
        $income->income_date = $request->income_date;
        $income->income_frequency = $request->income_frequency;
       
        $income->update();  
        Wheel::updateIncomeTile($user); 
        return response()->json(compact('success', 'income'));
    }

    /**
     * Update Non Asset Porrtfolio Income
     * 
     * Update Non Portfolio Period
     * @return Boolean 
     */
    
    public function updateIncomeRecord(Request $request, $id){
        $user = $request->user(); 
        
        $validator = Validator::make($request->all(), [
            'note' => 'max:256',
            'record_period' => 'required',
            'amount' => 'required|min:0|numeric',
            'record_period' => 'date:Y-m'
        ],[  
            'record_period.date' => 'Incorrect Period'
        ]); 
        $period = $request->record_period.'-01'; 
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        // info([$request->all(), $period]);
        // Update The Non-Portfolio Asset
        $status = IncomeHelper::updateNonPeriodRecord($user, $period, $id, $request);
        if($status){ 
            return response()->json([ 'status'=> true, 'msg'=> 'Asset Record Updated successfully'], 201); 
        }else{
            return response()->json([ 'status'=> false, 'msg'=> 'Asset not found'], 404); 
        }
    }

    public function updatRetirement(Request $request, $id){
        $user = $request->user(); 

        $validator = Validator::make($request->all(), [
            // 'current' => 'required|min:0|integer',
            // 'assured_income' => 'required|min:0|integer',
            'monthly' => 'required|min:0|integer',
            'retirement' => 'required|min:18|integer',
            'provider' => 'required',
        ]);  
 
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        
        $pension =  Pension::where('user_id', $user->id)->where('id', $id)->first();
        // info($pension);
        if($pension){
            // $pension->current = $request->current;
            // $pension->assured_income = $request->assured_income;
            $pension->retirement_age = $request->retirement;
            $pension->provider = $request->provider;
            $pension->monthly_contribution = $request->monthly;
            $pension->save();
    
            $myaccount = Pension::where('user_id', $user->id)->latest()->get();
            $account_items = Pension::where('user_id', $user->id)->count();
            $account_detail = GapAccount::calcPensionAccount($myaccount, $user);
            GapAccount::saveUpdatedTiles($user, 'retirement', $account_items, $account_detail['sum'] );
    
            return response()->json(['success' => true, 'pension' => $pension]); 
        }else{
            return response()->json(['success' => false, 'error' => 'Pension not found'], 404); 
        }
    }
}
 