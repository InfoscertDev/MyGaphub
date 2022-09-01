
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
                        <span class="float-right"><i class="fa fa-pencil mr-3 mt-3" onclick="handleUpdateRecord()"></i></span>
                          <div class="ico bg-info">  </div>
                          <h5 class="pb-1" id="record_label"></h5>
                          <p>
                            {{$currency}}<span id="record_amount"></span>
                            <span class="ml-2"><i class="fa fa-repeat" id="record_recursion" style="display: none;"></i></span>
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
                            <h6 class="text-muted">Spent last mouth
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
