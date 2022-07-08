@extends('email.layout')

@section('email_body')
<div> 
        <p> 
            <span style="font-size: 16px;font-weight: 500;">Name:</span>
            <span>{{$reap_interest->name}} </span>
        </p>
        <p> 
            <span style="font-size: 16px;font-weight: 500;">Email:</span>
            <span>{{$reap_interest->email}}</span>
        </p>
        <p> 
            <span style="font-size: 16px;font-weight: 500;">Mobile Number:</span>
            <span>{{$reap_interest->mobile}}</span>
        </p>
        <p> 
            <span style="font-size: 16px;font-weight: 500;">Subject:</span>
            <span>{{$reap_interest->subject}}</span>
        </p>
        <p>   
            <span style="font-size: 16px;font-weight: 500;">Message:</span>
            <span>{{$reap_interest->message}}</span>
        </p>
</div>  
@endsection 