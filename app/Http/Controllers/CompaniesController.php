<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function index()
    {
        
    }

    public function list()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Data Companies';
        
        return view('dashboard.hrms.companies.list', compact('data'));
    }

    public function create()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'New Companies';
        
        return view('dashboard.hrms.companies.create', compact('data'));
    }
    
}
