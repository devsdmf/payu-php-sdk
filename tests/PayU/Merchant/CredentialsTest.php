<?php

namespace PayU\Merchant;

use PayU\PayU;

class CredentialsTest extends \PHPUnit_Framework_TestCase
{

    public function setUp(){}

    public function testFactoryCredentials()
    {
        $credentials = Credentials::factory('676k86ks53la6tni6clgd30jf6','403ba744e9827f3',PayU::ENV_SANDBOX);
        $this->assertInstanceOf('\PayU\Merchant\Credentials',$credentials);
    }
}