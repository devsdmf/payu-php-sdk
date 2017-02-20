<?php

namespace PayU\Api\Response;

/**
 * Class QueryResponse
 *
 * Query Response object wrapper
 *
 * @package PayU\Api\Response
 * @author Lucas Mendes <devsdmf@gmail.com>
 */
class QueryResponse extends AbstractResponse
{

    /**
     * The response payload
     *
     * @var object
     */
    protected $payload = null;

    /**
     * The Constructor
     *
     * @param bool  $result
     * @param null  $error
     * @param array $options
     */
    public function __construct($result = false, $error = null, $options = [])
    {
        parent::__construct($result,$error);

        if (isset($options['result']['payload'])) {
            $this->payload = (object)$options['result']['payload'];
        }
    }

    /**
     * Get the response payload
     *
     * @return object
     */
    public function getPayload()
    {
        return $this->payload;
    }
}