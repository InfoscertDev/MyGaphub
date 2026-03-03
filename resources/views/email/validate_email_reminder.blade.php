@extends('email.layout')

@section('email_body')
<style>
.button{

}
</style>
<div>
    <p>Hi {{$user->firstname}}</p>

    <p>Your account has not been validated. To enjoy more benefits of MyGAPhub, please validate your account below: </p>

    <div style="margin: 0 auto; text-align: center">
        <a href="{{ route('email.reminder', ['email' => $user->email]) }}" class="button" style="background: #ED3237; border: none;
                    color: white;padding: 8px 24px;
                    border-radius: 10px;
                    text-align: center; text-decoration: none;
                    display: inline-block;font-size: 15px;"
            >Send Verification</a>
    </div>

    <p>If you have any further questions or need assistance please contact us at <a href="mailto:gaphubteam@mygaphub.com">gaphubteam@mygaphub.com</a> </p>

    <p>We wish you the very best on your financial journey, </p>

    <p>The GAPhub Team</p>
</div>
@endsection
@section('email_complimentary_close')
<div style="text-align: center;">
   <p style="text-align: center;">  <br>
       <small style="text-align: center;">
           MyGAPhub© is the digital product of PRISM Financial Technology Limited, a Fintech company registered in England & Wales with registration no. 12837226 and registered office at 20-22 Wenlock Road, London, England, N1 7GU.
           Our <a href="https://www.mygaphub.com/index.php/terms-conditions/">terms and conditions </a> apply.
       </small>
   </p>
   <p style="text-align: center;">   <br>
       <small style="text-align: center;">
           This email and any files transmitted with it are confidential and intended solely for the use of the individual or entity to whom they are addressed. If you have received this email in error, please notify the system manager.
           This message contains confidential information and is intended only for the individual named. If you are not the named addressee, you should not disseminate, distribute or copy this email. Please notify the sender immediately
           by email if you have received this email by mistake and delete this email from your system. If you are not the intended recipient, you are notified that disclosing, copying, distributing or taking any action in reliance on the
           contents of this information is strictly prohibited.
       </small>
   </p>
</div>
@endsection
