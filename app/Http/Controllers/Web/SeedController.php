<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Helper\HelperClass;
use App\Helper\GapAccountCalculator as GapAccount;
use App\Helper\AnalyticsClass as SevenG;

use App\Wheel\CashAccount as Cash;
use App\FinicialCalculator as Calculator; 
use App\SevenG\GrandFin as Grand;
use App\DiscretionaryBudget as Philantrophy;
use App\Helper\AllocationHelpers;
use App\Helper\CalculatorClass;
use App\Helper\GapExchangeHelper;
use App\Helper\IncomeHelper;
use App\ILab;
use App\Helper\WheelClass as Wheel;
use App\Models\Asset\SeedBudgetAllocation;

class SeedController extends Controller
{
    public function index(){
      $user = auth()->user();
      $page_title = "Manage Your Money the SEED Way";
      $support = true;
      $seed_backgrounds = CalculatorClass::accountBackground();
      $isValid = SevenG::isSevenGVal($user);
      $calculator = Calculator::where('user_id', $user->id)->first();
      $currency = explode(" ", $calculator->currency)[0];
      $current_seed = CalculatorClass::getCurrentSeed($user);
      $target_seed = CalculatorClass::getTargetSeed($user);
      $average_seed = CalculatorClass::getAverageSeed($user);
      // var_dump($average_seed);
      $current_detail = CalculatorClass::getSeedDetail($current_seed);
      $target_detail = CalculatorClass::getSeedDetail($target_seed);
      $average_detail = CalculatorClass::averageSeedDetail($user);
      

      return view('user.seed.master', compact('page_title', 'support','seed_backgrounds', 'currency','isValid','current_seed', 'target_seed',
          'average_detail', 'current_detail', 'target_detail','average_seed'));
    }
 
    
    public function create(){
      $user = auth()->user();
      $page_title = "My Current Month";
      $support = true; $month =  date('Y-m').'-01';
      $seed_backgrounds = CalculatorClass::accountBackground();
      $isValid = SevenG::isSevenGVal($user);
      $calculator = Calculator::where('user_id', $user->id)->first();
      $currency = explode(" ", $calculator->currency)[0];
      $current_seed = CalculatorClass::getCurrentSeed($user);
      $target_seed = CalculatorClass::getTargetSeed($user);
      $average_seed = CalculatorClass::getAverageSeed($user);
      
      $current_detail = AllocationHelpers::getAllocatedSeedDetail($user);
      $savings_allocation = SeedBudgetAllocation::where('seed_category', 'savings')
                            ->where('user_id', $user->id)->where('period', $month)->get();
      $education_allocation = SeedBudgetAllocation::where('seed_category', 'education')
                            ->where('user_id', $user->id)->where('period', $month)->get();
    
      $available_allocation = $current_seed->budget_amount - $current_detail['total'];
      return view('user.seed.create', compact('page_title', 'support','seed_backgrounds', 'currency','isValid','current_seed', 'target_seed',
         'available_allocation', 'current_detail', 'savings_allocation', 'education_allocation'
      ));
    }

    public function storeSetBudget(Request $request){
      $user = $request->user();

      $request->validate([
        'budget' => 'required|numeric'
      ]);

      $seed = CalculatorClass::getCurrentSeed($user);
      $seed->budget_amount =  $request->budget;
      $seed->update(); 
      return redirect()->back()->with(['success' => 'Seed Budget has been set']);
    }

    public function storeCategoryAllocation(Request $request){
      $user = $request->user();

      $this->validate($request, [
        'category' => 'required|in:savings,education,expenditure,discretionary',
        'label' => 'required|between:3,50', 
        'amount' => 'required|numeric|min:0',
      ]);

      if($request->category == 'expenditure'){
        $this->validate($request, [
          'expenditure' => 'required|in:accommodation,transportation,family,utilities,debt_repayment',
          // 'recuring' => 'required|integer|between:0,1'
        ]);
      }
      
      if($request->label == "Others") $request['label'] = $request->other_label;
      $current_seed = CalculatorClass::getCurrentSeed($user);
      $current_detail = AllocationHelpers::getAllocatedSeedDetail($user);
      $available_allocation = $current_seed->budget_amount -  $current_detail['total'];

      if($request->amount > $available_allocation){
        return redirect()->back()->with('error', 'Amount is greater than Available allocation');
      }

      $request['recuring'] = ($request->recuring == 'on') ? 1 : 0;
      $request['seed_category'] = $request->category;
      $request['user_id'] = $user->id;
      $request['period'] =  date('Y-m').'-01';
      
      $budget_allocation =  SeedBudgetAllocation::create($request->all());
      return redirect()->back()->with(['success' => 'Allocation has been created']);
    }

    public function storeSeed(Request $request){
      $user = auth()->user();

      $this->validate($request, [
        'jhbxjhbsuhjbhajbghjvajhbsxgb' => 'required'
      ], [
        'jhbxjhbsuhjbhajbghjvajhbsxgb.required' => 'Token required'
      ]);
 
      if($request->jhbxjhbsuhjbhajbghjvajhbsxgb == 'yugvabhjvbavbjhzbjhbhajvbhgvbhvjbjhbazJHbbj'){
        $seed = CalculatorClass::getCurrentSeed($user);
      }else if($request->jhbxjhbsuhjbhajbghjvajhbsxgb == 'opajoiabnjkabjahvjnbzahjbzapqwgeydhj'){
        $seed = CalculatorClass::getTargetSeed($user);
      }else{
        return redirect()->back()->with(['error' => 'Seed Budget not found']); 
      }
      
      $seed->investment_fund =  $request->investment_fund;
      $seed->personal_fund =  $request->personal_fund;
      $seed->emergency_fund =  $request->emergency_fund;
      $seed->financial_training =  $request->financial_training;
      $seed->mental_development =  $request->mental_development;
      $seed->career_development =  $request->career_development;
      $seed->accomodation =  $request->accomodation;
      $seed->mobility =  $request->mobility; 
      $seed->expenses =  $request->expenses;
      $seed->utilities =  $request->utilities;
      $seed->debt_repay =  $request->debt_repay;
      $seed->charity =  $request->charity;
      $seed->family_support =  $request->family_support;
      $seed->personal_commitments =  $request->personal_commitments;
      $seed->others =  $request->others;
      $seed->save();

      return redirect()->back()->with(['success' => 'Seed Budget has been updated']);
    }

    public function expenditure(){
        $user = auth()->user();
        $isValid = SevenG::isSevenGVal($user); 
        $calculator = Calculator::where('user_id', $user->id)->first();
        $currency = explode(" ", $calculator->currency)[0];
        $currencies = HelperClass::popularCurrenciens();
        $equity_info = GapExchangeHelper::availabeleMortgages($user);
        $fin = CalculatorClass::finicial($user);
        $income_detail = IncomeHelper::analyseIncome($user,  $fin['portfolio']);
        $expenditure =  $fin['calculator'];
        $expenditure_detail = GapAccount::calcExpenditure($user,$expenditure);
        $backgrounds = GapAccount::accountBackground();
        $net = GapAccount::netWorthVariable($user);
        $net_detail = GapAccount::calcNetWorth($user);
        return view('user.360.expenditure', compact('isValid', 'currency','currencies', 'net_detail' ,'net','equity_info','income_detail', 'backgrounds' ,'expenditure','expenditure_detail'));
    } 

    public function philantrophy(){
        $user = auth()->user();
        $isValid = SevenG::isSevenGVal($user);
        $calculator = Calculator::where('user_id', $user->id)->first();
        $currency = explode(" ", $calculator->currency)[0];
        $currencies = HelperClass::popularCurrenciens();
        $equity_info = GapExchangeHelper::availabeleMortgages($user);
        $fin = CalculatorClass::finicial($user);
        $income_detail = IncomeHelper::analyseIncome($user,  $fin['portfolio']);
          
        $net = GapAccount::netWorthVariable($user);
        $net_detail = GapAccount::calcNetWorth($user);
        $grand = Grand::where('user_id', $user->id)->first();
        $philantrophy = Philantrophy::where('user_id', $user->id)->first();
        if (!$philantrophy) {
          $philantrophy = GapAccount::initUserChartity($user);
          $philantrophy = Philantrophy::where('user_id', $user->id)->first();
        }
        $philantrophy_detail = GapAccount::calcPhilantrophy($user);
        
        return view('user.360.philantrophy', compact('isValid', 'currency','currencies', 'net_detail' ,'net','equity_info','income_detail', 'philantrophy', 'grand','philantrophy_detail'));
    } 
    
    public function savePhilantrophy(Request $request){
        $user = auth()->user();

        $grand = Grand::where('user_id', $user->id)->first();
        $this->validate($request, [
          'charity' => 'required|numeric|min:0',
          'family_support' => 'required|numeric|min:0',
          'personal' => 'required|numeric|min:0',
          'others' => 'required|numeric|min:0' 
        ]);
        $giving =  array_sum([$request->charity, $request->family_support,$request->personal,  $request->others]);
       
        if($giving == $grand->current){
          $philantrophy = Philantrophy::where('user_id', $user->id)->first();
          $philantrophy->charity = $request->charity;
          $philantrophy->family_support = $request->family_support;
          $philantrophy->personal_commitments = $request->personal;
          $philantrophy->others = $request->others;
          $philantrophy->allocated = 1;
          $philantrophy->save();
          Wheel::updateGivingTile($user); 
          return redirect()->back()->with(['success' => 'Giving has been updated']);
       }else{
        return redirect()->back()->with(['error' => 'Your Giving must be equal to your grand']);
       }
    } 

    public function ilab(){
        $user = auth()->user();
        $calculator = Calculator::where('user_id', $user->id)->first();
        $currency = explode(" ", $calculator->currency)[0];
        $year = date('Y') + 1;
        $ilab = ILab::where('user_id', $user->id)->where('other', $year)->first();
        if(!$ilab){
          $ilab = new ilab();
          $ilab->user_id = $user->id;
          $ilab->other = $year;
          $ilab->save();
        } 
        $cash = Cash::where('user_id', $user->id)->where('isArchive', 0)->latest()->get();
        $current_ilab = GapAccount::currentILab($user, $cash)['current_ilab'];
        $current_info = GapAccount::currentILab($user, $cash)['ilabs'];
        $target_info= GapAccount::targetedILab($ilab)['ilabs'];
        // $current_ilab = GapAccount::targetedILab($ilab)['current_ilab'];
        return view('user.360.ilab', compact('ilab', 'currency', 'current_info','target_info','current_ilab'));
    }

    public function storeILab(Request $request){
      $user = auth()->user();
      $this->validate($request, [
        'investment' => 'required|min:0|numeric',
        'equity' => 'required|min:0|numeric',
        'savings' => 'required|min:0|numeric',
        'credit' => 'required|min:0|numeric',
        'mortgage' => 'required|min:0|numeric',
        'non_portfolio' => 'required|min:0|numeric',
        'portfolio' => 'required|min:0|numeric',
        'periodic_savings' => 'required|min:0|numeric',
        'education' => 'required|min:0|numeric',
        'expenditure' => 'required|min:0|numeric',
        'discretionary' => 'required|min:0|numeric'
      ]);

      $year = date('Y') + 1;
      $ilab = ILab::where('user_id', $user->id)->where('other', $year)->first();
      $ilab->investment = $request->investment ;
      $ilab->equity = $request->equity ;
      $ilab->savings = $request->savings ;
      $ilab->credit = $request->credit ;
      $ilab->mortgage = $request->mortgage ;
      $ilab->non_portfolio = $request->non_portfolio ;
      $ilab->asset_portfolio = $request->portfolio ;
      $ilab->periodic_savings = $request->periodic_savings ;
      $ilab->education = $request->education ;
      $ilab->expenditure = $request->expenditure ;
      $ilab->discretionary = $request->discretionary ;
      $ilab->savings;
      $ilab->save();

      return redirect()->back()->with(['success' => 'ILab target has been set']);
    }
}
