@extends('layouts.user')

@section('script')
    <script src="{{ asset('assets/js/vectormap.min.js') }}"></script>
    <!-- <script src="{{ asset('assets/js/worldmill.js') }}"></script> -->
    <script src="{{ asset('assets/js/continentalmill.js') }}"></script>
   <script>
        //   MAP
        var braid = [
            {name: 'Australia', coords: [-25.274398, 133.775136], status: 'mrk'},
            {name: 'America', coords: [37.090240, -95.712891], status: 'mrk'},
            {name: 'Europe', coords: [50.9030599, 6.4213693], status: 'mrk'}
        ];
        var global =   <?php echo json_encode($global) ?>;
        //  Chart
        var braid_roi = <?php echo json_encode($roi_watch['braid_roi'])  ?>;
        var labels = ['B','R','A','I','D'];
        var existing_values = <?php echo json_encode($existing_report['values'])  ?>;
        var desired_values = <?php echo json_encode($desired_report['values'])  ?>;
        var existing_incomes = <?php echo json_encode($existing_report['incomes'])  ?>;
        var desired_incomes = <?php echo json_encode($desired_report['incomes'])  ?>;

        const braidValue = document.getElementById('braidValue');
        const braidIncome = document.getElementById('braidIncome');
        const braidView = document.getElementById('braidView');

    $(function(){
        $('#switch_braid').on('click', function(){
            $('#world-map').hide();
            $('#switch_braid').hide();

            $('#braid-chart').fadeIn();
            $('#switch_map').fadeIn();
        });
        $('#switch_map').on('click', function(){
            $('#world-map').fadeIn();
            $('#switch_braid').fadeIn();

            $('#braid-chart').hide();
            $('#switch_map').hide();
        });
        var link = window.location.href;
        if(link.match('new')) $('#newPortfolioAssetModal').modal('show');
    });

    </script>
    @include('user.portfolio.partials.map')
    @include('user.portfolio.partials.braid_bar')
    @include('user.portfolio.partials.braid_line')
    @include('user.portfolio.partials.braid_view')
@endsection

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/vectormap.css') }}">

    <div class="row mx-auto">
        <div class="col-md-4 col-sm-12 p-0">
            <canvas id="world-map" style="width: 100%; height: 242px;" ></canvas>
            <!-- <div id="world-map" style="width: 100%; height: 242px;" class="text-center" >
                <img src="{{ asset('/assets/images/worldmap.jpeg') }}" alt="" class="img img-responsive world_map">
            </div> -->
            <div class="chart bg-gray" id="braid-chart" style="display: none;">
                <h5 class="pt-2 mx-auto wd-5 bold my-2 text-center">ASSET CLASS MIX</h5>
                <canvas id="braidView" width="500px" style="width: 120%; margin:  0; min-height: 190px"></canvas>
            </div>
            <div class="card-footer p-0 d-flex my-1">
                <span class="mx-2">
                    <img src="{{ asset('assets/icon/worldwide.png') }}" alt="" class="img" style="width: 25px; margin-top: 6px;">
                </span>
                <button class="btn text-center btn-block" id="switch_braid">
                    <span class="">Switch to BRAID View</span>
                </button>
                <button class="btn text-center btn-block" id="switch_map" style="display: none;    position: relative;top: -5px;">
                    <span class="">Switch to World View</span>
                </button>
            </div>
        </div>
        <div class="col-md-8 col-sm-12">
            <div class="row px-0">
                <div class="col-md-6 col-sm-12">
                    <div class="chart">
                        <h6 class="mx-auto wd-5 bold my-2 text-center">Investment Goals Chart Portfolio <span class="txt-primary">Value</span></h6>
                        <canvas id="braidValue" width="500px" style="width: 120%; margin:  0; min-height: 190px"></canvas>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="chart text-center my-3">
                        <h6 class="mx-auto wd-5 bold my-2 text-center">Investment Goals Chart Portfolio <span class="txt-primary">Income</span></h6>
                        <canvas id="braidIncome" width="500px" style="width: 120%; margin:  0; min-height: 190px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-4 col-sm-12 pr-0">
            <table class="table table-striped table-bordered">
                <tr class="" >
                   <th colspan="5" class="text-center">Return On Investment (ROI%) Watch
                        <span class="account_info info" style="top: -8px; left: -3px;"  data-toggle="tooltip"
                            title="ROI shows the rate at which your portfolio is returning profits relative to the initial capital invested."><i class="fa fa-info mx-2 "></i></span>
                   </th>
                </tr>
                <tr>
                    <th><a href="{{ route('portfolio.braid', ['business'])}}" class="text-dark card-link">B</a> </th>
                    <th><a href="{{ route('portfolio.braid', ['risk'])}}" class="text-dark card-link">R</a></th>
                    <th><a href="{{ route('portfolio.braid', ['appreciating'])}}" class="text-dark card-link">A</a></th>
                    <th><a href="{{ route('portfolio.braid', ['intellectual'])}}" class="text-dark card-link">I</a></th>
                    <th><a href="{{ route('portfolio.braid', ['depreciating'])}}" class="text-dark card-link">D</a></th>
                </tr>
                <tr>
                    @php
                        $roi_braid = $roi_watch['roi'];
                    @endphp
                    <td><a href="{{ route('portfolio.braid', ['business'])}}" class="text-dark card-link">{{round($roi_braid[0])}}%</a></td>
                    <td><a href="{{ route('portfolio.braid', ['risk'])}}" class="text-dark card-link">{{round($roi_braid[1])}}%</a></td>
                    <td><a href="{{ route('portfolio.braid', ['appreciating'])}}" class="text-dark card-link">{{round($roi_braid[2])}}%</a></td>
                    <td><a href="{{ route('portfolio.braid', ['intellectual'])}}" class="text-dark card-link">{{round($roi_braid[3])}}%</a></td>
                    <td><a href="{{ route('portfolio.braid', ['depreciating'])}}" class="text-dark card-link">{{round($roi_braid[4])}}%</a></td>
                </tr>
            </table>
            <div class="jumbotron mt-4 py-4 mt-2 bg-dark-gray b-rad-20">
                <div class="text-center py-2">
                    <h6>Ready to onboard an existing asset or set an investment goal?</h6>
                    <div class="my-4">
                        <button class="btn-primary btn px-3" data-toggle="modal" data-target="#newPortfolioAssetModal">Add Asset</button>
                        @include('user.portfolio.modals.portfolio_asset')
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-12 " style="overflow-x: scroll;">
            <table class="bg-gray sm-table-responsive table table-bordered pl-2 wd-f">
                <tbody class="" >
                    <tr class="" >
                       <th rowspan="2"></th>
                       <th colspan="2" class="text-center">Existing Assets</th>
                       <th colspan="2" class="text-center">Desired Assets</th>
                       <th colspan="2" class="text-center">Anticipated Total <br>(Existing+Desired)</th>
                    </tr>
                    <tr>
                        <td class="text-center bold">Value</td>
                        <td class="text-center bold">Income</td>
                        <td class="text-center bold">Value</td>
                        <td class="text-center bold">Income</td>
                        <td class="text-center bold">Value</td>
                        <td class="text-center bold">Income</td>
                    </tr>
                    <tr>
                        <th><a href="{{ route('portfolio.braid', ['business'])}}" class="text-dark card-link">Business</a></th>
                        <td class="bg-exist">{{$currency}}{{number_format($existing_report['values'][0], 2)}}</td>
                        <td class="bg-exist">{{$currency}}{{number_format($existing_report['incomes'][0], 2)}}</td>
                        <td class="bg-desire">{{$currency}}{{number_format($desired_report['values'][0],2)}}</td>
                        <td class="bg-desire">{{$currency}}{{number_format($desired_report['incomes'][0], 2)}}</td>
                        <td class="bg-anticipate">{{$currency}}{{number_format($existing_report['values'][0] + $desired_report['values'][0],2) }}</td>
                        <td class="bg-anticipate">{{$currency}}{{number_format($existing_report['incomes'][0] + $desired_report['incomes'][0], 2 )}}</td>
                    </tr>
                    <tr>
                        <th><a href="{{ route('portfolio.braid', ['risk'])}}" class="text-dark card-link">Risk</a></th>
                        <td class="bg-exist">{{$currency}}{{number_format($existing_report['values'][1], 2)}}</td>
                        <td class="bg-exist">{{$currency}}{{number_format($existing_report['incomes'][1], 2)}}</td>
                        <td class="bg-desire">{{$currency}}{{number_format($desired_report['values'][1],2)}}</td>
                        <td class="bg-desire">{{$currency}}{{number_format($desired_report['incomes'][1], 2)}}</td>
                        <td class="bg-anticipate">{{$currency}}{{number_format($existing_report['values'][1] + $desired_report['values'][1],2) }}</td>
                        <td class="bg-anticipate">{{$currency}}{{number_format($existing_report['incomes'][1] + $desired_report['incomes'][1], 2 )}}</td>
                    </tr>
                    <tr>
                        <th><a href="{{ route('portfolio.braid', ['appreciating'])}}" class="text-dark card-link">Appreciating</a></th>
                        <td class="bg-exist">{{$currency}}{{number_format($existing_report['values'][2], 2)}}</td>
                        <td class="bg-exist">{{$currency}}{{number_format($existing_report['incomes'][2], 2)}}</td>
                        <td class="bg-desire">{{$currency}}{{number_format($desired_report['values'][2],2)}}</td>
                        <td class="bg-desire">{{$currency}}{{number_format($desired_report['incomes'][2], 2)}}</td>
                        <td class="bg-anticipate">{{$currency}}{{number_format($existing_report['values'][2] + $desired_report['values'][2],2) }}</td>
                        <td class="bg-anticipate">{{$currency}}{{number_format($existing_report['incomes'][2] + $desired_report['incomes'][2], 2 )}}</td>
                    </tr>
                    <tr>
                        <th><a href="{{ route('portfolio.braid', ['intellectual'])}}" class="text-dark card-link">Intellectual</a></th>
                        <td class="bg-exist">{{$currency}}{{number_format($existing_report['values'][3], 2)}}</td>
                        <td class="bg-exist">{{$currency}}{{number_format($existing_report['incomes'][3], 2)}}</td>
                        <td class="bg-desire">{{$currency}}{{number_format($desired_report['values'][3],2)}}</td>
                        <td class="bg-desire">{{$currency}}{{number_format($desired_report['incomes'][3], 2)}}</td>
                        <td class="bg-anticipate">{{$currency}}{{number_format($existing_report['values'][3] + $desired_report['values'][3],2) }}</td>
                        <td class="bg-anticipate">{{$currency}}{{number_format($existing_report['incomes'][3] + $desired_report['incomes'][3], 2 )}}</td>
                    </tr>
                    <tr>
                        <th><a href="{{ route('portfolio.braid', ['depreciating'])}}" class="text-dark card-link">Depreciating</a></th>
                        <td class="bg-exist">{{$currency}}{{number_format($existing_report['values'][4], 2)}}</td>
                        <td class="bg-exist">{{$currency}}{{number_format($existing_report['incomes'][4], 2)}}</td>
                        <td class="bg-desire">{{$currency}}{{number_format($desired_report['values'][4],2)}}</td>
                        <td class="bg-desire">{{$currency}}{{number_format($desired_report['incomes'][4], 2)}}</td>
                        <td class="bg-anticipate">{{$currency}}{{number_format($existing_report['values'][4] + $desired_report['values'][4],2) }}</td>
                        <td class="bg-anticipate">{{$currency}}{{number_format($existing_report['incomes'][4] + $desired_report['incomes'][4], 2 )}}</td>
                    </tr>
                    <tr>
                        <th class="bold">Total</th>
                        <td class="bold">{{$currency}}{{number_format(array_sum($existing_report['values']),2)}}</td>
                        <td class="bold">{{$currency}}{{number_format(array_sum($existing_report['incomes']), 2)}}</td>
                        <td class="bold">{{$currency}}{{number_format(array_sum($desired_report['values']),2)}}</td>
                        <td class="bold">{{$currency}}{{number_format(array_sum($desired_report['incomes']), 2)}}</td>
                        <td class="bold">{{$currency}}{{number_format((array_sum($existing_report['values']) + array_sum($desired_report['values'])),2) }}</td>
                        <td class="bold">{{$currency}}{{number_format((array_sum($existing_report['incomes']) + array_sum($desired_report['incomes'])),2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
