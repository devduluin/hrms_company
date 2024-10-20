<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BranchController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }

    public function index(Request $request)
    {
        $data['title'] = "Data Branch";
        $data['page_title'] = "Data Branch";
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/branch/branch";
        return view('dashboard.hrms.branch.index', $data);
    }

    public function create()
    {
        $data['title'] = "Add New Branch";
        $data['page_title'] = "Add New Branch";
        $allSessions = session()->all();
        $data['company'] = $allSessions['company_id'][0];
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/branch/branch";
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies/company/datatables';
       // $data['apiCompanyUrl'] = $this->apiGatewayUrl . "/v1/companies/company?company_id=".$data['company'];

        return view('dashboard.hrms.branch.create', $data);
    }

    public function update($id)
    {
        $data['title'] = "Updat Branch";
        $data['page_title'] = "Updat Branch";
        $allSessions = session()->all();
        $data['id'] = $id;
        $data['company'] = $allSessions['company_id'][0];
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/branch/branch";
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies/company/datatables';
        //$data['apiCompanyUrl'] = $this->apiGatewayUrl . "/v1/companies/company?company_id=".$data['company'];

        return view('dashboard.hrms.branch.create', $data);
    }
}
