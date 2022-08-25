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

    public function showAlloction(Request $request, $id){
      $user = $request->user();

      $month =  date('Y-m').'-01';
      $allocated = SeedBudgetAllocation::whereId($id)->where('period', $month)->first();

      if($allocated){
            $spents = RecordBudgetSpent::whereAllocationId($id)->get();
            $summary = AllocationHelpers::allocationSummay($allocated, $spents);
            $record_spents = RecordBudgetSpent::whereAllocationId($id)
                        ->get()->groupBy(function($item) {
                            return $item->date;
                        });

            foreach ($record_spents as $key => $spend) {
                $amount = array_sum(array_column($spend->toArray(), 'amount')) ;
                $spend['total_amount'] = $amount;
                // $record_spents[$key]['total_amount'] = $amount;
            }

            // info($record_spents);
            $data = compact('allocated', 'record_spents', 'summary');

            return response()->json([
                'status' => true,
                'data' => $data,
                'message' => 'Alllocation Summary'
            ], 200);
      }else{
        return response()->json(['status' => false,'message' => 'Allocation not found'], 404);
      }
    }

    public function seedSummaryPage(Request $request, $seed){
        $user = $request->user();
        $month =  date('Y-m').'-01';
        $calculator = Calculator::where('user_id', $user->id)->first();
        $currency = explode(" ", $calculator->currency)[0];
        $category = $request->input('category');
        $seeds = ['savings', 'expenditure','education', 'discretionary'];
        $categories = ['accommodation','transportation','family','utilities','debt_repayment'];
        $category = (in_array($category, $categories)) ? $category: null;
        $current_detail = AllocationHelpers::getAllocatedSeedDetail($user);

        if ($seed == 'expenditure' && !$category){
            $groups = array();
            $allocations = SeedBudgetAllocation::where('seed_category', strval($seed))
                            ->where('user_id', $user->id)->where('period', $month)->get();

            foreach ($allocations->toArray() as $allocation) {
                $groups[$allocation['expenditure']]['label'] = $allocation['expenditure'];
             }

             foreach($groups as $group){
                $groups[$allocation['expenditure']]['amount'] =  SeedBudgetAllocation::where('period', $month)
                                                                        ->where('expenditure',$group['label']) ->sum('amount') ?? 0;
             }
             $allocations = array_values($groups) ;
             return view('user.seed.allocation_summary_expenditure', compact('currency','current_detail','allocations', 'seed'));
        } else if(in_array($seed, $seeds)){
            $allocations = SeedBudgetAllocation::where('seed_category', strval($seed))
                        ->where('user_id', $user->id)->where('period', $month)
                        ->when($category, function ($query, $category) {
                            return $query->where('expenditure', $category);
                        })->latest()->get();

            foreach($allocations as $allocation){
                $record_spents = RecordBudgetSpent::whereAllocationId($allocation->id)
                        ->get();

                $summary = AllocationHelpers::allocationSummay($allocation, $record_spents);
                $allocation->summary = compact('record_spents', 'summary');
            }

            return view('user.seed.allocation_summary', compact('currency','current_detail','allocations', 'seed','category'));
        }else{
            return  redirect('404');
        }
    }

    public function listAllocation(Request $request){
        $user = $request->user();

        $month =  date('Y-m').'-01';
        $category = $request->input('category') ?? 'savings';
        $expenditure = $request->input('expenditure');
        $budget_allocation =  SeedBudgetAllocation::where('seed_category', $category)
                                    ->when($expenditure, function ($query, $expenditure) {
                                        return $query->where('expenditure', $expenditure);
                                    })
                                  ->where('user_id', $user->id)->where('period', $month)->get();

        foreach($budget_allocation as $allocation){
           $record_spents = RecordBudgetSpent::whereAllocationId($allocation->id)->get();
           $allocation->summary = AllocationHelpers::allocationSummay($allocation, $record_spents);
        }

         return response()->json([
            'status' => true,
            'data' => $budget_allocation,
            'message' => ''
         ]);

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
      return redirect()->route('seed.summary', $request->category)->with(['success' => 'Allocation has been created']);
    }

    public function updateCategoryAllocation(Request $request, $id){
        $user = $request->user();

        $month =  date('Y-m').'-01';
        $allocated = SeedBudgetAllocation::whereId($id)->where('period', $month)->first();
        if($allocated){
            $this->validate($request,[
              'label' => 'required|between:3,50',
              'amount' => 'required|numeric|min:0',
            ]);

            // if($validator->fails()){
            //   return response()->json([ 'status' => false, 'errors' =>$validator->errors()->toJson()], 400);
            // }

            $current_seed = CalculatorClass::getCurrentSeed($user);
            $current_detail = AllocationHelpers::getAllocatedSeedDetail($user);
            $available_allocation = $current_seed->budget_amount -  $current_detail['total'];

            if($request->amount > $available_allocation){
              return redirect()->back()->with('error', 'Amount is greater than Available allocation');
            }

          $allocated->update($request->all());

          return  redirect()->back()->with('success','Seed Allocation has been updated');

        }else{
          return redirect()->back()->with('error', 'Allocation not found', 404);
        }
    }

    public function deleteAllocation(Request $request, $id){
        $user = $request->user();
        $month =  date('Y-m').'-01';
        $allocation = SeedBudgetAllocation::whereId($id)->where('period', $month)->first();
        if($allocation){
            $record_spents = RecordBudgetSpent::whereAllocationId($allocation->id)->get();
            if(count($record_spents) == 0){
                $allocation->delete();
                return redirect()->back()->with('success','Allocation has been deleted');
            }else{
                return redirect()->back()->with('error', 'Allocation can not be deleted');
            }

        }else{
            return redirect()->back()->with('error', 'Allocation not found', 404);
        }
      }

    public function storeRecordSpent(Request $request){
        $user = $request->user();

        $this->validate($request, [
            'allocation' => 'required|exists:seed_budget_allocations,id',
            'label' => 'required|between:3,50',
            'amount' => 'required|numeric|min:0'
          //   'date' => 'required|date'
        ]);

        $request['allocation_id'] = $request->allocation;
        $request['user_id'] = $user->id;
        $request['period'] =  date('Y-m').'-01';
        $record_spent =  RecordBudgetSpent::create($request->all());

        return redirect()->back()->with(['success' =>  'Record spent has been recorded' ]);
    }


}
