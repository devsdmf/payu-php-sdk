<?php

namespace PayU\Exception;

class InvalidEnvironmentException extends \RuntimeException
{

    protected $message = 'The environment must be an environment constant of PayU class or an implementation of EnvironmentInterface';
}