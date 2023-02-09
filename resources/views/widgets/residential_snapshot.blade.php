<div class="card-body"> 
    <div class="chart mt-0">  
        <h5 class="text-center bold">Primary Residence Home Equity</h5>
        @if($residential['primary'])
            <canvas id="equityChartBar" width="" style="max-width: 450px !important; min-height: 225px !important;  margin: 0;"></canvas>
            <div class="row">
                <div class="col-9 text-center">
                    <h6 class="bold"> {{$currency}}
                    @if(isset($residential['primary']->mortgage))
                        {{ number_format(($residential['primary']->market_value - $residential['primary']->mortgage->current_balance),2)  }}
                    @else 
                        0
                    @endif
                    </h6>
                    <h5>You own  {{($residential['primary']) ? $residential['primary']->ownership : 0}}% of your home</h5>
                </div>
                <div class="col-3">
                    <span class="text-right tp-3" style="position: relative;"> 
                        <a href="{{route('360.equity')}}" class="small bold text-dark text-underline">View Detail</a>
                    </span>
                </div>
            </div>
        @else
            <div class="jumbotron bg-white">
                <h4 class="text-center">You are yet to add your Home Equity</h4>
                <div class="row">  
                    <div class="col-9"></div>
                    
                    <div class="col-3">
                        <span class="text-right tp-3" style="position: relative;"> 
                            <a href="{{route('360.equity',['new' =>'1'])}}" class="small bold text-dark text-underline">Set here</a>
                        </span>
                    </div>
                </div>
            </div>
        @endif
    </div> 
</div> 