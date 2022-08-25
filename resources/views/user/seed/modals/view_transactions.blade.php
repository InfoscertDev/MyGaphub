
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
                          <div class="ico bg-info"> D </div>
                          <h5 class="pb-1"> Delta Supermarket</h5>
                          <p>{{$currency}}400.00</p>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <h6 class="text-muted">Date
                                <span class="float-right"><i class="fa fa-calendar"></i></span>
                            </h6>
                            <h6 class="">Tue, 12 July 2022</h6>
                        </li>
                        <li class="list-group-item">
                            <h6 class="text-muted">Spent so far this month
                                <span class="float-right"><i class="fa fa-user"></i></span>
                            </h6>
                            <h6 class="">{{$currency}}300.00</h6>
                        </li>
                        <li class="list-group-item">
                            <h6 class="text-muted">Spent last mouth</h6>
                            <h6 class="">{{$currency}}300.00</h6>
                        </li>
                        <li class="list-group-item">
                            <h6 class="text-muted">Note
                                <span class="float-right"><i class="fa fa-note"></i></span>
                            </h6>
                            <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti laborum fugiat velit! </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
