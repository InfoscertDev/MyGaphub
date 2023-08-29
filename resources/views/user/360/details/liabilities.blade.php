
<div class="modal fade" id="editLiabilityModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content b-rad-20 wd-c">
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob"> <span id="liability_creditor"></span> – <span id="account_type"></span> : Liability
                        <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                    </h2>

                </div>
                <p class="wd-7 mx-auto text-center">(view & edit)</p>
                <form id="" action="{{ route('360.update.liability', 0) }}" method="POST">
                    @csrf
                    <input type="hidden" id="msnxjnzxnxnakn" name="sjnxjknsxkjnxijnsxknixncio">
                    <input type="hidden" id="paojsjbcnbxhncb" name="pakmamkanknmjkmnzkmnjmnd">
                    <input type="hidden" id="sxbaksoapnkajbxn" name="aksnjknsjnsjnsxjxn">
                    <div class="my-2">
                        <div class="d-block" style="height: 34px;">
                            @if(!$archive)
                                <span class="pull-right">
                                    <button type="button" class="btn btn-pry fa fa-edit btn-sm" onclick="toggleEdit()"></button>
                                </span>
                            @endif
                        </div>

                        <div class="form-group row" style="display: none !important" id="creditor_lane">
                            <div class="col-md-6 col-sm-12">
                                Who is the creditor: <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <input type="text" disabled name="creditor" id="creditor"  class="form-control b-rad-10">
                            </div>
                        </div>
                        <div class="form-group row" style="display: none !important" id="credit_type_lane">
                            <div class="col-md-6 col-sm-12">
                                What type of credit account is this:     <sup class="text-danger">*</sup>
                            </div>
                            @php
                                $cards = ['Credit Card', 'Overdraft', 'Loans', 'Delayed Payment', 'Hire Purchase', 'Family & Friends', 'Others'];
                                $credit_type = ("<script>(credit_type)</script>" );
                            @endphp
                            <div class="col-md-6 col-sm-12">
                                <select disabled name="credit_type" class="form-control wd-f" id="credit_type" >
                                    <option value="">-- Select --</option>
                                    @foreach ($cards as $card)
                                        @if($card == $credit_type)
                                            <option value="{{$card}}" selected>{{$card}}</option>
                                        @else
                                            <option value="{{ $card }}">{{ $card }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                               Description
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <textarea disabled name="lia_detail" id="description"  class="form-control b-rad-10" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="form-group row" id="currencyLaneMode" style="display: none">
                            <div class="col-md-6 col-sm-12">
                                Currency Conversion mode
                            </div>
                            <div class="col-md-6 col-sm-12">
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
                            <div class="col-md-6 col-sm-12">
                                Opening Balance:
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency d-inline mt-2" id="price_target" style="display: inline;"></label>
                                    <input type="number" disabled name="baseline" id="baseline" min="0" required  class="pl-4 form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                               Current Balance:
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency d-inline mt-2" id="price_current" style="display: inline;"></label>
                                    <input type="number" disabled name="current" id="current" min="0" required  class="pl-4 form-control b-rad-10">
                                </div>
                                <div class="mt-2" style="display: none" id="lia_paid_off" for="" >Paid Off
                                    <input type="checkbox" class="ml-3 form-check-input bs-none" name="paid_off"  style="margin-top: 7px;">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                Periodic Repayment Amount:
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency d-inline mt-2" id="price_repay"></label>
                                    <input type="number" id="period_pay" disabled name="period_pay" min="0" class="pl-4 form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                Interest Rate:
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="price-wrap percentage d-flex">
                                    <input type="number"  step="any" min="0" max="100" disabled name="interest" id="interest" min="0" max="100" class="percent form-control b-rad-10">
                                    <span class="bg-dark ml-2 px-2 pt-2 text-white txt-percent ">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                Total Paid till Date:
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency d-inline mt-2" id="price_paid"></label>
                                    <input type="number" disabled name="total_paid" id="total_paid"  class="pl-4 form-control b-rad-10">
                                </div>
                            </div>
                            <!-- <div class="input-group-prepend">
                                        <button class="border-none" type="button" disabled>
                                            <label for="" class="price-currency d-inline mt-2" id="price_paid"></label>
                                        </button>
                                    </div> -->
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                Payoff Strategy:
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <textarea name="pay_strategy"  disabled name="pay_strategy" id="pay_strategy" class="form-control b-rad-10" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                Payoff Target Date:
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <input type="date" name="target_date"  disabled  id="target_date"  class="form-control b-rad-10">
                            </div>
                        </div>

                        <div class="form-group row" id="isAnalytics">
                            <div class="col-md-7 col-sm-12">
                                <span class="">Show account in Analytics:  </span>
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <div class=" switch text-left">
                                   <input class="" id="lia_analytics" name="analytics" type="checkbox" disabled/>
                                   <label data-off="OFF" data-on="ON" for="lia_analytics" ></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">  </div>
                            <div class="text-center col-md-6 col-sm-12">
                                <button type="submit" style="display: none;" id="update_liability"  class="btn btn-sm btn-pry px-4">Update</button>
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
                    <span class="account-hr"></span>
                </div>

                <div id="accountDistro" class="text-center mx-auto">
                    @include('user.360.partials.chartbar_options')
                    <div class="chart mt-3">
                        <div>
                            <h5 class="my-3">Historical Balances</h5>
                            <canvas id="myAccountChart" width="400px" style="width: 100%; margin: 0px;"></canvas>
                        </div>

                        <!-- <div class="d-block text-center">
                            <button type="button" class="btn btn-pry px-3"> View More</button>
                        </div> -->
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmRemoveLiability" tabindex="-1" role="dialog" aria-labelledby="confirmKpi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Confirm Remove Account</h5>
            <button type="button" class="close" onclick="$('#confirmRemoveLiability').modal('hide');"  aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <h5 class="text-center">Once this account is removed, it cannot be restored any longer. This removal is permanent!</h5>
                <h6 class="text-center">(You will be able to view the account under the Archive Section)</h6>
            </div>

            <div class="modal-footer mx-auto">
                <div class="text-left">
                    <button type="submit" id="confirmAccountRemove"  class="btn btn-pry px-3 mr-3">Yes</button>
                </div>
                <div class="text-right">
                    <button type="button" onclick="$('#confirmRemoveLiability').modal('hide');" class="btn btn-default px-3 mr-3">No</button>
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
                <h6 class="text-center">(You will be able to view the account in Liabilities)</h6>
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
                <button type="button" class="close btn text-right" onclick="$('#succeesfullyArchived').modal('hide'); window.location.reload();"  aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="justArchive" style="display: none;">
                    <h5 class="text-center">The account has been removed</h5>
                    <h6 class="text-center">
                        <a class="text-dark text-underline" href="{{ route('360.liability', ['archive' => 'all']) }}">View in Archive</a>
                    </h6>
                </div>
                <div id="justUnarchive" style="display: none;">
                    <h5 class="text-center">The account has been added</h5>
                    <h6 class="text-center">
                        <a class="text-dark text-underline" href="{{ route('360.liability') }}">View in Liabilities</a>
                    </h6>
                </div>
            </div>

        </div>
    </div>
</div>
