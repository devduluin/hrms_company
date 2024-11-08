<?php

namespace App\Http\Controllers\Claim;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvanceController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }
    public function index()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Employee Advance';
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/companies/branch";

        return view('dashboard.hrms.claim.advance.index', $data);
    }

    public function create()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Create Employee Advance';
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/companies/branch";
        
        return view('dashboard.hrms.claim.advance.create', $data);
    }

    public function update()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Update Employee Advance';
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/companies/branch";
        
        return view('dashboard.hrms.claim.advance.update', $data);
    }
}
