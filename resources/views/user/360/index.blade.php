@extends('layouts.user')

@section('content')
    @php
        function filterName($name){
            if($name == "net") $name = "Net Worth";
            return $name;
        }

    @endphp

    <div class="bg-whiteks py-4" id="">
       <h2 class="text-center bold sm-fs-24">Welcome to your Personal Finance in 360<sup>o</sup>   </h2>
    </div>

    <script>
        var total_credit = "<?php echo $total_credit ?>";
        var is_allocated = "<?php echo $audit->is_allocated ?>";
        var dept = <?php echo json_encode($dept); ?>;
        $(function() {
            // $('#liabilityModalAccount').on('shown.bs.modal', function (e) {
            //    if(total_credit != 0){
            //        $('#liabilityModalAccount').modal('hide');
            //        window.location = "<?php echo route('360.liability',['kpi' =>'credit']) ?>";
            //     }
            // })
        })
    </script>

    <div class="row my-4">
        <div class="col-md-5 col-sm-12 sm-mx-2">
            <h5 class="text-underline bold my-2">Recently Updated Tiles</h5>
            <ul class="list-group list-group-flush cash-tiles">
                @if (count($tiles))
                    @foreach ($tiles as $key => $tile)
                    <li class="list-group-item my-1">
                        <a href="{{ url('/home/360/'.$tile['account_name'] )}}" class="d-flex card-link text-white">
                            <span class="mr-2 text-capitalize"> {{filterName($tile['account_name'])}} –</span> <span class="mr-2 bold"> {{$tile['account_type']}}  </span> <span class="mr-2">{{$currency}}{{ number_format( $tile['sum'] , 2) }}</span>
                            <span class="flex-end"><i class="fa fa-chevron-right"></i> </span>
                        </a>
                    </li>
                    @endforeach
                @else
                    <div class="jumbotron bg-gray mt-2">
                        <h4 class="text-center">No Recently Updated Tiles</h4>
                    </div>
                @endif
            </ul>
        </div>
        <div class="col-md-7 col-sm-12 px-0">
            @include('user.360.wheel')
        </div>
    </div>
@endsection

