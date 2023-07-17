@extends('layouts.user')

@section('script')
    <script>
         var user_currency = "<?php echo $currency ?>";
        var ctx = document.getElementById('expenditureDetailBar');
        var values =   <?php echo json_encode($net_detail['values']) ?>;
        var labels =   <?php echo json_encode($net_detail['labels']) ?>;
        var backgrounds =   <?php echo json_encode($backgrounds) ?>;
        var total_equity = <?php echo $net_detail['equity'] ?>;
        var total_liability = <?php echo $net_detail['liability'] ?>;
        var total_asset = <?php echo $net_detail['asset'] ?>;

    </script>
     @include('user.360.partials.account_chartbar')
@endsection

@section('content')

    @if ($isNet->net_confirm)
        <div class="row">
            <div class="col-md-5 col-sm-12 ">
                <div class="">
                    <h2 class=" bold">Net Worth: {{$currency}}<span id="total_net">{{ number_format($net_detail['sum'], 2) }} </span>
                        <span class="account_info info"  data-toggle="tooltip" data-placement="right" title="Here is the difference between what you own and what you owe financially.."><i class="fa fa-info mx-2 "></i></span>
                    </h2>
                  {{-- <p class="wd-7 border text-center">Here is the difference between what you own and what you owe financially. </p>--}}
                </div>
                <div class="bar_chart mt-4">
                        <h5 class="text-underline  bold">Assets Vs Liabilities</h5>
                        <ul class="list-group list-group-flush cash-tiles">
                            @foreach ($net_detail['labels'] as $key => $equ)
                                @php
                                    if(strtolower($equ) == 'assets') $link = 'asset';
                                    if(strtolower($equ) == 'liabilities') $link = 'liability';
                                    if(strtolower($equ) == 'pensions') $link = 'retirement';
                                    if(strtolower($equ) == 'home equity') $link = 'equity';
                                @endphp
                                <div class="my-1">
                                    <a href="{{route('360.'.$link)}}" class="card-link ">
                                        <li class="list-group-item">
                                            <span class="mr-2 bold"> Current {{$equ}}:</span> <span class="mr-2">{{$currency}}{{ number_format($net_detail['values'][$key], 2) }} </span>

                                            @if($equ == 'Home Equity')
                                                <div class=" switch pull-right">
                                                    <input class=""  oninput="updateNetWorth()" id="switch_equity" name="analytics" type="checkbox" /><label data-off="OFF" data-on="ON" for="switch_equity"></label>
                                                </div>
                                            @endif
                                        </li>
                                    </a>
                                </div>
                            @endforeach
                        </ul>
                    <div class="chart my-3  mr-4">
                        <h5 class="text-underline bold my-2 mb-3">Net Worth Distribution</h5>
                        <canvas id="expenditureDetailBar" style="width: 380px !important; "></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-sm-12 px-0">
                @include('user.360.wheel')
            </div>
        </div>
    @else
        <div class="row my-4">
            <div class="col-md-5 col-sm-12">
                <h5 class="text-underline bold my-2">Recently Updated Tiles</h5>
                <ul class="list-group list-group-flush cash-tiles">
                    @if (count($tiles))
                        @foreach ($tiles as $key => $tile)
                        <li class="list-group-item my-1">
                            <a href="{{ url('/home/360/'.$tile['account_name'] )}}" class="card-link text-white">
                                <span class="mr-2 text-capitalize"> {{$tile['account_name']}} –</span> <span class="mr-2 bold"> {{$tile['account_type']}}  </span> <span class="mr-2">{{$currency}}{{ number_format( $tile['sum'] , 2) }}</span>
                            </a>
                        </li>
                        @endforeach
                    @else
                        <div class="jumbotron bg-gray mt-2">
                            <h4 class="text-center">No Recently Updated Tiles</h4>
                        </div>
                    @endif
                </ul>
            </div>
            <div class="col-md-7 col-sm-12 px-0">
                @include('user.360.wheel')
            </div>
        </div>
        <div class="row">
            @include('user.360.modals.net')
            <script>
                $(function() {  $('#netModalAccount').modal('show'); })
            </script>
        </div>
    @endif
@endsection
