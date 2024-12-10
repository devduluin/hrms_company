<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HrmsController extends Controller
{
    //
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }

    public function index(Request $request)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'HRMS Index';
        $data['apiChartAttendance'] = $this->apiGatewayUrl . "/v1/attendance/attendance/report/chart?company_id=" . $request->session()->get('company_id');
        
        return view('dashboard.hrms.index', $data);
    }

    public function setup_initialize(Request $request)
    {
        $data['title']   = 'Initialize HRMS';
        $data['page_title']   = 'Initialize Dashboard';
        $data['apiUrl'] = $this->apiGatewayUrl.'/users/step_initialize';
        $data['token']  =   $request->session()->get('app_token');
        $data['user']   = $request->user;
        
        return view('dashboard.hrms.setup_initialize', $data);
    }

    public function elm_hrms()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'HRMS Dashboard';
        
        return view('dashboard.hrms.elm_hrms', $data);
    }

    public function elm_overview()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Data Employees';
        
        return view('dashboard.hrms.elm_dashboard', $data);
    }

    public function elm_applicant()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'New Job Applicant';
        
        return view('dashboard.hrms.elm_applicant', $data);
    }

    public function elm_employee_overview()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'New Employee';
        
        return view('dashboard.hrms.elm_employee_overview', $data);
    }

    public function elm_employee_profile()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'New Employee';
        
        return view('dashboard.hrms.elm_employee_profile', $data);
    }

    public function elm_employee_details()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'New Employee';
        
        return view('dashboard.hrms.elm_employee_details', $data);
    }

    public function elm_employee_contact()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'New Employee';
        
        return view('dashboard.hrms.elm_employee_contact', $data);
    }
}

