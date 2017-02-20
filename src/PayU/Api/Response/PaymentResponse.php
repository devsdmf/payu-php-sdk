<?php

namespace PayU\Api\Response;

/**
 * Class PaymentResponse
 *
 * Payment Response object wrapper
 *
 * @package PayU\Api\Response
 * @author Lucas Mendes <devsdmf@gmail.com>
 */
class PaymentResponse extends AbstractResponse implements \Serializable
{

    /**
     * Available statuses
     */
    const STATE_APPROVED = 'APPROVED';
    const STATE_DECLINED = 'DECLINED';
    const STATE_PENDING = 'PENDING';

    /**
     * The transaction id
     *
     * @var string
     */
    protected $transactionId = null;

    /**
     * The order id
     *
     * @var string
     */
    protected $orderId = null;

    /**
     * The transaction state
     *
     * @var string
     */
    protected $state = null;

    /**
     * The payment network (gateway) response code
     *
     * @var string
     */
    protected $paymentNetworkResponseCode = null;

    /**
     * The payment network (gateway) error message
     *
     * @var string
     */
    protected $paymentNetworkResponseErrorMessage = null;

    /**
     * The traceability code into payment gateway database
     *
     * @var string
     */
    protected $traceabilityCode = null;

    /**
     * The authorization code
     *
     * @var string
     */
    protected $authorizationCode = null;

    /**
     * The reason of a pending transaction
     *
     * @var string
     */
    protected $pendingReason = null;

    /**
     * The response code
     *
     * @var string
     */
    protected $responseCode = null;

    /**
     * The error code
     *
     * @var string
     */
    protected $errorCode = null;

    /**
     * The response message
     *
     * @var string
     */
    protected $responseMessage = null;

    /**
     * The transaction date
     *
     * @var string
     */
    protected $transactionDate = null;

    /**
     * The transaction time
     *
     * @var string
     */
    protected $transactionTime = null;

    /**
     * The operation date
     *
     * @var string
     */
    protected $operationDate = null;

    /**
     * Response extra parameters
     *
     * @var string
     */
    protected $extraParameters = null;

    /**
     * The Constructor
     *
     * @param bool  $result
     * @param null  $error
     * @param array $options
     * @return PaymentResponse
     */
    public function __construct($result = false, $error = null, $options = [])
    {
        parent::__construct($result, $error);

        if ($result) {
            $data = $options['transactionResponse'];

            $this->transactionId = $data['transactionId'];
            $this->orderId = $data['orderId'];
            $this->state = $data['state'];
            $this->paymentNetworkResponseCode = $data['paymentNetworkResponseCode'];
            $this->paymentNetworkResponseErrorMessage = $data['paymentNetworkResponseErrorMessage'];
            $this->traceabilityCode = $data['trazabilityCode'];
            $this->authorizationCode = $data['authorizationCode'];
            $this->pendingReason = $data['pendingReason'];
            $this->responseCode = $data['responseCode'];
            $this->errorCode = $data['errorCode'];
            $this->responseMessage = $data['responseMessage'];
            $this->transactionDate = $data['transactionDate'];
            $this->transactionTime = $data['transactionTime'];
            $this->operationDate = $data['operationDate'];
            $this->extraParameters = $data['extraParameters'];
        }

        return $this;
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
     * Get the order id
     *
     * @return string
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Get the transaction state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Check if the transaction was approved
     *
     * @return bool
     */
    public function isApproved()
    {
        return $this->state == self::STATE_APPROVED;
    }

    /**
     * Check if the transaction was declined
     *
     * @return bool
     */
    public function isDeclined()
    {
        return $this->state == self::STATE_DECLINED;
    }

    /**
     * Check if transaction is pending
     *
     * @return bool
     */
    public function isPending()
    {
        return $this->state == self::STATE_PENDING;
    }

    /**
     * Get the payment network (gateway) response code
     *
     * @return string
     */
    public function getPaymentNetworkResponseCode()
    {
        return $this->paymentNetworkResponseCode;
    }

    /**
     * Get the payment network (gateway) error message
     *
     * @return string
     */
    public function getPaymentNetworkResponseErrorMessage()
    {
        return $this->paymentNetworkResponseErrorMessage;
    }

    /**
     * Get the traceability code into payment gateway
     *
     * @return string
     */
    public function getTraceabilityCode()
    {
        return $this->traceabilityCode;
    }

    /**
     * Get the transaction authorization code
     *
     * @return string
     */
    public function getAuthorizationCode()
    {
        return $this->authorizationCode;
    }

    /**
     * Get the pending reason
     *
     * @return string
     */
    public function getPendingReason()
    {
        return $this->pendingReason;
    }

    /**
     * Get the response code
     *
     * @return string
     */
    public function getResponseCode()
    {
        return $this->responseCode;
    }

    /**
     * Get the error code
     *
     * @return string
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * Get the response message
     *
     * @return string
     */
    public function getResponseMessage()
    {
        return $this->responseMessage;
    }

    /**
     * Get the transaction date
     *
     * @return string
     */
    public function getTransactionDate()
    {
        return $this->transactionDate;
    }

    /**
     * Get the transaction time
     *
     * @return string
     */
    public function getTransactionTime()
    {
        return $this->transactionTime;
    }

    /**
     * Get the operation time
     *
     * @return string
     */
    public function getOperationDate()
    {
        return $this->operationDate;
    }

    /**
     * Get the response extra parameters
     *
     * @return string
     */
    public function getExtraParameters()
    {
        return $this->extraParameters;
    }

    /**
     * Serialize the response object
     *
     * @return string
     */
    public function serialize()
    {
        return serialize([
            $this->result,
            $this->error,
            $this->transactionId,
            $this->orderId,
            $this->state,
            $this->paymentNetworkResponseCode,
            $this->paymentNetworkResponseErrorMessage,
            $this->traceabilityCode,
            $this->authorizationCode,
            $this->pendingReason,
            $this->responseCode,
            $this->errorCode,
            $this->responseMessage,
            $this->transactionDate,
            $this->transactionTime,
            $this->operationDate,
            $this->extraParameters
        ]);
    }

    /**
     * Unserialize the response object
     *
     * @param string $serialized
     * @return PaymentResponse
     */
    public function unserialize($serialized)
    {
        $data = unserialize($serialized);

        list(
            $this->result,
            $this->error,
            $this->transactionId,
            $this->orderId,
            $this->state,
            $this->paymentNetworkResponseCode,
            $this->paymentNetworkResponseErrorMessage,
            $this->traceabilityCode,
            $this->authorizationCode,
            $this->pendingReason,
            $this->responseCode,
            $this->errorCode,
            $this->responseMessage,
            $this->transactionDate,
            $this->transactionTime,
            $this->operationDate,
            $this->extraParameters
            ) = $data;

        return $this;
    }
}