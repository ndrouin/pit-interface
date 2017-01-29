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

    public function getDevices()
    {

        try {
            $db = new PDO("mysql:host=$this->server;dbname=IoT_radon", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT id, name, date, bt_addr FROM bt_devices";
            $result = new ArrayObject();
            foreach ($db->query($query) as $row)
            {
                $device = new Device($row["id"], $row["name"], $row["date"], $row["bt_addr"]);
                $result->append($device);
            }
            return $result;
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }


    }
}