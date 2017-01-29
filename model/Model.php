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

    public function __construct($server, $username, $password)
    {
        $this->$server = $server;
        $this->$username= $username;
        $this->$password = $password;

        try {
            $conn = new PDO("mysql:host=$server;dbname=IoT_radon", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}