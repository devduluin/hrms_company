@extends('layouts.dashboard.app') 
@section('content')
<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
    @include('layouts.dashboard.menu')
    <div id="contents-page" class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
        <div class="container">
            <div class="mt-3.5 grid grid-cols-12 gap-x-6 gap-y-10">
                <div class="col-span-12 flex flex-col gap-y-7 sm:col-span-12 xl:col-span-12">
                    <div class="box box--stacked flex flex-col p-5">
                        <div class="flex flex-col gap-y-2 sm:flex-row sm:items-center">
                            <div class="text-base font-medium group-[.mode--light]:text-white">
                                {{ $page_title }}
                            </div>
                            <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                                <button onclick="history.go(-1)" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md w-24">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="arrow-left" class="lucide lucide-arrow-left mr-3 h-4 w-4 stroke-[1.3]"><path d="m12 19-7-7 7-7"></path><path d="M19 12H5"></path></svg> Back
                                </button>
                                <form id="shiftAssignment">
                                    <button id="submitBtn" type="submit" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-blue-theme border-blue-theme text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="save" class="lucide lucide-save mr-3 h-4 w-4 stroke-[1.3]"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                                            <span id="loadingText">Save Changes</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-4">
                            <div class="gap-x-6 gap-y-10 ">
                                <div class="inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Company</div>
                                        </div>
                                    </div>
                                </div>
                                <select name="company_id" id="companies" class="disabled:bg-slate-100 mt-1 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1">
                                    
                                </select>
                            </div>
                            <div class="gap-x-6 gap-y-10 ">
                                <div class="inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Shift Type</div>
                                        </div>
                                    </div>
                                </div>
                                <select data-tw-merge="" id="shift" onchange="getShiftId(this.value)" name="shift" class="disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1 mt-1 flex-1">
                                                
                                </select>
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
                                    <option value="active">
                                        Active
                                    </option>
                                    <option value="inactive">
                                        Inactive
                                    </option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5">
                                    <div class="gap-x-6 gap-y-10 ">
                                        <div class="inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                            <div class="text-left">
                                                <div class="flex items-center">
                                                    <div class="font-medium">Start Date</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="relative mt-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="calendar" class="lucide lucide-calendar absolute inset-y-0 left-0 z-10 my-auto ml-3 h-4 w-4 stroke-[1.3]"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect><line x1="16" x2="16" y1="2" y2="6"></line><line x1="8" x2="8" y1="2" y2="6"></line><line x1="3" x2="21" y1="10" y2="10"></line></svg>
                                            <input type="date" name="start_date" id="start_date" class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 rounded-[0.3rem] pl-9">
                                        </div>
                                    </div>
                                    <div class="gap-x-6 gap-y-10 ">
                                        <div class="inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                            <div class="text-left">
                                                <div class="flex items-center">
                                                    <div class="font-medium">End Date</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="relative mt-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="calendar" class="lucide lucide-calendar absolute inset-y-0 left-0 z-10 my-auto ml-3 h-4 w-4 stroke-[1.3]"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect><line x1="16" x2="16" y1="2" y2="6"></line><line x1="8" x2="8" y1="2" y2="6"></line><line x1="3" x2="21" y1="10" y2="10"></line></svg>
                                            <input type="date" name="end_date" id="end_date" class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 rounded-[0.3rem] pl-9">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box box--stacked flex flex-col mt-5">
                <div class="box box--stacked flex flex-col">
                    <div class="table gap-y-2 p-5 sm:flex-row sm:items-center">
                        <div class="overflow-auto xl:overflow-visible">
                            <x-datatable id="shiftAssignmentTable" :url="$apiAddShiftAssignment" method="POST" class="display">
                                <x-slot:thead>
                                    <th data-value="id" data-render="getCheckBox" orderable="false">
                                        <input type="checkbox" name="employee_id" id="select-all" />
                                    </th>
                                    <th data-render="getFullName">Employee Name</th>
                                    <th data-value="company_id_rel" data-render="getCompany">Company</th>
                                    <th data-value="department_id_rel" data-render="getDepartment">Department</th>
                                    <th style="text-align: center" data-value="department_id_rel" data-render="getDesignation">Designation</th>
                                </x-slot:thead>
                            </x-datatable>
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
            getCompanies();
            getShiftType();
        });

        function getCheckBox(data, type, row, meta) {
            return `<input type="checkbox" name="employee_id" value="${data}">`;
        }

        function getFullName(data, type, row, meta) {
            if (data !== null) {
                return row.first_name + ' ' + row.last_name;
            }
            return 'N/A';
        }

        function getCompany(data, type, row, meta) {
           return data.company_name;
        }

        function getDepartment(data, type, row, meta) {
            return data?.department_name ? data.department_name : 'N/A';
        }

        function getDesignation(data, type, row, meta) {
            return data?.designation_name ? designation_name : 'N/A';
        }

        $('#select-all').on('click', function() {
            var isChecked = $(this).is(':checked');
            $('#shiftAssignmentTable tbody input[type="checkbox"]').prop('checked', isChecked);
        });

        async function getCompanies()
        {
            console.log('ok');
            
            var param = {
                url: "http://localhost:4444/api/v1/company",
                method: "GET",
                data: {
                    company_id: localStorage.getItem('company'),
                }
            }

            await transAjaxx(param).then((result) => {
                let companies = result.data;
                
                var html  = "";
                companies.forEach((company) => {
                html += `
                    <option value="${company.id}">
                        ${company.company_name}
                    </option>
                `  
                });
                $("#companies").html(html);
            }).catch((error) => {
                console.log(error);
            });
        }

        async function getShiftType()
        {
            let companyId = localStorage.getItem('company');
            var param = {
                url: "{{ $apiGetShiftType }}",
                method: "GET",
                data: {
                    company_id: localStorage.getItem('company'),
                }
            }

            await transAjax(param).then((result) => {
                let shift = result.data;

                var html  = "";
                shift.forEach((shift) => {
                html += `
                    <option value="${shift.id}">
                        ${shift.shift_type_name}
                    </option>
                `  
                });
                $("#shift").html(html);

            }).catch((error) => {
                console.log(error);
            });
        }

    //shift assignment
    $('#shiftAssignment').submit(async function(e) {
        e.preventDefault();

        const checkedEmployeeIds = [];
        document.querySelectorAll('input[name="employee_id"]:checked').forEach(checkbox => {
            checkedEmployeeIds.push(checkbox.value);
        });
        
        const checkedEmployeeIdsFilter = checkedEmployeeIds.filter(item => item !== 'on');
        if(checkedEmployeeIds.length <= 0) {
            return alert('Employee cannot be null');
        }
        
        var shiftId = $("#shift").val();
        var companyId = $("#companies").val();
        var start_date = $("#start_date").val()
        var end_date = $("#end_date").val()

        var param = {
            url: "{{ $apiShiftAssignmentPost }}",
            method: "POST",
            data: JSON.stringify({ 
                employee_ids: checkedEmployeeIdsFilter,
                shift_type_id: shiftId,
                company_id: companyId,
                start_date: start_date,
                end_date: end_date
            }),
            processData: false,
            contentType: false,
            cache: false,
        }

        sudmitButton(true);
        await transAjax(param).then((result) => {
            console.log(result);
            sudmitButton(false);
            showSuccessNotification("Shift Assignment", "This shift was successfully implemented.");
            setTimeout(() => {
                window.location.href = "/dashboard/hrms/attendance/shift-assignment";
            }, 3000);
        }).catch((err) => {
            sudmitButton(false);
            console.log(err);
        })
    });

    function sudmitButton(state) {
        if(state) {
            $("#submitBtn").html('Saving...');
            $("#submitBtn").attr('disabled', 'disabled');
        }else {
            $("#submitBtn").html('Save Changes');
            $("#submitBtn").removeAttr('disabled');
        }
    }
    // function showSuccessNotification(title, message) {
    //     var notificationContent = document.getElementById("success-notification-content");
    //     document.getElementById("success-title").textContent = title;
    //     document.getElementById("success-message").textContent = message;

    //     Toastify({
    //         node: $("#success-notification-content")
    //             .clone()
    //             .removeClass("hidden")[0],
    //         duration: 3000,
    //         newWindow: true,
    //         close: true,
    //         gravity: "top",
    //         position: "right",
    //         stopOnFocus: true,
    //     }).showToast();
    //     setTimeout(() => {
    //         window.location.href = "/dashboard/hrms/attendance/shift-assignment";
    //     }, 3000);
    // }
    </script>
@endpush