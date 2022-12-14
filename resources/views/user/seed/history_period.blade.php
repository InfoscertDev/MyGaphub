@extends('layouts.user')

@section('script')

    <script>
        var averageChart = document.getElementById('averageSeedChart');
        var currentSeed = document.getElementById('currentSeedChart');
        var targetChart = document.getElementById('targetSeedChart');

        var labels = ['Jul', 'Aug', 'Sep', 'Oct', 'Nov'];
        // historicSeedBar
        console.log(labels);


    </script>
     @include('user.seed.partials.history_barchart')
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="text-center bolder">
                <h4>{{ date('F')}} {{ date('Y')}}</h4>
            </div>
        </div>
        <br> <br>
        <div class="col-md-5 col-sm-12 sm-default mt-3">
            <div class="d-flex">
                <h3 class=" mr-2"> Budget </h3>
                <div id="view_budget_amount"   onclick="toggleBudgetMode()">
                    <span class="px-2 h3">{{$currency}}<span id="budget_amount">{{ number_format($current_seed->budget_amount, 2) }}</span>  </span>
                </div>
            </div>
        </div>
    </div>
    <br>

    <div class="row  mt-3 mb-2">
        <div class="chart text-center my-3  mr-4 col-md-10 col-sm-12 mx-auto">
            <h4 class="tbold my-2 mb-3">Historic SEED Chart</h4>
            <canvas id="historicSeedBar" style=" "></canvas>
        </div>

    </div>

    <div class="row mt-4 mb-3">
        <div class="col-12 mt-4">
            <p class="text-center text-muted font-italic">Click any of the tiles to view details or edit values </p>
        </div>
    </div>


    <script>
        let viewmode = false;
        function toggleBudgetMode(){
            if(viewmode){
                $('#view_budget_amount').show();
                $('#edit_budget_amount').hide();
            }else{
                $('#view_budget_amount').hide();
                $('#edit_budget_amount').show();
            }
            viewmode = !viewmode
        }

    </script>
@endsection
