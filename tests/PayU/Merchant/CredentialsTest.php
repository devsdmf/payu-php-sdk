<?php

namespace PayU\Merchant;

use PayU\PayU;

class CredentialsTest extends \PHPUnit_Framework_TestCase
{

    protected $credential_key   = '676k86ks53la6tni6clgd30jf6';
    protected $credential_login = '403ba744e9827f3';

    public function setUp(){}

    /**
     * @expectedException \PayU\Exception\InvalidCredentialsException
     */
    public function testFactoryFail()
    {
        Credentials::factory(null,null,PayU::ENV_SANDBOX);
    }

    public function testFactorySuccess()
    {
        $credentials = Credentials::factory($this->credential_key,$this->credential_login,PayU::ENV_SANDBOX);
        $this->assertInstanceOf('\PayU\Merchant\Credentials',$credentials);

        return $credentials;
    }

    /**
     * @depends testFactorySuccess
     * @param Credentials $credentials
     */
    public function testInvokable($credentials)
    {
        $data = $credentials();

        $this->assertNotNull($data);
        $this->assertArrayHasKey('apiKey',$data);
        $this->assertArrayHasKey('apiLogin',$data);
    }

    public function testSerializeUnserializeObject()
    {
        $credentials = Credentials::factory($this->credential_key,$this->credential_login,PayU::ENV_SANDBOX);

        $callable1 = $credentials();

        $serialized = serialize($credentials);

        $credentials2 = unserialize($serialized);

        $callable2 = $credentials2();

        $this->assertArraySubset($callable1,$callable2);
    }

    public function testFactoryWithoutCheck()
    {
        $credentials = Credentials::factory('foo','bar',PayU::ENV_DEFAULT,false);
        $this->assertInstanceOf('\PayU\Merchant\Credentials',$credentials);
    }
}