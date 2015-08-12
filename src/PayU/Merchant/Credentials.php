<?php

namespace PayU\Merchant;

use PayU\Exception\InvalidCredentialsException;
use PayU\PayU;

class Credentials implements \JsonSerializable
{

    private $credentials;

    private function __construct(callable $closure)
    {
        $this->credentials = $closure;
    }

    public function jsonSerialize()
    {
        $closure = $this->credentials;

        return $closure();
    }

    public function __invoke()
    {
        return $this->jsonSerialize();
    }

    public static function factory($key, $login, $environment = PayU::ENV_DEFAULT)
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