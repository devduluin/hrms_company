<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\RequestException;

class SubdomainMiddleware
{
    protected $client;

    public function __construct()
    {
        $this->client = new GuzzleClient();
		  
    }
	
	/**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
	   
	   $protocol 	= $request->secure() ? 'https://' : 'http://';
       $host 		= $protocol . $request->getHost();
       $gateway     = env('API_GATEWAY_SERVER') . '/v1/needvalidatemyhost';
       $cacheKey    = md5($host);
	   $options = [
			'headers' => [
				'Content-Type' => 'application/json',
				'Connection' => 'Keep-Alive',
				'Keep-Alive' => 'timeout=5, max=100',
				'X-Forwarded-Host' => $host,
			],
		];
		
        $apiResponse = Cache::remember($cacheKey, 120, function () use ($request, $gateway, $options) {
            try {
                $response = $this->client->request('GET', $gateway, $options);
                $apiResponse = json_decode($response->getBody(), true);
			} catch (RequestException $e) {
				 
                \Log::error('Guzzle request error: ' . $e->getMessage());
                abort(404);
            } 
            return $apiResponse;
        });
		 

        if (($apiResponse['host'] != $host) || ($apiResponse['is_allowed'] != true)) {
            abort(404);
        }
        if($apiResponse['is_activated'] == false){
            Cache::forget($cacheKey);
        }

        Config::set('app.url', $host);
        if ($host === 'http://localhost') {
            Config::set('app.url', 'http://localhost/hris/public');
        }
	   
       URL::forceRootUrl(Config::get('app.url'));

	   $request->attributes->set('host', $host);
	   $request->attributes->set('is_activated', $apiResponse['is_activated']);

       return $next($request);
    }
}