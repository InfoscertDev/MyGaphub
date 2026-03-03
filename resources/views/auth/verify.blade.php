@extends('layouts.guest')

@section('content')
<div class="">
    <div class="wd-f hg-f bg-white py-5">
        <div class="gap-center-sm bg-light card">
                {{-- <div class="card-header">{{ __('Verify Your Email Address') }}</div> --}}
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    <div class="">
                        <div class="confirm mb-2">
                            <i class="fa fa-check confirm-fa"></i>
                        </div>
                    </div>
                    <div class="gap-header text-center form-reg">
                        <h3 class="mt-2 bold mx-2"><b>Thank you for your registration</b></h3>
                        <span class="line-step mx-auto" style="width:50%; left: -40px;"></span>
                        {{-- <span class="line-step2"></span> --}}
                    </div>
                    <div class="text-center">
                        {{ __('Please check your email (including your spam folder) to verify your account. ') }}
                        {{-- <p>Your 7G result will be waiting for you.</p> --}}
                        {{-- {{ __('Your 7G result will be waiting for you.') }} --}}
                        {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
