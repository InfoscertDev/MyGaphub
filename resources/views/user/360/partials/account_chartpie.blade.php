<script>
    $(".list-toggle").click(function() {
        // Move up DOM tree to nearest list
        // Toggle collapsed and expanded classes
        $(this).closest("ul").toggleClass("list-toggled").toggleClass("expanded");

    });
    if(ctx){
        ctx.getContext('2d');
        var myCashChart = new Chart(ctx, {
            type: 'pie', 
            data: {    
                labels: labels, 
                datasets: [{
                    data: values,
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
                    position: 'bottom',
                    labels: {
                        boxWidth: 10
                    }
                },
                // legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
                layout: {
                    padding: 15
                },
                callback: function(value, index, values) {
                    return '$' + parseInt(value).toLocaleString();
                }, 
                onHover: graphHoverEvent,
                onClick: graphClickEvent,
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
            editAccount(index);
        }
    }
</script>