
<div class="modal fade" id="expenditureAllocationModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content wd-c b-rad-20"> 
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob">
                        Expenditure Allocation
                        <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                    </h2>
                </div> 
                <p class="wd-7 mx-auto text-center">(Complete the form below) </p>
                <form action="{{ route('seed.store.allocation') }}" method="POST">
                    @csrf
                    <input type="hidden" name="jhbxjhbsuhjbhajbghjvajhbsxgb" value="yugvabhjvbavbjhzbjhbhajvbhgvbhvjbjhbazJHbbj">
                    <input type="hidden" name="category" value="expenditure">
                    <div class="my-4">
                        <!-- <div class="row">
                           <div ><h6 class="bold text-uppercase mx-3">SAVINGS</h6></div> 
                           <div ><h6 class="text-underline">{{ $currency }}{{number_format($current_detail['table']['savings'],2)}} </h6></div> 
                        </div> -->
                       
                        <div class="form-group my-3 row">
                            <div class="col-sm-6">
                               Expenditure Category:
                            </div>
                            <div class="col-sm-6"> 
                                <select name="expenditure" class="form-control" onchange="handleExpenditureCategory(this)" required>
                                    <option value="">-- Select --</option>
                                    <option value="accommodation">Accommodation</option>
                                    <option value="transportation">Transportation</option>
                                    <option value="family">Home & Family</option>
                                    <option value="utilities">Utilities</option>
                                    <option value="debt_repayment">Debt Repayment </option>
                                </select>
                            </div> 
                        </div>
                        
                        <div class="form-group my-3 row">
                            <div class="col-sm-6">
                               Description Label:
                            </div>
                            <div class="col-sm-6"> 
                                <select name="label" class="form-control" onchange="handleChangeExpenditure(this)" id="expenditure_category" required>
                                    <option value="">-- Select --</option>
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
                        <div class="form-group my-3 row">
                            <div class="col-sm-6">
                                Recuring:
                            </div>
                            <div class="col-sm-6"> 
                                <div class=" switch text-left">
                                   <input class="" id="switch_cash" name="recuring" type="checkbox" /><label data-off="OFF" data-on="ON" for="switch_cash"></label>
                                </div>
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

            function handleExpenditureCategory(e){
                let expenditure= e.value.toLowerCase(), 
                    categories = $("#expenditure_category");
                    
                var accommodation = {
                    "Mortgage": "Mortgage", "Rent": "Rent",
                    "Mortgage Reduction": "Mortgage Reduction", "Others": "Others"
                }, transportation = {
                    "Fuel": "Fuel", "Insurance": "Insurance", "Road Tax": "Road Tax",
                    "MOT": "MOT","Trains & Taxis": "Trains & Taxis",
                    "Misc": "Misc", "Others": "Others"
                },family = {
                    "Groceries": "Groceries", "Children Allowance": "Children Allowance", "Parent Allowance": "Parent Allowance",
                    "Personal Allowance": "Personal Allowance", "Clothings": "Clothings", "Eating Out": "Eating Out",
                    "Entertainment": "Entertainment", "Life Insurance": "Life Insurance", "Childcare": "Childcare", 
                    "Home & Emergency Insurance": "Home & Emergency Insurance", "Extra-Curricula": "Extra-Curricula", 
                    "Others": "Others"
                }, utilities = {
                    "Council / Property Tax": "Council / Property Tax", "Gas": "Gas", "Electric": "Electric",
                    "Water & Sewage": "Water & Sewage", "TV & Cable Subscriptions": "TV & Cable Subscriptions",
                    "Internet / Broadband": "Internet / Broadband", "Mobile Phone": "Mobile Phone", "Others": "Others"
                }, debt_repayment  = {
                    "Loan": "Loan", "Credit Card": "Credit Card", "Others": "Others"
                }; 
                
                categories.empty(); // remove old options
                // $('#selectId option:gt(0)').remove() 
                $.each(eval(expenditure), function(key,value) {
                categories.append($("<option></option>")
                    .attr("value", value).text(key));
                });
            }

            function handleChangeExpenditure(e){
                console.log(e.value)
                if(e.value == "Other"){
                    $('#other_label').fadeIn(600)
                }else{
                    $('#other_label').fadeOut(600)
                }
            }

        </script>
    </div>
</div>