@extends('layouts.user')

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
    <script>
        var ctx = document.getElementById('assetDetailBar');
        var user_currency = "<?php echo $currency ?>";
        // var equity =   <?php echo json_encode($equity) ?>;
        var values =   <?php echo json_encode($asset_detail['percentages']) ?>;
        var labels =   <?php echo json_encode($asset_detail['labels']) ?>;
        var backgrounds =   <?php echo json_encode($backgrounds) ?>;
    </script>
    @include('user.360.partials.account_chartpie')
@endsection

@section('content')
<div class="row">
    <div class="col-md-5 col-sm-12">
        <div class="">
            <h2 class=" bold">Assets: {{$currency}}{{ number_format($asset_detail['sum'], 2) }}
                <span class="account_info info"  data-toggle="tooltip" data-placement="right" title="This includes all your investments, Cash and Home Equity."><i class="fa fa-info mx-2 "></i></span>
                {{--<p class="wd-7 border text-center px-2">This includes all your investments, Cash and Home Equity </p> --}}
             </h2>
        </div>
        <div class="bar_chart mt-4">
            <h5 class="text-underline  bold">Current Asset</h5>
            <ul class="list-group list-group-flush cash-tiles">
                <div>
                    <a href="{{ route('360.investment')}}" class="card-link d-block">
                        <li class="list-group-item my-1"  >
                            @if(isset($backgrounds[0]))<span class="account_detail" style="background: {{$backgrounds[0]}};"> </span> @endif
                            <span class="mr-2"> Investments -</span> <span class="mr-2 bold">Portfolio:</span> <span class="mr-2">{{$currency}}{{ number_format($asset_detail['values'][0], 2)  }}</span>
                            <span class="pull-right"><i class="fa fa-chevron-right"></i> </span>
                        </li>
                    </a>
                </div>
                <div>
                    <a href="{{ route('360.cash')}}" class="card-link d-block">
                        <li class="list-group-item my-1"  >
                            @if(isset($backgrounds[1]))<span class="account_detail" style="background: {{$backgrounds[1]}};"> </span> @endif
                            <span class="mr-2"> Cash -</span> <span class="mr-2 bold">360<sup>o</sup>:</span> <span class="mr-2">{{$currency}}{{ number_format($asset_detail['values'][1], 2)  }}</span>
                            <span class="pull-right"><i class="fa fa-chevron-right"></i> </span>
                        </li>
                    </a>
                </div>
            </ul>
            <h5 class="text-underline  bold mt-3">Non-Current Asset</h5>
            <ul class="list-group list-group-flush cash-tiles">
                <div>
                    <a href="{{ route('360.retirement')}}" class="card-link d-block">
                        <li class="list-group-item my-1"  >
                            @if(isset($backgrounds[2]))<span class="account_detail" style="background: {{$backgrounds[2]}};"> </span> @endif
                            <span class="mr-2"> Pension -</span> <span class="mr-2 bold">360<sup>o</sup>:</span> <span class="mr-2">{{$currency}}{{ number_format($asset_detail['values'][2], 2)  }}</span>
                            <span class="pull-right"><i class="fa fa-chevron-right"></i> </span>
                        </li>
                    </a>
                </div>
                <div>
                    <a href="{{ route('360.equity')}}" class="card-link d-block">
                        <li class="list-group-item my-1"  >
                            @if(isset($backgrounds[2]))<span class="account_detail" style="background: {{$backgrounds[2]}};"> </span> @endif
                            <span class="mr-2"> Home Equity -</span> <span class="mr-2 bold">360<sup>o</sup>:</span> <span class="mr-2">{{$currency}}{{ number_format($asset_detail['values'][3], 2)  }}</span>
                            <span class="pull-right"><i class="fa fa-chevron-right"></i> </span>
                        </li>
                    </a>
                </div>
            </ul>

            <div class="chart mt-3">
                <h5 class="text-underline bold my-2">Asset Distribution</h5>
                <canvas id="assetDetailBar" width="500px" style="width: 120%; margin: 0;"></canvas>
                <div class="cell" id="wrapLegend"></div>
            </div>
        </div>
    </div>
    <div class="col-md-7 col-sm-12 px-0">
        @include('user.360.wheel')
    </div>
</div>


<script>
    function editAccount(index){
        var equity = this.equity[index];
        bindEquity(equity);
        $(`#editEquityModal`).modal('show');
    }

    function initVariable(){

        var description = document.getElementById('description');
        var equity_type = document.getElementById('equity_type');
        var locations = document.getElementById('locations');
        var market = document.getElementById('market');
        var open_balance = document.getElementById('open_balance');
        var mortgage = document.getElementById('mortgaged');
        var ownership = document.getElementById('ownership');
        var user_act = document.getElementById('msnxjnzxnxnakn');
    }
    var account_chart = null;
    function bindEquity(account){
        var description = document.getElementById('description');
        var equity_type = document.getElementById('equity_type');
        var locations = document.getElementById('locations');
        var market = document.getElementById('market');
        var open_balance = document.getElementById('open_balance');
        var mortgage = document.getElementById('mortgaged');
        var ownership = document.getElementById('ownership');
        var user_act = document.getElementById('msnxjnzxnxnakn');
        this.refreshChart(account.chart);
        equity_type.textContent = account.equity_type;
        description.value = account.description;
        locations.value = account.location;
        ownership.value = Math.round(account.ownership);
        market.value = account.market_value;
        mortgage.value = (account.mortgage) ? account.mortgage.current_balance : 0;
        user_act.value = account.id;
    }

    var editmode = false;
    function toggleEdit(){
        this.initVariable();
        this.editmode = !this.editmode;
        if(this.editmode){
            description.disabled = false; locations.disabled = false;
            market.disabled = false;    $('#accountDistro').hide();
            $('#update_account').fadeIn(700);
        }else{
            description.disabled = true; locations.disabled = true;
            market.disabled = true;  $('#accountDistro').fadeIn(700);
            $('#update_account').hide();
        }
    }
</script>


<div class="modal fade" id="editEquityModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content b-rad-20 wd-c">
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob">  Home Equity  - <span id="equity_type"></span>
                        <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                    </h2>

                </div>
                <p class="wd-7 mx-auto text-center">(view and edit)</p>
                <form id="" action="{{ route('360.update.equity', 0) }}" method="POST">
                    @csrf
                    <input type="hidden" id="msnxjnzxnxnakn" name="sjnxjknsxkjnxijnsxknixncio">

                    <div class="my-2">
                        <div class="d-block" style="height: 34px;">
                            <span class="pull-right">
                                <button type="button" class="btn btn-pry fa fa-edit btn-sm" onclick="toggleEdit()"></button>
                            </span>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                Home Value:
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <input type="text" id="market" name="market" disabled required class="form-control b-rad-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                               Mortgage:
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <input type="number" id="mortgaged" name="mortgaged" disabled required class="form-control b-rad-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                Ownership Percentage:
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <input type="number"  id="ownership" name="ownership" disabled  class="form-control b-rad-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">Type of Ownership: </div>
                            <div class="col-md-7 col-sm-12">

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                Home Address:
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <input type="text" id="locations" name="locations" disabled required class="form-control b-rad-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                Date Acquired:
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <input type="date" name="target_date" disabled required id="target_date" class="form-control b-rad-10">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                Home Description:
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <textarea name="description"  disabled id="description" class="form-control b-rad-10" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                {{-- <small class="text-center">Fields are mandatory</small> --}}
                            </div>
                            <div class="text-center col-md-6 col-sm-12">
                                <button type="submit" id="update_account" style="display: none;" class="btn btn-sm btn-pry px-4">Submit</button>
                            </div>
                        </div>
                    </div>

                </form>
                <div id="accountDistro" class="text-center mx-auto">
                    @include('user.360.partials.chartpie_options')
                    <div class="chart mt-3">
                        <h5 class="my-3">Ownership Chart</h5>
                        <canvas id="equityChartBar" width="400px" style="width: 100%; margin: 0px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
