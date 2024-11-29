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
            const initialTab = $('ul[role="tablist"] li:first-child button');
            initialTab.addClass('active');
            $(initialTab.data('tw-target')).addClass('active').removeAttr('style').show();

            let lastActiveTabId = initialTab.data('tw-target');
            const appToken = localStorage.getItem('app_token');
            const employee_id = $("#employee_id").val();

            $('ul[role="tablist"] li button[role="tab"]').off('click').on('click', async function(e) {
                const newTabId = $(this).data('tw-target');

                if (lastActiveTabId !== newTabId) {
                    e.preventDefault();
                    lastActiveTabId = newTabId;
                    $(lastActiveTabId + "-btn").click(async function(e) {
                        // console.log(lastActiveTabId + "-form");
                        e.preventDefault();
                        await handleFormSubmission(lastActiveTabId);
                    });
                }
            });

            handleGetData(employee_id, lastActiveTabId);

            $(lastActiveTabId + "-btn").off('click').on('click', async function(e) {
                console.log("oke");
                e.preventDefault();
                await handleFormSubmission(lastActiveTabId);
            });

            console.log("current tab is " + lastActiveTabId);

            async function handleGetData(employee_id, tabId) {
                $.ajax({
                    url: `{{ $apiEmployeeUrl }}/employee/${employee_id}`,
                    type: 'GET',
                    headers: {
                        'Authorization': `Bearer ${appToken}`,
                        'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`
                    },
                    dataType: 'json',
                    success: await
                    function(response) {
                        if (response.success) {
                            if (!response.data.is_verified) {
                                $("#verification-btn").removeClass("hidden");
                            } else {
                                $("#verification-btn").addClass("hidden");
                            }
                            $("#employee_card_id").val(response.data.employee_id);
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
                                getParentCompany(companyValue);
                            });

                            if (response.data.designation_id_rel !== null) {
                                const designationSelect = $('#designation_id')[0].tomselect;
                                const designationValue = response.data.designation_id;

                                designationSelect.on('load', function() {
                                    if (!designationSelect.options[designationValue]) {
                                        designationSelect.addOption({
                                            value: designationValue,
                                            text: response.data.designation_id_rel
                                                .designation_name
                                        });
                                    }
                                    designationSelect.setValue(designationValue);
                                });
                            }

                            if (response.data.branch_id_rel !== null) {
                                const branchSelect = $('#branch_id')[0].tomselect;
                                const branchValue = response.data.branch_id;

                                branchSelect.on('load', function() {
                                    if (!branchSelect.options[branchValue]) {
                                        branchSelect.addOption({
                                            value: branchValue,
                                            text: response.data.branch_id_rel
                                                .branch_name
                                        });
                                    }
                                    branchSelect.setValue(branchValue);
                                });
                            }

                            if (response.data.department_id_rel !== null) {
                                const departmentSelect = $('#department_id')[0].tomselect;
                                const departmentValue = response.data.department_id;

                                departmentSelect.on('load', function() {
                                    if (!departmentSelect.options[departmentValue]) {
                                        departmentSelect.addOption({
                                            value: departmentValue,
                                            text: response.data.department_id_rel
                                                .department_name
                                        });
                                    }
                                    departmentSelect.setValue(departmentValue);
                                });
                            }

                            if (response.data.grade_id_rel !== null) {
                                const gradeSelect = $('#grade_id')[0].tomselect;
                                const gradeValue = response.data.grade_id;

                                gradeSelect.on('load', function() {
                                    if (!gradeSelect.options[gradeValue]) {
                                        gradeSelect.addOption({
                                            value: gradeValue,
                                            text: response.data.grade_id_rel
                                                .employee_grade_name
                                        });
                                    }
                                    gradeSelect.setValue(gradeValue);
                                });
                            }

                            if (response.data.employee_type_id_rel !== null) {
                                const employmentTypeSelect = $('#employee_type_id')[0].tomselect;
                                const employmentTypeValue = response.data.employee_type_id;

                                employmentTypeSelect.on('load', function() {
                                    if (!employmentTypeSelect.options[employmentTypeValue]) {
                                        employmentTypeSelect.addOption({
                                            value: employmentTypeValue,
                                            text: response.data.employee_type_id_rel
                                                .employment_type_name
                                        });
                                    }
                                    employmentTypeSelect.setValue(employmentTypeValue);
                                });
                            }

                            const reportSelect = $('#report_to')[0].tomselect;
                            const reportValue = response.data.report_to;

                            reportSelect.on('load', function() {
                                if (!reportSelect.options[reportValue]) {
                                    reportSelect.addOption({
                                        value: reportValue,
                                        text: response.data.report_to
                                    });
                                }
                                reportSelect.setValue(reportValue);
                            });

                            // joining
                            $("#confirmation_date").val(response.data.joinHistory.confirmation_date);
                            $("#notice_day").val(response.data.joinHistory.notice_day);
                            $("#offer_date").val(response.data.joinHistory.offer_date);
                            $("#contract_end_date").val(response.data.joinHistory.contract_end_date);
                            $("#date_of_retirement").val(response.data.joinHistory.date_of_retirement);
                            const jobApplicantSelect = $('#applicant_id')[0].tomselect;
                            const jobApplicantValue = response.data.joinHistory
                                .job_applicant_id;

                            jobApplicantSelect.on('load', function() {
                                if (!jobApplicantSelect.options[jobApplicantValue]) {
                                    jobApplicantSelect.addOption({
                                        value: jobApplicantValue,
                                        text: jobApplicantValue
                                    });
                                }
                                jobApplicantSelect.setValue(jobApplicantValue);
                            });

                            // address contact
                            $("#company_email").val(response.data.addressContact.company_email);
                            $("#current_address").val(response.data.addressContact.current_address);
                            $("#permanent_address").val(response.data.addressContact.permanent_address);
                            $("#emergency_contact_name").val(response.data.addressContact
                                .emergency_contact_name);
                            $("#emergency_phone").val(response.data.addressContact
                                .emergency_phone);
                            $("#relation").val(response.data.addressContact
                                .relation);

                            const preferedContactEmailSelect = $('#prefered_contact_email')[0]
                                .tomselect;
                            const preferedContactEmailValue = response.data.addressContact
                                .prefered_contact_email;
                            if (!preferedContactEmailSelect.options[preferedContactEmailValue]) {
                                preferedContactEmailSelect.addOption({
                                    value: preferedContactEmailValue,
                                    text: preferedContactEmailValue
                                });
                            }
                            preferedContactEmailSelect.setValue(preferedContactEmailValue);

                            const currentAddressSelect = $('#current_address_status')[0]
                                .tomselect;
                            const currentAddressValue = response.data.addressContact
                                .current_address_status;
                            if (!currentAddressSelect.options[currentAddressValue]) {
                                currentAddressSelect.addOption({
                                    value: currentAddressValue,
                                    text: currentAddressValue
                                });
                            }
                            currentAddressSelect.setValue(currentAddressValue);

                            const permanentAddressSelect = $('#permanent_address_status')[0]
                                .tomselect;
                            const permanentAddressValue = response.data.addressContact
                                .permanent_address_status;
                            if (!permanentAddressSelect.options[permanentAddressValue]) {
                                permanentAddressSelect.addOption({
                                    value: permanentAddressValue,
                                    text: permanentAddressValue
                                });
                            }
                            permanentAddressSelect.setValue(permanentAddressValue);

                            // attendance & leaves
                            if (response.data.attendanceLeave !== null) {
                                $("#attendance_device_id").val(response.data.attendanceLeave
                                    .attendance_device_id);

                                const defaultShiftSelect = $('#default_ship')[0].tomselect;
                                const defaultShiftValue = response.data.attendanceLeave
                                    .default_ship;

                                defaultShiftSelect.on('load', function() {
                                    if (!defaultShiftSelect.options[defaultShiftValue]) {
                                        defaultShiftSelect.addOption({
                                            value: defaultShiftValue,
                                            text: defaultShiftValue
                                        });
                                    }
                                    defaultShiftSelect.setValue(defaultShiftValue);
                                });

                                const expenseApproverSelect = $('#expense_approver')[0].tomselect;
                                const expenseApproverValue = response.data.attendanceLeave
                                    .expense_approver;

                                expenseApproverSelect.on('load', function() {
                                    if (!expenseApproverSelect.options[expenseApproverValue]) {
                                        console.log("Expense Approver Value: " +
                                            expenseApproverValue);
                                        expenseApproverSelect.addOption({
                                            value: expenseApproverValue,
                                            text: expenseApproverValue
                                        });
                                    }
                                    expenseApproverSelect.setValue(expenseApproverValue);
                                });

                                const shiftApproverSelect = $('#ship_request_approver')[0].tomselect;
                                const shiftApproverValue = response.data.attendanceLeave
                                    .ship_request_approver;

                                shiftApproverSelect.on('load', function() {
                                    if (!shiftApproverSelect.options[shiftApproverValue]) {
                                        shiftApproverSelect.addOption({
                                            value: shiftApproverValue,
                                            text: shiftApproverValue
                                        });
                                    }
                                    shiftApproverSelect.setValue(shiftApproverValue);
                                });

                                const leaveApproverSelect = $('#leave_approver')[0].tomselect;
                                const leaveApproverValue = response.data.attendanceLeave
                                    .leave_approver;

                                leaveApproverSelect.on('load', function() {
                                    if (!leaveApproverSelect.options[leaveApproverValue]) {
                                        leaveApproverSelect.addOption({
                                            value: leaveApproverValue,
                                            text: leaveApproverValue
                                        });
                                        console.log("Ada");
                                    }
                                    leaveApproverSelect.setValue(leaveApproverValue);
                                });
                            }

                            // personal data
                            const maritalStatusSelect = $('#marital_status')[0]
                                .tomselect;
                            const maritalStatusValue = response.data.personalData
                                .marital_status;
                            if (!maritalStatusSelect.options[maritalStatusValue]) {
                                maritalStatusSelect.addOption({
                                    value: maritalStatusValue,
                                    text: maritalStatusValue
                                });
                            }
                            maritalStatusSelect.setValue(maritalStatusValue);

                            const bloodGroupSelect = $('#blood_group')[0]
                                .tomselect;
                            const bloodGroupValue = response.data.personalData.blood_group;
                            console.log("Data blood group here : ", bloodGroupValue);
                            if (!bloodGroupSelect.options[bloodGroupValue]) {
                                bloodGroupSelect.addOption({
                                    value: bloodGroupValue,
                                    text: bloodGroupValue
                                });
                            }
                            bloodGroupSelect.setValue(bloodGroupValue);
                            $("#family_background").val(response.data.personalData.family_background);
                            $("#health_detail").val(response.data.personalData.health_details);
                            const healthInsuranceSelect = $('#health_insurance')[0]
                                .tomselect;
                            const healthInsuranceValue = response.data.personalData
                                .health_insurance;
                            if (!healthInsuranceSelect.options[healthInsuranceValue]) {
                                healthInsuranceSelect.addOption({
                                    value: healthInsuranceValue,
                                    text: healthInsuranceValue
                                });
                            }
                            healthInsuranceSelect.setValue(healthInsuranceValue);
                            $("#passport_number").val(response.data.personalData.passport_number);
                            $("#identity_card_number").val(response.data.identity_card_number);
                            $("#date_of_issued").val(response.data.personalData.date_of_issued);
                            $("#valid_upto").val(response.data.personalData.valid_upto);
                            $("#place_of_issued").val(response.data.personalData.place_of_issued);

                            // profile
                            $("#bio_cover_letter").val(response.data.profile.bio_cover_letter);

                            // exit
                            $("#resignation_letter_date").val(response.data.exitHistory
                                .resignation_letter_date);
                            $("#exit_interview_held_on").val(response.data.exitHistory
                                .exit_interview_held_on);
                            $("#relieving_date").val(response.data.exitHistory
                                .relieving_date);
                            $("#new_workplace").val(response.data.exitHistory
                                .new_workplace);
                            $("#reason_for_leaving").val(response.data.exitHistory
                                .reason_for_leaving);
                            $("#feedback").val(response.data.exitHistory
                                .feedback);
                            const leaveEncashedSelect = $('#leave_encashed')[0]
                                .tomselect;
                            const leaveEncashedValue = response.data.exitHistory
                                .leave_encashed;
                            if (!leaveEncashedSelect.options[leaveEncashedValue]) {
                                leaveEncashedSelect.addOption({
                                    value: leaveEncashedValue,
                                    text: leaveEncashedValue
                                });
                            }
                            leaveEncashedSelect.setValue(leaveEncashedValue);

                            const costCenterSelect = $('#payroll_cost_center')[0]
                                .tomselect;
                            const costCenterValue = response.data.exitHistory
                                .leave_encashed;
                            if (!costCenterSelect.options[costCenterValue]) {
                                costCenterSelect.addOption({
                                    value: costCenterValue,
                                    text: costCenterValue
                                });
                            }
                            costCenterSelect.setValue(costCenterValue);
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
                data.company_id = $("#company_id").val();
                if (currentForm == '#overview-form') {
                    data.parent_company = $("#parent_company").val();
                }
                data.employee_id = employeeId;
                $('.error-message').hide();
                const submitMethod = employeeId !== '' ? 'PUT' : 'POST';

                if (employeeId == "" && formId !== "#overview") {
                    showErrorNotification('error', "Please create Employee Overview data first");
                }

                try {
                    const response = await $.ajax({
                        url: currentForm.attr('action'),
                        type: submitMethod,
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
                        const response = JSON.parse(xhr.responseText);
                        handleErrorResponse(response, formId);
                    } else if (xhr.status === 500) {
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
                        // send email notification
                        handleNotification(response);
                    } else {
                        showSuccessNotification('success', "Data has been updated successfully");
                    }
                    $("#employee_id").val(response.data.employee.id);
                } else {
                    showErrorNotification('error', response.message);
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
                        showSuccessNotification('success', 'Verification email sent successfully.');
                        $("#verification-btn").hide();
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
