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
        $data['title'] = "Data branch";
        $data['page_title'] = "Data branch";
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/branch/branch/datatable";
        return view('dashboard.hrms.branch.index', $data);
    }

    public function create()
    {
        $data['title'] = "Add new branch";
        $data['page_title'] = "Add new branch";

        return view('dashboard.hrms.branch.create', $data);
    }
}
