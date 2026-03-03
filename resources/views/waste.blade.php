<script>
    
    function clickLabel(e) {
            this.myRadarChart.scales["y-axis-0"].getValueForPixel();

            console.log(this.myRadarChart.scales["y-axis-0"].getValueForPixel())
            var helpers = Chart.helpers;

            var eventPosition = helpers.getRelativePosition(e, myRadarChart.chart);
            var mouseX = eventPosition.x;
            var mouseY = eventPosition.y;

            var activePoints = []; 
            // loop through all the labels
            helpers.each(this.myRadarChart.scales["y-axis-0"].ticks, function (label, index) {
                for (var i = 7 - 1; i >= 0; i--) {
                    console.log(options.pointLabel);//this.getValueCount()
                    // here we effectively get the bounding box for each label
                    var pointLabelPosition = this.getPointPosition(i, this.getDistanceFromCenterForValue(true ? this.min : this.max) + 5);

                    var pointLabelFontSize = helpers.getValueOrDefault(this.options.pointLabels.fontSize, Chart.defaults.global.defaultFontSize);
                    var pointLabeFontStyle = helpers.getValueOrDefault(this.options.pointLabels.fontStyle, Chart.defaults.global.defaultFontStyle);
                    var pointLabeFontFamily = helpers.getValueOrDefault(this.options.pointLabels.fontFamily, Chart.defaults.global.defaultFontFamily);
                    var pointLabeFont = helpers.fontString(pointLabelFontSize, pointLabeFontStyle, pointLabeFontFamily);
                    ctx.font = pointLabeFont;

                    var labelsCount = this.pointLabels.length,
                        halfLabelsCount = this.pointLabels.length / 2,
                        quarterLabelsCount = halfLabelsCount / 2,
                        upperHalf = (i < quarterLabelsCount || i > labelsCount - quarterLabelsCount),
                        exactQuarter = (i === quarterLabelsCount || i === labelsCount - quarterLabelsCount);
                    var width = ctx.measureText(this.pointLabels[i]).width;
                    var height = pointLabelFontSize;

                    var x, y;

                    if (i === 0 || i === halfLabelsCount)
                        x = pointLabelPosition.x - width / 2;
                    else if (i < halfLabelsCount)
                        x = pointLabelPosition.x;
                    else
                        x = pointLabelPosition.x - width;

                    if (exactQuarter)
                        y = pointLabelPosition.y - height / 2;
                    else if (upperHalf)
                        y = pointLabelPosition.y - height;
                    else
                        y = pointLabelPosition.y

                    // check if the click was within the bounding box
                    if ((mouseY >= y && mouseY <= y + height) && (mouseX >= x && mouseX <= x + width))
                        activePoints.push({ index: i, label: this.pointLabels[i] });
                }
            }, myRadarChart.scale);
            console.log(activePoints)
            var firstPoint = activePoints[0];
            if (firstPoint !== undefined) {
                alert(firstPoint.index + ': ' + firstPoint.label);
            }
        };
</script>