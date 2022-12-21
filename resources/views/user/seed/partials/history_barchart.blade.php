

<script>
    var chart = document.getElementById('historicSeedBar');
    var lineChart = document.getElementById('historicSeedLine');
    var currency = "<?php echo $currency ?>";
    var seed_backgrounds =   <?php echo json_encode($seed_backgrounds) ?>;
    var data =  <?php  echo json_encode($historic_seed) ?>;
    let labels = [];
    let savings = [];
    let education= [];
    let expenditure = [];
    let discretionary = [];

    for (const key in data) {
        if (Object.hasOwnProperty.call(data, key)) {
            const element = data[key];
            let period = new Date(key).toLocaleString('en-us', { month: 'short' });
            labels.push(period) ;
            savings.push(element.table.savings);
            education.push(element.table.education);
            expenditure.push(element.table.expenditure);
            discretionary.push(element.table.discretionary);
        }
    }

    console.log();
    if (chart) {
        chart.getContext('2d');

        var historicSeed = new  Chart(chart, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Savings',
                        //  fill:false,
                        data: savings,
                        backgroundColor: seed_backgrounds[0],
                        borderColor: seed_backgrounds[0],
                        datalabels: {
                            color: '#fff',  position: 'top'
                        }
                    },
                    {
                        label: 'Education',
                        //  fill:false,
                        data: education,
                        backgroundColor: seed_backgrounds[1],
                        borderColor: seed_backgrounds[1],
                        datalabels: {
                            color: '#fff',  position: 'top'
                        }
                    },{
                        label: 'Expenditure',
                        //  fill:false,
                        data: expenditure,
                        backgroundColor: seed_backgrounds[2],
                        borderColor: seed_backgrounds[2],
                        datalabels: {
                            color: '#fff'
                        }
                    },
                    {
                        label: 'Discretionary',
                        //  fill:false,
                        data: discretionary,
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
                                beginAtZero: true,  min: 0
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
                        data: savings,
                        backgroundColor: seed_backgrounds[0],
                        borderColor: seed_backgrounds[0],
                        datalabels: {
                            color: '#fff',  position: 'top'
                        }
                    },
                    {
                        label: 'Education',
                        fill:false,
                        data: education,
                        backgroundColor: seed_backgrounds[1],
                        borderColor: seed_backgrounds[1],
                        datalabels: {
                            color: '#fff',  position: 'top'
                        }
                    },{
                        label: 'Expenditure',
                        fill:false,
                        data: expenditure,
                        backgroundColor: seed_backgrounds[2],
                        borderColor: seed_backgrounds[2],
                        datalabels: {
                            color: '#fff'
                        }
                    },
                    {
                        label: 'Discretionary',
                        fill:false,
                        data: discretionary,
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
                                beginAtZero: true,  min: 0
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
