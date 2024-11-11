<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShiftTypeController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }

    public function index()
    {
        $data['title'] = "Data Shift Type";
        $data['page_title'] = "Data Shift Type";
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/attendance/shift-type";
        return view('dashboard.hrms.shifttype.index', $data);
    }

    public function create(Request $request)
    {
        $data['title'] = "Add Shift Type";
        $data['page_title'] = "Add Shift Type";
        $allSessions = session()->all();
        $data['company'] = $allSessions['company_id'];
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/attendance/shift-type";
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies/company/datatables';
        return view('dashboard.hrms.shifttype.create', $data);

    }

    public function update($id)
    {
        $data['title'] = "Add Shift Type";
        $data['page_title'] = "Add Shift Type";
        $allSessions = session()->all();
        $data['id'] = $id;
        $data['company'] = $allSessions['company_id'];
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/attendance/shift-type";
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies/company/datatables';
        return view('dashboard.hrms.shifttype.create', $data);

    }
}
