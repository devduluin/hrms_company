@extends('layouts.dashboard.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<style>.show{display:block;}</style>
<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')
        <div id="contents-page" class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
                <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                    <div class="col-span-12">
                        <div class="mt-3.5  gap-8">
                            <div class="box  mt-3.5 p-5">
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
                                    <div class="flex items-center gap-3.5 lg:ml-auto">
                                        <a class="flex items-center text-primary" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="external-link" class="lucide lucide-external-link h-3.5 w-3.5 stroke-[1.7]"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" x2="21" y1="14" y2="3"></line></svg>
                                            <div class="ml-1.5 whitespace-nowrap underline decoration-primary/30 decoration-dotted underline-offset-[3px]">
                                                Show full report
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="mt-5 rounded-md border border-dashed border-slate-300/70 py-5">
                                    <div class="flex flex-col md:flex-row">
                                        <div class="flex flex-1 items-center justify-center border-dashed border-slate-300/70 py-3 last:border-0 md:border-r">
                                            <div class="group flex items-center justify-center w-10 h-10 border rounded-full mr-5 [&amp;.primary]:border-primary/10 [&amp;.primary]:bg-primary/10 [&amp;.success]:border-success/10 [&amp;.success]:bg-success/10 success">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-table-of-contents"><path d="M16 12H3"/><path d="M16 18H3"/><path d="M16 6H3"/><path d="M21 12h.01"/><path d="M21 18h.01"/><path d="M21 6h.01"/></svg>
                                            </div>
                                            <div class="flex-start flex flex-col">
                                                <div class="text-slate-500">Expense Claim</div>
                                                <div class="mt-1.5 flex items-center">
                                                    <div class="text-base font-medium">2</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-1 items-center justify-center border-dashed border-slate-300/70 py-3 last:border-0 md:border-r">
                                            <div class="group flex items-center justify-center w-10 h-10 border rounded-full mr-5 [&amp;.primary]:border-primary/10 [&amp;.primary]:bg-primary/10 [&amp;.success]:border-success/10 [&amp;.success]:bg-success/10 primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-round-check"><path d="M2 21a8 8 0 0 1 13.292-6"/><circle cx="10" cy="8" r="5"/><path d="m16 19 2 2 4-4"/></svg>
                                            </div>
                                            <div class="flex-start flex flex-col">
                                                <div class="text-slate-500">Approve Claim</div>
                                                <div class="mt-1.5 flex items-center">
                                                    <div class="text-base font-medium" id="totalPresent">-</div>
                                                    <div class="-mr-1 ml-2 flex items-center text-xs text-success">
                                                        2%
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-up" class="lucide lucide-chevron-up stroke-[1] ml-px h-4 w-4"><path d="m18 15-6-6-6 6"></path></svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-1 items-center justify-center border-dashed border-slate-300/70 py-3 last:border-0 md:border-r">
                                            <div class="group flex items-center justify-center w-10 h-10 border rounded-full mr-5 [&amp;.primary]:border-primary/10 [&amp;.primary]:bg-primary/10 [&amp;.success]:border-success/10 [&amp;.success]:bg-success/10 success">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-round-x"><path d="M2 21a8 8 0 0 1 11.873-7"/><circle cx="10" cy="8" r="5"/><path d="m17 17 5 5"/><path d="m22 17-5 5"/></svg>
                                            </div>
                                            <div class="flex-start flex flex-col">
                                                <div class="text-slate-500">Reject Claim</div>
                                                <div class="mt-1.5 flex items-center">
                                                    <div class="text-base font-medium" id="totalAbsent">-</div>
                                                    <div class="-mr-1 ml-2 flex items-center text-xs text-danger">
                                                        4%
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-down" class="lucide lucide-chevron-down stroke-[1] ml-px h-4 w-4"><path d="m6 9 6 6 6-6"></path></svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div class="box  my-6 p-5">
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
                                                <canvas class="chart report-donut-chart-4"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-5 flex flex-wrap items-center justify-center gap-x-5 gap-y-3">
                                        <div class="flex items-center text-slate-500">
                                            <div class="mr-2 h-2 w-2 rounded-full border border-primary/60 bg-primary/60"></div>
                                            Claim Perjalanan Dinas
                                        </div>
                                        <div class="flex items-center text-slate-500">
                                            <div class="mr-2 h-2 w-2 rounded-full border border-primary/60 bg-primary/60"></div>
                                            Claim Beli ATK
                                        </div>
                                    </div>
                                </div>
                                <div class="box my-6 p-5">
                                    <div class="text-lg ">Total Claim</div>
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
                                            Total Payroll
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box p-4">
                    <div class="text-m font-medium">
                        More Action
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5 mt-4">
                        <x-action  label="Expense Claim Summary" icon="arrow-up-right" url="{{ url('/dashboard/hrms/claim/summary') }}" />
                        <x-action  label="Employee Travel List" icon="arrow-up-right" url="{{ url('/dashboard/hrms/claim/travel_list') }}" />
                        <x-action  label="Add Travel Request" icon="arrow-up-right" url="{{ url('/dashboard/hrms/claim/travel_request') }}" />
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