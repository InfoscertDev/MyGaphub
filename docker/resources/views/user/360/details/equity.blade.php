
<div class="modal fade" id="editEquityModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content b-rad-20 wd-c">   
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob">  Home Equity  - <span id="equity_type"></span>
                        <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                    </h2>
                </div>
                <p class="wd-7 mx-auto text-center">(view and edit)</p> 
                <form id="" action="{{ route('360.update.equity', 0) }}" method="POST">
                    @csrf
                    <input type="hidden" id="msnxjnzxnxnakn" name="sjnxjknsxkjnxijnsxknixncio">
                   
                    <div class="my-2">
                        @if(!$archive) 
                            <div class="d-block" style="height: 34px;">
                                <span class="pull-right">
                                    <button type="button" class="btn btn-pry fa fa-edit btn-sm" onclick="toggleEdit()"></button>
                                </span>
                            </div>
                        @endif
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                Home Value: 
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <input type="text" id="market" name="market" disabled required class="form-control b-rad-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                               Mortgage: 
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <input type="number" id="mortgaged" name="mortgaged" disabled required class="form-control b-rad-10">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                Ownership Percentage:  
                            </div> 
                            <div class="col-md-7 col-sm-12">
                                <div class="price-wrap percentage d-flex">
                                    <input type="number"  id="ownership" name="ownership" disabled  class="form-control b-rad-10">
                                    <span class="bg-dark ml-2 px-2 pt-2 text-white txt-percent ">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                Home Address: 
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <textarea type="text" id="locations" name="locations" disabled required class="form-control b-rad-10"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                Date Acquired:
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <input type="date" name="date_acquired" max="<?php echo date('Y-m-d') ?>" disabled required id="date_acquired" class="percent form-control b-rad-10">
                            </div>
                        </div>
                        
                        {{-- <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                Home Description: 
                            </div> 
                            <div class="col-md-7 col-sm-12">  
                                <textarea name="description"  disabled id="description" class="form-control b-rad-10" rows="2"></textarea>
                            </div> 
                        </div>--}}
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                {{-- <small class="text-center">Fields are mandatory</small> --}}
                            </div> 
                            <div class="text-center col-md-6 col-sm-12">
                                <button type="submit" id="update_account" style="display: none;" class="btn btn-sm btn-pry px-4">Submit</button>
                            </div>
                        </div>
                    </div>
                    
                </form>
                <div class="text-center">
                    <div id="archiveAccount" class="mb-2">
                        @if($archive)  
                            <button type="button" id="addAccount" class="btn btn-gray px-3 mr-3"> Restore Account</button>
                        @else
                            <button type="button" id="removeAccount" class="btn btn-gray px-3 mr-3"> Remove Account</button>
                        @endif
                    </div>
                </div> 
                <div id="accountDistro" class="text-center mx-auto">
                    @include('user.360.partials.chartpie_options')
                    <div class="chart mt-3">
                        <h5 class="my-3">Ownership Chart</h5>
                        <canvas id="equityChartBar" width="400px" style="width: 100%; margin: 0px;"></canvas>
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
                <h6 class="text-center">(You will be able to view the account in Protection)</h6>
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
                        <a class="text-dark text-underline" href="{{ route('360.equity', ['archive' => 'all']) }}">View in Archive</a>
                    </h6>
                </div>
                <div id="justUnarchive" style="display: none;">
                    <h5 class="text-center">The account has been added</h5>
                    <h6 class="text-center">
                        <a class="text-dark text-underline" href="{{ route('360.equity') }}">View in Protection</a>
                    </h6>
                </div>
            </div>
        </div>
    </div>
</div> 
