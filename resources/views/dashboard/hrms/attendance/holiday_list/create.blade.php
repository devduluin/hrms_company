@extends('layouts.dashboard.app')
@section('content')

<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
@include('layouts.dashboard.menu')
    <div class="content transition-[margin,width] duration-100 px-5 pt-[56px] pb-16 relative z-20 content--compact xl:ml-[275px] [&amp;.content--compact]:xl:ml-[91px]">
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
                    <button id="submitBtn" data-tw-merge=""
                            class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-blue-theme border-blue-theme text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200"><i
                                data-tw-merge="" data-lucide="save" class="mr-3 h-4 w-4 stroke-[1.3]"></i>
                            <span id="loadingText">Save Changes</span>
                    </button>
                </div>
            </div>
            <div class="mt-3.5 grid grid-cols-12 gap-x-6 gap-y-10">
                <!-- <div class="relative col-span-12 xl:col-span-3">
                    <div class="sticky top-[104px]">
                        @include('components._asside_company')
                    </div>
                </div> -->
                <div class="col-span-12 flex flex-col gap-y-7 sm:col-span-12 xl:col-span-12">
                    <form id="form-submit" method="post" action="{{ $apiUrl }}">
                        <input type="hidden" name="company_id" value="{{ $company_id }}">
                        <div class="box box--stacked flex flex-col p-5">

                            <div class="relative mb-4 mt-4 rounded-[0.6rem] border border-slate-200/80 dark:border-darkmode-400 mr-5">
                                <div class="absolute left-0 -mt-2 ml-4 bg-white px-3 text-xs uppercase text-slate-500">
                                    <div class="-mt-px">Holiday Information</div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 p-4">
                                    
                                    <div class="gap-x-6 gap-y-10 ">
                                        <x-form.input id="holiday_list_name" name="holiday_list_name" label="Holiday List Name" required="true" placholder="" value="{{request()->get('item')}}"/>
                                        <x-form.input type="number" value="0" id="total_holidays" name="total_holidays" label="Total Holiday" placholder="" />
                                    </div>
                                    <div class="gap-x-6 gap-y-10">
                                        <div class="mt-3 flex-row xl:items-center" placholder="">
                                            <div class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-4">
                                                <div class="text-left">
                                                    <div class="flex items-center">
                                                        <div class="font-medium" for="start_time">From Date</div>
                                                                <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                                                Required
                                                            </div>                
                                                    </div>
                                                    <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-1 sm:w-full  w-96  gap-1 mt-3 xl:mt-0">
                                                <input id="from_date" type="date" name="from_date" data-single-mode="true" value=""  required="" class="datepicker disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 ">
                                            </div>
                                        </div>
                                     
                                        <div class="mt-3 flex-row xl:items-center" placholder="">
                                            <div class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-4">
                                                <div class="text-left">
                                                    <div class="flex items-center">
                                                        <div class="font-medium" for="start_time">To Date</div>
                                                                <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                                                Required
                                                            </div>                
                                                    </div>
                                                    <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-1 sm:w-full  w-96  gap-1 mt-3 xl:mt-0">
                                                <input id="to_date" type="date" name="to_date" data-single-mode="true" value=""  required="" class="datepicker disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 ">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                                
                        </div>
                    
                        <div class="box box--stacked flex flex-col p-5 mt-5">
                            <div class=" gap-5 mt-2">
                                
                                <div class="card-body">
                                    <div class="relative mb-4 mt-2 rounded-[0.6rem] border border-slate-200/80 dark:border-darkmode-400 mr-5">
                                        <div class="absolute left-0 -mt-2 ml-4 bg-white px-3 text-xs uppercase text-slate-500">
                                            <div class="-mt-px">Holiday Dates</div>
                                        </div>
                                        <div class="mt-2 flex flex-col gap-3.5 px-5 py-5">
                                            
                                        <div class="mt-3 flex-row xl:items-center" placholder="">
                                                <div class="gap-x-6 gap-y-10 ">
                                                    <div class="mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-64">
                                                        <div class="text-left">
                                                            <div class="flex items-center">
                                                                <div class="font-medium">Weekly Off</div>
                                                            </div>
                                                        </div>
                                                        <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3"></div>
                                                    </div>
                                                    <div class="mt-3 w-96 flex-1 xl:mt-0">
                                                        <select required id="weekly_off" data-title="Weekly Off" data-placeholder="Select your day" class="tom-select disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                                                            
                                                            <option value="sunday">
                                                                Sunday
                                                            </option>
                                                            <option value="monday">
                                                                Monday
                                                            </option>
                                                            <option value="tuesday">
                                                                Tuesday
                                                            </option>
                                                            <option value="wednesday">
                                                                Wednesday
                                                            </option>
                                                            <option value="thursday">
                                                                Thursday
                                                            </option>
                                                            <option value="friday">
                                                                Friday
                                                            </option>
                                                            <option value="saturday">
                                                                Saturday
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-7 mt-4">
                                                        <button type="button" id="add-holiday-day"
                                                                class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium text-xs cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-slate-200 text-slate-700 dark:border-danger shadow-md w-100">Add
                                                                Day</button>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="preview relative">
                                                <div class="overflow-x-autos">
                                                    <table class="w-full text-left table-earning-editable table-edits">
                                                        <thead class="bg-slate-200/60 dark:bg-slate-200">
                                                            <tr>
                                                                <th width="60px"
                                                                    class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                                                    No</th>
                                                                <th width="35%"
                                                                    class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                                                    Date</th>
                                                                <th
                                                                    class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                                                    Description</th>
                                                                
                                                                <th
                                                                    class="font-medium border-b-2 dark:border-darkmode-300 border-l border-r border-t whitespace-nowrap px-4 py-2">
                                                                    <i data-lucide="settings" class="inline-block h-5 w-5 mr-2"></i>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="editable-holiday-table"></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="mb-7">
                                                <button type="button" id="add-holiday-row"
                                                        class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium text-xs cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-slate-200 text-slate-700 dark:border-danger shadow-md w-100">Add
                                                        Date</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
<script src="
https://cdn.jsdelivr.net/npm/moment@2.30.1/moment.min.js
"></script>
<script type="text/javascript">
    
    let currentForm = $("#form-submit");
    let id   = '{{$id ?? ''}}';
    let method      = 'POST';
    let path        = currentForm.attr('action');

    async function handleGetData(id, currentForm) {
        path    = `{{ $apiUrl }}/`+id;
        $.ajax({
            url: path,
            type: 'GET',
            headers: {
                'Authorization': `Bearer ${appToken}`,
                'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`
            },
            dataType: 'json',
            success: await
            function(response) {   
                if (response.success == true) {                    
                     
                    method  = 'PATCH';
                    
                    $("input[name=holiday_list_name]").val(response.data.holiday_list_name);
                    $("input[name=total_holidays]").val(response.data.total_holidays)
                    $("input[name=from_date]").val(response.data.from_date)
                    $("input[name=to_date]").val(response.data.to_date)

                    const holiday_date = response.data.holiday_date;

                    holiday_date.forEach((date) => {
                        addRowToTable('editable-holiday-table', null, date);
                    });
                     
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

        const holiday_list_name = $('#holiday_list_name').val();
        if(!holiday_list_name){
            showErrorNotification('error', 'Holiday List Name is required.');
            $('#submitBtn').attr('disable', false);
            $('#loadingText').html('Save Changes');
            return;
        }
        //const data = serializeFormData(currentForm);
        const formData = new FormData(e.target); // Collect form data
        const payload = {
            holiday_date: [] // Initialize as an array of objects
        };

        const dates = formData.getAll("date[]"); // Get all date[] inputs
        const descriptions = formData.getAll("description[]"); // Get all description[] inputs
        const ids = formData.getAll("id[]"); // Get all description[] inputs

        // Pair dates and descriptions into objects
        dates.forEach((date, index) => {
            payload.holiday_date.push({
                date: date,
                description: descriptions[index] || "", // Use empty string if description is missing
                id: ids[index] || "" // Use empty string if description is missing
            });
        });

        // Add other fields to the payload
        formData.forEach((value, key) => {
            if (!key.endsWith("[]") && key !== "date[]" && key !== "description[]" && key !== "ids") {
                if (!payload[key]) {
                    payload[key] = value;
                } else if (Array.isArray(payload[key])) {
                    payload[key].push(value);
                } else {
                    payload[key] = [payload[key], value];
                }
            }
        });

        try {
            const response = await $.ajax({
                url: path,
                type: method,
                contentType: 'application/json',
                headers: {
                    'Authorization': `Bearer ${appToken}`,
                    'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`
                },
                data: JSON.stringify(payload),
                dataType: 'json'
            });

            handleResponse(response);
        } catch (xhr) {
            //console.log(xhr);
            if (xhr.status === 422) {
                //console.log(xhr.responseText);
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
            setTimeout(() => {
                window.location=document.referrer;
            }, 800);
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
    });

    $('#from_date').on('change', function() {
        const date = $(this).val();

        if (date) {
            const fromDate = new Date(date); 
            fromDate.setFullYear(fromDate.getFullYear() + 1);
            
            const formattedDate = fromDate.toISOString().split('T')[0];
            $("#to_date").val(formattedDate); 
        } else {
            $("#to_date").val('');
        }
    });


    $('#add-holiday-row').on('click', function() {
        addRowToTable('editable-holiday-table', 'shiftRowCount');
    });

    function addRowToTable(tableId, rowCountVar, data = null) {
        const tableBody = document.getElementById(tableId);
            const index = document.querySelectorAll('#' + tableId + ' tr').length + 1;
            const rowId = `${tableId}-row-${index}`;
            const newRowHtml =  createTableRow(rowId, tableId, data);
            
            tableBody.insertAdjacentHTML('beforeend', newRowHtml);
        
    }

    function createTableRow(rowId, tableId, data = null) {
            let rowNumber = document.querySelectorAll('#' + tableId + ' tr').length + 1;
            const componentType = tableId === 'editable-holiday-table';
            //console.log(data);
            const rowDataId = data?.id || '';
            const id = data?.id || '';
            const date = data?.date || '';
            const description = data?.description || '';
            
            return `<tr id="${rowId}" data-id="${rowDataId}">
                    <td width="60px" data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t">${rowNumber} <input name="ids" value="${id}" type="hidden"></td>
                    <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t">
                        <input id="date-${rowId}" value="${date}" type="date" placeholder="date" name="date[]" data-single-mode="true" value=""  required="" class="datepicker disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 ">
                        <!-- Preloader (initially hidden) -->
                        <div class="col-span-6 flex flex-col items-center justify-end sm:col-span-3 xl:col-span-2">
                         
                        </div>
                    </td>
                    <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t">
                    <input id="description" type="text" value="${description}" placeholder="Description" name="description[]" value=""  class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 ">
                    </td>
                    <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t" width="100px">
                        <button type="button" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed text-xs py-1.5 px-2 bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&:hover:not(:disabled)]:bg-slate-100 [&:hover:not(:disabled)]:border-slate-100 [&:hover:not(:disabled)]:dark:border-darkmode-300/80 [&:hover:not(:disabled)]:dark:bg-darkmode-300/80 w-24 w-24" onclick="deleteRow('${rowId}', '${id}')">Delete</button>
                    </td>
                </tr>`;
             
        }

    $('#add-holiday-day').on('click', function () {
        const fromDate = $('#from_date').val();
        const toDate = $('#to_date').val();
        const weeklyOff = $('#weekly_off').val();

        if (!fromDate || !toDate || !weeklyOff) {
            Swal.fire({
                text: "Please select a valid 'From Date', 'To Date', and 'Weekly Off' day!",
                icon: "warning",
            });
            return;
        }

        // Parse dates
        const startDate = moment(fromDate, 'YYYY-MM-DD');
        const endDate = moment(toDate, 'YYYY-MM-DD');

        if (startDate.isAfter(endDate)) {
            alert("'From Date' cannot be after 'To Date'.");
            return;
        }

        // Map for days
        const daysMap = {
            sunday: 0,
            monday: 1,
            tuesday: 2,
            wednesday: 3,
            thursday: 4,
            friday: 5,
            saturday: 6,
        };

        const targetDay = daysMap[weeklyOff.toLowerCase()];
        if (targetDay === undefined) {
            alert("Invalid Weekly Off day selected.");
            return;
        }

        // Generate weekly off dates
        let current = startDate.clone();
        const weeklyOffDates = [];
        while (current.isSameOrBefore(endDate)) {
            if (current.day() === targetDay) {
                weeklyOffDates.push(current.clone());
            }
            current.add(1, 'days');
        }

        // Populate table
        if (weeklyOffDates.length > 0) {
            weeklyOffDates.forEach((date) => {
                const formattedDate = date.format('YYYY-MM-DD');
                if (!isDateDuplicate('editable-holiday-table', formattedDate)) {
                    addRowToTable(
                        'editable-holiday-table',
                        null, // rowCountVar not used here
                        {
                            id: null, // Unique identifier if needed
                            date: formattedDate,
                            description: `Weekly Off (${weeklyOff})`,
                        }
                    );
                } else {
                    //console.log(`Duplicate date skipped: ${formattedDate}`);
                }
            });
        } else {
            alert(`No ${weeklyOff} found between the selected dates.`);
        }
    });

    function isDateDuplicate(tableId, dateValue) {
        const rows = document.querySelectorAll(`#${tableId} tr`);
        for (const row of rows) {
            const dateInput = row.querySelector(`input[name="date[]"]`);
            if (dateInput && dateInput.value === dateValue) {
                return true;
            }
        }
        return false;
    }

    function deleteRow(rowId, id) {
        const row = document.getElementById(rowId);
        console.log(id);
        if (row) row.remove();
    }
    
    initializeTomSelect();
    </script>
@endpush
@include('vendor-common.sweetalert')
@include('vendor-common.tomselect')