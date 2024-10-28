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
        $data['title'] = "Data Leave Types";
        $data['page_title'] = "Data Leave Types";
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/companies/leave-type";
        return view('dashboard.hrms.leavetype.index', $data);
    }
    public function create()
    {
        $data['title'] = "Add New Leave Types";
        $data['page_title'] = "Add New Leave Types";
        $allSessions = session()->all();
        $data['company'] = $allSessions['company_id'][0];
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies/company/datatables';
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/companies/leave-type";
        return view('dashboard.hrms.leavetype.create', $data);
    }

    public function update($id)
    {
        $data['title'] = "Update Leave Types";
        $data['page_title'] = "Update Leave Types";
        $allSessions = session()->all();
        $data['id'] = $id;
        $data['company'] = $allSessions['company_id'][0];
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/companies/leave-type";
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies/company/datatables';
        

        return view('dashboard.hrms.leavetype.create', $data);
    }
}
