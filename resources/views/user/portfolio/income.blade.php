@extends('layouts.user')
@section('script')
    <script src="{{ asset('assets/js/vectormap.min.js') }}"></script>
    <script src="{{ asset('assets/js/worldmill.js') }}"></script>
   <script>
        //  Chart
        var user_currency = "<?php echo $currency ?>";
        var labels = <?php echo json_encode($income_chart['periods']) ?>;
        var portfolio = <?php echo json_encode($income_chart['portfolio_values']) ?>;
        var non_portfolio = <?php echo json_encode($income_chart['non_portfolio_values']) ?>;
        var portfolioIncome = document.getElementById('portfolioIncome');
       labels.unshift('');labels.push('');
       portfolio.unshift(null);portfolio.push(null);
       non_portfolio.unshift(null);non_portfolio.push(null);
    </script>
    @include('user.portfolio.partials.map')
    @include('user.portfolio.partials.portfolio')

    <script>
        var link = window.location.href;
        var portfolio = <?php echo json_encode($income_detail['portfolio_diff']) ?>;
        var audit = <?php echo json_encode($income_audit['income_allocated']) ?>;
       $(function() {
            if(portfolio > 0  && !(link.includes('archive'))){
                $('#incomeModalAccount').modal({backdrop: 'static', keyboard: false});
            }else if(portfolio <= 0 && audit == 0){
                $('#incomeAllocatedModalAccount').modal({backdrop: 'static', keyboard: false});
            }
       });
    </script>
@endsection

@section('content')
    @include('user.360.modals.income')
    @include('user.360.modals.income_allocation')
    <link rel="stylesheet" href="{{ asset('assets/css/vectormap.css') }}">
    <div class="row">
        <div class="col-md-4 px-2 col-sm-12 sm-default phase1">
            <div class="b-rad-20 portfolio mb-3" style="background: lightblue">
                <div class="chart text-center">
                    <h5 class="mx-auto bold pt-4 text-center">Income Characteristics                    </h5>
                    <canvas id="portfolioIncome" width="5480px" style="width: 120%;min-height: 200px"></canvas>
                </div>
            </div>
            <div class="mb-3 map" >
                <canvas id="world-map" style="width: 100%; height: 242px;" ></canvas>
            </div>
        </div>
        <div class="col-md-4 px-2 col-sm-12 sm-default phase2">
            <div class="b-rad-20 mb-3 snap" style="height: 130px">
                <div class="dash-pane gd-red">
                    <p class="pane-number">{{$currency}}{{ number_format($income_detail['total_portfolio'], 2) }}</p>
                    <h5 class="pane-title" style="top: -15px">Average Total Income </h5>
                    <span class="avg-icon">
                        @if($income_chart['hasImprove'])
                            <i class="fa fa-caret-up mr-2"></i>
                        @else
                            <i class="fa fa-caret-down mr-2 text-warning"></i>
                        @endif
                        <small>vs Last Month</small>
                    </span>
                </div>
            </div>
            <div class="b-rad-20 mb-3 channels">
                <h5 class="bold pt-3 pl-2">Income Channels</h5>
                <ul class="list-group list-group-flush mt-2">
                    <li class="list-group-item bg-none ">
                       <h6 class="ml-2"> Primary Employment <span class="pull-right pr-3">{{$currency}}{{number_format($income_channels['values']['primary'], 2)}}</span></h6>
                       <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{$income_channels['percentages']['primary']}}%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </li>
                    <li class="list-group-item bg-none ">
                       <h6 class="ml-2"> Side Hustle <span class="pull-right pr-3">{{$currency}}{{number_format($income_channels['values']['hustle'], 2)}}</span></h6>
                       <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{$income_channels['percentages']['hustle']}}%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </li>
                    <li class="list-group-item bg-none ">
                       <h6 class="ml-2"> Business Asset <span class="pull-right pr-3">{{$currency}}{{number_format($income_channels['values']['business'],2)}}</span></h6>
                       <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{$income_channels['percentages']['business']}}%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </li>
                    <li class="list-group-item bg-none ">
                       <h6 class="ml-2"> Risk Asset <span class="pull-right pr-3">{{$currency}}{{number_format($income_channels['values']['risk'],2)}}</span></h6>
                       <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{$income_channels['percentages']['risk']}}%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </li>
                    <li class="list-group-item bg-none ">
                       <h6 class="ml-2"> Appreciating Asset <span class="pull-right pr-3">{{$currency}}{{number_format($income_channels['values']['appreciating'],2)}}</span></h6>
                       <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{$income_channels['percentages']['appreciating']}}%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </li>
                    <li class="list-group-item bg-none ">
                       <h6 class="ml-2"> Intellectual Asset <span class="pull-right pr-3">{{$currency}}{{number_format($income_channels['values']['intellectual'], 2)}}</span></h6>
                       <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{$income_channels['percentages']['intellectual']}}%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </li>
                    <li class="list-group-item bg-none ">
                       <h6 class="ml-2"> Depreciating Asset <span class="pull-right pr-3">{{$currency}}{{number_format($income_channels['values']['depreciating'], 2)}}</span></h6>
                       <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{$income_channels['percentages']['depreciating']}}%;" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-4 px-2 col-sm-12 sm-default phase3">
            <div class="b-rad-20 mb-2 income" style="background: lightblue;">
                <h5 class="bold pt-3 pl-2">Income Details</h5>
                <table class="table table-striped ">
                    <tr >
                        <th>Channel</th>
                        <th>Currency</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>
                    @foreach($incomes as $key => $income)
                        @if($key < 6)
                            <tr class="detail">
                                <td>{{$income->channel}}</td>
                                <td>{{$income->income_currency}}</td>
                                <td>{{$income->currency}}{{ number_format($income->amount, 2) }}</td>
                                <td>{{ date("d-m-Y", strtotime($income->income_date))}}</td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
            <div class="mt-3">
                <div class="b-rad-20 mb-2 create bg-gap-gray" style=" height: 60px">
                    <h5 class="text-white pt-2 text-center">
                        <a class="text-white mx-2 d-inline card-link " href="{{ route('360.income.list') }}">
                            <h5 style="font-size: 18px;top: -15px;position: relative;" class="bold">
                                <i class="fa fa-clipboard fa-bg mr-3" style="font-size: 25px"></i>
                                View Income List
                            </h5>
                        </a>
                    </h5>
                </div>
                <div class="b-rad-20 mb-2 create gd-red" style=" height: 60px">
                    <h5 class="text-white pt-2 text-center">
                        <button class="btn bg-none text-white mx-2 d-inline" data-toggle="modal" data-target="#incomeModalAccount">
                            <i class="fa fa-plus fa-bg mr-2" style="font-size: 28px"></i>
                            <span style="font-size: 18px;top: -5px;position: relative;"> Add Income to track it here</span>
                        </button>
                    </h5>
                </div>
            </div>
        </div>
    </div>


@endsection
