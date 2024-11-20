@extends('layouts.dashboard.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/tom-select.css') }}">
    <div
        class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')
        <div id="contents-page"
            class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
            <div class="container bpx">
                <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                    <div class="col-span-12">
                        <div class=" flex flex-col mb-4 gap-x-3 md:h-10 md:flex-row md:items-center ">
                            <div class="text-base font-medium group-[.mode--light]:text-white">
                                {{ $page_title }}
                            </div>
                            <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                                <x-form.button label="Save changes" id="save-btn" style="primary" type="submit"
                                    icon="save" />
                            </div>
                        </div>
                        <div class="box box--stacked flex flex-col p-5">
                            <form id="payroll-setting-form" method="PUT"
                                action="http://apidev.duluin.com/api/v1/salary_structure_assignments/salary_structure_assignment/{{ $salaryStructureEmployeeAssignmentId }}">
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
                const id = `{{ $salaryStructureEmployeeAssignmentId }}`;
                const tabId = '';
                $.ajax({
                    url: `http://apidev.duluin.com/api/v1/salary_structure_assignments/salary_structure_assignment/by_assignment_employee/${id}`,
                    type: 'GET',
                    headers: {
                        'Authorization': `Bearer ${appToken}`,
                        'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`
                    },
                    dataType: 'json',
                    success: await
                    function(response) {
                        if (response.success) {
                            // console.log(response.message);
                            const employeeSelect = $('#employee_id')[0].tomselect;
                            const employeeValue = response.data.employee_id;

                            employeeSelect.on('load', function() {
                                if (!employeeSelect.options[employeeValue]) {
                                    employeeSelect.addOption({
                                        value: employeeValue,
                                        text: employeeValue
                                    });
                                }
                                employeeSelect.setValue(employeeValue);
                            });

                            const salaryStructureSelect = $('#salary_structure_id')[0].tomselect;
                            const salaryStructureValue = response.data.salaryStructureAssignment
                                .salary_structure_id;

                            salaryStructureSelect.on('load', function() {
                                if (!salaryStructureSelect.options[salaryStructureValue]) {
                                    salaryStructureSelect.addOption({
                                        value: salaryStructureValue,
                                        text: salaryStructureValue
                                    });
                                }
                                salaryStructureSelect.setValue(salaryStructureValue);
                            });

                            const companySelect = $('#company_id')[0].tomselect;
                            const companyValue = response.data.company_id;

                            companySelect.on('load', function() {
                                if (!companySelect.options[companyValue]) {
                                    companySelect.addOption({
                                        value: companyValue,
                                        text: companyValue
                                    });
                                }
                                companySelect.setValue(companyValue);
                            });

                            $("#start_date").val(response.data.salaryStructureAssignment.start_date);
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
                const currentForm = $("#payroll-setting-form");
                const data = serializeFormData(currentForm);
                data._token = $('meta[name="csrf-token"]').attr('content');
                data.company_id = localStorage.getItem('company');
                // data.structureAssignmentEmployeeId = `{{ $salaryStructureEmployeeAssignmentId }}`;
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

                data.employee_id = $('#employee_id').val();
                data.currency_id = "";
                data.payment_method = "";
                data.account_id = "";

                try {
                    const response = await $.ajax({
                        url: currentForm.attr('action'),
                        type: 'PUT',
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
