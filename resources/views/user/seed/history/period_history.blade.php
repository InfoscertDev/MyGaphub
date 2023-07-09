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
                    Total Budget: {{$currency}}{{ number_format($monthly_seed['total'], 2) }}
                </h3>
                <div class="flex-end">
                    <h3 class="bold mr-2">
                        Total Actual: {{$currency}}{{ number_format($record_seed, 2) }}
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
            @if($record_seed > $monthly_seed['total'] )
                <div>
                    <img src="{{  public_path('/images/happy_emoji.png') }}" width="50">
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="50" xml:space="preserve" style="shape-rendering:geometricPrecision;text-rendering:geometricPrecision;image-rendering:optimizeQuality;fill-rule:evenodd;clip-rule:evenodd"><defs><style>.fil1{fill:none}.fil2{fill:#5d4037}</style></defs><g id="Layer_x0020_1"><path d="M1024 255.999c424.155 0 768.001 343.845 768.001 768.001 0 424.155-343.845 768.001-768.001 768.001-424.155 0-768.001-343.845-768.001-768.001 0-424.155 343.845-768.001 768.001-768.001z" style="fill:#ffd54f"/><path class="fil1" d="M0 0h2048v2048H0z"/><path class="fil1" d="M255.999 255.999h1536v1536h-1536z"/><path class="fil2" d="M671.999 1472c0-466.721 704.001-459.773 704.001 0-19.963 20.573-41.394 19.094-64.002 0 0-376.196-575.998-381.858-575.998 0-21.334 23.243-42.667 27.004-64.001 0zM1205.65 628.666c68.236-52.244 131.978-49.06 192 0 21.87 31.21 21.034 52.168 0 64.002-54.056-62.455-116.209-74.044-192 0-17.244-19.267-17.358-40.584 0-64.002zM655.213 628.666c68.236-52.244 131.978-49.06 192 0 21.87 31.21 21.034 52.168 0 64.002-54.056-62.455-116.209-74.044-192 0-17.244-19.267-17.358-40.584 0-64.002zM752.77 760.57c38.903 0 70.439 31.537 70.439 70.44s-31.536 70.44-70.439 70.44c-38.904 0-70.44-31.537-70.44-70.44s31.536-70.44 70.44-70.44zM1295.23 760.57c38.903 0 70.439 31.537 70.439 70.44s-31.536 70.44-70.439 70.44c-38.904 0-70.44-31.537-70.44-70.44s31.536-70.44 70.44-70.44z"/></g></svg> -->
                    <p>You were <span class="text-danger">{{$currency}}{{ number_format( ($record_seed - $monthly_seed['total']), 2) }}</span> over your budget</p>
                </div>
            @endif
            @if($monthly_seed['total'] > $record_seed)
                <div class="">
                    <img src="{{  public_path() + '/images/happy_emoji.png' }}" width="50">
                    <svg xmlns="http://www.w3.org/2000/svg"  width="50" viewBox="0 0 48 48"><defs><style>.cls-2{fill:#273941}.cls-5{fill:#f6fafd}</style></defs><g id="_03-smile" data-name="03-smile"><circle cx="24" cy="24" r="23" style="fill:#ffce52"/><path class="cls-2" d="M24 39c-7.168 0-13-4.935-13-11h2c0 4.962 4.935 9 11 9s11-4.038 11-9h2c0 6.065-5.832 11-13 11zM20 21h-2c0-2.206-1.346-4-3-4s-3 1.794-3 4h-2c0-3.309 2.243-6 5-6s5 2.691 5 6zM38 21h-2c0-2.206-1.346-4-3-4s-3 1.794-3 4h-2c0-3.309 2.243-6 5-6s5 2.691 5 6z"/><path d="M24 4c12.15 0 22 8.507 22 19h.975a23 23 0 0 0-45.95 0H2C2 12.507 11.85 4 24 4z" style="fill:#ffe369"/><path d="M46 23c0 10.493-9.85 19-22 19S2 33.493 2 23h-.975c-.014.332-.025.665-.025 1a23 23 0 0 0 46 0c0-.335-.011-.668-.025-1z" style="fill:#ffb32b"/><ellipse class="cls-5" cx="37" cy="9" rx=".825" ry="1.148" transform="rotate(-45.02 37 9)"/><ellipse class="cls-5" cx="30.746" cy="4.5" rx=".413" ry=".574" transform="rotate(-45.02 30.745 4.5)"/><ellipse class="cls-5" cx="34" cy="7" rx="1.65" ry="2.297" transform="rotate(-45.02 34 7)"/></g></svg>
                    <p>You were <span class="text-success">{{$currency}}{{ number_format( ($monthly_seed['total'] - $record_seed), 2) }}</span> under your budget</p>
                </div>
            @endif
            @if($monthly_seed['total'] == $record_seed)
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg"  width="50" viewBox="0 0 48 48"><defs><style>.cls-2{fill:#273941}.cls-5{fill:#f6fafd}</style></defs><g id="_03-smile" data-name="03-smile"><circle cx="24" cy="24" r="23" style="fill:#ffce52"/><path class="cls-2" d="M24 39c-7.168 0-13-4.935-13-11h2c0 4.962 4.935 9 11 9s11-4.038 11-9h2c0 6.065-5.832 11-13 11zM20 21h-2c0-2.206-1.346-4-3-4s-3 1.794-3 4h-2c0-3.309 2.243-6 5-6s5 2.691 5 6zM38 21h-2c0-2.206-1.346-4-3-4s-3 1.794-3 4h-2c0-3.309 2.243-6 5-6s5 2.691 5 6z"/><path d="M24 4c12.15 0 22 8.507 22 19h.975a23 23 0 0 0-45.95 0H2C2 12.507 11.85 4 24 4z" style="fill:#ffe369"/><path d="M46 23c0 10.493-9.85 19-22 19S2 33.493 2 23h-.975c-.014.332-.025.665-.025 1a23 23 0 0 0 46 0c0-.335-.011-.668-.025-1z" style="fill:#ffb32b"/><ellipse class="cls-5" cx="37" cy="9" rx=".825" ry="1.148" transform="rotate(-45.02 37 9)"/><ellipse class="cls-5" cx="30.746" cy="4.5" rx=".413" ry=".574" transform="rotate(-45.02 30.745 4.5)"/><ellipse class="cls-5" cx="34" cy="7" rx="1.65" ry="2.297" transform="rotate(-45.02 34 7)"/></g></svg>
                    <p>You were spot on with your budget</p>
                </div>
            @endif
        </div>
    </div>
@endsection
