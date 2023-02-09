
<div class="modal fade" id="savingsAllocationModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content wd-c b-rad-20"> 
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob">
                        Savings Allocation
                        <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                    </h2>
                </div> 
                <p class="wd-7 mx-auto text-center">(Complete the form below) </p>
                <form action="{{ route('seed.store.allocation') }}" method="POST">
                    @csrf
                    <input type="hidden" name="jhbxjhbsuhjbhajbghjvajhbsxgb" value="yugvabhjvbavbjhzbjhbhajvbhgvbhvjbjhbazJHbbj">
                    <input type="hidden" name="category" value="savings">
                    <div class="my-4">
                        <!-- <div class="row">
                           <div ><h6 class="bold text-uppercase mx-3">SAVINGS</h6></div> 
                           <div ><h6 class="text-underline">{{ $currency }}{{number_format($current_detail['table']['savings'],2)}} </h6></div> 
                        </div> -->
                       
                        <div class="form-group my-3 row">
                            <div class="col-sm-6">
                               Savings Category:
                            </div>
                            <div class="col-sm-6"> 
                                <select name="label" class="form-control" oninput="handleChangeCategory(this)" id="savings_category" required>
                                    <option value="">-- Select --</option>
                                    <option value="Investment Pool Fund">Investment Pool Fund</option>
                                    <option value="Personal Project Fund">Personal Project Fund</option>
                                    <option value="Emergency and Holiday Savings">Emergency and Holiday Savings</option>
                                    <option value="Others">Others</option>
                                </select>
                                <br>
                                <input type="text" id="other_label" name="other_label" placeholder="Label Name"  class="bs-none form-control b-rad-10 wd-8" style="display: none;">
                            </div> 
                        </div>
                        <div class="form-group my-3 row">
                            <div class="col-sm-6">
                                Amount:
                            </div> 
                            <div class="col-sm-6"> 
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number" onfocus="focalPoint(this)"  name="amount" id="amount" required  min="0" value="0"  class="bs-none input-money wd-f form-control b-rad-10">
                                </div>
                            </div>
                        </div>
                        <div class="form-group my-3 row">
                            <div class="col-sm-6">
                                Additional Note:
                            </div>
                            <div class="col-sm-6"> 
                                <textarea name="note" id="note" class="form-control b-rad-10" rows="2"></textarea>
                            </div>
                        </div> 
                        
                        <div class="row mt-4 justify-content-center " id="edit_current" >
                            <button type="submiit" class="btn btn-md btn-pry px-4">Submit</button>
                        </div> 
                        <!-- <div class="row mt-3 justify-content-center " id="total_current">
                            <span class="h5 mr-3">Total</span>
                            <div type="submiit" class="btn-pry px-4">{{ $currency }}{{number_format($current_detail['total'],2)}}</div>
                        </div>  -->
                    </div>
                </form> 
            </div>
        </div>

        <script>
            // let category = document.getElementById('savings_category');
            // category.addEventListener('input', handleChangeCategory);

            function handleChangeCategory(e){
                if(e.value == "Others"){
                    $('#other_label').fadeIn(600)
                }else{
                    $('#other_label').fadeOut(600)
                }
            }

            var editmode = 1 ;
            function toggleEditCurrent(){
                // var editilab = document.getElementById('editilab');
                var investment = document.getElementById('investment'),
                    personal = document.getElementById('personal'),
                    emergency = document.getElementById('emergency'),
                    finicial = document.getElementById('finicial'),
                    career = document.getElementById('career')
                    mental = document.getElementById('mental'),
                    accomodation = document.getElementById('accomodation'),
                    mobility = document.getElementById('mobility'),
                    expenses = document.getElementById('expenses'),
                    utilities = document.getElementById('utilities'),
                    debt = document.getElementById('debt'),

                    charity = document.getElementById('charity'),
                    family = document.getElementById('family'),
                    others = document.getElementById('others'),
                    commitments = document.getElementById('commitments');
                    
                if (this.editmode) { 
                    investment.disabled = true; personal.disabled = true;
                    emergency.disabled = true; finicial.disabled = true;
                    career.disabled = true; mental.disabled = true;
                    accomodation.disabled = true;  expenses.disabled = true; 
                    mobility.disabled = true;  utilities.disabled = true; 
                    debt.disabled = true; 
                    charity.disabled = true; others.disabled = true;
                    family.disabled = true; commitments.disabled = true;
                    
                    $('#edit_current').hide(); $('#total_current').fadeIn(700); 
                }else{
                    investment.disabled = false; personal.disabled = false;
                    emergency.disabled = false; finicial.disabled = false;
                    career.disabled = false; mental.disabled = false;
                    accomodation.disabled = false;  expenses.disabled = false; 
                    mobility.disabled = false;  utilities.disabled = false; 
                    debt.disabled = false; 
                    
                    charity.disabled = false; others.disabled = false;
                    family.disabled = false; commitments.disabled = false;
                   
                    $('#edit_current').fadeIn(700);  $('#total_current').hide(); 
                }

                this.editmode = !this.editmode;
            }
            // toggleEditCurrent()
        </script>
    </div>
</div>