@section('script')
   
    <script>
        var net_ctx = document.getElementById('netDetailBar');
        var net_values =   <?php echo json_encode($net_detail['values']) ?>;
        var net_labels =   <?php echo json_encode($net_detail['labels']) ?>;
        var net_backgrounds =   <?php echo json_encode($net_backgrounds) ?>;
        if(net_ctx){
            ctx.getContext('2d');
            var netChart = new Chart(net_ctx, {
                type: 'bar',
                data: {    
                    labels: net_labels,  
                    datasets: [{
                        data: net_values,
                        backgroundColor: net_backgrounds,   
                        borderColor: net_backgrounds,   
                    }]
                },
                options: {
                    legend: {
                        display: false,
                        position: 'bottom'
                    }, 
                    scales: {
                        xAxes:[{ 
                            display: true,
                            barThickness: 60,  // number (pixels) or 'flex'
                            maxBarThickness: 70 // number (pixels)
                        }],
                        yAxes:[{
                            display: true, 
                            ticks: { 
                                beginAtZero: true,
                                callback: function(value, index, values) {
                                    return user_currency + parseInt(value).toLocaleString();
                                }
                            },
                        }]
                    } 
                }
            });
        } 
    </script>
    
    <script>
        var ctx = document.getElementById('equityDetailBar');
        var user_currency = "<?php echo $currency ?>";
        var values =   <?php echo json_encode($equity_detail['percentages']) ?>;
        var labels =   <?php echo json_encode($equity_detail['labels']) ?>;
        var backgrounds =   <?php echo json_encode($backgrounds) ?>;
    </script>
    @include('user.360.partials.account_chartpie')

@endsection
<div class="card-body"> 
    <div class="chart mt-0"> 
        <h5 class="text-center bold">Home Equity</h5>
        <canvas id="equityDetailBar" width="" style="max-width: 450px !important; max-height: 215px !important;  margin: 0;"></canvas>
        <div class="cell" id="wrapLegend"></div> 
        <div class="row">
            <div class="col-8"></div>
            <div class="col-4">
                <span class="text-right"> 
                    <a href="{{route('360.equity')}}" class="small bold text-dark text-underline">View Detail</a>
                </span>
            </div>
        </div>
    </div>
</div>