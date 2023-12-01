<?php

namespace App\Http\Controllers\Web;

use App\Helper\HelperClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helper\GapAccountCalculator as GapAccount;
use App\Helper\AnalyticsClass as SevenG;
use App\FinicialCalculator as Calculator;
use App\Helper\CalculatorClass;
use App\UserAudit as Audit;
use App\Helper\GapExchangeHelper as Exchange;
use App\Helper\GapExchangeHelper;
use App\Helper\ArchiveAccount;
use App\Helper\IncomeHelper;
use App\Wheel\HomeEquity;
use App\Wheel\CashAccount as Cash;

use App\SevenG\AlphaFin as Alpha;
use App\SevenG\BetaFin as Beta;
use App\SevenG\DeptFin as Debt;
use App\SevenG\CreditFin as Credit;
use App\SevenG\EducationFin as Education;
use App\Wheel\MortgageAccount as Mortgage;
use App\Helper\CalculatorClass as Fin;
use App\SevenG\BespokeKPI;
use App\Wheel\BespokeWheel;
use Illuminate\Support\Facades\Input;


class WheelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $isValid = SevenG::isSevenGVal($user);
        $calculator = Calculator::where('user_id', $user->id)->first();
        $currency = explode(" ", $calculator->currency)[0];
        $audit = Audit::where('user_id', $user->id)->select('is_allocated')->first();

        $currencies = HelperClass::popularCurrenciens();
        $equity_info = GapExchangeHelper::availabeleMortgages($user);
        $fin = CalculatorClass::finicial($user);
        $income_detail = IncomeHelper::analyseIncome($user, $fin['portfolio']);
        $net = GapAccount::netWorthVariable($user);
        $net_detail = GapAccount::calcNetWorth($user);
        $backgrounds = GapAccount::accountBackground();
        $tiles = GapAccount::updatedTiles($user);

        $credit = Credit::where('user_id', $user->id)->first();
        $allocated = GapAccount::creditAllocated($user)['allocate'];
        $total_credit =  $credit->current - (int)$allocated;
        $dept = Debt::where('user_id', $user->id)->first();
        $dept = Exchange::switchToDebtAccount($dept, 'Debt', $calculator->currency);

        return view('user.360.index', compact('dept','total_credit','isValid','currency' , 'currencies','net_detail','net','backgrounds','equity_info','income_detail', 'audit','tiles'));
    }

    public function netWorth() {
        $user = auth()->user();
        $isValid = SevenG::isSevenGVal($user);

        $calculator = Calculator::where('user_id', $user->id)->first();
        $currency = explode(" ", $calculator->currency)[0];
        $currencies = HelperClass::popularCurrenciens();
        $equity_info = GapExchangeHelper::availabeleMortgages($user);

        $fin = CalculatorClass::finicial($user);
        $income_detail = IncomeHelper::analyseIncome($user,$fin['portfolio']);
        $net = GapAccount::netWorthVariable($user);
        $net_detail = GapAccount::calcNetWorth($user);
        $backgrounds = ['#00ff00', '#ff0000', '#0000ff'];
        $tiles = GapAccount::updatedTiles($user);
        $isNet = Audit::where('user_id', $user->id)->select('net_confirm')->first();
        $audit = Audit::where('user_id', $user->id)->select('is_allocated')->first();

        return view('user.360.net', compact('isValid','currency','audit','isNet', 'currencies', 'net_detail','net','backgrounds','equity_info','income_detail','tiles'));
    }

    public function storeNet(Request $request) {
         $user = auth()->user();
         $isNet = Audit::where('user_id', $user->id)->first();

         $isNet->net_confirm = 1;
         $isNet->save();

         return redirect('/home/360/net');
    }

    /**
     * Cash
     *
     * @return \Illuminate\Http\Response
     */

    public function storeCash(Request $request)
    {
        $user = auth()->user();

        $this->validate($request, [
            'act_name' => 'required|max:50',
            'cash' => 'required',
            'purpose' => 'required',
            'currency' => 'required',
            // 'automated' => 'required',
            'target' => 'required|integer|min:0',
            'current' => 'required|integer|min:0',
            'target_date' => 'nullable|date|after:today'
        ]);
        $cash_items = Cash::where('user_id', $user->id)->count();
        if($cash_items <= 9){
            $cash = new Cash();
            $cash->user_id = $user->id;
            $cash->automated = $request->automated_rate;
            $cash->account_name = $request->act_name;
            $cash->account_type = $request->cash;
            $cash->account_purpose = $request->purpose;
            $cash->account_details = $request->details;
            $cash->account_location = $request->fund;
            $cash->account_currency = $request->currency;
            $cash->target = $request->target;
            $cash->current = $request->current;
            $cash->target_date = $request->target_date;
            $cash->isAnalytics = ($request->analytics == 'on') ? 1 : 0;
            $cash->save();

            $mycash = Cash::where('user_id', $user->id)->latest()->get();
            $cash_items = Cash::where('user_id', $user->id)->count();
            $cash_detail = GapAccount::calcCashAccount($mycash, $user);
            GapAccount::saveUpdatedTiles($user, 'cash', $cash_items + 3, $cash_detail['sum'] );

            return redirect('/home/360/cash')->with(['success' => 'New Cash Account saved successfully']);
        }else{
            return redirect('/home/360/cash')->with(['error' => "You can't add more than 12 Cash Accounts"]);
        }
    }

    public function updateCash(Request $request, $id){
        $user = auth()->user();

        if($request->sjnxjknsxkjnxijnsxknixncio == "nbdsckasjnxkjszncikjnijznjsznx"
                && $request->pakmamkanknmjkmnzkmnjmnd == "betpcaksnksnkndkkmkdnkanmhahbdjb"){
            $seveng = Beta::where('user_id', $user->id)->first();
            $seveng->is_purchased = 0;
            $seveng->save();
            return redirect('/home/360/cash?kpi=beta')->with(['success' => '']);
        }
        $this->validate($request, [
            'details' => 'required',
            'target_date' => 'nullable|date',
            'current' => 'required','target' => 'required',
            'sjnxjknsxkjnxijnsxknixncio' => 'required'
        ], [
            'sjnxjknsxkjnxijnsxknixncio' => 'Token expired'
        ]);

        if($request->pakmamkanknmjkmnzkmnjmnd){
            if($request->pakmamkanknmjkmnzkmnjmnd == 'alpcaksnksnkndkkmkdnkandnsmjmn'){
                $calculator = Calculator::where('user_id', $user->id)->first();
                $calculator->extra_save = $request->current;
                $calculator->save();
                $seveng = Alpha::where('user_id', $user->id)->first();
            }else if($request->pakmamkanknmjkmnzkmnjmnd == 'betpcaksnksnkndkkmkdnkanmhahbdjb'){
                $seveng = Beta::where('user_id', $user->id)->first();
            }else if($request->pakmamkanknmjkmnzkmnjmnd == 'edupcaksnksmkdnkjnkndkkahnjn'){
                $seveng = Education::where('user_id', $user->id)->first();
            }

            if($seveng){
                $seveng->account_details = $request->details;
                $seveng->target = $request->target;
                $seveng->current = $request->current;
                $seveng->target_date = $request->target_date;
                $seveng->account_location = $request->account_location;
                $seveng->save();
            } else{
                return redirect('/home/360/cash')->with(['error' => 'Analytics not found']);
            }
        }elseif($request->aksnjknsjnsjnsxjxn){
            $this->validate($request, [ 'purpose' => 'required'], ['purpose.required', 'Type of Holding Account is required' ] );
            if($request->aksnjknsjnsjnsxjxn = "tahbhzjbhvaghvxghavgysvxtysghzvxstyghxgyxvsgyzvxghsbvsyuh"){
                $bespoke = BespokeKPI::where('user_id', $user->id)->where('id', $request->sjnxjknsxkjnxijnsxknixncio)->first();
                $wheel = BespokeWheel::where('bespoke_id', $bespoke->id)->first();
                if($bespoke){
                    $bespoke->kpi_details = $request->details;
                    $bespoke->target = $request->target;
                    $bespoke->current = $request->current;
                    $bespoke->cash_keptin = $request->purpose;
                    $bespoke->isAnalytics = ($request->analytics == 'on') ? 1 : 0;
                    $wheel->account_alias = $request->alias;
                    $wheel->target_date = $request->target_date;
                    $wheel->fund = $request->account_location;
                    $bespoke->save();
                    $wheel->save();
                }
            } else{
                return redirect('/home/360/cash')->with(['error' => 'Cash not found']);
            }
        }else{
            $this->validate($request, [ 'purpose' => 'required'] );
            $cash = Cash::where('user_id', $user->id)->where('id', $request->sjnxjknsxkjnxijnsxknixncio)->first();
            if($cash){
                // return $request->automated_rate;
                $cash->account_details = $request->details;
                $cash->automated = $request->automated_rate;
                $cash->target = $request->target;
                $cash->current = $request->current;
                $cash->account_type = $request->purpose;
                $cash->target_date = $request->target_date;
                $cash->account_location = $request->account_location;
                $cash->account_alias = $request->alias;
                $cash->isAnalytics = ($request->analytics == 'on') ? 1 : 0;
                $cash->save();
            }
        }
        $mycash = Cash::where('user_id', $user->id)->latest()->get();
        $cash_items = Cash::where('user_id', $user->id)->count();
        $cash_detail = GapAccount::calcCashAccount($mycash, $user);
        GapAccount::saveUpdatedTiles($user, 'cash', $cash_items + 3, $cash_detail['sum'] );
        return redirect('/home/360/cash')->with(['success' => ' Cash Information updated successfully']);
    }

    public function cash(Request $request){
        $user = auth()->user();
        $isValid = SevenG::isSevenGVal($user);

        $header =  $request->get('header');
        $access =  $request->get('access');
        $account =  $request->get('account');
        $archive =  $request->get('archive');
        $convert =  $request->get('convert') || 0;
        $kpi =  $request->get('kpi');
        if($header){
           return ArchiveAccount::cashArchiveAction($user, $header, $access, $account, $kpi);
        }

        $calculator = Calculator::where('user_id', $user->id)->first();
        $currency = explode(" ", $calculator->currency)[0];
        $currencies = HelperClass::popularCurrenciens();
        if($archive){
            $cash = Cash::where('user_id', $user->id)->where('isArchive', 1)->latest()->get();
        }else{
            $cash = Cash::where('user_id', $user->id)->where('isArchive', 0)->latest()->get();
        }

        if($archive){
            $seveng = [];
            $bespokes = Exchange::wheelKPIAccount($user, $calculator->currency, $archive)['cash'];
        }else{
            $cash_items = Cash::where('user_id', $user->id)->count();
            $alpha = Alpha::where('user_id', $user->id)->first();
            $beta = Beta::where('user_id', $user->id)->first();
            $education = Education::where('user_id', $user->id)->first();
            $alpha = Exchange::switchToCashAccount($alpha, 'Alpha', $calculator->currency);
            $beta = Exchange::switchToCashAccount($beta, 'Beta', $calculator->currency);
            $education = Exchange::switchToCashAccount($education, 'Education', $currency);
            $seveng = [$alpha, $beta, $education];
            $bespokes = Exchange::wheelKPIAccount($user, $calculator->currency, $archive)['cash'];
        }
        $cash_detail = GapAccount::calcCashAccount($cash, $user, $archive);
        foreach($seveng as $money){
            $money->currency = explode(' ',$money->account_currency)[0];
            $money->chart = GapAccount::cashDetailChart($money);
        }
        foreach($bespokes as $money){
            $money->currency = explode(' ',$money->account_currency)[0];
            $money->chart = GapAccount::cashDetailChart($money);
        }
        foreach($cash as $money){
            $money->currency = explode(' ',$money->account_currency)[0];
            $money->chart = GapAccount::cashDetailChart($money);
        }

        $equity_info = GapExchangeHelper::availabeleMortgages($user);
        $fin = CalculatorClass::finicial($user);
        $income_detail = IncomeHelper::analyseIncome($user, $fin['portfolio']);
        $net = GapAccount::netWorthVariable($user);
        $net_detail = GapAccount::calcNetWorth($user);

        $backgrounds = GapAccount::accountBackground();
        // var_dump($convert);
        return view('user.360.cash', compact('isValid','currency','currencies', 'equity_info','income_detail','net_detail' ,'net',
                        'archive', 'convert','backgrounds','cash','seveng','bespokes' ,'cash_detail'));
    }

    public function asset(){
        $user = auth()->user();
        $isValid = SevenG::isSevenGVal($user);

        $calculator = Calculator::where('user_id', $user->id)->first();
        $currency = explode(" ", $calculator->currency)[0];
        $currencies = HelperClass::popularCurrenciens();
        $equity_info = GapExchangeHelper::availabeleMortgages($user);
        $fin = CalculatorClass::finicial($user);
        $income_detail = IncomeHelper::analyseIncome($user, $fin['portfolio']);
        $net = GapAccount::netWorthVariable($user);
        $net_detail = GapAccount::calcNetWorth($user);
        // return $net;
        $backgrounds = GapAccount::accountBackground();
        $equity = HomeEquity::where('user_id', $user->id)->where('isArchive', 0)->latest()->get();
        $cash = Cash::where('user_id', $user->id)->where('isArchive', 0)->latest()->get();

        $asset_detail = GapAccount::calcAssetAccount($user, $cash, $equity);

        return view('user.360.asset', compact('isValid','currency' , 'currencies', 'equity_info','income_detail','net_detail' ,'net','backgrounds','equity','asset_detail'));
    }
    // Equity
    public function equity(Request $request){
        $user = auth()->user();
        $isValid = SevenG::isSevenGVal($user);
        $header =  $request->get('header');
        $access =  $request->get('access');
        $account =  $request->get('account');
        $archive =  $request->get('archive');
        if($header){
           return ArchiveAccount::equityArchiveAction($user, $header, $access, $account);
        }
        $calculator = Calculator::where('user_id', $user->id)->first();
        $currency = explode(" ", $calculator->currency)[0];
        $currencies = HelperClass::popularCurrenciens();
        $equity_info = GapExchangeHelper::availabeleMortgages($user);

        $fin = Fin::finicial($user);
        $net = GapAccount::netWorthVariable($user);
        $net_detail = GapAccount::calcNetWorth($user);
        $backgrounds = GapAccount::accountBackground();
        $income_detail = IncomeHelper::analyseIncome($user, $fin['portfolio'],false);

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
                            'oldvalues' => [($eq->mortgage ? $eq->mortgage->current_balance : 0), $eq->equity ],
                            'values' => [$eq->per_mortgage, $eq->ownership]
                        ];
        }
        return view('user.360.equity', compact('isValid','currency','archive' , 'currencies','equity_info','income_detail','net_detail' ,'net','backgrounds','equity','equity_detail'));
    }

    public function storeEquity(Request $request){
        $user = auth()->user();

        $this->validate($request, [
            'location' => 'required',
            'market_value' => 'required|integer|min:10',
            'country' => 'required',
            'ismortgage' => 'required|integer'
        ], [
            'ismortgage.integer' => 'Is there mortgage on this property is required'
        ]);

        if($request->ismortgage){
            $this->validate($request, [
                'mortgage' => 'required|integer'
            ]);
        }

        $equity_items = HomeEquity::where('user_id', $user->id)->count();

        if($equity_items <= 12){
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

            $net_detail = GapAccount::calcNetWorth($user);
            GapAccount::saveUpdatedTiles($user, 'net', $equity_items, $net_detail['sum'] );

            return redirect('/home/360/equity')->with(['success' => 'New Home Equity Account saved successfully']);
        }else{
            return redirect('/home/360/equity')->with(['error' => "You can't add more than 12 Home Equity Account"]);
        }
    }

    public function updateEquity(Request $request, $id) {
        $user = auth()->user();
        $this->validate($request, [
            'market' => 'required|integer|min:10',
            'sjnxjknsxkjnxijnsxknixncio' => 'required'
        ], [
            'sjnxjknsxkjnxijnsxknixncio' => 'Token expired'
        ]);
        $equity = HomeEquity::where('user_id', $user->id)->where('id', $request->sjnxjknsxkjnxijnsxknixncio)->first();

        // $equity->location = $request->locations;
        $equity->market_value = $request->market;
        $equity->date_acquired = $request->date_acquired;
        $equity->save();

        $equity_items = HomeEquity::where('user_id', $user->id)->count();
        $net_detail = GapAccount::calcNetWorth($user);
        GapAccount::saveUpdatedTiles($user, 'net', $equity_items, $net_detail['sum'] );

        return redirect('/home/360/equity')->with(['success' => 'Home Equity Information updated successfully']);
    }

}
