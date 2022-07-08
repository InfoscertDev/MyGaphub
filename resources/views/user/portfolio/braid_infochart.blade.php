@extends('layouts.user')

@section('script')
    @include('user.portfolio.partials.braidassets_bar')
    <script> 
        var user_currency = "<?php echo $currency ?>";
        var asset_currency = "<?php echo explode(" ", $asset->asset_currency)[0] ?>";
        var ctx = document.getElementById('incomeDetailBar');
        var ctx2 = document.getElementById('valueDetailBar');
        var backgrounds =   <?php echo json_encode($backgrounds) ?>;
        var braidExpenditureValue = document.getElementById('braidExpenditureValue');
        var braidCurriculum = document.getElementById('braidCurriculum'); 
    </script>       
    @include('user.portfolio.partials.expenditure_values_bar')
    @include('user.portfolio.partials.curriculum_values_bar')
@endsection
 

@section('content')
    @php
        $asset_currency =  explode(" ", $asset->asset_currency)[0];
        $total_management = [];
        $total_taxes = [];
        $total_maintenance = [];
        $total_others = [];
        $total_revenue = [];
        $total_expenditure = [];
        $total_net = [];
        
        foreach($asset_finicial as $finicial) {
            array_push($total_management, $finicial->management);
            array_push($total_taxes, $finicial->taxes);
            array_push($total_maintenance, $finicial->maintenance);
            array_push($total_others, $finicial->others);
            array_push($total_revenue, $finicial->revenue);
            array_push($total_expenditure, $finicial->expenditure);
            array_push($total_net, $finicial->net_income);
        };
    @endphp
    <div class="row bg-white">
        <div class="col-md-6 col-sm-12">
            <h5 class="text-underline">Expenditure Information</h5>
            <div class="braid-table">
                <table class="table sm-table-responsive table-striped table-bordered">
                    <tr class="table-header">    
                        <th class="bold">Period </th> 
                        <th class="bold">Management </th> 
                        <th class="bold">Taxes </th> 
                        <th class="bold">Maintenance </th> 
                        <th class="bold">Others </th> 
                    </tr> 
                    @foreach ($asset_finicial as $finicial)
                        <tr>     
                            <td class="bold"> {{ date('Y',strtotime($finicial->period))}} {{ date('M',strtotime($finicial->period))}} </td>
                            <td>{{$asset_currency}}{{number_format($finicial->management,2)}} </td>
                            <td>{{$asset_currency}}{{number_format($finicial->taxes,2)}} </td>
                            <td>{{$asset_currency}}{{number_format($finicial->maintenance,2)}} </td>
                            <td>{{$asset_currency}}{{number_format($finicial->others,2)}} </td>
                        </tr>
                    @endforeach
                
                    <tr>     
                        <td class="bold">Total</td>
                        <td class="bold">  {{$asset_currency}}{{number_format(array_sum($total_management),2)}} </td>
                        <td class="bold">  {{$asset_currency}}{{number_format(array_sum($total_taxes),2) }} </td>
                        <td class="bold">  {{$asset_currency}}{{number_format(array_sum($total_maintenance),2)}} </td>
                        <td class="bold">  {{$asset_currency}}{{number_format(array_sum($total_others),2)}} </td>
                    </tr>
                </table> 
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="chart my-3 elevation-3">
                <h5 class="text-center my-2">Expenditure Chart</h5>
                <canvas id="braidExpenditureValue" width="500px" style="width: 120%; margin:  0; min-height: 190px"></canvas>
            </div> 
        </div>
        <div class="col-md-6 col-sm-12 mt-3">
            <h5 class="text-underline">Cummulative Income / Expenditure Information</h5>
            <div class="braid-table">
                <table class="table sm-table-responsive table-striped table-bordered">
                    <tr class="table-header">    
                        <th class="bold">Period </th>  
                        <th class="bold">Revenue </th> 
                        <th class="bold">Expenditure </th> 
                        <th class="bold">Net Income </th> 
                    </tr> 
                 
                    @foreach ($asset_finicial as $finicial)
                        <tr>     
                            <td class="bold"> {{ date('Y',strtotime($finicial->period))}} {{ date('M',strtotime($finicial->period))}} </td>
                            <td>{{$asset_currency}}{{number_format($finicial->revenue,2)}} </td>
                            <td>{{$asset_currency}}{{number_format($finicial->expenditure,2)}} </td>
                            <td>{{$asset_currency}}{{number_format($finicial->net_income,2)}} </td>
                        </tr>
                    @endforeach
                    <tr>     
                        <td class="bold">Total</td>
                        <td class="bold">  {{$asset_currency}}{{number_format(array_sum($total_revenue),2)}} </td>
                        <td class="bold">  {{$asset_currency}}{{number_format(array_sum($total_expenditure),2) }} </td>
                        <td class="bold">  {{$asset_currency}}{{number_format(array_sum($total_net),2)}} </td>
                    </tr>
                </table> 
            </div>
        </div> 
        <div class="col-md-6 col-sm-12 mt-3">
            <div class="chart my-3 elevation-3">
                <h5 class="text-center my-2">Cummulative Income/Expenditure Chart</h5>
                <canvas id="braidCurriculum" width="500px" style="width: 120%; margin:  0;"></canvas>
            </div> 
        </div>
    </div> 
    <div class="row">
        <div class="col-12">
            <button class="btn btn-table mt-2 mr-3 sm-mr-2 px-2">
                <a href="{{ route('portfolio.braid.info', [$braid, $asset->id.'_'.$asset->name])}}" class="text-dark card-link"> <i class="fa fa-chevron-left mr-3"></i> Back to Asset Details</a>
            </button>
        </div>
    </div>
    
@endsection 