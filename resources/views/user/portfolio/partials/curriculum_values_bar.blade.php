<script>
     var labels = ['Revenue', 'Expenditure','Net Income'];
     var curriculum_values = <?php echo json_encode($asset_finicial_record['curriculum']) ?>;
 
     if(braidCurriculum){
        braidCurriculum.getContext('2d');
        var myExpenditureChart = new Chart(braidCurriculum, {
            type: 'bar',
            data: {      
                labels: labels, 
                datasets: [{
                    data: curriculum_values,
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
                        barThickness: 80,  // number (pixels) or 'flex'
                        maxBarThickness: 90 // number (pixels)
                    }],
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