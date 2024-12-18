@extends('layouts.dashboard.app')
@section('content')

<style>.show{display:block;}</style>
<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')
        <div id="contents-page" class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
                <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                    <div class="col-span-12">
                        <div class="mt-3.5  gap-8">

                        <div class="mt-2 ml-2 text-lg font-medium group-[.mode--light]:text-white">
                            Claim Expense
                        </div>
                        <div class="mt-5 flex flex-col gap-8">
                            <div class="box box--stacked p-5">
                                <div class="flex flex-col gap-y-5 lg:flex-row lg:items-center">
                                    <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row sm:items-center">
                                        <div class="relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="calendar-check2" class="lucide lucide-calendar-check2 absolute inset-y-0 left-0 z-10 my-auto ml-3 h-4 w-4 stroke-[1.3]"><path d="M21 14V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h8"></path><line x1="16" x2="16" y1="2" y2="6"></line><line x1="8" x2="8" y1="2" y2="6"></line><line x1="3" x2="21" y1="10" y2="10"></line><path d="m16 20 2 2 4-4"></path></svg>
                                            <select onchange="filterExpense(this.value)" id="filterSelector" name="filter_date" class="disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1 pl-9 sm:w-44">
                                                
                                                <option value="daily">Today</option>
                                                <option value="weekly">Weekly</option>
                                                <option value="monthly">Monthly</option>
                                                <option value="yearly">Yearly</option>
                                                <option value="custom-date">Custom Date</option>
                                            </select>
                                        </div>
                                        <div class="relative" id="custom-date" hidden>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="calendar" class="lucide lucide-calendar absolute inset-y-0 left-0 z-10 my-auto ml-3 h-4 w-4 stroke-[1.3]"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect><line x1="16" x2="16" y1="2" y2="6"></line><line x1="8" x2="8" y1="2" y2="6"></line><line x1="3" x2="21" y1="10" y2="10"></line></svg>
                                            <input id="litepicker" type="text" class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 datepicker rounded-[0.3rem] pl-9 sm:w-64">
                                        </div>
                                        <span class="h-8 w-8" id="loading" style="display: none">
                                            <svg class="h-full w-full" width="25" viewBox="-2 -2 42 42" xmlns="http://www.w3.org/2000/svg" stroke="#64748b">
                                                <g fill="none" fill-rule="evenodd">
                                                    <g transform="translate(1 1)" stroke-width="4">
                                                        <circle stroke-opacity=".5" cx="18" cy="18" r="18"></circle>
                                                        <path d="M36 18c0-9.94-8.06-18-18-18">
                                                            <animateTransform type="rotate" attributeName="transform" from="0 18 18" to="360 18 18" dur="1s" repeatCount="indefinite"></animateTransform>
                                                        </path>
                                                    </g>
                                                </g>
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="mt-5">
                                        <div class="box--stacke">
                                            <div class="grid grid-cols-4 gap-5">
                                                <a id="totalExpenseLink" href="{{ url('dashboard/hrms/claim/expense') }}" class="block">
                                                    <div
                                                        class="box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                                        <div class="text-base text-slate-500">Total Expense</div>
                                                        <div class="mt-1.5 text-2xl font-medium" id="totalExpense">0</div>
                                                    </div>
                                                </a>
                                                <a id="totalDraftLink" href="{{ url('dashboard/hrms/claim/expense') }}?status=draft" class="block">
                                                    <div
                                                        class="box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                                        <div class="text-base text-pending">Total Draft</div>
                                                        <div class="mt-1.5 text-2xl font-medium" id="totalDraft">0</div>
                                                    </div>
                                                </a>
                                                <a id="totalSubmittedLink" href="{{ url('dashboard/hrms/claim/expense') }}?status=submitted" class="block">
                                                    <div
                                                        class="box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                                        <div class="text-base text-warning">Total Submitted</div>
                                                        <div class="font-mediumm mt-1.5 text-2xl" id="totalSubmitted">0</div>
                                                    </div>
                                                </a>
                                                <a id="totalApprovedLink" href="{{ url('dashboard/hrms/claim/expense') }}?status=approved" class="block">
                                                    <div
                                                        class="box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                                        <div class="text-base text-green-800">Total Approved</div>
                                                        <div class="font-mediumm mt-1.5 text-2xl" id="totalApproved">0</div>
                                                    </div>
                                                </a>
                                                <a id="totalPaidLink" href="{{ url('dashboard/hrms/claim/expense') }}?status=paid" class="block">
                                                    <div
                                                        class="box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                                        <div class="text-base text-success">Total Paid</div>
                                                        <div class="font-mediumm mt-1.5 text-2xl" id="totalPaid">0</div>
                                                    </div>
                                                </a>
                                                <a id="totalRejectedLink" href="{{ url('dashboard/hrms/claim/expense') }}?status=rejected" class="block">
                                                    <div
                                                        class="box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                                        <div class="text-base text-danger">Total Rejected</div>
                                                        <div class="font-mediumm mt-1.5 text-2xl" id="totalRejected">0</div>
                                                    </div>
                                                </a>
                                               
                                                <a id="totalClaimTypeActiveLink" href="{{ url('dashboard/hrms/claim/type') }}?is_active=1" class="block">
                                                    <div
                                                        class="box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                                        <div class="text-base text-blue-500">Total Claim Type Active</div>
                                                        <div class="font-mediumm mt-1.5 text-2xl" id="totalClaimTypeActive">0</div>
                                                    </div>
                                                </a>
                                                <a id="totalClaimTypeInactiveLink" href="{{ url('dashboard/hrms/claim/type') }}?is_active=0" class="block">
                                                    <div
                                                        class="box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 bg-warning bg-opacity-20 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                                        <div class="text-base text-pending">Total Claim Type Inactive</div>
                                                        <div class="font-mediumm mt-1.5 text-2xl" id="totalClaimTypeInctive">0</div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            {{-- <div class="box box--stacked p-5">
                                <div class="flex flex-col gap-y-5 lg:flex-row lg:items-center">
                                    <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row sm:items-center">
                                        <div class="relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="calendar" class="lucide lucide-calendar absolute inset-y-0 left-0 z-10 my-auto ml-3 h-4 w-4 stroke-[1.3]"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect><line x1="16" x2="16" y1="2" y2="6"></line><line x1="8" x2="8" y1="2" y2="6"></line><line x1="3" x2="21" y1="10" y2="10"></line></svg>
                                            <input id="litepicker-chart" name="filter_date_chart" type="text" class="disabled:bg-slate-100 litepicker-chart disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 datepicker rounded-[0.3rem] pl-9 sm:w-64">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-1 mt-7">
                                    <div class="mb-1 mt-7">
                                        <div class="w-auto h-[220px]">
                                            <canvas class="chart report-bar-chart-5"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 flex flex-wrap items-center justify-center gap-x-5 gap-y-3">
                                    <div class="flex items-center text-slate-500">
                                        <div class="mr-2 h-2 w-2 rounded-full border border-primary/60 bg-primary/60"></div>
                                        Total Present
                                    </div>
                                    <div class="flex items-center text-slate-500">
                                        <div class="mr-2 h-2 w-2 rounded-full border border-slate-500/60 bg-slate-500/60"></div>
                                        Total Absent
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="box box--stacked p-5">
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-5">
                                    <div
                                        class="box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                        <div class="text-base text-slate-500">Total Present</div>
                                        <div class="mt-1.5 text-2xl font-medium text-right" id="totalPresent">0</div>
                                        <div class="col-2">
                                            <div class="flex justify-end gap-2">
                                                <div
                                                    class="mt-2 flex rounded-full border border-danger/10 bg-danger/10 py-[2px] pl-[7px] pr-8 text-xs font-medium text-danger">
                                                    <i data-tw-merge="" data-lucide="arrow-down"
                                                        class="ml-px mr-2 h-4 w-4 stroke-[1.5] side-menu__link_icon"></i>
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
                                        <div class="text-base text-slate-500">Total Absent</div>
                                        <div class="mt-1.5 text-2xl font-medium text-right" id="totalAbsent">0</div>
                                        <div class="col-2">
                                            <div class="flex justify-end gap-2">
                                                <div
                                                    class="mt-2 flex rounded-full border border-danger/10 bg-danger/10 py-[2px] pl-[7px] pr-8 text-xs font-medium text-danger">
                                                    <i data-tw-merge="" data-lucide="arrow-down"
                                                        class="ml-px mr-2 h-4 w-4 stroke-[1.5] side-menu__link_icon"></i>
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
                                        <div class="text-base text-slate-500">Late Entry</div>
                                        <div class="font-mediumm mt-1.5 text-2xl text-right" id="lateEntry">0</div>
                                        <div class="col-2">
                                            <div class="flex justify-end gap-2">
                                                <div
                                                    class="mt-2 flex rounded-full border border-danger/10 bg-danger/10 py-[2px] pl-[7px] pr-8 text-xs font-medium text-danger">
                                                    <i data-tw-merge="" data-lucide="arrow-down"
                                                        class="ml-px mr-2 h-4 w-4 stroke-[1.5] side-menu__link_icon"></i>
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
                                        <div class="text-base text-slate-500">Early Exit</div>
                                        <div class="font-mediumm mt-1.5 text-2xl text-right" id="earlyExit">0</div>
                                        <div class="col-2">
                                            <div class="flex justify-end gap-2">
                                                <div
                                                    class="mt-2 flex rounded-full border border-danger/10 bg-danger/10 py-[2px] pl-[7px] pr-8 text-xs font-medium text-danger">
                                                    <i data-tw-merge="" data-lucide="arrow-down"
                                                        class="ml-px mr-2 h-4 w-4 stroke-[1.5] side-menu__link_icon"></i>
                                                    3%
                                                </div>
                                                <div class="pt-3 whitespace-nowrap text-xs text-slate-500">
                                                    this month
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                                {{-- <div class="box col-span-2  rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm ">
                                    <x-chart.stackbar label="Attendance Overview" option1="This Month" />
                                </div> --}}
                                {{-- <div class="grid grid-rows-2 gap-4 col col-span-1">
                                    <div
                                        class=" box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                        <div class="flex items-center justify-between">
                                            <div class="text-xl font-medium text-gray-500">
                                                Total Employee
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
                                        <div class="flex items-center gap-2 mt-4">
                                            <div class="text-3xl font-semibold text-gray-800" id="totalEmployee">
                                                0
                                            </div>
                                        </div>
                                        <div class="flex justify-between mt-4">
                                            <div class="flex items-center">
                                                <div class="w-2 h-2 bg-red-500 mr-2"></div>
                                                <span class="text-sm text-gray-500">No Overtime</span>
                                            </div>
                                            <div class="flex items-center">
                                                <div class="w-2 h-2 bg-blue-500 mr-2"></div>
                                                <span class="text-sm text-gray-500">Overtime</span>
                                            </div>
                                        </div>
                                        <div class="mt-4 flex justify-between text-sm">
                                            <div class="">
                                                <span class="block text-xl text-black">100%</span>
                                                <span class="block text-slate-500">17 employee</span>
                                            </div>
                                            <div class="text-slate-500">
                                                vs
                                            </div>
                                            <div class="text-black">
                                                <span class="block text-xl text-right text-black">0%</span>
                                                <span class="block text-slate-500">0 employee</span>
                                            </div>
                                        </div>
                                        <div class="mt-4 h-2 w-full bg-blue-600 rounded-full overflow-hidden">
                                            <div class="h-full bg-red-500" style="width: 60%"></div>
                                            <div class="h-full" style="width: 40%"></div>
                                        </div>
                                    </div>
                                    <div
                                        class=" box col-span-4 h-fit rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                        <div class="flex col-2">
                                            <div class="g-col-6 font-medium mt-1.5 text-xl">
                                                Latest Overtime Application
                                            </div>
                                        </div>
                                        <div class=" w-full font-medium mt-1.5 text-l">
                                            <a class="whitespace-nowrap font-medium" href="#">
                                                Meryl Streep
                                            </a>
                                            <div class="col-2">
                                                <div class="flex items-center gap-2 justify-content-between">
                                                    <div class="mt-0.5 whitespace-nowrap text-xs text-slate-500">
                                                        Duluin
                                                    </div>
                                                    <div class="mt-0.5 whitespace-nowrap text-xs text-slate-500">
                                                        |
                                                    </div>
                                                    <div class="mt-0.5 whitespace-nowrap text-xs text-slate-500">
                                                        Business & Finance
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="flex items-center gap-2 justify-content-between">
                                                    <div
                                                        class="flex col-2 mt-0.5 whitespace-nowrap text-xs text-slate-500 ">
                                                        <i data-tw-merge="" data-lucide="calendar"
                                                            class="ml-px mr-2 h-4 w-4 stroke-[1.5] side-menu__link_icon"></i>
                                                        22/12/2024
                                                    </div>
                                                    <div
                                                        class="flex col-2 mt-0.5 whitespace-nowrap text-xs text-slate-500 ">
                                                        <i data-tw-merge="" data-lucide="timer"
                                                            class="ml-px mr-2 h-4 w-4 stroke-[1.5] side-menu__link_icon"></i>
                                                        3 jam
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-blue-500">
                                                Approval Ihsanudin Pradana Putra
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>

                                {{--<div class="box my-6 p-5">
                                    <div class="text-lg mb-2">Total Claim Distribution</div>
                                    <div class="flex flex-col gap-y-5 lg:flex-row lg:items-center">
                                        <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row sm:items-center">
                                            <div class="relative">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="calendar-check2" class="lucide lucide-calendar-check2 absolute inset-y-0 left-0 z-10 my-auto ml-3 h-4 w-4 stroke-[1.3]"><path d="M21 14V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h8"></path><line x1="16" x2="16" y1="2" y2="6"></line><line x1="8" x2="8" y1="2" y2="6"></line><line x1="3" x2="21" y1="10" y2="10"></line><path d="m16 20 2 2 4-4"></path></svg>
                                                <select class="disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1 pl-9 sm:w-44">
                                                    <option value="custom-date">Custom Date</option>
                                                    <option value="daily">Daily</option>
                                                    <option value="weekly">Weekly</option>
                                                    <option value="monthly">Monthly</option>
                                                    <option value="yearly">Yearly</option>
                                                </select>
                                            </div>
                                            <div class="relative">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="calendar" class="lucide lucide-calendar absolute inset-y-0 left-0 z-10 my-auto ml-3 h-4 w-4 stroke-[1.3]"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect><line x1="16" x2="16" y1="2" y2="6"></line><line x1="8" x2="8" y1="2" y2="6"></line><line x1="3" x2="21" y1="10" y2="10"></line></svg>
                                                <input type="text" class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 datepicker rounded-[0.3rem] pl-9 sm:w-64">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-1 mt-7">
                                        <div class="mb-1 mt-7">
                                            <div class="w-auto h-[220px]">
                                                <canvas class="chart report-line-chart-1"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-5 flex flex-wrap items-center justify-center gap-x-5 gap-y-3">
                                        <div class="flex items-center text-slate-500">
                                            <div class="mr-2 h-2 w-2 rounded-full border border-primary/60 bg-primary/60"></div>
                                            Total Expense Claim
                                        </div>
                                    </div>
                                </div>--}}

                        </div>
                    </div>
                </div>
                <div class="box p-4">
                    <div class="text-m font-medium">
                        More Action
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-3 gap-5 mt-4">
                        <x-action  label="Employee Expense" icon="arrow-up-right" url="{{ url('/dashboard/hrms/claim/expense') }}" />
                        {{--<x-action  label="Employee Advance" icon="arrow-up-right" url="{{ url('/dashboard/hrms/claim/advance') }}" />--}}

                        <x-action  label="Expense Claim Type" icon="arrow-up-right" url="{{ url('/dashboard/hrms/claim/type') }}" />
                        <!-- <x-action  label="Expense Claim Summary" icon="arrow-up-right" url="{{ url('/dashboard/hrms/claim/summary') }}" /> -->

                        {{--<x-action  label="Travel Request" icon="arrow-up-right" status="comming_soon" url="{{ url('/dashboard/hrms/claim/travel') }}" />
                        <x-action  label="Purpose of Travel" icon="arrow-up-right" status="comming_soon" url="{{ url('/dashboard/hrms/claim/purpose_travel') }}" />--}}
                    </div>
                </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script src="{{ asset('dist') }}/js/vendors/litepicker.js"></script>
<script src="{{ asset('dist') }}/js/vendors/lodash.js"></script>
<script src="{{ asset('dist') }}/js/vendors/chartjs.js"></script>
<script src="{{ asset('dist') }}/js/components/report-donut-chart-4.js"></script>
<script src="{{ asset('dist') }}/js/components/base/litepicker.js"></script>
<script src="{{ asset('dist') }}/js/components/report-line-chart-1.js"></script>

    <script type="text/javascript">
        // $(document).ready(function() {
        //    countExpenseThisMonth();
        //    countEmployee();
        // });

        var filterData = {};
        $(document).ready(function() {
            // countExpenseThisMonth();
            countExpense('daily');
            countEmployee();
           //getDataChart();
        });

        //user bisa menampilkan data berdasarkan range tanggal yang dipilih
        $(".litepicker").on("click", ".button-apply", function() {
            $("#loading").removeAttr('style', 'display: none');
           countExpense($('#litepicker').val());
        });

        //filter attendane, weekly, mothly atau yearly
        function filterExpense(value) {
            $("#loading").removeAttr('style', 'display: none');
           countExpense(value);
        }

        //fungsi untuk menghitung total expense
        async function countExpense(value = "") {
            let date;

            const currentDate = new Date();
            const lastWeekDate = new Date();
            const formattedToday = currentDate.toISOString().split("T")[0];

            //filter data berdasarkan tanggal yang dipilih
            switch (value) {
                case "daily":
                    filterData = "daily=daily";
                    const today = new Date().toISOString().split("T")[0];
                    date = `${today}+-+${today}`;
                    break;
                case "weekly":
                    filterData = "weekly=weekly";
                    lastWeekDate.setDate(currentDate.getDate() - 7);
                    const formattedLastWeek = lastWeekDate.toISOString().split("T")[0];            
                    date = `${formattedLastWeek}+-+${formattedToday}`;
                    break;
                case "monthly":
                    filterData = "monthly=monthly";
                    const firstDayOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
                    date = `${firstDayOfMonth.toISOString().split("T")[0]}+-+${formattedToday}`;
                    break;
                case "yearly":
                    filterData = "yearly=yearly";
                    const firstDayOfYear = new Date(currentDate.getFullYear(), 0, 1); 
                    date = `${firstDayOfYear.toISOString().split("T")[0]}+-+${formattedToday}`;
                    break;
                default:
                $('#custom-date').attr('hidden', false);
                filterData = "custom_date="+value;
            }

            const baseUrl = "{{ url('dashboard/hrms/claim/expense') }}";
            const claimTypeUrl = "{{ url('dashboard/hrms/claim/type') }}";

            if (value.includes(" - ")) {
                const [startDate, endDate] = value.split(" - ");
                date = `${startDate}+-+${endDate}`;
            }

            //mengubah link sesuai dengan select onchange
            links = {
                totalExpenseLink : `${baseUrl}${date ? '?filter_date=' + date : ''}`,
                totalDraftLink : `${baseUrl}?status=draft${date ? '&filter_date=' + date : ''}`,
                totalSubmittedLink : `${baseUrl}?status=submitted${date ? '&filter_date=' + date : ''}`,
                totalApprovedLink : `${baseUrl}?status=approved${date ? '&filter_date=' + date : ''}`,
                totalPaidLink : `${baseUrl}?status=paid${date ? '&filter_date=' + date : ''}`,
                totalRejectedLink : `${baseUrl}?status=rejected${date ? '&filter_date=' + date : ''}`,
                totalClaimTypeActiveLink : `${claimTypeUrl}?is_active=1${date ? '&filter_date=' + date : ''}`,
                totalClaimTypeInactiveLink : `${claimTypeUrl}?is_active=0${date ? '&filter_date=' + date : ''}`,
            }

            for (const [id, url] of Object.entries(links)) {
                document.getElementById(id).setAttribute("href", url);
            }
             
            //kirim permintaan data ke server dengan membawa param
           var param = {
                url: "{{ $url_count_expense }}",
                method: "GET",
                data: filterData,
           }

           await transAjax(param).then((result) => {
               $('#totalExpense').html(result.data.totalExpense)
               $('#totalDraft').html(result.data.totalDraft);
               $('#totalSubmitted').html(result.data.totalSubmitted);
               $('#totalApproved').html(result.data.totalApproved);
               $('#totalPaid').html(result.data.totalPaid);
               $('#totalRejected').html(result.data.totalRejected);
               $('#totalClaimTypeActive').html(result.data.totalClaimTypeActive);
               $('#totalClaimTypeInctive').html(result.data.totalClaimTypeInctive);
               $("#loading").attr('style', 'display: none');
           }).catch((err) => {
                showErrorNotification("Internal server error", err.message);
           });
        }

        async function countEmployee() {
            var param = {
                url: "{{ $url_count_expense }}",
                method: "GET",
            }

            await transAjax(param).then((result) => {
            // console.log(result.data.employees_total);
               $('#totalEmployee').html(result.data.employees_total)
           }).catch((err) => {
                console.log(err);
           });
        }

        //sementara
        async function transAjaxx(data) {
            html = null;
            data.headers = {
                'Authorization': `Bearer xN9P6a8sL2bV3iR4fC5J6Q7kT8yU9wZ0`,
                'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`,
                'Content-Type': 'application/json',
            }
            await $.ajax(data).done(function(res) {
                    html = res;
                })
                .fail(function() {
                    return false;
                })
            return html
        }

        //ambil data chart expense dari server
        async function getDataChart()
        {
            var param = {
                url: "{{ $url_count_expense }}",
                //url: " http://localhost:4446/api/v1/attendance/report/chart?company_id=c8f745e0-aa6e-458b-bb70-4dda3e2accea",
                method: "GET",
            }

            await transAjax(param).then((result) => {
                const chart = result.data;
                console.log(chart);

                //chart
                let e = $(".report-bar-chart-5");
                e.length &&
                    e.each(function () {
                        let a = $(this)[0].getContext("2d"),
                            r = new Chart(a, {
                                type: "bar",
                                data: chart,
                                options: {
                                    maintainAspectRatio: !1,
                                    plugins: { legend: { display: !1 } },
                                    scales: {
                                        x: {
                                            ticks: {
                                                color: getColor("slate.500", 0.7),
                                            },
                                            grid: { display: !1 },
                                            border: { display: !1 },
                                        },
                                        y: {
                                            ticks: {
                                                autoSkipPadding: 15,
                                                color: getColor("slate.500", 0.9),
                                                beginAtZero: !0,
                                            },
                                            grid: { color: getColor("slate.200", 0.7) },
                                            border: { display: !1 },
                                        },
                                    },
                                },
                            });
                    });
                
            }).catch((error) => {
                console.log(error);
            });

            //user bisa menampilkan data berdasarkan range tanggal yang dipilih
            // $(".litepicker").on("click", ".button-apply", function() {
            //     $("#loading").removeAttr('style', 'display: none');
            // });
        }

    </script>
@endpush
