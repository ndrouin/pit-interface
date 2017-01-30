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
        if ($currentDevices->count() == 0)
            $currentDate = date("Y-m-d");
        else
            $currentDate = date_format(new DateTime($currentDevices->offsetGet(0)->getDate()), 'Y-m-d');

        $currentNumber = $currentDevices->count();

        $number0 = $this->model->getDevicesByDay("6")->count();
        $number1 = $this->model->getDevicesByDay("5")->count();
        $number2 = $this->model->getDevicesByDay("4")->count();
        $number3 = $this->model->getDevicesByDay("3")->count();
        $number4 = $this->model->getDevicesByDay("2")->count();
        $number5 = $this->model->getDevicesByDay("1")->count();

        $date0 = date("Y-m-d",strtotime("-6 day"));
        $date1 = date("Y-m-d",strtotime("-5 day"));
        $date2 = date("Y-m-d",strtotime("-4 day"));
        $date3 = date("Y-m-d",strtotime("-3 day"));
        $date4 = date("Y-m-d",strtotime("-2 day"));
        $date5 = date("Y-m-d",strtotime("-1 day"));

        $number8 = $this->model->getDevicesByHour(9)->count();
        $number9 = $this->model->getDevicesByHour(10)->count();
        $number10 = $this->model->getDevicesByHour(11)->count();
        $number11 = $this->model->getDevicesByHour(12)->count();
        $number12 = $this->model->getDevicesByHour(13)->count();
        $number13 = $this->model->getDevicesByHour(14)->count();
        $number14 = $this->model->getDevicesByHour(15)->count();
        $number15 = $this->model->getDevicesByHour(16)->count();
        $number16 = $this->model->getDevicesByHour(17)->count();
        $number17 = $this->model->getDevicesByHour(18)->count();
        $number18 = $this->model->getDevicesByHour(19)->count();
        $number19 = $this->model->getDevicesByHour(20)->count();
        $number20 = $this->model->getDevicesByHour(21)->count();
        $number21 = $this->model->getDevicesByHour(22)->count();
        $number22 = $this->model->getDevicesByHour(23)->count();


        include 'view/analytics.php';
    }

    public function invokeVideo()
    {
        include 'view/video.php';
    }
}
