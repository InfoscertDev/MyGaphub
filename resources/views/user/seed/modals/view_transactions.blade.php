
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
                        <span class="float-right"><i class="fa fa-pencil mr-3 mt-3"></i></span>
                          <div class="ico bg-info">  </div>
                          <h5 class="pb-1" id="record_label"></h5>
                          <p>
                            {{$currency}}<span id="record_amount"></span>
                            <span class="ml-2"><i class="fa fa-rotate"></i></span>
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
                            <h6 class=""></h6>
                        </li>
                        <li class="list-group-item">
                            <h6 class="text-muted">Spent last mouth
                                 <span class="float-right"><i class="fa fa-timer"></i></span>
                            </h6>
                            <h6 class=""></h6>
                        </li>
                        <li class="list-group-item">
                            <h6 class="text-muted">Note
                                <span class="float-right"><i class="fa fa-note"></i></span>
                            </h6>
                            <p id="record_note"> </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
