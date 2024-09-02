<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        $data['title'] = "Data branch";
        $data['page_title'] = "Data branch";

        return view('dashboard.hrms.branch.index', $data);
    }

    public function create()
    {
        $data['title'] = "Add new branch";
        $data['page_title'] = "Add new branch";

        return view('dashboard.hrms.branch.create', $data);
    }
}
