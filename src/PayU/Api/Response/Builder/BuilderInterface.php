<?php

namespace PayU\Api\Response\Builder;

use PayU\Api\Request\RequestInterface;
use PayU\Api\Response\AbstractResponse;
use Psr\Http\Message\ResponseInterface;

/**
 * Interface BuilderInterface
 *
 * Provides a common interface to build response objects based on request context
 *
 * @package PayU\Api\Response\Builder
 * @author Lucas Mendes <devsdmf@gmail.com>
 */
interface BuilderInterface
{
    /**
     * Build a response object
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param string            $context
     * @return AbstractResponse
     */
    public function build(RequestInterface $request, ResponseInterface $response, $context = null);
}