
<div class="modal fade" id="savingsSummaryModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content wd-c b-rad-20"> 
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob">
                        Savings Allocation Summary
                        <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                    </h2>
                    
                </div>  
                <!-- <p class="wd-7 mx-auto text-center">(Complete the form below) </p> -->
               <div class="my-4">
                    <table class="table table-striped wd-f">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Label</th>
                                <th scope="col">Budget</th>
                                <th scope="col">Available Balance</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($savings_allocation as $allocation)
                                <tr>
                                    <th></th>
                                    <td>{{ $allocation->label }}</td>
                                    <td>{{$currency}}{{ number_format($allocation->amount, 2) }}</td>
                                    <td>{{$currency}}{{ number_format($allocation->amount, 2) }}</td>
                                    <td>
                                        <button class="btn btn-sm mr-3" value="{{$allocation->id}}" onclick="handleAllocationEdit(this)">Edit</button>
                                        <button class="bg-none br-none mr-2"><i class="fa fa-archive"></i> </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4 mb-2 text-center">
                        <button class="btn btn-md btn-pry px-4"  data-toggle="modal" data-target="#savingsAllocationModal" onclick="$('#savingsSummaryModal').modal('hide')" > Add More </button>
                    </div>
               </div> 
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