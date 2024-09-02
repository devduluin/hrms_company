<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index()
    {
        $data['title']   = 'Data Currency';
        $data['page_title']   = 'Data Currency';
        
        return view('dashboard.hrms.currency.index', $data);
    }

    public function create()
    {
        $data['title']   = 'Add new currency';
        $data['page_title']   = 'Add new Currency';
        
        return view('dashboard.hrms.currency.create', $data);
    }
}
