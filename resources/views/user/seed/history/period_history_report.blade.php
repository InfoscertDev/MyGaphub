
@extends('layouts.user')

@section('script')
    <script>
        const labelReportValue = document.getElementById('labelReportValue');
        if(labelReportValue){
            labelReportValue.getContext('2d');

            const labels =  <?php echo json_encode($labels) ?>;
            const budget_values = <?php echo json_encode($budget)  ?>;
            const actual_values = <?php echo json_encode($actual)  ?>;

            // console.log(labels, budget_values, actual_values);
            const reportBarChart = new Chart(labelReportValue, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Budget',
                            data: budget_values,
                            backgroundColor: '#008080',
                            borderColor: '#008080',
                            datalabels: {
                                color: '#fff',
                                position: 'top'
                            }
                        },
                        {
                            label: 'Actual',
                            data: actual_values,
                            backgroundColor: '#808080',
                            borderColor: '#808080',
                            datalabels: {
                                color: '#fff',
                                position: 'top'
                            }
                        }
                    ]
                },
                options: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        onClick: (e) => e.stopPropagation(),
                        abels: {
                            boxHeight: 1, boxWidth: 10
                        }
                    },
                    scales: {
                        yAxes:[{
                            display: true,
                            ticks: {
                                beginAtZero: true,
                                callback: function(value, index, values) {
                                    return  parseInt(value).toLocaleString();
                                }
                            },
                        }],
                        xAxes: [{
                            barPercentage: 0.4
                        }]
                    }
                }
         });

        }
    </script>
@endsection

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
                        @if(isset($label))
                            <h4 class="summary-card-title">{{filterExpenditure($label)}}</h4>
                        @else
                            <h4 class="summary-card-title">{{$seed}} Report</h4>
                        @endif
                    </div>
                </div>
                <div class="summary-card-body">
                    <div class="list-group">
                        @if(!$label)
                            @foreach($allocations as $allocation)
                                <a class="list-group-item" href="{{ request()->fullUrlWithQuery([ 'label' => $allocation->label ])  }}" style="color:inherit">
                                    <div class="d-flex mt-2 mb-1">
                                        <span class="box-identify box-{{$seed}}"></span>
                                        <h5> {{$allocation->label}}</h5>
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
                        @else
                            <div class="chart">
                                <canvas id="labelReportValue" width="500px" style="width: 120%; margin:  0; min-height: 190px"></canvas>
                            </div>
                        @endif
                    </div>
                    <div class="mt-4">
                        <p class="text-center font-italic">Click any of the items above to view the chart</p>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection

