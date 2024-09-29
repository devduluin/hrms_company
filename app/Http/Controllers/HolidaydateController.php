<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HolidaydateController extends Controller
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
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/holiday-date/holiday-date/datatable";
        return view('dashboard.hrms.holidaydate.index', $data);
    }

    public function create()
    {
        $data['title'] = "Data desigantion";
        $data['page_title'] = "Data desigantion";

        return view('dashboard.hrms.holidaydate.create', $data);
    }
}
