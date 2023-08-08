@extends('layouts.user')

@section('content')

    <div class="row">
        @if(count($periods))
            <div class="col-sm-12">
                <div class="disclaim text-center">
                    <select onchange="window.location.assign('{{ url()->current() .'/' }}' + this.value)"
                        name="opportunities" class="select-opportunity date-history mt-2 text-center p-2" id="" class="mt-2">
                        <option value="" selected>{{ date('M Y', strtotime( end($periods)  ))}} - {{ date('M Y', strtotime( reset($periods)  ))}}  </option>
                        @foreach($periods as $key => $period)
                            <option value="{{$key}}" >  {{ date('M Y', strtotime($period))  }}  </option>
                        @endforeach
                    </select>
                </div>
            </div>
        @endif
        <br> <br>
        <div class="col-md-5 col-sm-12 sm-default mt-3">
            <div class="d-flex">
                <h3 class="bold mr-2">
                    Total: {{$currency}}{{ number_format((float)$average_detail['total'], 2) }}
                </h3>
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
                        <p>{{$currency}}{{ number_format((float)$average_detail['table']['savings'], 2) }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="seed-pane seed-expenditure tool-pane hand"  onclick="$('#expenditureAllocationModal').modal('show')">
                <div class="tool-title">
                    <div class="center">
                        <h3  class="bold">Expenditure</h3>
                        <p>{{$currency}}{{ number_format((float)$average_detail['table']['expenditure'], 2) }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="seed-pane seed-education tool-pane hand"  onclick="$('#educationAllocationModal').modal('show')">
                <div class="tool-title">
                    <div class="center">
                        <h3 class="bold">Education</h3>
                        <p>{{$currency}}{{ number_format((float)$average_detail['table']['education'], 2) }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="seed-pane seed-discretionary tool-pane hand"  onclick="$('#discretionaryAllocationModal').modal('show')">
                <div class="tool-title">
                    <div class="center">
                        <h3 class="bold">Discretionary</h3>
                        <p>{{$currency}}{{ number_format((float)$average_detail['table']['discretionary'], 2) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4 mb-3">
        <div class="col-12 mt-4">
            <p class="text-center text-muted font-italic">
                @if(count($periods))  Click here to view <a href="{{ route('seed.chart_history') }}" class="text-muted text-underline"> charts</a> @endif
             </p>
             <!-- Click any of the tiles to view details or-->
        </div>
    </div>

@endsection
