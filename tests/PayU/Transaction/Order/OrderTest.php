<?php

namespace PayU\Transaction\Order;

class OrderTest extends \PHPUnit_Framework_TestCase
{

    public function setUp(){}

    public function testSetOrderAccountId()
    {
        $order = new Order();
        $order->setAccountId('foo');

        $this->assertAttributeEquals('foo','account_id',$order);
    }

    public function testSetOrderReferenceCode()
    {
        $order = new Order();
        $order->setReferenceCode('001002');

        $this->assertAttributeEquals('001002','reference_code',$order);
    }

    public function testSetOrderDescription()
    {
        $order = new Order();
        $order->setDescription('foo description');

        $this->assertAttributeEquals('foo description','description',$order);
    }

    public function testOrderAmount()
    {
        $order = new Order();
        $amount = new Amount(Amount::VALUE,1.00,Currency::BRAZIL);

        $order->addAmount($amount);

        $this->assertEquals(1,$order->getAmountStack()->count());

        $order->removeAmount($amount);

        $this->assertEquals(0,$order->getAmountStack()->count());
    }

    public function testToArray()
    {
        $order = new Order();
        $amount = new Amount(Amount::VALUE,1.00,Currency::BRAZIL);

        $order->setAccountId('foo');
        $order->setReferenceCode('001002');
        $order->setDescription('Foo order');
        $order->addAmount($amount);

        $data = $order->toArray();
        $this->assertArrayHasKey('accountId',$data);
        $this->assertArrayHasKey('referenceCode',$data);
        $this->assertArrayHasKey('description',$data);
        $this->assertArrayHasKey('additionalValues',$data);
        $this->assertArraySubset($amount->toArray(),$data['additionalValues']);

    }
}