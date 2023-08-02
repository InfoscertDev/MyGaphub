<script>
     if(braidValue){
        braidValue.getContext('2d');
        var myBraidChart = new Chart(braidValue, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                        label: 'Investments',
                        data: existing_incomes,
                        fill: false,
                        backgroundColor: '#E6C069',
                        borderColor: '#E6C069',
                        datalabels: {
                            color: '#fff',
                            position: 'top'
                        }
                    }
                ]
            },
            options: {
                legend: {
                    display: true,
                    position: 'bottom',
                    onClick: (e) => e.stopPropagation(),
                    labels: {
                        boxHeight: 1, boxWidth: 10
                    }
                },
                scales: {
                    yAxes:[{
                        display: true,
                        ticks: {
                            precision: 0,
                            beginAtZero: true,
                            callback: function(value, index, values) {
                                return  currency + parseInt(value).toLocaleString();
                            }
                        },
                    }]
                }
                // onClick: graphClickEvent ,
                // onHover: graphClickEvent ,
            }
        });
    }
</script>
