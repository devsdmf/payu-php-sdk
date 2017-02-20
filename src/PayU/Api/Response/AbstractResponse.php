<?php

namespace PayU\Api\Response;

/**
 * Class AbstractResponse
 *
 * Abstraction of a Response object
 *
 * @package PayU\Api\Response
 * @author Lucas Mendes <devsdmf@gmail.com>
 */
abstract class AbstractResponse
{

    /**
     * The request state
     *
     * @var bool
     */
    protected $result = false;

    /**
     * The error message
     *
     * @var null|string
     */
    protected $error = null;

    /**
     * The Constructor
     *
     * @param bool  $result
     * @param null  $error
     * @param array $options
     */
    public function __construct($result = false, $error = null, $options = [])
    {
        if (is_bool($result)) {
            $this->result = $result;
        }

        if (is_string($error)) {
            $this->error = $error;
        }
    }

    /**
     * Get the response state
     *
     * @return bool
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Check if request was successful
     *
     * @return bool
     */
    public function isSuccess()
    {
        return $this->result;
    }

    /**
     * Get the error message
     *
     * @return null|string
     */
    public function getError()
    {
        return $this->error;
    }
}