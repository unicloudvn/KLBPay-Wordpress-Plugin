<?php

namespace src;

use Exception;
use src\client\ThirdPartyClient;
use src\security\PackedMessage;
use src\transaction\request\CancelTransactionRequest;
use src\transaction\request\CreateTransactionRequest;
use src\transaction\request\QueryTransactionRequest;
use src\transaction\request\TransactionRequest;
use src\transaction\response\CancelTransactionResponse;
use src\transaction\response\CreateTransactionResponse;
use src\transaction\response\QueryTransactionResponse;

require_once 'config/config.php';

class KPayClient
{
    public $client;
    public $kPayPacker;


    /**
     * @param KPayPacker $kPayPacker
     */
    public function __construct(KPayPacker $kPayPacker)
    {
        $this->kPayPacker = $kPayPacker;
        $this->client = new ThirdPartyClient();
    }

    /**
     * @return KPayPacker
     */
    public function getKPayPacker()
    {
        return $this->kPayPacker;
    }


    /**
     * @param string $path
     * @param TransactionRequest $request
     * @return PackedMessage
     * @throws Exception
     */
    public function execute( $path, TransactionRequest $request)
    {
        $packed_request = $this->kPayPacker->encode($request);
        return $this->client->callAPI($this->kPayPacker->getHost(), $path, $packed_request);
    }


    /**
     * @param CreateTransactionRequest $request
     * @return CreateTransactionResponse
     * @throws Exception
     */
    public function createTransaction(CreateTransactionRequest $request)
    {
        $packed_response = $this->execute(CREATE_TRANSACTION_PATH, $request);
        return $this->kPayPacker->create($packed_response);
    }


    /**
     * @param CancelTransactionRequest $request
     * @return CancelTransactionResponse
     * @throws Exception
     */
    public function cancelTransaction(CancelTransactionRequest $request)
    {
        $packed_response = $this->execute(CANCEL_TRANSACTION_PATH, $request);
        return $this->kPayPacker->cancel($packed_response);
    }

    /**
     * @throws Exception
     */
    public function checkTransaction(QueryTransactionRequest $request)
    {
        $packed_response = $this->execute(CHECK_TRANSACTION_PATH, $request);
        return $this->kPayPacker->check($packed_response);
    }

}
