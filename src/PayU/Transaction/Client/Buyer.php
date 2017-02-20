<?php

namespace PayU\Transaction\Client;

use PayU\Entity\EntityInterface;

/**
 * Class Buyer
 *
 * Buyer object wrapper
 *
 * @package PayU\Transaction\Client
 * @author Lucas Mendes <devsdmf@gmail.com>
 */
class Buyer extends AbstractClient implements EntityInterface
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