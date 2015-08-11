<?php

namespace PayU\Api;

interface ContextInterface
{

    const CONTEXT_QUERY   = 'query';
    const CONTEXT_PAYMENT = 'payment';

    public function setContext($context);

    public function getContext();
}