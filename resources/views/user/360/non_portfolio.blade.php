@extends('layouts.user')

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <span class="mr-3 pb-2" id="goback">
            <a href="{{ route('seed.history' ) }}"
                        class="text-dark" ><i class="fa fa-chevron-left mr-1"></i> Back
            </a>
        </span>
        <div class="my-3">
           <h5 class="bold text-center">{{ $income->income_name }}</h5>
        </div>
    </div>

    <div class="col-md-6">
        <div id="accordion">
            @foreach($non_portfolios as $portfolio)
                <div class="card mb-3 bg-gray">
                    <div class="accord-header" id="headingOne">
                        <div class="wd-f mb-0">
                            <span class="gap-card-title accord-title">
                                {{ date('M Y', strtotime($portfolio->periof))  }}
                                <span class="ml-5 text-center">
                                    {{ $currency }}{{ number_format($portfolio->amount, 2) }}
                                </span>
                            </span>
                            <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fa fa-chevron-down"></i>
                            </button>
                        </div>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body pb-1">
                            <div class="d-flex my-2">
                                <span class="col"> Gross Income</span>
                                <span class="col">
                                    {{ $currency }}{{ number_format($portfolio->amount, 2) }}
                                </span>
                            </div>
                            <div class="d-flex my-2">
                                <span class="col"> Tithe Paid</span>
                                <span class="col">
                                    {{ $currency }}{{ number_format($portfolio->tithe, 2) }}
                                </span>
                            </div>
                            <div class="d-flex my-2">
                                <span class="col"> Taxes Paid</span>
                                <span class="col">
                                    {{ $currency }}{{ number_format($portfolio->taxes, 2) }}
                                </span>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    <div class="col-md-6">

    </div>
</div>

@endsection
