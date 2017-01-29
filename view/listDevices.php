<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 1/29/17
 * Time: 8:15 PM
 */

include 'dashboard.php';

?>

<div style="margin-top: 1%;">
    <div class="table-responsive">
        <table class="table table-striped">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Date</th>
            <th>Mac Address</th>
        </tr>
    </thead>
    <tbody>
            <?php
                foreach ($devices as $device)
                {
                    echo "
                    <tr>
                        <td>".$device->getId()."</td>
                        <td>".$device->getName()."</td>
                        <td>".$device->getDate()."</td>
                        <td>".$device->getAddress()."</td>
                    </tr>
                    ";
                }
            ?>
    </tbody>
  </table>
</div>

<?php

include 'footer.php';