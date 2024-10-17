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
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/branch/branch/datatable";
        return view('dashboard.hrms.branch.index', $data);
    }

    public function create()
    {
        $data['title'] = "Add new branch";
        $data['page_title'] = "Add new branch";
        $allSessions = session()->all();
        $data['company'] = $allSessions['company_id'][0];
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/branch/branch";
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . "/v1/companies/company?user_id=".$allSessions['user_id'];

        return view('dashboard.hrms.branch.create', $data);
    }
}
