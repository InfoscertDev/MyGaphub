<script>
    if(braidIncome){
       braidIncome.getContext('2d');
       var myExpenditureChart = new Chart(braidIncome, {
           type: 'line',
           data: {
               labels: labels,
               fill:false,
               datasets: [{
                        label: 'Investments',
                        data: existing_incomes,
                        fill:false,
                        backgroundColor: '#8C8D86',
                        borderColor: '#8C8D86',
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
                               return   parseInt(value).toLocaleString();
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
