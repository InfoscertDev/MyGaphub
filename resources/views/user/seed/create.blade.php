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
                <div id="view_budget_amount" ondblclick="toggleBudgetMode()">
                    <span class="px-2 h3">{{$currency}}{{ number_format($current_seed->budget_amount, 2) }} </span>
                    <span class="account_info info"  data-toggle="tooltip" data-placement="right" title="Double click to edit"><i class="fa fa-info mx-2 "></i></span>
                </div>
                <div id="edit_budget_amount" style="display: none;">
                    <form action="{{ route('seed.store.set_budget')  }}" method="post">
                        @csrf
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"> {{$currency}}</div>
                            </div>
                            <input type="number" name="budget" min="0" value="{{$current_seed->budget_amount}}" class="form-control">
                        </div>
                        <!-- <input type="submit" value=""> -->
                    </form>
                </div>

            </div>
        </div>
        <div class="col-md-7 col-sm-12 sm-default">
            <div class="float-right">
                <div class="d-flex">
                    <h3 class="bold ml-3">Available for Allocation: </h3>
                    <span class="px-2 h3">{{$currency}}{{ number_format($available_allocation, 2) }} </span>
                </div>
            </div>
        </div>
    </div>
    @include('user.seed.modals.savings_allocation')
    @include('user.seed.modals.education_allocation')
    @include('user.seed.modals.discretionary_allocation')
    @include('user.seed.modals.expenditure_allocation')

    @include('user.seed.summary.savings_summary')
    @include('user.seed.summary.education_summary')

    @include('user.seed.edit_allocation')
    <br><br>

    <div class="row  mt-5 mb-2">
        <div class="col-md-3">
            <div class="seed-pane seed-savings tool-pane hand"  onclick="$('#savingsSummaryModal').modal('show')">
                <div class="seed-badge br-none"    > {{$currency}}{{ number_format($current_detail['table']['savings'], 2) }} </div>
                <div class="tool-title"> <h3 class="center">Savings</h3></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="seed-pane seed-expenditure tool-pane hand"  onclick="$('#expenditureAllocationModal').modal('show')">
                <div class="seed-badge">{{$currency}}{{ number_format($current_detail['table']['expenditure'], 2) }}</div>
                <div class="tool-title"> <h3 class="center">Expenditure</h3></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="seed-pane seed-education tool-pane hand"  onclick="$('#educationSummaryModal').modal('show')">
                <div class="seed-badge br-none"  >{{$currency}}{{ number_format($current_detail['table']['education'], 2) }}</div>
                <div class="tool-title"> <h3 class="center">Education</h3></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="seed-pane seed-discretionary tool-pane hand"  onclick="$('#discretionaryAllocationModal').modal('show')">
                <div class="seed-badge br-none"   >{{$currency}}{{ number_format($current_detail['table']['discretionary'], 2) }}</div>
                <div class="tool-title"> <h3 class="center">Discretionary</h3></div>
            </div>
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
            $('#view_budget_amount').hide()
            $('#edit_budget_amount').show()
        }

        function handleAllocationEdit(e){
            console.log(e);
            let id = e.value;

            var url = `{{ route('seed.store.allocation')  }}`
            console.log( url+'/'+id)
            $.ajax({
                type: 'GET',
                url: '/home/seed/allocate/'+id,
                success: function(data, status){
                    let allocation = data.data;
                    if(allocation){
                        $('#edit_allocation').attr('action', url+'/'+id)
                        $('span.seed_category').html(allocation.seed_category);
                        $('#edit_label').val(allocation.label)
                        $('#edit_amount').val(allocation.amount)
                        $('#edit_note').val(allocation.note)
                        $('#editAssetAllocationModal').modal('show');
                    }
                },
                error: function (request, status, error) {
                    // console.log(status, error)
                    // alert(request.responseText);
                }
            });
        }
    </script>
@endsection
