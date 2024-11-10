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
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/attendance/shift-assignment/datatable";
        $data['apiUpdateBulkShift'] =  $this->apiGatewayUrl . "/v1/attendance/shift-assignment/bulkupdate";
        return view('dashboard.hrms.attendance.shiftassigment.index', $data);
    }

    public function create(Request $request)
    {
        $data['title'] = 'Duluin HRMS' ;
        $data['page_title'] = "Add New Shift Assignment";
        $data['company_id'] = session()->get('company_id');
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/attendance/shift-assignment";
        $data['apiUrlEmployee'] = $this->apiGatewayUrl . '/v1/employees/employee';
        $data['apiUrlShiftType'] = $this->apiGatewayUrl . '/v1/companies/shift-type';
        $data['apiShiftAssignment'] = $this->apiGatewayUrl . '/v1/attendance/shift-assignment';
        return view('dashboard.hrms.attendance.shiftassigment.create', $data);
    }

    public function update(Request $request, $id)
    {
        $data['title'] = 'Duluin HRMS' ;
        $data['page_title'] = "Update Shift Assignment";
        $data['id'] = $id;
        $data['company_id'] = session()->get('company_id');
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/attendance/shift-assignment";
        $data['apiUrlEmployee'] = $this->apiGatewayUrl . '/v1/employees/employee';
        $data['apiUrlShiftType'] = $this->apiGatewayUrl . '/v1/companies/shift-type';
        $data['apiShiftAssignment'] = $this->apiGatewayUrl . '/v1/attendance/shift-assignment';
        return view('dashboard.hrms.attendance.shiftassigment.create', $data);
    }

    public function create_bulk(Request $request)
    {
        $data['title'] = 'Duluin HRMS' ;
        $data['page_title'] = "Add Bulk Shift Assignment";
        $data['company_id'] = session()->get('company_id');
        $data['apiUrlEmployee'] = $this->apiGatewayUrl . '/v1/employees/employee';
        $data['apiUrlShiftType'] = $this->apiGatewayUrl . '/v1/companies/shift-type';
        $data['apiShiftAssignment'] = $this->apiGatewayUrl . '/v1/attendance/shift-assignment';
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies/company/datatables';
        $data['apiDepartmentUrl'] = $this->apiGatewayUrl . "/v1/companies/department/datatables";
        $data['apiDesignationUrl'] = $this->apiGatewayUrl .'/v1/companies/designation/datatables';

        return view('dashboard.hrms.attendance.shiftassigment.create_bulk', $data);
    }
}
