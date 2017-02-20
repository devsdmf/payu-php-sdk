<?php

namespace PayU\Transaction\Client;

use PayU\Entity\EntityInterface;

/**
 * Class Address
 *
 * Address object wrapper
 *
 * @package PayU\Transaction\Client
 * @author Lucas Mendes <devsdmf@gmail.com>
 */
class Address implements EntityInterface
{

    /**
     * The street
     *
     * @var string
     */
    protected $street = null;

    /**
     * The residence number
     *
     * @var string
     */
    protected $number = null;

    /**
     * The complement
     *
     * @var string
     */
    protected $complement = null;

    /**
     * The neighborhood
     *
     * @var string
     */
    protected $neighborhood = null;

    /**
     * The city
     *
     * @var string
     */
    protected $city = null;

    /**
     * The state
     *
     * @var string
     */
    protected $state = null;

    /**
     * The country
     *
     * @var string
     */
    protected $country = null;

    /**
     * The zip code (or postal code)
     *
     * @var string
     */
    protected $zip_code = null;

    /**
     * The contact phone number
     *
     * @var string
     */
    protected $phone = null;

    /**
     * The Constructor
     */
    public function __construct(){}

    /**
     * Set the street
     * @param string $street
     * @return Address
     */
    public function setStreet($street)
    {
        $this->street = (string)$street;

        return $this;
    }

    /**
     * Get the street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set the residence number
     *
     * @param string $number
     * @return Address
     */
    public function setNumber($number)
    {
        $this->number = (string)$number;

        return $this;
    }

    /**
     * Get the residence number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->getNumber();
    }

    /**
     * Set the complement
     *
     * @param string $complement
     * @return Address
     */
    public function setComplement($complement)
    {
        $this->complement = (string)$complement;

        return $this;
    }

    /**
     * Get the complement
     *
     * @return string
     */
    public function getComplement()
    {
        return $this->complement;
    }

    /**
     * Set the neighborhood
     *
     * @param string $neighborhood
     * @return Address
     */
    public function setNeighborhood($neighborhood)
    {
        $this->neighborhood = (string)$neighborhood;

        return $this;
    }

    /**
     * Get the neighborhood
     *
     * @return string
     */
    public function getNeighborhood()
    {
        return $this->neighborhood;
    }

    /**
     * Set the city
     *
     * @param string $city
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = (string)$city;

        return $this;
    }

    /**
     * Get the city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the state
     *
     * @param string $state
     * @return Address
     */
    public function setState($state)
    {
        $this->state = (string)$state;

        return $this;
    }

    /**
     * Get the state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set the country
     *
     * @param string $country
     * @return Address
     */
    public function setCountry($country)
    {
        $this->country = (string)$country;

        return $this;
    }

    /**
     * Get the country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set the zio code
     *
     * @param string $zip
     * @return Address
     */
    public function setZipCode($zip)
    {
        $this->zip_code = (string)$zip;

        return $this;
    }

    /**
     * Get the zip code
     *
     * @return string
     */
    public function getZipCode()
    {
        return $this->zip_code;
    }

    /**
     * Set the contact phone number
     *
     * @param string $phone
     * @return Address
     */
    public function setPhone($phone)
    {
        $this->phone = (string)$phone;

        return $this;
    }

    /**
     * Get the contact phone number
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Export object as array
     *
     * @return array
     */
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