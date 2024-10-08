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
                                    Working Days and Hours
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-4">
                                    <x-form.select name="calculate_payroll_working_day" id="calculate_payroll_working_day"
                                        label="Calculate Payroll Working Days Based On" class="tom-select w-full"
                                        data-placeholder="Select option" required>
                                        <option value="">Select salutation</option>
                                        <option value="attendance">Attendance</option>
                                        <option value="leave">Leave</option>
                                    </x-form.select>
                                    <x-form.input id="max_working_against_timesheet"
                                        label="Max working hours against Timesheet" name="max_working_against_timesheet"
                                        required />
                                    <x-form.input id="fraction_of_daily_salary_half_day"
                                        label="Fraction of Daily Salary for Half Day"
                                        name="fraction_of_daily_salary_half_day" required />
                                    <x-checkbox id="is_include_holiday_in_total_work_day"
                                        label="Include holidays in Total no of Working Days"
                                        name="is_include_holiday_in_total_work_day"
                                        guidelines="If checked, total no. of working days will include holidays, and this will reduce the value of Salary Per Day" />
                                    <x-checkbox id="is_concider_marked_attendance_holiday"
                                        label="Consider Marked Attendance on Holidays"
                                        name="is_concider_marked_attendance_holiday"
                                        guidelines="If checked, deduct payment days for absent attendance on holidays. By default, holidays are considered as paid" />
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

            handleGetData();

            async function handleGetData() {
                $.ajax({
                    url: `http://apidev.duluin.com/api/v1/payroll/payroll_setting/${localStorage.getItem('company')}`,
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
                            $("#max_working_against_timesheet").val(response.data
                                .max_working_against_timesheet);
                            $("#fraction_of_daily_salary_half_day").val(response.data
                                .fraction_of_daily_salary_half_day);
                            const calculateSelect = $('#calculate_payroll_working_day')[0].tomselect;
                            const calculateValue = response.data.calculate_payroll_working_day;
                            if (!calculateSelect.options[calculateValue]) {
                                calculateSelect.addOption({
                                    value: calculateValue,
                                    text: calculateValue
                                });
                            }
                            calculateSelect.setValue(calculateValue);

                            if (response.data.is_concider_marked_attendance_holiday) {
                                $("#is_concider_marked_attendance_holiday").attr("checked", true);
                            } else {
                                $("#is_concider_marked_attendance_holiday").attr("checked", false);
                            }

                            if (response.data.is_include_holiday_in_total_work_day) {
                                $("#is_include_holiday_in_total_work_day").attr("checked", true);
                            } else {
                                $("#is_include_holiday_in_total_work_day").attr("checked", false);
                            }

                            if (response.data.is_disabled_rounded_total) {
                                $("#is_disabled_rounded_total").attr("checked", true);
                            } else {
                                $("#is_disabled_rounded_total").attr("checked", false);
                            }

                            if (response.data.is_show_leave_balances_in_slip) {
                                $("#is_show_leave_balances_in_slip").attr("checked", true);
                            } else {
                                $("#is_show_leave_balances_in_slip").attr("checked", false);
                            }
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
                        url: currentForm.attr('action') +
                            '/' + localStorage.getItem('company'),
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
                        showErrorNotification('error', 'An error occurred while processing your request.');
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
                    if ($("#employee_id").val() === "") {
                        showSuccessNotification('success', response.message);
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
