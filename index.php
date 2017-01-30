<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 1/29/17
 * Time: 5:29 PM
 */

include_once ("controller/Controller.php");

$controller = new Controller();

$action = isset($_GET['action']) ? $_GET['action'] : NULL;
switch ($action) {
    case 'overview':
        $controller->invokeOverview();
        break;
    case 'devicesList':
        $controller->invokeDevicesList();
        break;
    case 'analytics':
        $controller->invokeAnalytics();
        break;
    case 'video':
        $controller->invokeVideo();
        break;
    default:
        $controller->invokeOverview();
}



