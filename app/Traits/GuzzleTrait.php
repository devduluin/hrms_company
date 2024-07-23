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
        $protocol 	= $request->secure() ? 'https://' : 'http://';
        $host 		= $protocol . $request->getHost();

        // Default headers
        $defaultHeaders = [
            'Content-Type' => 'application/json',
            'Connection' => 'Keep-Alive',
            'Keep-Alive' => 'timeout=5, max=100',
            'X-Forwarded-Host' =>  $host,
        ];

        // Merge default headers with custom headers
        $options['headers'] = array_merge($defaultHeaders, $headers);

        try {
            $response = $client->request($method, $url, $options);
            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                return [
                    'error' => true,
                    'message' => $e->getResponse()->getBody()->getContents(),
                ];
            }
            return [
                'error' => true,
                'message' => $e->getMessage(),
            ];
        }
    }

    public function getRequest($url, $params = [], $headers = [])
    {
        return $this->handleRequest('GET', $url, ['query' => $params], $headers);
    }

    public function postRequest($url, $data = [], $headers = [])
    {
        return $this->handleRequest('POST', $url, ['json' => $data], $headers);
    }

    public function patchRequest($url, $data = [], $headers = [])
    {
        return $this->handleRequest('PATCH', $url, ['json' => $data], $headers);
    }

    public function putRequest($url, $data = [], $headers = [])
    {
        return $this->handleRequest('PUT', $url, ['json' => $data], $headers);
    }

    public function deleteRequest($url, $params = [], $headers = [])
    {
        return $this->handleRequest('DELETE', $url, ['query' => $params], $headers);
    }
}


/* EXAMPLE USAGE

public function anotherMethod()
{
    $response = $this->postRequest('some-endpoint', ['data' => 'value'], [
        'Custom-Header' => 'CustomValue'
    ]);
    return $response;
} */