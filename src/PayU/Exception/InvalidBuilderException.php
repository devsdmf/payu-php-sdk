<?php

namespace PayU\Exception;

class InvalidBuilderException extends \RuntimeException
{

    protected $message = 'The specified builder is not valid, the builder must be an implementation of BuilderInterface';
}