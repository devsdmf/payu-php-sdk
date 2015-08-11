<?php

namespace PayU\Exception;

class InvalidLanguageException extends \InvalidArgumentException
{

    protected $message = 'The specified language is not valid, please use the predefined constants in PayU class';
}