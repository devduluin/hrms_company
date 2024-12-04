@extends('layouts.dashboard.app')
@section('content')

<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
@include('layouts.dashboard.menu')
    <div class="content transition-[margin,width] duration-100 px-5 pt-[56px] pb-16 relative z-20 content--compact xl:ml-[275px] [&amp;.content--compact]:xl:ml-[91px]">
        <div class="mt-[65px] col-span-12 w-full">
            <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                <div class="text-lg font-medium group-[.mode--light]:text-white">
                    {{ $page_title ?? '' }}
                </div>
                <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                    <button onclick="history.go(-1)"
                        class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md w-24">
                        <i data-tw-merge="" data-lucide="arrow-left" class="mr-3 h-4 w-4 stroke-[1.3]"></i> Back
                    </button>
                    <button id="submitBtn" data-tw-merge=""
                            class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-blue-theme border-blue-theme text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200"><i
                                data-tw-merge="" data-lucide="save" class="mr-3 h-4 w-4 stroke-[1.3]"></i>
                            <span id="loadingText">Save Changes</span>
                    </button>
                </div>
            </div>
            <div class="mt-3.5 grid grid-cols-12 gap-x-6 gap-y-10">
                <!-- <div class="relative col-span-12 xl:col-span-3">
                    <div class="sticky top-[104px]">
                        @include('components._asside_company')
                    </div>
                </div> -->
                <div class="col-span-12 flex flex-col gap-y-7 sm:col-span-12 xl:col-span-12">
                <form id="form-submit" method="POST" action="{{ $apiUrl }}">
                    <input type="hidden" name="company_id" value="{{ $company }}" />
                    <div class="box box--stacked flex flex-col p-7">
                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-2">
                            <div class="text-lg pt-5 font-medium group-[.mode--light]:text-white">
                                {{ 'Employee Settings' }}
                            </div>
                            <div class="py-2"></div>
                            <div class="py-2">
                             
                                <div class="mt-3 flex-row xl:items-center">
                                <div class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-4">
                                    <div class="text-left">
                                        <div class="flex items-center">
                                            <div class="font-medium">Employee Naming By</div>
                                        </div>
                                    </div>
                                    <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3"></div>
                                </div>
                                <div class="flex-1 sm:w-full w-96 mt-3 xl:mt-0">
                                    <select name="employee_naming_by" data-title="Language" data-placeholder="Select Naming" class="tom-select disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10"">
                                        
                                        
                                        <option value="fullname">
                                            Fullname
                                        </option>
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="py-2">
                            <x-form.input type="number" id="standard_working_hours" label="Standard Working Hours"
                                name="standard_working_hours" required />
                            </div>
                            <div class="py-2">
                            <x-form.input type="number" id="retirement_age" label="Retirement Age"
                                name="retirement_age" required />
                            </div>
                            <div class="py-2">
                            <input type="hidden" id="sender" value="sender" label="Sender"
                                name="sender" required />
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-2">
                            <div class="text-lg pt-5 font-medium group-[.mode--light]:text-white">
                                {{ 'Shift Settings' }}
                            </div>
                            <div class="py-2"></div>
                            <div class="py-2">
                            <x-checkbox id="allow_multiple_shift_assignments_for_same_date" label="Allow multiple shift assignments for same date"
                                name="allow_multiple_shift_assignments_for_same_date"  />
                            </div>
                            
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-2">
                            <div class="text-lg pt-5 font-medium group-[.mode--light]:text-white">
                                {{ 'Attendance Settings' }}
                            </div>
                            <div class="py-2"></div>
                            <div class="py-2">
                            <x-checkbox id="allow_employee_checkin_from_mobile_app" label="Allow employee checkin from mobile app"
                                name="allow_employee_checkin_from_mobile_app"  />
                                </div>
                            <div class="py-2">
                            <x-checkbox id="allow_geolocation_tracking" label="Allow geolocation tracking"
                                name="allow_geolocation_tracking"  />
                                </div>
                            
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-2">
                            <div class="text-lg pt-5 font-medium group-[.mode--light]:text-white">
                                {{ 'Other Settings' }}
                            </div>
                            <div class="py-2"></div>
                            <div class="py-2">
                            <x-checkbox id="send_leave_notification" label="Send Leave Notification"
                                name="send_leave_notification"  />
                            </div>
                            <div class="py-2">
                            <x-checkbox id="check_vacancies_on_job_offer_creation" label="Check vacancies on job offer creation"
                                name="check_vacancies_on_job_offer_creation"  />
                                </div>
                            <div class="py-2">
                            <x-checkbox id="send_interview_reminder" label="Send interview reminder"
                                name="send_interview_reminder"  />
                                </div>
                            <div class="py-2">
                            <x-checkbox id="auto_leave_encashment" label="Auto leave encashment"
                                name="auto_leave_encashment"  />
                                </div>
                            <div class="py-2">
                            <x-checkbox id="leave_approver_mandatory_in_leave_application" label="Leave approver mandatory in leave application"
                                name="leave_approver_mandatory_in_leave_application"  />
                                </div>
                            <div class="py-2">
                            <x-checkbox id="send_interview_feedback_reminder" label="Send interview feedback reminder"
                                name="send_interview_feedback_reminder"  />
                                </div>
                            <div class="py-2">
                            <x-checkbox id="show_leaves_of_all_department_members_in_calendar" label="Show leaves of all department members in calendar"
                                name="show_leaves_of_all_department_members_in_calendar"  />
                                </div>
                            <div class="py-2">
                            <x-checkbox id="restrict_backdated_leave_application" label="Restrict backdated leave application"
                                name="restrict_backdated_leave_application"  />
                                </div>
                            <div class="py-2">
                            <x-checkbox id="expense_approver_mandatory_in_expense_claim" label="Expense Approver Mandatory in Expense Claim"
                                name="expense_approver_mandatory_in_expense_claim"  />
                                </div>
                        
                        </div>
                    </div>
                </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
<div class="preview relative [&.hide]:overflow-hidden [&.hide]:h-0">
    <div class="text-center">
        <div id="success-notification-content" class="py-5 pl-5 pr-14 bg-white border border-slate-200/60 rounded-lg shadow-xl dark:bg-darkmode-600 dark:text-slate-300 dark:border-darkmode-600 hidden flex">
            <i data-tw-merge="" data-lucide="check-circle" class="stroke-[1] w-5 h-5 text-success"></i>
            <div class="ml-4 mr-4">
                <div class="font-medium" id="success-title">...</div>
                <div class="mt-1 text-slate-500" id="success-message">
                   ...
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@include('vendor-common.tomselect')
@push('js')
<script type="text/javascript">
    
    let currentForm = $("#form-submit");
    let id   = '{{$company ?? ''}}';
    let method      = 'POST';
    let path        = currentForm.attr('action');
        
    async function handleGetData(id, currentForm) {
        path    = `{{ $apiUrl }}/`+id;
        $.ajax({
            url: path,
            type: 'GET',
            headers: {
                'Authorization': `Bearer ${appToken}`,
                'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`
            },
            dataType: 'json',
            success: await
            function(response) {   
                if (response.success == true) {     
                    method  = 'PATCH';               
                     
                    $("input[name=company_id]").val(response.data.company_id);
                    $("select[name=employee_naming_by]").attr('data-selected',response.data.employee_naming_by).change();
                    $("input[name=standard_working_hours]").val(response.data.standard_working_hours);
                    $("input[name=retirement_age]").val(response.data.retirement_age);
                    if (response.data.send_leave_notification) {
                        $("#send_leave_notification").attr("checked", true);
                    } else {
                        $("#send_leave_notification").attr("checked", false);
                    } 
                    if (response.data.leave_approval_notification_template) {
                        $("#leave_approval_notification_template").attr("checked", true);
                    } else {
                        $("#leave_approval_notification_template").attr("checked", false);
                    } 
                    if (response.data.expense_approver_mandatory_in_expense_claim) {
                        $("#expense_approver_mandatory_in_expense_claim").attr("checked", true);
                    } else {
                        $("#expense_approver_mandatory_in_expense_claim").attr("checked", false);
                    } 
                    if (response.data.show_leaves_of_all_department_members_in_calendar) {
                        $("#show_leaves_of_all_department_members_in_calendar").attr("checked", true);
                    } else {
                        $("#show_leaves_of_all_department_members_in_calendar").attr("checked", false);
                    } 
                    if (response.data.leave_approver_mandatory_in_leave_application) {
                        $("#leave_approver_mandatory_in_leave_application").attr("checked", true);
                    } else {
                        $("#leave_approver_mandatory_in_leave_application").attr("checked", false);
                    } 
                    if (response.data.restrict_backdated_leave_application) {
                        $("#restrict_backdated_leave_application").attr("checked", true);
                    } else {
                        $("#restrict_backdated_leave_application").attr("checked", false);
                    } 
                    if (response.data.allow_multiple_shift_assignments_for_same_date) {
                        $("#allow_multiple_shift_assignments_for_same_date").attr("checked", true);
                    } else {
                        $("#allow_multiple_shift_assignments_for_same_date").attr("checked", false);
                    } 
                    if (response.data.check_vacancies_on_job_offer_creation) {
                        $("#check_vacancies_on_job_offer_creation").attr("checked", true);
                    } else {
                        $("#check_vacancies_on_job_offer_creation").attr("checked", false);
                    } 
                    if (response.data.send_interview_reminder) {
                        $("#send_interview_reminder").attr("checked", true);
                    } else {
                        $("#send_interview_reminder").attr("checked", false);
                    } 
                    if (response.data.send_interview_feedback_reminder) {
                        $("#send_interview_feedback_reminder").attr("checked", true);
                    } else {
                        $("#send_interview_feedback_reminder").attr("checked", false);
                    } 
                    if (response.data.allow_employee_checkin_from_mobile_app) {
                        $("#allow_employee_checkin_from_mobile_app").attr("checked", true);
                    } else {
                        $("#allow_employee_checkin_from_mobile_app").attr("checked", false);
                    } 
                    if (response.data.allow_geolocation_tracking) {
                        $("#allow_geolocation_tracking").attr("checked", true);
                    } else {
                        $("#allow_geolocation_tracking").attr("checked", false);
                    } 
                    initializeTomSelect();
                } else {
                    showErrorNotification('error', response.message);
                }
            },
            error: function(xhr) {
                const response = JSON.parse(xhr.responseText);
                handleErrorResponse(response, currentForm);
            }
        });
        return false;
    }

    $("#form-submit").submit(async function (e) {
        e.preventDefault();
        
        const data = serializeFormData(currentForm);
        if ($("#send_leave_notification").is(":checked")) {
            data.send_leave_notification = true;
        } else {
            data.send_leave_notification = false;
        }
        if ($("#leave_approval_notification_template").is(":checked")) {
            data.leave_approval_notification_template = true;
        } else {
            data.leave_approval_notification_template = false;
        }
        if ($("#expense_approver_mandatory_in_expense_claim").is(":checked")) {
            data.expense_approver_mandatory_in_expense_claim = true;
        } else {
            data.expense_approver_mandatory_in_expense_claim = false;
        }
        if ($("#show_leaves_of_all_department_members_in_calendar").is(":checked")) {
            data.show_leaves_of_all_department_members_in_calendar = true;
        } else {
            data.show_leaves_of_all_department_members_in_calendar = false;
        }
        if ($("#auto_leave_encashment").is(":checked")) {
            data.auto_leave_encashment = true;
        } else {
            data.auto_leave_encashment = false;
        }
        if ($("#leave_approver_mandatory_in_leave_application").is(":checked")) {
            data.leave_approver_mandatory_in_leave_application = true;
        } else {
            data.leave_approver_mandatory_in_leave_application = false;
        }
        if ($("#restrict_backdated_leave_application").is(":checked")) {
            data.restrict_backdated_leave_application = true;
        } else {
            data.restrict_backdated_leave_application = false;
        }
        if ($("#allow_multiple_shift_assignments_for_same_date").is(":checked")) {
            data.allow_multiple_shift_assignments_for_same_date = true;
        } else {
            data.allow_multiple_shift_assignments_for_same_date = false;
        }
        if ($("#check_vacancies_on_job_offer_creation").is(":checked")) {
            data.check_vacancies_on_job_offer_creation = true;
        } else {
            data.check_vacancies_on_job_offer_creation = false;
        }
        if ($("#send_interview_reminder").is(":checked")) {
            data.send_interview_reminder = true;
        } else {
            data.send_interview_reminder = false;
        }
        if ($("#send_interview_feedback_reminder").is(":checked")) {
            data.send_interview_feedback_reminder = true;
        } else {
            data.send_interview_feedback_reminder = false;
        }
        if ($("#send_interview_reminder").is(":checked")) {
            data.send_interview_reminder = true;
        } else {
            data.send_interview_reminder = false;
        }
        if ($("#sender").is(":checked")) {
            data.sender = true;
        } else {
            data.sender = false;
        }
        if ($("#allow_employee_checkin_from_mobile_app").is(":checked")) {
            data.allow_employee_checkin_from_mobile_app = true;
        } else {
            data.allow_employee_checkin_from_mobile_app = false;
        }
        if ($("#allow_geolocation_tracking").is(":checked")) {
            data.allow_geolocation_tracking = true;
        } else {
            data.allow_geolocation_tracking = false;
        }
        
        try {
            const response = await $.ajax({
                url: path,
                type: method,
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
            console.log(xhr);
            if (xhr.status === 422) {
                console.log(xhr.responseText);
                const response = JSON.parse(xhr.responseText);
                handleErrorResponse(response, currentForm);
            } else {
                showErrorNotification('error', 'An error occurred while processing your request.');
            }
            
        }
        $('#submitBtn').attr('disable', false);
        $('#loadingText').html('Save Changes');
    });

    function serializeFormData(form) {
        const formData = form.serializeArray();
        const data = {};
        formData.forEach(field => {
            data[field.name] = field.value;
        });
        return data;
    }

    function handleResponse(response) {
        if (response.success == true) {
            showSuccessNotification(response.message, "The operation was completed successfully.");
            //window.location.reload();
            handleGetData(id, currentForm)
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
     
    if(id){
        handleGetData(id, currentForm);
    }
    $('#submitBtn').on('click', function (e) {
        e.preventDefault();
        $(this).attr('disable', true);
        $('#loadingText').html('Saving...');
        
        $("#form-submit").submit();
    });
    </script>
@endpush