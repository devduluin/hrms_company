@extends('layouts.dashboard.app')
@section('content')
    <div
        class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')


        <div id="contents-page"
            class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
            <div class="container">
                <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                    <div class="col-span-12">
                        <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                            <div class="text-base font-medium group-[.mode--light]:text-white">
                                {{ $page_title ?? config('app.name') }}
                            </div>
                            <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                                <a href="{{ route('hrms.company') }}" data-tw-merge=""
                                    class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200"><i
                                        data-tw-merge="" data-lucide="arrow-left"
                                        class="stroke-[1] w-5 h-5 mx-auto block"></i>
                                    back</a>
                            </div>
                        </div>
                        <div class="box mt-3">
                            <form id="formUpdateCompanySetting">
                                <div class="p-7">
                                    <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-2 gap-2">
                                        <x-form.input id="employee_naming_by" label="Employee Naming By"
                                            name="employee_naming_by" required />
                                        <input type="hidden" name="user_id" value="3c5b06b2-b224-4029-a7a9-a0291dbe723c">
                                        <x-form.input id="standard_working_hours" label="Standard Working Hours"
                                            name="standard_working_hours" required />
                                        <x-form.input type="date" id="retirement_age" label="Retirement Age"
                                            name="retirement_age" required />
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-2 mt-3">
                                        <x-form.select name="send_leave_notification" id="send_leave_notification"
                                            label="Send Leave Notification" class="tom-select w-full"
                                            url="{{ url('dashboard/hrms/designation') }}" required>
                                            <option value="true">Yes</option>
                                            <option value="false">No</option>
                                        </x-form.select>

                                        <x-form.select name="allow_multiple_shift_assignments_for_same_date"
                                            id="allow_multiple_shift_assignments_for_same_date"
                                            label="Allow multiple shift assignments for same date" class="tom-select w-full"
                                            data-placeholder="Select default currency" url="#" required>
                                            <option value="true">true</option>
                                            <option value="false">false</option>
                                        </x-form.select>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-2 mt-3">
                                        <x-form.select name="check_vacancies_on_job_offer_creation"
                                            id="check_vacancies_on_job_offer_creation"
                                            label="Check vacancies on job offer creation" class="tom-select w-full"
                                            data-placeholder="Select default currency" url="#" required>
                                            <option value="true">true</option>
                                            <option value="false">false</option>
                                        </x-form.select>

                                        <x-form.select name="send_interview_reminder" id="send_interview_reminder"
                                            label="Send interview reminder" class="tom-select w-full"
                                            data-placeholder="Select default currency" url="#" required>
                                            <option value="true">true</option>
                                            <option value="false">false</option>
                                        </x-form.select>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-2 mt-3">
                                        <x-form.select name="send_interview_reminder" id="send_interview_reminder"
                                            label="Send interview reminder" class="tom-select w-full"
                                            data-placeholder="Select default currency" url="#" required>
                                            <option value="true">true</option>
                                            <option value="false">false</option>
                                        </x-form.select>

                                        <x-form.select name="leave_approval_notification_template"
                                            id="leave_approval_notification_template"
                                            label="Leave Approval Notification Template" class="tom-select w-full"
                                            data-placeholder="Select leave_approval_notification_template" url="#"
                                            required>
                                            <option value="">Select leave_approval_notification_template</option>
                                            <option value="Template1">Template1</option>
                                        </x-form.select>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-2 mt-3">
                                        <x-form.select name="auto_leave_encashment" id="auto_leave_encashment"
                                            label="Auto leave encashment" class="tom-select w-full"
                                            data-placeholder="Select default currency" url="#" required>
                                            <option value="true">true</option>
                                            <option value="false">false</option>
                                        </x-form.select>

                                        <x-form.select name="leave_approver_mandatory_in_leave_application"
                                            id="leave_approver_mandatory_in_leave_application"
                                            label="Leave approver mandatory in leave application" class="tom-select w-full"
                                            data-placeholder="Select leave_approver_mandatory_in_leave_application"
                                            url="#" required>
                                            <option value="true">true</option>
                                            <option value="false">false</option>
                                        </x-form.select>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-2 mt-3">
                                        <x-form.select name="send_interview_feedback_reminder"
                                            id="send_interview_feedback_reminder" label="Send interview feedback reminder"
                                            class="tom-select w-full"
                                            data-placeholder="Select send_interview_feedback_reminder" url="#"
                                            required>
                                            <option value="true">true</option>
                                            <option value="false">false</option>
                                        </x-form.select>

                                        <x-form.select name="allow_employee_checkin_from_mobile_app"
                                            id="allow_employee_checkin_from_mobile_app"
                                            label="Allow employee checkin from mobile app" class="tom-select w-full"
                                            data-placeholder="Select allow_employee_checkin_from_mobile_app"
                                            url="#" required>
                                            <option value="true">true</option>
                                            <option value="false">false</option>
                                        </x-form.select>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-2 mt-3">
                                        <x-form.select name="allow_geolocation_tracking" id="allow_geolocation_tracking"
                                            label="Allow geolocation tracking" class="tom-select w-full"
                                            data-placeholder="Select default currency" url="#" required>
                                            <option value="true">true</option>
                                            <option value="false">false</option>
                                        </x-form.select>

                                        <x-form.select name="show_leaves_of_all_department_members_in_calendar"
                                            id="show_leaves_of_all_department_members_in_calendar"
                                            label="Show leaves of all department members in calendar"
                                            class="tom-select w-full"
                                            data-placeholder="Select show_leaves_of_all_department_members_in_calendar"
                                            url="#" required>
                                            <option value="true">true</option>
                                            <option value="false">false</option>
                                        </x-form.select>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-2 mt-3">
                                        <x-form.select name="restrict_backdated_leave_application"
                                            id="restrict_backdated_leave_application"
                                            label="Restrict backdated leave application" class="tom-select w-full"
                                            data-placeholder="Select restrict_backdated_leave_application" url="#"
                                            required>
                                            <option value="true">true</option>
                                            <option value="false">false</option>
                                        </x-form.select>

                                        <x-form.select name="expense_approver_mandatory_in_expense_claim"
                                            id="expense_approver_mandatory_in_expense_claim"
                                            label="Expense Approver Mandatory in Expense Claim" class="tom-select w-full"
                                            data-placeholder="Select default currency" url="#" required>
                                            <option value="">Select default currency</option>
                                            <option value="true">true</option>
                                            <option value="false">false</option>
                                        </x-form.select>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-2 mt-3">
                                        <x-form.select name="leave_approval_notification_template"
                                            id="leave_approval_notification_template"
                                            label="Leave Approval Notification Template" class="tom-select w-full"
                                            data-placeholder="Select leave_approval_notification_template" url="#"
                                            required>
                                            <option value="true">true</option>
                                            <option value="false">false</option>
                                        </x-form.select>

                                        <x-form.input id="sender" label="Sender" name="sender" required />
                                        <input type="hidden" name="default_holiday_list" value="off">
                                    </div>
                                    <div class="mt-5">
                                        <button type="submit"
                                            class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200">
                                            <i data-tw-merge="" data-lucide="send"
                                                class="stroke-[1] w-5 h-5 mx-auto block"></i>
                                            Save changes</button>
                                        <button type="reset"
                                            class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200">
                                            <i data-tw-merge="" data-lucide="rotate-ccw"
                                                class="stroke-[1] w-5 h-5 mx-auto block"></i>
                                            Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="preview relative [&.hide]:overflow-hidden [&.hide]:h-0">
        <div class="text-center">
            <div id="success-notification-content"
                class="py-5 pl-5 pr-14 bg-white border border-slate-200/60 rounded-lg shadow-xl dark:bg-darkmode-600 dark:text-slate-300 dark:border-darkmode-600 hidden flex">
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
@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            getCompanybyId();
        });

        let companyId = localStorage.getItem('company');
        let comapanySettingId = "";
        async function getCompanybyId() {
            try {
                let companyId = localStorage.getItem('company');
                const appToken = localStorage.getItem('app_token');
                const response = await fetch(`{{ $companyApiUrl }}/company/setting/` + companyId, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${appToken}`,
                        'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`
                    },
                });

                const result = await response.json();
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }

                //tampilkan data company setting
                document.getElementById('employee_naming_by').value = result.data.employee_naming_by;
                document.getElementById('standard_working_hours').value = result.data.standard_working_hours;
                document.getElementById('retirement_age').value = result.data.retirement_age;
                document.getElementById('send_leave_notification').value = result.data.send_leave_notification;
                document.getElementById('leave_approval_notification_template').value = result.data
                    .leave_approval_notification_template;
                document.getElementById('expense_approver_mandatory_in_expense_claim').value = result.data
                    .expense_approver_mandatory_in_expense_claim;
                document.getElementById('show_leaves_of_all_department_members_in_calendar').value = result.data
                    .show_leaves_of_all_department_members_in_calendar;
                document.getElementById('auto_leave_encashment').value = result.data.auto_leave_encashment;
                document.getElementById('leave_approver_mandatory_in_leave_application').value = result.data
                    .leave_approver_mandatory_in_leave_application;
                document.getElementById('restrict_backdated_leave_application').value = result.data
                    .restrict_backdated_leave_application;
                document.getElementById('allow_multiple_shift_assignments_for_same_date').value = result.data
                    .allow_multiple_shift_assignments_for_same_date;
                document.getElementById('check_vacancies_on_job_offer_creation').value = result.data
                    .check_vacancies_on_job_offer_creation;
                document.getElementById('send_interview_reminder').value = result.data.send_interview_reminder;
                document.getElementById('send_interview_feedback_reminder').value = result.data
                    .send_interview_feedback_reminder;
                document.getElementById('sender').value = result.data.sender;
                document.getElementById('allow_employee_checkin_from_mobile_app').value = result.data
                    .allow_employee_checkin_from_mobile_app;
                document.getElementById('allow_geolocation_tracking').value = result.data.allow_geolocation_tracking;
                showSuccessNotification(result.message, "The operation was completed successfully.");
                return comapanySettingId = result.data.id;

            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred while submitting the data');
            }
        }

        //update company settings
        document.getElementById('formUpdateCompanySetting').addEventListener('submit', async function(event) {
            event.preventDefault();

            const formData = new FormData(this);

            const data = {
                employee_naming_by: formData.get('employee_naming_by'),
                standard_working_hours: formData.get('standard_working_hours'),
                retirement_age: formData.get('retirement_age'),
                send_leave_notification: formData.get('send_leave_notification'),
                leave_approval_notification_template: formData.get('leave_approval_notification_template'),
                expense_approver_mandatory_in_expense_claim: formData.get(
                    'expense_approver_mandatory_in_expense_claim'),
                show_leaves_of_all_department_members_in_calendar: formData.get(
                    'show_leaves_of_all_department_members_in_calendar'),
                auto_leave_encashment: formData.get('auto_leave_encashment'),
                leave_approver_mandatory_in_leave_application: formData.get(
                    'leave_approver_mandatory_in_leave_application'),
                restrict_backdated_leave_application: formData.get('restrict_backdated_leave_application'),
                allow_multiple_shift_assignments_for_same_date: formData.get(
                    'allow_multiple_shift_assignments_for_same_date'),
                check_vacancies_on_job_offer_creation: formData.get(
                    'check_vacancies_on_job_offer_creation'),
                send_interview_reminder: formData.get('send_interview_reminder'),
                send_interview_feedback_reminder: formData.get('send_interview_feedback_reminder'),
                sender: formData.get('sender'),
                allow_employee_checkin_from_mobile_app: formData.get(
                    'allow_employee_checkin_from_mobile_app'),
                allow_geolocation_tracking: formData.get('allow_geolocation_tracking'),
            };

            try {
                const response = await fetch(`{{ $companyApiUrl }}/company/setting/` +
                    comapanySettingId, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': `Bearer ${appToken}`,
                            'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`
                        },
                        body: JSON.stringify(data)
                    });

                const responseData = await response.json();

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }

                showSuccessNotification(responseData.message, "The operation was completed successfully.");

            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred while submitting the data');
            }
        });

        function showSuccessNotification(title, message) {
            var notificationContent = document.getElementById("success-notification-content");
            document.getElementById("success-title").textContent = title;
            document.getElementById("success-message").textContent = message;

            Toastify({
                node: $("#success-notification-content")
                    .clone()
                    .removeClass("hidden")[0],
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
            }).showToast();
        }
    </script>
@endpush
