<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    
    public function index()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Data Overview';
        
        return view('dashboard.hrms.employees.index', compact('data'));
    }

    public function list()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Data Employees';
        
        return view('dashboard.hrms.employees.list', compact('data'));
    }

    public function create()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'New Employees';
        
        return view('dashboard.hrms.employees.create', compact('data'));
    }
    
    public function elm_employee_overview()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'New Employee';
        
        return view('dashboard.hrms.elm_employee_overview', compact('data'));
    }

    public function elm_employee_profile()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'New Employee';
        
        return view('dashboard.hrms.elm_employee_profile', compact('data'));
    }

    public function elm_employee_details()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'New Employee';
        
        return view('dashboard.hrms.elm_employee_details', compact('data'));
    }

    public function elm_employee_contact()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'New Employee';
        
        return view('dashboard.hrms.elm_employee_contact', compact('data'));
    }
}
