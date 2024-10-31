<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }

    public function index()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Index Settings';
        $data['apiUrl'] = $this->apiGatewayUrl;
        $data['apiUrlCompany'] = $this->apiGatewayUrl.'/v1/companies/company/'.session()->get('company_id');

        return view('dashboard.settings.index', $data);
    }

    public function setup_account(Request $request)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Company Information';
        $data['apiUrl'] = $this->apiGatewayUrl.'/users/register/step_company';
        $data['token']  =   $request->session()->get('app_token');
        $data['user']   = $request->user;
         
        return view('dashboard.setup_account', $data);
    }

    public function elm_settings()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Company Profile';
        

        return view('dashboard.settings.elm_settings', $data);
    }

    public function elm_account()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Account Settings';
        $data['apiUrlUser'] = $this->apiGatewayUrl.'/users/user';

        return view('dashboard.settings.elm_account', $data);
    }

    public function elm_email_setting()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Email Settings';

        return view('dashboard.settings.elm_email_setting', $data);
    }

    public function elm_security()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Security Settings';

        return view('dashboard.settings.elm_security', $data);
    }

    public function elm_preferences()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Preferences Settings';
        $data['company'] = session()->get('company_id');
        $data['companyUrl'] = $this->apiGatewayUrl . '/v1/companies/company';

        return view('dashboard.settings.elm_preferences', $data);
    }

    public function elm_notification_setting()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Notification Settings';

        return view('dashboard.settings.elm_notification_setting', $data);
    }

    public function elm_deactivation()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Deactivation Account';

        return view('dashboard.settings.elm_deactivation', $data);
    }
}
