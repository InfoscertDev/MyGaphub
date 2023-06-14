<?php

namespace App\Http\Controllers\Web;

use App\Asset\PortfolioAsset;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Helper\AllocationHelpers;
use App\Helper\HelperClass;
use App\Helper\CalculatorClass as Fin;
use App\FinicialCalculator as Calculator;
use App\Helper\GapAccountCalculator as GapAccount;
use App\Helper\AnalyticsClass as SevenG;

use App\Wheel\ProtectionAccount as Protection;
use App\Wheel\PensionAccount as Pension;
use App\Helper\GapExchangeHelper;
use App\Helper\IncomeHelper;
use App\Helper\WheelClass;
use App\Wheel\IncomeAccount as Income;

use App\Helper\ArchiveAccount;
use App\Helper\CalculatorClass;
use App\User;
use App\UserAudit as Audit;
use Symfony\Component\HttpKernel\Profiler\Profile;

class IndependenceController extends Controller
{

    public function protection(Request $request){
        $user = auth()->user();
        $header =  $request->get('header');
        $access =  $request->get('access');
        $account =  $request->get('account');
        $archive =  $request->get('archive');

        if($header){
           return ArchiveAccount::protectionArchiveAction($user, $header, $access, $account);
        }

        $isValid = SevenG::isSevenGVal($user);
        $currencies = HelperClass::popularCurrenciens();
        $calculator = Calculator::where('user_id', $user->id)->first();
        $currency = explode(" ", $calculator->currency)[0];
        $equity_info = GapExchangeHelper::availabeleMortgages($user);

        $fin = Fin::finicial($user);
        $income_detail = IncomeHelper::analyseIncome($user, $fin['portfolio'],false);

        if($archive){
            $protection = Protection::where('user_id', $user->id)->where('isArchive', 1)->latest()->get();
        }else{
            $protection = Protection::where('user_id', $user->id)->where('isArchive', 0)->latest()->get();
        }

        $protection_items = Protection::where('user_id', $user->id)->count();
        $protection_detail = GapAccount::calcProtectionAccount($protection);
        $backgrounds = GapAccount::accountBackground();
        $net = GapAccount::netWorthVariable($user);
        $net_detail = GapAccount::calcNetWorth($user);
        return view('user.360.protection', compact('isValid','income_detail','archive','currency','currencies', 'net_detail','net','equity_info', 'backgrounds' ,'protection','protection_detail'));
    }

    public function storeProtection(Request $request){
        Validator::extend('before_or_equal', function($attribute, $value, $parameters, $validator) {
            return strtotime($validator->getData()[$parameters[0]]) >= strtotime($value);
          }, 'Date entered is not correct.');

        $user = auth()->user();
        $request->validate([
            'category' => 'required',
            'type' => 'required',
            'details' => 'required',
            // 'contact' => 'required',
            'premium' => 'required',
            'sum_assured' => 'required|numeric|min:0',
            'pay_freq' => 'required',
            'pay_type' => 'required',
            'cover_start' => 'required|date|before:yesterday|before_or_equal:cover_end',
            'cover_end' => 'required|date',
            'document'=>'required',
        ]);
        $document = '';
        if($request->hasFile('document')){
            $request->validate(['document'=>'min: 5|max:5000|mimes:docx,pdf,doc,txt']);
            $fileType = $request->file('document')->getClientMimeType();
            $ext = $request->file('document')->getClientOriginalExtension();
            $fileNameStore = sha1(time()). rand(100000, 999999) . '.'.$ext;
            $document = $request->file('document')->storeAs('public/user', $fileNameStore);
        }

        $protection_items = Protection::where('user_id', $user->id)->count();

        if($protection_items <= 12){

            $protection = new Protection();
            $protection->user_id = $user->id;
            $protection->protection_category = $request->category;
            $protection->protection_type = $request->type;
            $protection->details =     $request->details;
            $protection->provider_contact =     $request->contact;
            $protection->provider_policy =     $request->policy;
            $protection->sum_assured =     $request->sum_assured;
            $protection->premium_pay =     $request->premium;
            $protection->pay_frequency =    $request->pay_freq;
            $protection->payment_type =    $request->pay_type;

            $protection->cover_start =     $request->cover_start;
            $protection->cover_end =     $request->cover_end;
            $protection->document =     $document;
            $protection->save();

            $myaccount = Protection::where('user_id', $user->id)->latest()->get();
            $account_items = Protection::where('user_id', $user->id)->count();
            $account_detail = GapAccount::calcProtectionAccount($myaccount, $user);
            GapAccount::saveUpdatedTiles($user, 'protection', $account_items, $account_detail['sum'] );

            return redirect('/home/360/protection')->with(['success' => 'New Protection Account saved successfully']);
        }else{
            return redirect('/home/360/protection')->with(['error' => "You can't add more than 12 Protection Account"]);
        }
    }

    public function updateProtection(Request $request, $id){
        Validator::extend('before_or_equal', function($attribute, $value, $parameters, $validator) {
            return strtotime($validator->getData()[$parameters[0]]) >= strtotime($value);
          }, 'Date entered is not correct.');
        $user = auth()->user();
        $request->validate([
            'details' => 'required',
            'provider_contact' => 'required',
            'premium_pay' => 'required',
            'sum_assured' => 'required|numeric|min:0',
            'pay_frequently' => 'required',
            'pay_typed' => 'required',
            'cover_start' => 'required|date|before:yesterday|before_or_equal:cover_end',
            'cover_end' => 'required|date',
            'sjnxjknsxkjnxijnsxknixncio' => 'required'
        ], [
            'sjnxjknsxkjnxijnsxknixncio' => 'Token expired'
        ]);

        $protection =  Protection::where('user_id', $user->id)->where('id', $request->sjnxjknsxkjnxijnsxknixncio)->first();
        // $protection->user_id = $user->id;
        $protection->details =     $request->details;
        $protection->sum_assured =     $request->sum_assured;
        $protection->provider_contact =     $request->provider_contact;
        $protection->pay_frequency =    $request->pay_frequently;
        $protection->protection_type = $request->protection_type;
        $protection->premium_pay =     $request->premium_pay;
        $protection->payment_type =    $request->pay_typed;

        $protection->cover_start =     $request->cover_start;
        $protection->cover_end =     $request->cover_end;
        $protection->save();
        $myaccount = Protection::where('user_id', $user->id)->latest()->get();
        $account_items = Protection::where('user_id', $user->id)->count();
        $account_detail = GapAccount::calcProtectionAccount($myaccount, $user);
        GapAccount::saveUpdatedTiles($user, 'protection', $account_items, $account_detail['sum'] );

        return redirect('/home/360/protection')->with(['success' => 'Protection Information updated successfully']);
    }

    public function retirement(Request $request){
        $user = auth()->user();
        $profile = $user->user_profile;

        $header =  $request->get('header');
        $access =  $request->get('access');
        $account =  $request->get('account');
        $archive =  $request->get('archive');
        if($header){
           return ArchiveAccount::pensionArchiveAction($user, $header, $access, $account);
        }
        $isValid = SevenG::isSevenGVal($user);
        $calculator = Calculator::where('user_id', $user->id)->first();
        $currency = explode(" ", $calculator->currency)[0];
        $fin =  Fin::finicial($user);
        $snap = Fin::snapshot($fin['calculator'], $fin['cost']);

        $monthly_asset = $fin['cost']; $saving = $fin['saving'];
        $portfolio = $fin['portfolio']; $roce = $fin['roce'];
        $investment = $fin['investment'];
        $improve_status = compact('monthly_asset', 'saving', 'portfolio', 'roce', 'investment');
        $roi_detail = GapAccount::calcRoiInvestment($improve_status);

        if($archive){
            $retirement = Pension::where('user_id', $user->id)->where('isArchive', 1)->latest()->get();
        }else{
            $retirement = Pension::where('user_id', $user->id)->where('isArchive', 0)->latest()->get();
        }
        $dob = $profile->date_of_birth;
        if($dob){
            $average_seed = AllocationHelpers::averageSeedDetail($user)['average_seed'];
            $retirement = GapAccount::pensionPOT($retirement, $dob, $average_seed);
        }

        $retirement_items = Pension::where('user_id', $user->id)->count();
        $retirement_detail = GapAccount::calcPensionAccount($retirement);
        $backgrounds = GapAccount::accountBackground();

        $page_title = 'Financial Independence <span class="txt-primary">(Not Retirement)</span>';
        return view('user.360.retirement', compact('snap','currency','backgrounds' ,'retirement','page_title',
                'improve_status','roi_detail','archive','retirement_detail'));
    }

    public function storeRetirement(Request $request){
        $max_year = date('Y-m-d', strtotime('-18 years'));
        $this->validate($request,[
            'pension_name' => 'required',
            'pension_type' => 'required',
            'current' => 'required|numeric:min:0',
            'assured_income' => 'required|numeric:min:0',
            'monthly_cont' => 'required|numeric|min:0',
            'pension_provider' => 'required',
            'retire_age' => 'required',
            'dob' => 'date|before:'.$max_year
        ], [
            'dob.before' => 'Input a correct date of birth: GAPhub user must be at least 18 years of age.',
        ]);
        // Profile Update
        $id = auth()->user()->id;
        $user = User::find($id);
        $profile = $user->profile;
        if($request->dob && !$profile->date_of_birth){
            $profile->date_of_birth = $request->dob;
            $profile->dob_count = $profile->dob_count + 1;
            $profile->save();
        }

        // Add Pension
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
            $myaccount = Pension::where('user_id', $user->id)->latest()->get();
            $account_items = Pension::where('user_id', $user->id)->count();
            $account_detail = GapAccount::calcPensionAccount($myaccount, $user);
            GapAccount::saveUpdatedTiles($user, 'retirement', $account_items, $account_detail['sum'] );

            return redirect('/home/360/retirement')->with(['success' => 'New Pension Account saved successfully']);
        }else{
            return redirect('/home/360/retirement')->with(['error' => "You can't add more than 12 Pension Account"]);
        }
    }

    public function updatRetirement(Request $request, $id){
        $user = auth()->user();
        $request->validate([
            // 'current' => 'required|min:0|integer',
            // 'assured_income' => 'required|min:0|integer',
            'monthly' => 'required|min:0|integer',
            'retirement' => 'required|min:18|integer',
            'provider' => 'required',
            'sjnxjknsxkjnxijnsxknixncio' => 'required'
        ], [
            'sjnxjknsxkjnxijnsxknixncio' => 'Token expired'
        ]);

        $pension =  Pension::where('user_id', $user->id)->where('id', $request->sjnxjknsxkjnxijnsxknixncio)->first();;

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

        return redirect('/home/360/retirement')->with(['success' => 'Your Pension Account has been successfully']);
    }

    public function improveRoi(Request $request){
        $user = auth()->user();
        $this->validate($request, [
            'investment'  => 'required|numeric|min:10',
            'roce'  => 'required|integer|min:1'
        ]);
        $calculate = Calculator::where('user_id', $user->id)->first();
        $calculate->roce = $request->roce;
        $calculate->investment = $request->investment;
        $calculate->save();

        return redirect()->back()->with(['success' => 'Your ROI has been updated']);
    }

    public function income(Request $request){
        $user = auth()->user();
        $crd =  $request->get('crd');
        $alo =  $request->get('alo');
        if($crd && $alo){
            $res =  GapExchangeHelper::submitIncomeAllocation($user, $crd, $alo);
            if($res){
                return redirect('/home/360/income')->with(['success' => 'Portfolio Income Allocated Succesfully ']);
             }else{
                return redirect('/home/360/income')->with(['error' => 'Error Allocating Portfolio Income']);
            }
        }
        $page_title = 'Your Income Universe in 360<sup>o</sup>';
        $currencies = HelperClass::popularCurrenciens();
        $calculator = Calculator::where('user_id', $user->id)->first();
        $currency = explode(" ", $calculator->currency)[0];
        $fin = Fin::finicial($user);
        $equity_info = GapExchangeHelper::availabeleMortgages($user);
        $portfolio_asset =  PortfolioAsset::where('user_id', $user->id)->where('asset_category', 'existing')->get();
        $incomes = Income::where('user_id', $user->id)->where('isArchive', 0)->orderBy('income_date', 'DESC')->get();
        $income_detail = IncomeHelper::analyseIncome($user, $fin['portfolio'],false);
        $income_audit = Audit::where('user_id', $user->id)->select('income_allocated')->first();

        $income_helper = new IncomeHelper();
        $income_channels = $income_helper->getIncomeChannels($user, $incomes, $income_detail['total_portfolio']);
        $income_chart = $income_helper->getIncomeCharacteristics($user);
        // $income_averages = $income_helper->listIncomeAverages($user);

        foreach($incomes as $money){
            $money->currency = explode(" ", $money->income_currency)[0];
        }

        return view('user.portfolio.income', compact('page_title','equity_info',
                    'currency','incomes','currencies','income_audit', 'income_chart',
                    'portfolio_asset','income_detail', 'income_channels')
                );
    }

    public function incomeList(Request $request){
        $user = auth()->user();
        $header =  $request->get('header');
        $access =  $request->get('access');
        $account =  $request->get('account');
        $archive =  $request->get('archive');
        $period =  $request->get('period');
        $income =  $request->get('income');

        if($header){
            // Periodical Helper
            if($period){
                $income_helper = new IncomeHelper();
                return $income_helper->addNewNonPorfolioRecord($user, $income, $header, $access, $period);
            }
            // Archive Income
            if($account) return ArchiveAccount::incomeArchiveAction($user, $header, $access, $account);
        }

        $isValid = SevenG::isSevenGVal($user);
        $currencies = HelperClass::popularCurrenciens();
        $calculator = Calculator::where('user_id', $user->id)->first();
        $currency = explode(" ", $calculator->currency)[0];
        $backgrounds = GapAccount::accountBackground();
        $equity_info = GapExchangeHelper::availabeleMortgages($user);
        $portfolio_asset =  PortfolioAsset::where('user_id', $user->id)->where('isArchive', 0)->where('asset_category', 'existing')->get();

        $net = GapAccount::netWorthVariable($user);
        $net_detail = GapAccount::calcNetWorth($user);

        if($archive){
            $incomes = Income::where('user_id', $user->id)->where('isArchive', 1)->orderBy('income_date', 'DESC')->get();
        }else{
            $incomes = Income::where('user_id', $user->id)->where('isArchive', 0)->orderBy('income_date', 'DESC')->get();
        }

        $fin = Fin::finicial($user);
        $income_detail = IncomeHelper::analyseIncome($user, $fin['portfolio'],false);
        $income_info = GapAccount::calcIncomeAccount($user,$incomes);
        $income_helper = new IncomeHelper();

        foreach($incomes as $money){
            $money->currency = explode(" ", $money->income_currency)[0];
            if($money->income_type == 'portfolio') {
                $money->link = route('portfolio.braid.info', [ strtolower($money->channel), $money->portfolio_asset_id.'_nbxsdklsmoks?act=record']);
                $money->link_chart = route('portfolio.braid.financial', [ strtolower($money->channel), $money->portfolio_asset_id.'_nbxsdklsmoks']);
                $money->chart = $income_helper->portfolioDetailChart($user,$money);
            }else{
                $money->chart = $income_helper->nonPortfolioDetailChart($user,$money);
            }

        }
        return view('user.360.income', compact('archive','currencies','currency','incomes','portfolio_asset', 'net','isValid',
                        'net_detail', 'backgrounds','income_detail', 'income_info','equity_info'));
    }

    public function storeIncome(Request $request){
        $user = auth()->user();
        $this->validate($request, [
            'income_type' => 'required|in:portfolio,non_portfolio',
            'income_date' => 'nullable|date|before:today',
        ]);

        if($request->income_type == 'non_portfolio'){
            $this->validate($request, [
                'amount' => 'required|numeric',
                'income_name' => 'required|max:50',
                'channel' => 'required'
            ]);
        }else{
             $this->validate($request, ['portfolio_asset' => 'required|integer']);
        }
        if($request->inc_automated_rate) $request->automated_rate = $request->inc_automated_rate;
        $new_income = IncomeHelper::addNewIncome($user, $request);
        return redirect()->back()->with(['success' => 'New Income Account has been saved succesfully']);
    }

    public function updateIncome(Request $request, $id){
        $user = auth()->user();
        $this->validate($request, [
            // 'income_type' => 'required|in:portfolio,non_portfolio',
            'income_date' => 'nullable|date|before:today',
            'sjnxjknsxkjnxijnsxknixncio' => 'required'
        ],[
            'sjnxjknsxkjnxijnsxknixncio.required' => 'Token Expired'
        ]);

        $income =  Income::where('user_id', $user->id)->where('id', $request->sjnxjknsxkjnxijnsxknixncio)->first();;
        $income->automated = $request->automated_rate;
        $income->income_date = $request->income_date;
        $income->income_frequency = $request->income_frequency;
        $income->update();
        WheelClass::updateIncomeTile($user);
        return redirect('/home/360/list/income')->with(['success' => 'Income Information updated successfully']);
    }

    /**
     * Update Non Asset Porrtfolio Income
     *
     * Update Non Portfolio Period
     * @return Boolean
     */

    public function updateIncomeRecord(Request $request, $id){
        $user = auth()->user();

        $this->validate($request, [
            'note' => 'max:256',
            'record_period' => 'required',
            'amount' => 'required|min:0:numeric',
            'sjnxjknsxkjnxijnsxknixncio' => 'required',
            'record_period' => 'date:Y-m|before:today'
        ],[
            'sjnxjknsxkjnxijnsxknixncio.required' => 'Account not found',
            'record_period.date' => 'Incorrect Period'
        ]);
        $period = $request->record_period.'-01';
        $id = $request->sjnxjknsxkjnxijnsxknixncio;

        // Update The Non-Portfolio Asset
        $status = IncomeHelper::updateNonPeriodRecord($user, $period, $id, $request);
        if($status){
            return redirect()->back()->with(['success'=> 'Asset Record Updated successfully']);
        }else{
            return redirect()->back()->with(['error'=> 'Asset not found']);
        }
    }
}
