<?php

namespace App\Http\Controllers\Claim;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }
    public function index()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Expense Type';
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/payroll";
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies/company/datatables';
        $data['company'] = session()->get('company_id');
        
        return view('dashboard.hrms.claim.type.index', $data);
    }

    public function create()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Create Expense Type';
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/payroll";

        return view('dashboard.hrms.claim.type.create', $data);
    }

    public function update($id)
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Update Expense Type';
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/payroll";
        $data['id'] = $id;

        return view('dashboard.hrms.claim.type.create', $data);
    }
}
