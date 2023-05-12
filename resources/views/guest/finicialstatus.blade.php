@extends('layouts.guest')
@section('header')
    @include('inc.calculatorheader')
    <script>
        function downloadMail(){
            $("#normal").hide();
            $("#goback").hide();
            $("#sendmail").fadeIn(400);
        }
        function sendMail(){
            setTimeout(()=> {
                $("#emailSent").modal('show');
            }, 3000);
        }
    </script>
@endsection

@section('content')
    <link href="{{ asset('assets/css/radical.css') }}" rel="stylesheet">
    <div class="mx-auto">
        <div class="row m-0 mx-auto bg-white py-5">
            <div class="gap-center">
                <h3 class="fin-stat-text">Your  <span class="txt-primary">Financial Independence Status</span> Is:</h3>
            </div>
        </div>
        {{-- @php
            $timeper = 99; $timecolor = "#65B8E8";
            $currentper = 99; $percolor = "#65B8E8";
        @endphp --}}
        <div class="row m-0 mx-auto py-4">
            <div class="gap-center">
                <div class="fin-result row mx-0">
                    <div class="col-xs-12 col-md-6 mb-2">
                        <div class="text-center mx-auto">
                            {{-- <div class="cube-time time">
                                <span class="cube-bar">
                                    <img class="img img-responsive" src="{{ asset('/assets/images/hourglass.png')}}" alt="">
                                </span>
                                </div> --}}
                            <div class="radial-progress" data-progress="{{($timeper  < 100) ? $timeper : 100}}">
                                <div class="circle">
                                    <div class="{{($timeper > 98) ? 'taint' : ''}} mask full">
                                        <div class="fill" style="background: {{ $timecolor }} !important"></div>
                                    </div>
                                    <div class="{{($timeper > 98) ? 'taint' : ''}} mask half">
                                        <div class="fill" style="background: {{ $timecolor }} !important"></div>
                                        <div class="fill fix" style="background: {{ $timecolor }} !important"></div>
                                    </div>
                                    <div class="shadow"></div>
                                </div>
                                <div class="inset time">
                                    <img class="img img-responsive" src="{{ asset('/assets/images/hourglass.png')}}" alt="">
                                </div>
                            </div>
                            <div class="text-left mt-1 sm-center">
                                <span class="target"> <b>Current Status:</b>  {{ number_format($currenttime) }} Days</span>
                                <span class="target"> <b> Target:</b> 360 Days</span>

                                @if ((int)$currenttime > 1 && (int)$currenttime < 360)
                                    <p class="">
                                        <h6 class="mt-2 mb-1 wd-8 ln-h1 sm-center" >Your current rainy day savings can only last you {{ number_format($currenttime) }} days. Are you comfortable with this?</h6>
                                    </p>
                                @elseif ((int)$currenttime <= 1 )
                                    <p class="">
                                        <h6 class="mt-2 mb-1 wd-8 ln-h1 sm-center" >Your current rainy day savings is at {{ number_format($currenttime) }} days. This is a critical situation. You do not have any savings currently as a fall back plan incase you lose your job or income today. You should seriously consider speaking with one of our financial advisors.</h6>
                                    </p>
                                @elseif((int)$currenttime == 360)
                                    <p class="">
                                        <h6 class="mt-2 mb-1 wd-8 ln-h1 sm-center" >Your current rainy day savings can last you up to {{ number_format($currenttime) }} days. Congratulations you have a whole year worth of living expenses saved up. Ensure you maintain this level as a minimum</h6>
                                    </p>
                                @else
                                    <p class="">
                                        <h6 class="mt-2 mb-1 wd-8 ln-h1 sm-center" >Your current rainy day savings can last you up to {{ number_format($currenttime) }} days. Wow! This is beyond the typical 360-day target.
                                            Congratulations you have more than a whole year worth of living expenses saved up. Ensure you maintain this level as a minimum.
                                        </h6>
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 mb-2">
                        <div class="text-center mx-auto">
                            <div class="radial-progress" data-progress="{{($currentper < 100) ? $currentper : 100}}">
                                <div class="circle">
                                    <div class="{{($currentper > 98) ? 'taint' : ''}} mask full">
                                        <div class="fill" style="background: {{ $percolor }} !important"></div>
                                    </div>
                                    <div class="{{($currentper > 98) ? 'taint' : ''}} mask half">
                                        <div class="fill"  style="background: {{ $percolor }} !important"></div>
                                        <div class="fill fix" style="background: {{ $percolor }} !important"></div>
                                    </div>
                                    <div class="shadow"></div>
                                </div>
                                <div class="inset percent">
                                    <span>%</span>
                                    {{-- <div class="percentage">
                                        <div class="numbers">
                                            <span class="percent">%</span>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="text-left mt-1 sm-center">
                                <span class="target"> <b> Current Status:</b> {{ number_format($currentper) }}%</span>
                                <span class="target"><b> Target:</b> 100%</span>
                                @if ((int)$currentper > 10 && (int)$currentper < 100)
                                    <p class="">
                                        <h6 class="mt-2 mb-1 wd-8 ln-h1 sm-center" >You are currently meeting {{ $currentper }}% of your monthly expenses from your portfolio income. What happens if you lose your main source of income?</h6>
                                    </p>
                                @elseif ((int)$currentper <= 1)
                                    <p class="">
                                        <h6 class="mt-2 mb-1 wd-8 ln-h1 sm-center" >You are currently meeting {{ $currentper }}% of your monthly expenses. You do not have any portfolio income. You should seriously consider speaking with one of our financial advisors.</h6>
                                    </p>
                                @elseif ((int)$currentper >= 1 && (int)$currentper <= 10)
                                    <p class="">
                                        <h6 class="mt-2 mb-1 wd-8 ln-h1 sm-center" >You are currently meeting {{ $currentper }}% of your monthly expenses. You should seriously consider speaking with one of our financial advisors.</h6>
                                    </p>
                                @else
                                    <p class="">
                                        <h6 class="mt-2 mb-1 wd-8 ln-h1 sm-center" >You are currently meeting {{ $currentper }}% of your monthly expenses from your portfolio income. Well done! You are financially independent. Always remember to increase your means before increasing the cost of your lifestyle.</h6>
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gap-center text-center mt-4 mb-1">
                    <label for="" class="mr-3">
                        <span class="color-zone" style="background: red"></span>
                        Red Zone
                    </label>
                    <label for="" class="mr-3">
                        <span class="color-zone" style="background: #ffc200"></span>
                        Amber Zone
                    </label>
                    <label for="" class="mr-3">
                        <span class="color-zone" style="background:#00ff00"></span>
                        Green Zone
                    </label>
                    <label for="" class="mr-3">
                        <span class="color-zone" style="background: #65B8E8"></span>
                        Blue Zone
                    </label>
                </div>
            </div>
        </div>
        <div class="wd-f bg-white mt-3">
            <div class="gap-center py-4 ">
                @if($info)
                    <div class="px-4 py-1 my-3 text-center mx-auto stat-info" style="">
                        <span> <i class="fa fa-download mr-2"></i> SUCCESSFUL !</span>
                        <h6>{{ $info }}</h6>
                    </div>
                @endif
                {{-- <p>Show  {{(int)$currenttime >= 0 && (int)$currenttime <= 360 || (int)$currentper >= 0 && (int)$currentper <= 100}}</p> --}}
                <div class="justify-content-center row mx-0 mt-1">
                   <span class="mr-3 pt-2" id="goback">
                       <a href="#" class="" onclick="window.history.go(-1); return false;" >Go Back</a>
                   </span>
                   {{-- <span class="mr-3 pt-2" id="goback">
                       <a href="#" class="" onclick="window.history.go(-1); return false;" >Go Back</a>
                   </span> --}}

                    @if ((int)$currenttime >= 0 && (int)$currenttime < 360 && (int)$currentper >= 0 && (int)$currentper < 100)
                        @if (!$tok)
                            <form method="POST"  action="{{ route('finicial.improve') }}">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-trans mr-3"> Improve Status</button>
                                @if ($user)
                                    <span class="info mr-3"  data-toggle="tooltip" data-placement="top"
                                    title="For you to achieve financial independence, you may need to improve your result by acquiring some assets that will generate income other than your monthly salary which will cover your monthly financial commitments."><i class="fa fa-info mx-2" style="font-size: 11px;"></i></span>
                                @endif
                            </form>
                        @endif
                    @endif
                    @if (!$user && !$info)
                        <div id="normal">
                            <button type="submit" class="btn btn-pry" id="download"  onclick="downloadMail()">Save or Download Copy</button>
                        </div>
                    @endif
                    @if ($user)
                        <div class="">
                            <a class="btn-pry btn text-white mr-3" href="{{ route('home') }}">Continue</a>
                        </div>
                    @endif
                    @if ($info)
                        <div id="normal">
                            <button type="button" class="btn btn-pry" id=""> <a href="{{ route('register')}}" class="card-link text-white"> Register to Save</a></button>
                        </div>
                    @endif
                    <div id="sendmail" class="none">
                        <form method="POST"  action="{{ route('finicial.download') }}" onsubmit="sendMail()">
                            {{ csrf_field() }}
                            <div class="form-inline">
                                <input type="email" name="email" placeholder="Email" class="form-control mx-3" id="" required>
                                <button type="submit" class="btn btn-pry sm-center"> Download via Email</button>
                            </div>
                        </form>
                        <form method="POST"  action="{{ route('finicial.improve') }}">
                            {{ csrf_field() }}
                            <div class="form-inline mt-2" style="margin-left: 180px;">
                                <span class="mr-4">OR</span>
                                <button class="btn bg-dark text-white"> <a href="{{ route('register')}}" class="card-link text-white"> Register to Save</a> </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="emailSent" tabindex="-1" role="dialog" aria-labelledby="emailSent" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Check Your Email</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <h5 class="text-center">Financial Independence Status Result Successfully Sent</h5>
                </div>
                <div class="modal-footer mx-auto">
                  <button type="button" data-dismiss="modal" class="btn btn-pry px-5">OK</button>
                </div>
              </div>
            </div>
        </div>
    </div>


@endsection

