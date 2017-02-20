<?php

namespace PayU\Api\Request;

use PayU\Api\ContextInterface;
use PayU\Exception\InvalidContextException;

/**
 * Class AbstractRequest
 *
 * Abstract of a Request object
 *
 * @package PayU\Api\Request
 * @author Lucas Mendes <devsdmf@gmail.com>
 */
abstract class AbstractRequest implements ContextInterface
{

    /**
     * The Context
     *
     * @var string
     */
    protected $context;

    /**
     * @inheritdoc
     */
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

    /**
     * @inheritdoc
     */
    public function getContext()
    {
        return $this->context;
    }
}