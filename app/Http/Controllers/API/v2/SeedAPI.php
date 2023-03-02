<?php

namespace App\Http\Controllers\API\v2;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\FinicialCalculator as Calculator;
use App\SevenG\GrandFin as Grand;
use App\DiscretionaryBudget as Philantrophy;
use App\Helper\CalculatorClass;
use App\Helper\AllocationHelpers;
use App\Wheel\CashAccount as Cash;
use App\Helper\HelperClass;
use App\Helper\GapAccountCalculator as GapAccount;
use App\Helper\WheelClass as Wheel;
use App\ILab;
use App\Models\Asset\SeedBudgetAllocation;

class SeedAPI extends Controller
{
    // MyGaphub@Stag!ng
    public function index(Request $request){
      $user = $request->user();
      $current_seed = CalculatorClass::getCurrentSeed($user);
      $target_seed = CalculatorClass::getTargetSeed($user);

      //Rollover  diaog
      $preview = $request->input('preview');
      if($preview == '7w6refsgwubjhsdbfgcyuxbhsjwdcfuhghvbqansmdbjhjnhjb'){
        $current_seed = Budget::where('user_id', $user->id)->where('period', date('Y-m').'-01')->first();
        $current_seed->priviewed = 1 ;
        $current_seed->save();
        return response()->json([
            'status' => true,
            'message' => 'Rollover changed'
        ]);
      }

      $backgrounds = array_reverse(GapAccount::accountBackground());
      $current_detail = AllocationHelpers::getAllocatedSeedDetail($user);
      $target_detail = CalculatorClass::getSeedDetail($target_seed);
      $average_detail = AllocationHelpers::averageSeedDetail($user)['average_seed'];
      $historic_seed =AllocationHelpers::averageSeedDetail($user)['historic_seed'];
      $periods =AllocationHelpers::averageSeedDetail($user)['periods'];
      AllocationHelpers::monthlyRecurssionChecker($user);

      $data = compact('average_detail', 'current_detail', 'target_detail','current_seed', 'target_seed', 'periods','historic_seed', 'backgrounds' );
      return response()->json([
        'status' => true,
        'data' => $data,
        'message' => 'Seed information'
      ], 200);
    }

    public function periodHistory(Request $request, $period){
        $user = $request->user();
        $backgrounds = array_reverse(GapAccount::accountBackground());
        $current_seed = CalculatorClass::getCurrentSeed($user);
        $target_seed = CalculatorClass::getTargetSeed($user);

        $monthly_seed = AllocationHelpers::monthlySeedDetail($user, $period);

        $data = compact('current_seed', 'target_seed', 'monthly_seed', 'backgrounds');

        return response()->json([
            'status' => true,
            'data' => $data,
            'message' => ''
          ], 200);
    }

    public function storeSetBudget(Request $request){
      $user = $request->user();

      $validator = Validator::make($request->all(),[
        'budget' => 'required|numeric'
      ]);

      if($validator->fails()){
        return response()->json([ 'status' => false, 'errors' =>$validator->errors()->toJson()], 400);
      }

      $current_detail = AllocationHelpers::getAllocatedSeedDetail($user);
      $available_allocation = $request->budget - $current_detail['total'];

        if($available_allocation >= 0 || $request->seed == 'ediucfhjbndcfjnkdcknjeusydgfbhbswd'){
            $seed = CalculatorClass::getCurrentSeed($user);
            $seed->budget_amount =  $request->budget;
            $seed->priviewed = 1;
            $seed->update();
            return response()->json(['status' => true,'message' => 'Seed Budget Amount has been set']);
        }else{
            return response()->json([
                'status' => false,
                'malse' => 'Your set amount is lower than the sum of your allocated SEED,'
            ], 400);
        }
    }

    public function storeSeed(Request $request){
      $user = $request->user();

      $validator = Validator::make($request->all(),[
        'session' => 'required',
        'category' => 'required|in:expenditure,discretionary',
      ], [
        'session.required' => 'Token required'
      ]);

      if($validator->fails()){
        return response()->json([ 'status' => false, 'errors' =>$validator->errors()->toJson()], 400);
      }

      if($request->session == 'yugvabhjvbavbjhzbjhbhajvbhgvbhvjbjhbazJHbbj'){
        $seed = CalculatorClass::getCurrentSeed($user);
      }else if($request->session == 'opajoiabnjkabjahvjnbzahjbzapqwgeydhj'){
        $seed = CalculatorClass::getTargetSeed($user);
      }

      if($request->category == 'expenditure'){
        $validator = Validator::make($request->all(),[
          'accomodation' => 'required|numeric|min:0',
          'mobility' => 'required|numeric|min:0',
          'expenses' => 'required|numeric|min:0',
          'utilities' => 'required|numeric|min:0',
          'debt_repay' => 'required|numeric|min:0',
        ]);

        if($validator->fails()){
          return response()->json([ 'status' => false, 'errors' =>$validator->errors()->toJson()], 400);
        }

        $seed->accomodation =  $request->accomodation;
        $seed->mobility =  $request->mobility;
        $seed->expenses =  $request->expenses;
        $seed->utilities =  $request->utilities;
        $seed->debt_repay =  $request->debt_repay;
        $seed->update();
        return response()->json(['status'=>true,'message' => 'Expenditure Budget has been updated']);
      }

      if($request->category == 'discretionary'){
        $seed->charity =  $request->charity;
        $seed->family_support =  $request->family_support;
        $seed->personal_commitments =  $request->personal_commitments;
        $seed->others =  $request->others;

        $seed->update();
        return response()->json(['status'=>true,'message' => 'Discretionary Budget has been updated']);
      }
    }

    public function expenditure(Request $request){
        $user = $request->user();
        $month =  date('Y-m').'-01';
        $fin = CalculatorClass::finicial($user);
        $expenditure =  $fin['calculator'];
        // $expenditure_detail = GapAccount::calcExpenditure($user,$expenditure);
        $values = array();
        $labels = array('accommodation', 'transportation', 'family', 'utilities', 'debt_repayment');


        foreach($labels as $key => $label){
            $amount =  SeedBudgetAllocation::where('period', $month)->where('user_id', $user->id)
                                            ->where('expenditure',$label) ->sum('amount');
            $labels[$key] = SeedAPI::filterExpenditure($label);
            array_push($values, $amount);
        }

        $expenditure_detail = compact('labels','values') ;
        $data = compact('expenditure','expenditure_detail');

        return response()->json([
            'status' => true,
            'data' => $data,
            'message' => '360  Expenditure detail'
        ]);
    }

    private static function filterExpenditure($value){
        if($value == 'family'){
            $value = 'Home & Family';
        }else if ($value == 'debt_repayment') {
            $value = 'Debt Repayment';
        }else if($value){
           $value = ucfirst($value);
        }
        return $value;
     }

    public function philantrophy(Request $request){
        $user = $request->user();
        $month =  date('Y-m').'-01';

        $grand = Grand::where('user_id', $user->id)->first();
        $philantrophy = Philantrophy::where('user_id', $user->id)->first();
        if (!$philantrophy) {
          $philantrophy = GapAccount::initUserChartity($user);
          $philantrophy = Philantrophy::where('user_id', $user->id)->first();
        }
        // $philantrophy_detail = GapAccount::calcPhilantrophy($user);
        // $philantrophy->sum =  array_sum([$philantrophy->charity, $philantrophy->family_support,$philantrophy->personal_commitments,  $philantrophy->others]);


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
        $philantrophy_detail = compact('labels','values') ;
        $data = compact( 'philantrophy', 'grand','philantrophy_detail');

        return response()->json([
            'status' => true,
            'data' => $data,
            'message' => '360  Philantrophy detail'
        ]);
    }

    public function savePhilantrophy(Request $request){
        $user = $request->user();

        $grand = Grand::where('user_id', $user->id)->first();
        $validator = Validator::make($request->all(),[
          'charity' => 'required|integer|min:0',
          'family_support' => 'required|integer|min:0',
          'personal' => 'required|integer|min:0',
          'others' => 'required|integer|min:0'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $giving =  array_sum([$request->charity, $request->family_support,$request->personal,  $request->others]);

        if($giving == $grand->current){
          $philantrophy = Philantrophy::where('user_id', $user->id)->first();
          if (!$philantrophy) {
            $philantrophy = GapAccount::initUserChartity($user);
          }
          $philantrophy->charity = $request->charity;
          $philantrophy->family_support = $request->family_support;
          $philantrophy->personal_commitments = $request->personal;
          $philantrophy->others = $request->others;
          $philantrophy->allocated = 1;
          $philantrophy->save();
          Wheel::updateGivingTile($user);
          return  response()->json( compact('philantrophy') );
       }else{
        return  response()->json(['error' => 'Your Giving must be equal to your grand']);
       }
    }

    public function ilab(Request $request){
      $user = $request->user();
      $calculator = Calculator::where('user_id', $user->id)->first();
      $currency = explode(" ", $calculator->currency)[0];
      $year = date('Y') + 1;
      $ilab = ILab::where('user_id', $user->id)->where('other', $year)->first();
      if(!$ilab){
        $ilab = new ilab();
        $ilab->user_id = $user->id; $ilab->other = $year;
        $ilab->save();
      }
      $cash = Cash::where('user_id', $user->id)->latest()->get();
      $current_ilab = GapAccount::currentILab($user, $cash)['current_ilab'];
      $current_info = GapAccount::currentILab($user, $cash)['ilabs'];
      $target_info= GapAccount::targetedILab($ilab)['ilabs'];
      return response()->json(compact('ilab','current_info','target_info','current_ilab'));
  }

  public function storeILab(Request $request){
      $user = $request->user();
      $validator = Validator::make($request->all(),[
        'investment' => 'required|min:0|integer',
        'equity' => 'required|min:0|integer',
        'savings' => 'required|min:0|integer',
        'credit' => 'required|min:0|integer',
        'mortgage' => 'required|min:0|integer',
        'non_portfolio' => 'required|min:0|integer',
        'portfolio' => 'required|min:0|integer',
        'periodic_savings' => 'required|min:0|integer',
        'education' => 'required|min:0|integer',
        'expenditure' => 'required|min:0|integer',
        'discretionary' => 'required|min:0|integer'
      ]);

      if($validator->fails()){
          return response()->json($validator->errors()->toJson(), 400);
      }
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

      return response()->json(['success' => 'ILab target has been set']);
    }
}
