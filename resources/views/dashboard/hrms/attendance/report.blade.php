@extends('layouts.dashboard.app')
@section('content')
    <style>
        table.dataTable tbody th,
        table.dataTable tbody td {
            padding: 15px 10px;
            /* e.g. change 8x to 4px here */
        }
    </style>
    <?php
    $i = 1;
    $filterDate = request('filter_date');

        if ($filterDate) {
            $dates = explode(' - ', $filterDate);
            $startDate = new DateTime(trim($dates[0])); // Parse the start date
            $endDate = new DateTime(trim($dates[1]));   // Parse the end date
        } else {
            $now = new DateTime(); // Current date
            $startDate = (clone $now)->modify('first day of this month')->setTime(0, 0, 0);
            $endDate = (clone $now)->modify('last day of this month')->setTime(23, 59, 59);
        }
        $interval = new DateInterval('P1D');
        $datePeriod = new DatePeriod($startDate, $interval, $endDate);
    ?>

    <div
        class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')
        <div
            class="content transition-[margin,width] duration-100 px-5 pt-[56px] pb-16 relative z-20 content--compact xl:ml-[275px] [&amp;.content--compact]:xl:ml-[91px]">
            <div class="mt-[65px] col-span-12 w-full">
                <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                    <div class="text-lg font-medium group-[.mode--light]:text-white">
                        {{ $page_title ?? '' }}
                    </div>
                    <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                        <a href="{{ url('/dashboard/hrms/attendance') }}"
                            class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md  w-full sm:w-auto">
                            <i data-tw-merge="" data-lucide="arrow-left" class="mr-3 h-4 w-4 stroke-[1.3]"></i> Back
                        </a>


                    </div>
                </div>
                <div class="mt-3.5  gap-x-6 gap-y-10">
                    <div class="col-span-12 flex flex-col gap-y-7 xl:col-span-9">
                        <div class="box box--stacked flex flex-col p-5">
                            <div class="mt-4">

                            </div>
                            <form method="GET" id="filterTable">
                                <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">

                                    <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto mb-5 mt-5">

                                        <div class="relative">
                                            <x-form.selectFilter id="company_id" name="company_id" data-method="POST"
                                                label="" url="{{ url('dashboard/hrms/company/create') }}"
                                                apiUrl="{{ $apiCompanyUrl }}/company/datatables" columns='["company_name"]'
                                                :keys="[
                                                    'company_id' => $company,
                                                ]" :selected="$company"
                                                class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 sm:w-56">
                                                <option value="">Company</option>
                                            </x-form.selectFilter>
                                        </div>
                                        <div class="relative">
                                            <x-form.selectFilter id="department_id" name="department_id" data-method="POST"
                                                label="" url="{{ url('dashboard/hrms/department/create') }}"
                                                apiUrl="{{ $apiCompanyUrl }}/department/datatables"
                                                columns='["department_name"]' :keys="[
                                                    'company_id' => $company,
                                                ]"
                                                class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 sm:w-56">
                                                <option value="">Department</option>
                                            </x-form.selectFilter>
                                        </div>
                                        <div class="relative">
                                            <x-form.selectFilter id="designation_id" name="designation_id"
                                                label="Designation" url="{{ url('dashboard/hrms/designation') }}"
                                                apiUrl="{{ $apiCompanyUrl }}/designation/datatables"
                                                columns='["designation_name"]' :keys="[
                                                    'company_id' => $company,
                                                    'search',
                                                ]"
                                                class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 sm:w-56">
                                            </x-form.selectFilter>
                                        </div>
                                        <div class="relative">
                                            <i data-tw-merge="" data-lucide="calendar"
                                                class="absolute inset-y-0 left-0 z-10 my-auto ml-3 h-4 w-4 stroke-[1.3]"></i>
                                            <input id="filter_date" name="filter_date" type="text"
                                                value="{{ $startDate->format('Y-m-d') }} - {{ $endDate->format('Y-m-d') }}"
                                                class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 datepicker rounded-[0.3rem] pl-9 sm:w-64">
                                        </div>
                                        <div class="relative">
                                            <button id="submitBtn" data-tw-merge="" type="submit"
                                                class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-blue-theme border-blue-theme text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200"><i
                                                    data-tw-merge="" data-lucide="save"
                                                    class="mr-3 h-4 w-4 stroke-[1.3]"></i>
                                                <span id="loadingText">Save Filter </span>
                                            </button>
                                        </div>

                                    </div>

                                </div>
                            </form>
                            <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center p-4">

                            </div>
                            <x-dynamic_header_datatable id="attendanceTable" :url="$apiReportAttendance" method="POST"
                                class="display nowrap cell-border row-border" :order="[[1, 'DESC']]" :filter="[
                                    'designation_id' => '#designation_id',
                                    'department_id' => '#department_id',
                                    'filter_date' => '#filter_date',
                                ]" :order="[[0, 'DESC']]">
                                <x-slot:thead>
                                    <th data-value="no">No</th>
                                    
                                    <th data-value="first_name" orderable="true" data-render="getFullName">Employee Name</th>
                                    <th data-value="department_id_rel" data-render="getDepartment" orderable="false">Department</th>
                                    
                                    <?php
                                    foreach ($datePeriod as $date) {
                                        $dayName = $date->format('D'); // Day of the week
                                        $day = $date->format('j'); // Day of the month
                                        $isWeekend = ($dayName === 'Sat' || $dayName === 'Sun'); // Check if it's a weekend
                                        $backgroundColor = $isWeekend ? '#faa5a5' : 'transparent'; // Determine background color
                                        ?>
                                        <th data-value="attendances.<?= $i ?>" class="dt-center" orderable="false"
                                            style="background-color: <?= $backgroundColor ?>;" data-render="getAttendanceReport">
                                            <?= $day ?> <br> <?= $dayName ?>
                                        </th>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                </x-slot:thead>
                            </x-dynamic_header_datatable>
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
    @include('vendor-common.sweetalert')
    @push('js')
        <script src="{{ asset('dist') }}/js/vendors/litepicker.js"></script>
        <script src="{{ asset('dist') }}/js/components/base/litepicker.js"></script>

        <script>
            document.getElementById('filterTable').addEventListener('submit', function(e) {
                const filterDateInput = document.getElementById('filter_date').value;

                if (filterDateInput) {
                    const [startDateStr, endDateStr] = filterDateInput.split(' - ');
                    const startDate = new Date(startDateStr);
                    const endDate = new Date(endDateStr);

                    const today = new Date();
                    const lastDayOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);

                    endDate.setHours(0, 0, 0, 0);
                    lastDayOfMonth.setHours(0, 0, 0, 0);

                    if (endDate > lastDayOfMonth) {
                        e.preventDefault();
                        Swal.fire({
                            icon: 'error',
                            title: 'Invalid Date',
                            text: 'End date cannot exceed the last day of this month.',
                            confirmButtonText: 'OK'
                        });
                        return;
                    }

                    const diffTime = Math.abs(endDate - startDate);
                    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

                    if (diffDays > 31) {
                        e.preventDefault();
                        Swal.fire({
                            icon: 'error',
                            title: 'Invalid Date Range',
                            text: 'Date range cannot exceed 31 days.',
                            confirmButtonText: 'OK'
                        });
                    }
                }
            });

            function getAttendanceReport(data, type, row, meta) {
                if (data !== null) {
                    const status = data.status && data.status.trim() !== '' ? data.status : '&nbsp';
                    return `<a href="{{ url('dashboard/hrms/attendance/attendance') }}?employee_id=${row.id}&attendance_date=${data.date}" data-placement="top" title="${data.label}"><div class=" px-1.5 w-10 [&:hover:not(:disabled)]:bg-primary/10 [&:hover:not(:disabled)]:border-primary/10 [&:hover:not(:disabled)]:dark:border-darkmode-300/80 [&:hover:not(:disabled)]:dark:bg-darkmode-300/80">${status}</div></a>`;
                     
                }
                return 'N/A';
            }

            function getFullName(data, type, row, meta) {
                if (data) {
                    let avatar = row.avatar 
                                ? `<img src="${row.avatar}" alt="User Avatar" class="tooltip cursor-pointer rounded-full shadow-[0px_0px_0px_2px_#fff,_1px_1px_5px_rgba(0,0,0,0.32)] dark:shadow-[0px_0px_0px_2px_#3f4865,_1px_1px_5px_rgba(0,0,0,0.32)]" data-placement="top">`
                                : `<img src="{{ asset('/img/3725294.png') }}" alt="Default Avatar" class="tooltip cursor-pointer rounded-full shadow-[0px_0px_0px_2px_#fff,_1px_1px_5px_rgba(0,0,0,0.32)] dark:shadow-[0px_0px_0px_2px_#3f4865,_1px_1px_5px_rgba(0,0,0,0.32)]" data-placement="top">`;

                    const html = `<div class="flex items-center">
                        <div class="image-fit zoom-in h-9 w-9">
                            ${avatar}
                        </div>
                        <div class="ml-3.5">
                            <a class="whitespace-nowrap font-medium" href="{{ url('/dashboard/hrms/employee/edit_employee') }}/${row.id}">
                                ${row.first_name} ${row.last_name}
                            </a>
                            <div class="mt-0.5 whitespace-nowrap text-xs text-slate-500">
                                ${row.employee_id}
                            </div>
                        </div>
                    </div>`;

                    return html;
                }
                return 'N/A';
            }

            function getDepartment(data, type, row, meta) {
                if (data !== null) {
                    return data?.department_name ?? 'N/A';
                }
                return 'N/A';
            }

            const urlParams = new URLSearchParams(window.location.search);
            let activeFilterCount = 0;

            const handleFilter = (paramName, selectorId) => {
                if (urlParams.has(paramName)) {
                    const paramValue = urlParams.get(paramName);
                    const $selectElement = $(`#${selectorId}`);
                    if ($selectElement.length > 0) {
                        $selectElement.val(paramValue).change();
                        addOptionIfNotExist(selectorId, paramValue)
                        if (paramValue) activeFilterCount++;
                    }
                }
            };

            // Call the function for each filter
            function addOptionIfNotExist(selectElementId, optionValue) {
                console.log(selectElementId);
                const selectElement = $(`#${selectElementId}`)[0].tomselect;
                if (selectElement.options) {
                    setTimeout(() => {
                        selectElement.setValue(optionValue);
                    }, 1500);
                }
            }
            handleFilter("company_id", "company_id");
            handleFilter("department_id", "department_id");
            handleFilter("designation_id", "designation_id");
        </script>
    @endpush
@endsection
