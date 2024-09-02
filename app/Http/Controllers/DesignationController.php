<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function index()
    {
        $data['title'] = "Data desigantion";
        $data['page_title'] = "Data desigantion";

        return view('dashboard.hrms.designation.index', $data);
    }

    public function create()
    {
        $data['title'] = "Add new designation";
        $data['page_title'] = "Add new designation";

        return view('dashboard.hrms.designation.create', $data);
    }
}
