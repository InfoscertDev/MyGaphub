@extends('layouts.guest')

@section('content')
<div class="">
    <div class="wd-f hg-f py-4 bg-white">
        <div class="gap-center-sm bg-light card">
            <div class="gap-header form-reg">
                <h3 class="mt-2 bold mx-2"><b>Registration</b></h3>
                <span class="line-step" style="width: 25%"></span>
                {{-- <span class="line-step2"></span> --}}
            </div>
            <div class="gap-bosy">
                <div class="card-body">
                    <form class="form-reg" id="registration_form" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group ">
                            {{-- <label for="email" lass="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}

                            <div class="">
                                <input id="email" type="email" placeholder="Email:" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group ">
                            {{-- <label for="email_confirmation" class="col-md-4 col-form-label text-md-right">Confirm Email_confirmation</label> --}}

                            <div class="">
                                <input id="email_confirmation" placeholder="Confirm Email:"  type="email" class="form-control {{ $errors->has('email_confirmation') ? ' is-invalid' : '' }}" name="email_confirmation" value="{{ old('email_confirmation') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            {{-- <label for="firstname" class="col-md-4 col-form-label text-md-right">FirstName</label> --}}

                            <div class="">
                                <input id="firstname" placeholder="Firstname:" type="text" class="form-control {{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" value="{{ old('firstname') }}" required autofocus>

                                @if ($errors->has('firstname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group ">
                            {{-- <label for="surname" class="col-md-4 col-form-label text-md-right">SurName</label> --}}

                            <div class="">
                                <input id="surname" type="text" placeholder="Surname:" class="form-control {{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ old('surname') }}" required autofocus>

                                @if ($errors->has('surname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group ">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                            <div class="">
                                <input id="password" placeholder="Password:" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <div class="passwordStrength ml-2  pr-4 text-danger">Your password should have a mixture of numbers, letters (uppercase and lowercase) with a special character.</div>
                            </div>
                        </div>

                        <div class="form-group ">
                            {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Retype Password</label> --}}

                            <div class="">
                                <input id="password-confirm" placeholder="Retype Password:" type="password" class="form-control" name="password_confirmation" required>
                                <div class="ml-2 pr-4 text-danger" id="confirm_error"></div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                            <div class="col-md-6 pull-center">
                                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.sitekey') }}"></div>
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group my-3 text-center bold">
                            <label for="">
                                <input type="checkbox" name="policy" required id="" class="mr-3 bs-none form-check-input check-register" >
                                <span class="mr-2">I accept the <a href="http://www.mygaphub.com/index.php/terms-conditions/" target="_blank" class="txt-primary">Terms & Conditions </a> and <a href="http://www.mygaphub.com/index.php/privacy-policy/" target="_blank" class="txt-primary">Privacy Policy</a></span>
                            </label>
                        </div>
                        {{-- <div class="form-group  mb-0">
                            <div class=" text-right mt-1">
                                <button type="submit" class="btn px-2 btn-pry "> Create Account </button>
                                <span class="ml-2 bold">
                                    Already have an account? <a href="{{ route('login') }}" class="txt-primary">Log in here </a>
                                </span>
                            </div>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function(){
        let passwordVal = document.getElementById('password'),
            confirmPass = document.getElementById('password-confirm'),
            validForm = false,
            form = document.getElementById('registration_form');
        let confirm_error = document.getElementById('confirm_error');

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


            let valide = document.getElementsByClassName('passwordStrength')[0];

            if(passwordVal.value.length == 0 || !passwordVal.value){
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
                return this.validForm = true;
            }
            return this.validForm = false;
        }

        passwordVal.addEventListener('input',  ()=>{ valPassword() } );

        confirmPass.addEventListener('input',  () => {
            if(password.value == confirmPass.value){
                this.validForm = true;
                confirm_error.innerHTML = '';
            }else{
                confirm_error.innerHTML = "The password confirmation does not match.";
                this.validForm = false;
            }
        });

        form.addEventListener('submit', (e)=> {
            e.preventDefault();
            if(this.validForm){
                form.submit();
            }
            return this.validForm;
        });

    });

</script>


@endsection
