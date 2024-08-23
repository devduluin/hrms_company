<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShiftTypeController extends Controller
{
    public function index()
    {
        $data['title'] = "Data shift type";
        $data['page_title'] = "Data shift type";

        return view('dashboard.hrms.shifttype.index', $data);
    }
}
