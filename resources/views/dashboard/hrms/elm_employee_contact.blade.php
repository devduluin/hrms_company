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
                    <button id="tab-overview" class="tab text-gray-600 border-gray-100 py-2 px-4 border-b-2 font-medium text-sm" onclick="setActiveTab('tab-overview')">
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
                    <button id="tab-overview" class="tab text-blue-600 border-blue-600 py-2 px-4 border-b-2 font-medium text-sm" onclick="setActiveTab('tab-overview')">
                        <i data-tw-merge="" data-lucide="contact" class="inline-block h-5 w-5 mr-2 stroke-[1] "></i>
                        Address & Contact
                    </button>
                </a>
            </div>
            <div class="font-bold text-l">
                Contact
            </div>
            <div class="grid grid-cols-2 gap-5 mt-4">
                <div>
                    <label for="mobile-phone" class="block text-sm font-medium text-gray-700">Mobile Phone</label>
                    <input type="text" id="mobile-phone" name="mobile-phone" class="mt-5 p-2 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="personal-email" class="block text-sm font-medium text-gray-700">Personal Email</label>
                    <input type="text" id="personal-email" name="personal-email" class="mt-5 p-2 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-5 mt-4">
                <div>
                    <label for="company-email" class="block text-sm font-medium text-gray-700">Company Email</label>
                    <input type="text" id="company-email" name="company-email" class="mt-5 p-2 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>  
                <div>
                    <label for="preffered-contact-email" class="block text-sm font-medium text-gray-700">Preffered Contact Email</label>
                    <select id="grade" name="grade" class="mt-5 p-2 block w-full border border-gray-200 rounded-md focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="" disabled selected>Preffered Contact Email</option>
                        <option value="personal-email">Personal Email</option>
                        <option value="company-email">Company Email</option>
                    </select>
                </div>
            </div>
            <hr class="my-6 divider border-t border-gray-200">
            <div class="font-bold text-l">
                Address
            </div>
            <div class="grid grid-cols-2 gap-5 mt-4">
                <div>
                    <label for="current-address" class="block text-sm font-medium text-gray-700">Current Address</label>
                    <input type="text" id="current-address" name="current-address" class="mt-5 p-2 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="permanent-address" class="block text-sm font-medium text-gray-700">Permanent Address</label>
                    <input type="text" id="permanent-address" name="permanent-address" class="mt-5 p-2 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-5 mt-4">
                <div>
                    <label for="current-address-is" class="block text-sm font-medium text-gray-700">Current Address Is</label>
                    <select id="current-address-is" name="current-address-is" class="mt-5 p-2 block w-full border border-gray-200 rounded-md focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="" disabled selected></option>
                        <option value="personal-email">Rented</option>
                        <option value="company-email">Owned</option>
                    </select>
                </div>  
                <div>
                    <label for="permanent-address-is" class="block text-sm font-medium text-gray-700">Permanent Address Is</label>
                    <select id="permanent-address-is" name="permanent-address-is" class="mt-5 p-2 block w-full border border-gray-200 rounded-md focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="" disabled selected></option>
                        <option value="personal-email">Rented</option>
                        <option value="company-email">Owned</option>
                    </select>
                </div>
            </div>
            <hr class="my-6 divider border-t border-gray-200">
            <div class="font-bold text-l">
                Emergency Contact
            </div>
            <div class="grid grid-cols-3 gap-5 mt-4">
                <div>
                    <label for="emergency-contact-name" class="block text-sm font-medium text-gray-700">Emergency Contact Name</label>
                    <input type="text" id="emergency-contact-name" name="emergency-contact-name" class="mt-5 p-2 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="emergency-phone" class="block text-sm font-medium text-gray-700">Emergency Phone</label>
                    <input type="text" id="emergency-phone" name="emergency-phone" class="mt-5 p-2 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="relation" class="block text-sm font-medium text-gray-700">Relation</label>
                    <input type="text" id="relation" name="relation" class="mt-5 p-2 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
            </div>
            <div class="container mt-8 ">
                <div class="flex justify-end gap-5 mt-4 mx-auto ">
                    <div>
                      <a href="{{ url('dashboard/hrms/new_employee/employee_details') }} " class="inline-flex items-center px-4 py-2 bg-white border border-blue-600 text-blue-600 text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 ">
                          Previous
                      </a>
                    </div>
                    <div>
                      <a href="" class="inline-flex items-center px-4 py-2 bg-blue-600 border text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 ">
                          Save
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