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
        $data['title'] = "Data desigantion";
        $data['page_title'] = "Data desigantion";
        $data['apiUrl'] = $this->apiGatewayUrl .'/v1/companies/designation/datatables';
        return view('dashboard.hrms.designation.index', $data);
    }

    public function create()
    {
        $data['title'] = "Add new designation";
        $data['page_title'] = "Add new designation";

        return view('dashboard.hrms.designation.create', $data);
    }
}
