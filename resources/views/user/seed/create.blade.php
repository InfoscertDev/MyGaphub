@extends('layouts.user')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="text-center bolder">
                <h3>{{ date('F')}} {{ date('Y')}}</h3>
            </div>
        </div>
        <br> <br>
        <div class="col-md-5 col-sm-12 sm-default">
            <div class="d-flex">
                <h3 class="bold mr-2">
                    {{ ($current_seed->budget_amount == 0) ? 'Set Budget:' : 'My Budget:'}}
                </h3>
                <div id="view_budget_amount"  style="display: none;" >
                    <span class="px-2 h3">{{$currency}}{{ number_format($current_seed->budget_amount, 2) }} </span>
                    <span class="account_info info"  data-toggle="tooltip" data-placement="right" title="Double click to edit"><i class="fa fa-info mx-2 "></i></span>
                </div>
                <div id="edit_budget_amount">
                    <form action="{{ route('seed.store.set_budget')  }}" method="post" id="budgetForm">
                        @csrf
                        @if(session('alert')) <input type="hidden" name="seed" value="ediucfhjbndcfjnkdcknj" />  @endif
 
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"> {{$currency}}</div>
                            </div>
                            <input type="number" oninput="handleBudgetChange(this)" name="budget" min="0" value="{{ old('budget',$current_seed->budget_amount) }}" class="form-control">
                        </div>
                    </form>
                </div>

            @if(session('alert'))
                <div class="modal show" id="budgetAlertMode" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-hidden="true">
                    <div class="modal-dialog  modal-dialog-centered" role="document">
                        <!-- <div class="modal-content modal-content-centre b-rad-20">
                            <div class="modal-body">
                                <div class="py-4">
                                    <ul class="list-group list-group-flush cash-tiles portfolio-tiles">
                                        <li class="list-group-item my-2 text-center"> <a href="{{route('seed', ['record' =>'sjhdbcfnkdmffgcyu' ]) }}" class="card-link text-white"> Yes</a> </li>
                                        <li class="btn list-group-item my-2 text-center"><a href="{{ route('seed') }}" class="card-link text-white">No</a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                        <div class="modal-content">
                            <div class="modal-body mt-3">
                                <h5 class="text-center">Your set amount is lower than the sum of your allocated SEED, would you like to proceed with the new budget amount? </h5>
                            </div>

                            <div class="modal-footer mx-auto mb-3 mt-2">
                                <div class="text-left">
                                    <button type="submit" onclick="$('#budgetForm').submit()"  class="btn btn-pry px-3 mr-3">Yes</button>
                                </div>
                                <div class="text-right">
                                    <button type="button" onclick="$('#confirmRemoveAccount').modal('hide');" class="btn btn-default px-3 mr-3">No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $(function() {  $('#budgetAlertMode').modal('show'); })
                </script>
            @endif
            </div>
        </div>
        <div class="col-md-7 col-sm-12 sm-default">
            <div class="float-right">
                <div class="d-flex">
                    <h3 class="bold ml-3">Available for Allocation: </h3>
                    <span class="px-2 h3">{{$currency}}<span id="allocation_available">{{ number_format($available_allocation, 2) }}</span>  </span>
                </div>
            </div>
        </div>
    </div>

    @include('user.seed.modals.savings_allocation')
    @include('user.seed.modals.education_allocation')
    @include('user.seed.modals.discretionary_allocation')
    @include('user.seed.modals.expenditure_allocation')

    <br><br>

    <div class="row  mt-5 mb-2">
        <div class="col-md-3">
            @if($current_detail['table']['savings'] == 0)
                <div class="seed-pane seed-savings tool-pane hand"  onclick="$('#savingsAllocationModal').modal('show')">
                    <div class="seed-badge br-none"    > {{$currency}}{{ number_format($current_detail['table']['savings'], 2) }} </div>
                    <div class="tool-title"> <h3 class="center">Savings</h3></div>
                </div>
            @else
                <a class="seed-pane seed-savings tool-pane hand" href="{{ route('seed.summary', 'savings') }}">
                    <div class="seed-badge br-none"    > {{$currency}}{{ number_format($current_detail['table']['savings'], 2) }} </div>
                    <div class="tool-title"> <h3 class="center">Savings</h3></div>
                </a>
            @endif
        </div>
        <div class="col-md-3">
            @if($current_detail['table']['expenditure'] == 0)
                <div class="seed-pane seed-expenditure tool-pane hand"  onclick="$('#expenditureAllocationModal').modal('show')">
                    <div class="seed-badge">{{$currency}}{{ number_format($current_detail['table']['expenditure'], 2) }}</div>
                    <div class="tool-title"> <h3 class="center">Expenditure</h3></div>
                </div>
            @else
                <a class="seed-pane seed-expenditure tool-pane hand" href="{{ route('seed.summary', 'expenditure') }}">
                    <div class="seed-badge br-none"    > {{$currency}}{{ number_format($current_detail['table']['expenditure'], 2) }} </div>
                    <div class="tool-title"> <h3 class="center">Expenditure</h3></div>
                </a>
            @endif
        </div>
        <div class="col-md-3">
            @if($current_detail['table']['education'] == 0)
                <div class="seed-pane seed-education tool-pane hand"  onclick="$('#educationAllocationModal').modal('show')">
                    <div class="seed-badge br-none"  >{{$currency}}{{ number_format($current_detail['table']['education'], 2) }}</div>
                    <div class="tool-title"> <h3 class="center">Education</h3></div>
                </div>
            @else
                <a class="seed-pane seed-education tool-pane hand"   href="{{ route('seed.summary', 'education') }}">
                    <div class="seed-badge br-none"  >{{$currency}}{{ number_format($current_detail['table']['education'], 2) }}</div>
                    <div class="tool-title"> <h3 class="center">Education</h3></div>
                </a>
            @endif
        </div>
        <div class="col-md-3">
            @if($current_detail['table']['discretionary'] == 0)
                <div class="seed-pane seed-discretionary tool-pane hand"  onclick="$('#discretionaryAllocationModal').modal('show')">
                    <div class="seed-badge br-none"   >{{$currency}}{{ number_format($current_detail['table']['discretionary'], 2) }}</div>
                    <div class="tool-title"> <h3 class="center">Discretionary</h3></div>
                </div>
            @else
                <a class="seed-pane seed-discretionary tool-pane hand"  href="{{ route('seed.summary', 'discretionary') }}">
                    <div class="seed-badge br-none"   >{{$currency}}{{ number_format($current_detail['table']['discretionary'], 2) }}</div>
                    <div class="tool-title"> <h3 class="center">Discretionary</h3></div>
                </a>
            @endif
        </div>
    </div>

    <div class="row mt-4 mb-3">

        <div class="col-md-5 col-sm-12 sm-default">
            <div class="d-flex">
                <h3 class="bold mr-3">Total Spent: </h3>
                <span class="px-2 h3">{{$currency}}{{ number_format($current_detail['total_spent'], 2) }} </span>
            </div>
        </div>
        <div class="col-md-7 col-sm-12 sm-default">
            <div class="float-right">
                <div class="d-flex">
                    <h3 class="bold ml-3">Remaining Balance: </h3>
                    <span class="px-2 h3">{{$currency}}{{ number_format($current_seed->budget_amount - $current_detail['total_spent'], 2) }} </span>
                </div>
            </div>
        </div>
        <div class="col-12 mt-4">
            <p class="text-center text-muted font-italic">Click any of the tiles to view details or edit values </p>
        </div>
    </div>


    <script>
        function toggleBudgetMode(){
            $('#view_budget_amount').hide();
            $('#edit_budget_amount').show();
        }

        function handleBudgetChange(e){
            let allocation = document.querySelector('#allocation_available');
            let allocated = "<?php echo $current_detail['total']; ?>";
            allocation.innerText = (+e.value -  +allocated).toFixed(2);
        }

        let budgetForm = document.querySelector('#budgetForm');
        console.log(budgetForm);
        budgetForm.addEventListener("submit", handleBudgetSubmit);

        function handleBudgetSubmit(e){
            console.log(e);
            e.preventDefault();
            return false;
        }

    </script>
@endsection
