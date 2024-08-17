@extends('layouts.dashboard.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/tom-select.css') }}">

    <div
        class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')
        <div id="contents-page"
            class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
            <div class="container">
                <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                    <div class="col-span-12">
                        <div class="flex flex-col mb-4 gap-y-3 md:h-10 md:flex-row md:items-center">
                            <div class="text-base font-medium group-[.mode--light]:text-white">
                                {{ $data['page_title'] }}
                            </div>
                            <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                                <button onclick="history.go(-1)"
                                    class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md w-24"><i
                                        data-tw-merge="" data-lucide="arrow-left" class="mr-3 h-4 w-4 stroke-[1.3]"></i>
                                    Back</button>
                            </div>
                        </div>
                        <div class="mt-1.5 flex flex-col">
                            <ul data-tw-merge role="tablist"
                                class="p-0.5 border bg-slate-50/70 border-slate-200/70 rounded-lg dark:border-darkmode-400 w-full flex">
                                <li id="example-5-tab" data-tw-merge role="presentation"
                                    class="focus-visible:outline-none flex-1">
                                    <button type="button" data-tw-merge data-tw-target="#example-5" role="tab"
                                        class="cursor-pointer block appearance-none px-3 py-2 border border-transparent text-slate-600 transition-colors dark:text-slate-400 [&.active]:text-slate-700 [&.active]:dark:text-white rounded-md py-1.5 dark:border-transparent [&.active]:text-slate-700 [&.active]:border [&.active]:shadow-sm [&.active]:font-medium [&.active]:border-slate-200 [&.active]:bg-white [&.active]:dark:text-slate-300 [&.active]:dark:bg-darkmode-400 [&.active]:dark:border-darkmode-400 active w-full py-2">
                                        <i data-tw-merge="" data-lucide="briefcase"
                                            class="inline-block h-5 w-5 mr-2 stroke-[1] "></i>
                                        Overview
                                    </button>
                                </li>
                                <li id="example-6-tab" data-tw-merge role="presentation"
                                    class="focus-visible:outline-none flex-1">
                                    <button type="button" data-tw-merge data-tw-target="#example-6" role="tab"
                                        class="cursor-pointer block appearance-none px-3 py-2 border border-transparent text-slate-600 transition-colors dark:text-slate-400 [&.active]:text-slate-700 [&.active]:dark:text-white rounded-md py-1.5 dark:border-transparent [&.active]:text-slate-700 [&.active]:border [&.active]:shadow-sm [&.active]:font-medium [&.active]:border-slate-200 [&.active]:bg-white [&.active]:dark:text-slate-300 [&.active]:dark:bg-darkmode-400 [&.active]:dark:border-darkmode-400 w-full py-2">
                                        <i data-tw-merge="" data-lucide="user"
                                            class="inline-block h-5 w-5 mr-2 stroke-[1] "></i>
                                        Joining
                                    </button>
                                </li>
                                <li id="example-6-tab" data-tw-merge role="presentation"
                                    class="focus-visible:outline-none flex-1">
                                    <button type="button" data-tw-merge data-tw-target="#example-7" role="tab"
                                        class="cursor-pointer block appearance-none px-3 py-2 border border-transparent text-slate-600 transition-colors dark:text-slate-400 [&.active]:text-slate-700 [&.active]:dark:text-white rounded-md py-1.5 dark:border-transparent [&.active]:text-slate-700 [&.active]:border [&.active]:shadow-sm [&.active]:font-medium [&.active]:border-slate-200 [&.active]:bg-white [&.active]:dark:text-slate-300 [&.active]:dark:bg-darkmode-400 [&.active]:dark:border-darkmode-400 w-full py-2">
                                        <i data-tw-merge="" data-lucide="file"
                                            class="inline-block h-5 w-5 mr-2 stroke-[1] "></i>
                                        Address
                                    </button>
                                </li>
                                <li id="example-6-tab" data-tw-merge role="presentation"
                                    class="focus-visible:outline-none flex-1">
                                    <button type="button" data-tw-merge data-tw-target="#example-6" role="tab"
                                        class="cursor-pointer block appearance-none px-3 py-2 border border-transparent text-slate-600 transition-colors dark:text-slate-400 [&.active]:text-slate-700 [&.active]:dark:text-white rounded-md py-1.5 dark:border-transparent [&.active]:text-slate-700 [&.active]:border [&.active]:shadow-sm [&.active]:font-medium [&.active]:border-slate-200 [&.active]:bg-white [&.active]:dark:text-slate-300 [&.active]:dark:bg-darkmode-400 [&.active]:dark:border-darkmode-400 w-full py-2">
                                        <i data-tw-merge="" data-lucide="contact"
                                            class="inline-block h-5 w-5 mr-2 stroke-[1] "></i>
                                        Attendance
                                    </button>
                                </li>
                                <li id="example-7-tab" data-tw-merge role="presentation"
                                    class="focus-visible:outline-none flex-1">
                                    <button type="button" data-tw-merge data-tw-target="#example-7" role="tab"
                                        class="cursor-pointer block appearance-none px-3 py-2 border border-transparent text-slate-600 transition-colors dark:text-slate-400 [&.active]:text-slate-700 [&.active]:dark:text-white rounded-md py-1.5 dark:border-transparent [&.active]:text-slate-700 [&.active]:border [&.active]:shadow-sm [&.active]:font-medium [&.active]:border-slate-200 [&.active]:bg-white [&.active]:dark:text-slate-300 [&.active]:dark:bg-darkmode-400 [&.active]:dark:border-darkmode-400 w-full py-2">
                                        <i data-tw-merge="" data-lucide="contact"
                                            class="inline-block h-5 w-5 mr-2 stroke-[1] "></i>
                                        Salary
                                    </button>
                                </li>
                                <li id="example-8-tab" data-tw-merge role="presentation"
                                    class="focus-visible:outline-none flex-1">
                                    <button type="button" data-tw-merge data-tw-target="#example-8" role="tab"
                                        class="cursor-pointer block appearance-none px-3 py-2 border border-transparent text-slate-600 transition-colors dark:text-slate-400 [&.active]:text-slate-700 [&.active]:dark:text-white rounded-md py-1.5 dark:border-transparent [&.active]:text-slate-700 [&.active]:border [&.active]:shadow-sm [&.active]:font-medium [&.active]:border-slate-200 [&.active]:bg-white [&.active]:dark:text-slate-300 [&.active]:dark:bg-darkmode-400 [&.active]:dark:border-darkmode-400 w-full py-2">
                                        <i data-tw-merge="" data-lucide="contact"
                                            class="inline-block h-5 w-5 mr-2 stroke-[1] "></i>
                                        Personal
                                    </button>
                                </li>
                                <li id="example-9-tab" data-tw-merge role="presentation"
                                    class="focus-visible:outline-none flex-1">
                                    <button type="button" data-tw-merge data-tw-target="#example-9" role="tab"
                                        class="cursor-pointer block appearance-none px-3 py-2 border border-transparent text-slate-600 transition-colors dark:text-slate-400 [&.active]:text-slate-700 [&.active]:dark:text-white rounded-md py-1.5 dark:border-transparent [&.active]:text-slate-700 [&.active]:border [&.active]:shadow-sm [&.active]:font-medium [&.active]:border-slate-200 [&.active]:bg-white [&.active]:dark:text-slate-300 [&.active]:dark:bg-darkmode-400 [&.active]:dark:border-darkmode-400 w-full py-2">
                                        <i data-tw-merge="" data-lucide="contact"
                                            class="inline-block h-5 w-5 mr-2 stroke-[1] "></i>
                                        Profile
                                    </button>
                                </li>
                                <li id="example-10-tab" data-tw-merge role="presentation"
                                    class="focus-visible:outline-none flex-1">
                                    <button type="button" data-tw-merge data-tw-target="#example-10" role="tab"
                                        class="cursor-pointer block appearance-none px-3 py-2 border border-transparent text-slate-600 transition-colors dark:text-slate-400 [&.active]:text-slate-700 [&.active]:dark:text-white rounded-md py-1.5 dark:border-transparent [&.active]:text-slate-700 [&.active]:border [&.active]:shadow-sm [&.active]:font-medium [&.active]:border-slate-200 [&.active]:bg-white [&.active]:dark:text-slate-300 [&.active]:dark:bg-darkmode-400 [&.active]:dark:border-darkmode-400 w-full py-2">
                                        <i data-tw-merge="" data-lucide="contact"
                                            class="inline-block h-5 w-5 mr-2 stroke-[1] "></i>
                                        Exit
                                    </button>
                                </li>
                            </ul>
                            <div class="box box--stacked flex flex-col p-5">
                                <div class="tab-content mt-5">
                                    <div data-transition data-selector=".active"
                                        data-enter="transition-[visibility,opacity] ease-linear duration-150"
                                        data-enter-from="!p-0 !h-0 overflow-hidden invisible opacity-0"
                                        data-enter-to="visible opacity-100"
                                        data-leave="transition-[visibility,opacity] ease-linear duration-150"
                                        data-leave-from="visible opacity-100"
                                        data-leave-to="!p-0 !h-0 overflow-hidden invisible opacity-0" id="example-5"
                                        role="tabpanel" aria-labelledby="example-5-tab"
                                        class="tab-pane active leading-relaxed">
                                        @include('dashboard.hrms.employees.elm_employee_overview')
                                    </div>
                                    <div data-transition data-selector=".active"
                                        data-enter="transition-[visibility,opacity] ease-linear duration-150"
                                        data-enter-from="!p-0 !h-0 overflow-hidden invisible opacity-0"
                                        data-enter-to="visible opacity-100"
                                        data-leave="transition-[visibility,opacity] ease-linear duration-150"
                                        data-leave-from="visible opacity-100"
                                        data-leave-to="!p-0 !h-0 overflow-hidden invisible opacity-0" id="example-6"
                                        role="tabpanel" aria-labelledby="example-6-tab" class="tab-pane leading-relaxed">
                                        @include('dashboard.hrms.employees.elm_employee_joining')
                                    </div>
                                    <div data-transition data-selector=".active"
                                        data-enter="transition-[visibility,opacity] ease-linear duration-150"
                                        data-enter-from="!p-0 !h-0 overflow-hidden invisible opacity-0"
                                        data-enter-to="visible opacity-100"
                                        data-leave="transition-[visibility,opacity] ease-linear duration-150"
                                        data-leave-from="visible opacity-100"
                                        data-leave-to="!p-0 !h-0 overflow-hidden invisible opacity-0" id="example-7"
                                        role="tabpanel" aria-labelledby="example-7-tab" class="tab-pane leading-relaxed">
                                        @include('dashboard.hrms.employees.elm_employee_address_contact')
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <script src="{{ asset('dist/js/vendors/tab.js') }}"></script>
    @endsection
