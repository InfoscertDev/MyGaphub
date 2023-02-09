<script>
    function refreshSeedChart(account_chart, chart, home = false){
        var chart_values =   account_chart.values;
        // var chart_labels =   account_chart.labels;
        var seed_backgrounds =   <?php echo json_encode($seed_backgrounds) ?>;
        if(chart){ 
            chart.getContext('2d');
            var myseedChart = new Chart(chart, {
                type: 'doughnut', 
                data: {    
                    labels: labels, 
                    // labels: chart_labels, 
                    datasets: [{
                        data: chart_values,
                        backgroundColor: seed_backgrounds,   
                        borderColor: seed_backgrounds,   
                        datalabels: {
                            color: '#111'
                        } 
                    }]
                },
                options: {
                    legend: {
                        display: false,
                        position: 'bottom'
                    },
                    layout: {
                        padding: 10
                    },
                    onHover: graphHoverEvent ,
                    onClick: graphSeedClickEvent ,
                    plugins: {  
                        datalabels: {
                            formatter: function(value, context) {
                                return parseInt(value).toLocaleString()+'%';
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
            $("#wrapLegend").html(myseedChart.generateLegend());
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

        function graphSeedClickEvent (evt, elements) {  
            var index = elements[0]["_index"];
            if(home){
                window.location = "<?php echo route('seed') ?>"
            }
        }
    }   
 </script>