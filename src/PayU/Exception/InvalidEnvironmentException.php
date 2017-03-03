<?php

namespace PayU\Exception;

/**
 * Class InvalidEnvironmentException
 *
 * @package PayU\Exception
 * @author Lucas Mendes <devsdmf@gmail.com>
 */
class InvalidEnvironmentException extends PayUException
{

    protected $message = 'The environment must be an environment constant of PayU class or an implementation of EnvironmentInterface';
}