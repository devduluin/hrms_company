<?php

namespace App\Http\Controllers\Attendance;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AttendanceActivityController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }

    public function index(Request $request)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Attendance Activity';
        $data['company_id'] = session()->get('company_id');
        $data['apiUrl'] = $this->apiGatewayUrl . '/v1/attendance/activity';

        return view('dashboard.hrms.attendance.activity.index', $data);
    }

    public function detail(Request $request)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Attendance Activity';
        $data['company_id'] = session()->get('company_id');
        $data['apiUrl'] = $this->apiGatewayUrl . '/v1/attendance/activity';

        return view('dashboard.hrms.attendance.activity.detail', $data);
    }

   

}
