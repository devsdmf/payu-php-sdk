<?php

namespace PayU\Api\Request;

class Command
{

    /**
     * Commands available in Payment API
     */
    const PAYMENT_GET_BANKS_LIST      = 'GET_BANKS_LIST';
    const PAYMENT_GET_PAYMENT_METHODS = 'GET_PAYMENT_METHODS';
    const PAYMENT_PING                = 'PING';
    const PAYMENT_SUBMIT_TRANSACTION  = 'SUBMIT_TRANSACTION';

    /**
     * Commands available in Query API
     */
    const QUERY_PING                           = 'PING';
    const QUERY_ORDER_DETAIL                   = 'ORDER_DETAIL';
    const QUERY_ORDER_DETAIL_BY_REFERENCE_CODE = 'ORDER_DETAIL_BY_REFERENCE_CODE';
    const QUERY_TRANSACTION_RESPONSE_DETAIL    = 'TRANSACTION_RESPONSE_DETAIL';

    private function __construct(){}
}