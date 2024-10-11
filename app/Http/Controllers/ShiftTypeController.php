<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShiftTypeController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }

    public function index()
    {
        $data['title'] = "Data shift type";
        $data['page_title'] = "Data shift type";
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/companies/shift-type/datatable";
        return view('dashboard.hrms.shifttype.index', $data);
    }
    public function create()
    {
        $data['title'] = "Data shift type";
        $data['page_title'] = "New shift type";
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/companies/shift-type/datatable";
        return view('dashboard.hrms.shifttype.create', $data);
    }
}
