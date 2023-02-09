<?php

namespace App\Http\Controllers\Auth;

use App\Helper\GapAccountCalculator;
use App\Helper\IntegrationParties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Helper\HelperClass;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\UserProfile as Profile;
use App\UserAudit as Audit;

// use \Validator;

class GapAutReg extends Controller
{ 
    public function __construct()
    {
        // $this->middleware(['auth','verified'], ['except' => ['login', 'registeration']]);
    } 

    use RegistersUsers;
 
    /**
     * Gaphub Registeration
     * 
     * @bodyParam firstname string required User Firstname
     * @bodyParam surname string required User surname.
     * @bodyParam email email required  User unique email. Example: john@yahoo.com
     * @bodyParam password string required password_confirmation must be the same and more than 7 characters. 
     * @bodyParam password_confirmation string required 
     * @response {
     *  "success": true,
     *    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLnBvc3RiaXJkLmNvbS5uZ1wvYXBpXC9sb2dpbiIs...",
     *    "data": {
     *    "id": 1,
     *    "name": "Ola now",
     *    "email": "olatech101@gmail.com"
     *    "mobile": null
     *   }
     * } 
     */  
    public function registeration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create([
            'firstname' => $request->get('firstname'),
            'surname' => $request->get('surname'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
        
         // Save 
        RegisterController::createCalculator($user->id);
        RegisterController::createQuestion($user->id);
        GapAccountCalculator::initUserChartity($user);
        IntegrationParties::join_sendinblue_leads($user);
        // GapExchangeHelper::gapCurrencies($user);
  
        $profile = new Profile();
        $profile->save();
        $user->profile_id  = $profile->id;
        $user->save(); 

        $tiles = HelperClass::dashboardTiles();
        $audit = new Audit();  
        $audit->user_id = $user->id; 
        $audit->dashboard = json_encode($tiles);
        $audit->save();

        $user->sendEmailVerificationNotification();

        $token = JWTAuth::fromUser($user); 

        return response()->json(compact('user','token'),201);
    }

    public function getAuthenticatedUser()
    {
            try {

                    if (! $user = JWTAuth::parseToken()->authenticate()) {
                            return response()->json(['user_not_found'], 404);
                    }

            } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

                    return response()->json(['token_expired'], $e->getStatusCode());

            } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

                    return response()->json(['token_invalid'], $e->getStatusCode());

            } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

                    return response()->json(['token_absent'], $e->getStatusCode());

            }

            return response()->json(compact('user'));
    }

    protected function respondWithToken($token)
    {
        return response()->json([ 
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60 * 60 * 24
        ]); 
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard('api');
    }

    /**
     * Logout
     * 
     * Log user out and make token invalid
     * @response {
     *  "success": true,
     *  'message' : 'You have successfully logged out',
     * } 
     */ 
    public function logout(Request $request) {
        $this->validate($request, ['token' => 'required']);
         
        try {
            JWTAuth::invalidate($request->input('token'));
            return response()->json(['success' => true, 'message'=> "You have successfully logged out."]);
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'Failed to logout, please try again.'], 500);
        }
    }
 
     /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */  
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }
}
