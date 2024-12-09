<?php

namespace App\Http\Controllers\Claim;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }
    
    public function index(Request $request)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Claim Dashbaord';
        $data['apiTotalAttendance'] = $this->apiGatewayUrl . "/v1/attendance/attendance/total-attendance/by?company_id=" . $request->session()->get('company_id');
        $data['url_count_employee'] = $this->apiGatewayUrl . "/v1/employees/employee/employees_summary/" . $request->session()->get('company_id');
        $data['apiChartAttendance'] = $this->apiGatewayUrl . "/v1/attendance/attendance/report/chart?company_id=" . $request->session()->get('company_id');

        return view('dashboard.hrms.claim.index', $data);
    }

    public function summary()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Expense Claim Summary';
        
        return view('dashboard.hrms.claim.summary', $data);
    }

    public function travel_request()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'New Travel Request';
        
        return view('dashboard.hrms.claim.travel_request', $data);
    }
}
