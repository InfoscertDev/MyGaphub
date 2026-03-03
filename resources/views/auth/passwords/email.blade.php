@extends('layouts.guest')

@section('content')
<div class="wd-f log-overlay hg-f">
    <div class="py-4">
        <div class="gap-center-sm">
            <div class="form-log form-reg card">
                <div class="gap-header mb-3">
                    <h3 class="mx-1"><b>{{ __('Reset Password') }}</b></h3>
                    <span class="line-step" style="width: 30%"></span>
                    {{-- <span class="line-step2"></span> --}}
                </div> 
                <div class="gap-body px-2">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif 

                        <div class="form-group">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}
                            <div class="">
                                <input id="email" placeholder="Email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <div class="text-center">
                                <button type="submit" class="btn btn-block btn-pry">   {{ __('Send Password Reset Link') }} </button>           
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
