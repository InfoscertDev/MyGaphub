@component('mail::message')
    {{-- Greeting --}}
    @if (! empty($greeting))
    # {{ $greeting }}
    @else
    @if ($level === 'error')
    #   @lang('Whoops!')
    @else
        <div style="text-align: center">
            <img src="https://www.mygaphub.com/app/assets/images/logo.png" style="text-align: center;" alt="" class="img img-responsive">
        </div>
    @endif
@endif
<style>
    p{ font-size: 13px;}
    .im{
        color: #74787e !important;
    }
</style>
<br>
<p style="font-size: 13px;"> @lang('Dear ' . $notifiable->firstname . ',')</p>
<p style="font-size: 13px;"> @lang('Thank you for registering to join the GAPhub! ')</p>
<p style="font-size: 13px;">  @lang('Your GAPhub account ID is  <span style="text-decoration: underline;">'. $notifiable->email.'.</span>
                 We are always delighted to have a new
                 member join this family of people who are committed to financial independence and working on
                 having the freedom and time to pursue their passion. ')</p>
<p style="font-size: 13px;">  @lang('GAPhub offers you a variety of tools and opportunities to help you take control of your financial life.
                 You can access all aspects of your financial life from our easy-to-use and friendly interface.')</p>

<br>
<p style="font-size: 13px;">
@lang('To confirm your email address and begin your existing journey with the GAPhub, please click this link')
</p>
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
    $download_url = "https://mygaphub.com/detector/";
    $download_color = "gray";
?>
@component('mail::button', ['url' => $action, 'color' => $color])
  Verify Email Address
@endcomponent
<p style="font-size: 13px;">
    @lang('Immediately you log in to your account, we will take you through a little exercise to help you maximise the use of this tool.')
</p>
<p style="font-size: 13px;">
    @lang(' You can also use MyGAPhub on your mobile phone after verifying your email')
</p>

 <br>
<p style="font-size: 13px;">@lang('We look forward to having you as part of the GAPhub family.')</p>
<p style="font-size: 13px;">
    @lang('If you have any further questions or need assistance please contact us at <a href="mailto:gaphubteam@mygaphub.com">gaphubteam@mygaphub.com</a>.')
</p>
<p style="font-size: 13px;">
    @lang('Thank you for joining GAPhub.')
</p>
<p style="font-size: 13px;">
    @lang('We wish you the very best on your financial journey,')
</p>
<p style="font-size: 13px;">
    @lang('The GAPhub Team')
</p>
<div style="font-size:12px;text-align:center">
    @lang('MyGAPhub© is the digital product of PRISM Financial Technology Limited, a Fintech company registered in England & Wales with registration no. 12837226 and registered office at 20-22 Wenlock Road, London, England, N1 7GU. Our terms and conditions apply. </br>')
</div>
<br> <br>

<div style="font-size:12px;text-align:center">
    @lang('This email and any files transmitted with it are confidential and intended solely for the use of the individual or entity to whom they are addressed.
            If you have received this email in error, please notify the system manager. This message contains confidential information and is intended only for the individual named.
            If you are not the named addressee, you should not disseminate, distribute or copy this email. Please notify the sender immediately by email if you have received this email
            by mistake and delete this email from your system. If you are not the intended recipient, you are notified that disclosing, copying, distributing or taking any action in
            reliance on the contents of this information is strictly prohibited.')
</div>
@endcomponent
