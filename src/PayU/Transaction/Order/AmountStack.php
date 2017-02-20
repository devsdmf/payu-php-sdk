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
    public function attach($amount, $data = null)
    {
        if ($this->validateAmountObject($amount)) {
            parent::attach($amount,$data);
        }
    }

    /**
     * Detach an Amount object
     *
     * @param Amount $amount
     */
    public function detach($amount)
    {
        if ($this->validateAmountObject($amount)) {
            parent::detach($amount);
        }
    }

    /**
     * Merge an AmountStack
     *
     * @param AmountStack $stack
     */
    public function addAll($stack)
    {
        if ($this->validateAmountStackObject($stack)) {
            parent::addAll($stack);
        }
    }

    /**
     * Remove a stack of Amount objects
     *
     * @param AmountStack $stack
     */
    public function removeAll($stack)
    {
        if ($this->validateAmountStackObject($stack)) {
            parent::removeAll($stack);
        }
    }

    /**
     * Remove all Amount objects except
     *
     * @param AmountStack $stack
     */
    public function removeAllExcept($stack)
    {
        if ($this->validateAmountStackObject($stack)) {
            parent::removeAll($stack);
        }
    }

    /**
     * Validate the given Amount object
     *
     * @param Amount $amount
     * @return bool
     */
    private function validateAmountObject($amount)
    {
        if ($amount instanceof Amount) {
            return true;
        } else {
            throw new \InvalidArgumentException('Expected \PayU\Transaction\Order\Amount, given ' . gettype($amount));
        }
    }

    /**
     * Validate the give AmountStack object
     *
     * @param AmountStack $stack
     * @return bool
     */
    private function validateAmountStackObject($stack)
    {
        if ($stack instanceof AmountStack) {
            return true;
        } else {
            throw new \InvalidArgumentException('Expected \PayU\Transaction\Order\AmountStack, given ' . gettype($stack));
        }
    }
}