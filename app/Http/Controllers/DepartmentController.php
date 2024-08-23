<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $data['title'] = "Data department";
        $data['page_title'] = "Data department";

        return view('dashboard.hrms.department.index', $data);
    }

    public function create()
    {
        $data['title'] = "Add new department";
        $data['page_title'] = "Add new department";

        return view('dashboard.hrms.department.create', $data);
    }
    
}
