<?php

namespace src\security;

class PackedMessage
{
    public $clientId;
    public $signature;
    public $timestamp;
    public $encryptedData;

    /**
     * @param string $clientId
     * @param int $timestamp
     * @param string $signature
     * @param string $encryptedData
     */
    public function __construct(
        $clientId,
        $timestamp,
        $signature,
        $encryptedData
    )
    {
        $this->encryptedData = $encryptedData;
        $this->timestamp = $timestamp;
        $this->signature = $signature;
        $this->clientId = $clientId;
    }

    /**
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param string $clientId
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    }

    /**
     * @return string
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @param string $signature
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;
    }

    /**
     * @return int
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param int $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @return string
     */
    public function getEncryptedData()
    {
        return $this->encryptedData;
    }

    /**
     * @param string $encryptedData
     */
    public function setEncryptedData($encryptedData)
    {
        $this->encryptedData = $encryptedData;
    }

}
