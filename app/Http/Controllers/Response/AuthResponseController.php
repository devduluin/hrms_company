<?php

namespace App\Http\Controllers\Response;

use App\Http\Controllers\Controller;
use App\Traits\GuzzleTrait;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class AuthResponseController extends Controller
{
    use GuzzleTrait;

    protected $apiGatewayUrl;
    public function __construct(protected ResponseFactory $responseFactory)
    {
        
        $this->apiGatewayUrl = config('apiendpoints.gateway');
        //$this->apiGatewayUrl = 'http://api_gatway.test/api';
    }

    public function signin(Request $request)
    {
        $headers = [
            'Accept'        => 'application/json',
            'x-account-type' => 'hris_company',
        ];
        $response = $this->postRequest($this->apiGatewayUrl . '/users/login', $request->all(), $headers);
        $responseBody = json_decode($response->getBody(), true);
         
        if (isset($responseBody) && $responseBody['errors'] == null) {
            if($response->getStatusCode() == 200){
           
                $request->session()->put('user_id', $responseBody['result']['user_id']);
                $request->session()->put('app_token', $responseBody['result']['token']);
                $request->session()->put('name', $responseBody['result']['name']);
                $request->session()->put('account', $responseBody['result']['account']);
                $request->session()->put('company_id', $responseBody['result']['secondary_id']);
                return response()->json([
                    'message' => $responseBody['message'],
                    'app_token' => $responseBody['result']['token'],
                    'name' => $responseBody['result']['name'],
                    'account' => $responseBody['result']['account'],
                    'company_id' => $responseBody['result']['secondary_id'] ?? null,
                    'redirect' => url('dashboard/hrms?initialize=success')
                ], 200);
            }else{
                return $this->responseFactory->make(
                    content: $response->getBody(),
                    status: $response->getStatusCode(),
                    headers: ['Content-Type' => $response->getHeader('Content-Type')]
                );
            }
        } else {
            return $this->responseFactory->make(
                content: $response->getBody(),
                status: $response->getStatusCode(),
                headers: ['Content-Type' => $response->getHeader('Content-Type')]
            );
        }
    }

    public function authenticate(Request $request)
    {
        dd($request->all());
    }

    public function signup(Request $request) 
    {
        $headers = [
            'Accept'        => 'application/json',
            'x-account-type' => 'hris_company',
        ];

        $response = $this->postRequest($this->apiGatewayUrl . '/users/register', $request->all(), $headers);
         
        return $this->responseFactory->make(
            content: $response->getBody(),
            status: $response->getStatusCode(),
            headers: ['Content-Type' => $response->getHeader('Content-Type')]
        );
        
    }

    public function activate_account(Request $request) 
    {
        $headers = [
            'Accept'        => 'application/json',
            'x-account-type' => 'hris_company',
        ];

        $response = $this->postRequest($this->apiGatewayUrl . '/users/register/activate_account', $request->all(), $headers);
        
        return $this->responseFactory->make(
            content: $response->getBody(),
            status: $response->getStatusCode(),
            headers: ['Content-Type' => $response->getHeader('Content-Type')]
        );
    }

    public function complete_company_register(Request $request)
    {
        
        $protocol     = $request->secure() ? 'https://' : 'http://';
        $host         = $protocol . $request->getHost();

        $headers = [
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . $request->session()->get('app_token'),
            'X-Forwarded-Host' => $host,
        ];

        // dd($request->all());
        $data = [
            'user_id'        => $request->user_id,
            'company_name' => $request->company_name,
            'date_of_establishment' => $request->date_of_establishment,
            'default_currency' => $request->default_currency,
            'domain' => $request->domain,
            'latlong'   => $request->latlong,
            'address'    => $request->address,
        ];

        if($request->secondary_id){
            $data['secondary_id'] = $request->secondary_id;
        }

        $response = $this->postRequest($this->apiGatewayUrl . '/v1/companies/company', $data, $headers);
        $responseBody = json_decode($response->getBody(), true);
         
        if (isset($responseBody)) {
            if (isset($responseBody['error']) && $responseBody['error']) {
                return response()->json([
                    'message' => $responseBody['message'],
                ], 400);
            }
			$responseBody   = $responseBody['data'];
            
            $userAccount['user_id'] 		= $responseBody['user_id'];
            $userAccount['secondary_id'] 	= $responseBody['id'];
			$response2 = $this->postRequest($this->apiGatewayUrl . '/users/register/set_secondary_id', $userAccount, $headers);
			$responseUser = json_decode($response2->getBody(), true); 
            
            if (isset($responseUser)) {
                $request->session()->forget('company_id');
                $request->session()->put('company_id', $userAccount['secondary_id']);
                 
                $redirect   = url('dashboard/hrms/setup_initialize');
				return response()->json([
					'company_id' => $userAccount['secondary_id'],
					'url' => $redirect
				], 200);
			}
           
        } else {
            return $this->responseFactory->make(
                content: $response->getBody(),
                status: $response->getStatusCode(),
                headers: ['Content-Type' => $response->getHeader('Content-Type')]
            );
        }
    }


    public function user(Request $request)
    {
        $response = $this->getRequest('some-endpoint', ['param1' => 'value1'], [
            'Custom-Header' => 'CustomValue'
        ]);
        return $response;
    }

    public function password_recovery($token) {}

    public function verify_email(Request $request) {

    }

    public function logout(Request $request)
    {
        $headers = [
            'accept' => 'application/json',
            'Authorization' => 'Bearer ' . $request->session()->get('app_token'),
            'x-account-type' => 'hris_company',
        ];
        $response = $this->postRequest($this->apiGatewayUrl . '/users/logout', $request, $headers);
        $responseBody = json_decode($response->getBody(), true);
        if (isset($responseBody)) {
            $request->session()->invalidate();
            $request->session()->forget('app_token');
            $request->session()->forget('name');
            $request->session()->forget('account');
            $request->session()->forget('company_id');
            $request->session()->flush();
            return redirect('signin');
        }
        return redirect('signin');
    }
}
