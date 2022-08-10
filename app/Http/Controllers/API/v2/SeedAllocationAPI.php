<?php

namespace App\Http\Controllers\API\v2;

use App\Helper\AllocationHelpers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asset\SeedBudgetAllocation;
use App\Models\Asset\RecordBudgetSpent;
use Illuminate\Support\Facades\Validator;

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



         return response()->json([
            'status' => true,
            'data' => $budget_allocation,
            'message' => ''
         ]);

    }

    public function storeRecordSpent(Request $request){
        $user = $request->user();

        $validator = Validator::make($request->all(),[
          'allocation' => 'required|exists:seed_budget_allocations,id',
          'label' => 'required|between:3,50',
          'amount' => 'required|numeric|min:0',
        //   'date' => 'required|date'
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

    public function showAlloction(Request $request, $id){
        $user = $request->user();

        $month =  date('Y-m').'-01';
        $allocated = SeedBudgetAllocation::whereId($id)->where('period', $month)->first();
        if($allocated){
            $record_spents = RecordBudgetSpent::whereAllocationId($id)->get();
            $summary = AllocationHelpers::allocationSummay($allocated, $record_spents);
            $data = compact('allocated', 'record_spents', 'summary');

            return response()->json([
              'status' => true,
              'data' => $data,
              'message' => 'Alllocation Summary'
            ]);
        }else{
          return response()->json(['status' => false,'message' => 'Allocation not found'], 404);
        }
    }
}
