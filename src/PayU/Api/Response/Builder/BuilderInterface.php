<?php

namespace PayU\Api\Response\Builder;

use PayU\Api\Request\RequestAbstract;
use Psr\Http\Message\ResponseInterface;

interface BuilderInterface
{
    public function build(RequestAbstract $request, ResponseInterface $response, $context = null);
}