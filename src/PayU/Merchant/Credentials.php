<?php

namespace PayU\Merchant;

class Credentials implements \JsonSerializable
{

    private $credentials;

    private function __construct(callable $closure)
    {
        $this->credentials = $closure;
    }

    public function jsonSerialize()
    {
        return $this->credentials();
    }

    public static function factory($key, $login)
    {
        return new self(function () use ($key, $login){
            return ['apiKey'=>$key,'apiLogin'=>$login];
        });
    }
}