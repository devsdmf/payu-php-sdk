<?php

namespace PayU\Api\Request;

use PayU\PayU;

class QueryRequest extends AbstractRequest implements RequestInterface
{

    private $command;

    protected $orderId = null;

    protected $referenceCode = null;

    protected $transactionId = null;

    public function __construct($command)
    {
        $this->command = (string)$command;
        $this->setContext(self::CONTEXT_QUERY);
    }

    public function setOrderId($order)
    {
        $this->orderId = (string)$order;
    }

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function setReferenceCode($code)
    {
        $this->referenceCode = (string)$code;
    }

    public function getReferenceCode()
    {
        return $this->referenceCode;
    }

    public function setTransactionId($transaction)
    {
        $this->transactionId = (string)$transaction;
    }

    public function getTransactionId()
    {
        return $this->transactionId;
    }

    public function compile(PayU $payU)
    {
        $credentials = $payU->getCredentials();
        $language    = $payU->getLanguage();
        $test        = (bool)$payU->getEnvironment()->isTest();

        $data = [
            'language'=>$language,
            'command'=>$this->command,
            'merchant'=>$credentials(),
            'test'=>(bool)$test
        ];

        if (!is_null($this->orderId)) {
            $data['details']['orderId'] = $this->orderId;
        } else if (!is_null($this->referenceCode)) {
            $data['details']['referenceCode'] = $this->referenceCode;
        } else if (!is_null($this->transactionId)) {
            $data['details']['transactionId'] = $this->transactionId;
        }

        return json_encode($data);
    }
}