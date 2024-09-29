<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }
    public function index()
    {
        $data['title'] = "Data leave types";
        $data['page_title'] = "Data leave types";
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/leave-type/leave-type/datatable";
        return view('dashboard.hrms.leavetype.index', $data);
    }
}
