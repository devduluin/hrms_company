<?php

namespace App\Http\Controllers\Leave;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LeaveApplicantController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }

    public function index()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Leave Application';
        $data['apiUrl'] = $this->apiGatewayUrl . '/v1/attendance/leave';
        $data['company_id'] = session()->get('company_id');

        $data['apiUrlEmployee'] = $this->apiGatewayUrl . '/v1/employees/employee';
        $data['apiUrlLeaveType'] = $this->apiGatewayUrl . "/v1/attendance/leave-type/datatable";

        return view('dashboard.hrms.leave.leave_application.index', $data);
    }
   
    public function create()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Add Leave Application';
        $data['company_id'] = session()->get('company_id');
        $data['apiUrl'] = $this->apiGatewayUrl . '/v1/attendance/leave';
         
        $data['apiUrlEmployee'] = $this->apiGatewayUrl . '/v1/employees/employee';
        $data['apiUrlLeaveType'] = $this->apiGatewayUrl . "/v1/attendance/leave-type/datatable";
        
        return view('dashboard.hrms.leave.leave_application.create', $data);
    }

    public function update($id)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Update Leave Application';
        $data['id'] = $id;
        $data['company_id'] = session()->get('company_id');
        $data['apiUrl'] = $this->apiGatewayUrl . '/v1/attendance/leave';
        $data['apiUrlLeaveType'] = $this->apiGatewayUrl . '/v1/attendance/leave-type/datatable';
        $data['apiUrlEmployee'] = $this->apiGatewayUrl . "/v1/employees/employee";
        
        return view('dashboard.hrms.leave.leave_application.create', $data);
    }

    public function detail($id)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Detail Leave Application';
        $data['apiUrl'] = $this->apiGatewayUrl . '/v1/attendance/leave/'. $id;
        $data['apiUrlApproval'] = $this->apiGatewayUrl . "/v1/attendance/leave/approve/".$id;
        return view('dashboard.hrms.leave.leave_application.detail', $data);
    }
   
   
}
