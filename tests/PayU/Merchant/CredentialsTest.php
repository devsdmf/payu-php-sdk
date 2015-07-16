<?php

namespace PayU\Merchant;

class CredentialsTest extends \PHPUnit_Framework_TestCase
{

    public function setUp(){}

    public function testFactoryCredentials()
    {
        $credentials = Credentials::factory(null,null);
        $this->assertInstanceOf('\PayU\Merchant\Credentials',$credentials);
    }
}