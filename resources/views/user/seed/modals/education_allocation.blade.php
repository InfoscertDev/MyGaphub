
<div class="modal fade" id="educationAllocationModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content wd-c b-rad-20">
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob">
                        Education Allocation
                        <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                    </h2>

                </div>
                <p class="wd-7 mx-auto text-center">(Complete the form below) </p>
                <form action="{{ route('seed.store.allocation') }}" method="POST">
                    @csrf
                    <input type="hidden" name="jhbxjhbsuhjbhajbghjvajhbsxgb" value="yugvabhjvbavbjhzbjhbhajvbhgvbhvjbjhbazJHbbj">
                    <input type="hidden" name="category" value="education">
                    @if( str_contains(url()->full(), 'future') )   <input type="hidden" name="period" value="seed_future_budget" />  @endif
                    <div class="my-4">
                        <div class="form-group my-3 row">
                            <div class="col-sm-6">
                               Education Category:
                            </div>
                            <div class="col-sm-6">
                                <select name="label" class="form-control" oninput="handleChangeEducatCategory(this)" id="savings_category" required>
                                    <option value="">-- Select --</option>
                                    <option value="Financial Intelligence Training">Financial Intelligence Training</option>
                                    <option value="Career & Professional Development">Career & Professional Development</option>
                                    <option value="Mental & Personal Development">Mental & Personal Development</option>
                                    <option value="Others">Others</option>
                                </select>
                                <br>
                                <input type="text" id="education_label" name="other_label" placeholder="Label Name"  class="bs-none form-control b-rad-10 wd-8" style="display: none;">
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
                    </div>
                </form>
            </div>
        </div>

        <script>
            // let category = document.getElementById('savings_category');
            // category.addEventListener('input', handleChangeEducatCategory);

            function handleChangeEducatCategory(e){
                if(e.value == "Others"){
                    $('#education_label').fadeIn(600)
                }else{
                    $('#education_label').fadeOut(600)
                }
            }

        </script>
    </div>
</div>
