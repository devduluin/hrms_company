@extends('layouts.dashboard.app')
@section('content')
<style>
    table.dataTable tbody th, table.dataTable tbody td {
    padding: 15px 10px; /* e.g. change 8x to 4px here */
}
</style>
<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
@include('layouts.dashboard.menu')
    <div class="content transition-[margin,width] duration-100 px-5 pt-[56px] pb-16 relative z-20 content--compact xl:ml-[275px] [&amp;.content--compact]:xl:ml-[91px]">
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
                    
                    <div data-tw-merge="" data-tw-placement="bottom-end" class="dropdown relative inline-block"><button data-tw-merge="" data-tw-toggle="dropdown" aria-expanded="false" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md  w-full sm:w-auto"><i data-tw-merge="" data-lucide="arrow-down-wide-narrow" class="mr-2 h-4 w-4 stroke-[1.3]"></i>
                            Filter
                            <span id="countFilter" class="ml-2 flex h-5 items-center justify-center rounded-full border bg-slate-100 px-1.5 text-xs font-medium">
                                
                            </span></button>
                        <div data-transition="" data-selector=".show" data-enter="transition-all ease-linear duration-150" data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1" data-enter-to="!mt-1 visible opacity-100 translate-y-0" data-leave="transition-all ease-linear duration-150" data-leave-from="!mt-1 visible opacity-100 translate-y-0" data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1" class="dropdown-menu absolute z-[9999] hidden">
                            <div data-tw-merge="" class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600">
                                <div class="p-2">
                                  <form method="GET" id="filterTable">
                                    <div>
                                        <x-form.select style="width: 111%;" id="employee_id" name="employee_id" data-method="POST" label="Employee Name" url="{{ url('dashboard/hrms/employee/create') }}"
                                            apiUrl="{{ $apiUrlEmployee }}/datatables_v2" columns='["first_name", "last_name"]' :selected='$selectedEmployee'
                                            :keys="[
                                                'company_id' => $company_id,
                                            ]">
                                            <option value="">Select Employee</option>
                                        </x-form.select>
                                    </div>
                                    <div>
                                        <x-form.select style="width: 111%;" id="attendanceStatus" name="attendance_status" label="Attendance">
                                            <option value="">Select All</option>
                                            <option value="present">Present</option>
                                            <option value="absent">Absent</option>
                                            <option value="halfday">Half Day</option>
                                            <option value="leave">Leave</option>
                                            <option value="wfh">WFH</option>
                                        </x-form.select>
                                    </div>
                                    <div class="mt-3">
                                        <x-form.select style="width: 111%;" id="status" name="status" label="Status">
                                            <option value="">Select All</option>
                                            <option value="submit">Submited</option>
                                            <option value="approved">Approved</option>
                                            <option value="rejected">Rejected</option>
                                        </x-form.select>
                                    </div>
                                    <div class="mt-3">
                                        <x-form.datepicker style="width: 111%;" label="Attendance Date" id="attendance_date" name="attendance_date"/>
                                    </div>
                                    <div class="mt-4 flex items-center">
                                        <button type="reset" onclick="resetForm()" data-tw-merge="" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&:hover:not(:disabled)]:bg-slate-100 [&:hover:not(:disabled)]:border-slate-100 [&:hover:not(:disabled)]:dark:border-darkmode-300/80 [&:hover:not(:disabled)]:dark:bg-darkmode-300/80 ml-auto w-32">Reset</button>
                                        <button type="submit" data-tw-merge="" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary ml-2 w-32">Apply</button>
                                    </div>
                                  </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <x-form.button id="new_attendance" label="Add New Attendance" style="primary" icon="plus" url="{{ route('hrms.attendance.create') }}" ></x-button>
                </div>
            </div>
            <div class="mt-3.5  gap-x-6 gap-y-10">
                <div class="col-span-12 flex flex-col gap-y-7 xl:col-span-9">
                    <div class="box box--stacked flex flex-col p-5">
                        <div id="alert" hidden>
                        <div class="flex flex-col gap-2 mb-4">
                            <div role="alert" class="alert relative border rounded-md px-5 py-4 bg-pending border-pending text-white dark:border-pending flex items-center"><i data-tw-merge data-lucide="alert-triangle" class="stroke-[1] w-5 h-5 mr-2 h-6 w-6 mr-2 h-6 w-6"></i>
                            <span id="alert-msg"></span>
                            </div>
                        </div>
                        </div>
                        <x-datatable id="attendanceTable" :url="$apiUrl.'/datatable'" method="POST" search="false" class="display nowrap" :order="[[ 2, 'DESC']]"
                        :filter="[
                                'attendance_status' => '#attendanceStatus',
                                'status' => '#status',
                            ]">
                            <x-slot:thead>
                            <th data-value="no" width="50px">No.</th>
                                    <th data-value="employee_id_rel"  data-render="getEmployeeName" orderable="false">Employee Name</th>
                                    <th data-value="shift_assigment_id_rel" data-render="getShiftAssignment" orderable="false">Shift Type</th>
                                    <th data-value="attendance_date" orderable="true">Date</th>
                                    <th data-value="time_in" orderable="true">Checkin time</th>
                                    <th data-value="time_out" orderable="true">Checkout time</th>
                                    <th data-value="attendance_status" data-render="getAttendanceStatus">Attendance</th>
                                    <th data-value="status" orderable="true" data-render="getStatus">Status</th>
                                    <th data-value="id" data-render="getActionBtn">Action</th>
                            </x-slot:thead>
                        </x-datatable>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    <script>
        function getStatus(data, type, row, meta) {         
            if (data === 'approved') {
                return `<div class="flex capitalize text-success"><div class="whitespace-nowrap"><i data-tw-merge data-lucide="check" class="text-success"></i> ${data}</div></div>`;
            } else  if (data === 'submit') {
                return `<div class="flex capitalize text-warning"><div class="whitespace-nowrap"><i data-tw-merge data-lucide="check" class="text-success"></i> ${data}</div></div>`;
            }else{
                return `<div class="flex capitalize text-danger"><div class="whitespace-nowrap">${data}</div></div>`;
            }
        }

        function getAttendanceStatus(data, type, row, meta) {
            
            if (data === 'present') {
                return `<div class="flex capitalize text-success"><div class="whitespace-nowrap"><i data-tw-merge data-lucide="check" class="text-success"></i> ${data}</div></div>`;
            } else  if (data === 'wfh' || data === 'leave') {
                return `<div class="flex capitalize text-warning"><div class="whitespace-nowrap"><i data-tw-merge data-lucide="check" class="text-success"></i> ${data}</div></div>`;
            }else{
                return `<div class="flex capitalize text-danger"><div class="whitespace-nowrap">${data}</div></div>`;
            }
        }

        function getEmployeeId(data, type, row, meta) {
            if (data !== null) {
                return data.employee_id;
            }
            return 'N/A';
        }

        function getEmployeeName(data, type, row, meta) {
            if (data) {
                let avatar = data.avatar 
                            ? `<img src="${data.avatar}" alt="User Avatar" class="tooltip cursor-pointer rounded-full shadow-[0px_0px_0px_2px_#fff,_1px_1px_5px_rgba(0,0,0,0.32)] dark:shadow-[0px_0px_0px_2px_#3f4865,_1px_1px_5px_rgba(0,0,0,0.32)]" data-placement="top">`
                            : `<img src="{{ asset('/img/3725294.png') }}" alt="Default Avatar" class="tooltip cursor-pointer rounded-full shadow-[0px_0px_0px_2px_#fff,_1px_1px_5px_rgba(0,0,0,0.32)] dark:shadow-[0px_0px_0px_2px_#3f4865,_1px_1px_5px_rgba(0,0,0,0.32)]" data-placement="top">`;

                const html = `<div class="flex items-center">
                    <div class="image-fit zoom-in h-9 w-9">
                        ${avatar}
                    </div>
                    <div class="ml-3.5">
                        <a class="whitespace-nowrap font-medium" href="{{ url('/dashboard/hrms/employee/edit_employee') }}/${row.id}">
                            ${data.first_name} ${data.last_name}
                        </a>
                        <div class="mt-0.5 whitespace-nowrap text-xs text-slate-500">
                            ${data.employee_id}
                        </div>
                    </div>
                </div>`;

                return html;
            }
            return 'N/A';
        }

        function getShiftAssignment(data, type, row, meta) {
            if (data?.shift_type_id_rel) {
                return data.shift_type_id_rel?.shift_type_name;
            }
            return 'N/A';
        }

        function getActionBtn(data, type, row, meta) {
            const url = `{{ url('dashboard/hrms/attendance/detail/${data}') }}`;
            return `<div data-tw-merge data-tw-placement="bottom-end" class="dropdown relative"><button data-tw-merge data-tw-toggle="dropdown" aria-expanded="false" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none  [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed text-xs py-1.5 px-2 w-20">
            <i class="fa-solid fa-list text-base"></i></button>
                <div data-transition data-selector=".show" data-enter="transition-all ease-linear duration-150" data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1" data-enter-to="!mt-1 visible opacity-100 translate-y-0" data-leave="transition-all ease-linear duration-150" data-leave-from="!mt-1 visible opacity-100 translate-y-0" data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1" class="dropdown-menu absolute z-[9999] hidden">
                    <div data-tw-merge class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600 w-40">
                       
                        <a onClick="action('detail', '`+data['id']+`')" class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge data-lucide="external-link" class="stroke-[1] w-5 h-5 w-4 h-4 mr-2 w-4 h-4 mr-2"></i>
                            Detail</a>
                        <a onClick="action('update', '`+data['id']+`')" class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge data-lucide="external-link" class="stroke-[1] w-5 h-5 w-4 h-4 mr-2 w-4 h-4 mr-2"></i>
                            Update</a>
                        <a onClick="action('delete', '`+data['id']+`')" class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge data-lucide="file-text" class="stroke-[1] w-5 h-5 w-4 h-4 mr-2 w-4 h-4 mr-2"></i>
                            Delete</a>
                        
                    </div>
                </div>
            </div>`;
        }

        function action(action, id){
            if(action === 'delete'){
                const path    = `{{ $apiUrl }}/`+id;
                Swal.fire({
                    title: "Are you sure?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        destroy(action, path)
                    }else{
                        attendanceTable.ajax.reload();
                    }
                });
            }else{
                location.href = '{{ url("/dashboard/hrms/attendance") }}/'+action+'/'+id;
            }
            
        }

        async function destroy(method, path){
            try {
                const response = await $.ajax({
                    url: path,
                    type: method,
                    contentType: 'application/json',
                    headers: {
                        'Authorization': `Bearer ${appToken}`,
                        'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`
                    },
                    dataType: 'json'
                });

                Swal.fire({
                    title: "Deleted!",
                    icon: "success"
                });
                attendanceTable.ajax.reload();
            } catch (xhr) {
                console.log(xhr);
                if (xhr.status === 422) {
                    const errorString = result.error || 'An error occurred.';
                    showErrorNotification('error', `There were errors. Message : ${result.message}`, errorString);
                } else {
                    showErrorNotification('error', 'An error occurred while processing your request.');
                }
                // activateTab(formId);
            }
        }

        function resetForm() {
            $(`#status`)[0].tomselect.clear();
            $(`#attendance_status`)[0].tomselect.clear();
            $(`#employee_id`)[0].tomselect.clear();
            $(`#attendance_date`).val("");
        }
        
        $(document).ready(function () {
            const urlParams = new URLSearchParams(window.location.search);
            let activeFilterCount = 0;

            const handleFilter = (paramName, selectorId) => {
                if (urlParams.has(paramName)) {
                    const paramValue = urlParams.get(paramName);
                    const $selectElement = $(`#${selectorId}`);

                    if(paramName === "status"){
                        $(`#status`)[0].tomselect.setValue(paramValue);
                    }

                    if(paramName === "attendance_status"){
                        $(`#attendance_status`)[0].tomselect.setValue(paramValue);
                    }

                    if(paramName === "attendance_date"){
                        $(`#attendance_date`).val(paramValue);
                    }

                    if ($selectElement.length > 0) {
                        $selectElement.val(paramValue).change();
                        if (paramValue) activeFilterCount++;
                    }
                }
            };

            // Call the function for each filter
            handleFilter("attendance_date", "attendance_date");
            handleFilter("status", "status");
            handleFilter("attendance_status", "attendanceStatus");
            handleFilter("employee_id", "employee_id");

            const $countFilter = $("#countFilter");
            if ($countFilter.length > 0) {
                $countFilter.text(activeFilterCount);
            }

            const table = $('#attendanceTable').DataTable();
            table.on('xhr', function (e, settings, json) {
                console.log(json); // Log the fetched data
            });
        });

        

    async function getDataChart()
    {
        const data = {company_id : '{{$company_id}}', status : 'submit'};
        const param = {
            url: "{{ $apiCountAttendance }}",
            method: "GET",
            data: data,
        }

        await transAjax(param).then((result) => {
            
            if(result){
                const total = result.data?.total;
                $('#alert').attr('hidden', false)
                $('#alert-msg').html(`There are <a href="{{url('dashboard/hrms/attendance/attendance?status=submit')}}">${total} employee</a> attendance records that need to be approved.`)
            }

        }).catch((error) => {
            console.log(error);
        });

    }
    getDataChart();
    </script>
@endpush
@include('vendor-common.sweetalert')