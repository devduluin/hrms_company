<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CompaniesController extends Controller
{
    protected $apiGatewayUrl;
    public function __construct()
    {
        $this->apiGatewayUrl = config('apiendpoints.gateway');
    }

    public function index()
    {
        $data['title']   = 'Companies';
        $data['page_title']   = 'Data Companies';
        $data['apiUrl'] = $this->apiGatewayUrl . '/v1/companies/company';
        return view('dashboard.hrms.companies.index', $data);
    }

    public function list(Request $request)
    {
        // if($request->ajax()) {
        //     $postData = [
        //         "user_id" => '3c5b06b2-b224-4029-a7a9-a0291dbe723c',
        //         "page"    => 1,
        //         "limit"   => 10,
        //         "sort"    => "ASC"
        //     ];

        //     $response = Http::withToken('xN9P6a8sL2bV3iR4fC5J6Q7kT8yU9wZ0')
        //                     ->post("http://apidev.duluin.com/api/v1/company/lists", $postData);

        //     $dataCompanies = $response->json();
        //     $data['table'] = $response['data'];
        //     $data['meta'] = $response['meta'];

        //     return view('dashboard.hrms.companies._data_table', $data);
        // }

        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Data Companies';

        return view('dashboard.hrms.companies.index', $data);
    }

    public function create()
    {
        $data['title']   = 'Duluin HRMS';
        $data['page_title']   = 'Add new company';

        return view('dashboard.hrms.companies.create', $data);
    }

    public function edit()
    {
        $data['title'] = 'Duluin HRMS' ;
        $data['page_title'] = "Edit data company";

        return view('dashboard.hrms.companies.edit', $data);
    }

    public function show()
    {
        $data['title'] = 'Duluin HRMS';
        $data['page_title'] = "Profile company";
        $data['companyApiUrl'] = $this->companyApiUrl;
        $allSessions = session()->all();
        $data['company'] = $allSessions['company_id'][0];
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies';

        return view('dashboard.hrms.companies.show', $data);
    }

    public function preview()
    {
        $data['title'] = 'Duluin HRMS';
        $data['page_title'] = "Company preview";
        $data['companyApiUrl'] = $this->companyApiUrl;
        $allSessions = session()->all();
        $data['company'] = $allSessions['company_id'][0];
        $data['apiCompanyUrl'] = $this->apiGatewayUrl . '/v1/companies';
        $data['apiEmployeeUrl'] = $this->apiGatewayUrl . '/v1/employees';
        $data['apiGateway'] = $this->apiGatewayUrl . '/users';

        return view('dashboard.hrms.companies.preview', $data);
    }
}
