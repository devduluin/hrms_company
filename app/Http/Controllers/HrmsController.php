<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HrmsController extends Controller
{
    //
    public function index()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'HRMS Index';
        
        return view('dashboard.hrms.index', $data);
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

