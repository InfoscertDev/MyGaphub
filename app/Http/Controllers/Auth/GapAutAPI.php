<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\UserProfile as Profile;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

// use \Validator;

class GapAutAPI extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth','verified'], ['except' => ['login', 'registeration']]);
    }

    use AuthenticatesUsers;

    /**
     * Gaphub Login
     *
     * Login for  Gaphub
     * @bodyParam email string requied The user unique email. Example: john@yahoo.com
     * @bodyParam password sting required User valid password
     * @response {
     *    "success": true,
     *    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvYXBpLnBvc3RiaXJkLmNvbS5uZ1wvYXBpXC9sb2dpbiIsImlhdCI6MTYzMzUzNzgwMCwiZXhwIjoxNjMzNTQxNDAwLCJuYmYiOjE2MzM1Mzc4MDAsImp0aSI6ImtpOFhvZmhtWE1GNGptczMiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.jsfD6eWt58X4ndPFH6F924xeSmIJtApp1sEMDH5AO9c",
     *    "data": {
     *    "id": 1,
     *    "name": "Ola now",
     *    "admin": "0",
     *    "email": "olatech101@gmail.com",
     *    "username": "olatech101",
     *    "roleid": "0",
     *    "mobile": null
     *   }
     *  'message'=> 'Succefully Loggedin'
     * }
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'Validation failed',
                'data'    => $validator->errors()
            ], 400);
        }

        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Invalid login credentials',
                    'data'    => null
                ], 400);
            }
        } catch (JWTException $e) {
            return response()->json([
                'status'  => false,
                'message' => 'Could not create token',
                'data'    => null
            ], 500);
        }

        $user = Auth::user();

        // Check if account is deleted
        if ($user->deleted_at !== null) {
            $hasEnquiry = \App\Models\Enquiry::where('email', $user->email)->exists();
            if (!$hasEnquiry) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Account has been deleted. Please submit an enquiry to restore access.',
                    'data'    => null
                ], 403);
            }
        }

        // Check if email is verified
        if ($user->email_verified_at === null) {
            return response()->json([
                'status'  => false,
                'message' => 'Account has not been verified',
                'data'    => null
            ], 400);
        }

        return $this->respondWithToken($token);
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
            'status'  => true,
            'message' => 'Login successful',
            'data'    => [
                'access_token' => $token,
                'token_type'   => 'bearer',
                'expires_in'   => auth('api')->factory()->getTTL() * 60 // in seconds
            ]
        ], 200);
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

    public function logout(Request $request) {
        $this->validate($request, ['token' => 'required']);

        try {
            JWTAuth::invalidate($request->input('token'));
            return response()->json(['success' => true, 'message'=> "You have successfully logged out."]);
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'message' => 'Failed to logout, please try again.'], 500);
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
