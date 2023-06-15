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
use App\Models\Asset\RecordBudgetSpent;

class SeedAllocationController extends Controller
{

    public function showAlloction(Request $request, $id){
      $user = $request->user();

      $period =  date('Y-m').'-01';
      $allocated = SeedBudgetAllocation::whereId($id)->where('period', $period)->first();

      if($allocated){
            $spents = RecordBudgetSpent::whereAllocationId($id)->get();
            $summary = AllocationHelpers::allocationSummay($allocated, $spents);
            $spents = RecordBudgetSpent::whereAllocationId($id)->get()
                        ->groupBy(function($item) {
                            return $item->date;
                        });

            $record_spents = array();

            foreach ($spents as $key => $spend) {
                $amount = array_sum(array_column($spend->toArray(), 'amount')) ;
                $record = array();
                $key = date('D, F j, Y', strtotime($key));
                // array_push($record, $key);
                $record[$key]['total_amount'] = $amount;
                $record[$key]['list'] = $spend;
                array_push($record_spents, $record);
            }

            $data = compact('allocated', 'record_spents', 'summary');

            return response()->json([
                'status' => true,
                'data' => $data,
                'message' => 'Allocation Summary'
            ], 200);
      }else{
        return response()->json(['status' => false,'message' => 'Allocation not found'], 404);
      }
    }


    public function seedSummaryPage(Request $request, $seed){
        $user = $request->user();
        $calculator = Calculator::where('user_id', $user->id)->first();
        $currency = explode(" ", $calculator->currency)[0];
        $category = $request->input('category');
        $budget = $request->input('budget');

        $seeds = ['savings', 'expenditure','education', 'discretionary'];
        $categories = ['accommodation','transportation','family','utilities','debt_repayment'];
        $isTarget = ($request->budget == 'seed_future_budget') ? 'target' : 'current';

        $category = (in_array($category, $categories)) ? $category: null;
        $period =   ($isTarget == 'target') ? date('Y-m',  strtotime("+1 month")).'-01' : date('Y-m').'-01';
        $current_detail = AllocationHelpers::getAllocatedSeedDetail($user, $isTarget);
        $backgrounds = array_reverse(GapAccount::accountBackground());
        if ($seed == 'expenditure' && !$category){
            $groups = array();
            $labels = array();
            $allocations = SeedBudgetAllocation::where('seed_category','expenditure')
                            ->where('user_id', $user->id)->where('period', $period)->get();

            foreach ($allocations->toArray() as $allocation) {
                array_push($labels, $allocation['expenditure']);
                $groups[$allocation['expenditure']]['label'] = $allocation['expenditure'];
            }

            foreach($groups as $key => $group){
                $groups[$key]['amount'] =  SeedBudgetAllocation::where('period', $period)->where('user_id', $user->id)
                                                                    ->where('expenditure',$group['label']) ->sum('amount');
            }
            $allocations = array_values($groups) ;

            return view('user.seed.allocation_summary_expenditure', compact('currency','current_detail','allocations', 'seed'));
        } else if(in_array($seed, $seeds)){
            $allocations = SeedBudgetAllocation::where('seed_category', strval($seed))
                        ->where('user_id', $user->id)->where('period', $period)
                        ->when($category, function ($query, $category) {
                            return $query->where('expenditure', $category);
                        })->latest()->get();

            foreach($allocations as $allocation){
                $record_spents = RecordBudgetSpent::whereAllocationId($allocation->id)->get();
                $summary = AllocationHelpers::allocationSummay($allocation, $record_spents);
                $allocation->summary = compact('record_spents', 'summary');
            }

            return view('user.seed.allocation_summary', compact('currency','current_detail','allocations', 'seed','category','backgrounds'));
        }else{
            return  redirect('404');
        }
    }

    public function listAllocation(Request $request){
        $user = $request->user();

        $period =  date('Y-m').'-01';
        $labels = array();
        $category = $request->input('category') ?? 'savings';
        $expenditure = $request->input('expenditure');
        $budget_allocation =  SeedBudgetAllocation::where('seed_category', $category)
                                    ->when($expenditure, function ($query, $expenditure) {
                                        return $query->where('expenditure', $expenditure);
                                    })
                                  ->where('user_id', $user->id)->where('period', $period)->get();

        if($category == 'expenditure'){
            foreach($budget_allocation as $allocation){
                // info($allocation);
               if($allocation->seed_category == 'expenditure'){
                    // if($allocation->expenditure == 'family'){
                    //     $label  = 'Home & Family';
                    // } elseif ($allocation->expenditure == 'debt_repayment') {
                    //     $label =  'Debt Repayment' ;
                    // }else{
                    // }
                    $label = ucfirst($allocation->expenditure);
                    array_push($labels, $label);
               }
            }
        }

        $expenditure_labels  =  array_unique($labels);

        foreach($budget_allocation as $allocation){
           $record_spents = RecordBudgetSpent::whereAllocationId($allocation->id)->get();
           $allocation->summary = AllocationHelpers::allocationSummay($allocation, $record_spents);
        }


        return response()->json([
            'status' => true,
            'data' => compact('budget_allocation','expenditure_labels'),
            'message' => ''
         ]);

    }

    public function storeCategoryAllocation(Request $request){
      $user = $request->user();

      $this->validate($request, [
        'category' => 'required|in:savings,education,expenditure,discretionary',
        'label' => 'required|between:3,50',
        'amount' => 'required|numeric|min:1',
      ]);

      if($request->category == 'expenditure'){
        $this->validate($request, [
          'expenditure' => 'required|in:accommodation,transportation,family,utilities,debt_repayment',
          // 'recuring' => 'required|integer|between:0,1'
        ]);
      }

      if($request->label == "Others") {
        $this->validate($request, [
            'other_label' => 'required|between:3,50',
        ]);

        $request['label'] = $request->other_label;
      }

      $isTarget = ($request->period == 'seed_future_budget') ? 'target' : 'current';


      $current_seed =  ($isTarget == 'target') ? CalculatorClass::getTargetSeed($user) : CalculatorClass::getCurrentSeed($user);
      $current_detail = AllocationHelpers::getAllocatedSeedDetail($user, $isTarget);

      $available_allocation = $current_seed->budget_amount -  $current_detail['total'];

      if($request->amount > $available_allocation){
        return redirect()->back()->with('error', 'Amount is greater than available allocation');
      }

      $request['recuring'] = ($request->recuring == 'on') ? 1 : 0;
      $request['seed_category'] = $request->category;
      $request['user_id'] = $user->id;
      $request['period'] =   ($isTarget == 'target') ? date('Y-m',  strtotime("+1 month")).'-01' : date('Y-m').'-01';
      if($request['recuring'] == 1) $request['date'] = $request->date;


      $budget_allocation =  SeedBudgetAllocation::create($request->all());
      return redirect()->back()->with(['success' => 'Allocation has been created']);
    //   return redirect()->route('seed.summary', $request->category)->with(['success' => 'Allocation has been created']);
    }

    public function updateCategoryAllocation(Request $request, $id){
        $user = $request->user();
        $period =  date('Y-m').'-01';
        $allocated = SeedBudgetAllocation::whereId($id)->where('period', $period)->first();
        // info($request->all());

        if($allocated){
            $this->validate($request,[
              'label' => 'required|between:3,50',
              'amount' => 'required|numeric|min:1',
              'recuring' => 'nullable'
            ]);

            $current_seed = CalculatorClass::getCurrentSeed($user);
            $current_detail = AllocationHelpers::getAllocatedSeedDetail($user);
            $available_allocation = $current_seed->budget_amount -  $current_detail['total'];

            if($request->amount >= $available_allocation  && !($allocated->amount >= $request->amount)){
                return redirect()->back()->with('error', 'Your set amount is lower than the sum of your allocated SEED, reduce any of your allocated SEED to accommodate this reduction');
            }

            $request['recuring'] = ($request->recuring == 'on') ? 1 : 0;
            $allocated->update($request->all());

            return  redirect()->back()->with('success','Seed Allocation has been updated');

        }else{
          return redirect()->back()->with('error', 'Allocation not found', 404);
        }
    }

    public function deleteAllocation(Request $request, $id){
        $user = $request->user();
        $period =  date('Y-m').'-01';
        $allocation = SeedBudgetAllocation::whereId($id)->where('period', $period)->first();
        if($allocation){
            $record_spents = RecordBudgetSpent::whereAllocationId($allocation->id)->delete();

            $allocation->delete();
            return redirect()->back()->with('success','Allocation has been deleted');
            // if(count($record_spents) == 0){
            // }else{
            //     return redirect()->back()->with('error', 'Allocation cannot be deleted');
            // }

        }else{
            return redirect()->back()->with('error', 'Allocation not found', 404);
        }
      }


      public function showRecordSpend(Request $request, $id){
        $user = $request->user();
        $period =  date('Y-m').'-01'; $cp = date('m')-1;
        $last_period =  date('Y-'). $cp .'-01';
        $record = RecordBudgetSpent::whereId($id)->where('period', $period)->first();
        if($record){

            $record->spent_current_month = RecordBudgetSpent::where('user_id', $user->id)->where('period', $period)->where('label',$record->label)->sum('amount');
            $record->spent_last_month = RecordBudgetSpent::where('user_id', $user->id)->where('period', $last_period)->where('label',$record->label)->sum('amount');

            return response()->json([
                'status' => true,
                'data' => $record,
                'message' => 'Allocation Record'
              ]);
        }else{
            return response()->json(['status' => false,'message' => 'Allocation not found'], 404);
        }
    }

    public function storeRecordSpent(Request $request){
        $user = $request->user();

        $this->validate($request, [
            'allocation' => 'required|exists:seed_budget_allocations,id',
            'label' => 'required|between:3,50',
            'amount' => 'required|numeric|min:1',
            'date' => 'required|date'
        ]);

        $request['recuring'] = ($request->recuring == 'on') ? 1 : 0;
        $request['allocation_id'] = $request->allocation;
        $request['user_id'] = $user->id;
        $request['period'] =  date('Y-m').'-01';

        $record_spent =  RecordBudgetSpent::create($request->all());

        return redirect()->route('seed', ['spend' => 'w67tsedgfthudbyhbj','dygvhsbjyfctguysbhdd' => $record_spent->id])
                            ->with(['spend' => $record_spent->id ,'success' =>  'Record spent has been recorded' ]);
    }

    public function updateRecordSpend(Request $request, $id){
        $user = $request->user();
        $period =  date('Y-m').'-01';
        $record = RecordBudgetSpent::whereId($id)->where('period', $period)->first();
        if($record){
            $this->validate($request, [
                'label' => 'required|between:3,50',
                'amount' => 'required|numeric|min:1'
            ]);

            $request['recuring'] = ($request->record_spend_recuring == 'on') ? 1 : 0;

            $record->update($request->all());

            return redirect()->back()->with('success','Allocation Record has been updated');
        }else{
            return  redirect()->back()->with('error', 'Allocation not found');
        }
    }

    public function deleteRecordSpend(Request $request, $id){
        $user = $request->user();
        $period =  date('Y-m').'-01';
        // info([$period, $id]);
        $spent = RecordBudgetSpent::whereId($id)->where('period', $period)->first();
        if($spent){
            $spent->delete();
            return redirect()->back()->with('success','Record Spent has been deleted');
        }else{
            return redirect()->back()->with('error', 'Record Spent not found', 404);
        }
    }
}
