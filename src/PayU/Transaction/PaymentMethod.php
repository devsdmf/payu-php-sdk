<?php

namespace PayU\Transaction;

class PaymentMethod
{

    /**
     * Argentina Payment Methods
     */
    const ARGENCARD = 'ARGENCARD';
    const BAPRO = 'BAPRO';
    const CABAL = 'CABAL';
    const CENCOSUD = 'CENCOSUD';
    const COBRO_EXPRESS = 'COBRO_EXPRESS';
    const NARANJA = 'NARANJA';
    const PAGOFACIL = 'PAGOFACIL';
    const RAPIPAGO = 'RAPIPAGO';
    const RIPSA = 'RIPSA';
    const SHOPPING = 'SHOPPING';

    /**
     * Brazil Payment Methods
     */
    const BOLETO_BANCARIO = 'BOLETO_BANCARIO';
    const ELO = 'ELO';
    const HIPERCARD = 'HIPERCARD';

    /**
     * Chile Payment methods
     */
    const TRANSBANK = 'TRANSBANK';

    /**
     * Colombia Payment Methods
     */
    const BALOTO = 'BALOTO';
    const BANK_REFERENCED = 'BANK_REFERENCED';
    const PSE = 'PSE';
    const EFECTY = 'EFECTY';

    /**
     * Mexico Payment Methods
     */
    const BANAMEX = 'BANAMEX';
    const BANCOMER = 'BANCOMER';
    const IXE = 'IXE';
    const OXXO = 'OXXO';
    const SANTANDER = 'SANTANDER';
    const SEVEN_ELEVEN = 'SEVEN_ELEVEN';
    const SCOTIABANK = 'SCOTIABANK';

    /**
     * Panama Payment Methods
     */
    // Only general methods

    /**
     * Peru Payment Methods
     */
    const BCP = 'BCP';

    /**
     * General Payment Methods
     */
    const AMEX = 'AMEX';
    const DINERS = 'DINERS';
    const MASTERCARD = 'MASTERCARD';
    const VISA = 'VISA';

    private function __construct(){}
}