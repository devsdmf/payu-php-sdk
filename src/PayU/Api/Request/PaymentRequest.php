<?php

namespace PayU\Api\Request;

use PayU\PayU;
use PayU\Transaction\Transaction;

/**
 * Class PaymentRequest
 *
 * Payment Request object implementation
 *
 * @package PayU\Api\Request
 * @author Lucas Mendes <devsdmf@gmail.com>
 */
class PaymentRequest extends AbstractRequest implements RequestInterface
{

    /**
     * The command that will be executed in API
     *
     * @var string
     */
    private $command;

    /**
     * The Transaction object
     *
     * @var Transaction
     */
    private $transaction = null;

    /**
     * The Constructor
     *
     * @param string $command
     */
    public function __construct($command)
    {
        $this->command = (string)$command;
        $this->setContext(self::CONTEXT_PAYMENT);
    }

    /**
     * Set the transaction object
     *
     * @param Transaction $transaction
     */
    public function setTransaction(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * Get the transaction object
     *
     * @return Transaction
     */
    public function getTransaction()
    {
        return $this->transaction;
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
        $merchant    = $payU->getMerchantId();
        $test        = (bool)$payU->getEnvironment()->isTest();

        $data = [
            'language'=>$language,
            'command'=>$this->command,
            'merchant'=>$credentials(),
            'test'=>(bool)$test
        ];

        if (!is_null($this->transaction)) {
            $transaction_data = $this->transaction->toArray();

            $signature = $data['merchant']['apiKey'] . '~' .
                         $merchant . '~' .
                         $transaction_data['order']['referenceCode'] . '~' .
                         $transaction_data['order']['additionalValues']['TX_VALUE']['value'] . '~' .
                         $transaction_data['order']['additionalValues']['TX_VALUE']['currency'];

            $transaction_data['order']['language']  = $payU->getLanguage();
            $transaction_data['order']['signature'] = md5($signature);
            $transaction_data['order']['notifyUrl'] = $payU->getNotifyUrl();

            $data['transaction'] = $transaction_data;
        }

        return json_encode($data);
    }
}