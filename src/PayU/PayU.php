<?php

namespace PayU;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use PayU\Api\CommandInterface;
use PayU\Api\Request\PaymentRequest;
use PayU\Api\Request\QueryRequest;
use PayU\Api\Request\RequestInterface;
use PayU\Api\Response\AbstractResponse;
use PayU\Api\Response\Builder\BuilderInterface;
use PayU\Api\Response\Builder\ResponseBuilder;
use PayU\Api\Response\PaymentResponse;
use PayU\Api\Response\QueryResponse;
use PayU\Environment\EnvironmentInterface;
use PayU\Environment\Production;
use PayU\Environment\Sandbox;
use PayU\Exception\InvalidBuilderException;
use PayU\Exception\InvalidEnvironmentException;
use PayU\Exception\InvalidLanguageException;
use PayU\Exception\PayUException;
use PayU\Merchant\Credentials;
use PayU\Transaction\Transaction;

/**
 * Class PayU
 *
 * The PayU client wrapper
 *
 * @package PayU
 * @author Lucas Mendes <devsdmf@gmail.com>
 */
class PayU
{

    const ENV_PRODUCTION = 'production';
    const ENV_SANDBOX    = 'sandbox';
    const ENV_DEFAULT    = self::ENV_PRODUCTION;

    const LANGUAGE_ENGLISH    = 'en';
    const LANGUAGE_SPANISH    = 'es';
    const LANGUAGE_PORTUGUESE = 'pt';
    const LANGUAGE_DEFAULT    = self::LANGUAGE_ENGLISH;

    /**
     * @var Client
     */
    protected $httpClient;

    /**
     * @var EnvironmentInterface
     */
    protected $environment;

    /**
     * @var BuilderInterface
     */
    protected $builder;

    /**
     * @var string
     */
    protected $language;

    /**
     * @var string
     */
    protected $merchantId = null;

    /**
     * @var Credentials
     */
    protected $credentials = null;

    /**
     * @var string
     */
    protected $notifyUrl = null;

    /**
     * @var string
     */
    protected $partnerId = null;

    /**
     * The Constructor
     *
     * @param EnvironmentInterface $env
     * @param BuilderInterface     $builder
     * @param string               $language
     * @param string               $partnerId
     */
    public function __construct(EnvironmentInterface $env, BuilderInterface $builder, $language = self::LANGUAGE_DEFAULT, $partnerId = null)
    {
        $this->httpClient = new Client();

        $this->setEnvironment($env);
        $this->setBuilder($builder);
        $this->setLanguage($language);
    }

    /**
     * Set the API language
     *
     * @param string $language
     */
    private function setLanguage($language = self::LANGUAGE_DEFAULT)
    {
        switch ($language) {
            case null:
                $this->language = self::LANGUAGE_DEFAULT;
                break;
            case self::LANGUAGE_ENGLISH:
                $this->language = self::LANGUAGE_ENGLISH;
                break;
            case self::LANGUAGE_PORTUGUESE:
                $this->language = self::LANGUAGE_PORTUGUESE;
                break;
            case self::LANGUAGE_SPANISH:
                $this->language = self::LANGUAGE_SPANISH;
                break;
            default:
                throw new InvalidLanguageException();
        }
    }

    /**
     * Get the current language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set the environment instance
     *
     * @param EnvironmentInterface $env
     */
    private function setEnvironment(EnvironmentInterface $env)
    {
        $this->environment = $env;
    }

    /**
     * Get the current environment
     *
     * @return EnvironmentInterface
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * Set the response builder
     *
     * @param BuilderInterface $builder
     */
    private function setBuilder(BuilderInterface $builder)
    {
        $this->builder = $builder;
    }

    /**
     * Set the merchant identification
     *
     * @param $merchant
     * @return PayU
     */
    public function setMerchantId($merchant)
    {
        $this->merchantId = (string)$merchant;

        return $this;
    }

    /**
     * Get the merchant id
     *
     * @return string
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * Set the credentials objects
     *
     * @param Credentials $credentials
     * @return PayU
     */
    public function setCredentials(Credentials $credentials)
    {
        $this->credentials = $credentials;

        return $this;
    }

    /**
     * Get the credentials
     *
     * @return Credentials
     */
    public function getCredentials()
    {
        return $this->credentials;
    }

    /**
     * Set notify URL
     *
     * @param string $url
     * @return PayU
     */
    public function setNotifyUrl($url)
    {
        $this->notifyUrl = $url;

        return $this;
    }

    /**
     * Get the notify URL
     *
     * @return string
     */
    public function getNotifyUrl()
    {
        return $this->notifyUrl;
    }

    /**
     * Set the partner id
     *
     * @param string $id
     * @return PayU
     */
    public function setPartnerId($id)
    {
        $this->partnerId = $id;

        return $this;
    }

    /**
     * Get the partner id
     *
     * @return string
     */
    public function getPartnerId()
    {
        return $this->partnerId;
    }

    /**
     * Search order by id
     *
     * @param string $orderId
     * @return QueryResponse
     */
    public function getOrderById($orderId)
    {
        $request = new QueryRequest(CommandInterface::QUERY_ORDER_DETAIL);
        $request->setOrderId($orderId);

        return $this->request($request);
    }

    /**
     * Search order by reference code
     *
     * @param string $referenceCode
     * @return QueryResponse
     */
    public function getOrderByReference($referenceCode)
    {
        $request = new QueryRequest(CommandInterface::QUERY_ORDER_DETAIL_BY_REFERENCE_CODE);
        $request->setReferenceCode($referenceCode);

        return $this->request($request);
    }

    /**
     * Search order by transaction id
     *
     * @param string $transactionId
     * @return QueryResponse
     */
    public function getTransactionById($transactionId)
    {
        $request = new QueryRequest(CommandInterface::QUERY_TRANSACTION_RESPONSE_DETAIL);
        $request->setTransactionId($transactionId);

        return $this->request($request);
    }

    /**
     * Create a payment transaction in API
     *
     * @param Transaction $transaction
     * @return PaymentResponse
     */
    public function doPayment(Transaction $transaction)
    {
        $request = new PaymentRequest(CommandInterface::PAYMENT_SUBMIT_TRANSACTION);
        $request->setTransaction($transaction);

        return $this->request($request);
    }

    /**
     * Perform a request in API
     *
     * @param RequestInterface $request
     * @return AbstractResponse
     *
     * @throws PayUException
     */
    public function request(RequestInterface $request)
    {
        try {
            $url = $this->environment->getUrl($request->getContext());

            $body = $request->compile($this);

            $headers = $this->environment->getHeaders();

            $options = array_merge(['body'=>$body],['headers'=>$headers],$this->environment->getOptions());

            $response = $this->httpClient->post($url,$options);

            return $this->builder->build($request,$response);
        } catch (RequestException $e) {
            throw new PayUException('A request error occurred',0,$e);
        }
    }

    /**
     * Check the API and credentials statuses
     *
     * @param Credentials $credentials
     * @param string      $language
     * @param string      $environment
     * @return AbstractResponse
     */
    public static function ping(Credentials $credentials, $language = null, $environment = null)
    {
        $instance = self::factory($language,$environment);
        $instance->setCredentials($credentials);

        $request = new QueryRequest(CommandInterface::PING);

        return $instance->request($request);
    }

    /**
     * Get a new instance of the PayU client
     *
     * @param string           $language
     * @param string           $environment
     * @param BuilderInterface $builder
     * @return PayU
     */
    public static function factory($language = self::LANGUAGE_DEFAULT, $environment = self::ENV_DEFAULT, BuilderInterface $builder = null)
    {
        if (is_null($environment)) {
            $environment = self::ENV_DEFAULT;
        }

        if ($environment == self::ENV_PRODUCTION) {
            $environment = new Production();
        } elseif ($environment == self::ENV_SANDBOX) {
            $environment = new Sandbox();
        } elseif (!$environment instanceof EnvironmentInterface) {
            throw new InvalidEnvironmentException();
        }

        if (is_null($builder)) {
            $builder = new ResponseBuilder();
        } elseif (!$builder instanceof BuilderInterface) {
            throw new InvalidBuilderException();
        }

        return new self($environment,$builder,$language);
    }
}