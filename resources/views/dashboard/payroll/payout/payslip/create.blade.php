@extends('layouts.dashboard.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/tom-select.css') }}">

    <div
        class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')
        <div id="contents-page"
            class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
            <div class="container">
                <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                    <div class="col-span-12">
                        <div class=" flex flex-col mb-4 gap-x-3 md:h-10 md:flex-row md:items-center ">
                            <div class="text-base font-medium group-[.mode--light]:text-white">
                                {{ $page_title }}
                            </div>
                            <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                                <button onclick="history.go(-1)"
                                    class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-primary text-primary dark:border-primary shadow-md w-100"
                                    href="{{ $url ?? '' }}">
                                    <i data-tw-merge="" data-lucide="arrow-left" class="mr-3 h-4 w-4 stroke-[1.3]"></i> Back
                                </button>
                                <x-form.button label="Save changes" id="save-payslip-btn" style="primary" type="button"
                                    icon="save" />
                            </div>
                        </div>
                        <form id="payslip-form" method="post"
                            action="http://apidev.duluin.com/api/v1/payslip/payroll_entry">
                            @csrf
                            <div class="mt-1.5 flex flex-col">
                                <input type="hidden" name="employee_id" id="employee_id" value="" />
                                @include('dashboard.payroll.payout.payslip.tabs')
                                <div class="box box--stacked flex flex-col p-5">
                                    @include('dashboard.payroll.payout.payslip.tab-content')
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('vendor-common.toastr')

@push('js')
    <script src="{{ asset('dist/js/vendors/tab.js') }}"></script>
    <script>
        $(document).ready(function() {
            const company = localStorage.getItem('company');
            if (company !== null) {
                const companySelect = $('#company_id')[0].tomselect;

                companySelect.on('load', function() {
                    if (!companySelect.options[company]) {
                        companySelect.addOption({
                            value: company,
                            text: company
                        });
                    }
                    companySelect.setValue(company);
                });
            }

            $("[name='employee_id']").on("change", async function() {
                // console.log("ada perubahan disini : ", $(this).val());
                $("#employee").val($(this).val());
                let employeeId = $(this).val();
                let startDate = $("#start_date").val();
                let endDate = $("#end_date").val();
                // get employee salary structure assignment
                $.ajax({
                    url: `http://apidev.duluin.com/api/v1/salary_structure_assignment_employees/salary_structure_assignment_employee/find_by_employee/${employeeId}`,
                    type: 'GET',
                    contentType: 'application/json',
                    headers: {
                        'Authorization': `Bearer ${appToken}`,
                        'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`
                    },
                    crossDomain: true,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            const structureId = response.data?.salaryStructure?.id;
                            const structureName = response.data?.salaryStructure?.name;
                            $(".salary_stucture_box").removeClass("hidden");
                            $("#salary_stucture").html(
                                `<option value="${structureId}" selected>${structureName}</option>`
                            );
                            calculateDays(startDate, endDate, employeeId);

                            getEarning();
                            getDeduction();

                        } else {
                            // console.log("error occured");
                            showErrorNotification('error', response.message);
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            const response = JSON.parse(xhr.responseText);
                            handleErrorResponse(response, formId);
                        } else {
                            const response = JSON.parse(xhr.responseText);
                            showErrorNotification('error', response.message +
                                ". Please assign current employee to salary structures");
                            $(".salary_stucture_box").addClass("hidden");
                            // calculateDays(startDate, endDate, employeeId);
                        }
                    }
                });
            });

            $("#payroll_frequency").on("change", async function() {
                const payrollFrequency = $(this).val();
                const currentDate = new Date();
                let startDate, endDate;

                if (payrollFrequency === "monthly") {
                    const year = currentDate.getFullYear();
                    const month = currentDate.getMonth();
                    startDate = new Date(year, month, 1 + 1);
                    endDate = new Date(year, month + 1);
                } else if (payrollFrequency === "weekly") {
                    const dayOfWeek = currentDate.getDay();
                    const diffToMonday = currentDate.getDate() - dayOfWeek + (dayOfWeek === 0 ? -6 :
                        1);
                    startDate = new Date(currentDate.setDate(diffToMonday));
                    endDate = new Date(currentDate.setDate(startDate.getDate() + 6));
                } else {
                    startDate = new Date();
                    endDate = new Date();
                }
                $("#start_date").val(startDate.toISOString().split('T')[0]);
                $("#end_date").val(endDate.toISOString().split('T')[0]);

                // check if employee, salary structure are not empty
                if (($("#employee").val() !== "") && ($("#salary_stucture").val() !== "")) {
                    // console.log("employee id " + $("#employee_id").val());
                    calculateDays(startDate, endDate, $("#employee_id").val());
                    getEarning();
                    getDeduction();
                } else {
                    // console.log("employee id value : ", $("#employee_id").val());
                    showErrorNotification('error', 'Please select employee and salary structure');
                }
            });

            $("#start_date").on("change", async function() {
                var employeeId = $("[name='employee']").val();
                calculateDays($(this).val(), $("#end_date").val(), employeeId);
                if ($("#end_date").val() === "") {
                    showSuccessNotification('success', "Silahkan isi tanggal akhir");
                }
            });

            $("#end_date").on("change", async function() {
                var employeeId = $("[name='employee']").val();
                calculateDays($("#start_date").val(), $(this).val(), employeeId);
                if ($("#start_date").val() === "") {
                    showSuccessNotification('success', "Silahkan isi tanggal awal");
                }
            });

            function getEarning() {
                // get earning and deduction
                let structureValue = $('#salary_stucture').val();
                if (structureValue == "") {
                    showErrorNotification('error', 'Please select a salary structure');
                    preventDefault();
                }

                $.ajax({
                    url: `http://apidev.duluin.com/api/v1/structure_earning_deductions/structure_earning_deduction/all`, // Ubah URL sesuai endpoint yang diinginkan
                    type: 'POST',
                    contentType: 'application/json',
                    headers: {
                        'Authorization': `Bearer ${appToken}`,
                        'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`
                    },
                    crossDomain: true,
                    dataType: 'json',
                    data: JSON.stringify({
                        "company_id": localStorage.getItem(
                            'company'),
                        "salary_structure_id": structureValue,
                        "type": "earning",
                        "page": 1,
                        "limit": 10,
                        "sort": "ASC",
                        "searchParams": {}
                    }),
                    success: function(secondResponse) {
                        if (secondResponse.success) {
                            // // console.log(secondResponse.data);
                            // render table
                            renderTable(secondResponse.data, 'earning');
                        } else {
                            showErrorNotification('error',
                                secondResponse.message);
                        }
                    },
                    error: function(xhr) {
                        const response = JSON.parse(xhr
                            .responseText);
                        showErrorNotification('error', response
                            .message);
                    }
                });
            }

            function renderTable(data, type) {
                // Function to render the table
                const tableBody = document.getElementById(`editable-${type}-table`);
                tableBody.innerHTML = ""; // Clear existing rows

                // console.log("type : ", type);
                // console.log("sum of data : ", data);

                if (type === 'earning') {
                    data.forEach((item, index) => {
                        const row = document.createElement("tr");
                        const rowId = `editable-${type}-table-row-${index + 1}`;
                        row.setAttribute("id", rowId);
                        row.setAttribute("data-id", index + 1);

                        let amountFormatted = new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR'
                        }).format(item.amount);

                        row.innerHTML = `
                <td class="border-b-2 dark:border-darkmode-300 border-l border-r border-t px-4 py-2"
                    data-field="name" width="35%">
                    <span>${item.salaryComponent.name}</span>
                    <input type="hidden" name="salary_component_id" value="${item.salaryComponent.id}" />
                </td>
                <td class="border-b-2 dark:border-darkmode-300 border-l border-r border-t px-4 py-2"
                    data-field="amount">
                    <span class="editable-text">${amountFormatted}</span>
                    <input type="text"
                        class="editable-input hidden disabled:bg-slate-100
                disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50
                dark:disabled:border-transparent [&[readonly]]:bg-slate-100
                [&[readonly]]:cursor-not-allowed
                [&[readonly]]:dark:bg-darkmode-800/50
                [&[readonly]]:dark:border-transparent transition duration-200
                ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md
                placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary
                focus:ring-opacity-20 focus:border-primary focus:border-opacity-40
                dark:bg-darkmode-800 dark:border-transparent
                dark:focus:ring-slate-700 dark:focus:ring-opacity-50
                dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4
                file:py-2 file:px-4 file:rounded-l-md file:border-0
                file:border-r-[1px] file:border-slate-100/10 file:text-sm
                file:font-semibold file:bg-slate-100 file:text-slate-500/70
                hover:file:bg-200 group-[.form-inline]:flex-1
                group-[.input-group]:rounded-none
                group-[.input-group]:[&:not(:first-child)]:border-l-transparent
                group-[.input-group]:first:rounded-l
                group-[.input-group]:last:rounded-r group-[.input-group]:z-10"
                        name="salary_component_amount" value="${item.amount}" />
                </td>
                <td class="border-b-2 dark:border-darkmode-300 border-l border-r border-t px-4 py-2" width="20%">
                    <button type="button" class="save hidden transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&:hover:not(:disabled)]:bg-slate-100 [&:hover:not(:disabled)]:border-slate-100 [&:hover:not(:disabled)]:dark:border-darkmode-300/80 [&:hover:not(:disabled)]:dark:bg-darkmode-300/80">Save</button>
                    <button type="button" class="edit transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&:hover:not(:disabled)]:bg-slate-100 [&:hover:not(:disabled)]:border-slate-100 [&:hover:not(:disabled)]:dark:border-darkmode-300/80 [&:hover:not(:disabled)]:dark:bg-darkmode-300/80">Edit</button>
                </td>
            `;
                        tableBody.appendChild(row);
                    });

                    // Calculate the sum of all earning amounts
                    let totalEarningAmount = 0;
                    $('.editable-input').each(function() {
                        let value = parseFloat($(this).val()) || 0;
                        totalEarningAmount += value;
                    });

                    $("#gross_pay_hidden").val(totalEarningAmount);
                    $('#gross_pay').val(new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR'
                    }).format(totalEarningAmount));

                    $('#net_pay').val(new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR'
                    }).format(totalEarningAmount));
                    $("#net_pay_hidden").val(totalEarningAmount);

                    countTotalNetPay(totalEarningAmount, $("#total_deduction_hidden").val());
                } else {
                    // Similar logic for deductions
                    data.forEach((item, index) => {
                        const row = document.createElement("tr");
                        row.setAttribute("data-id", index + 1);

                        let amountFormatted = new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR'
                        }).format(item.amount);

                        row.innerHTML = `
                <td class="border-b-2 dark:border-darkmode-300 border-l border-r border-t px-4 py-2"
                    data-field="name" width="35%">
                    <span>${item.salaryComponent.name}</span>
                    <input type="hidden" name="salary_component_id" value="${item.salaryComponent.id}" />
                </td>
                <td class="border-b-2 dark:border-darkmode-300 border-l border-r border-t px-4 py-2"
                    data-field="amount">
                    <span class="editable-deduction-text">${amountFormatted}</span>
                    <input type="text"
                        class="editable-deduction-input hidden disabled:bg-slate-100
                disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50
                dark:disabled:border-transparent [&[readonly]]:bg-slate-100
                [&[readonly]]:cursor-not-allowed
                [&[readonly]]:dark:bg-darkmode-800/50
                [&[readonly]]:dark:border-transparent transition duration-200
                ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md
                placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary
                focus:ring-opacity-20 focus:border-primary focus:border-opacity-40
                dark:bg-darkmode-800 dark:border-transparent
                dark:focus:ring-slate-700 dark:focus:ring-opacity-50
                dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4
                file:py-2 file:px-4 file:rounded-l-md file:border-0
                file:border-r-[1px] file:border-slate-100/10 file:text-sm
                file:font-semibold file:bg-slate-100 file:text-slate-500/70
                hover:file:bg-200 group-[.form-inline]:flex-1
                group-[.input-group]:rounded-none
                group-[.input-group]:[&:not(:first-child)]:border-l-transparent
                group-[.input-group]:first:rounded-l
                group-[.input-group]:last:rounded-r group-[.input-group]:z-10"
                        name="salary_component_amount" value="${item.amount}" />
                </td>
                <td class="border-b-2 dark:border-darkmode-300 border-l border-r border-t px-4 py-2" width="20%">
                    <button type="button" class="save-deduction hidden transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&:hover:not(:disabled)]:bg-slate-100 [&:hover:not(:disabled)]:border-slate-100 [&:hover:not(:disabled)]:dark:border-darkmode-300/80 [&:hover:not(:disabled)]:dark:bg-darkmode-300/80">Save</button>
                    <button type="button" class="edit-deduction transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&:hover:not(:disabled)]:bg-slate-100 [&:hover:not(:disabled)]:border-slate-100 [&:hover:not(:disabled)]:dark:border-darkmode-300/80 [&:hover:not(:disabled)]:dark:bg-darkmode-300/80">Edit</button>
                </td>
            `;
                        tableBody.appendChild(row);
                    });

                    // Calculate the sum of all deduction amounts
                    let totalDeductionAmount = 0;
                    $('.editable-deduction-input').each(function() {
                        let value = parseFloat($(this).val()) || 0;
                        totalDeductionAmount += value;
                    });

                    $("#total_deduction_hidden").val(totalDeductionAmount);
                    $('#total_deduction').val(new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR'
                    }).format(totalDeductionAmount));

                    countTotalNetPay($("#gross_pay_hidden").val(), totalDeductionAmount);
                }
            }

            function countTotalNetPay(grossPay, totalDeduction) {
                let netPay = parseFloat(grossPay) - parseFloat(totalDeduction);
                $("#net_pay_hidden").val(netPay);

                $('#net_pay').val(new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(netPay));
            }

            function getDeduction() {
                let structureValue = $('#salary_stucture').val();
                if (structureValue == "") {
                    showErrorNotification('error', 'Please select a salary structure');
                    preventDefault();
                }

                $.ajax({
                    url: `http://apidev.duluin.com/api/v1/structure_earning_deductions/structure_earning_deduction/all`, // Ubah URL sesuai endpoint yang diinginkan
                    type: 'POST',
                    contentType: 'application/json',
                    headers: {
                        'Authorization': `Bearer ${appToken}`,
                        'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`
                    },
                    crossDomain: true,
                    dataType: 'json',
                    data: JSON.stringify({
                        "company_id": localStorage.getItem(
                            'company'),
                        "salary_structure_id": structureValue,
                        "type": "deduction",
                        "page": 1,
                        "limit": 10,
                        "sort": "ASC",
                        "searchParams": {}
                    }),
                    success: function(secondResponse) {
                        if (secondResponse.success) {
                            // // console.log(secondResponse.data);
                            renderTable(secondResponse.data, 'deduction');
                        } else {
                            showErrorNotification('error',
                                secondResponse.message);
                        }
                    },
                    error: function(xhr) {
                        const response = JSON.parse(xhr
                            .responseText);
                        showErrorNotification('error', response
                            .message);
                    }
                });
            }

            function calculateDays(startDate, endDate, employeeId) {
                const start = new Date(startDate);
                const end = new Date(endDate);

                start.setHours(12, 0, 0, 0);
                end.setHours(12, 0, 0, 0);

                if (isNaN(start.getTime()) || isNaN(end.getTime())) {
                    return "invalid date";
                }

                const diffTime = end - start;

                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
                $("#working_days").val(diffDays);

                $.ajax({
                    url: `
http://apidev.duluin.com/api/v1/attendance/attendance/total-attendance/by?employee_id=${employeeId}&start_date=${startDate}&end_date=${endDate}`,
                    type: 'GET',
                    contentType: 'application/json',
                    headers: {
                        'Authorization': `Bearer ${appToken}`,
                        'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`
                    },
                    crossDomain: true,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            $("#present_days").val(response.data.totalPresent);

                            // calculate absentDay
                            let workingDays = diffDays;
                            let presentDay = response.data.totalPresent;
                            let totalAbsentDay = workingDays - presentDay;

                            $("#absent_days").val(totalAbsentDay);

                            getEarning();
                            getDeduction();
                        } else {
                            // console.log("Data tidak tersedia");
                            showErrorNotification('error', response.message);
                            $("#absent_days").val(0);
                            $("#present_days").val(0);
                        }
                    },
                    error: function(xhr) {
                        $("#absent_days").val(0);
                        $("#present_days").val(0);
                        if (xhr.status === 422) {
                            const response = JSON.parse(xhr.responseText);
                            handleErrorResponse(response, formId);
                        } else {
                            const response = JSON.parse(xhr.responseText);
                            showErrorNotification('error',
                                "Payment day not found");
                        }
                    }
                });
            }

            $("#save-payslip-btn").click(async function(e) {
                e.preventDefault();
                await handleFormSubmission();
            });

            async function handleFormSubmission() {
                const currentForm = $("#payslip-form");
                const data = serializeFormData(currentForm);
                const appToken = localStorage.getItem('app_token');

                // Get salary_component_id values
                let salaryComponentIds = $(
                    "input[name='salary_component_id'], select[name='salary_component_id']").map(
                    function() {
                        return $(this).val();
                    }).get();

                // Get salary_component_amount values
                let salaryComponentAmounts = $("input[name='salary_component_amount']").map(function() {
                    return $(this).val();
                }).get();

                // Append salaryComponentIds to the serialized form data
                data.salary_component_id = salaryComponentIds;
                data.salary_component_amount = salaryComponentAmounts;

                // Log the updated data object
                // console.log("Form Data:", data);

                data._token = $('meta[name="csrf-token"]').attr('content');
                data.company_id = localStorage.getItem('company');
                $('.error-message').hide();

                console.log("payload data : ");
                console.log(JSON.stringify(data));

                try {
                    const response = await $.ajax({
                        url: currentForm.attr('action'),
                        type: 'POST',
                        contentType: 'application/json',
                        headers: {
                            'Authorization': `Bearer ${appToken}`,
                            'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`
                        },
                        data: JSON.stringify(data),
                        dataType: 'json'
                    });

                    handleResponse(response);
                } catch (xhr) {
                    const response = JSON.parse(xhr.responseText);
                    if (xhr.status === 422) {
                        // console.log(xhr.responseText);
                        handleErrorResponse(response, currentForm);
                    } else {
                        showErrorNotification('error', response.message);
                    }
                }
                return false;
            }

            function serializeFormData(form) {
                const formData = form.serializeArray();
                const data = {};
                formData.forEach(field => {
                    data[field.name] = field.value;
                });
                return data;
            }

            function handleResponse(response) {
                if (response.success) {
                    showSuccessNotification('success', response.message);
                    setTimeout(() => {
                        location.href =
                            `{{ url('dashboard/hrms/payout/salary_slip') }}/edit/${response.data.id}`;
                    }, 300);
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
        });
    </script>
@endpush
