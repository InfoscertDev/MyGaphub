
<div class="modal fade" id="averageBudgetModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content wd-c b-rad-20"> 
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob">Your Average Monthly Budget
                        <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                    </h2> 
                </div> 
                <p class="wd-7 mx-auto text-center">(View ONLY)</p>
                <div class="my-2"> 
                    <div class="row">
                        <div ><h6 class="bold text-uppercase mx-3">SAVINGS</h6></div> 
                        <div ><h6 class="text-underline">{{ $currency }}{{number_format($average_detail['table']['savings'], 2)}} </h6></div> 
                    </div>
                    @if ($average_detail['total_seed'] > 1)
                        <div class="form-group mb-2 row">
                            <div class="col-sm-6 pt-1">
                                Investment Pool Fund:
                            </div>
                            <div class="col-sm-6"> 
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input  disabled value="{{ $average_seed->investment_fund }}" class="bs-none input-money wd-f form-control b-rad-10">
                                </div>
                            </div> 
                        </div>
                        <div class="form-group mb-2 row">
                            <div class="col-sm-6 pt-1">
                                Personal Project Fund:
                            </div> 
                            <div class="col-sm-6"> 
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input disabled value="{{ $average_seed->personal_fund }}"  class="bs-none input-money wd-f form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2 row">
                            <div class="col-sm-6 pt-1">
                                Emergency and Holiday Savings:
                            </div>
                            <div class="col-sm-6"> 
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input  disabled value="{{ $average_seed->emergency_fund }}" class="bs-none input-money wd-f form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                    @endif
                        <hr>
                    <div class="row">
                        <div ><h6 class="bold text-uppercase mx-3">Education</h6></div> 
                        <div ><h6 class="text-underline">{{ $currency }}{{number_format($average_detail['table']['education'], 2)}}</h6></div> 
                    </div>
                    @if ($average_detail['total_seed'] > 1)
                        <div class="form-group mb-2 row">
                            <div class="col-sm-6 pt-1">
                                Financial Intelligence Training:
                            </div>
                            <div class="col-sm-6"> 
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number" disabled value="{{ $average_seed->financial_training }}" class="bs-none input-money wd-f form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2 row">
                            <div class="col-sm-6 pt-1">
                                Career & Professional Development
                            </div>
                            <div class="col-sm-6"> 
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number"  disabled value="{{ $average_seed->career_development }}"class="bs-none input-money wd-f form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2 row">
                            <div class="col-sm-6 pt-1">
                                Mental & Personal Development: 
                            </div>
                            <div class="col-sm-6"> 
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number"   disabled value="{{ $average_seed->mental_development }}" class="bs-none input-money wd-f form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                    @endif
                    <hr>
                    <div class="row">
                        <div ><h6 class="bold text-uppercase mx-3">Expenditure</h6></div> 
                        <div ><h6 class="text-underline">{{ $currency }}{{number_format($average_detail['table']['expenditure'], 2)}} </h6></div> 
                    </div>
                    <div class="form-group mb-2 row">
                        <div class="col-sm-6 pt-1">
                            Accomodation
                        </div>
                        <div class="col-sm-6"> 
                            <div class="price-wrap d-flex ">
                                <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                <input type="number"   disabled value="{{ $average_seed->accomodation }}" class="bs-none input-money wd-f form-control b-rad-10">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2 row">
                        <div class="col-sm-6 pt-1">
                            Transport & Mobility:
                        </div>
                        <div class="col-sm-6">
                            <div class="price-wrap d-flex">
                                <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                <input type="text"  disabled value="{{ $average_seed->mobility }}" class="bs-none input-money wd-f  form-control b-rad-10">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2 row">
                        <div class="col-sm-6 pt-1">
                            Home & Family Expenses:
                        </div>
                        <div class="col-sm-6">
                            <div class="price-wrap d-flex">
                                <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                <input type="text" disabled value="{{ $average_seed->expenses }}" class="bs-none input-money wd-f  form-control b-rad-10">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2 row">
                        <div class="col-sm-6 pt-1">Utilities: </div>
                        <div class="col-sm-6">
                            <div class="price-wrap d-flex">
                                <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                <input type="text" disabled value="{{ $average_seed->utilities }}" class="bs-none input-money wd-f  form-control b-rad-10">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-2 row">
                        <div class="col-sm-6 pt-1">  Debt Repayment: </div>
                        <div class="col-sm-6">
                            <div class="price-wrap d-flex">
                                <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                <input type="text" disabled value="{{ $average_seed->debt_repay }}" class="bs-none input-money wd-f  form-control b-rad-10">
                            </div>
                        </div>
                    </div> 
                    <hr>
                    <div class="row">
                        <div ><h6 class="bold text-uppercase mx-3">DISCRETIONARY</h6></div> 
                        <div ><h6 class="text-underline">{{ $currency }}{{(number_format($average_detail['table']['discretionary'],2))}}</h6></div> 
                    </div> 
                    @if ($average_detail['total_seed'] > 1)
                        <div class="form-group mb-2 row">
                            <div class="col-sm-6 pt-1">
                                Charitable Giving:
                            </div>
                            <div class="col-sm-6"> 
                                <div class="price-wrap d-flex "> 
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number"  disabled value="{{ $average_seed->charity }}"  class="bs-none input-money wd-f form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2 row">
                            <div class="col-sm-6 pt-1">
                                Extended Family Support:
                            </div>
                            <div class="col-sm-6"> 
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number"   disabled value="{{ $average_seed->family_support }}" class="bs-none input-money wd-f form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2 row">
                            <div class="col-sm-6 pt-1">
                                Personal Conviction Commitments:
                            </div>
                            <div class="col-sm-6"> 
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number" disabled value="{{ $average_seed->personal_commitments }}" class="bs-none input-money wd-f form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2 row">
                            <div class="col-sm-6 pt-1">
                               Others:
                            </div>
                            <div class="col-sm-6"> 
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number" disabled value="{{ $average_seed->others }}" class="bs-none input-money wd-f form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row mt-3 justify-content-center" >
                        <span class="h5 mr-3">Total</span>
                        <div type="submiit" class="btn-pry px-4">{{ $currency }}{{number_format($average_detail['total'],2)}}</div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>