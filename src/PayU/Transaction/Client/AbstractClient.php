<?php

namespace PayU\Transaction\Client;

/**
 * Class AbstractClient
 *
 * Abstraction of a person object
 *
 * @package PayU\Transaction\Client
 * @author Lucas Mendes <devsdmf@gmail.com>
 */
abstract class AbstractClient
{

    /**
     * The client id
     *
     * @var integer
     */
    protected $id = null;

    /**
     * The client name
     *
     * @var string
     */
    protected $name = null;

    /**
     * The client email address
     *
     * @var string
     */
    protected $email = null;

    /**
     * The client phone number
     *
     * @var string
     */
    protected $phone = null;

    /**
     * The client document national identification
     *
     * @var string
     */
    protected $dni = null;

    /**
     * The client CNPJ (Enterprises in Brazil)
     *
     * @var string
     */
    protected $cnpj = null;

    /**
     * The client address
     *
     * @var Address
     */
    protected $address = null;

    /**
     * Set the client id
     * @param integer $id
     * @return AbstractClient
     */
    public function setId($id)
    {
        $this->id = (string)$id;

        return $this;
    }

    /**
     * Get the client id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the client name
     *
     * @param string $name
     * @return AbstractClient
     */
    public function setName($name)
    {
        $this->name = (string)$name;

        return $this;
    }

    /**
     * Get the client name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the client email address
     *
     * @param string $email
     * @return AbstractClient
     */
    public function setEmail($email)
    {
        $this->email = (string)$email;

        return $this;
    }

    /**
     * Get the client email address
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the client phone number
     *
     * @param string $phone
     * @return AbstractClient
     */
    public function setPhone($phone)
    {
        $this->phone = (string)$phone;

        return $this;
    }

    /**
     * Get the client phone number
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the client DNI
     *
     * @param string $dni
     * @return AbstractClient
     */
    public function setDni($dni)
    {
        $this->dni = (string)$dni;

        return $this;
    }

    /**
     * Get the client DNI
     *
     * @return string
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set the client CNPJ
     *
     * @param string $cnpj
     * @return AbstractClient
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = (string)$cnpj;

        return $this;
    }

    /**
     * Get the client CNPJ
     *
     * @return string
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * Set the client address
     *
     * @param Address $address
     * @return AbstractClient
     */
    public function setAddress(Address $address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the client address
     *
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }
}