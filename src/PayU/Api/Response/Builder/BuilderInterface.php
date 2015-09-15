<?php

namespace PayU\Api\Response\Builder;

use PayU\Api\Request\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface BuilderInterface
{
    public function build(RequestInterface $request, ResponseInterface $response, $context = null);
}