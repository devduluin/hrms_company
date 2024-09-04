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
                        <div class="flex flex-col mb-4 gap-y-3 md:h-10 md:flex-row md:items-center">
                            <div class="text-base font-medium group-[.mode--light]:text-white">
                                {{ $page_title }}
                            </div>
                            <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                                <a href="{{ url('/dashboard/hrms/employee/list') }}"
                                    class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md w-24">
                                    <i data-tw-merge="" data-lucide="arrow-left" class="mr-3 h-4 w-4 stroke-[1.3]"></i> Back
                                </a>
                                <x-form.button label="Send Verification Email" id="verification-btn" style="primary"
                                    type="mailIcon" icon="save" />
                            </div>
                        </div>
                        <div class="mt-1.5 flex flex-col">
                            <input type="hidden" name="employee_id" id="employee_id" value="{{ $employee_id }}" />
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
            // Initialize the first tab as active
            const initialTab = $('ul[role="tablist"] li:first-child button');
            initialTab.addClass('active');
            $(initialTab.data('tw-target')).addClass('active').removeAttr('style').show();

            let lastActiveTabId = initialTab.data('tw-target');
            console.log(lastActiveTabId);
            const appToken = localStorage.getItem('app_token');
            const employee_id = $("#employee_id").val();

            // call get data handler
            handleGetData(employee_id, lastActiveTabId);

            // $('ul[role="tablist"] li button[role="tab"]').on('click', async function(e) {
            //     const newTabId = $(this).data('tw-target');
            //     if (lastActiveTabId !== newTabId) {
            //         e.preventDefault();
            //         // await handleFormSubmission(lastActiveTabId);
            //         // await handleGetData(employee_id, newTabId);
            //         lastActiveTabId = newTabId;
            //         console.log(lastActiveTabId);

            //         $(lastActiveTabId + "-btn").click(async function(e) {
            //             console.log(lastActiveTabId + "-form");
            //             e.preventDefault();
            //             // await handleFormSubmission(lastActiveTabId);
            //             // await handleGetData(employee_id, newTabId);
            //         });
            //     }
            // });

            $(lastActiveTabId + "-btn").click(async function(e) {
                console.log(lastActiveTabId + "-form");
                e.preventDefault();
                await handleFormSubmission(lastActiveTabId);
            });

            function handleGetData(employee_id, tabId) {
                console.log("Last active ID : ", tabId);
                console.log("Employee ID : ", employee_id);

                $.ajax({
                    url: `{{ $apiEmployeeUrl }}/employee/${employee_id}`,
                    type: 'GET',
                    headers: {
                        'Authorization': `Bearer ${appToken}`,
                        'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            if (!response.data.is_verified) {
                                $("#verification-btn").removeClass("hidden");
                            } else {
                                $("#verification-btn").addClass("hidden");
                            }
                            $("#first_name").val(response.data.first_name);
                            $("#last_name").val(response.data.last_name);
                            $("#phone_number").val(response.data.addressContact.mobile_phone);
                            $("#personal_email").val(response.data.addressContact.personal_email);
                            $("#gender").val(response.data.gender);

                            const genderSelect = $('#gender')[0].tomselect;
                            const genderValue = response.data.gender;
                            if (!genderSelect.options[genderValue]) {
                                genderSelect.addOption({
                                    value: genderValue,
                                    text: genderValue
                                });
                            }
                            genderSelect.setValue(genderValue);

                            $("#date_of_joining").val(response.data.date_of_joining);
                            $("#date_of_birth").val(response.data.date_of_birth);
                            $("#place_of_birth").val(response.data.place_of_birth);

                            const salutationSelect = $('#salutation')[0].tomselect;
                            const salutationValue = response.data.salutation;
                            if (!salutationSelect.options[salutationValue]) {
                                salutationSelect.addOption({
                                    value: salutationValue,
                                    text: salutationValue
                                });
                            }
                            salutationSelect.setValue(salutationValue);

                            const statusSelect = $('#status')[0].tomselect;
                            const statusValue = response.data.status;
                            if (!statusSelect.options[statusValue]) {
                                statusSelect.addOption({
                                    value: statusValue,
                                    text: statusValue
                                });
                            }
                            statusSelect.setValue(statusValue);
                        } else {
                            console.log(response.message);
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                        const response = JSON.parse(xhr.responseText);
                        handleErrorResponse(response, tabId);
                    }
                });
            }

            async function handleFormSubmission(formId) {
                const currentForm = $(formId + "-form");
                const data = serializeFormData(currentForm);
                const employeeId = $("#employee_id").val();
                data._token = $('meta[name="csrf-token"]').attr('content');
                data.company_id = localStorage.getItem('company');
                data.employee_id = employeeId;
                $('.error-message').hide();

                if (employeeId == "" && formId !== "#overview") {
                    toastr.error("Please create Employee Overview data first");
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
                        toastr.success(response.message);
                        // send email notification
                        handleNotification(response);
                    } else {
                        toastr.success("Data has been updated successfully");
                    }
                    // console.log("Employee ID : ", response.data.employee.id);
                    $("#employee_id").val(response.data.employee.id);
                } else {
                    toastr.error(response.message);
                }
            }

            // click on verification-btn
            $("#verification-btn").click(function() {
                handleNotification();
            });

            function handleNotification() {
                console.log("sending process");
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
                        employee_id: `{{ $employee_id }}`,
                        company_id: localStorage.getItem('company'),
                        personal_email: $("#personal_email").val(),
                        phone_number: $("#phone_number").val(),
                        first_name: $("#first_name").val(),
                        last_name: $("#last_name").val(),
                    },
                    dataType: 'json',
                    success: function(data) {
                        toastr.success('Verification email sent successfully.');
                    },
                    error: function(error) {
                        toastr.error('Failed to send verification email.');
                    }
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
