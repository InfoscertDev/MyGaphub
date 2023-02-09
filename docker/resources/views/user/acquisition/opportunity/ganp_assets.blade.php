@extends('layouts.user')
@section('content')
    <div class="wd-f bg-white py-3">
        <div class="gap-center-bl"> 
            @include('inc.ganp-banner')
            <div class="row mt-3 mx-3 sm-wdf sm-mt3">
                @foreach ($countries as $country)
                    <div class="col-md-6 col-xs-12 ">
                        <div class="reap-asset">
                            <div class="list-img">
                                <a href="{{ route('user.ganp-opportunity',[$asset,'country' => $country->id]) }}" class="card-link text-white">
                                    <img src="{{ url('http://prismcheck.com/releasea/ganp/public/'. str_replace('public', 'storage', $country->image)) }}" alt=" " class="img img-responsive">
                                </a>
                            </div>
                            <div class="list-body">
                                <div class="col-md-5">
                                    <div class="">
                                        <h5 class="sm-fs-14">Country</h5>
                                        <h2>{{ $country->name}}</h2>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="text-right mr-2"> 
                                        <h5 class="sm-fs-14">Minimum Capital: {{ $country->minimum }}</h5>
                                        <h5 class="sm-fs-14">ROI Up to {{ $country->roi }}</h5>
                                        <h5 class="sm-fs-14 bold">Currency: {{html_entity_decode($country->currency, ENT_COMPAT, 'UTF-8') }} ({{$country->shortname}}) </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-2 mb-3">
                                <a href="{{ route('user.ganp-opportunity',[$asset,'country' => $country->id]) }}" class="card-link text-white"><button class="btn btn-pry btn-sm px-5">Visit</button></a>
                            </div>
                        </div>
                    </div>  
                @endforeach
            </div>
        </div> 
    </div> 
@endsection 