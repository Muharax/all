<div style="background-color:white;padding:20px; border-radius:15px;">
<div id="chart3"></div>
</div>

<div style="background-color:white;padding:20px; border-radius:15px;">
<div id="chart2"></div>
</div>

<div style="background-color:white;padding:20px; border-radius:15px;">
<div id="chart1"></div>
</div>

<div style="background-color:white;padding:20px; border-radius:15px;">
<div id="chart4"></div>
</div>




<script>
// $(document).ready(function(){
     
    // var arr = [[10, 10, 2000, "MARELLI"], [50, 50, 3000, "Alfa Romeo"]];
     
    // plot3 = $.jqplot('chart3',[arr],{
        // title: 'TABELA PUNKTÓW',
        // seriesDefaults:{
            // renderer: $.jqplot.BubbleRenderer,
            // rendererOptions: {
                // autoscalePointsFactor: 0,
                // autoscaleMultiplier: 0.85,
                // highlightMouseDown: true,
                // bubbleAlpha: 0.7
            // },
            // shadow: true,
            // shadowAlpha: 0.05
        // }
    // });
     
// });

$(document).ready(function(){
 
    var arr = [[11, 123, 1236, "Acura"], [45, 92, 1067, "Alfa Romeo"], 
    [24, 104, 1176, "AM General"], [50, 23, 610, "Aston Martin Lagonda"], 
    [18, 17, 539, "Audi"], [7, 89, 864, "BMW"], [2, 13, 1026, "Bugatti"]];
     
    plot2 = $.jqplot('chart2',[arr],{
        title: 'Bubble Gradient Fills*',
        seriesDefaults:{
            renderer: $.jqplot.BubbleRenderer,
            rendererOptions: {
                bubbleGradients: true
            },
            shadow: true
        }
    });
     
});


// $(document).ready(function(){
    // A Bar chart from a single series will have all the bar colors the same.
    // var line1 = [['Nissan', 4],['Porche', 6],['Acura', 2],['Aston Martin', 5],['Rolls Royce', 6]];
 
    // $('#chart1').jqplot([line1], {
        // title:'Default Bar Chart',
        // seriesDefaults:{
            // renderer:$.jqplot.BarRenderer
        // },
        // axes:{
            // xaxis:{
                // renderer: $.jqplot.CategoryAxisRenderer
            // }
        // }
    // });
// });


$(document).ready(function () {
  s1 = [[0, 2], [1, 6], [2, 7], [3, 10]];
 
  // Lines can be drawn as solid, dashed or dotted with the "linePattern" option.
  // The default is "solid".  Other basic options are "dashed" and "dotted".
 
  plot1 = $.jqplot("chart4", [s1], {
    seriesDefaults:{
        linePattern: 'solid',
        showMarker: false,
        shadow: false
    }
  });
});


</script>
