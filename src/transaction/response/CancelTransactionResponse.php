<?php

namespace src\transaction\response;

class CancelTransactionResponse implements TransactionResponse
{
    public $success;

    /**
     * @param bool $success
     */
    public function __construct( $success)
    {
        $this->success = $success;
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
    public function setSuccess( $success)
    {
        $this->success = $success;
    }

}
