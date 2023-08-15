<?php

namespace src\security;

use Exception;

class SecurityUtil
{

    /**
     * @throws Exception
     */
    private function __construct()
    {
        throw new Exception();
    }

    /**
     * @param string $input
     * @return string
     */
    public static function md5($input)
    {
        return md5($input);
    }

    /**
     * @throws Exception
     */
    public static function encryptAES($data, $key)
    {
        $iv = hex2bin(substr($key, 0, 32));
        $pri_key = hex2bin($key);
        $data_utf8 = mb_convert_encoding($data, 'UTF-8');
        $encrypted_data = openssl_encrypt($data_utf8, AES_CIPHER_ALGORITHM, $pri_key, OPENSSL_RAW_DATA, $iv);
        return base64_encode($encrypted_data);
    }

    /**
     * @param string $data
     * @param string $key
     * @return string
     */
    public static function decryptAES($data, $key)
    {
        $iv = hex2bin(substr($key, 0, 32));
        $key = hex2bin($key);
        return openssl_decrypt(base64_decode($data), AES_CIPHER_ALGORITHM, $key, OPENSSL_RAW_DATA, $iv);
    }

    /**
     * @param int $key_size
     * @return string
     */
    public static function getEncryptKey($key_size)
    {
        $key = openssl_random_pseudo_bytes($key_size / 8);
        return strtoupper(bin2hex($key));
    }

    /**
     * @param int $key_size
     * @return string
     */
    public static function getAESKey($key_size)
    {
        $key = openssl_random_pseudo_bytes($key_size / 8);
        return strtoupper(bin2hex($key));
    }

    /**
     * @param string $data
     * @param string $key
     * @return string
     */
    public static function hmacEncode($data, $key)
    {
        $hmac = hash_hmac('sha256', $data, $key, true);
        return bin2hex($hmac);
    }

    /**
     * @param string $client_id
     * @param string $timestamp
     * @param string $data
     * @return string
     */
    public static function buildRawSignature($client_id, $timestamp, $data)
    {
        return sprintf('%s|%s|%s', $client_id, $timestamp, $data);
    }
}