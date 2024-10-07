<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    //
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }
    
    public function index()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Welcome to Dashboard Duluin HRMS';

        return view('dashboard.index', $data);
    }
}
