<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalaryStructureAssignmentController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Salary Structure Assignment';
        $allSessions = session()->all();
        $data['company'] = $allSessions['company_id'][0];
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies';
        $data['apiPayrollUrl'] = $this->apiGatewayUrl . '/v1/salary_structures';
        $allSessions = session()->all();

        return view('dashboard.payroll.payout.salary_structure_assignment.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Salary Structure Assignment';
        $allSessions = session()->all();
        $data['company'] = $allSessions['company_id'][0];
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies';
        $data['apiPayrollUrl'] = $this->apiGatewayUrl . '/v1/salary_structures';
        $data['apiEmployeeUrl'] = $this->apiGatewayUrl . '/v1/employees';
        $allSessions = session()->all();

        return view('dashboard.payroll.payout.salary_structure_assignment.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Salary Structure Assignment';
        $allSessions = session()->all();
        $data['company'] = $allSessions['company_id'][0];
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies';
        $data['apiPayrollUrl'] = $this->apiGatewayUrl . '/v1/salary_structures';
        $data['apiEmployeeUrl'] = $this->apiGatewayUrl . '/v1/employees';
        $allSessions = session()->all();
        $data['salaryStructureEmployeeAssignmentId'] = $id;

        return view('dashboard.payroll.payout.salary_structure_assignment.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
