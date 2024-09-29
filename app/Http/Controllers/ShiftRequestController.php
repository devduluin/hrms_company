<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShiftRequestController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }
    public function index()
    {
        $data['title'] = "Data shift request";
        $data['page_title'] = "Data shift request";
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/request-approver/request-approver/datatable";
        return view('dashboard.hrms.shiftrequest.index', $data);
    }
}
