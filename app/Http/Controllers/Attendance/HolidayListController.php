<?php

namespace App\Http\Controllers\Attendance;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HolidayListController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }

    public function index(Request $request)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Holiday List';
        $data['company_id'] = session()->get('company_id');
        $data['apiUrl'] = $this->apiGatewayUrl . '/v1/attendance/holiday-list';

        return view('dashboard.hrms.attendance.holiday_list.index', $data);
    }

    public function create(Request $request)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Add New Holiday List';
        $data['company_id'] = session()->get('company_id');
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/attendance/holiday-list";
        
        return view('dashboard.hrms.attendance.holiday_list.create', $data);
    }

    public function update(Request $request, $id)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Update Holiday List';
        $data['id'] = $id;
        $data['company_id'] = session()->get('company_id');
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/attendance/holiday-list";
        
        return view('dashboard.hrms.attendance.holiday_list.create', $data);
    }

    public function detail(Request $request)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Detail Holiday List';
        $data['company_id'] = session()->get('company_id');
        $data['apiUrl'] = $this->apiGatewayUrl . '/v1/attendance/holiday-list';

        return view('dashboard.hrms.attendance.holiday_list.detail', $data);
    }

   

}
