<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\User;
use App\UserProfile as Profile;
use App\Helper\HelperClass as Helper;
use App\FinicialCalculator as Calculator;
use App\Asset\GapCurrency;
use App\Helper\GapExchangeHelper;
use App\Http\Controllers\Controller;
use App\Mail\UserFeedback as MailUserFeedback;
use App\Models\UserFeedback;
use App\Models\GaphubGuide;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use stdClass;

class OtherToolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.tools.index');
    }

    public function seed()
    {
        $welcome = true;
        return view('user.coming-soon', compact('welcome'));
    }

    public function soon()
    {
        $welcome = true;
        return view('user.coming-soon', compact('welcome'));
    }

    public function tool_soon()
    {
        $welcome = true;
        return view('user.tools.coming-soon');
    }

    public function exchange()
    {
        return view('user.tools.exchange');
    }

    public function feedback()
    {
        $feedbacks = UserFeedback::latest()->paginate(6);
        return view('user.tools.feedback', compact('feedbacks'));
    }

    public function compliance(){

        return view('user.tools.compliance');
    }

    public function security(){
        return view('user.tools.security');
    }

    public function support(){
        $page_title = "Gaphub Support";
        return view('user.support.index', compact("page_title"));
    }

    public function supportGuide(){
        $page_title = "Quick Start Guide";

        $gap_supports =  GaphubGuide::latest()->paginate(10);;
        $pattern = '/youtu\.be\/([a-zA-Z0-9_-]{11})/';

        foreach($gap_supports as $guide){
            $stable = preg_match($pattern, $guide->video_link, $matches);
            $guide->video_id = $matches[1] ?? '';
        }

        $testimonials = [
            ["id"=>"1","author_name"=>"Craig Jones","author_details"=>"a:7:{s:15:\"author_position\";s:0:\"\";s:14:\"author_company\";s:0:\"\";s:18:\"author_company_url\";s:0:\"\";s:12:\"author_email\";s:0:\"\";s:18:\"author_rating_type\";i:5;s:17:\"author_image_path\";s:76:\"http:\/\/prismcheck.com\/releaseb\/wp-content\/uploads\/2016\/03\/testimonials-3.jpg\";s:18:\"author_description\";s:164:\"It was awesome to work with you guys: all my questions were answered immediately, and I was able to launch my site easily. Hope to continue doing business with you!\";}","date"=>"2020-09-29","testimonial_status"=>""],
            ["id"=>"2","author_name"=>"Amy Scott","author_details"=>"a:8:{s:15:\"author_position\";s:0:\"\";s:14:\"author_company\";s:0:\"\";s:18:\"author_company_url\";s:0:\"\";s:12:\"author_email\";s:0:\"\";s:18:\"author_rating_type\";i:5;s:17:\"author_image_path\";s:76:\"http:\/\/prismcheck.com\/releaseb\/wp-content\/uploads\/2016\/03\/testimonials-2.jpg\";s:18:\"author_description\";s:162:\"The Investment Advisor theme contains everything for a successful financial and business website! Multiple options turn the design int a powerful tool for owners.\";s:12:\"publish_date\";s:10:\"2020-09-29\";}","date"=>"2020-09-29","testimonial_status"=>""],
            ["id"=>"3","author_name"=>"Kevin Smith","author_details"=>"a:8:{s:15:\"author_position\";s:5:\"Sales\";s:14:\"author_company\";s:0:\"\";s:18:\"author_company_url\";s:0:\"\";s:12:\"author_email\";s:0:\"\";s:18:\"author_rating_type\";i:5;s:17:\"author_image_path\";s:76:\"http:\/\/prismcheck.com\/releaseb\/wp-content\/uploads\/2016\/03\/testimonials-1.jpg\";s:18:\"author_description\";s:157:\"Thanks to your efficient help and support my business runs smoothly. I appreciate all the effort and creative approach that is combined with great solutions!\";s:12:\"publish_date\";s:10:\"2020-09-29\";}","date"=>"2020-09-29","testimonial_status"=>""],
            ["id"=>"4","author_name"=>"Zoya Moriano","author_details"=>"a:7:{s:15:\"author_position\";s:0:\"\";s:14:\"author_company\";s:0:\"\";s:18:\"author_company_url\";s:0:\"\";s:12:\"author_email\";s:0:\"\";s:18:\"author_rating_type\";i:5;s:17:\"author_image_path\";s:84:\"http:\/\/prismcheck.com\/releaseb\/wp-content\/uploads\/2020\/11\/young_lady_expenditure.png\";s:18:\"author_description\";s:159:\"Thank you very much to the support team for service, are really wonderful in their care and in the resolution of the problem. Congratulations to Facebook chat.\";}","date"=>"2020-12-17","testimonial_status"=>""],
            ["id"=>"5","author_name"=>"Moriano Sami","author_details"=>"a:9:{s:17:\"author_image_path\";s:75:\"http:\/\/prismcheck.com\/releaseb\/wp-content\/uploads\/2020\/11\/New-Project-8.png\";s:15:\"author_position\";s:0:\"\";s:14:\"author_company\";s:10:\"Prismcheck\";s:18:\"author_company_url\";s:0:\"\";s:12:\"author_email\";s:0:\"\";s:18:\"author_rating_type\";i:0;s:27:\"author_featured_image_video\";s:5:\"image\";s:18:\"author_description\";s:165:\"GAPhub Investment Advisor theme contains everything for a successful financial and business website! Multiple options turn the design int a powerful tool for owners.\";s:18:\"author_social_link\";i:0;}","date"=>"2022-01-21","testimonial_status"=>"approved"],
            ["id"=>"6","author_name"=>"Smith Daniel","author_details"=>"a:10:{s:17:\"author_image_path\";s:71:\"http:\/\/prismcheck.com\/releaseb\/wp-content\/uploads\/2020\/11\/Debt_Free.png\";s:15:\"author_position\";s:0:\"\";s:14:\"author_company\";s:4:\"ZOya\";s:18:\"author_company_url\";s:0:\"\";s:12:\"author_email\";s:0:\"\";s:18:\"author_rating_type\";i:0;s:27:\"author_featured_image_video\";s:5:\"image\";s:18:\"author_description\";s:54:\"Thanks to your efficient help and support my business.\";s:18:\"author_social_link\";i:0;s:12:\"publish_date\";s:10:\"2022-01-21\";}","date"=>"2022-01-21","testimonial_status"=>"approved"]
        ];

        $group_testimonial = array_chunk($testimonials, 3);

        foreach($group_testimonial as $testimonial){
            foreach($testimonial as $row){
                info($row['author_name']);
            }
        }

        return view('user.support.quick-start', compact("page_title", 'gap_supports'));
    }

    public function sendFeedback(Request $request)
    {
        $user = auth()->user();
        $this->validate($request, [
            'subject' => 'required',
            'message' => 'required|min:10|max:512'
        ]);

        $request['user_id'] = $user->id;
        $feedback = UserFeedback::create($request->all());
        //  info($feedback); // admin@mygaphub.com dev.kabiruwahab@gmail.com
        // Mail::to('admin@mygaphub.com')->send(new MailUserFeedback($user, $feedback));
        $msg = "Your Feedback has been submitted";
        return redirect('/home/feedback')->with(['modal' => $msg]);
    }

    public function profile()
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        $profile = $user->profile;

        if (!$profile) {
           $profile = new Profile();
           $profile->save();
           $user->profile_id  = $profile->id;
           $user->save();
        }

        $countries = Helper::countries();
        return view('user.tools.profile', compact('profile', 'user', 'countries'));
    }

    public function picture(Request $request)
    {
        $id = auth()->user()->id;
        $user = User::find($id)->profile;
        $request->validate(['photo'=>'required']);

        if($request->hasFile('photo')){
            $request->validate(['photo'=>'min: 5|max:5000|mimes:jfif,jpeg,jpg,png']);
            $fileType = $request->file('photo')->getClientMimeType();
            $ext = $request->file('photo')->getClientOriginalExtension();
            $fileNameStore = sha1(time()). rand(100000, 999999) . '.'.$ext;
            $photo = $request->file('photo')->storeAs('public/user', $fileNameStore);
        }
        $user->image =  $photo;
        $user->save();
        $msg = "Profile Picture has been updated";
        return redirect()->back()->with('success', $msg);
    }

    public function defaultpicture(Request $request){
        $this->validate($request, [ 'avatar' => 'required' ]);

        $id = auth()->user()->id;
        $user = User::find($id)->profile;

        if($request->avatar  == "default_nabjna") { $user->image =  "public/avatar/default.png";}
        else if($request->avatar  == "avamale1_ienbabdhbs") { $user->image =  "public/avatar/Avatar_Male 1.png";}
        else if($request->avatar  == "avafemale1_ienbabdhbs") { $user->image =  "public/avatar/Avatar_Female 1.png";}
        else if($request->avatar  == "avamale2_ienbabdhbs") { $user->image =  "public/avatar/Avatar_Male 2.png";}
        else if($request->avatar  == "avafemale2_ienbabdhbs") { $user->image =  "public/avatar/Avatar_Female 2.png";}

        else if($request->avatar  == "avamale3_ienbabdhbs") { $user->image =  "public/avatar/Avatar_Male 3.png";}
        else if($request->avatar  == "avafemale3_ienbabdhbs") { $user->image =  "public/avatar/Avatar_Female 3.png";}
        else if($request->avatar  == "avamale4_ienbabdhbs") { $user->image =  "public/avatar/Avatar_Male 4.png";}
        else if($request->avatar  == "avafemale4_ienbabdhbs") { $user->image =  "public/avatar/Avatar_Female 4.png";}

        else if($request->avatar  == "avamale5_ienbabdhbs") { $user->image =  "public/avatar/Avatar_Male 5.png";}
        else if($request->avatar  == "avafemale5_ienbabdhbs") { $user->image =  "public/avatar/Avatar_Female 5.png";}

        $user->save();
        $msg = "Profile Picture has been updated";
        return redirect()->back()->with('success', $msg);

    }

    public function editprofile(Request $request)
    {
        $max_year = date('Y-m-d', strtotime('-18 years'));
        $this->validate($request, [
            'firstname' => 'required|min:3',
            'phone' => 'required|max:18',
            'surname' => 'required|min:3',
            'phone' => 'min:8|numeric',
            'date' => 'date|before:'.$max_year
        ],[
            'date.before' => 'Input a correct date of Birth: GAPhub user must be at least 18 years of age.',
            'phone.numeric' => 'The phone number must be a valid number.'
        ]);

        $id = auth()->user()->id;
        $user = User::find($id);
        $profile = $user->profile;
        $user->firstname = $request->firstname;
        $user->surname = $request->surname;
        $user->save();
        $profile->dob_count = $profile->dob_count + 1;
        $profile->phone = $request->phone;
        $profile->date_of_birth = $request->date;
        $profile->ancesry = $request->ancesry;
        $profile->country = $request->residence;
        $profile->address = $request->address;
        $profile->save();

        $msg = "Profile has been updated";
        return redirect()->back()->with('success', $msg);
    }

    public function changePassword(Request $request){

        $this->validate($request, [
            'current_password' => 'required|string|min:8',
            'new_password' => 'required|string|min:8|confirmed'
        ]);
        $id = auth()->user()->id;
        $user = User::find($id);
        $isPass = Hash::check($request->current_password, $user->password);
        if ($isPass) {
            $password = Hash::make($request->new_password);
            $user->password = $password;
            $user->save();
            Auth::logout();
            return redirect('/login')->with(['success' => 'Your password has been updated. Please re-login']);
        } else {
            return  redirect()->back()->with(['error' => 'Current Password  does not match']);
        }
    }


    public function preference()
    {
        $user = auth()->user();
        $gap_currencies = GapExchangeHelper::gapCurrencies($user);
        $calculator = Calculator::where('user_id', $user->id)->first();
        $currency = $calculator->currency;
        $manual_currencies = $gap_currencies['manual_currencies'];
        $currencies = Helper::popularCurrenciensInfo();
        $system_currencies = $gap_currencies['system_currencies'];
        return view('user.tools.preference', compact('user', 'currency', 'currencies', 'manual_currencies', 'system_currencies'));
    }

    public function updateExchange(Request $request){
        $user = auth()->user();
        // Log::info($request);
        $this->validate($request, [
            'currency' => 'required',
            'rate' => 'required|numeric'
        ]);

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
        return redirect()->back()->with('success', $msg);
    }
}
