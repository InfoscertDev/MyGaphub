@extends('layouts.user')

@section('script')
<script>
    const user_currency = "<?php echo $currency ?>";
    const incomes =   <?php echo json_encode($incomes) ?>;
</script>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="text-center bolder">
                <h3>{{ date('F')}} {{ date('Y')}}</h3>
            </div>
        </div>
        <br>
        <div class="col-md-5 col-sm-12 sm-default">
            <div class="d-flex">
                <h3 class="bold mr-2">
                    {{ ($current_seed->budget_amount == 0) ? 'Set Budget:' : 'My Budget:'}}
                </h3>
                <div id="view_budget_amount"   onclick="toggleBudgetMode()">
                    <span class="px-2 h3">{{$currency}}<span id="budget_amount">{{ number_format($current_seed->budget_amount, 2) }}</span>  </span>
                    <span class="account_info info"  data-toggle="tooltip" data-placement="right" title="Click to edit"><i class="fa fa-info mx-2 "></i></span>

                    <img class="img img-responsive" id="warning-icon" style="display: none; position: relative; top: -10px; width: 25px;" src="{{ asset('/assets/icon/warning.svg')}}" alt="">

                </div>
                <div id="edit_budget_amount" style="display: none;">
                    <form action="{{ route('seed.store.set_budget')  }}" method="post" id="budgetForm">
                        @csrf
                        @if(session('alert')) <input type="hidden" name="seed" value="ediucfhjbndcfjnkdcknj" />  @endif

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"> {{$currency}}</div>
                            </div>
                            <input type="number" onmouseleave="handleSeedBudget(this)" oninput="handleBudgetChange(this)" name="budget" min="0"
                                step=".01" value="{{ old('budget',$current_seed->budget_amount) }}" class="form-control">
                        </div>
                    </form>
                </div>
            </div>
            <p>
                <svg xmlns="http://www.w3.org/2000/svg" height="1.4em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#512e1f}</style><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm79 143c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/></svg>
                <span class="text-underline" onclick="$('#incomeAllocationModal').modal('show')">Assign Income channels</span>
            </p>
            <p id="warning-error" class="text-center small" style="display: none;"></p>
            @if(session('alert'))
                <p class="text-center small">Your set amount is lower than the sum of your allocated SEED, reduce any of your allocated SEED to accommodate this reduction</p>

                <!-- <div class="modal" id="budgetAlertMode" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-hidden="true">
                    <div class="modal-dialog  modal-dialog-centered" role="document">
                        <div class="modal-content modal-content-centre b-rad-20">
                            <div class="modal-body">
                                <div class="py-4">
                                    <ul class="list-group list-group-flush cash-tiles portfolio-tiles">
                                        <li class="list-group-item my-2 text-center"> <a href="{{route('seed', ['record' =>'sjhdbcfnkdmffgcyu' ]) }}" class="card-link text-white"> Yes</a> </li>
                                        <li class="btn list-group-item my-2 text-center"><a href="{{ route('seed') }}" class="card-link text-white">No</a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="modal-content">
                            <div class="modal-body mt-3">
                                <h5 class="text-center">Your set amount is lower than the sum of your allocated SEED, would you like to proceed with the new budget amount? </h5>
                            </div>

                            <div class="modal-footer mx-auto mb-3 mt-2">
                                <div class="text-left">
                                    <button type="submit" onclick="$('#budgetForm').submit()"  class="btn btn-pry px-3 mr-3">Yes</button>
                                </div>
                                <div class="text-right">
                                    <button type="button" onclick="window.location.reload()" class="btn btn-default px-3 mr-3">No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  $(function() {  $('#budgetAlertMode').modal('show'); })-->
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

    @include('user.seed.modals.assign_income')
    @include('user.seed.modals.savings_allocation')
    @include('user.seed.modals.education_allocation')
    @include('user.seed.modals.discretionary_allocation')
    @include('user.seed.modals.expenditure_allocation')

    <br><br>

    <div class="row  mt-5 mb-2">
        <div class="col-md-3">
            @if($current_detail['table']['savings'] == 0)
                <div class="seed-pane seed-savings tool-pane hand"  onclick="$('#savingsAllocationModal').modal('show')">
                  <div class="tool-title">
                        <div class="center">
                            <h3  class="bold">Savings</h3>
                            <p>{{$currency}}{{ number_format($current_detail['table']['savings'], 2) }}</p>
                        </div>
                    </div>
                </div>
            @else
                <a class="seed-pane seed-savings tool-pane hand" href="{{ route('seed.summary', 'savings') }}">
                  <div class="tool-title">
                        <div class="center">
                            <h3  class="bold">Savings</h3>
                            <p>{{$currency}}{{ number_format($current_detail['table']['savings'], 2) }}</p>
                        </div>
                    </div>
                </a>
            @endif
        </div>
        <div class="col-md-3">
            @if($current_detail['table']['expenditure'] == 0)
                <div class="seed-pane seed-expenditure tool-pane hand"  onclick="$('#expenditureAllocationModal').modal('show')">
                    <div class="tool-title">
                        <div class="center">
                            <h3  class="bold">Expenditure</h3>
                            <p>{{$currency}}{{ number_format($current_detail['table']['expenditure'], 2) }}</p>
                        </div>
                    </div>
                </div>
            @else
                <a class="seed-pane seed-expenditure tool-pane hand" href="{{ route('seed.summary', 'expenditure') }}">
                    <div class="tool-title">
                        <div class="center">
                            <h3  class="bold">Expenditure</h3>
                            <p>{{$currency}}{{ number_format($current_detail['table']['expenditure'], 2) }}</p>
                        </div>
                    </div>
                </a>
            @endif
        </div>
        <div class="col-md-3">
            @if($current_detail['table']['education'] == 0)
                <div class="seed-pane seed-education tool-pane hand"  onclick="$('#educationAllocationModal').modal('show')">
                    <div class="tool-title">
                        <div class="center">
                            <h3 class="bold">Education</h3>
                            <p>{{$currency}}{{ number_format($current_detail['table']['education'], 2) }}</p>
                        </div>
                    </div>
                </div>
            @else
                <a class="seed-pane seed-education tool-pane hand"   href="{{ route('seed.summary', 'education') }}">
    <div class="tool-title"> <h3 class="center">Education</h3></div> -
                    <div class="tool-title">
                        <div class="center">
                            <h3 class="bold">Education</h3>
                            <p>{{$currency}}{{ number_format($current_detail['table']['education'], 2) }}</p>
                        </div>
                    </div>
                </a>
            @endif
        </div>
        <div class="col-md-3">
            @if($current_detail['table']['discretionary'] == 0)
                <div class="seed-pane seed-discretionary tool-pane hand"  onclick="$('#discretionaryAllocationModal').modal('show')">
                    <div class="tool-title">
                        <div class="center">
                            <h3 class="bold">Discretionary</h3>
                            <p>{{$currency}}{{ number_format($current_detail['table']['discretionary'], 2) }}</p>
                        </div>
                    </div>
                </div>
            @else
                <a class="seed-pane seed-discretionary tool-pane hand"  href="{{ route('seed.summary', 'discretionary') }}">
                    <div class="tool-title">
                        <div class="center">
                            <h3 class="bold">Discretionary</h3>
                            <p>{{$currency}}{{ number_format($current_detail['table']['discretionary'], 2) }}</p>
                        </div>
                    </div>
                </a>
            @endif
        </div>
    </div>

    <div class="row mt-4 mb-3">

        <div class="col-md-5 col-sm-12 sm-default">
            <div class="d-flex">
                <h3 class="bold mr-3">Total Actual: </h3>
                <span class="px-2 h3">{{$currency}}{{ number_format($current_detail['total_spent'], 2) }} </span>
            </div>
        </div>
        <div class="col-md-7 col-sm-12 sm-default">
            <div class="float-right">
                <div class="d-flex">
                    <h3 class="bold ml-3">Remaining Balance: </h3>
                    <span class="px-2 h3">{{$currency}}{{ number_format($current_detail['total'] - $current_detail['total_spent'], 2) }} </span>
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
            let allocated = "<?php echo $current_detail['total']; ?>";
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
