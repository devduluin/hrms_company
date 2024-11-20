<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BulkAssignmentController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }

    public function create()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Salary Structure Assignment';
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
        $data['apiSalaryStructureAssignment'] = $this->apiGatewayUrl . '/v1/salary_structure_assignments/salary_structure_assignment/bulk';

        return view('dashboard.payroll.payout.structure_assignment.bulk', $data);
    }
}
