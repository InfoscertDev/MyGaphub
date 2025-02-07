@extends('email.layout')

@section('email_body')
<div>
        <p>
        <span style="font-size: 18px;font-weight: bold;">User:</span>
        <span>{{$user?->firstname ?? $user?->name}} {{$user?->surname}}</span>
        <span>{{$user?->email}}</span>
        </p>
        <p>
        <span style="font-size: 18px;font-weight: bold;">Subject:</span>
        <span class="h5">  {{$feedback?->subject}}</span>
    </p>
    <p>
        <span style="font-size: 18px;font-weight: bold;">Message:</span> <br>
        {{$feedback?->message}}
    </p>
</div>
@endsection
