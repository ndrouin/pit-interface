<?php

/**
 * Created by PhpStorm.
 * User: nico
 * Date: 1/29/17
 * Time: 5:40 PM
 */
class Device
{
    private $id;
    private $name;
    private $date;
    private $address;

    public function __construct($id, $name, $date, $address)
    {
        $this->id = $id;
        $this->name = $name;
        $this->date = $date;
        $this->address = $address;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getAddress()
    {
        return $this->address;
    }
}