
@if ($dashboard->grand)
    <div class="card-body" style="display: none;" id="grand_snap">
        <div class="chart mt-1">
            <h5 class="text-center bold">Grand</h5>
            <canvas id="grandDetailBar" style="width: 380px !important; "></canvas>
        </div>
        <div class="d-flex mt-2" >
            <div class="col-8">
                {{-- <h6 class="text-center"> Your Total Net Worth is <span class="bold">{{$currency}}{{number_format($net_detail['sum'], 2)}}</span> </h6> --}}
            </div>
            <div class="col-4">
                <span class="text-right">
                    <a href="{{route('360.philanthropy')}}" class="small bold text-dark text-underline hand">View Detail</a>
                </span>
            </div>
        </div>
        <script>
            // var grand_ctx = document.getElementById('grandDetailBar');
            var account_grand = {
                labels: ['Current', 'Target'],
                values: [<?php echo $seveng['grand']->current ?> , <?php echo $seveng['grand']->target ?>]
            };
            // console.log('Grand',account_grand);
            setTimeout(()=> { refreshSevenGChart(account_grand, 'grand') }, 1200);
        </script>
    </div>
@endif
@if ($dashboard->freedom)
    <div class="card-body" style="display: none;" id="freedom_snap">
        <div class="chart mt-1">
            <h5 class="text-center bold">Freedom</h5>
            <canvas id="freedomDetailBar" style="width: 380px !important; "></canvas>
        </div>
        <div class="d-flex mt-2" >
            <div class="col-8">
                {{-- <h6 class="text-center"> Your Total Net Worth is <span class="bold">{{$currency}}{{number_format($net_detail['sum'], 2)}}</span> </h6> --}}
            </div>
            <div class="col-4">
                <span class="text-right">
                    <a href="{{route('360.retirement')}}" class="small bold text-dark text-underline hand">View Detail</a>
                </span>
            </div>
        </div>
        <script>
            // var freedom_ctx = document.getElementById('freedomDetailBar');
            var account_freedom = {
                labels: ['Current', 'Target'],
                values: [<?php echo $seveng['freedom']->current ?> , <?php echo $seveng['freedom']->target ?>]
            };
            setTimeout(()=> { refreshSevenGChart(account_freedom, 'freedom') }, 1200);
        </script>
    </div>
@endif
@if ($dashboard->education)
    <div class="card-body" style="display: none;" id="education_snap">
        <div class="chart mt-1">
            <h5 class="text-center bold">Education</h5>
            <canvas id="educationDetailBar" style="width: 380px !important; "></canvas>
        </div>
        <div class="d-flex mt-2" >
            <div class="col-8">
                {{-- <h6 class="text-center"> Your Total Net Worth is <span class="bold">{{$currency}}{{number_format($net_detail['sum'], 2)}}</span> </h6> --}}
            </div>
            <div class="col-4">
                <span class="text-right">
                    <a href="{{route('360.cash',['kpi' =>'education'])}}" class="small bold text-dark text-underline hand">View Detail</a>
                </span>
            </div>
        </div>
        <script>
            // var education_ctx = document.getElementById('educationDetailBar');
            var account_education = {
                labels: ['Current', 'Target'],
                values: [<?php echo $seveng['education']->current ?> , <?php echo $seveng['education']->target ?>]
            };
            setTimeout(()=> { refreshSevenGChart(account_education, 'education') }, 1200);
        </script>
    </div>
@endif
@if ($dashboard->debt)
    <div class="card-body" style="display: none;" id="debt_snap">
        <div class="chart mt-1">
            <h5 class="text-center bold">Debt</h5>
            <canvas id="debtDetailBar" style="width: 380px !important; "></canvas>
        </div>
        <div class="d-flex mt-2" >
            <div class="col-8">
                {{-- <h6 class="text-center"> Your Total Net Worth is <span class="bold">{{$currency}}{{number_format($net_detail['sum'], 2)}}</span> </h6> --}}
            </div>
            <div class="col-4">
                <span class="text-right">
                    <a href="{{route('360.mortgage',['kpi' =>'debt'])}}" class="small bold text-dark text-underline hand">View Detail</a>
                </span>
            </div>
        </div>
        <script>
            var account_debt = {
                labels: ['Current', 'Baseline'],
                values: [<?php echo $seveng['debt']->current ?> , <?php echo $seveng['debt']->baseline ?>]
            };
            // console.log('Debt',account_debt);
            setTimeout(()=> { refreshSevenGChart(account_debt, 'debt') }, 1200);
        </script>
    </div>
@endif
@if ($dashboard->credit)
    <div class="card-body" style="display: none;" id="credit_snap">
        <div class="chart mt-1">
            <h5 class="text-center bold">Credit</h5>
            <canvas id="creditDetailBar" style="width: 380px !important; "></canvas>
        </div>
        <div class="d-flex mt-2" >
            <div class="col-8">
                {{-- <h6 class="text-center"> Your Total Net Worth is <span class="bold">{{$currency}}{{number_format($net_detail['sum'], 2)}}</span> </h6> --}}
            </div>
            <div class="col-4">
                <span class="text-right">
                    <a href="{{route('360.liability',['kpi' =>'credit'])}}" class="small bold text-dark text-underline hand">View Detail</a>
                </span>
            </div>
        </div>
        <script>
            var account_credit = {
                labels: ['Current', 'Baseline'],
                values: [<?php echo $seveng['credit']->current ?> , <?php echo $seveng['credit']->baseline ?>]
            };
            setTimeout(()=> { refreshSevenGChart(account_credit, 'credit') }, 1200);
        </script>
    </div>
@endif
@if ($dashboard->beta)
    <div class="card-body" style="display: none;" id="beta_snap">
        <div class="chart mt-1">
            <h5 class="text-center bold">Beta</h5>
            <canvas id="betaDetailBar" style="width: 380px !important; "></canvas>
        </div>
        <div class="d-flex mt-2" >
            <div class="col-8">
                {{-- <h6 class="text-center"> Your Total Net Worth is <span class="bold">{{$currency}}{{number_format($net_detail['sum'], 2)}}</span> </h6> --}}
            </div>
            <div class="col-4">
                <span class="text-right">
                    <a href="{{route('360.cash',['kpi' =>'beta'])}}" class="small bold text-dark text-underline hand">View Detail</a>
                </span>
            </div>
        </div>
        <script>
            // var beta_ctx = document.getElementById('betaDetailBar');
            var account_beta = {
                labels: ['Current', 'Target'],
                values: [<?php echo $seveng['beta']->current ?> , <?php echo $seveng['beta']->target ?>]
            };
            setTimeout(()=> { refreshSevenGChart(account_beta, 'beta') }, 1200);
        </script>
    </div>
@endif
@if ($dashboard->alpha)
    <div class="card-body" style="display: none;" id="alpha_snap">
        <div class="chart mt-1">
            <h5 class="text-center bold">Alpha</h5>
            <canvas id="alphaDetailBar" style="width: 380px !important; "></canvas>
        </div>
        <div class="d-flex mt-2" >
            <div class="col-8">
                {{-- <h6 class="text-center"> Your Total Net Worth is <span class="bold">{{$currency}}{{number_format($net_detail['sum'], 2)}}</span> </h6> --}}
            </div>
            <div class="col-4">
                <span class="text-right">
                    <a href="{{route('360.cash',['kpi' =>'alpha'])}}" class="small bold text-dark text-underline hand">View Detail</a>
                </span>
            </div>
        </div>
        <script>
            // var alpha_ctx = document.getElementById('alphaDetailBar');
            var account_alpha = {
                labels: ['Current', 'Target'],
                values: [<?php echo $seveng['alpha']->current ?> , <?php echo $seveng['alpha']->target ?>]
            };
            setTimeout(()=> { refreshSevenGChart(account_alpha, 'alpha') }, 1200);
        </script>
    </div>
@endif

<script>

</script>
