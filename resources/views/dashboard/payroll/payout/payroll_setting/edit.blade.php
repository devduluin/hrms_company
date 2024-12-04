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
                                action="http://apidev.duluin.com/api/v1/payroll/payroll_setting">
                                @csrf
                                <div
                                    class="mb-6 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
                                    {{ __('message.working_days_and_hours_title') }}
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-4">
                                    <input type="hidden" id="parent_company" name="parent_company" />
                                    <x-form.select id="company_id" name="company_id" label="Company"
                                        url="{{ url('dashboard/hrms/company') }}"
                                        apiUrl="{{ $apiCompanyUrl }}/company/datatables" columns='["company_name"]'
                                        :keys="[
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
            let id = `{{ $id }}`;

            handleGetData();

            async function handleGetData() {
                let tabId = "";
                let companyId = localStorage.getItem("company");
                $.ajax({
                    url: `http://apidev.duluin.com/api/v1/payroll/payroll_setting/getByCompany/${id}`,
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
                            console.log("Jumlah maksimal jam kerja : ", response.data
                                .max_working_against_timesheet);
                            $("#max_working_against_timesheet").val(parseFloat(response.data
                                .max_working_against_timesheet));
                            $("#fraction_of_daily_salary_half_day").val(response.data
                                .fraction_of_daily_salary_half_day);

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

                            const calculateSelect = $('#calculate_payroll_working_day')[0].tomselect;
                            const calculateValue = response.data.calculate_payroll_working_day;
                            if (!calculateSelect.options[calculateValue]) {
                                calculateSelect.addOption({
                                    value: calculateValue,
                                    text: calculateValue
                                });
                            }
                            calculateSelect.setValue(calculateValue);

                            const considerUnmarkedAttendanceSelect = $(
                                '#consider_unmarked_attendance_as')[0].tomselect;
                            const considerUnmarkedAttendanceValue = response.data
                                .consider_unmarked_attendance_as;
                            if (!considerUnmarkedAttendanceSelect.options[
                                    considerUnmarkedAttendanceValue]) {
                                considerUnmarkedAttendanceSelect.addOption({
                                    value: considerUnmarkedAttendanceValue,
                                    text: considerUnmarkedAttendanceValue
                                });
                            }
                            considerUnmarkedAttendanceSelect.setValue(considerUnmarkedAttendanceValue);

                            const defaultDeductionComponentSelect = $(
                                '#default_deduction_base_component')[0].tomselect;
                            const defaultDeductionComponentValue = response.data
                                .default_deduction_base_component;

                            defaultDeductionComponentSelect.on('load', function() {
                                if (!defaultDeductionComponentSelect.options[
                                        defaultDeductionComponentValue]) {
                                    defaultDeductionComponentSelect.addOption({
                                        value: defaultDeductionComponentValue,
                                        text: response.data
                                            .default_deduction_base_component
                                    });
                                }
                                defaultDeductionComponentSelect.setValue(
                                    defaultDeductionComponentValue);
                            });

                            if (response.data.is_concider_marked_attendance_holiday) {
                                $("#is_concider_marked_attendance_holiday").attr("checked", true);
                            } else {
                                $("#is_concider_marked_attendance_holiday").attr("checked", false);
                            }

                            if (response.data.is_include_holiday_in_total_work_day) {
                                $("#is_include_holiday_in_total_work_day").attr("checked", true);
                                $("#is_concider_marked_attendance_holiday_box").removeClass("hidden");
                            } else {
                                $("#is_include_holiday_in_total_work_day").attr("checked", false);
                                $("#is_concider_marked_attendance_holiday_box").addClass("hidden");
                            }

                            if (response.data.is_concider_marked_attendance_holiday) {
                                $("#is_concider_marked_attendance_holiday").attr("checked", true);
                                $("#is_concider_marked_attendance_holiday_box").removeClass("hidden");
                            } else {
                                $("#is_concider_marked_attendance_holiday").attr("checked", false);
                                $("#is_concider_marked_attendance_holiday_box").addClass("hidden");
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
                        url: currentForm.attr('action') +
                            '/updateByCompany/' + id,
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
                    showSuccessNotification('success', response.message);
                    location.href =
                        `{{ url('dashboard/hrms/payout/settings') }}/list`;
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
@endPush
