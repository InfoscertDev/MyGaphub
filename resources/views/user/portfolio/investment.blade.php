@extends('layouts.user')

@section('script')

    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
 
    @include('user.portfolio.partials.braidassets_bar')
    <script>  
        var user_currency = "<?php echo $currency ?>";
        var ctx = document.getElementById('businessDetailBar');
        var ctx1 = document.getElementById('riskDetailBar');
        var ctx2 = document.getElementById('intellectualDetailBar');
        var ctx3 = document.getElementById('appreciatingDetailBar');
        var ctx4 = document.getElementById('depreciatingDetailBar');
        var backgrounds =   <?php echo json_encode($backgrounds) ?>;
        var labels =   <?php echo json_encode($braid_details['business_details']['labels']) ?>;
        var risk_labels =   <?php echo json_encode($braid_details['risk_details']['labels']) ?>;
        var appreciating_labels =   <?php echo json_encode($braid_details['appreciating_details']['labels']) ?>;
        var intellectual_labels =   <?php echo json_encode($braid_details['intellectual_details']['labels']) ?>;
        var depreciating_labels =   <?php echo json_encode($braid_details['depreciating_details']['labels']) ?>;
        
        var asset_values =   <?php echo json_encode($braid_details['business_details']['asset_values']) ?>;
        var risk_values =   <?php echo json_encode($braid_details['risk_details']['asset_values']) ?>;
        var appreciating_values =   <?php echo json_encode($braid_details['appreciating_details']['asset_values']) ?>;
        var intellectual_values =   <?php echo json_encode($braid_details['intellectual_details']['asset_values']) ?>;
        var depreciating_values =   <?php echo json_encode($braid_details['depreciating_details']['asset_values']) ?>;
          
        generateBar(ctx, { values: asset_values}); 
        generateBar(ctx1, { values: risk_values, labels: risk_labels}); 
        generateBar(ctx2, { values: appreciating_values, labels: appreciating_labels}); 
        generateBar(ctx3, { values: intellectual_values, labels: intellectual_labels}); 
        generateBar(ctx4, { values: depreciating_values, labels: depreciating_labels}); 
        // console.log(risk_values, appreciating_values)
    </script>   
   
@endsection

@section('content')
    <div class="row bg-white sm-default">
        <div class="col-12">
            <h2 class=" bold"> {{ (isset($archive) ? 'Archived Investment' : 'Investment' ) }}: @if(!$archive){{$currency}}{{ number_format($investment_sum, 2) }}@endif
                @if(!$archive)<span class="account_info info"  data-toggle="tooltip" data-placement="right" title="Here is an aggregation of all your debt that are secured against properties."><i class="fa fa-info mx-2 "></i></span>@endif
            </h2> 
        </div>
        <!-- Bussiness -->
        @if(count($braid_table['business']) && !$archive)
            <div class="col-md-6 col-sm-12 my-3 phase1">
                <div class="chart my-3 elevation-3">
                    <h5 class="text-center my-2">Business Asset Portfolio Value</h5>
                    <canvas id="businessDetailBar" width="500px" style="width: 120%; margin:  0;"></canvas>
                </div>
            </div>
        @endif  
        <div class="col-md-6 col-sm-12 my-3 phase2">
            <h5 class="text-center text-underline bold">Business Assets</h5>
            @if(count($braid_table['business']))
                <div class="braid-table">
                    <table class="table table-asset table-striped table-bordered">
                        <tr class="table-header-teal">    
                            <th>Asset Name </th> 
                            <th>Current Value</th>
                            <th>Average Income</th>
                        </tr>
                        @foreach ($braid_table['business'] as $asset)
                            <tr>      
                                <td><a href="{{ route('portfolio.braid.info', [$asset->asset_class, $asset->id.'_'.$asset->name])}}" class="text-dark card-link">{{$asset->name}}</a></td>
                                <td><a href="{{ route('portfolio.braid.info', [$asset->asset_class, $asset->id.'_'.$asset->name])}}" class="text-dark card-link">{{explode(" ", $asset->asset_currency)[0]}}{{number_format($asset->asset_value, 2)}}</a></td>
                                <td><a href="{{ route('portfolio.braid.info', [$asset->asset_class, $asset->id.'_'.$asset->name])}}" class="text-dark card-link">{{explode(" ", $asset->asset_currency)[0]}}{{number_format($asset->monthly_roi, 2)}}</a></td>
                            </tr>
                        @endforeach
                        <tr class="table-header-teal">    
                            <th>Total </th> 
                            <th> {{explode(" ", $asset->asset_currency)[0]}}{{ number_format(array_sum(array_column($braid_table['business'],'asset_value')), 2  ) }} </th>
                            <th>{{explode(" ", $asset->asset_currency)[0]}}{{ number_format(array_sum(array_column($braid_table['business'],'monthly_roi')), 2) }}</th>
                        </tr>
                    </table> 
                </div>
            @else
                <div class="jumbotron bg-light elevation-1">
                    <h4 class="text-center">No Business Assets Yet</h4>
                </div>
            @endif
        </div>
        
        <!-- Risk -->
        @if(count($braid_table['risk']) && !$archive)
            <div class="col-md-6 col-sm-12 my-3 phase1">
                <div class="chart my-3 elevation-3">
                    <h5 class="text-center my-2">Risk Asset Portfolio Value</h5>
                    <canvas id="riskDetailBar" width="500px" style="width: 120%; margin:  0;"></canvas>
                </div>
            </div>
        @endif  
        <div class="col-md-6 col-sm-12 my-3 phase2">
            <h5 class="text-center text-underline bold">Risk Assets</h5>
            @if(count($braid_table['risk']))
                <div class="braid-table">
                    <table class="table table-asset table-striped table-bordered">
                        <tr class="table-header-teal">    
                            <th>Asset Name </th> 
                            <th>Current Value</th>
                            <th>Average Income</th>
                        </tr>
                        @foreach ($braid_table['risk'] as $asset)
                            <tr>      
                                <td><a href="{{ route('portfolio.braid.info', [$asset->asset_class, $asset->id.'_'.$asset->name])}}" class="text-dark card-link">{{$asset->name}}</a></td>
                                <td><a href="{{ route('portfolio.braid.info', [$asset->asset_class, $asset->id.'_'.$asset->name])}}" class="text-dark card-link">{{explode(" ", $asset->asset_currency)[0]}}{{number_format($asset->asset_value, 2)}}</a></td>
                                <td><a href="{{ route('portfolio.braid.info', [$asset->asset_class, $asset->id.'_'.$asset->name])}}" class="text-dark card-link">{{explode(" ", $asset->asset_currency)[0]}}{{number_format($asset->monthly_roi, 2)}}</a></td>
                            </tr>
                        @endforeach
                        <tr class="">    
                            <th>Total </th> 
                            <th> {{explode(" ", $asset->asset_currency)[0]}}{{ number_format(array_sum(array_column($braid_table['risk'],'asset_value')), 2  ) }} </th>
                            <th>{{explode(" ", $asset->asset_currency)[0]}}{{ number_format(array_sum(array_column($braid_table['risk'],'monthly_roi')), 2) }}</th>
                        </tr>
                    </table> 
                </div>
            @else
                <div class="jumbotron bg-light elevation-1">
                    <h4 class="text-center">No Risk Assets Yet</h4>
                </div>
            @endif
        </div>

        <!-- Appreciating -->
        @if(count($braid_table['appreciating']) && !$archive)
            <div class="col-md-6 col-sm-12 my-3 phase1">
                <div class="chart my-3 elevation-3">
                    <h5 class="text-center my-2">Appreciating Asset Portfolio Value</h5>
                    <canvas id="appreciatingDetailBar" width="500px" style="width: 120%; margin:  0;"></canvas>
                </div>
            </div>
        @endif  
        <div class="col-md-6 col-sm-12 my-3 phase2">
            <h5 class="text-center text-underline bold">Appreciating Assets</h5>
            @if(count($braid_table['appreciating']))
                <div class="braid-table">
                    <table class="table table-asset table-striped table-bordered">
                        <tr class="table-header-teal">    
                            <th>Asset Name </th> 
                            <th>Current Value</th>
                            <th>Average Income</th>
                        </tr>
                        @foreach ($braid_table['appreciating'] as $asset)
                            <tr>      
                                <td><a href="{{ route('portfolio.braid.info', [$asset->asset_class, $asset->id.'_'.$asset->name])}}" class="text-dark card-link">{{$asset->name}}</a></td>
                                <td><a href="{{ route('portfolio.braid.info', [$asset->asset_class, $asset->id.'_'.$asset->name])}}" class="text-dark card-link">{{explode(" ", $asset->asset_currency)[0]}}{{number_format($asset->asset_value, 2)}}</a></td>
                                <td><a href="{{ route('portfolio.braid.info', [$asset->asset_class, $asset->id.'_'.$asset->name])}}" class="text-dark card-link">{{explode(" ", $asset->asset_currency)[0]}}{{number_format($asset->monthly_roi, 2)}}</a></td>
                            </tr>
                        @endforeach
                        <tr class="">    
                            <th>Total </th> 
                            <th> {{explode(" ", $asset->asset_currency)[0]}}{{ number_format(array_sum(array_column($braid_table['appreciating'],'asset_value')), 2  ) }} </th>
                            <th>{{explode(" ", $asset->asset_currency)[0]}}{{ number_format(array_sum(array_column($braid_table['appreciating'],'monthly_roi')), 2) }}</th>
                        </tr>
                    </table> 
                </div>
            @else
                <div class="jumbotron bg-light elevation-1">
                    <h4 class="text-center">No Appreciating Assets Yet</h4>
                </div>
            @endif
        </div>

        <!-- Intellectual -->
        @if(count($braid_table['intellectual']) && !$archive)
            <div class="col-md-6 col-sm-12 my-3 phase1">
                <div class="chart my-3 elevation-3">
                    <h5 class="text-center my-2">Intellectual Asset Portfolio Value</h5>
                    <canvas id="intellectualDetailBar" width="500px" style="width: 120%; margin:  0;"></canvas>
                </div>
            </div>
        @endif    
        <div class="col-md-6 col-sm-12 my-3 phase2">
            <h5 class="text-center text-underline bold">Intellectual Assets</h5>
            @if(count($braid_table['intellectual']))
                <div class="braid-table">
                    <table class="table table-asset table-striped table-bordered">
                        <tr class="table-header-teal">    
                            <th>Asset Name </th> 
                            <th>Current Value</th>
                            <th>Average Income</th>
                        </tr>
                        @foreach ($braid_table['intellectual'] as $asset)
                            <tr>      
                                <td><a href="{{ route('portfolio.braid.info', [$asset->asset_class, $asset->id.'_'.$asset->name])}}" class="text-dark card-link">{{$asset->name}}</a></td>
                                <td><a href="{{ route('portfolio.braid.info', [$asset->asset_class, $asset->id.'_'.$asset->name])}}" class="text-dark card-link">{{explode(" ", $asset->asset_currency)[0]}}{{number_format($asset->asset_value, 2)}}</a></td>
                                <td><a href="{{ route('portfolio.braid.info', [$asset->asset_class, $asset->id.'_'.$asset->name])}}" class="text-dark card-link">{{explode(" ", $asset->asset_currency)[0]}}{{number_format($asset->monthly_roi, 2)}}</a></td>
                            </tr>
                        @endforeach
                        <tr class="">    
                            <th>Total </th> 
                            <th> {{explode(" ", $asset->asset_currency)[0]}}{{ number_format(array_sum(array_column($braid_table['intellectual'],'asset_value')), 2  ) }} </th>
                            <th>{{explode(" ", $asset->asset_currency)[0]}}{{ number_format(array_sum(array_column($braid_table['intellectual'],'monthly_roi')), 2) }}</th>
                        </tr>
                    </table> 
                </div>
            @else
                <div class="jumbotron bg-light elevation-1">
                    <h4 class="text-center">No Intellectual Assets Yet</h4>
                </div>
            @endif
        </div>

        <!-- D -->
        @if(count($braid_table['depreciating']) && !$archive)
            <div class="col-md-6 col-sm-12 my-3 phase1">
                <div class="chart my-3 elevation-3">
                    <h5 class="text-center my-2">Depreciating Asset Portfolio Value</h5>
                    <canvas id="depreciatingDetailBar" width="500px" style="width: 120%; margin:  0;"></canvas>
                </div>
            </div>
        @endif    
        <div class="col-md-6 col-sm-12 my-3 phase2">
            <h5 class="text-center text-underline bold">Depreciating Assets</h5>
            @if(count($braid_table['depreciating']))
                <div class="braid-table">
                    <table class="table table-asset table-striped table-bordered">
                        <tr class="table-header-teal">    
                            <th>Asset Name </th> 
                            <th>Current Value</th>
                            <th>Average Income</th>
                        </tr>
                        @foreach ($braid_table['depreciating'] as $asset)
                            <tr>      
                                <td><a href="{{ route('portfolio.braid.info', [$asset->asset_class, $asset->id.'_'.$asset->name])}}" class="text-dark card-link">{{$asset->name}}</a></td>
                                <td><a href="{{ route('portfolio.braid.info', [$asset->asset_class, $asset->id.'_'.$asset->name])}}" class="text-dark card-link">{{explode(" ", $asset->asset_currency)[0]}}{{number_format($asset->asset_value, 2)}}</a></td>
                                <td><a href="{{ route('portfolio.braid.info', [$asset->asset_class, $asset->id.'_'.$asset->name])}}" class="text-dark card-link">{{explode(" ", $asset->asset_currency)[0]}}{{number_format($asset->monthly_roi, 2)}}</a></td>
                            </tr>
                        @endforeach
                        <tr class="">    
                            <th>Total </th> 
                            <th> {{explode(" ", $asset->asset_currency)[0]}}{{ number_format(array_sum(array_column($braid_table['depreciating'],'asset_value')), 2  ) }} </th>
                            <th>{{explode(" ", $asset->asset_currency)[0]}}{{ number_format(array_sum(array_column($braid_table['depreciating'],'monthly_roi')), 2) }}</th>
                        </tr>
                    </table> 
                </div>
            @else
                <div class="jumbotron bg-light elevation-1">
                    <h4 class="text-center">No Depreciating Assets Yet</h4>
                </div>
            @endif
        </div>

    </div>
    <script>
        var asset_cat = null;
        
    </script>
@endsection 
