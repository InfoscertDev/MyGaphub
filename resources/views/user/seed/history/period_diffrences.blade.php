
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
            <div>
                <table class="table  table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr class="table-header">
                            <th  class="bold text-capitalize">Seed Category </th>
                            <th  class="bold text-capitalize"> Budget Item    </th>
                            <th  class="bold text-capitalize"> Budget Amount   </th>
                            <th  class="bold text-capitalize"> Actual Amount   </th>
                            <th  class="bold text-capitalize"> Diffrences   </th>
                        </tr>
                    </thead>
                    @for ($i = 0; $i <= 10; $i++)
                        <tr>
                            <td > Expenditure</td>
                            <td > {{$currency}}{{number_format( ($i * 4) ,2)}} </td>
                            <td > {{$currency}}{{number_format( ($i * 2),2)}} </td>
                            <td > {{$currency}}{{number_format( 0,2)}} </td>
                            <td > {{$currency}}{{number_format( 0,2)}} </td>
                        </tr>
                    @endfor
                </table>
            </div>
            <div class="d-flex">
            </div>
        </div>
    </div>
@endsection

