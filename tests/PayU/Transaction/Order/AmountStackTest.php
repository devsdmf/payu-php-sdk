<?php

namespace PayU\Transaction\Order;

use PayU\Transaction\Currency;

class AmountStackTest extends \PHPUnit_Framework_TestCase
{

    public function setUp(){}

    public function testInitializeStack()
    {
        $stack = new AmountStack();
        $this->assertInstanceOf('\PayU\Transaction\Order\AmountStack',$stack);
    }

    public function testAttachDetachAmount()
    {
        $stack = new AmountStack();
        $amount = new Amount(Amount::VALUE,1.00,Currency::BRAZIL);

        $stack->attach($amount);

        $this->assertEquals(1,$stack->count());

        $stack->detach($amount);

        $this->assertEquals(0,$stack->count());
    }
}