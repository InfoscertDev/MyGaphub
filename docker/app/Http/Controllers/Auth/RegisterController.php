<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Helper\GapAccountCalculator as GapAccount;

use App\FinicialCalculator as Calculator;
use App\FinicialQuestion as Question;
use App\Helper\GapExchangeHelper;
use App\Helper\HelperClass;
use App\UserAudit as Audit;
use App\Helper\IntegrationParties;
use App\UserProfile as Profile;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Http;
use App\Rules\GoogleRecaptcha;

class RegisterController extends Controller
{ 
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {   
        return Validator::make($data, [
            'firstname' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|confirmed|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'g-recaptcha-response' => ['required', new GoogleRecaptcha]
        ],[ 'g-recaptcha-response.required' => 'The recaptcha field is required.']);
       
    } 
  
    // public function register(Request $request)
    // {
    //     $this->validator($request->all())->validate();

    //     $captha = $this->captcha($request->all());
        
    //     if(!$captha){
    //         return redirect()->back()->withErrors(['captcha' => 'Invalid ReCaptcha']);
    //     }

    //     event(new Registered($user = $this->create($request->all())));

    //     $this->guard()->login($user);

    //     if ($response = $this->registered($request, $user)) {
    //         return $response;
    //     }

    //     return redirect($this->redirectPath());
    // }
    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function captcha(array $data)
    {
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $remoteip = $_SERVER['REMOTE_ADDR'];
        $google_data = [
                'secret' => config('services.recaptcha.secret'),
                'response' => $data['recaptcha'],
                'remoteip' => $remoteip
        ];
        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($google_data)
            ]
        ];
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $resultJson = json_decode($result); 
        // info([$resultJson->success, $resultJson]);

        if ($resultJson->success != true) {
            return false;
            // return redirect()->back()->withErrors(['captcha' => 'ReCaptcha Error']);
        } 

        if ($resultJson->score >= 0.3) {
                //Validation was successful, add your form submission logic here
                // return edirect->back()->with('message', 'Thanks for your message!');
            return true;
        } else {
            return false;
            // return redirect()->back()->withErrors(['captcha' => 'ReCaptcha Error']);
        }
    }

    protected function create(array $data){
        // info('Validation was successful, add your form submission logic here');
            
        $user = User::create([
            'firstname' => $data['firstname'],
            'surname' => $data['surname'],
            'email' => $data['email'], 
            'password' => Hash::make($data['password']),
        ]);
    
        // Save  
        RegisterController::createCalculator($user->id);
        RegisterController::createQuestion($user->id);
        GapAccount::initUserChartity($user);
        IntegrationParties::join_sendinblue_leads($user);

        $profile = new Profile();
        $profile->save();
        $user->profile_id  = $profile->id;
        $user->save(); 

        $tiles = HelperClass::dashboardTiles();
        $audit = new Audit();  
        $audit->user_id = $user->id; 
        $audit->dashboard = json_encode($tiles);
        $audit->save(); 
        GapAccount::initUserChartity($user);

        return $user;
    }

    public  static function createQuestion($user){
        $question =  new Question();
        $question->user_id = $user;
        $question->step1 =   Session::get('step1') || '';
        $question->step2 =   Session::get('step2') || '';
        $question->step3 =   Session::get('step3') || '';
        $question->step4 =   Session::get('step4') || '';
        $question->step5 =   Session::get('step5') || '';
        $question->step6 =   Session::get('step6') || '';
        $question->step7 =   Session::get('step7') || '';
        $question->save();
    } 

    public  static function createCalculator($user){
        
        $calulator =  new Calculator();
        $calulator->user_id = $user;  
        $calulator->currency =   Session::get('currency');
        $calulator->mortgage =   (Session::get('mortgage')) ? Session::get('mortgage') : 0;
        $calulator->periodic_savings =   (Session::get('periodic_savings')) ? Session::get('periodic_savings') : 0;
        $calulator->education =   (Session::get('education')) ? Session::get('education') : 0;
        $calulator->expenses =  (Session::get('expenses')) ? Session::get('expenses') : 0; 
        $calulator->utility =   (Session::get('utility')) ? Session::get('utility') : 0;  ;
        $calulator->mobility =   (Session::get('mobility')) ? Session::get('mobility')  : 0;  ;
        $calulator->dept_repay =   (Session::get('dept_pay')) ? Session::get('dept_pay') : 0; 
        $calulator->charity =   (Session::get('charity')) ? Session::get('charity') : 0;
        $calulator->other_income =  (Session::get('income')) ? Session::get('income')  : 0; 
        $calulator->extra_save =   (Session::get('extra')) ? Session::get('extra')  : 0; 
        $calulator->roce =   (Session::get('roce')) ? Session::get('roce') : 0; 
        $calulator->investment =   (Session::get('investment')) ? Session::get('investment') : 0; 
        // $calulator->cost =   Session::get('cost');
        // $calulator->saving =   Session::get('saving');
        $calulator->save();
    } 
}


