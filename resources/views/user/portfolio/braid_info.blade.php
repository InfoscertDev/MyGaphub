@extends('layouts.user')

@section('script')
<!-- Note JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.4.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.js"></script>
<script src="{{ asset('assets/js/datepaginator.js') }}"></script>  
@include('user.portfolio.partials.braidassets_bar')
    <script>  
        $(function () { 
            var link = window.location.href;
            var kpi = link.split('act=')[1];
            if(kpi) {
                $('#assetDetailTable').hide(); $('#action_lane').hide();
                $('#netIncomeLane').hide(); $('#updateAssetTable').fadeIn();
            }
        });
    
        var user_currency = "<?php echo $currency ?>";
        var ctx = document.getElementById('incomeDetailBar');
        var ctx2 = document.getElementById('valueDetailBar');
        var backgrounds =   <?php echo json_encode($backgrounds) ?>;
        
        var labels = <?php echo json_encode($asset_finicial_detail['expenditure_labels']) ?>;
        var asset_incomes =   <?php echo json_encode($asset_finicial_detail['net']) ?>;
        var asset_values =   <?php echo json_encode($asset_finicial_detail['asset_values']) ?>;
        generateBar(ctx, { values: asset_incomes }); 
        generateBar(ctx2, { values: asset_values }); 
        var braidValue = document.getElementById('braidValue');
        var braidAsset = document.getElementById('braidAsset');
        var netIncome = document.getElementById('netIncome');
    </script>     
    @include('user.portfolio.partials.info_values_bar')
    @include('user.portfolio.partials.info_asset_bar')
    @include('user.portfolio.partials.info_netincome_bar')

    
@endsection

@section('content')
 
    <div class="row bg-white">
        <div class="col-md-3 col-sm-12 text-center">
            <form action="{{ route('portfolio.update.photo', $asset->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="mx-2">
                    @if($asset->photo)
                        <img src="{{$asset->photo_url}}" id="asset_profile"  ondblclick=" return document.getElementById('upload_asset_profile').click();" class="asset-profile img img-responsive  img-thumnail">
                    @else
                        <img src="{{asset('/assets/images/add_camera.png') }}" id="asset_profile"  onclick=" return document.getElementById('upload_asset_profile').click();" class="asset-profile img img-responsive  img-thumnail" data-toggle="tooltip" title="Click to add a photo">
                    @endif 
                    <button type="submit" class="btn btn-block mt-1 bg-light br-none" id="asset_photo" style="display: none;"> 
                        <i class="fa fa-sm fa-upload mr-3"></i> Save Photo
                    </button>
                    <input type="file" name="photo" id="upload_asset_profile" onchange="prepareFile(event)" accept="image/jpeg,image/png,image/webp" class="none">
                    <script> 
                        function prepareFile(e) {
                            var asset_profile = document.getElementById('asset_profile');
                            asset_profile.src = URL.createObjectURL(e.target.files[0]);
                            $('#asset_photo').fadeIn(700)
                        }
                    </script>
                </label>
            </form>
        </div>
        <div class="col-md-5 col-sm-12">
            <div class="chart">
                <h6 class="mx-auto bold my-2 text-center">Asset Financial Health Chart</h6>
                <canvas id="braidValue" width="500px" style="min-height: 205px !important; width: 120%; margin:  0; min-height: 190px"></canvas>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="chart"> 
                <h6 class="mx-auto bold my-2 text-center">Asset Value Chart</h6>
                <canvas id="braidAsset" width="500px" style="min-height: 205px !important; width: 120%; margin:  0; min-height: 190px"></canvas>
            </div>
        </div>
    </div> 
    @php
        $asset_currency =  explode(" ", $asset->asset_currency)[0];
        $documents = [ $asset->document1,$asset->document2,$asset->document3, $asset->document4, $asset->document5,
                        $asset->document6, $asset->document7, $asset->document8 ];
    @endphp
    <div class="row bg-white mt-2">
        <div class="col-md-8 col-sm-12">
            <div id="assetDetailTable">
                <h5 class="text-underline bold mt-2">Asset Details</h5>
                <table class="table table-striped table-asset table-bordered wd-f">
                    <tr style="background: #E6C069;">    
                        <th style="width: 25%;">Asset Type </th> 
                        <th class="text-left">{{$asset->portfolio_type}}</th>
                    </tr>
                    <tr>       
                        <td>Name</td> 
                        <td>{{$asset->name}}</td>
                    </tr>
                    <tr>      
                        <td>Address / Location</td>  
                        <td>{{$asset->location}}</td>
                    </tr>
                    <tr>      
                        <td>Currency Conversion mode: </td>
                        <td>{{($asset->automated) ? 'Automated' : 'Manual' }}</td>
                    </tr>
                    <tr>     
                        <td> Asset Value</td>
                        <td> {{$asset_currency}}{{number_format($asset->asset_value, 2)}}</td>
                    </tr>
                    <tr>     
                        <td>Average Monthly Income</td> 
                        <td>{{$asset_currency}}{{number_format($asset->monthly_roi,2)}}</td>
                    </tr>
                    <tr>      
                        <td>Average Revenue</td>
                        <td> {{$asset_currency}}{{number_format($asset->average_revenue, 2)}}</td>
                    </tr>
                    <tr>      
                        <td> Average Expenditure</td> 
                        <td> {{$asset_currency}}{{number_format($asset->average_value, 2)}} </td>
                    </tr>
                    <tr>      
                        <td>Description</td>
                        <td>{{$asset->description}}</td> 
                    </tr>               
                    <tr>
                        <td>Uploaded Documents</td>
                        <td>  
                           @foreach($documents as $document)
                                @if($document)
                                    {{-- {{var_dump($asset_finicial_detail)}} <i class="fa fa-paperclip"></i> --}}
                                    <p>  <a href="{{$document['document']}}" target="_blank"><span class="mr-5 sm-mr-3"><i class="fa fa-paperclip ml-3"></i> </span> {{$document['name']}}</a> </p>
                                @endif
                           @endforeach
                        </td>
                    </tr>
                </table> 
            </div>

            @include('user.portfolio.partials.assetedit_table')
            @include('user.portfolio.partials.assetupdate_table')
            @include('user.portfolio.partials.view_note')

            <script>
                $(function(){  
                    var asset_records = null; 
                    $('#updateRecord').click(function () {
                        $('#assetDetailTable').hide(); $('#action_lane').hide();
                        $('#netIncomeLane').hide(); $('#updateAssetTable').fadeIn();
                        if(!asset_records){
                            var header = "ajnjxbnuhjsbxnhujbxncujhbxdcbhjnasuhjbn";
                            var current = "current_ajjaknjkxbnjnksxknmcfaz";
                            $.ajax({
                                method: 'GET',
                                url: "<?php echo Request::url() ?>"+`?header=${header}&access=${current}`,
                                success: function (data, status) {
                                    // console.log(status, data);
                                    if(status == "success"){
                                        this.asset_records = data.asset_records;
                                        $('#amount').val(this.asset_records.amount);
                                        $('#revenue').val(this.asset_records.revenue); 
                                        $('#management').val(this.asset_records.management);
                                        $('#taxes').val(this.asset_records.taxes);
                                        $('#others').val(this.asset_records.others);
                                        $('#maintenance').val(this.asset_records.maintenance);
                                        $('#maintenance_details').val(this.asset_records.maintenance_details);
                                        $('#note').val(this.asset_records.note);
                                    }
                                }
                            });
                        }
                    });
                    $('#editDetails').click(function () {
                        $('#assetDetailTable').hide(); $('#action_lane').hide();
                        $('#netIncomeLane').hide();  $('#editAssetTable').fadeIn();
                    });
                    
                    $('#viewNote').click(function () {
                        $('#assetDetailTable').hide();
                        $('#asset_action').hide(); 
                        $('#viewNoteBoard').fadeIn();
                        $('#close_note').addClass('d-flex');
                    });
                    
                    $('#closeNote').click(function () {
                        $('#assetDetailTable').fadeIn();
                        $('#asset_action').fadeIn(); 
                        $('#viewNoteBoard').hide();
                        $('#close_note').hide();
                        $('#close_note').removeClass('d-flex');
                    });
                    
                    $('#removeAccount').on('click', function(){
                        $('#confirmRemovePersonal').modal('show');
                    });

                    $('#confirmAccountRemove').on('click', function(){
                        var header = "pasjknmxjknjzkxnjxnjzhxnxcfdxajknknniojakn";
                        var add = "uyaghgbshgbhsjxbhsjxbvbhxdbvdhgbvghdvcghvgdhcvhsnbhsb";
                        var id = "<?php echo $asset->id; ?>"; 
                        $.ajax({ 
                            type: 'GET',
                            url: "<?php echo Request::url() ?>"+`?header=${header}&account=${id}&access=${add}`,
                            success: function(data, status){
                                if(status == 'success'){
                                    $('#justArchive').fadeIn();
                                    $('#confirmRemovePersonal').modal('hide');
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
                        var header = "pasjknmxjknjzkxnjxnjzhxnxcfdxajknknniojakn";
                        var add = "atyhgujhashgbsxdhgvshgsghfgnbvjbsjkbvjbvjhdx";
                        var id = "<?php echo $asset->id; ?>"; 
                        $.ajax({
                            type: 'GET',
                            url: "<?php echo Request::url() ?>"+`?header=${header}&account=${id}&access=${add}`,
                            success: function(data, status){ 
                                $('#justUnarchive').fadeIn();
                                $('#confirmRemovePersonal').modal('hide');
                                $('#confirmAddAccount').modal('hide');
                                if(status == 'success') $('#succeesfullyArchived').modal({backdrop: 'static', keyboard: false});
                            }
                        });
                    });
                });
                function backDetail(){ 
                    $('#netIncomeLane').hide();  $('#editAssetTable').hide();
                    $('#assetDetailTable').fadeIn(); $('#updateAssetTable').hide();
                    $('#action_lane').fadeIn();
                }
            </script>
        </div>
        <div class="col-md-4 col-sm-12">
            <div id="netIncomeLane">
                <div class="chart" > 
                    <h6 class="mx-auto bold my-2 text-center">Net Income Chart</h6>
                    <canvas id="netIncome" width="500px" style="min-height: 205px !important; width: 120%; margin:  0; min-height: 190px"></canvas>
                </div>
            </div>
        </div> 
    </div>
    <div class="row" id="action_lane">  
        <div class="col-sm-8 col-xs-12 mt-4 mb-4 sm-center">
            <span id="asset_action" >
                @if(!$asset->isArchive)
                    <button id="updateRecord" class="btn btn-table  mt-2 mr-3 sm-mr-2 px-2">Update Record</button>
                    <button id="editDetails" class="btn btn-table  mt-2 mr-3 sm-mr-2 px-2">Edit Details</button>
                    <button id="viewNote" class="btn btn-table  mt-2 mr-3 sm-mr-2 px-2">View Notes</button>
                @endif
            </span>  
            <span id="close_note" class="text-center" style="display: none;">
                <button id="closeNote" class="btn btn-table  mt-2 mr-3 sm-mr-2 px-2">Close Note</button>
            </span>
        </div>
        <div class="col-sm-4 col-xs-12 mt-4 mb-4 sm-center text-right d-flex">
            <span class="col">
                @if(!$asset->isArchive)
                    <button class="btn btn-table mt-2 mr-3 sm-mr-2 px-2"><a href="{{ route('portfolio.braid.financial', [$braid, $asset->id.'_'.$asset->name])}}" class="text-dark card-link">More Financial Chart</a></button>
               @endif
            </span> 
            <span class="col">
                @if(isset($archive) || $asset->isArchive) 
                    <button type="button" id="addAccount" class="btn  mt-2 mr-3 sm-mr-2 px-2">Restore Assets</button>
                @else
                    <button type="button" id="removeAccount" class="btn  mt-2 mr-3 sm-mr-2 px-2">Remove Assets</button>
                @endif
            </span>
        </div>  
    </div>
    <script>
        var asset_cat = null;
        
    </script>


<div class="modal fade" id="confirmRemovePersonal" tabindex="-1" role="dialog" aria-labelledby="confirmKpi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Confirm Remove Account</h5>
            <button type="button" class="close" onclick="$('#confirmRemovePersonal').modal('hide');"  aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <h5 class="text-center">Are you sure you want to remove this account?</h5>
                <h6 class="text-center">(You will be able to view the account under the Archive Section)</h6>
            </div>

            <div class="modal-footer mx-auto">
                <div class="text-left">
                    <button type="submit" id="confirmAccountRemove"  class="btn btn-pry px-3 mr-3">Yes</button>
                </div>
                <div class="text-right"> 
                    <button type="button" onclick="$('#confirmRemovePersonal').modal('hide');" class="btn btn-default px-3 mr-3">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmAddAccount" tabindex="-1" role="dialog" aria-labelledby="confirmKpi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Confirm Add Account</h5>
            <button type="button" class="close" onclick="$('#confirmAddAccount').modal('hide');"  aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <h5 class="text-center">Are you sure you want to add this account?</h5>
                <h6 class="text-center">(You will be able to view the account in Portfolio)</h6>
            </div>

            <div class="modal-footer mx-auto">
                <div class="text-left">
                    <button type="submit" id="confirmAccountAdd"  class="btn btn-pry px-3 mr-3">Yes</button>
                </div>
                <div class="text-right">  
                    <button type="button" onclick="$('#confirmAddAccount').modal('hide');" class="btn btn-default px-3 mr-3">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="succeesfullyArchived" tabindex="-1" role="dialog" aria-labelledby="confirmKpi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header br-non">
                <button type="button" class="close btn text-right" onclick="$('#succeesfullyArchived').modal('hide');"  aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="justArchive" style="display: none;">
                    <h5 class="text-center">The account has been removed</h5>
                    <h6 class="text-center">
                        <a class="text-dark text-underline" href="{{ route('portfolio.braid',  $braid) }}">View Portfolio</a>
                    </h6>
                </div>
                <div id="justUnarchive" style="display: none;">
                    <h5 class="text-center">The account has been added</h5>
                    <h6 class="text-center">
                        <a class="text-dark text-underline" href="{{ route('portfolio.braid', $braid) }}">View Portfolio</a>
                    </h6>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection 