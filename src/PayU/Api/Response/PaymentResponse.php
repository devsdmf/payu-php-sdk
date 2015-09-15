<?php

namespace PayU\Api\Response;

class PaymentResponse extends AbstractResponse implements \Serializable
{

    const STATE_APPROVED = 'APPROVED';
    const STATE_DECLINED = 'DECLINED';
    const STATE_PENDING = 'PENDING';

    protected $transactionId = null;

    protected $orderId = null;

    protected $state = null;

    protected $paymentNetworkResponseCode = null;

    protected $paymentNetworkResponseErrorMessage = null;

    protected $traceabilityCode = null;

    protected $authorizationCode = null;

    protected $pendingReason = null;

    protected $responseCode = null;

    protected $errorCode = null;

    protected $responseMessage = null;

    protected $transactionDate = null;

    protected $transactionTime = null;

    protected $operationDate = null;

    protected $extraParameters = null;

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

    public function getTransactionId()
    {
        return $this->transactionId;
    }

    public function getOrderId()
    {
        return $this->orderId;
    }

    public function getState()
    {
        return $this->state;
    }

    public function isApproved()
    {
        return $this->state == self::STATE_APPROVED;
    }

    public function isDeclined()
    {
        return $this->state == self::STATE_DECLINED;
    }

    public function isPending()
    {
        return $this->state == self::STATE_PENDING;
    }

    public function getPaymentNetworkResponseCode()
    {
        return $this->paymentNetworkResponseCode;
    }

    public function getPaymentNetworkResponseErrorMessage()
    {
        return $this->paymentNetworkResponseErrorMessage;
    }

    public function getTraceabilityCode()
    {
        return $this->traceabilityCode;
    }

    public function getAuthorizationCode()
    {
        return $this->authorizationCode;
    }

    public function getPendingReason()
    {
        return $this->pendingReason;
    }

    public function getResponseCode()
    {
        return $this->responseCode;
    }

    public function getErrorCode()
    {
        return $this->errorCode;
    }

    public function getResponseMessage()
    {
        return $this->responseMessage;
    }

    public function getTransactionDate()
    {
        return $this->transactionDate;
    }

    public function getTransactionTime()
    {
        return $this->transactionTime;
    }

    public function getOperationDate()
    {
        return $this->operationDate;
    }

    public function getExtraParameters()
    {
        return $this->extraParameters;
    }

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