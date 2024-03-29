@extends('layouts.user')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="text-center bolder">
                <h3>{{ date('F Y',  strtotime("+1 month")) }}</h3>
            </div>
        </div>
        <br>
        <div class="col-md-5 col-sm-12 sm-default">
            <div class="d-flex">
                <h3 class="bold mr-2">
                    {{ ($target_seed->budget_amount == 0) ? 'Set Budget:' : 'My Budget:'}}
                </h3>
                <div id="view_budget_amount"   onclick="toggleBudgetMode()">
                    <span class="px-2 h3">{{$currency}}<span id="budget_amount">{{ number_format($target_seed->budget_amount, 2) }}</span>  </span>
                    <span class="account_info info"  data-toggle="tooltip" data-placement="right" title="Click to edit"><i class="fa fa-info mx-2 "></i></span>

                    <img class="img img-responsive" id="warning-icon" style="display: none; position: relative; top: -10px; width: 25px;" src="{{ asset('/assets/icon/warning.svg')}}" alt="">

                </div>
                <div id="edit_budget_amount" style="display: none;">
                    <form action="{{ route('seed.store.set_budget')  }}" method="post" id="budgetForm">
                        @csrf
                        @if(session('alert')) <input type="hidden" name="seed" value="ediucfhjbndcfjnkdcknj" />  @endif
                        <input type="hidden" name="period" value="ediucfhjbndcfjnkdcknj" />
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"> {{$currency}}</div>
                            </div>
                            <input type="number" onmouseleave="handleSeedBudget(this)" oninput="handleBudgetChange(this)" name="budget" min="0"
                                step=".01" value="{{ old('budget',$target_seed->budget_amount) }}" class="form-control">
                        </div>
                    </form>
                </div>
            </div>
            <p id="warning-error" class="text-center small" style="display: none;"></p>
            @if(session('alert'))
                <p class="text-center small">Your set amount is lower than the sum of your allocated SEED, reduce any of your allocated SEED to accommodate this reduction</p>
                <script>
                    $('#warning-icon').show();
                </script>
            @endif
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
            @if($target_detail['table']['savings'] == 0)
                <div class="seed-pane seed-savings tool-pane hand"  onclick="$('#savingsAllocationModal').modal('show')">
                    <div class="tool-title">
                        <div class="center">
                            <h3  class="bold">Savings</h3>
                            <p>{{$currency}}{{ number_format($target_detail['table']['savings'], 2) }}</p>
                        </div>
                    </div>
                </div>
            @else
                <a class="seed-pane seed-savings tool-pane hand" href="{{ route('seed.summary', ['savings','budget' => 'seed_future_budget']) }}">
                    <div class="tool-title">
                        <div class="center">
                            <h3  class="bold">Savings</h3>
                            <p>{{$currency}}{{ number_format($target_detail['table']['savings'], 2) }}</p>
                        </div>
                    </div>
                </a>
            @endif
        </div>
        <div class="col-md-3">
            @if($target_detail['table']['expenditure'] == 0)
                <div class="seed-pane seed-expenditure tool-pane hand"  onclick="$('#expenditureAllocationModal').modal('show')">
                    <div class="tool-title">
                        <div class="center">
                            <h3  class="bold">Expenditure</h3>
                            <p>{{$currency}}{{ number_format($target_detail['table']['expenditure'], 2) }}</p>
                        </div>
                    </div>
                </div>
            @else
                <a class="seed-pane seed-expenditure tool-pane hand" href="{{ route('seed.summary', ['expenditure','budget' => 'seed_future_budget']) }}">
                    <div class="tool-title">
                        <div class="center">
                            <h3  class="bold">Expenditure</h3>
                            <p>{{$currency}}{{ number_format($target_detail['table']['expenditure'], 2) }}</p>
                        </div>
                    </div>
                </a>
            @endif
        </div>
        <div class="col-md-3">
            @if($target_detail['table']['education'] == 0)
                <div class="seed-pane seed-education tool-pane hand"  onclick="$('#educationAllocationModal').modal('show')">
                    <div class="tool-title">
                        <div class="center">
                            <h3 class="bold">Education</h3>
                            <p>{{$currency}}{{ number_format($target_detail['table']['education'], 2) }}</p>
                        </div>
                    </div>
                </div>
            @else
                <a class="seed-pane seed-education tool-pane hand"   href="{{ route('seed.summary', ['education','budget' => 'seed_future_budget']) }}">
                    <div class="tool-title">
                        <div class="center">
                            <h3 class="bold">Education</h3>
                            <p>{{$currency}}{{ number_format($target_detail['table']['education'], 2) }}</p>
                        </div>
                    </div>
                </a>
            @endif
        </div>
        <div class="col-md-3">
            @if($target_detail['table']['discretionary'] == 0)
                <div class="seed-pane seed-discretionary tool-pane hand"  onclick="$('#discretionaryAllocationModal').modal('show')">
                    <div class="tool-title">
                        <div class="center">
                            <h3 class="bold">Discretionary</h3>
                            <p>{{$currency}}{{ number_format($target_detail['table']['discretionary'], 2) }}</p>
                        </div>
                    </div>
                </div>
            @else
                <a class="seed-pane seed-discretionary tool-pane hand"  href="{{ route('seed.summary',['discretionary','budget' => 'seed_future_budget']) }}">
                    <div class="tool-title">
                        <div class="center">
                            <h3 class="bold">Discretionary</h3>
                            <p>{{$currency}}{{ number_format($target_detail['table']['discretionary'], 2) }}</p>
                        </div>
                    </div>
                </a>
            @endif
        </div>
    </div>

    <div class="row mt-4 mb-3">

        <div class="col-md-5 col-sm-12 sm-default">
            <div class="d-flex">
                <h3 class="bold mr-3">Total Spent: </h3>
                <span class="px-2 h3">{{$currency}}{{ number_format($target_detail['total_spent'], 2) }} </span>
            </div>
        </div>
        <div class="col-md-7 col-sm-12 sm-default">
            <div class="float-right">
                <div class="d-flex">
                    <h3 class="bold ml-3">Remaining Balance: </h3>
                    <span class="px-2 h3">{{$currency}}{{ number_format($target_seed->budget_amount - $target_detail['total_spent'], 2) }} </span>
                </div>
            </div>
        </div>
        <div class="col-12 mt-4">
            <p class="text-center text-muted font-italic">Click any of the tiles to view details or edit values </p>
        </div>
    </div>


    <script>
        let viewmode = false;
        function toggleBudgetMode(){
            if(viewmode){
                $('#view_budget_amount').show();
                $('#edit_budget_amount').hide();
            }else{
                $('#view_budget_amount').hide();
                $('#edit_budget_amount').show();
            }
            viewmode = !viewmode
        }

        function handleSeedBudget(e){
            var actionUrl = $('#budgetForm').attr('action');
            var fd = new FormData($('#budgetForm')[0]);
            // console.log(actionUrl, fd);

            $.ajax({
                type: 'POST',
                url: actionUrl,
                data: fd,
                processData: false,
                contentType: false,
                // contentType: "application/json",
                success: function(data, status){
                    $('#budget_amount').text(new Number(e.value).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
                    if(data.status) toggleBudgetMode()
                },
                error: function (request, status, error) {
                    toggleBudgetMode()
                    // console.log(status, error)
                    // alert(request.responseText);
                }
            });
        }

        function handleBudgetChange(e){
            let allocation = document.querySelector('#allocation_available');
            let allocated = "<?php echo $target_detail['total']; ?>";
            let balance = (+e.value -  +allocated)
            allocation.innerText = balance.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');

            if(+balance >= 0){
                $('#warning-icon').hide();
                $('#warning-error').hide();
            }else{
                $('#warning-icon').show();
                $('#warning-error').text('Your set amount is lower than the sum of your allocated SEED, reduce any of your allocated SEED to accommodate this reduction');
                $('#warning-error').show();

            }
        }

        let budgetForm = document.querySelector('#budgetForm');
        budgetForm.addEventListener("submit", handleBudgetSubmit);

        function handleBudgetSubmit(e){
            e.preventDefault();
            return false;
        }

    </script>
@endsection
