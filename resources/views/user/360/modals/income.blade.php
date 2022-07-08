<div class="modal fade" id="incomeModalAccount" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content b-rad-20 wd-c"> 
            @php
                $portfolio = ($income_detail['portfolio_diff']) ? $income_detail['portfolio_diff'] : 0;
            @endphp
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob">Add Income   
                          @if ($portfolio > 0)
                            <button type="button" class="btn btn-sm btn-close  text-right" onclick="window.history.go(-1); return false;">
                                <span aria-hidden="true" class="text-white">X</span>
                            </button> 
                          @else 
                            <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="text-white">X</span>
                            </button>
                          @endif    
                    </h2>
                  
                    <p class="wd-7 sm-wdf mx-auto text-center">(Complete the form below
                        @if ($portfolio > 0). You have {{$currency}}{{$portfolio}} more to allocate in your Asset Portfolio Income @endif)
                    </p>
                </div>
                <form name="incomeRateForm"  id="incomeRateForm" class="mb-0">   @csrf</form>
                <form action="{{ route('360.store.income') }}" method="post">
                    @csrf
                    <div class="my-2">  
                        @php
                            $homes = ["Primary Residence","Holiday Home", "Vacant Land","Others"];
                            $incomes = ["portfolio" =>"Asset Portfolio Income","non_portfolio" =>"Non Porfolio Income"];
                            $status = ["Target Income","Current Income"];
                            $frequently = ["Weekly","Monthly", "Quaterly","Annually", "One-Off","Others"];
                            $channels = ["Primary Employment", "Side Hustle"];
                        @endphp
                            <!-- $channels = ["Wages","Dividends", "Rental","Bonus", "Profit","Commision","Gift","Others"]; -->
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                What type of income is it: <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <select name="income_type" id="income_type" value="" required  class="form-control" id="">
                                    @foreach ($incomes as $key => $data)
                                        @if ($key == 'portfolio')
                                            <option value="{{ $key }}" selected>{{ $data }} </option>
                                        @else
                                            <option value="{{ $key }}">{{ $data }} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row" id="portfolio_asset_lane">
                            <div class="col-md-6 col-sm-12">
                                Associate this income to an asset:<sup class="text-danger">*</sup>                           
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <select name="portfolio_asset"  class="form-control wd-f" id="portfolio_asset" required>
                                    <option value="">-- Select --</option>
                                    @foreach ($income_detail['portfolio_asset'] as $portfolio)
                                        <option value="{{ $portfolio->id }}" data-info="{{ $portfolio->name }}-{{$portfolio->monthly_roi}}-{{ucfirst($portfolio->asset_class)}}">{{ $portfolio->name }} ({{explode(" ",  $portfolio->asset_currency)[0]}}{{number_format($portfolio->asset_value, 2)}})</option>
                                    @endforeach 
                                </select>
                              <p style="line-height: 15px; margin-bottom: 0px;"><small class="fs-12">You need to have added the asset under Portfolio. <a href="{{ route('portfolio.asset_type', 'existing') }}" class="txt-primary">Add asset in Portfolio now </a></small></p>  
                            </div>
                        </div>
                        <div class="form-group row"  id="currency_lane" style="display: none;">
                            <div class="col-md-6 col-sm-12">
                                What is the currency of the income: <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <select name="currency" id="income_currency" value=""  class="form-control" id="">
                                    <option value="">-- Select --</option>
                                    @foreach ($currencies as $currency)
                                        <option value="{{ $currency }}">{{ $currency }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div id="income_conversion_widget">
                            @include('widgets.income_conversion')
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                How much is the income: <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <input placeholder="E.g £5,000.00" type="number" disabled id="amount" name="amount" maxlength="50" class="form-control b-rad-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                Give this income a name:<sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <input type="text" disabled name="income_name" id="income_name" placeholder="" class="form-control b-rad-10">
                            </div>
                        </div>   
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                How frequently do you receive the income: <sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <select name="income_frequency" id="income_frequency" disabled class="form-control wd-f" id="" required>
                                    <option value="">-- Select --</option>
                                    @foreach ($frequently as $home)
                                        @if($home == 'Monthly')
                                            <option value="{{ $home }}" selected>{{ $home }}</option>
                                        @else
                                            <option value="{{ $home }}">{{ $home }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>  
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                What is the income channel :<sup class="text-danger">*</sup>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <select style="display: none;" name="channel" id="channel" value=""  class="form-control">
                                    <option value="">-- Select --</option>
                                    @foreach ($channels as $data)
                                        <option value="{{ $data }}" >{{ $data }} </option>
                                    @endforeach
                                </select>
                                <input type="text" class="form-control" disabled id="asset-channel">
                            </div> 
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                When was this income earned: <sup class="text-danger">*</sup>
                            </div> 
                            <div class="col-md-6 col-sm-12"> 
                                <input type="date" max="{{ date('Y-m-d') }}"  name="income_date" required placeholder="" class="form-control b-rad-10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 col-sm-12">
                                What is the status of the income: 
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <select name="status" id="status" value=""  class="form-control" id="">
                                    <option value="">-- Select --</option>
                                    @foreach ($status as $data)
                                        <option value="{{ $data }}">{{ $data }} </option>
                                    @endforeach
                                  </select>
                                
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
    $(function(){
        $('#income_type').on('change', ()=> {
            var income = $('#income_type').val();
            var selected_portfolio = $('#portfolio_asset').val();
            if(income == 'portfolio'){
                $('#portfolio_asset').val(selected_portfolio);
                triggerAssetChange(selected_portfolio);  
                $('#portfolio_asset').attr('required', 'required');
                $('#portfolio_asset_lane').fadeIn();
                $('#currency').removeAttr('required');
                $('#income_name').removeAttr('required');
                $('#amount').removeAttr('required');
                $('#income_name').attr('disabled', 'disabled'); 
                $('#amount').attr('disabled', 'disabled');
                $('#currency_lane').hide(); 
                $('#income_conversion_widget').hide(); 
                $('#income_frequency').attr('disabled', 'disabled');
                // $('#channel').attr('disabled', 'disabled');
                $('#channel').hide(); $('#asset-channel').fadeIn();
                $('#income_frequency').val('Monthly');
            }else{
                $('#portfolio_asset').removeAttr('required'); 
                $('#portfolio_asset_lane').hide();
                $('#currency').attr('required', 'required');
                $('#currency_lane').fadeIn();  
                $('#income_conversion_widget').fadeIn(); 
                $('#income_name').attr('required', 'required');
                $('#amount').attr('required', 'required');
                $('#income_name').removeAttr('disabled');
                $('#amount').removeAttr('disabled');
                $('#income_frequency').removeAttr('disabled');
                $('#channel').fadeIn(); $('#asset-channel').hide();
                $('#income_name').val('');
                $('#amount').val(''); 
            }
        });
        $('#portfolio_asset').change(function() {
            var income = $('#income_type').val();
            var asset = $(this).find('option:selected');
            var info = asset.data('info');
            var detail = info.split('-');
            $('#income_name').val(detail[0])
            $('#amount').val(detail[1])
            $('#asset-channel').val(detail[2]);
        });
 
        function triggerAssetChange(selected){
            var income = $('#income_type').val();
            var portfolio = document.getElementById('portfolio_asset');
            if(selected){
                var asset = portfolio.options[portfolio.selectedIndex];
                var info = asset.getAttribute('data-info'); 
                var detail = info.split('-'); 
                $('#income_name').val(detail[0]);
                $('#amount').val(detail[1]); 
                $('#asset-channel').val(detail[2]);
            }
        }
    })
</script> 