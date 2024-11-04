<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }
    public function index()
    {
        $data['title'] = "Data Department";
        $data['page_title'] = "Data department";
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/companies/department";
        return view('dashboard.hrms.department.index', $data);
    }

    public function create()
    {
        $data['title'] = "Add New Department";
        $data['page_title'] = "Add New Department";
        $allSessions = session()->all();
        $data['company'] = $allSessions['company_id'];
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/companies/department";
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies/company/datatables';
        $data['apiDepartmentUrl'] = $this->apiGatewayUrl . "/v1/companies/department/datatables";

        return view('dashboard.hrms.department.create', $data);
    }

    public function update($id)
    {
        $data['title'] = "Updat Department";
        $data['page_title'] = "Updat Department";
        $allSessions = session()->all();
        $data['id'] = $id;
        $data['company'] = $allSessions['company_id'];
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/companies/department";
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies/company/datatables';
        $data['apiDepartmentUrl'] = $this->apiGatewayUrl . "/v1/companies/department/datatables";
        $data['apiUrlApprover'] = $this->apiGatewayUrl . "/v1/companies/request-approver";
        $data['apiUrlEmployee'] = $this->apiGatewayUrl . "/v1/employees/employee/datatables";

        return view('dashboard.hrms.department.detail', $data);
    }
    
}
