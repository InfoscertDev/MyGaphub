@extends('layouts.user')
@section('content')

 @if ($reminder)
 <div class="">
   <div class="wd-f hg-f py-4 bg-white">
     <div class="gap-center-sm bg-light card">
         <div class="gap-header form-reg"> 
             <h3 class="mt-2 bold mx-2 sm-fs-18"><b>Update Reminder</b></h3>
             <span class="line-step" style="width: 35%"></span>
             {{-- <span class="line-step2"></span> --}}
         </div>   
         <div class="gap-body new-reminder"> 
             <div class="card-body">
                 <form class="form-reg" method="POST" action="{{ route('reminder.update', $reminder->id) }}">
                     @csrf

                     @method('PUT')
                     <div class="form-group">

                         <div class="">
                             <input id="reminder" placeholder="Item name e.g License Renewal" type="text" class="form-control{{ $errors->has('reminder') ? ' is-invalid' : '' }}" name="reminder" value="{{$reminder->name}}" required autofocus>

                             @if ($errors->has('reminder'))
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $errors->first('reminder') }}</strong>
                                 </span>
                             @endif
                         </div>
                     </div>
                     {{-- <div class="form-group row"> </div> --}}
                     <div class="form-group row sm-center"> 
                         <div class="col sm-px-1">
                             <select name="day" id="day" placeholder="Day:" class="form-control {{ $errors->has('day') ? ' is-invalid' : '' }}" value="{{$date[2]}}" required autofocus>
                             <option value="">Day</option>
                                @foreach ($days as $day)
                                    @if ($date[2] == $day)
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
                             <select name="month" id="month" placeholder="Month:" class="form-control {{ $errors->has('month') ? ' is-invalid' : '' }}"  value="{{$date[1]}}" required autofocus>
                                 <option value="">Month</option>
                                 @foreach ($months as $key => $month)
                                    @if ($date[1] == $key)
                                        <option value="{{$key}}" selected>{{$month}}</option>
                                    @else
                                        <option value="{{$key}}">{{$month}}</option>
                                    @endif
                                 @endforeach
                             </select>
                         </div>
                         <div class="col sm-px-1">
                             <select name="year" id="year" placeholder="Month:" class="form-control {{ $errors->has('month') ? ' is-invalid' : '' }}"  value="{{$date[0]}}" required autofocus>
                             <option value="">Year</option>
                                @foreach ($years as $year)
                                    @if ($date[0] == $year)
                                        <option value="{{$year}}" selected>{{$year}}</option>
                                    @else
                                        <option value="{{$year}}">{{$year}}</option>
                                    @endif
                                @endforeach
                             </select>
                         </div>
                         {{-- <div class="col"></div> --}}
                         @if ($errors->has('date'))
                            <p class="col-12">
                                <strong class="pl-4 text-danger text-right">{{ $errors->first('date') }}</strong>
                            </p>
                         @endif 
                       <br>
                         {{-- <label for="amount" class="col-md-4 col-form-label text-md-right">amount</label> --}}
                         <div class="col-12 mt-2 ">
                            <label for="" class="amount-currency">{{ $currency }}</label>
                           <input id="amount" step="0.01" type="number" placeholder="Amount:" class="pl-4 form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount" value="{{$reminder->amount}}" required autofocus>
                           @if ($errors->has('amount'))
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $errors->first('amount') }}</strong>
                               </span>
                           @endif
                         </div>
                     </div>
                     
                     <div class="form-group ">
                         <div class="">
                         <textarea name="note" id="note" placeholder="Note:" cols="30" rows="5" class="form-control">{{$reminder->note}}</textarea>
                             @if ($errors->has('note'))
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $errors->first('note') }}</strong>
                                 </span>
                             @endif
                         </div>
                     </div>

                     {{-- <div class="form-group row  mt-2">
                         <div class="col-12 d-flex ml-3">
                             <div class="col sm-px-1 text-right">
                                 <label class="alert">Alert</label>     
                             </div>
                             <div class="col sm-px-1">
                                 <select name="alert_day" id="alert_day" placeholder="Day:" class="form-control {{ $errors->has('alert_day') ? ' is-invalid' : '' }}">
                                 <option value="">Day</option>
                                 @foreach ($days as $day)
                                    @if ($alert[2] == $day)
                                        <option value="{{$day}}" selected>{{$day}}</option>
                                    @else
                                        <option value="{{$day}}">{{$day}}</option>
                                    @endif
                                 @endforeach
                                 </select>
                                 @if ($errors->has('alert_day'))
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $errors->first('alert_day') }}</strong>
                                     </span>
                                 @endif 
                             </div>
                             <div class="col sm-px-1">
                                 <select name="alert_month" id="alert_month" placeholder="Month:" class="form-control {{ $errors->has('alert_month') ? ' is-invalid' : '' }}">
                                     <option value="">Month</option>
                                     @foreach ($months as $key => $month)
                                        @if ($alert[1] == $key)
                                            <option value="{{$key}}" selected>{{$month}}</option>
                                        @else
                                            <option value="{{$key}}">{{$month}}</option>
                                        @endif
                                     @endforeach
                                 </select>
                             </div>
                             <div class="col sm-no-pad text-left">
                                 <select name="alert_year" id="alert_year" placeholder="Year:" class="form-control {{ $errors->has('alert_year') ? ' is-invalid' : '' }}" >
                                 <option value="">Year</option>
                                 @foreach ($years as $year)
                                    @if ($alert[0] == $year)
                                        <option value="{{$year}}" selected>{{$year}}</option>
                                    @else
                                        <option value="{{$year}}">{{$year}}</option>
                                    @endif
                                 @endforeach
                                 </select>
                             </div> 
                         </div>
                         <div class="col-12 text-right">
                             @if ($errors->has('alert'))
                                 <strong class="pl-4 text-danger">{{ $errors->first('alert') }}</strong>
                             @endif 
                         </div>
                     </div> --}}
                     <!-- <div class="ml-2 mb-0 sm-px-1"> 
                        <label for="">Alert</label>
                    </div> -->
                    <div class="form-inline row mb-2 mx-0 ml-3">
                        <span class="small bold">Days to Due Date:</span>
                        <div class="col-4 sm-px-1">
                            <select name="alert_day" id="alert_day" placeholder="Day:" class="form-control form-control-sm {{ $errors->has('alert_day') ? ' is-invalid' : '' }}" value="{{ $reminder->due }}">
                                @foreach ($alert_days as $day)
                                    @if ( $reminder->due == $day)
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
                            <input type="checkbox" {{($reminder->email) ? 'checked' : ''}}  value="email" class="form-control-sm bs-none mr-1" name="email" id=""> Email
                        </label>
                        <label for="" class="mr-3"> 
                            <input type="checkbox"  {{($reminder->sms) ? 'checked' : ''}} value="sms"  class="form-control-sm bs-none mr-1" name="sms" id=""> SMS
                        </label>
                        <label for="" class="mr-3">
                            <input type="checkbox" {{($reminder->push) ? 'checked' : ''}} value="push" class="form-control-sm bs-none mr-1" name="push" id=""> Push Notification
                        </label>
                    </div>
                     <div class="form-group  mb-0">
                         @if ($reminder->complete == 0)
                            <div class="text-center mt-1">
                                <button type="submit" class="btn btn-block-sm px-4 btn-pry ">
                                    Save
                                </button>
                            </div>
                         @endif
                     </div>
                 </form> 
             </div>
         </div>

     </div>
     @include('user.reminders.footer')
     </div>
 </div>
 @endif
@endsection