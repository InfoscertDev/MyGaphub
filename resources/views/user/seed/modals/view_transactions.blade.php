
<div class="modal fade" id="viewTransactionsModal" tabindex="-1" role="dialog" aria-labelledby="editTypeModalLabel" aria-hidden="true">
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
                <div class="my-3">
                    <div id="spent_list"></div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="viewRecordDetailModal" tabindex="-1" role="dialog" aria-labelledby="editTypeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content  wd-c b-rad-20">
            <div class="modal-body">
                <div class="d-block wd-f mb-4">
                    <!-- <h2 class="text-center ff-rob text-capitalize">
                        <span class="text-underline" id="allocation_label"></span>
                        <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                    </h2> -->
                </div>
                <div class="record_summary">
                    <div class="preview">
                        <div class="float-right">
                            <span class="" id="edit_record"><i class="fa fa-pencil mr-3 mt-3" onclick="handleUpdateRecord()"></i></span>
                            <span class="mr-2"> <i class="hand fs-18 fa fa-trash" onclick="$('#confirmDeleteRecordSpent').modal('show')"></i> </span>
                        </div>
                          <div class="ico bg-info">  </div>
                          <h5 class="pb-1" id="record_label"></h5>
                          <p>
                            {{$currency}}<span id="record_amount"></span>
                            <span class="ml-2" id="record_recursion" style="display: none;">
                                <svg style="width: 12px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M105.1 202.6c7.7-21.8 20.2-42.3 37.8-59.8c62.5-62.5 163.8-62.5 226.3 0L386.3 160H336c-17.7 0-32 14.3-32 32s14.3 32 32 32H463.5c0 0 0 0 0 0h.4c17.7 0 32-14.3 32-32V64c0-17.7-14.3-32-32-32s-32 14.3-32 32v51.2L414.4 97.6c-87.5-87.5-229.3-87.5-316.8 0C73.2 122 55.6 150.7 44.8 181.4c-5.9 16.7 2.9 34.9 19.5 40.8s34.9-2.9 40.8-19.5zM39 289.3c-5 1.5-9.8 4.2-13.7 8.2c-4 4-6.7 8.8-8.1 14c-.3 1.2-.6 2.5-.8 3.8c-.3 1.7-.4 3.4-.4 5.1V448c0 17.7 14.3 32 32 32s32-14.3 32-32V396.9l17.6 17.5 0 0c87.5 87.4 229.3 87.4 316.7 0c24.4-24.4 42.1-53.1 52.9-83.7c5.9-16.7-2.9-34.9-19.5-40.8s-34.9 2.9-40.8 19.5c-7.7 21.8-20.2 42.3-37.8 59.8c-62.5 62.5-163.8 62.5-226.3 0l-.1-.1L125.6 352H176c17.7 0 32-14.3 32-32s-14.3-32-32-32H48.4c-1.6 0-3.2 .1-4.8 .3s-3.1 .5-4.6 1z"/></svg>
                            </span>
                          </p>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <h6 class="text-muted">Date
                                <span class="float-right"><i class="fa fa-calendar"></i></span>
                            </h6>
                            <h6 id="record_date"></h6>
                        </li>
                        <li class="list-group-item">
                            <h6 class="text-muted">Spent so far this month
                                <span class="float-right"><i class="fa fa-money"></i></span>
                            </h6>
                            <h6 class="">
                                {{$currency}}<span id="spent_current_month"></span>
                            </h6>
                        </li>
                        <li class="list-group-item">
                            <h6 class="text-muted">Spent last month
                                 <span class="float-right"><i class="fa fa-calendar"></i></span>
                            </h6>
                            <h6 class="">
                                {{$currency}}<span id="spent_last_month"></span>
                            </h6>
                        </li>
                        <li class="list-group-item">
                            <h6 class="text-muted">Note
                                <span class="float-right"><i class="fa  fa-sticky-note"></i></span>
                            </h6>
                            <p id="record_note"> </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editRecordDetailModal" tabindex="-1" role="dialog" aria-labelledby="editTypeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content  b-rad-20">
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob text-capitalize">
                        Update <span class="seed_category"> </span> Record
                        <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                    </h2>
                </div>
                <p class="wd-7 mx-auto text-center">(Complete the form below) </p>
                <form action="{{ route('seed.update.record_spent',16) }}" id="edit_record_allocation" method="POST">
                    @csrf
                    <input type="hidden" name="jhbxjhbsuhjbhajbghjvajhbsxgb" value="yugvabhjvbavbjhzbjhbhajvbhgvbhvjbjhbazJHbbj">
                    <input type="hidden" name="category" value="savings">
                    <div class="my-4">

                        <div class="form-group my-3 row">
                            <div class="col-sm-6">
                                <span class="seed_category text-capitalize "> </span>  Payee:
                            </div>
                            <div class="col-sm-6">
                                <input type="text" id="edit_record_label" name="label" placeholder="Label Name"  class="bs-none form-control b-rad-10 wd-8">
                            </div>
                        </div>
                        <div class="form-group my-3 row">
                            <div class="col-sm-6">
                                Amount:
                            </div>
                            <div class="col-sm-6">
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number" onfocus="focalPoint(this)"  name="amount" id="edit_record_amount" required  min="0" value="0"  class="bs-none input-money wd-f form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group my-3 row">
                            <div class="col-sm-6">
                                Note:
                            </div>
                            <div class="col-sm-6">
                                <textarea name="note" id="edit_record_note" class="form-control b-rad-10" rows="2"></textarea>
                            </div>
                        </div>

                        <div class="form-group my-3 row record_details" >
                            <div class="col-sm-6">
                               Recurring:
                            </div>
                            <div class="col-sm-6">
                                <div class="switch text-left">
                                   <input class="" id="update_record_recurring" name="record_spend_recuring" type="checkbox" /><label data-off="OFF" data-on="ON" for="update_record_recurring"></label>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4 justify-content-center " id="edit_current" >
                            <button type="submiit" class="btn btn-md btn-pry px-4">Update</button>
                        </div>
                        <!-- <div class="row mt-3 justify-content-center " id="total_current">
                            <span class="h5 mr-3">Total</span>
                            <div type="submiit" class="btn-pry px-4">{{ $currency }}{{number_format($current_detail['total'],2)}}</div>
                        </div>  -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--  -->
<div class="modal fade" id="confirmDeleteRecordSpent" tabindex="-1" role="dialog" aria-labelledby="confirmKpi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Confirm Delete Account</h5>
                <button type="button" class="close" onclick="$('#confirmDeleteRecordSpent').modal('hide');"  aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="text-center">Are you sure you want to delete this record spent?</h5>
            </div>

            <form id="deleteRecordForm" action="{{ route('seed.delete.record_spent', 3) }}" method="post">
                @csrf
                @method('DELETE')

                <div class="modal-footer justify-content-center">
                    <div class="text-left">
                        <button type="submit" id="confirmAccountRemove"  class="btn btn-pry px-3 mr-3">Yes</button>
                    </div>
                    <div class="text-right">
                        <button type="button" onclick="$('#confirmDeleteRecordSpent').modal('hide');" class="btn btn-default px-3 mr-3">No</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
