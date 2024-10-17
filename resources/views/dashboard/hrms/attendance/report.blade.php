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
                                    <x-filter></x-filter>
                                    <a href="{{ route('hrms.shift-assignment.create') }}" type="button" class="btn btn-primary transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary shadow-md w-100">
                                        <svg class="mr-2 h-4 w-4 stroke-[1.3]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                                       Export to excel</a>
                                    </button>                                
                                </div>
                            </div>
                            <div class="table-responsive relative overflow-x-auto sm:rounded-lg">
                                <table data-tw-merge="" class="w-full text-left border-b border-slate-200/60">
                                    <thead data-tw-merge="" class="">
                                        <tr data-tw-merge="" class="" id="daysHeader">
                                            <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 w-5 border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500">
                                                <input id="selectAll" data-tw-merge="" type="checkbox" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&[type='radio']]:checked:bg-primary [&[type='radio']]:checked:border-primary [&[type='radio']]:checked:border-opacity-10 [&[type='checkbox']]:checked:bg-primary [&[type='checkbox']]:checked:border-primary [&[type='checkbox']]:checked:border-opacity-10 [&:disabled:not(:checked)]:bg-slate-100 [&:disabled:not(:checked)]:cursor-not-allowed [&:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&:disabled:checked]:opacity-70 [&:disabled:checked]:cursor-not-allowed [&:disabled:checked]:dark:bg-darkmode-800/50">
                                            </td>
                                            <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-bold text-slate-500">
                                                No.
                                            </td>
                                            <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-bold text-slate-500">
                                                ID
                                            </td>
                                            <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-bold text-slate-500">
                                                Employee Name
                                            </td>
                                            <td data-tw-merge="" class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-bold text-slate-500">
                                               Shift Type
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
<script type="text/javascript">
    $(document).ready(function() {
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

        function generateEmployeeData() {
            return [
                {
                    no: 1,
                    id: 'E001',
                    name: 'John Doe',
                    shift: 'Morning',
                    attendance: {
                        "1": "P", "2": "P", "3": "A", "4": "P", "5": "P", "6": "A", "7": "P",
                        "8": "A", "9": "P", "10": "P", "11": "A", "12": "P", "13": "P", "14": "A",
                        "15": "P", "16": "P", "17": "A", "18": "P", "19": "P", "20": "A", "21": "P",
                        "22": "A", "23": "P", "24": "P", "25": "A", "26": "P", "27": "P", "28": "A",
                        "29": "P", "30": "P", "31": "A"
                    }
                },
                {
                    no: 2,
                    id: 'E002',
                    name: 'Jane Smith',
                    shift: 'Afternoon',
                    attendance: {
                        "1": "A", "2": "P", "3": "P", "4": "P", "5": "A", "6": "P", "7": "A",
                        "8": "P", "9": "A", "10": "P", "11": "P", "12": "A", "13": "P", "14": "P",
                        "15": "A", "16": "P", "17": "P", "18": "A", "19": "P", "20": "P", "21": "A",
                        "22": "P", "23": "A", "24": "P", "25": "P", "26": "A", "27": "P", "28": "P",
                        "29": "A", "30": "P", "31": "P"
                    }
                },
                {
                    no: 3,
                    id: 'E003',
                    name: 'Alice Johnson',
                    shift: 'Night',
                    attendance: {
                        "1": "P", "2": "A", "3": "P", "4": "A", "5": "P", "6": "P", "7": "A",
                        "8": "P", "9": "P", "10": "A", "11": "P", "12": "P", "13": "A", "14": "P",
                        "15": "P", "16": "A", "17": "P", "18": "P", "19": "A", "20": "P", "21": "P",
                        "22": "A", "23": "P", "24": "A", "25": "P", "26": "P", "27": "A", "28": "P",
                        "29": "P", "30": "A", "31": "P"
                    }
                },
                {
                    no: 4,
                    id: 'E004',
                    name: 'Bob Brown',
                    shift: 'Morning',
                    attendance: {
                        "1": "A", "2": "A", "3": "P", "4": "P", "5": "A", "6": "A", "7": "P",
                        "8": "P", "9": "A", "10": "A", "11": "P", "12": "P", "13": "A", "14": "A",
                        "15": "P", "16": "P", "17": "A", "18": "A", "19": "P", "20": "P", "21": "A",
                        "22": "A", "23": "P", "24": "A", "25": "P", "26": "A", "27": "P", "28": "P",
                        "29": "A", "30": "P", "31": "P"
                    }
                }
            ];
        }

        function populateYears() {
            const yearSelect = $('#yearSelect');
            const years = generateYears();
            years.forEach(year => {
                yearSelect.append(`<option value="${year}">${year}</option>`);
            });
        }

        function getAttendanceClass(status) {
            switch (status) {
                case 'P':
                    return 'text-green-800'; // Success color text
                case 'A':
                    return 'text-red-800'; // Danger color text
                default:
                    return '';
            }
        }

        function populateTable(month, year) {
            const days = generateDays(month, year);
            const employees = generateEmployeeData();
            
            let daysHeader = $('#daysHeader');
            let attendanceBody = $('#attendanceBody');
            
            daysHeader.find('th:gt(3)').remove(); // Remove existing day headers, keep first 4 columns
            
            days.forEach(day => {
                daysHeader.append(`<th class="py-2 px-4 border-b">${day.day} ${day.dayName}</th>`);
            });
            
            // if ($.fn.dataTable.isDataTable('#attendanceTable')) {
            //     $('#attendanceTable').DataTable().clear().destroy();
            // }
            
            attendanceBody.empty(); // Clear existing data
            
            employees.forEach(employee => {
                let row = `<tr>
                    <td class="py-2 px-4 border-b">${employee.no}</td>
                    <td class="py-2 px-4 border-b">${employee.id}</td>
                    <td class="py-2 px-4 border-b">${employee.name}</td>
                    <td class="py-2 px-4 border-b">${employee.shift}</td>`;
                days.forEach(day => {
                    row += `<td class="py-2 px-4 border-b ${getAttendanceClass(employee.attendance[day.day])} font-bold">
                                ${employee.attendance[day.day] || ''}
                            </td>`;
                });
                row += `</tr>`;
                attendanceBody.append(row);
            });
            
            $('#attendanceTable').DataTable({
                paging: true,
                searching: false,
                ordering: false,
                info: false
            });
        }

        $('#monthSelect, #yearSelect').change(function() {
            let selectedMonth = $('#monthSelect').val();
            let selectedYear = $('#yearSelect').val();
            populateTable(parseInt(selectedMonth), parseInt(selectedYear));
        });

        populateYears();
        populateTable(new Date().getMonth(), new Date().getFullYear());
    });
</script>
@endpush
@endsection
