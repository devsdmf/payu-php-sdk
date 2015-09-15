<?php

namespace PayU\Merchant;

use PayU\Exception\InvalidCredentialsException;
use PayU\PayU;

class Credentials implements \Serializable
{

    private $credentials;

    private function __construct(callable $closure)
    {
        $this->credentials = $closure;
    }

    public function __invoke()
    {
        $closure = $this->credentials;
        return $closure();
    }

    public function serialize()
    {
        return serialize($this->__invoke());
    }

    public function unserialize($serialized)
    {
        $data = unserialize($serialized);

        $key   = $data['apiKey'];
        $login = $data['apiLogin'];

        $this->credentials = (function () use ($key,$login) {
            return ['apiKey'=>$key,'apiLogin'=>$login];
        });

        return $this;
    }

    public static function factory($key, $login, $environment = PayU::ENV_DEFAULT, $check = true)
    {
        $credentials = new self(function () use ($key, $login){
            return ['apiKey'=>$key,'apiLogin'=>$login];
        });

        $result = PayU::ping($credentials,null,$environment);

        if ($result->isSuccess()) {
            return $credentials;
        } else {
            throw new InvalidCredentialsException();
        }
    }
}