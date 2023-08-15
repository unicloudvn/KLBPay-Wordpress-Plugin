<?php

namespace src\transaction\response;

class CreateTransactionResponse implements TransactionResponse
{
    public $transactionId;
    public $refTransactionId;
    public $payLinkCode;
    public $timeout;
    public $url;
    public $virtualAccount;
    public $description;
    public $amount;
    public $qrCodeString;
    public $status;
    public $time;

    /**
     * @param string $transactionId
     * @param string $refTransactionId
     * @param string $payLinkCode
     * @param int $timeout
     * @param string $url
     * @param string $virtualAccount
     * @param string $description
     * @param int $amount
     * @param string $qrCodeString
     * @param string $status
     * @param string $time
     */
    public function __construct($transactionId,
                                $refTransactionId,
                                $payLinkCode,
                                $timeout,
                                $url,
                                $virtualAccount,
                                $description,
                                $amount,
                                $qrCodeString,
                                $status,
                                $time)
    {
        $this->transactionId = $transactionId;
        $this->refTransactionId = $refTransactionId;
        $this->payLinkCode = $payLinkCode;
        $this->timeout = $timeout;
        $this->url = $url;
        $this->virtualAccount = $virtualAccount;
        $this->description = $description;
        $this->amount = $amount;
        $this->qrCodeString = $qrCodeString;
        $this->status = $status;
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
    public function getPayLinkCode()
    {
        return $this->payLinkCode;
    }

    /**
     * @param string $payLinkCode
     */
    public function setPayLinkCode($payLinkCode)
    {
        $this->payLinkCode = $payLinkCode;
    }

    /**
     * @return int
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * @param int $timeout
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
    public function getQrCodeString()
    {
        return $this->qrCodeString;
    }

    /**
     * @param string $qrCodeString
     */
    public function setQrCodeString($qrCodeString)
    {
        $this->qrCodeString = $qrCodeString;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
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
