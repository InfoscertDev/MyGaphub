
@extends('layouts.user')

@section('content')
    @php
        function filterExpenditure($value){
            if($value == 'family'){
                $value = 'Home & Family';
            }else if ($value == 'debt_repayment') {
                $value = 'Debt Repayment';
            }else if($value){
            $value = ucfirst($value);
            }
            return $value;
        }
    @endphp
    <div class="row justify-content-center">
        <div class="col-12">
            <span class="mr-3 pb-2" id="goback">
                @if( str_contains(url()->full(), 'future') )
                    <a href="{{ str_contains(Request::path(), 'expenditure') ?  route('seed.summary', ['expenditure','budget' => 'seed_future_budget']): route('seed.future') }}"
                                class="text-dark" ><i class="fa fa-chevron-left mr-1"></i> Back</a>
                @else
                    <a href="{{ str_contains(Request::path(), 'expenditure') ?  route('seed.summary', 'expenditure') : route('seed.create') }}"
                                class="text-dark" ><i class="fa fa-chevron-left mr-1"></i> Back</a>
                @endif
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
        <div class="col-12 my-4">
            <div class="d-flex">
            </div>
            <div class="summary-card">
                <div class="summary-header bg-gray">
                    <div class="summary-card-header seed-{{$seed}}">
                        @if(isset($category))
                            <h4 class="summary-card-title">{{filterExpenditure($category)}}</h4>
                        @else
                            <h4 class="summary-card-title">{{$seed}} Report</h4>
                        @endif
                    </div>
                </div>
                <div class="summary-card-body">

                    <div class="list-group">
                        @foreach($allocations as $allocation)
                            <div class="list-group-item" data-allocation="{{$allocation->id}}" onclick="handleAllocationView(this)">
                                <div class="d-flex mt-2 mb-1">
                                    <span class="box-identify box-{{$seed}}"></span>
                                    <h5> {{$allocation->label}}</h5>
                                    <div class="d-flex flex-end flex-column">
                                        <h5 class="flex-end">{{$currency}}{{ number_format($allocation->amount, 2) }}</h5>
                                    </div>

                                </div>
                                <div class="d-flex">
                                    <p class="mb-1 ff-rob" style="margin-left: 36px;">
                                        {{$currency}}{{ number_format($allocation->actual,2) }}  Actual
                                    </p>
                                    <p class="flex-end mr-3">Budget</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection

