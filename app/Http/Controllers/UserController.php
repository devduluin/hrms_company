<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }

    public function index()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Data Overview';
        $data['apiUrl'] = $this->apiGatewayUrl . '/v1/employees';

        return view('dashboard.user.index', $data);
    }
}
