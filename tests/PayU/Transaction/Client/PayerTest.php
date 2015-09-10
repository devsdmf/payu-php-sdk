<?php

namespace PayU\Transaction\Client;

use PayU\Transaction\Country;

class PayerTest extends \PHPUnit_Framework_TestCase
{

    public function setUp(){}

    public function testToArray()
    {
        $payer = new Payer();
        $payer->setId(123)
              ->setName('Foo')
              ->setEmail('foo@bar.com')
              ->setDni('123123')
              ->setPhone('55313131');

        $address = new Address();
        $address->setStreet('St. Foo')
                ->setNumber(123)
                ->setComplement('FOO')
                ->setNeighborhood('Bar Neighborhood')
                ->setCity('Foo City')
                ->setState('Bar State')
                ->setCountry(Country::BRAZIL)
                ->setPhone('55313131');

        $payer->setAddress($address);

        $data = $payer->toArray();

        $this->assertArrayHasKey('merchantPayerId',$data);
        $this->assertArrayHasKey('fullName',$data);
        $this->assertArrayHasKey('emailAddress',$data);
        $this->assertArrayHasKey('contactPhone',$data);
        $this->assertArrayHasKey('dniNumber',$data);
        $this->assertArraySubset($address->toArray(),$data['billingAddress']);
    }
}