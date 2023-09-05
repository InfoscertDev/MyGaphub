
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
        function diffrences($allocation){
            return $allocation->amount - $allocation->actual;
        }
    @endphp
    <div class="row justify-content-center">
        <div class="col-12">
            <span class="mr-3 pb-2" id="goback">
                <a href="{{ route('seed.history' ) }}"
                            class="text-dark" ><i class="fa fa-chevron-left mr-1"></i> Back
                </a>
            </span>
            <div class="disclaim text-center">
                <select onchange="window.location.assign(this.value)"
                    name="opportunities" class="select-opportunity date-history mt-2 text-center p-2" id="" class="mt-2">
                    @foreach($periods as $key => $month)
                        @if($period == $month)
                            <option value="{{ route('seed.periodic_history_diffrences',$key) }}" selected >  {{ date('M Y', strtotime($month))  }}  </option>
                        @else
                            <option value="{{ route('seed.periodic_history_diffrences',$key) }}" >  {{ date('M Y', strtotime($month))  }}  </option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-12 mt-3 p-4">
            <div>
                <table class="table  table-striped table-bordered">
                    <thead class="thead-light">
                        <tr class="table-header">
                            <th  class="bold text-capitalize">  SEED Category </th>
                            <th  class="bold text-capitalize"> Budget Item    </th>
                            <th  class="bold text-capitalize"> Budget Amount   </th>
                            <th  class="bold text-capitalize"> Actual Amount   </th>
                            <th  class="bold text-capitalize"> Diffrences   </th>
                        </tr>
                    </thead>
                    @foreach ($allocations as $allocation)
                        <tr class="">
                            <td class="text-capitalize">
                                 <span class="box-identify box-{{ $allocation->seed_category }}"></span>
                                {{ ($allocation->seed_category == 'expenditure') ? filterExpenditure($allocation->expenditure) : filterExpenditure($allocation->seed_category)   }}
                            </td>
                            <td > {{ $allocation->label }} </td>
                            <td > {{$currency}}{{number_format( $allocation->amount ,2 )}} </td>
                            <td > {{$currency}}{{number_format( $allocation->actual, 2)}} </td>
                            <td >
                              <span class="mr-2"> {{$currency}}{{number_format( diffrences($allocation) ,2)}}  </span>
                                <span>
                                    @if( diffrences($allocation) >= 0)
                                        <svg xmlns="http://www.w3.org/2000/svg" height="2em" fill="green" viewBox="0 0 448 512"><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM224 160c6.7 0 13 2.8 17.6 7.7l104 112c6.5 7 8.2 17.2 4.4 25.9s-12.5 14.4-22 14.4H120c-9.5 0-18.2-5.7-22-14.4s-2.1-18.9 4.4-25.9l104-112c4.5-4.9 10.9-7.7 17.6-7.7z"/></svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" height="2em" fill="red" viewBox="0 0 448 512"><path d="M384 480c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l320 0zM224 352c-6.7 0-13-2.8-17.6-7.7l-104-112c-6.5-7-8.2-17.2-4.4-25.9s12.5-14.4 22-14.4l208 0c9.5 0 18.2 5.7 22 14.4s2.1 18.9-4.4 25.9l-104 112c-4.5 4.9-10.9 7.7-17.6 7.7z"/></svg>
                                    @endif
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="d-flex">
            </div>
        </div>
    </div>
@endsection

