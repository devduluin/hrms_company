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
        $data['company'] = $allSessions['company_id'];
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies';
        $data['apiPayrollUrl'] = $this->apiGatewayUrl . '/v1/salary_structures';
        $data['apiEmployeeUrl'] = $this->apiGatewayUrl . '/v1/employees';
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/attendance/attendance/datatable";
        $allSessions = session()->all();

        return view('dashboard.payroll.payout.bulk_assignment.create', $data);
    }
}
