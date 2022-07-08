@extends('layouts.user')

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
    <script>
        var user_currency = "<?php echo $currency ?>";
        var ctx = document.getElementById('expenditureDetailBar');
        var values =   <?php echo json_encode($expenditure_detail['values']) ?>;
        var labels =   <?php echo json_encode($expenditure_detail['labels']) ?>;
        var backgrounds =   ['#aaa', '#aaa', '#aaa','#aaa', '#aaa'];

        if(ctx){
            ctx.getContext('2d');
            var myExpenditureChart = new Chart(ctx, {
                type: 'bar',
                data: {    
                    labels: labels, 
                    datasets: [{
                        data: values,
                        backgroundColor: backgrounds,   
                        borderColor: backgrounds,  
                        datalabels: {
                            color: '#fff',
                            position: 'top'
                        }  
                    }]
                }, 
                options: {
                    legend: {
                        display: false,
                        position: 'bottom'
                    },
                    scales: { 
                        yAxes:[{
                            display: true,
                            ticks: { 
                                beginAtZero: true,
                                callback: function(value, index, values) {
                                    return user_currency + parseInt(value).toLocaleString();
                                }
                            },
                        }]
                    },
                    plugins: { 
                        datalabels: {
                            formatter: function(value, context) {
                                return user_currency + parseInt(value).toLocaleString();
                            }
                        }
                    }
                    // onClick: graphClickEvent ,
                    // onHover: graphClickEvent ,
                }
            });
        } 
    </script>
@endsection

@section('content')
<div class="row">
    <div class="col-md-5 col-sm-12">
        <div class="">
            <h2 class=" bold">Cost of Living: {{$currency}}{{ number_format($expenditure_detail['sum'], 2) }}          
                <span class="account_info info"  data-toggle="tooltip" data-placement="right" title="This is the amount you spend on your upkeep as an individual or a family."><i class="fa fa-info mx-2 "></i></span>
            </h2>
            <!-- <p class="wd-7 border text-center">This is the amount you spend on your upkeep as an individual or a family. </p> -->
        </div>
        <div class="bar_chart mt-4">
          
                <h5 class="text-underline  bold">Your Average Cost of Living</h5>
                <ul class="list-group list-group-flush cash-tiles">
                    @foreach ($expenditure_detail['labels'] as $key => $equ) 
                        <li class="list-group-item my-1"> 
                          <span class="mr-2 bold"> Your {{$equ }}:</span> <span class="mr-2">{{$currency}}{{ number_format($expenditure_detail['values'][$key], 2) }} </span> 
                        </li> 
                    @endforeach 
                </ul> 
                <div class="mb-3 mt-2">
                    <a href="{{route('seed')}}" class="card-link ">
                        {{--  <img src="{{asset('/assets/icon/Seed_red.png')}}" class="icon" alt="" style=""> --}}
                        <button class="btn btn-pry px-4 text-center">  
                           <i class="fa fa-pen mr-3"></i>  Set Budget in SEED
                        </button>
                    </a>
                </div>
            <div class="chart my-3">
                <h5 class="text-underline bold my-2">Cost of Living Distribution</h5>
                <canvas id="expenditureDetailBar" width="500px" style="width: 120%; margin:  0;"></canvas>
            </div>
        </div>  
    </div> 
    <div class="col-md-7 col-sm-12 px-0">
        @include('user.360.wheel')
    </div>
</div>
@endsection