<?php

namespace PayU\Transaction\Order;

use PayU\Entity\EntityInterface;

class Amount implements EntityInterface
{

    const VALUE       = 'TX_VALUE';
    const TAX         = 'TX_TAX';
    const RETURN_BASE = 'TX_TAX_RETURN_BASE';

    protected $context;

    protected $value;

    protected $currency;

    public function __construct($context, $value, $currency)
    {
        $this->setContext($context);
        $this->setValue($value);
        $this->setCurrency($currency);
    }

    private function setContext($context)
    {
        $this->context = (string)$context;
    }

    public function getContext()
    {
        return $this->context;
    }

    private function setValue($value)
    {
        $this->value = (float)$value;
    }

    public function getValue()
    {
        return $this->value;
    }

    private function setCurrency($currency)
    {
        $this->currency = (string)$currency;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function toArray()
    {
        return [
            $this->context=>[
                'value'=>$this->value,
                'currency'=>$this->currency
            ]
        ];
    }
}
