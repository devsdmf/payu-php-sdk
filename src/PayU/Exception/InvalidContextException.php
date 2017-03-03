<?php

namespace PayU\Exception;

/**
 * Class InvalidContextException
 *
 * @package PayU\Exception
 * @author Lucas Mendes <devsdmf@gmail.com>
 */
class InvalidContextException extends PayUException
{

    protected $message = 'The specified context is not valid, please use the ContextInterface constants';
}