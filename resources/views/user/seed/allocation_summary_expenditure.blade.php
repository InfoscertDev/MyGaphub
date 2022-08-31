
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
        <div class="col-12 my-4">
            <div class="d-flex">
                <span class="mr-3 pb-2" id="goback">
                    <a href="#" class="text-dark" onclick="window.history.go(-1); return false;" ><i class="fa fa-chevron-left mr-1"></i> Back</a>
                </span>
                <span class="mx-auto text-center">
                    {{ date('F')}} {{ date('Y')}}
                </span>
            </div>
            <div class="summary-card">
                <div class="summary-header bg-gray">
                    <div class="summary-card-header seed-expenditure">
                        <h4 class="summary-card-title">{{$seed}} Allocation Summary</h4>
                    </div>
                </div>
                <div class="summary-card-body">
                    <div class="list-group">
                        @foreach($allocations as $allocation)
                            <div class="list-group-item" >
                                <a class="d-flex mt-2 mb-1 card-link" style="color: inherit;" href="{{ route('seed.summary',     [ 'expenditure','category' => $allocation['label'] ]) }}">
                                    <span class="box-identify box-expenditure"></span>
                                    <h5 class="text-capitalize"> {{ filterExpenditure($allocation['label']) }} </h5>
                                    <h5 class="flex-end">{{$currency}}{{ (isset($allocation['amount'])) ? number_format(($allocation['amount']), 2) : 0 }}</h5>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    @if(count($allocations) < 5)
                        @if($seed == 'savings')   <p class="my-3 ff-rob text-center" data-toggle="modal" data-target="#savingsAllocationModal" onclick="$('#savingsSummaryModal').modal('hide')">Add more</p> @endif
                        @if($seed == 'expenditure')   <p class="my-3 ff-rob text-center" data-toggle="modal" data-target="#expenditureAllocationModal" onclick="$('#savingsSummaryModal').modal('hide')">Add more</p> @endif
                        @if($seed == 'education')   <p class="my-3 ff-rob text-center" data-toggle="modal" data-target="#educationAllocationModal" onclick="$('#savingsSummaryModal').modal('hide')">Add more</p> @endif
                        @if($seed == 'discretionary')   <p class="my-3 ff-rob text-center" data-toggle="modal" data-target="#discretionaryAllocationModal" onclick="$('#savingsSummaryModal').modal('hide')">Add more</p> @endif
                    @endif
                </div>


            @include('user.seed.modals.savings_allocation')
            @include('user.seed.modals.education_allocation')
            @include('user.seed.modals.discretionary_allocation')
            @include('user.seed.modals.expenditure_allocation')
            </div>
        </div>
    </div>
@endsection

