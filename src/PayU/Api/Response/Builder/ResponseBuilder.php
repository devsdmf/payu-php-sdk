<?php

namespace PayU\Api\Response\Builder;

use PayU\Api\ContextInterface;
use PayU\Api\Request\AbstractRequest;
use PayU\Api\Response\QueryResponse;
use PayU\Exception\InvalidContextException;
use Psr\Http\Message\ResponseInterface;

class ResponseBuilder implements ContextInterface, BuilderInterface
{

    protected $context;

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

    public function getContext(){}

    public function build(AbstractRequest $request, ResponseInterface $response, $context = null)
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

    private function buildQueryResponse(ResponseInterface $response)
    {
        $data = json_decode($response->getBody(),true);

        $result = ($data['code'] == 'SUCCESS') ? true : false;

        $query_response = new QueryResponse($result,$data['error']);

        return $query_response;
    }

    private function buildPaymentResponse(ResponseInterface $response)
    {
        return $response;
    }
}