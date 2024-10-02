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
                            </div>
                        </div>
                        <div class="mt-1.5 flex flex-col">
                            <input type="hidden" name="salary_structure_id" id="salary_structure_id"
                                value="{{ $salary_structure_id }}" />
                            @include('dashboard.payroll.payout.salary_structure.tabs')
                            <div class="box box--stacked flex flex-col p-5">
                                @include('dashboard.payroll.payout.salary_structure.tab-content')
                            </div>
                        </div>
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
            // Initialize the first tab as active
            const initialTab = $('ul[role="tablist"] li:first-child button');
            initialTab.addClass('active');
            $(initialTab.data('tw-target')).addClass('active').removeAttr('style').show();

            let lastActiveTabId = initialTab.data('tw-target');
            const appToken = localStorage.getItem('app_token');
            const salary_structure_id = $("#salary_structure_id").val();

            $('ul[role="tablist"] li button[role="tab"]').on('click', async function(e) {
                const newTabId = $(this).data('tw-target');

                if (lastActiveTabId !== newTabId) {
                    e.preventDefault();
                    // await handleFormSubmission(lastActiveTabId);
                    lastActiveTabId = newTabId;

                    $(lastActiveTabId + "-btn").click(async function(e) {
                        console.log(lastActiveTabId + "-form");
                        e.preventDefault();
                        await handleFormSubmission(lastActiveTabId);
                    });
                }
            });

            handleGetData(salary_structure_id, lastActiveTabId);

            $(lastActiveTabId + "-btn").click(async function(e) {
                e.preventDefault();
                await handleFormSubmission(lastActiveTabId);
            });

            async function handleGetData(salary_structure_id, tabId) {
                $.ajax({
                    url: `{{ $apiPayrollUrl }}/salary_structure/${salary_structure_id}`,
                    type: 'GET',
                    headers: {
                        'Authorization': `Bearer ${appToken}`,
                        'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`
                    },
                    dataType: 'json',
                    success: await
                    function(response) {
                        if (response.success) {
                            $("#name").val(response.data.name);
                            const companySelect = $('#company_id')[0].tomselect;
                            const companyValue = response.data.company_id;

                            companySelect.on('load', function() {
                                if (!companySelect.options[companyValue]) {
                                    companySelect.addOption({
                                        value: companyValue,
                                        text: response.data.company_id_rel
                                            .company_name
                                    });
                                }
                                companySelect.setValue(companyValue);
                            });

                            $("#is_active").attr("checked", response.data.is_active == 1 ? true :
                                false);
                            $("#leave_enchashment_amount").val(response.data.leave_enchashment_amount);
                            $("#max_benefits").val(response.data.max_benefits);
                            $("#is_salary_slip_based_on_timesheet").attr("checked", response.data
                                .is_salary_slip_based_on_timesheet == 1 ? true :
                                false);

                            const frequencySelect = $('#payroll_frequency')[0].tomselect;
                            const frequencyValue = response.data.payroll_frequency;

                            if (!frequencySelect.options[frequencyValue]) {
                                frequencySelect.addOption({
                                    value: frequencyValue,
                                    text: frequencyValue
                                });
                            }
                            frequencySelect.setValue(frequencyValue);

                            if (response.data.currency_id !== null) {
                                const currencySelect = $('#currency')[0].tomselect;
                                const currencyValue = response.data.currency_id;

                                currencySelect.on('load', function() {
                                    if (!currencySelect.options[currencyValue]) {
                                        currencySelect.addOption({
                                            value: currencyValue,
                                            text: currencyValue
                                        });
                                    }
                                    currencySelect.setValue(currencyValue);
                                });
                            }

                            if (response.data.structureEarning !== null) {
                                $.each(response.data.structureEarning, function(index, item) {
                                    addRowToTable('editable-earning-table', 'earningRowCount',
                                        item);
                                });
                                $.each(response.data.structureDeduction, function(index, item) {
                                    addRowToTable('editable-deduction-table',
                                        'deductionRowCount',
                                        item);
                                });
                            }
                        }
                    }
                });
            }

            async function handleFormSubmission(formId) {
                const currentForm = $(formId + "-form");
                const data = serializeFormData(currentForm);
                const salary_structure_id = $("#salary_structure_id").val();
                data._token = $('meta[name="csrf-token"]').attr('content');
                data.company_id = localStorage.getItem('company');
                $('.error-message').hide();

                data.is_active = $("#is_active").is(":checked") ? 1 : 0;
                data.is_salary_slip_based_on_timesheet = $("#is_salary_slip_based_on_timesheet").is(
                    ":checked") ? 1 : 0;
                data.salary_structure_id = salary_structure_id;

                if (formId === '#earning') {
                    const earningDeductionData = getEarningDeductionData();
                    $.extend(data, earningDeductionData);
                }

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
                    if (xhr.status === 422) {
                        console.log(xhr.responseText);
                        const response = JSON.parse(xhr.responseText);
                        handleErrorResponse(response, formId);
                    } else {
                        toastr.error('An error occurred while processing your request.');
                    }
                    // activateTab(formId);
                }
                return false;
            }

            function getEarningDeductionData() {
                var earnings = [];
                var deductions = [];

                $('#editable-earning-table tr').each(function() {
                    var $row = $(this); // Use jQuery to refer to the current row
                    var salaryComponentId = $row.find('select[name="salary_component_id"]').val();
                    var amount = $row.find('input[name="amount"]').val();
                    var paymentDayDepend = $row.find('input[name="payment_day_depend"]').prop(
                        'checked') ? 1 : 0;
                    var taxApplicable = $row.find('input[name="tax_applicable"]').prop('checked') ? 1 : 0;
                    var formulaBased = $row.find('input[name="formula_based"]').prop('checked') ? 1 : 0;

                    earnings.push({
                        type: 'earning',
                        salary_component_id: salaryComponentId,
                        amount: amount,
                        payment_day_depend: paymentDayDepend,
                        tax_applicable: taxApplicable,
                        formula_based: formulaBased
                    });
                });

                // Collect deductions data
                $('#editable-deduction-table tr').each(function() {
                    var $row = $(this); // Use jQuery to refer to the current row
                    var salaryComponentId = $row.find('select[name="salary_component_id"]').val();
                    var amount = $row.find('input[name="amount"]').val();
                    var paymentDayDepend = $row.find('input[name="payment_day_depend"]').prop(
                        'checked') ? 1 : 0;
                    var taxApplicable = $row.find('input[name="tax_applicable"]').prop('checked') ? 1 : 0;
                    var formulaBased = $row.find('input[name="formula_based"]').prop('checked') ? 1 : 0;

                    deductions.push({
                        type: 'deduction',
                        salary_component_id: salaryComponentId,
                        amount: amount,
                        payment_day_depend: paymentDayDepend,
                        tax_applicable: taxApplicable,
                        formula_based: formulaBased
                    });
                });

                // Combine earnings and deductions
                var formData = {
                    earnings: earnings,
                    deductions: deductions,
                };

                return formData;
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
                    if ($("#salary_structure_id").val() === "") {
                        toastr.success(response.message);
                    } else {
                        toastr.success("Data has been updated successfully");
                    }
                } else {
                    toastr.error(response.message);
                }
            }

            function activateTab(tabId) {
                $('ul[role="tablist"] li button').removeClass('active');
                $('.tab-pane').removeClass('active').hide();

                $(`ul[role="tablist"] li button[data-tw-target="${tabId}"]`).addClass('active');
                const tabContent = $(tabId);
                tabContent.addClass('active').show();

                // Disconnect the previous observer if it exists
                if (observer) {
                    observer.disconnect();
                }

                // Create a new observer
                observer = new MutationObserver(function(mutationsList) {
                    for (let mutation of mutationsList) {
                        if (mutation.type === 'attributes' && mutation.attributeName === 'style') {
                            if (tabContent.css('display') === 'none') {
                                tabContent.css({
                                    'display': 'block',
                                    'visibility': 'visible',
                                    'opacity': '1'
                                });
                            }
                        }
                    }
                });

                observer.observe(tabContent[0], {
                    attributes: true
                });
            }


            function handleErrorResponse(result, tabId) {
                const errorString = result.error || 'An error occurred.';
                toastr.error(`There were validation errors on tab ${tabId}`);
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
                            `<div class="error-message text-danger mt-1 text-xs text-slate-500 sm:ml-auto sm:mt-0 mb-2">${fieldName} is not allowed to be empty</div>`
                        );
                        // toastr.error(`${fieldName} is not allowed to be empty`);
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
