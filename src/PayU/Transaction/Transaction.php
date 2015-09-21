<?php

namespace PayU\Transaction;

use PayU\Entity\EntityInterface;
use PayU\Transaction\Card\CreditCard;
use PayU\Transaction\Client\Payer;
use PayU\Transaction\Order\Order;

/**
 * Class Transaction
 *
 * Transaction object wrapper
 *
 * @package PayU\Transaction
 * @author Lucas Mendes <devsdmf@gmail.com>
 */
class Transaction implements EntityInterface
{

    /**
     * Transaction type constants
     */
    const AUTHORIZATION         = 'AUTHORIZATION';
    const AUTHORIZATION_CAPTURE = 'AUTHORIZATION_AND_CAPTURE';
    const CAPTURE               = 'CAPTURE';
    const CANCELLATION          = 'CANCELLATION';
    const VOID                  = 'VOID';
    const REFUND                = 'REFUND';

    /**
     * The order
     *
     * @var Order
     */
    protected $order = null;

    /**
     * The payer
     *
     * @var Payer
     */
    protected $payer = null;

    /**
     * The Credit Card
     *
     * @var CreditCard
     */
    protected $card = null;

    /**
     * The installments number
     *
     * @var int
     */
    protected $installments = 1;

    /**
     * The transaction type
     *
     * @var string
     */
    protected $type = self::AUTHORIZATION_CAPTURE;

    /**
     * The payment method
     *
     * @var string
     */
    protected $method = null;

    /**
     * The country
     *
     * @var string
     */
    protected $country = null;

    /**
     * The user session id
     *
     * @var string
     */
    protected $session_id = null;

    /**
     * The user ip address
     *
     * @var string
     */
    protected $ip_address = null;

    /**
     * The user cookie
     *
     * @var string
     */
    protected $cookie = null;

    /**
     * The user agent
     *
     * @var string
     */
    protected $user_agent = null;

    /**
     * The Constructor
     */
    public function __construct(){}

    /**
     * Set the order
     *
     * @param Order $order
     * @return Transaction
     */
    public function setOrder(Order $order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get the order
     *
     * @return Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set the payer
     *
     * @param Payer $payer
     * @return Transaction
     */
    public function setPayer(Payer $payer)
    {
        $this->payer = $payer;

        return $this;
    }

    /**
     * Get the payer
     *
     * @return Payer
     */
    public function getPayer()
    {
        return $this->payer;
    }

    /**
     * Set the credit card
     *
     * @param CreditCard $card
     * @return Transaction
     */
    public function setCreditCard(CreditCard $card)
    {
        $this->card = $card;

        return $this;
    }

    /**
     * Get the credit card
     *
     * @return CreditCard
     */
    public function getCreditCard()
    {
        return $this->card;
    }

    /**
     * Set the installments number
     *
     * @param int $quantity
     * @return Transaction
     */
    public function setInstallments($quantity)
    {
        $this->installments = (integer)$quantity;

        return $this;
    }

    /**
     * Get the installments number
     *
     * @return int
     */
    public function getInstallments()
    {
        return $this->installments;
    }

    /**
     * Set the transaction type
     *
     * @param string $type
     * @return Transaction
     */
    public function setType($type = self::AUTHORIZATION_CAPTURE)
    {
        $this->type = (string)$type;

        return $this;
    }

    /**
     * Get the transaction type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the payment method
     *
     * @param string $method
     * @return Transaction
     */
    public function setPaymentMethod($method)
    {
        $this->method = (string)$method;

        return $this;
    }

    /**
     * Get the payment method
     *
     * @return string
     */
    public function getPaymentMethod()
    {
        return $this->method;
    }

    /**
     * Set the country
     *
     * @param string $country
     * @return Transaction
     */
    public function setCountry($country)
    {
        $this->country = (string)$country;

        return $this;
    }

    /**
     * Get the country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set the user session id
     * @param string $id
     * @return Transaction
     */
    public function setSessionId($id)
    {
        $this->session_id = (string)$id;

        return $this;
    }

    /**
     * Get the user session id
     *
     * @return string
     */
    public function getSessionId()
    {
        return $this->session_id;
    }

    /**
     * Set the user ip address
     *
     * @param string $ip
     * @return Transaction
     */
    public function setIpAddress($ip)
    {
        $this->ip_address = (string)$ip;

        return $this;
    }

    /**
     * Get the user ip address
     *
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ip_address;
    }

    /**
     * Set the user cookie
     *
     * @param string $cookie
     * @return Transaction
     */
    public function setCookie($cookie)
    {
        $this->cookie = (string)$cookie;

        return $this;
    }

    /**
     * Get the user cookie
     *
     * @return string
     */
    public function getCookie()
    {
        return $this->cookie;
    }

    /**
     * Set the user agent
     *
     * @param string $agent
     * @return Transaction
     */
    public function setUserAgent($agent)
    {
        $this->user_agent = (string)$agent;

        return $this;
    }

    /**
     * Get the user agent
     *
     * @return string
     */
    public function getUserAgent()
    {
        return $this->user_agent;
    }

    /**
     * Export object as array
     * 
     * @return array
     */
    public function toArray()
    {
        return [
            'order'=>$this->order->toArray(),
            'payer'=>$this->payer->toArray(),
            'creditCard'=>$this->card->toArray(),
            'extraParameters'=>['INSTALLMENTS_NUMBER'=>$this->installments],
            'type'=>$this->type,
            'paymentMethod'=>$this->method,
            'paymentCountry'=>$this->country,
            'deviceSessionId'=>$this->session_id,
            'ipAddress'=>$this->ip_address,
            'cookie'=>$this->cookie,
            'userAgent'=>$this->user_agent
        ];
    }
}