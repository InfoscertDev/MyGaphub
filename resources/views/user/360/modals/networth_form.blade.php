<form action="{{ route('360.store.net') }}" method="post">
    @csrf
    <div class="my-2">
        <div class="form-group row">
            <div class="col-md-5 col-sm-12">
                Your Current Asset Value:
            </div>
            <div class="col-md-7 col-sm-12">
                <li class="list-group-item">
                    <div>{{$currency}}<span class="text-success mr-2 bold" id="asset_value">{{($net['asset'])}}</span> <a href="{{ route('360.asset') }}" class="text-muted"><span class="text-underline">(go to Assets to edit)</span>  </a>   </div>
                </li>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-5 col-sm-12">
                Your Current Liabilities Value:   
            </div>
            <div class="col-md-7 col-sm-12">
                <li class="list-group-item">
                    <div>{{$currency}}<span class="text-danger mr-2 bold" id="liability_value"> {{ ($net['liability'])  }}</span> <a href="{{ route('360.liability') }}" class="text-muted"><span class="text-underline">(go to Liabilities to edit)</span>  </a>    </div>
                </li>
            </div>
        </div> 
        <div class="form-group row">
            <div class="col-md-5 col-sm-12">
                Your Current Home Value: 
            </div>
            <div class="col-md-7 col-sm-12">
                <li class="list-group-item">
                    <div>{{$currency}}<span class="text-success mr-2 bold" id="home_value">{{ ($net['home'])  }}</span> <a href="{{ route('360.asset') }}" class="text-muted"><span class="text-underline">(go to Assets to edit)</span>  </a>   </div>
                </li>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-5 col-sm-12">
                Your Current Mortgage Value:   
            </div>
            <div class="col-md-7 col-sm-12">
                <li class="list-group-item">
                    <div>{{$currency}} <span class="text-danger mr-2 bold" id="mortgage_value">{{ ($net['mortgage']) }}</span> <a href="{{ route('360.mortgage') }}" class="text-muted"><span class="text-underline">(go to Mortgage to edit)</span>   </a>  </div>
                </li> 
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-5 col-sm-12">
                Your Current Home Equity:  
            </div>
            <div class="col-md-7 col-sm-12">
                <li class="list-group-item">
                    <div class="text-center">{{$currency}}<span class="text-success  bold mr-2" id="equity_value">{{ ($net_detail['equity']) }}</span> </div>
                </li>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-5 col-sm-12">
                Add Home Equity to your Net Worth:
            </div>
            <div class="col-md-7 col-sm-12">
                <div class=" switch text-left">
                    <input class="" id="switch_net" name="analytics" type="checkbox" oninput="calcNetWorth()" /><label data-off="OFF" data-on="ON" for="switch_net"></label>
                </div>
            </div>
        </div>
        <div class="form-group row"> 
            <div class="col-md-5 col-sm-12">
                Your Current Net Worth:
            </div>
            <div class="col-md-7 col-sm-12">
                <li class="list-group-item">
                    <div class="text-center">{{$currency}}<span class="text-success  bold mr-2" id="net_worth"></span> </div>
                </li>
            </div>
        </div>  
        <div class="form-group row">
            <div class="col-md-5 col-sm-12"></div>
            <div class="text-center col-md-7 col-sm-12">
                <small class="d-block text-center">Are the figures above a true representation of your net worth? If yes, confirm below</small>
                <button type="submit" class="btn btn-sm btn-pry px-4">Confirm</button>
            </div>
        </div>
    </div>
</form> 
 
<script>
    function calcNetWorth(){
        var asset = document.getElementById('asset_value').textContent,
            liability = document.getElementById('liability_value').textContent,
            home = document.getElementById('home_value').textContent,
            equity = document.getElementById('equity_value').textContent,
            mortgage = document.getElementById('mortgage_value').textContent;

        var net_worth = document.getElementById('net_worth'), 
            switch_net = document.getElementById('switch_net'); 
        var net = (+asset) - (+liability );  
        if(switch_net.checked){
            var net = +net + +equity;
        }   
        net_worth.textContent = parseInt(net).toFixed(2).toLocaleString();
    }
    calcNetWorth();
</script>