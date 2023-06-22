@extends('layouts.user')

@section('script')

    <script>
        var averageChart = document.getElementById('averageSeedChart');
        var currentSeed = document.getElementById('currentSeedChart');
        var targetChart = document.getElementById('targetSeedChart');

        // var labels = ['Jul', 'Aug', 'Sep', 'Oct', 'Nov'];
        // historicSeedBar

    </script>
     @include('user.seed.partials.history_barchart')
@endsection

@section('content')

    <div class="row  mt-3 mb-2">
        <div id="barChartSection" class="chart text-center my-3  mr-4 col-md-10 col-sm-12 mx-auto">
            <h4 class="tbold my-2 mb-3">Historic SEED Chart
                <!-- <i class="text-right fa fa-user" ></i> -->
            </h4>
            <canvas id="historicSeedBar" style=" "></canvas>
        </div>

        <div  id="lineChartSection" style="display: none" class="chart text-center my-3  mr-4 col-md-10 col-sm-12 mx-auto">
            <h4 class="tbold my-2 mb-3">Historic SEED Chart</h4>
            <canvas id="historicSeedLine" style=" "></canvas>
        </div>
    </div>

    <div class="row mt-4 mb-3">
        <div class="col-12 mt-4">
            <p class="text-center text-muted font-italic">Click  <span class="text-underline" onclick="toggleChart()">here</span>  to switch the chart or click <a href="{{ route('seed.history') }}" class="text-muted text-underline">here</a>  return to the tiles </p>
        </div>
    </div>


    <script>
        let viewmode = false;
        function toggleChart(){
            if(viewmode){
                $('#lineChartSection').show();
                $('#barChartSection').hide();
            }else{
                $('#lineChartSection').hide();
                $('#barChartSection').show();
            }
            viewmode = !viewmode
        }

    </script>
@endsection
