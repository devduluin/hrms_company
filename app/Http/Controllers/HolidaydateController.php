<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HolidaydateController extends Controller
{
    public function index()
    {
        $data['title'] = "Data desigantion";
        $data['page_title'] = "Data desigantion";

        return view('dashboard.hrms.holidaydate.index', $data);
    }

    public function create()
    {
        $data['title'] = "Data desigantion";
        $data['page_title'] = "Data desigantion";

        return view('dashboard.hrms.holidaydate.create', $data);
    }
}
