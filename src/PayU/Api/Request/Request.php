<?php

namespace PayU\Api\Request;

use PayU\Merchant\Credentials;

class Request extends AbstractRequest
{

    private $command;

    public function __construct($command, $context)
    {
        $this->command = $command;
        $this->setContext($context);
    }

    public function compile(Credentials $credentials, $language, $test = false)
    {
        $data = [
            'language'=>$language,
            'command'=>$this->command,
            'merchant'=>$credentials(),
            'test'=>(bool)$test
        ];

        return json_encode($data);
    }
}