@extends('layouts.dashboard.app')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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
                            <div class="box box--stacked p-5">
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
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                                <div class="box col-span-2  rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm ">
                                    <x-chart.stackbar label="Attendance Overview" option1="This Month" />
                                </div>
                                <div class="grid grid-rows-2 gap-4 col col-span-1">
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
                                </div>
                            </div>
                        </div>
                        <div class="box p-4 mt-4">
                            <div class="text-m font-medium">
                                More Action
                            </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5 mt-4">
                                    <x-action  label="Attendance Summary" icon="arrow-up-right" url="{{ url('/dashboard/hrms/attendance/summary') }}" />
                                    <x-action  label="New Shift Assignment" icon="arrow-up-right" url="{{ url('/dashboard/hrms/attendance/shift_assignment') }}" />
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
