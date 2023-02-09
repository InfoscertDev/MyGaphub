<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Access\AuthorizationException;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\VerifiesEmails; 

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
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
        // $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function reminder(Request $request){
        $email = $request->get('email');
        $user = User::whereEmail($email)->first();
        if($user){ 
            // info('Sending Email ');
            $user->sendEmailVerificationNotification();

            return;
        }else{
            $msg = "Your account is not found";
            return redirect('/register')->with('error', $msg);
        }
    }

    public function verify(Request $request) 
    {
        // info([$request->route('id'), $request->user()]);

        if($request->route('id')){
            $user = \App\User::find($request->route('id'));
            
            if ($user->hasVerifiedEmail()) {
                return redirect($this->redirectPath());
            }
    
            $user->email_verified_at = now(); 
            $user->save(); 

            if ($user->markEmailAsVerified()) {
                event(new Verified($user));
            }  

            auth()->login($user);

            return redirect($this->redirectPath())->with('verified', true);
        }else{
            return redirect('/login');
        }
    }
}