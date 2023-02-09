@extends('layouts.user')
@section('content')
    <div class="">
      <div class="wd-f hg-f py-4 bg-white">
        <div class="gap-center-sm bg-light card">
            <div class="gap-header form-reg"> 
                <h3 class="mt-2 bold mx-2 sm-fs-18"><b>Add new Reminder</b></h3>
                <span class="line-step" style="width: 45%"></span>
                {{-- <span class="line-step2"></span> --}}
            </div>  
            <div class="gap-body new-reminder"> 
                <div class="card-body">
                    <form class="form-reg" method="POST" action="{{ route('reminder.store') }}">
                        @csrf

                        <div class="form-group">

                            <div class="">
                                <input id="reminder" placeholder="Item name e.g License Renewal" type="text" class="form-control{{ $errors->has('reminder') ? ' is-invalid' : '' }}" name="reminder" value="{{ old('reminder') }}" required autofocus>

                                @if ($errors->has('reminder'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('reminder') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- <div class="form-group row"> </div> --}}

                        <div class="form-group row  sm-center"> 
                            <div class="col sm-px-1">
                                <select name="day" id="day" placeholder="Day:" class="form-control {{ $errors->has('day') ? ' is-invalid' : '' }}" value="{{ old('day') }}" required autofocus>
                                <option value="">Day</option>
                                @foreach ($days as $day)
                                    @if (old('day') == $day)
                                        <option value="{{$day}}" selected>{{$day}}</option>
                                    @else
                                        <option value="{{$day}}">{{$day}}</option>
                                    @endif
                                @endforeach
                                </select>
                                @if ($errors->has('day'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('day') }}</strong>
                                    </span>
                                @endif 
                            </div>
                            <div class="col sm-px-1">
                                <select name="month" id="month" placeholder="Month:" class="form-control {{ $errors->has('month') ? ' is-invalid' : '' }}"  value="{{ old('month') }}" required autofocus>
                                    <option value="">Month</option>
                                    @foreach ($months as $key => $month)
                                        @if (old('month') == $key)
                                            <option value="{{$key}}" selected>{{$month}}</option>
                                        @else
                                            <option value="{{$key}}">{{$month}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col sm-px-1">
                                <select name="year" id="year" placeholder="Month:" class="form-control {{ $errors->has('month') ? ' is-invalid' : '' }}"  value="{{ old('month') }}" required autofocus>
                                    <option value="">Year</option>
                                    @foreach ($years as $year)
                                        @if (old('year') == $year)
                                            <option value="{{$year}}" selected>{{$year}}</option>
                                        @else
                                            <option value="{{$year}}">{{$year}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="col-3"></div> --}}
                            @if ($errors->has('date'))
                               <p class="col-12">   <strong class="pl-4 text-danger text-right">{{ $errors->first('date') }}</strong></p>
                            @endif 
                            {{-- <label for="amount" class="col-md-4 col-form-label text-md-right">amount</label> --}}
                            <div class="col-12 mt-2">
                               <label for="" class="amount-currency">{{ $currency }}</label>
                               <input type="number" id="amount"  step="0.01"  placeholder="Amount:" style="padding-left: 2rem;" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount" value="{{ old('amount') }}" required autofocus>
                              @if ($errors->has('amount'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('amount') }}</strong>
                                  </span>
                              @endif
                            </div>
                        </div> 
                        
                        <div class="form-group ">
                            <div class="">
                            <textarea name="note" id="note" placeholder="Note:" cols="30" rows="5" class="form-control">{{old('note')}}</textarea>
                                @if ($errors->has('note'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('note') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- <div class="ml-2 mb-0 sm-px-1"> 
                            <label for="">Alert</label>
                        </div> -->
                        <div class="form-inline row mb-2 mx-0 ml-3">
                            <span class="small bold">Days to Due Date:</span>
                            <div class="col-4 sm-px-1">
                                <select name="alert_day" id="alert_day" placeholder="Day:" class="form-control form-control-sm {{ $errors->has('alert_day') ? ' is-invalid' : '' }}" value="{{ old('alert_day') }}">
                                    @foreach ($alert_days as $day)
                                        @if (old('alert_day') == $day)
                                            <option value="{{$day}}" selected>{{$day}} {{ ($day > 1 )? 'days' : 'day' }} </option>
                                        @else
                                            <option value="{{$day}}">{{$day}} {{ ($day > 1 )? 'days' : 'day' }}</option>
                                        @endif 
                                    @endforeach
                                </select>
                                @if ($errors->has('alert_day'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('alert_day') }}</strong>
                                    </span>
                                @endif 
                            </div>

                            <div class="col-12 text-right">
                                @if ($errors->has('alert'))
                                    <strong class="pl-4 text-danger">{{ $errors->first('alert') }}</strong>
                                @endif 
                            </div>
                        </div>
                        <div class="form-inline row mb-2 mx-0 ml-3 sm-fs-12">
                            <label for="" class="bold small mr-4">Mode:</label>
                            <label for="" class="mr-3">
                                <input type="checkbox"  value="email" class="form-control-sm mr-1 bs-none" name="email" id=""> Email
                            </label>
                            <label for="" class="mr-3"> 
                                <input type="checkbox"  value="sms"  class="form-control-sm mr-1 bs-none" name="sms" id=""> SMS
                            </label>
                            <label for="" class="mr-3">
                                <input type="checkbox" value="push" class="form-control-sm mr-1 bs-none" name="push" id=""> Push Notification
                            </label>
                        </div>
                        <div class="form-group  mb-0">
                            <div class="text-center mt-1">
                                <button type="submit" class="btn btn-block-sm px-4 btn-pry ">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        @include('user.reminders.footer')
    </div>
    </div>
@endsection

{{-- <div class="col sm-px-1">
    <select name="alert_month" id="alert_month" placeholder="Month:" class="form-control {{ $errors->has('alert_month') ? ' is-invalid' : '' }}"  value="{{ old('alert_month') }}">
        <option value="">Month</option>
        @foreach ($months as $key => $month)
            @if (old('alert_month') == $key)
                <option value="{{$key}}" selected>{{$month}}</option>
            @else
                <option value="{{$key}}">{{$month}}</option>
            @endif
        @endforeach
    </select>
</div>
<div class="col sm-px-1">
    <select name="alert_year" id="alert_year" placeholder="Year:" class="form-control {{ $errors->has('alert_year') ? ' is-invalid' : '' }}"  value="{{ old('alert_year') }}">
    <option value="">Year</option>
    @foreach ($years as $year)
        @if (old('alert_year') == $year)
            <option value="{{$year}}" selected>{{$year}}</option>
        @else
            <option value="{{$year}}">{{$year}}</option>
        @endif
    @endforeach
    </select>
</div>  --}}