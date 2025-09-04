<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

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
        $cacheKey = 'reset_password_attempts_' . $request->ip();

        // Get current attempt count
        $attempts = Cache::get($cacheKey, 0);

        // Check if user exists
        $user = User::where('email', $email)->first();

        if (!$user) {
            $remaining = 2 - $attempts;
            $attempts++;

            Cache::put($cacheKey, $attempts, now()->addMinutes(15));

            if ($attempts >= 3) {
                // Force logout
                if (Auth::check()) {
                    Auth::logout();
                }

                Cache::forget($cacheKey);

                return response()->json([
                    'success' => false,
                    'message' => "You've been logged out. Please log back in to try again."
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
            // Generate OTP using model method
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

    /**
     * Send password reset link via email
     * Implements acceptance criteria requirements
     */
    public function sendResetLink(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please enter a valid email address',
                'errors' => $validator->errors()
            ], 422);
        }

        $email = $request->input('email');
        $cacheKey = 'reset_link_attempts_' . $request->ip();

        // Get current attempt count
        $attempts = Cache::get($cacheKey, 0);

        // Check if user exists
        $user = User::where('email', $email)->first();

        if (!$user) {
            $remaining = 2 - $attempts;
            $attempts++;

            Cache::put($cacheKey, $attempts, now()->addMinutes(15));

            if ($attempts >= 3) {
                Cache::forget($cacheKey);
                return response()->json([
                    'success' => false,
                    'message' => 'Too many failed attempts. Please try again later.'
                ], 429);
            }

            return response()->json([
                'success' => false,
                'message' => "This email address is not registered. You have {$remaining} attempts remaining."
            ], 404);
        }

        // Reset attempts on successful user found
        Cache::forget($cacheKey);

        try {
            // Check rate limiting for valid emails (prevent spam)
            $rateLimitKey = "password_reset_sent_{$email}";
            if (Cache::has($rateLimitKey)) {
                $remainingTime = Cache::get($rateLimitKey . '_expires') - now()->timestamp;
                $remainingMinutes = ceil($remainingTime / 60);

                return response()->json([
                    'success' => false,
                    'message' => "Password reset email was already sent. Please wait {$remainingMinutes} minute(s) before requesting again."
                ], 429);
            }

            // Generate secure reset token using model method
            $token = Str::random(64);
            $tokenRecord = PasswordReset::generateWebToken($email, $token);

            // Generate reset link with plain token (not hashed)
            $resetLink = url('mygaphub://app/reset-password') . '?' . http_build_query([
                'token' => $token, // Use plain token in URL
                'email' => $email
            ]);

            // Send reset link email
            Mail::send('email.reset-password-link', [
                'user' => $user,
                'resetLink' => $resetLink,
                'deepLink' => $resetLink, // Add deep link for mobile
                'expiresAt' => now()->addMinutes(60),
                'appName' => config('app.name')
            ], function ($message) use ($email) {
                $message->to($email);
                $message->subject('Reset Your Password - ' . config('app.name'));
            });

            // Set rate limiting (prevent multiple emails in short time)
            Cache::put($rateLimitKey, true, now()->addMinutes(5));
            Cache::put($rateLimitKey . '_expires', now()->addMinutes(5)->timestamp, now()->addMinutes(5));

            // Response for "Check your email" screen (Acceptance Criteria #2)
            return response()->json([
                'success' => true,
                'message' => 'Check your email',
                'data' => [
                    'email' => $email,
                    'confirmation_message' => 'We have sent a password reset link to your email address.',
                    'expires_in_minutes' => 60,
                    'can_open_email_app' => true,
                    'email_app_data' => [
                        'subject' => 'Reset Your Password - ' . config('app.name'),
                        'from' => config('mail.from.address')
                    ]
                ]
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to send reset link. Please try again.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }
}