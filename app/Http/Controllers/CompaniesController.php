<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class CompaniesController extends Controller
{
    public function index()
    {
        $data['title']   = 'Companies';
        $data['page_title']   = 'Data Companies';
        
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
        //                     ->post("http://localhost:4444/api/v1/company/lists", $postData);
            
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
        $data['title'] = "Edit data company";
        $data['page_title'] = "Edit data company";

        return view('dashboard.hrms.companies.edit', $data);
    }

    public function show()
    {
        $data['title'] = "Profile company";
        $data['page_title'] = "Profile company";

        return view('dashboard.hrms.companies.show', $data);
    }

    public function setting()
    {
        $data['title'] = "Company setting";
        $data['page_title'] = "Company setting";

        return view('dashboard.hrms.companies.setting', $data);
    }
    
    
}
