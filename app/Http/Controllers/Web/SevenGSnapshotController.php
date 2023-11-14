<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\FinicialCalculator as Calculator;
use App\FinicialQuestion as Question;

use App\SevenG\AlphaFin as Alpha;
use App\SevenG\BetaFin as Beta;
use App\SevenG\CreditFin as Credit;
use App\SevenG\DeptFin as Dept;
use App\SevenG\EducationFin as Education;
use App\SevenG\FreedomFin as Freedom;
use App\SevenG\GrandFin as Grand;

use App\Helper\CalculatorClass as Fin;
use App\Helper\GapExchangeHelper;
use App\Helper\HelperClass;
use App\Helper\AnalyticsClass;
use App\SevenG\BespokeKPI;

use App\Helper\WheelClass as Wheel;
use App\Http\Controllers\Controller;
use App\UserAudit;
use App\Wheel\CashAccount;
use App\Wheel\LiabilityAccount;
use App\Mail\SevegValidate;
use Illuminate\Support\Facades\Mail;


class SevenGSnapshotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Variable
        $user = auth()->user();

        // Mail::to('dev.kabiruwahab@gmail.com')->send(new SevegValidate($user));
        AnalyticsClass::initSevenG($user);
        $calculator = Calculator::where('user_id', $user->id)->first();
        $questions = Question::where('user_id', $user->id)->first();
        $quest = HelperClass::convertToSnapshot($questions);
        $fin =  Fin::finicial($user);
        $snap = Fin::snapshot($calculator, $fin['cost']);

        // Analytics
        $alpha = Alpha::where('user_id', $user->id)->first();
        $beta = Beta::where('user_id', $user->id)->first();
        $credit = Credit::where('user_id', $user->id)->first();
        $dept = Dept::where('user_id', $user->id)->first();
        $education = Education::where('user_id', $user->id)->first();
        $freedom = Freedom::where('user_id', $user->id)->first();
        $grand = Grand::where('user_id', $user->id)->first();

        $mains = ['step7'=>$grand->main,'step6'=>$freedom->main, 'step5'=>$education->main, 'step4'=>$dept->main
                    ,'step3'=>$credit->main,'step2'=> $beta->main, 'step1'=> $alpha->main ];
        $isValid = AnalyticsClass::isSevenGVal($user);

        if(!$alpha->main){
            $alpha->current = $fin['saving'];
         }

        // Load Page
        if ($fin['saving'] == 0 && $fin['portfolio'] == 0 && $fin['cost'] == 0) {
            $currencies = HelperClass::popularCurrenciens();
            $currency = explode(" ", $calculator->currency)[0];
            return view('guest.calculator', compact('currencies', 'user', 'calculator', 'currency'));
        }else if (!$questions->step1 || !$questions->step2 || !$questions->step3 || !$questions->step4) {
            return view('auth.registerquest');
        }else{
            AnalyticsClass::initBudgetValue($user,$credit, $dept,$freedom, $grand);
            $saveup = 0; $debt= 0;
            $total_bespoke = BespokeKPI::where('user_id', $user->id)->where('isAnalytics', 1)->count();
            $user_bespokes = BespokeKPI::where('user_id', $user->id)->where('isAnalytics', 1)->latest()->limit(7)->get();
            $wheel_bespoke = GapExchangeHelper::bespokeInWheel($user, $total_bespoke);
            foreach($wheel_bespoke as $bespoke){
                if(count($user_bespokes) < 7){
                    $user_bespokes->push($bespoke);
                }
            }
            $rand = rand(100, 9999);
            foreach($user_bespokes as $bespoke){
                if($bespoke->bespoke_type == 'saveup'){
                    $bespoke->kpi = "$saveup-$bespoke->id-$rand";
                    $saveup++;
                }
                if($bespoke->bespoke_type == 'dept'){
                    $bespoke->kpi = "$debt-$bespoke->id-$rand";
                    $debt++;
                }
            }

            $total_bespoke = count($user_bespokes);
            $bespokes = AnalyticsClass::valBespoke($user_bespokes);

            $bespoke_labels = []; $bespoke_values = [];
            $bespoke_bg = [];
            foreach ($bespokes as $bespoke) {
                array_push($bespoke_labels, $bespoke['name']);
                array_push($bespoke_values, $bespoke['value']);
                array_push($bespoke_bg, $bespoke['bg']);
            }

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
                $bg = ($val)  ? HelperClass::numPercentageColor($step) : '#494949';
                array_push($steps, $step);
                array_push($backgrounds, $bg);
            }

            $comments = HelperClass::comments();
            $symbol = explode(' ', $calculator->currency)[0];
            $page_title = 'Performance Indicators Chart';
            $support = true;

            return view('user.7g.index', compact('steps', 'backgrounds', 'alpha','beta','credit','dept','education',
                            'freedom','grand','symbol', 'comments', 'page_title', 'support','isValid', 'user_bespokes',
                        'bespoke_labels', 'bespoke_values', 'bespoke_bg', 'total_bespoke'));//->with($data);
        }
    }

    public function bespoke()
    {
        $user =  auth()->user();
        $saveup = 0; $debt= 0;
        $total_bespoke = BespokeKPI::where('user_id', $user->id)->where('isAnalytics', 1)->count();
        $user_bespokes = BespokeKPI::where('user_id', $user->id)->where('isAnalytics', 1)->latest()->limit(7)->get();
        $wheel_bespoke = GapExchangeHelper::bespokeInWheel($user, $total_bespoke);
        foreach($wheel_bespoke as $bespoke){
            if(count($user_bespokes) < 7){
                $user_bespokes->push($bespoke);
            }
        }
        $rand = rand(100, 9999);
        foreach($user_bespokes as $bespoke){
            if($bespoke->bespoke_type == 'saveup'){
                $bespoke->kpi = "$saveup-$bespoke->id-$rand";
                $saveup++;
            }
            if($bespoke->bespoke_type == 'dept'){
                $bespoke->kpi = "$debt-$bespoke->id-$rand";
                $debt++;
            }
        }

        $total_bespoke = count($user_bespokes);

        $bespokes = AnalyticsClass::valBespoke($user_bespokes);
        $calculator = Calculator::where('user_id', $user->id)->first();
        $symbol = explode(' ', $calculator->currency)[0];

        $bespoke_labels = [];$bespoke_values = [];
        $bespoke_bg = [];
        foreach ($bespokes as $bespoke) {
            array_push($bespoke_labels, $bespoke['name']);
            array_push($bespoke_values, $bespoke['value']);
            array_push($bespoke_bg, $bespoke['bg']);
        }

        return view('user.7g.bespoke.editbespoke', compact('user_bespokes', 'symbol',
            'bespoke_labels', 'bespoke_values', 'bespoke_bg', 'total_bespoke'));
    }

    public function create()
    {
        $user =  auth()->user();
        $calculator = Calculator::where('user_id', $user->id )->first();
        $fin =  Fin::finicial($user);

        $symbol = explode(' ', $calculator->currency)[0];
        $alpha = Alpha::where('user_id', $user->id)->first();
        $beta = Beta::where('user_id', $user->id)->first();
        $credit = Credit::where('user_id', $user->id)->first();
        $dept = Dept::where('user_id', $user->id)->first();
        $education = Education::where('user_id', $user->id)->first();
        $freedom = Freedom::where('user_id', $user->id)->first();
        $grand = Grand::where('user_id', $user->id)->first();

        $mains = ['step7'=>$grand->main,'step6'=>$freedom->main, 'step5'=>$education->main, 'step4'=>$dept->main
            ,'step3'=>$credit->main,'step2'=>$beta->main, 'step1'=> $alpha->main ];
        $isValid = AnalyticsClass::isSevenGVal($user);
        if(!$grand->main){
            $grand->target = $fin['cost'];
        }
        AnalyticsClass::initBudgetValue($user,$credit, $dept,$freedom, $grand);
        $stepBack = AnalyticsClass::stepBack($user, $mains);
        $steps = $stepBack['steps'];
        $backgrounds = $stepBack['backgrounds'];
        $comments = HelperClass::comments();

        $data = compact('alpha','beta','credit','dept','education', 'freedom',
                        'grand','symbol', 'steps', 'backgrounds', 'comments',
                        'isValid');

        return view('user.7g.editall')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user =  auth()->user();
        $this->validate($request, [ 'seveng' => 'required']);
        $calculator = Calculator::where('user_id', $user->id)->first();
        $fin =  Fin::finicial($user);

        if($request->seveng == "ahqghjhwtbv73jh2vxbmgsvbxcsz"){
            if($request->personal_val && $request->personal_val == 'iauhuiahjnjaknijaiiunaiujs'){
                $seveng = Alpha::where('user_id', $user->id)->first();
                $seveng->strategy = $request->strategy;
                $seveng->save();
                return response()->json(['status' => true, 'message' => 'Successfull Saved']);
            }
            $this->validate($request, [
                'current' => 'required|numeric',
                'target' => 'required|numeric',
            ]);
            $alpha = Alpha::where('user_id', $user->id)->first();
            // if(!$alpha->main){   }
            $alpha->main = 1;
            $alpha->current = $request->current;
            $alpha->target = $request->target;
            $alpha->strategy = $request->strategy;
            // $alpha->baseline = $request->baseline;
            $alpha->save();
            $calculator->extra_save = $request->current;
            $calculator->save();
            Wheel::updateCashTile($user);
            return redirect()->back();
        }
        if($request->seveng == "bjhz9qnbxb6zdjh2uxajhhvsb"){
            if($request->personal_val && $request->personal_val == 'iauhuiahjnjaknijaiiunaiujs'){
                $seveng = Beta::where('user_id', $user->id)->first();
                $seveng->strategy = $request->strategy;
                $seveng->save();
                return response()->json(['status' => true, 'message' => 'Successfull Saved']);
            }
            if($request->purchase){
                $beta = Beta::where('user_id', $user->id)->first();
                $beta->main = 1;
                $beta->is_purchased = 1;
                $beta->save();
                Wheel::updateCashTile($user);
                return redirect()->back();
            }else{
                $this->validate($request, [
                    'current' => 'required|numeric',
                    'target' => 'required|numeric',
                ]);
                $beta = Beta::where('user_id', $user->id)->first();
                $beta->current = $request->current;
                $beta->main = 1;
                $beta->target = $request->target;
                $beta->strategy = $request->strategy;
                // $beta->baseline = $request->baseline;
                $beta->save();
                Wheel::updateCashTile($user);
                return redirect()->back();
            }
        }
        if($request->seveng == "vacxjhshdjshjkshgksghjgfsfdh"){
            if($request->personal_val && $request->personal_val == 'iauhuiahjnjaknijaiiunaiujs'){
                $seveng = Credit::where('user_id', $user->id)->first();
                $seveng->strategy = $request->strategy;
                $seveng->save();
                return response()->json(['status' => true, 'message' => 'Successfull Saved']);
            }
            if($request->unsecured){
                $credit = Credit::where('user_id', $user->id)->first();
                $credit->current = 0;
                $credit->baseline = 0;
                $credit->main = 1;
                $credit->save();
                $audit = UserAudit::where('user_id', $user->id)->first();
                $audit->is_allocated = 1;
                $audit->save();
                Wheel::updateLiabilityTile($user);
                return redirect()->back();
            }else{
                $this->validate($request, [
                    'current' => 'required|numeric',
                    'baseline' => 'required|numeric',
                ]);
                $credit = Credit::where('user_id', $user->id)->first();
                $credit->current = $request->current;
                $credit->main = 1;
                $credit->strategy = $request->strategy;
                $credit->baseline = $request->baseline;
                $credit->save();
                Wheel::updateLiabilityTile($user);
                return redirect()->back();
            }
        }
        if($request->seveng == "danbxnjhbxxvnsvauiw7wxdgbxzd"){
            if($request->personal_val && $request->personal_val == 'iauhuiahjnjaknijaiiunaiujs'){
                $seveng = Dept::where('user_id', $user->id)->first();
                $seveng->strategy = $request->strategy;
                $seveng->save();
                return response()->json(['status' => true, 'message' => 'Successfull Saved']);
            }
            $this->validate($request, [
                'current' => 'required|numeric',
                'baseline' => 'required|numeric',
                // 'current' => 'required|numeric',
            ]);
            $dept = Dept::where('user_id', $user->id)->first();
            $dept->current = $request->current;
            $dept->main = 1;
            // $dept->target = $request->target;
            $dept->strategy = $request->strategy;
            $dept->baseline = $request->baseline;
            $dept->save();
            Wheel::updateMortgageTile($user);
            return redirect()->back();
        }
        if($request->seveng == "suwjssjnzbaajdzkshnshbbjbd"){
            if($request->personal_val && $request->personal_val == 'iauhuiahjnjaknijaiiunaiujs'){
                $seveng = Education::where('user_id', $user->id)->first();
                $seveng->strategy = $request->strategy;
                $seveng->save();
                return response()->json(['status' => true, 'message' => 'Successfull Saved']);
            }
            $this->validate($request, [
                'current' => 'required|numeric',
                'target' => 'required|numeric',
                // 'current' => 'required|numeric',
            ]);
            $edu = Education::where('user_id', $user->id)->first();
            $edu->current = $request->current;
            $edu->main = 1;
            $edu->target = $request->target;
            $edu->strategy = $request->strategy;
            // $edu->baseline = $request->baseline;
            $edu->save();
            Wheel::updateCashTile($user);
            return redirect()->back();
        }
        if($request->seveng == "aqwsbxbx32shzjmazajxbvvsuw3vx"){
            if($request->personal_val && $request->personal_val == 'iauhuiahjnjaknijaiiunaiujs'){
                $freedom = Freedom::where('user_id', $user->id)->first();
                $freedom->strategy = $request->strategy;
                $freedom->save();
                return response()->json(['status' => true, 'message' => 'Successfull Saved']);
            }
            $this->validate($request, [
                'current' => 'required|numeric',
                // 'target' => 'required|numeric',
                // 'current' => 'required|numeric',
            ]);
            $freedom = Freedom::where('user_id', $user->id)->first();
            $freedom->main = 1;
            // if(!$freedom->main){}
            $calculator->other_income = $request->current;
            $freedom->current = $request->current;
            $calculator->save();
            $freedom->target = $fin['cost'];
            $freedom->strategy = $request->strategy;
            $freedom->save();
            return redirect()->back();
        }
        if($request->seveng == "jagxgxbajxbxjzgzxhsgzah22wexs"){
            if($request->personal_val && $request->personal_val == 'iauhuiahjnjaknijaiiunaiujs'){
                $grand = Grand::where('user_id', $user->id)->first();
                $grand->strategy = $request->strategy;
                $grand->target = $request->target;
                $grand->save();
                return redirect()->back();
                // return response()->json(['status' => true, 'message' => 'Successfull Saved']);
            }
            $this->validate($request, [
                'current' => 'required|numeric',
                'target' => 'required|numeric',
                // 'current' => 'required|numeric',
            ]);
            $grand = Grand::where('user_id', $user->id)->first();
            $grand->current = $request->current;
            $grand->main = 1;
            $grand->target = $request->target;
            $grand->strategy = $request->strategy;
            $grand->save();
            Wheel::updateGivingTile($user);
            return redirect()->back();
        }

        return redirect()->back();
    }

    public function storeBespoke(Request $request){
        $user =  auth()->user();
        $bespokes = BespokeKPI::where('user_id', $user->id)->latest()->limit(7)->get();
        $this->validate($request, [ 'bespoke' => 'required']);
        // return $bespoke;
        if($request->bespoke == "samnbvsjhnbvsnhbvsnvsjhsvnxjhxnvhbnvx"){
            $this->validate($request, [
                'kpi_name' => 'required|max:9',
                'purpose' => 'required',
                'cash' => 'required',
                'details' => 'required',
                'target' => 'required',
                'current' => 'required',
            ]);
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
            return redirect('/home/7g?kpi=bespoke')->with(['success' => 'Bespoke KPI saved successfully']);
        }
        if($request->bespoke == "dejhiojdnoijdnsnvhbnvxjhxnvsjhsvnxshyg"){
            $this->validate($request, [
                'kpi_name' => 'required|max:9',
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
            return redirect('/home/7g?kpi=bespoke')->with(['success' => 'Bespoke KPI saved successfully']);
        }
        return redirect()->back();
    }

    public function updateBespoke(Request $request, $id){
        $user =  auth()->user();
        $bespoke = BespokeKPI::where('user_id',$user->id)->where('id', $id)->first();
        if($bespoke && !$request->biunxicmkxbjvnjncm){
            if($bespoke->bespoke_type =='saveup'){
                $this->validate($request,  [
                    'target' => 'required',
                    'current' => 'required',
                ]);
                $bespoke->current = $request->current;
                $bespoke->target = $request->target;
                $bespoke->extra = $request->strategy;
                $bespoke->save();
                if($request->basement){
                    return  redirect()->back()->with(['success' => 'Bespoke KPI saved successfully']);
                }else{
                    return  redirect('/home/7g?kpi=bespoke')->with(['success' => 'Bespoke KPI saved successfully']);
                }
            } elseif($bespoke->bespoke_type =='dept'){
                $this->validate($request,  [
                    'baseline' => 'required',
                    'current' => 'required',
                ]);
                $bespoke->current = $request->current;
                $bespoke->baseline = $request->baseline;
                $bespoke->extra = $request->strategy;
                $bespoke->save();
                if($request->basement){
                    return  redirect()->back()->with(['success' => 'Bespoke KPI saved successfully']);
                }else{
                    return  redirect('/home/7g?kpi=bespoke')->with(['success' => 'Bespoke KPI saved successfully']);
                }
            }
        }elseif($request->biunxicmkxbjvnjncm){
            if($request->biunxicmkxbjvnjncm == "aznjzbhxjnsxjbnxhsjgczbhzbvcjhbxvnbjhjzcb"){
                $this->validate($request,  [
                    'target' => 'required',
                    'current' => 'required',
                ]);
                $cash = CashAccount::where('user_id',$user->id)->where('id', $id)->first();
                $cash->current = $request->current;
                $cash->target = $request->target;
                $cash->extra = $request->strategy;
                $cash->save();
            }
            if($request->biunxicmkxbjvnjncm == "skjnaznkszxjnszjnzjnzjnmhjzbnhjxvgyzbjhbxc"){
                $this->validate($request,  [
                    'baseline' => 'required',
                    'current' => 'required',
                ]);
                $liability = LiabilityAccount::where('user_id',$user->id)->where('id', $id)->first();
                $liability->current = $request->current;
                $liability->baseline = $request->baseline;
                $liability->extra = $request->strategy;
                $liability->save();
            }

            if($request->basement){
                return  redirect()->back()->with(['success' => 'Bespoke KPI saved successfully']);
            }else{
                return  redirect('/home/7g?kpi=bespoke')->with(['success' => 'Bespoke KPI saved successfully']);
            }
        }else{
            return redirect()->back()->with(['error' => 'Bespoke is not found']);
        }
        return $bespoke;
    }
}
