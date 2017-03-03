<?php

namespace PayU\Exception;

/**
 * Class InvalidLanguageException
 *
 * @package PayU\Exception
 * @author Lucas Mendes <devsdmf@gmail.com>
 */
class InvalidLanguageException extends PayUException
{

    protected $message = 'The specified language is not valid, please use the predefined constants in PayU class';
}