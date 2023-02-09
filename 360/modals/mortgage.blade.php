{{--  Mortgage  --}}
<div class="modal fade" id="mortgageModalAccount" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content b-rad-20 wd-c"> 
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob">Add Account: Mortgage
                        <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                    </h2>  
                </div>
                <p class="wd-7 mx-auto text-center">(Complete the form below for your credit reduction target)</p>
                <form action="{{ route('360.store.mortgage') }}" method="POST">
                    @csrf
                    <div class="my-2">
                        <div class="form-group row">
                            <div class="col-md-7 col-sm-12">
                                Who is the creditor: <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <input type="text" name="mor_creditor" required class="form-control b-rad-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-7 col-sm-12">
                                Description of Mortgage:     <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <select name="mor_description" class="form-control wd-f" id="" required>
                                    <option value="">-- Select --</option>
                                    <option value="First Charge Mortgage">First Charge Mortgage</option>
                                    <option value="Second Charge Mortgage">Second Charge Mortgage</option>
                                    <option value="Secured Loan">Secured Loan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row"> 
                            <div class="col-md-7 col-sm-12">
                                What asset is this mortgage secured against:    <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <select name="secure_against" class="form-control wd-f" id="secure_against" required>
                                    <option value="">-- Select --</option>
                                    @if(!$equity_info['primary_exist']) <option value="Primary Residential Home">Primary Residential Home</option> @endif
                                    <option value="Secondary Residence">Secondary Residence</option>
                                    <option value="Holiday Home">Holiday Home</option>
                                    <option value="Investment Property">Investment Property</option>
                                    <option value="Vacant Land">Vacant Land</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-7 col-sm-12">
                                Address of property linked to this mortgage:
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <input type="text" name="mor_detail" id="mor_detail" class="form-control b-rad-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-7 col-sm-12"> 
                                What was the mortgage opening balance:   <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                     <input type="number" min="0" name="open_bal" required class=" input-money bs-none  wd-f form-control b-rad-10">
                                 </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-7 col-sm-12">
                                What is the current mortgage balance:   <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input  type="number" min="0" name="cur_bal" required  class="input-money bs-none  wd-f form-control b-rad-10">
                                </div>
                            </div>
                        </div> 
                        <div class="form-group row">  
                            <div class="col-md-7 col-sm-12">
                                What is the monthly payment amount: <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input  type="number" min="0" name="month_pay" required  class="input-money bs-none  wd-f form-control b-rad-10">
                                </div>
                            </div> 
                        </div>
                        <div class="form-group row">
                            <div class="col-md-7 col-sm-12">
                                What is the interest rate on this mortgage:
                            </div>
                            <div class="col-md-5 col-sm-12"> 
                                <div class="price-wrap percentage d-flex">
                                    <input type="number" min="0" max="100" name="interest" class="percent wd-5 form-control b-rad-10">
                                    <span class="bg-dark ml-2 px-2 pt-2 text-white txt-percent ">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-7 col-sm-12">
                                What is your accelerated mortgage repayment plan:
                            </div>
                            <div class="col-md-5 col-sm-12"> 
                                <textarea name="repay" id="repay"  class="form-control b-rad-10" rows="1"></textarea>
                                {{-- <input type="number" min="0" name="repay" class="form-control b-rad-10"> --}}
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <div class="col-md-7 col-sm-12">
                                Is this mortgage on your primary place of residence:  
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <select name="residential" id="residential" value=""  class="form-control" id="">
                                    <option value="">-- Select --</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div> 
                        </div>
                        <div class="form-group row">
                            <div class="col-md-7 col-sm-12">
                                <span class="">Show account in Analytics:  </span> 
                            </div> 
                            <div class="col-md-5 col-sm-12">
                                <div class=" switch text-left">
                                <input class="" id="switch_mortgage" name="analytics" type="checkbox" /><label data-off="OFF" data-on="ON" for="switch_mortgage"></label>
                                </div>
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <div class="col-6"></div>
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
   var resident_location = <?php echo $equity_info['residential'] ?>;

   $(function(){ 
        $('#secure_against').change( function(){
            var secured = $(this).val();
            if(secured == 'Primary Residential Home'){
                console.log($('#mor_detail')); 
                $('#mor_detail').val(resident_location.location);
            } 
        });
   });
</script> 