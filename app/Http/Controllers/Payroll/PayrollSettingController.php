<?php

namespace App\Http\Controllers\Payroll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PayrollSettingController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }

    public function index()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = __('message.salary_payout_setting_title');
        $data['apiUrl'] = $this->apiGatewayUrl . '/v1/payroll';

        return view('dashboard.payroll.payout.payroll_setting.index', $data);
    }

    public function create(Request $request)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = __('message.payroll_setting_title');
        $allSessions = session()->all();
        $data['company'] = $allSessions['company_id'];
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies';
        $allSessions = session()->all();
        $data['apiPayrollUrl'] = $this->apiGatewayUrl . '/v1/salary_components';

        return view('dashboard.payroll.payout.payroll_setting.create', $data);
    }

    public function edit($id, Request $request)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = __('message.payroll_setting_title');
        $allSessions = session()->all();
        $data['id'] = $id;
        $data['company'] = $allSessions['company_id'];
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies';
        $allSessions = session()->all();
        $data['apiPayrollUrl'] = $this->apiGatewayUrl . '/v1/salary_components';

        return view('dashboard.payroll.payout.payroll_setting.edit', $data);
    }
}
