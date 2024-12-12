@extends('layouts.dashboard.app')
@section('content')
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
                        <div class="ml-2 text-lg font-medium group-[.mode--light]:text-white">
                            Graph
                        </div>
                        <div class="mt-5 flex flex-col gap-8">
                            <div class="box box--stacked p-5">
                                <div class="flex flex-col gap-y-5 lg:flex-row lg:items-center">
                                    <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row sm:items-center">
                                        <!-- <div class="relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="calendar" class="lucide lucide-calendar absolute inset-y-0 left-0 z-10 my-auto ml-3 h-4 w-4 stroke-[1.3]"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect><line x1="16" x2="16" y1="2" y2="6"></line><line x1="8" x2="8" y1="2" y2="6"></line><line x1="3" x2="21" y1="10" y2="10"></line></svg>
                                            <input id="litepicker-chart" name="filter_date_chart" type="text" class="disabled:bg-slate-100 litepicker-chart disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 datepicker rounded-[0.3rem] pl-9 sm:w-64">
                                        </div> -->
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
                                        <div class="mr-2 h-2 w-2 rounded-full border border-primary/60 bg-primary/60" style="background: rgba(37 99 235);"></div>
                                        Total Present
                                    </div>
                                    <div class="flex items-center text-slate-500">
                                        <div class="mr-2 h-2 w-2 rounded-full border border-slate-500/60 bg-slate-500/60" style="background: rgba(239 68 68);"></div>
                                        Total Absent
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                                <x-chart.donut 
                                    id="genderChart"
                                    label="Gender Distribution"
                                    apiUrl="http://apidev.duluin.com/api/v1/employees/employee/report/gender-chart?company_id=c8f745e0-aa6e-458b-bb70-4dda3e2accea"
                                    itemData="gender"
                                />
                            
                                <x-chart.donut 
                                    id="genderChart"
                                    label="Staff per Department"
                                    apiUrl="http://apidev.duluin.com/api/v1/employees/employee/report/department-chart?company_id=c8f745e0-aa6e-458b-bb70-4dda3e2accea"
                                    itemData="department_id"
                                />

                                <x-chart.donut 
                                    id="amountChart"
                                    label="Expense Claim Amount"
                                    apiUrl="https://apidev.duluin.com/api/v1/payroll/expense_claim/report/chart?company_id=c8f745e0-aa6e-458b-bb70-4dda3e2accea"
                                    itemData="status"
                                />
                            </div>
                            <!-- <div class="box box--stacked p-5">
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
                            </div> -->
                            <!-- <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                                <div class="box col-span-2  rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm ">
                                    <x-chart.stackbar label="Attendance Overview" option1="This Month" option2="Last Month"/>
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
                            </div> -->
                        </div>
                    </div>
                </div>
        </div>
    @endsection
@push('js')
<script src="{{ asset('dist') }}/js/vendors/litepicker.js"></script>
<script src="{{ asset('dist') }}/js/vendors/lodash.js"></script>
<script src="{{ asset('dist') }}/js/components/base/litepicker.js"></script>
{{-- <script src="{{ asset('dist') }}/js/components/report-bar-chart-5.js"></script> --}}

    <script type="text/javascript">
        var filterData = {};
        $(document).ready(function() {
           countAttendance('daily');
           countEmployee();
           getDataChart();
        });

        //user bisa menampilkan data berdasarkan range tanggal yang dipilih
        $(".litepicker").on("click", ".button-apply", function() {
            $("#loading").removeAttr('style', 'display: none');
           countAttendance($('#litepicker').val());
        });

        //filter attendane, weekly, mothly atau yearly
        function filterAttendance(value) {
            $("#loading").removeAttr('style', 'display: none');
           countAttendance(value);
        }

        //fungsi untuk menghitung total attendance
        async function countAttendance(value = "") {

            //filter data berdasarkan tanggal yang dipilih
            switch (value) {
                case "daily":
                    filterData = "daily=daily";
                    break;
                case "weekly":
                    filterData = "weekly=weekly";
                    break;
                case "monthly":
                    filterData = "monthly=monthly";
                    break;
                case "yearly":
                    filterData = "yearly=yearly";
                    break;
                default:
                $('#custom-date').attr('hidden', false);
                filterData = "custom_date="+value;
            }
             
            //kirim permintaan data ke server dengan membawa param
           var param = {
                url: "{{ $apiTotalAttendance }}",
                method: "GET",
                data: filterData,
           }

           await transAjax(param).then((result) => {
               $('#totalAttendance').html(result.data.totalAttendan)
               $('#totalPresent').html(result.data.totalPresent)
               $('#totalAbsent').html(result.data.totalAbsent)
               $('#lateEntry').html(result.data.lateEntry)
               $('#earlyExit').html(result.data.earlyExit);
               $('#totalWfh').html(result.data.totalWfh);
               $('#totalReq').html(result.data.totalReq);
               $('#totalLeave').html(result.data.totalLeave);
               $("#loading").attr('style', 'display: none');
           }).catch((err) => {
                showErrorNotification("Internal server error", err.message);
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

        //sementara
        async function transAjaxx(data) {
            html = null;
            data.headers = {
                'Authorization': `Bearer xN9P6a8sL2bV3iR4fC5J6Q7kT8yU9wZ0`,
                'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`,
                // 'X-Forwarded-Host': `http://dev.hrms.duluin.com`,
                'Content-Type': 'application/json',
            }
            await $.ajax(data).done(function(res) {
                    html = res;
                })
                .fail(function() {
                    return false;
                })
            return html
        }

        //ambil data chart attendance dari server
        async function getDataChart()
        {
            var param = {
                url: "{{ $apiChartAttendance }}",
                // url: "http://localhost:4446/api/v1/attendance/report/chart?company_id=c8f745e0-aa6e-458b-bb70-4dda3e2accea",
                method: "GET",
            }

            await transAjax(param).then((result) => {
                const chart = result.data;
                console.log(chart);

                //chart
                let e = $(".report-bar-chart-5");
                e.length &&
                    e.each(function () {
                        let a = $(this)[0].getContext("2d"),
                            r = new Chart(a, {
                                type: "bar",
                                data: chart,
                                options: {
                                    maintainAspectRatio: !1,
                                    plugins: { legend: { display: !1 } },
                                    scales: {
                                        x: {
                                            ticks: {
                                                color: getColor("slate.500", 0.7),
                                            },
                                            grid: { display: !1 },
                                            border: { display: !1 },
                                        },
                                        y: {
                                            ticks: {
                                                autoSkipPadding: 30,
                                                color: getColor("slate.500", 0.9),
                                                beginAtZero: !0,
                                            },
                                            grid: { color: getColor("slate.200", 0.7) },
                                            border: { display: !1 },
                                        },
                                    },
                                    onClick: function (e, elements) {
                                        if (elements.length > 0) {
                                            const firstElement = elements[0]; 
                                            const datasetIndex = firstElement.datasetIndex;
                                            const index = firstElement.index;

                                            const label = r.data.labels[index];
                                            const dataValue = r.data.datasets[datasetIndex].data[index];

                                            // clickable
                                            const baseUrl = '{{ url('dashboard/hrms/attendance/attendance') }}';
                                            window.location.href = `${baseUrl}?attendance_status=${r.data.datasets[datasetIndex].label.toLowerCase()}&attendance_date=${label}`;
                                            // console.log(`You clicked on ${label}: ${dataValue} ${r.data.datasets[datasetIndex].label}`);
                                        }
                                    }
                                },
                            });
                    });
                
            }).catch((error) => {
                console.log(error);
            });

            //user bisa menampilkan data berdasarkan range tanggal yang dipilih
            // $(".litepicker").on("click", ".button-apply", function() {
            //     $("#loading").removeAttr('style', 'display: none');
            // });
        }
    </script>
@endpush