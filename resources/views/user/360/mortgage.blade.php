@extends('layouts.user')

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
    <script>
        var user_currency = "<?php echo $currency ?>";
        var ctx = document.getElementById('mortgageDetailBar');
        var mortgages =   <?php echo json_encode($mortgages) ?>;
        var seveng =   <?php echo json_encode($seveng) ?>;
        seveng.forEach((seveng)=>{ mortgages.unshift(seveng);  });
         
        var values =   <?php echo json_encode($mortgages_detail['percentages']) ?>;
        var labels =   <?php echo json_encode($mortgages_detail['labels']) ?>;
        var backgrounds =   <?php echo json_encode($backgrounds) ?>;
        $(function () { 
            var link = window.location.href;
            if(link.match('debt') && seveng.length) editAccount(0);  
            if(!(mortgages[0].creditor_name)){
                editAccount(0, true); 
            }
        });
       
    </script>
    @include('user.360.partials.account_chartpie')
@endsection

@section('content')
<div class="row">
    <div class="col-md-5 col-sm-12 sm-default  pr-0">
        <div class=""> 
            <h2 class=" bold">{{ (isset($archive) ? 'Archived Mortgage' : 'Mortgage' ) }}: @if(!$archive) {{$currency}}{{ number_format($mortgages_detail['sum'], 2) }} @endif
                @if(!$archive)<span class="account_info info"  data-toggle="tooltip" data-placement="right" title="Here is an aggregation of all your debt that are secured against properties."><i class="fa fa-info mx-2 "></i></span>@endif 
            </h2>
            {{--@if(!$archive)<p class="wd-7 sm-wdf border text-center  px-2">Here is an aggregation of all your debt that are secured against properties.</p>@endif --}}

        </div>
        <div class="bar_chart mt-4"> 
            <h5 class="text-underline  bold">{{ (isset($archive) ?  'List of Archived Mortgage Accounts' : ' List of Mortgage Accounts')  }}
                <span class="pull-right"> 
                    @if (isset($archive))
                        <a class="text-dark" href="{{ route('360.mortgage') }}" data-toggle="tooltip" title="Click to view Mortgage "><i class="fa fa-sticky-note"></i></a>
                    @else
                        <a class="text-dark" href="{{ route('360.mortgage', ['archive' => 'all']) }}" data-toggle="tooltip" title="Click to view Archived mortgage"><i class="fa fa-archive"></i></a>
                    @endif    
                </span>
            </h5>
            @if(!$archive || isset($seveng[0]) || count($mortgages))
                <ul class="list-group list-group-flush cash-tiles list-toggled">
                    @if(isset($seveng[0]))
                        @if($seveng[0]->current == 0)
                            <li class="list-group-item my-1"  onclick="editAccount(0)" data-toggle="tooltip" title="Please archive this account in order to be able to create a new Primary Residential Home">
                                @if(!$archive && isset($backgrounds[0]))<span class="account_detail" style="background: {{$backgrounds[0]}};"> </span> @endif
                                <span class="mr-2"> {{( $seveng[0]->creditor_name) ? $seveng[0]->creditor_name : 'Debt' }}  –</span> <span class="mr-2 bold">{{$seveng[0]->secured_against }}:</span>   
                                <span class="mr-2">{{$currency}}{{ number_format($seveng[0]->current, 2) }}</span> 
                                <span class="pull-right"><i class="fa fa-chevron-right"></i> </span>
                            </li> 
                        @else
                            <li class="list-group-item my-1"  onclick="editAccount(0)" >
                                @if(!$archive && isset($backgrounds[0]))<span class="account_detail" style="background: {{$backgrounds[0]}};"> </span> @endif
                                <span class="mr-2"> {{( $seveng[0]->creditor_name) ? $seveng[0]->creditor_name : 'Debt' }}  –</span> <span class="mr-2 bold">{{$seveng[0]->secured_against }}:</span>   
                                <span class="mr-2">{{$currency}}{{ number_format($seveng[0]->current, 2) }}</span> 
                                <span class="pull-right"><i class="fa fa-chevron-right"></i> </span>
                            </li> 
                        @endif
                    @endif 
                    
                    @foreach ($mortgages as $key => $mortgage) 
                        @if($mortgage->secured_against == 'Primary Residential Home' && $mortgage->current_balance == 0)
                            <li class="list-group-item my-1"  onclick="editAccount({{$key + count($seveng)}})"  data-toggle="tooltip" title="Please archive this account in order to be able to create a new Primary Residential Home">
                                @if(!$archive && isset($backgrounds[$key + 1]))<span class="account_detail" style="background: {{$backgrounds[$key + 1]}};"> </span> @endif
                                <span class="mr-2"> {{$mortgage->creditor_name }}–</span> <span class="mr-2 bold">{{$mortgage->secured_against }}:</span> <span class="mr-2">{{$currency}}{{ number_format($mortgage->current_balance, 2) }}</span> 
                                <span class="pull-right"><i class="fa fa-chevron-right"></i> </span>
                            </li> 
                        @else 
                            <li class="list-group-item my-1"  onclick="editAccount({{$key + count($seveng)}})">
                                @if(!$archive && isset($backgrounds[$key + 1]))<span class="account_detail" style="background: {{$backgrounds[$key + 1]}};"> </span> @endif
                                <span class="mr-2"> {{$mortgage->creditor_name }}–</span> <span class="mr-2 bold">{{$mortgage->secured_against }}:</span> <span class="mr-2">{{$currency}}{{ number_format($mortgage->current_balance, 2) }}</span> 
                                <span class="pull-right"><i class="fa fa-chevron-right"></i> </span>
                            </li> 
                        @endif
                    @endforeach  
                    @if (count($mortgages) > 5)
                        <button class="list-toggle mx-auto btn-sm wd-5 btn px-2 bg-none mt-2">
                            <span class="expand text-underline">View More</span>
                            <span class="collapse text-underline">View Less</span>
                        </button>
                    @endif
                </ul> 
                @if(!$archive)
                    <div class="chart mt-3">
                        <h5 class="text-underline bold my-2">Mortgage Distribution</h5>
                        <canvas id="mortgageDetailBar" width="500" style="width: 120%; margin: 0;"></canvas>
                        <div class="cell" id="wrapLegend"></div>
                    </div>
                @endif
            @else
                <div class="jumbotron bg-white">
                    <h4 class="text-center">No Archive Mortgages Yet</h4>
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
    function editAccount(index, backdrop = false){
        var mortgage = this.mortgages[index];
        this.account = mortgage;
        bindMortgage(mortgage);
        if(backdrop){
            $(`#editMortgageModal`).modal({backdrop: 'static', keyboard: false});
            // $(`#editMortgageModal`).data('bs.modal').options.backdrop = 'static';
        }else{
            $(`#editMortgageModal`).modal('show');
        }
    }
    
    function initVariable(){
        var details = document.getElementById('details');
        var account_location = document.getElementById('account_location');
        var account_name = document.getElementById('account_name');
        var account_purpose = document.getElementById('account_purpose');
        var account_type = document.getElementById('account_type');
        var target = document.getElementById('target');
        var current = document.getElementById('current'); 
        var paid_off = document.getElementById('paid_off'); 
        var target_date = document.getElementById('target_date');
        var pay_strategy = document.getElementById('pay_strategy');
        var user_act = document.getElementById('msnxjnzxnxnakn');
        var seveng = document.getElementById('paojsjbcnbxhncb');
    } 

    function bindMortgage(account){ 
        var detail = document.getElementById('detail');
        var creditor_name = document.getElementById('creditor_name');
        var current = document.getElementById('current');
        var interest = document.getElementById('interest');
        
        var today_current = document.getElementById('today_current');
        var target_date = document.getElementById('target_date');
        var open_balance = document.getElementById('open_balance'); 
        var secured_against = document.getElementById('secured_against');
        var repayment = document.getElementById('repayment'); 
        var total_paid = document.getElementById('total_paid'); 

        var pay_strategy = document.getElementById('pay_strategy');
        var user_act = document.getElementById('msnxjnzxnxnakn');
        var seveng = document.getElementById('paojsjbcnbxhncb');
        var creditor = document.getElementById('creditor');
        var description = document.getElementById('description');
        var secure_against = document.getElementById('secure_against');
        seveng.value = '';
        // console.log(account);
        creditor_name.textContent = account.creditor_name;
        secured_against.textContent = account.secured_against;
        current.value = account.current_balance;
        this.refreshChart(account.chart);
        
        $('#creditor_lane').hide(); $('#secure_lane').hide();
        $('#description_lane').hide();  $('#archiveAccount').fadeIn(); 
        interest.value = account.interest_rate;
        open_balance.value = account.open_balance; 
        target_date.value = account.target_date; 
        repayment.value = account.monthly_pay; 
        pay_strategy.value = account.extra; 
        details.value = account.details; 
        total_paid.value = +open_balance.value - +current.value;
        user_act.value = account.id; 
        
        if(current.value == 0){
            $('#archiveAccount').fadeIn();
        }else{
            $('#archiveAccount').hide();
        }
        if(account.alias == "Debt"){ 
            seveng.value = 'sdebjajbdnxbjsnbdsmjmn';
            description.value = account.description; 
            creditor.value = account.creditor_name; 
            secure_against.value = account.secured_against; 
            $('#creditor_lane').fadeIn(); //$('#secure_lane').fadeIn();
            $('#description_lane').fadeIn();
        }
        // console.log(seveng.value, account.creditor_name)
    }

    var editmode = false; 
    function toggleEdit(){ 
        this.initVariable();
        this.editmode = !this.editmode;
        if(this.editmode){
            details.disabled = false; open_balance.disabled = false;
            current.disabled = false; repayment.disabled = false;
            interest.disabled = false; pay_strategy.disabled = false; 
            target_date.disabled = false;  $('#today_current').hide(); 
            $('#paid_off').fadeIn();
            $('#update_account').fadeIn(700); 
            $('#accountDistro').hide();
            description.disabled = false; secure_against.disabled = false;
            creditor.disabled = false;
        }else{ 
            details.disabled = true; open_balance.disabled = true;
            current.disabled = true; repayment.disabled = true;
            interest.disabled = true; pay_strategy.disabled = true;
            target_date.disabled = true;  $('#today_current').fadeIn(700);
            $('#paid_off').hide();
            $('#update_account').hide();
            $('#accountDistro').fadeIn(700);
            description.disabled = true; secure_against.disabled = true;
            creditor.disabled = true;
        }
    }

    $(function() {
        $('#removeAccount').on('click', function(){
            $('#confirmRemoveAccount').modal('show');
        }) 
        $('#confirmAccountRemove').on('click', function(){
            var header = "uiwjsbjsbnjmsxnjsxbnsjxbsxhjndghbdgjvhgcghdchm";
            var add = "uyaghgbshgbhsjxbhsjxbvbhxdbvdhgbvghdvcghvgdhcvhsnbhsb";
            var id = account.id;
            // console.log(id); return;
            $.ajax({
                type: 'GET',
                url: "<?php echo route('360.mortgage') ?>"+`?header=${header}&account=${id}&access=${add}`,
                success: function(data, status){
                    if(status == 'success'){
                        $('#justArchive').fadeIn();
                        $('#confirmRemoveAccount').modal('hide');
                        $('#editMortgageModal').modal('hide');
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
            var header = "uiwjsbjsbnjmsxnjsxbnsjxbsxhjndghbdgjvhgcghdchm";
            var add = "atyhgujhashgbsxdhgvshgsghfgnbvjbsjkbvjbvjhdx";
            var id = account.id;
            $.ajax({
                type: 'GET', 
                url: "<?php echo route('360.mortgage') ?>"+`?header=${header}&account=${id}&access=${add}`,
                success: function(data, status){ 
                    $('#justUnarchive').fadeIn();
                    $('#confirmRemoveAccount').modal('hide');
                    $('#editMortgageModal').modal('hide');
                    $('#confirmAddAccount').modal('hide');
                    if(status == 'success') $('#succeesfullyArchived').modal({backdrop: 'static', keyboard: false});
                }
            });
        });
    });

</script>
 @include('user.360.details.mortgage')
@endsection