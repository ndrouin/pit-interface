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
            <th>Name</th>
            <th>Mac Address</th>
            <th>Times</th>
        </tr>
    </thead>
    <tbody>
            <?php
                foreach ($devices as $device)
                {
                    echo "
                    <tr>
                        <td>".$device->getName()."</td>
                        <td>".$device->getAddress()."</td>
                        <td>".$device->getNumber()."</td>
                    </tr>
                    ";
                }
            ?>
    </tbody>
  </table>
</div>

<?php

include 'footer.php';