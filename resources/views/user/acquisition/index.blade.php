@extends('layouts.user')
@section('content')
    <div class="wd-f bg-white py-4">
        <div class="elevation-3 m-2 b-rad-20">
            <div class="gap-center-sm pt-2 text-center"> 
                <h2 class="gap-title">Asset Acquisition</h2>
                <h4 class="gap-subtitle fs-14">the only path that leads to financial independence. </h4>
            </div> 

            <div class="gap-lists  ml-0"> 
                <div class="asset-list">
                    <div class="list-img img-right">
                        <img src="{{ isset($acquisition[0]) ? $acquisition[0]->photo : asset('/assets/images/wuuquywhqe-12835412.png')  }}" alt=" " class="img img-responsive">
                    </div>
                    <div class="list-body"> 
                        <h4 class="list-title">{{ isset($acquisition[0]) ? $acquisition[0]->fullname : 'Business Asset'}} </h4>
                        <p class="list-intro pr-2">{{isset($acquisition[0]) ? $acquisition[0]->description : 'Buy an existing business currently generating revenue'}} </p>
                        <div class="list-actions pr-2">
                            <button type="button" class="btn btn-pry"> <a href="{{ Route('user.actionplan', ['act'=> 'business', 'ot' => rand(10000, 99999)]) }}" class="card-link text-white">Action Plan</a> </button>
                            <button type="button" class="btn btn-pry"> <a href="{{ route('user.opportunity', 'business') }}" class="card-link text-white">Opportunities </a> </button>
                        </div>
                    </div>
                </div> 
                <div class="asset-list">
                    <div class="list-img img-right">
                        <img src="{{ isset($acquisition[1]) ? $acquisition[1]->photo : asset('/assets/images/hq7uswer52.png')  }}" alt=" " class="img img-responsive">
                    </div>
                    <div class="list-body"> 
                        <h4 class="list-title">{{ isset($acquisition[1]) ? $acquisition[1]->fullname : 'Risk Asset'}} </h4>
                        <p class="list-intro pr-2">{{isset($acquisition[1]) ? $acquisition[1]->description : 'Explore the world of stocks and share. Many retirement plans in the world today are based on this vehicle.'}} </p>
                        <div class="list-actions pr-2">
                            <button type="button" class="btn btn-pry"> <a href="{{ Route('user.actionplan', ['act'=> 'risk', 'ot' => rand(10000, 99999)]) }}" class="card-link text-white">Action Plan</a></button>
                            <button type="button" class="btn btn-pry"> <a href="{{ route('user.opportunity', 'risk') }}" class="card-link text-white">Opportunities</a> </button>
                        </div>
                    </div>
                </div>
                <div class="asset-list">
                    <div class="list-img img-right">
                        <img src="{{ isset($acquisition[2]) ? $acquisition[2]->photo : asset('/assets/images/7w22164504.png')  }}" alt=" " class="img img-responsive">
                    </div>
                    <div class="list-body">
                        <h4 class="list-title">{{ isset($acquisition[2]) ? $acquisition[2]->fullname : 'Appreciating Asset'}} </h4>
                        <p class="list-intro pr-2">{{isset($acquisition[2]) ? $acquisition[2]->description : 'Both Architecture and Agriculture rely on land to presents their solutions. You can profit from either.'}} </p>
                        <div class="list-actions pr-2">
                            <button type="button" class="btn btn-pry"> <a href="{{ Route('user.actionplan', ['act'=> 'appreciate', 'ot' => rand(10000, 99999)]) }}" class="card-link text-white">Action Plan</a></button>
                            <button type="button" class="btn btn-pry"> <a href="{{ route('user.opportunity', 'appreciating') }}" class="card-link text-white">Opportunities</a> </button>
                        </div>
                    </div>
                </div>
                <div class="asset-list">
                    <div class="list-img img-right">
                        <img src="{{ isset($acquisition[3]) ? $acquisition[3]->photo : asset('/assets/images/uhafhgwhe-19677.png')  }}" alt=" " class="img img-responsive">
                    </div>
                    <div class="list-body">
                        <h4 class="list-title">{{ isset($acquisition[3]) ? $acquisition[3]->fullname : 'Intellectual Asset'}} </h4>
                        <p class="list-intro pr-2">{{isset($acquisition[3]) ? $acquisition[3]->description : 'The most valuable asset in the world is the human brain. Take advantage of this opportunity'}} </p>
                        <div class="list-actions pr-2">
                            <button type="button" class="btn btn-pry"> <a href="{{ Route('user.actionplan', ['act'=> 'intellect', 'ot' => rand(10000, 99999)]) }}" class="card-link text-white">Action Plan</a></button>
                            <button type="button" class="btn btn-pry"> <a href="{{ route('user.opportunity', 'intellectual') }}" class="card-link text-white">Opportunities </a></button>
                        </div>
                    </div>
                </div>
                <div class="asset-list">
                    <div class="list-img img-right">
                        <img src="{{ isset($acquisition[4]) ? $acquisition[4]->photo : asset('/assets/images/ghabsnnd-157520.png')  }}" alt=" " class="img img-responsive">
                        <!-- <img src="{{ asset('/assets/images/ghabsnnd-157520.png') }}" alt=" " class="img img-responsive"> -->
                    </div>
                    <div class="list-body">
                        <h4 class="list-title">{{ isset($acquisition[4]) ? $acquisition[4]->fullname : 'Depreciating Asset'}} </h4>
                        <p class="list-intro pr-2">{{isset($acquisition[4]) ? $acquisition[4]->description : 'The world’s most popular asset is cash but only when it is in a good savings account. Explore your options'}} </p>
                        <div class="list-actions pr-2">
                            <button type="button" class="btn btn-pry"> <a href="{{ Route('user.actionplan', ['act'=> 'depreciate', 'ot' => rand(10000, 99999)]) }}" class="card-link text-white">Action Plan</a></button>
                            <button type="button" class="btn btn-pry"> <a href="{{ route('user.opportunity', 'depreciating') }}" class="card-link text-white"> Opportunities </a> </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5 cal-head hd-acquire" id="authhead">
                <div class="overlay2">
                    <div class="disclaim text-center">
                        <p class="">DISCLAIMER: Our content is intended only for information purpose. It is important you 
                            conduct your own analysis before making any investment based on your own personal 
                            circumstances. You should take independent financial advice from an authorised 
                            professional. We are not a registered or authorised investment, legal or tax advisor firm. </p>  
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection 