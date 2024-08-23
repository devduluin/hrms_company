<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    public function index()
    {
        $data['title'] = "Data leave types";
        $data['page_title'] = "Data leave types";

        return view('dashboard.hrms.leavetype.index', $data);
    }
}
