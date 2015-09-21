<?php

namespace PayU\Api;

/**
 * Interface ContextInterface
 *
 * Define and implement context in requests and responses
 *
 * @package PayU\Api
 * @author Lucas Mendes <devsdmf@gmail.com>
 */
interface ContextInterface
{

    /**
     * Available request contexts
     */
    const CONTEXT_QUERY   = 'query';
    const CONTEXT_PAYMENT = 'payment';

    /**
     * Set the context
     *
     * @param string $context
     */
    public function setContext($context);

    /**
     * Get the context
     *
     * @return string
     */
    public function getContext();
}