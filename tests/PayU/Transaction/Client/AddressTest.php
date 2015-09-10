<?php

namespace PayU\Transaction\Client;

class AddressTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
    }

    public function testSetStreet()
    {
        $address = new Address();
        $address->setStreet('foo street');

        $this->assertAttributeEquals('foo street', 'street', $address);
    }

    public function testSetNumber()
    {
        $address = new Address();
        $address->setNumber(123);

        $this->assertAttributeEquals(123, 'number', $address);
    }

    public function testSetComplement()
    {
        $address = new Address();
        $address->setComplement('comp');

        $this->assertAttributeEquals('comp', 'complement', $address);
    }

    public function testSetNeighborhood()
    {
        $address = new Address();
        $address->setNeighborhood('neighborfoo');

        $this->assertAttributeEquals('neighborfoo', 'neighborhood', $address);
    }

    public function testSetCity()
    {
        $address = new Address();
        $address->setCity('foo city');

        $this->assertAttributeEquals('foo city', 'city', $address);
    }

    public function testSetState()
    {
        $address = new Address();
        $address->setState('bar state');

        $this->assertAttributeEquals('bar state', 'state', $address);
    }

    public function testSetCountry()
    {
        $address = new Address();
        $address->setCountry(Country::BRAZIL);

        $this->assertAttributeEquals(Country::BRAZIL,'country',$address);
    }

    public function testSetZipCode()
    {
        $address = new Address();
        $address->setZipCode('313131');

        $this->assertAttributeEquals('313131','zip_code',$address);
    }

    public function testSetPhone()
    {
        $address = new Address();
        $address->setPhone('55313131');

        $this->assertAttributeEquals('55313131','phone',$address);
    }

    public function testToArray()
    {
        $address = new Address();
        $address->setStreet('St. Foo')
                ->setNumber(1200)
                ->setComplement('FOO')
                ->setNeighborhood('Bar neighborhood')
                ->setCity('Foo City')
                ->setState('Bar State')
                ->setCountry(Country::BRAZIL)
                ->setPhone('55313131');

        $data = $address->toArray();

        $this->assertArrayHasKey('street1',$data);
        $this->assertArrayHasKey('street2',$data);
        $this->assertArrayHasKey('city',$data);
        $this->assertArrayHasKey('state',$data);
        $this->assertArrayHasKey('country',$data);
        $this->assertArrayHasKey('postalCode',$data);
        $this->assertArrayHasKey('phone',$data);

        $this->assertContains('St. Foo',$data['street1']);
        $this->assertContains('1200',$data['street1']);
        $this->assertContains('FOO',$data['street1']);
        $this->assertContains('Bar neighborhood',$data['street2']);
    }
}