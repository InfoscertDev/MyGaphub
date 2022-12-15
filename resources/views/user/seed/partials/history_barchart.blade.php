
<script>
    var chart = document.getElementById('historicSeedBar');
    var lineChart = document.getElementById('historicSeedLine');
    var currency = "<?php echo $currency ?>";
    var seed_backgrounds =   <?php echo json_encode($seed_backgrounds) ?>;
    if (chart) {
        chart.getContext('2d');
        console.log(labels);

        var historicSeed = new  Chart(chart, {
                type: 'bar',
                // fill:false,
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Savings',
                        //  fill:false,
                        data: [90, 50, 40, 50, 20],
                        backgroundColor: seed_backgrounds[0],
                        borderColor: seed_backgrounds[0],
                        datalabels: {
                            color: '#fff',  position: 'top'
                        }
                    },
                    {
                        label: 'Education',
                        //  fill:false,
                        data: [70, 20, 37, 45, 30],
                        backgroundColor: seed_backgrounds[1],
                        borderColor: seed_backgrounds[1],
                        datalabels: {
                            color: '#fff',  position: 'top'
                        }
                    },{
                        label: 'Expenditure',
                        //  fill:false,
                        data: [22,40, 80, 50,60],
                        backgroundColor: seed_backgrounds[2],
                        borderColor: seed_backgrounds[2],
                        datalabels: {
                            color: '#fff'
                        }
                    },
                    {
                        label: 'Discretionary',
                        //  fill:false,
                        data: [20, 50, 10, 40, 55],
                        backgroundColor: seed_backgrounds[3],
                        borderColor: seed_backgrounds[3],
                        datalabels: {
                            color: '#fff'
                        }
                    }]
                },
                options: {
                    // responsive: true,
                    // maintainAspectRatio: false,
                    legend: {
                        display: true,
                        position: 'bottom',
                    },
                    layout: {
                        padding: 15
                    },
                    events: [],
                    scales: {
                        // xAxes:[{
                        //     display: true,
                        //     barThickness: 60,  // number (pixels) or 'flex'
                        //     maxBarThickness: 70 // number (pixels)
                        // }],
                        yAxes:[{
                            display: true,
                            ticks: {
                                beginAtZero: true,  min: 0, max: 120
                                // callback: function(value, index, values) {
                                //     return currency + parseInt(value).toLocaleString();
                                // }
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

    if (lineChart) {
        lineChart.getContext('2d');
        var historicSeed = new  Chart(lineChart, {
                type: 'line',
                ill:false,
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Savings',
                        fill:false,
                        data: [90, 50, 40, 50, 20],
                        backgroundColor: seed_backgrounds[0],
                        borderColor: seed_backgrounds[0],
                        datalabels: {
                            color: '#fff',  position: 'top'
                        }
                    },
                    {
                        label: 'Education',
                        fill:false,
                        data: [70, 20, 37, 45, 30],
                        backgroundColor: seed_backgrounds[1],
                        borderColor: seed_backgrounds[1],
                        datalabels: {
                            color: '#fff',  position: 'top'
                        }
                    },{
                        label: 'Expenditure',
                        fill:false,
                        data: [22,40, 80, 50,60],
                        backgroundColor: seed_backgrounds[2],
                        borderColor: seed_backgrounds[2],
                        datalabels: {
                            color: '#fff'
                        }
                    },
                    {
                        label: 'Discretionary',
                        fill:false,
                        data: [20, 50, 10, 40, 55],
                        backgroundColor: seed_backgrounds[3],
                        borderColor: seed_backgrounds[3],
                        datalabels: {
                            color: '#fff'
                        }
                    }]
                },
                options: {
                    // responsive: true,
                    // maintainAspectRatio: false,
                    legend: {
                        display: true,
                        position: 'bottom',
                    },
                    layout: {
                        padding: 15
                    },
                    events: [],
                    scales: {
                        // xAxes:[{
                        //     display: true,
                        //     barThickness: 60,  // number (pixels) or 'flex'
                        //     maxBarThickness: 70 // number (pixels)
                        // }],
                        yAxes:[{
                            display: true,
                            ticks: {
                                beginAtZero: true,  min: 0, max: 120
                                // callback: function(value, index, values) {
                                //     return currency + parseInt(value).toLocaleString();
                                // }
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

</script>
