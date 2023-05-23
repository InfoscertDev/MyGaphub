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
          'amount' => 'required|numeric|min:10',
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
        if($request['recuring'] == 1) $request['date'] = $request->date;
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
            'amount' => 'required|numeric|min:10',
          ]);

        //   info($request->recurring);

        if($validator->fails()){
            return response()->json([ 'status' => false, 'errors' =>$validator->errors()->toJson()], 400);
        }

        // if($request->amount >= $available_allocation  && !($allocated->amount >= $request->amount)){
        //     return response()->json(['status' => false,'message' => 'Your set amount is lower than the sum of your allocated SEED, reduce any of your allocated SEED to accommodate this reduction'], 404);
        // }

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
            $record_spents = RecordBudgetSpent::whereAllocationId($allocation->id)->delete();
            $allocation->delete();
            return response()->json([
                'status' => true,
                'message' => 'Allocation has been deleted'
            ], 201);
            // if(count($record_spents) == 0){
            // }else{
            //     return response()->json([ 'status' => false, 'message' => 'Allocation cannot be deleted' ], 400);
            // }

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


        foreach($groups as $key => $group){
            $groups[$key]['amount'] =  SeedBudgetAllocation::where('period', $month)->where('user_id', $user->id)
                                                                ->where('expenditure',$group['label']) ->sum('amount');
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

        $month =  date('Y-m').'-01'; $cp = date('m')-1;
        $last_period =  date('Y-'). $cp .'-01';
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
                $spent_current_month = 0;//RecordBudgetSpent::where('user_id', $user->id)->where('period', $month)->sum('amount');
                $spent_last_month = 0;//RecordBudgetSpent::where('user_id', $user->id)->where('period', $last_period)->sum('amount');

                $amount = array_sum(array_column($spend->toArray(), 'amount')) ;
                $record = array();

                foreach ($spend as $sp) {
                    $sp->spent_current_month = RecordBudgetSpent::where('user_id', $user->id)->where('period', $month)->where('label',$sp->label)->sum('amount');
                    $sp->spent_last_month = RecordBudgetSpent::where('user_id', $user->id)->where('period', $last_period)->where('label',$sp->label)->sum('amount');
                }
                $record[$key]['total_amount'] = $amount;
                $record[$key]['list'] = $spend;
                $record[$key]['spent'] = compact('spent_current_month', 'spent_last_month');
                array_push($record_spents, $record);
            }

            $data = compact('allocated', 'record_spents', 'summary','backgrounds');

            return response()->json([
              'status' => true,
              'data' => $data,
              'message' => 'Allocation Summary'
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
          'amount' => 'required|numeric|min:10',
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
                'message' => 'Allocation Record has been updated'
              ]);
        }else{
            return response()->json(['status' => false,'message' => 'Allocation not found'], 404);
        }
    }

    public function deleteRecordSpend(Request $request, $id){
        $user = $request->user();
        $month =  date('Y-m').'-01';
        $spent = RecordBudgetSpent::whereId($id)->where('period', $month)->first();
        if($spent){
            $spent->delete();
            return response()->json(['status' => true ,'message' =>'Record Spent has been deleted']);
        }else{
            return response()->json(['status' => false , 'message' => 'Record Spent not found' ]);
        }
    }
}
