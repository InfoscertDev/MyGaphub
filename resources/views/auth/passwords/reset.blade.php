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
                    <form method="POST" id="reset_form" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

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

                        <div class="form-group">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}
                            <div class="">
                                <input id="password" placeholder="{{ __('Password') }}" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <div class="passwordStrength ml-2  pr-4 text-danger">Your password should have a mixture of numbers, letters (uppercase and lowercase) with a special character.</div>
                            </div>
                        </div>
                        <div class="form-group">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}
                            <div class="">
                                <input id="password-confirm" placeholder="{{ __('Confirm Password') }}" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="text-center">
                                <button type="submit" class="btn btn-pry">  {{ __('Reset Password') }} </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(function(){
        let passwordVal = document.getElementById('password'),
            form = document.getElementById('reset_form');

        function valPassword(){
            var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
            //   !"#$%&'()*+,-./:;<=>?@[\]^_`{|}~ let pattern = new RegExp("^(?=(.*[a-zA-Z]){1,})(?=(.*[0-9]){2,}).{8,}$"); //Regex: At least 8 characters with at least 2 numericals
            let pattern = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*]).{8,}$"); //Regex: At least 8 characters with at least 2 numericals
            let numPattern =  new RegExp("(?=.*[0-9])"),
                lowerPattern =  new RegExp("(?=.*[a-z])"),
                upperPattern =  new RegExp("(?=.*[A-Z])"),
                // nonCharPattern =  /[^A-Za-z 0-9]/g;
                nonCharPattern =   new RegExp("[^A-Za-z 0-9]");
                specialPattern =  new RegExp("^(?=.*[!@#\$%\^&\*\-\:])");


            let passwordVal = document.getElementById('password'),
                valide = document.getElementsByClassName('passwordStrength')[0];

            if(passwordVal.value.length == 0){
                valide.innerHTML = 'Your password should have a mixture of numbers, letters (uppercase and lowercase) with a special character.';
            }else if(!lowerPattern.test(passwordVal.value)){
                valide.innerHTML = 'One lowercase letter is required';
            }else if(!upperPattern.test(passwordVal.value)){
                valide.innerHTML = 'One uppercase letter is required';
            }else if(!numPattern.test(passwordVal.value)){
                valide.innerHTML = 'One number is required';
            }else if(!nonCharPattern.test(passwordVal.value)){
                valide.innerHTML = 'One special character is required';
            }else if(passwordVal.value.length < 8){
                valide.innerHTML = 'Minimum of 8 characters is required';
            }else{
                valide.innerHTML = '';
                return true;
            }
            return false;
        }
        passwordVal.addEventListener('input',  ()=>{valPassword()} );
        form.addEventListener('submit', (e)=> {
            e.preventDefault();
            if(valPassword()){
                form.submit();
            }
            return valPassword();
        });

    });

</script>
@endsection
