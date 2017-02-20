<?php

namespace PayU\Transaction\Card;

class CreditCardTest extends \PHPUnit_Framework_TestCase
{

    public function setUp(){}

    public function testSetName()
    {
        $card = new CreditCard();
        $card->setName('FOO BAR');

        $this->assertAttributeEquals('FOO BAR','name',$card);
    }

    public function testSetNumber()
    {
        $card = new CreditCard();
        $card->setNumber('1111222233334444');

        $this->assertAttributeEquals('1111222233334444','number',$card);
    }

    public function testSetCvv()
    {
        $card = new CreditCard();
        $card->setCvv(123);

        $this->assertAttributeEquals(123,'cvv',$card);
    }

    public function testSetExpirationDate()
    {
        $card = new CreditCard();
        $card->setExpirationDate('2015/09');

        $this->assertAttributeEquals('2015/09','expiration',$card);
    }

    public function testSetNumberGreaterThanSixteen()
    {
        $card = new CreditCard();
        $card->setNumber('11112222333344445555');

        $this->assertEquals(16,strlen($card->getNumber()));
    }

    public function testSetCvvGreaterThanThree()
    {
        $card = new CreditCard();
        $card->setCvv(1234);

        $this->assertEquals(3,strlen($card->getCvv()));
    }

    public function testToArray()
    {
        $card = new CreditCard();
        $card->setName('FOO BAR')
             ->setNumber('1111222233334444')
             ->setCvv(123)
             ->setExpirationDate('2015/04');

        $data = $card->toArray();

        $this->assertArrayHasKey('number',$data);
        $this->assertArrayHasKey('securityCode',$data);
        $this->assertArrayHasKey('expirationDate',$data);
        $this->assertArrayHasKey('name',$data);
    }
}