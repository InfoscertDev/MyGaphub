{{--  Asset --}}
<div class="modal fade" id="incomeAllocatedModalAccount" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content b-rad-20 wd-c"> 
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h3 class="text-center ff-rob">
                         Portfolio Allocation <span class="">{{$currency}}{{number_format($income_detail['income_portfolio'],2)}}</span>
    
                        <button type="button" class="btn btn-sm btn-close  text-right" onclick="window.history.go(-1); return false;">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                    </h3>
                </div> 
                 <p class="wd-7 mx-auto text-center">(Confirm you have allocated your Portfolio Income)</p>
                <div class="my-5">
                    <ul class="list-group list-group-flush cash-tiles list-toggled mx-4">
                        @foreach ($incomes as $key => $income) 
                            <li class="list-group-item my-1">
                                <span class="mr-2 bold">{{$income->income_name }}:</span>  <span class="mr-2">{{$income->currency}}{{ number_format($income->amount, 2) }}</span> 
                            </li>  
                        @endforeach 
                    </ul>
                    <div class="text-center  mx-auto"> 
                        <button type="button" class="btn px-3 py-2 btn-md my-3 brad elevation-1 btn-pry" onclick="window.location = '<?php echo route('360.income', ['crd' => 'ajkmzxjkcnkfsnznnjksxnjnkcnjc', 'alo' => 'azsjkhbdjcbjszbhjbxjhcbjbhhbjghdx'])  ?>'">Submit</button>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <script>
    </script>
</div>

 