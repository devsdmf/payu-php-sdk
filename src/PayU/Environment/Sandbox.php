<?php

namespace PayU\Environment;

use PayU\Api\ContextInterface;
use PayU\Exception\InvalidContextException;

/**
 * Class Sandbox
 *
 * Sandbox environment object
 *
 * @package PayU\Environment
 * @author Lucas Mendes <devsdmf@gmail.com>
 */
class Sandbox implements EnvironmentInterface
{

    /**
     * URL for API's
     */
    const QUERY_API_URL   = 'https://stg.api.payulatam.com/reports-api/4.0/service.cgi';
    const PAYMENT_API_URL = 'https://stg.api.payulatam.com/payments-api/4.0/service.cgi';

    /**
     * The HTTP headers
     *
     * @var array
     */
    private $headers = ['Content-Type'=>'application/json','Accept'=>'application/json'];

    /**
     * Guzzle Http Client options
     *
     * @var array
     */
    private $options = ['verify'=>false];

    /**
     * Test environment
     *
     * @var bool
     */
    private $test = true;

    /**
     * The Constructor
     */
    public function __construct(){}

    /**
     * Get the URL based on context
     *
     * @param string $context
     * @return string
     */
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

    /**
     * Check if is test environment
     *
     * @return bool
     */
    public function isTest()
    {
        return $this->test;
    }

    /**
     * Get the HTTP headers
     *
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Get Guzzle Http Client options
     *
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Export the environment to string
     *
     * @return string
     */
    public function __toString()
    {
        return 'sandbox';
    }
}