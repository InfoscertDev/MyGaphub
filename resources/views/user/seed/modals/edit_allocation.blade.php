<div class="modal fade" id="editAssetAllocationModal" tabindex="-1" role="dialog" aria-labelledby="editTypeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content  b-rad-20">
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob text-capitalize">
                        Update <span class="seed_category"> </span> Allocation
                        <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                    </h2>
                </div>
                <p class="wd-7 mx-auto text-center">(Complete the form below) </p>
                <form action="{{ route('seed.update.allocation',16) }}" id="edit_allocation" method="POST">
                    @csrf
                    <input type="hidden" name="jhbxjhbsuhjbhajbghjvajhbsxgb" value="yugvabhjvbavbjhzbjhbhajvbhgvbhvjbjhbazJHbbj">
                    <input type="hidden" name="category" value="savings">
                    <div class="my-4">
                        <!-- <div class="row">
                            <div ><h6 class="bold text-uppercase mx-3">SAVINGS</h6></div>
                            <div ><h6 class="text-underline">{{ $currency }}{{number_format($current_detail['table']['savings'],2)}} </h6></div>
                        </div> -->

                        <div class="form-group my-3 row">
                            <div class="col-sm-6">
                                <span class="seed_category text-capitalize "> </span>  Category:
                            </div>
                            <div class="col-sm-6">
                                <input type="text" id="edit_label" name="label" placeholder="Label Name"  class="bs-none form-control b-rad-10 wd-8">
                            </div>
                        </div>
                        <div class="form-group my-3 row">
                            <div class="col-sm-6">
                                Amount:
                            </div>
                            <div class="col-sm-6">
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number" onfocus="focalPoint(this)"  name="amount" id="edit_amount" required  min="0" value="0"  class="bs-none input-money wd-f form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group my-3 row">
                            <div class="col-sm-6">
                                Additional Note:
                            </div>
                            <div class="col-sm-6">
                                <textarea name="note" id="edit_note" class="form-control b-rad-10" rows="2"></textarea>
                            </div>
                        </div>

                        <!-- <div class="form-group my-3 row record_details" >
                            <div class="col-sm-6">
                               Recurring:
                            </div>
                            <div class="col-sm-6">
                                <div class="switch text-left">
                                   <input class="" id="allocation_recurring" name="recuring" type="checkbox" /><label data-off="OFF" data-on="ON" for="allocation_recurring"></label>
                                </div>
                            </div>
                        </div> -->

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
