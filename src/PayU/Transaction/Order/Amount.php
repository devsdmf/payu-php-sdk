<?php

namespace PayU\Transaction\Order;

use PayU\Entity\EntityInterface;

/**
 * Class Amount
 *
 * Amount object wrapper
 *
 * @package PayU\Transaction\Order
 * @author Lucas Mendes <devsdmf@gmail.com>
 */
class Amount implements EntityInterface
{

    /**
     * Available amount contexts
     */
    const VALUE       = 'TX_VALUE';
    const TAX         = 'TX_TAX';
    const RETURN_BASE = 'TX_TAX_RETURN_BASE';

    /**
     * The amount context
     *
     * @var string
     */
    protected $context;

    /**
     * The amount
     *
     * @var float
     */
    protected $value;

    /**
     * The amount currency
     *
     * @var string
     */
    protected $currency;

    /**
     * The Constructor
     *
     * @param string $context
     * @param float  $value
     * @param string $currency
     */
    public function __construct($context, $value, $currency)
    {
        $this->setContext($context);
        $this->setValue($value);
        $this->setCurrency($currency);
    }

    /**
     * Set the amount context
     *
     * @param string $context
     * @return Amount
     */
    public function setContext($context)
    {
        $this->context = (string)$context;

        return $this;
    }

    /**
     * Get the amount context
     *
     * @return string
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * Set the amount value
     *
     * @param float|integer $value
     * @return Amount
     */
    public function setValue($value)
    {
        $this->value = (float)$value;

        return $this;
    }

    /**
     * Get the amount value
     *
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the amount currency
     *
     * @param string $currency
     * @return Amount
     */
    public function setCurrency($currency)
    {
        $this->currency = (string)$currency;

        return $this;
    }

    /**
     * Get the amount currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Export object as array
     *
     * @return array
     */
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
