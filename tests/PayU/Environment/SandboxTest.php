<?php

namespace PayU\Environment;

use PayU\Api\ContextInterface;

class SandboxTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Sandbox
     */
    protected $env;

    public function setUp()
    {
        $this->env = new Sandbox();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf('\PayU\Environment\Sandbox',$this->env);
    }

    public function testGetQueryUrl()
    {
        $this->assertEquals(Sandbox::QUERY_API_URL,$this->env->getUrl(ContextInterface::CONTEXT_QUERY));
    }

    public function testGetPaymentUrl()
    {
        $this->assertEquals(Sandbox::PAYMENT_API_URL,$this->env->getUrl(ContextInterface::CONTEXT_PAYMENT));
    }

    public function testIsTest()
    {
        $this->assertTrue($this->env->isTest());
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
        $this->assertEquals('sandbox',(string)$this->env);
    }
}