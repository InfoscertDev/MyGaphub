@extends('layouts.user')

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
    <script>
        var ctx = document.getElementById('equityDetailBar');
        var user_currency = "<?php echo $currency ?>";
        var equity =   <?php echo json_encode($equity) ?>;
        var values =   <?php echo json_encode($equity_detail['percentages']) ?>;
        var labels =   <?php echo json_encode($equity_detail['labels']) ?>;
        var backgrounds =   <?php echo json_encode($backgrounds) ?>;
    </script>
    @include('user.360.partials.account_chartpie')
@endsection
 
@section('content')
<div class="row"> 
    <div class="col-md-5 col-sm-12">
        <div class="sm-px-1">
            <h2 class=" bold">{{ (isset($archive) ? 'Archived Home Equity' : 'Home Equity' ) }}:  @if(!$archive){{$currency}}{{ number_format($equity_detail['sum'], 2) }}   @endif      
                @if(!$archive)<span class="account_info info"  data-toggle="tooltip" data-placement="right" title="Here is an aggregation of the values you have in your homes owned by you."><i class="fa fa-info mx-2 "></i></span>@endif
             </h2>
          {{--@if(!$archive)<p class="wd-7 border text-center">Here is an aggregation of the values you have in your homes owned by you. </p> @endif--}}  
        </div>
        <div class="bar_chart mt-4 sm-px-2">
           
            <h5 class="text-underline  bold">{{ (isset($archive) ? 'Archived Homes & Equity' : 'List of Homes & their Equity' ) }}
                <span class="pull-right"> 
                    @if (isset($archive))
                        <a class="text-dark" href="{{ route('360.equity') }}" data-toggle="tooltip" title="Click to view Home Equity "><i class="fa fa-sticky-note"></i></a>
                    @else
                        <a class="text-dark" href="{{ route('360.equity', ['archive' => 'all']) }}" data-toggle="tooltip" title="Click to view Archived Home Equity"><i class="fa fa-archive"></i></a>
                    @endif    
                </span>
            </h5> 
            @if (count($equity))
                <ul class="list-group list-group-flush cash-tiles">
                    @foreach ($equity as $key => $equ) 
                        <li class="list-group-item my-1"  onclick="editAccount({{$key}})">
                            @if(!$archive && isset($backgrounds[$key]))<span class="account_detail" style="background: {{$backgrounds[$key]}};"> </span> @endif
                            <span class="mr-2"> {{ str_limit($equ->location, 13)  }} –</span> @if($equ->mortgage && $equ->mortgage->secured_against) <span class="mr-2 bold">{{str_limit($equ->mortgage->secured_against,15) }}:</span>@endif
                            <span class="mr-2">{{$currency}}{{ number_format($equ->equity, 2)  }}</span> 
                            <span class="pull-right"><i class="fa fa-chevron-right"></i> </span>
                        </li> 
                    @endforeach 
                    
                    @if(count($equity) > 6)
                        <button class="list-toggle mx-auto btn-sm wd-5 btn px-2 bg-none mt-2">
                            <span class="expand text-underline">View More</span>
                            <span class="collapse text-underline">View Less</span>
                        </button>
                    @endif  
                </ul> 
                @if(!$archive)
                    <div class="chart mt-3">
                        <h5 class="text-underline bold my-2">Equity Distribution</h5>
                        <canvas id="equityDetailBar" width="500px" style="width: 120%; margin: 0;"></canvas>
                        <div class="cell" id="wrapLegend"></div>
                    </div>
                @endif
            @else
                <div class="jumbotron bg-gray">
                    <h4 class="text-center">No Account Created Yet</h4>
                </div>
            @endif
        </div>
    </div> 
    <div class="col-md-7 col-sm-12 px-0">
        @include('user.360.wheel')
    </div>
</div>


<script>
    var account = null; 
    function editAccount(index){
        var equity = this.equity[index];
        this.account = equity;
        bindEquity(equity);
        $(`#editEquityModal`).modal('show');
    } 
    
    function initVariable(){
        // var description = document.getElementById('description');
        var equity_type = document.getElementById('equity_type');
        var locations = document.getElementById('locations');
        var market = document.getElementById('market');
        var date_acquired = document.getElementById('date_acquired');
        var open_balance = document.getElementById('open_balance'); 
        var mortgage = document.getElementById('mortgaged');
        var ownership = document.getElementById('ownership');
        var user_act = document.getElementById('msnxjnzxnxnakn'); 
    } 
    var account_chart = null;
    function bindEquity(account){ 
        // var description = document.getElementById('description');
        var equity_type = document.getElementById('equity_type');
        var locations = document.getElementById('locations');
        var market = document.getElementById('market');
        var date_acquired = document.getElementById('date_acquired');
        var open_balance = document.getElementById('open_balance'); 
        var mortgage = document.getElementById('mortgaged');
        var ownership = document.getElementById('ownership');
        var user_act = document.getElementById('msnxjnzxnxnakn'); 
        this.refreshChart(account.chart, true); 
        equity_type.textContent = (account.mortgage) ? account.mortgage.secured_against : '';
        // description.value = account.description; 
        locations.value = account.location;  
        ownership.value = Math.round(account.ownership); 
        market.value = account.market_value;
        date_acquired.value = account.date_acquired;
        mortgage.value = (account.mortgage) ? account.mortgage.current_balance : 0; 
        user_act.value = account.id; 
    }

    var editmode = false; 
    function toggleEdit(){ 
        this.initVariable();
        this.editmode = !this.editmode;
        if(this.editmode){
            // locations.disabled = false; 
            date_acquired.disabled = false;
            market.disabled = false;    $('#accountDistro').hide();
            $('#update_account').fadeIn(700); 
        }else{
            // locations.disabled = true; 
            date_acquired.disabled = true;
            market.disabled = true;  $('#accountDistro').fadeIn(700);
            $('#update_account').hide();
        }
    }
    
    $(function() {
        var link = window.location.href;
        if(link.match('new')) $('#equityModalAccount').modal('show');
        $('#removeAccount').on('click', function(){
            $('#confirmRemoveAccount').modal('show');
        }) 
        $('#confirmAccountRemove').on('click', function(){
            var header = "equhbvkjhvjhcfhxcfhgcfcvfcvgvbnstrgxfjbhmn";
            var add = "uyaghgbshgbhsjxbhsjxbvbhxdbvdhgbvghdvcghvgdhcvhsnbhsb";
            var id = account.id;
            $.ajax({
                type: 'GET',
                url: "<?php echo route('360.equity') ?>"+`?header=${header}&account=${id}&access=${add}`,
                success: function(data, status){
                    if(status == 'success'){
                        $('#justArchive').fadeIn();
                        $('#confirmRemoveAccount').modal('hide');
                        $('#editProtectMeModal').modal('hide');
                        $('#confirmAddAccount').modal('hide');
                        $('#succeesfullyArchived').modal({backdrop: 'static', keyboard: false});
                    }
                }
            });
        });
        $('#addAccount').on('click', function(){
            $('#confirmAddAccount').modal('show');
        }) 
        $('#confirmAccountAdd').on('click', function(){
            var header = "equhbvkjhvjhcfhxcfhgcfcvfcvgvbnstrgxfjbhmn";
            var add = "atyhgujhashgbsxdhgvshgsghfgnbvjbsjkbvjbvjhdx";
            var id = account.id;
            $.ajax({
                type: 'GET', 
                url: "<?php echo route('360.equity') ?>"+`?header=${header}&account=${id}&access=${add}`,
                success: function(data, status){ 
                    $('#justUnarchive').fadeIn();
                    $('#confirmRemoveAccount').modal('hide');
                    $('#editProtectMeModal').modal('hide');
                    $('#confirmAddAccount').modal('hide');
                    if(status == 'success') $('#succeesfullyArchived').modal({backdrop: 'static', keyboard: false});
                }
            });
        });
    });
</script>

 @include('user.360.details.equity')
 
@endsection