<?php

namespace PayU\Api\Request;

use PayU\Api\ContextInterface;
use PayU\PayU;

/**
 * Interface RequestInterface
 *
 * Define a common interface for request object implementations
 *
 * @package PayU\Api\Request
 * @author Lucas Mendes <devsdmf@gmail.com>
 */
interface RequestInterface extends ContextInterface
{

    /**
     * The Constructor
     *
     * @param string $command
     */
    public function __construct($command);

    /**
     * Compile the request into a plaintext payload
     *
     * @param PayU $payU
     * @return string
     */
    public function compile(PayU $payU);
}