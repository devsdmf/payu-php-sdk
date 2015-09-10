<?php

namespace PayU\Transaction\Order;

use PayU\Transaction\Client\Address;
use PayU\Transaction\Client\Buyer;
use PayU\Transaction\Client\Country;

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

        $order->setAccountId('foo')
              ->setReferenceCode('001002')
              ->setDescription('Foo order');

        $amount = new Amount(Amount::VALUE,1.00,Currency::BRAZIL);

        $order->addAmount($amount);

        $buyer = $this->createBuyer();

        $order->setBuyer($buyer);

        $address = $this->createAddress();

        $order->setShippingAddress($address);

        $data = $order->toArray();
        $this->assertArrayHasKey('accountId',$data);
        $this->assertArrayHasKey('referenceCode',$data);
        $this->assertArrayHasKey('description',$data);
        $this->assertArrayHasKey('additionalValues',$data);
        $this->assertArraySubset($amount->toArray(),$data['additionalValues']);
        $this->assertArraySubset($buyer->toArray(),$data['buyer']);
        $this->assertArraySubset($address->toArray(),$data['shippingAddress']);
    }

    public function createBuyer()
    {
        $buyer = new Buyer();
        $buyer->setName('Foo')
            ->setId(123)
            ->setPhone('55313131')
            ->setDni('123123')
            ->setCnpj('123123123')
            ->setEmail('foo@bar.com')
            ->setAddress($this->createAddress());

        return $buyer;
    }

    public function createAddress()
    {
        $address = new Address();
        $address->setStreet('St. Foo')
                ->setNumber(123)
                ->setComplement('FOO')
                ->setNeighborhood('Bar Neighborhood')
                ->setCity('Foo City')
                ->setState('Bar State')
                ->setCountry(Country::BRAZIL)
                ->setPhone('55313131');

        return $address;
    }
}