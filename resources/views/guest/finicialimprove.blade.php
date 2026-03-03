@extends('layouts.guest')

@section('header')
  @include('inc.calculatorheader')
@endsection

@section('content')
    <div class="">
        <div class="wd-f  py-5">
            <div class="gap-center"> 
                <h3 class="text-center mb-1 bold">Improve your status</h3>
                <div class="wd-f py-1">
                    <form method="POST" id="calc-form"  action="{{ route('status.recommend') }}">
                        {{ csrf_field() }}
                        <div class="form-sheet sheet-plain">
                            <ul class="lists">
                                <li class="row mx-0">
                                    <div class="col-md-8">
                                        <label for="">Monthly Asset Portfolio Income (APi) needed</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="price-wrap">
                                        <input type="text" disabled value="{{$current}} {{ $cost }}" class="" name="cost" id="cost" required>
                                        </div> 
                                    </div>
                                </li>
                                <li class="row mx-0">
                                    <div class="col-md-8">
                                        <label for="">Your current monthly asset portfolio income</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="price-wrap">
                                            <input type="text" disabled value="{{$current}}{{ $income }}" class="" name="income" id="income" required>
                                        </div> 
                                    </div>
                                </li>
                                <li class="row mx-0">
                                    <div class="col-md-8"> 
                                        <label for="">How much can you set aside monthly for investments?</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="price-wrap"> 
                                            <label for="" class="price-currency">{{$current}} </label>
                                            <input type="number" step="any" onfocus="focalPoint(this)"  value="0" min="1" class="" name="invest" id="invest" required>
                                        </div> 
                                    </div>
                                </li>
                                <li class="row mx-0">
                                    <div class="col-md-8">
                                        <label for="" style="width: 110%">What is your expected Return on Capital Employed (ROCE)?  
                                            <span class="info"   data-toggle="tooltip" data-placement="left"  title="To help you achieve the monthly financial target, you will need to consider investments with adequate returns. 
                                            Choose a desired return on capital employed. 
                                            (Typical conventional rate of return, is between 3% to 10%).
                                            "><i class="fa fa-info mx-2" style="font-size: 11px;"></i></span>
                                            {{-- @if ($user)   --}}
                                            {{-- @endif --}}
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="price-wrap percentage">
                                            <input type="number" step="any" value="0" min="2"  onfocus="focalPoint(this)" max="100" class="percent" name="roce" id="roce" required>
                                            <span class="txt-percent">%</span>
                                        </div>  
                                    </div>
                                </li>
                                <div class="see-result mt-4" style="background: none;">
                                    <button class="btn btn-pry px-3" type="submit"> See Result </button>
                                </div>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </div>
         
    </div>
    <script>
        function getROCE(){
            // fetch('')
            // MAIL_USERNAME=dev.support@infoscertcom
            // MAIL_PASSWORD="qs&@cdq1P.$E"
        }
    </script>
@endsection

    