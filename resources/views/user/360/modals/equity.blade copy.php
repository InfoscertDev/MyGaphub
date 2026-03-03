<div class="modal fade" id="equityModalAccount" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content b-rad-20 wd-c"> 
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob">Add Account: Home Equity         
                        <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                    </h2>
                    <p class="wd-7 mx-auto text-center">(Complete the form below to add your home details)</p>
                </div>
                <form action="{{ route('360.store.equity') }}" method="post">
                    @csrf
                    <div class="my-2">
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                Is there mortgage on this property: <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <select name="ismortgage" id="ismortgage" value="" required  class="form-control" id="">
                                    <option value="">-- Select --</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                  </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                What is the current mortgage balance: <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <select name="mortgage" id="mortgage" value="" required  class="form-control" id="">
                                    <option value="">-- Select --</option>
                                    @foreach ($mortgages as $mortgage)
                                        <option value="{{ $mortgage->id }}">{{ $mortgage->creditor_name }} ({{$currency}}{{ $mortgage->current_balance }})</option>
                                    @endforeach
                                  </select>
                                  <p><small>Mortgage balance not found from the list?  <a href="{{ route('360.mortgage') }}" class="text-dark">Add mortgage account now</a></small></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                Home Location/Address: <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <input placeholder="123 Downing Street" type="text" name="location" required maxlength="50" class="form-control b-rad-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                Post Code / Zip Code:  <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <input type="text" name="zip_code" required maxlength="50" class="form-control b-rad-10">
                            </div>
                        </div>
                         {{--<div class="form-group row">
                            @php
                                $homes = ["Primary Residence","Holiday Home", "Vacant Land","Others"]
                            @endphp
                            <div class="col-md-6 col-sm-12">
                                What type of home is this:      <sup class="text-danger">*</sup>                           
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <select name="equity_type" class="form-control wd-f" id="" required>
                                    <option value="">-- Select --</option>
                                    @foreach ($homes as $home)
                                        <option value="{{ $home }}">{{ $home }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                Your personal description of the home : 
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <textarea name="description" placeholder="E.g 3 Bed Town House" class="form-control b-rad-10" id="" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                What was the total cost of buying this home:  
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <input type="number"  name="purchase_cost" placeholder="" class="form-control b-rad-10">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                How much of your saving went into buying this home:<sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <input type="number" required name="purchase_fund" placeholder="" class="form-control b-rad-10">
                            </div>
                        </div>  --}}
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                Current market value of your home:<sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <input type="number" required name="market_value" placeholder="" class="form-control b-rad-10">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                <small class="text-center"><sup class="text-danger">*</sup>Fields are mandatory</small>
                            </div>
                            <div class="text-center col-md-6 col-sm-12">
                                <button type="submit" class="btn btn-sm btn-pry px-4">Submit</button>
                            </div>
                        </div>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>