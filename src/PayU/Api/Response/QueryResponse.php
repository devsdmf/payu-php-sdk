<?php

namespace PayU\Api\Response;

class QueryResponse extends AbstractResponse
{

    protected $payload = null;

    public function __construct($result = false, $error = null, $options = [])
    {
        parent::__construct($result,$error);

        if (isset($options['result']['payload'])) {
            $this->payload = (object)$options['result']['payload'];
        }
    }

    public function getPayload()
    {
        return $this->payload;
    }
}