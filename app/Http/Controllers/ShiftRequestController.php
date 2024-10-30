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
        $data['title'] = "Data Shift Request";
        $data['page_title'] = "Data Shift Request";
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/companies/request-approver";
        return view('dashboard.hrms.shiftrequest.index', $data);
    }
    public function create()
    {
        $data['title'] = "Data Shift Request";
        $data['page_title'] = "New Shift Request";
        $allSessions = session()->all();
        $data['company'] = $allSessions['company_id'][0];
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies/company/datatables';
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/companies/request-approver";
        $data['apiDepartmentUrl'] = $this->apiGatewayUrl . "/v1/companies/department/datatables";
        $data['apiEmployeeUrl'] = $this->apiGatewayUrl . "/v1/employees/employee/datatables";
        return view('dashboard.hrms.shiftrequest.create', $data);
    }

    public function update($id)
    {
        $data['title'] = "Data Shift Request";
        $data['page_title'] = "New Shift Request";
        $allSessions = session()->all();
        $data['id'] = $id;
        $data['company'] = $allSessions['company_id'][0];
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/companies/request-approver";
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies/company/datatables';
        $data['apiDepartmentUrl'] = $this->apiGatewayUrl . "/v1/companies/department/datatables";
        $data['apiEmployeeUrl'] = $this->apiGatewayUrl . "/v1/employees/employee/datatables";
        return view('dashboard.hrms.shiftrequest.create', $data);
    }
}
