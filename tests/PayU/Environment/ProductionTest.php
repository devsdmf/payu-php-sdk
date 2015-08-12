<?php

namespace PayU\Environment;

use PayU\Api\ContextInterface;

class ProductionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Production
     */
    protected $env;

    public function setUp()
    {
        $this->env = new Production();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf('\PayU\Environment\Production',$this->env);
    }

    public function testGetQueryUrl()
    {
        $this->assertEquals(Production::QUERY_API_URL,$this->env->getUrl(ContextInterface::CONTEXT_QUERY));
    }

    public function testGetPaymentUrl()
    {
        $this->assertEquals(Production::PAYMENT_API_URL,$this->env->getUrl(ContextInterface::CONTEXT_PAYMENT));
    }

    public function testIsTest()
    {
        $this->assertFalse($this->env->isTest());
    }

    public function testGetHeaders()
    {
        $this->assertInternalType('array',$this->env->getHeaders());
    }

    public function testGetOptions()
    {
        $this->assertInternalType('array',$this->env->getOptions());
    }

    public function testToString()
    {
        $this->assertEquals('production',(string)$this->env);
    }
}