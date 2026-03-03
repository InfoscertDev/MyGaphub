@extends('layouts.user')

@section('script')
    @include('user.360.partials.chartpie_options')
    @include('user.seed.partials.seedpie_options')
    {{-- Primary Resident --}}
    <script>
        var ctx = document.getElementById('equityChartBar');
        var user_currency = "<?php echo $currency ?>";
        var backgrounds =   <?php echo json_encode($backgrounds) ?>;
        var primary =   <?php echo json_encode($residential['primary']) ?>;
        // console.log(primary.chart)
        if(primary.chart){
            this.refreshChart(primary.chart, false);
        }
    </script>

    <script>
        var net_ctx = document.getElementById('netDetailBar');
        var net_values =   <?php echo json_encode($net_detail['values']) ?>;
        var net_labels =   <?php echo json_encode($net_detail['labels']) ?>;
        var net_backgrounds =   <?php echo json_encode($net_backgrounds) ?>;
        if(net_ctx){
            net_ctx.getContext('2d');
            var netChart = new Chart(net_ctx, {
                type: 'bar',
                data: {
                    labels: net_labels,
                    datasets: [{
                        data: net_values,
                        backgroundColor: net_backgrounds,
                        borderColor: net_backgrounds,
                        clamp: true,
                        datalabels: {
                            color: '#000',
                            anchor: 'end',
                            font: { size: 15}
                        }
                    }]
                },
                options: {
                    legend: {
                        display: false,
                        position: 'top'
                    },
                    onClick: graphNetClickEvent ,
                    plugins: {
                        datalabels: {
                            formatter: function(value, context) {
                                return user_currency + parseInt(value).toLocaleString();
                            }
                        }
                    },
                    scales: {
                        xAxes:[{
                            display: true,
                            barThickness: 60,  // number (pixels) or 'flex'
                            maxBarThickness: 70 // number (pixels)
                        }],
                        yAxes:[{
                            display: true,
                            ticks: {
                                beginAtZero: true,
                                callback: function(value, index, values) {
                                    return user_currency + parseInt(value).toLocaleString();
                                }
                            },
                        }]
                    }
                }
            });
            function graphNetClickEvent (evt, elements) {
                var index = elements[0]["_index"];
                window.location = "<?php echo route('360.net') ?>"
            }
        }
    </script>

    <script>
        var averageChart = document.getElementById('averageSeedChart');
        var labels = ['Savings', 'Education', 'Expenditure', 'Discretionary'];
        var average_chart = {
            values : <?php  echo json_encode($average_detail['seed_web']) ?>,
        };
        refreshSeedChart(average_chart, averageChart, true)
    </script>

    <script>
        function refreshSevenGChart(account, seveng) {
            var chart;
            if(seveng == 'credit'){
                chart = document.getElementById('creditDetailBar');
            }else if(seveng == 'debt'){
                chart = document.getElementById('debtDetailBar');
            }else if(seveng == 'education'){
                chart = document.getElementById('educationDetailBar');
            }else if(seveng == 'freedom'){
                chart = document.getElementById('freedomDetailBar');
            }else if(seveng == 'grand'){
                chart = document.getElementById('grandDetailBar');
            }else if(seveng == 'alpha'){
                chart = document.getElementById('alphaDetailBar');
            }else if(seveng == 'beta'){
                chart = document.getElementById('betaDetailBar');
            }
            if(chart){
                chart.getContext('2d');
                var sevenGChart = new Chart(chart, {
                    type: 'bar',
                    data: {
                        labels: account.labels,
                        datasets: [{
                            data: account.values,
                            backgroundColor: net_backgrounds,
                            borderColor: net_backgrounds,
                            datalabels: {
                                color: '#000',
                                anchor: 'end',
                                font: { size: 15}
                            }
                        }]
                    },
                    options: {
                        legend: {
                            display: false,
                            position: 'top'
                        },
                        onClick: graphNetClickEvent ,
                        plugins: {
                            datalabels: {
                                formatter: function(value, context) {
                                    return  user_currency + parseInt(value).toLocaleString();
                                }
                            }
                        },
                        scales: {
                            xAxes:[{
                                display: true,
                                barThickness: 60,  // number (pixels) or 'flex'
                                maxBarThickness: 70 // number (pixels)
                            }],
                            yAxes:[{
                                display: true,
                                ticks: {
                                    beginAtZero: true,//user_currency +
                                    callback: function(value, index, values) {
                                        return  user_currency + parseInt(value).toLocaleString();
                                    }
                                },
                            }]
                        }
                    }
                });

                function graphNetClickEvent (evt, elements) {
                    // var index = elements[0]["_index"];
                    // window.location = "<?php echo route('360') ?>"+`/${seveng}`;
                }
            }
        }

    </script>

    <style>
        @media screen and (min-width: 1441px){
            canvas{
                max-height: 255px;
            }
        }
    </style>
@endsection

@section('content')

<div class="wd-f bg-white py-4 hg-f">
    <div class="row mx-0 justify-content-center">
        <div class="col-12 mx-auto">
            <div class="row my-3">
                <div class="col-6">
                    <div class="gt ml-3">
                        <h4> <b> Hello {{ $user->firstname}}!</b></h4>
                        <span class="text-dark">{{$great}}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="welcome" style="display: block !important">
                        <div class="wel-img pull-right" style="float: right">
                            @if (isset($profile->image))
                                 <a href="{{ Route('profile') }}">
                                    <img src="{{asset('/assets/'. str_replace('public', 'storage', $profile->image) ) }}"  class=" profile img img-responsive  rounded-circle"  data-toggle="tooltip" title="Click to Go to Settings">
                                </a>
                                @if(auth()->user()->unseen_notifications)
                                    <a href="{{ route('notifications') }}"><span class="badge badge-gap2">{{auth()->user()->unseen_notifications}}</span> </a>
                                @endif
                            @else
                                <a href="{{ Route('profile') }}">
                                    <img src="{{asset('/assets/storage/avatar/default.png') }}"  class=" profile img img-responsive  rounded-circle"data-toggle="tooltip" title="Click to Go to Settings">
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
                 @php
                    $available = [];
                    foreach ($dashboard as $key => $tile) {
                        // echo $key.$tile;
                        if($tile) array_push($available,$key);
                    }
                    function sortDashboard($current, $available){
                        if($current == $available[0]) $bg = 'gd-red';
                        if($current == $available[1]) $bg = 'gd-lemon';
                        if($current == $available[2]) $bg = 'gd-green';
                        return $bg;
                    }

                @endphp
            <div class="row">
                {{-- Phase 1 --}}
                <div class="col-md-6" id="phase1">
                    <div class="dash-pane hand mb-p gd-blue dash-select" id="financial_pane">
                        <h5 class="pane-title tp-0 bold">Financial Independence</h5>
                        <span class="pane-para">
                            <b class="mr-5">Time:</b>  <span class=""> {{ $snap['currenttime'] }} {{ ($snap['currenttime'] > 1) ? 'Days' : 'Day' }}  </span>
                        </span>
                        <span class="pane-para">
                            <b class="mr-5">Percentage:</b>  <span class=""> {{ $snap['currentper'] }}% </span>
                        </span>
                    </div>
                    @if ($dashboard->equity)
                        <div class="dash-pane hand mb-p {{sortDashboard('equity', $available)}}" id="equity_pane">
                            <h5 class="pane-title tp-0">Primary Residence </h5>
                            <span class="pane-para">
                                <b class="mr-5"> <i class="fa fa-home"></i> Home Value:</b>  <span class=""> {{$currency}}{{ isset($residential['primary']) ? number_format($residential['primary']->market_value,2) : 0 }} </span>
                            </span>
                            <span class="pane-para">
                                <b class="mr-5"> <i class="fa fa-bank"></i> Bank Mortgage:</b>  <span class="">{{$currency}}{{ isset($residential['primary']->mortgage) ? number_format($residential['primary']->mortgage->current_balance,2) : 0 }} </span>
                            </span>
                        </div>
                    @endif
                    @if ($dashboard->net_worth)
                        <div class="dash-pane hand mb-p {{sortDashboard('net_worth', $available)}}" id="net_pane">
                            <h5 class="pane-title tp-0">Net Worth</h5>
                            <span class="pane-para">
                                <b class="mr-5">  Total Assets:</b>  <span class="">{{$currency}}{{number_format($net_detail['values'][0], 2)}}  </span>
                            </span>
                            <span class="pane-para">
                                <b class="mr-5">  Total Liabilities:</b>  <span class="">{{$currency}}{{number_format($net_detail['values'][1], 2)}}</span>
                            </span>
                        </div>
                    @endif
                    @if ($dashboard->average_seed)
                        <div class="dash-pane hand mb-p {{sortDashboard('average_seed', $available)}}"  id="seed_pane">
                            <h5 class="pane-title tp-0">Average SEED</h5>
                            <div class="row">
                                <div class="col">
                                    <span class="pane-para">
                                        <b class="mr-1"> Savings</b>  <span class="">{{$currency}}{{number_format((float)$average_detail['table']['savings'], 2)}}</span>
                                    </span>
                                    <span class="pane-para">
                                        <b class="mr-1">Expenditure:</b>  <span class="">{{$currency}}{{number_format((float)$average_detail['table']['expenditure'], 2)}}</span>
                                    </span>
                                </div>
                                <div class="col">
                                    <span class="pane-para">
                                        <b class="mr-1"> Education</b>  <span class="">{{$currency}}{{number_format((float)$average_detail['table']['education'], 2)}}</span>
                                    </span>
                                    <span class="pane-para">
                                        <b class="mr-1">Discretionary:</b>  <span class="">{{$currency}}{{number_format((float)$average_detail['table']['discretionary'], 2)}}</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endif
                    {{--7G --}}
                    @if ($dashboard->grand)
                        <div class="dash-pane hand mb-s {{sortDashboard('grand', $available)}}" onclick="switchToSevenG('grand')" value="grand">
                            <h5 class="pane-title tp-0">Grand <br>
                                <span class="small" style="font-size:13.5px; ">A measure of your benevolence.</span>
                            </h5>
                            <span class="pane-para">
                                <b class="mr-5">Current:</b>  <span class="">{{$currency}}{{number_format($seveng['grand']->current, 2)}}  </span>
                            </span>
                            <span class="pane-para">
                                <b class="mr-5">Target:</b>  <span class="">{{$currency}}{{number_format($seveng['grand']->target, 2)}}</span>
                            </span>
                        </div>
                    @endif
                    @if ($dashboard->freedom)
                        <div class="dash-pane hand mb-s {{sortDashboard('freedom', $available)}}" onclick="switchToSevenG('freedom')" value="freedom">
                            <h5 class="pane-title tp-0">Freedom <br>
                                <span class="small" style="font-size:13.5px; ">A measure of your progress on your path to financial freedom.</span>
                            </h5>
                            <span class="pane-para">
                                <b class="mr-5">Current:</b>  <span class="">{{$currency}}{{number_format($seveng['freedom']->current, 2)}}  </span>
                            </span>
                            <span class="pane-para">
                                <b class="mr-5">Target:</b>  <span class="">{{$currency}}{{number_format($seveng['freedom']->target, 2)}}</span>
                            </span>
                        </div>
                    @endif
                    @if ($dashboard->education)
                        <div class="dash-pane hand mb-s {{sortDashboard('education', $available)}} pr-3" onclick="switchToSevenG('education')" value="education">
                            <h5 class="pane-title tp-0">Education <br>
                                <span class="small" style="font-size:13.5px; ">A measure of how much you have saved up for your kids university education.</span>
                            </h5>
                            <span class="pane-para">
                                <b class="mr-5">Current:</b>  <span class="">{{$currency}}{{number_format($seveng['education']->current, 2)}}  </span>
                            </span>
                            <span class="pane-para">
                                <b class="mr-5">Target:</b>  <span class="">{{$currency}}{{number_format($seveng['education']->target, 2)}}</span>
                            </span>
                        </div>
                    @endif
                    @if ($dashboard->debt)
                        <div class="dash-pane hand mb-s {{sortDashboard('debt', $available)}}" onclick="switchToSevenG('debt')" value="debt">
                            <h5 class="pane-title tp-0">Debt <br>
                                <span class="small" style="font-size:13.5px; ">A measure of what you owe on your primary place of residence - own home.</span>
                            </h5>
                            <span class="pane-para">
                                <b class="mr-5">Current:</b>  <span class="">{{$currency}}{{number_format($seveng['debt']->current, 2)}}  </span>
                            </span>
                            <span class="pane-para">
                                <b class="mr-5">Baseline:</b>  <span class="">{{$currency}}{{number_format($seveng['debt']->baseline, 2)}}</span>
                            </span>
                        </div>
                    @endif
                    @if ($dashboard->credit)
                        <div class="dash-pane hand mb-s {{sortDashboard('credit', $available)}}" onclick="switchToSevenG('credit')" value="credit">
                            <h5 class="pane-title tp-0">Credit <br>
                                <span class="small" style="font-size:13.5px; ">Loans, Credit cards, HPIs, all unsecured debt.</span>
                            </h5>
                            <span class="pane-para">
                                <b class="mr-5">Current:</b>  <span class="">{{$currency}}{{number_format($seveng['credit']->current, 2)}}  </span>
                            </span>
                            <span class="pane-para">
                                <b class="mr-5">Baseline:</b>  <span class="">{{$currency}}{{number_format($seveng['credit']->baseline, 2)}}</span>
                            </span>
                        </div>
                    @endif
                    @if ($dashboard->beta)
                        <div class="dash-pane hand mb-s {{sortDashboard('beta', $available)}}" onclick="switchToSevenG('beta')" value="beta">
                            <h5 class="pane-title tp-0">Beta <br>
                                <span class="small" style="font-size:13.5px; ">A measure of your house purchase funds saved up.</span>
                            </h5>
                            <span class="pane-para">
                                <b class="mr-5">Current:</b>  <span class="">{{$currency}}{{number_format($seveng['beta']->current, 2)}}  </span>
                            </span>
                            <span class="pane-para">
                                <b class="mr-5">Target:</b>  <span class="">{{$currency}}{{number_format($seveng['beta']->target, 2)}}</span>
                            </span>
                        </div>
                    @endif
                    @if ($dashboard->alpha)
                        <div class="dash-pane hand mb-s {{sortDashboard('alpha', $available)}}" onclick="switchToSevenG('alpha')" value="alpha">
                            <h5 class="pane-title tp-0">Alpha <br>
                                <span class="small" style="font-size:13.5px; ">A measure of your Rainy Day funds.</span>
                            </h5>
                            <span class="pane-para">
                                <b class="mr-5">Current:</b>  <span class="">{{$currency}}{{number_format($seveng['alpha']->current, 2)}}  </span>
                            </span>
                            <span class="pane-para">
                                <b class="mr-5">Target:</b>  <span class="">{{$currency}}{{number_format($seveng['alpha']->target, 2)}}</span>
                            </span>
                        </div>
                    @endif

                    <div class="dash-pane mb-p gd-amber mb-2">
                        <h5 class="pane-title tp-0 bold">Latest Acquisition Opportunities</h5>
                        <p class="mb-4">
                            <span class="pane-para pane-para-sm">Increase Your Net Worth and grow your GAP income today!                            </span>
                        </p>
                        <p>
                            <a href="{{ route('user.reap-featured') }}" class="text-white">
                                <span class="pane-para pane-para-sm text-underline">Featured Real Estate Opportunities</span>
                            </a>
                            <!-- <a href="{{ route('user.ganp-opportunity', 'appreciating') }}" class="text-white">
                                <span class="pane-para pane-para-sm text-underline"> Featured Green Asset Opportunities</span>
                            </a> -->
                        </p>
                    </div>
                </div>
                {{-- Phase 2 --}}
                <div class="col-md-6" id="phase2">
                    <div class="dash-pane mb-2 gd-red">
                        <h5 class="pane-title">Current Global Asset Portfolio Income</h5>
                        <p class="pane-number">{{$currency}}{{ number_format( $fin['portfolio'],2,'.',',')  }}</p>
                        <a href="{{ route('360.income')}}" class="card-link">
                            <span class="pane-detail small">
                                See More <i class="fa fa-right"></i>
                            </span>
                        </a>
                    </div>
                    <div id="swich_snapshot">
                        <div style="display: block">
                            <div class="card mb-2 bg-snap" >
                                <div  id="financial_snapshot">
                                    @include('widgets.financial_snapshot')
                                </div>
                                <div style="display: none;" id="residential_snapshot">
                                    @include('widgets.residential_snapshot')
                                </div>
                                <div style="display: none;" id="net_snapshot">
                                    @include('widgets.net_snapshot')
                                </div>
                                <div style="display: none;" id="seed_snapshot">
                                    @include('widgets.seed_snapshot')
                                </div>
                                <div style="display: none;" id="seveng_snapshot">
                                    @include('widgets.seveng_snapshot')
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dash-pane mb-2 gd-blue">
                        <h5 class="pane-title tp-0"> <i class="fa fa-user mr-2"></i>Personal Assistant</h5>
                        <p>
                            <span class="pane-para mb-1">
                                <span class="tile">Priority:</span>
                                @if($assistance['priority']) <span class="ml-2">{{ $assistance['priority']['name'] }}</span>  @endif
                            </span>
                            @if($assistance['priority'])
                                <span class="small text-light priority-due">
                                    @if(isset($assistance['priority']->duedate))
                                        @if($assistance['priority']->dueday > -1 &&  $assistance['priority']->date >= date('Y-m-d') && $assistance['priority']->due >= $assistance['priority']->dueday )
                                            <span class="mr-1 fa fa-exclamation-triangle txt-primary" > </span>
                                            @if ($assistance['priority']->dueday == 0 )
                                                Today is the Due Date
                                            @else
                                            <span class=""> {{ $assistance['priority']->dueday}} {{ ($assistance['priority']->dueday > 1 ) ? ' days' : ' day' }} to Due Date</span>
                                            @endif
                                        @elseif(date('Y-m-d') > $assistance['priority']->date )
                                            <span class="">  <img src="{{ asset('/assets/icon/reminder-info.png')}}" class="img im-responsive" width="21" alt="">This event has passed</span>
                                        @endif
                                    @elseif(isset($assistance['priority']->category))
                                         <a class="text-white" href="{{ $assistance['priority']->action . '?priority=' . $assistance['priority']->id }}">
                                            {{ $assistance['priority']->message  }}
                                            <!-- <span class="mr-1 fa fa-exclamation-triangle txt-primary" > </span> -->
                                          </a>
                                    @endif
                                </span>
                            @endif
                        </p>
                        <p>
                            <span class="pane-para"><span class="tile">Recomendations:</span> </span>
                            <span class="pane-para mb-1">
                               @if($assistance['acquisition']['type'] == 'reap' && $assistance['acquisition']['asset'])
                                    <a class="text-white" href="{{ route('user.single_reap',[$assistance['acquisition']['asset']->id]) }}">   {{  str_limit($assistance['acquisition']['asset']->name, $limit = 40, $end = '...') }} </a>
                               @endif
                               <!-- @if($assistance['acquisition']['type'] == 'ganp' && $assistance['acquisition']['asset'])
                                    <a class="text-white" href="{{ route('user.single_ganp',[ $assistance['acquisition']['asset']->cultivation->id, 'tresh' => rand(1000,9999) ])  }}">   {{  str_limit($assistance['acquisition']['asset']->cultivation->name, $limit = 40, $end = '...') }} </a>
                               @endif -->
                            </span>
                            @if($assistance['personal']['type'])
                                <span class="pane-para mb-1"> <a class="text-white" href="{{route($assistance['personal']['type'])}}"> {{$assistance['personal']['setup']}}</a> </span>
                            @endif
                        </p>
                        <p>
                            <span class="pane-para"><span class="bold">Upcoming Payments:</span> </span>
                            @foreach($assistance['payments']['reminders'] as $reminder)
                                <span class="pane-para mb-1">{{$reminder->name}}: {{$currency}}{{number_format($reminder->amount, 0)}}</span>
                            @endforeach
                        </p>
                        {{-- <a href="">
                            <span class="pane-detail small">
                                View All <i class="fa fa-right"></i>
                            </span>
                        </a> --}}
                    </div>


                </div>
            </div>
            <div class="row">
                <div class="my-2 mx-auto">
                    @include('widgets.sort_dashboard')
                    <button class="btn  btn-outline-danger" data-toggle="modal" data-target="#sortDashboardModal">Sort Dashboard</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function(){
        $('#financial_pane').on('click', function(){
             $('#residential_snapshot').hide()
             $('#net_snapshot').hide();
             $('#seed_snapshot').hide();
             $('#financial_snapshot').fadeIn(500);
             removeDashSelect();
            if(!$('#financial_pane').hasClass("dash-select")) $('#financial_pane').addClass("dash-select")
        });
        $('#equity_pane').on('click', function(){
             $('#financial_snapshot').hide();
             $('#net_snapshot').hide();
             $('#seed_snapshot').hide();
             $('#residential_snapshot').fadeIn(500);
             removeDashSelect();
             if(!$('#equity_pane').hasClass("dash-select")) $('#equity_pane').addClass("dash-select")
        });
        $('#net_pane').on('click', function(){
             $('#financial_snapshot').hide();
             $('#residential_snapshot').hide();
             $('#seed_snapshot').hide();
             $('#net_snapshot').fadeIn(500);
             removeDashSelect();
             if(!$('#net_pane').hasClass("dash-select")) $('#net_pane').addClass("dash-select")
        })
        $('#seed_pane').on('click', function(){
             $('#financial_snapshot').hide();
             $('#residential_snapshot').hide();
             $('#net_snapshot').hide(500)
             $('#seed_snapshot').fadeIn(500);
             removeDashSelect();
             if(!$('#seed_pane').hasClass("dash-select")) $('#seed_pane').addClass("dash-select")
        });
        function removeDashSelect(){
            $('#seed_pane').removeClass("dash-select");
            $('#equity_pane').removeClass("dash-select");
            $('#net_pane').removeClass("dash-select");
            $('#financial_pane').removeClass("dash-select");
            var seveng = ['alpha','beta', 'credit', 'debt', 'education', 'freedom','grand'];
            seveng.forEach((analytics)=> {  $(`#${analytics}_snap`).hide(); })
        }
    });
    //
    function switchToSevenG(event) {
        $('#financial_snapshot').hide();
        $('#residential_snapshot').hide();
        $('#net_snapshot').hide()
        $('#seed_snapshot').hide();
        // console.log(event);
        var seveng = ['alpha','beta', 'credit', 'debt', 'education', 'freedom','grand'];
        seveng.forEach((analytics)=> {  $(`#${analytics}_snap`).hide(); })
        $('#seveng_snapshot').fadeIn();
        $(`#${event}_snap`).fadeIn();
    }
</script>
@endsection
