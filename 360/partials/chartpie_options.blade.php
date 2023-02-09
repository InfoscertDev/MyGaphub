<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
<script>
    function refreshChart(account_chart, grid = true){
        var chart = document.getElementById('equityChartBar');
        var chart_values =   account_chart.values;
        var chart_labels =   account_chart.labels;
        var backgrounds =   <?php echo json_encode($backgrounds) ?>;
        if(chart){
            chart.getContext('2d');
            var myequityChart = new Chart(chart, {
                type: 'pie',
                data: {
                    labels: chart_labels,
                    datasets: [{
                        data: chart_values,
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
                        display: grid,
                        position: 'bottom'
                    },
                    layout: {
                        padding: 15
                    },
                    onHover: graphHoverEvent ,
                    onClick: graphClickEvent ,
                    plugins: {
                        datalabels: {
                            formatter: function(value, context) {
                                // if(grid){
                                //     return user_currency + parseInt(value).toLocaleString();
                                // }else{
                                // }
                                return parseInt(value).toLocaleString() +'%';
                            }
                        }
                    },
                    // scales: {
                    //     yAxes:[{
                    //         display: true,
                    //         ticks: {
                    //             beginAtZero: true,
                    //             callback: function(value, index, values) {
                    //                 return user_currency + parseInt(value).toLocaleString();
                    //             }
                    //         },
                    //     }]
                    // }
                }
            });
        }

        let act_segment;
        function graphHoverEvent (evt, elements) {
            if (elements && elements.length) {
                act_segment = elements[0];
                this.chart.update();
                selectedIndex = act_segment["_index"];
                act_segment._model.outerRadius += 10;
            } else {
                if (act_segment) {
                    act_segment._model.outerRadius -= 10;
                }
                act_segment = null;
            }
        }

        function graphClickEvent (evt, elements) {
            var index = elements[0]["_index"];
            if(!grid && index >= 0){
               window.location = "<?php echo route('360.equity') ?>"
            }
        }
    }
 </script>
