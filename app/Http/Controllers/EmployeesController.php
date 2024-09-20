<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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
        $data['apiPayrollUrl'] = $this->apiGatewayUrl . '/v1/payrolls';
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
        $data['apiPayrollUrl'] = $this->apiGatewayUrl . '/v1/payrolls';
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

    public function upload(Request $request)
    {
        // Validate the file input
        // $request->validate([
        //     'file' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        // ]);

        // Store the file in MinIO
        $fileName = 'employees/text3.txt';
        $filePath = Storage::disk('minio')->put($fileName, 'test lagi');
        // $path = Storage::disk('minio')->putFileAs('employees', 'testeuy.txt');
        $fileUrl = 'https://apis3.hrms.duluin.com/hrms/' . $fileName;
        echo $fileUrl;
    }
}
