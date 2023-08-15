<?php

namespace src\webhook;

class NotifyResponse
{
    private $status;

    /**
     * @param bool $status
     */
    public function __construct( $status)
    {
        $this->status = $status;
    }

    /**
     * @return bool
     */
    public function isStatus()
    {
        return $this->status;
    }

    /**
     * @param bool $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

}
