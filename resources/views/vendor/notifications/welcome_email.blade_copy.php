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
<br>
@lang('Dear ' . $notifiable->firstname . ',')
<br> <br>  @lang('Thank you for registering to join the GAPhub! ')
<br> <br>  @lang('Your GAPhub account ID is  <span style="text-decoration: underline;">'. $notifiable->email.'.</span>  We are always delighted to have a new
                 member join this family of people who are committed to financial independence and working on 
                 having the freedom and time to pursue their passion. ')
<br> <br>  @lang('GAPhub offers you a variety of tools and opportunities to help you take control of your financial life.
                 You can access all aspects of your financial life from our easy-to-use and friendly interface.')
{{-- @foreach ($outroLines as $line)
{{ $line }}
@endforeach --}}
<br> <br>  
@lang('To confirm your email address and begin your existing journey with the GAPhub, please click this link')
 
{{-- Action Button --}}
{{-- @isset($actionText) --}}
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary'; 
    }
?>
@component('mail::button', ['url' => $action, 'color' => $color])
  Verify Email Address
@endcomponent
{{-- @endisset --}}
{{-- Intro Lines --}}
<br> <br> 
@lang('Immediately you log in to your account, we will take you through a little exercise to help you maximise the use of this tool.')
<br> <br> 
@lang(' You can also use MyGAPhub on your mobile phone after verifying your email. Simply come back to this email and click the button below:')

{{-- @component('mail::button', ['url' => 'http://prismcheck.com/releasea/', 'color' => '#ffff00'])
    Download App
@endcomponent --}} 

<div style="text-align: center; margin: 0 auto; width: 100%;">
    <a href="https://mygaphub.com/detector/" style="width:230px;" target="_blank" 
        data-saferedirecturl="https://www.google.com/url?q=https://www.mygaphub.com/app/">
        <img src="https://www.mygaphub.com/app/assets/icon/download_app.PNG" style="text-align: center;" alt="" class="img img-responsive">
    </a>
</div>
<br> 
@lang('We look forward to having you as part of the GAP family.')
<br> <br> 
@lang('If you have any further questions or need assistance please contact us at <a href="mailto:gaphubteam@mygaphub.com">gaphubteam@mygaphub.com</a>.')
<br> <br> 
@lang('Thank you for joining GAPhub.')
<br> <br>     
@lang('We wish you the very best on your financial journey, ')
<br> <br>  
@lang('The GAPhub Team')
<br> <br> 
@component('mail::subcopy')
    @lang('MyGAPhub© is the digital product of PRISM Financial Technology Limited, a Fintech company registered in England & Wales with registration no. 12837226 and registered office at 20-22 Wenlock Road, London, England, N1 7GU. Our terms and conditions apply. </br>')
@endcomponent
<br> <br>   
@component('mail::subcopy')
    @lang('This email and any files transmitted with it are confidential and intended solely for the use of the individual or entity to whom they are addressed. 
            If you have received this email in error, please notify the system manager. This message contains confidential information and is intended only for the individual named. 
            If you are not the named addressee, you should not disseminate, distribute or copy this email. Please notify the sender immediately by email if you have received this email 
            by mistake and delete this email from your system. If you are not the intended recipient, you are notified that disclosing, copying, distributing or taking any action in 
            reliance on the contents of this information is strictly prohibited.')
@endcomponent
{{-- Outro Lines --}}
{{-- @foreach ($outroLines as $line)
{{ $line }}

@endforeach --}}
{{-- Salutation --}}
{{-- @if (! empty($salutation))
{{ $salutation }}
@else --}}
{{--<br>   
    @lang('Regards'), <br> {{ config('app.name') }} --}}
{{-- @endif --}}

{{-- Subcopy --}} 
@isset($actionText)
<br>
    @component('mail::subcopy')
    @lang(
        "If you’re having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
        'into your web browser: [:actionURL](:actionURL)',
        [
            'actionText' => $actionText,
            'actionURL' => $actionUrl,
        ]
    )
    @endcomponent
@endisset
@endcomponent
 