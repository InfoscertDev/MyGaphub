@extends('layouts.user')
@section('content')
 
@include('inc.settings_menu')
<div class="">
    <div class="gap-card" style="min-height: 500px;">
        <div id="accordion">
            <div class="card bg-light">
              <div class="gap-card-header" id="headingOne">
                  <div class="wd-f mb-0">
                      <span class="gap-card-title accord-title">Account Protection </span>
                      <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseProtection" aria-expanded="true" aria-controls="collapseProtection">
                      <i class="fa fa-chevron-down"></i>
                      </button>  
                  </div>
              </div>
              <div id="collapseProtection" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body pb-1">
                     
                  </div>
              </div>

            </div>
            <div class="card bg-light">
                <div class="accord-header " id="headingSecure">
                    <div class="wd-f mb-0">
                        <span class="gap-card-title accord-title">Secure and Encrypted</span>
                        <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseSecure" aria-expanded="true" aria-controls="collapseSecure">
                        <i class="fa fa-chevron-down"></i>
                        </button> 
                    </div> 
                </div>
            
                <div id="collapseSecure" class="collapse show" aria-labelledby="headingSecure" data-parent="#accordion">
                    <div class="card-body accordion-body" style="height: 450px"> 
                        <p>The security of the data of MyGapHub users is our highest priority. GapHub uses state-of-the-art security measures including encryption and transport layer security when handling your information.</p>
                        <p>
                            Currently, we do not request statements from your financial institutions but rely on your inputs to present a comprehensive view of your asset portfolio.
                        </p>
                        <p>
                            However, to enhance your experience, we will be integrating with the open banking system to automate requests for your financial statements while using bank-level security and read only access to make those requests.
                        </p>
                        <p>
                            This is intended to protect your data and ensure your information is not compromised.
                        </p>
                        <p>This also means your login credentials are never stored on our servers, and we never have access to make any changes to your accounts.</p>
                        <p>We are aware of the sensitivity of your data so we do not, and we will not sell or share your data with anyone for any reason at any time.</p>
                        If you have enquiries or concerns, please get in touch with us at <a href="mailto:privacy@mygaphub.com">privacy@mygaphub.com</a>  
                    </div>
                </div>
            </div>
            <div class="card bg-light">
              <div class="gap-card-header" id="headingPassword">
                  <div class="wd-f mb-0">
                      <span class="gap-card-title accord-title">Change Password </span>
                      <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapsePassword" aria-expanded="true" aria-controls="collapsePassword">
                      <i class="fa fa-chevron-down"></i>
                      </button>  
                  </div>
              </div>
              <div id="collapsePassword" class="collapse" aria-labelledby="headingPassword" data-parent="#accordion">
                  <div class="card-body pb-1">
                      <div class="my-3 px-3 sm-auto ">
                          <h5 class="text-center mb-2">
                              Fill in the information below to change your password.
                            </h5>
                          <form action="{{route('change.password')}}" method="POST" id="change_password_form" class="form-reg">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="col-form-label bold">Current Password</label>
                                    <input id="current_password" placeholder="Current Password" type="password" min="6" class="form-control{{ $errors->has('current_password') ? ' is-invalid' : '' }}" name="current_password" required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-form-label bold">New Password</label>
                                    <input id="new_password" placeholder="New Password" type="password" min="6" class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}" name="new_password" required>
                                    @if ($errors->has('new_password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                    <div class="passwordStrength ml-2  pr-4 text-danger">Your password should have a mixture of numbers, letters (uppercase and lowercase) with a special character.</div>
                                </div> 
                                <div class="form-group">
                                    <label for="" class="col-form-label bold">Confirm New Password</label>
                                    <input id="confirm_password" placeholder="Confirm New Password" type="password" min="6" class="form-control{{ $errors->has('new_password_confirmation') ? ' is-invalid' : '' }}" name="new_password_confirmation" required>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="text-center my-2">
                                        <button type="submit" class="btn btn-block-sm btn-pry">Save </button>
                                    </div>
                                </div>
                          </form>
                      </div>
                  </div>
              </div>

            </div>
        </div>
    </div>
 </div>

 <script> 
    $(function(){
        let passwordVal = document.getElementById('new_password'),
            form = document.getElementById('change_password_form');

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


            let passwordVal = document.getElementById('new_password'),
                valide = document.getElementsByClassName('passwordStrength')[0];
           
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