<?php

namespace PayU\Transaction\Card;

use PayU\Entity\EntityInterface;

/**
 * Class CreditCard
 *
 * Credit Card object wrapper
 *
 * @package PayU\Transaction\Card
 * @author Lucas Mendes <devsdmf@gmail.com>
 */
class CreditCard implements EntityInterface
{

    /**
     * The credit card holder
     *
     * @var string
     */
    protected $name = null;

    /**
     * The credit card number
     *
     * @var string
     */
    protected $number = null;

    /**
     * The credit card cvv
     *
     * @var string
     */
    protected $cvv = null;

    /**
     * The credit card expiration date in format (YYYY-MM)
     *
     * @var string
     */
    protected $expiration = null;

    /**
     * The Constructor
     */
    public function __construct(){}

    /**
     * Set the credit card holder
     *
     * @param string $name
     * @return CreditCard
     */
    public function setName($name)
    {
        $this->name = (string)$name;

        return $this;
    }

    /**
     * Get the credit card holder
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the credit card number
     *
     * @param string $number
     * @return CreditCard
     */
    public function setNumber($number)
    {
        $this->number = substr(str_replace([' ','-'],'',$number),0,16);

        return $this;
    }

    /**
     * Get the credit card number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set the credit card cvv
     *
     * @param string $cvv
     * @return CreditCard
     */
    public function setCvv($cvv)
    {
        $this->cvv = substr($cvv,0,4);

        return $this;
    }

    /**
     * Get the credit card cvv
     *
     * @return string
     */
    public function getCvv()
    {
        return $this->cvv;
    }

    /**
     * Set the credit card expiration date
     *
     * @param string $date
     * @return CreditCard
     */
    public function setExpirationDate($date)
    {
        $this->expiration = (string)$date;

        return $this;
    }

    /**
     * Get the credit card expiration date
     *
     * @return string
     */
    public function getExpirationDate()
    {
        return $this->expiration;
    }

    /**
     * Export object as array
     *
     * @return array
     */
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
