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
        string $clientId,
        int    $timestamp,
        string $signature,
        string $encryptedData
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
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * @param string $clientId
     */
    public function setClientId(string $clientId)
    {
        $this->clientId = $clientId;
    }

    /**
     * @return string
     */
    public function getSignature(): string
    {
        return $this->signature;
    }

    /**
     * @param string $signature
     */
    public function setSignature(string $signature)
    {
        $this->signature = $signature;
    }

    /**
     * @return int
     */
    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    /**
     * @param int $timestamp
     */
    public function setTimestamp(int $timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @return string
     */
    public function getEncryptedData(): string
    {
        return $this->encryptedData;
    }

    /**
     * @param string $encryptedData
     */
    public function setEncryptedData(string $encryptedData)
    {
        $this->encryptedData = $encryptedData;
    }

}
