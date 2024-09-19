<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecruitmentController extends Controller
{
   
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }
    public function index()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Data Employees';
        $allSessions = session()->all();
        $data['company'] = $allSessions['company_id'][0];
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies';
        $data['apiEmployeeUrl'] = $this->apiGatewayUrl . '/v1/employees';
        $data['apiPayrollUrl'] = $this->apiGatewayUrl . '/v1/payrolls';
        // $data['apiEmployeeUrl'] = 'http://apidev.duluin.com/api/v1';
        $data['apiGateway'] = $this->apiGatewayUrl . '/users';
        // $data['employee_id'] = $id;
        $data['apiEmployeeUrl'] = $this->apiGatewayUrl . '/v1/employees';
        
        return view('dashboard.hrms.recruitment.index', $data);
    }
    
    public function create()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'New Job Applicant';
        
        return view('dashboard.hrms.recruitment.create', $data);
    }
}
