<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $data['title'] = "Attendance";
        $data['page_title'] = "Attendance List";

        return view('dashboard.hrms.attendance.index', $data);
    }
}
