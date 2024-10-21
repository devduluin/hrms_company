<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }

    public function index()
    {
        $data['title']   = 'Data Currency';
        $data['page_title']   = 'Data Currency';
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/currency/currency/datatable";
        return view('dashboard.hrms.currency.index', $data);
    }

    public function create()
    {
        $data['title']   = 'Add new currency';
        $data['page_title']   = 'Add new Currency';
        
        return view('dashboard.hrms.currency.create', $data);
    }
}
