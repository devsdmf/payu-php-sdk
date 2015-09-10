<?php

namespace PayU\Transaction\Client;

use PayU\Entity\EntityInterface;

class Payer extends AbstractClient implements EntityInterface
{

    public function __construct(){}

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