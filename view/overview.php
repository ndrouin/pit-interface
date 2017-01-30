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
        echo"
            <h1><span class=\"label label-primary\">
                Filling Level : <bold>".$fillingLevel."</bold></span></h1>";
    ?>


	<div style="margin-top: 1%;">
    	<div class="table-responsive">
        	<table class="table table-striped">
    	<thead>
        	<tr>
            	<th>id</th>
	            <th>value</th>
    	        <th>Date</th>
        	</tr>
	    </thead>
    	<tbody>
            <?php
                foreach ($lastSensors as $lastSensor)
                {
                    echo "
                    <tr>
                        <td>".$lastSensor->getId()."</td>
                        <td>".$lastSensor->getValue()."</td>
                        <td>".$lastSensor->getDate()."</td>
                    </tr>
                    ";
                }
            ?>
    	</tbody>
  	</table>
	</div>

<?php

include 'footer.php';
