@extends('layouts.user')

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
    <script>
        var user_currency = "<?php echo $currency ?>";
        var ctx = document.getElementById('givingDetailBar');
        var values =   <?php echo json_encode($philantrophy_detail['values']) ?>;
        var labels =   <?php echo json_encode($philantrophy_detail['labels']) ?>;
        var backgrounds =   ['#aaa', '#aaa', '#aaa','#aaa', '#aaa'];

        if(ctx){
            ctx.getContext('2d');
            var myGivingChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        data: values,
                        backgroundColor: backgrounds,
                        borderColor: backgrounds,
                        datalabels: {
                            color: '#fff',
                            position: 'top'
                        }
                    }]
                },
                options: {
                    legend: {
                        display: false,
                        position: 'bottom'
                    },
                    scales: {
                        yAxes:[{
                            display: true,
                            ticks: {
                                beginAtZero: true,
                                callback: function(value, index, values) {
                                    return user_currency + parseInt(value).toLocaleString();
                                }
                            },
                        }]
                    },
                    plugins: {
                        datalabels: {
                            formatter: function(value, context) {
                                return user_currency + parseInt(value).toLocaleString();
                            }
                        }
                    }
                }
            });
        }
    </script>
@endsection

@section('content')
   @if ($philantrophy->allocated)
        <div class="row">
            <div class="col-md-5 col-sm-12">
                <div class="">
                    <h2 class=" bold">Giving {{$currency}}{{ number_format(array_sum($philantrophy_detail['values']) , 2) }}
                        <span class="account_info info"  data-toggle="tooltip" data-placement="right" title="This is the average of what you give to various causes on a monthly basis."><i class="fa fa-info mx-2 "></i></span>
                    </h2>
                {{-- <p class="wd-7 border text-center">This is the average of what you give to various causes on a monthly basis. </p>--}}
                </div>
                <div class="bar_chart mt-4">

                        <h5 class="text-underline  bold">Your Philanthropy Profile</h5>
                        <ul class="list-group list-group-flush cash-tiles">
                            @foreach ($philantrophy_detail['labels'] as $key => $equ)
                                <li class="list-group-item my-1">
                                    <span class="mr-2 bold">  {{$equ }}:</span> <span class="mr-2">{{$currency}}{{ number_format($philantrophy_detail['values'][$key], 2) }} </span>
                                </li>
                            @endforeach
                        </ul>
                        <div class="mb-3 mt-2">
                            <a href="{{route('seed')}}" class="card-link ">
                                {{--  <img src="{{asset('/assets/icon/Seed_red.png')}}" class="icon" alt="" style=""> --}}
                                <button class="btn btn-pry px-4 text-center">
                                    <i class="fa fa-pen  mr-3"></i>  Set Budget in SEED
                                </button>
                            </a>
                        </div>
                    <div class="chart my-3">
                        <h5 class="text-underline bold my-2">Philanthropy Distribution</h5>
                        <canvas id="givingDetailBar" width="500px" style="width: 120%; margin:  0;"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-sm-12 px-0">
                @include('user.360.wheel')
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-9 col-sm-12  mx-auto">
                <div class="card b-rad-20">
                    <div class="card-body">
                        <h4 class="mt-2 text-center bold">Philantrophy</h4>
                        <p class="wd-7 mx-auto text-center">(Allocate your Giving)</p>
                        {{-- @include('user.360.modals.networth_form') --}}

                        <div class="my-4 form-sheet sheet-modal">
                            <h5 class="text-center"><span class="text-danger">You have {{ $currency }}<span id="allocate"></span> to allocate in your "Giving"</span></h5>
                            <form action="{{ route('360.store.philantrophy') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-6 mt-2">
                                        <label>Charitable Giving</label>
                                    </div>
                                    <div class="col-6">
                                        <div class="price-wrap d-flex">
                                            <label for="" class="price-symbol">{{ $currency }}</label>
                                            <input type="number" value="0" oninput="newAllocation()" name="charity" class="form-control wd-f" id="charity" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6 mt-2">
                                        <label>Extended Family Support </label>
                                    </div>
                                    <div class="col-6">
                                        <div class="price-wrap d-flex">
                                            <label for="" class="price-symbol">{{ $currency }}</label>
                                            <input type="number" value="0" oninput="newAllocation()" name="family_support" class="form-control wd-f" id="family_support" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6 mt-2">
                                        <label>Personal Commitments </label>
                                    </div>
                                    <div class="col-6">
                                        <div class="price-wrap d-flex">
                                            <label for="" class="price-symbol">{{ $currency }}</label>
                                            <input type="number" value="0" oninput="newAllocation()" name="personal" class="form-control wd-f" id="personal" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6 mt-2">
                                        <label>Others</label>
                                    </div>
                                    <div class="col-6">
                                        <div class="price-wrap d-flex">
                                            <label for="" class="price-symbol">{{ $currency }}</label>
                                            <input type="number" value="0" oninput="newAllocation()" name="others" class="form-control wd-f" id="others" required>
                                        </div>
                                    </div>
                                </div>
                                <div  class="pull-right col-6 text-center mt-2"><button type="submit" id="update_giving" disabled class="btn btn-sm btn-pry px-5">Save</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var giving =  parseInt(<?php echo $grand->current ?>);
            function initPage(){
                let ch = parseInt(<?php echo $philantrophy->charity ?>),
                    sp = parseInt(<?php echo $philantrophy->family_support?>),
                    ps = parseInt(<?php echo $philantrophy->personal_commitments?>),
                    ot = parseInt(<?php echo $philantrophy->others?>);
                // var ch= 0, sp= 0, ps= 0, ot = 0;
                var charity = document.getElementById('charity');
                var family_support = document.getElementById('family_support');
                var personal =  document.getElementById('personal');
                var others =  document.getElementById('others');
                var allocate =  document.getElementById('allocate');

                charity.setAttribute('value', +ch);
                family_support.setAttribute('value', +sp);
                personal.setAttribute('value', +ps);
                others.setAttribute('value', +ot);

                var sum = +ch + +sp + +ps + +ot;

                allocate.textContent = (+giving - sum).toLocaleString() ;
            }
            initPage();

            function newAllocation(){
                var charity = document.getElementById('charity').value;
                var family_support = document.getElementById('family_support').value;
                var personal =  document.getElementById('personal').value;
                var others =  document.getElementById('others').value;
                var allocate =  document.getElementById('allocate');
                var update_giving =  document.getElementById('update_giving');



                var sum = +charity + +family_support + +personal + +others;
                allocate.textContent = +giving - sum ;
                if(+sum == +giving ){
                    update_giving.disabled = false;
                }else{
                    update_giving.disabled = true;
                }
            }
        </script>
    @endif
@endsection
