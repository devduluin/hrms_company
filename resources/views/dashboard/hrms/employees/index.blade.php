@extends('layouts.dashboard.app')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .show {
            display: block;
        }
    </style>
    <div
        class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')


        <div id="contents-page"
            class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
            <div class="container">


                <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                    <div class="col-span-12">
                        <div class="mt-3.5 flex flex-col gap-8">
                            <div class="box box--stacked flex flex-col p-5">
                                <div class="grid grid-cols-4 gap-5">
                                    <div
                                        class="box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                        <div class="text-base text-slate-500">Job Opening</div>
                                        <div class="mt-1.5 text-2xl font-medium text-right">457,204</div>
                                        <div class="col-2">
                                            <div class="flex justify-end gap-2">
                                                <div
                                                    class="mt-2 w-10 items-left rounded-full border border-danger/10 bg-danger/10 py-[2px] pl-[7px] pr-8 text-xs font-medium text-danger">
                                                    <i data-tw-merge="" data-lucide="arrow-down"
                                                        class="ml-px h-4 w-4 stroke-[1.5] side-menu__link_icon"></i>
                                                    3%
                                                </div>
                                                <div class="pt-3 whitespace-nowrap text-xs text-slate-500">
                                                    this month
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                        <div class="text-base text-slate-500">Total Applicant</div>
                                        <div class="mt-1.5 text-2xl font-medium text-right">122,721</div>
                                        <div class="col-2">
                                            <div class="flex justify-end gap-2">
                                                <div
                                                    class="mt-2 w-10 items-left rounded-full border border-danger/10 bg-danger/10 py-[2px] pl-[7px] pr-8 text-xs font-medium text-danger">
                                                    <i data-tw-merge="" data-lucide="arrow-down"
                                                        class="ml-px h-4 w-4 stroke-[1.5] side-menu__link_icon"></i>
                                                    3%
                                                </div>
                                                <div class="pt-3 whitespace-nowrap text-xs text-slate-500">
                                                    this month
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                        <div class="text-base text-slate-500">Approve Claims</div>
                                        <div class="font-mediumm mt-1.5 text-2xl text-right">489,223</div>
                                        <div class="col-2">
                                            <div class="flex justify-end gap-2">
                                                <div
                                                    class="mt-2 w-10 items-left rounded-full border border-danger/10 bg-danger/10 py-[2px] pl-[7px] pr-8 text-xs font-medium text-danger">
                                                    <i data-tw-merge="" data-lucide="arrow-down"
                                                        class="ml-px h-4 w-4 stroke-[1.5] side-menu__link_icon"></i>
                                                    3%
                                                </div>
                                                <div class="pt-3 whitespace-nowrap text-xs text-slate-500">
                                                    this month
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                        <div class="text-base text-slate-500">Rejected Claims</div>
                                        <div class="font-mediumm mt-1.5 text-2xl text-right">411,259</div>
                                        <div class="col-2">
                                            <div class="flex justify-end gap-2">
                                                <div
                                                    class="mt-2 w-10 items-left rounded-full border border-danger/10 bg-danger/10 py-[2px] pl-[7px] pr-8 text-xs font-medium text-danger">
                                                    <i data-tw-merge="" data-lucide="arrow-down"
                                                        class="ml-px h-4 w-4 stroke-[1.5] side-menu__link_icon"></i>
                                                    3%
                                                </div>
                                                <div class="pt-3 whitespace-nowrap text-xs text-slate-500">
                                                    this month
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div class="grid grid-rows-2 gap-4">
                                    <div
                                        class="flex flex-col box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                        <div class="flex items-center justify-between gap-10">
                                            <div class="  flex pr-12">
                                                <div class="font-medium mt-1.5 text-xl">
                                                    Job Offer Status
                                                </div>
                                            </div>
                                            <div class="select-with-icon">
                                                <select data-tw-merge=""
                                                    class="align-self-stretch ml-auto  flex flex-col gap-x-3 gap-y-2 sm:ml-auto sm:flex-row disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1 mt-2 flex-1">
                                                    <option value="This Month">
                                                        This Month
                                                    </option>
                                                    <option value="Last Month">
                                                        Last Month
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="card-body d-flex justify-content-center align-items-center">
                                        </div>
                                    </div>
                                    <div
                                        class="flex flex-col box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                        <div class="col-2 justify-content-between">
                                            <div class="flex justify-between items-center gap-10">
                                                <div class=" mr-auto flex pr-12">
                                                    <div class="g-col-6 font-medium mt-1.5 text-xl">
                                                        Claims By Type
                                                    </div>
                                                </div>
                                                <div class="select-with-icon">
                                                    <select data-tw-merge=""
                                                        class="align-self-stretch ml-auto  flex flex-col gap-x-3 gap-y-2 sm:ml-auto sm:flex-row disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1 mt-2 flex-1">
                                                        <option value="This Month">
                                                            This Month
                                                        </option>
                                                        <option value="Last Month">
                                                            Last Month
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body d-flex justify-content-center align-items-center">
                                            <canvas id="jobOfferStatusChart" class="jobOfferStatusChart" width="200"
                                                height="200"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                    <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                                        <div class="font-medium mt-1.5 text-xl">
                                            New Employee
                                        </div>
                                        <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row sm:ml-auto">
                                            <a href="{{ url('dashboard/hrms/employee/list') }}"
                                                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-800 transition duration-200 ease-in-out w-full sm:w-auto">
                                                <!-- Icon (example using Heroicons) -->
                                                <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 4v16m8-8H4" />
                                                </svg>
                                                <!-- Button Text -->
                                                New Employee
                                            </a>
                                        </div>
                                    </div>
                                    <div class="latestEmployee">
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-5">
                                <div
                                    class="box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                    <div class="col-2 justify-content-between">
                                        <div class="flex justify-between items-center gap-10">
                                            <div class=" mr-auto flex pr-12">
                                                <div class="g-col-6 font-medium mt-1.5 text-xl">
                                                    Job Application Frequency
                                                </div>
                                            </div>
                                            <div class="select-with-icon">
                                                <select data-tw-merge=""
                                                    class="align-self-stretch ml-auto  flex flex-col gap-x-3 gap-y-2 sm:ml-auto sm:flex-row disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1 mt-2 flex-1">
                                                    <option value="This Month">
                                                        This Month
                                                    </option>
                                                    <option value="Last Month">
                                                        Last Month
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex justify-content-center align-items-center">
                                        <canvas id="jobOfferStatusChart" class="jobOfferStatusChart" width="200"
                                            height="200"></canvas>
                                    </div>
                                </div>
                                <div
                                    class="box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                    <div class="col-2 justify-content-between">
                                        <div class="flex justify-between items-center gap-10">
                                            <div class=" mr-auto flex pr-12">
                                                <div class="g-col-6 font-medium mt-1.5 text-xl">
                                                    Expense Claims
                                                </div>
                                            </div>
                                            <div class="select-with-icon">
                                                <select data-tw-merge=""
                                                    class="align-self-stretch ml-auto  flex flex-col gap-x-3 gap-y-2 sm:ml-auto sm:flex-row disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1 mt-2 flex-1">
                                                    <option value="This Month">
                                                        This Month
                                                    </option>
                                                    <option value="Last Month">
                                                        Last Month
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex justify-content-center align-items-center">
                                        <canvas id="jobOfferStatusChart" class="jobOfferStatusChart" width="200"
                                            height="200"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                                <div class="text-base font-medium group-[.mode--light]:text-white">
                                    New Job Applicant
                                </div>
                                <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                                    <a href="{{ url('/dashboard/hrms/new_job_applicant') }}"
                                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        <!-- Icon (example using Heroicons) -->
                                        <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4v16m8-8H4" />
                                        </svg>
                                        <!-- Button Text -->
                                        New Job Applicant
                                    </a>
                                </div>
                            </div>
                            <div class="box box--stacked flex flex-col">
                                <div class="flex flex-col gap-y-2 p-5 sm:flex-row sm:items-center">
                                    <div>
                                        <div class="relative">
                                            <i data-tw-merge="" data-lucide="search"
                                                class="absolute inset-y-0 left-0 z-10 my-auto ml-3 h-4 w-4 stroke-[1.3] text-slate-500"></i>
                                            <input data-tw-merge="" type="text" placeholder="Search users..."
                                                class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 rounded-[0.5rem] pl-9 sm:w-64">
                                        </div>
                                    </div>
                                    <div class="flex flex-col gap-x-3 gap-y-2 sm:ml-auto sm:flex-row">
                                        <div data-tw-merge="" data-tw-placement="bottom-end" class="dropdown relative">
                                            <button data-tw-merge="" data-tw-toggle="dropdown" aria-expanded="false"
                                                class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-secondary text-slate-500 dark:border-darkmode-100/40 dark:text-slate-300 [&:hover:not(:disabled)]:bg-secondary/20 [&:hover:not(:disabled)]:dark:bg-darkmode-100/10 w-full sm:w-auto"><i
                                                    data-tw-merge="" data-lucide="download"
                                                    class="mr-2 h-4 w-4 stroke-[1.3]"></i>
                                                Export
                                                <i data-tw-merge="" data-lucide="chevron-down"
                                                    class="ml-2 h-4 w-4 stroke-[1.3]"></i></button>
                                            <div data-transition="" data-selector=".show"
                                                data-enter="transition-all ease-linear duration-150"
                                                data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1"
                                                data-enter-to="!mt-1 visible opacity-100 translate-y-0"
                                                data-leave="transition-all ease-linear duration-150"
                                                data-leave-from="!mt-1 visible opacity-100 translate-y-0"
                                                data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1"
                                                class="dropdown-menu absolute z-[9999] hidden">
                                                <div data-tw-merge=""
                                                    class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600 w-40">
                                                    <a
                                                        class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i
                                                            data-tw-merge="" data-lucide="file-bar-chart"
                                                            class="stroke-[1] mr-2 h-4 w-4"></i>
                                                        PDF</a>
                                                    <a
                                                        class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i
                                                            data-tw-merge="" data-lucide="file-bar-chart"
                                                            class="stroke-[1] mr-2 h-4 w-4"></i>
                                                        CSV</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div data-tw-merge="" data-tw-placement="bottom-end"
                                            class="dropdown relative inline-block"><button data-tw-merge=""
                                                data-tw-toggle="dropdown" aria-expanded="false"
                                                class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-secondary text-slate-500 dark:border-darkmode-100/40 dark:text-slate-300 [&:hover:not(:disabled)]:bg-secondary/20 [&:hover:not(:disabled)]:dark:bg-darkmode-100/10 w-full sm:w-auto"><i
                                                    data-tw-merge="" data-lucide="arrow-down-wide-narrow"
                                                    class="mr-2 h-4 w-4 stroke-[1.3]"></i>
                                                Filter
                                                <span
                                                    class="ml-2 flex h-5 items-center justify-center rounded-full border bg-slate-100 px-1.5 text-xs font-medium">
                                                    3
                                                </span></button>
                                            <div data-transition="" data-selector=".show"
                                                data-enter="transition-all ease-linear duration-150"
                                                data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1"
                                                data-enter-to="!mt-1 visible opacity-100 translate-y-0"
                                                data-leave="transition-all ease-linear duration-150"
                                                data-leave-from="!mt-1 visible opacity-100 translate-y-0"
                                                data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1"
                                                class="dropdown-menu absolute z-[9999] hidden">
                                                <div data-tw-merge=""
                                                    class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600">
                                                    <div class="p-2">
                                                        <div>
                                                            <div class="text-left text-slate-500">
                                                                Position
                                                            </div>
                                                            <select data-tw-merge=""
                                                                class="disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1 mt-2 flex-1">
                                                                <option value="Marketing Coordinator">
                                                                    Marketing Coordinator
                                                                </option>
                                                                <option value="Project Manager">
                                                                    Project Manager
                                                                </option>
                                                                <option value="CRM Administrator">
                                                                    CRM Administrator
                                                                </option>
                                                                <option value="Account Executive">
                                                                    Account Executive
                                                                </option>
                                                                <option value="Sales Manager">
                                                                    Sales Manager
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="mt-3">
                                                            <div class="text-left text-slate-500">
                                                                Department
                                                            </div>
                                                            <select data-tw-merge=""
                                                                class="disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1 mt-2 flex-1">
                                                                <option value="Marketing Department">
                                                                    Marketing Department
                                                                </option>
                                                                <option value="Project Management">
                                                                    Project Management
                                                                </option>
                                                                <option value="CRM Team">
                                                                    CRM Team
                                                                </option>
                                                                <option value="Account Management">
                                                                    Account Management
                                                                </option>
                                                                <option value="Sales Department">
                                                                    Sales Department
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="mt-4 flex items-center">
                                                            <button data-tw-merge=""
                                                                class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&:hover:not(:disabled)]:bg-slate-100 [&:hover:not(:disabled)]:border-slate-100 [&:hover:not(:disabled)]:dark:border-darkmode-300/80 [&:hover:not(:disabled)]:dark:bg-darkmode-300/80 ml-auto w-32">Close</button>
                                                            <button data-tw-merge=""
                                                                class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary ml-2 w-32">Apply</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="overflow-auto xl:overflow-visible">
                                    <table data-tw-merge="" class="w-full text-left border-b border-slate-200/60">
                                        <thead data-tw-merge="" class="">
                                            <tr data-tw-merge="" class="">
                                                <td data-tw-merge=""
                                                    class="px-5 border-b dark:border-darkmode-300 w-5 border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500">
                                                    <input data-tw-merge="" type="checkbox"
                                                        class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&[type='radio']]:checked:bg-primary [&[type='radio']]:checked:border-primary [&[type='radio']]:checked:border-opacity-10 [&[type='checkbox']]:checked:bg-primary [&[type='checkbox']]:checked:border-primary [&[type='checkbox']]:checked:border-opacity-10 [&:disabled:not(:checked)]:bg-slate-100 [&:disabled:not(:checked)]:cursor-not-allowed [&:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&:disabled:checked]:opacity-70 [&:disabled:checked]:cursor-not-allowed [&:disabled:checked]:dark:bg-darkmode-800/50">
                                                </td>
                                                <td data-tw-merge=""
                                                    class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500">
                                                    APPLICANT
                                                </td>
                                                <td data-tw-merge=""
                                                    class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500">
                                                    DESIGNATION
                                                </td>
                                                <td data-tw-merge=""
                                                    class="px-5 border-b dark:border-darkmode-300 w-52 border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500">
                                                    PHONE NUMBER
                                                </td>
                                                <td data-tw-merge=""
                                                    class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 text-center font-medium text-slate-500">
                                                    RESUME
                                                </td>
                                                <td data-tw-merge=""
                                                    class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500">
                                                    STATUS
                                                </td>
                                                <td data-tw-merge=""
                                                    class="px-5 border-b dark:border-darkmode-300 w-20 border-t border-slate-200/60 bg-slate-50 py-4 text-center font-medium text-slate-500">
                                                    Action
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr data-tw-merge="" class="[&_td]:last:border-b-0">
                                                <td data-tw-merge=""
                                                    class="px-5 border-b dark:border-darkmode-300 border-dashed py-4 dark:bg-darkmode-600">
                                                    <input data-tw-merge="" type="checkbox"
                                                        class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&[type='radio']]:checked:bg-primary [&[type='radio']]:checked:border-primary [&[type='radio']]:checked:border-opacity-10 [&[type='checkbox']]:checked:bg-primary [&[type='checkbox']]:checked:border-primary [&[type='checkbox']]:checked:border-opacity-10 [&:disabled:not(:checked)]:bg-slate-100 [&:disabled:not(:checked)]:cursor-not-allowed [&:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&:disabled:checked]:opacity-70 [&:disabled:checked]:cursor-not-allowed [&:disabled:checked]:dark:bg-darkmode-800/50">
                                                </td>
                                                <td data-tw-merge=""
                                                    class="px-5 border-b dark:border-darkmode-300 w-80 border-dashed py-4 dark:bg-darkmode-600">
                                                    <div class="flex items-center">
                                                        <div class="ml-0">
                                                            <a class="whitespace-nowrap font-medium" href="#">
                                                                Meryl Streep
                                                            </a>
                                                            <div class="mt-0.5 whitespace-nowrap text-xs text-slate-500">
                                                                meryl.streep@left4code.com
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td data-tw-merge=""
                                                    class="px-5 border-b dark:border-darkmode-300 border-dashed py-4 dark:bg-darkmode-600">
                                                    <a class="whitespace-nowrap font-medium" href="#">
                                                        BackEnd Developer
                                                    </a>
                                                    <div class="mt-0.5 whitespace-nowrap text-xs text-slate-500">
                                                        Information Technology
                                                    </div>
                                                </td>
                                                <td data-tw-merge=""
                                                    class="px-5 border-b dark:border-darkmode-300 border-dashed py-4 dark:bg-darkmode-600">
                                                    <div class="w-40">
                                                        <div class="text-xs text-slate-500">
                                                            08294990230
                                                        </div>
                                                    </div>
                                                </td>
                                                <td data-tw-merge=""
                                                    class="px-5 border-b dark:border-darkmode-300 border-dashed py-4 dark:bg-darkmode-600">
                                                    <div class=" whitespace-nowrap text-center ">
                                                        jes_resume
                                                    </div>
                                                </td>
                                                <td data-tw-merge=""
                                                    class="px-5 border-b dark:border-darkmode-300 border-dashed py-4 dark:bg-darkmode-600">
                                                    <div
                                                        class="w-24 py-2 rounded flex items-center justify-center bg-danger/10">
                                                        <div class="ml-1.5 whitespace-nowrap text-danger">
                                                            Interview
                                                        </div>
                                                    </div>
                                                </td>
                                                <td data-tw-merge=""
                                                    class="px-5 border-b dark:border-darkmode-300 relative border-dashed py-4 dark:bg-darkmode-600">
                                                    <div class="flex space-x-2">
                                                        <a href="{{ url('dashboard/hrms/new_job_applicant') }}"
                                                            class="flex items-center p-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                            <!-- Icon Edit (Pencil) -->
                                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M11 5.586l6.707 6.707-7.778 7.778L3.222 13.364l7.778-7.778zM18.364 7.05l1.415 1.415a1 1 0 0 1 0 1.415l-7.778 7.778-2.121-.707.707-2.121 7.778-7.778a1 1 0 0 1 1.415 0z" />
                                                            </svg>
                                                        </a>
                                                        <a
                                                            class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item text-danger">
                                                            <!-- Icon Delete (Trash) -->
                                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M6 18a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H6zM8 11v5m4-5v5m4-5v5m1-7h-9m9 0h-9m1-7h5m-5 0h5" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </td>
                                        </tbody>
                                    </table>
                                </div>
                                <div
                                    class="flex-reverse flex flex-col-reverse flex-wrap items-center gap-y-2 p-5 sm:flex-row">
                                    <nav class="mr-auto w-full flex-1 sm:w-auto">
                                        <ul class="flex w-full mr-0 sm:mr-auto sm:w-auto">
                                            <li class="flex-1 sm:flex-initial">
                                                <a data-tw-merge=""
                                                    class="transition duration-200 border items-center justify-center py-2 rounded-md cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed min-w-0 sm:min-w-[40px] shadow-none font-normal flex border-transparent text-slate-800 sm:mr-2 dark:text-slate-300 px-1 sm:px-3"><i
                                                        data-tw-merge="" data-lucide="chevrons-left"
                                                        class="stroke-[1] h-4 w-4"></i></a>
                                            </li>
                                            <li class="flex-1 sm:flex-initial">
                                                <a data-tw-merge=""
                                                    class="transition duration-200 border items-center justify-center py-2 rounded-md cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed min-w-0 sm:min-w-[40px] shadow-none font-normal flex border-transparent text-slate-800 sm:mr-2 dark:text-slate-300 px-1 sm:px-3"><i
                                                        data-tw-merge="" data-lucide="chevron-left"
                                                        class="stroke-[1] h-4 w-4"></i></a>
                                            </li>
                                            <li class="flex-1 sm:flex-initial">
                                                <a data-tw-merge=""
                                                    class="transition duration-200 border items-center justify-center py-2 rounded-md cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed min-w-0 sm:min-w-[40px] shadow-none font-normal flex border-transparent text-slate-800 sm:mr-2 dark:text-slate-300 px-1 sm:px-3">...</a>
                                            </li>
                                            <li class="flex-1 sm:flex-initial">
                                                <a data-tw-merge=""
                                                    class="transition duration-200 border items-center justify-center py-2 rounded-md cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed min-w-0 sm:min-w-[40px] shadow-none font-normal flex border-transparent text-slate-800 sm:mr-2 dark:text-slate-300 px-1 sm:px-3">1</a>
                                            </li>
                                            <li class="flex-1 sm:flex-initial">
                                                <a data-tw-merge=""
                                                    class="transition duration-200 border items-center justify-center py-2 rounded-md cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed min-w-0 sm:min-w-[40px] shadow-none font-normal flex border-transparent text-slate-800 sm:mr-2 dark:text-slate-300 px-1 sm:px-3 !box dark:bg-darkmode-400">2</a>
                                            </li>
                                            <li class="flex-1 sm:flex-initial">
                                                <a data-tw-merge=""
                                                    class="transition duration-200 border items-center justify-center py-2 rounded-md cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed min-w-0 sm:min-w-[40px] shadow-none font-normal flex border-transparent text-slate-800 sm:mr-2 dark:text-slate-300 px-1 sm:px-3">3</a>
                                            </li>
                                            <li class="flex-1 sm:flex-initial">
                                                <a data-tw-merge=""
                                                    class="transition duration-200 border items-center justify-center py-2 rounded-md cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed min-w-0 sm:min-w-[40px] shadow-none font-normal flex border-transparent text-slate-800 sm:mr-2 dark:text-slate-300 px-1 sm:px-3">...</a>
                                            </li>
                                            <li class="flex-1 sm:flex-initial">
                                                <a data-tw-merge=""
                                                    class="transition duration-200 border items-center justify-center py-2 rounded-md cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed min-w-0 sm:min-w-[40px] shadow-none font-normal flex border-transparent text-slate-800 sm:mr-2 dark:text-slate-300 px-1 sm:px-3"><i
                                                        data-tw-merge="" data-lucide="chevron-right"
                                                        class="stroke-[1] h-4 w-4"></i></a>
                                            </li>
                                            <li class="flex-1 sm:flex-initial">
                                                <a data-tw-merge=""
                                                    class="transition duration-200 border items-center justify-center py-2 rounded-md cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed min-w-0 sm:min-w-[40px] shadow-none font-normal flex border-transparent text-slate-800 sm:mr-2 dark:text-slate-300 px-1 sm:px-3"><i
                                                        data-tw-merge="" data-lucide="chevrons-right"
                                                        class="stroke-[1] h-4 w-4"></i></a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <select data-tw-merge=""
                                        class="disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1 rounded-[0.5rem] sm:w-20">
                                        <option>10</option>
                                        <option>25</option>
                                        <option>35</option>
                                        <option>50</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>


    </div>

    <script>
        document.addEventListener('DOMContentLoaded', async function() {

            async function initializeContent() {
                await fetchLatestEmployees();
                // await ApexCharts();
            }

            // async function ApexCharts() {
            //     var options = {
            //         series: [44, 55, 41, 17, 15],
            //         chart: {
            //             type: 'donut',
            //         },
            //         responsive: [{
            //             breakpoint: 480,
            //             options: {
            //                 chart: {
            //                     width: 200
            //                 },
            //                 legend: {
            //                     position: 'bottom'
            //                 }
            //             }
            //         }]
            //     };

            //     var chart = new ApexCharts(document.querySelector("#chart"), options);
            //     chart.render();
            // }

            async function fetchLatestEmployees() {
                try {
                    const raw = JSON.stringify({
                        company_id: localStorage.getItem("company"),
                        page: 1,
                        limit: 10,
                        sort: "DESC",
                    });

                    const requestOptions = {
                        method: "POST",
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: raw,
                        redirect: "follow"
                    };

                    const url = `{{ $apiUrl }}/employee/all`;
                    const response = await fetch(url, requestOptions);

                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }

                    const employees = await response.json();
                    const employeeData = employees.data;

                    const employeeContainer = document.querySelector('.latestEmployee');
                    employeeContainer.innerHTML = '';

                    employeeData.forEach(employee => {
                        const employeeElement = document.createElement('div');
                        const employeeCompany = 'Duluin'; //employee.company_id ?? 'Duluin';
                        const employeeDepartment = employee.department_id ?? 'IT Development';
                        const employeeDateOfJoining = new Date(employee.date_of_joining) ?? 'N/A';

                        employeeElement.classList.add('flex', 'flex-col', 'sm:flex-row',
                            'justify-between',
                            'items-center', 'gap-10', 'pt-4');

                        employeeElement.innerHTML = `
                            <div class="w-full font-medium mt-1.5 text-l">
                            <a class="whitespace-nowrap font-medium" href="#">
                                ${employee.first_name} ${employee.last_name}
                            </a>
                            <div class="col-2">
                                <div class="flex items-center gap-2 justify-content-between">
                                <div class="mt-0.5 whitespace-nowrap text-xs text-slate-500">
                                    ${employeeCompany}
                                </div>
                                <div class="mt-0.5 whitespace-nowrap text-xs text-slate-500">
                                    |
                                </div>
                                <div class="mt-0.5 whitespace-nowrap text-xs text-slate-500">
                                    ${employeeDepartment}
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="w-full flex pl-12 py-4 text-blue ml-auto">
                            <div class="ml-auto">
                                ${employeeDateOfJoining.toLocaleDateString('id-ID')}
                            </div>
                            </div>
                        `;

                        employeeContainer.appendChild(employeeElement);
                    });
                } catch (error) {
                    console.error('Error fetching employees:', error);
                    const employeeContainer = document.querySelector('.latestEmployee');
                    employeeContainer.innerHTML =
                        `<div class="alert alert-danger d-flex align-items-center" role="alert"><svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg><div >No data available</div></div>`;
                }
            }


            await initializeContent();
        });
    </script>
@endsection
