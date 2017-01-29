<?php

/**
 * Created by PhpStorm.
 * User: nico
 * Date: 1/29/17
 * Time: 5:33 PM
 */

include_once("Sensor.php");
include_once("Device.php");


class Model
{

    private $server;
    private $username;
    private $password;

    public function __construct($server, $username, $password)
    {
        $this->server = $server;
        $this->username = $username;
        $this->password = $password;
    }

    public function getDevice()
    {

        try {
            $connection = new PDO("mysql:host=$this->server;dbname=IoT_radon", $this->username, $this->password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connection = null;
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }


    }
}