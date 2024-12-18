<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function index(Request $request, $page = null)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Masuk Akun Hris';

        $host = $request->getHost();
        if($host == 'launch.hrms.duluin.com'){
            //dd($host);
            return view('auth.index_lunch', compact('data'));
        }else{
            return view('auth.index', compact('data'));
        }
        
    }
	
	public function unactivated()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Aktivasi Akun Hris';
        
        return view('auth.index', compact('data'));
    }

    public function elm_signin()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Masuk Akun Hris';

        return view('auth.elm_signin', compact('data'));
    }

    public function elm_signup()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Signup User';

        return view('auth.elm_signup', compact('data'));
    }

    public function elm_activate_account()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Signup Account';
        
        return view('auth.elm_activate_account', compact('data'));
    }

    public function elm_forgot_password()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Lupa Password';

        return view('auth.elm_forgot_password', compact('data'));
    }

}
