<script>
    function refreshJouney(){
        if(chart){ 
            chart.getContext('2d');
            var myAccountChart = new Chart(chart, {
                type: 'line',
                data: {
                    datasets: [{
                        label: 'Financial Independece Journey',
                        data: data,
                        fill:false,
                        datalabels: {
                            color: 'transparent',
                        },
                        borderColor: 'rgba(0, 0, 0, 0.8)',
                        borderWidth: 1 //<-- set this
                    }],
                    labels: labels,

                },
                // plugins:[{
                //     beforeDraw: chart => {
                //     var xAxis = chart.scales['x-axis-0'];
                //     const scales = chart.chart.config.options.scales;
                //     scales.xAxes[0].ticks.padding = yAxis.top - yAxis.getPixelForValue(0) + 6;
                //     // scales.yAxes[0].ticks.padding = xAxis.getPixelForValue(0) - xAxis.right + 6;
                //     }
                // }],
                options: {
                    tooltips: {
                        enabled: false
                    },
                    elements: {
                        point:{
                            radius: 0
                        }
                    },
                    legend: {
                        display: true, 
                        borderColor: 'rgba(155, 155, 155, 0.8)',
                        fontSize: 10, 
                        labels: {
                            borderWidth: 2, //<-- set this
                            fontSize: 12,
                            boxHeight: 5,
                            fontColor: '#474747',
                        },
                        borderWidth: 1, 
                        onClick: (e) => e.stopPropagation(),
                        fontColor: 'black',
                        position: 'bottom'
                    },
                    scales: { 
                        yAxes:[{
                            display: true,
                            ticks: { 
                                    beginAtZero: true,
                                    // padding: 10,
                                    max: +data[4] + 500,
                                    callback: function(value, index, values) {
                                        return user_currency + parseInt(value).toLocaleString();
                                }
                            },
                        }],
                        xAxes:[{
                            display: true,
                            ticks: {  
                                padding: 10, 
                                offsetGridLines: true,
                                beginAtZero: true
                            }, 
                            gridLines: {
                                tickMarkLength: 0   
                            }
                        }],
                    }, 
                
                }
            });
            document.getElementById('financialLegend').innerHTML = myAccountChart.generateLegend();
        }
    }
</script>