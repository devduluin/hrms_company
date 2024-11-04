<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShfitAssigmentController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }

    public function index(Request $request) 
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'New Shift Assignment';
        $data['apiShiftAssignmentDataTable'] = $this->apiGatewayUrl . "/v1/attendance/shift-assignment/datatable";
        $data['apiUpdateBulkShift'] =  $this->apiGatewayUrl . "/v1/attendance/shift-assignment/bulkupdate";
        return view('dashboard.hrms.attendance.shiftassigment.index', $data);
    }

    public function create(Request $request)
    {
        $data['title'] = 'Duluin HRMS' ;
        $data['page_title'] = "Add New Shift Assignment";
        $data['apiAddShiftAssignment'] = $this->apiGatewayUrl . "/v1/employees/employee/datatables";
        $data['apiShiftAssignmentPost'] = $this->apiGatewayUrl . "/v1/attendance/shift-assignment";
        $data['apiGetShiftType'] = $this->apiGatewayUrl . "/v1/attendance/shift-assignment";
        $data['companyId'] = $request->session()->get('company_id');
        return view('dashboard.hrms.attendance.shiftassigment.create', $data);
    }
}
