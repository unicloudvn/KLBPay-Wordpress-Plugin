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
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param int $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return TransactionResponse
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed|null $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

}
