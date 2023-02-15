@extends('layouts.user')
@section('content')
    <div class="wd-f bg-white py-3">
        <div class="elevation-3 m-2 b-rad-20">
            <div class="gap-center-bg pt-2">
                <div class="b-rad-20 mt-1 cal-head hd-opt" id="authhead">
                    <div class="b-rad-20 overlay2">
                        <div class="disclaim text-center">
                            <h1 class="list-opt">Acquisition Opportunities</h1>
                            <select name="opportunities" class="select-opportunity mt-2" id="" class="mt-2">
                                <option value="" disabled>Business  Asset</option>
                                <option value="" disabled>Risk Asset</option>
                                <option value="" selected>Appreciating Asset</option>
                                <option value="" disabled>Intellectual  Asset</option>
                                <option value="" disabled>Depreciating  Asset</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gap-lists ml-0">
                <div class="asset-list asset-opt">
                    <div class="list-img img-right img-opt">
                        <img src="{{ isset($acquisition[0]) && isset($acquisition[0]->photo)  ? $acquisition[0]->photo : asset('/assets/images/photomix-coyarsgz76866any101808.png') }}" alt=" " class="img img-responsive">
                    </div>
                    <div class="list-body">
                        <h5 class="list-subtitle bold">Category:</h5>
                        <h4 class="list-explore bg-bot-4">{{ isset($acquisition[0]) ? $acquisition[0]->fullname : 'Real Estate Asset Program (REAP)'}}</h4>
                        <h5 class="">
                            <span class="bold">Country: </span> {{ isset($acquisition[0]) ? $acquisition[0]->country : 'Multiple' }}
                        </h5>
                        <h5 class="">
                            <span class="bold mr-1">Minimum Capital: </span> {{ isset($acquisition[0]) ? $acquisition[0]->capital : '£10,000.00' }}
                        </h5>
                        <h5 class="">
                            <span class="bold">ROI: </span> {{ isset($acquisition[0]) ? $acquisition[0]->roi : 'Up to 20%' }}
                        </h5>
                        <div class="text-right mt-2">
                            <a href="{{ route('user.reap-opportunity', $asset) }}" class="card-link text-white"><button class="btn btn-pry px-4"> Explore</button></a>
                        </div>
                    </div>
                </div>
                <div class="asset-list asset-opt">
                    <div class="list-img img-right img-opt">
                        <img src="{{ isset($acquisition[1]) && isset($acquisition[1]->photo) ? $acquisition[1]->photo : asset('/assets/images/piawsgxshsgsxszazxabay163752.png') }}" alt=" " class="img img-responsive">
                    </div>
                    <div class="list-body">
                        <h5 class="list-subtitle bold">Category:</h5>
                        <h4 class="list-explore bg-bot-4">{{ isset($acquisition[1]) ? $acquisition[1]->fullname : 'Green Asset National Product (GANP)' }}</h4>
                        <h5 class="">
                            <span class="bold">Country: </span> {{ isset($acquisition[1]) ? $acquisition[1]->country : 'Multiple' }}
                        </h5>
                        <h5 class="">
                            <span class="bold mr-1">Minimum Capital: </span> {{ isset($acquisition[1]) ? $acquisition[1]->capital : '£500.00' }}
                        </h5>
                        <h5 class="">
                            <span class="bold">ROI: </span> {{ isset($acquisition[1]) ? $acquisition[1]->roi : 'Up to 30%' }}
                        </h5>
                        <div class="text-right mt-2">
                            <a href="{{ route('user.ganp-opportunity', $asset) }}" class="card-link text-white"><button class="btn btn-pry px-4" > Explore</button></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
