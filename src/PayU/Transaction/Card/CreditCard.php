<?php

namespace PayU\Transaction\Card;

use PayU\Entity\EntityInterface;

class CreditCard implements EntityInterface
{

    protected $name = null;

    protected $number = null;

    protected $cvv = null;

    protected $expiration = null;

    public function __construct(){}

    public function setName($name)
    {
        $this->name = (string)$name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setNumber($number)
    {
        $this->number = substr(str_replace([' ','-'],'',$number),0,16);

        return $this;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setCvv($cvv)
    {
        $this->cvv = substr($cvv,0,3);

        return $this;
    }

    public function getCvv()
    {
        return $this->cvv;
    }

    public function setExpirationDate($date)
    {
        $this->expiration = (string)$date;

        return $this;
    }

    public function getExpirationDate()
    {
        return $this->expiration;
    }

    public function toArray()
    {
        return [
            'number'=>$this->number,
            'securityCode'=>$this->cvv,
            'expirationDate'=>$this->expiration,
            'name'=>$this->name
        ];
    }
}