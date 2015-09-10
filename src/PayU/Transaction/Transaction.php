<?php

namespace PayU\Transaction;

use PayU\Entity\EntityInterface;
use PayU\Transaction\Card\CreditCard;
use PayU\Transaction\Client\Payer;
use PayU\Transaction\Order\Order;

class Transaction implements EntityInterface
{

    const AUTHORIZATION         = 'AUTHORIZATION';
    const AUTHORIZATION_CAPTURE = 'AUTHORIZATION_AND_CAPTURE';
    const CAPTURE               = 'CAPTURE';
    const CANCELLATION          = 'CANCELLATION';
    const VOID                  = 'VOID';
    const REFUND                = 'REFUND';

    protected $order = null;

    protected $payer = null;

    protected $card = null;

    protected $installments = 1;

    protected $type = self::AUTHORIZATION_CAPTURE;

    protected $method = null;

    protected $country = null;

    protected $session_id = null;

    protected $ip_address = null;

    protected $cookie = null;

    protected $user_agent = null;

    public function __construct(){}

    public function setOrder(Order $order)
    {
        $this->order = $order;

        return $this;
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function setPayer(Payer $payer)
    {
        $this->payer = $payer;

        return $this;
    }

    public function getPayer()
    {
        return $this->payer;
    }

    public function setCreditCard(CreditCard $card)
    {
        $this->card = $card;

        return $this;
    }

    public function getCreditCard()
    {
        return $this->card;
    }

    public function setInstallments($quantity)
    {
        $this->installments = (integer)$quantity;

        return $this;
    }

    public function getInstallments()
    {
        return $this->installments;
    }

    public function setType($type = self::AUTHORIZATION_CAPTURE)
    {
        $this->type = (string)$type;

        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setPaymentMethod($method)
    {
        $this->method = (string)$method;

        return $this;
    }

    public function getPaymentMethod()
    {
        return $this->method;
    }

    public function setCountry($country)
    {
        $this->country = (string)$country;

        return $this;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setSessionId($id)
    {
        $this->session_id = (string)$id;

        return $this;
    }

    public function getSessionId()
    {
        return $this->session_id;
    }

    public function setIpAddress($ip)
    {
        $this->ip_address = (string)$ip;

        return $this;
    }

    public function getIpAddress()
    {
        return $this->ip_address;
    }

    public function setCookie($cookie)
    {
        $this->cookie = (string)$cookie;

        return $this;
    }

    public function getCookie()
    {
        return $this->cookie;
    }

    public function setUserAgent($agent)
    {
        $this->user_agent = (string)$agent;

        return $this;
    }

    public function getUserAgent()
    {
        return $this->user_agent;
    }

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