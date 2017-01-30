<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 1/29/17
 * Time: 10:29 PM
 */

include 'dashboard.php';

?>

    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Year', 'Devices', 'Capacity'],
                <?php
                    echo"['".$date0."',  ".$number0.",      400],";
                    echo"['".$date1."',  ".$number1.",      400],";
                    echo"['".$date2."',  ".$number2.",      400],";
                    echo"['".$date3."',  ".$number3.",      400],";
                    echo"['".$date4."',  ".$number4.",      400],";
                    echo"['".$date5."',  ".$number5.",      400],";
                    echo"['".$currentDate."',  ".$currentNumber.",      400],";
                ?>

            ]);

            var options = {
                title: 'Evolution of the umber of devices on the week',
                curveType: 'function',
                legend: { position: 'bottom' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }
    </script>

<div id="curve_chart" style="margin-left: 200px; width: 1300px; height: 700px"></div>

<?php



include 'footer.php';





