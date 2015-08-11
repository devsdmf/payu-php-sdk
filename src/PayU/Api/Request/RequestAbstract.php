<?php

namespace PayU\Api\Request;

use PayU\Api\ContextInterface;
use PayU\Exception\InvalidContextException;

abstract class RequestAbstract implements ContextInterface
{

    protected $context;

    public function setContext($context)
    {
        switch ($context) {
            case self::CONTEXT_QUERY:
                $this->context = self::CONTEXT_QUERY;
                break;
            case self::CONTEXT_PAYMENT:
                $this->context = self::CONTEXT_PAYMENT;
                break;
            default:
                throw new InvalidContextException();
        }
    }

    public function getContext()
    {
        return $this->context;
    }
}