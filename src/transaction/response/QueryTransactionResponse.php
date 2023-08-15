<?php

namespace src\transaction\response;

use src\transaction\model\TransactionStatus;

class QueryTransactionResponse implements TransactionResponse
{
    public $status;
    public $refTransactionId;
    public $amount;

    /**
     * @param string $status
     * @param string $refTransactionId
     * @param int $amount
     */
    public function __construct($status,
                                $refTransactionId,
                                $amount)
    {
        $this->status = $status;
        $this->refTransactionId = $refTransactionId;
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param TransactionStatus $status
     */
    public function setStatus(TransactionStatus $status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getRefTransactionId()
    {
        return $this->refTransactionId;
    }

    /**
     * @param string $refTransactionId
     */
    public function setRefTransactionId($refTransactionId)
    {
        $this->refTransactionId = $refTransactionId;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

}
