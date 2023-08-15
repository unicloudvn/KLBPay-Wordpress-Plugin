<?php

namespace src\exception;

use RuntimeException;

class PaymentException extends RuntimeException
{

    private $responseCode;

    /**
     * @param string $responseCode
     */
    public function __construct(string $responseCode)
    {
        parent::__construct();
        $this->responseCode = $responseCode;
    }

    /**
     * @return string
     */
    public function getResponseCode(): string
    {
        return $this->responseCode;
    }


    /**
     * @return string
     */
    public function getPaymentMessage(): string
    {
        return PayResponseCode::getMessage($this->responseCode);
    }

    /**
     * @return int
     */
    public function getPaymentCode(): int
    {
        return PayResponseCode::getCode($this->responseCode);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "\e[0;31m[ERROR]:\e[0m Caught PaymentException: " . "\e[0;31m'{$this->getPaymentMessage()}'\e[0m in {$this->file}({$this->line})\n";    }

}
