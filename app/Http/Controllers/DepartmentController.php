<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }
    public function index()
    {
        $data['title'] = "Data department";
        $data['page_title'] = "Data department";
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/companies/department/datatables";
        return view('dashboard.hrms.department.index', $data);
    }

    public function create()
    {
        $data['title'] = "Add new department";
        $data['page_title'] = "Add new department";
        return view('dashboard.hrms.department.create', $data);
    }
    
}
