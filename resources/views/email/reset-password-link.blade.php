@extends('email.layout')

@section('email_body')
<div class="content">
    <p>Hello {{ $user->firstname ?? 'User' }},</p>

    <p>We received a request to reset the password for your account associated with <strong>{{ $user->email }}</strong>.</p>

    <p>Click the button below to reset your password:</p>

    <!-- Primary Reset Button -->
    <div style="text-align: center; margin: 30px 0;">
        <table cellpadding="0" cellspacing="0" border="0" style="margin: 0 auto;">
            <tr>
                <td style="background-color: #ED3237; border-radius: 10px; text-align: center;">
                    <a href="{{ $resetLink }}"
                       style="background-color: #ED3237;
                              color: #ffffff;
                              font-family: Arial, sans-serif;
                              font-size: 16px;
                              font-weight: bold;
                              text-decoration: none;
                              padding: 12px 25px;
                              border-radius: 10px;
                              display: inline-block;
                              border: none;"
                       target="_blank">
                        Reset My Password
                    </a>
                </td>
            </tr>
        </table>
    </div>

    <!-- Mobile App Button (if applicable) -->
    @if(isset($deepLink))
    <div style="text-align: center; margin: 20px 0;">
        <p style="margin: 10px 0; font-size: 14px; color: #666;">
            Using our mobile app?
            <a href="{{ $deepLink }}" style="color: #ED3237; text-decoration: none; font-weight: bold;">
                Open in App
            </a>
        </p>
    </div>
    @endif

    <!-- Warning Box -->
    <div style="background-color: #fff3cd;
                border: 1px solid #ffeaa7;
                border-radius: 8px;
                padding: 15px;
                margin: 25px 0;
                border-left: 4px solid #f39c12;">
        <p style="margin: 0 0 10px 0; font-weight: bold; color: #856404;">
            ⚠️ Important:
        </p>
        <ul style="margin: 0; padding-left: 20px; color: #856404;">
            <li>This link will expire in <strong>60 minutes</strong> (at {{ $expiresAt->format('M j, Y g:i A') }})</li>
            <li>This link can only be used once</li>
            <li>If you didn't request this reset, you can safely ignore this email</li>
        </ul>
    </div>

    <!-- Alternative Link Section -->
    <div style="background-color: #f8f9fa;
                border-radius: 8px;
                padding: 15px;
                margin: 25px 0;">
        <p style="margin: 0 0 10px 0; font-weight: bold;">
            Can't click the button?
        </p>
        <p style="margin: 0 0 10px 0;">
            Copy and paste this link into your browser:
        </p>
        <div style="background-color: #ffffff;
                    border: 1px solid #dee2e6;
                    border-radius: 4px;
                    padding: 10px;
                    word-break: break-all;
                    font-family: monospace;
                    font-size: 12px;
                    color: #495057;">
            {{ $resetLink }}
        </div>
    </div>

    <hr style="margin: 30px 0; border: none; border-top: 1px solid #e9ecef;">

    <p>If you're having trouble, please contact our support team.</p>

    <p>Thank you,<br>{{ config('app.name') }} Team</p>
</div>

<style>
    /* Fallback styles for email clients that support CSS */
    .reset-button:hover {
        background-color: #c82227 !important;
    }

    @media only screen and (max-width: 600px) {
        .content {
            padding: 20px 15px !important;
        }
    }
</style>
@endsection
