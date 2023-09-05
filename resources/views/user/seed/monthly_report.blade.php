
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
                                @for ($i = 0; $i < 3; $i++)
                                    <a class="list-group-item"  style="color:inherit">
                                        <div class="d-flex mt-2 mb-1">
                                            <span class="box-identify box-savings"></span>
                                            <h5> Res</h5>
                                            <div class="d-flex flex-end flex-column">
                                                <h5 class="flex-end">{{$currency}}{{ number_format(4, 2) }}</h5>
                                            </div>

                                        </div>
                                        <div class="d-flex">
                                            <p   class="mb-1 ff-rob" style="margin-left: 36px;">
                                                {{$currency}}{{ number_format(2,2) }}  Actual
                                            </p >
                                            <p class="flex-end mr-3">Budget</p>
                                        </div>
                                    </a>
                                @endfor
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
                                @for ($i = 0; $i < 3; $i++)
                                    <a class="list-group-item"  style="color:inherit">
                                        <div class="d-flex mt-2 mb-1">
                                            <span class="box-identify box-expenditure"></span>
                                            <h5> Res</h5>
                                            <div class="d-flex flex-end flex-column">
                                                <h5 class="flex-end">{{$currency}}{{ number_format(4, 2) }}</h5>
                                            </div>

                                        </div>
                                        <div class="d-flex">
                                            <p   class="mb-1 ff-rob" style="margin-left: 36px;">
                                                {{$currency}}{{ number_format(2,2) }}  Actual
                                            </p >
                                            <p class="flex-end mr-3">Budget</p>
                                        </div>
                                    </a>
                                @endfor
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
                                @for ($i = 0; $i < 3; $i++)
                                    <a class="list-group-item"  style="color:inherit">
                                        <div class="d-flex mt-2 mb-1">
                                            <span class="box-identify box-education"></span>
                                            <h5> Res</h5>
                                            <div class="d-flex flex-end flex-column">
                                                <h5 class="flex-end">{{$currency}}{{ number_format(4, 2) }}</h5>
                                            </div>

                                        </div>
                                        <div class="d-flex">
                                            <p   class="mb-1 ff-rob" style="margin-left: 36px;">
                                                {{$currency}}{{ number_format(2,2) }}  Actual
                                            </p >
                                            <p class="flex-end mr-3">Budget</p>
                                        </div>
                                    </a>
                                @endfor
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
                                @for ($i = 0; $i < 3; $i++)
                                    <a class="list-group-item"  style="color:inherit">
                                        <div class="d-flex mt-2 mb-1">
                                            <span class="box-identify box-discretionary"></span>
                                            <h5> Res</h5>
                                            <div class="d-flex flex-end flex-column">
                                                <h5 class="flex-end">{{$currency}}{{ number_format(4, 2) }}</h5>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <p class="mb-1 ff-rob" style="margin-left: 36px;">
                                                {{$currency}}{{ number_format(2,2) }}  Actual
                                            </p >
                                            <p class="flex-end mr-3">Budget</p>
                                        </div>
                                    </a>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

