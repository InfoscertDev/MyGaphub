
@extends('layouts.user')


@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <span class="mr-3 pb-2" id="goback">
                <a href="{{ route('seed.periodic_history', ['period' => $period] ) }}"
                            class="text-dark" ><i class="fa fa-chevron-left mr-1"></i> Back
                </a>
            </span>
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
        <div class="col-12 mt-3 p-4">
            <div class="col-md-12 col-sm-12 sm-default my-3">
                <div class="d-flex">
                    <h3 class="bold mr-2">
                        Total Budget: {{$currency}}{{ number_format(($total_budget), 2) }}
                    </h3>
                    <div class="flex-end">
                        <h3 class="bold mr-2">Total Actual: {{$currency}}{{ number_format(($total_actual), 2) }} </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="summary-card">
                        <div class="summary-header">
                            <div class="summary-card-header seed-savings">
                                <h4 class="summary-card-title">Savings Report</h4>
                            </div>
                        </div>
                        <div class="summary-card-body">
                            <div class="list-group">
                                @foreach ($savings_allocations as $allocation)
                                    <a class="list-group-item"  style="color:inherit">
                                        <div class="d-flex mt-2 mb-1">
                                            <span class="box-identify box-savings"></span>
                                            <h5>  {{$allocation->label}}</h5>
                                            <div class="d-flex flex-end flex-column">
                                                <h5 class="flex-end">{{$currency}}{{ number_format($allocation->amount, 2) }}</h5>
                                            </div>

                                        </div>
                                        <div class="d-flex">
                                            <p   class="mb-1 ff-rob" style="margin-left: 36px;">
                                                {{$currency}}{{ number_format($allocation->actual,2) }}  Actual
                                            </p >
                                            <p class="flex-end mr-3">Budget</p>
                                        </div>
                                    </a>
                                @endforeach
                                <a class="mt-3 mr-3 text-right text-underline text-dark text-italics"  href="{{ route('seed.periodic_history_report', [$period, 'savings']) }}">View More</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="summary-card">
                        <div class="summary-header">
                            <div class="summary-card-header seed-expenditure">
                                <h4 class="summary-card-title">expenditure Report</h4>
                            </div>
                        </div>
                        <div class="summary-card-body">
                            <div class="list-group">
                                @foreach ($expenditure_allocations as $allocation)
                                    <a class="list-group-item"  style="color:inherit">
                                        <div class="d-flex mt-2 mb-1">
                                            <span class="box-identify box-expenditure"></span>
                                            <h5>  {{$allocation->label}}</h5>
                                            <div class="d-flex flex-end flex-column">
                                                <h5 class="flex-end">{{$currency}}{{ number_format($allocation->amount, 2) }}</h5>
                                            </div>

                                        </div>
                                        <div class="d-flex">
                                            <p   class="mb-1 ff-rob" style="margin-left: 36px;">
                                                {{$currency}}{{ number_format($allocation->actual,2) }}  Actual
                                            </p >
                                            <p class="flex-end mr-3">Budget</p>
                                        </div>
                                    </a>
                                @endforeach
                                <a class="mt-3 mr-3 text-right text-underline text-dark text-italics"  href="{{ route('seed.periodic_history_report', [$period, 'expenditure']) }}">View More</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="summary-card">
                        <div class="summary-header">
                            <div class="summary-card-header seed-education">
                                <h4 class="summary-card-title">education Report</h4>
                            </div>
                        </div>
                        <div class="summary-card-body">
                            <div class="list-group">
                                @foreach ($education_allocations as $allocation)
                                    <a class="list-group-item"  style="color:inherit">
                                        <div class="d-flex mt-2 mb-1">
                                            <span class="box-identify box-education"></span>
                                            <h5>  {{$allocation->label}}</h5>
                                            <div class="d-flex flex-end flex-column">
                                                <h5 class="flex-end">{{$currency}}{{ number_format($allocation->amount, 2) }}</h5>
                                            </div>

                                        </div>
                                        <div class="d-flex">
                                            <p   class="mb-1 ff-rob" style="margin-left: 36px;">
                                                {{$currency}}{{ number_format($allocation->actual,2) }}  Actual
                                            </p >
                                            <p class="flex-end mr-3">Budget</p>
                                        </div>
                                    </a>
                                @endforeach
                                <a class="mt-3 mr-3 text-right text-underline text-dark text-italics"  href="{{ route('seed.periodic_history_report', [$period, 'education']) }}">View More</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="summary-card">
                        <div class="summary-header">
                            <div class="summary-card-header seed-discretionary">
                                <h4 class="summary-card-title">discretionary Report</h4>
                            </div>
                        </div>
                        <div class="summary-card-body">
                            <div class="list-group">
                                @foreach ($discretionary_allocations as $allocation)
                                    <a class="list-group-item"  style="color:inherit">
                                        <div class="d-flex mt-2 mb-1">
                                            <span class="box-identify box-discretionary"></span>
                                            <h5>  {{$allocation->label}}</h5>
                                            <div class="d-flex flex-end flex-column">
                                                <h5 class="flex-end">{{$currency}}{{ number_format($allocation->amount, 2) }}</h5>
                                            </div>

                                        </div>
                                        <div class="d-flex">
                                            <p   class="mb-1 ff-rob" style="margin-left: 36px;">
                                                {{$currency}}{{ number_format($allocation->actual,2) }}  Actual
                                            </p >
                                            <p class="flex-end mr-3">Budget</p>
                                        </div>
                                    </a>
                                @endforeach
                                <a class="mt-3 mr-3 text-right text-underline text-dark text-italics"  href="{{ route('seed.periodic_history_report', [$period, 'discretionary']) }}">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

