
<div class="modal fade" id="editPensionModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content b-rad-20 wd-c sm-wd-c"> 
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob"> <span id="name"></span> – <span id="pension_info"></span> : Retirement     
                        <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                    </h2>
                     
                </div>
                <p class="wd-7 mx-auto text-center">(view & edit)</p> 
                <form id="" action="{{ route('360.update.retirement', 0) }}" method="POST">
                    @csrf
                    <input type="hidden" id="msnxjnzxnxnakn" name="sjnxjknsxkjnxijnsxknixncio">
                    <input type="hidden" id="paojsjbcnbxhncb" name="pakmamkanknmjkmnzkmnjmnd">
                   
                    <div class="my-2">
                        <div class="mb-3">
                            <div class="form-group row sm-mx-0 mx-2">
                                <div class="col-4"><h5 class="sm-fs-14  bold">Pension POT</h5> </div>
                                <div class="col-4">
                                    <h5 class="sm-fs-14  text-underline text-center">Current Year</h5> 
                                </div> 
                                <div class="col-4"> 
                                    <h5 class="sm-fs-14  text-underline text-center">Retirement Year</h5>  
                                </div>
                            </div>
                            <div class="form-group row sm-mx-0 mx-2">
                                <div class="col-4"> 
                                    <label class="">Balance
                                        <span class=" " style="top: -8px; position: relative;" data-toggle="tooltip" data-placement="right" title="This increases on a month-bymonth basis by adding monthly contributions">
                                            <i class="fa fa-info mx-2"></i>
                                        </span>
                                    </label>  
                                </div>
                                <div class="col-4">
                                    <div class="input-group  wd-9 mx-auto  mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">{{ $currency }}</span>
                                        </div>
                                        <input type="text" disabled name="current" id="current" min="0" required  class="bs-none form-control">
                                    </div>
                                </div>
                                <div class="col-4"> 
                                    <div class="input-group  wd-9 mx-auto  mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">{{ $currency }}</span>
                                        </div>
                                        <input type="text" required name="retire_balance" id="retire_balance" min="0" disabled class="form-control" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row sm-mx-0 mx-2">
                                <div class="col-4"> 
                                    <label class="sm-fs-12">Accured Monthly <br> Income
                                        <span class=" " style="top: -8px; position: relative;" data-toggle="tooltip" data-placement="right" title="This is calculated using an assumed
                                                    interest rate. It is only a guide and not to be taken as the accurate value">
                                            <i class="fa fa-info mx-2"></i>
                                        </span>
                                    </label>  
                                </div>  
                                <div class="col-4">
                                    <div class="input-group wd-9 mx-auto mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">{{ $currency }}</span>
                                        </div>
                                        <input type="text" disabled name="assured_income" id="assured_income" min="0" required  class="form-control">
                                    </div>
                                </div>
                                <div class="col-4"> 
                                    
                                    <div class="input-group wd-9 mx-auto mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">{{ $currency }}</span>
                                        </div>
                                        <input type="text" disabled name="retire_income" id="retire_income" min="0" required  class="form-control">
                                    </div>
                                    <!-- <div class="d-flex price-wrap" > 
                                        <label for="" class="price-currency mt-1 pl-2">{{ $currency }}</label>
                                        <input type="text" disabled name="retire_income" id="retire_income" min="0" required  class="bs-none input-money form-control b-rad-10">
                                    </div> -->
                                </div>
                            </div>
                        </div>

                        <div class="d-block my-3">  
                            <span class="text-center">
                                <h5 class="text-underline bold">Other Details
                                    <button type="button" class="ml-2 bg-none btn fa fa-edit btn-sm" onclick="toggleEdit()"></button>
                                </h5>
                            </span>
                        </div> 
                        <div class="form-group row">
                            <div class="col-md-6">
                                Name of the pension provider:
                            </div>
                            <div class="col-md-6">
                                <textarea disabled name="provider" id="provider"  class="form-control b-rad-10" rows="1"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6"> 
                                Monthly Contributions:
                            </div>
                            <div class="col-md-6">
                                <div class="input-group  mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">{{ $currency }}</span>
                                    </div>
                                    <input type="number"  name="monthly" id="monthly" min="0" required  disabled class="form-control" >
                                </div>
                            </div>
                        </div> 
                        <div class="form-group row"> 
                            <div class="col-md-6">
                                Retirement Age:
                            </div>
                            <div class="col-md-6">
                                  <input type="number" disabled name="retirement" id="retirement" min="0" required  class="form-control b-rad-10">
                            </div>
                        </div>    
                        <div class="form-group row">
                            <div class="col-md-6">
                                Years to Retirement:
                            </div> 
                            <div class="col-md-6">
                                <input type="text" id="year_retirement" disabled name="year_retirement" min="0" class="form-control b-rad-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                Percentage of Current Budget:
                            </div> 
                            <div class="col-md-6">
                                <div class="price-wrap percentage d-flex">
                                    <!-- <input type="number" step="any"  min="0" max="100" name="interest" class="percent wd-5 form-control b-rad-10"> -->
                                    <input type="text" id="percentage_cos"  step="any" min="0" max="100" disabled name="cos" id="cos" min="0" max="100" class="wd-5 form-control">
                                    <span class="bg-dark ml-2 px-2 pt-2 text-white txt-percent ">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row"> 
                            <div class="col-md-6">  </div>
                            <div class="text-center col-md-6">
                                <button type="submit" style="display: none;" id="update_pension"  class="btn btn-sm btn-pry px-4">Update</button>
                            </div>
                        </div>
                    </div>
                    <div id="accountDistro" class="text-center mx-auto">
                        <div class="">
                            <button type="submit" id="update_account" style="display: none;" class="btn btn-sm btn-pry px-4">Submit</button>
                        </div>
                    </div>
                </form>
                

                <div class="text-center">
                    <div id="archiveAccount" class="my-2">
                        @if($archive)  
                            <button type="button" id="addAccount" class="btn btn-gray px-3 mr-3"> Restore Account</button>
                        @else
                            <button type="button" id="removeAccount" class="btn btn-gray px-3 mr-3"> Remove Account</button>
                        @endif
                    </div>
                </div> 

            </div>
        </div>
    </div>
</div>
 
<div class="modal fade" id="confirmRemoveAccount" tabindex="-1" role="dialog" aria-labelledby="confirmKpi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Confirm Remove Account</h5>
                <button type="button" class="close" onclick="$('#confirmRemoveAccount').modal('hide');"  aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> 
            <div class="modal-body">
                <h5 class="text-center">Are you sure you want to remove this account?</h5>
                <h6 class="text-center">(You will be able to view the account under the Archive section)</h6>
            </div>

            <div class="modal-footer mx-auto">
                <div class="text-left">
                    <button type="submit" id="confirmAccountRemove"  class="btn btn-pry px-3 mr-3">Yes</button>
                </div>
                <div class="text-right"> 
                    <button type="button" onclick="$('#confirmRemoveAccount').modal('hide');" class="btn btn-default px-3 mr-3">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmAddAccount" tabindex="-1" role="dialog" aria-labelledby="confirmKpi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Confirm Add Account</h5>
            <button type="button" class="close" onclick="$('#confirmAddAccount').modal('hide');"  aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <h5 class="text-center">Are you sure you want to add this account?</h5>
                <h6 class="text-center">(You will be able to view the account in Retirement)</h6>
            </div>

            <div class="modal-footer mx-auto">
                <div class="text-left">
                    <button type="submit" id="confirmAccountAdd"  class="btn btn-pry px-3 mr-3">Yes</button>
                </div>
                <div class="text-right">  
                    <button type="button" onclick="$('#confirmAddAccount').modal('hide');" class="btn btn-default px-3 mr-3">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="succeesfullyArchived" tabindex="-1" role="dialog" aria-labelledby="confirmKpi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header br-non">
                <button type="button" class="close btn btn-sm  text-right" onclick="$('#succeesfullyArchived').modal('hide'); window.location.reload();"  aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"> 
                <div id="justArchive" style="display: none;">
                    <h5 class="text-center">The account has been removed</h5>
                    <h6 class="text-center">
                        <a class="text-dark text-underline" href="{{ route('360.retirement', ['archive' => 'all']) }}">View in Archive</a>
                    </h6>
                </div>
                <div id="justUnarchive" style="display: none;">
                    <h5 class="text-center">The account has been added</h5>
                    <h6 class="text-center">
                        <a class="text-dark text-underline" href="{{ route('360.retirement') }}">View in Retirement</a>
                    </h6>
                </div>
            </div>
        </div>
    </div>
</div> 