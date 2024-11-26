@extends('layouts.dashboard.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<style>.show{display:block;}</style>
<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')
        <div id="contents-page"
            class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
                <div class="grid  grid-cols-1 md:grid-cols-12 gap-x-6 gap-y-10">
                    <div class= "col-span-12 w-full">
                        <div class="mt-5 ml-2 text-lg font-medium group-[.mode--light]:text-white">
                            Employee Leaves
                        </div>
                        <div class="mt-5 flex flex-col gap-8">
                            <div class="box box--stacked p-5">
                                <div class="flex flex-col gap-y-5 lg:flex-row lg:items-center">
                                    <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row sm:items-center">
                                        <div class="relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="calendar-check2" class="lucide lucide-calendar-check2 absolute inset-y-0 left-0 z-10 my-auto ml-3 h-4 w-4 stroke-[1.3]"><path d="M21 14V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h8"></path><line x1="16" x2="16" y1="2" y2="6"></line><line x1="8" x2="8" y1="2" y2="6"></line><line x1="3" x2="21" y1="10" y2="10"></line><path d="m16 20 2 2 4-4"></path></svg>
                                            <select onchange="filterAttendance(this.value)" name="filter_date" class="disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1 pl-9 sm:w-44">
                                                
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
                                                <div
                                                    class="box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                                    <div class="text-base text-slate-500">Total Attendance</div>
                                                    <div class="mt-1.5 text-2xl font-medium" id="totalAttendance">0</div>
                                                </div>
                                                <div
                                                    class="box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                                    <div class="text-base text-slate-500">Total Present</div>
                                                    <div class="mt-1.5 text-2xl font-medium" id="totalPresent">0</div>
                                                </div>
                                                <div
                                                    class="box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                                    <div class="text-base text-slate-500">Total Absent</div>
                                                    <div class="font-mediumm mt-1.5 text-2xl" id="totalAbsent">0</div>
                                                </div>
                                                <div
                                                    class="box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                                    <div class="text-base text-slate-500">Late Entry</div>
                                                    <div class="font-mediumm mt-1.5 text-2xl" id="lateEntry">0</div>
                                                </div>
                                                <div
                                                    class="box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                                    <div class="text-base text-slate-500">Early Exit</div>
                                                    <div class="font-mediumm mt-1.5 text-2xl" id="earlyExit">0</div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                                
                            </div>
                        </div>
                        <div class="mt-5 ml-2 text-lg font-medium group-[.mode--light]:text-white">
                            More Action
                            </div>
                        <div class="box p-4 mt-5">
                         
                                <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-3 gap-5 mt-4">
                                    <x-action  label="Holiday List" icon="arrow-up-right" url="{{ url('/dashboard/hrms/leave/holiday_list') }}" />
                                    
                                    <x-action  label="Leave Type" icon="arrow-up-right" url="{{ route('hrms.leave-type') }}" />
                                    <x-action  label="Leave Application" icon="arrow-up-right" url="{{ url('/dashboard/hrms/leave/application') }}" />
                                    <x-action  label="Leave Allocation" status="comming_soon" icon="arrow-up-right" url="{{ url('/dashboard/hrms/leave/allocation') }}" />
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
        $(document).ready(function() {
           countAttendanceThisMonth();
           countEmployee();
        });

    </script>
@endpush