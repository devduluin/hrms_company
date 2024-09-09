<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class EmployeesController extends Controller
{

    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }

    public function index()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Data Overview';
        $data['apiUrl'] = $this->apiGatewayUrl . '/v1/employees';

        return view('dashboard.hrms.employees.index', $data);
    }

    public function list()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Data Employees';
        $data['apiUrl'] = $this->apiGatewayUrl . '/v1/employees';

        return view('dashboard.hrms.employees.list', $data);
    }

    public function create()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'New Employees';
        $allSessions = session()->all();
        $data['company'] = $allSessions['company_id'][0];
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies';
        $data['apiEmployeeUrl'] = $this->apiGatewayUrl . '/v1/employees';
        // $data['apiEmployeeUrl'] = 'http://apidev.duluin.com/api/v1';
        $data['apiGateway'] = $this->apiGatewayUrl . '/users';

        return view('dashboard.hrms.employees.create', $data);
    }

    public function edit(Request $request, $id)
    {
        $data['title'] = 'Duluin HRMS';
        $data['page_title'] = 'Edit Employee';
        $allSessions = session()->all();
        $data['company'] = $allSessions['company_id'][0];
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies';
        $data['apiEmployeeUrl'] = $this->apiGatewayUrl . '/v1/employees';
        // $data['apiEmployeeUrl'] = 'http://apidev.duluin.com/api/v1';
        $data['apiGateway'] = $this->apiGatewayUrl . '/users';
        $data['employee_id'] = $id;

        return view('dashboard.hrms.employees.edit', $data);
    }

    public function elm_employee_overview()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'New Employee';

        return view('dashboard.hrms.elm_employee_overview', $data);
    }

    public function elm_employee_profile()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'New Employee';

        return view('dashboard.hrms.elm_employee_profile', $data);
    }

    public function elm_employee_details()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'New Employee';

        return view('dashboard.hrms.elm_employee_details', $data);
    }

    public function elm_employee_contact()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'New Employee';

        return view('dashboard.hrms.elm_employee_contact', $data);
    }
}
