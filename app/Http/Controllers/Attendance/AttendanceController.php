<?php

namespace App\Http\Controllers\Attendance;
use App\Http\Controllers\Controller;

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
        $data['apiTotalAttendance'] = $this->apiGatewayUrl . "/v1/attendance/attendance/total-attendance/by?company_id=" . $request->session()->get('company_id');
        $data['apiChartAttendance'] = $this->apiGatewayUrl . "/v1/attendance/attendance/report/chart?company_id=" . $request->session()->get('company_id');
        $data['url_count_employee'] = $this->apiGatewayUrl . "/v1/employees/employee/employees_summary/" . $request->session()->get('company_id');
        return view('dashboard.hrms.attendance.index', $data);
    }

    public function create(Request $request)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Add New Attendance';
        
        $data['company_id'] = session()->get('company_id');
        $data['apiUrl'] = $this->apiGatewayUrl . '/v1/attendance/attendance';
        $data['apiUrlEmployee'] = $this->apiGatewayUrl . '/v1/employees/employee';
        $data['apiUrlLeaveType'] = $this->apiGatewayUrl . "/v1/companies/leave-type/datatable";
        $data['apiUrlShiftEmployee'] = $this->apiGatewayUrl . "/v1/attendance/shift-assignment/employee_id";
        
        $data['apiAttendance'] = $this->apiGatewayUrl . '/v1/attendance/attendance/operator/store';
        return view('dashboard.hrms.attendance.create', $data);
    }

    public function update(Request $request, $id)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Add New Attendance';
        
        $data['id'] = $id;
        $data['company_id'] = session()->get('company_id');
        $data['apiUrl'] = $this->apiGatewayUrl . '/v1/attendance/attendance';
        $data['apiEmployeeUrl'] = $this->apiGatewayUrl . '/v1/employees/employee/all';
        $data['apiUrlEmployee'] = $this->apiGatewayUrl . '/v1/employees/employee';
        $data['apiUrlLeaveType'] = $this->apiGatewayUrl . "/v1/companies/leave-type/datatable";
        $data['apiUrlShiftEmployee'] = $this->apiGatewayUrl . "/v1/attendance/shift-assignment/employee_id";
        
        $data['apiAttendance'] = $this->apiGatewayUrl . '/v1/attendance/attendance/operator/store';
        return view('dashboard.hrms.attendance.create', $data);
    }

    public function attendance(Request $request)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Attendance';
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/attendance/attendance";
        return view('dashboard.hrms.attendance.attendance', $data);
    }

    public function detail($id)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Attendance Overview';
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/attendance/attendance/".$id;
        $data['apiUrlShiftEmployee'] = $this->apiGatewayUrl . "/v1/attendance/shift-assignment/employee_id";
        return view('dashboard.hrms.attendance.detail', $data);
    }

    public function shift(Request $request)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'New Shift Assignment';
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/shift-assignment/shift-assignment";
        return view('dashboard.hrms.attendance.shift_assignment', $data);
    }

    public function shift_list(Request $request)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Shift List';
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/shift-request/shift-request/datatable";
        return view('dashboard.hrms.attendance.shift_list', $data);
    }

    public function new_assignment()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'New Shift Assignment';

        return view('dashboard.hrms.attendance.new_assignment', $data);
    }

    public function shift_type()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Shift Type List';
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/attendance/attendance/datatable";
        return view('dashboard.hrms.attendance.shift_type', $data);
    }

    public function new_shift_type()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'New Shift Type';
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/attendance/attendance/datatable";


        return view('dashboard.hrms.attendance.new_shift_type', $data);
    }

    public function report()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Attendance Report';
        $data['apiReportAttendance'] = $this->apiGatewayUrl . "/v1/attendance/attendance/report/by";
        return view('dashboard.hrms.attendance.report', $data);
    }

    public function summary()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Attendance Summary';
        $data['company'] = session()->get('company_id');
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/attendance/attendance/report/summary";
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies';
        return view('dashboard.hrms.attendance.summary', $data);
    }

    public function print()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Attendance Report';
        $data['apiReportAttendance'] = $this->apiGatewayUrl . "/v1/attendance/attendance/report/by";
        return view('dashboard.hrms.attendance.print', $data);
    }
}
