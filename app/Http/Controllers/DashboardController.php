<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Welcome to Dashboard Duluin HRMS';

        return view('dashboard.index', $data);
    }
}
