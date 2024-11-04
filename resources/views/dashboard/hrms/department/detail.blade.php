@extends('layouts.dashboard.app')
@section('content')
@push('css')
    <style>
        .hidden {
            display: none;
        }
    </style>
@endPush
<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
@include('layouts.dashboard.menu')
    <div class="content transition-[margin,width] duration-100 px-5 pt-[56px] pb-16 relative z-20 content--compact xl:ml-[275px] [&amp;.content--compact]:xl:ml-[91px]">
        <div class="container mt-[65px]">
            <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                <div class="text-base font-medium group-[.mode--light]:text-white">
                    {{ $title ?? '' }}
                </div>
                <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                    <button onclick="history.go(-1)"
                        class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md w-24">
                        <i data-tw-merge="" data-lucide="arrow-left" class="mr-3 h-4 w-4 stroke-[1.3]"></i> Back
                    </button>
                    <button id="submitBtn" data-tw-merge=""
                            class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-blue-theme border-blue-theme text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200"><i
                                data-tw-merge="" data-lucide="save" class="mr-3 h-4 w-4 stroke-[1.3]"></i>
                            <span id="loadingText">Save Changes</span>
                    </button>
                </div>
            </div>
            <div class="mt-3.5 grid grid-cols-12 gap-x-6 gap-y-10">
                <div class="col-span-12 flex flex-col gap-y-7 sm:col-span-12 xl:col-span-12">
                    <form id="form-submit" method="post" action="{{ $apiUrl }}">
                        <div class="box box--stacked flex flex-col p-5">
                            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-4">
                                <input type="hidden" name="is_group" value="true">
                                <div class="gap-x-6 gap-y-10 ">
                                <x-form.select id="company_id" disabled name="company_id" data-method="POST" label="Company Name" url="{{ url('dashboard/hrms/company/new_company') }}" required="true" 
                                    apiUrl="{{ $apiCompanyUrl }}" columns='["company_name"]' :selected="$company"
                                    :keys="[
                                        'company_id' => $company,
                                    ]">
                                    <option value="">Select Company</option>
                                </x-form.select>
                                </div>
                                <div class="gap-x-6 gap-y-10 ">
                                <x-form.select id="parent_department_id" name="parent_department_id" data-method="POST" label="Parent Department" url="{{ url('dashboard/hrms/department/create') }}"
                                    apiUrl="{{ $apiDepartmentUrl }}" columns='["department_name"]'  
                                    :keys="[
                                        'company_id' => $company,
                                    ]">
                                    <option value="">Select Department</option>
                                </x-form.select>
                                </div>
                                <div class="gap-x-6 gap-y-10 ">
                                    <x-form.input id="department_name" name="department_name" label="Department Name" required="true" placholder="" value="{{request()->get('item')}}"/>
                                </div>
                               
                                <div class="gap-x-6 gap-y-10 ">
                                    <div class="mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-64">
                                        <div class="text-left">
                                            <div class="flex items-center">
                                                <div class="font-medium">Status</div>
                                            </div>
                                        </div>
                                        <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3"></div>
                                    </div>
                                    <div class="mt-3 w-96 flex-1 xl:mt-0">
                                        <select required name="status" data-title="Language" data-placeholder="Select your language" class="tom-select w-full" sclass="tom-select disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10"">
                                            
                                            <option value="enable">
                                                Enable
                                            </option>
                                            <option value="disable">
                                                Disable
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            
                            </div>
                                
                        </div>
                             
                    </form>
                 
                <form id="approver-form" method="post"
                    action="#">
                    @csrf
                    <div class="box box--stacked flex flex-col p-5">
                    <div class=" gap-5 mt-2">
                        
                        <div class="card-body">
                            <div class="relative mb-4 mt-2 rounded-[0.6rem] border border-slate-200/80 dark:border-darkmode-400 mr-5">
                                <div class="absolute left-0 -mt-2 ml-4 bg-white px-3 text-xs uppercase text-slate-500">
                                    <div class="-mt-px">Shift Approver</div>
                                </div>
                                <div class="mt-2 flex flex-col gap-3.5 px-5 py-5">
                                    <div class="preview relative">
                                        <div class="overflow-x-auto">
                                            <table class="w-full text-left table-earning-editable table-edits">
                                                <thead class="bg-slate-200/60 dark:bg-slate-200">
                                                    <tr>
                                                        <th
                                                            class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                                            No</th>
                                                        <th
                                                            class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                                            Name</th>
                                                        <th
                                                            class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                                            Email</th>
                                                        
                                                        <th
                                                            class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                                            <i data-lucide="settings" class="inline-block h-5 w-5 mr-2"></i>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="editable-shift-table"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="mb-7">
                                      <button type="button" id="add-shift-row"
                                            class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium text-xs cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-slate-200 text-slate-700 dark:border-danger shadow-md w-100">Add
                                            New Shift Approver</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="card-body">
                            <div class="relative mb-4 mt-4 rounded-[0.6rem] border border-slate-200/80 dark:border-darkmode-400 mr-5">
                                <div class="absolute left-0 -mt-2 ml-4 bg-white px-3 text-xs uppercase text-slate-500">
                                    <div class="-mt-px">Leave Approver</div>
                                </div>
                                <div class="mt-2 flex flex-col gap-3.5 px-5 py-5">
                                    <div class="preview relative">
                                        <div class="overflow-x-auto">
                                            <table class="w-full text-left table-earning-editable table-edits">
                                                <thead class="bg-slate-200/60 dark:bg-slate-200">
                                                    <tr>
                                                    <th
                                                            class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                                            No</th>
                                                        <th
                                                            class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                                            Name</th>
                                                        <th
                                                            class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                                            Email</th>
                                                         
                                                        <th
                                                            class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                                            <i data-lucide="settings" class="inline-block h-5 w-5 mr-2"></i>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="editable-leave-table"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="mb-7">
                                        <button type="button" id="add-leave-row"
                                            class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium text-xs cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-slate-200 text-slate-700 dark:border-danger shadow-md w-100">Add
                                            New Leave Approver</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="relative mb-4 mt-4 rounded-[0.6rem] border border-slate-200/80 dark:border-darkmode-400 mr-5">
                                <div class="absolute left-0 -mt-2 ml-4 bg-white px-3 text-xs uppercase text-slate-500">
                                    <div class="-mt-px">Expense Approver</div>
                                </div>
                                <div class="mt-2 flex flex-col gap-3.5 px-5 py-5">
                                    <div class="preview relative">
                                        <div class="overflow-x-auto">
                                            <table class="w-full text-left table-earning-editable table-edits">
                                                <thead class="bg-slate-200/60 dark:bg-slate-200">
                                                    <tr>
                                                    <th
                                                            class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                                            No</th>
                                                        <th
                                                            class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                                            Name</th>
                                                        <th
                                                            class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                                            Email</th>
                                                         
                                                        <th
                                                            class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                                            <i data-lucide="settings" class="inline-block h-5 w-5 mr-2"></i>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="editable-expense-table"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="mb-7">
                                        <button type="button" id="add-expense-row"
                                            class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium text-xs cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-slate-200 text-slate-700 dark:border-danger shadow-md w-100">Add
                                            New Expense Approver</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="mt-6 flex border-t border-dashed border-slate-300/70 pt-5 md:justify-end">
                        <x-form.button label="Save changes" id="earning-btn" style="primary" type="button" icon="save" />
                    </div>
                    </div>
                    
                </form>
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
<script type="text/javascript">
    
    let currentForm = $("#form-submit");
    let id   = '{{$id ?? ''}}';
    let method      = 'POST';
    let path        = currentForm.attr('action');
    let company_id  = '';
    let headers     = {
                        'Authorization': `Bearer ${appToken}`,
                        'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`
                    };

    async function handleGetData(id, currentForm) {
        path    = `{{ $apiUrl }}/`+id;
        $.ajax({
            url: path,
            type: 'GET',
            headers: headers,
            dataType: 'json',
            success: await
            function(response) {   
                if (response.success == true) {                    
                     
                    method  = 'PATCH';
                    company_id = response.data.company_id;
                    $("select[name=company_id]").val(response.data.company_id).change();
                    $("select[name=parent_department_id]").val(response.data.parent_department_id).change();
                    $("input[name=department_name]").val(response.data.department_name)
                    getResponseApprovers();
                } else {
                    showErrorNotification('error', response.message);
                }
            },
            error: function(xhr) {
                const response = JSON.parse(xhr.responseText);
                handleErrorResponse(response, currentForm);
            }
        });
        return false;
    }

    $("#form-submit").submit(async function (e) {
        e.preventDefault();
        
        const data = serializeFormData(currentForm);
        
        try {
            const response = await $.ajax({
                url: path,
                type: method,
                contentType: 'application/json',
                headers: headers,
                data: JSON.stringify(data),
                dataType: 'json'
            });

            handleResponse(response);
        } catch (xhr) {
            console.log(xhr);
            if (xhr.status === 422) {
                console.log(xhr.responseText);
                const response = JSON.parse(xhr.responseText);
                handleErrorResponse(response, currentForm);
            } else {
                showErrorNotification('error', 'An error occurred while processing your request.');
            }
            
        }
        $('#submitBtn').attr('disable', false);
        $('#loadingText').html('Save Changes');
    });

    function serializeFormData(form) {
        const formData = form.serializeArray();
        const data = {};
        formData.forEach(field => {
            data[field.name] = field.value;
        });
        return data;
    }

    function handleResponse(response) {
        if (response.success == true) {
            showSuccessNotification(response.message, "The operation was completed successfully.");
            handleGetData(id, currentForm);
        } else {
            showErrorNotification('error', response.message);
        }
    }

    function handleErrorResponse(result, tabId) {
        const errorString = result.error || 'An error occurred.';
        showErrorNotification('error',
            `There were validation errors on tab ${tabId}. Message : ${result.message}`, errorString);
        const errorMessages = errorString.split(', ');

        $('.error-message').remove();

        const errorPattern = /\"([^\"]+)\"/g;
        let match;

        while ((match = errorPattern.exec(errorMessages)) !== null) {
            const field = match[1];
            if (field !== 'employee_id') {
                let fieldName = field.replace(/_/g, " ").replace(/\b\w/g, char => char.toUpperCase());
                const input = $(`[name="${field}"]`);

                input.addClass('is-invalid');
                input.before(
                    `<div class="error-message text-danger mt-1 text-xs sm:ml-auto sm:mt-0 mb-2">${fieldName} is not allowed to be empty</div>`
                );
            }
        }

        const firstErrorField = $('.error-message').first();
        if (firstErrorField.length) {
            $('html, body').animate({
                scrollTop: firstErrorField.offset().top - 100
            }, 500);
        }
    }

    if(id){
        handleGetData(id, currentForm);
    }

    $('#submitBtn').on('click', function (e) {
        e.preventDefault();
        $(this).attr('disable', true);
        $('#loadingText').html('Saving...');
        
        $("#form-submit").submit();
        //$("#approver-form").submit();
    });

        let shiftRowCount = 0;
        let leaveRowCount = 0;
        let expenseRowCount = 0;

        async function getResponseApprovers(){
            const data = {
                    company_id: company_id,
                    department_id: id,
                    "draw": 0,
                    "start": 0,
                    "length": 10,
                };

            try {
                const response = await $.ajax({
                    url: '{{ $apiUrlApprover }}/datatable',
                    type: 'POST',
                    contentType: 'application/json',
                    headers: headers,
                    data: JSON.stringify(data),
                    dataType: 'json'
                });
                document.getElementById('editable-shift-table').innerHTML = '';
                document.getElementById('editable-leave-table').innerHTML = '';
                document.getElementById('editable-expense-table').innerHTML = '';
                $.each(response.data, function(k, v) {
                    
                    if(v.approve_type == 'shift_request'){
                       
                        addRowToTable('editable-shift-table', 'shiftRowCount', v);
                    }else{
                        //document.getElementById('editable-'+v.approve_type+'-table').innerHTML = '';
                        addRowToTable('editable-'+v.approve_type+'-table', v.approve_type+'RowCount', v);
                    }
                });
                
            } catch (xhr) {
                console.log(xhr);
                if (xhr.status === 422) {
                    console.log(xhr.responseText);
                    const response = JSON.parse(xhr.responseText);
                    handleErrorResponse(response, currentForm);
                } else {
                   // showErrorNotification('error', 'An error occurred while processing your request.');
                }
                
            }
        }
        
        function createTableRow(rowId, tableId, data = null) {
             
            let rowNumber = document.querySelectorAll('#' + tableId + ' tr').length + 1;
            const componentType = tableId === 'editable-shift-table' ? 'editable-leave-table' : 'editable-expense-table';
            let amountData = (data) === null ? 0 : data.amount;
            let rowDataId = (data) === null ? null : data.id;
            let employee_id = (data) === null ? null : data.employee_id
            let email = (data) === null ? null : data.employee_id_rel.addressContact.personal_email
            //let designation_name = (data) === null ? null : 'data.employee_id_rel.designation_id_rel.designation_name'
            handleGetComponent(rowNumber, tableId, data);
            return `<tr id="${rowId}">
                    <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t">${rowNumber} <input name="type" value="${componentType}" type="hidden"></td>
                    <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t">
                        <select name="employee_id" class="disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1" id="getComponent-${tableId}-${rowNumber}" onChange="handleGetElement('${rowNumber}', '${tableId}')">
                            <option value="">Select Approver</option>
                        </select>
                        <!-- Preloader (initially hidden) -->
                        <div class="col-span-6 flex flex-col items-center justify-end sm:col-span-3 xl:col-span-2">
                         
                        </div>
                    </td>
                    <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t"><span id="getCol-2-${tableId}-${rowNumber}">${email}</span></td>
                    <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t" width="100px">
                        <button type="button" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed text-xs py-1.5 px-2 bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&:hover:not(:disabled)]:bg-slate-100 [&:hover:not(:disabled)]:border-slate-100 [&:hover:not(:disabled)]:dark:border-darkmode-300/80 [&:hover:not(:disabled)]:dark:bg-darkmode-300/80 w-24 w-24" onclick="deleteRow('${rowId}', '${tableId}', '${rowDataId}')">Delete</button>
                    </td>
                </tr>`;
            // $('#' + tableId).append(rowHtml);
            if (data && typeof data.amount !== 'undefined') {
                $('#getInputComponent-' + componentType + '-' + rowNumber).val(data.amount);
            }
        }

        function handleGetComponent(rowId, tableId, data = null) {
            const appToken = localStorage.getItem("app_token");
            const componentType = tableId === 'editable-shift-table' ? 'editable-leave-table' : 'editable-expense-table';
            const $selectElement = $(`#getComponent-${tableId}-${rowId}`);
            const $col_2_Element = $(`#getCol-2-${tableId}-${rowId}`);
           // const $preloader = $('#preloader-' + tableId + '-' + rowId);
            if ($selectElement.find('option').length > 1) {
                return;
            }

            //$preloader.show();

            $.ajax({
                url: '{{ $apiUrlEmployee }}',
                method: 'POST',
                data: JSON.stringify({
                    company_id: localStorage.getItem("company"),
                    "type": componentType,
                    "draw": 0,
                    "start": 0,
                    "length": 10,
                }),
                contentType: 'application/json',
                dataType: 'json',
                headers: headers,
                success: function(response) {
                    const rowComponents = response.data;
                    const $selectElement = $('#getComponent-' + tableId + '-' + rowId);
                    var selected = '';
                    var selectOption = '';
                    $.each(rowComponents, function(index, component) {
                        var employee_id = (data) === null ? null : data.employee_id
                        if(employee_id == component.id){
                            selected = 'selected';
                        }
                        selectOption +='<option value="'+component.id+'" '+selected+' data-email="'+component.addressContact.personal_email+'" data-designation="">'+component.first_name+' '+component.last_name+'</option>'
                        
                    });

                    $selectElement.append(selectOption);
                     
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching salary components:", error);
                     
                }
            });
        }

        function handleGetElement(rowId, tableId){
            const $selectElement = $(`#getComponent-${tableId}-${rowId}`);
            const $selectedOption = $selectElement.find('option:selected');
            $(`#getCol-2-${tableId}-${rowId}`).html($selectedOption.data('email'));
            $(`#getCol-3-${tableId}-${rowId}`).html($selectedOption.data('designation'));

            postRow(rowId, tableId, $selectedOption);
            console.log(rowId+' '+ tableId);
        }

        async function postRow(rowId, tableId, data = null) {
            if(tableId.split('-')[1] == 'shift'){
                approve_type = 'shift_request';
            }else{
                approve_type = tableId.split('-')[1];
            }
            var data = {
                company_id: company_id, 
                department_id: id, 
                approve_type: approve_type, 
                employee_id: data.val(),  
                status: 'enable'  
            };

            try {
                const response = await $.ajax({
                    url: '{{ $apiUrlApprover }}',
                    type: 'POST',
                    contentType: 'application/json',
                    headers: headers,
                    data: JSON.stringify(data),
                    dataType: 'json'
                });
                showSuccessNotification(response.message, "The operation was completed successfully.");
                
                getResponseApprovers();
            } catch (xhr) {
                console.log(xhr);
                if (xhr.status === 422) {
                    console.log(xhr.responseText);
                    const response = JSON.parse(xhr.responseText);
                    handleErrorResponse(response, currentForm);
                } else {
                    showErrorNotification('error', 'An error occurred while processing your request.');
                }
                
            }
        }

        function addRowToTable(tableId, rowCountVar, data = null) {
            if (typeof window[rowCountVar] === 'undefined' || isNaN(window[rowCountVar])) {
                window[rowCountVar] = 0;
            }
            
            const tableBody = document.getElementById(tableId);
            const rowId = `${tableId}-row-${++window[rowCountVar]}`;
            
            tableBody.insertAdjacentHTML('beforeend', createTableRow(rowId, tableId, data));
            
           
        }

        function deleteRow(rowId, tableId, id = null) {
            if (id != null) {
                $.ajax({
                    url: `{{ $apiUrlApprover }}/${id}`,
                    method: 'DELETE',
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem("app_token")}`,
                        "X-Forwarded-Host": `${window.location.protocol}//${window.location.hostname}`,
                    },
                    success: function(response) {
                        showSuccessNotification('approver deleted successfully', "The operation was completed successfully.");
                        
                        getResponseApprovers()
                        updateRowNumbers(tableId);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error deleting approver :", error);
                    }
                });
            } else {
                document.getElementById(rowId).remove();
                updateRowNumbers(tableId);
            }
        }

        function updateRowNumbers(tableId) {
            const rows = document.querySelectorAll(`#${tableId} tr`);
            rows.forEach((row, index) => {
                row.querySelector('td:first-child').innerText = index + 1;
            });
        }

        $('#add-shift-row').on('click', function() {
            addRowToTable('editable-shift-table', 'shiftRowCount');
        });

        $('#add-leave-row').on('click', function() {
            addRowToTable('editable-leave-table', 'leaveRowCount');
        });

        $('#add-expense-row').on('click', function() {
            addRowToTable('editable-expense-table', 'expenseRowCount');
        });

        function editRow(rowId) {
            alert('Edit functionality is not yet implemented!');
        }
    </script>
@endpush