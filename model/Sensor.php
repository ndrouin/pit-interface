<?php

/**
 * Created by PhpStorm.
 * User: nico
 * Date: 1/29/17
 * Time: 5:36 PM
 */
class Sensor
{
    public $id;
    public $value;
    public $date;

    public function __construct($id, $value, $date)
    {
        $this->id = $id;
        $this->value = $value;
        $this->date = $date;
    }
    public function getId()
    {
        return $this->id;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getDate()
    {
        return $this->date;
    }
}
