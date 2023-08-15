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
    public function __construct(string $refTransactionId, int $amount, string $description, int $timeout, string $title, string $language, CustomerInfo $customerInfo, string $successUrl, string $failUrl, int $redirectAfter, string $bankAccountNo)
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
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getTimeout(): int
    {
        return $this->timeout;
    }

    /**
     * @param int $timeout
     */
    public function setTimeout(int $timeout): void
    {
        $this->timeout = $timeout;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    public function setLanguage(string $language): void
    {
        $this->language = $language;
    }

    /**
     * @return CustomerInfo
     */
    public function getCustomerInfo(): CustomerInfo
    {
        return $this->customerInfo;
    }

    /**
     * @param CustomerInfo $customerInfo
     */
    public function setCustomerInfo(CustomerInfo $customerInfo): void
    {
        $this->customerInfo = $customerInfo;
    }

    /**
     * @return string
     */
    public function getSuccessUrl(): string
    {
        return $this->successUrl;
    }

    /**
     * @param string $successUrl
     */
    public function setSuccessUrl(string $successUrl): void
    {
        $this->successUrl = $successUrl;
    }

    /**
     * @return string
     */
    public function getFailUrl(): string
    {
        return $this->failUrl;
    }

    /**
     * @param string $failUrl
     */
    public function setFailUrl(string $failUrl): void
    {
        $this->failUrl = $failUrl;
    }

    /**
     * @return int
     */
    public function getRedirectAfter(): int
    {
        return $this->redirectAfter;
    }

    /**
     * @param int $redirectAfter
     */
    public function setRedirectAfter(int $redirectAfter): void
    {
        $this->redirectAfter = $redirectAfter;
    }

    /**
     * @return string
     */
    public function getBankAccountNo(): string
    {
        return $this->bankAccountNo;
    }

    /**
     * @param string $bankAccountNo
     */
    public function setBankAccountNo(string $bankAccountNo): void
    {
        $this->bankAccountNo = $bankAccountNo;
    }

}
