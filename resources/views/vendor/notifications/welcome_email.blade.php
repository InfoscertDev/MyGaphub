@component('mail::message')
{{-- Custom CSS for the email --}}
<style>
    body {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
    }
    .header-logo {
        text-align: center;
        padding: 30px 0 40px 0;
    }
    .header-logo img {
        height: 40px;
    }
    h1 {
        font-size: 28px;
        font-weight: 600;
        color: #1a1a1a;
        margin-bottom: 24px;
        margin-top: 0;
    }
    p {
        font-size: 16px;
        color: #333333;
        line-height: 1.6;
        margin: 16px 0;
    }
    .email-link {
        color: #dc2626;
        text-decoration: none;
    }
    .button {
        background-color: #dc2626 !important;
        border-color: #dc2626 !important;
        color: #ffffff !important;
        padding: 10px 24px !important;
        border-radius: 50px !important;
        font-size: 16px !important;
        font-weight: 600 !important;
        text-decoration: none !important;
        display: inline-block !important;
    }
</style>

{{-- Header with Logo --}}
<div class="header-logo">
    <img src="https://mygaphub.com/images/Logo.png" alt="GAPhub">
</div>

{{-- Main Content --}}
# Verify your email address

Hi {{ $notifiable->firstname }},

Thank you for signing up to join the GAPhub!

You're just one click away from confirming your email address and starting your exciting journey with us. Please click this link to get started!

@component('mail::button', ['url' => $action, 'color' => 'primary'])
Verify Email
@endcomponent

We look forward to having you as part of the GAPhub family.

If you have any further questions or need assistance please contact us at [gaphubteam@mygaphub.com](mailto:gaphubteam@mygaphub.com)

Thank you for joining GAPhub

We wish you the very best on your financial journey.

The GAPhub Team

{{-- Footer is now in a separate file: resources/views/vendor/mail/html/footer.blade.php --}}

@endcomponent