<?php

/**
 * Created by PhpStorm.
 * User: nico
 * Date: 1/29/17
 * Time: 5:40 PM
 */
class Device
{
    public $id;
    public $name;
    public $date;
    public $address;

    public function __construct($id, $name, $date, $address)
    {
        $this->id = $id;
        $this->name = $name;
        $this->date = $date;
        $this->address = $address;
    }
}