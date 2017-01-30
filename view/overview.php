<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 1/29/17
 * Time: 10:29 PM
 */

include 'dashboard.php';

?>


    <?php
        echo"
            <h1><span class=\"label label-primary\">
                Nearby devices : <bold>".$number."</bold></span></h1>";
    ?>

    <?php
    
		if ($fillingLevel > 50)
		{
        	echo"
            	<h1><span class=\"label label-success\">
                	Filling Level : <bold>".$fillingLevel."%</bold></span></h1>";
        }
        
		else if ($fillingLevel == 40)
		{
        	echo"
            	<h1><span class=\"label label-warning\">
                	Filling Level : <bold>".$fillingLevel."%</bold></span></h1>";
        }    
		else if ($fillingLevel < 40)
		{
        	echo"
            	<h1><span class=\"label label-danger\">
                	Filling Level : <bold>".$fillingLevel."%</bold></span></h1>";
        }        
   ?>

   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Filling Level', <?php echo $fillingLevel ?>],
        ]);

        var options = {
          width: 500, height: 500,
          redFrom: 0, redTo: 25,
          yellowFrom:25, yellowTo: 50,
          greenFrom:50, greenTo:100,
          minorTicks: 10
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

        chart.draw(data, options);
      }
    </script>

    <div id="chart_div" style="margin-left: 600px; width: 400px; height: 120px;"></div>


<?php

include 'footer.php';
