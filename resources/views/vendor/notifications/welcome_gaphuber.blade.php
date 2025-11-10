@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <img src="https://mygaphub.com/images/Logo.png" alt="GAPhub Logo" style="max-width: 200px;">
        @endcomponent
    @endslot

    {{-- Body --}}
    <div style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto;">
        <h1 style="text-align: center; color: #333; margin-bottom: 20px;">Verify your email address</h1>

        <p style="font-size: 13px;">Hi {{ $notifiable->firstname }},</p>

        <p style="font-size: 13px;">Thank you for signing up to join the GAPhub!</p>

        <p style="font-size: 13px;">
            You're just one click away from confirming your email address and starting your exciting journey with us.
            Please click this link to get started!
        </p>

        <div style="text-align: center; margin: 25px 0;">
            @component('mail::button', ['url' => $action, 'color' => 'primary'])
                Verify Email
            @endcomponent
        </div>

        <p style="font-size: 13px;">We look forward to having you as part of the GAPhub family.</p>

        <p style="font-size: 13px;">
            If you have any further questions or need assistance please contact us at
            <a href="mailto:gaphubteam@mygaphub.com" style="color: #333; font-weight: bold;">gaphubteam@mygaphub.com</a>
        </p>

        <p style="font-size: 13px;">Thank you for joining GAPhub</p>
        <p style="font-size: 13px;">We wish you the very best on your financial journey.</p>
        <p style="font-size: 13px;">The GAPhub Team</p>

        <hr style="border: none; border-top: 1px solid #eee; margin: 25px 0;">

        <div style="text-align: center; margin: 20px 0;">
            <p style="font-size: 13px; margin-bottom: 15px;"><strong>Get the GAPhub app</strong></p>
            <div style="display: flex; justify-content: center; gap: 15px; margin-bottom: 25px;">
                <div style="width: 150px; height: 50px; position: relative;">
                    <a target="_blank" rel="noopener noreferrer" href="https://apps.apple.com/us/app/gaphub/id1577758374">
                        <img alt="Download on App Store" loading="lazy" decoding="async"
                             src="https://mygaphub.com/images/cta/mobile-app-store-apple.png"
                             style="width: 100%; height: 100%; object-fit: contain;">
                    </a>
                </div>
                <div style="width: 170px; height: 50px; position: relative;">
                    <a target="_blank" rel="noopener noreferrer" href="https://play.google.com/store/apps/details?id=com.prismcheck.gaphub&amp;pli=1">
                        <img alt="Get it on Google Play" loading="lazy" decoding="async"
                             src="https://mygaphub.com/images/cta/mobile-app-store-android.png"
                             style="width: 100%; height: 100%; object-fit: contain;">
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            <div style="font-size: 11px; color: #666; line-height: 1.4; text-align: center;">
                <p>© 2024 myGAPhub. All rights reserved.</p>

                <p style="margin: 15px 0;">
                    myGAPhub® is the digital product of PRISM Financial Technology Limited, a Fintech company registered in England & Wales with registration no. 12837226 and registered office at 20-22 Wenlock Road, London, England, N1 7GU. Our terms and conditions apply.
                </p>

                <p style="margin: 15px 0;">
                    This email and any files transmitted with it are confidential and intended solely for the use of the individual or entity to whom they are addressed. If you have received this email in error, please notify the system manager. This message contains confidential information and is intended only for the individual named. If you are not the named addressee, you should not disseminate, distribute or copy this email. Please notify the sender immediately by email if you have received this email by mistake and delete this email from your system. If you are not the intended recipient, you are notified that disclosing, copying, distributing or taking any action in reliance on the contents of this information is strictly prohibited.
                </p>

                <p style="margin-top: 20px;">
                    <a href="#" style="color: #666; margin: 0 10px;">Privacy policy</a> |
                    <a href="#" style="color: #666; margin: 0 10px;">Terms of service</a> |
                    <a href="#" style="color: #666; margin: 0 10px;">Help center</a> |
                    <a href="#" style="color: #666; margin: 0 10px;">Unsubscribe</a>
                </p>
            </div>
        @endcomponent
    @endslot
@endcomponent
