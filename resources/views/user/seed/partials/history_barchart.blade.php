<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
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
            // console.log(element);
            savings.push( element.table.savings);
            education.push(+element.table.education);
            expenditure.push(+element.table.expenditure);
            discretionary.push(+element.table.discretionary);
        }
    }


    // console.log(savings, education, expenditure);

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
                            color: '#000',    anchor: 'end',
                            font: { size: 15 }
                        }
                    },
                    {
                        label: 'Education',
                        //  fill:false,
                        data: education,
                        backgroundColor: seed_backgrounds[1],
                        borderColor: seed_backgrounds[1],
                        datalabels: {
                            color: '#000',
                            anchor: 'end',
                            font: { size: 15 }
                        }
                    },{
                        label: 'Expenditure',
                        //  fill:false,
                        data: expenditure,
                        backgroundColor: seed_backgrounds[2],
                        borderColor: seed_backgrounds[2],
                        datalabels: {
                            color: '#000' ,
                            anchor: 'end',
                            font: { size: 15 }
                        }
                    },
                    {
                        label: 'Discretionary',
                        //  fill:false,
                        data: discretionary,
                        backgroundColor: seed_backgrounds[3],
                        borderColor: seed_backgrounds[3],
                        datalabels: {
                            color: '#000',
                            anchor: 'end',
                            font: { size: 15 }
                        }
                    }],
                    options: {
                        legend: {
                            display: true,
                            position: 'bottom',
                        },
                        layout: {
                            padding: 15
                        },
                        onHover: graphHoverEvent ,
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
                                    beginAtZero: true,  min: 0,
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
                },
            });
    }

    if (lineChart) {
        lineChart.getContext('2d');
        var historicSeed = new  Chart(lineChart, {
                type: 'line',
                // fill:false,
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Savings',
                        fill:false,
                        data: savings,
                        backgroundColor: seed_backgrounds[0],
                        borderColor: seed_backgrounds[0],
                        datalabels: {
                            color: '#000',    anchor: 'end',
                        }
                    },
                    {
                        label: 'Education',
                        fill:false,
                        data: education,
                        backgroundColor: seed_backgrounds[1],
                        borderColor: seed_backgrounds[1],
                        datalabels: {
                            color: '#000',    anchor: 'end',
                        }
                    },{
                        label: 'Expenditure',
                        fill:false,
                        data: expenditure,
                        backgroundColor: seed_backgrounds[2],
                        borderColor: seed_backgrounds[2],
                        datalabels: {
                             color: '#000',    anchor: 'end',
                        }
                    },
                    {
                        label: 'Discretionary',
                        fill:false,
                        data: discretionary,
                        backgroundColor: seed_backgrounds[3],
                        borderColor: seed_backgrounds[3],
                        datalabels: {
                             color: '#000',    anchor: 'end',
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

</script>
