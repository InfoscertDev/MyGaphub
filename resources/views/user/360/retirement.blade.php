@extends('layouts.user')

@section('script')   
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
 
    <script>
        var user_currency = "<?php echo $currency ?>";
        var ctx = document.getElementById('retirementDetailBar');
        var pensions =   <?php echo json_encode($retirement) ?>;
        var values =   <?php echo json_encode($retirement_detail['percentages']) ?>;
        var labels =   <?php echo json_encode($retirement_detail['labels']) ?>;
        var backgrounds =   <?php echo json_encode($backgrounds) ?>;
    </script>
    @include('user.360.partials.account_chartpie')
@endsection

@section('content') 
<div class="row">
    <div class="d-flex col-12 mb-3">
        <div class="col-3">
            <span class="mr-3 pb-2" id="goback">
                <a href="#" class="text-dark" onclick="window.history.go(-1); return false;" ><i class="fa fa-chevron-left mr-1"></i> Back</a>
            </span>
        </div>
        <div class="col-9">
            <p class="text-center sm-wdf wd-7 p-1" style="border: 1px solid black">
                Financial independence is a smarter way to retire and still be buzzing with LIFE!
            </p>
        </div>
    </div>
    <div class="col-md-5 col-sm-12 sm-default ">
        <div style="display: block; width: 105%;">
            <div class="card mb-2">
                @include('widgets.financial_snapshot')
                <div class="text-center my-3">
                   <a data-target="#snapshotDetailModal" data-toggle="modal" class="text-dark text-underline">View Notes </a>
                    @include('widgets.snapshot_details')
                </div>
            </div>
            <div class="mt-5">
                <h5 class="text-center text-underline bold">Opportunities for You</h5>
                <div class="row mx-auto">
                    <div class="col-6 col-xs-12 px-2">
                        <div class="reap-asset mx-0 px-0">
                            <div class="list-img" style="height: 220px">
                                <a href="{{ route('user.reap-opportunity', 'appreciating') }}" class="card-link text-white">
                                    <img src="{{ asset('/assets/images/photomix-coyarsgz76866any101808.png') }}" alt=" " class="img img-responsive">
                                </a>
                                <h6 class="text-underline">Income: £1,800.00 </h6>
                            </div>
                        </div>
                    </div> 
                    <div class="col-6 col-xs-12 px-2">
                        <div class="reap-asset mx-0 px-0">
                            <div class="list-img " style="height: 220px">
                                <a href="{{ route('user.ganp-opportunity', 'appreciating') }}" class="card-link text-white">
                                    <img src="{{ asset('/assets/images/piawsgxshsgsxszazxabay163752.png') }}" alt=" " class="img img-responsive">
                                </a> 
                                <h6 class="text-underline">Capital Required: £1,000.00 </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7 col-sm-12 ">
        <div id="roi_upgrade">
            @include('widgets.roi_upgrade')
        </div> 
        <hr class="bold" style="height: 8px;"/>
        <div class="bar_chart mt-0 px-2">
            @include('user.360.modals.retirement')
            @if (count($retirement)) 
                <div class="row sm-mx-0">
                    <div class="col-sm-6 col-xs-12 pr-0">
                        <h6 class="text-underline  bold" style="font-size: 13px;">Your Pension Pot(Accrued Income = {{$currency}}{{ number_format($retirement_detail['sum']) }})
                            <span class="pull-right"> 
                                @if (isset($archive))
                                    <a class="text-dark" href="{{ route('360.retirement') }}" data-toggle="tooltip" title="Click to view retirement "><i class="fa fa-sticky-note"></i></a>
                                @else
                                    <a class="text-dark" href="{{ route('360.retirement', ['archive' => 'all']) }}" data-toggle="tooltip" title="Click to view Archived Pension"><i class="fa fa-archive"></i></a>
                                @endif    
                            </span>
                        </h6> 
                        <ul class="list-group list-group-flush cash-tiles list-toggled list-toggled2">
                            @foreach ($retirement as $key => $pension)  
                                <li class="list-group-item my-1 px-1 mx-0"  onclick="editAccount({{$key}})">
                                    @if(!$archive && isset($backgrounds[$key]))<span class="account_detail" style="width:6px;background: {{$backgrounds[$key]}};"> </span> @endif
                                    <span class="pl-1 mr-1"> {{ str_limit( $pension->name, 9) }}–</span> 
                                    <span class="mr-2 bold"> {{ str_limit($pension->pension_type, 8) }}:
                                    </span> <span class="mr-2">{{$currency}}{{ number_format($pension->current, 2) }}</span> 
                                    <span class="pull-right"><i class="fa fa-chevron-right"></i> </span>
                                </li> 
                            @endforeach 
                        </ul> 
                        @if(count($retirement) > 5)
                            <button class="list-toggle mx-auto btn-sm wd-5 btn px-2 bg-none mt-1">
                                <span class="expand text-underline">View More</span>
                                <span class="collapse text-underline">View Less</span>
                            </button>
                        @endif
                        <div class="py-3 text-center">
                            <button class="btn btn-pry px-2" data-toggle="modal" data-target="#retirementModalAccount"> Add Pension Account </button>  
                        </div>
                    </div>  
                    <div class="col-sm-6 col-xs-12 px-0">
                        <div class="chart mt-0">
                            <h5 class="text-underline text-center bold my-2">Pension Distribution</h5>
                            <canvas id="retirementDetailBar" style="min-width: 300px !important; min-height: 150px !important;"></canvas>
                            <div class="cell" id="wrapLegend"></div>
                        </div>
                    </div>
                </div>
            @else
                
                <div class="jumbotron bg-white">
                    @if($archive)
                        <h4 class="text-center">No Archive Pension Yet</h4>
                    @else
                        <h4 class="text-center">No Account Created Yet</h4>
                        <div class="pt-5 text-center">
                            <button class="btn btn-pry px-2" data-toggle="modal" data-target="#retirementModalAccount"> Add Pension Account </button>  
                        </div>
                    @endif
                </div>
            @endif
           
        </div>
    </div>
</div>

<script>
    var accont = null;
    function editAccount(index){
        var pension = this.pensions[index];
        this.account = pension;
        bindPension(pension); 
        $(`#editPensionModal`).modal('show');
    }

    function bindPension(account){ 
        // var account_currency = document.getElementById('account_currency');
        var name = document.getElementById('name');
        var provider = document.getElementById('provider');
        var pension_info = document.getElementById('pension_info');
        var assured_income = document.getElementById('assured_income');
        var current = document.getElementById('current');
        var user_act = document.getElementById('msnxjnzxnxnakn');
        var monthly= document.getElementById('monthly');
        var percentage_cos= document.getElementById('percentage_cos');
        var retirement = document.getElementById('retirement');
        var retire_balance = document.getElementById('retire_balance');
        var year_retirement = document.getElementById('year_retirement');

        name.textContent = account.name;
        pension_info.textContent = account.pension_type;
        provider.value = account.provider;
        current.value = account.current_year_bal;
        user_act.value = account.id;
        assured_income.value = account.accured_current_income;
        
        monthly.value = account.monthly_contribution;
        percentage_cos.value = account.percentage_cos; 
        retirement.value = account.retirement_age;
        year_retirement.value = account.year_retirement + ' Years' ;
        retire_balance.value = account.retire_balance ;
        retire_income.value = account.retire_income ;
        // var act = account.dob.split('-')[0];  
        // var act = 1994;
        // var cur_year = new Date().getFullYear();
        // var yretirement = (+act + +account.retirement_age) - cur_year;
        // year_retirement.value = yretirement + ' Years' ;
        // retire_balance.value = ((account.monthly_contribution * 12) * (yretirement) + account.current).toLocaleString();
        // retire_assured.value = ((account.monthly_contribution * 12) * (yretirement) + account.current).toLocaleString();
    }

    var editmode = false; 
    function toggleEdit(){
        var monthly = document.getElementById('monthly');
        var retirement = document.getElementById('retirement');
        var provider = document.getElementById('provider');
        var current = document.getElementById('current');
        var assured_income = document.getElementById('assured_income');

        this.editmode = !this.editmode;
        if(this.editmode){
            monthly.disabled = false;  retirement.disabled = false;
            provider.disabled = false;  
            $('#update_account').fadeIn(700); 
            $('#archiveAccount').hide(); 
        }else{
            monthly.disabled = true; retirement.disabled = true;
            provider.disabled = true;  
            $('#update_account').hide(); 
            $('#archiveAccount').fadeIn(); 
        }
    }
    
    $(function() {
        $('#removeAccount').on('click', function(){
            $('#confirmRemoveAccount').modal('show');
        }) 
        $('#confirmAccountRemove').on('click', function(){
            var header = "pwiuduihdnjhnsbdgjvjxbsngmbhhgkhdccghdx";
            var add = "uyaghgbshgbhsjxbhsjxbvbhxdbvdhgbvghdvcghvgdhcvhsnbhsb";
            var id = account.id;
            $.ajax({
                type: 'GET',
                url: "<?php echo route('360.retirement') ?>"+`?header=${header}&account=${id}&access=${add}`,
                success: function(data, status){
                    if(status == 'success'){
                        $('#justArchive').fadeIn();
                        $('#confirmRemoveAccount').modal('hide');
                        $('#editPensionModal').modal('hide');
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
            var header = "pwiuduihdnjhnsbdgjvjxbsngmbhhgkhdccghdx";
            var add = "atyhgujhashgbsxdhgvshgsghfgnbvjbsjkbvjbvjhdx";
            var id = account.id;
            $.ajax({
                type: 'GET', 
                url: "<?php echo route('360.retirement') ?>"+`?header=${header}&account=${id}&access=${add}`,
                success: function(data, status){ 
                    $('#justUnarchive').fadeIn();
                    $('#confirmRemoveAccount').modal('hide');
                    $('#editPensionModal').modal('hide');
                    $('#confirmAddAccount').modal('hide');
                    if(status == 'success') $('#succeesfullyArchived').modal({backdrop: 'static', keyboard: false});
                }
            });
        });
    });
         
</script>
 @include('user.360.details.retirement')
@endsection


