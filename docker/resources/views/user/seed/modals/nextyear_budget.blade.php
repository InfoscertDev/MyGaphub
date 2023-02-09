
<div class="modal fade" id="nextyearBudgetModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content wd-c b-rad-20"> 
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob">Your Budgeting Goal for Next Year
                        <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                    </h2>
                    
                </div> 
                <p class="wd-7 mx-auto text-center">(View and Edit)
                    <button type="button" class="ml-2 btn bg-none fa fa-edit btn-sm" onclick="toggleEdit()"></button>    
                </p>
                <form action="{{ route('seed.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="jhbxjhbsuhjbhajbghjvajhbsxgb" value="opajoiabnjkabjahvjnbzahjbzapqwgeydhj">
                    <div class="my-2">
                        <div class="row">
                           <div ><h6 class="bold text-uppercase mx-3">SAVINGS</h6></div> 
                           <div ><h6 class="text-underline">{{ $currency }}{{number_format($target_detail['table']['savings'], 2)}} </h6></div> 
                        </div>
                        <div class="form-group mb-2 row">
                            <div class="col-sm-6">
                                Investment Pool Fund:
                            </div>
                            <div class="col-sm-6"> 
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number" onfocus="focalPoint(this)" name="investment_fund" min="0" id="target_investment"  min="0" value="{{ $target_seed->investment_fund }}" required class="bs-none input-money wd-f form-control b-rad-10">
                                </div>
                            </div> 
                        </div>
                        <div class="form-group mb-2 row">
                            <div class="col-sm-6">
                                Personal Project Fund:
                            </div> 
                            <div class="col-sm-6"> 
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number" onfocus="focalPoint(this)"  name="personal_fund" min="0" id="target_personal" required  min="0" value="{{ $target_seed->personal_fund }}"  class="bs-none input-money wd-f form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2 row">
                            <div class="col-sm-6">
                                Emergency and Holiday Savings:
                            </div>
                            <div class="col-sm-6"> 
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number" onfocus="focalPoint(this)"  name="emergency_fund" id="target_emergency" required  min="0" value="{{ $target_seed->emergency_fund }}" class="bs-none input-money wd-f form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div ><h6 class="bold text-uppercase mx-3">Education</h6></div> 
                           <div ><h6 class="text-underline">{{ $currency }}{{number_format($target_detail['table']['education'], 2)}}</h6></div> 
                        </div>
                        <div class="form-group mb-2 row">
                            <div class="col-sm-6">
                                Financial Intelligence Training:
                            </div>
                            <div class="col-sm-6"> 
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number" onfocus="focalPoint(this)" name="financial_training" id="target_finicial" required  min="0" value="{{ $target_seed->financial_training }}" class="bs-none input-money wd-f form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2 row">
                            <div class="col-sm-6">
                                Career & Professional Development
                            </div>
                            <div class="col-sm-6"> 
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number" onfocus="focalPoint(this)" name="career_development" id="target_career" required  min="0" value="{{ $target_seed->career_development }}"class="bs-none input-money wd-f form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group mb-2 row">
                            <div class="col-sm-6">
                                Mental & Personal Development: 
                            </div>
                            <div class="col-sm-6"> 
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number" onfocus="focalPoint(this)" name="mental_development" id="target_mental" required  min="0" value="{{ $target_seed->mental_development }}" class="bs-none input-money wd-f form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div ><h6 class="bold text-uppercase mx-3">Expenditure</h6></div> 
                           <div ><h6 class="text-underline">{{ $currency }}{{number_format($target_detail['table']['expenditure'], 2)}} </h6></div> 
                        </div>
                        <div class="form-group mb-2 row">
                            <div class="col-sm-6">
                                Accomodation
                            </div>
                            <div class="col-sm-6"> 
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number" onfocus="focalPoint(this)" name="accomodation" id="target_accomodation" required  min="0" value="{{ $target_seed->accomodation }}" class="bs-none input-money wd-f form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2 row">
                            <div class="col-sm-6">
                               Transport & Mobility:
                            </div>
                            <div class="col-sm-6">
                                <div class="price-wrap d-flex">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="text" onfocus="focalPoint(this)"  name="mobility" id="target_mobility" required  min="0" value="{{ $target_seed->mobility }}" class="bs-none input-money wd-f  form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2 row">
                            <div class="col-sm-6">
                               Home & Family Expenses:
                            </div>
                            <div class="col-sm-6">
                                <div class="price-wrap d-flex">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="text" onfocus="focalPoint(this)"  name="expenses" id="target_expenses" required  min="0" value="{{ $target_seed->expenses }}" class="bs-none input-money wd-f  form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2 row">
                            <div class="col-sm-6">Utilities: </div>
                            <div class="col-sm-6">
                                <div class="price-wrap d-flex">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="text" onfocus="focalPoint(this)"  name="utilities" id="target_utilities" required  min="0" value="{{ $target_seed->utilities }}" class="bs-none input-money wd-f  form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2 row">
                            <div class="col-sm-6">  Debt Repayment: </div>
                            <div class="col-sm-6">
                                <div class="price-wrap d-flex">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="text" onfocus="focalPoint(this)"  name="debt_repay" id="target_debt" required  min="0" value="{{ $target_seed->debt_repay }}" class="bs-none input-money wd-f  form-control b-rad-10">
                                </div>
                            </div>
                        </div> 
                        <hr>
                        <div class="row">
                            <div ><h6 class="bold text-uppercase mx-3">DISCRETIONARY</h6></div> 
                           <div ><h6 class="text-underline">{{ $currency }}{{(number_format($target_detail['table']['discretionary'],2))}}</h6></div> 
                        </div> 
                        <div class="form-group mb-2 row">
                            <div class="col-sm-6">
                                Charitable Giving:
                            </div>
                            <div class="col-sm-6"> 
                                <div class="price-wrap d-flex "> 
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number" onfocus="focalPoint(this)" name="charity" id="target_charity" required  min="0" value="{{ $target_seed->charity }}" required  class="bs-none input-money wd-f form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2 row">
                            <div class="col-sm-6">
                                Extended Family Support:
                            </div>
                            <div class="col-sm-6"> 
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number" onfocus="focalPoint(this)" name="family_support" id="target_family" required  min="0" value="{{ $target_seed->family_support }}" class="bs-none input-money wd-f form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2 row">
                            <div class="col-sm-6">
                                Personal Conviction Commitments:
                            </div>
                            <div class="col-sm-6"> 
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number" onfocus="focalPoint(this)" name="personal_commitments" id="target_commitments" required  min="0" value="{{ $target_seed->personal_commitments }}" class="bs-none input-money wd-f form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2 row">
                            <div class="col-sm-6">
                                Others:
                            </div>
                            <div class="col-sm-6"> 
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number" onfocus="focalPoint(this)" name="others" id="target_others" required  min="0" value="{{ $target_seed->others }}" class="bs-none input-money wd-f form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 justify-content-center " id="edit_target" style="display: none">
                            <button type="submiit" class="btn btn-sm btn-pry px-4">Submit</button>
                        </div> 
                        <div class="row mt-3 justify-content-center " id="total_target">
                            <span class="h5 mr-3">Total</span>
                            <div type="submiit" class="btn-pry px-4">{{ $currency }}{{number_format($target_detail['total'],2)}}</div>
                        </div> 
                    </div>
                </form> 
            </div>
        </div>

        <script>
            var editmode = 1;
            function toggleEdit(){
                // var editilab = document.getElementById('editilab');
                var investment = document.getElementById('target_investment'),
                    personal = document.getElementById('target_personal'),
                    emergency = document.getElementById('target_emergency'),
                    finicial = document.getElementById('target_finicial'),
                    career = document.getElementById('target_career')
                    mental = document.getElementById('target_mental'),
                    accomodation = document.getElementById('target_accomodation'),
                    mobility = document.getElementById('target_mobility'),
                    expenses = document.getElementById('target_expenses'),
                    utilities = document.getElementById('target_utilities'),
                    debt = document.getElementById('target_debt'),

                    charity = document.getElementById('target_charity'),
                    family = document.getElementById('target_family'),
                    others = document.getElementById('target_others'),
                    commitments = document.getElementById('target_commitments');
                    
                if (this.editmode) { 
                    investment.disabled = true; personal.disabled = true;
                    emergency.disabled = true; finicial.disabled = true;
                    career.disabled = true; mental.disabled = true;
                    accomodation.disabled = true;  expenses.disabled = true; 
                    mobility.disabled = true;  utilities.disabled = true; 
                    debt.disabled = true; 
                    charity.disabled = true; others.disabled = true;
                    family.disabled = true; commitments.disabled = true;
                     
                    $('#edit_target').hide(); $('#total_target').fadeIn(700); 
                }else{
                    investment.disabled = false; personal.disabled = false;
                    emergency.disabled = false; finicial.disabled = false;
                    career.disabled = false; mental.disabled = false;
                    accomodation.disabled = false;  expenses.disabled = false; 
                    mobility.disabled = false;  utilities.disabled = false; 
                    debt.disabled = false; 
                    
                    charity.disabled = false; others.disabled = false;
                    family.disabled = false; commitments.disabled = false;
                   
                    $('#edit_target').fadeIn(700);  $('#total_target').hide(); 
                }

                this.editmode = !this.editmode;
            }
            toggleEdit()
        </script>
    </div>
</div>