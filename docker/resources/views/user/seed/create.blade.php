@extends('layouts.user')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="text-center bolder">
                <p>{{ date('F')}} {{ date('Y')}}</p>
            </div>
        </div>
        <div class="col-md-5 col-sm-12 sm-default">
            <div class="d-flex">
                <h3 class="bold mr-3">My Budget:  </h3>
                <div id="view_budget_amount" ondblclick="toggleBudgetMode()">
                    <span class="px-2 h3">{{$currency}}{{ number_format($current_seed->budget_amount, 2) }} </span>
                    <span class="account_info info"  data-toggle="tooltip" data-placement="right" title="Here is an aggregation of all your cash account used for various purposes"><i class="fa fa-info mx-2 "></i></span>
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
                    <span class="px-2 h3">{{$currency}}{{ number_format($current_seed->budget_amount, 2) }} </span>
                </div>
               
            </div>
        </div>
    </div>
    @include('user.seed.modals.savings_allocation')
    @include('user.seed.modals.education_allocation')
    @include('user.seed.modals.discretionary_allocation')
    @include('user.seed.modals.savings_summary')
    @include('user.seed.modals.education_summary')
    <br><br>
    
    <div class="row  mt-5 mb-2">
        <div class="col-md-3">
            <div class="seed-pane seed-savings tool-pane hand"  onclick="$('#savingsSummaryModal').modal('show')">
                <button class="seed-badge br-none"  data-toggle="modal" data-target="#savingsAllocationModal" > {{$currency}}{{ number_format($current_detail['table']['savings'], 2) }} </button>
                <div class="tool-title"> <h3 class="center">Savings</h3></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="seed-pane seed-expenditure tool-pane hand" >
                <div class="seed-badge">{{$currency}}{{ number_format($current_detail['table']['expenditure'], 2) }}</div>
                <div class="tool-title"> <h3 class="center">Expenditure</h3></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="seed-pane seed-education tool-pane hand"  onclick="$('#educationSummaryModal').modal('show')">
                <button class="seed-badge br-none"  data-toggle="modal" data-target="#educationAllocationModal" >{{$currency}}{{ number_format($current_detail['table']['education'], 2) }}</button>
                <div class="tool-title"> <h3 class="center">Education</h3></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="seed-pane seed-discretionary tool-pane hand">
            <button class="seed-badge br-none"  data-toggle="modal" data-target="#discretionaryAllocationModal" >{{$currency}}{{ number_format($current_detail['table']['discretionary'], 2) }}</button>
                <div class="tool-title"> <h3 class="center">Discretionary</h3></div>
            </div>
        </div>
    </div>


    <script>
        function toggleBudgetMode(){
            $('#view_budget_amount').hide()
            $('#edit_budget_amount').show()
        }
    </script>
@endsection