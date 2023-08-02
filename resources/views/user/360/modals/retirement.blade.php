
<div class="modal fade" id="retirementModalAccount" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content b-rad-20 wd-c">
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob"> Add Account: Pension
                        <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                    </h2>
                </div>
                <p class="wd-7 mx-auto text-center">(Complete the form below to record details of your pension)</p>

                <form action="{{ route('360.store.retirement') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="my-2">
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                Give your pension plan a name:  <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <input type="text" name="pension_name" required placeholder="My Plan" class="form-control b-rad-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                What is the name of the pension provider:  <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <input type="text" name="pension_provider" required placeholder="" class="form-control b-rad-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                What type of pension is it:  <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <select name="pension_type" required id="pension_type" value=""  class="form-control" id="">
                                    <option value="">-- Select --</option>
                                    <option value="Private Pension">Private Pension</option>
                                    <option value="Company Pension">Company Pension</option>
                                    <option value="State Pension">State Pension</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                What is the current balance:   <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number"  step="0.01" name="current" required min="0" placeholder="" class="input-money bs-none wd-f form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                How much income will this balance generate now: <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number"  step="0.01" min="0" name="assured_income" placeholder="E.g  £1,500.00" class="input-money bs-none wd-f form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                How much do you contribute monthly:  <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number"  step="0.01" min="0"  required name="monthly_cont" class="input-money bs-none wd-f form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                What is the retirement age in your country:  <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="price-wrap d-flex ">
                                    <input type="number"  min="0"  max="120" name="retire_age" placeholder="" class="form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        @if(!auth()->user()->profile->date_of_birth)
                            <div class="form-group row">
                                <div class="col-md-6 col-sm-12">
                                    What is your date of birth: <sup class="text-danger">*</sup>
                                </div>
                                <div class="col-md-6 col-sm-12 row">
                                    <input type="date" required name="dob" class="form-control b-rad-10">
                                </div>
                            </div>
                        @endif
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
