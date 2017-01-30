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
        $currentDevices = $this->model->getDevicesCurrentDay();
        $currentDate = date_format(new DateTime($currentDevices->offsetGet(0)->getDate()), 'Y-m-d');
        $currentNumber = $currentDevices->count();
        $devices0 = $this->model->getDevicesByDay("6");
        $devices1 = $this->model->getDevicesByDay("5");
        $devices2 = $this->model->getDevicesByDay("4");
        $devices3 = $this->model->getDevicesByDay("3");
        $devices4 = $this->model->getDevicesByDay("2");
        $devices5 = $this->model->getDevicesByDay("1");
        $date0 = date("Y-m-d",strtotime("-6 day"));
        $date1 = date("Y-m-d",strtotime("-5 day"));
        $date2 = date("Y-m-d",strtotime("-4 day"));
        $date3 = date("Y-m-d",strtotime("-3 day"));
        $date4 = date("Y-m-d",strtotime("-2 day"));
        $date5 = date("Y-m-d",strtotime("-1 day"));
        $number0 = $devices0->count();
        $number1 = $devices1->count();
        $number2 = $devices2->count();
        $number3 = $devices3->count();
        $number4 = $devices4->count();
        $number5 = $devices5->count();
        include 'view/analytics.php';
    }
}
