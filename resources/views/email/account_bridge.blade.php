@extends('email.layout')

@section('email_body')
    <div> 
         <p>Hello</p>
         <p>There is an account bridge on the following user   </p>
         <p><b style="margin-right: 20px">Email</b>  {{$user->email}}</p>
         <p><b style="margin-right: 20px">Full Name</b>  {{$user->firstname}}  {{$user->surname}}</p>
    </div>
@endsection  