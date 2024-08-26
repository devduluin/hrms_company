<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class EmployeesController extends Controller
{

    public function index()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Data Overview';
        $data['apiUrl'] = config('apiendpoints.employees');

        return view('dashboard.hrms.employees.index', $data);
    }

    public function list()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Data Employees';
        $data['apiUrl'] = config('apiendpoints.employees');

        return view('dashboard.hrms.employees.list', $data);
    }

    public function create()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'New Employees';
        $allSessions = session()->all();
        $data['company'] = $allSessions['company_id'][0];
        $data['apiCompanyUrl'] = config('apiendpoints.companies');
        $data['apiEmployeeUrl'] = config('apiendpoints.employees');

        return view('dashboard.hrms.employees.create', $data);
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
