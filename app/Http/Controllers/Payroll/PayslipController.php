<?php

namespace App\Http\Controllers\Payroll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PayslipController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }

    public function index()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Salary Slip';
        $allSessions = session()->all();
        $data['company'] = $allSessions['company_id'];
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies';
        $data['apiEmployeeUrl'] = $this->apiGatewayUrl . '/v1/employees';
        $data['apiUrlEmployee'] = $this->apiGatewayUrl . '/v1/employees/employee';
        $data['apiGateway'] = $this->apiGatewayUrl . '/users';
        $data['apiUrl'] = $this->apiGatewayUrl . '/v1/payslip';
        $data['apiAttendanceUrl'] = $this->apiGatewayUrl . '/v1/attendance';
        $data['company_id'] = $allSessions['company_id'];
        $data['apiPayrollUrl'] = $this->apiGatewayUrl . '/v1/payslip/payroll_entry';

        return view('dashboard.payroll.payout.payslip.index', $data);
    }

    public function create()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Create Salary Slip';
        $allSessions = session()->all();
        $data['company'] = $allSessions['company_id'];
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies';
        $data['apiEmployeeUrl'] = $this->apiGatewayUrl . '/v1/employees';
        $data['apiGateway'] = $this->apiGatewayUrl . '/users';
        $data['apiUrl'] = $this->apiGatewayUrl . '/v1/payslip';
        $data['apiPayrollUrl'] = $this->apiGatewayUrl . '/v1/payroll';
        $data['apiAttendanceUrl'] = $this->apiGatewayUrl . '/v1/attendance';

        return view('dashboard.payroll.payout.payslip.create', $data);
    }

    public function show($id)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Detail Salary Slip';
        $allSessions = session()->all();
        $data['company'] = $allSessions['company_id'];
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies';
        $data['apiEmployeeUrl'] = $this->apiGatewayUrl . '/v1/employees';
        $data['apiGateway'] = $this->apiGatewayUrl . '/users';
        $data['apiUrl'] = $this->apiGatewayUrl . '/v1/payslip';
        $data['apiAttendanceUrl'] = $this->apiGatewayUrl . '/v1/attendance';

        return view('dashboard.payroll.payout.payslip.detail', $data);
    }

    public function edit($id, Request $request)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Edit Salary Slip';
        $allSessions = session()->all();
        $data['company'] = $allSessions['company_id'];
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies';
        $data['apiEmployeeUrl'] = $this->apiGatewayUrl . '/v1/employees';
        $data['apiGateway'] = $this->apiGatewayUrl . '/users';
        $data['apiUrl'] = $this->apiGatewayUrl . '/v1/payslip';
        $data['apiAttendanceUrl'] = $this->apiGatewayUrl . '/v1/attendance';
        $data['id'] = $id;

        return view('dashboard.payroll.payout.payslip.edit', $data);
    }
}
