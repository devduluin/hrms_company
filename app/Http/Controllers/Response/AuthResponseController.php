<?php

namespace App\Http\Controllers\Response;

use App\Http\Controllers\Controller;
use App\Traits\GuzzleTrait;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AuthResponseController extends Controller
{
    use GuzzleTrait;

    protected $apiGatewayUrl;
    public function __construct()
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
        if (isset($response) && $response['errors'] == null) {
            if (isset($response['error']) && $response['error']) {
                return response()->json([
                    'message' => $response['message'],
                ], 400);
            }

            $request->session()->put('app_token', $response['result']['token']);
            $request->session()->put('name', $response['result']['name']);
            $request->session()->put('account', $response['result']['account']);
            $request->session()->put('company_id', $response['result']['secondary_id']);
            return response()->json([
                'message' => $response['message'],
                'app_token' => $response['result']['token'],
                'name' => $response['result']['name'],
                'account' => $response['result']['account'],
                'company_id' => $response['result']['secondary_id'],
                'url' => url('dashboard/hrms')
            ], 200);
        } else {
            return response()->json([
                'message' => $response['message'],
                'errors' => $response['errors']
            ], 422);
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
        
        if (isset($response) && $response['errors'] == null) {
            if (isset($response['error']) && $response['error']) {
                return response()->json([
                    'message' => $response['message'],
                ], 400);
            }
            $redirect   = $response['result']['redirect'] ?? 'http://devhris.duluin.com';
            return response()->json([
                'url' => $redirect
            ], 200);
        } else {
            return response()->json([
                'message' => $response['message'],
                'errors' => $response['errors']
            ], 422);
        }

        //dd($request->all());
    }

    public function complete_company_register(Request $request)
    {
        //dd($request->all());
        $headers = [
            'Accept'        => 'application/json',
            'Authorization' => 'Bearer ' . $request->session()->get('app_token'),
            'x-account-type' => 'hris_company',
        ];

        $response = $this->postRequest($this->apiGatewayUrl . '/v1/companies/company', $request->all(), $headers);
        dd($response);
        if (isset($response) && $response['errors'] == null) {
            if (isset($response['error']) && $response['error']) {
                return response()->json([
                    'message' => $response['message'],
                ], 400);
            }
            
            //$redirect   = $response['result']['redirect'] ?? 'http://devhris.duluin.com';
            return response()->json([
                'url' => $redirect
            ], 200);
        } else {
            return response()->json([
                'message' => $response['message'],
                'errors' => $response['errors']
            ], 422);
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

    public function verify_email(Request $request) {}

    public function logout(Request $request)
    {
        $headers = [
            'accept' => 'application/json',
            'Authorization' => 'Bearer ' . $request->session()->get('app_token'),
            'x-account-type' => 'hris_company',
        ];
        $response = $this->postRequest($this->apiGatewayUrl . '/users/logout', $request, $headers);
        if (isset($response)) {
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
