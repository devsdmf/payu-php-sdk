<?php

namespace PayU\Exception;

class InvalidCredentialsException extends \RuntimeException
{

    protected $message = 'The specified credentials are not valid, so the credentials object was not created';
}