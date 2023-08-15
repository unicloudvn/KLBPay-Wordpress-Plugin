<?php

namespace src\transaction\request;

use src\transaction\model\CustomerInfo;

class CreateTransactionRequest implements TransactionRequest
{
    public $refTransactionId;
    public $amount;
    public $description;
    public $timeout;
    public $title;
    public $language;
    public $customerInfo;
    public $successUrl;
    public $failUrl;
    public $redirectAfter;
    public $bankAccountNo;

    /**
     * @param string $refTransactionId
     * @param int $amount
     * @param string $description
     * @param int $timeout
     * @param string $title
     * @param string $language
     * @param CustomerInfo $customerInfo
     * @param string $successUrl
     * @param string $failUrl
     * @param int $redirectAfter
     * @param string $bankAccountNo
     */
    public function __construct($refTransactionId, $amount, $description, $timeout, $title, $language, CustomerInfo $customerInfo, $successUrl, $failUrl, $redirectAfter, $bankAccountNo)
    {
        $this->refTransactionId = $refTransactionId;
        $this->amount = $amount;
        $this->description = $description;
        $this->timeout = $timeout;
        $this->title = $title;
        $this->language = $language;
        $this->customerInfo = $customerInfo;
        $this->successUrl = $successUrl;
        $this->failUrl = $failUrl;
        $this->redirectAfter = $redirectAfter;
        $this->bankAccountNo = $bankAccountNo;
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
     * @return void;
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return CustomerInfo
     */
    public function getCustomerInfo()
    {
        return $this->customerInfo;
    }

    /**
     * @param CustomerInfo $customerInfo
     */
    public function setCustomerInfo(CustomerInfo $customerInfo)
    {
        $this->customerInfo = $customerInfo;
    }

    /**
     * @return string
     */
    public function getSuccessUrl()
    {
        return $this->successUrl;
    }

    /**
     * @param string $successUrl
     */
    public function setSuccessUrl($successUrl)
    {
        $this->successUrl = $successUrl;
    }

    /**
     * @return string
     */
    public function getFailUrl()
    {
        return $this->failUrl;
    }

    /**
     * @param string $failUrl
     */
    public function setFailUrl($failUrl)
    {
        $this->failUrl = $failUrl;
    }

    /**
     * @return int
     */
    public function getRedirectAfter()
    {
        return $this->redirectAfter;
    }

    /**
     * @param int $redirectAfter
     */
    public function setRedirectAfter($redirectAfter)
    {
        $this->redirectAfter = $redirectAfter;
    }

    /**
     * @return string
     */
    public function getBankAccountNo()
    {
        return $this->bankAccountNo;
    }

    /**
     * @param string $bankAccountNo
     */
    public function setBankAccountNo($bankAccountNo)
    {
        $this->bankAccountNo = $bankAccountNo;
    }

}
