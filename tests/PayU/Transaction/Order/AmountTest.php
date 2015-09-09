<?php

namespace PayU\Transaction\Order;

class AmountTest extends \PHPUnit_Framework_TestCase
{

    protected $amount;

    public function setUp(){}

    public function testAmountInitializing()
    {
        $amount = new Amount(Amount::VALUE,1.00,Currency::BRAZIL);

        $this->assertInstanceOf('\PayU\Transaction\Order\Amount',$amount);
        $this->assertAttributeEquals(Amount::VALUE,'context',$amount);
        $this->assertAttributeEquals(1.00,'value',$amount);
        $this->assertAttributeEquals(Currency::BRAZIL,'currency',$amount);
    }

    public function testGetContext()
    {
        $amount = new Amount(Amount::TAX,1.00,Currency::BRAZIL);
        $this->assertEquals(Amount::TAX,$amount->getContext());
    }

    public function testGetValue()
    {
        $amount = new Amount(Amount::VALUE,100.00,Currency::BRAZIL);
        $this->assertEquals(100.00,$amount->getValue());
    }

    public function testGetCurrency()
    {
        $amount = new Amount(Amount::TAX,1.00,Currency::ARGENTINA);
        $this->assertEquals(Currency::ARGENTINA,$amount->getCurrency());
    }

    public function testToArray()
    {
        $amount = new Amount(Amount::VALUE,1.00,Currency::BRAZIL);
        $data = $amount->toArray();

        $this->assertArrayHasKey(Amount::VALUE,$data);
        $this->assertArraySubset(['value'=>1.00],$data[Amount::VALUE]);
        $this->assertArraySubset(['currency'=>Currency::BRAZIL],$data[Amount::VALUE]);
    }
}