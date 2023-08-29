
<div class="modal fade" id="editMortgageModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content b-rad-20 wd-c">
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob"> <span id="creditor_name"></span>  - <span id="secured_against"></span>: Mortgage
                        @if(isset($seveng[0]->creditor_name))
                            <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="text-white">X</span>
                            </button>
                        @else
                            <button type="button" class="btn btn-sm btn-close  text-right" onclick="window.history.go(-1); return false;">
                                <span aria-hidden="true" class="text-white">X</span>
                            </button>
                        @endif
                    </h2>
                </div>
                <p class="wd-7 mx-auto text-center">(view and edit)</p>
                <form id="" action="{{ route('360.update.mortgage', 0) }}" method="POST">
                    @csrf
                    <input type="hidden" id="msnxjnzxnxnakn" name="sjnxjknsxkjnxijnsxknixncio">
                    <input type="hidden" id="paojsjbcnbxhncb" name="pakmamkanknmjkmnzkmnjmnd">
                    <div class="my-2">
                        <div class="d-block" style="height: 34px;">
                            @if(!$archive)
                                <span class="pull-right">
                                    <button type="button" class="btn btn-pry fa fa-edit btn-sm" onclick="toggleEdit()"></button>
                                </span>
                            @endif
                        </div>

                        <div class="form-group row" id="creditor_lane">
                            <div class="col-md-5 col-sm-12">
                                Who is the creditor:
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <input type="text" name="creditor" id="creditor" disabled class="form-control b-rad-10">
                            </div>
                        </div>
                        @php
                            $descriptions = ['First Charge Mortgage', 'Second Charge Mortgage', 'Secured Loan'];
                            $secured = ['Secondary Residence', 'Holiday Home','Investment Property', 'Vacant Land','Others'];
                            $description =  ("<script>(description)</script>");
                            $secure_against =  ("<script>(secure_against)</script>");
                        @endphp
                        <div class="form-group row" id="description_lane">
                            <div class="col-md-5 col-sm-12">
                                Description of Mortgage:
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <select name="description" disabled class="form-control wd-f" id="description" >
                                    <option value="">-- Select --</option>
                                    @foreach($descriptions as $single)
                                        @if($single == $description)
                                            <option value="{{$single}}" selected>{{$single}}</option>
                                        @else
                                            <option value="{{ $single }}">{{ $single }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row" id="secure_lane">
                            <div class="col-md-5 col-sm-12">
                                What asset is this mortgage secured against:
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <select name="secure_against" disabled class="form-control wd-f" id="secure_against" >
                                    <option value="">-- Select --</option>
                                    @foreach($secured as $single)
                                        @if($single == $secure_against)
                                            <option value="{{$single}}" selected>{{$single}}</option>
                                        @else
                                            <option value="{{ $single }}">{{ $single }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                Details of property:
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <textarea disabled name="detail" id="details"  class="form-control b-rad-10" rows="2"></textarea>

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                Opening Balance:
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <input type="number"  onfocus="focalPoint(this)"  id="open_balance" name="open_balance" disabled required class="form-control b-rad-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                Current Balance:
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <input type="number"  onfocus="focalPoint(this)"  id="current" name="current" disabled required class="form-control b-rad-10">
                                <div class="mt-2" style="display: none;" id="paid_off" for="" >Paid Off
                                    <input type="checkbox" class="ml-3 form-check-input bs-none" name="paid_off"  style="margin-top: 7px;">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                Periodic Repayment Amount:
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <input type="text"  id="repayment" name="repayment" disabled required class="form-control b-rad-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                Interest Rate:
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <input type="number"  onfocus="focalPoint(this)"   step="any" min="0" max="100" id="interest" name="interest" disabled required class="form-control b-rad-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                Total Paid till Date:
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <input type="number"  onfocus="focalPoint(this)"  id="total_paid" name="total_paid" disabled required class="form-control b-rad-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                Payoff Strategy:
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <textarea name="pay_strategy"  disabled name="pay_strategy" id="pay_strategy" class="form-control b-rad-10" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                Payoff Target Date:
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <input type="date" name="target_date" disabled required id="target_date" class="form-control b-rad-10">
                            </div>
                        </div>
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
                            <!-- <button type="button" id="addAccount" class="btn btn-gray px-3 mr-3"> Restore Account</button> -->
                        @else
                            <button type="button" id="removeAccount" class="btn btn-gray px-3 mr-3"> Remove Account</button>
                        @endif
                    </div>

                </div>

                <div id="accountDistro" class="text-center mx-auto">
                    <span class="account-hr"></span>
                    @include('user.360.partials.chartbar_options')
                    <div class="chart mt-3">
                        <h5 class="my-3">Historical Balances</h5>
                        <canvas id="myAccountChart" width="400px" style="width: 100%; margin: 0px;"></canvas>
                        <!-- <div class="d-block text-center">
                            <button type="button" class="btn btn-pry px-3"> View More</button>
                        </div> -->
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
                <h5 class="text-center">Once this account is removed, it cannot be restored any longer. This removal is permanent!</h5>
                <h6 class="text-center">(You will be able to view the account in Mortgage)</h6>
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
                <button type="button" class="close btn btn-sm text-right" onclick="$('#succeesfullyArchived').modal('hide'); window.location.reload();"  aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="justArchive" style="display: none;">
                    <h5 class="text-center">The account has been removed</h5>
                    <h6 class="text-center">
                        <a class="text-dark text-underline" href="{{ route('360.mortgage', ['archive' => 'all']) }}">View in Archive</a>
                    </h6>
                </div>
                <div id="justUnarchive" style="display: none;">
                    <h5 class="text-center">The account has been added</h5>
                    <h6 class="text-center">
                        <a class="text-dark text-underline" href="{{ route('360.mortgage') }}">View in Mortgage</a>
                    </h6>
                </div>
            </div>
        </div>
    </div>
</div>
