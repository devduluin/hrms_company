<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function index()
    {
        return view('dashboard.emailVerification', $data);
    }
}
