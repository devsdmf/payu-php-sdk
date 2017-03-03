<?php

namespace PayU\Merchant;

use PayU\Exception\InvalidCredentialsException;
use PayU\PayU;

/**
 * Class Credentials
 *
 * The Credentials object that allows acccess to the API
 *
 * @package PayU\Merchant
 * @author Lucas Mendes <devsdmf@gmail.com>
 */
class Credentials implements \Serializable
{

    /**
     * The encrypted credentials closure
     *
     * @var \Closure
     */
    private $credentials;

    /**
     * The Constructor
     *
     * @param callable $closure
     */
    private function __construct(callable $closure)
    {
        $this->credentials = $closure;
    }

    /**
     * Invoke the credentials closure
     *
     * @return array
     */
    public function __invoke()
    {
        $closure = $this->credentials;
        return $closure();
    }

    /**
     * Serialize the credentials object
     *
     * @return string
     */
    public function serialize()
    {
        return serialize($this->__invoke());
    }

    /**
     * Unserialize a credentials object
     *
     * @param string $serialized
     * @return Credentials
     */
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

    /**
     * Factory a Credentials object
     *
     * @param        $key
     * @param        $login
     * @param string $environment
     * @param bool   $check
     * @return Credentials
     */
    public static function factory($key, $login, $environment = PayU::ENV_DEFAULT, $check = true)
    {
        $credentials = new self(function () use ($key, $login){
            return ['apiKey'=>$key,'apiLogin'=>$login];
        });

        if ($check) {
            $result = PayU::ping($credentials,null,$environment)->isSuccess();
        } else {
            $result = true;
        }

        if ($result) {
            return $credentials;
        } else {
            throw new InvalidCredentialsException();
        }
    }
}