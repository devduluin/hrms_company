@extends('layouts.dashboard.app') @section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
    @include('layouts.dashboard.menu')

    <div id="contents-page" class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
        <div class="container">
            <div class="font-medium text-xl mb-8">
                New Employee
            </div>
            <div class="flex  border-b mb-8 gap-2">
                <a href="{{ url('dashboard/hrms/new_employee/employee_overview') }}">
                    <button id="tab-overview" class="tab text-gray-600 border-gray-100 py-2 px-4 border-b-2 font-medium text-sm" onclick="setActiveTab('tab-overview')">
                        <i data-tw-merge="" data-lucide="briefcase" class="inline-block h-5 w-5 mr-2 stroke-[1] "></i>
                        Employee Overview
                    </button>
                </a>
                <a href="{{ url('dashboard/hrms/new_employee/employee_profile') }}">
                    <button id="tab-overview" class="tab text-blue-600 border-blue-600 py-2 px-4 border-b-2 font-medium text-sm" onclick="setActiveTab('tab-overview')">
                        <i data-tw-merge="" data-lucide="user" class="inline-block h-5 w-5 mr-2 stroke-[1] "></i>
                        Employee Profile
                    </button>
                </a>
                <a href="{{ url('dashboard/hrms/new_employee/employee_details') }}">
                    <button id="tab-overview" class="tab text-gray-600 border-gray-100 py-2 px-4 border-b-2 font-medium text-sm" onclick="setActiveTab('tab-overview')">
                        <i data-tw-merge="" data-lucide="file" class="inline-block h-5 w-5 mr-2 stroke-[1] "></i>
                        Employee Details
                    </button>
                </a>
                <a href="">
                    <button id="tab-overview" class="tab text-gray-600 border-gray-100 py-2 px-4 border-b-2 font-medium text-sm" onclick="setActiveTab('tab-overview')">
                        <i data-tw-merge="" data-lucide="contact" class="inline-block h-5 w-5 mr-2 stroke-[1] "></i>
                        Address & Contact
                    </button>
                </a>
            </div>
            <div class="container mt-8 ">
                <label class="block text-sm font-medium text-gray-700">Bio Cover Letter</label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-blue-500" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M4 36V12a8 8 0 018-8h24a8 8 0 018 8v24a8 8 0 01-8 8H12a8 8 0 01-8-8z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M14 22l10-10m0 0l10 10m-10-10v18" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex justify-center items-center text-sm text-gray-600"">
                                <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                    <span class="ml-auto">Browse</span>
                                    <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                </label>
                                <span class="mx-1">or drag & drop files</span>
                            </div>
                            <p class="text-xs text-gray-500">
                                Supported formats: pdf, jpg, gif, doc, docx, csv
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-6 divider border-t border-gray-200">
            <div class="font-bold text-l">
                Educational
            </div>
            <div class="grid grid-cols-2 gap-5 mt-4">
                <div>
                    <label for="university" class="block text-sm font-medium text-gray-700">University</label>
                    <input type="text" id="university" name="university" class="mt-5 p-2 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="qualification" class="block text-sm font-medium text-gray-700">Qualifiacation</label>
                    <input type="text" id="qualification" name="qualification" class="mt-5 p-2 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-5 mt-4">
                <div>
                    <label for="level" class="block text-sm font-medium text-gray-700">Level</label>
                    <input type="text" id="level" name="level" class="mt-5 p-2 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>  
                <div>
                    <label for="year-of-passing" class="block text-sm font-medium text-gray-700">Year of passing</label>
                    <div class="mt-5 flex">
                        <span class="inline-flex items-center px-3 text-sm text-gray-500 bg-gray-100 border border-r-0 border-gray-200 rounded-l-md">
                            <i data-lucide="calendar" class="h-5 w-5"></i>
                        </span>
                        <input type="text" id="year-of-passing" name="year-of-passing" class=" p-2 block w-full border border-gray-200 rounded-r-md focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                </div>
            </div>
            <hr class="my-6 divider border-t border-gray-200">
            <div class="font-bold text-l">
                Job Experience
            </div>
            <div class="grid grid-cols-3 gap-5 mt-4">
                <div>
                    <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                    <input type="text" id="company" name="company" class="mt-5 p-2 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="designation" class="block text-sm font-medium text-gray-700">Designation</label>
                    <input type="text" id="designation" name="designation" class="mt-5 p-2 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="salary" class="block text-sm font-medium text-gray-700">Salary</label>
                    <input type="text" id="salary" name="salary" class="mt-5 p-2 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
            </div>
            <div class=" gap-5 mt-4">
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" id="address" name="address" class="mt-5 p-4 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <hr class="my-6 divider border-t border-gray-200">
            <div class="font-bold text-l">
                History Company
            </div>
            <div class="grid grid-cols-2 gap-5 mt-4">
                <div>
                    <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                    <input type="text" id="company" name="company" class="mt-5 p-2 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="designation" class="block text-sm font-medium text-gray-700">Designation</label>
                    <input type="text" id="designation" name="designation" class="mt-5 p-2 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-5 mt-4">
                <div>
                    <label for="branch" class="block text-sm font-medium text-gray-700">Branch</label>
                    <input type="text" id="branch" name="branch" class="mt-5 p-2 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="department" class="block text-sm font-medium text-gray-700">Department</label>
                    <input type="text" id="department" name="department" class="mt-5 p-2 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-5 mt-4">
                <div>
                    <label for="from-date" class="block text-sm font-medium text-gray-700">From Date</label>
                    <div class="mt-5 flex">
                        <span class="inline-flex items-center px-3 text-sm text-gray-500 bg-gray-100 border border-r-0 border-gray-200 rounded-l-md">
                            <i data-lucide="calendar" class="h-5 w-5"></i>
                        </span>
                        <input type="text" id="from-date" name="from-date" class=" p-2 block w-full border border-gray-200 rounded-r-md focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                </div>  
                <div>
                    <label for="to-date" class="block text-sm font-medium text-gray-700">To Date</label>
                    <div class="mt-5 flex">
                        <span class="inline-flex items-center px-3 text-sm text-gray-500 bg-gray-100 border border-r-0 border-gray-200 rounded-l-md">
                            <i data-lucide="calendar" class="h-5 w-5"></i>
                        </span>
                        <input type="text" id="to-date" name="to-date" class=" p-2 block w-full border border-gray-200 rounded-r-md focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                </div>
            </div>
            <div class="container mt-8 ">
                <div class="flex justify-end gap-5 mt-4 mx-auto ">
                    <div>
                      <a href="{{ url('dashboard/hrms/new_employee/employee_overview') }} " class="inline-flex items-center px-4 py-2 bg-white border border-blue-600 text-blue-600 text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 ">
                          Previous
                      </a>
                    </div>
                    <div>
                      <a href=" {{ url('dashboard/hrms/new_employee/employee_details') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 ">
                          Next
                      </a>
                    </div>
                </div>
                <div id="loading-indicator " class="items-center " style="display: none; "></div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#year-of-passing", {
            enableTime: false,
            dateFormat: "Y",
            minDate: "2000",
            maxDate: new Date().getFullYear().toString(),
            plugins: [new rangePlugin({ input: "#year-of-passing" })]
        });
    </script>

@endsection