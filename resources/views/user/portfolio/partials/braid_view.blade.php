<script>
    if(braidView){
        var labels = ['Business','Risk','Appreciating','Intellectual','Depreciating'];
        braidView.getContext('2d');
        var backgrounds = [ "#8C8D86","#E6C069", "#897B61","#8DAB8E", "#77A2BB"];
        var myCashChart = new Chart(braidView, {
            type: 'pie', 
            data: {    
                labels: labels, 
                datasets: [{
                    data: braid_roi,
                    backgroundColor: backgrounds,   
                    borderColor: backgrounds,  
                    datalabels: {
                        color: '#fff'
                    } 
                }]
            },
            options: {
                legend: {
                    display: true,
                    position: 'bottom',
                    onClick: (e) => e.stopPropagation(),
                    labels: { 
                        boxWidth: 10
                    }
                },
                // legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
                layout: {
                    padding: 10
                },
                onHover: graphHoverEvent,
                onClick: graphClickEvent,
                tooltips: {
                    callbacks: {
                        afterBody: function(t, d) {
                            return '%';
                        }
                    }
                },
                plugins: {  
                    datalabels: {
                        formatter: function(value, context) {
                            return parseInt(value)+ '%';
                        }
                    } 
                },
            }
        }); 
        $("#wrapLegend").html(myCashChart.generateLegend());
    } 
    let segment;
    function graphHoverEvent (evt, elements) {          
        if (elements && elements.length) {
            segment = elements[0];
            this.chart.update();
            selectedIndex = segment["_index"];
            segment._model.outerRadius += 10;
        } else {
            if (segment) {
                segment._model.outerRadius -= 10;
            }
            segment = null;
        }
    } 
    function graphClickEvent(event, activePoints) {
        if (activePoints[0]) {
            var index = activePoints[0]["_index"]; 
            if(index == 0)  window.location = "<?php echo route('portfolio.braid', ['business'])?>";
            if(index == 1)  window.location = "<?php echo route('portfolio.braid', ['risk'])?>";
            if(index == 2)  window.location = "<?php echo route('portfolio.braid', ['appreciating'])?>";
            if(index == 3)  window.location = "<?php echo route('portfolio.braid', ['intellectual'])?>";
            if(index == 4)  window.location = "<?php echo route('portfolio.braid', ['depreciating'])?>";
        }
    }
    function braidReponse(braid){
        window.location = "<?php echo route('portfolio.braid', ["braid"]) ?>";
    }
</script>
{{-- // <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script> --}}