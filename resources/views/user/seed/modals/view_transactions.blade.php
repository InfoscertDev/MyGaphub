
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
                    <!-- @foreach($allocations as $allocation)
                        <div style="height:50px" class="list-group-item mb-2 bg-gray d-flex" data-allocation="{{$allocation->id}}" onclick="handleAllocationView(this)">
                            <span class="box-badge">D</span>
                            <p>{{ $allocation->label }}</p>
                            <p class="flex-end">{{$currency}}{{ number_format($allocation->amount, 2) }}</p>
                        </div>
                    @endforeach -->
                </div>
            </div>
        </div>
    </div>
</div>

