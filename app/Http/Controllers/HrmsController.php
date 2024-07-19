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
        
        return view('dashboard.hrms.index', compact('data'));
    }

    public function elm_hrms()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'HRMS Dashboard';
        
        return view('dashboard.hrms.elm_hrms', compact('data'));
    }

    public function elm_employees()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Data Employees';
        
        return view('dashboard.hrms.elm_employees', compact('data'));
    }
}
