@extends('layouts.dashboard.app') 
@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
    @include('layouts.dashboard.menu')

    <div id="contents-page" class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
        <div class="container">
            <div class="font-medium text-xl mb-8">
                New Employee
            </div>
            <div class="flex  border-b mb-8 gap-2">
                <a href="">
                    <button id="tab-overview" class="tab text-blue-600 border-blue-600 py-2 px-4 border-b-2 font-medium text-sm" onclick="setActiveTab('tab-overview')">
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
                    <button id="tab-overview" class="tab text-gray-600 border-gray-100 py-2 px-4 border-b-2 font-medium text-sm" onclick="setActiveTab('tab-overview')">
                        <i data-tw-merge="" data-lucide="contact" class="inline-block h-5 w-5 mr-2 stroke-[1] "></i>
                        Employee Overview
                    </button>
                </a>
            </div>
            <div class="grid grid-cols-2 gap-5 mt-4">
                <div>
                    <label for="applicant-name" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" id="applicant-name" name="applicant-name" class="mt-5 p-2 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="job-opening" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" id="job-opening" name="job-opening" class="mt-5 p-2 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-5 mt-4">
                <div>
                    <label for="applicant-name" class="block text-sm font-medium text-gray-700">Mobile Number</label>
                    <input type="text" id="applicant-name" name="applicant-name" class="mt-5 p-2 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="job-opening" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="text" id="job-opening" name="job-opening" class="mt-5 p-2 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-5 mt-4">
                <div>
                    <label for="applicant-name" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                    <input type="text" id="applicant-name" name="applicant-name" class="mt-5 p-2 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="job-opening" class="block text-sm font-medium text-gray-700">Gender</label>
                    <input type="text" id="job-opening" name="job-opening" class="mt-5 p-2 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-5 mt-4">
                <div>
                    <label for="applicant-name" class="block text-sm font-medium text-gray-700">Salutation</label>
                    <input type="text" id="applicant-name" name="applicant-name" class="mt-5 p-2 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="job-opening" class="block text-sm font-medium text-gray-700">Date if Joining</label>
                    <input type="text" id="job-opening" name="job-opening" class="mt-5 p-2 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
            </div>
            <div class="container mt-8 ">
                <div class="flex justify-end gap-5 mt-4 mx-auto ">
                    <div>
                      <a href="{{ url('dashboard/hrms/new_employee/employee_profile') }} " class="inline-flex items-center px-4 py-2 bg-blue-600 border text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 ">
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