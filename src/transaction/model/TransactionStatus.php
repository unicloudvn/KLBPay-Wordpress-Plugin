<?php

namespace src\transaction\model;

use InvalidArgumentException;
use ReflectionClass;

class TransactionStatus
{
    const CREATED = ['code' => 1, 'status' => 'CREATED', 'name' => 'CREATED'];
    const SUCCESS = ['code' => 2, 'status' => 'SUCCESS', 'name' => 'SUCCESS'];
    const CANCELED = ['code' => 3, 'status' => 'CANCELED', 'name' => 'CANCELED'];
    const FAILED = ['code' => 4, 'status' => 'FAILED', 'name' => 'FAILED'];
    const TIMEOUT = ['code' => 5, 'status' => 'TIMEOUT', 'name' => 'TIMEOUT'];


    /**
     * @return array
     */
    public static function getConstants()
    {
        $oClass = new ReflectionClass(__CLASS__);
        return $oClass->getConstants();
    }

    /**
     * @param string $status
     * @return string
     */
    public static function valueOf($status)
    {
        $constants = self::getConstants();
        foreach ($constants as $name => $value) {
            if ($value['status'] == $status) {
                return $value['name'];
            }
        }
        throw new InvalidArgumentException('Invalid StatusCode');
    }

}

