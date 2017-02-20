<?php

namespace PayU\Transaction\Client;

use PayU\Entity\EntityInterface;

/**
 * Class Payer
 *
 * Payer object wrapper
 *
 * @package PayU\Transaction\Client
 */
class Payer extends AbstractClient implements EntityInterface
{

    /**
     * The Constructor
     */
    public function __construct(){}

    /**
     * Export object as array
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'merchantPayerId'=>$this->id,
            'fullName'=>$this->name,
            'emailAddress'=>$this->email,
            'contactPhone'=>$this->phone,
            'dniNumber'=>$this->dni,
            'billingAddress'=>$this->address->toArray()
        ];
    }
}