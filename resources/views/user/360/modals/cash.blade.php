{{--  Cash --}}
<div class="modal fade" id="cashModalAccount" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content b-rad-20 wd-c"> 
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob">Add Account: Cash         
                        <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                    </h2>
                </div>
                <p class="wd-7 mx-auto text-center">(Complete the form below for your savings target)</p>
                <form name="cashRateForm"  id="cashRateForm" class="mb-0">   @csrf</form>
                <form action="{{ route('360.store.cash') }}" method="post">
                    @csrf
                    <div class="my-2">
                        <div class="form-group row">
                            <div class="col-md-7 col-sm-12">
                                Give your account a name: <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <input type="text" name="act_name" required maxlength="50" class="form-control b-rad-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-7 col-sm-12">
                                What type of bank account is holding the cash:   <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <select name="cash" class="form-control wd-f" id="" required>
                                    <option value="">-- Select --</option>
                                    <option value="Savings Account">Savings Account</option>
                                    <option value="Term Deposit">Term Deposit</option>
                                    <option value="Fixed Deposit">Fixed Deposit</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-7 col-sm-12">
                                How would you categorise the purpose of this funds:   <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <select name="purpose" class="form-control wd-f" id="" required>
                                    <option value="">-- Select --</option>
                                    <option value="Investment Pool Fund">Investment Pool Fund</option>
                                    <option value="Rainy-Day Fund">Rainy-Day Fund</option>
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
                            <div class="col-md-7 col-sm-12">
                                Details of what you will like to do with this savings : 
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <input type="text" name="details" placeholder="E.g Buy wife a new car" class="form-control b-rad-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-7 col-sm-12">
                                Where is the funds located: 
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <input type="text" name="fund" placeholder="Name of bank, e.g Barclays" class="form-control b-rad-10">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <div class="col-md-7 col-sm-12">
                                Which currency is the funds held in: <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <select name="currency" id="currency" value="" required  class="form-control" id="">
                                    <option value="">-- Select --</option>
                                    @foreach ($currencies as $current)
                                        <option value="{{ $current }}">{{ $current }}</option>
                                    @endforeach
                                  </select>
                            </div>
                        </div>
                        @include('widgets.cash_conversion')

                        <div class="form-group row">
                            <div class="col-md-7 col-sm-12">
                                How much are you targeting to save: <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <input type="number" min="0" name="target" required class="form-control b-rad-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-7 col-sm-12">
                                How much do you have saved up as at today: <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <input  type="number" min="0" name="current" required class="form-control b-rad-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-7 col-sm-12">
                                What date will you like to achieve this goal by:  
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <input type="date" name="target_date" min="{{date('Y-m-d')}}" class="form-control b-rad-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-7 col-sm-12">
                                <span class="">Show account in Analytics:  </span> 
                            </div> 
                            <div class="col-md-5 col-sm-12">
                                <div class=" switch text-left">
                                   <input class="" id="switch_cash" name="analytics" type="checkbox" /><label data-off="OFF" data-on="ON" for="switch_cash"></label>
                                </div>
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