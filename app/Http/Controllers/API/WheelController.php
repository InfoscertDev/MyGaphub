<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Wheel\CashAccount as Cash;
use App\Helper\GapAccountCalculator as GapAccount;
use App\FinicialCalculator as Calculator;
use App\Helper\ArchiveAccount;
use App\UserAudit as Audit;
use App\Helper\GapExchangeHelper as Exchange;
use App\SevenG\BespokeKPI;
use App\SevenG\AlphaFin as Alpha;
use App\SevenG\BetaFin as Beta;
use App\SevenG\EducationFin as Education; 
use App\Wheel\BespokeWheel;
use App\Wheel\HomeEquity;
use App\Wheel\MortgageAccount as Mortgage;
use App\SevenG\DeptFin as Debt;
class WheelController extends Controller
{
    /**
     * Add Wheel Controller
     *
     * @return \Illuminate\Http\Response
     */

    public function tiles(Request $request){ 
        $user = $request->user();
        $tiles = GapAccount::updatedTiles($user); 

        return response()->json(compact('tiles'));
    }

    public function netWorth(Request $request){
        $user = $request->user();
        $calculator = Calculator::where('user_id', $user->id)->first();
        $currency = explode(" ", $calculator->currency)[0];
        $net = GapAccount::netWorthVariable($user);
        $net_detail = GapAccount::calcNetWorth($user);
        $backgrounds = ['#00ff00', '#ff0000', '#0000ff'];
        $audit = Audit::where('user_id', $user->id)->first();
        if(!$audit){
            $audit = new Audit();
            $audit->user_id = $user->id;
            $audit->save();
        } 
        $isNet = Audit::where('user_id', $user->id)->select('net_confirm')->first();
        return response()->json(compact('currency','isNet', 'net_detail','net', 'backgrounds'));
    }

    public function storeNet(Request $request) {
        $user = auth()->user();
        $isNet = Audit::where('user_id', $user->id)->first();

        $isNet->net_confirm = 1;
        $isNet->save(); 
        $success = true;
        return response()->json(compact('success'));
    }

    public function storeCash(Request $request)
    {
        $user = $request->user();
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'cash' => 'required',
            'purpose' => 'required',
            'currency' => 'required',
            'target' => 'required|integer|min:0',
            'current' => 'required|integer|min:0',
            'target_date' => 'date|after:today'
        ]); 

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $cash = new Cash();
        $cash->user_id = $user->id;
        $cash->automated = $request->automated_rate;
        $cash->account_name = $request->name;
        $cash->account_type = $request->cash;
        $cash->account_purpose = $request->purpose;
        $cash->account_details = $request->details;
        $cash->account_location = $request->fund;
        $cash->account_currency = $request->currency;
        $cash->target = $request->target;
        $cash->current = $request->current;
        $cash->target_date = $request->target_date;
        $cash->isAnalytics = ($request->analytics == 'true') ? 1 : 0;
        $cash->save();
        $success = true;
        $mycash = Cash::where('user_id', $user->id)->latest()->get();
        $cash_items = Cash::where('user_id', $user->id)->count();
        $cash_detail = GapAccount::calcCashAccount($mycash, $user);
        GapAccount::saveUpdatedTiles($user, 'cash', $cash_items + 3, $cash_detail['sum'] );

        return response()->json(compact('success', 'cash'));
    }

    public function updateCash(Request $request, $id){
        $user = $request->user();
        $validator = Validator::make($request->all(),[
            'details' => '',  
            'target' => 'required', 'current' => 'required',
            'type' => 'required',  'target_date' => 'nullable|date'
        ]);
        if($validator->fails()){ 
            return response()->json($validator->errors()->toJson(), 400);
        }
        $cash = null; 
        if($request->seveng){
            if($request->seveng == 'alpcaksnksnkndkkmkdnkandnsmjmn'){
                $seveng = Alpha::where('user_id', $user->id)->first();
                $calculator = Calculator::where('user_id', $user->id)->first();
                $calculator->extra_save = $request->current;
                $calculator->save();
            }else if($request->seveng == 'betpcaksnksnkndkkmkdnkanmhahbdjb'){
                $seveng = Beta::where('user_id', $user->id)->first();
            }else if($request->seveng == 'edupcaksnksmkdnkjnkndkkahnjn'){
                $seveng = Education::where('user_id', $user->id)->first();
            }
            if($seveng){
                $seveng->account_details = $request->details;
                $seveng->target = $request->target;
                $seveng->current = $request->current;
                $seveng->target_date = $request->target_date;
                $seveng->account_location = $request->account_location;
                $seveng->save();
            }

        }elseif($request->account){
            // $validator = Validator::make($request->all(),[ 'purpose' => 'required'] );
            if($request->account = "tahbhzjbhvaghvxghavgysvxtysghzvxstyghxgyxvsgyzvxghsbvsyuh"){
                $bespoke = BespokeKPI::where('user_id', $user->id)->where('id', $request->bespoke)->first();
                $wheel = BespokeWheel::where('bespoke_id', $bespoke->id)->first();
                if($bespoke){ 
                    $bespoke->kpi_details = $request->details;
                    $bespoke->target = $request->target;
                    $bespoke->current = $request->current;
                    $bespoke->cash_keptin = $request->type;
                    $bespoke->isAnalytics =  ($request->analytics == 'true') ? 1 : 0;
                    $wheel->account_alias = $request->alias;
                    $wheel->target_date = $request->target_date;
                    $wheel->fund = $request->account_location;
                    $bespoke->save();
                    $wheel->save();
                }
            }
        }else{ 
            $cash = Cash::where('user_id', $user->id)->where('id', $id)->first();
            $cash->account_details = $request->details;
            $cash->automated = $request->automated_rate;
            $cash->target = $request->target;
            $cash->current = $request->current;
            $cash->target_date = $request->target_date;
            $cash->account_location = $request->account_location;
            $cash->account_type = $request->type; 
            $cash->account_alias = $request->alias;
            $cash->isAnalytics = ($request->analytics == 'true') ? 1 : 0;
            $cash->save();
        } 
         
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
 
        $success = 'Cash Information updated successfully';
 
        $mycash = Cash::where('user_id', $user->id)->latest()->get();
        $cash_items = Cash::where('user_id', $user->id)->count();
        $cash_detail = GapAccount::calcCashAccount($mycash, $user);
        GapAccount::saveUpdatedTiles($user, 'cash', $cash_items + 3, $cash_detail['sum'] );

        return response()->json(compact('success', 'cash'));
    }
    
    public function cash(Request $request){
        $user = $request->user();
        
        $header =  $request->get('header');
        $access =  $request->get('access');
        $account =  $request->get('account');
        $archive =  $request->get('archive');
        $kpi =  $request->get('kpi');
        
        if($header){
           return ArchiveAccount::cashArchiveAction($user, $header, $access, $account, $kpi);
        }
        
        $cash = Cash::where('user_id', $user->id)->latest()->get();
        $cash_items = Cash::where('user_id', $user->id)->count();
        $calculator = Calculator::where('user_id', $user->id)->first();
        if($archive){
            $cash = Cash::where('user_id', $user->id)->where('isArchive', 1)->latest()->get();
        }else{
            $cash = Cash::where('user_id', $user->id)->where('isArchive', 0)->latest()->get();
        }
        if($archive){
            $seveng = []; $bespokes = [];
            $bespokes = Exchange::wheelKPIAccount($user, $calculator->currency, $archive)['cash'];
        }else{ 
            $alpha = Alpha::where('user_id', $user->id)->first();
            $beta = Beta::where('user_id', $user->id)->first();
            $education = Education::where('user_id', $user->id)->first();
            $alpha = Exchange::switchToCashAccount($alpha, 'Alpha', $calculator->currency);
            $beta = Exchange::switchToCashAccount($beta, 'Beta', $calculator->currency);
            $education = Exchange::switchToCashAccount($education, 'Education', $calculator->currency);
            
            $seveng = [$alpha, $beta, $education];
            $bespokes = Exchange::wheelKPIAccount($user, $calculator->currency)['cash'];
        }
        $cash_detail = GapAccount::calcCashAccount($cash, $user, $archive);
        foreach($seveng as $money){
            $money->currency = explode(' ',$money->account_currency)[0]; 
            $money->chart = GapAccount::cashDetailChart($money);
        }  
        foreach($cash as $money){
            $money->currency = explode(' ',$money->account_currency)[0]; 
            $money->chart = GapAccount::cashDetailChart($money);
        } 
        foreach($bespokes as $money){
            $money->currency = explode(' ',$money->account_currency)[0]; 
            $money->chart = GapAccount::cashDetailChart($money);
        }  
        return response()->json(compact('cash','bespokes','cash_detail','seveng'));
    }

    
    public function equityInfo(Request $request){
        $user = $request->user();
        $equity_info = Exchange::availabeleMortgages($user);
        return response()->json($equity_info);
    }
    
    public function storeEquity(Request $request){
        $user = $request->user();
        $validator = Validator::make($request->all(), [
            'location' => 'required',
            'market_value' => 'required|numeric|min:10',
            'country' => 'required',
            'ismortgage' => 'required|integer'
        ], [
            'ismortgage.integer' => 'Please choose a Mortgage'
        ]);
  
        if($request->ismortgage){ 
            $validator = Validator::make($request->all(), [
                'mortgage' => 'required|integer'
            ]);
        }

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $equity = new HomeEquity();
        $equity->user_id = $user->id;
        $equity->location = $request->location;
        $equity->zip_code = $request->zip_code; 
        $equity->market_value = $request->market_value;
        $equity->ismortgage = $request->ismortgage;
        $equity->country = $request->country;
        $equity->mortgage_id = $request->mortgage; 
        $equity->save(); 
        
        if((int)$request->mortgage == -1 && $request->ismortgage){
            $debt = Debt::where('user_id', $user->id)->first();
            $debt->equity_id = $equity->id;
            $debt->save();
        }
        if((int)$request->mortgage > 0 && $request->ismortgage){
            $debt = Mortgage::find($request->mortgage);
            $debt->equity_id = $equity->id;
            $debt->save();
        }
        $success = true;

        return response()->json(compact('success', 'equity'));
    }
    
    public function equity(Request $request){
        $user = $request->user(); 
        $archive =  $request->get('archive');

        if($archive){
            $equity = HomeEquity::where('user_id', $user->id)->where('isArchive', 1)->latest()->get();
        }else{
            $equity = HomeEquity::where('user_id', $user->id)->where('isArchive', 0)->latest()->get();
        }

        $equity_items = HomeEquity::where('user_id', $user->id)->count();
        $equity_detail = GapAccount::calcEquityAccount($equity);
        foreach ($equity as $eq) {
            $eq->mortgage; 
            $eq->equity =  $eq->market_value -  ($eq->mortgage ? $eq->mortgage->current_balance : 0);
            $eq->ownership = round($eq->equity * 100 / (($eq->market_value  > 0) ? $eq->market_value : 1)) ;
            $total = $eq->equity + $eq->market_value;  
            $eq->per_mortgage = round((($eq->mortgage ? $eq->mortgage->current_balance : 0) / (($eq->market_value  > 0) ? $eq->market_value : 1)) * 100);
            $eq->chart = [ 
                    'labels' => ['Mortgage', 'Home Equity'], 
                    'values' => [($eq->mortgage ? $eq->mortgage->current_balance : 0), $eq->equity ],
                    'percentages' => [$eq->per_mortgage, $eq->ownership] 
            ]; 
         }
        return response()->json(compact('equity','equity_detail'));
    } 
    
    public function updateEquity(Request $request, $id){
        $user = $request->user();
        $validator = Validator::make($request->all(),[
           'market_value' => 'required|numeric|min:10'
        ]);
 
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $equity = HomeEquity::where('user_id', $user->id)->where('id', $id)->first();

        // $equity->location = $request->location; 
        $equity->market_value = $request->market_value;
        $equity->date_acquired = $request->date_acquired;
        $equity->save(); 
        $success = 'Equity Information updated successfully';
        return response()->json(compact('success', 'equity'));
    }
}
