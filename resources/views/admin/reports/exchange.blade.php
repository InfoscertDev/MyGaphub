@extends('layouts.admin')
@section('content')
    @php
        $rates = json_decode($system_currencies->currencies);
        // $currencies = json_decode($system_currencies->currencies);
    @endphp
    <div class="container-fluid">
        <div class="pt-3">
            <div class="gap-center ">
                <div class="card">
                  <div class="card-header">
                      <h5 class="text-righ">  Email Configuration </h5>
                  </div>
                  <form action="{{ route('preference.email')}}" method="POST">
                        @csrf
                    <div class="row mx-0 m-3">
                            <div class="col-9">
                                <div class="form-group">
                                    <input type="email" name="preference_email" value="{{$configrations->exchange_email}}" placeholder="Input Email" class="form-control">
                                </div>
                            </div> 
                            <div class="col-3">
                            <button type="submit" class="btn btn-pry px-4">Save</button>
                            </div>
                        </div>
                    </form>
                  <div class="card-header">
                      <h5 class="text-righ">
                          Last Update:  
                          <small class="ml-1">{{$system_currencies->last_update}}</small>
                      </h5>
                  </div>
                  <div class="card-body">
                      <div class="row mb-2">
                          @foreach ($currencies as $key => $info)
                              @if ($info['currency'] != $currency)
                                  @php
                                      $flag = $info['flag'].'.png'; 
                                      $current = explode(" ",$info['currency'])[1]; 
                                      $rate = number_format(($rates->$current), 4); 
                                  @endphp 
                                  <div class="col-md-4 col-sm-6" style="max-width: 30%;  margin-bottom:10px;">
                                      <div class="card b-rad-20" style="height:150px; max-width: 200px;  cursor: pointer;">
                                          <img src='{{ asset("/assets/flags/$flag") }}' style="width: 50px;margin: 18px;"/>
                                          <div class="ml-3">
                                              <h5 class="">{{str_limit($rate,8)}} = {{explode(" ",$currency)[0]}}1.00 </h5>
                                              <h5 class="">{{$info['country']}}</h5>
                                          </div> 
                                      </div>
                                  </div>
                              @endif
                          @endforeach
                      </div> 
                  </div>
              </div>
          </div>
        </div>
    </div> 
@endsection