<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GraphController extends Controller
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
        $data['apiTotalAttendance'] = $this->apiGatewayUrl . "/v1/attendance/attendance/total-attendance/by?company_id=" . $request->session()->get('company_id');
        $data['apiChartAttendance'] = $this->apiGatewayUrl . "/v1/attendance/attendance/report/chart?company_id=" . $request->session()->get('company_id');
        $data['apiGenderChartUrl'] = $this->apiGatewayUrl . '/v1/employees/employee/report/gender-chart?company_id='. $request->session()->get('company_id');
        $data['apiDepartmentChartrUrl'] = $this->apiGatewayUrl . '/v1/employees/employee/report/department-chart?company_id='. $request->session()->get('company_id');
        $data['apiClaimAmountUrl'] = $this->apiGatewayUrl . '/v1/payroll/expense_claim/report/chart?company_id='. $request->session()->get('company_id');
        $data['url_count_employee'] = $this->apiGatewayUrl . "/v1/employees/employee/employees_summary/" . $request->session()->get('company_id');
        
        return view('dashboard.hrms.graph.index', $data);
    }

}
