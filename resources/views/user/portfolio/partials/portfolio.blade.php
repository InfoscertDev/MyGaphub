<script>
    if(portfolioIncome){
       portfolioIncome.getContext('2d');
       var myChart = new Chart(portfolioIncome, {
           type: 'line',
           data: {    
               labels: labels, 
               fill:false, 
               datasets: [{ 
                        label: 'Portfolio',
                        data: portfolio,
                        fill:false,
                        // backgroundColor: backgrounds,   
                        // borderColor: backgrounds,  
                        datalabels: {
                            color: '#fff',
                            position: 'top'
                        }  
                    },{
                        label: 'Non Portfolio',
                        data: non_portfolio,
                        fill:false,
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
                spanGaps: true,
                bezierCurve : false,
                tooltips: {
                    enabled: false
                },
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
                               return  user_currency +  parseInt(value).toLocaleString();
                           }
                       },
                   }]
               }
           }
       });
   } 
</script>