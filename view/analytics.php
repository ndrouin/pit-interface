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
                ['Year', 'Devices'],
                <?php
                    echo"['".$date0."',  ".$number0."],";
                    echo"['".$date1."',  ".$number1."],";
                    echo"['".$date2."',  ".$number2."],";
                    echo"['".$date3."',  ".$number3."],";
                    echo"['".$date4."',  ".$number4."],";
                    echo"['".$date5."',  ".$number5."],";
                    echo"['".$currentDate."',  ".$currentNumber."],";
                ?>

            ]);

            var options = {
                title: 'Evolution of the umber of devices on the week',
                curveType: 'function',
                legend: { position: 'bottom' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
            var chart1 = new google.visualization.LineChart(document.getElementById('curve_chart1'));

            chart.draw(data, options);
            chart1.draw(data, options);
        }


    </script>
<div class="container">
    <div class="row">
        <div id="curve_chart" style="margin-left: 50px; width: 1300px; height: 350px"></div>
        <div id="curve_chart1" style="margin-left: 50px; width: 1300px; height: 350px"></div>
    </div>
</div>

<?php



include 'footer.php';





