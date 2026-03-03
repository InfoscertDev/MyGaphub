{{-- Protection --}}
<div class="modal fade" id="protectionModalAccount" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content b-rad-20 wd-c"> 
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob"> Add Account: Protection  
                        <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                    </h2>
                </div> 
                <p class="wd-7 mx-auto text-center">(Complete the form and attach your documentation)</p>
                
                <form action="{{ route('360.store.protection') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="my-2">
                        <div class="form-group row"> 
                            <div class="col-md-5 col-sm-12">
                                What Category of Protection:<sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <select name="category" required id="category" value=""  class="form-control" id="">
                                    <option value="">-- Select --</option>
                                    <option value="Life Insurance">Life Insurance</option>
                                    <option value="Home Insurance">Home Insurance (including Building & Content)</option>
                                    <option value="Car Insurance">Car Insurance</option>
                                    <option value="Emergency Cover">Emergency Cover</option>
                                    <option value="Critical Illness Cover">Critical Illness Cover</option>
                                    <option value="Income Protection">Income Protection</option>
                                    <option value="Gadget/Device Protection">Gadget/Device Protection</option>
                                    <option value="Health Insurance">Health Insurance</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                What type of protection is this:  <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <select name="type" required id="type" value=""  class="form-control" >
                                    <option value="">-- Select --</option>
                                    <option value="Whole of Life">Whole of Life</option>
                                    <option value="Term Assurance">Term Assurance</option>
                                    <option value="Endowment Policy">Endowment Policy</option>
                                    <option value="Anuuity Plan">Anuuity Plan</option>
                                    <option value="Comprehensive Cover">Comprehensive Cover</option>
                                    <option value="Gadget/Device Protection">Gadget/Device Protection</option>
                                    <option value="Third Party Cover">Third Party Cover</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                Details of the protection:  <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <input type="text" name="details" required placeholder="E.g Life Cover for myself" class="form-control b-rad-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                Who is the provider of the policy: <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <input type="text" name="policy" placeholder="E.g Legal & General" class="form-control b-rad-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                What is the provider’s contact:  
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <input type="text" name="contact" placeholder="www.landg.com" class="form-control b-rad-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                What’s the sum assured: <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number" min="0" required name="sum_assured" placeholder="£250,000.00" class="input-money bs-none wd-f form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                What is the premium you pay:<sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-7 col-sm-12"> 
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number" min="0" name="premium" placeholder="£500.00" class="input-money bs-none wd-f form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                What’s your payment frequency:<sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <select name="pay_freq" required id="pay_freq" value=""  class="form-control" id="">
                                    <option value="">-- Select --</option>
                                    <option value="Monthly">Monthly</option>
                                    <option value="Annually">Annually</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                Payment Type: 
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <select name="pay_type"  id="pay_type" value=""  class="form-control" id="">
                                    <option value="">-- Select --</option>
                                    <option value="Direct Debit">Direct Debit</option>
                                    <option value="Debit/Credit Card">Debit/Credit Card</option>
                                    <option value="Standing Order">Standing Order</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                Cover Start/End Dates: <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-7 col-sm-12 row">
                                <div class="col-6"> 
                                    <input type="date" required name="cover_start" class="form-control b-rad-10 pr-0">
                                </div>
                                <div class="col-6"> <input type="date" required name="cover_end" class="form-control b-rad-10 pr-0"></div>
                            </div>
                        </div> 
                        
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                Attach Document: <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <input type="file" required name="document" class="form-control b-rad-10">
                            </div>
                        </div>
    
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                {{-- <small class="text-center"><sup class="text-danger">*</sup>Fields are mandatory</small> --}}
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