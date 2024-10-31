<?php

namespace App\Http\Controllers\Payroll;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PayrollPeriodeController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }

    public function index(Request $request)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Payroll Period';
        $allSessions = session()->all();
        $data['company'] = $allSessions['company_id'];
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies';
        $data['apiUrl'] = $this->apiGatewayUrl . '/v1/payroll_periodes';

        return view('dashboard.payroll.payout.payroll_periode.index', $data);
    }

    public function create(Request $request)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Payroll Period';
        $allSessions = session()->all();
        $data['company'] = $allSessions['company_id'];
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies';
        $data['apiUrl'] = $this->apiGatewayUrl . '/v1/payroll_periodes';

        return view('dashboard.payroll.payout.payroll_periode.create', $data);
    }

    public function edit($id, Request $request)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Payroll Period';
        $allSessions = session()->all();
        $data['company'] = $allSessions['company_id'];
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies';
        $data['apiUrl'] = $this->apiGatewayUrl . '/v1/payroll_periodes';
        $data['id'] = $id;

        return view('dashboard.payroll.payout.payroll_periode.edit', $data);
    }
}
