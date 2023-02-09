<script>
    //  var labels = ['January', 'Febuary','March','April'];
    //  var asset_values = [250, 10, 120, 420];
     if(braidAsset){
        braidAsset.getContext('2d');
        var myExpenditureChart = new Chart(braidAsset, {
            type: 'bar',
            data: {    
                labels: labels, 
                datasets: [{
                    label: 'Asset Value',
                    data: asset_values,
                    backgroundColor: backgrounds,    
                    borderColor: backgrounds, 
                    datalabels: {
                        color: '#fff', 
                        position: 'top'
                    }  
                }]
            },
            options: {
                legend: {
                    display: false,
                    position: 'bottom',
                    onClick: (e) => e.stopPropagation()
                },
                scales: { 
                    xAxes:[{ 
                        display: true,
                        barThickness: 40,  // number (pixels) or 'flex'
                        maxBarThickness: 50 // number (pixels)
                    }],
                    yAxes:[{
                        display: true,
                        ticks: { 
                            beginAtZero: true,
                            callback: function(value, index, values) {
                                return user_currency +  parseInt(value).toLocaleString();
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