<?php

namespace PayU\Exception;

class InvalidContextException extends \InvalidArgumentException
{

    protected $message = 'The specified context is not valid, please use the ContextInterface constants';
}