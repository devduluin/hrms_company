<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClaimController extends Controller
{
    public function index()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Claim Dashbaord';
        
        return view('dashboard.hrms.claim.index', compact('data'));
    }

    public function summary()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Expense Claim Summary';
        
        return view('dashboard.hrms.claim.summary', compact('data'));
    }

    public function travel_request()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'New Travel Request';
        
        return view('dashboard.hrms.claim.travel_request', compact('data'));
    }
}
