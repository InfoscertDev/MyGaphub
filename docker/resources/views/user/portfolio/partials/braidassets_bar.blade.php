<script>
     function generateBar(bar, options) {
        // console.log(labels);
        if(bar){
            bar.getContext('2d');
            var myExpenditureChart = new Chart(bar, {
                type: 'bar',
                data: {    
                    labels: (options.labels) ? options.labels : labels, 
                    datasets: [{
                        label: options.label,
                        data: options.values,
                        backgroundColor: backgrounds,   
                        borderColor: backgrounds,  
                        datalabels: {
                            color: '#fff'
                        }   
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
                    },
                    plugins: { 
                        datalabels: {
                            formatter: function(value, context) {
                                return user_currency + parseInt(value).toLocaleString();
                            }
                        }
                    }
                    // onClick: graphClickEvent ,
                    // onHover: graphClickEvent ,
                }
            });
        } 
    }
</script>