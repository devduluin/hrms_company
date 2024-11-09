<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GradeController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }

    public function index(Request $request)
    {
        $data['title'] = "Data Grade";
        $data['page_title'] = "Data Grade";
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/companies/employee-grade";
        return view('dashboard.hrms.grade.index', $data);
    }

    public function create()
    {
        $data['title'] = "Add New Grade";
        $data['page_title'] = "Add New Grade";
        $allSessions = session()->all();
        $data['company'] = $allSessions['company_id'];
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/companies/employee-grade";
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies/company/datatables';
       // $data['apiCompanyUrl'] = $this->apiGatewayUrl . "/v1/companies/company?company_id=".$data['company'];

        return view('dashboard.hrms.grade.create', $data);
    }

    public function update($id)
    {
        $data['title'] = "Duluin HRMS";
        $data['page_title'] = "Update Grade";
        $allSessions = session()->all();
        $data['id'] = $id;
        $data['company'] = $allSessions['company_id'];
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/companies/employee-grade";
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies/company/datatables';
        //$data['apiCompanyUrl'] = $this->apiGatewayUrl . "/v1/companies/company?company_id=".$data['company'];

        return view('dashboard.hrms.grade.create', $data);
    }
}
