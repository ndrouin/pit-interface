<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 1/29/17
 * Time: 5:45 PM
 */

include 'header.php';
$base_dir  = __DIR__;
$doc_root  = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
$base_url  = preg_replace("!^${doc_root}!", '', $base_dir);
$protocol  = empty($_SERVER['HTTPS']) ? 'http' : 'https';
$port      = $_SERVER['SERVER_PORT'];
$disp_port = ($protocol == 'http' && $port == 80 || $protocol == 'https' && $port == 443) ? '' : ":$port";
$domain    = $_SERVER['SERVER_NAME'];
$full_url  = "${protocol}://${domain}${disp_port}${base_url}";


?>

<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <?php
                echo "<a class=\"navbar-brand\" href=\"/index.php?action=overview\">Shelf.me</a>";
            ?>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
              <?php
                echo "<li><a href=\"../index.php?action=video\">Help</a></li>";
              ?>
          </ul>
        </div>
      </div>
    </nav>

<div class="container-fluid" style="margin-top: 5%;">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <?php
                    echo "<li class=\"active\"><a href=\"/index.php?action=overview\">Overview <span class=\"sr-only\">(current)</span></a></li>";
                    echo "<li><a href=\"../index.php?action=devicesList\">List of the devices</a></li>";
                    echo "<li><a href=\"../index.php?action=analytics\">Analytics</a></li>";
                ?>
            </ul>
        </div>



