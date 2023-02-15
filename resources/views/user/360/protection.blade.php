@extends('layouts.user')

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
    <script>
        var user_currency = "<?php echo $currency ?>";
        var ctx = document.getElementById('protectionDetailBar');
        var protection =   <?php echo json_encode($protection) ?>;
        var values =   <?php echo json_encode($protection_detail['percentages']) ?>;
        var labels =   <?php echo json_encode($protection_detail['labels']) ?>;
        var backgrounds =   <?php echo json_encode($backgrounds) ?>;
    </script>
    @include('user.360.partials.account_chartpie')
@endsection
  
@section('content')
<div class="row">
    <div class="col-md-5 col-sm-12 sm-default pr-0">
        <div class="sm-px-1">
            <h2 class=" bold">{{ (isset($archive) ? 'Archived Sum Assured' : 'Sum Assured' ) }}: @if(!$archive) {{$currency}}{{ number_format($protection_detail['sum'], 2) }}    @endif      
                @if(!$archive)<span class="account_info info"  data-toggle="tooltip" data-placement="right" title="Sum assured is the amount your family gets in case if you pass away. Other categories of insurances are also available."><i class="fa fa-info mx-2 "></i></span>@endif    
            </h2>
          {{--  @if(!$archive) <p class="wd-f sm-wdf border text-center px-4">Sum assured is the amount your family gets in case if you pass away. Other categories of insurances are also available.  </p> @endif--}} 
        </div>
        <div class="bar_chart mt-4 sm-px-2">
           
            <h5 class="text-underline bold">
                {{ (isset($archive) ?  'Archive Insurance Policies and Premiums' : 'Insurance Policies and Premiums')  }}
                <span class="pull-right"> 
                    @if (isset($archive))
                        <a class="text-dark" href="{{ route('360.protection') }}" data-toggle="tooltip" title="Click to view Protection "><i class="fa fa-sticky-note"></i></a>
                    @else
                        <a class="text-dark" href="{{ route('360.protection', ['archive' => 'all']) }}" data-toggle="tooltip" title="Click to view Archived Protection"><i class="fa fa-archive"></i></a>
                    @endif    
                </span>
            </h5>
            @if (count($protection))
                <ul class="list-group list-group-flush cash-tiles list-toggled">
                    @foreach ($protection as $key => $equ) 
                        <li class="list-group-item my-1" onclick="editAccount({{$key}})">
                            @if(!$archive && isset($backgrounds[$key]))<span class="account_detail" style="background: {{$backgrounds[$key]}};"> </span> @endif
                            <span class="mr-2 bold">{{$equ->protection_category }}:</span> <span class="mr-2">{{$currency}}{{ number_format($equ->premium_pay, 2) }}</span> 
                            <span class="pull-right"><i class="fa fa-chevron-right"></i> </span>
                        </li> 
                    @endforeach
                    @if(count($protection) > 6)
                        <button class="list-toggle mx-auto btn-sm wd-5 btn px-2 bg-none mt-2">
                            <span class="expand text-underline">View More</span>
                            <span class="collapse text-underline">View Less</span>
                        </button>
                    @endif  
                </ul> 
                @if(!$archive)
                    <div class="chart mt-3"> 
                        <h5 class="text-underline bold my-2">Insurance Premium Distribution</h5>
                        <canvas id="protectionDetailBar" width="500px" style="width: 120%; margin: 0;"></canvas>
                        <div class="cell" id="wrapLegend"></div>
                    </div>
                @endif
            @else
                <div class="jumbotron bg-gray">
                    @if($archive)
                        <h4 class="text-center">No Archive Protection Yet</h4>
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
        var protection = this.protection[index];
        this.account = protection;
        bindProtection(protection);
        $(`#editProtectMeModal`).modal('show');
    }
    
    function initVariable(){
        var protection_type = document.getElementById('protection_type');
        var protection_category = document.getElementById('protection_category');
        var details = document.getElementById('details');
        var current = document.getElementById('current');
        var sum_assured = document.getElementById('sum_assured');
        var provider_contact = document.getElementById('provider_contact');
        var pay_frequently = document.getElementById('pay_frequently');
        var contact = document.getElementById('contact');
        var provider_policy = document.getElementById('provider_policy');
        var cover_start = document.getElementById('cover_start'); 
        var cover_end = document.getElementById('cover_end');
        var premium_pay = document.getElementById('premium_pay');
        var pay_typed = document.getElementById('pay_typed');
        var user_act = document.getElementById('msnxjnzxnxnakn');
        // var account = document.getElementById('msnxjnzxnxnakn');
    }

    function bindProtection(account){ 
        var protection_type = document.getElementById('protection_type');
        var protection_category = document.getElementById('protection_category');
        var details = document.getElementById('details');
        var current = document.getElementById('current');
        var sum_assured = document.getElementById('sum_assured');
        var provider_contact = document.getElementById('provider_contact');
        var pay_frequently = document.getElementById('pay_frequently');
        var contact = document.getElementById('contact');
        var provider_policy = document.getElementById('provider_policy');
        var cover_start = document.getElementById('cover_start'); 
        var cover_end = document.getElementById('cover_end');
        var premium_pay = document.getElementById('premium_pay');
        var pay_typed = document.getElementById('pay_typed');
        var user_act = document.getElementById('msnxjnzxnxnakn');
         
        provider_policy.textContent = account.provider_policy;
        protection_category.textContent = account.protection_category;
        details.value = account.details;
        sum_assured.value = account.sum_assured;
        provider_contact.value = account.provider_contact;
        pay_frequently.value = account.pay_frequency; 
        // console.log(pay_frequently.value,  account.pay_frequently)
        protection_type.value = account.protection_type;
        premium_pay.value = account.premium_pay;
        pay_typed.value = account.payment_type;
        cover_start.value = account.cover_start;
        cover_end.value = account.cover_end;  
        var documented = account.document;
        var view_document = document.getElementById('view_document');
        user_act.value = account.id; 
        view_document.href = location.origin + '/app/assets/'+documented.replace('public',"storage");
        view_document.href = location.origin + '/assets/'+documented.replace('public',"storage");
    }

    var editmode = false;
    function toggleEdit(){
        this.initVariable()
        this.editmode = !this.editmode;
        if(this.editmode){
            pay_frequently.disabled = false;
            pay_typed.disabled = false;
            details.disabled = false; sum_assured.disabled = false;
            provider_contact.disabled = false; 
            cover_start.disabled = false; cover_end.disabled = false;
            protection_type.disabled = false;
            premium_pay.disabled = false; 
            provider_contact.disabled = false;
            $('#update_account').fadeIn(700); 
        }else{ 
            pay_frequently.disabled = true;
            pay_typed.disabled = true;
            details.disabled = true; sum_assured.disabled = true;
            provider_contact.disabled = true;
            cover_start.disabled = true; cover_end.disabled = true;
            protection_type.disabled = true;
            premium_pay.disabled = true; 
            provider_contact.disabled = true;  
            $('#update_account').hide();
        }
    }

    $(function() {
        $('#removeAccount').on('click', function(){
            $('#confirmRemoveAccount').modal('show');
        }) 
        $('#confirmAccountRemove').on('click', function(){
            var header = "pwsijedijierujsxhjndgmbhhgcghdchnsbdgjvjxbsx";
            var add = "uyaghgbshgbhsjxbhsjxbvbhxdbvdhgbvghdvcghvgdhcvhsnbhsb";
            var id = account.id;
            $.ajax({
                type: 'GET',
                url: "<?php echo route('360.protection') ?>"+`?header=${header}&account=${id}&access=${add}`,
                success: function(data, status){
                    if(status == 'success'){
                        $('#justArchive').fadeIn();
                        $('#confirmRemoveAccount').modal('hide');
                        $('#editProtectMeModal').modal('hide');
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
            var header = "pwsijedijierujsxhjndgmbhhgcghdchnsbdgjvjxbsx";
            var add = "atyhgujhashgbsxdhgvshgsghfgnbvjbsjkbvjbvjhdx";
            var id = account.id;
            $.ajax({
                type: 'GET', 
                url: "<?php echo route('360.protection') ?>"+`?header=${header}&account=${id}&access=${add}`,
                success: function(data, status){ 
                    $('#justUnarchive').fadeIn();
                    $('#confirmRemoveAccount').modal('hide');
                    $('#editProtectMeModal').modal('hide');
                    $('#confirmAddAccount').modal('hide');
                    if(status == 'success') $('#succeesfullyArchived').modal({backdrop: 'static', keyboard: false});
                }
            });
        });
    });
</script>

 @include('user.360.details.protection')
@endsection