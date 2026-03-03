@extends('email.layout')

@section('email_body')
    <div>
        <h2>Password Reset Request</h2>

        <p>Hello {{ $user->name }},</p>

        <p>You have requested to reset your password. Please use the following OTP (One-Time Password) to proceed:</p>

        <div class="otp-code">
            {{ $otp }}
        </div>

        <p>This OTP will expire at {{ $expires_at->format('Y-m-d H:i:s') }} ({{ $expires_at->diffForHumans() }}).</p>

        <div class="warning">
            <strong>Security Notice:</strong> If you did not request this password reset, please ignore this email and your password will remain unchanged.
        </div>

        <p>Thank you,<br>{{ config('app.name') }} Team</p>
    </div>
@endsection
