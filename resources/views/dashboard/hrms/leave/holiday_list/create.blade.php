@push('css')
    <style>
        .hidden {
            display: none;
        }
    </style>
@endPush
@extends('layouts.dashboard.app')
@section('content')
    <div
        class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')
        <div id="contents-page"
            class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
            <div class="container">
                <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                    <div class="col-span-12">
                        <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                            <div class="text-base font-medium group-[.mode--light]:text-white">
                                {{ $page_title }}
                            </div>
                            <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                                <x-form.button label="Save changes" id="earning-btn" style="primary" type="button" icon="save" />
                            </div>
                        </div>
                        <div class="mt-3.5 flex flex-col gap-8">
                            <div class="box box--stacked flex flex-col">
                                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-2 p-4">
                                    <x-form.input id="holiday_list_name" label="Holiday List Name" name="holiday_list_name" required />
                                    <x-form.input id="total_holidays" label="Total Holidays" name="total_holidays" required />
                                    <x-form.input id="from_date" label="From Date" name="from_date" required />
                                    <x-form.input id="to_date" label="To Date" name="to_date" required />
                                </div>
                                <div class="table gap-y-2 p-5 sm:flex-row sm:items-center">
                                <form id="earning-form" method="post"
                                        action="">
                                        @csrf
                                        <div class=" gap-5 mt-2">
                                            <div class="mb-7">
                                                <x-form.button type="button" id="add-earning-row" label="Add New Holiday" style="tertiary"></x-form.button>
                                            </div>
                                            <div class="card-body">
                                                <div class="relative mb-4 mt-2 rounded-[0.6rem] border border-slate-200/80 dark:border-darkmode-400 mr-5">
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
                                                                    <tbody id="editable-earning-table"></tbody>
                                                                </table>
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
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        let earningRowCount = 0;
        let deductionRowCount = 0;

        function createTableRow(rowId, tableId, data = null) {
            // console.log("rowId:", rowId);
            // console.log("tableId:", tableId);
            let rowNumber = document.querySelectorAll('#' + tableId + ' tr').length + 1;
            const componentType = tableId === 'editable-earning-table' ? 'earning' : 'deduction';
            let amountData = (data) === null ? 0 : data.amount;
            let earningDeductionId = (data) === null ? null : data.id;
            handleGetComponent(rowNumber, tableId, data);
            return `<tr id="${rowId}">
                    <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t">${rowNumber} <input name="type" value="${componentType}" type="hidden"></td>
                    <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t">
                        <select name="salary_component_id" class="disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1" id="getComponent-${tableId}-${rowNumber}" onclick="handleGetComponent('${rowNumber}', '${tableId}')">
                            <option value="">Select Salary Component</option>
                        </select>
                        <!-- Preloader (initially hidden) -->
                        <div class="col-span-6 flex flex-col items-center justify-end sm:col-span-3 xl:col-span-2">
                        <span id="preloader-${tableId}-${rowNumber}" class="h-8 w-8" style="display:none;">
                            <svg class="h-full w-full" width="25" viewBox="-2 -2 42 42" xmlns="http://www.w3.org/2000/svg" stroke="#2d3748">
                                <g fill="none" fill-rule="evenodd">
                                    <g transform="translate(1 1)" stroke-width="4">
                                        <circle stroke-opacity=".5" cx="18" cy="18" r="18" />
                                        <path d="M36 18c0-9.94-8.06-18-18-18">
                                            <animateTransform type="rotate" attributeName="transform" from="0 18 18" to="360 18 18" dur="1s" repeatCount="indefinite" />
                                        </path>
                                    </g>
                                </g>
                            </svg>
                        </span>
                        </div>
                    </td>
                    <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t"><input id="getInputComponent-${componentType}-${rowNumber}" name="amount" type="number" class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10" name="amount" placeholder="0" value="${amountData}"></td>
                    <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t"><input type="checkbox" name="payment_day_depend" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&[type='radio']]:checked:bg-primary [&[type='radio']]:checked:border-primary [&[type='radio']]:checked:border-opacity-10 [&[type='checkbox']]:checked:bg-primary [&[type='checkbox']]:checked:border-primary [&[type='checkbox']]:checked:border-opacity-10 [&:disabled:not(:checked)]:bg-slate-100 [&:disabled:not(:checked)]:cursor-not-allowed [&:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&:disabled:checked]:opacity-70 [&:disabled:checked]:cursor-not-allowed [&:disabled:checked]:dark:bg-darkmode-800/50"></td>
                    <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t"><input type="checkbox" name="tax_applicable" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&[type='radio']]:checked:bg-primary [&[type='radio']]:checked:border-primary [&[type='radio']]:checked:border-opacity-10 [&[type='checkbox']]:checked:bg-primary [&[type='checkbox']]:checked:border-primary [&[type='checkbox']]:checked:border-opacity-10 [&:disabled:not(:checked)]:bg-slate-100 [&:disabled:not(:checked)]:cursor-not-allowed [&:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&:disabled:checked]:opacity-70 [&:disabled:checked]:cursor-not-allowed [&:disabled:checked]:dark:bg-darkmode-800/50"></td>
                    <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t"><input type="checkbox" name="formula_based" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&[type='radio']]:checked:bg-primary [&[type='radio']]:checked:border-primary [&[type='radio']]:checked:border-opacity-10 [&[type='checkbox']]:checked:bg-primary [&[type='checkbox']]:checked:border-primary [&[type='checkbox']]:checked:border-opacity-10 [&:disabled:not(:checked)]:bg-slate-100 [&:disabled:not(:checked)]:cursor-not-allowed [&:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&:disabled:checked]:opacity-70 [&:disabled:checked]:cursor-not-allowed [&:disabled:checked]:dark:bg-darkmode-800/50"></td>
                    <td data-tw-merge class="px-5 py-3 border-b dark:border-darkmode-300 border-l border-r border-t">
                        <button type="button" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed text-xs py-1.5 px-2 bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&:hover:not(:disabled)]:bg-slate-100 [&:hover:not(:disabled)]:border-slate-100 [&:hover:not(:disabled)]:dark:border-darkmode-300/80 [&:hover:not(:disabled)]:dark:bg-darkmode-300/80 w-24 w-24" onclick="deleteRow('${rowId}', '${tableId}', '${earningDeductionId}')">Delete</button>
                    </td>
                </tr>`;
            // $('#' + tableId).append(rowHtml);
            if (data && typeof data.amount !== 'undefined') {
                $('#getInputComponent-' + componentType + '-' + rowNumber).val(data.amount);
            }
        }

        function handleGetComponent(rowId, tableId, data = null) {
            const appToken = localStorage.getItem("app_token");
            const componentType = tableId === 'editable-earning-table' ? 'earning' : 'deduction';
            const $selectElement = $(`#getComponent-${tableId}-${rowId}`);
            const $preloader = $('#preloader-' + tableId + '-' + rowId);
            if ($selectElement.find('option').length > 1) {
                return;
            }

            $preloader.show();

            $.ajax({
                url: 'http://apidev.duluin.com/api/v1/salary_components/salary_component/datatables',
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
                headers: {
                    Authorization: `Bearer ${appToken}`,
                    "X-Forwarded-Host": `${window.location.protocol}//${window.location.hostname}`,
                },
                success: function(response) {
                    const salaryComponents = response.data;
                    const $selectElement = $('#getComponent-' + tableId + '-' + rowId);
                    $selectElement.html('<option value="">Select Salary Component</option>');
                    $.each(salaryComponents, function(index, component) {
                        $selectElement.append($('<option>', {
                            value: component.id,
                            text: component.name,
                            selected: data && data.component_id === component.id
                        }));
                    });
                    $preloader.hide();
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching salary components:", error);
                    $preloader.hide();
                }
            });
        }

        function addRowToTable(tableId, rowCountVar, data = null) {
            if (typeof window[rowCountVar] === 'undefined' || isNaN(window[rowCountVar])) {
                window[rowCountVar] = 0;
            }
            const tableBody = document.getElementById(tableId);
            const rowId = `${tableId}-row-${++window[rowCountVar]}`;
            tableBody.insertAdjacentHTML('beforeend', createTableRow(rowId, tableId, data));
        }

        function deleteRow(rowId, tableId, data = null) {
            if (data != null) {
                $.ajax({
                    url: `http://apidev.duluin.com/api/v1/structure_earning_deductions/structure_earning_deduction/${data}`,
                    method: 'DELETE',
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem("app_token")}`,
                        "X-Forwarded-Host": `${window.location.protocol}//${window.location.hostname}`,
                    },
                    success: function(response) {
                        toastr.success("Earning Deduction deleted successfully");
                        document.getElementById(rowId).remove();
                        updateRowNumbers(tableId);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error deleting salary component:", error);
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

        document.getElementById('add-earning-row').addEventListener('click', function() {
            addRowToTable('editable-earning-table', 'earningRowCount');
        });

        document.getElementById('add-deduction-row').addEventListener('click', function() {
            addRowToTable('editable-deduction-table', 'deductionRowCount');
        });

        function editRow(rowId) {
            alert('Edit functionality is not yet implemented!');
        }
    </script>
@endpush
