<?php

namespace PayU\Transaction\Client;

abstract class AbstractClient
{

    protected $id = null;

    protected $name = null;

    protected $email = null;

    protected $phone = null;

    protected $dni = null;

    protected $cnpj = null;

    protected $address = null;

    public function setId($id)
    {
        $this->id = (string)$id;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = (string)$name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setEmail($email)
    {
        $this->email = (string)$email;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
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

    public function setDni($dni)
    {
        $this->dni = (string)$dni;

        return $this;
    }

    public function getDni()
    {
        return $this->dni;
    }

    public function setCnpj($cnpj)
    {
        $this->cnpj = (string)$cnpj;

        return $this;
    }

    public function getCnpj()
    {
        return $this->cnpj;
    }

    public function setAddress(Address $address)
    {
        $this->address = $address;

        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }
}