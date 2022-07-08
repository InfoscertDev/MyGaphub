@extends('layouts.user')

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
    <script>
        var user_currency = "<?php echo $currency ?>";
        var ctx = document.getElementById('protectionDetailBar');
        var incomes =   <?php echo json_encode($incomes) ?>;
        var values =   <?php echo json_encode($income_info['percentages']) ?>;
        var labels =   <?php echo json_encode($income_info['labels']) ?>;
        var backgrounds =   <?php echo json_encode($backgrounds) ?>;
    </script>
    @include('user.360.partials.account_chartpie')
@endsection
 
@section('content')
<div class="row"> 
    <div class="col-md-5 col-sm-12 sm-default pr-0">
        <div class="sm-px-1">
            <h2 class=" bold">{{ (isset($archive) ? 'Archived Incomes' : 'Incomes' ) }}: 
               @if(!$archive)  {{$currency}}{{ number_format($income_info['sum'], 2) }} @endif         
            </h2>
        </div>
        <div class="bar_chart mt-4 sm-px-2">
           
            <h5 class="text-underline bold">
                {{ (isset($archive) ?  'List of Archive Income Accounts' : 'List of Income Accounts')  }}
                <span class="pull-right"> 
                    @if (isset($archive))
                        <a class="text-dark" href="{{ route('360.income.list') }}" data-toggle="tooltip" title="Click to view income "><i class="fa fa-sticky-note"></i></a>
                    @else
                        <a class="text-dark" href="{{ route('360.income.list', ['archive' => 'all']) }}" data-toggle="tooltip" title="Click to view Archived Income"><i class="fa fa-archive"></i></a>
                    @endif    
                </span>
            </h5>
            @if (count($incomes))
                 <ul class="list-group list-group-flush cash-tiles list-toggled">
                    @foreach ($incomes as $key => $equ) 
                        <li class="list-group-item my-1" onclick="editAccount({{$key}})">
                            @if(!$archive && isset($backgrounds[$key]))<span class="account_detail" style="background: {{$backgrounds[$key]}};"> </span> @endif
                            <span class="mr-2 bold">{{$equ->income_name }}:</span> 
                            <span class="mr-2 bold">{{($equ->income_type == 'portfolio') ? 'Portolio' : 'Non Portfolio'}}:</span>
                            <span class="mr-2">{{$equ->currency}}{{ number_format($equ->amount, 2) }}</span> 
                           
                            <span class="pull-right"><i class="fa fa-chevron-right"></i> </span>
                        </li> 
                    @endforeach
                    @if(count($incomes) > 6)
                        <button class="list-toggle mx-auto btn-sm wd-5 btn px-2 bg-none mt-2">
                            <span class="expand text-underline">View More</span>
                            <span class="collapse text-underline">View Less</span>
                        </button>
                    @endif  
                </ul> 
                 @if(!$archive)
                    <div class="chart mt-3"> 
                        <h5 class="text-underline bold my-2">Income Distribution</h5>
                        <canvas id="protectionDetailBar" width="500px" style="width: 120%; margin: 0;"></canvas>
                        <div class="cell" id="wrapLegend"></div>
                    </div>
                @endif 
            @else
                <div class="jumbotron bg-gray">
                    @if($archive)
                        <h4 class="text-center">No Archived Income Yet</h4>
                    @else 
                        <h4 class="text-center">No Account Created Yet</h4>
                    @endif
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
        var income = this.incomes[index];
        this.account = income;
        bindIncome(income);
        $(`#editIncomeModal`).modal('show');
    }
    
    function initVariable(){
        var income_typed = document.getElementById('income_typed');
        var channel = document.getElementById('channeled');
        var income_date = document.getElementById('income_date');
        var income_value = document.getElementById('income_value');
        var provider_contact = document.getElementById('provider_contact');
        var income_frequencies = document.getElementById('income_frequencies');
        var income_name = document.getElementById('income_named');
        var portfolio_asseted = document.getElementById('portfolio_asseted');
        var user_act = document.getElementById('msnxjnzxnxnakn');
        var user_act2 = document.getElementById('ahgjbskjnslkjmd');
    }

    function bindIncome(account){ 
        var income_typed = document.getElementById('income_typed');
        var channel = document.getElementById('channeled');
        var income_date = document.getElementById('income_date');
        var income_value = document.getElementById('income_value');
        var provider_contact = document.getElementById('provider_contact');
        var income_frequencies = document.getElementById('income_frequencies');
        var income_name = document.getElementById('income_named');
        var portfolio_asseted = document.getElementById('portfolio_asseted');
        var user_act = document.getElementById('msnxjnzxnxnakn');
        var user_act2 = document.getElementById('ahgjbskjnslkjmd');

        var currency = user_currency;
        if(account.income_currency) currency = account.income_currency.split(' ');
        $('#price_target').text(currency[0]);
        this.editmode = false; 
        this.recordmode = false;  
        this.refreshChart(account.chart, currency[0]);   

        income_name.textContent = account.income_name;
        channel.textContent = account.channel;
        income_typed.value = account.income_type;
        income_date.value = account.income_date;
        income_value.value = account.amount;
        income_frequencies.value = account.income_frequency; 
        status.value = account.status;
        user_act.value = account.id;  
        user_act2.value = account.id; 
        if(account.income_type == 'portfolio'){
            portfolio_asseted.value = account.portfolio_asset_id;
            $('#associated').fadeIn();
            $('#currencyLaneMode').hide(); 
        }else{
            portfolio_asseted.value = 0;
            $('#rate_automatic').prop('checked',(account.automated) ? true : false); 
            $('#rate_manual').prop('checked',(account.automated) ? false : true); 
            $('#currencyLaneMode').fadeIn(); 
            $('#associated').hide();
            // income_value.disabled = false;
        }
    }

    var editmode = false;
    var recordmode = false;
    function toggleEdit(){
        // if(account.income_type == 'portfolio'){
        //     window.location = account.link;
        // }else{
            this.initVariable()
            this.editmode = !this.editmode;
            if(this.editmode){
                rate_automatic.disabled = false; rate_manual.disabled = false;
                portfolio_asseted.disabled = false; 
                // income_typed.disabled = false; 
                income_frequencies.disabled = false;
                income_date.disabled = false; 
                // income_value.disabled = false;
                $('#update_account').fadeIn(700); 
            }else{   
                rate_automatic.disabled = true; 
                rate_manual.disabled = true;
                portfolio_asseted.disabled = true; 
                // income_typed.disabled = true; 
                income_frequencies.disabled = true;
                income_date.disabled = true; 
                income_value.disabled = true; 
                $('#update_account').hide();
            }
        // }
    }
 
    function toggleRecordEdit(){ 
        // this.recordmode = mode;
        if(account.income_type == 'portfolio'){ 
            window.location = account.link;
        }else{
            $(`#recordMonthlyIncome`).modal('show'); 
            this.initVariable()
            this.recordmode = !this.recordmode;
     
            if(this.recordmode){
                $('#detailView').hide();
                $('#monthlyIncome').fadeIn();
            }else{
                $('#detailView').fadeIn();
                $('#monthlyIncome').hide();
            }
        }

    }

    $(function() {
        // Historical Chart Redirection for Portfolio Asset
        $('#historical_chart').on('click', function(){ 
            if(account.income_type == 'portfolio')  window.location = account.link_chart ;
        }) 
        // 
        $('#removeAccount').on('click', function(){
            $('#confirmRemoveAccount').modal('show');
        }) 

        $('#confirmAccountRemove').on('click', function(){
            var header = "inakjkxbnjksbxjnbsjxnbxjcbnxcjbnxcjhbxnmc";
            var add = "uyaghgbshgbhsjxbhsjxbvbhxdbvdhgbvghdvcghvgdhcvhsnbhsb";
            var id = account.id;
            $.ajax({
                type: 'GET',
                url: "<?php echo route('360.income.list') ?>"+`?header=${header}&account=${id}&access=${add}`,
                success: function(data, status){
                    if(status == 'success'){
                        $('#justArchive').fadeIn();
                        $('#confirmRemoveAccount').modal('hide');
                        $('#editIncomeModal').modal('hide');
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
            var header = "inakjkxbnjksbxjnbsjxnbxjcbnxcjbnxcjhbxnmc";
            var add = "atyhgujhashgbsxdhgvshgsghfgnbvjbsjkbvjbvjhdx";
            var id = account.id;
            $.ajax({
                type: 'GET', 
                url: "<?php echo route('360.income.list') ?>"+`?header=${header}&account=${id}&access=${add}`,
                success: function(data, status){ 
                    $('#justUnarchive').fadeIn();
                    $('#confirmRemoveAccount').modal('hide');
                    $('#editIncomeModal').modal('hide');
                    $('#confirmAddAccount').modal('hide');
                    if(status == 'success') $('#succeesfullyArchived').modal({backdrop: 'static', keyboard: false});
                }
            });
        });

        
        $('#income_typed').on('change', ()=> {
            var income = $('#income_typed').val();
            if(income == 'portfolio'){
                $('#portfolio_asseted').attr('required', 'required');
                $('#associated').fadeIn();
                $('#income_value').removeAttr('required');
                $('#income_value').attr('disabled', 'disabled');
            }else{
                $('#portfolio_asseted').removeAttr('required'); 
                $('#associated').hide();
                $('#income_named').attr('required', 'required');
                $('#income_value').attr('required', 'required');
                $('#income_named').removeAttr('disabled');
                $('#income_value').removeAttr('disabled');
                $('#income_named').val('');
                $('#income_value').val('');
            }
        }); 
        $('#portfolio_asseted').change(function() {
            var asset = $(this).find('option:selected');
            var info = asset.data('info');
            var detail = info.split('-');
            $('#income_named').val(detail[0])
            $('#income_value').val(detail[1])
        });
    });
</script>
@include('user.360.details.income')

@endsection