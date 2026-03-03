{{--  --}}
{{-- @section('header')
    <script>(function(n,t,i,r){var u,f;n[i]=n[i]||{},n[i].initial={accountCode:"INFOS11160",host:"INFOS11160.pcapredict.com"},n[i].on=n[i].on||function(){(n[i].onq=n[i].onq||[]).push(arguments)},u=t.createElement("script"),u.async=!0,u.src=r,f=t.getElementsByTagName("script")[0],f.parentNode.insertBefore(u,f)})(window,document,"pca","//INFOS11160.pcapredict.com/js/sensor.js")</script>
@endsection --}}
<div class="modal fade" id="addWheelActModal" tabindex="-1" role="dialog" aria-labelledby="addWheelActModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content b-rad-20 wd-c"> 
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob">Add Account        
                        <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                    </h2>
                    
                </div>
                
                <div class="my-4">
                    <p class="wd-8 mx-auto text-center">Which category would you like to add account to?                 </p>
                    <div class="form-lane mb-4">
                        <select name="account" id="wheel_account" class="form-control">
                            <option value="">-- Select --</option>
                            {{-- <option value="net">Net Worth</option> --}}
                            <option value="liability">Liabilities</option>
                            <option value="protection">Protection</option>
                            <option value="retirement">Retirement</option>
                            <option value="cash">Cash</option>
                            <option value="mortgage">Mortgage</option>
                            {{--<option value="investment">Investment</option> --}}
                             {{-- <option value="philantropy">Philantropy</option>
                            <option value="plan">Action Plan</option>--}}
                           <option value="income">Income</option> 
                            <option value="asset">Assets</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <button id="newAct" disabled="disabled" class="btn btn-pry px-3">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('user.360.modals.cash')
@include('user.360.modals.liabilities')
@include('user.360.modals.mortgage')
@include('user.360.modals.protection')
@include('user.360.modals.asset')
@include('user.360.modals.retirement')
{{-- @include('user.360.modals.net') --}}
{{-- @include('user.360.modals.equity') --}}
@include('user.360.modals.income')
  
<script>
    function activateModal(){
        var account = $('#wheel_account').find(":selected").val();
        if(account){ 
            $('#newAct').removeAttr('disabled');
        }else{
            $('#newAct').attr('disabled', 'disabled');
        }
    }
    $(document).on('change', '#wheel_account',function (){
        activateModal();
    });
    $(function() {
        activateModal();
        $('#newAct').on('click', function (){
            var account = $('#wheel_account').find(":selected").val();
            if($('#addWheelActModal')) $('#addWheelActModal').modal('hide');
            // console.log(account)
            if(account == 'liability'){
                if(total_credit != 0){ 
                   $('#liabilityModalAccount').modal('hide'); 
                   window.location = "<?php echo route('360.liability',['kpi' =>'credit']) ?>";
                }else{
                    $(`#liabilityModalAccount`).modal('show');
                }
            }else if(account == 'mortgage'){
                if(dept.creditor_name){
                   
                }else{
                   $('#mortgageModalAccount').modal('hide'); 
                   window.location = "<?php echo route('360.mortgage',['kpi' =>'debt']) ?>";
                }
            }else{
                $(`#${account}ModalAccount`).modal('show');
            }
        });
    })
</script>  