
<div class="modal fade" id="iLabModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        @php
            $editmode =    ($target_info['budget'] + $target_info['income'] + $target_info['asset'] + $target_info['liabilities'] == 0) ? false : true;
        @endphp
        
        <div class="modal-content b-rad-20 wd-c"> 
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob">iLAB Goal Setting
                        <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                    </h2>
                    
                </div>
                <p class="wd-7 mx-auto text-center">(Enter your values for Target Position Only)
                    <button type="button" class="ml-2 btn bg-none fa fa-edit btn-sm" onclick="toggleEdit()"></button>    
                </p>
                <form action="{{ route('360.store.ilab') }}" method="POST">
                    @csrf
                    <div class="my-2">
                        <div class="row">
                           <div class="col-4"><h6 class="bold text-uppercase">ASSET</h6></div> 
                           <div class="col-4 text-center"><h6 class="text-underline sm-fs-12">Current Position <span class="d-xs-only "> CP</span> </h6></div> 
                           <div class="col-4 text-center"><h6 class="text-underline sm-fs-12">Target Position  <span class="d-xs-only"> TP</span></h6></div> 
                        </div>
                        <div class="form-group mb-2 row">
                            <div class="col-sm-4">
                                Investment:
                            </div>
                            <div class="col-sm-4">
                                <div class="price-wrap d-flex">
                                    <span class="d-xs-only"> CP</span> 
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="text" disabled value="{{number_format($current_ilab['investment'], 2)}}" id="cur_investment" class="bs-none input-money  form-control b-rad-10">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-8 sm-mt-2"> 
                                <div class="price-wrap d-flex ">
                                    <span class="d-xs-only"> TP</span> 
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number" step="any" onfocus="focalPoint(this)" name="investment" min="0" id="investment"  min="0" value="{{$ilab->investment}}" class="bs-none input-money form-control b-rad-10">
                                </div>
                            </div> 
                        </div>
                        <div class="form-group mb-2 row">
                            <div class="col-sm-4">
                                Home Equity:
                            </div>
                            <div class="col-sm-4">
                                <div class="price-wrap d-flex">
                                    <span class="d-xs-only"> CP</span> 
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="text" disabled value="{{number_format($current_ilab['equity'], 2)}}" id="cur_equity" class="bs-none input-money  form-control b-rad-10">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-8 sm-mt-2"> 
                                <div class="price-wrap d-flex ">
                                    <span class="d-xs-only"> TP</span> 
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number" step="any" onfocus="focalPoint(this)" name="equity" id="equity"  min="0" value="{{$ilab->equity}}"  class="bs-none input-money form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2 row">
                            <div class="col-sm-4">
                                Cash:
                            </div>
                            <div class="col-sm-4">
                                <div class="price-wrap d-flex">
                                    <span class="d-xs-only"> CP</span> 
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="text" disabled value="{{number_format($current_ilab['savings'], 2)}}" id="cur_savings" class="bs-none input-money  form-control b-rad-10">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-8 sm-mt-2"> 
                                <div class="price-wrap d-flex ">
                                    <span class="d-xs-only"> TP</span> 
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number" step="any" onfocus="focalPoint(this)" name="savings" value="{{$ilab->savings}}" min="0" required id="savings" class="bs-none input-money form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4"><h6 class="bold">LIABILITY</h6></div>
                        </div>
                        <div class="form-group mb-2 row">
                            <div class="col-sm-4">
                                Credit:
                            </div>
                            <div class="col-sm-4">
                                <div class="price-wrap d-flex">
                                    <span class="d-xs-only"> CP</span> 
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="text" disabled value="{{number_format($current_ilab['credit'], 2)}}" id="cur_credit" class="bs-none input-money  form-control b-rad-10">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-8 sm-mt-2"> 
                                <div class="price-wrap d-flex ">
                                    <span class="d-xs-only"> TP</span> 
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number" step="any" onfocus="focalPoint(this)" name="credit" min="0" value="{{$ilab->credit}}" required id="credit" class="bs-none input-money form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2 row">
                            <div class="col-sm-4">
                                Mortgage:
                            </div>
                            <div class="col-sm-4">
                                <div class="price-wrap d-flex">
                                    <span class="d-xs-only"> CP</span> 
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="text" disabled value="{{number_format($current_ilab['mortgage'], 2)}}" id="cur_mortgage" class="bs-none input-money  form-control b-rad-10">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-8 sm-mt-2"> 
                                <div class="price-wrap d-flex ">
                                    <span class="d-xs-only"> TP</span> 
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number" step="any" onfocus="focalPoint(this)" name="mortgage" min="0" value="{{$ilab->mortgage}}" required id="mortgage" class="bs-none input-money form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-4"><h6 class="bold">INCOME</h6></div>
                        </div>

                        <div class="form-group mb-2 row">
                            <div class="col-sm-4">
                                Non-Portfolio:
                            </div>
                            <div class="col-sm-4">
                                <div class="price-wrap d-flex">
                                    <span class="d-xs-only"> CP</span> 
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="text" disabled value="{{number_format($current_ilab['non_portfolio'], 2)}}" id="cur_non_portfolio" class="bs-none input-money  form-control b-rad-10">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-8 sm-mt-2"> 
                                <div class="price-wrap d-flex ">
                                    <span class="d-xs-only"> TP</span> 
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number" step="any" onfocus="focalPoint(this)" name="non_portfolio" value="{{$ilab->non_portfolio}}" min="0" required id="non_portfolio" class="bs-none input-money form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2 row">
                            <div class="col-sm-4">
                                Asset Portfolio:
                            </div>
                            <div class="col-sm-4">
                                <div class="price-wrap d-flex">
                                    <span class="d-xs-only"> TP</span> 
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="text" disabled value="{{number_format($current_ilab['portfolio'], 2)}}" id="cur_portfolio" class="bs-none input-money  form-control b-rad-10">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-8 sm-mt-2"> 
                                <div class="price-wrap d-flex ">
                                    <span class="d-xs-only"> CP</span> 
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number" step="any" onfocus="focalPoint(this)" value="{{$ilab->asset_portfolio}}" name="portfolio" min="0" required id="portfolio" class="bs-none input-money form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-4"><h6 class="bold">BUDGET</h6></div>
                        </div>
                        <div class="form-group mb-2 row">
                            <div class="col-sm-4">
                                Savings Periodic:
                            </div>
                            <div class="col-sm-4">
                                <div class="price-wrap d-flex">
                                    <span class="d-xs-only"> CP</span> 
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="text" disabled value="{{number_format($current_ilab['periodic_saving'], 2)}}" id="cur_period_savings" class="bs-none input-money  form-control b-rad-10">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-8 sm-mt-2"> 
                                <div class="price-wrap d-flex ">
                                    <span class="d-xs-only"> TP</span>  
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number" step="any" onfocus="focalPoint(this)" name="periodic_savings" value="{{$ilab->periodic_savings}}" min="0" required id="periodic_savings" class="bs-none input-money form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2 row">
                            <div class="col-sm-4">
                               Education:
                            </div>
                            <div class="col-sm-4">
                                <div class="price-wrap d-flex">
                                    <span class="d-xs-only"> CP</span> 
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="text" disabled value="{{number_format($current_ilab['education'], 2)}}" id="cur_education" class="bs-none input-money  form-control b-rad-10">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-8 sm-mt-2"> 
                                <div class="price-wrap d-flex ">
                                    <span class="d-xs-only"> TP</span> 
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number" step="any" onfocus="focalPoint(this)" name="education" value="{{$ilab->education}}" min="0" required id="education" class="bs-none input-money form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2 row">
                            <div class="col-sm-4">
                               Expenditure:
                            </div>
                            <div class="col-sm-4">
                                <div class="price-wrap d-flex">
                                    <span class="d-xs-only"> CP</span> 
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="text" disabled value="{{number_format($current_ilab['expenditure'], 2)}}" id="cur_expenditure" class="bs-none input-money  form-control b-rad-10">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-8 sm-mt-2"> 
                                <div class="price-wrap d-flex ">
                                    <span class="d-xs-only"> TP</span> 
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number" step="any" onfocus="focalPoint(this)" name="expenditure" value="{{$ilab->expenditure}}" min="0" required id="expenditure" class="bs-none input-money form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2 row">
                            <div class="col-sm-4">
                                Discretionary:
                            </div> 
                            <div class="col-sm-4">
                                <div class="price-wrap d-flex">
                                    <span class="d-xs-only"> CP</span> 
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="text" disabled value="{{number_format($current_ilab['discretionary'], 2)}}" id="cur_discretionary" class="bs-none input-money  form-control b-rad-10">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-8 sm-mt-2"> 
                                <div class="price-wrap d-flex ">
                                    <span class="d-xs-only"> TP</span> 
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number" step="any" onfocus="focalPoint(this)" name="discretionary" value="{{$ilab->discretionary}}" min="0" required id="discretionary" class="bs-none input-money form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        {{-- {{ ($editmode) ? 'd-none' : '' }} --}}
                        <div class="row mt-3 justify-content-center " id="editilab">
                            <button type="submiit" class="btn btn-sm btn-pry px-4">Submit</button>
                        </div> 
                    </div>
                </form> 
            </div>
        </div>

        <script>
            var editmode ="<?php echo $editmode ?>";
            function toggleEdit(){
                // var editilab = document.getElementById('editilab');
                var investment = document.getElementById('investment'),
                    equity = document.getElementById('equity'),
                    savings = document.getElementById('savings'),
                    credit = document.getElementById('credit'),
                    mortgage = document.getElementById('mortgage')
                    portfolio = document.getElementById('portfolio'),
                    non_portfolio = document.getElementById('non_portfolio'),
                    periodic_savings = document.getElementById('periodic_savings'),
                    education = document.getElementById('education'),
                    expenditure = document.getElementById('expenditure'),
                    discretionary = document.getElementById('discretionary');
                    
                if (this.editmode) { 
                    investment.disabled = true; equity.disabled = true;
                    savings.disabled = true; credit.disabled = true;
                    mortgage.disabled = true; portfolio.disabled = true;
                    non_portfolio.disabled = true; periodic_savings.disabled = true;
                    education.disabled = true; expenditure.disabled = true;
                    discretionary.disabled = true;
                    $('#editilab').hide(); 
                }else{
                    investment.disabled = false; equity.disabled = false;
                    savings.disabled = false; credit.disabled = false;
                    mortgage.disabled = false; portfolio.disabled = false;
                    non_portfolio.disabled = false; periodic_savings.disabled = false;
                    education.disabled = false; expenditure.disabled = false;
                    discretionary.disabled = false;
                    $('#editilab').fadeIn(700);
                }

                this.editmode = !this.editmode;
            }
            toggleEdit()
        </script>
    </div>
</div>