<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $data['title'] = "Data jobs";
        $data['page_title'] = "Data jobs";

        return view('dashboard.hrms.job.index', $data);
    }

    public function create()
    {
        $data['title'] = "Add new job";
        $data['page_title'] = "Add new job";

        return view('dashboard.hrms.job.create', $data);
    }
}
