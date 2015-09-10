<?php

namespace PayU\Transaction\Client;

class AbstractClientTest extends \PHPUnit_Framework_TestCase
{

    protected $_stub = null;

    public function setUp()
    {
        $this->_stub = $this->getMockForAbstractClass('\PayU\Transaction\Client\AbstractClient');
    }

    public function testSetId()
    {
        $this->_stub->setId(123);

        $this->assertAttributeEquals(123,'id',$this->_stub);
    }

    public function testSetName()
    {
        $this->_stub->setName('foo');

        $this->assertAttributeEquals('foo','name',$this->_stub);
    }

    public function testSetEmail()
    {
        $this->_stub->setEmail('foo@bar.com');

        $this->assertAttributeEquals('foo@bar.com','email',$this->_stub);
    }

    public function testSetPhone()
    {
        $this->_stub->setPhone('55313131');

        $this->assertAttributeEquals('55313131','phone',$this->_stub);
    }

    public function testSetDni()
    {
        $this->_stub->setDni('123123');

        $this->assertAttributeEquals('123123','dni',$this->_stub);
    }

    public function testSetCnpj()
    {
        $this->_stub->setCnpj('123123123');

        $this->assertAttributeEquals('123123123','cnpj',$this->_stub);
    }

    public function testSetAddress()
    {
        $this->_stub->setAddress(new Address());

        $this->assertAttributeInstanceOf('\PayU\Transaction\Client\Address','address',$this->_stub);
    }
}