
<div class="modal fade" id="createRecordSpentModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content wd-c b-rad-20">
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob">
                       Record Spent
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
                                <input type="date"  name="date" id="date" required class="bs-none input-money wd-f form-control b-rad-10">
                            </div>
                        </div>

                        <div class="form-group my-3 row">
                            <div class="col-sm-5">
                              Choose SEED Category:
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
                              Expenditure:
                            </div>
                            <div class="col-sm-7">
                                <select name="expenditure" class="form-control" onchange="handleChangeExpenditure(this)" id="expenditure">
                                    <option value="">-- Select --</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group my-3 row">
                            <div class="col-sm-5">
                               Allocation :
                            </div>
                            <div class="col-sm-7">
                                <select name="allocation" class="form-control" id="allocation" required>
                                    <option value="">-- Select --</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group my-3 row">
                            <div class="col-sm-5">
                               Payee Name:
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="label" name="label" placeholder="Payee Name"  class="bs-none form-control b-rad-10 wd-8" >
                            </div>
                        </div>
                        <div class="form-group my-3 row">
                            <div class="col-sm-5">
                                Description / Note:
                            </div>
                            <div class="col-sm-7">
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

            function handleSeedCategory(e){
                let category= e.value.toLowerCase();
                console.log(category);
                if(category == 'expenditure'){
                    $('#expenditure_lane').fadeIn(600)
                }else{
                    $('#expenditure_lane').fadeOut(600);
                }
                listAllocation(category)
            }

            function handleChangeExpenditure(e){
                let expenditure = e.value,
                    category = $('#seed').val();
                listAllocation(category,expenditure);
            }

            function listAllocation(category, expenditure = ''){
                let  list_allocation = $("#allocation"),
                     list_expenditure =  $('#expenditure');
                $.ajax({
                    type: 'GET',
                    url: `/home/seed/list/allocate?category=${category.toLowerCase()}&expenditure=${expenditure.toLowerCase()}`,
                    success: function(data, status){
                        let allocations = data.data;
                        if (allocations) {
                            list_allocation.empty(); // remove old options
                            // $('#selectId option:gt(0)').remove()
                            $.each(allocations, function(key,allocation) {
                                console.log(allocation)
                                if(category == 'expenditure'){
                                    list_expenditure.append($("<option></option>")
                                    .attr("value", allocation.expenditure).text((allocation.expenditure).toUpperCase()));
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
                })

            }

            function handleChangeAllocation(e){
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
