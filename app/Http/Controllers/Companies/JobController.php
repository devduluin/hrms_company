<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }

    public function index()
    {
        $data['title'] = "Data jobs";
        $data['page_title'] = "Data jobs";
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/job/job/datatable";
        return view('dashboard.hrms.job.index', $data);
    }

    public function create()
    {
        $data['title'] = "Add new job";
        $data['page_title'] = "Add new job";

        return view('dashboard.hrms.job.create', $data);
    }
}
