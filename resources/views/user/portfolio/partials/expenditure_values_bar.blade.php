<script>
     var labels = <?php echo json_encode($asset_finicial_record['expenditure_labels']) ?>;
     var management =  <?php echo json_encode($asset_finicial_record['management']) ?>;
     var taxes =  <?php echo json_encode($asset_finicial_record['taxes']) ?>;
     var maintenance =  <?php echo json_encode($asset_finicial_record['maintenance']) ?>;
     var others =  <?php echo json_encode($asset_finicial_record['others']) ?>; 

     if(braidExpenditureValue){
        braidExpenditureValue.getContext('2d');
        var myExpenditureChart = new Chart(braidExpenditureValue, {
            type: 'bar',
            data: {     
                labels: labels, 
                datasets: [{
                        label: 'Management',
                        data: management,
                        backgroundColor: "#8C8D86",   
                        borderColor: "#8C8D86",  
                        datalabels: {
                            color: '#fff',
                            position: 'top'
                        }  
                    },{
                        label: 'Taxes',
                        data: taxes,
                        backgroundColor: '#E6C069',    
                        borderColor: '#E6C069', 
                        datalabels: {
                            color: '#fff',
                            position: 'top'
                        }  
                    },{
                        label: 'Maintenance',
                        data: maintenance,
                        backgroundColor: '#897B61',   
                        borderColor: '#897B61',  
                        datalabels: {
                            color: '#fff',
                            position: 'top'
                        }  
                    },{
                        label: 'Others',
                        data: others,
                        backgroundColor: '#9796785',   
                        borderColor: '#9796785',  
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
                                return asset_currency +  parseInt(value).toLocaleString();
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
