<?php

namespace App\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

trait GuzzleTrait
{
    protected function getClient()
    {
        return new Client([
            'base_uri' => env('API_GATEWAY_SERVER'),
            'timeout'  => 5.0,
        ]);
    }

    protected function handleRequest($method, $url, $options = [], $headers = [])
    {
        $client = $this->getClient();
        $protocol = request()->secure() ? 'https://' : 'http://';
        $host = $protocol . request()->getHost();

        $defaultHeaders = [
            'Content-Type' => 'application/json',
            'Connection' => 'Keep-Alive',
            'Keep-Alive' => 'timeout=5, max=100',
            'X-Forwarded-Host' => $host,
        ];

        $options['headers'] = array_merge($defaultHeaders, $headers);

        try {
            $response = $client->request($method, $url, $options);
            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            info($e);
            $data = json_decode($e->getResponse()->getBody()->getContents(), true);
            return [
                'error' => true,
                'message' => $data['message'],
                'errors' => $data['errors'] ?? null,
            ];
        }
    }

    public function getRequest($url, $id = '', $headers = [])
    {
        if (!empty($id)) {
            return $this->handleRequest('GET', "{$url}/{$id}", [], $headers);
        }
        return $this->handleRequest('GET', "{$url}", [], $headers);
    }

    public function deleteRequest($url, $id, $headers = [])
    {
        return $this->handleRequest('DELETE', "{$url}/{$id}", [], $headers);
    }

    public function postRequest($url, $data = [], $headers = [])
    {
        return $this->handleRequest('POST', $url, ['body' => json_encode($data)], $headers);
    }

    public function patchRequest($url, $data = [], $headers = [])
    {
        return $this->handleRequest('PATCH', $url, ['body' => json_encode($data)], $headers);
    }

    public function putRequest($url, $data = [], $headers = [])
    {
        return $this->handleRequest('PUT', $url, ['body' => json_encode($data)], $headers);
    }
}

/* Example Usage

public function anotherMethod()
{
    $response = $this->postRequest('some-endpoint', ['data' => 'value'], [
        'Custom-Header' => 'CustomValue'
    ]);
    return $response;
} */
