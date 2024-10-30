@extends('layouts.dashboard.app') 
@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.tailwindcss.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.tailwindcss.js"></script>

<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
    @include('layouts.dashboard.menu')

    <div id="contents-page" class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
        <div class="container">
            <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                <div class="col-span-12">
                    <div class="mt-1.5 flex flex-col">
                        <div class="box flex flex-col p-5">
                            <div class="flex flex-col mb-4 gap-y-3 md:h-10 md:flex-row md:items-center">
                                <div class="text-base font-medium group-[.mode--light]:text-white">
                                    {{ $page_title }}
                                </div>
                                <div class="flex flex-col gap-x-1 sm:flex-row md:ml-auto" id="assignShiftContainer">
                                    <a href="{{ route("hrms.attendance") }}"
                                    class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md w-24">
                                    <i data-tw-merge="" data-lucide="arrow-left" class="mr-3 h-4 w-4 stroke-[1.3]"></i> Back
                                    </a>
                                    <a href="{{ route("hrms.attendance.print") }}"
                                    class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md w-24">
                                    <i data-tw-merge="" data-lucide="printer" class="mr-3 h-4 w-4 stroke-[1.3]"></i> Print
                                    </a>
                                    <div class="relative">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="calendar" class="lucide lucide-calendar absolute inset-y-0 left-0 z-10 my-auto ml-3 h-4 w-4 stroke-[1.3]"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect><line x1="16" x2="16" y1="2" y2="6"></line><line x1="8" x2="8" y1="2" y2="6"></line><line x1="3" x2="21" y1="10" y2="10"></line></svg>
                                        <input id="litepicker" name="filter_date" type="text" class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 datepicker rounded-[0.3rem] pl-9 sm:w-64">
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
                            <div class="table-responsive relative overflow-x-auto sm:rounded-lg">
                                <table data-tw-merge="" class="w-full text-left border-b border-slate-200/60">
                                    <thead data-tw-merge="" class="">
                                        <tr data-tw-merge="" class="" id="daysHeader">
                                            <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-bold text-slate-500">
                                                No.
                                            </td>
                                            <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-bold text-slate-500">
                                                ID
                                            </td>
                                            <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-bold text-slate-500">
                                                Employee Name
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody id="attendanceBody">
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
<script src="{{ asset('dist') }}/js/vendors/litepicker.js"></script>
<script src="{{ asset('dist') }}/js/components/base/litepicker.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var filter_date = "";
        function generateYears() {
            let currentYear = new Date().getFullYear();
            let years = [];
            for (let i = currentYear - 10; i <= currentYear + 10; i++) {
                years.push(i);
            }
            return years;
        }

        function generateDays(month, year) {
            let date = new Date(year, month, 1);
            let days = [];
            const dayNames = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
            while (date.getMonth() === month) {
                days.push({
                    day: date.getDate(),
                    dayName: dayNames[date.getDay()]
                });
                date.setDate(date.getDate() + 1);
            }
            return days;
        }

        let companyId = localStorage.getItem("company");
        async function generateEmployeeData() {
            var param = {
                url: "{{ $apiReportAttendance }}"+`?company_id=${companyId}&filter_date=`+filter_date,
                method: "GET"
            }
            const response = await transAjax(param).then((result) => {
                var repotAttendace = [];
                var response = result.data;
                response.forEach((data, index) => {
                    repotAttendace.push({
                        no: index + 1,
                        id: data.employee_id_rel.employee_id,
                        name: data.employee_id_rel.first_name + ' ' + data.employee_id_rel.last_name,
                        shift: data.shift,
                        attendance: data.attendance
                    });
                });
                return repotAttendace;
            });
            $("#loading").attr('style', 'display: none');
            return response;
        }

        function populateYears() {
            const yearSelect = $('#yearSelect');
            const years = generateYears();
            years.forEach(year => {
                yearSelect.append(`<option value="${year}">${year}</option>`);
            });
        }

        async function populateTable(month, year) {
            const days = generateDays(month, year);
            const employees = await generateEmployeeData();
            
            let daysHeader = $('#daysHeader');
            let attendanceBody = $('#attendanceBody');
            
            daysHeader.find('th:gt(3)').remove(); // Remove existing day headers, keep first 4 columns
            
            days.forEach(day => {
                daysHeader.append(`<th class="py-2 px-4 border-b border-t border-slate-200/60 ${day.dayName == "Sat" ? 'bg-red-300' : 'bg-slate-50'} ${day.dayName == "Sun" ? 'bg-red-300' : 'bg-slate-50'} py-4 font-bold text-slate-500">${day.day} ${day.dayName}</th>`);
            });
            
            attendanceBody.empty(); // Clear existing data
            
            employees.forEach(employee => {
                let row = `<tr>
                    <td class="py-2 px-4 border-b">${employee.no}</td>
                    <td class="py-2 px-4 border-b">${employee.id}</td>
                    <td class="py-2 px-4 border-b">${employee.name}</td>`;
                days.forEach(day => {
                    let attendanceStatus = employee.attendance[day.day]; // Accessing attendance data by day
                    row += `<td class="py-2 px-4 border-b ${day.dayName == "Sat" ? 'bg-red-100' : ''} ${day.dayName == "Sun" ? 'bg-red-100' : ''} ${attendanceStatus == 'P' ? 'text-green-800'  : 'text-red-800'} font-bold">
                                ${attendanceStatus || ''}
                            </td>`;
                });
                row += `</tr>`;
                attendanceBody.append(row);
            });
            let table = new DataTable('#attendanceTable');
        }

        $('#monthSelect, #yearSelect').change(function() {
            let selectedMonth = $('#monthSelect').val();
            let selectedYear = $('#yearSelect').val();
            populateTable(parseInt(selectedMonth), parseInt(selectedYear));
        });

        populateYears();
        populateTable(new Date().getMonth(), new Date().getFullYear());

        $(".litepicker").on("click", ".button-apply", function() {
            $("#loading").removeAttr('style', 'display: none');
           filter_date = $("#litepicker").val();
           generateEmployeeData();
        });
    });
</script>

@endpush
@endsection
