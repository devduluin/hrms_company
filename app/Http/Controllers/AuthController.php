<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function index($page = null)
    {
        $data['page_title']   = 'Masuk Akun Hris';
        
        return view('auth.index', compact('data'));
    }
	
	public function unactivated()
    {
        $data['page_title']   = 'Aktivasi Akun Hris';
        
        return view('auth.index', compact('data'));
    }

    public function elm_signin()
    {
        $data['page_title']   = 'Masuk Akun Hris';

        return view('auth.elm_signin', compact('data'));
    }

    public function elm_signup()
    {
        $data['page_title']   = 'Pendaftaran Daftar Akun';

        return view('auth.elm_signup', compact('data'));
    }

    public function elm_forgot_password()
    {
        $data['page_title']   = 'Lupa Password';

        return view('auth.elm_forgot_password', compact('data'));
    }



    public function signin_process(Request $request)
    {
        $data['page_title']   = 'Reset Password';
        //dd($request);

        return redirect()->route('settings');
    }

    public function password_recovery($token)
    {
        $data['page_title']   = 'Reset Password';
        $data['token']   = $token;

        return view('auth.password_recovery', compact('data'));
    }

    public function signup_success(Request $request)
    {
        $data['page_title']   = 'Pedaftaran Akun Berhasil';
        $data['email']   = $request->email;

        return view('auth.signup_success', compact('data'));
    }

    public function verify_email(Request $request)
    {

        $data['page_title']   = 'Verifikasi Akun Anda';


        return view('auth.verify_email', compact('data'));
    }

}
