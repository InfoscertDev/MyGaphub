@extends('layouts.user')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="disclaim text-center">
                <select onchange="window.location.assign('{{ route('seed.history') .'/' }}' + this.value)"
                    name="opportunities" class="select-opportunity date-history mt-2 text-center p-2" id="" class="mt-2">
                    @foreach($periods as $key => $month)
                        @if($period == $month)
                            <option value="{{$key}}" selected >  {{ date('M Y', strtotime($month))  }}  </option>
                        @else
                            <option value="{{$key}}" >  {{ date('M Y', strtotime($month))  }}  </option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <br> <br>
        <div class="col-md-12 col-sm-12 sm-default mt-3">
            <div class="d-flex">
                <h3 class="bold mr-2">
                    Total: {{$currency}}{{ number_format($monthly_seed['total'], 2) }}
                </h3>
                <div class="flex-end">
                    <h3 class="bold mr-2">
                        Total Spent: {{$currency}}{{ number_format($record_seed, 2) }}
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <br>

    <div class="row  mt-2 mb-2">
        <div class="col-md-3">
            <div class="seed-pane seed-savings tool-pane hand"  onclick="$('#savingsAllocationModal').modal('show')">
                <div class="tool-title">
                    <div class="center">
                        <h3  class="bold">Savings</h3>
                        <p>{{$currency}}{{ number_format($monthly_seed['seed']['savings'], 2) }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="seed-pane seed-expenditure tool-pane hand"  onclick="$('#expenditureAllocationModal').modal('show')">
                <div class="tool-title">
                    <div class="center">
                        <h3  class="bold">Expenditure</h3>
                        <p>{{$currency}}{{ number_format($monthly_seed['seed']['expenditure'], 2) }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="seed-pane seed-education tool-pane hand"  onclick="$('#educationAllocationModal').modal('show')">
                <div class="tool-title">
                    <div class="center">
                        <h3 class="bold">Education</h3>
                        <p>{{$currency}}{{ number_format($monthly_seed['seed']['education'], 2) }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="seed-pane seed-discretionary tool-pane hand"  onclick="$('#discretionaryAllocationModal').modal('show')">
                <div class="tool-title">
                    <div class="center">
                        <h3 class="bold">Discretionary</h3>
                        <p>{{$currency}}{{ number_format($monthly_seed['seed']['discretionary'], 2) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4 mb-3">
        <div class="col-12 mt-4">
            <p class="text-center text-muted font-italic">Click any of the tiles to view details or click here to view <a href="{{ route('seed.chart_history') }}"> charts</a>  </p>
        </div>
        <div class="col-12 mt-5 mx-auto text-center">
            @if($record_seed > $monthly_seed['total'] )
                <div>
                    <p>You were <span class="text-danger">{{$currency}}{{ number_format( ($record_seed - $monthly_seed['total']), 2) }}</span> over your budget</p>
                </div>
            @endif
            @if($monthly_seed['total'] > $record_seed)
                <div class="">
                    <i class="fa-light fa-face-worried"></i>
                    <p>You were <span class="text-success">{{$currency}}{{ number_format( ($monthly_seed['total'] - $record_seed), 2) }}</span> under your budget</p>
                </div>
            @endif
            @if($monthly_seed['total'] == $record_seed)
                <div class="">
                    <p>You were spot on with your budget</p>
                </div>
            @endif
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
