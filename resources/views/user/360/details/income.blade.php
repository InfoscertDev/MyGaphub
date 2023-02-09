
<div class="modal fade" id="editIncomeModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content b-rad-20 wd-c"> 
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob"> <span id="income_named"></span>  - <span id="channeled"></span>: Income 
                        <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                    </h2>
                </div> 
                <p class="wd-7 mx-auto text-center">(view and edit)</p> 
                <div class="my-2">
                    <div class="d-block text-center" style="height: 34px;">
                        @if(!$archive)
                            <span class="txt-primary  text-underline" onclick="toggleRecordEdit()"> <i>Record Monthly Income</i> </span>
                            <span class="pull-right">
                                <button type="button" class="btn btn-pry fa fa-edit btn-sm" onclick="toggleEdit()"></button>
                            </span>
                        @endif
                    </div>
                </div> 

                <div id="detailView">
                    <form id="" action="{{ route('360.update.income', 0) }}" method="POST">
                        
                    <input type="hidden" id="ahgjbskjnslkjmd" name="sjnxjknsxkjnxijnsxknixncio">
                        @csrf
                        <div class="my-2">
                            @php
                                $homes = ["Primary Residence","Holiday Home", "Vacant Land","Others"];
                                $incomes = ["portfolio" =>"Asset Portfolio Income","non_portfolio" =>"Non Porfolio Income"];
                                $status = ["Target Income","Current Income"];
                                $frequently = ["Weekly","Monthly", "Quaterly","Annually", "One-Off","Others"];
                                $channels = ["Wages","Dividends", "Rental","Bonus", "Profit","Commision","Gift","Others"];
                                $income_type = ("<script>(income_type)</script>" ); 
                                $income_frequency = ("<script>(income_frequency)</script>" );
                                $portfolio_asset = ("<script>(portfolio_asset)</script>" );
                            @endphp 
                            <div class="form-group row">
                                <div class="col-md-6 col-sm-12">
                                    Type of Income:
                                </div> 
                                <div class="col-md-6 col-sm-12">
                                    <select disabled name="income_type" id="income_typed" value="" required  class="form-control" id="">
                                        @foreach ($incomes as $key => $data)
                                            @if ($data == $income_type)
                                                <option value="{{ $key }}" selected>{{ $data }} </option>
                                            @else
                                                <option value="{{ $key }}">{{ $data }} </option>
                                            @endif
                                        @endforeach
                                    </select>
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
                                    Average Monthly Income
                                </div>
                                <div class="col-md-6 col-sm-12">
                                <div class="price-wrap d-flex ">
                                        <label for="" class="price-currency mt-3" id="price_target"></label>
                                        <input type="number" disabled id="income_value"  name="income_value" required  class="pl-4 form-control b-rad-10">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 col-sm-12">
                                    Frequency on Income
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <select disabled name="income_frequency" id="income_frequencies" class="form-control wd-f" id="" required>
                                        <option value="">-- Select --</option>
                                        @foreach ($frequently as $data)
                                            @if ($data == $income_frequency)
                                                <option value="{{ $data }}" selected>{{ $data }} </option>
                                            @else
                                                <option value="{{ $data }}">{{ $data }} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                           
                            <div class="form-group row" id="associated">
                                <div class="col-md-6 col-sm-12">
                                   Associated Asset
                                </div>
                                <div class="col-md-6 col-sm-12"> 
                                    <select disabled name="portfolio_asset"  class="form-control wd-f" id="portfolio_asseted">
                                        <option value="">-- Select --</option>
                                        @foreach ($income_detail['portfolio_asset'] as $portfolio)
                                            @if ($portfolio->id == $portfolio_asset)
                                                <option value="{{ $portfolio->id }}" selected data-info="{{ $portfolio->name }}-{{$portfolio->monthly_roi}}">{{ $portfolio->name }} ({{explode(" ",  $portfolio->asset_currency)[0]}}{{number_format($portfolio->asset_value, 2)}})</option>
                                            @else
                                                <option value="{{ $portfolio->id }}" data-info="{{ $portfolio->name }}-{{$portfolio->monthly_roi}}">{{ $portfolio->name }} ({{explode(" ",  $portfolio->asset_currency)[0]}}{{number_format($portfolio->asset_value, 2)}})</option>
                                            @endif
                                        @endforeach 
                                    </select>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <div class="col-md-6 col-sm-12">
                                    Last Date of Income
                                </div>
                                <div class="col-md-6 col-sm-12"> 
                                    <input type="date" id="income_date"  disabled name="income_date" max="{{date('Y-m-d')}}" required placeholder="" class="form-control b-rad-10">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 col-sm-12">
                                    {{-- <small class="text-center">Fields are mandatory</small> --}}
                                </div>
                                <div class="text-center col-md-6 col-sm-12">
                                    <button type="submit" id="update_account" style="display: none" class="btn btn-sm btn-pry px-4">Submit</button>
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
                        <span class="account-hr"></span>
                    </div> 
    
                    <div id="accountDistro" class="text-center mx-auto">
                            <span class="account-hr"></span>
                            @include('user.360.partials.chartbar_options')
                        <div class="chart mt-3"> 
                            <h5 class="my-3">Historical Balances</h5>
                            <canvas id="myAccountChart" width="400px" style="width: 100%; margin: 0px;"></canvas>
                                
                            <div class="d-block text-center">
                                <button type="button" class="btn btn-pry px-3" id="historical_chart"> View More</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="monthlyIncome" style="display: none;">
                    <form id="" action="{{ route('360.update.income_record', 0) }}" method="POST">
                        @csrf
                        <input type="hidden" id="msnxjnzxnxnakn" name="sjnxjknsxkjnxijnsxknixncio">
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                Period Income was Earned:
                            </div> 
                            <div class="col-md-6 col-sm-12">
                                <input type="month"  id="record_period"  name="record_period" max="<?php echo date("Y-m"); ?>" required  class="form-control b-rad-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                Amount Earned
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="price-wrap d-flex "> 
                                    <label for="" class="price-currency mt-3" id="">$</label>  
                                    <input type="number" id="amount_earned"  name="amount" required min="0" class="pl-4 form-control b-rad-10">
                                </div>
                            </div> 
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                Additional Comment:
                            </div>
                            <div class="col-md-6 col-sm-12"> 
                                <textarea name="note"  id="note" class="form-control b-rad-10" rows="2"></textarea>
                            </div>
                        </div> 
                        <div class="form-group row">
                            <div class="text-center mx-auto col-sm-12"> 
                                <button type="submit" id="update_record" class="btn btn-sm btn-pry px-4">Save</button>
                            </div>
                        </div>
                    </form>
                     
                    <script>
                         $(function () {
                            $('#record_period').change(function(){
                                var period = $('#record_period').val();
                                if(period){
                                    var header = "ajnjxbnuhjsbxnhujbxncujhbxdcbhjnasuhjbn";
                                    var access = "checkperiod_ajhbxsjnbjsxbnoaklmsikn";
                                    console.log("<?php echo Request::url() ?>"+`?header=${header}&income=${account.id}&access=${access}&period=${period}`)
                                    $.ajax({ 
                                        method: 'GET',
                                        url: "<?php echo Request::url() ?>"+`?header=${header}&income=${account.id}&access=${access}&period=${period}`,
                                        success: function (data, status) {
                                            console.log(status, data);  
                                            if(status == "success" && data.asset_records){ 
                                                loadRecordInfo(data); 
                                            }else{
                                                $('#confirmUpdateRecordAddition').modal('show');
                                            }
                                        }
                                    });
                                }
                            });
 
                            $('#confirmAddPeriod').click(function(){
                                var period = $('#record_period').val();
                                var header = "ajnjxbnuhjsbxnhujbxncujhbxdcbhjnasuhjbn";
                                var access = "addnewperiodadd_ajhbxsjbhnsjhbjbnsxjk";
                                $.ajax({
                                    method: 'GET',
                                    url: "<?php echo Request::url() ?>"+`?header=${header}&income=${account.id}&access=${access}&period=${period}`,
                                    success: function (data, status) {
                                        if(status == "success" && data.asset_records){ 
                                             loadRecordInfo(data); 
                                        }
                                    }
                                }); 
                            });
                        });

                        function loadRecordInfo(data){ 
                            $('#amount_earned').val(data.asset_records.amount);
                            $('#note').val(data.asset_records.note); 
                            $('#confirmUpdateRecordAddition').modal('hide');
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmUpdateRecordAddition" tabindex="-1" role="dialog" aria-labelledby="confirmKpi" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">New Update Record</h5>
            <button type="button" class="close" onclick="$('#confirmUpdateRecordAddition').modal('hide')"  aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <h5 class="text-center"> The Period <span class="bold" id="period_dialog"></span> records does not exist. </h5>
                <h5 class="text-center">Are you sure you want to add this period?</h5>
            </div>

            <div class="modal-footer mx-auto">
                <div class="text-left">
                    <button type="submit" id="confirmAddPeriod"  class="btn btn-pry px-3 mr-3">Yes</button>
                </div> 
                <div class="text-right"> 
                    <button type="button" onclick="$('#confirmUpdateRecordAddition').modal('hide')" class="btn btn-default px-3 mr-3">No</button>
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
                <h6 class="text-center">(You will be able to view the account in Income)</h6>
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
                        <a class="text-dark text-underline" href="{{ route('360.income.list', ['archive' => 'all']) }}">View in Archive</a>
                    </h6>
                </div>
                <div id="justUnarchive" style="display: none;">
                    <h5 class="text-center">The account has been added</h5>
                    <h6 class="text-center">
                        <a class="text-dark text-underline" href="{{ route('360.income.list') }}">View in Income</a>
                    </h6>
                </div>
            </div>
        </div>
    </div>
</div>  