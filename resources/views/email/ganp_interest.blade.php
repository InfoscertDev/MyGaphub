@extends('email.layout')

@section('email_body')
<div> 
        <p> 
            <span style="font-size: 16px;font-weight: 500;">Name:</span>
            <span>{{$user->firstname}} {{$user->surname}}</span>
        </p> 
        <p> 
            <span style="font-size: 16px;font-weight: 500;">Email:</span>
            <span>{{$user->email}}</span>
        </p>
        <p> 
            <span style="font-size: 16px;font-weight: 500;">Mobile Number:</span>
            <span>{{$profile->phone}}</span>
        </p>
        <p>
            <span style="font-size: 16px;font-weight: 500;">Asset Name:</span>
            <span class="h5">  {{$asset->name}}</span>
        </p>
        <p>
            <span style="font-size: 16px;font-weight: 500;">Asset Per Units:</span>
            <span class="h5">  {{ explode(' ',$asset->currency)[0] }}{{ number_format($asset->amount, 2) }}</span>
        </p>
       
        <p>
            <span style="font-size: 16px;font-weight: 500;">Asset Total Unit:</span>
          
            <span class="h5">    {{ $asset->total_units }} units</span>
        </p>
        <p>
            <span style="font-size: 16px;font-weight: 500;">Asset Requested Unit:</span>
          
            <span class="h5">    {{ $units }} units</span>
        </p>
        @if($asset->country) 
            <p>
                <span style="font-size: 16px;font-weight: 500;">Country:</span>
                <span class="h5">  {{$asset->country->name}}</span>
            </p>
        @endif
        @if($asset->agency) 
            <p>
                <span style="font-size: 16px;font-weight: 500;">Agency:</span>
                <span class="h5">  {{$asset->agency->name}}</span>
            </p>
        @endif
</div>  
@endsection 