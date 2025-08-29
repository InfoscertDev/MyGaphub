<?php

namespace App\Http\Controllers\API\v2;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\UserProfile as Profile;
use App\Models\AccountDeletion;
use App\Helper\HelperClass;
use App\Helper\AllocationHelpers;

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
use App\Models\Enquiry;
use Illuminate\Support\Facades\Mail;
use App\Models\Notification;
use App\Models\GaphubGuide;



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
        $average_detail = AllocationHelpers::averageSeedDetail($user)['average_seed'];

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


    /**
     * Handle user feedback submission.
     * Sends email to admin and stores feedback in DB.
     */
    public function sendFeedback(Request $request)
    {
        $user = $request->user();

        $validator = Validator::make($request->all(), [
            'subject' => 'required|string',
            'message' => 'required|string|min:10|max:512',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'Validation failed',
                'errors'    => $validator->errors()
            ], 400);
        }

        $feedback = UserFeedback::create([
            'user_id' => $user->id,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        Mail::to('admin@prismcheck.com')
            ->send(new MailUserFeedback($user, $feedback, 'feedback'));

        return response()->json([
            'status'  => true,
            'message' => 'Your feedback has been submitted',
            'data'    => $feedback
        ], 201);
    }

    /**
     * Handle public help/enquiry requests.
     * Sends enquiry email to admin.
     */
    public function sendHelpEnquiry(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string',
            'email'   => 'required|email',
            'phone'   => [
                'required',
                'regex:/^\+?[0-9]{7,15}$/'
            ],
            'subject' => 'nullable|string',
            'message' => 'required|string|min:10|max:512',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'Validation failed',
                'errors'    => $validator->errors()
            ], 400);
        }

        $enquiry = Enquiry::create($request->only([
            'name', 'email', 'phone', 'subject', 'message'
        ]));

        $userObj = (object) [
            'firstname' => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone
        ];

        Mail::to('admin@prismcheck.com')
            ->send(new MailUserFeedback($userObj, $enquiry, 'enquiry'));

        return response()->json([
            'status'  => true,
            'message' => 'Your enquiry has been submitted',
            'data'    => $enquiry
        ], 201);
    }


    /**
     * Get authenticated user profile.
     * Creates profile if it does not exist.
     */
    public function profile(Request $request)
    {
        $user = $request->user();
        $profile = $user->profile;

        if (!$profile) {
            $profile = Profile::create();
            $user->profile_id = $profile->id;
            $user->save();
        }

        return response()->json(compact('profile', 'user'));

        // return response()->json([
        //     'status'  => true,
        //     'message' => 'Profile retrieved successfully',
        //     'data'    => compact('user', 'profile')
        // ], 200);
    }

    /**
     * Upload or update profile picture.
     */
    public function picture(Request $request)
    {
        $profile = $request->user()->profile;

        $validator = Validator::make($request->all(), [
            'photo' => 'required|file|min:5|max:5000|mimes:jfif,jpeg,jpg,png'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'Validation failed',
                'errors'    => $validator->errors()
            ], 400);
        }

        $file = $request->file('photo');
        $fileName = sha1(time()) . rand(100000, 999999) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public/user', $fileName);

        $profile->image = $path;
        $profile->save();
        return response()->json($profile);

        // return response()->json([
        //     'status'  => true,
        //     'message' => 'Profile picture updated successfully',
        //     'data'    => $profile
        // ], 200);
    }

    /**
     * Update authenticated user profile.
     * Allows updating only ONE field per request.
     */
    public function editProfile(Request $request)
    {
        $max_year = date('Y-m-d', strtotime('-14 years'));

        $validator = Validator::make($request->all(), [
            'firstname' => 'nullable|min:3',
            'surname'   => 'nullable|min:3',
            'phone'     => ['nullable', 'regex:/^\+?[0-9]{7,15}$/'],
            'date_of_birth'      => 'nullable|date|before:' . $max_year,
            'ancesry'   => 'nullable|string',
            'country' => 'nullable|string',
            'address'   => 'nullable|string',
            'residential_country' => 'nullable|string|max:100'
        ], [
            'date_of_birth.before' => 'Input a correct Date of Birth',
            'phone.regex' => 'The phone number must be a valid Whatsapp number.'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'Validation failed',
                'errors'    => $validator->errors()
            ], 400);
        }

        $fields = array_filter($request->only([
            'firstname', 'surname', 'phone', 'date_of_birth', 'ancesry', 'country', 'address', 'residential_country'
        ]));

        if (empty($fields)) {
            return response()->json([
                'status'  => false,
                'message' => 'No valid fields provided for update',
                'data'    => null
            ], 400);
        }

        $user = $request->user();
        $profile = $user->profile;

        foreach ($fields as $key => $value) {
            if (in_array($key, ['firstname', 'surname'])) {
                $user->$key = $value;
            } elseif ($key === 'date_of_birth') {
                $profile->date_of_birth = $value;
            } elseif ($key === 'phone') {
                $profile->phone = $value;
            } elseif ($key === 'residential_country') {
                $profile->residential_country = $value;
            } else {
                $profile->$key = $value;
            }
        }

        $user->save();
        $profile->save();

        return response()->json([
            'status'  => true,
            'message' => 'Profile updated successfully',
            'data'    => compact('user', 'profile')
        ], 200);
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

    public function notifications(Request $request){
        $user = $request->user();

        $notifications = Notification::where('user_id', $user->id)
                        ->latest()->paginate(10);
        foreach ($notifications as $note) {
            // $note->created_at = Carbon::parse($note->created_at)->diffForHumans();
            if(!$note->seen) $note->seen = 1; $note->save();
        }

        return response()->json([
            'status' => true,
            'data' => $notifications,
            'message' => 'User notifications'
        ]);

    }

    public function getExchangeData(Request $request)
    {
        $user = $request->user();

        $gap_currencies = GapExchangeHelper::gapSystemCurrencies($user); // false = skip manual

        $calculator = Calculator::where('user_id', $user->id)->first();
        $currency = $calculator ? $calculator->currency : null;

        // Get popular currencies info
        $currencies = HelperClass::popularCurrenciensInfo();
        $system_currencies = $gap_currencies['system_currencies'];
        $currency_rates = json_decode($system_currencies['currencies']);

        return response()->json([
            'success' => true,
            'message' => 'Exchange Rate retrieved successfully',
            'data' => [
                'base_currency' => $currency,
                'last_update' => $system_currencies['last_update'],
                'popular_currencies' => $currencies,
                'system_currencies' => $currency_rates,
            ]
        ]);
    }

    public function support(Request $request)
    {
        $user = $request->user();

        $feedbacks = UserFeedback::latest()->paginate(6);
        $gap_supports =  GaphubGuide::latest()->paginate(10);;
        $pattern = '/youtu\.be\/([a-zA-Z0-9_-]{11})/';

        foreach($feedbacks as $feedback){
            $feedback->user;
        }

        foreach($gap_supports as $guide){
            $stable = preg_match($pattern, $guide->video_link, $matches);
            $guide->video_id = $matches[1] ?? '';
        }


        $data = compact('feedbacks', 'gap_supports');

        return response()->json([
            'status' => true,
            'data' => $data,
            'message' => 'Support'
        ]);
    }

    /**
     * Soft delete a user account with a given reason.
     */
    public function deleteAccount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'reason' => 'required|string|max:512'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'Validation failed',
                'data'    => $validator->errors()
            ], 400);
        }

        $user = $request->user();

        // Store reason in account_deletions table
        AccountDeletion::create([
            'user_id' => $user->id,
            'reason'  => $request->reason
        ]);

        $user->delete();

        return response()->json([
            'status'  => true,
            'message' => 'Your account has been deleted successfully',
            'data'    => null
        ], 200);
    }


}
