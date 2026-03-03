@extends('layouts.user')
@php
    $allocate = 0; $creditors = [];
    // foreach($seveng as $creditor) array_push($creditors,$creditor->current);
    // $allocate = array_sum($creditors);
    // $total_credit =  $credit->current - $allocate;
@endphp
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
    <script> 
        var user_currency = "<?php echo $currency ?>";
        var total_credit = "<?php echo $total_credit ?>";
        var is_allocated = "<?php echo  (bool)$audit->is_allocated ?>";
        var ctx = document.getElementById('LiabilitiesDetailBar');
        var liabilities =   <?php echo json_encode($liabilities) ?>;
        // console.log(is_allocated); 
        var bespokes =   <?php echo json_encode($bespokes) ?>;
        bespokes = bespokes.reverse(); 
        bespokes.forEach((bespoke)=>{ liabilities.unshift(bespoke);  }); 
        var seveng =   <?php echo json_encode($seveng) ?>;
        seveng = seveng.reverse(); 
        seveng.forEach((bespoke)=>{ liabilities.unshift(bespoke);  });

        var values =   <?php echo json_encode($liabilities_detail['percentages']) ?>;
        var labels =   <?php echo json_encode($liabilities_detail['labels']) ?>;
        var backgrounds =   <?php echo json_encode($backgrounds) ?>;
        // console.log(liabilities); 
        $(function () { 
            var link = window.location.href;
            var kpi = link.split('kpi=')[1];
            var bes = link.split('bes=')[1];
            if(bes){
                bes = bes.split('-');
                var bes_index = +bes[+bes[0] + 1];
                var sidentity = +bes[1];
                for (let i = 0; i < liabilities.length; i++) {
                    if(+liabilities[i].id == +sidentity){
                        editAccount(i);
                        break; 
                    }
                }
            }  
            if(total_credit != 0 && !(is_allocated) && !(link.includes('archive'))){
                 $('#assignCreditModalAccount').modal({backdrop: 'static', keyboard: false});
            }
            if(link.match('credit')) $('#assignCreditModalAccount').modal('show');
            if(Number.isInteger(kpi)){
                editAccount(kpi);
            } 
            
        });
    </script>
    @include('user.360.partials.account_chartpie')
@endsection

@section('content')


@include('user.360.modals.credit_allocation')
<div class="row">
    <div class="col-md-5 col-sm-12 sm-default pr-0">
        <div class="sm-px-1">  
            <h2 class=" bold"> {{ (isset($archive) ? 'Archived Liabilities' : 'Liabilities' ) }}: @if(!$archive){{$currency}}{{ number_format($liabilities_detail['sum'], 2) }}@endif
                @if(!$archive)<span class="account_info info"  data-toggle="tooltip" data-placement="right" title="Here is an aggregation of all the money you owe others."><i class="fa fa-info mx-2 "></i></span>@endif
            </h2>
          {{--  @if(!$archive)<p class="wd-7 sm-wdf border text-center  px-2">Here is an aggregation of all your debt that are secured against properties.</p>@endif --}} 
        </div>
        <div class="bar_chart mt-4 sm-px-2">
            <h5 class="text-underline  bold">{{ (isset($archive) ?  'List of Archived Liabilities Accounts' : ' List of Liabilities Accounts')  }}
                <span class="pull-right">  
                    @if (isset($archive))
                        <a class="text-dark" href="{{ route('360.liability') }}" data-toggle="tooltip" title="Click to view Liabilities "><i class="fa fa-sticky-note"></i></a>
                    @else
                        <a class="text-dark" href="{{ route('360.liability', ['archive' => 'all']) }}" data-toggle="tooltip" title="Click to view Archived Liabilities"><i class="fa fa-archive"></i></a>
                    @endif
                </span>
            </h5>
            <div > 
                @if(!$archive || count($liabilities))
                    @if(count($seveng) + count($bespokes) + count($liabilities) )
                        <ul class="list-group list-group-flush cash-tiles list-toggled">
                        {{--<li class="list-group-item my-1"  onclick="editAccount(0)">
                                <span class="mr-2"> Credit –</span> <span class="mr-2 bold">{{$seveng[0]->account_type }}: <span class="mr-2">{{$currency}}{{ number_format($seveng[0]->current, 2) }}</span> 
                            </li> --}}
                            @foreach ($seveng as $key => $liability) 
                                <li class="list-group-item my-1" onclick="editAccount({{$key}})">
                                    @if(!$archive && isset($backgrounds[$key]))<span class="account_detail" style="background: {{$backgrounds[$key]}};"> </span> @endif
                                    <span class="mr-2"> {{$liability->creditor_name }}–</span> <span class="mr-2 bold">{{$liability->account_type }}:</span> <span class="mr-2">{{$liability->currency}}{{ number_format($liability->current,2) }}</span> 
                                    <span class="pull-right"><i class="fa fa-chevron-right"></i> </span>
                                </li>  
                            @endforeach  
                            @foreach ($bespokes as $key => $liability) 
                                <li class="list-group-item my-1" onclick="editAccount({{$key + count($seveng) }})">
                                    @if(!$archive && isset($backgrounds[$key]))<span class="account_detail" style="background: {{$backgrounds[$key+ count($seveng) ]}};"> </span> @endif
                                    <span class="mr-2"> {{$liability->creditor_name }}–</span> <span class="mr-2 bold">{{$liability->account_type }}:</span> <span class="mr-2">{{$liability->currency}}{{ number_format($liability->current,2) }}</span> 
                                    <span class="pull-right"><i class="fa fa-chevron-right"></i> </span>
                                </li>  
                            @endforeach 
                            @foreach ($liabilities as $key => $liability) 
                            <li class="list-group-item my-1" onclick="editAccount({{$key + count($seveng) + count($bespokes)}})">
                                 @if(!$archive && isset($backgrounds[$key]))<span class="account_detail" style="background: {{$backgrounds[$key + count($seveng) + count($bespokes)]}};"> </span> @endif
                                <span class="mr-2"> {{$liability->creditor_name }}–</span> <span class="mr-2 bold">{{$liability->account_type }}:</span> <span class="mr-2">{{$liability->currency}}{{ number_format($liability->current,2) }}</span> 
                                <span class="pull-right"><i class="fa fa-chevron-right"></i> </span>
                            </li> 
                            @endforeach  
                            @if($archive)
                                @if ( count($liabilities)  > 5) 
                                    <button class="list-toggle mx-auto btn-sm wd-5 btn px-2 bg-none mt-2">
                                        <span class="expand text-underline">View More</span>
                                        <span class="collapse text-underline">View Less</span>
                                    </button>
                                @endif
                            @else
                                @if (count($seveng) + count($liabilities) + count($bespokes) > 5) 
                                    <button class="list-toggle mx-auto btn-sm wd-5 btn px-2 bg-none mt-2">
                                        <span class="expand text-underline">View More</span>
                                        <span class="collapse text-underline">View Less</span>
                                    </button>
                                @endif
                            @endif
                        </ul>  
                        @if(!$archive)
                            <div class="chart mt-3">
                                <h5 class="text-underline bold my-2">Liabilities Distribution</h5>
                                <canvas id="LiabilitiesDetailBar" width="500" style="width: 120%; margin: 0;"></canvas>
                                <div class="cell" id="wrapLegend"></div>
                            </div>
                        @endif
                    @else
                        <div class="jumbotron bg-white">
                            <h4 class="text-center">No Account Created Yet</h4>
                        </div>
                    @endif
                @else
                    <div class="jumbotron bg-white">
                        <h4 class="text-center">No Archive Liabilities Yet</h4>
                    </div>
                @endif
            </div> 
        </div>
    </div>
    <div class="col-md-7 col-sm-12 px-0">
        @include('user.360.wheel')
    </div>
</div>
<script>
    var liability = null;
    function editAccount(index){
        var liability = liabilities[index];
        this.liability = liability;
        bindLiability(liability);
        $(`#editLiabilityModal`).modal('show');
        // var creditor = liability.creditor_name;
    }
     
    function initVariable(){
        var creditor_name = document.getElementById('liability_creditor');
        var account_type = document.getElementById('account_type');
        var description = document.getElementById('description');
        var baseline = document.getElementById('baseline');
        var current = document.getElementById('current');
        var interest = document.getElementById('interest');
        var lia_paid_off = document.getElementById('lia_paid_off'); 
        
        var target_date = document.getElementById('target_date');
        var period_pay = document.getElementById('period_pay');
        var pay_strategy = document.getElementById('pay_strategy');
        var seveng = document.getElementById('paojsjbcnbxhncb');
        var bespoke = document.getElementById('sxbaksoapnkajbxn');
        var creditor = document.getElementById('creditor');
        var lia_analytics = document.getElementById('lia_analytics');
        var credit_type = document.getElementById('credit_type');    
    }

    function bindLiability(liability){ 
        var creditor_name = document.getElementById('liability_creditor');
        var account_type = document.getElementById('account_type');
        var description = document.getElementById('description');
        var baseline = document.getElementById('baseline');
        var current = document.getElementById('current');
        var total_paid = document.getElementById('total_paid');
        var interest = document.getElementById('interest');
        var target_date = document.getElementById('target_date');
        var period_pay = document.getElementById('period_pay');
        var pay_strategy = document.getElementById('pay_strategy');
        var account = document.getElementById('msnxjnzxnxnakn');
        var seveng = document.getElementById('paojsjbcnbxhncb');
        var creditor = document.getElementById('creditor');    
        var credit_type = document.getElementById('credit_type');
        var lia_analytics = document.getElementById('lia_analytics');    
        var bespoke = document.getElementById('sxbaksoapnkajbxn');
        seveng.value = ''; bespoke.value = '';
        
        $('#creditor_lane').hide();   
        $('#credit_type_lane').hide();
        $('#price_target').text(liability.currency); $('#price_target').fadeIn();
        $('#price_current').text(liability.currency); $('#price_current').fadeIn();
        $('#price_repay').text(liability.currency);  $('#price_paid').text(liability.currency);
        this.refreshChart(liability.chart, liability.currency); 
        
        $('#isAnalytics').fadeIn(); 
        creditor_name.textContent = liability.creditor_name;
        account_type.textContent = liability.account_type;
        description.value = liability.account_details;
        baseline.value = liability.baseline;
        current.value = liability.current;
        interest.value = liability.interest_rate;
        target_date.value = liability.target_date;
        period_pay.value = liability.periodical_pay;
        pay_strategy.value = liability.extra;
        account.value = liability.id; 
        total_paid.value = +baseline.value - +current.value;
        $('#currencyLaneMode').hide();
        if(current.value == 0){ 
            $('#archiveAccount').fadeIn();
        }else{  
            $('#archiveAccount').hide();
        }
        if(liability.alias === "Credit"){
            seveng.value = 'creajknbjjkandnxbjsnbdsmjmn';
            $('#creditor_lane').fadeIn();  
            $('#isAnalytics').hide();
            $('#credit_type_lane').fadeIn();
            creditor.value = liability.creditor_name;
            credit_type.value = liability.account_type;
        }else if(liability.account_header){ 
            bespoke.value = liability.account_header;
            // $('#archiveAccount').hide();$('#archiveAccount').hide();
        } else{
            $('#rate_automatic').prop('checked',(liability.automated) ? true : false); 
            $('#rate_manual').prop('checked',(liability.automated) ? false : true); 
            $('#currencyLaneMode').fadeIn(); 
        }
        $('#lia_analytics').prop('checked',(liability.isAnalytics) ? true : false); 
    }

    var editmode = false;
    function toggleEdit(){
        this.initVariable(); 
        this.editmode = !this.editmode;
        if(this.editmode){ 
            console.log($('#lia_paid_off'))
            rate_automatic.disabled = false; rate_manual.disabled = false;
            description.disabled = false; baseline.disabled = false;
            current.disabled = false; interest.disabled = false;
            target_date.disabled = false; period_pay.disabled = false;
            pay_strategy.disabled = false;
            creditor.disabled = false; credit_type.disabled = false;
            $('#lia_paid_off').fadeIn();
            $('#update_liability').fadeIn(700); 
            $('#accountDistro').hide(); lia_analytics.disabled = false;
        }else{ 
            rate_automatic.disabled = true; rate_manual.disabled = true;
            description.disabled = true; baseline.disabled = true;
            current.disabled = true; interest.disabled = true;
            target_date.disabled = true; period_pay.disabled = true;
            pay_strategy.disabled = true;
            creditor.disabled = true; credit_type.disabled = true;
            $('#update_liability').hide();
            $('#lia_paid_off').hide();
            $('#accountDistro').fadeIn(700);  lia_analytics.disabled = true;
        }
    }

    $(function() {
        var bespoke = document.getElementById('sxbaksoapnkajbxn');
        $('#removeAccount').on('click', function(){
            $('#confirmRemoveLiability').modal('show');
        }) 
        $('#confirmAccountRemove').on('click', function(){
            var header = "ajnkxbjknjsxnbjjkaznjknajhnbjbdhjb";
            var add = "uyaghgbshgbhsjxbhsjxbvbhxdbvdhgbvghdvcghvgdhcvhsnbhsb";
            var id = liability.id;
            $.ajax({
                type: 'GET',
                url: "<?php echo route('360.liability') ?>"+`?header=${header}&account=${id}&access=${add}&kpi=${bespoke.value}`,
                success: function(data, status){
                    if(status == 'success'){
                        $('#justArchive').fadeIn();
                        $('#confirmRemoveLiability').modal('hide');
                        $('#editLiabilityModal').modal('hide');
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
            var header = "ajnkxbjknjsxnbjjkaznjknajhnbjbdhjb";
            var add = "atyhgujhashgbsxdhgvshgsghfgnbvjbsjkbvjbvjhdx";
            var id = liability.id; 
            $.ajax({
                type: 'GET',
                url: "<?php echo route('360.liability') ?>"+`?header=${header}&account=${id}&access=${add}&kpi=${bespoke.value}`,
                success: function(data, status){ 
                    $('#justUnarchive').fadeIn();
                    $('#confirmRemoveLiability').modal('hide');
                    $('#editLiabilityModal').modal('hide');
                    $('#confirmAddAccount').modal('hide');
                    if(status == 'success') $('#succeesfullyArchived').modal({backdrop: 'static', keyboard: false});
                }
            });
        });
    });
</script>
 
@include('user.360.details.liabilities')

@endsection

