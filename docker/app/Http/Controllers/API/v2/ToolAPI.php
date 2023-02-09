<?php

namespace App\Http\Controllers\API\v2;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\UserProfile as Profile;
use App\Helper\HelperClass;
use Illuminate\Support\Facades\Validator;
use App\Helper\GapAccountCalculator as GapAccount;
use App\Helper\CalculatorClass as Fin;
use App\UserAudit as Audit;
use App\Helper\WheelClass as Wheel;
use App\Helper\GapExchangeHelper;
use App\FinicialCalculator as Calculator;  
use App\Asset\GapCurrency;
use App\Helper\PersonalAssistance;
use App\Models\UserFeedback;
use App\Mail\UserFeedback as MailUserFeedback;
use Illuminate\Support\Facades\Mail;

class ToolAPI extends Controller
{
    public function dashboard(Request $request){
        $user = $request->user();
        $fin =  Fin::finicial($user);

        if ($fin['saving'] == 0 && $fin['cost'] == 0) {
            return response()->json([ 'status' => true, 'message' => 'The calculator workflow has not been completed yet' ], 400);
        }

        $audit = Audit::where('user_id', $user->id)->first();
        $tiles = HelperClass::dashboardTiles();

        $residential = Wheel::primaryEquityDetails($user); 
        $net_detail = GapAccount::homeNetWorth($user); 
        $average_detail = Fin::averageSeedDetail($user);

        if(!$audit->dashboard){
            $audit->dashboard = json_encode($tiles);
            $audit->save(); 
        }  
        
        $dashboard = json_decode($audit->dashboard); 
        $gap_currencies = GapExchangeHelper::gapCurrencies($user);
        $personal = new PersonalAssistance($user);
        $assistance = $personal->assistance();
        $income =  Fin::finicial($user);
        return response()->json(compact('dashboard', 'residential','net_detail', 'average_detail',
                'income','assistance','gap_currencies'));
    }

    public function storeTiles(Request $request){
        $user = $request->user();
        $tiles =  [ 
            'equity' => ($request->equity) ? true : false,
            'net_worth' => ($request->net_worth) ? true : false,
            'average_seed' => ($request->average_seed) ? true : false,
            'grand' => ($request->grand) ? true : false,
            'freedom' => ($request->freedom) ? true : false,
            'education' => ($request->education) ? true : false,
            'debt' => ($request->debt) ? true : false,
            'credit' => ($request->credit) ? true : false,
            'beta' => ($request->beta) ? true : false,
            'alpha' => ($request->alpha) ? true : false,
        ]; 
        $audit = Audit::where('user_id', $user->id)->first();
        $audit->dashboard = json_encode($tiles);
        $audit->save();
        $dashboard = json_decode($audit->dashboard);
        $status = true; 
        return response()->json(compact('status','dashboard'));
    }

    
    public function sendFeedback(Request $request)
    {
        $user = $request->user();
        $validator = Validator::make($request->all(),[
            'subject' => 'required', 
            'message' => 'required|min:10|max:512'
        ]);

        if($validator->fails()){
            return response()->json(['status' => false, 'errors' => $validator->errors()->toJson()], 400);
        }
        $request['user_id'] = $user->id;
        $feedback = UserFeedback::create($request->all()); 
        //  info($feedback); // admin@prismcheck.com dev.kabiruwahab@gmail.com
        Mail::to('admin@prismcheck.com')->send(new MailUserFeedback($user, $feedback));
        $msg = "Your Feedback has been submitted";
        return response()->json([
            'success', $msg, 'feedback' => $feedback
        ], 201);
    } 

    // Profile
    public function profile(Request $request)
    {
        $id = $request->user()->id;
        $user = User::find($id); 
        $profile = $user->profile;
        
        if (!$profile) {
           $profile = new Profile();
           $profile->save();
           $user->profile_id  = $profile->id;
           $user->save(); 
        } 
        
        return response()->json(compact('profile', 'user'));
    }

    public function picture(Request $request)
    {
        $id = $request->user()->id;
        $user = User::find($id)->profile; 
         $validator = Validator::make($request->all(),['photo'=>'required']);
         if($validator->fails()){
          return response()->json(['status' => false, 'errors' => $validator->errors()->toJson()], 400);
        }

        if($request->hasFile('photo')){
             $validator = Validator::make($request->all(),['photo'=>'min: 5|max:5000|mimes:jfif,jpeg,jpg,png']);
            if($validator->fails()){
                return response()->json(['status' => false, 'errors' => $validator->errors()->toJson()], 400);
            }
            $fileType = $request->file('photo')->getClientMimeType();
            $ext = $request->file('photo')->getClientOriginalExtension();
            $fileNameStore = sha1(time()). rand(100000, 999999) . '.'.$ext;
            $photo = $request->file('photo')->storeAs('public/user', $fileNameStore);
        } 
        $user->image =  $photo;
        $user->save(); 
        return response()->json($user);
    }

    public function defaultpicture(Request $request){
        $id = $request->user()->id;
        $user = User::find($id);
        $profile = $user->profile; 
         $validator = Validator::make($request->all(),[ 'avatar' => 'required' ]);
         if($validator->fails()){
          return response()->json(['status' => false, 'errors' => $validator->errors()->toJson()], 400);
        }
 
        if($request->avatar  == "default_nabjna") { $profile->image =  "public/avatar/default.png";}
        else if($request->avatar  == "avamale1_ienbabdhbs") { $profile->image =  "public/avatar/Avatar_Male 1.png";}
        else if($request->avatar  == "avafemale1_ienbabdhbs") { $profile->image =  "public/avatar/Avatar_Female 1.png";}
        else if($request->avatar  == "avamale2_ienbabdhbs") { $profile->image =  "public/avatar/Avatar_Male 2.png";}
        else if($request->avatar  == "avafemale2_ienbabdhbs") { $profile->image =  "public/avatar/Avatar_Female 2.png";}
        
        else if($request->avatar  == "avamale3_ienbabdhbs") { $profile->image =  "public/avatar/Avatar_Male 3.png";}
        else if($request->avatar  == "avafemale3_ienbabdhbs") { $profile->image =  "public/avatar/Avatar_Female 3.png";}
        else if($request->avatar  == "avamale4_ienbabdhbs") { $profile->image =  "public/avatar/Avatar_Male 4.png";}
        else if($request->avatar  == "avafemale4_ienbabdhbs") { $profile->image =  "public/avatar/Avatar_Female 4.png";}

        else if($request->avatar  == "avamale5_ienbabdhbs") { $profile->image =  "public/avatar/Avatar_Male 5.png";}
        else if($request->avatar  == "avafemale5_ienbabdhbs") { $profile->image =  "public/avatar/Avatar_Female 5.png";}
        
        $profile->save(); 
        $msg = "Profile has been updated";
        return response()->json(['success', $msg]);

    }
    public function editprofile(Request $request)
    {
        $max_year = date('Y-m-d', strtotime('-14 years'));
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|min:3', 
            'surname' => 'required|min:3', 
            'phone' => 'min:7|max:15', 
            'phone' => 'numeric', 
            'date' => 'date|before:'.$max_year
        ],[
            'date.before' => 'Input a correct Date of Birth',
            'phone.numeric' => 'The phone number must be a valid number.'
        ]);
        if($validator->fails()){
          return response()->json(['status' => false, 'errors' => $validator->errors()->toJson()], 400);
        }
        

        $id = $request->user()->id;
        $user = User::find($id);
        $profile = $user->profile; 
        $user->firstname = $request->firstname;
        $user->surname = $request->surname;
        $profile->dob_count = $profile->dob_count + 1;
        $profile->phone = $request->phone;
        $profile->date_of_birth = $request->date; 
        $profile->ancesry = $request->ancesry;
        $profile->country = $request->residence;
        $profile->address = $request->address;
        $user->save();  $profile->save();

        $msg = "Profile has been updated";
        return response()->json(['success', $msg]);
    }

    public function updateExchange(Request $request){
        $user = auth()->user();
        $validator = Validator::make($request->all(), [ 
            'currency' => 'required',
            'rate' => 'required|numeric'
        ]);
        if($validator->fails()){
          return response()->json(['status' => false, 'errors' => $validator->errors()->toJson()], 400);
        }
        $manual_currencies = GapCurrency::where('user_id', $user->id)->first();
        $manual_rates = json_decode($manual_currencies->currencies);
        
        $calculator = Calculator::where('user_id', $user->id)->first();
        $currency = $calculator->currency;
        $bcurrency = explode(" ",$currency)[1]; 

        foreach ($manual_rates as $key => &$rate) {
            if($key == $request->currency){ 
                $manual_rates->$key = $request->rate;
            }else{ 
                $manual_rates->$key = $rate;
            }
        } 
        $manual_currencies->base = $bcurrency;
        $manual_currencies->currencies = json_encode($manual_rates);
        $manual_currencies->save();
        $msg = "Exchange Rates has been updated";
        return response()->json(['success', $msg]);
    }
   
}
