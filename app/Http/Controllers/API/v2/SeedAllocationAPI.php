<?php

namespace App\Http\Controllers\API\v2;

use App\Helper\AllocationHelpers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asset\SeedBudgetAllocation;
use App\Models\Asset\RecordBudgetSpent;
use Illuminate\Support\Facades\Validator;
use App\Helper\GapAccountCalculator as GapAccount;


class SeedAllocationAPI extends Controller
{
    public function storeCategoryAllocation(Request $request){
        $user = $request->user();

        $validator = Validator::make($request->all(),[
          'category' => 'required|in:savings,education,expenditure,discretionary',
          'label' => 'required|between:3,50',
          'amount' => 'required|numeric|min:0',
        ]);

        if($request->category == 'expenditure'){
          $validator = Validator::make($request->all(),[
            'expenditure' => 'required|in:accommodation,transportation,family,utilities,debt_repayment',
            'recuring' => 'required|integer|between:0,1'
          ]);
        }

        if($validator->fails()){
          return response()->json([ 'status' => false, 'errors' =>$validator->errors()->toJson()], 400);
        }

        $current_detail = AllocationHelpers::getAllocatedSeedDetail($user);

        // if($current_detail['total'])
        $request['seed_category'] = $request->category;
        $request['user_id'] = $user->id;
        $request['period'] =  date('Y-m').'-01';
        $budget_allocation =  SeedBudgetAllocation::create($request->all());

        return response()->json([
          'status' => true, 'data' => $budget_allocation,
          'message' => 'Allocation has been created'
        ]);
    }

    public function updateCategoryAllocation(Request $request, $id){
        $user = $request->user();

        $month =  date('Y-m').'-01';
        $allocated = SeedBudgetAllocation::whereId($id)->where('period', $month)->first();
        if($allocated){
          $validator = Validator::make($request->all(),[
            'label' => 'required|between:3,50',
            'amount' => 'required|numeric|min:0',
          ]);

          if($validator->fails()){
            return response()->json([ 'status' => false, 'errors' =>$validator->errors()->toJson()], 400);
          }

          $allocated->update($request->all());

          return response()->json(['status' => true, 'data' => $allocated,'message' => 'Seed Allocation has been updated']);

        }else{
          return response()->json(['status' => false,'message' => 'Allocation not found'], 404);
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
                return response()->json([
                    'status' => true,
                    'message' => 'Allocation has been deleted'
                ], 201);
            }else{
                return response()->json([ 'status' => false, 'message' => 'Allocation can not be deleted' ], 400);
            }

        }else{
            return response()->json(['status' => false,'message' => 'Allocation not found'], 404);
        }
      }


    public function listAllocation(Request $request){
        $user = $request->user();

        $month =  date('Y-m').'-01';
        $category = $request->input('category') ?? 'savings';
        $expenditure = $request->input('expenditure');
        $budget_allocations =  SeedBudgetAllocation::where('seed_category', $category)
                                    ->when($expenditure, function ($query, $expenditure) {
                                        return $query->where('expenditure', $expenditure);
                                    })
                                ->where('user_id', $user->id)->where('period', $month)->get();


         foreach($budget_allocations as $allocation){
                $record_spents = RecordBudgetSpent::whereAllocationId($allocation->id)->get();
                $allocation->summary = AllocationHelpers::allocationSummay($allocation, $record_spents);
         }

        $groups = array();
        $allocations = SeedBudgetAllocation::where('seed_category','expenditure')
                        ->where('user_id', $user->id)->where('period', $month)->get();

        foreach ($allocations->toArray() as $allocation) {
            $groups[$allocation['expenditure']]['label'] = $allocation['expenditure'];
        }

        foreach($groups as $group){
            $groups[$allocation['expenditure']]['amount'] =  SeedBudgetAllocation::where('period', $month)->where('user_id', $user->id)
                                                                ->where('expenditure',$group['label']) ->sum('amount') ?? 0;
        }

        $budget_expenditures = array_values($groups) ;


        $data = compact('budget_allocations', 'budget_expenditures');

         return response()->json([
            'status' => true,
            'data' =>  $data,
            'message' => ''
         ]);

    }
    public function showAlloction(Request $request, $id){
        $user = $request->user();

        $month =  date('Y-m').'-01';
        $allocated = SeedBudgetAllocation::whereId($id)->where('period', $month)->first();
        if($allocated){
            $backgrounds = array_reverse(GapAccount::accountBackground());
            $spents = RecordBudgetSpent::whereAllocationId($id)->get();
            $summary = AllocationHelpers::allocationSummay($allocated, $spents);
            $spents = RecordBudgetSpent::whereAllocationId($id)
            ->get()->groupBy(function($item) {
                return $item->date;
            });
            $record_spents = array();

            foreach ($spents as $key => $spend) {
                $spend->spent_current_month = RecordBudgetSpent::where('user_id', $user->id)->where('period', $month)->sum('amount');
                $spend->spent_last_month = RecordBudgetSpent::where('user_id', $user->id)->where('period', $last_period)->sum('amount');
                $amount = array_sum(array_column($spend->toArray(), 'amount')) ;
                $record = array();
                // array_push($record, $key);
                $record[$key]['total_amount'] = $amount;
                $record[$key]['list'] = $spend;
                array_push($record_spents, $record);
            }

            $data = compact('allocated', 'record_spents', 'summary','backgrounds');

            return response()->json([
              'status' => true,
              'data' => $data,
              'message' => 'Alllocation Summary'
            ]);
        }else{
          return response()->json(['status' => false,'message' => 'Allocation not found'], 404);
        }
    }

    //

    public function showRecordSpend(Request $request, $id){
        $user = $request->user();
        $record = RecordSpend::whereId($id)->where('period', $month)->first();
        if($record){
            $record->spent_current_month = RecordBudgetSpent::where('user_id', $user->id)->where('period', $month)->sum('amount');
            $record->spent_last_month = RecordBudgetSpent::where('user_id', $user->id)->where('period', $last_period)->sum('amount');
            return response()->json([
                'status' => true,
                'data' => $record,
                'message' => 'Alllocation Record'
              ]);
        }else{
            return response()->json(['status' => false,'message' => 'Allocation not found'], 404);
        }
    }

    public function storeRecordSpent(Request $request){
        $user = $request->user();

        $validator = Validator::make($request->all(),[
          'allocation' => 'required|exists:seed_budget_allocations,id',
          'label' => 'required|between:3,50',
          'amount' => 'required|numeric|min:0',
            // 'date' => 'required|date'
        ]);


        if($validator->fails()){
          return response()->json([ 'status' => false, 'errors' =>$validator->errors()->toJson()], 400);
        }

        $request['allocation_id'] = $request->allocation;
        $request['user_id'] = $user->id;
        $request['period'] =  date('Y-m').'-01';
        $record_spent =  RecordBudgetSpent::create($request->all());

        return response()->json([
          'status' => true, 'data' => $record_spent,
          'message' => 'Record spent has been recorded'
        ]);
    }

    public function updateRecordSpend(Request $request, $id){
        $user = $request->user();
        $month =  date('Y-m').'-01';
        $record = RecordBudgetSpent::whereId($id)->where('period', $month)->first();
        if($record){
            $validator = Validator::make($request->all(),[
                'label' => 'required|between:3,50',
                'amount' => 'required|numeric|min:0'
            ]);


            if($validator->fails()){
                return response()->json([ 'status' => false, 'errors' => $validator->errors()->toJson()], 400);
            }

            $record->update($request->all());

            return response()->json([
                'status' => true,
                'data' => $record,
                'message' => 'Alllocation Record has been updated'
              ]);
        }else{
            return response()->json(['status' => false,'message' => 'Allocation not found'], 404);
        }
    }
}
