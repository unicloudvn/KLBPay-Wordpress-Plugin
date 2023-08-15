<?php

namespace src\transaction\request;

class CancelTransactionRequest implements TransactionRequest
{
    public $transactionId;

    /**
     * @param string $transactionId
     */
    public function __construct( $transactionId)
    {
        $this->transactionId = $transactionId;
    }

    /**
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @param string $transactionId
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
    }

}
