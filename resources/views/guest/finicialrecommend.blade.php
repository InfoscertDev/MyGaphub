@extends('layouts.guest')

@section('header')
  @include('inc.calculatorheader')
@endsection
 
@section('script')
    <script src="{{ asset('assets/js/Chart.js') }}"></script>    
    <script>  
        var user_currency = "<?php echo $current ?>";
        var chart = document.getElementById('recommendationChart');
        var labels = ['', 'Today', '','','Year ' + <?php echo ($time_finiancial_chart) ?>, '' ];
        var portfolio = "<?php echo $income ?>"; 
        var asset =   "<?php echo $cost ?>";
        var stepper = (+asset)  / 5.5 ;
        var data = [null,portfolio, null, null ,asset, null];
        if(chart){   
            chart.getContext('2d');
        
            var myAccountChart = new Chart(chart, {
                type: 'line',
                data: { 
                    datasets: [{
                        label: 'Financial Independece Journey',
                        data: data,
                        lineTension: 0,       
                        fill:false,
                        datalabels: {
                            color: 'transparent',
                        },
                        borderColor: 'rgba(0, 0, 0, 0.8)',
                        borderWidth: 1 //<-- set this
                    }],
                    labels: labels,
                },
                options: {
                    bezierCurve : false,
                    spanGaps: true,
                    animation: {
                        onComplete: done
                    },
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
                                    // padding: 10, max: +data[4] + 500,
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
            // document.getElementById('financialLegend').innerHTML = myAccountChart.generateLegend();
            // var ctx = chart.getContext('2d');
            // ctx.fillRect(chart);
            function done(){
                var jimg = document.getElementById('journey_img');
                jimg.value = myAccountChart.toBase64Image(); 
            }
        }
    </script>
@endsection

@section('content')
<div class="">
    <div class="wd-f pt-4 pb-0">
        <div class="gap-center">
            <h3 class="text-center mb-1 bold">Improve your status</h3>
            <div class="py-1"> 
                <div class="form-sheet sheet-plain">
                    <ul class="lists">
                        <li class="row mx-0">
                            <div class="col-md-8">
                                <label for="">Monthly Asset Portfolio Income (APi) needed</label>
                            </div>
                            <div class="col-md-4">
                                <div class="price-wrap">
                                    <input type="text" disabled value="{{$current}}{{  number_format($cost) }}" class="" name="cost" id="cost" required>
                                </div> 
                            </div>
                        </li>
                        <li class="row mx-0">
                            <div class="col-md-8">
                                <label for="">Your current monthly asset portfolio income</label>
                            </div>
                            <div class="col-md-4">
                                <div class="price-wrap">
                                    <input type="text" disabled value="{{$current}}{{ number_format($income, 2) }}" class="" name="income" id="income" required>
                                </div> 
                            </div>
                        </li>
                        <li class="row mx-0">
                            <div class="col-md-8">
                                <label for="">How much can you set aside monthly for investments?</label>
                            </div>
                            <div class="col-md-4">
                                <div class="price-wrap">
                                    <input type="text" disabled value="{{$current}}{{number_format($gap_invest, 2) }}" class="" name="gap_invest" id="gap_invest" required>
                                </div> 
                            </div>
                        </li>
                        <li class="row mx-0">
                            <div class="col-md-8">
                                <label for="" style="width: 110%">What is your expected Return on Capital Employed (ROCE)?
                                    <span class="info" data-toggle="tooltip" data-placement="right" title="To help you achieve the monthly financial target, you will need to consider investments with adequate returns. 
                                    Choose a desired return on capital employed. 
                                    (Typical conventional rate of return, is between 3% to 10%).
                                    "><i class="fa fa-info mx-2" ></i></span> 
                                </label>
                            </div>
                            <div class="col-md-4">
                                <div class="price-wrap percentage">
                                    <input type="number" disabled value="{{$roce}}" min="0" max="100" class="percent" name="roce" id="roce" required>
                                    <span class="txt-percent">%</span>
                                </div> 
                            </div>
                        </li>
                        <li class="details">
                            <div class="detail-left">
                            <h4 class="detail-title text-capitalize mt-3">Time to Financial Independence</h4>
                            </div>
                            <div class="detail-right px-0">
                                <div class="d-flex">
                                    <h5 class="col-total simp-box wd-7 mr-3 py-2 bold">{{ $time_finiancial }}</h5> 
                                    <h4 class="mt-2 mr-3"> {{ ($time_finiancial > 1 ) ? 'Years' : 'Year'}} </h4>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>  
    <div class="wd-f bg-white py-4">
        <div class="gap-center-bg">
            <div class="row mx-0">
                <div class="col-12">
                    <div class="card simp-pal ">
                        <div class="card-body">
                            <h5 class="text-center bold">Summary & Recommendations:</h5>
                            {{-- <p> You will need to acquire asset to the value of {{$current}}{{ number_format($invest)}} with returns at {{$roce}}% to generate a monthly income of {{$current}}{{ number_format($cost)}}.
                                Take a look at some of the asset acquisition opportunities listed by our verified providers. Account registration will be required.
                            </p> --}}
                            <p>You have a shortfall of {{$current}}{{ number_format($shortfall)}} in your asset portfolio income. In order to become financially independent, you will need to acquire assets to the 
                                value of {{$current}}{{ number_format($avr)}} generating income at {{$roce}}% ROCE to make up this shortfall.
                            {{-- </p><p>     --}}
                                Setting aside {{$current}}{{ number_format($gap_invest)}} monthly for investment will allow you become financially independent in {{ $time_finiancial }} years.
                                @if ($user)
                                    Explore the opportunities listed by our partners  from your GAPhub account. Also, visit the acquisition section of your account and start using My GAPhub to build a profitable asset portfolio globally
                                @else
                                    Log onto your GAPhub account to see some of the opportunities listed by our partners. Visit the acquisition section of your account and start using MyGAPhub to build a profitable asset portfolio globally.
                                @endif
                            </p>
                        </div> 
                    </div>
                </div>
            </div>
            
            <div class="row mx-auto">
                <div class="chart mx-auto">
                    <canvas id="recommendationChart" class="mt-3"  width="500" height="400" style="width: 100%; margin: 0;"></canvas>
                    <div id='financialLegend' class='financialLegend'></div>
                    
                </div> 
            </div>  
            @if ($user)
                <div class="row mx-0 mt-4 justify-content-center">
                    <a class="btn-pry btn text-white mr-3 mt-1" href="{{ route('home') }}">Continue</a>
                </div>
            @else 
                <div class="row mx-0 mt-4 justify-content-center">
                    <a class="btn-save mr-3 mt-1" href="{{ route('register') }}">Continue</a>
                    {{-- <button class="btn btn-pry text-white">Download Copy</button> --}}
                    
                        {{-- <button type="submit" class="btn btn-pry"> Download Copy</button> --}}
                    <div id="normal">
                        <button type="submit" class="btn btn-pry" id="download"  onclick="downloadMail()">Download Copy</button>
                    </div>
                    <div id="sendmail" class="none">
                        <form id="download" method="POST" enctype="multipart/form-data" onsubmit="sendMail()" action="{{ route('finicial.download') }}">
                            {{ csrf_field() }}
                            <input type="hidden" value="" alt="" name="journey" id="journey_img" class="d-none">
                            <input type="hidden" name="tok" value="aghvbjbsnvnabnmbzjabmbnjsxbbjjsnm">
                            <div class="form-inline">
                                <input type="email" name="email" placeholder="Email" class="form-control mx-3" id="" required>
                                <button type="submit" class="btn btn-pry sm-center"> Send Email</button>
                            </div>
                        </form>
                    </div>  
                </div>
            @endif
        </div>
    </div> 

    
    <div class="modal fade" id="emailSent" tabindex="-1" role="dialog" aria-labelledby="emailSent" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Check Your Email</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h5 class="text-center">Financial Independence Status Result Successfully Sent</h5>
            </div>
            <div class="modal-footer mx-auto">
              <button type="button" data-dismiss="modal" class="btn btn-pry px-5">OK</button>
            </div>
          </div>
        </div>
    </div>
</div>
<script>
   function downloadMail(){
        $("#normal").hide();
        $("#sendmail").fadeIn(400);
    } 
    function sendMail(){
        setTimeout(()=> {
            $("#emailSent").modal('show');
        }, 3000);
    }
</script>

@endsection

