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
        $data['selectedEmployee'] = request()->query('employee_id');

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

    public function bulk_create()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Payroll Entry';
        $allSessions = session()->all();
        $data['company_id'] = $allSessions['company_id'];
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies/company/datatables';
        $data['apiPayrollUrl'] = $this->apiGatewayUrl . '/v1/salary_structures';
        // $data['apiEmployeeUrl'] = $this->apiGatewayUrl . '/v1/employees';
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/attendance/attendance/datatable";
        $allSessions = session()->all();
        $data['salaryStructureUrl'] = $this->apiGatewayUrl . "/v1/salary_structures/salary_structure/datatables";
        $data['apiDepartmentUrl'] = $this->apiGatewayUrl . "/v1/companies/department/datatables";
        $data['apiUrlEmployee'] = $this->apiGatewayUrl . "/v1/employees/employee";
        $data['apiDesignationUrl'] = $this->apiGatewayUrl . '/v1/companies/designation/datatables';
        $data['apiPayslip'] = $this->apiGatewayUrl . '/v1/payslip/payroll_entry/bulk';
        $data['company'] = $allSessions['company_id'];

        return view('dashboard.payroll.payout.bulk_payroll_entry.create', $data);
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
