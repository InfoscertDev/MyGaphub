@extends('layouts.user')
@section('content')
    <div class="wd-f bg-white py-3">
       <div class="wd-f">
            @include('inc.reap-banner')
           <div class="row mt-3 mx-3 sm-wdf sm-mt3">
               <div class="col-md-6 col-xs-12">
                   <div class="reap-asset">
                       <div class="list-img">
                            <a href="{{ route('user.reap-opportunity',[$asset,'property'=> 'REAP US']) }}" class="card-link text-white">
                                <img src="{{ asset('/assets/images/pedxasgbaunihagtdestaqer.png') }}" alt=" " class="img img-responsive">
                            </a>
                       </div>
                       <div class="list-body">
                           <div class="col-md-6">
                               <div class="">
                                   <h2>REAP US</h2>
                                   <h5 class="sm-fs-14">Multiple Cities</h5>
                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="">
                                   <h5 class="sm-fs-14">Various Vendors</h5>
                                   <h5 class="sm-fs-14">Up to 20% Return</h5>
                                   <h5 class="sm-fs-14">Invest from 30,000</h5>
                               </div>
                           </div>
                       </div>
                       <div class="text-center mt-2 mb-3">
                        <a href="{{ route('user.reap-opportunity',[$asset,'property'=> 'REAP US']) }}" class="card-link text-white"><button class="btn btn-pry btn-sm px-4"> Visit</button></a>
                       </div>
                   </div>
               </div>  
               <div class="col-md-6 col-xs-12">
                   <div class="reap-asset">
                       <div class="list-img">
                            <a href="{{ route('user.reap-opportunity',[$asset,'property'=> 'REAP UK']) }}" class="card-link text-white">
                                <img src="{{ asset('/assets/images/pexadxunitedshlkingdombsf.png') }}" alt=" " class="img img-responsive">
                            </a>
                       </div>
                       <div class="list-body">
                           <div class="col-md-6">
                               <div class="">
                                   <h2>REAP UK</h2>
                                   <h5 class="sm-fs-14">Multiple Cities</h5>
                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="">
                                   <h5 class="sm-fs-14">Various Vendors</h5>
                                   <h5 class="sm-fs-14">Up to 20% Return</h5>
                                   <h5 class="sm-fs-14">Invest from 30,000</h5>
                               </div>
                           </div>
                       </div>
                       <div class="text-center mt-2 mb-3">
                           <button class="btn btn-pry btn-sm px-4"> <a href="{{ route('user.reap-opportunity',[$asset,'property'=> 'REAP UK']) }}" class="card-link text-white">Visit</a></button>
                       </div>
                   </div>
               </div>
               <div class="col-md-6 col-xs-12">
   
                   <div class="reap-asset">
                       <div class="list-img">
                            <a href="{{ route('user.reap-opportunity',[$asset,'property'=> 'REAP Nigeria']) }}" class="card-link text-white">
                                <img src="{{ asset('/assets/images/150803133113-atygzftyshgvghzvgxv9.jpg') }}" alt=" " class="img img-responsive">
                            </a>                            
                       </div>
                       <div class="list-body">
                           <div class="col-md-6">
                               <div class="">
                                   <h2>REAP Nigeria</h2>
                                   <h5 class="sm-fs-14">Multiple Cities</h5>
                               </div> 
                           </div>
                           <div class="col-md-6">
                               <div class="">
                                   <h5 class="sm-fs-14">Various Vendors</h5>
                                   <h5 class="sm-fs-14">Up to 20% Return</h5>
                                   <h5 class="sm-fs-14">Invest from 30,000</h5>
                               </div>
                           </div>
                       </div>
                       <div class="text-center mt-2 mb-3">
                        <a href="{{ route('user.reap-opportunity',[$asset,'property'=> 'REAP Nigeria']) }}" class="card-link text-white"><button class="btn btn-pry btn-sm px-4">Visit</button></a>
                       </div>
                   </div>
               </div>
           </div>
       </div>
    </div> 
@endsection 