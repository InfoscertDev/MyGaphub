<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function sendOTP(Request $request)
    {
        $email = $request->input('email');
        $cacheKey = 'reset_password_attempts_' . $request->ip(); // you can also tie it to user/session

        // Get current attempt count
        $attempts = Cache::get($cacheKey, 0);

        // Check if user exists
        $user = User::where('email', $email)->first();

        if (!$user) {
            $remaining = 2 - $attempts; // because total allowed is 3
            $attempts++;

            Cache::put($cacheKey, $attempts, now()->addMinutes(15)); // track for 15 mins (adjust as needed)

            if ($attempts >= 3) {
                // Force logout
                if (Auth::check()) {
                    Auth::logout();
                }

                Cache::forget($cacheKey);

                return response()->json([
                    'success' => false,
                    'message' => "You’ve been logged out. Please log back in to try again."
                ], 403);
            }

            return response()->json([
                'success' => false,
                'message' => "This email address is not registered. You have {$remaining} attempts remaining."
            ], 404);
        }

        // If user exists → reset attempts
        Cache::forget($cacheKey);

        try {
            // Generate OTP using existing password_resets table
            $otpRecord = PasswordReset::generateOTP($email);

            // Send OTP via email
            Mail::send('email.reset-otp', [
                'user' => $user,
                'otp' => $otpRecord->token,
                'expires_at' => $otpRecord->created_at->addMinutes(45),
            ], function ($message) use ($email) {
                $message->to($email);
                $message->subject('Password Reset OTP');
            });

            return response()->json([
                'success' => true,
                'message' => 'OTP sent successfully to your email address',
                'data' => [
                    'expires_in_minutes' => 45
                ]
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to send OTP. Please try again.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

}
