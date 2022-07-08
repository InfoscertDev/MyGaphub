<script>
     var expenditure =<?php echo json_encode($asset_finicial_detail['expenditure']) ?>;;
     var revenue = <?php echo json_encode($asset_finicial_detail['revenue']) ?>;;
     var income = <?php echo json_encode($asset_finicial_detail['net']) ?>;;
     if(braidValue){
        braidValue.getContext('2d');
        var myExpenditureChart = new Chart(braidValue, {
            type: 'bar',
            data: {    
                labels: labels, 
                datasets: [{
                        label: 'Revenue', 
                        data: revenue,
                        backgroundColor: "#8C8D86",    
                        borderColor: "#8C8D86", 
                        datalabels: {
                            color: '#fff',
                            position: 'top'
                        }  
                    },{
                        label: 'Expenditure',
                        data: expenditure,
                        backgroundColor: '#E6C069',    
                        borderColor: '#E6C069', 
                        datalabels: {
                            color: '#fff',
                            position: 'top'
                        }  
                    },{
                        label: 'Net Income',
                        data: income,
                        backgroundColor: '#897B61',   
                        borderColor: '#897B61',  
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
                    onClick: (e) => e.stopPropagation()
                },
                scales: { 
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