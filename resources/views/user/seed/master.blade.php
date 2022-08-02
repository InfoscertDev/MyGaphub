@extends('layouts.user')


@section('script')
@include('user.seed.partials.seedpie_options')
<script>
    var averageChart = document.getElementById('averageSeedChart');
    var currentSeed = document.getElementById('currentSeedChart');
    var targetChart = document.getElementById('targetSeedChart');

    var labels = ['Savings', 'Education', 'Expenditure', 'Discretionary'];
    var average_chart = {
        values : <?php  echo json_encode($average_detail['seed_web']) ?>,
    }; 
    var current_chart = {
        values : <?php  echo json_encode($current_detail['seed_web']) ?>,
    };
    var target_chart = {
        values : <?php  echo json_encode($target_detail['seed_web']) ?>,
    };
    // console.log(account_chart);
    refreshSeedChart(average_chart, averageChart)
    refreshSeedChart(current_chart, currentSeed)
    refreshSeedChart(target_chart, targetChart)
</script>
@endsection 


@section('content')
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
    <div class="row mt-2 mb-4 px-0 sm-default mx-auto">
        <div class="col-md-4 px-2">
            <div class="">
                <h6 class="text-underline text-uppercase bold my-2 text-center">Average Seed </h6>
                <canvas id="averageSeedChart" width="500px" style="min-width: 100%; margin:  0; min-height: 170px"></canvas>    
            </div>
        </div>
        
        <div class="col-md-4 px-0">
            <div class="">
                <h6 class="text-underline text-uppercase bold my-2 text-center">Current Seed </h6>
                <label for="" class="text-center d-block"> {{ date('F')}} {{ date('Y')}} </label>
                @if($current_detail['total'])
                    <canvas id="currentSeedChart" width="500px" style="min-width: 110%; margin:  0; min-height: 200px"></canvas>   
                @else
                    <label for="" class="text-center d-block mt-1 mb-3"> 0% </label>
                @endif
                <div class="mt-4 mb-2 text-center mx-auto">
                    <a href="{{ route('seed.create') }}" class="btn btn-pry" > Create a Budget</a>    
                    <!-- <button class="btn btn-pry" data-toggle="modal" data-target="#createBudgetModal" >Create a Budget</button>     -->
                </div>       
            </div>
        </div>
        
        <div class="col-md-4 px-2">
            <div class="mt-2">
                <h6 class="text-underline text-uppercase bold my-2 text-center">Target Seed </h6>
                @if($target_detail['total'])
                    <canvas id="targetSeedChart" width="500px" style="min-width: 100%; margin:  0; min-height: 170px"></canvas>
                @else
                    <label for="" class="text-center d-block"> {{ date('Y')+1}} </label>
                    <label for="" class="text-center d-block mt-1 mb-3"> 0% </label>
                @endif

                <div class="mt-4 mb-2 text-center mx-auto">
                    <button class="btn btn-pry" data-toggle="modal" data-target="#nextyearBudgetModal">Set Next Year Goal</button>    
                </div>        
            </div>
        </div>

    </div> 
    <div class="">
        <div>
            <span class="seed-target">
                <img src="{{ asset('/assets/icon/seed_target.png') }}" class="ml-2 mr-0" width="40px" alt="">
                Are you on target with your saving goals?
            </span> 
        </div>
        <div class=" my-3 mx-auto wd-5 sm-wdf"> 
            <!-- @include('user.seed.modals.current_budget') -->
            @include('user.seed.modals.nextyear_budget')
            @include('user.seed.modals.average_budget')
            @include('user.seed.add_record_spent')
            <div class="cell" id="wrapLegend"></div>
        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-md-8 col-sm-12 mx-auto">
            <h5 class="text-underline text-uppercase bold my-2 text-center">Table View</h5>
            <table class="table  table-striped table-bordered">
                <tr class="table-header">    
                    <th class="bold">SEED </th>  
                    <th class="bold text-uppercase text-underline hand" data-toggle="modal" data-target="#averageBudgetModal" >Average </th> 
                    <th class="bold text-uppercase text-underline hand" > <a href="{{ route('seed.create') }}" class="text-dark">Current</a>  </th> 
                    <th class="bold text-uppercase text-underline hand" data-toggle="modal" data-target="#nextyearBudgetModal">Target </th>  
                </tr>
                @php
                    $seeds = ['Savings', 'Education','Expenditure','Discretionary'];
                @endphp
                @foreach ($seeds as $key => $seed)
                    <tr>  
                        <td>{{$seed}} </td>
                        @php
                            $seed = strtolower($seed);
                        @endphp
                        <td>{{$currency}}{{number_format($average_detail['table'][$seed],2)}} </td>
                        <td> {{$currency}}{{number_format($current_detail['table'][$seed],2)}} </td>
                        <td>{{$currency}}{{number_format($target_detail['table'][$seed],2)}} </td>
                    </tr>
                @endforeach
                <tr>      
                    <td class="bold">Total</td>
                    <td class="bold"> {{$currency}}{{number_format($average_detail['total'],2)}} </td>
                    <td class="bold"> {{$currency}}{{number_format($current_detail['total'],2)}} </td>
                    <td class="bold"> {{$currency}}{{number_format($target_detail['total'],2)}} </td>
                </tr>
            </table> 
        </div>
        <div class="col-md-2 col-sm-12 col-xs-12 sm-center">
            <button class="btn btn-pry btn-history" data-toggle="modal" data-target="#createRecordSpentModal">Record Spent</button>    
            <br><br>
            <button class="btn btn-pry btn-history" disabled>Historic SEED</button>    
        </div>
    </div>

@endsection