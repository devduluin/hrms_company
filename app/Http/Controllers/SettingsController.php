<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Index Settings';
        
        return view('dashboard.settings.index', compact('data'));
    }

    public function elm_settings()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Company Profile';
        
        return view('dashboard.settings.elm_settings', compact('data'));
    }

    public function elm_account()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Account Settings';
        
        return view('dashboard.settings.elm_account', compact('data'));
    }

    public function elm_email_setting()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Email Settings';
        
        return view('dashboard.settings.elm_email_setting', compact('data'));
    }

    public function elm_security()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Security Settings';
        
        return view('dashboard.settings.elm_security', compact('data'));
    }

    public function elm_preferences()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Preferences Settings';
        
        return view('dashboard.settings.elm_preferences', compact('data'));
    }
    
    public function elm_notification_setting()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Notification Settings';
        
        return view('dashboard.settings.elm_notification_setting', compact('data'));
    }

    public function elm_deactivation()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Deactivation Account';
        
        return view('dashboard.settings.elm_deactivation', compact('data'));
    }
}
