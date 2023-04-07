
<div class="modal fade" id="createRecordSpentModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content wd-c b-rad-20">
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob">
                       Record Spend
                        <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                    </h2>
                </div>
                <p class="wd-7 mx-auto text-center">(Complete the form below) </p>
                <form action="{{ route('seed.add.record_spent') }}" method="POST">
                    @csrf
                    <input type="hidden" name="jhbxjhbsuhjbhajbghjvajhbsxgb" value="yugvabhjvbavbjhzbjhbhajvbhgvbhvjbjhbazJHbbj">
                    <input type="hidden" name="category" value="expenditure">
                    <div class="my-4">
                        <!-- <div class="row">
                           <div ><h6 class="bold text-uppercase mx-3">SAVINGS</h6></div>
                           <div ><h6 class="text-underline">{{ $currency }}{{number_format($current_detail['table']['savings'],2)}} </h6></div>
                        </div> -->


                        <div class="form-group my-3 row">
                            <div class="col-sm-5">
                                Amount:
                            </div>
                            <div class="col-sm-7">
                                <div class="price-wrap d-flex ">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="number" onfocus="focalPoint(this)"  name="amount" id="amount" required  min="0" value="0"  class="bs-none input-money wd-f form-control b-rad-10">
                                </div>
                            </div>
                        </div>

                        <div class="form-group my-3 row">
                            <div class="col-sm-5">
                                Date:
                            </div>
                            <div class="col-sm-7">
                                <input type="date"  name="date" id="date" max="{{ date('Y-m-d') }}" required class="bs-none input-money wd-f form-control b-rad-10">
                            </div>
                        </div>

                        <div class="form-group my-3 row">
                            <div class="col-sm-5">
                                SEED Category:
                            </div>
                            <div class="col-sm-7">
                                <select name="seed" id="seed" class="form-control" onchange="handleSeedCategory(this)" required>
                                    <option value="">-- Select --</option>
                                    <option value="Savings">Savings</option>
                                    <option value="Expenditure">Expenditure</option>
                                    <option value="Education">Education</option>
                                    <option value="Discretionary">Discretionary</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group my-3 row" id="expenditure_lane" style="display: none;">
                            <div class="col-sm-5">
                                 Expenditure
                            </div>
                            <div class="col-sm-7">
                                <select name="expenditure" class="form-control text-capitalize" onchange="handleChangeExpenditure(this)" id="expenditure">
                                    <option value="">-- Select --</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group my-3 row" id="allocation_lane" style="display: none;">
                            <div class="col-sm-5">
                               <span id="selected_seed" class="text-capitalize"></span>
                            </div>
                            <div class="col-sm-7">
                                <select name="allocation" class="form-control" id="allocation" onchange="handleChangeAllocation(this)" required>
                                    <option value="">-- Select --</option>
                                </select>
                                <div class="mt-2 record_details" style="display: none">
                                    <div class="small">Available Balance: {{$currency}} <span id="summary_balance">300.00</span></div>
                                    <div class="small text-muted">Available After Spent: {{$currency}}<span id="summary_spent">300.00</span></div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group my-3 row record_details" style="display: none;">
                            <div class="col-sm-5">
                               Payee / Merchant:
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="label" name="label" placeholder="Payee Name"  class="bs-none form-control b-rad-10 wd-8" >
                            </div>
                        </div>
                        <div class="form-group my-3 row record_details" style="display: none;">
                            <div class="col-sm-5">
                                Note / Description:
                            </div>
                            <div class="col-sm-7">
                                <textarea name="note" id="note" class="form-control b-rad-10" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="form-group my-3 row record_details" style="display: none;">
                            <div class="col-sm-5">
                               Recurring:
                            </div>
                            <div class="col-sm-7">
                                <div class=" switch text-left">
                                   <input class="" id="switch_recurring" name="recuring" type="checkbox" /><label data-off="OFF" data-on="ON" for="switch_recurring"></label>
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
            var allocations = [];

            function handleSeedCategory(e){
                let category= e.value.toLowerCase();
                if(category == 'expenditure'){
                    $('#expenditure_lane').fadeIn(600);
                    $('#allocation_lane').fadeOut(600)
                }else{
                    $('#expenditure_lane').fadeOut(600);
                    $('#selected_seed').text(category)
                    $('#allocation_lane').fadeIn(600)
                }
                listAllocation(category)
            }

            function handleChangeAllocation(e){
                if(e.value) $('.record_details').fadeIn();
                let allocation = allocations.find((al) => {return al.id == e.value});
                if(allocation.summary){
                    $('#summary_balance').text(allocation.summary.total_left);
                    $('#summary_spent').text(+allocation.summary.total_left - $('#amount').val());
                }
            }

            function handleChangeExpenditure(e){
                let expenditure = e.value,
                    category = $('#seed').val();
                $('#allocation_lane').fadeIn(600);
                $('#selected_seed').text(expenditure)
                listAllocation(category, expenditure);
            }

            function listAllocation(category, expenditure = ''){
                let  list_allocation = $("#allocation"),
                     list_expenditure =  $('#expenditure');

                // console.log(category, expenditure);

                if(expenditure == 'Home & Family') expenditure = 'family';
                if(expenditure == 'Debt Repayment') expenditure = 'debt_repayment';

                $.ajax({
                    type: 'GET',
                    url: `/home/seed/list/allocate?category=${category.toLowerCase()}&expenditure=${expenditure.toLowerCase()}`,
                    success: function(data, status){
                        let listings = data.data;
                        allocations = listings.budget_allocation
                        expenditure_labels = listings.expenditure_labels
                        if(category == 'expenditure' && !expenditure) allocations = expenditure_labels
                        // console.log(allocations, expenditure_labels)

                        if (allocations) {
                            // remove old options
                            list_allocation.not(':first').remove();;
                            $('#allocation option:gt(0)').remove();
                            $('#expenditure option:gt(0)').remove();

                            $.each(allocations, function(key,allocation) {
                                if(category == 'expenditure'){
                                    if(list_expenditure.length <= 1){
                                        allocation = allocation.toLowerCase();
                                        let label = (allocation == 'family') ? allocation = 'Home & Family' :
                                                (allocation == 'debt_repayment') ?  allocation = 'Debt Repayment' : allocation;
                                        list_expenditure.append($("<option></option>")
                                        .attr("value", allocation).text(label));
                                    }
                                } else if(category == 'expenditure' && expenditure){

                                    list_allocation.append($("<option></option>")
                                    .attr("value", allocation.id).text(allocation.label));
                                }else {
                                    list_allocation.append($("<option></option>")
                                    .attr("value", allocation.id).text(allocation.label));
                                }
                            });
                        }
                    },

                    error: function (data,  ){

                    }
                })

            }

        </script>
    </div>
</div>
