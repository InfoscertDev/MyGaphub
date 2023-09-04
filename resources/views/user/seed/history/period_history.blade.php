@extends('layouts.user')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="disclaim text-center">
                <select onchange="window.location.assign(this.value)"
                    name="opportunities" class="select-opportunity date-history mt-2 text-center p-2" id="" class="mt-2">
                    @foreach($periods as $key => $month)
                        @if($period == $month)
                            <option value="{{ route('seed.periodic_history',[$key] )  }}" selected >  {{ date('M Y', strtotime($month))  }}  </option>
                        @else
                            <option value="{{  route('seed.periodic_history',[$key] )}}" >  {{ date('M Y', strtotime($month))  }}  </option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <br> <br>
        <div class="col-md-12 col-sm-12 sm-default mt-3">
            <div class="d-flex">
                <h3 class="bold mr-2">
                    Total Budget: {{$currency}}{{ number_format($monthly_seed['total'], 2) }}
                </h3>
                <div class="flex-end">
                    <h3 class="bold mr-2">
                        Total Actual: {{$currency}}{{ number_format($total_actual, 2) }}
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <br>

    <div class="row  mt-2 mb-2">
        <div class="col-md-3">
            <a href="{{ route('seed.periodic_history_report', [$period, 'savings'])  }}" class="seed-pane seed-savings tool-pane hand">
                <div class="tool-title">
                    <div class="center">
                        <h3  class="bold">Savings</h3>
                        <p>{{$currency}}{{ number_format($monthly_seed['seed']['savings'], 2) }}</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('seed.periodic_history_report', [$period, 'expenditure'])  }}" class="seed-pane seed-expenditure tool-pane hand"  onclick="$('#expenditureAllocationModal').modal('show')">
                <div class="tool-title">
                    <div class="center">
                        <h3  class="bold">Expenditure</h3>
                        <p>{{$currency}}{{ number_format($monthly_seed['seed']['expenditure'], 2) }}</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('seed.periodic_history_report', [$period, 'education'])  }}" class="seed-pane seed-education tool-pane hand" >
                <div class="tool-title">
                    <div class="center">
                        <h3 class="bold">Education</h3>
                        <p>{{$currency}}{{ number_format($monthly_seed['seed']['education'], 2) }}</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('seed.periodic_history_report', [$period, 'discretionary'])  }}" class="seed-pane seed-discretionary tool-pane hand" >
                <div class="tool-title">
                    <div class="center">
                        <h3 class="bold">Discretionary</h3>
                        <p>{{$currency}}{{ number_format($monthly_seed['seed']['discretionary'], 2) }}</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row mt-4 mb-3">
        <div class="col-12 mt-4">
            <p class="text-center text-muted font-italic">Click any of the tiles to view details or click here to view <a href="{{ route('seed.chart_history') }}"> charts</a>  </p>
        </div>
        <div class="col-12 mt-5 mx-auto text-center">
            @if($total_actual > $monthly_seed['total'] )
                <div>
                    <img src="{{  asset('/assets/icon/sad_emoji.png') }}" width="90">
                    <p>You were <span class="text-danger">{{$currency}}{{ number_format( ($total_actual - $monthly_seed['total']), 2) }}</span> over your budget</p>
                </div>
            @endif
            @if($monthly_seed['total'] > $total_actual)
                <div class="">
                    <img src="{{  asset('/assets/icon/happy_emoji.png') }}" width="90">
                     <p>You were <span class="text-success">{{$currency}}{{ number_format( ($monthly_seed['total'] - $total_actual), 2) }}</span> under your budget</p>
                </div>
            @endif
            @if($monthly_seed['total'] == $total_actual)
                <div class="">
                    <img src="{{  asset('/assets/icon/smile-emoji.png') }}" width="90">
                    <p>You were spot on with your budget</p>
                </div>
            @endif



        </div>
    </div>
@endsection
