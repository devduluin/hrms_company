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
                                {{ $data['page_title'] }}
                            </div>
                            <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                                <a href="{{ url('dashboard/hrms/employee/new_employee') }}" data-tw-merge=""
                                    class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200"><i
                                        data-tw-merge="" data-lucide="pen-line" class="mr-2 h-4 w-4 stroke-[1.3]"></i>
                                    Add New Employee</a>
                            </div>
                        </div>
                        <div class="mt-3.5 flex flex-col gap-8">
                            <div class="box box--stacked flex flex-col p-5">
                                <div class="grid grid-cols-4 gap-5">
                                    <div
                                        class="box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                        <div class="text-base text-slate-500">Registered Users</div>
                                        <div class="mt-1.5 text-2xl font-medium">457,204</div>
                                        <div class="absolute inset-y-0 right-0 mr-5 flex flex-col justify-center">
                                            <div
                                                class="flex items-center rounded-full border border-danger/10 bg-danger/10 py-[2px] pl-[7px] pr-1 text-xs font-medium text-danger">
                                                3%
                                                <i data-tw-merge="" data-lucide="chevron-down"
                                                    class="ml-px h-4 w-4 stroke-[1.5]"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                        <div class="text-base text-slate-500">Active Users</div>
                                        <div class="mt-1.5 text-2xl font-medium">122,721</div>
                                        <div class="absolute inset-y-0 right-0 mr-5 flex flex-col justify-center">
                                            <div
                                                class="flex items-center rounded-full border border-success/10 bg-success/10 py-[2px] pl-[7px] pr-1 text-xs font-medium text-success">
                                                2%
                                                <i data-tw-merge="" data-lucide="chevron-up"
                                                    class="ml-px h-4 w-4 stroke-[1.5]"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                        <div class="text-base text-slate-500">New Users</div>
                                        <div class="font-mediumm mt-1.5 text-2xl">489,223</div>
                                        <div class="absolute inset-y-0 right-0 mr-5 flex flex-col justify-center">
                                            <div
                                                class="flex items-center rounded-full border border-danger/10 bg-danger/10 py-[2px] pl-[7px] pr-1 text-xs font-medium text-danger">
                                                3%
                                                <i data-tw-merge="" data-lucide="chevron-down"
                                                    class="ml-px h-4 w-4 stroke-[1.5]"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                        <div class="text-base text-slate-500">Login Activity</div>
                                        <div class="font-mediumm mt-1.5 text-2xl">411,259</div>
                                        <div class="absolute inset-y-0 right-0 mr-5 flex flex-col justify-center">
                                            <div
                                                class="flex items-center rounded-full border border-success/10 bg-success/10 py-[2px] pl-[7px] pr-1 text-xs font-medium text-success">
                                                8%
                                                <i data-tw-merge="" data-lucide="chevron-up"
                                                    class="ml-px h-4 w-4 stroke-[1.5]"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box box--stacked flex flex-col">
                                <div class="table gap-y-2 p-5 sm:flex-row sm:items-center">
                                    <div>
                                        <div class="text-base font-medium group-[.mode--light]:text-white mb-4">
                                            Data Employees
                                        </div>
                                        @php
                                            $company_id = '7b1c7110-9c79-4cff-ab2f-a80e4d3073f3';
                                        @endphp
                                        <x-datatable id="employeeTable" :url="$data['apiUrl'] . '/employee/datatables'" method="POST" :company_id="$company_id"
                                            class="display">
                                            <x-slot:thead>
                                                <th data-value="first_name">First Name</th>
                                                <th data-value="last_name">Last Name</th>
                                                <th data-value="gender">Gender</th>
                                                <th data-value="status">Status</th>
                                            </x-slot:thead>
                                        </x-datatable>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
