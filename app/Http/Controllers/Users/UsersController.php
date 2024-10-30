<?php

namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }
    
    public function index()
    {
        $data['title'] = "Users List";
        $data['page_title'] = "Users List";
        $data['apiUrl'] = $this->apiGatewayUrl . "/users/user";

        return view('dashboard.hrms.users.index', $data);
    }

    public function create()
    {
        $data['title'] = "User Create";
        $data['page_title'] = "Add New User";
        $data['apiUrl'] = $this->apiGatewayUrl . "/users/user";
        $data['company'] = session()->get('company_id')[0];
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies/company/datatables';
        
        return view('dashboard.hrms.users.create', $data);
    }

    public function update($id)
    {
        $data['title'] = "User Create";
        $data['page_title'] = "Add New User";
        $data['apiUrl'] = $this->apiGatewayUrl . "/users/user";
        $data['id'] =  $id;
        $data['company'] = session()->get('company_id')[0];
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies/company/datatables';
        
        return view('dashboard.hrms.users.create', $data);
    }
}