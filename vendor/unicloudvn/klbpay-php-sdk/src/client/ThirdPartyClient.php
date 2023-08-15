<?php

namespace src\client;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use src\exception\PaymentException;
use src\exception\PayResponseCode;
use src\security\BaseHeader;
use src\security\PackedMessage;

class ThirdPartyClient
{
    /**
     * @param string $url
     * @param $request
     * @return ResponseInterface
     */
    private function execute(string $url, $request): ResponseInterface
    {
        try {
            $client = new Client();
            return $client->post($url, $request);
        } catch (GuzzleException $exception) {
            throw new PaymentException('PAYMENT_SECURITY_VIOLATION');
        }
    }

    /**
     * @param string $host
     * @param string $path
     * @param PackedMessage $packed_message
     * @return PackedMessage
     */
    public function callAPI(string $host,
                            string $path,
                            PackedMessage $packed_message): PackedMessage
    {
        $headers = [
            BaseHeader::CONTENT_TYPE => 'application/json',
            BaseHeader::CLIENT => $packed_message->getClientId(),
            BaseHeader::SIGNATURE => $packed_message->getSignature(),
            BaseHeader::TIMESTAMP => $packed_message->getTimestamp(),
        ];


        $request = [
            'body' => json_encode(new EncryptedBodyRequest($packed_message->getEncryptedData())),
            'headers' => $headers
        ];

        $url = $host . $path;

        $response = $this::execute($url, $request);

        if ($response->getStatusCode() !== 200) {
            throw new PaymentException('PAYMENT_TRANSACTION_FAILED');
        }

        $response_body = json_decode((string)$response->getBody(), true);
        if ($response_body === null) {
            throw new PaymentException('PAYMENT_TRANSACTION_FAILED');
        }

        $response_code = PayResponseCode::valueOf($response_body['code']);
        if ($response_code == null) {
            throw new PaymentException('PAYMENT_TRANSACTION_FAILED');
        }

        if ($response_code != PayResponseCode::SUCCESS['name']) {
            throw new PaymentException($response_code);
        }

        $encrypt_response = $response_body['data'];
        if ($encrypt_response === null) {
            throw new PaymentException('PAYMENT_TRANSACTION_FAILED');
        }

        $response_headers = $response->getHeaders();
        if (!isset($response_headers[BaseHeader::CLIENT]) ||
            !isset($response_headers[BaseHeader::TIMESTAMP]) ||
            !isset($response_headers[BaseHeader::SIGNATURE])) {
            throw new PaymentException('PAYMENT_SECURITY_VIOLATION');
        }

        return new PackedMessage(
            $response_headers[BaseHeader::CLIENT][0],
            (int)$response_headers[BaseHeader::TIMESTAMP][0],
            $response_headers[BaseHeader::SIGNATURE][0],
            $encrypt_response
        );
    }

}
