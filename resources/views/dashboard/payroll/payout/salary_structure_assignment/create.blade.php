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
                        <div class=" flex flex-col mb-4 gap-x-3 md:h-10 md:flex-row md:items-center ">
                            <div class="text-base font-medium group-[.mode--light]:text-white">
                                {{ $page_title }}
                            </div>
                            <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                                <button onclick="history.go(-1)"
                                    class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md w-24">
                                    <i data-tw-merge="" data-lucide="arrow-left" class="mr-3 h-4 w-4 stroke-[1.3]"></i> Back
                                </button>
                                <x-form.button label="Save changes" id="save-btn" style="primary" type="submit"
                                    icon="save" />
                            </div>
                        </div>
                        <div class="box box--stacked flex flex-col p-5">
                            <form id="payroll-setting-form" method="post"
                                action="http://apidev.duluin.com/api/v1/salary_structure_assignments/salary_structure_assignment">
                                @csrf
                                <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-2 gap-5 mt-4">
                                    <x-form.select id="employee_id" name="employee_id" label="Employee"
                                        url="{{ url('dashboard/hrms/employee') }}"
                                        apiUrl="{{ $apiEmployeeUrl }}/employee/datatables"
                                        columns='["first_name","last_name"]' :keys="[
                                            'company_id' => $company,
                                        ]" required>
                                        <option value="">Select Employee</option>
                                    </x-form.select>

                                    <x-form.select id="salary_structure_id" name="salary_structure_id"
                                        label="Salary Structure" url="{{ url('dashboard/hrms/payout/salary_structure') }}"
                                        apiUrl="http://apidev.duluin.com/api/v1/salary_structures/salary_structure/datatables"
                                        columns='["name"]' :keys="[
                                            'company_id' => $company,
                                        ]" required>
                                        <option value="">Select Structure</option>
                                    </x-form.select>

                                    <x-form.select id="company_id" name="company_id" label="Company"
                                        url="{{ url('dashboard/hrms/designation') }}"
                                        apiUrl="{{ $apiCompanyUrl }}/company/datatables" columns='["company_name"]'
                                        :selected="$company" :keys="[
                                            'company_id' => $company,
                                        ]" required>
                                        <option value="">Select Company</option>
                                    </x-form.select>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-2 gap-5 mt-4">
                                    <x-form.datepicker id="start_date" label="From Date" name="start_date" required />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('vendor-common.toastr')
@push('js')
    <script type="text/javascript">
        console.log("testing");
        $(document).ready(function() {
            $("#save-btn").click(async function(e) {
                e.preventDefault();
                await handleFormSubmission();
            });

            handleGetData();

            async function handleGetData() {
                var tabId = '';
                // $.ajax({
                //     url: ``,
                //     type: 'GET',
                //     headers: {
                //         'Authorization': `Bearer ${appToken}`,
                //         'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`
                //     },
                //     dataType: 'json',
                //     success: await
                //     function(response) {
                //         if (response.success) {
                //             // console.log(response.message);
                //         } else {
                //             showErrorNotification('error', response.message);
                //         }
                //     },
                //     error: function(xhr) {
                //         const response = JSON.parse(xhr.responseText);
                //         handleErrorResponse(response, tabId);
                //     }
                // });
                // return false;
            }

            async function handleFormSubmission(formId) {
                const currentForm = $("#payroll-setting-form");
                const data = serializeFormData(currentForm);
                data._token = $('meta[name="csrf-token"]').attr('content');
                data.company_id = localStorage.getItem('company');
                $('.error-message').hide();

                // Add a flag to prevent form submission
                if (currentForm.data('submitted')) {
                    return false;
                }
                currentForm.data('submitted', true);
                /* var selectedEmployee = $('#employee_id').val();
                data.employees = [{
                    "id": selectedEmployee
                }]; */

                data.currency_id = "";
                data.payment_method = "";
                data.account_id = "";
                data.employee_id = $('#employee_id').val();

                try {
                    const response = await $.ajax({
                        url: currentForm.attr('action'),
                        type: 'POST',
                        contentType: 'application/json',
                        crossDomain: true,
                        headers: {
                            'Authorization': `Bearer ${appToken}`,
                            'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`
                        },
                        data: JSON.stringify(data),
                        dataType: 'json',
                    });

                    handleResponse(response);
                } catch (xhr) {
                    if (xhr.status === 422) {
                        console.log(xhr.responseText);
                        const response = JSON.parse(xhr.responseText);
                        handleErrorResponse(response, formId);
                    } else {
                        // showErrorNotification('error', 'An error occurred while processing your request.');
                    }
                }
                currentForm.data('submitted', false);
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
                    location.href =
                        `{{ url('dashboard/hrms/payout/salary_structure_assignment') }}`;
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
@endPush
