<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }

    public function index(Request $request)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Attendance Overview';
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/attendance/attendance/total-attendance/" . $request->session()->get('company_id')[0];
        $data['url_count_employee'] = $this->apiGatewayUrl . "/v1/employees/employee/employees_summary/" . $request->session()->get('company_id')[0];
        return view('dashboard.hrms.attendance.index', $data);
    }

    public function summary(Request $request)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Attendance Summary';
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/attendance/attendance/datatable";
        return view('dashboard.hrms.attendance.summary', $data);
    }
    public function detail($id)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Attendance Overview';
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/attendance/attendance/".$id;
        return view('dashboard.hrms.attendance.detail', $data);
    }

    public function shift()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'New Shift Assignment';
        // $data['apiUrl'] = $this->apiGatewayUrl . "/v1/attendance/attendance/total-attendance/" . $request->session()->get('company_id')[0];

        return view('dashboard.hrms.attendance.shift_assignment', $data);
    }
    public function shift_list()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Shift List';

        return view('dashboard.hrms.attendance.shift_list', $data);
    }
    public function report()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Attendance Report';
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/attendance/attendance/datatable";


        return view('dashboard.hrms.attendance.report', $data);
    }
}
