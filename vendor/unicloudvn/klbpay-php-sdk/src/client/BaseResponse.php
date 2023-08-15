<?php

namespace src\client;

use src\exception\PayResponseCode;
use src\transaction\response\TransactionResponse;

class BaseResponse
{
    public $code;
    public $message;
    public $data;

    /**
     * @param TransactionResponse $data
     */
    public function __construct(TransactionResponse $data)
    {
        $this->data = $data;
        $this->message = PayResponseCode::SUCCESS['message'];
        $this->code = PayResponseCode::SUCCESS['code'];
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @param int $code
     */
    public function setCode(int $code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message)
    {
        $this->message = $message;
    }

    /**
     * @return TransactionResponse
     */
    public function getData(): TransactionResponse
    {
        return $this->data;
    }

    /**
     * @param mixed|null $data
     */
    public function setData(TransactionResponse $data)
    {
        $this->data = $data;
    }

}
