<?php

namespace App\Http\Controllers\API\v2;

use Illuminate\Http\Request;

use App\Helper\CalculatorClass as Fin;
use App\FinicialCalculator as Calculator;
use App\FinicialQuestion as Question;
use App\Helper\GapExchangeHelper;
use App\Helper\HelperClass as Helper;
use App\Helper\IntegrationParties;
use Illuminate\Support\Facades\Validator;

use App\SevenG\AlphaFin as Alpha;
use App\SevenG\BespokeKPI;
use App\SevenG\BetaFin as Beta;
use App\SevenG\CreditFin as Credit;
use App\SevenG\DeptFin as Dept;
use App\SevenG\EducationFin as Education;
use App\SevenG\FreedomFin as Freedom;
use App\SevenG\GrandFin as Grand;

use App\Helper\AnalyticsClass;
use App\Helper\WheelClass as Wheel;
use App\Http\Controllers\Controller;
use App\UserProfile as Profile;
use App\Wheel\CashAccount;
use App\Wheel\LiabilityAccount;

class SevenGAPI extends Controller
{


    /**
     * SevenG Information
     *
     * Get all Seveng details and Information
     * @response {
     *
     *
     * }
     */
    public function index(Request $request)
    {
        $user = $request->user();
        AnalyticsClass::initSevenG($user);
        $questions = Question::where('user_id', $user->id)->first();
        $calculator = Calculator::where('user_id', $user->id)->first();
        $quest = Helper::convertToSnapshot($questions);

        $seveng = AnalyticsClass::valSevenG($user);
        $steps = []; $backgrounds = [];
        $alpha = Alpha::where('user_id', $user->id)->first();
        $beta = Beta::where('user_id', $user->id)->first();
        $credit = Credit::where('user_id', $user->id)->first();
        $dept = Dept::where('user_id', $user->id)->first();
        $education = Education::where('user_id', $user->id)->first();
        $freedom = Freedom::where('user_id', $user->id)->first();
        $grand = Grand::where('user_id', $user->id)->first();

        $mains = ['step7'=>$grand->main,'step6'=>$freedom->main, 'step5'=>$education->main, 'step4'=>$dept->main
                    ,'step3'=>$credit->main,'step2'=>$beta->main, 'step1'=> $alpha->main ];

        AnalyticsClass::initBudgetValue($user,$credit,$dept,$freedom, $grand);

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
            // array_push($steps, compact('step', 'val', 'bg'));
        }

        $total_bespoke = BespokeKPI::where('user_id', $user->id)->where('isAnalytics', 1)->count();
        $user_bespokes = BespokeKPI::where('user_id', $user->id)->where('isAnalytics', 1)->latest()->limit(7)->get();
        $wheel_bespoke = GapExchangeHelper::bespokeInWheel($user, $total_bespoke);
        foreach($wheel_bespoke as $bespoke){
            if(count($user_bespokes) < 7){
                $user_bespokes->push($bespoke);
            }
        }

        $total_bespoke = count($user_bespokes);
        $bespokes = AnalyticsClass::valBespoke($user_bespokes);

        return response()->json(compact('steps', 'backgrounds', 'bespokes', 'total_bespoke', 'questions'));
    }


    /**
     * Bespoke Information
     *
     * Get all bespoke details and Information
     * @response {
     *
     *
     * }
     */
    public function showBespoke(Request $request)
    {
         $user = $request->user();
         $total_bespoke = BespokeKPI::where('user_id', $user->id)->where('isAnalytics', 1)->count();
         $user_bespokes = BespokeKPI::where('user_id', $user->id)->where('isAnalytics', 1)->latest()->limit(7)->get();
         $wheel_bespoke = GapExchangeHelper::bespokeInWheel($user, $total_bespoke);
         foreach($wheel_bespoke as $bespoke){
             if(count($user_bespokes) < 7){
                 $user_bespokes->push($bespoke);
             }
         }

         $total_bespoke = count($user_bespokes);
         $bespokes = AnalyticsClass::valBespoke($user_bespokes);

         return response()->json(compact('user_bespokes', 'total_bespoke', 'bespokes'));
    }

    public function snapshot(Request $request)
    {
        $user =  $request->user();
        if($user){
            $profile = $user->profile;
            if (!$profile) {
                $profile = new Profile(); $profile->save();
                $user->profile_id  = $profile->id;
                $user->save();
            }
        }

        $financial =  Fin::finicial($user);
        $calculator = Calculator::where('user_id', $user->id)->first();
        $snapshot = Fin::snapshot($financial['calculator'], $financial['cost']);
        $currency = explode(" ", $calculator->currency)[0];

        return response()->json([
            'status' => true,
            'data' => compact('currency','financial', 'snapshot'),
            'message' => ''
        ]);
    }

    public function create(Request $request)
    {
        $user =  $request->user();
        $currency = Calculator::where('user_id', $user->id )->first();
        $symbol = explode(' ', $currency->currency)[0];
        $alpha = Alpha::where('user_id', $user->id)->first();
        $beta = Beta::where('user_id', $user->id)->first();
        $credit = Credit::where('user_id', $user->id)->first();
        $dept = Dept::where('user_id', $user->id)->first();
        $education = Education::where('user_id', $user->id)->first();
        $freedom = Freedom::where('user_id', $user->id)->first();
        $grand = Grand::where('user_id', $user->id)->first();

        // List Validated SevenG
        $mains = ['step7'=>$grand->main,'step6'=>$freedom->main, 'step5'=>$education->main, 'step4'=>$dept->main
                    ,'step3'=>$credit->main,'step2'=>$beta->main, 'step1'=> $alpha->main ];

        AnalyticsClass::initBudgetValue($user,$credit, $dept,$freedom, $grand);
        $stepBack = $this->stepBack($user, $mains);

        $steps = $stepBack['steps'];
        $backgrounds = $stepBack['backgrounds'];
        $data = compact('alpha','beta','credit','dept','education', 'freedom',
                        'grand','symbol', 'steps', 'backgrounds');

        return response()->json([
            'status' => true,'data' => $data,
            'message' => ''
        ]);
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
            // array_push($steps, compact('step', 'val', 'bg'));
        }

        return compact('steps', 'backgrounds');
    }

    /** * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user =  $request->user();
        $validator = Validator::make($request->all(), [ 'seveng' => 'required' ]);

        $calculator = Calculator::where('user_id', $user->id)->first();

        if($validator->fails()){
            return response()->json(['status' => false, 'errors' => $validator->errors()->toJson()], 400);
        }

        if($request->seveng == "jahgxhnbszjhbxhbhbshsvb"){
            $validator = Validator::make($request->all(), [
                'current' => 'required|numeric',
                'target' => 'required|numeric',
                // 'current' => 'required|numeric',
            ]);

            if($validator->fails()){
                return response()->json(['status' => false, 'errors' => $validator->errors()->toJson()], 400);
            }
            $alpha = Alpha::where('user_id', $user->id)->first();
            $alpha->current = $request->current;
            $alpha->target = $request->target;
            $alpha->strategy = $request->strategy;
            // $alpha->baseline = $request->baseline;
            $alpha->main = 1;
            $alpha->save();
            $calculator->extra_save = $request->current;
            $calculator->save();
            Wheel::updateCashTile($user);
            return response()->json(['status' => true, 'data' => $alpha]);
        }

        if($request->seveng == "aqgndshsvdhsejdoksbxdvxsgd"){
            $validator = Validator::make($request->all(), [
                'current' => 'required|numeric',
                'target' => 'required|numeric',
            ]);
            if($validator->fails()){
                return response()->json(['status' => false, 'errors' => $validator->errors()->toJson()], 400);
            }
            $beta = Beta::where('user_id', $user->id)->first();
            $beta->current = $request->current;
            $beta->target = $request->target;
            $beta->strategy = $request->strategy;
            $beta->is_purchased = ($request->purchase) ? 1 : 0;
            $beta->main = 1;
            $beta->save();
            Wheel::updateCashTile($user);
            return response()->json(['status' => true, 'data' => $beta]);
        }

        if($request->seveng == "vhdjacxjhsshjkshgksgfsfdhghj"){
            $validator = Validator::make($request->all(), [
                'current' => 'required|numeric',
                'baseline' => 'required|numeric',
            ]);
            if($validator->fails()){
                return response()->json(['status' => false, 'errors' => $validator->errors()->toJson()], 400);
            }

            $credit = Credit::where('user_id', $user->id)->first();
            $credit->current = $request->current;
            $credit->strategy = $request->strategy;
            $credit->main = 1;
            $credit->baseline = $request->baseline;
            $credit->save();
            Wheel::updateLiabilityTile($user);
            return response()->json(['status' => true, 'data' => $credit]);
        }
        if($request->seveng == "danhbxbxnjxvn7wxdsvabxzuiwgd"){
            $validator = Validator::make($request->all(), [
                'current' => 'required|numeric',
                'baseline' => 'required|numeric',
                // 'current' => 'required|numeric',
            ]);
            if($validator->fails()){
                return response()->json(['status' => false, 'errors' => $validator->errors()->toJson()], 400);
            }
            $dept = Dept::where('user_id', $user->id)->first();
            $dept->current = $request->current;
            $dept->strategy = $request->strategy;
            $dept->baseline = $request->baseline;
            $dept->main = 1;
            $dept->save();
            Wheel::updateMortgageTile($user);
            return response()->json(['status' => true, 'data' => $dept]);
        }

        if($request->seveng == "jbdjnzbaahnbshbjsuwjssdzks"){
            $validator = Validator::make($request->all(), [
                'current' => 'required|numeric',
                'target' => 'required|numeric',
                // 'current' => 'required|numeric',
            ]);
            if($validator->fails()){
                return response()->json(['status' => false, 'errors' => $validator->errors()->toJson()], 400);
            }
            $edu = Education::where('user_id', $user->id)->first();
            $edu->current = $request->current;
            $edu->target = $request->target;
            $edu->strategy = $request->strategy;
            $edu->main = 1;
            $edu->save();
            return response()->json(['status' => true, 'data' => $edu]);
        }

        if($request->seveng == "x32shzaqwsbxbjmazajxbvvsuw3vx"){
            $fin =  Fin::finicial($user);
            $validator = Validator::make($request->all(), [
                'current' => 'required|numeric',
                // 'target' => 'required|numeric'
            ]);
            if($validator->fails()){
                return response()->json(['status' => false, 'errors' => $validator->errors()->toJson()], 400);
            }
            $freedom = Freedom::where('user_id', $user->id)->first();
            $calculator->other_income = $request->current;
            $freedom->current = $request->current;
            $calculator->save();
            $freedom->target = $fin['cost'];
            $freedom->strategy = $request->strategy;
            $freedom->main = 1;
            $freedom->save();
            return response()->json(['status' => true, 'data' => $freedom]);
        }

        if($request->seveng == "ggs5dbwexsxgxbxjzgjabajzxhsgzah"){
            $validator = Validator::make($request->all(), [
                'current' => 'required|numeric',
                // 'target' => 'required|numeric',
            ]);
            if($validator->fails()){
                return response()->json(['status' => false, 'errors' => $validator->errors()->toJson()], 400);
            }
            $grand = Grand::where('user_id', $user->id)->first();
            $grand->current = $request->current;
            $grand->main = 1;
            $grand->target = $request->target;
            $grand->strategy = $request->strategy;
            $grand->save();
            Wheel::updateGivingTile($user);
            return response()->json(['status' => true, 'data' => $grand]);
        }
        return response()->json(['error' => 'No SevenG Information']);
    }

    public function storeBespoke(Request $request){
        $user =  $request->user();
        $bespokes = BespokeKPI::where('user_id', $user->id)->latest()->limit(7)->get();
        $validator = Validator::make($request->all(),  [ 'bespoke' => 'required']);

        if($validator->fails()){
            return response()->json(['status' => false, 'errors' => $validator->errors()->toJson()], 400);
        }
        if($request->bespoke == "samnbvsjhnbvsnhbvsnvsjhsvnxjhxnvhbnvx"){
             $validator = Validator::make($request->all(),  [
                'kpi_name' => 'required',
                'purpose' => 'required',
                'cash' => 'required',
                'details' => 'required',
                'target' => 'required',
                'current' => 'required',
            ]);

            if($validator->fails()){
                return response()->json(['status' => false, 'errors' => $validator->errors()->toJson()], 400);
            }
            $saveup = new BespokeKPI();
            $saveup->user_id = $user->id;
            $saveup->kpi_name = $request->kpi_name;
            $saveup->bespoke_type = 'saveup';
            $saveup->savings_purposes = $request->purpose;
            $saveup->cash_keptin = $request->cash;
            $saveup->kpi_details = $request->details;
            $saveup->target = $request->target;
            $saveup->current = $request->current;
            $saveup->save();
            return response()->json(['status' => true, 'data' => $saveup]);
        }
        if($request->bespoke == "dejhiojdnoijdnsnvhbnvxjhxnvsjhsvnxshyg"){
             $validator = Validator::make($request->all(),  [
                'kpi_name' => 'required',
                'interest' => 'required',
                'dept_type' => 'required',
                'details' => 'required',
                'baseline' => 'required',
                'current' => 'required',
            ]);
            $dept = new BespokeKPI();
            $dept->user_id = $user->id;
            $dept->kpi_name = $request->kpi_name;
            $dept->bespoke_type = 'dept';
            $dept->dept_interest = $request->interest;
            $dept->dept_types = $request->dept_type;
            $dept->kpi_details = $request->details;
            $dept->baseline = $request->baseline;
            $dept->current = $request->current;
            $dept->save();
            return response()->json(['status' => true, 'data' => $dept]);
        }
        return response()->json(['error' => 'Can not Save Bespoke' ]);
    }

    public function updateBespoke(Request $request, $id)
    {
        $user = $request->user();

        // If no account parameter is provided, update a BespokeKPI record.
        if (!$request->account) {
            $bespoke = BespokeKPI::where('user_id', $user->id)
                                  ->where('id', $id)
                                  ->first();
            // info(['Upfate Bespoke', $bespoke->id,$bespoke->current , $bespoke->bespoke_type, $request->all()]);
            if (!$bespoke) {
                return response()->json(['error' => 'Bespoke not found'], 404);
            }

            if ($bespoke->bespoke_type == 'saveup') {
                $validator = Validator::make($request->all(), [
                    'target'  => 'required',
                    'current' => 'required',
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'errors' => $validator->errors()->toJson()
                    ], 400);
                }

                $bespoke->current = $request->current;
                $bespoke->target  = $request->target;
                $bespoke->extra   = $request->strategy;
                $bespoke->kpi_details   = $request->details;
                $bespoke->save();

                // info($bespoke);
                return response()->json([
                    'status' => true,
                    'message' => 'Bespoke saved successfully',
                    'data' => $bespoke
                ]);
            } elseif ($bespoke->bespoke_type == 'dept') {
                $validator = Validator::make($request->all(), [
                    'baseline' => 'required',
                    'current'  => 'required',
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'errors' => $validator->errors()->toJson()
                    ], 400);
                }

                $bespoke->current   = $request->current;
                $bespoke->baseline  = $request->baseline;
                $bespoke->extra     = $request->strategy;
                $bespoke->kpi_details   = $request->details;
                $bespoke->save();

                return response()->json(['message' => 'Bespoke saved successfully']);
            }
        }
        // Otherwise, update an account record based on the account code.
        else {
            if ($request->account == "aznjzbhxjnsxjbnxhsjgczbhzbvcjhbxvnbjhjzcb") {
                $this->validate($request, [
                    'target'  => 'required',
                    'current' => 'required',
                ]);

                $cash = CashAccount::where('user_id', $user->id)
                                   ->where('id', $id)
                                   ->first();

                if (!$cash) {
                    return response()->json(['error' => 'Cash account not found'], 404);
                }

                $cash->current = $request->current;
                $cash->target  = $request->target;
                $cash->extra   = $request->strategy;
                $cash->save();

                return response()->json(['message' => 'Bespoke KPI saved successfully']);
            }

            if ($request->account == "skjnaznkszxjnszjnzjnzjnmhjzbnhjxvgyzbjhbxc") {
                $this->validate($request, [
                    'baseline' => 'required',
                    'current'  => 'required',
                ]);

                $liability = LiabilityAccount::where('user_id', $user->id)
                                             ->where('id', $id)
                                             ->first();

                if (!$liability) {
                    return response()->json(['error' => 'Liability account not found'], 404);
                }

                $liability->current   = $request->current;
                $liability->baseline  = $request->baseline;
                $liability->extra     = $request->strategy;
                $liability->save();

                return response()->json(['message' => 'Bespoke KPI saved successfully']);
            }
        }

        return response()->json(['error' => 'Bespoke is not found'], 404);
    }


    public function createBudget(Request $request)
    {
        $user =  $request->user();
        $calculate = Calculator::where('user_id', $user->id)->first();

        $validator = Validator::make($request->all(), [
            'currency' => 'required',
            'mortgage' => 'required|numeric|min:0',
            'periodic_savings' => 'required|numeric|min:0',
            'education' => 'required|numeric|min:0',
            'charity' => 'required|numeric|min:0',
            'mobility' => 'required|numeric|min:0',
            'utility' => 'required|numeric|min:0',
            'expenses' => 'required|numeric|min:0',
            'dept_repay' => 'required|numeric|min:0'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()->toJson()
            ], 400);
        }

        $calculate->currency = $request->currency;
        $calculate->mortgage = $request->mortgage;
        $calculate->periodic_savings = $request->periodic_savings;
        $calculate->expenses = $request->expenses;
        $calculate->charity = $request->charity;
        $calculate->education = $request->education;
        $calculate->utility = $request->utility;
        $calculate->mobility = $request->mobility;
        $calculate->dept_repay = $request->dept_repay;
        $calculate->save();

        return response()->json(['status' => true, 'data' => $calculate]);
    }

    public function createPortfolio(Request $request)
    {
        $user =  $request->user();
        $calculate = Calculator::where('user_id', $user->id)->first();

        $validator = Validator::make($request->all(), [
            'other_income' => 'required|numeric|min:0',
            'extra_save' => 'required|numeric|min:0'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()->toJson()
            ], 400);
        }

        $calculate->other_income = $request->other_income;
        $calculate->extra_save = $request->extra_save;
        $calculate->save();

        return response()->json(['status' => true, 'data' => $calculate]);
    }

    public function createInvestment(Request $request)
    {
        $user =  $request->user();
        $calculate = Calculator::where('user_id', $user->id)->first();

        $validator = Validator::make($request->all(), [
            'roce' => 'required|numeric|min:0',
            'investment' => 'required|numeric|min:0',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()->toJson()
            ], 400);
        }

        $calculate->roce = $request->roce;
        $calculate->investment = $request->investment;
        $calculate->save();

        return response()->json(['status' => true, 'data' => $calculate]);
    }


    public function recommendations(Request $request)
    {
        $user = $request->user();

        $calculator = Calculator::where('user_id', $user->id)->first();
        $financial =  Fin::finicial($user); // Financial Information

        $income = $calculator->other_income;
        $seed_cost = $financial['cost'];
        $expenditure = ($seed_cost * 12) * 100;
        $shortfall = $seed_cost - $income;

        // Avoid division by zero
        $average = ($calculator->roce != 0) ? (($shortfall * 12) * 100) / $calculator->roce : 0;
        $suggested_investment = ($calculator->roce != 0) ? ($expenditure / $calculator->roce) : 0;

        if($calculator->investment){
            $time_finiancial = ($average / $calculator->investment ) / 12 ;
            $time_finiancial = ceil((int)$time_finiancial);
            $time_finiancial_chart =($time_finiancial);
            $time_finiancial = number_format($time_finiancial, 2);
        } else{
             $time_finiancial = 'N/A';
        }

        $data = compact('calculator', 'income', 'seed_cost','expenditure','shortfall','average', 'suggested_investment', 'time_finiancial_chart', 'time_finiancial');

        return response()->json(['status' => true, 'data' => $data]);
    }

    public function calculator(Request $request)
    {
        $user =  $request->user();
        $calculator = Calculator::where('user_id', $user->id)->first();

        return response()->json([
            'status' => true,
            'data' => $calculator
        ]);
    }

    public function createCalculator(Request $request)
    {
        $user =  $request->user();
        $calculate = Calculator::where('user_id', $user->id)->first();

        $validator = Validator::make($request->all(), [
            'currency' => 'required',
            'mortgage' => 'required|numeric|min:0',
            'periodic_savings' => 'required|numeric|min:0',
            'education' => 'required|numeric|min:0',
            'charity' => 'required|numeric|min:0',
            'expenses' => 'required|numeric|min:0',
            'mobility' => 'required|numeric|min:0',
            'utility' => 'required|numeric|min:0',
            'dept_repay' => 'required|numeric|min:0',
            'other_income' => 'required|numeric|min:0',
            'extra_save' => 'required|numeric|min:0',
            'roce' => 'required|numeric|min:0',
            'investment' => 'required|numeric|min:0',
        ]);

        if($validator->fails()){
            return response()->json(['status' => false, 'errors' => $validator->errors()->toJson()], 400);
        }

        $calculate->currency = $request->currency;
        $calculate->mortgage = $request->mortgage;
        $calculate->periodic_savings = $request->periodic_savings;
        $calculate->expenses = $request->expenses;
        $calculate->charity = $request->charity;
        $calculate->education = $request->education;
        $calculate->utility = $request->utility;
        $calculate->mobility = $request->mobility;
        $calculate->dept_repay = $request->dept_repay;
        $calculate->other_income = $request->other_income;
        $calculate->extra_save = $request->extra_save;
        $calculate->roce = $request->roce;
        $calculate->investment = $request->investment;
        $calculate->save();

        return response()->json(['status' => true, 'data' => $calculate]);
    }

    public function questions(Request $request){
        $user =  $request->user();

        $validator = Validator::make($request->all(), [
            'step1' => 'required',
            'step2' => 'required',
            'step3' => 'required',
            'step4' => 'required',
            'step5' => 'required',
            'step6' => 'required',
            'step7' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['status' => false, 'errors' => $validator->errors()->toJson()], 400);
        }

        $question = Question::where('user_id', $user->id)->first();
        // return response()->json(['status' => true, 'data' => $question);
        $question->step1 =  $request->step1;
        $question->step2 =  $request->step2;
        $question->step3 =  $request->step3;
        $question->step4 =  $request->step4;
        $question->step5 =  $request->step5;
        $question->step6 =  $request->step6;
        $question->step7 =  $request->step7;
        $question->save();
        IntegrationParties::migrate_sendinblue_to_prospect($user);
        return response()->json(['status' => true, 'data' => $question]);
    }

}
