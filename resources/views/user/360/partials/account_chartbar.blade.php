<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
<script>
     if(ctx){
        ctx.getContext('2d');
        var myExpenditureChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    data: values,
                    backgroundColor: backgrounds,
                    borderColor: backgrounds,
                    datalabels: {
                        color: '#fff'
                    }
                }]
            },
            options: {
                // responsive: true,
                // maintainAspectRatio: false,

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
                            max:  values[0] * 1.3,
                            callback: function(value, index, values) {
                                return user_currency + parseInt(value).toLocaleString();
                            },
                        },
                    }]
                },
                plugins: {
                    datalabels: {
                        formatter: function(value, context) {
                            return user_currency + parseInt(value).toLocaleString();
                        }
                    }
                },
                onClick: graphClickEvent,

            }
        });
    }

    function graphClickEvent(event, elements) {
        if(elements[0]){
        //   console.log(index);
          var index = elements[0]["_index"];
          if (index == 0) window.location = "<?php echo route('360.asset') ?>"
          if (index == 1) window.location = "<?php echo route('360.liability') ?>"
          if (index == 2) window.location = "<?php echo route('360.equity') ?>"
        }
    }

    function updateNetWorth(){
        var equity = document.getElementById('switch_equity'),
            net = document.getElementById('total_net');
        if(equity.checked){
            net.textContent = parseInt((+total_asset + +total_equity) - +total_liability).toFixed(2).toLocaleString();
        }else{
            net.textContent = parseInt(+total_asset - +total_liability).toFixed(2).toLocaleString();
        }
    }
</script>
