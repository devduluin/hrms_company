<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShiftRequestController extends Controller
{
    public function index()
    {
        $data['title'] = "Data shift request";
        $data['page_title'] = "Data shift request";

        return view('dashboard.hrms.shiftrequest.index', $data);
    }
}
