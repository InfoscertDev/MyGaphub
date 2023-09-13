@extends('layouts.user')

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
    <script>
        const nonPortfolioRecord = document.getElementById('nonPortfolioRecord');
        let user_currency = "<?php echo $currency ?>";
        let labels = <?php echo json_encode($chart['label_asset']) ?>;
        let income = <?php echo json_encode($chart['values']) ?>;
        let tithe = <?php echo json_encode($chart['tithe_values']) ?>;
        let taxes = <?php echo json_encode($chart['taxes_values']) ?>;
        let net = <?php echo json_encode($chart['net_values']) ?>;

        if(nonPortfolioRecord){
            nonPortfolioRecord.getContext('2d');
            const myExpenditureChart = new Chart(nonPortfolioRecord, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                            label: 'Gross Income',
                            data: income,
                            backgroundColor: "#8C8D86",
                            borderColor: "#8C8D86",
                            datalabels: {
                                color: '#fff',
                                position: 'top',// anchor: 'end',
                            }
                        },{
                            label: 'Taxes',
                            data: taxes,
                            backgroundColor: '#E6C069',
                            borderColor: '#E6C069',
                            datalabels: {
                                color: '#fff',
                                position: 'top',// anchor: 'end',
                            }
                        },{
                            label: 'Tithe',
                            data: tithe,
                            backgroundColor: '#897B61',
                            borderColor: '#897B61',
                            datalabels: {
                                color: '#fff',
                                position: 'top',// anchor: 'end',
                            }
                        },{
                            label: 'Net Income',
                            data: net,
                            backgroundColor: '#9796785',
                            borderColor: '#9796785',
                            datalabels: {
                                color: '#fff',
                                position: 'top',// anchor: 'end',
                            }
                        }
                    ]
                },
                options: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        onClick: (e) => e.stopPropagation()
                    },
                    scales: {
                        yAxes:[{
                            display: true,
                            ticks: {
                                beginAtZero: true,
                                callback: function(value, index, values) {
                                    return user_currency +  parseInt(value).toLocaleString();
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
                    },
                }
            });
        }
    </script>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <span class="mr-3 pb-2" id="goback">
            <a href="#" class="text-dark bold" onclick="window.history.go(-1); return false;" ><i class="fa fa-chevron-left mr-1"></i>  Back</a>
        </span>
        <div class="mt-2 mb-5">
           <h4 class="bold text-center">{{ $income->income_name }} Average Income   {{ $currency }}{{ number_format($income->amount, 2) }}</h4>
        </div>
    </div>

    <div class="col-md-5 col-sm-12">
        <div id="accordion">
            @foreach($non_portfolios as $portfolio)
                <div class="card mb-3 bg-gray">
                    <div class="accord-header" id="heading{{$portfolio->id}}">
                        <div class="wd-f mb-0">
                            <span class="gap-card-title accord-title">
                                {{ date('M Y', strtotime($portfolio->period))  }}
                                <span class="ml-5 text-center">
                                    {{ $currency }}{{ number_format( $portfolio->amount -  array_sum([$portfolio->tithe, $portfolio->taxes]), 2) }}
                                </span>
                            </span>
                            <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapse{{$portfolio->id}}" aria-expanded="true" aria-controls="collapse{{$portfolio->id}}">
                                <i class="fa fa-chevron-down"></i>
                            </button>
                        </div>
                    </div>

                    <div id="collapse{{$portfolio->id}}" class="collapse" aria-labelledby="heading{{$portfolio->id}}" data-parent="#accordion">
                        <div class="card-body pb-1">
                            <div class="d-flex my-2">
                                <span class="col"> Gross Income</span>
                                <span class="col">
                                    {{ $currency }}{{ number_format($portfolio->amount, 2) }}
                                </span>
                            </div>
                            <div class="d-flex my-2">
                                <span class="col"> Tithe Paid</span>
                                <span class="col">
                                    {{ $currency }}{{ number_format($portfolio->tithe, 2) }}
                                </span>
                            </div>
                            <div class="d-flex my-2">
                                <span class="col"> Taxes Paid</span>
                                <span class="col">
                                    {{ $currency }}{{ number_format($portfolio->taxes, 2) }}
                                </span>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    <div class="col-md-7 col-sm-12">
        <div class="chart my-3 elevation-3">
            <h5 class="text-center my-2">Month's Income Chart</h5>
            <canvas id="nonPortfolioRecord" width="500px" style="width: 120%; margin:  0; min-height: 190px"></canvas>
        </div>
    </div>
</div>

@endsection
