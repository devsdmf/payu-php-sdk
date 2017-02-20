<?php

namespace PayU\Api\Request;

use PayU\Api\ContextInterface;

class AbstractRequestTest extends \PHPUnit_Framework_TestCase
{

    protected $_stub = null;

    public function setUp()
    {
        $this->_stub = $this->getMockForAbstractClass('\PayU\Api\Request\AbstractRequest');
    }

    public function testSetValidContext()
    {
        $this->_stub->setContext(ContextInterface::CONTEXT_PAYMENT);

        $this->assertAttributeEquals(ContextInterface::CONTEXT_PAYMENT,'context',$this->_stub);
    }

    /**
     * @expectedException \PayU\Exception\InvalidContextException
     */
    public function testSetInvalidContext()
    {
        $this->_stub->setContext('foo');
    }
}