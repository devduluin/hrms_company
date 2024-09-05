<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecruitmentController extends Controller
{
    public function index()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Data Employees';
        
        return view('dashboard.hrms.recruitment.index', $data);
    }
    
    public function create()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'New Job Applicant';
        
        return view('dashboard.hrms.recruitment.create', $data);
    }
}
