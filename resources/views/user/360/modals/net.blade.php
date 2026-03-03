{{--  Cash --}}
<div class="modal fade" id="netModalAccount" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content b-rad-20 wd-c"> 
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob">Net Worth
                        <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                    </h2>
                    
                </div>
                <p class="wd-7 mx-auto text-center">(Complete the form below to set your preference)                </p>
                
                @include('user.360.modals.networth_form')
            </div>
        </div>
    </div>
</div>

{{-- <div class="col-md-9 col-sm-12  mx-auto">
    <div class="card">
        <div class="card-body">
            <h4 class="mt-2 text-center bold">Net Worth</h4>
            <p class="wd-7 mx-auto text-center">(Complete the form below to set your preference)</p>                  
            @include('user.360.modals.networth_form')
        </div>
    </div>
</div> --}}