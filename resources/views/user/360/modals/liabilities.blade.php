{{--  Liabilities --}}
<div class="modal fade" id="liabilityModalAccount" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content b-rad-20 wd-c"> 
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob">Add Account: Liability          
                        <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                    </h2>
                </div>
                 
                <p class="wd-7 mx-auto text-center">(Complete the form below for your credit reduction target)</p>
                <form name="liabilityRatedForm"  id="liabilityRatedForm" class="mb-0">   @csrf</form>
                <form action="{{ route('360.store.liability') }}" method="POST">
                    @csrf
                    <input type="hidden" id="snioj2isjdmniondcjnfc" name="snioj2isjdmniondcjnfc" value="">
                    <div class="my-2">
                        <div class="form-group row">
                            <div class="col-md-7 col-sm-12">
                                Who is the creditor: <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <input type="text" name="lia_creditor" placeholder="E.g Barclaycard" required class="form-control b-rad-10" max="20">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-7 col-sm-12">
                                What type of credit account is this:     <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <select name="credit_type" class="form-control wd-f" id="" required>
                                    <option value="">-- Select --</option>
                                    <option value="Credit Card">Credit Card</option>
                                    <option value="Overdraft">Overdraft</option>
                                    <option value="Unsecured Loans">Unsecured Loans</option>
                                    <option value="Delayed Payment">Delayed Payment</option>
                                    <option value="Hire Purchase">Hire Purchase</option>
                                    <option value="Family & Friends">Family & Friends</option>
                                    <option value="Secured Loans">Secured Loans</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-7 col-sm-12">
                                Details of what you did with the money : 
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <textarea  name="lia_detail" placeholder="E.g Carried out major car repairs" class="form-control b-rad-10" rows="2"></textarea>
                                <!-- <input type="text" name="lia_detail" class="form-control b-rad-10"> -->
                            </div>
                        </div>
                        <div class="form-group row" id="currencyLane">
                            <div class="col-md-7 col-sm-12">   
                                Which currency is the money borrowed:   <sup class="text-danger">*</sup>
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
                        @include('widgets.liability_conversion')
                        <div class="form-group row">
                            <div class="col-md-7 col-sm-12">
                                How much did you borrow originally:    <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-5 col-sm-12"> 
                                <div class="price-wrap d-flex">
                                    <label for="" class="price-currency mt-2" style="left: 13px;">{{$currency}}</label>
                                    <input type="number" name="baseline" min="0" required  class="pl-3 form-control b-rad-10">
                                </div>
                            </div>
                        </div> 
                        <div class="form-group row">
                            <div class="col-md-7 col-sm-12">
                                How much do you have left to pay: <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <div class="price-wrap d-flex">
                                    <label for="" class="price-currency mt-2" style="left: 13px;">{{$currency}}</label>
                                    <input type="number" name="current" min="0" required  class="form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-7 col-sm-12">
                                What is the interest rate on the amount borrowed: <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-5 col-sm-12">
                                
                                <div class="price-wrap percentage d-flex">
                                    <input type="number" step="any"  min="0" max="100" name="interest" class="percent wd-5 form-control b-rad-10">
                                    <span class="bg-dark ml-2 px-2 pt-2 text-white txt-percent ">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-7 col-sm-12">
                                How much do you pay back periodically:
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <div class="price-wrap d-flex"> 
                                    <label for="" class="price-currency mt-2" style="left: 13px;">{{$currency}}</label>
                                    <input type="number" name="period_pay" min="0" class="form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-7 col-sm-12">
                                When will you like to close this credit account:    
                            </div> 
                            <div class="col-md-5 col-sm-12"> 
                                <input type="date" name="target_date" min="<?php echo date('Y-m-d') ?>" class="form-control b-rad-10">
                            </div> 
                        </div>
                        <div class="form-group row" id="show_account_lane">
                            <div class="col-md-7 col-sm-12">
                                <span class="">Show account in Analytics:  </span> 
                            </div> 
                            <div class="col-md-5 col-sm-12"> 
                                <div class=" switch text-left">
                                   <input class="" id="switch_liability" name="analytics" type="checkbox" /><label data-off="OFF" data-on="ON" for="switch_liability"></label>
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
<script>
     $(function() { 
        $(window).on('shown.bs.modal', function() {  
            if(isCreditor){   
                $('#currencyLane').hide();  
                $('#currency').val(default_currency) ; 
                $('#show_account_lane').hide();
                $('.price-currency').show();
                $('#snioj2isjdmniondcjnfc').val('ajknsjkndjckndcjknjksdncjmdnc');
            }else{ 
                $('#currencyLane').fadeIn();
                $('#show_account_lane').fadeIn();  
                $('.price-currency').hide(); 
                $('#snioj2isjdmniondcjnfc').val('');
            }
        });
     }); 
</script>
