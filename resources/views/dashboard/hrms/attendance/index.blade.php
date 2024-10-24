@extends('layouts.dashboard.app')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/{{ asset('dist') }}/tailwind.min.css" rel="stylesheet">
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
                <div class="grid  grid-cols-1 md:grid-cols-12 gap-x-6 gap-y-10">
                    <div class= "col-span-12 w-full">
                        <div class="mt-3.5 flex flex-col gap-8">
                            <div class="box box--stacked mt-3.5 p-5">
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
                                        <a class="flex items-center text-slate-500" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="printer" class="lucide lucide-printer h-3.5 w-3.5 stroke-[1.7]"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect width="12" height="8" x="6" y="14"></rect></svg>
                                            <div class="ml-1.5 whitespace-nowrap underline decoration-slate-300 decoration-dotted underline-offset-[3px]">
                                                Export to PDF
                                            </div>
                                        </a>
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
                                                <div class="text-slate-500">Total Attendance</div>
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
                                                <div class="text-slate-500">Total Present</div>
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
                                                <div class="text-slate-500">Total Absent</div>
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
                                    <div class="mx-5 my-5 h-px border-t border-dashed border-slate-300/70"></div>
                                    <div class="flex flex-col md:flex-row">
                                        <div class="flex flex-1 items-center justify-center border-dashed border-slate-300/70 py-3 last:border-0 md:border-r">
                                            <div class="group flex items-center justify-center w-10 h-10 border rounded-full mr-5 [&amp;.primary]:border-primary/10 [&amp;.primary]:bg-primary/10 [&amp;.success]:border-success/10 [&amp;.success]:bg-success/10 primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                                            </div>
                                            <div class="flex-start flex flex-col">
                                                <div class="text-slate-500">Total Late Entry</div>
                                                <div class="mt-1.5 flex items-center">
                                                    <div class="text-base font-medium" id="lateEntry">-</div>
                                                    <div class="-mr-1 ml-2 flex items-center text-xs text-success">
                                                        11%
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-up" class="lucide lucide-chevron-up stroke-[1] ml-px h-4 w-4"><path d="m18 15-6-6-6 6"></path></svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-1 items-center justify-center border-dashed border-slate-300/70 py-3 last:border-0 md:border-r">
                                            <div class="group flex items-center justify-center w-10 h-10 border rounded-full mr-5 [&amp;.primary]:border-primary/10 [&amp;.primary]:bg-primary/10 [&amp;.success]:border-success/10 [&amp;.success]:bg-success/10 primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
                                            </div>
                                            <div class="flex-start flex flex-col">
                                                <div class="text-slate-500">Total Early Exit</div>
                                                <div class="mt-1.5 flex items-center">
                                                    <div class="text-base font-medium" id="earlyExit">-</div>
                                                    <div class="-mr-1 ml-2 flex items-center text-xs text-success">
                                                        2%
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-up" class="lucide lucide-chevron-up stroke-[1] ml-px h-4 w-4"><path d="m18 15-6-6-6 6"></path></svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-1 items-center justify-center border-dashed border-slate-300/70 py-3 last:border-0 md:border-r">
                                            <div class="group flex items-center justify-center w-10 h-10 border rounded-full mr-5 [&amp;.primary]:border-primary/10 [&amp;.primary]:bg-primary/10 [&amp;.success]:border-success/10 [&amp;.success]:bg-success/10 success">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shuffle"><path d="M2 18h1.4c1.3 0 2.5-.6 3.3-1.7l6.1-8.6c.7-1.1 2-1.7 3.3-1.7H22"/><path d="m18 2 4 4-4 4"/><path d="M2 6h1.9c1.5 0 2.9.9 3.6 2.2"/><path d="M22 18h-5.9c-1.3 0-2.6-.7-3.3-1.8l-.5-.8"/><path d="m18 14 4 4-4 4"/></svg>
                                            </div>
                                            <div class="flex-start flex flex-col">
                                                <div class="text-slate-500">Total Employee Shift</div>
                                                <div class="mt-1.5 flex items-center">
                                                    <div class="text-base font-medium">10</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box box--stacked mt-3.5 p-5">
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
                                        <a class="flex items-center text-slate-500" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="printer" class="lucide lucide-printer h-3.5 w-3.5 stroke-[1.7]"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect width="12" height="8" x="6" y="14"></rect></svg>
                                            <div class="ml-1.5 whitespace-nowrap underline decoration-slate-300 decoration-dotted underline-offset-[3px]">
                                                Export to PDF
                                            </div>
                                        </a>
                                        <a class="flex items-center text-primary" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="external-link" class="lucide lucide-external-link h-3.5 w-3.5 stroke-[1.7]"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" x2="21" y1="14" y2="3"></line></svg>
                                            <div class="ml-1.5 whitespace-nowrap underline decoration-primary/30 decoration-dotted underline-offset-[3px]">
                                                Show full report
                                            </div>
                                        </a>
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
                            </div>
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
                        <div class="box p-4 mt-4">
                            <div class="text-m font-medium">
                                More Action
                            </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5 mt-4">
                                    <x-action  label="Attendance Summary" icon="arrow-up-right" url="{{ url('/dashboard/hrms/attendance/summary') }}" />
                                    <x-action  label="New Shift Assignment" icon="arrow-up-right" url="{{ route('hrms.shift-assignment') }}" />
                                    <x-action  label="Employee Shift List" icon="arrow-up-right" url="{{ url('/dashboard/hrms/attendance/shift_list') }}" />
                                    <x-action  label="Attendance Report" icon="arrow-up-right" url="{{ url('/dashboard/hrms/attendance/report') }}" />
                                    <x-action  label="Shift Type" icon="arrow-up-right" url="{{ url('/dashboard/hrms/attendance/shift_type') }}" />
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
<script src="{{ asset('dist') }}/js/components/report-donut-chart-5.js"></script>
<script src="{{ asset('dist') }}/js/components/base/litepicker.js"></script>
<script src="{{ asset('dist') }}/js/components/report-bar-chart-5.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
           countAttendanceThisMonth();
           countEmployee();
        });

        async function countAttendanceThisMonth() {
           var param = {
                url: "{{ $apiUrl }}",
                method: "GET",
           }

           await transAjax(param).then((result) => {
            console.log(result);
               $('#totalPresent').html(result.data.totalPresent)
               $('#totalAbsent').html(result.data.totalAbsent)
               $('#lateEntry').html(result.data.lateEntry)
               $('#earlyExit').html(result.data.earlyExit)
           }).catch((err) => {
                console.log(err);
           });
        }

        async function countEmployee() {
            var param = {
                url: "{{ $url_count_employee }}",
                method: "GET",
            }

            await transAjax(param).then((result) => {
            // console.log(result.data.employees_total);
               $('#totalEmployee').html(result.data.employees_total)
           }).catch((err) => {
                console.log(err);
           });
        }
    </script>
@endpush
