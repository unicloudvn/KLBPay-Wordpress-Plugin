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
    public function __construct(string $transactionId,
                                string $refTransactionId,
                                string $virtualAccount,
                                string $actualAccount,
                                string $fromBin,
                                string $fromAccount,
                                bool   $success,
                                int    $amount,
                                string $statusCode,
                                string $txnNumber,
                                string $transferDesc,
                                string $time)
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
    public function getTransactionId(): string
    {
        return $this->transactionId;
    }

    /**
     * @param string $transactionId
     */
    public function setTransactionId(string $transactionId)
    {
        $this->transactionId = $transactionId;
    }

    /**
     * @return string
     */
    public function getRefTransactionId(): string
    {
        return $this->refTransactionId;
    }

    /**
     * @param string $refTransactionId
     */
    public function setRefTransactionId(string $refTransactionId): void
    {
        $this->refTransactionId = $refTransactionId;
    }

    /**
     * @return string
     */
    public function getVirtualAccount(): string
    {
        return $this->virtualAccount;
    }

    /**
     * @param string $virtualAccount
     */
    public function setVirtualAccount(string $virtualAccount): void
    {
        $this->virtualAccount = $virtualAccount;
    }

    /**
     * @return string
     */
    public function getActualAccount(): string
    {
        return $this->actualAccount;
    }

    /**
     * @param string $actualAccount
     */
    public function setActualAccount(string $actualAccount): void
    {
        $this->actualAccount = $actualAccount;
    }

    /**
     * @return string
     */
    public function getFromBin(): string
    {
        return $this->fromBin;
    }

    /**
     * @param string $fromBin
     */
    public function setFromBin(string $fromBin): void
    {
        $this->fromBin = $fromBin;
    }

    /**
     * @return string
     */
    public function getFromAccount(): string
    {
        return $this->fromAccount;
    }

    /**
     * @param string $fromAccount
     */
    public function setFromAccount(string $fromAccount): void
    {
        $this->fromAccount = $fromAccount;
    }

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->success;
    }

    /**
     * @param bool $success
     */
    public function setSuccess(bool $success): void
    {
        $this->success = $success;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getStatusCode(): string
    {
        return $this->statusCode;
    }

    /**
     * @param string $statusCode
     */
    public function setStatusCode(string $statusCode): void
    {
        $this->statusCode = $statusCode;
    }

    /**
     * @return string
     */
    public function getTxnNumber(): string
    {
        return $this->txnNumber;
    }

    /**
     * @param string $txnNumber
     */
    public function setTxnNumber(string $txnNumber): void
    {
        $this->txnNumber = $txnNumber;
    }

    /**
     * @return string
     */
    public function getTransferDesc(): string
    {
        return $this->transferDesc;
    }

    /**
     * @param string $transferDesc
     */
    public function setTransferDesc(string $transferDesc): void
    {
        $this->transferDesc = $transferDesc;
    }

    /**
     * @return string
     */
    public function getTime(): string
    {
        return $this->time;
    }

    /**
     * @param string $time
     */
    public function setTime(string $time): void
    {
        $this->time = $time;
    }

}
