<?php

namespace PayU\Api\Request;

use PayU\PayU;

/**
 * Class QueryRequest
 *
 * Query Request object implementation
 *
 * @package PayU\Api\Request
 * @author Lucas Mendes <devsdmf@gmail.com>
 */
class QueryRequest extends AbstractRequest implements RequestInterface
{

    /**
     * The command that will be executed in API
     *
     * @var string
     */
    private $command;

    /**
     * The order id
     *
     * @var string
     */
    protected $orderId = null;

    /**
     * The order reference code
     *
     * @var string
     */
    protected $referenceCode = null;

    /**
     * The transaction id
     * @var string
     */
    protected $transactionId = null;

    /**
     * The Constructor
     *
     * @param string $command
     */
    public function __construct($command)
    {
        $this->command = (string)$command;
        $this->setContext(self::CONTEXT_QUERY);
    }

    /**
     * Set the order id
     *
     * @param string $order
     */
    public function setOrderId($order)
    {
        $this->orderId = (string)$order;
    }

    /**
     * Get the order id
     *
     * @return string
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Set the reference code
     *
     * @param string $code
     */
    public function setReferenceCode($code)
    {
        $this->referenceCode = (string)$code;
    }

    /**
     * Get the order reference code
     *
     * @return string
     */
    public function getReferenceCode()
    {
        return $this->referenceCode;
    }

    /**
     * Set the transaction id
     *
     * @param string $transaction
     */
    public function setTransactionId($transaction)
    {
        $this->transactionId = (string)$transaction;
    }

    /**
     * Get the transaction id
     *
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * Compile the request into a plaintext payload
     *
     * @param PayU $payU
     * @return string
     */
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