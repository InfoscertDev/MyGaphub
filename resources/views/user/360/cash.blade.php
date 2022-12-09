@extends('layouts.user')

@section('script')
    
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
<script>  
    var user_currency = "<?php echo $currency ?>";
    var ctx = document.getElementById('cashDetailBar');
    var cash =   <?php echo json_encode($cash) ?>;
    var bespokes =   <?php echo json_encode($bespokes) ?>;
    bespokes = bespokes.reverse();
    bespokes.forEach((bespoke)=>{ cash.unshift(bespoke);  });
    var seveng =   <?php echo json_encode($seveng) ?>;
    seveng = seveng.reverse(); 
    seveng.forEach((seveng)=>{ cash.unshift(seveng);  });
    var total_seveng = <?php echo count($seveng) ?>;
    // console.log(cash)
    var values =   <?php echo json_encode($cash_detail['percentages']) ?>;
    var labels =   <?php echo json_encode($cash_detail['labels']) ?>;
    var backgrounds =   <?php echo json_encode($backgrounds) ?>;
    $(function () { 
        var link = window.location.href;
        var kpi = +link.split('kpi=')[1];
        if(link.match('alpha')) editAccount(0);
        if(link.match('beta')) editAccount(1);
        if(link.match('education')) editAccount(2);
        if( Number.isInteger(kpi)){
            editAccount(kpi+3)
        } 
        var bes = link.split('bes=')[1];
        if(bes){
            bes = bes.split('-');
            var bes_index = +bes[+bes[0] + 3];
            var sidentity = +bes[1];
            for (let i = 0; i < cash.length; i++) {
                // console.log(i, sidentity)
                if(+cash[i].id == +sidentity){
                    editAccount(i);
                    break;
                }
            }
        }
    });
</script>
@include('user.360.partials.account_chartpie')
@endsection

@section('content') 
    <div class="row">
        <div class="col-md-5 col-sm-12 sm-default  pr-0">
            <div class="sm-px-1">
                <h2 class=" bold">{{ (isset($archive) ? 'Archived Cash' : 'Cash' ) }}: 
                    @if(!$archive)
                        {{$currency}}{{ number_format($cash_detail['sum'], 2) }} 
                    @endif
                    @if(!$archive)<span class="account_info info"  data-toggle="tooltip" data-placement="right" title="Here is an aggregation of all your cash account used for various purposes"><i class="fa fa-info mx-2 "></i></span>@endif
                </h2>
            {{-- @if(!$archive)<p class="wd-7 sm-wdf border text-center px-2">Here is an aggregation of all your cash account used for various purposes</p>@endif --}}
            </div>
            <div class="bar_chart mt-4 sm-px-2">
                <h5 class="text-underline  bold">{{ (isset($archive) ?  'List of Archived Cash Accounts' : ' List of Cash Accounts')  }}
                    <span class="pull-right">  
                        @if (isset($archive))
                            <a class="text-dark" href="{{ route('360.cash') }}" data-toggle="tooltip" title="Click to view Cash "><i class="fa fa-sticky-note"></i></a>
                        @else
                            <a class="text-dark" href="{{ route('360.cash', ['archive' => 'all']) }}" data-toggle="tooltip" title="Click to view Archived Cash"><i class="fa fa-archive"></i></a>
                        @endif
                    </span>
                </h5> 
                @if(!$archive || count($cash) + count($bespokes))
                    <ul class="list-group list-group-flush cash-tiles list-toggled">
                        @if(!$archive)  
                            <li class="list-group-item my-1"  style="background: " onclick="editAccount(0)" >
                                @if(!$archive && isset($backgrounds[0]))<span class="account_detail" style="background: {{$backgrounds[0]}};"> </span> @endif
                                <span class="mr-2"> Alpha –</span>  <span class="mr-2 bold">Rainy-Day Fund</span> <span class="mr-2">{{$currency}}{{ number_format($seveng[0]->current, 2) }}</span> 
                                <span class="pull-right"><i class="fa fa-chevron-right"></i> </span>
                            </li>
                            <li class="list-group-item my-1"  onclick="editAccount(1)">
                                @if(!$archive && isset($backgrounds[1]))<span class="account_detail" style="background: {{$backgrounds[1]}};"> </span> @endif
                                <span class="mr-2">Beta –</span>   <span class="mr-2 bold">Home Purchase Savings</span> <span class="mr-2">{{$currency}}{{ number_format($seveng[1]->current, 2) }}</span> 
                                <span class="pull-right"><i class="fa fa-chevron-right"></i> </span>
                            </li>
                            <li class="list-group-item my-1"  onclick="editAccount(2)">
                                @if(!$archive && isset($backgrounds[2]))<span class="account_detail" style="background: {{$backgrounds[2]}};"> </span> @endif
                                <span class="mr-2">Education –</span> <span class="mr-2 bold">Children Education Fund</span> <span class="mr-2">{{$currency}}{{ number_format($seveng[2]->current, 2) }}</span> 
                                <span class="pull-right"><i class="fa fa-chevron-right"></i> </span>
                            </li>
                        @endif
                        @foreach ($bespokes as $key => $cs)  
                            <li class="list-group-item my-1"  onclick="editAccount({{$key + count($seveng)}})">
                                @if(!$archive && isset($backgrounds[$key+ count($seveng)]))<span class="account_detail" style="background: {{$backgrounds[$key+ count($seveng)]}};"> </span> @endif
                                <span class="mr-2"> {{$cs->account_name}} –</span> <span class="mr-2 bold"> {{ $cs->account_purpose  }} </span> <span class="mr-2">{{($convert ? $currency :$cs->currency)}}{{ number_format($cs->current, 2) }}</span> 
                                <span class="pull-right"><i class="fa fa-chevron-right"></i> </span>
                            </li>
                        @endforeach
                        @foreach ($cash as $key => $cs)   
                            <li class="list-group-item my-1"  onclick="editAccount({{$key + count($seveng) + count($bespokes)}})">
                                @if(!$archive && isset($backgrounds[$key+ count($seveng) + count($bespokes)]))<span class="account_detail" style="background: {{$backgrounds[$key+ count($seveng) + count($bespokes)]}};"> </span> @endif
                                <span class="mr-2"> {{$cs->account_name}} –</span> <span class="mr-2 bold"> {{ $cs->account_purpose  }} </span> <span class="mr-2">{{($convert ? $currency : $cs->currency)}}{{ number_format($cs->current, 2) }}</span> 
                                <span class="pull-right"><i class="fa fa-chevron-right"></i> </span>
                            </li>
                        @endforeach
                        @if(count($cash) + count($bespokes) > 3)
                            <button class="list-toggle mx-auto btn-sm wd-5 btn px-2 bg-none mt-2">
                                <span class="expand text-underline">View More</span>
                                <span class="collapse text-underline">View Less</span>
                            </button>
                        @endif
                    </ul>
                    @if(!$archive)
                        <div class="chart mt-3">
                            <h5 class="text-underline bold my-2">Cash Distribution</h5>
                            <div>
                                <canvas id="cashDetailBar" width="500" style="width: 100%; margin: 0;"></canvas>
                            </div>
                            <div class="cell" id="wrapLegend"></div>
                        </div>
                    @endif
                @else
                    <div class="jumbotron bg-white">
                        <h4 class="text-center">No Archive Cash Yet</h4>
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
            var cash = this.cash[index];
            this.account = cash;
            bindCash(cash); 
            $(`#editCashModal`).modal('show');
        }
        
        function initVariable(){
            var details = document.getElementById('details');
            var account_location = document.getElementById('account_location');
            var account_name = document.getElementById('account_name');
            var account_purpose = document.getElementById('account_purpose');
            var account_type = document.getElementById('account_type');
            var target = document.getElementById('target');
            var target_date = document.getElementById('target_date');
            var current = document.getElementById('current'); 
            var alias = document.getElementById('alias');
            var cash_analytics = document.getElementById('cash_analytics');
            var user_act = document.getElementById('msnxjnzxnxnakn');
            var seveng = document.getElementById('paojsjbcnbxhncb');
            var bespoke = document.getElementById('sxbaksoapnkajbxn');
        }

        function bindCash(account){ 
            // var account_currency = document.getElementById('account_currency');
            var details = document.getElementById('details');
            var account_location = document.getElementById('account_location');
            var account_name = document.getElementById('account_name');
            var account_purpose = document.getElementById('account_purpose');
            var account_type = document.getElementById('account_type');
            var alias = document.getElementById('alias');
            var cash_analytics = document.getElementById('cash_analytics');
            var target = document.getElementById('target');
            var target_date = document.getElementById('target_date');
            var current = document.getElementById('current'); 
            var user_act = document.getElementById('msnxjnzxnxnakn');
            var seveng = document.getElementById('paojsjbcnbxhncb');
            var bespoke = document.getElementById('sxbaksoapnkajbxn');
        
            $('#price_target').text(account.currency) ; 
            $('#price_current').text(account.currency) ; 
            $('#price_target').fadeIn();
            $('#price_current').fadeIn(); 

            seveng.value = ''; bespoke.value = ''; 
            this.refreshChart(account.chart,account.currency );
            $('#isAnalytics').fadeIn();
            $('#accountDistro').fadeIn(); 
            $('#currencyLaneMode').hide();
            $('#openBetaAccount').hide(); 
            // console.log(account);
            account_name.textContent = account.account_name;
            account_type.textContent = account.account_purpose;
            details.value = account.account_details;
            account_location.value = account.account_location;
            account_purpose.value = account.account_type;
            target.value = account.target;  
            target_date.value = account.target_date; 
            current.value = account.current; 
            alias.value = account.account_alias; 
            user_act.value = account.id;
            
        if(account.account_alias ==  'alpha'){
                $('#cash_purpose').hide();$('#isAnalytics').hide();
                $('#archiveAccount').hide();
                seveng.value = 'alpcaksnksnkndkkmkdnkandnsmjmn';
            }else if(account.account_alias ==  'beta'){
                $('#cash_purpose').hide();$('#isAnalytics').hide();
                seveng.value = 'betpcaksnksnkndkkmkdnkanmhahbdjb';
                $('#archiveAccount').hide();
                if(account.is_purchased){ 
                    $('#toggle_beta_edit').hide();
                    $('#accountDistro').hide(); 
                    $('#openBetaAccount').fadeIn(); 
                }
            }else if(account.account_alias ==  'education'){
                $('#cash_purpose').hide();$('#isAnalytics').hide();
                seveng.value = 'edupcaksnksmkdnkjnkndkkahnjn';
                $('#archiveAccount').hide();
            }else if(account.account_header){ 
                bespoke.value = account.account_header;
                // $('#archiveAccount').hide();
            } else{ 

                $('#rate_automatic').prop('checked',(account.automated) ? true : false); 
                $('#rate_manual').prop('checked',(account.automated) ? false : true); 
                $('#currencyLaneMode').fadeIn(); 
                $('#archiveAccount').fadeIn();
            } 
            $('#cash_analytics').prop('checked',(account.isAnalytics) ? true : false); 
            // cash_analytics.checked = account.isAnalytics; 
            // cash_analytics.setAttribute('checked',(account.isAnalytics) ? 'checked' : ''); 
            // console.log(cash_analytics.checked, account.isAnalytics, (account.isAnalytics) ? 'checked' : ''); 
        }

        var editmode = false; 
        function toggleEdit(){ 
            this.initVariable()
            this.editmode = !this.editmode;
            if(this.editmode){
                rate_automatic.disabled = false; rate_manual.disabled = false;
                details.disabled = false; account_location.disabled = false;
                current.disabled = false; target.disabled = false;
                target_date.disabled = false; account_purpose.disabled = false;
                alias.disabled = false; $('#update_account').fadeIn(700); 
                $('#accountDistro').hide(); cash_analytics.disabled = false;
            }else{ 
                rate_automatic.disabled = true; rate_manual.disabled = true;
                details.disabled = true; account_location.disabled = true;
                current.disabled = true; target.disabled = true;
                target_date.disabled = true; account_purpose.disabled = true;
                alias.disabled = true; $('#update_account').hide();  
                $('#accountDistro').fadeIn(700); cash_analytics.disabled = true;
            }
        }

        $(function() {
            var bespoke = document.getElementById('sxbaksoapnkajbxn');
            $('#removeAccount').on('click', function(){
                $('#confirmRemoveAccount').modal('show');
            });
            $('#openAccount').on('click', function(){
                $('#confirmOpenAccount').modal('show');
            });
            $('#confirmAccountRemove').on('click', function(){
                var header = "cakjsnodidjnjksnjbnxdjdbndjcbdbncfjn";
                var add = "uyaghgbshgbhsjxbhsjxbvbhxdbvdhgbvghdvcghvgdhcvhsnbhsb";
                var id = account.id;
                $.ajax({
                    type: 'GET', 
                    url: "<?php echo route('360.cash') ?>"+`?header=${header}&account=${id}&access=${add}&kpi=${bespoke.value}`,
                    success: function(data, status){
                        if(status == 'success'){
                            $('#justArchive').fadeIn();
                            $('#confirmRemoveAccount').modal('hide');
                            $('#editCashModal').modal('hide');
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
                var header = "cakjsnodidjnjksnjbnxdjdbndjcbdbncfjn";
                var add = "atyhgujhashgbsxdhgvshgsghfgnbvjbsjkbvjbvjhdx";
                var id = account.id; 
                $.ajax({
                    type: 'GET', 
                    url: "<?php echo route('360.cash') ?>"+`?header=${header}&account=${id}&access=${add}&kpi=${bespoke.value}`,
                    success: function(data, status){ 
                        $('#justUnarchive').fadeIn();
                        $('#confirmRemoveAccount').modal('hide');
                        $('#editCashModal').modal('hide');
                        $('#confirmAddAccount').modal('hide');
                        if(status == 'success') $('#succeesfullyArchived').modal({backdrop: 'static', keyboard: false});
                    }
                });
            });
        });
    </script>

@include('user.360.details.cash')
@endsection