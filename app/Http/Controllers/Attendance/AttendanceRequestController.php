<?php

namespace App\Http\Controllers\Attendance;
use App\Http\Controllers\Controller;

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
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/attendance/attendance-request";
        $data['apiUrlEmployee'] = $this->apiGatewayUrl . '/v1/employees/employee';
        $data['company'] = session()->get('company_id');
        $data['apiUrlShiftType'] = $this->apiGatewayUrl . '/v1/attendance/shift-type';
        $data['selectedEmployee'] = request()->query('employee_id');
        $data['selectedShiftType'] = request()->query('shift_assigment_id');
        $data['selectedReason'] = request()->query('reason');
      
        return view('dashboard.hrms.attendance.attendance_request.index', $data);
    }

    public function create(Request $request)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Add New Attendance Request';
        $data['company_id'] = session()->get('company_id');
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/attendance/attendance-request";
        $data['apiUrlEmployee'] = $this->apiGatewayUrl . '/v1/employees/employee';
        $data['apiUrlLeaveType'] = $this->apiGatewayUrl . "/v1/companies/leave-type/datatable";
        $data['apiUrlShiftType'] = $this->apiGatewayUrl . '/v1/attendance/shift-type';
        
        return view('dashboard.hrms.attendance.attendance_request.create', $data);
    }

    public function update(Request $request, $id)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Add New Attendance Request';
        $data['id'] = $id;
        $data['company_id'] = session()->get('company_id');
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/attendance/attendance-request";
        $data['apiUrlEmployee'] = $this->apiGatewayUrl . '/v1/employees/employee';
        $data['apiUrlLeaveType'] = $this->apiGatewayUrl . "/v1/companies/leave-type/datatable";
        $data['apiUrlShiftType'] = $this->apiGatewayUrl . '/v1/attendance/shift-type';
        
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
