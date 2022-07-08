@extends('layouts.guest')

@section('content')
<div class="wd-f log-overlay hg-f">
    <div class="py-4">
        <div class="gap-center-sm">
            <div class="form-log form-reg card">
                <div class="gap-header mb-3">
                    <h3 class="mx-1"><b>Login</b></h3>
                    <span class="line-step" style="width: 10%"></span>
                    {{-- <span class="line-step2"></span> --}}
                </div> 
                <div class="gap-body px-2">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
 
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

                        <div class="form-group">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                            <div class="">
                                <input id="password" placeholder="Password" type="password" min="6" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            <div class=" offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group mb-4">
                            <div class="text-center">
                                <button type="submit" class="btn btn-block-sm btn-pry">Login </button>
                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                            </div>
                        </div>
                        {{-- <div class="form-group ">
                            <div class="text-center">
                                <button type="button" class="btn btn-rounded btn-block bg-fb ">
                                 <i class="fa fa-facebook mr-2"></i>   
                                     Continue with Facebook
                                </button>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="text-center">
                                <button type="button" class="btn btn-rounded btn-block btn-default">
                                 <i class="fa fa-google mr-2"></i>   
                                     Continue with Google
                                </button>
                            </div>
                        </div> --}}
                        <div class="form-group text-center">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                        <div class="form-group mt-4">
                            <div class="text-center">
                                <div class="mb-1">Don't have an account yet?</div>
                                 <a class="card-link text-white" href="{{ route('register') }}">
                                    <button type="button" class="btn btn-rounded btn-block btn-primary" >
                                        Sign Up Now!
                                    </button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
