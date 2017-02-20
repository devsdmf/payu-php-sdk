<?php

namespace PayU\Transaction;

use PayU\Transaction\Card\CreditCard;
use PayU\Transaction\Client\Address;
use PayU\Transaction\Client\Buyer;
use PayU\Transaction\Client\Payer;
use PayU\Transaction\Order\Amount;
use PayU\Transaction\Order\Order;

class TransactionTest extends \PHPUnit_Framework_TestCase
{

    public function setUp(){}

    public function testSetOrder()
    {
        $transaction = new Transaction();
        $transaction->setOrder($this->createOrder());

        $this->assertAttributeInstanceOf('\PayU\Transaction\Order\Order','order',$transaction);
    }

    public function testSetPayer()
    {
        $transaction = new Transaction();
        $transaction->setPayer($this->createPayer());

        $this->assertAttributeInstanceOf('\PayU\Transaction\Client\Payer','payer',$transaction);
    }

    public function testSetCreditCard()
    {
        $transaction = new Transaction();
        $transaction->setCreditCard($this->createCard());

        $this->assertAttributeInstanceOf('\PayU\Transaction\Card\CreditCard','card',$transaction);
    }

    public function testSetInstallments()
    {
        $transaction = new Transaction();
        $transaction->setInstallments(1);

        $this->assertAttributeEquals(1,'installments',$transaction);
    }

    public function testSetType()
    {
        $transaction = new Transaction();
        $transaction->setType(Transaction::AUTHORIZATION);

        $this->assertAttributeEquals(Transaction::AUTHORIZATION,'type',$transaction);
    }

    public function testSetPaymentMethod()
    {
        $transaction = new Transaction();
        $transaction->setPaymentMethod(PaymentMethod::VISA);

        $this->assertAttributeEquals(PaymentMethod::VISA,'method',$transaction);
    }

    public function testSetCountry()
    {
        $transaction = new Transaction();
        $transaction->setCountry(Country::BRAZIL);

        $this->assertAttributeEquals(Country::BRAZIL,'country',$transaction);
    }

    public function testSetSessionId()
    {
        $transaction = new Transaction();
        $transaction->setSessionId('foo');

        $this->assertAttributeEquals('foo','session_id',$transaction);
    }

    public function testSetIpAddress()
    {
        $transaction = new Transaction();
        $transaction->setIpAddress('127.0.0.1');

        $this->assertAttributeEquals('127.0.0.1','ip_address',$transaction);
    }

    public function testSetCookie()
    {
        $transaction = new Transaction();
        $transaction->setCookie('foo');

        $this->assertAttributeEquals('foo','cookie',$transaction);
    }

    public function testSetUserAgent()
    {
        $transaction = new Transaction();
        $transaction->setUserAgent('Mozilla');

        $this->assertAttributeEquals('Mozilla','user_agent',$transaction);
    }

    public function testToArray()
    {
        $transaction = new Transaction();
        $order = $this->createOrder();
        $payer = $this->createPayer();
        $card = $this->createCard();

        $transaction->setOrder($order)
                    ->setPayer($payer)
                    ->setCreditCard($card)
                    ->setInstallments(1)
                    ->setType(Transaction::AUTHORIZATION)
                    ->setPaymentMethod(PaymentMethod::VISA)
                    ->setCountry(Country::BRAZIL)
                    ->setSessionId('fooSession')
                    ->setIpAddress('127.0.0.1')
                    ->setCookie('fooCookie')
                    ->setUserAgent('Mozilla');

        $data = $transaction->toArray();

        $this->assertArraySubset($order->toArray(),$data['order']);
        $this->assertArraySubset($payer->toArray(),$data['payer']);
        $this->assertArraySubset($card->toArray(),$data['creditCard']);
        $this->assertArraySubset(['INSTALLMENTS_NUMBER'=>1],$data['extraParameters']);
        $this->assertArrayHasKey('type',$data);
        $this->assertArrayHasKey('paymentMethod',$data);
        $this->assertArrayHasKey('paymentCountry',$data);
        $this->assertArrayHasKey('deviceSessionId',$data);
        $this->assertArrayHasKey('ipAddress',$data);
        $this->assertArrayHasKey('cookie',$data);
        $this->assertArrayHasKey('userAgent',$data);
    }

    public function createOrder()
    {
        $order = new Order();

        $order->setAccountId('foo')
              ->setReferenceCode('001002')
              ->setDescription('Foo order');

        $amount = new Amount(Amount::VALUE,1.00,Currency::BRAZIL);
        $order->addAmount($amount);

        $buyer = $this->createBuyer();
        $order->setBuyer($buyer);

        $address = $this->createAddress();
        $order->setShippingAddress($address);

        return $order;
    }

    public function createBuyer()
    {
        $buyer = new Buyer();
        $buyer->setName('Foo')
              ->setId(123)
              ->setPhone('55313131')
              ->setDni('123123')
              ->setCnpj('123123123')
              ->setEmail('foo@bar.com')
              ->setAddress($this->createAddress());

        return $buyer;
    }

    public function createPayer()
    {
        $payer = new Payer();
        $payer->setId(123)
              ->setName('Foo')
              ->setEmail('foo@bar.com')
              ->setDni('123123')
              ->setPhone('55313131')
              ->setAddress($this->createAddress());

        return $payer;
    }

    public function createAddress()
    {
        $address = new Address();
        $address->setStreet('St. Foo')
                ->setNumber(123)
                ->setComplement('FOO')
                ->setNeighborhood('Bar Neighborhood')
                ->setCity('Foo City')
                ->setState('Bar State')
                ->setCountry(Country::BRAZIL)
                ->setPhone('55313131');

        return $address;
    }

    public function createCard()
    {
        $card = new CreditCard();
        $card->setName('FOO BAR')
             ->setNumber('1111222233334444')
             ->setCvv(123)
             ->setExpirationDate('2015/04');

        return $card;
    }
}