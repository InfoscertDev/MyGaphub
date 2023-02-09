<link href="{{ asset('assets/css/radical.css') }}" rel="stylesheet">

<div class="card-body">
    <h5 class="text-center bold tp-0">Financial Independence Snapshot</h5>
    <div class="fin-result row">
        <div class="col-xs-12 col-sm-6 col-md-6 ">
            <div class="text-center float-right sm-no-float ">
                <a href="{{ Request::is('home')  ? route('360.retirement') : '#'}}" class="card-link text-dark">
                    <div class="radial-progress" data-progress="{{($snap['timeper'] < 100) ? $snap['timeper'] : 100}}">
                        <div class="circle">
                            <div class="{{($snap['timeper'] > 98) ? 'taint' : ''}} mask full">
                                <div class="fill" style="background: {{ $snap['timecolor'] }} !important"></div>
                            </div>
                            <div class="{{($snap['timeper'] > 98) ? 'taint' : ''}} mask half">
                                <div class="fill" style="background: {{ $snap['timecolor'] }} !important"></div>
                                <div class="fill fix" style="background: {{ $snap['timecolor'] }} !important"></div>
                            </div>
                            <div class="shadow"></div>
                        </div>
                        <div class="inset time">
                            <img class="img img-responsive" src="{{ asset('/assets/images/hourglass.png')}}" alt="">
                        </div>
                    </div>
                </a>
                <div class="text-left mt-1 sm-center">
                    <span class="target"> <b>Current Status:</b>   {{ $snap['currenttime'] }} Days</span>
                    <span class="target"> <b> Target:</b> <span class="">360 Days </span></span>
                </div>
            </div>  
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 ">
            <div class="text-center float-left sm-no-float"> 
                <a href="{{ Request::is('home')  ? route('360.retirement') : '#'}}" class="card-link text-dark">
                    <div class="radial-progress" data-progress="{{ ($snap['currentper'] < 100) ? $snap['currentper'] : 100}}">
                        <div class="circle">
                            <div class="{{($snap['currentper'] > 98) ? 'taint' : ''}} mask full">
                                <div class="fill" style="background: {{ $snap['percolor'] }} !important"></div>
                            </div>
                            <div class="{{($snap['currentper'] > 98) ? 'taint' : ''}} mask half">
                                <div class="fill"  style="background: {{ $snap['percolor'] }} !important"></div>
                                <div class="fill fix" style="background: {{ $snap['percolor'] }} !important"></div>
                            </div>
                            <div class="shadow"></div>
                        </div> 
                        <div class="inset percent">
                            <span>%</span>
                        </div>
                    </div>  
                </a>
                <div class="text-left mt-1 sm-center">
                    <span class="target"> <b> Current Status:</b>  {{ $snap['currentper'] }}%</span>
                    <span class="target"><b> Target:</b> 100%</span>
                </div>
            </div> 
        </div> 
    </div>
    <div class="text-center mt-3 mb-1">
        <label for="" class="mr-1">
            <span class="color-zone" style="background: red"></span>
            Red Zone
        </label>
        <label for="" class="mr-1">
            <span class="color-zone" style="background: #ffc200"></span>
            Amber Zone
        </label>
        <label for="" class="mr-1">
            <span class="color-zone" style="background: #00ff00"></span>
            Green Zone
        </label>
        <label for="" class="mr-1">
            <span class="color-zone" style="background: #65B8E8"></span>
            Blue Zone
        </label>
    </div>
    @if (Request::is('home'))
        <div class="row">
            <div class="col-8"></div>
            <div class="col-4">
                <span class="text-right"> 
                    <a href="{{route('360.retirement')}}" class="small bold text-dark text-underline">View Detail</a>
                </span>
            </div>
        </div>
    @endif
</div> 
{{-- <div class="card mb-2">
</div> --}}