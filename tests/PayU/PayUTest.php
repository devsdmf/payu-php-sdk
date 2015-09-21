<?php

namespace PayU;

use PayU\Api\Request\Command;
use PayU\Api\Request\PaymentRequest;
use PayU\Merchant\Credentials;
use PayU\Transaction\Card\CreditCard;
use PayU\Transaction\Client\Address;
use PayU\Transaction\Client\Buyer;
use PayU\Transaction\Client\Payer;
use PayU\Transaction\Country;
use PayU\Transaction\Currency;
use PayU\Transaction\Order\Amount;
use PayU\Transaction\Order\Order;
use PayU\Transaction\PaymentMethod;
use PayU\Transaction\Transaction;

class PayUTest extends \PHPUnit_Framework_TestCase
{

    const MERCHANT_ID = '500365';

    protected $credentials = null;

    public function setUp()
    {
        $this->credentials = Credentials::factory('676k86ks53la6tni6clgd30jf6','403ba744e9827f3',PayU::ENV_SANDBOX);
    }

    public function testApprovedPayment()
    {
        $payu = PayU::factory(PayU::LANGUAGE_DEFAULT,PayU::ENV_SANDBOX);

        $payu->setCredentials($this->credentials);
        $payu->setMerchantId(self::MERCHANT_ID);

        $transaction = $this->createTransaction('APPROVED');

        $request = new PaymentRequest(Command::PAYMENT_SUBMIT_TRANSACTION);
        $request->setTransaction($transaction);

        $response = $payu->request($request);

        $this->assertInstanceOf('\PayU\Api\Response\PaymentResponse',$response);
        $this->assertTrue($response->isApproved());
        $this->assertNull($response->getError());
    }

    public function testPendingPayment()
    {
        $payu = PayU::factory(PayU::LANGUAGE_DEFAULT,PayU::ENV_SANDBOX);

        $payu->setCredentials($this->credentials);
        $payu->setMerchantId(self::MERCHANT_ID);

        $transaction = $this->createTransaction('PENDING');

        $request = new PaymentRequest(Command::PAYMENT_SUBMIT_TRANSACTION);
        $request->setTransaction($transaction);

        $response = $payu->request($request);

        $this->assertInstanceOf('\PayU\Api\Response\PaymentResponse',$response);
        $this->assertTrue($response->isPending());
        $this->assertNull($response->getError());
    }

    public function testDeclinedPayment()
    {
        $payu = PayU::factory(PayU::LANGUAGE_DEFAULT,PayU::ENV_SANDBOX);

        $payu->setCredentials($this->credentials);
        $payu->setMerchantId(self::MERCHANT_ID);

        $transaction = $this->createTransaction('DECLINED');

        $request = new PaymentRequest(Command::PAYMENT_SUBMIT_TRANSACTION);
        $request->setTransaction($transaction);

        $response = $payu->request($request);

        $this->assertInstanceOf('\PayU\Api\Response\PaymentResponse',$response);
        $this->assertTrue($response->isDeclined());
        $this->assertNull($response->getError());
    }

    public function createTransaction($expected = 'APPROVED')
    {
        $transaction = new Transaction();
        $transaction->setOrder($this->createOrder())
                    ->setPayer($this->createPayer())
                    ->setCreditCard($this->createCard($expected))
                    ->setInstallments(1)
                    ->setType(Transaction::AUTHORIZATION)
                    ->setPaymentMethod(PaymentMethod::VISA)
                    ->setCountry(Country::BRAZIL)
                    ->setSessionId('fooSession')
                    ->setIpAddress('127.0.0.1')
                    ->setCookie('fooCookie')
                    ->setUserAgent('Mozilla');

        return $transaction;
    }

    public function createOrder()
    {
        $order = new Order();
        $order->setAccountId('500719')
              ->setReferenceCode('001002')
              ->setDescription('Foo order')
              ->setBuyer($this->createBuyer())
              ->setShippingAddress($this->createAddress());

        $amount = new Amount(Amount::VALUE,100.00,Currency::BRAZIL);
        $order->addAmount($amount);

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

    public function createCard($expected = 'Foo')
    {
        $card = new CreditCard();
        $card->setName($expected)
             ->setNumber('4111111111111111')
             ->setCvv(123)
             ->setExpirationDate('2015/12');

        return $card;
    }
}