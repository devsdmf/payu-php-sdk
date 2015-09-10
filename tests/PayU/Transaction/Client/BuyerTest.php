<?php

namespace PayU\Transaction\Client;

use PayU\Transaction\Country;

class BuyerTest extends \PHPUnit_Framework_TestCase
{

    public function setUp(){}

    public function testToArray()
    {
        $buyer = new Buyer();
        $buyer->setName('Foo')
              ->setId(123)
              ->setPhone('55313131')
              ->setDni('123123')
              ->setCnpj('123123123')
              ->setEmail('foo@bar.com');

        $address = new Address();
        $address->setStreet('St. Foo')
                ->setNumber(123)
                ->setComplement('FOO')
                ->setNeighborhood('Bar Neighborhood')
                ->setCity('Foo City')
                ->setState('Bar State')
                ->setCountry(Country::BRAZIL)
                ->setPhone('55313131');

        $buyer->setAddress($address);

        $data = $buyer->toArray();

        $this->assertArrayHasKey('merchantBuyerId',$data);
        $this->assertArrayHasKey('fullName',$data);
        $this->assertArrayHasKey('emailAddress',$data);
        $this->assertArrayHasKey('contactPhone',$data);
        $this->assertArrayHasKey('dniNumber',$data);
        $this->assertArrayHasKey('cnpj',$data);
        $this->assertArraySubset($address->toArray(),$data['shippingAddress']);
    }
}