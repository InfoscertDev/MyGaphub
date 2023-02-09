<script>
    //  $('#myAccountChart').hide();
    function refreshChart(account_chart, currency = user_currency){
        // console.log(account_chart);
        var chart = document.getElementById('myAccountChart');
        var target =   account_chart.target;
        var chart_values =   account_chart.values;
        var chart_labels =   account_chart.labels;
        var backgrounds =   <?php echo json_encode($backgrounds) ?>;

        if(chart){
            // $('#myAccountChart').fadeIn();
            chart.getContext('2d');
            var myAccountChart = new Chart(chart, {
                type: 'bar',
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
                        display: false,
                    },
                    layout: {
                        padding: 15
                    },
                    events: [],
                    onHover: graphHoverEvent ,
                    scales: {
                        xAxes:[{
                            display: true,
                            barThickness: 60,  // number (pixels) or 'flex'
                            maxBarThickness: 70 // number (pixels)
                        }],
                        yAxes:[{
                            display: true,
                            ticks: {
                                beginAtZero: true,  min: 0, max: target,
                                callback: function(value, index, values) {
                                    return currency + parseInt(value).toLocaleString();
                                }
                            }
                        }]
                    },
                    plugins: {
                        datalabels: {
                            formatter: function(value, context) {
                                return currency + parseInt(value).toLocaleString();
                            }
                        }
                    }
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
    }
 </script>
