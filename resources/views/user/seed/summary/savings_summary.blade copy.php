
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
                    </table>

                    <div id="accordion">
                        @foreach($savings_allocation as $allocation)
                            <div class="">
                                <div class="accord-header text-dark">
                                    <div class="col-5">
                                        <span class="gap-card-title accord-title">
                                            {{ $allocation->label }}
                                        </span>
                                    </div>
                                    <div class="col-7 d-flex">
                                        <div class="col-3">{{$currency}}{{ number_format($allocation->amount, 2) }}</div>
                                        <div class="col-3">{{$currency}}{{ number_format($allocation->amount, 2) }}</div>
                                        <div class="col-4 d-flex">
                                            <button class="btn btn-outline-danger btn-sm mr-3" value="{{$allocation->id}}" onclick="handleAllocationEdit(this)">Edit</button>
                                            <button class="bg-none br-none mr-2"><i class="fa fa-archive txt-primary"></i> </button>
                                        </div>
                                        <div class="col-2">
                                            <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#{{$allocation->seed_category}}{{$allocation->id}}" aria-expanded="true" aria-controls="{{$allocation->seed_category}}">
                                                <i class="fa fa-chevron-down"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div id="{{$allocation->seed_category}}{{$allocation->id}}" class="collapse" data-parent="#accordion">
                                    <div class="card-body pb-1">
                                        <p class="text-white">{{var_dump($allocation->summary)}}</p>
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus optio ab alias minima harum. Reprehenderit et ex delectus sit repellat aut recusandae possimus voluptate architecto? Error perspiciatis maiores atque. Atque!</p>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="card">
                                <div class="accord-header" id="headingOne">
                                    <div class="wd-f py-1">
                                        <span class="gap-card-title accord-title">Business Asset</span>
                                        <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <i class="fa fa-chevron-down"></i>
                                        </button>
                                    </div>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body pb-1">

                                    </div>
                                </div>
                            </div> -->
                        @endforeach
                    </div>

                    <div class="mt-4 mb-2 text-center">
                        <button class="btn btn-md btn-pry px-4"  data-toggle="modal" data-target="#savingsAllocationModal" onclick="$('#savingsSummaryModal').modal('hide')" > Add More </button>
                    </div>
               </div>
            </div>
        </div>

        <script>
            function handleChangeCategory(e){
                if(e.value == "Others"){
                    $('#other_label').fadeIn(600)
                }else{
                    $('#other_label').fadeOut(600)
                }
            }
        </script>
    </div>
</div>
