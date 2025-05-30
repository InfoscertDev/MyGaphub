<?php

namespace App\Http\Controllers\Web;


use DB;
use Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Helper\HelperClass;
use App\Helper\GapAccountCalculator as GapAccount;
use App\Helper\AnalyticsClass as SevenG;
use App\Asset\SeedBudget as Budget;
use App\Models\Notification;
use App\Wheel\CashAccount as Cash;
use App\Wheel\IncomeAccount as Income;
use App\FinicialCalculator as Calculator;
use App\SevenG\GrandFin as Grand;
use App\DiscretionaryBudget as Philantrophy;

use App\Helper\AllocationHelpers;
use App\Helper\CalculatorClass;
use App\Helper\GapExchangeHelper;
use App\Helper\IncomeHelper;
use App\ILab;
use Carbon\Carbon;
use App\Helper\WheelClass as Wheel;
use App\Models\Asset\SeedBudgetAllocation;
use App\Models\Asset\RecordBudgetSpent;
use App\Asset\PortfoloAssetRecord;
use App\Models\Asset\NonPortfolioRecord;

class SeedController extends Controller
{
    public function index(Request $request){
      $user = auth()->user();
      $page_title = "Manage Your Money the SEED Way";
      $support = true;
      $preview = $request->input('preview');
      $current_seed = CalculatorClass::getCurrentSeed($user);


      if($preview == '7w6refsgwubjhsdbfgcyuxbhsjwdcfuhghvbqansmdbjhjnhjb'){
        $current_seed->priviewed = 1;
        $current_seed->save();
        return redirect()->route('seed');
      }

      $seed_backgrounds = CalculatorClass::accountBackground();
      $isValid = SevenG::isSevenGVal($user);
      $calculator = Calculator::where('user_id', $user->id)->first();
      $currency = explode(" ",$calculator->currency)[0];

      $target_seed = CalculatorClass::getTargetSeed($user);
      $average_seed = CalculatorClass::getAverageSeed($user);

      AllocationHelpers::monthlyRecurssionChecker($user);

      $previous_budgets = Budget::where('user_id', $user->id)->count();
      $current_detail = AllocationHelpers::getAllocatedSeedDetail($user);
      $target_detail = AllocationHelpers::getAllocatedSeedDetail($user, 'target');
      $average_detail = AllocationHelpers::averageSeedDetail($user)['average_seed'];

      return view('user.seed.master', compact('page_title', 'support','seed_backgrounds', 'currency','isValid','current_seed', 'target_seed',
          'average_detail', 'current_detail', 'target_detail','average_seed', 'previous_budgets'));
    }

    public function storeSetBudget(Request $request){
        $user = $request->user();
        $content = $request->headers->get("Content-type");


        $request->validate([
          'budget' => 'required|numeric'
        ]);

        $isTarget = ($request->period == 'ediucfhjbndcfjnkdcknj') ? 'target' : 'current';

        $current_detail = AllocationHelpers::getAllocatedSeedDetail($user, $isTarget);
        $available_allocation = $request->budget - $current_detail['total'];
        // info($content);
        // info([$available_allocation,$request->seed, $request->budget]);
        if($available_allocation >= 0){
            $seed = ($isTarget == 'target') ? CalculatorClass::getTargetSeed($user) : CalculatorClass::getCurrentSeed($user);
            $seed->budget_amount =  $request->budget;
            $seed->priviewed = 1 ;
            $seed->update();
            if(str_contains($content, 'multipart/form-data')) return response()->json([ 'status' => true ]);
            return redirect()->back()->with(['success' => 'Seed Budget has been set']);
        }else{
            if(str_contains($content, 'multipart/form-data')) return response()->json([ 'status' => true ]);
            return redirect()->back()->with(['alert' => 'Your set amount is lower than the sum of your allocated SEED,'])->withInput();
        }
    }

    public function assignSeedIncome(Request $request){
        $user = $request->user();

        $request->validate([
          'seed_income' => 'required',
          'seed_budget' => 'required|min:0|numeric'
        ]);

        $current_period = date('Y-m').'-01';
        $income = Income::where('user_id', $user->id)->where('id', $request->seed_income)->first();

        if($income->income_type == "non_portfolio"){
            $record = NonPortfolioRecord::where('user_id', $user->id)
                            ->where('income_id', $income->id)
                            ->update(['seed_budget' => $request->seed_budget]);

        }else {
            $record = PortfoloAssetRecord::where('user_id', $user->id)
                            ->where('portfolio_asset_id', $income->id)
                            ->update(['seed_budget' => $request->seed_budget]);
        }

        return redirect()->route('seed.create',[ 'assigned' => 'w67tsedgfthudbyhbj' ]);
    }


    public function create(Request $request){
      $user = auth()->user();
      $page_title = "My Current Month";
      $support = true;
      $month =  date('Y-m').'-01';
      $preview = $request->input('preview');

      $seed_backgrounds = CalculatorClass::accountBackground();
      $backgrounds = GapAccount::accountBackground();
      $isValid = SevenG::isSevenGVal($user);
      $calculator = Calculator::where('user_id', $user->id)->first();
      $currency = explode(" ", $calculator->currency)[0];
      $current_seed = CalculatorClass::getCurrentSeed($user);
      $target_seed = CalculatorClass::getTargetSeed($user);
      $average_seed = CalculatorClass::getAverageSeed($user);
      $current_detail = AllocationHelpers::getAllocatedSeedDetail($user);

      $incomes = Income::where('user_id', $user->id)->where('isArchive', 0)->orderBy('income_date', 'DESC')->get();
      $total_assigned = array_sum(array_column($incomes->toArray(), 'assigned_income'));

      $income_helper = new IncomeHelper();
      foreach ($incomes as $income) {
        if($income->income_type == 'portfolio') {
            $income->records = $income_helper->portfolioIncomeRecord($user,$income);
        }else{
            $income->records = $income_helper->nonPortfolioIncomeRecord($user,$income);
        }
      }

      if($preview == '7w6refsgwubjhsdbfgcyuxbhsjwdcfuhghvbqansmdbjhjnhjb'){
        // $current_seed = Budget::where('user_id', $user->id)->where('period', date('Y-m').'-01')->first();
        $current_seed->priviewed = 1 ;
        $current_seed->save();
      }

      if($preview == 'cleanup_data'){
        Budget::firstOrCreate(['user_id' => $user->id, 'period' => $month])->update([ 'budget_amount' => 0,'priviewed' => 0 ]);
        SeedBudgetAllocation::where(['user_id' => $user->id, 'period' => $month])->delete();
        RecordBudgetSpent::where(['user_id' => $user->id, 'period' => $month])->delete();
      }

      $available_allocation = $current_seed->budget_amount - $current_detail['total'];

      return view('user.seed.create', compact('page_title', 'support','seed_backgrounds', 'currency','isValid','current_seed', 'target_seed',
         'available_allocation', 'current_detail', 'incomes','total_assigned', 'backgrounds'
      ));
    }

    public function future(Request $request){
        $user = auth()->user();
        $page_title = "My Budget";
        $clone = $request->input('clone');
        $support = true; $month =  date('Y-m').'-01';
        $preview = $request->input('preview');

        $seed_backgrounds = CalculatorClass::accountBackground();
        $isValid = SevenG::isSevenGVal($user);
        $calculator = Calculator::where('user_id', $user->id)->first();
        $currency = explode(" ", $calculator->currency)[0];
        $current_seed = CalculatorClass::getCurrentSeed($user);
        $target_seed = CalculatorClass::getTargetSeed($user, $clone);
        $average_seed = CalculatorClass::getAverageSeed($user);
        $target_detail = AllocationHelpers::getAllocatedSeedDetail($user, 'target');

        // info($target_seed);
        $available_allocation = $target_seed->budget_amount - $target_detail['total'];

        return view('user.seed.future', compact('page_title', 'support','seed_backgrounds', 'currency','isValid','current_seed', 'target_seed',
           'available_allocation', 'target_detail'
        ));
      }


    public function history(Request $request){
      $user = auth()->user();
      $page_title = "Average Seed";
      $support = true; $month =  date('Y-m').'-01';
      $preview = $request->input('preview');

      $seed_backgrounds = CalculatorClass::accountBackground();
      $isValid = SevenG::isSevenGVal($user);
      $calculator = Calculator::where('user_id', $user->id)->first();
      $currency = explode(" ", $calculator->currency)[0];
      $current_seed = CalculatorClass::getCurrentSeed($user);
      $target_seed = CalculatorClass::getTargetSeed($user);
      $average_seed = CalculatorClass::averageSeedDetail($user);

      $current_detail = AllocationHelpers::getAllocatedSeedDetail($user);
      $average_detail = AllocationHelpers::averageSeedDetail($user)['average_seed'];
      $historic_seed = AllocationHelpers::averageSeedDetail($user)['historic_seed'];

      $periods = AllocationHelpers::averageSeedDetail($user)['periods'];

      $available_allocation = $current_seed->budget_amount - $current_detail['total'];
      return view('user.seed.history.index', compact('page_title', 'support','seed_backgrounds', 'currency','isValid','current_seed', 'target_seed',
         'available_allocation', 'current_detail','average_detail', 'historic_seed','periods'
      ));
    }


   public function chartHistory(Request $request){
      $user = auth()->user();
      $page_title = "My Historic Seed";
      $support = true; $month =  date('Y-m').'-01';
      $preview = $request->input('preview');

      $seed_backgrounds = CalculatorClass::accountBackground();
      $isValid = SevenG::isSevenGVal($user);
      $calculator = Calculator::where('user_id', $user->id)->first();
      $currency = explode(" ", $calculator->currency)[0];
      $current_seed = CalculatorClass::getCurrentSeed($user);
      $target_seed = CalculatorClass::getTargetSeed($user);
      $average_detail = AllocationHelpers::averageSeedDetail($user);
      $current_detail = AllocationHelpers::getAllocatedSeedDetail($user);

      $available_allocation = $current_seed->budget_amount - $current_detail['total'];

      $average_detail = AllocationHelpers::averageSeedDetail($user)['average_seed'];
      $historic_seed = AllocationHelpers::averageSeedDetail($user)['historic_seed'];
      $periods = AllocationHelpers::averageSeedDetail($user)['periods'];

      return view('user.seed.history.chart_history', compact('page_title', 'support','seed_backgrounds', 'currency','isValid','current_seed', 'target_seed',
         'available_allocation', 'current_detail','average_detail', 'historic_seed','periods'
      ));
    }

    public function seedPeriodHistory(Request $request, $period){
      $user = auth()->user();
      $page_title = "My Historic Seed";
      $support = true;
      $month =  date('Y-m').'-01';
      $priority = $request->input('priority');

      $calculator = Calculator::where('user_id', $user->id)->first();
      $currency = explode(" ", $calculator->currency)[0];
      $period_end = date("Y-m-t", strtotime($period));

      if($priority){
        Notification::where('user_id', $user->id)
            ->where('id', $priority)->update(['seen' => 1]);
      }

        //info([$period, $period_end,  url()->current() ]);

      $monthly_seed = AllocationHelpers::monthlySeedDetail($user, $period);

      $periods = AllocationHelpers::averageSeedDetail($user)['periods'];


      $allocations =  SeedBudgetAllocation::where('user_id', $user->id)
                            ->whereBetween('period', [$period, $period_end])
                            ->get();

      $ids =  array_column($allocations->toArray(), 'id');

      $record_spend = RecordBudgetSpent::where('user_id', $user->id)
                                //  ->whereBetween('period', [$period, $period_end])
                                 ->whereIn('allocation_id', $ids)->get();

      $total_actual = array_sum(array_column($record_spend->toArray(), 'amount'));


      return view('user.seed.history.period_history', compact('page_title', 'support', 'currency',
        'monthly_seed', 'periods', 'period', 'period_end','total_actual'
      ));
    }

    public function periodHistoryDiffrences(Request $request, $period){
        $user = auth()->user();
        $page_title = "My Historic SEED";
        $support = true; $month =  date('Y-m').'-01';
        $preview = $request->input('preview');

        $isValid = SevenG::isSevenGVal($user);
        $calculator = Calculator::where('user_id', $user->id)->first();
        $currency = explode(" ", $calculator->currency)[0];

        $periods = AllocationHelpers::averageSeedDetail($user)['periods'];
        $period_end = date("Y-m-t", strtotime($period));

        $allocations = [];
        $budget =  SeedBudgetAllocation::where('user_id', $user->id)
                                ->whereBetween('period', [$period, $period_end])
                                ->get();


        foreach($budget as $allocation){
            $actual =  RecordBudgetSpent::where('user_id', $user->id)
                             ->where('allocation_id', $allocation->id)->sum('amount');
            $allocation->actual  = $actual;
            $allocations[] = $allocation;
        }

        return view('user.seed.history.period_diffrences',
             compact('page_title', 'support', 'currency','period','periods', 'allocations'
        ));
    }


    public function monthlySeedReport(Request $request, $period){
        $user = auth()->user();
        $page_title = "My Historic SEED";
        $support = true; $month =  date('Y-m').'-01';
        $preview = $request->input('preview');

        $isValid = SevenG::isSevenGVal($user);
        $calculator = Calculator::where('user_id', $user->id)->first();
        $currency = explode(" ", $calculator->currency)[0];

        $period_end = date("Y-m-t", strtotime($period));
        $periods = AllocationHelpers::averageSeedDetail($user)['periods'];

        $allocations =  SeedBudgetAllocation::where('user_id', $user->id)
                            ->whereBetween('period', [$period, $period_end])
                            ->get();
        $total_budget =  array_sum(array_column($allocations->toArray(), 'amount'));

        $ids =  array_column($allocations->toArray(), 'id');
        $record_spend = RecordBudgetSpent::where('user_id', $user->id)
                    ->whereIn('allocation_id', $ids)->get();

        $total_actual = array_sum(array_column($record_spend->toArray(), 'amount'));


        $savings_allocations = SeedBudgetAllocation::where('seed_category','savings')->where('user_id', $user->id)
                                    ->whereBetween('period', [$period, $period_end])
                                    ->latest()->limit(3)->get();

        foreach($savings_allocations->toArray() as $allocation){
            $actual =  $record_spend = RecordBudgetSpent::where('user_id', $user->id)
                                ->where('allocation_id', $allocation['id'])->sum('amount');
            $allocation['actual']  = $actual;
        }

        $expenditure_allocations = SeedBudgetAllocation::where('seed_category','expenditure')->where('user_id', $user->id)
                                        ->whereBetween('period', [$period, $period_end])
                                        ->latest()->limit(3)->get();
        foreach($expenditure_allocations->toArray() as $allocation){
            $actual =  $record_spend = RecordBudgetSpent::where('user_id', $user->id)
                                ->where('allocation_id', $allocation['id'])->sum('amount');
            $allocation['actual']  = $actual;
        }

        $education_allocations = SeedBudgetAllocation::where('seed_category','education')->where('user_id', $user->id)
                                    ->whereBetween('period', [$period, $period_end])
                                    ->latest()->limit(3)->get();
        foreach($education_allocations->toArray() as $allocation){
            $actual =  $record_spend = RecordBudgetSpent::where('user_id', $user->id)
                                ->where('allocation_id', $allocation['id'])->sum('amount');
            $allocation['actual']  = $actual;
        }

        $discretionary_allocations = SeedBudgetAllocation::where('seed_category','discretionary')->where('user_id', $user->id)
                                    ->whereBetween('period', [$period, $period_end])
                                    ->latest()->limit(3)->get();
        foreach($discretionary_allocations->toArray() as $allocation){
            $actual =  $record_spend = RecordBudgetSpent::where('user_id', $user->id)
                                ->where('allocation_id', $allocation['id'])->sum('amount');
            $allocation['actual']  = $actual;
        }

        return view('user.seed.monthly_report',
             compact('page_title', 'support', 'currency','period','periods', 'total_budget', 'total_actual',
             'savings_allocations', 'expenditure_allocations','education_allocations', 'discretionary_allocations'
        ));
    }


    public function periodHistoryReport(Request $request, $period, $seed){
        $user = auth()->user();
        $page_title = "My Historic Seed";
        $support = true;
        $month =  date('Y-m').'-01';
        $label = $request->input('label');

        $calculator = Calculator::where('user_id', $user->id)->first();
        $currency = explode(" ", $calculator->currency)[0];
        $category = $request->input('category');
        $period_end = date("Y-m-t", strtotime($period));

        $seeds = ['savings', 'expenditure','education', 'discretionary'];
        $categories = ['accommodation','transportation','family','utilities','debt_repayment'];
        $category = (in_array($category, $categories)) ? $category: null;
        $periods = AllocationHelpers::averageSeedDetail($user)['periods'];
        $labels = [];
        $label_report = array();
        if ($seed == 'expenditure' && !$category){
            $groups = array();
            $allocations = SeedBudgetAllocation::where('seed_category','expenditure')
                                    ->where('user_id', $user->id)
                                    ->whereBetween('period', [$period, $period_end])
                                    ->get();

            foreach ($allocations->toArray() as $allocation) {
                array_push($labels, $allocation['expenditure']);
                $groups[$allocation['expenditure']]['label'] = $allocation['expenditure'];
                $groups[$allocation['expenditure']]['amount'][] = $allocation['amount'];
            }

            $allocations = array_values($groups) ;

            return view('user.seed.history.period_expenditure_report', compact('page_title', 'support', 'currency',
                   'allocations', 'periods', 'period', 'period_end','seed', 'labels'
            ));

        } else if(in_array($seed, $seeds)){
            if($label){
                $allocations = SeedBudgetAllocation::where('user_id', $user->id)
                                ->where('seed_category', strval($seed))
                                ->where('label', $label)
                                ->whereBetween('period', [$period, $period_end])
                                ->get();

                foreach($allocations as $allocation){
                    $label_report[$allocation->period][] = $allocation;
                }

                $labels = array_keys($label_report);

                foreach($label_report as $key => $value){
                    $ids =  (array_column($label_report[$key], 'id'));
                    $amount = array_sum(array_column($label_report[$key], 'amount'));

                    $record_spend = RecordBudgetSpent::where('user_id', $user->id)
                                      ->where('allocation_id', $ids)->sum('amount');

                    $label_report[$key] = [
                        'budget' => $amount,
                        'actual' => $record_spend,
                    ];
                }
            }else{
                $allocations = SeedBudgetAllocation::where('seed_category', strval($seed))
                            ->where('user_id', $user->id)
                            ->whereBetween('period', [$period, $period_end])
                            ->when($category, function ($query, $category) {
                                return $query->where('expenditure', $category);
                            })->latest()->get();

                foreach($allocations as $allocation){
                    $spents = RecordBudgetSpent::whereAllocationId($allocation->id)->get();
                    $allocation->actual =  array_sum(  array_column($spents->toArray(),'amount')  ) ;
                }
            }
            return view('user.seed.history.period_history_report', compact('page_title', 'support', 'currency',
                   'allocations', 'periods', 'period', 'period_end','seed', 'label', 'label_report', 'labels','category'
           ));

        }else{
            return  redirect('404');
        }
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
        $month =  date('Y-m').'-01';
        $isValid = SevenG::isSevenGVal($user);
        $calculator = Calculator::where('user_id', $user->id)->first();
        $currency = explode(" ", $calculator->currency)[0];
        $currencies = HelperClass::popularCurrenciens();
        $equity_info = GapExchangeHelper::availabeleMortgages($user);
        $fin = CalculatorClass::finicial($user);
        $income_detail = IncomeHelper::analyseIncome($user,  $fin['portfolio']);
        $expenditure =  $fin['calculator'];
        $backgrounds = GapAccount::accountBackground();
        $net = GapAccount::netWorthVariable($user);
        $net_detail = GapAccount::calcNetWorth($user);

        // $values = array();
        // $labels = array('accommodation', 'transportation', 'family', 'utilities', 'debt_repayment');

        // $average =  AllocationHelpers::averageSeedExpenditure($user);

        // foreach($labels as $key => $label){
        //     $amount =  SeedBudgetAllocation::where('period', $month)->where('user_id', $user->id)
        //                                     ->where('expenditure',$label) ->sum('amount');
        //     $labels[$key] = SeedController::filterExpenditure($label);
        //     array_push($values, $amount);
        // }

        $expenditure_detail = AllocationHelpers::averageSeedExpenditure($user);
        // info($expenditure_detail);
        return view('user.360.expenditure', compact('isValid', 'currency','currencies', 'net_detail' ,'net','equity_info','income_detail', 'backgrounds' ,'expenditure','expenditure_detail'));
    }

    private static function filterExpenditure($value){
        if($value == 'familx`y'){
            $value = 'Home & Family';
        }else if ($value == 'debt_repayment') {
            $value = 'Debt Repayment';
        }else if($value){
           $value = ucfirst($value);
        }
        return $value;
     }



     public function philanthropy(){
        $user = auth()->user();
        $month =  date('Y-m').'-01';
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

        $values = array();
        $labels = array('Charitable Giving', 'Extended Family Support', 'Personal Conviction Commitments', 'Others');

        foreach($labels as $label){
            if($label == "Others"){
                $list =  array('Charitable Giving', 'Extended Family Support', 'Personal Conviction Commitments');
                $amount = SeedBudgetAllocation::where('period', $month)->where('user_id', $user->id)
                             ->where('seed_category', 'discretionary')->whereNotIn('label',$list) ->sum('amount');
            }else{
                $amount =  SeedBudgetAllocation::where('period', $month)->where('user_id', $user->id)
                                    ->where('label',$label) ->sum('amount');
            }
            array_push($values, $amount);
        }

        // $philantrophy_detail = GapAccount::calcPhilantrophy($user);
        $philantrophy_detail =  AllocationHelpers::averageSeedPhilantrophy($user);// compact('labels','values') ;

        return view('user.360.philanthropy', compact('isValid', 'currency','currencies', 'net_detail' ,'net','equity_info','income_detail', 'philantrophy', 'grand','philantrophy_detail'));
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
