@extends('layouts.dashboard.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/tom-select.css') }}">

    <div
        class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')
        <div id="contents-page"
            class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
            <div class="mt-[45px] col-span-12 w-full">
                <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                    <div class="col-span-12">
                        <div class="flex flex-col mb-4 gap-y-3 md:h-10 md:flex-row md:items-center">
                            <div class="text-base font-medium group-[.mode--light]:text-white">
                                {{ $page_title }}
                            </div>
                            <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                                <button onclick="history.go(-1)"
                                    class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md w-24">
                                    <i data-tw-merge="" data-lucide="arrow-left" class="mr-3 h-4 w-4 stroke-[1.3]"></i> Back
                                </button>
                            </div>
                        </div>
                        <div class="mt-1.5 flex flex-col">
                            <input type="hidden" name="employee_id" id="employee_id" value="" />
                            @include('dashboard.hrms.employees.tabs')
                            <div class="box box--stacked flex flex-col p-5">
                                @include('dashboard.hrms.employees.tab-content')
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

            $('ul[role="tablist"] li button[role="tab"]').on('click', function (e) {
                const newTabId = $(this).data('tw-target');

                if (lastActiveTabId !== newTabId) {
                    e.preventDefault();
                    lastActiveTabId = newTabId;

                    // Unbind previous click event to avoid duplicate bindings
                    $(`${lastActiveTabId}-btn`).off('click').on('click', async function (e) {
                        e.preventDefault();

                        // Check for required fields
                        const requiredFields = [
                            '#employee_card_id', '#first_name', '#last_name', '#phone_number',
                            '#personal_email', '#gender', '#date_of_joining', '#date_of_birth',
                            '#place_of_birth', '#salutation', '#status'
                        ];

                        const emptyFields = $(requiredFields.join(',')).filter(function () {
                            return $(this).val() === '';
                        });

                        if (emptyFields.length > 0) {
                            showErrorNotification('error', 'Please fill all required input in overview form');
                        } else {
                            await handleFormSubmission(lastActiveTabId);
                        }
                    });
                }
            });

            // Initial click event binding for the first tab
            $(`${lastActiveTabId}-btn`).off('click').on('click', async function (e) {
                e.preventDefault();

                const requiredFields = [
                    '#employee_card_id', '#first_name', '#last_name', '#phone_number',
                    '#personal_email', '#gender', '#date_of_joining', '#date_of_birth',
                    '#place_of_birth', '#salutation', '#status'
                ];

                const emptyFields = $(requiredFields.join(',')).filter(function () {
                    return $(this).val() === '';
                });

                if (emptyFields.length > 0) {
                    showErrorNotification('error', 'Please fill all required input in overview form');
                } else {
                    await handleFormSubmission(lastActiveTabId);
                }
            });


            async function handleFormSubmission(formId) {
                const currentForm = $(formId + "-form");
                const data = serializeFormData(currentForm);
                const employeeId = $("#employee_id").val();
                data._token = $('meta[name="csrf-token"]').attr('content');
                data.company_id = $("#company_id").val();
                data.parent_company = $("#parent_company").val();
                data.employee_id = employeeId;
                $('.error-message').hide();
                if (employeeId == "" && formId !== "#overview") {
                    showErrorNotification('error', "Please create Employee Overview data first");
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
                        showErrorNotification('error', 'An error occurred while processing your request.');
                    }
                    // activateTab(formId);
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
                    if ($("#employee_id").val() === "") {
                        showSuccessNotification('success', response.message);
                        // handleNotification(response);
                    } else {
                        showSuccessNotification('success', "Data has been updated successfully");
                    }
                    $("#employee_id").val(response.data.employee.id);
                    location.href =
                        `{{ url('dashboard/hrms/employee') }}/edit_employee/${response.data.employee.id}`;
                } else {
                    showErrorNotification('error', response.message);
                }
            }

            function handleNotification(response) {
                console.log(response);
                $.ajax({
                    url: `{{ $apiGateway }}/send_verification_email`,
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${appToken}`,
                        'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`
                    },
                    crossDomain: true,
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        employee_id: response.data.employee.id,
                        company_id: response.data.employee.company_id,
                        personal_email: response.data.addressData.personal_email,
                        phone_number: response.data.addressData.mobile_phone,
                        first_name: response.data.employee.first_name,
                        last_name: response.data.employee.last_name,
                    },
                    dataType: 'json',
                    success: function(data) {
                        showSuccessNotification('success', 'Verification email sent successfully.');
                    },
                    error: function(error) {
                        showErrorNotification('error', 'Failed to send verification email.');
                    }
                });
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
                const companyId = $(this).val();
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
            });
        });
    </script>
@endpush
