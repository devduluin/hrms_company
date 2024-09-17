<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Attendance Overview';

        return view('dashboard.hrms.attendance.index', $data);
    }

    public function summary()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Attendance Overview';

        return view('dashboard.hrms.attendance.summary', $data);
    }

    public function shift()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'New Shift Assignment';

        return view('dashboard.hrms.attendance.shift_assignment', $data);
    }
    public function shift_list()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Shift List';

        return view('dashboard.hrms.attendance.shift_list', $data);
    }
}
