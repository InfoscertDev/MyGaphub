@extends('layouts.user')
@section('content')
    <div class="wd-f bg-white py-0">
        {{-- @include('inc.ganp-banner') --}}
        {{-- <div class="bg-gap-light b-rad-20">
            <div class="row my-4 wd-8 mx-auto">
                <div class="my-4 b-rad-20 mt-1 cal-head hd-country" style="background: url({{  url('http://www.gapassethub.com/public/'. str_replace('public', 'storage', $gcountry->image)) }}) no-repeat;  background-position: center;" id="authhead">
                    <div class="b-rad-20 overlay2" style="height: 110px !important;">
                        <div class="disclaim text-center">
                            <h2 class="list-explore">GANP
                                @if ($gcountry->name) <span>{{$gcountry->name}}</span> @endif
                            </h2>
                        </div>
                    </div>
                </div>
            </div> --}}

        <div class="d-flex">
            <span class="mr-3 pb-2" id="goback">
                <a href="#" class="text-dark" onclick="window.history.go(-1); return false;" ><i class="fa fa-chevron-left mr-1"></i> Back</a>
            </span>
        </div>
        @if (count($cultivations->data))
                <div class="row mt-1 mx-4">
                    @foreach ($cultivations->data as $plant)
                        <div class="col-md-6 col-xs-12">
                            <div class="reap-asset mx-2 elevation-3">
                                <div class="list-img">
                                    <a href="{{ route('user.single_ganp',[$plant->id, 'tresh' => rand(1000,9999) ]) }}" class="card-link text-white">
                                        <img src="{{ url('http://www.gapassethub.com/public/'. str_replace('public', 'storage', $plant->image1)) }}" alt=" " class="img img-responsive">
                                    </a>
                                </div>
                                <div class="list-body">
                                <div class="px-3 wd-f">
                                    <h4> {{ $plant->name}} </h4>
                                    <h6>  {{ $plant->agency->name}} </h6>
                                    <h6 class="d-block sm-fs-12">
                                        <span class="mr-1"> {{ $plant->rate}}% Return </span> <span> •  {{ $plant->months}} months</span>
                                            <span class="float-right px-3 py-1 bg-dark text-white sm-px-1">{{explode(' ', $plant->currency)[0] }}{{ number_format($plant->amount,2)}} per unit</span>
                                        </h6>
                                    </div>
                                </div>
                                <div class="text-center my-3">
                                    <!-- $asset, ($country)? $country : 0, -->
                                    <button class="btn btn-pry btn-sm px-4 py-1"> <a href="{{ route('user.single_ganp',[$plant->id, 'tresh' => rand(1000,9999) ]) }}" class="card-link text-white">Details</a></button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-block">
                    <div class="pull-right">
                        <ul class="pagination mr-5">

                            @if ( $cultivations->current_page - 1 && $cultivations->current_page  <=  $cultivations->last_page)
                                <li class="page-item">
                                    <a class="page-link" href="{{ route('user.ganp-opportunity', [$set, 'country' => $country, 'page' => $cultivations->current_page - 1]) }}">Previous</a>
                                </li>
                            @endif
                            @if ( $cultivations->current_page + 1  <=  $cultivations->last_page)
                                <li class="page-item active">
                                    <a class="page-link " href="{{ route('user.ganp-opportunity', [$set, 'country' => $country, 'page' => $cultivations->current_page + 1]) }}">Next</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            @else
                <div class="mx-auto text-center p-5">
                    <h4 class="nomatches p-5">
                        <strong >No GANP Asset yet.</strong>
                    </h4>
                </div>
            @endif
        </div>
    </div>
@endsection

