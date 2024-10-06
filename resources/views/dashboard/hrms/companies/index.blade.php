@extends('layouts.dashboard.app')
@section('content')
    <div
        class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')


        <div id="contents-page"
            class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
            <div class="container">
                <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                    <div class="col-span-12">
                        <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                            <div class="text-base font-medium group-[.mode--light]:text-white">
                                {{ $title }}
                            </div>
                            <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                                <a href="{{ route('hrms.company.create') }}"
                                    class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" data-lucide="plus"
                                        class="lucide lucide-plus stroke-[1] w-5 h-5 mx-auto block">
                                        <path d="M5 12h14"></path>
                                        <path d="M12 5v14"></path>
                                    </svg>
                                    Add New Company</a>
                            </div>
                        </div>
                        <div class="mt-3.5">
                            <div class="box box--stacked flex flex-col">
                                <div class="flex flex-col gap-y-2 p-5 sm:flex-row sm:items-center">
                                    <div>
                                        <x-searchbar type="text" placeholder="Search" />
                                    </div>
                                </div>
                                <div class="overflow-hidden">
                                    <div class="-mx-5 grid grid-cols-12 border-y border-dashed px-5">
                                        <div class="col-span-12 flex flex-col border-b border-r border-dashed border-slate-300/80 px-5 py-5 sm:col-span-6 xl:col-span-3 [&amp;:nth-child(4n)]:border-r-0 [&amp;:nth-last-child(-n+4)]:border-b-0">
                                            <div
                                                class="image-fit h-52 overflow-hidden rounded-lg before:absolute before:left-0 before:top-0 before:z-10 before:block before:h-full before:w-full  before:from-slate-900/90 before:to-black/20">
                                                <img class="rounded-md" src="{{ asset('img/logo/duluin.jpg') }}"
                                                    alt="Tailwise - Admin Dashboard Template">
                                            </div>
                                            <div class="pt-5">
                                                <div
                                                    class="mb-5 mt-auto flex flex-col gap-3.5 border-b border-dashed border-slate-300/70 pb-5">
                                                    <div class="flex items-center">
                                                        <div class="text-base font-medium" id="compnayName">...</div>
                                                    </div>
                                                </div>
                                                <div class="flex items-center">
                                                    <a class="mr-auto flex items-center text-primary" href ="{{ route('hrms.company.edit') }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" data-lucide="pencil"
                                                            class="lucide lucide-kanban-square mr-1.5 h-4 w-4 stroke-[1.3]">
                                                            <rect width="18" height="18" x="3" y="3" rx="2">
                                                            </rect>
                                                            <path d="M8 7v7"></path>
                                                            <path d="M12 7v4"></path>
                                                            <path d="M16 7v9"></path>
                                                        </svg>
                                                        Edit
                                                    </a>
                                                    <a class="flex items-center text-danger" href ="{{ $url_delete ?? '' }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" data-lucide="trash2"
                                                            class="lucide lucide-trash2 mr-1.5 h-4 w-4 stroke-[1.3]">
                                                            <path d="M3 6h18"></path>
                                                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                                            <line x1="10" x2="10" y1="11"
                                                                y2="17"></line>
                                                            <line x1="14" x2="14" y1="11"
                                                                y2="17"></line>
                                                        </svg>
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="flex-reverse flex flex-col-reverse flex-wrap items-center gap-y-2 p-5 sm:flex-row">
                                    <nav class="mr-auto w-full flex-1 sm:w-auto">
                                        <ul class="flex w-full mr-0 sm:mr-auto sm:w-auto">
                                            <li class="flex-1 sm:flex-initial">
                                                <a
                                                    class="transition duration-200 border items-center justify-center py-2 rounded-md cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed min-w-0 sm:min-w-[40px] shadow-none font-normal flex border-transparent text-slate-800 sm:mr-2 dark:text-slate-300 px-1 sm:px-3"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        data-lucide="chevrons-left"
                                                        class="lucide lucide-chevrons-left stroke-[1] h-4 w-4">
                                                        <path d="m11 17-5-5 5-5"></path>
                                                        <path d="m18 17-5-5 5-5"></path>
                                                    </svg></a>
                                            </li>
                                            <li class="flex-1 sm:flex-initial">
                                                <a
                                                    class="transition duration-200 border items-center justify-center py-2 rounded-md cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed min-w-0 sm:min-w-[40px] shadow-none font-normal flex border-transparent text-slate-800 sm:mr-2 dark:text-slate-300 px-1 sm:px-3"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        data-lucide="chevron-left"
                                                        class="lucide lucide-chevron-left stroke-[1] h-4 w-4">
                                                        <path d="m15 18-6-6 6-6"></path>
                                                    </svg></a>
                                            </li>
                                            <li class="flex-1 sm:flex-initial">
                                                <a
                                                    class="transition duration-200 border items-center justify-center py-2 rounded-md cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed min-w-0 sm:min-w-[40px] shadow-none font-normal flex border-transparent text-slate-800 sm:mr-2 dark:text-slate-300 px-1 sm:px-3 !box dark:bg-darkmode-400">1</a>
                                            </li>

                                            <li class="flex-1 sm:flex-initial">
                                                <a
                                                    class="transition duration-200 border items-center justify-center py-2 rounded-md cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed min-w-0 sm:min-w-[40px] shadow-none font-normal flex border-transparent text-slate-800 sm:mr-2 dark:text-slate-300 px-1 sm:px-3"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        data-lucide="chevrons-right"
                                                        class="lucide lucide-chevrons-right stroke-[1] h-4 w-4">
                                                        <path d="m6 17 5-5-5-5"></path>
                                                        <path d="m13 17 5-5-5-5"></path>
                                                    </svg></a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <select
                                        class="disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1 rounded-[0.5rem] sm:w-20">
                                        <option>10</option>
                                        <option>25</option>
                                        <option>35</option>
                                        <option>50</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="box p-4 mt-6">
                            <div class="text-m font-medium">
                                More Setting
                            </div>
                                <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-3 gap-5 mt-4">
                                    <x-action  label="Branch" icon="split" url="{{ route('hrms.branch') }}" />
                                    <x-action  label="Currency" icon="circle-dollar-sign" url="{{ route('hrms.currency') }}" />
                                    <x-action  label="Designation" icon="clipboard" url="{{ route('hrms.designation') }}" />                                   
                                    <x-action  label="Department" icon="layout-template" url="{{ route('hrms.department') }}" />                                   
                                    <x-action  label="Holidays Date" icon="calendar-x-2" url="{{ route('hrms.holidaydate') }}" />                                   
                                    <x-action  label="Job" icon="briefcase" url="{{ route('hrms.jobs') }}" />
                                    <x-action  label="Leave Type" icon="arrow-up-right" url="{{ route('hrms.leave-type') }}" />
                                    <x-action  label="Shift Requester Approver" icon="git-pull-request-create" url="{{ route('hrms.shiftrequest') }}" />
                                    <x-action  label="Shift Type" icon="door-open" url="{{ route('hrms.shifttype') }}" />
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="preview relative [&.hide]:overflow-hidden [&.hide]:h-0">
        <div class="text-center">
            <div id="success-notification-content"
                class="py-5 pl-5 pr-14 bg-white border border-slate-200/60 rounded-lg shadow-xl dark:bg-darkmode-600 dark:text-slate-300 dark:border-darkmode-600 hidden flex">
                <i data-tw-merge="" data-lucide="check-circle" class="stroke-[1] w-5 h-5 text-success"></i>
                <div class="ml-4 mr-4">
                    <div class="font-medium" id="success-title">...</div>
                    <div class="mt-1 text-slate-500" id="success-message">
                        ...
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            getCompanies();
        });

        async function getCompanies() {
            try {
                var param = {
                    url: "{{ $apiUrl }}",
                    method: "GET",
                    data: {
                        user_id: '3c5b06b2-b224-4029-a7a9-a0291dbe723c'
                    }
                }

                await transAjax(param).then((result) => {
                   const data = result.data[0];
                   $("#compnayName").html(data.company_name);
                });
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred while submitting the data');
            }
        }
    </script>
@endpush
