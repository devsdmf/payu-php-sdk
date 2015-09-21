<?php

namespace PayU\Transaction\Order;

use PayU\Entity\EntityInterface;
use PayU\Transaction\Client\Address;
use PayU\Transaction\Client\Buyer;

/**
 * Class Order
 *
 * Order object wrapper
 *
 * @package PayU\Transaction\Order
 * @author Lucas Mendes <devsdmf@gmail.com>
 */
class Order implements EntityInterface
{

    /**
     * The account id
     *
     * @var string
     */
    protected $account_id = null;

    /**
     * The order reference code
     *
     * @var string
     */
    protected $reference_code = null;

    /**
     * The order description
     *
     * @var string
     */
    protected $description = null;

    /**
     * The AmountStack
     *
     * @var AmountStack
     */
    protected $amount;

    /**
     * The order buyer
     * @var Buyer
     */
    protected $buyer = null;

    /**
     * The shipping address
     *
     * @var Address
     */
    protected $shipping = null;

    /**
     * The Constructor
     */
    public function __construct()
    {
        $this->amount = new AmountStack();
    }

    /**
     * Set the account id
     *
     * @param string $id
     * @return Order
     */
    public function setAccountId($id)
    {
        $this->account_id = (string)$id;

        return $this;
    }

    /**
     * Get the account id
     *
     * @return string
     */
    public function getAccountId()
    {
        return $this->account_id;
    }

    /**
     * Set the order reference code
     * @param string $code
     * @return Order
     */
    public function setReferenceCode($code)
    {
        $this->reference_code = (string)$code;

        return $this;
    }

    /**
     * Get the order reference code
     *
     * @return string
     */
    public function getReferenceCode()
    {
        return $this->reference_code;
    }

    /**
     * Set the order description
     *
     * @param string $description
     * @return Order
     */
    public function setDescription($description)
    {
        $this->description = (string)$description;

        return $this;
    }

    /**
     * Get the order description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set an AmountStack
     *
     * @param AmountStack $stack
     * @return Order
     */
    public function setAmountStack(AmountStack $stack)
    {
        $this->amount = $stack;

        return $this;
    }

    /**
     * Get the AmountStack
     *
     * @return AmountStack
     */
    public function getAmountStack()
    {
        return $this->amount;
    }

    /**
     * Add an amount into the AmountStack
     *
     * @param Amount $amount
     * @return Order
     */
    public function addAmount(Amount $amount)
    {
        $this->amount->attach($amount);

        return $this;
    }

    /**
     * Remove an Amount from AmountStack
     *
     * @param Amount $amount
     */
    public function removeAmount(Amount $amount)
    {
        $this->amount->detach($amount);
    }

    /**
     * Set the order buyer
     *
     * @param Buyer $buyer
     * @return Order
     */
    public function setBuyer(Buyer $buyer)
    {
        $this->buyer = $buyer;

        return $this;
    }

    /**
     * Get the order buyer
     *
     * @return Buyer
     */
    public function getBuyer()
    {
        return $this->buyer;
    }

    /**
     * Set the order shipping address
     *
     * @param Address $address
     * @return Order
     */
    public function setShippingAddress(Address $address)
    {
        $this->shipping = $address;

        return $this;
    }

    /**
     * Get the order shipping address
     *
     * @return Address
     */
    public function getShippingAddress()
    {
        return $this->shipping;
    }

    /**
     * Export object as array
     *
     * @return array
     */
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
            'buyer'=>$this->buyer->toArray(),
            'shippingAddress'=>$this->shipping->toArray()
        ];
    }
}