<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesignationController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }
    public function index()
    {
        $data['title'] = "Data Desigantion";
        $data['page_title'] = "Data desigantion";
        $data['apiUrl'] = $this->apiGatewayUrl .'/v1/companies/designation';
        return view('dashboard.hrms.designation.index', $data);
    }

    public function create()
    {
        $data['title'] = "Add New Designation";
        $data['page_title'] = "Add new Designation";
        $allSessions = session()->all();
        $data['company'] = $allSessions['company_id'];
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/companies/designation";
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies/company/datatables';

        return view('dashboard.hrms.designation.create', $data);
    }
    public function update($id)
    {
        $data['title'] = "Update Designation";
        $data['page_title'] = "Update Designation";
        $allSessions = session()->all();
        $data['id'] = $id;
        $data['company'] = $allSessions['company_id'];
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/companies/designation";
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies/company/datatables';

        return view('dashboard.hrms.designation.create', $data);
    }
}
