<?php

namespace PayU\Environment;

use PayU\Api\ContextInterface;
use PayU\Exception\InvalidContextException;

class Sandbox implements EnvironmentInterface
{

    const QUERY_API_URL   = 'https://stg.api.payulatam.com/reports-api/4.0/service.cgi';
    const PAYMENT_API_URL = 'https://stg.api.payulatam.com/payments-api/4.0/service.cgi';

    private $headers = ['Content-Type'=>'application/json','Accept'=>'application/json'];

    private $options = ['verify'=>false];

    private $test = true;

    public function __construct(){}

    public function getUrl($context)
    {
        switch ($context) {
            case ContextInterface::CONTEXT_QUERY:
                return self::QUERY_API_URL;
                break;
            case ContextInterface::CONTEXT_PAYMENT:
                return self::PAYMENT_API_URL;
                break;
            default:
                throw new InvalidContextException();
        }
    }

    public function isTest()
    {
        return $this->test;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function __toString()
    {
        return 'sandbox';
    }
}