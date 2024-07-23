<?php

namespace App\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

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
            return [
                'error' => true,
                'message' => $e->hasResponse() ? $e->getResponse()->getBody()->getContents() : $e->getMessage(),
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

/* Example Usage

public function anotherMethod()
{
    $response = $this->postRequest('some-endpoint', ['data' => 'value'], [
        'Custom-Header' => 'CustomValue'
    ]);
    return $response;
} */
