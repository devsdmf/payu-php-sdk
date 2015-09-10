<?php

namespace PayU\Transaction\Client;

use PayU\Entity\EntityInterface;

class Address implements EntityInterface
{

    protected $street = null;

    protected $number = null;

    protected $complement = null;

    protected $neighborhood = null;

    protected $city = null;

    protected $state = null;

    protected $country = null;

    protected $zip_code = null;

    protected $phone = null;

    public function __construct(){}

    public function setStreet($street)
    {
        $this->street = (string)$street;

        return $this;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function setNumber($number)
    {
        $this->number = (string)$number;

        return $this;
    }

    public function getNumber()
    {
        return $this->getNumber();
    }

    public function setComplement($complement)
    {
        $this->complement = (string)$complement;

        return $this;
    }

    public function getComplement()
    {
        return $this->complement;
    }

    public function setNeighborhood($neighborhood)
    {
        $this->neighborhood = (string)$neighborhood;

        return $this;
    }

    public function getNeighborhood()
    {
        return $this->neighborhood;
    }

    public function setCity($city)
    {
        $this->city = (string)$city;

        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setState($state)
    {
        $this->state = (string)$state;

        return $this;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setCountry($country)
    {
        $this->country = (string)$country;

        return $this;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setZipCode($zip)
    {
        $this->zip_code = (string)$zip;

        return $this;
    }

    public function getZipCode()
    {
        return $this->zip_code;
    }

    public function setPhone($phone)
    {
        $this->phone = (string)$phone;

        return $this;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function toArray()
    {
        $address = $this->street . ', ' . $this->number . ((!is_null($this->complement)) ? ' - ' . $this->complement : '');
        return [
            'street1'=>$address,
            'street2'=>$this->neighborhood,
            'city'=>$this->city,
            'state'=>$this->state,
            'country'=>$this->country,
            'postalCode'=>$this->zip_code,
            'phone'=>$this->phone
        ];
    }
}