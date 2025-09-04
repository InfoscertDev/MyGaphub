<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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

    public function verifyOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'otp' => 'required|string|size:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $email = $request->email;
        $otp = $request->otp;

        // Verify OTP using model method
        $otpRecord = PasswordReset::verifyOTP($email, $otp);

        if (!$otpRecord) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or expired OTP'
            ], 400);
        }

        return response()->json([
            'success' => true,
            'message' => 'OTP verified successfully',
            'can_reset_password' => true
        ], 200);
    }

    public function resetWithOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'otp' => 'required|string|size:6',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $email = $request->email;
        $otp = $request->otp;
        $password = $request->password;

        // Verify OTP using model method
        $otpRecord = PasswordReset::verifyOTP($email, $otp);

        if (!$otpRecord) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or expired OTP'
            ], 400);
        }

        // Find user
        $user = User::where('email', $email)->first();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ], 404);
        }

        try {
            // Update password
            $user->password = Hash::make($password);
            $user->save();

            // Delete used OTP/token - use model method
            PasswordReset::where('email', $email)->where('token', $otp)->where('is_otp', true)->delete();

            return response()->json([
                'success' => true,
                'message' => 'Password reset successfully'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to reset password. Please try again.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    /**
     * Verify reset token validity
     * Used before showing "Create New Password" screen
     */
    public function verifyResetToken(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required|string',
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid request parameters',
                'errors' => $validator->errors()
            ], 422);
        }

        $email = $request->input('email');
        $token = $request->input('token');

        // Use model method to verify web token
        $resetRecord = PasswordReset::verifyWebToken($email, $token);

        if (!$resetRecord) {
            // Check if token exists but is expired
            $expiredRecord = PasswordReset::where('email', $email)
                                         ->where('is_otp', false)
                                         ->first();

            if ($expiredRecord && $expiredRecord->isExpired()) {
                $expiredRecord->delete(); // Clean up expired token
                return response()->json([
                    'success' => false,
                    'message' => 'Reset token has expired. Please request a new one.',
                    'code' => 'TOKEN_EXPIRED'
                ], 410);
            }

            return response()->json([
                'success' => false,
                'message' => 'Invalid or expired reset token',
                'code' => 'TOKEN_NOT_FOUND'
            ], 404);
        }

        // Token is valid - return success for "Create New Password" screen
        return response()->json([
            'success' => true,
            'message' => 'Token verified successfully',
            'data' => [
                'email' => $email,
                'can_reset_password' => true,
                'expires_at' => $resetRecord->created_at->addMinutes(60)->toISOString()
            ]
        ], 200);
    }

    /**
     * Reset password with new password
     * Implements acceptance criteria #3 backend
     */
    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid input data',
                'errors' => $validator->errors()
            ], 422);
        }

        $email = $request->input('email');
        $token = $request->input('token');
        $newPassword = $request->input('password');

        // Use model method to verify web token
        $resetRecord = PasswordReset::verifyWebToken($email, $token);

        if (!$resetRecord) {
            // Check if token exists but is expired
            $expiredRecord = PasswordReset::where('email', $email)
                                         ->where('is_otp', false)
                                         ->first();

            if ($expiredRecord && $expiredRecord->isExpired()) {
                $expiredRecord->delete();
                return response()->json([
                    'success' => false,
                    'message' => 'Reset token has expired. Please request a new one.',
                    'code' => 'TOKEN_EXPIRED'
                ], 410);
            }

            return response()->json([
                'success' => false,
                'message' => 'Invalid or expired reset token',
                'code' => 'INVALID_TOKEN'
            ], 401);
        }

        try {
            // Find user
            $user = User::where('email', $email)->first();
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not found'
                ], 404);
            }

            // Update password
            $user->password = bcrypt($newPassword);
            $user->save();

            // Delete the reset token (single use)
            PasswordReset::where('email', $email)->where('is_otp', false)->delete();

            return response()->json([
                'success' => true,
                'message' => 'Password has been reset successfully',
                'data' => [
                    'email' => $email,
                    'reset_at' => now()->toISOString()
                ]
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to reset password. Please try again.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }
}
