@extends('layouts.dashboard.app')
@section('content')

<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
@include('layouts.dashboard.menu')
    <div class="content transition-[margin,width] duration-100 px-5 pt-[56px] pb-16 relative z-20 content--compact xl:ml-[275px] [&amp;.content--compact]:xl:ml-[91px]">
        <div class="mt-[65px] col-span-12 w-full">
            <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                <div class="text-lg font-medium group-[.mode--light]:text-white">
                    {{ $page_title ?? '' }}
                </div>
                <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                    <button onclick="history.go(-1)"
                        class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md w-24">
                        <i data-tw-merge="" data-lucide="arrow-left" class="mr-3 h-4 w-4 stroke-[1.3]"></i> Back
                    </button>
                    <div data-tw-merge="" data-tw-placement="bottom-end" class="dropdown relative inline-block"><button data-tw-merge="" data-tw-toggle="dropdown" aria-expanded="false" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md  w-full sm:w-auto"><i data-tw-merge="" data-lucide="arrow-down-wide-narrow" class="mr-2 h-4 w-4 stroke-[1.3]"></i>
                        Filter
                        <span id="countFilter" class="ml-2 flex h-5 items-center justify-center rounded-full border bg-slate-100 px-1.5 text-xs font-medium">
                            
                        </span></button>
                        <div data-transition="" data-selector=".show" data-enter="transition-all ease-linear duration-150" data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1" data-enter-to="!mt-1 visible opacity-100 translate-y-0" data-leave="transition-all ease-linear duration-150" data-leave-from="!mt-1 visible opacity-100 translate-y-0" data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1" class="dropdown-menu absolute z-[9999] hidden">
                            <div data-tw-merge="" class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600">
                                <div class="p-2">
                                  <form method="GET" id="filterTable">
                                    <div class="mt-3">
                                        <x-form.select id="employee_id" name="employee_id" data-method="POST" style="width: 110%;"
                                            label="Employee" url="{{ url('dashboard/hrms/employee/create') }}"
                                            apiUrl="{{ $apiUrlEmployee }}/datatables"
                                            columns='["first_name", "last_name"]' :selected='$selectedEmployee'
                                            :keys="[
                                                'company_id' => $company_id,
                                            ]">
                                            <option value="">Select Employee</option>
                                        </x-form.select>
                                    </div>
                                    <div class="mt-3">
                                        <x-form.select id="shift_type_id" name="shift_type_id" data-method="POST" style="width: 110%;" label="Shift Type Name" url="{{ url('dashboard/hrms/attendance/shift_type/create') }}"
                                            apiUrl="{{ $apiUrlShiftType }}/datatable" columns='["shift_type_name"]' :selected='$selectedShiftType'
                                            :keys="[
                                                'company_id' => $company_id,
                                            ]">
                                            <option value="">Select Shift Type</option>
                                        </x-form.select>
                                    </div>
                                    <div class="mt-3">
                                        <x-form.select style="width: 111%;" id="is_active" name="is_active" label="Status" data-method="POST">
                                            <option value="">Select Status</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </x-form.select>
                                    </div>
                                    <div class="mt-4 flex items-center">
                                        <button type="reset" data-tw-merge="" onclick="resetForm()" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&:hover:not(:disabled)]:bg-slate-100 [&:hover:not(:disabled)]:border-slate-100 [&:hover:not(:disabled)]:dark:border-darkmode-300/80 [&:hover:not(:disabled)]:dark:bg-darkmode-300/80 ml-auto w-32">Reset</button>
                                        <button type="submit" data-tw-merge="" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary ml-2 w-32">Apply</button>
                                    </div>
                                  </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <x-form.button id="new_shift_assigment" label="Add Shift Assigment" style="primary" icon="plus" url="{{ route('hrms.shift-assignment.create') }}" ></x-button>
                </div>
            </div>
            <div class="mt-3.5  gap-x-6 gap-y-10">
                <!-- <div class="relative col-span-12 xl:col-span-3">
                    <div class="sticky top-[104px]">
                        @include('components._asside_company')
                    </div>
                </div> -->
                <div class="col-span-12 flex flex-col gap-y-7 xl:col-span-9">
                    <div class="box box--stacked flex flex-col p-5">
                        <x-datatable id="shiftAssigmentTable" :url="$apiUrl.'/datatable'" method="POST" class="display small" :filter="[
                                'employee_id_rel' => '#employee_id',
                                'shift_type_id_rel' => '#shift_type_id',
                                'status' => '#status',
                            ]">
                            <x-slot:thead>
                            <th data-value="no" width="60px">No.</th>
                                    <th data-value="employee_id_rel"  data-render="getEmployeeName">Employee Name</th>
                                    <th data-value="shift_type_id_rel" data-render="getShiftName">Shift Type Name</th>
                                    <th data-value="start_date" data-render="dateFormat">Start Date</th>
                                    <th data-value="end_date" data-render="dateFormat">End Date</th>
                                    <th data-value="shift_type_id_rel" data-render="getShiftTimeIn">Time In</th>
                                    <th data-value="shift_type_id_rel" data-render="getShiftTimeOut">Time Out</th>
                                    <th data-value="status" data-render="getStatus">Status</th>
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
            
            if (data === 'active') {
                return `<div class="flex capitalize text-success"><div class="whitespace-nowrap"><i data-tw-merge data-lucide="check" class="text-success"></i> ${data}</div></div>`;
            } else {
                return `<div class="flex capitalize text-danger"><div class="whitespace-nowrap">${data}</div></div>`;
            }
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
                        <a class="whitespace-nowrap font-medium" href="{{ url('/dashboard/hrms/employee/edit_employee') }}/${data.id}">
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

        function getShiftName(data, type, row, meta) {  
            if (data) {   
                return '<a href="{{ url('dashboard/hrms/attendance/shift_type/update/') }}/'+data.id+'" data-placement="top" title="Click to see detail!"><div class=" px-1.5 w-full [&:hover:not(:disabled)]:bg-slate-100 [&:hover:not(:disabled)]:border-slate-100 [&:hover:not(:disabled)]:dark:border-darkmode-300/80 [&:hover:not(:disabled)]:dark:bg-darkmode-300/80">'+data.shift_type_name+'</div></a>';
            }
            return 'N/A';
        }
 
        function getShiftTimeIn(data, type, row, meta) {
            if (row) {
                return data.start_time;
            }
            return 'N/A';
        }

        function getShiftTimeOut(data, type, row, meta) {
            if (row) {
                return data.end_time;
            }
            return 'N/A';
        }

        function dateFormat(utcDateStr) {
            const utcDate = new Date(utcDateStr);

            const options = {
                timeZone: 'Asia/Jakarta',
                year: 'numeric',
                month: '2-digit',
                day: '2-digit',
             
            };

            return utcDate.toLocaleString('en-GB', options); // Combined date and time
        }

        function getActionBtn(data, type, row, meta) {
            const url = `{{ url('dashboard/hrms/attendance/detail/${data}') }}`;
            return `<div data-tw-merge data-tw-placement="bottom-end" class="dropdown relative"><button data-tw-merge data-tw-toggle="dropdown" aria-expanded="false" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none  [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed text-xs py-1.5 px-2 w-20">
            <i class="fa-solid fa-list text-base"></i></button>
                <div data-transition data-selector=".show" data-enter="transition-all ease-linear duration-150" data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1" data-enter-to="!mt-1 visible opacity-100 translate-y-0" data-leave="transition-all ease-linear duration-150" data-leave-from="!mt-1 visible opacity-100 translate-y-0" data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1" class="dropdown-menu absolute z-[9999] hidden">
                    <div data-tw-merge class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600 w-40">
                       
                         
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
                    //text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        destroy(action, path)
                    }else{
                        shiftAssigmentTable.ajax.reload();
                    }
                });
            }else{
                location.href = '{{ url("/dashboard/hrms/attendance/shift-assignment") }}/'+action+'/'+id;
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
                shiftAssigmentTable.ajax.reload();
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
            //$(`#company_id`)[0].tomselect.clear();
            $(`#employee_id`)[0].tomselect.clear();
            $(`#shift_type_id`)[0].tomselect.clear();
            $(`#is_active`)[0].tomselect.clear();
        }

        $(document).ready(function () {
            const urlParams = new URLSearchParams(window.location.search);
            let activeFilterCount = 0;

            const handleFilter = (paramName, selectorId) => {
                if (urlParams.has(paramName)) {
                    const paramValue = urlParams.get(paramName);
                    const $selectElement = $(`#${selectorId}`);

                    if(paramName === "is_active"){
                        $(`#is_active`)[0].tomselect.setValue(paramValue);
                    }

                    if ($selectElement.length > 0) {
                        $selectElement.val(paramValue).change();
                        if (paramValue) activeFilterCount++;
                    }
                }
            };

            // Call the function for each filter
            handleFilter("employee_id", "employee_id");
            handleFilter("shift_type_id", "shift_type_id");
            handleFilter("is_active", "is_active");

            const $countFilter = $("#countFilter");
            if ($countFilter.length > 0) {
                $countFilter.text(activeFilterCount);
            }

            const table = $('#shiftAssigmentTable').DataTable();
            table.on('xhr', function (e, settings, json) {
                console.log(json); // Log the fetched data
            });
        });
    </script>
@endpush
@include('vendor-common.sweetalert')