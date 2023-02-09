{{--  Asset --}}
<div class="modal fade" id="assignCreditModalAccount" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content b-rad-20 wd-c"> 
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h3 class="text-center ff-rob">
                        @if ($audit->is_allocated)
                            Your Total 7G Analytics Credit Balance: {{$currency}}{{number_format($liabilities_detail['user_current'],2)}}   
                        @else
                            Your Unallocated Credit Balance is: {{$currency}}{{number_format($total_credit,2)}}   
                        @endif 
                          
                        @if($audit->is_allocated) 
                            <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="text-white">X</span>
                            </button> 
                        @else
                            <button type="button" class="btn btn-sm btn-close  text-right" onclick="window.history.go(-1); return false;">
                                <span aria-hidden="true" class="text-white">X</span>
                            </button>
                        @endif
                    </h3>
                </div> 
                @if(!$audit->is_allocated) <p class="wd-7 mx-auto text-center">(Allocate your balance to respective liability accounts)</p>@endif
                <div class="my-5">
                    <ul class="list-group list-group-flush cash-tiles list-toggled mx-4">
                        @foreach ($seveng as $key => $liability) 
                            <li class="list-group-item my-1" onclick="editAccount({{$key}})">
                                <span class="mr-2"> {{$liability->creditor_name }}–</span> <span class="mr-2 bold">{{$liability->account_type }}:</span> <span class="mr-2">{{$liability->currency}}{{ number_format($liability->current,2) }}</span> 
                            </li>  
                        @endforeach 
                    </ul>
                    @if ($total_credit != 0 || $audit->is_allocated)
                        <div class="wd-7 mx-auto">
                            <button type="button" class="btn btn-block py-2 btn-md my-3 brad elevation-1 btn-pry" id="addCredit">Add A Credit Account</button>
                        </div> 
                    @elseif($total_credit == 0 && !$audit->is_allocated)
                        <div class="text-center  mx-auto"> 
                            <button type="button" class="btn px-3 py-2 btn-md my-3 brad elevation-1 btn-pry" onclick="window.location = '<?php echo route('360.liabilities', ['crd' => 'ajkmzxjkcnkfsnznnjksxnjnkcnjc', 'alo' => 'azsjkhbdjcbjszbhjbxjhcbjbhhbjghdx'])  ?>'">Submit</button>
                        </div> 
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        isCreditor = 0;
        var default_currency = "<?php echo $user_currency ?>";
        $(function() {
            $('#addCredit').on('click', function (){
                isCreditor = 1;
                var total_credit = "<?php echo $total_credit ?>";
                var is_allocated = "<?php echo $audit->is_allocated ?>";
                $('#assignCreditModalAccount').modal('hide');
                $(`#liabilityModalAccount`).modal('show');
            });
        })
    </script>
</div>
@include('user.360.modals.liabilities')

 