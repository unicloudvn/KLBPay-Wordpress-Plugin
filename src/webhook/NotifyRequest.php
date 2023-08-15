<?php

namespace src\webhook;

class NotifyRequest
{
    public $transactionId;
    public $refTransactionId;
    public $virtualAccount;
    public $actualAccount;
    public $fromBin;
    public $fromAccount;
    public $success;
    public $amount;
    public $statusCode;
    public $txnNumber;
    public $transferDesc;
    public $time; // yyyy-MM-dd HH:mm:ss

    /**
     * @param string $transactionId
     * @param string $refTransactionId
     * @param string $virtualAccount
     * @param string $actualAccount
     * @param string $fromBin
     * @param string $fromAccount
     * @param bool $success
     * @param int $amount
     * @param string $statusCode
     * @param string $txnNumber
     * @param string $transferDesc
     * @param string $time
     */
    public function __construct($transactionId,
                                $refTransactionId,
                                $virtualAccount,
                                $actualAccount,
                                $fromBin,
                                $fromAccount,
                                $success,
                                $amount,
                                $statusCode,
                                $txnNumber,
                                $transferDesc,
                                $time)
    {
        $this->transactionId = $transactionId;
        $this->refTransactionId = $refTransactionId;
        $this->virtualAccount = $virtualAccount;
        $this->actualAccount = $actualAccount;
        $this->fromBin = $fromBin;
        $this->fromAccount = $fromAccount;
        $this->success = $success;
        $this->amount = $amount;
        $this->statusCode = $statusCode;
        $this->txnNumber = $txnNumber;
        $this->transferDesc = $transferDesc;
        $this->time = $time;
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
     * @return string
     */
    public function getVirtualAccount()
    {
        return $this->virtualAccount;
    }

    /**
     * @param string $virtualAccount
     */
    public function setVirtualAccount($virtualAccount)
    {
        $this->virtualAccount = $virtualAccount;
    }

    /**
     * @return string
     */
    public function getActualAccount()
    {
        return $this->actualAccount;
    }

    /**
     * @param string $actualAccount
     */
    public function setActualAccount($actualAccount)
    {
        $this->actualAccount = $actualAccount;
    }

    /**
     * @return string
     */
    public function getFromBin()
    {
        return $this->fromBin;
    }

    /**
     * @param string $fromBin
     */
    public function setFromBin($fromBin)
    {
        $this->fromBin = $fromBin;
    }

    /**
     * @return string
     */
    public function getFromAccount()
    {
        return $this->fromAccount;
    }

    /**
     * @param string $fromAccount
     */
    public function setFromAccount($fromAccount)
    {
        $this->fromAccount = $fromAccount;
    }

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return $this->success;
    }

    /**
     * @param bool $success
     */
    public function setSuccess($success)
    {
        $this->success = $success;
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

    /**
     * @return string
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param string $statusCode
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    /**
     * @return string
     */
    public function getTxnNumber()
    {
        return $this->txnNumber;
    }

    /**
     * @param string $txnNumber
     */
    public function setTxnNumber($txnNumber)
    {
        $this->txnNumber = $txnNumber;
    }

    /**
     * @return string
     */
    public function getTransferDesc()
    {
        return $this->transferDesc;
    }

    /**
     * @param string $transferDesc
     */
    public function setTransferDesc($transferDesc)
    {
        $this->transferDesc = $transferDesc;
    }

    /**
     * @return string
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param string $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

}
