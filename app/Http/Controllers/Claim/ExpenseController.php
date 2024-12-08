<?php

namespace App\Http\Controllers\Claim;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }
    public function index()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Employee Expense';
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/payroll/expense_claim";
        $data['apiUrlEmployee'] = $this->apiGatewayUrl . "/v1/employees/employee";
        $data['company'] = session()->get('company_id');
        $data['selectedEmployee'] = request()->query('employee_id');

        return view('dashboard.hrms.claim.expense.index', $data);
    }

    public function create()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Create Employee Expense';
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/payroll/expense_claim";
        $data['apiUrlEmployee'] = $this->apiGatewayUrl . "/v1/employees/employee";
        $data['company'] = session()->get('company_id');

        return view('dashboard.hrms.claim.expense.create', $data);
    }

    public function edit($id)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Update Employee Expense';
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/payroll/expense_claim";
        $data['apiUrlEmployee'] = $this->apiGatewayUrl . "/v1/employees/employee";
        $data['company'] = session()->get('company_id');
        $data['id'] = $id;

        return view('dashboard.hrms.claim.expense.edit', $data);
    }
}
