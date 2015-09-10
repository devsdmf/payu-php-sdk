<?php

namespace PayU\Transaction\Client;

use PayU\Entity\EntityInterface;

class Buyer extends AbstractClient implements EntityInterface
{

    public function __construct(){}

    public function toArray()
    {
        return [
            'merchantBuyerId'=>$this->id,
            'fullName'=>$this->name,
            'emailAddress'=>$this->email,
            'contactPhone'=>$this->phone,
            'dniNumber'=>$this->dni,
            'cnpj'=>$this->cnpj,
            'shippingAddress'=>$this->address->toArray()
        ];
    }
}