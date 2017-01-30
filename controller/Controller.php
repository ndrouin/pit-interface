<?php

/**
 * Created by PhpStorm.
 * User: nico
 * Date: 1/29/17
 * Time: 5:31 PM
 */
include_once ("model/Model.php");

class Controller
{
    public $model;

    public function __construct()
    {
        $this->model = new Model("localhost","root","rootroot");
    }

    public function invokeOverview()
    {
        $number = $this->model->getDevicesNumber();
        $fillingLevel = $this->model->getFillingLevel();
        $fillingPercent = 100 - $fillingLevel;
        $lastSensors = $this->model->getLastSensors();
        include 'view/overview.php';
    }

    public function invokeDevicesList()
    {
        $devices = $this->model->getDevices();
        include 'view/listDevices.php';
    }

    public function invokeAnalytics()
    {
        $data = $this->model->generateDevicesJSON();
        include 'view/analytics.php';
    }
}
