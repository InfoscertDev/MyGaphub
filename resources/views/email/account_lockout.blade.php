@extends('email.layout')

@section('email_body')
    <div> 
         <p>Dear {{$user->firstname}}</p>
         <p>You have made too many login attempts. </p>
         <p>Please try again in 3 minutes. </p>
    </div>
@endsection 