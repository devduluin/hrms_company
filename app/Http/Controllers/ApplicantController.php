<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function index()
    {
        $data['title'] = "Data applicants";
        $data['page_title'] = "Data applicants";

        return view('dashboard.hrms.applicants.index', $data);
    }
}
