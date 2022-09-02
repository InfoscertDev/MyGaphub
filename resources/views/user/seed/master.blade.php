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
        @include('user.seed.modals.view_transactions')
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
        <!-- Check if it a new user -->
        @if($previous_budgets > 1)
            @if(isset($current_seed->priviewed)  && $current_seed->priviewed == 0)
                <div class="modal show" id="monthlyPriviewedMode" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-hidden="true">
                    <div class="modal-dialog  modal-dialog-centered" role="document">
                        <div class="modal-content modal-content-centre b-rad-20">
                            <div class="modal-body">
                                <div class="py-5">
                                    <h5 class="py-1 text-center">Budget from last month has been rolled over</h5>
                                    <div class="py-2 h5 text-center">
                                        <a href="{{ route('seed.create', ['preview' =>'7w6refsgwubjhsdbfgcyuxbhsjwdcfuhghvbqansmdbjhjnhjb' ]) }}" class="text-dark text-underline font-italic card-link mr-3">Make Changes </a> or
                                        <a href="{{ route('seed', ['preview' =>'7w6refsgwubjhsdbfgcyuxbhsjwdcfuhghvbqansmdbjhjnhjb' ]) }}" class="text-dark text-underline font-italic card-link">Keep </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $(function() {  $('#monthlyPriviewedMode').modal('show'); })
                </script>
            @elseif(request()->input('record'))
                <script>
                    $(function() {  $('#createRecordSpentModal').modal('show'); })
                </script>
            @elseif(request()->input('preview'))
                <div class="modal show" id="chooseSeedMode" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-hidden="true">
                    <div class="modal-dialog  modal-dialog-centered" role="document">
                        <div class="modal-content modal-content-centre b-rad-20">
                            <div class="modal-body">
                                <div class="py-4">
                                    <ul class="list-group list-group-flush cash-tiles portfolio-tiles">
                                        <li class="list-group-item my-2 text-center"> <a href="{{route('seed', ['record' =>'sjhdbcfnkdmffgcyu' ]) }}" class="card-link text-white"> Record Spend</a> </li>
                                        <li class="btn list-group-item my-2 text-center"><a href="{{ route('seed') }}" class="card-link text-white">View Budget</a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $(function() {  $('#chooseSeedMode').modal('show'); })
                </script>

            @endif
        @endif

        @if(request()->input('spend'))

            <script>

                $(function() {    handleRecordView(); })

                function handleRecordView(){
                    let id = "<?php  echo request()->input('dygvhsbjyfctguysbhdd')?>";
                    $('#viewRecordDetailModal').modal('show');
                    console.log(id);
                    $.ajax({
                        type: 'GET',
                        url: '/home/seed/record/'+id,
                        success: function(data, status){
                            record = data.data;
                            $('.ico').text(record.label.charAt(0))
                            $('#record_label').text(record.label)
                            $('#spent_current_month').text(record.spent_current_month).toFixed(2);
                            $('#spent_last_month').text(record.spent_last_month).toFixed(2);
                            $('#record_amount').text((record.amount).toFixed(2))
                            $('#record_date').text(record.date)
                            $('#record_note').text(record.note)
                        },
                        error: function (request, status, error) {
                            // console.log(status, error)
                            // alert(request.responseText);
                        }
                    });
                }
            </script>
        @endif
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
                <div class="mt-4 mb-2 text-center mx-auto" style="width: 115%;">
                    <a href="{{ route('seed.create') }}" class="btn btn-pry" >
                    {{  ($current_detail['total']) ? $currency : '' }} {{  ($current_detail['total']) ? number_format($current_detail['total'],2) : "Create a Budget" }}
                    </a>
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
                        <td> <a href="{{ route('seed.summary', $seed) }}" class="text-dark">{{$currency}}{{number_format($current_detail['table'][$seed],2)}}</a> </td>
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
            @if($current_detail['total'])
                <button class="btn btn-pry btn-history" data-toggle="modal" data-target="#createRecordSpentModal">Record Spend</button>
            @endif
            <br><br>
            <button class="btn btn-pry btn-history" disabled>Historic SEED</button>
        </div>
    </div>

@endsection
