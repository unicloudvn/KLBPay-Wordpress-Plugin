<?php

namespace src\security;

class Credential
{
    private $clientId;
    private $secretKey;
    private $encryptKey;



    /**
     * @param string $clientId
     * @param string $secretKey
     * @param string $encryptKey
     */
    public function __construct($clientId, $secretKey, $encryptKey)
    {
        $this->clientId = $clientId;
        $this->secretKey = $secretKey;
        $this->encryptKey = $encryptKey;
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
    public function getSecretKey()
    {
        return $this->secretKey;
    }

    /**
     * @param string $secretKey
     */
    public function setSecretKey($secretKey)
    {
        $this->secretKey = $secretKey;
    }

    /**
     * @return string
     */
    public function getEncryptKey()
    {
        return $this->encryptKey;
    }

    /**
     * @param string $encryptKey
     */
    public function setEncryptKey($encryptKey)
    {
        $this->encryptKey = $encryptKey;
    }


}
