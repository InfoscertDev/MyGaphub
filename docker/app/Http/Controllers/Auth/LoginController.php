<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\AccountLouckout;
use App\Mail\AccountSecurityBridge;
use App\Models\LoginAttemptLog;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
 
class LoginController extends Controller
{
    public $maxAttempts = 3; 
    public $decayMinutes = 3;

    use AuthenticatesUsers;


    // protected $lockoutTime = 180; 
    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
}

    
    public function login(Request $request)
    {   
        $this->validateLogin($request);
        // $total_attempts = $this->limiter()->hit($this->throttleKey($request));
        $attempts_left = $this->limiter()->retriesLeft($this->throttleKey($request), $this->maxAttempts);
        $total_attempts = $this->limiter()->attempts($this->throttleKey($request));
        
        // info('Current Attempt ' .$total_attempts); 
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->lockoutEvent($request); 

            if ($total_attempts === 5) {
                $this->decayMinutes = 5; 
            } 

            $this->fireLockoutEvent($request); 
           
            return $this->sendLockoutResponse($request); 
        } 
  
        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }
         
        $this->incrementLoginAttempts($request);
 
        if($total_attempts >= 2){
            return $this->sendLockoutResponse($request); 
        }else {
            return $this->sendFailedLoginResponse($request);
        }
    } 

    
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/login'); 
    }

    protected function sendLockoutResponse(Request $request)
    {
        $seconds = $this->limiter()->availableIn(
            $this->throttleKey($request)
        );

        throw ValidationException::withMessages([
            $this->username() => [trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ])], 
        ])->status(423);
    }
 
    public function decayMinutes()
    {
        return property_exists($this, 'decayMinutes') ? $this->decayMinutes : 3;
    }

    public function lockoutEvent($request){
        $total_attempts = $this->limiter()->hit($this->throttleKey($request));

        $user =  User::where('email', $request->email)->first();
        if($user) { 
            Mail::to($user->email)->send(new AccountLouckout($user));
            $today = date('Y-m-d'); 
            $login_attempt = LoginAttemptLog::where('user_id', $user->id)->whereDate('period', $today)->first();
            if(!$login_attempt){
                $login_attempt = new LoginAttemptLog();
                $login_attempt->user_id = $user->id;
                $login_attempt->period = $today; 
            } 
            $login_attempt->total_attempt = (int)$login_attempt->total_attempt + $total_attempts;
            $login_attempt->attempt_series = (int)$login_attempt->attempt_series + 1;
            $login_attempt->access_type = 'Web';
            $login_attempt->device = $request->header('User-Agent');
            $login_attempt->ip = $request->ip();
            $login_attempt->save();

            if($login_attempt->attempt_series == 3){
                Mail::to('admin@prismcheck.com')->send(new AccountSecurityBridge($user));
            }
            return true;
        }
        return false;
    }
   
}
