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
    private $number;

    public function __construct($id, $name, $date, $address, $number)
    {
        $this->id = $id;
        $this->name = $name;
        $this->date = $date;
        $this->address = $address;
        $this->number = $number;
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

    public function getNumber()
    {
        return $this->number;
    }
}