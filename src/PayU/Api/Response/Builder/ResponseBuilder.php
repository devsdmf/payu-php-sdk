<?php

namespace PayU\Api\Response\Builder;

use PayU\Api\ContextInterface;
use PayU\Api\Request\RequestInterface;
use PayU\Api\Response\PaymentResponse;
use PayU\Api\Response\QueryResponse;
use PayU\Exception\InvalidContextException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ResponseBuilder
 *
 * Build a response object based on request context
 *
 * @package PayU\Api\Response\Builder
 * @author Lucas Mendes <devsdmf@gmail.com>
 */
class ResponseBuilder implements ContextInterface, BuilderInterface
{

    /**
     * The context
     *
     * @var string
     */
    protected $context;

    /**
     * @inheritdoc
     */
    public function setContext($context)
    {
        switch ($context) {
            case self::CONTEXT_QUERY:
                $this->context = self::CONTEXT_QUERY;
                break;
            case self::CONTEXT_PAYMENT:
                $this->context = self::CONTEXT_PAYMENT;
                break;
            default:
                throw new InvalidContextException();
        }
    }

    /**
     * @inheritdoc
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param null              $context
     * @return null|PaymentResponse|QueryResponse
     */
    public function build(RequestInterface $request, ResponseInterface $response, $context = null)
    {
        if (!is_null($context)) {
            $this->setContext($context);
        } else {
            $this->setContext($request->getContext());
        }

        switch ($this->context) {
            case self::CONTEXT_QUERY:
                return $this->buildQueryResponse($response);
                break;
            case self::CONTEXT_PAYMENT:
                return $this->buildPaymentResponse($response);
                break;
            default:
                return null;
        }
    }

    /**
     * Build a query request response object
     *
     * @param ResponseInterface $response
     * @return QueryResponse
     */
    private function buildQueryResponse(ResponseInterface $response)
    {
        $data = json_decode($response->getBody(),true);

        $result = ($data['code'] == 'SUCCESS') ? true : false;

        $query_response = new QueryResponse($result,$data['error']);

        return $query_response;
    }

    /**
     * Build a payment request response object
     *
     * @param ResponseInterface $response
     * @return PaymentResponse
     */
    private function buildPaymentResponse(ResponseInterface $response)
    {
        $data = json_decode($response->getBody(),true);

        $result = ($data['code'] == 'SUCCESS') ? true : false;

        $payment_response = new PaymentResponse($result,$data['error'],$data);

        return $payment_response;
    }
}