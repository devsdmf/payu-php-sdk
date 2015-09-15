<?php

namespace PayU\Api\Request;

use PayU\Api\ContextInterface;
use PayU\PayU;

interface RequestInterface extends ContextInterface
{

    public function __construct($command);

    public function compile(PayU $payU);
}