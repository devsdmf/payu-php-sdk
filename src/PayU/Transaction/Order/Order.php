<?php

namespace PayU\Transaction\Order;

use PayU\Entity\EntityInterface;
use PayU\Transaction\Client\Buyer;

class Order implements EntityInterface
{

    protected $account_id = null;

    protected $reference_code = null;

    protected $description = null;

    protected $amount;

    protected $buyer = null;

    public function __construct()
    {
        $this->amount = new AmountStack();
    }

    public function setAccountId($id)
    {
        $this->account_id = (string)$id;

        return $this;
    }

    public function getAccountId()
    {
        return $this->account_id;
    }

    public function setReferenceCode($code)
    {
        $this->reference_code = (string)$code;

        return $this;
    }

    public function getReferenceCode()
    {
        return $this->reference_code;
    }

    public function setDescription($description)
    {
        $this->description = (string)$description;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setAmountStack(AmountStack $stack)
    {
        $this->amount = $stack;

        return $this;
    }

    public function getAmountStack()
    {
        return $this->amount;
    }

    public function addAmount(Amount $amount)
    {
        $this->amount->attach($amount);

        return $this;
    }

    public function removeAmount(Amount $amount)
    {
        $this->amount->detach($amount);
    }

    public function setBuyer(Buyer $buyer)
    {
        $this->buyer = $buyer;

        return $this;
    }

    public function getBuyer()
    {
        return $this->buyer;
    }

    public function toArray()
    {
        $additionalValues = [];

        foreach ($this->amount as $amount) {
            $additionalValues = array_merge($additionalValues,$amount->toArray());
        }

        return [
            'accountId'=>$this->account_id,
            'referenceCode'=>$this->reference_code,
            'description'=>$this->description,
            'additionalValues'=>$additionalValues,
            'buyer'=>$this->buyer->toArray()
        ];
    }
}