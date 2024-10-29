@extends('layouts.dashboard.app') 
@section('content')
<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
    @include('layouts.dashboard.menu')
    <div id="contents-page" class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
        <div class="container">
            <div class="flex col-2 md:h-10 md:flex-row md:items-center">
                    <!-- <div class="text-base font-medium group-[.mode--light]:text-white">
                    {{ $page_title }}
                    </div> -->
            </div>
            <div class="box box--stacked flex flex-col">
                <div class="flex flex-col gap-y-2 p-5 sm:flex-row sm:items-center">
                    <div class="text-base font-medium group-[.mode--light]:text-white">
                        {{ $page_title }}
                    </div>
                    <div class="flex flex-col gap-x-1 sm:flex-row md:ml-auto" id="assignShiftContainer">
                        <a href="{{ route("hrms.shift-assignment") }}"
                        class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md w-24">
                        <i data-tw-merge="" data-lucide="arrow-left" class="mr-3 h-4 w-4 stroke-[1.3]"></i> Back
                        </a>
                        <div data-tw-merge="" data-tw-placement="bottom-end" class="dropdown relative inline-block"><button data-tw-merge="" data-tw-toggle="dropdown" aria-expanded="false" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-blue-theme border-blue-theme text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200">
                            <svg class="mr-2 h-4 w-4 stroke-[1.3]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                                Add Shift Assignment</button>
                            <div data-transition="" data-selector=".show" data-enter="transition-all ease-linear duration-150" data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1" data-enter-to="!mt-1 visible opacity-100 translate-y-0" data-leave="transition-all ease-linear duration-150" data-leave-from="!mt-1 visible opacity-100 translate-y-0" data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1" class="dropdown-menu absolute z-[9999] hidden">
                                <div data-tw-merge="" class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600">
                                    <div class="p-2">
                                        <div>
                                            <div class="text-left text-slate-500">
                                                Select Shift
                                            </div>
                                            <select data-tw-merge="" id="shift" onchange="getShiftId(this.value)" name="shift" class="disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1 mt-2 flex-1">
                                        
                                            </select>
                                        </div>
                                        <div class="mt-4 flex items-center">
                                            <button type="button" data-tw-merge="" 
                                                class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&:hover:not(:disabled)]:bg-slate-100 [&:hover:not(:disabled)]:border-slate-100 [&:hover:not(:disabled)]:dark:border-darkmode-300/80 [&:hover:not(:disabled)]:dark:bg-darkmode-300/80 ml-auto w-32">
                                                Close
                                            </button>
                                            <form id="shiftAssignment">
                                                <button id="submitButton" type="submit" data-tw-merge="" 
                                                    class="mt-3 transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary ml-2 w-32">
                                                    Apply
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                    <th style="text-align: center" data-value="department_id_rel" data-render="getDesignation">Designantion</th>
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
            return data?.department_name ? department_name : 'N/A';
        }

        function getDesignation(data, type, row, meta) {
            return data?.designation_name ? designation_name : 'N/A';
        }

        $('#select-all').on('click', function() {
            var isChecked = $(this).is(':checked');
            $('#shiftAssignmentTable tbody input[type="checkbox"]').prop('checked', isChecked);
        });

        async function getShiftType()
        {
            let companyId = localStorage.getItem('company');
            var param = {
                url: "http://apidev.duluin.com/api/v1/companies/shift-type",
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
        var param = {
            url: "http://apidev.duluin.com/api/v1/attendance/shift-assignment",
            method: "POST",
            data: JSON.stringify({ 
                employee_ids: checkedEmployeeIdsFilter,
                shift_type_id: shiftId,
                company_id: localStorage.getItem('company'),
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
            $("#submitButton").html('Apply...');
            $("#submitButton").attr('disabled', 'disabled');
        }else {
            $("#submitButton").html('Apply');
            $("#submitButton").removeAttr('disabled');
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