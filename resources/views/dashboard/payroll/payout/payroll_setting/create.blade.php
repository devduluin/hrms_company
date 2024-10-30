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
                            <form id="payroll-setting-form" method="post"
                                action="http://apidev.duluin.com/api/v1/payroll/payroll_setting">
                                @csrf
                                <div
                                    class="mb-6 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
                                    {{ __('message.working_days_and_hours_title') }}
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-4">
                                    <input type="hidden" id="parent_company" name="parent_company" />
                                    <x-form.select id="company_id" name="company_id" label="Company"
                                        url="{{ url('dashboard/hrms/designation') }}"
                                        apiUrl="{{ $apiCompanyUrl }}/company/datatables" columns='["company_name"]'
                                        :selected="$company" :keys="[
                                            'company_id' => $company,
                                        ]">
                                        <option value="">Select Company</option>
                                    </x-form.select>
                                    <x-form.select name="calculate_payroll_working_day" id="calculate_payroll_working_day"
                                        label="{{ __('payroll_setting.basic_payroll_calculation_by') }}"
                                        class="tom-select w-full" data-placeholder="Select option" required>d[r4cfxx]
                                        <option value="">Select salutation</option>
                                        <option value="attendance">Attendance</option>
                                        <option value="leave">Leave</option>
                                    </x-form.select>
                                    <x-form.select name="consider_unmarked_attendance_as"
                                        id="consider_unmarked_attendance_as" label="Consider Unmarked Attendance As"
                                        class="tom-select w-full" data-placeholder="Select option">
                                        <option value="present">Present</option>
                                        <option value="absent">Absent</option>
                                    </x-form.select>
                                    <x-form.select id="default_deduction_base_component"
                                        name="default_deduction_base_component" label="Default Base Deduction Component"
                                        url="{{ url('dashboard/hrms/designation') }}"
                                        apiUrl="{{ $apiPayrollUrl }}/salary_component/datatables" columns='["name"]'
                                        :keys="[
                                            'company_id' => $company,
                                            'type' => 'earning',
                                        ]">
                                        <option value="">Select Salary Component</option>
                                    </x-form.select>
                                    <x-form.input id="max_working_against_timesheet"
                                        label="{{ __('payroll_setting.max_working_hours_against_timesheet') }}"
                                        name="max_working_against_timesheet" required />
                                    <x-form.input id="fraction_of_daily_salary_half_day"
                                        label="Fraction of Daily Salary for Half Day"
                                        name="fraction_of_daily_salary_half_day" required />
                                    <x-checkbox id="is_include_holiday_in_total_work_day"
                                        label="Include holidays in Total no of Working Days"
                                        name="is_include_holiday_in_total_work_day"
                                        guidelines="If checked, total no. of working days will include holidays, and this will reduce the value of Salary Per Day" />
                                    <div id="is_concider_marked_attendance_holiday_box" class="hidden">
                                        <x-checkbox id="is_concider_marked_attendance_holiday"
                                            label="Consider Marked Attendance on Holidays"
                                            name="is_concider_marked_attendance_holiday"
                                            guidelines="If checked, deduct payment days for absent attendance on holidays. By default, holidays are considered as paid" />
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-5 mt-4">

                                </div>
                                <div
                                    class="mb-6 mt-4 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
                                    Salary Slip
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-4">
                                    <x-checkbox id="is_disabled_rounded_total" label="Disabled Rounded Total"
                                        name="is_disabled_rounded_total"
                                        guidelines="If checked, hides and disables Rounded Total Field in Salary Slip" />
                                    <x-checkbox id="is_show_leave_balances_in_slip"
                                        label="Show Leave Balances in Salary Slip" name="is_show_leave_balances_in_slip" />
                                </div>

                                <div class="grid grid-cols-2 gap-5 mt-4">
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

            $("#is_include_holiday_in_total_work_day").click(function() {
                if ($(this).is(":checked")) {
                    $("#is_concider_marked_attendance_holiday_box").removeClass("hidden");
                } else {
                    $("#is_concider_marked_attendance_holiday_box").addClass("hidden");
                }
            });

            async function handleFormSubmission(formId) {
                const currentForm = $("#payroll-setting-form");
                const data = serializeFormData(currentForm);
                data._token = $('meta[name="csrf-token"]').attr('content');
                data.company_id = $("#company_id").val();
                data.parent_company = $("#parent_company").val();
                $('.error-message').hide();

                // Add a flag to prevent form submission
                if (currentForm.data('submitted')) {
                    return false;
                }
                currentForm.data('submitted', true);

                if ($("#is_concider_marked_attendance_holiday").is(":checked")) {
                    data.is_concider_marked_attendance_holiday = true;
                } else {
                    data.is_concider_marked_attendance_holiday = false;
                }

                if ($("#is_include_holiday_in_total_work_day").is(":checked")) {
                    data.is_include_holiday_in_total_work_day = true;
                } else {
                    data.is_include_holiday_in_total_work_day = false;
                }

                if ($("#is_disabled_rounded_total").is(":checked")) {
                    data.is_disabled_rounded_total = true;
                } else {
                    data.is_disabled_rounded_total = false;
                }

                if ($("#is_show_leave_balances_in_slip").is(":checked")) {
                    data.is_show_leave_balances_in_slip = true;
                } else {
                    data.is_show_leave_balances_in_slip = false;
                }

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
                        const message = JSON.parse(xhr.responseText);
                        showErrorNotification('error', message.message);
                    }
                }
                // return false;
                // Reset the flag after submission
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
                        `{{ url('dashboard/hrms/payout/settings') }}/edit/${response.data.id}`;
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
