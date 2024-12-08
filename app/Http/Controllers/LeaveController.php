<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeaveController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }

    public function index(Request $request)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Leave Overview';
        $data['apiTotalLeave'] = $this->apiGatewayUrl . "/v1/attendance/leave/total-leave/by?company_id=" . $request->session()->get('company_id');

        $data['apiUrl'] = $this->apiGatewayUrl . '/v1/employees';

        return view('dashboard.hrms.leave.index', $data);
    }
   

    public function holiday()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Holiday List';
        $data['apiUrl'] = $this->apiGatewayUrl . '/v1/employees';

        return view('dashboard.hrms.leave.holiday_list.index', $data);
    }
    public function create_holiday()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Add Holiday List';
        
        return view('dashboard.hrms.leave.holiday_list.create', $data);
    }
    public function allocation()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Leave Allocation';
        $data['apiUrl'] = $this->apiGatewayUrl . '/v1/employees';

        return view('dashboard.hrms.leave.leave_allocation.index', $data);
    }
    public function create_allocation()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Add Leave Allocation';
        $data['apiUrl'] = $this->apiGatewayUrl . '/v1/employees';

        return view('dashboard.hrms.leave.leave_allocation.create', $data);
    }

    public function application()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Leave Application';
        $data['apiUrl'] = $this->apiGatewayUrl . '/v1/attendance/leave';
        $data['company_id'] = session()->get('company_id');

        $data['selectedEmployee'] = request()->query('employee_id');
        $data['selectedLeaveType'] = request()->query('leave_type_id');
        $data['apiUrlEmployee'] = $this->apiGatewayUrl . '/v1/employees/employee';
        $data['apiUrlLeaveType'] = $this->apiGatewayUrl . "/v1/attendance/leave-type/datatable";

        return view('dashboard.hrms.leave.leave_application.index', $data);
    }
    public function create_application()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Add Leave Allocation';
        $data['apiUrl'] = $this->apiGatewayUrl . '/v1/employees';

        return view('dashboard.hrms.leave.leave_application.create', $data);
    }
   
}
