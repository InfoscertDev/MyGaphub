<div class="modal fade" id="choiceBespokeModal" tabindex="-1" role="dialog" aria-labelledby="choiceBespokeLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content b-rad-20 wd-c"> 
            {{-- <div class="modal-header">
                <h5 class="modal-title" id="choiceBespokeLabel"></h5>
            </div> --}}
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob">Bespoke KPI  
                            <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                    </h2>
                </div>
                <p class="wd-5 mx-auto text-center">What are you trying to measure? (Select one from the options below) </p>

                <div class="my-4">
                    <div class="form-lane" onclick="showSaveUp()">
                        <span class="mr-3"> <input type="radio" name="form-control" id=""> </span>
                        <span>A target you need to save up for </span>
                    </div>
                    <div class="form-lane" onclick="showDebtUp()">
                        <span class="mr-3"> <input type="radio" name="form-control" id=""> </span>
                        <span>A target of a debt you need to eliminate</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="saveUpModal" tabindex="-1" role="dialog" aria-labelledby="saveUpLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content b-rad-20 wd-db"> 
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob">Saving Up Target
                        <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                    </h2>
                </div>
                <p class="wd-5 mx-auto text-center">(complete the form below)</p>
 
                <div class="my-4 form-sheet sheet-modal"> 
                    <form action="{{ route('save.bespoke') }}" method="POST">
                        @csrf
                        <input type="hidden" name="bespoke" value="samnbvsjhnbvsnhbvsnvsjhsvnxjhxnvhbnvx">
                        <div class="form-group row">
                            <div class="col-6 mt-2">
                                <span class="mr-2 sm-mr-0">1.</span>
                                <label>Give your KPI a name</label>
                            </div>
                            <div class="col-6">
                                <input type="text" name="kpi_name" class="form-control wd-f" maxlength="9" id="" required> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6 mt-2">
                                <span class="mr-2 sm-mr-0">2.</span>
                                <label>Where will the cash be kept?</label>
                            </div>
                            <div class="col-6">
                                {{-- <input type="text" name="cash" class="form-control wd-f" id="">  --}}
                                <select name="cash" class="form-control wd-f" id="" required>
                                    <option value="">-- Select --</option>
                                    <option value="Savings Account">Savings Account</option>
                                    <option value="Term Account">Term Account</option>
                                    <option value="Fixed Account">Fixed Account</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6 mt-2">
                                <span class="mr-2 sm-mr-0">3.</span>
                                <label>Purpose of Savings Target</label>
                            </div>
                            <div class="col-6">
                                {{-- <input type="text" name="purpose" class="form-control wd-f" id="">  --}}
                                <select name="purpose" class="form-control wd-f" id="" required>
                                    <option value="">-- Select --</option>
                                    <option value="Investment Pool Fund">Investment Pool Fund</option>
                                    <option value="Rainy Day Fund">Rainy-Day Fund</option>
                                    <option value="Personal Project Fund">Personal Project Fund</option>
                                    <option value="Family Project Fund">Family Project Fund</option>
                                    <option value="Holiday Fund">Holiday Fund</option>
                                    <option value="Car Purchase Fund">Car Purchase Fund</option>
                                    <option value="Children Education Fund">Children Education Fund</option>
                                    <option value="Home Purchase Savings">Home Purchase Savings</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6 mt-2">
                                <span class="mr-2 sm-mr-0">4.</span>
                                <label>Details of your savings target</label>
                            </div>
                            <div class="col-6">
                                <textarea name="details" class="form-control wd-f" id="" cols="30" rows="4" required></textarea>
                                {{-- <input type="text" class="form-control wd-f" id="">  --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-7 mt-2">
                                <span class="mr-2 sm-mr-0">5.</span>
                                <label>How much is your savings target</label>
                            </div>
                            <div class="col-5">
                                <div class="price-wrap d-flex">
                                    <label for="" class="price-symbol">{{ $symbol }}</label>
                                    <input type="number" name="target" class="form-control wd-f" id="" required> 
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-7 mt-2">
                                <span class="mr-2 sm-mr-0">6.</span>
                                <label>How much have you saved up now</label>
                            </div>
                            <div class="col-5">
                                <div class="price-wrap d-flex">
                                    <label for="" class="price-symbol">{{ $symbol }}</label>
                                    <input type="number" name="current" class="form-control wd-f" id="" required> 
                                </div>
                            </div>
                        </div>
                        <div class="pull-right col-6 text-center"><button type="submit" class="btn btn-sm btn-pry px-5">Save</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 

<div class="modal fade" id="debtEliminateModal" tabindex="-1" role="dialog" aria-labelledby="debtEliminateLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered wd-c" role="document">
        <div class="modal-content b-rad-20 "> 
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob">Debt Elimination Target
                        <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                    </button>
                    </h2>
                </div>
                <p class="wd-5 mx-auto text-center">(complete the form below) </p>

                <div class="my-4 form-sheet sheet-modal">
                    <form action="{{ route('save.bespoke') }}" method="POST">
                        @csrf
                        <input type="hidden" name="bespoke" value="dejhiojdnoijdnsnvhbnvxjhxnvsjhsvnxshyg">
                        <div class="form-group row">
                            <div class="col-7 mt-2">
                                <span class="mr-2 sm-mr-0">1.</span>
                                <label>Give your KPI a name (the creditor)</label>
                            </div>
                            <div class="col-5">
                                <input type="text" name="kpi_name" class="form-control wd-f" id=""  maxlength="9" required> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-7 mt-2">
                                <span class="mr-2 sm-mr-0">2.</span>
                                <label>Interest rate on the amount owed</label>
                            </div>
                            <div class="col-5">
                                <div class="price-wrap d-flex">
                                    <input type="number"  name="interest" min="0" max="100" class="form-control wd-f" id="" required> 
                                    <label for="" class="price-per">%</label>
                                </div> 
                            </div> 
                        </div>
                        <div class="form-group row">
                            <div class="col-7 mt-2">
                                <span class="mr-2 sm-mr-0">3.</span>
                                <label>What type of debt is this?</label>
                            </div>
                            <div class="col-5">
                                {{-- <input type="text" name="dept_type" class="form-control wd-f" id="">  --}}
                                <select name="dept_type" class="form-control wd-f" id="" required>
                                    <option value="">-- Select --</option>
                                    <option value="Credit Card">Credit Card</option>
                                    <option value="Overdraft">Overdraft</option>
                                    <option value="Loans">Loans</option>
                                    <option value="Friend and Family">Friend and Family</option>
                                    <option value="Delayed Payment">Delayed Payment</option>
                                    <option value="Hire Purchase">Hire Purchase</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>  
                        <div class="form-group row">
                            <div class="col-7 mt-2">
                                <span class="mr-2 sm-mr-0">4.</span>
                                <label>Details of your debt</label>
                            </div>
                            <div class="col-5">
                                <textarea name="details" class="form-control wd-f" id="" cols="30" rows="4" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-7 mt-2">
                                <span class="mr-2 sm-mr-0">5.</span>
                                <label>How much do you currently owe</label>
                            </div>
                            <div class="col-5">  
                                <div class="price-wrap d-flex">
                                    <label for="" class="price-symbol">{{ $symbol }}</label>
                                    <input type="number" name="current" class="form-control wd-f" id="" required> 
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-7 mt-2">
                                <span class="mr-2 sm-mr-0">6.</span>
                                <label>How much did you borrow originally</label>
                            </div>
                            <div class="col-5">
                                <div class="price-wrap d-flex">
                                    <label for="" class="price-symbol">{{ $symbol }}</label>
                                    <input type="number" name="baseline" class="form-control wd-f" id="" required> 
                                </div>
                            </div>
                        </div>
                        <div class="pull-right col-6 text-center"><button type="submit" class="btn btn-sm btn-pry px-5">Save</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="choiceBespokeModal" tabindex="-1" role="dialog" aria-labelledby="choiceBespokeLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content b-rad-20 wd-c"> 
            {{-- <div class="modal-header">
                <h5 class="modal-title" id="choiceBespokeLabel"></h5>
            </div> --}}
            <div class="modal-body"> 
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob">Bespoke KPI</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <p class="wd-5 mx-auto text-center">What are you trying to measure? (Select one from the options below) </p>

                <div class="my-4">
                    <div class="form-lane" onclick="showSaveUp()">
                        <span class="mr-3"> <input type="radio" name="form-control" id=""> </span>
                        <span>A target you need to save up for </span>
                    </div>
                    <div class="form-lane" onclick="showDebtUp()">
                        <span class="mr-3"> <input type="radio" name="form-control" id=""> </span>
                        <span>A target of a debt you need to eliminate</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

function showSaveUp(){
    $("#choiceBespokeModal").modal('hide');
    setTimeout(()=> { $("#saveUpModal").modal('show');}, 700);
}

function showDebtUp(){
    $("#choiceBespokeModal").modal('hide');
    setTimeout(()=> {$("#debtEliminateModal").modal('show');}, 700); 
}
</script>