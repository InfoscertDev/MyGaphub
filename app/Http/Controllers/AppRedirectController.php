<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppRedirectController extends Controller
{
    /**
     * Redirect to mobile app for password reset
     */
    public function redirectToPasswordReset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required|string',
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return redirect('/password/reset')->withErrors(['error' => 'Invalid reset parameters']);
        }

        $token = $request->input('token');
        $email = $request->input('email');

        // Generate deep link
        $deepLink = 'mygaphub://app/reset-password?' . http_build_query([
            'token' => $token,
            'email' => $email
        ]);

        // Create fallback web URL
        $webFallback = url('/password/reset') . '?' . http_build_query([
            'token' => $token,
            'email' => $email
        ]);

        return view('redirect.mobile-app', compact('deepLink', 'webFallback', 'email'));
    }
}
