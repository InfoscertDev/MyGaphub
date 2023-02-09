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
        @if($asset->investment)
            <p>
                <span style="font-size: 16px;font-weight: 500;">Asset Price:</span>
                <span class="h5">  {{$asset->currency}}{{ number_format($asset->investment->sale_price,2) }}</span>
            </p>
        @endif
         @if($asset->category)
            <p>
                <span style="font-size: 16px;font-weight: 500;">Asset Property:</span> <br>
                {{ $asset->category->name }}
            </p>
        @endif
        <p>
            <span style="font-size: 16px;font-weight: 500;">Asset Description:</span> <br>
            {{$asset->description}}
        </p>
</div>  
@endsection 