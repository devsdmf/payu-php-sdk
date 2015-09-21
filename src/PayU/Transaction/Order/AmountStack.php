<?php

namespace PayU\Transaction\Order;

/**
 * Class AmountStack
 *
 * Stack amount objects in a ObjectStorage implementation
 *
 * @package PayU\Transaction\Order
 * @author Lucas Mendes <devsdmf@gmail.com>
 */
class AmountStack extends \SplObjectStorage
{

    /**
     * Attach an Amount object
     *
     * @param Amount $amount
     * @param string $data
     */
    public function attach(Amount $amount, $data = null)
    {
        parent::attach($amount,$data);
    }

    /**
     * Detach an Amount object
     *
     * @param Amount $amount
     */
    public function detach(Amount $amount)
    {
        parent::detach($amount);
    }

    /**
     * Merge an AmountStack
     *
     * @param AmountStack $stack
     */
    public function addAll(AmountStack $stack)
    {
        parent::addAll($stack);
    }

    /**
     * Remove a stack of Amount objects
     *
     * @param AmountStack $stack
     */
    public function removeAll(AmountStack $stack)
    {
        parent::removeAll($stack);
    }

    /**
     * Remove all Amount objects except
     *
     * @param AmountStack $stack
     */
    public function removeAllExcept(AmountStack $stack)
    {
        parent::removeAll($stack);
    }
}