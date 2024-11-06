<?php

namespace App\Http\Controllers\Claim;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    public function index()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Claim Dashbaord';
        
        return view('dashboard.hrms.claim.index', $data);
    }

    public function summary()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Expense Claim Summary';
        
        return view('dashboard.hrms.claim.summary', $data);
    }

    public function travel_request()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'New Travel Request';
        
        return view('dashboard.hrms.claim.travel_request', $data);
    }
}
