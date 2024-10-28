<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;


class PayoutController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }
    public function index()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Salary Payout Overview';

        return view('dashboard.payroll.payout.index', $data);
    }

    public function salary_slip()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Create Salary Slip';
        $allSessions = session()->all();
        $data['company'] = $allSessions['company_id'][0];
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies';
        $data['apiEmployeeUrl'] = $this->apiGatewayUrl . '/v1/employees';
        $data['apiGateway'] = $this->apiGatewayUrl . '/users';
        $data['apiPayrollUrl'] = $this->apiGatewayUrl . '/v1/salary_structures';
        $data['apiAttendanceUrl'] = $this->apiGatewayUrl . '/v1/attendance';

        return view('dashboard.payroll.payout.salary_slip', $data);
    }

    // public function settings()
    // {
    //     $data['title']   = 'Duluin HRMS';
    //     $data['page_title']   = __('message.payroll_setting_title');
    //     $allSessions = session()->all();
    //     $data['company'] = $allSessions['company_id'][0];
    //     $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies';
    //     $allSessions = session()->all();

    //     return view('dashboard.payroll.payout.settings', $data);
    // }

    public function income_tax()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'New Income Tax Slab';
        $allSessions = session()->all();

        return view('dashboard.payroll.payout.income_tax', $data);
    }

    public function benefit_claim()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'New Employee Benefit Claim';
        $allSessions = session()->all();

        return view('dashboard.payroll.payout.benefit_claim', $data);
    }
    public function tax_slab_list()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Income Tax Slab List';
        $allSessions = session()->all();

        return view('dashboard.payroll.payout.tax_slab_list', $data);
    }
    public function benefit_list()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Employee Benefit Claim List';
        $allSessions = session()->all();

        return view('dashboard.payroll.payout.benefit_list', $data);
    }
    public function payroll_period()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Payroll Period';
        $allSessions = session()->all();

        return view('dashboard.payroll.payout.payroll_period', $data);
    }

    public function salary_component_list(Request $request)
    {
        $data['title']  = 'Duluin HRMS';
        $data['page_title'] = 'Salary Components';
        $data['apiPayrollUrl'] = $this->apiGatewayUrl . '/v1/salary_components';
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies';

        return view('dashboard.payroll.payout.salary_component.list', $data);
    }

    public function create_component()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Create Salary Component';
        $data['apiPayrollUrl'] = $this->apiGatewayUrl . '/v1/salary_components';
        $allSessions = session()->all();
        $data['company'] = $allSessions['company_id'][0];
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies';

        return view('dashboard.payroll.payout.salary_component.create', $data);
    }
    public function salary_structure()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Create Salary Structure';
        $allSessions = session()->all();
        $data['company'] = $allSessions['company_id'][0];
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies';
        $allSessions = session()->all();

        return view('dashboard.payroll.payout.salary_structure.list', $data);
    }

    public function edit_component($id, Request $request)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Create Salary Component';
        $data['apiPayrollUrl'] = $this->apiGatewayUrl . '/v1/salary_components';
        $data['salaryComponentId'] = $id;
        $allSessions = session()->all();
        $data['company'] = $allSessions['company_id'][0];
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies';

        return view('dashboard.payroll.payout.salary_component.edit', $data);
    }
}
