<?php

namespace App\Http\Controllers\Claim;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }
    public function index()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Employee Travel';
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/payrool/travel";

        return view('dashboard.hrms.claim.travel.index', $data);
    }

    public function create()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Create Employee Travel';
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/payrool/travel";
        $data['apiUrlEmployee'] = $this->apiGatewayUrl . "/v1/employees/employee";
        $data['company'] = session()->get('company_id');
        
        return view('dashboard.hrms.claim.travel.create', $data);
    }

    public function update()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Update Employee Travel';
        
        return view('dashboard.hrms.claim.travel.create', $data);
    }

    public function purpose_travel()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Purpose Travel';
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/payrool/travel";

        return view('dashboard.hrms.claim.travel.purpose_travel', $data);
    }

    public function create_purpose_travel()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Create Purpose Travel';
        $data['apiUrl'] = $this->apiGatewayUrl . "/v1/payrool/travel";
        $data['apiUrlEmployee'] = $this->apiGatewayUrl . "/v1/employees/employee";
        $data['company'] = session()->get('company_id');
        
        return view('dashboard.hrms.claim.travel.create_purpose_travel', $data);
    }

    public function update_purpose_travel()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Update Purpose Travel';
        
        return view('dashboard.hrms.claim.travel.create_purpose_travel', $data);
    }
}
