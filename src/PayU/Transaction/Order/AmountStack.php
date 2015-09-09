<?php

namespace PayU\Transaction\Order;

class AmountStack extends \SplObjectStorage
{

    public function attach(Amount $amount, $data = null)
    {
        parent::attach($amount,$data);
    }

    public function detach(Amount $amount)
    {
        parent::detach($amount);
    }

    public function addAll(AmountStack $stack)
    {
        parent::addAll($stack);
    }

    public function removeAll(AmountStack $stack)
    {
        parent::removeAll($stack);
    }

    public function removeAllExcept(AmountStack $stack)
    {
        parent::removeAll($stack);
    }
}