@extends('layouts.dashboard.app') @section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

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
                <a href="">
                    <button id="tab-overview" class="tab text-blue-600 border-blue-600 py-2 px-4 border-b-2 font-medium text-sm" onclick="setActiveTab('tab-overview')">
                        <i data-tw-merge="" data-lucide="file" class="inline-block h-5 w-5 mr-2 stroke-[1] "></i>
                        Employee Details
                    </button>
                </a>
                <a href="{{ url('dashboard/hrms/new_employee/employee_contact') }}">
                    <button id="tab-overview" class="tab text-gray-600 border-gray-100 py-2 px-4 border-b-2 font-medium text-sm" onclick="setActiveTab('tab-overview')">
                        <i data-tw-merge="" data-lucide="contact" class="inline-block h-5 w-5 mr-2 stroke-[1] "></i>
                        Address & Contact
                    </button>
                </a>
            </div>
            <div class="grid grid-cols-2 gap-5 mt-4">
                <div>
                    <label for="applicant-name" class="block text-sm font-medium text-gray-700">Company</label>
                    <input type="text" id="applicant-name" name="applicant-name" class="mt-5 p-2 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
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
            <div class="grid grid-cols-3 gap-5 mt-4">
                <div>
                    <label for="grade" class="block text-sm font-medium text-gray-700">Grade</label>
                    <select id="grade" name="grade" class="mt-5 p-2 block w-full border border-gray-200 rounded-md focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="" disabled selected>Select a grade</option>
                        <option value="A">Bachelor</option>
                        <option value="B">Master</option>
                    </select>
                </div>
                <div>
                    <label for="grade" class="block text-sm font-medium text-gray-700">Employee Type</label>
                    <select id="grade" name="grade" class="mt-5 p-2 block w-full border border-gray-200 rounded-md focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="" disabled selected>Select a type</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                    </select>
                </div>
                <div>
                    <label for="grade" class="block text-sm font-medium text-gray-700">Report to</label>
                    <select id="grade" name="grade" class="mt-5 p-2 block w-full border border-gray-200 rounded-md focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="" disabled selected>Report to</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                    </select>
                </div>
            </div>
            <div class="container mt-8 ">
                <div class="flex justify-end gap-5 mt-4 mx-auto ">
                    <div>
                      <a href=" " class="inline-flex items-center px-4 py-2 bg-white border border-blue-600 text-blue-600 text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 ">
                          Previous
                      </a>
                    </div>
                    <div>
                      <a href=" " class="inline-flex items-center px-4 py-2 bg-blue-600 border text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 ">
                          Next
                      </a>
                    </div>
                </div>
                <div id="loading-indicator " class="items-center " style="display: none; "></div>
            </div>
        </div>
</div>
<script>
        function setActiveTab(tabId) {
            const tabs = document.querySelectorAll('.tab');
            tabs.forEach(tab => {
                tab.classList.remove('text-blue-600', 'border-blue-600');
                tab.classList.add('text-gray-600', 'border-gray-100');
            });
            const activeTab = document.getElementById(tabId);
            activeTab.classList.remove('text-gray-600', 'border-gray-100');
            activeTab.classList.add('text-blue-600', 'border-blue-600');
        }
    </script>

@endsection