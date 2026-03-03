
<div class="card-body"> 
    <div class="chart mt-1"> 
        <h5 class="text-center bold">Net Worth</h5>
        <canvas id="netDetailBar" style="width: 380px !important; "></canvas>
    </div>
    <div class="d-flex mt-2">
        <div class="col-8">
            <h6 class="text-center"> Your Total Net Worth is <span class="bold">{{$currency}}{{number_format($net_detail['sum'], 2)}}</span> </h6>
        </div>
        <div class="col-4">
            <span class="text-right"> 
                <a href="{{route('360.net')}}" class="small bold text-dark text-underline">View Detail</a>
            </span>
        </div>
    </div>
</div> 