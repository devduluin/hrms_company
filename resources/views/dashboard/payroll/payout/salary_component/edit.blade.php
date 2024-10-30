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
                            <input type="hidden" name="employee_id" id="employee_id" value="" />
                            @include('dashboard.payroll.payout.salary_component.tabs')
                            <div class="box box--stacked flex flex-col p-5">
                                @include('dashboard.payroll.payout.salary_component.tab-content')
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
            const initialTab = $('ul[role="tablist"] li:first-child button');
            initialTab.addClass('active');
            $(initialTab.data('tw-target')).addClass('active').removeAttr('style').show();

            let lastActiveTabId = initialTab.data('tw-target');
            const appToken = localStorage.getItem('app_token');

            $('ul[role="tablist"] li button[role="tab"]').on('click', async function(e) {
                const newTabId = $(this).data('tw-target');

                if (lastActiveTabId !== newTabId) {
                    e.preventDefault();
                    // await handleFormSubmission(lastActiveTabId);
                    lastActiveTabId = newTabId;

                    $(lastActiveTabId + "-btn").click(async function(e) {
                        // console.log(lastActiveTabId + "-form");
                        e.preventDefault();
                        // await handleFormSubmission(lastActiveTabId);
                    });
                }
            });

            handleGetData(`{{ $salaryComponentId }}`, lastActiveTabId);

            $(lastActiveTabId + "-btn").click(async function(e) {
                e.preventDefault();
                await handleFormSubmission(lastActiveTabId);
            });

            async function handleGetData(id, tabId) {
                $.ajax({
                    url: `{{ $apiPayrollUrl }}/salary_component/${id}`,
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
                            const typeSelect = $('#type')[0].tomselect;
                            const typeValue = response.data.type;
                            if (!typeSelect.options[typeValue]) {
                                typeSelect.addOption({
                                    value: typeValue,
                                    text: typeValue
                                });
                            }
                            typeSelect.setValue(typeValue);

                            $("#parent_company").val(response.data
                                .parent_company);

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
                            getParentCompany(companyValue);

                            $("#description").val(response.data.description);
                            $("#amount").val(parseFloat(response.data.amount));
                            $("#depends_on_payment_day").attr("checked", response.data
                                .depends_on_payment_day == 1 ? true : false);
                            $("#is_tax_applicable").attr("checked", response.data.is_tax_applicable ==
                                1 ? true : false);
                            $("#deduct_tax_on_payroll_date").attr("checked", response.data
                                .deduct_tax_on_payroll_date == 1 ? true : false);
                            $("#round_nearest_integer").attr("checked", response.data
                                .round_nearest_integer == 1 ? true : false);
                            $("#include_in_total").attr("checked", response.data.include_in_total == 1 ?
                                true : false);
                            $("#remove_if_zero").attr("checked", response.data.remove_if_zero == 1 ?
                                true : false);
                            $("#is_disable").attr("checked", response.data.is_disable == 1 ? true :
                                false);
                        } else {
                            showErrorNotification('error', response.message);
                        }
                    },
                    error: function(xhr) {
                        const response = JSON.parse(xhr.responseText);
                        handleErrorResponse(response, tabId);
                    }
                });
                return false;
            }

            async function handleFormSubmission(formId) {
                const currentForm = $(formId + "-form");
                const data = serializeFormData(currentForm);
                const employeeId = $("#employee_id").val();
                data._token = $('meta[name="csrf-token"]').attr('content');
                data.company_id = localStorage.getItem('company');
                $('.error-message').hide();
                if (formId !== "#overview") {
                    showErrorNotification('error', "Please create component data first");
                }

                data.depends_on_payment_day = $("#depends_on_payment_day").is(":checked") ? 1 : 0;
                data.is_tax_applicable = $("#is_tax_applicable").is(":checked") ? 1 : 0;
                data.deduct_tax_on_payroll_date = $("#deduct_tax_on_payroll_date").is(":checked") ? 1 : 0;
                data.round_nearest_integer = $("#round_nearest_integer").is(":checked") ? 1 : 0;
                data.include_in_total = $("#include_in_total").is(":checked") ? 1 : 0;
                data.remove_if_zero = $("#remove_if_zero").is(":checked") ? 1 : 0;
                data.is_disable = $("#is_disable").is(":checked") ? 1 : 0;

                try {
                    const response = await $.ajax({
                        url: currentForm.attr('action') + '/' + `{{ $salaryComponentId }}`,
                        type: 'PUT',
                        contentType: 'application/json',
                        crossDomain: true,
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
                        showErrorNotification('error', 'An error occurred while processing your request.');
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
                    /*location.href =
                        `{{ url('dashboard/hrms/payout/salary_component') }}/edit_component/${response.data.id}`;*/
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

            // get parent company id
            $("#company_id").change(async function() {
                await getParentCompany($(this).val());
            });

            async function getParentCompany(company) {
                const companyId = company;
                try {
                    if (companyId) {
                        const response = await fetch(
                            `{{ $apiCompanyUrl }}/company/${companyId}`, {
                                method: 'GET',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Authorization': `Bearer ${localStorage.getItem('app_token')}`,
                                    'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`
                                },
                            });

                        if (!response.ok) {
                            showErrorNotification('error', response.message);
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }

                        const parentCompany = await response.json();
                        $("#parent_company").val(parentCompany.data.parent_company);
                    } else {
                        $("#parent_company").val("");
                    }
                } catch (error) {
                    console.error('Fetch error:', error);
                    showErrorNotification('error', response.message);
                }
            }
        });
    </script>
@endpush
