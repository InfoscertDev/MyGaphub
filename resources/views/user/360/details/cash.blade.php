
<div class="modal fade" id="editCashModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content b-rad-20 wd-c">
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob"> <span id="account_name"></span>  - <span id="account_type"></span>: Cash
                        <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                    </h2>

                </div>
                <p class="wd-7 mx-auto text-center">(view and edit)</p>
                <form id="" action="{{ route('360.update.cash', 0) }}" method="POST">
                    @csrf
                    <input type="hidden" id="msnxjnzxnxnakn" name="sjnxjknsxkjnxijnsxknixncio">

                    <input type="hidden" id="paojsjbcnbxhncb" name="pakmamkanknmjkmnzkmnjmnd">

                    <input type="hidden" id="sxbaksoapnkajbxn" name="aksnjknsjnsjnsxjxn">
                    <div class="my-2">
                        <div class="d-block" style="height: 34px;">
                            @if(!$archive)
                                <span id="toggle_beta_edit" class="pull-right">
                                    <button type="button" class="btn btn-pry fa fa-edit btn-sm" onclick="toggleEdit()"></button>
                                </span>
                            @endif
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                Description
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <input type="text" id="details" name="details" disabled required class="form-control b-rad-10">
                            </div>
                        </div>
                        <div class="form-group row" id="currencyLaneMode" style="display: none">
                            <div class="col-md-5 col-sm-12">
                                Currency Conversion mode
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <div class="form-check d-inline">
                                    <label class="form-check-label ml-3" for="automatic">
                                        Automated <input class="form-check-input ml-2" type="radio"  disabled name="automated_rate" id="rate_automatic" value="1" >
                                    </label>
                                    <label class="form-check-label ml-5" for="manual">
                                        Manual <input class="form-check-input ml-2" type="radio"  disabled name="automated_rate" id="rate_manual" value="0" >
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                Target Amount:
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <div class="price-wrap d-flex ">
                                    <label for="" style="display: inline-block;" class="price-currency mt-2" id="price_target"></label>
                                    <input type="number" id="target" name="target" disabled required class="pl-4 form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                Current Balance:
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <div class="price-wrap d-flex ">
                                    <label for="" id="price_current" style="display: inline-block;" class="price-currency mt-2"></label>
                                    <input type="number" id="current" name="current" disabled required class="pl-4 form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row" id="cash_purpose">
                            <div class="col-md-5 col-sm-12">
                                Type of Holding Account:
                            </div>
                            <div class="col-md-7 col-sm-12">
                                @php
                                    // $purposes = ['Investment Pool Fund', 'Rainy Day Fund', 'Personal Project Fund', 'Family Project Fund',
                                    //             'Holiday Fund', 'Car Purchase Fund', 'Children Education Fund',
                                    //             'Home Purchase Savings', 'Others'];
                                    $purposes = ['Savings Account', 'Term Deposit', 'Fixed Deposit', 'Others'];
                                    $account_purpose =  ("<script>(account_purpose)</script>" );
                                @endphp
                                <select name="purpose" class="form-control wd-f" id="account_purpose" name="account_purpose" disabled  >
                                    <option value="">-- Select --</option>
                                    @foreach($purposes as $purpose)
                                        @if($purpose == $account_purpose)
                                            <option value="{{$purpose}}" selected>{{$purpose}}</option>
                                        @else
                                            <option value="{{$purpose}}">{{$purpose}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                  {{--  <input type="text"  id="account_purpose" name="account_purpose" disabled required class="form-control b-rad-10">--}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                Target Date:
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <input type="date" name="target_date"  disabled required id="target_date" class="form-control b-rad-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                                Location of the Funds:
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <input type="text"  id="account_location" name="account_location" disabled required class="form-control b-rad-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5 col-sm-12">
                               Account Alias:
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <input type="text"  id="alias" name="alias" disabled class="form-control b-rad-10">
                            </div>
                        </div>
                        <div class="form-group row" id="isAnalytics">
                            <div class="col-md-7 col-sm-12">
                                <span class="">Show account in Analytics:  </span>
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <div class=" switch text-left">
                                   <input class="" id="cash_analytics" name="analytics" type="checkbox" disabled/>
                                   <label data-off="OFF" data-on="ON" for="cash_analytics" ></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                {{-- <small class="text-center">Fields are mandatory</small> --}}
                            </div>
                            @if(!$archive)
                                <div class="text-center col-md-6 col-sm-12">
                                    <button type="submit" id="update_account" style="display: none;" class="btn btn-sm btn-pry px-4">Submit</button>
                                </div>
                            @endif
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
                    <div id="openBetaAccount" style="display: none;" class="mb-2">
                        <button type="button" id="openAccount" class="btn btn-gray px-3 mr-3"> Open Beta Account</button>
                    </div>

                </div>

                <div id="accountDistro" class="text-center mx-auto">
                    <span class="account-hr"></span>
                    @include('user.360.partials.chartbar_options')
                    <div class="chart mt-3">
                        <h5 class="my-3">Historical Balances</h5>
                        <div>
                            <canvas id="myAccountChart" width="400px" style="width: 100%; margin: 0px;"></canvas>
                        </div>
                    </div>

                    <div class="d-block text-center">
                        <button type="button" class="btn btn-pry px-3"> View More</button>
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
<div class="modal fade" id="confirmOpenAccount" tabindex="-1" role="dialog" aria-labelledby="confirmKpi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Confirm Beta Account Opening</h5>
            <button type="button" class="close" onclick="$('#confirmOpenAccount').modal('hide');"  aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <h5 class="text-center">Are you sure you want to open this account?</h5>
                <h6 class="text-center">(You will be able to update Beta account information)</h6>
            </div>
            <div class="modal-footer mx-auto">
                <div class="text-left">
                <form id="" action="{{ route('360.update.cash', 0) }}" method="POST">
                    @csrf
                    <input type="hidden" id="msnxjnzxnxnakn" name="sjnxjknsxkjnxijnsxknixncio" value="nbdsckasjnxkjszncikjnijznjsznx">
                    <input type="hidden" id="paojsjbcnbxhncb" name="pakmamkanknmjkmnzkmnjmnd" value="betpcaksnksnkndkkmkdnkanmhahbdjb">
                    <button type="submit" class="btn btn-pry px-3 mr-3">Yes</button>
                </form>
                </div>
                <div class="text-right">
                    <button type="button" onclick="$('#confirmOpenAccount').modal('hide');" class="btn btn-default px-3 mr-3">No</button>
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
                <h6 class="text-center">(You will be able to view the account in Cash)</h6>
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
                        <a class="text-dark text-underline" href="{{ route('360.cash', ['archive' => 'all']) }}">View in Archive</a>
                    </h6>
                </div>
                <div id="justUnarchive" style="display: none;">
                    <h5 class="text-center">The account has been added</h5>
                    <h6 class="text-center">
                        <a class="text-dark text-underline" href="{{ route('360.cash') }}">View in Cash</a>
                    </h6>
                </div>
            </div>

        </div>
    </div>
</div>
