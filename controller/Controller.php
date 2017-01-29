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
        $this->model = new Model();
        $this->model->connection("localhost","root","rootroot");
    }

    public function invoke()
    {
        include 'view/helloWorld.php';
    }
}