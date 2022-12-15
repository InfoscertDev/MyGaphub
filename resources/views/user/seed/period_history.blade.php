@extends('layouts.user')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="text-center bolder">
                <h4>{{ date('F')}} {{ date('Y')}}</h4>
            </div>
        </div>
        <br> <br>
        <div class="col-md-5 col-sm-12 sm-default mt-3">
            <div class="d-flex">
                <h3 class="bold mr-2">
                    Budget
                </h3>
                <div id="view_budget_amount"   onclick="toggleBudgetMode()">
                    <span class="px-2 h3">{{$currency}}<span id="budget_amount">{{ number_format($current_seed->budget_amount, 2) }}</span>  </span>
                </div>
            </div>
        </div>
    </div>
    <br>

    <div class="row  mt-2 mb-2">
        <div class="col-md-3">
            <div class="seed-pane seed-savings tool-pane hand"  onclick="$('#savingsAllocationModal').modal('show')">
                <!-- <div class="seed-badge br-none"    > {{$currency}}{{ number_format($current_detail['table']['savings'], 2) }} </div> -->
                <div class="tool-title">
                    <div class="center">
                        <h3  class="bold">Savings</h3>
                        <p>{{$currency}}{{ number_format($current_detail['table']['savings'], 2) }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="seed-pane seed-expenditure tool-pane hand"  onclick="$('#expenditureAllocationModal').modal('show')">
                <div class="tool-title">
                    <div class="center">
                        <h3  class="bold">Expenditure</h3>
                        <p>{{$currency}}{{ number_format($current_detail['table']['expenditure'], 2) }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="seed-pane seed-education tool-pane hand"  onclick="$('#educationAllocationModal').modal('show')">
                <div class="tool-title">
                    <div class="center">
                        <h3 class="bold">Education</h3>
                        <p>{{$currency}}{{ number_format($current_detail['table']['education'], 2) }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="seed-pane seed-discretionary tool-pane hand"  onclick="$('#discretionaryAllocationModal').modal('show')">
                <div class="tool-title">
                    <div class="center">
                        <h3 class="bold">Discretionary</h3>
                        <p>{{$currency}}{{ number_format($current_detail['table']['discretionary'], 2) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4 mb-3">
        <div class="col-12 mt-4">
            <p class="text-center text-muted font-italic">Click any of the tiles to view details or click here to view <a href="{{ route('seed.chart_history') }}"> charts</a>  </p>
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

    </script>
@endsection
