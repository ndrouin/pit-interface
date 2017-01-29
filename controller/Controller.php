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
        include 'view/overview.php';
    }

    public function invokeDevicesList()
    {
        $devices = $this->model->getDevices();
        include 'view/listDevices.php';
    }
}