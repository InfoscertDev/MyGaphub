<div class="modal fade" id="viewAllocationModal" tabindex="-1" role="dialog" aria-labelledby="editTypeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content  wd-c b-rad-20">
        <div class="modal-body">
            <div class="d-block wd-f mb-4">
                <h2 class="text-center ff-rob text-capitalize">
                    <span class="text-underline" id="allocation_label"></span>
                    <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">X</span>
                    </button>
                </h2>
            </div>
            <div class="my-5">
                    <div class="row mx-4 mb-5">
                        <div class="col-12 d-flex">
                            <h6 class=""><span class="left_percentage"></span>% left</h6>
                            <h6 class="flex-end"> {{ $currency }}<span class="allocation_balance"></span> / {{ $currency }}<span class="allocation_budget"></span></h6>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar seed-{{$seed}}" role="progressbar" style="width: 70%" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group my-4 row">
                        <div class="col-sm-4">
                                Budget:
                        </div>
                        <div class="col-sm-4">
                            {{ $currency }}<span class="allocation_budget"></span>
                        </div>
                        <div class="col-3">
                            <div class="float-right">
                                <span class="mr-3"> <i class="hand fs-18 fa fa-pencil" onclick="handleAllocationEdit()"></i> </span>
                                @if(count($allocation->summary['record_spents']) == 0)
                                     <span class="mr-1"> <i class="hand fs-18 fa fa-trash" onclick="$('#confirmDeleteAccount').modal('show')"></i> </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group my-4 row">
                        <div class="col-sm-4">
                            Balance:
                        </div>
                        <div class="col-sm-6">
                                {{ $currency }} <span class="allocation_balance"></span>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group my-4 row">
                        <div class="col-sm-4">
                            Note:
                        </div>
                        <div class="col-sm-6">
                            <p id="allocation_note"></p>
                        </div>
                    </div>

                    <div class="row mt-4 justify-content-center " id="edit_current" >
                        <button type="button" class="btn btn-sm btn-pry px-4" onclick="handleAllocationTransaction()" >View Transactions</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  -->
<div class="modal fade" id="confirmDeleteAccount" tabindex="-1" role="dialog" aria-labelledby="confirmKpi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Confirm Delete Account</h5>
                <button type="button" class="close" onclick="$('#confirmDeleteAccount').modal('hide');"  aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center my-3 mx-2">
                    <h5 >Are you sure you want to delete this allocation?</h5>
                    <h6 classs=""> All related record spent will be deleted</h6>
                </div>
            </div>

            <form id="deleteForm" action="{{ route('seed.delete.allocation', 3) }}" method="post">
                @csrf
                @method('DELETE')

                <div class="modal-footer justify-content-center">
                    <div class="text-left">
                        <button type="submit" id="confirmAccountRemove"  class="btn btn-pry px-3 mr-3">Yes</button>
                    </div>
                    <div class="text-right">
                        <button type="button" onclick="$('#confirmDeleteAccount').modal('hide');" class="btn btn-default px-3 mr-3">No</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
