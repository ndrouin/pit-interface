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
            $db = null;
            return $result;
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getDevicesNumber()
    {
        try {
            $db = new PDO("mysql:host=$this->server;dbname=IoT_radon", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT id, name, date, bt_addr FROM bt_devices WHERE UNIX_TIMESTAMP(date) > UNIX_TIMESTAMP(CURRENT_TIMESTAMP - INTERVAL 1 MINUTE) ";
            $result = new ArrayObject();
            foreach ($db->query($query) as $row)
            {
                    $result->append($row);
            }
            $db = null;
            return $result->count();
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function generateDevicesJSON()
    {
        try {
            $db = new PDO("mysql:host=$this->server;dbname=IoT_radon", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "SELECT id, name, date, bt_addr FROM bt_devices";
            $result = array();
            foreach ($db->query($query) as $row)
            {
                $result[] = $row;
            }
            $db = null;
            return json_encode($result);
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function getLastSensors()
    {

        try {
            $db = new PDO("mysql:host=$this->server;dbname=IoT_radon", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "	SELECT t.sensor_id, t.value, t.date
						FROM sensors t
						INNER JOIN (
    						SELECT sensor_id, max(date) AS MaxDate
    						FROM sensors
    						GROUP BY sensor_id
						) tm ON t.sensor_id = tm.sensor_id AND t.date = tm.MaxDate";
            $result = new ArrayObject();
            foreach ($db->query($query) as $row)
            {
                $lastSensors = new Sensor($row["sensor_id"], $row["value"], $row["date"]);
                $result->append($lastSensors);
            }
            $db = null;
            return $result;
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    
    public function getFillingLevel()
    {

        try {
            $db = new PDO("mysql:host=$this->server;dbname=IoT_radon", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "	SELECT t.sensor_id, t.value, t.date
						FROM sensors t
						INNER JOIN (
    						SELECT sensor_id, max(date) AS MaxDate
    						FROM sensors
    						GROUP BY sensor_id
						) tm ON t.sensor_id = tm.sensor_id AND t.date = tm.MaxDate";
            $result = 0;
            foreach ($db->query($query) as $row)
            {
                if ($row["value"] >= 30)
                {
                	$result += 20;
                }
            }
            $db = null;
            return $result;
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
