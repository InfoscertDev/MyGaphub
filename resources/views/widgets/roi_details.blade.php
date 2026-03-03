<script>
    function refreshJouney(){
        var user_currency = "<?php echo $currency ?>";
        var chart = document.getElementById('retirementChart');
        var labels = ['', 'Today', '','','Year ' + <?php echo number_format($roi_detail['time_finiancial']) ?>, '' ];
        var portfolio = "<?php echo $improve_status['portfolio'] ?>";
        var asset =   "<?php echo $improve_status['monthly_asset'] ?>";
        var stepper = (+asset) / 5.5 ;
        var data = [null,portfolio,null, null,asset, null];
        // console.log(data);
       
        if(chart){ 
            chart.getContext('2d');
            var myAccountChart = new Chart(chart, {
                type: 'line',
                data: {
                    datasets: [{
                        label: 'Financial Independece Journey',
                        data: data,
                        fill:false,
                        datalabels: {
                            color: 'transparent',
                        },
                        borderColor: 'rgba(0, 0, 0, 0.8)',
                        borderWidth: 1 //<-- set this
                    }],
                    labels: labels,

                },
                // plugins:[{
                //     beforeDraw: chart => {
                //     var xAxis = chart.scales['x-axis-0'];
                //     const scales = chart.chart.config.options.scales;
                //     scales.xAxes[0].ticks.padding = yAxis.top - yAxis.getPixelForValue(0) + 6;
                //     // scales.yAxes[0].ticks.padding = xAxis.getPixelForValue(0) - xAxis.right + 6;
                //     }
                // }],
                options: {
                    spanGaps: true,
                    bezierCurve : false,
                    tooltips: {
                        enabled: false
                    },
                    elements: {
                        point:{
                            radius: 0
                        }
                    },
                    legend: {
                        display: false, 
                        borderColor: 'rgba(155, 155, 155, 0.8)',
                        fontSize: 10, 
                        labels: {
                            borderWidth: 1, //<-- set this
                            fontSize: 12,
                            boxHeight: 5,
                            fontColor: '#474747',
                        },
                        borderWidth: 1, 
                        onClick: (e) => e.stopPropagation(),
                        fontColor: 'black',
                        position: 'bottom'
                    },
                    scales: { 
                        yAxes:[{
                            display: true,
                            ticks: { 
                                    beginAtZero: true,
                                    // padding: 10,
                                    max: +data[4] + 500,
                                    callback: function(value, index, values) {
                                        return user_currency + parseInt(value).toLocaleString();
                                }
                            },
                        }],
                        xAxes:[{
                            display: true,
                            ticks: {  
                                padding: 10, 
                                offsetGridLines: true,
                                beginAtZero: true
                            }, 
                            gridLines: {
                                tickMarkLength: 0   
                            }
                        }],
                    }, 
                
                }
            });
            document.getElementById('financialLegend').innerHTML = myAccountChart.generateLegend();
        }
    }
</script>
<div class="modal fade" id="roiDetailModal" tabindex="-1" role="dialog" aria-labelledby="addWheelActModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content b-rad-20 wd-c"> 

            <div class="modal-body">
                <div class="form-sheet sheet-plain">
                    <ul class="lists text-left">
                        <li class="row mx-0">
                            <div class="col-md-8">
                                <label for="">Monthly Asset Portfolio Income (APi) needed</label>
                            </div>
                            <div class="col-md-4">
                                <div class="price-wrap">
                                    <input type="text" disabled value="{{$currency}}{{  number_format($improve_status['monthly_asset']) }}" class="" name="cost" id="cost" required>
                                </div> 
                            </div>
                        </li>
                        <li class="row mx-0">
                            <div class="col-md-8">
                                <label for="">Your current monthly asset portfolio income</label>
                            </div>
                            <div class="col-md-4">
                                <div class="price-wrap">
                                    <input type="text" disabled value="{{$currency}}{{  number_format($improve_status['portfolio'], 2) }}" class="" name="income" id="income" required>
                                </div> 
                            </div>
                        </li>
                        <li class="row mx-0">
                            <div class="col-md-8">
                                <label for="">How much can you set aside monthly for investments?</label>
                            </div>
                            <div class="col-md-4">
                                <div class="price-wrap">
                                    <input type="text" disabled value="{{$currency}}{{  number_format($improve_status['investment'], 2) }}" class="" name="investment" id="investment" required>
                                </div> 
                            </div>
                        </li>
                        <li class="row mx-0">
                            <div class="col-md-8">
                                <label for="" style="width: 110%">What is your expected Return on Capital Employed (ROCE)?
                                </label>
                            </div>
                            <div class="col-md-4">
                                <div class="price-wrap percentage">
                                    <input type="number" disabled value="{{$improve_status['roce']}}" min="0" max="100" class="percent" name="roce" id="roce" required>
                                    <span class="txt-percent">%</span>
                                </div> 
                            </div>
                        </li>
                        <li class="details">
                            <div class="detail-left pr-4">
                            <h4 class="detail-title text-capitalize mt-3">Time to Financial Independence</h4>
                            </div>
                            <div class="detail-right px-0">
                                <div class="d-flex">
                                    <h5 class="col-total simp-box wd-7 mr-3 py-2 bold">{{ number_format($roi_detail['time_finiancial'], 0) }}</h5> 
                                    <h4 class="mt-2 mr-3" style="font"> {{ ($roi_detail['time_finiancial'] > 1 ) ? 'Years' : 'Year'}} </h4>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="row mx-0">
                    <div class="col-12">
                        <div class="card simp-pal elevation-3 ">
                            <div class="card-body">
                                <h5 class="text-center">Summary & Recommendations:</h5>
                                <p class="text-left">You have a shortfall of {{$currency}}{{ number_format($roi_detail['shortfall'])}} in your asset portfolio income. In order to become financially independent, you will need to acquire assets to the 
                                    value of {{$currency}}{{ number_format($roi_detail['asset_require'])}} generating income at {{$improve_status['roce']}}% ROCE to make up this shortfall.
                                {{-- </p><p>     --}}
                                    Setting aside {{$currency}}{{  number_format($improve_status['investment'], 2) }} monthly for investment will allow you become financially independent in {{ number_format($roi_detail['time_finiancial'], 0) }}  {{($roi_detail['time_finiancial'] > 1 )? 'years': 'year'}}.
                                    Explore the opportunities listed by our partners  from your GAPhub account. Also, visit the acquisition section of your account and start using My GAPhub to build a profitable asset portfolio globally
                                   
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-3">
                    <div class="chart mt-3">
                        {{-- <h5 class="my-3">Financial Independence Journey</h5> --}}
                        <canvas id="retirementChart" width="400px" style="width: 100%; margin: 0px;"></canvas>
                        <div id='financialLegend' class='financialLegend'></div>
                        <script> </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>