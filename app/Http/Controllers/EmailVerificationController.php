<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function index()
    {
        $data['title'] = "Data applicants";
        $data['page_title'] = "Data applicants";

        return view('dashboard.emailVerification', $data);
    }
}
