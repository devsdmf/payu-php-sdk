<?php

namespace PayU\Api\Response\Builder;

use PayU\Api\Request\AbstractRequest;
use Psr\Http\Message\ResponseInterface;

interface BuilderInterface
{
    public function build(AbstractRequest $request, ResponseInterface $response, $context = null);
}