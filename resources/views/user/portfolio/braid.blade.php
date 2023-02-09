@extends('layouts.user')

@section('script')

    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
 
    @include('user.portfolio.partials.braidassets_bar')
    <script> 
        var user_currency = "<?php echo $currency ?>";
        var ctx = document.getElementById('incomeDetailBar');
        var ctx2 = document.getElementById('valueDetailBar');
        var backgrounds =   <?php echo json_encode($backgrounds) ?>;
        var labels =   <?php echo json_encode($existing_details['labels']) ?>;
        var label_asset =   <?php echo json_encode($existing_details['label_asset']) ?>;
        var asset_incomes =   <?php echo json_encode($existing_details['asset_incomes']) ?>;
        var asset_values =   <?php echo json_encode($existing_details['asset_values']) ?>;
        generateBar(ctx, { values: asset_incomes, label: 'Asset Income' }); 
        generateBar(ctx2, { values: asset_values, label: 'Asset Value'}); 
    </script>   
   
@endsection

@section('content')
    <div class="row bg-white sm-default">
        <div class="d-block wd-f mb-2">
            <div class="pull-right mr-3">
                @if (isset($archive))
                    <a class="text-dark" href="{{ route('portfolio.braid', $braid) }}" data-toggle="tooltip" title="Click to view Asset"><i class="fa fa-sticky-note"></i></a>
                @else
                    <a class="text-dark" href="{{ route('portfolio.braid',  [$braid,'archive' => 'all']) }}" data-toggle="tooltip" title="Click to view Archived Asset"><i class="fa fa-archive"></i></a>
                @endif
            </div>
        </div>
        
        @if(count($existing) && !$archive)
            <div class="col-md-6 col-sm-12 my-3 phase1">
                <div class="chart my-3 elevation-3">
                    <h5 class="text-center my-2">Existing Asset Portfolio Income</h5>
                    <canvas id="incomeDetailBar" width="500px" style="width: 120%; margin:  0;"></canvas>
                </div>
            </div>
        @endif
        <div class="col-md-6 col-sm-12 my-3 phase2">
            <h5 class="text-center text-underline bold">Existing Assets</h5>
            @if(count($existing))
                <div class="braid-table">
                    <table class="table table-asset table-striped table-bordered">
                        <tr class="table-header-teal">    
                            <th>Asset Name </th> 
                            <th>Current Value</th>
                            <th>Average Income</th>
                        </tr>
                        @foreach ($existing as $asset)
                            <tr>      
                                <td><a href="{{ route('portfolio.braid.info', [$braid, $asset->id.'_'.$asset->name])}}" class="text-dark card-link">{{$asset->name}}</a></td>
                                <td><a href="{{ route('portfolio.braid.info', [$braid, $asset->id.'_'.$asset->name])}}" class="text-dark card-link">{{explode(" ", $asset->asset_currency)[0]}}{{number_format($asset->asset_value, 2)}}</a></td>
                                <td><a href="{{ route('portfolio.braid.info', [$braid, $asset->id.'_'.$asset->name])}}" class="text-dark card-link">{{explode(" ", $asset->asset_currency)[0]}}{{number_format($asset->monthly_roi, 2)}}</a></td>
                            </tr>
                        @endforeach
                    </table> 
                </div>
            @else
                <div class="jumbotron bg-light elevation-1">
                    <h4 class="text-center">No Existing Assets Yet</h4>
                </div>
            @endif
        </div>

        @if(count($existing) && !$archive)
            <div class="col-md-6 col-sm-12 my-3 phase2">
                <div class="chart my-3 elevation-3">
                    <h5 class="text-center my-2">Existing Asset Portfolio Value</h5>
                    <canvas id="valueDetailBar" width="500px" style="width: 120%; margin:  0;"></canvas>
                </div>
            </div>
        @endif
        <div class="col-md-6 col-sm-12 my-3 phase1">
            <h5 class="text-center text-underline bold">Desired Assets</h5>
            @if(count($desired))
                <div class="braid-table">
                    <table class="table table-striped table-asset table-bordered">
                        <tr class="table-header-teal">    
                            <th>Asset Name </th> 
                            <th>Current Value</th>
                            <th>Average Income</th>
                        </tr>
                        @foreach ($desired as $asset)
                            <tr>     
                                <td> {{$asset->name}}</td>
                                <td>{{explode(" ", $asset->asset_currency)[0]}}{{number_format($asset->asset_value)}}</td>
                                <td>{{explode(" ", $asset->asset_currency)[0]}}{{number_format($asset->monthly_roi)}} </td>
                            </tr>
                        @endforeach
                    </table> 
                </div>
            @else
                <div class="jumbotron bg-light elevation-1">
                    <h4 class="text-center">No Desired Assets Yet</h4>
                </div>
            @endif
        </div>
    </div>
    <script>
        var asset_cat = null;
        
    </script>
@endsection 
