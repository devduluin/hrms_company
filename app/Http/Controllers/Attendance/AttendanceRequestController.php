<?php

namespace App\Http\Controllers\Attendance;

use Illuminate\Http\Request;

class AttendanceRequestController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }

    public function index(Request $request)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Attendance Request';
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/attendance/attendance-request/datatables";
      
        return view('dashboard.hrms.attendance.attendance_request.index', $data);
    }

    public function create(Request $request)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Add New Request';
        $allSessions = session()->all();
        $data['company_id'] = $allSessions['company_id'];
        $data['apiEmployeeUrl'] = $this->apiGatewayUrl . '/v1/employees/employee/all';
        $data['apiUrlEmployee'] = $this->apiGatewayUrl . '/v1/employees/employee';
        $data['apiUrlLeaveType'] = $this->apiGatewayUrl . "/v1/companies/leave-type/datatable";
        
        $data['apiAttendance'] = $this->apiGatewayUrl . '/v1/attendance/attendance/operator/store';
        return view('dashboard.hrms.attendance.attendance_request.create', $data);
    }

    public function detail($id)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Attendance Request';
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/attendance/attendance/".$id;
        return view('dashboard.hrms.attendance.detail', $data);
    }

    
}
