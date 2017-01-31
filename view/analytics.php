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
                ['Day', 'Number of Devices'],
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

            var data1 = google.visualization.arrayToDataTable([
                ['Hour', 'Number of Devices'],
                <?php
                    echo"['8h',  ".$number8."],";
                echo"['9h',  ".$number9."],";
                echo"['10h',  ".$number10."],";
                echo"['11h',  ".$number11."],";
                echo"['12h',  ".$number12."],";
                echo"['13h',  ".$number13."],";
                echo"['14h',  ".$number14."],";
                echo"['15h',  ".$number15."],";
                echo"['16h',  ".$number16."],";
                echo"['17h',  ".$number17."],";
                echo"['18h',  ".$number18."],";
                echo"['19h',  ".$number19."],";
                echo"['20h',  ".$number20."],";
                echo"['21h',  ".$number21."],";
                echo"['22h',  ".$number22."],";
                ?>

            ]);

            var options = {
                title: 'Evolution of the number of devices during the last 7 days',
                curveType: 'none',
                legend: { position: 'bottom' }
            };

            var options1 = {
                title: 'Evolution of the number of devices during the current day',
                curveType: 'none',
                legend: { position: 'bottom' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
            var chart1 = new google.visualization.LineChart(document.getElementById('curve_chart1'));

            chart.draw(data, options);
            chart1.draw(data1, options1);
        }


    </script>
<div class="container">
    <div class="row">
        <div id="curve_chart" style="margin-left: 120px; width: 1300px; height: 350px"></div>
        <div id="curve_chart1" style="margin-left: 120px; width: 1300px; height: 350px"></div>
    </div>
</div>

<?php



include 'footer.php';





