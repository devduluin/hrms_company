<?php

namespace App\Http\Controllers\Payroll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SalaryComponentController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }

    public function index(Request $request)
    {
        $data['title']  = 'Duluin HRMS';
        $data['page_title'] = 'Salary Components';
        $data['apiPayrollUrl'] = $this->apiGatewayUrl . '/v1/salary_components';
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies/company/datatables';
        $data['company_id'] = session()->get('company_id');

        return view('dashboard.payroll.payout.salary_component.list', $data);
    }

    public function create(Request $request)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Create Salary Component';
        $data['apiPayrollUrl'] = $this->apiGatewayUrl . '/v1/salary_components';
        $allSessions = session()->all();
        $data['company'] = $allSessions['company_id'];
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies';

        return view('dashboard.payroll.payout.salary_component.create', $data);
    }

    public function edit($id, Request $request)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Update Salary Component';
        $data['apiPayrollUrl'] = $this->apiGatewayUrl . '/v1/salary_components';
        $data['salaryComponentId'] = $id;
        $allSessions = session()->all();
        $data['company'] = $allSessions['company_id'];
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies';

        return view('dashboard.payroll.payout.salary_component.edit', $data);
    }
}
