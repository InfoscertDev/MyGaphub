@extends('layouts.user')
@section('content')
 
@include('inc.settings_menu')
<div class="">
    <div class="gap-card">
      <div id="accordion">
          <div class="card bg-light">
              <div class="gap-card-header" id="headingOne">
                  <div class="wd-f mb-0">
                      <span class="gap-card-title accord-title">Base Currency : {{$currency}}</span>
                      <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      <i class="fa fa-chevron-down"></i>
                      </button>  
                  </div>
              </div> 
          
              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body pb-1">
                     
                  </div>
              </div>
          </div>
          <div class="card bg-light">
              <div class="accord-header " id="headingRate">
                  <div class="wd-f mb-0">
                      <span class="gap-card-title accord-title">Exchange Rate</span>
                      <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseRate" aria-expanded="true" aria-controls="collapseRate">
                      <i class="fa fa-chevron-down"></i>
                      </button> 
                  </div>
              </div>
          
              <div id="collapseRate" class="collapse show" aria-labelledby="headingRate" data-parent="#accordion">
                  <div class="card-body accordion-body">
                      @include('user.tools.rate')
                  </div>
              </div>
          </div>
          <div class="card bg-light">
              <div class="accord-header" id="headingMarket">
                  <div class="wd-f mb-0">
                      <span class="gap-card-title accord-title">Marketing Choices</span>
                      <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseMarket" aria-expanded="true" aria-controls="collapseMarket">
                      <i class="fa fa-chevron-down"></i>
                      </button> 
                  </div>
              </div>
          
              <div id="collapseMarket" class="collapse" aria-labelledby="headingMarket" data-parent="#accordion">
                  <div class="card-body pb-1">
                     
                  </div>
              </div>
          </div>
          <div class="card bg-light">
              <div class="accord-header last" id="headingContact">
                  <div class="wd-f mb-0">
                      <span class="gap-card-title accord-title">Contact Options</span>
                      <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseContact" aria-expanded="true" aria-controls="collapseContact">
                      <i class="fa fa-chevron-down"></i>
                      </button> 
                  </div>
              </div>
          
              <div id="collapseContact" class="collapse" aria-labelledby="headingContact" data-parent="#accordion">
                  <div class="card-body">
                     
                  </div>
              </div>
          </div>
      </div>
    </div>
 </div>
@endsection