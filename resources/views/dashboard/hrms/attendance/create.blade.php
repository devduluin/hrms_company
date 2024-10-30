@extends('layouts.dashboard.app')
@section('content')

<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
@include('layouts.dashboard.menu')
    <div class="content transition-[margin,width] duration-100 px-5 pt-[56px] pb-16 relative z-20 content--compact xl:ml-[275px] [&amp;.content--compact]:xl:ml-[91px]">
        <form id="form-submit">
            <div class="container mt-[65px]">
                <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                    <div class="text-base font-medium group-[.mode--light]:text-white">
                        {{ $page_title ?? '' }}
                    </div>
                    <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                        <button onclick="history.go(-1)"
                            class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md w-24">
                            <i data-tw-merge="" data-lucide="arrow-left" class="mr-3 h-4 w-4 stroke-[1.3]"></i> Back
                        </button>
                        <button id="submitBtn" data-tw-merge="" type="submit"
                                class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-blue-theme border-blue-theme text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200"><i
                                    data-tw-merge="" data-lucide="save" class="mr-3 h-4 w-4 stroke-[1.3]"></i>
                                <span id="loadingText">Save Changes</span>
                        </button>
                    </div>
                </div>
                <div class="mt-3.5 grid grid-cols-12 gap-x-6 gap-y-10">
                    <div class="col-span-12 flex flex-col gap-y-7 sm:col-span-12 xl:col-span-12">
                        <div class="box box--stacked flex flex-col p-5">
                            <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-2 gap-5 mt-4">
                                <div class="gap-x-6 gap-y-10 ">
                                    <div class="inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                        <div class="text-left">
                                            <div class="flex items-center">
                                                <div class="font-medium">Select Employee</div>
                                            </div>
                                        </div>
                                    </div>
                                    <select name="employee" id="employee_id" onchange="getDetailEmployee(this.value)" class="disabled:bg-slate-100 mt-1 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1">
                                        
                                    </select>
                                </div>
                                <div class="gap-x-6 gap-y-10 ">
                                    <div class="inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                        <div class="text-left">
                                            <div class="flex items-center">
                                                <div class="font-medium">Select Employee</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="relative mt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="calendar" class="lucide lucide-calendar absolute inset-y-0 left-0 z-10 my-auto ml-3 h-4 w-4 stroke-[1.3]"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect><line x1="16" x2="16" y1="2" y2="6"></line><line x1="8" x2="8" y1="2" y2="6"></line><line x1="3" x2="21" y1="10" y2="10"></line></svg>
                                        <input type="text" name="attendance_date" id="attendance_date" class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 datepicker rounded-[0.3rem] pl-9">
                                    </div>
                                </div>
                                <div class="gap-x-6 gap-y-10 ">
                                    <div class="inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                        <div class="text-left">
                                            <div class="flex items-center">
                                                <div class="font-medium">Status</div>
                                            </div>
                                        </div>
                                    </div>
                                    <select id="status" name="status" class="disabled:bg-slate-100 mt-1 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1">
                                        <option value="present">
                                            Present
                                        </option>
                                        <option value="absent">
                                            Absent
                                        </option>
                                        <option value="wfo">
                                            WFO
                                        </option>
                                        <option value="wfh">
                                            WFH
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="gap-x-6 gap-y-10">
                                <x-form.textarea id="reason" name="reason" label="Reason"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="preview relative [&.hide]:overflow-hidden [&.hide]:h-0">
    <div class="text-center">
        <div id="success-notification-content" class="py-5 pl-5 pr-14 bg-white border border-slate-200/60 rounded-lg shadow-xl dark:bg-darkmode-600 dark:text-slate-300 dark:border-darkmode-600 hidden flex">
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
<script src="{{ asset('dist') }}/js/vendors/litepicker.js"></script>
<script src="{{ asset('dist') }}/js/components/base/litepicker.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        loadEmployee();
    });

    //ambil semua employee berdasarkan company_id
    async function loadEmployee()
    {
        var param = {
            url: "{{ $apiEmployeeUrl }}",
            method: "POST",
            data: JSON.stringify({
                company_id: "{{ $company_id }}"
            }),
        }

        await transAjax(param).then((result) => {
            let response = result.data;

            var html = "";
            response.forEach(employee => {
               html += `
                <option value="${employee.id}">
                   ${employee.first_name + ' ' + employee.last_name}
                </option>
                `
            });

            $("#employee_id").html(html);
            //setelah employee ditampilkan, jalankan fungsi getDetailEmployee untuk mendapatkan data employee yang pertama
            getDetailEmployee($('#employee_id').val());
        }).catch((error) => {
            console.log(error);
        });
    }

    //simpan payload data attendance dari data detail employee
    var employee_id = '';
    var company_id = '';
    var latlong = '';
    //tampilkan employee berdasarkan employee_id
    async function getDetailEmployee(value) 
    {
       var param = {
        url: "{{ $apiDetailEmployee }}" + value,
        method: "GET",
       }

       await transAjax(param).then((result) => {
        const employee = result.data
        employee_id = employee.id;
        company_id =  employee.company_id
        latlong = employee.company_id_rel.latlong;

       }).catch((error) => {
        console.log(error);
       });
    }

    $("#form-submit").submit(async function(e) {
        e.preventDefault();

        var dataAttendance = {
            employee_id: employee_id,
            company_id: company_id,
            latlong: latlong,
            attendance_date: $('#attendance_date').val(),
            status: $('#status').val(),
            reason: $('#reason').val()
        }

        $('#loadingText').html('Saving...');
        $(this).attr('disable', true);

        var param = {
            url: "{{ $apiAttendance }}",
            // url: "http://localhost:4444/api/v1/attendance/operator/store",
            method: "POST",
            data: JSON.stringify(dataAttendance),
            processData: false,
            contentType: false,
            cache: false,
        }
        
        await transAjax(param).then((result) => {
            showSuccessNotification(result.message, "The operation was completed successfully.");
            $('#loadingText').html('Save Changes');
            $(this).attr('disable', false);
            setTimeout(() => {
                window.location.href = "/dashboard/hrms/attendance/summary";
            }, 3000);
        }).catch((error) => {
            $('#loadingText').html('Save Changes');
            $(this).attr('disable', false);
            showErrorNotification('error', error.message);
        });
    });
    </script>
@endpush