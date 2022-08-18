
<div class="modal fade" id="savingsSummaryModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content wd-c b-rad-20">
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob">
                        Savings Allocation Summary
                        <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                    </h2>

                </div>
                <!-- <p class="wd-7 mx-auto text-center">(Complete the form below) </p> -->
               <div class="my-4">
                    <table class="table table-striped wd-f">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Label</th>
                                <th scope="col">Budget</th>
                                <th scope="col">Available Balance</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($savings_allocation as $allocation)
                                <tr>
                                    <th></th>
                                    <td>{{ $allocation->label }}</td>
                                    <td>{{$currency}}{{ number_format($allocation->amount, 2) }}</td>
                                    <td>{{$currency}}{{ number_format($allocation->amount, 2) }}</td>
                                    <td>
                                        <button class="btn btn-sm mr-3">Edit</button>
                                        <button class="bg-none br-none mr-2"><i class="fa fa-archive"></i> </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4 mb-2 text-center">
                        <button class="btn btn-md btn-pry px-4"  data-toggle="modal" data-target="#savingsAllocationModal" onclick="$('#savingsSummaryModal').modal('hide')" > Add More </button>
                    </div>
               </div>
            </div>
        </div>
    </div>
</div>
