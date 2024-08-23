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
                        <form id="employee-form" method="post" action="http://localhost:4444/api/v1/employee"
                            autocomplete="off" novalidate class="employee-form">
                            @csrf
                            <div class="flex flex-col mb-4 gap-y-3 md:h-10 md:flex-row md:items-center">
                                <div class="text-base font-medium group-[.mode--light]:text-white">
                                    {{ $page_title }}
                                </div>
                                <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                                    <button onclick="history.go(-1)"
                                        class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md w-24"><i
                                            data-tw-merge="" data-lucide="arrow-left" class="mr-3 h-4 w-4 stroke-[1.3]"></i>
                                        Back</button>
                                    <x-form.button label="Save changes" id="save-btn" style="primary" type="submit"
                                        icon="save" />
                                </div>
                            </div>
                            <div class="mt-1.5 flex flex-col">
                                <ul data-tw-merge role="tablist"
                                    class="p-0.5 border bg-slate-50/70 border-slate-200/70 rounded-lg dark:border-darkmode-400 w-full flex">
                                    <li id="overview-tab" data-tw-merge role="presentation"
                                        class="focus-visible:outline-none flex-1">
                                        <button type="button" data-tw-merge data-tw-target="#overview" role="tab"
                                            class="cursor-pointer block appearance-none px-3 py-2 border border-transparent text-slate-600 transition-colors dark:text-slate-400 [&.active]:text-slate-700 [&.active]:dark:text-white rounded-md py-1.5 dark:border-transparent [&.active]:text-slate-700 [&.active]:border [&.active]:shadow-sm [&.active]:font-medium [&.active]:border-slate-200 [&.active]:bg-white [&.active]:dark:text-slate-300 [&.active]:dark:bg-darkmode-400 [&.active]:dark:border-darkmode-400 active w-full py-2">
                                            <i data-tw-merge="" data-lucide="briefcase"
                                                class="inline-block h-5 w-5 mr-2 stroke-[1] "></i>
                                            Overview
                                        </button>
                                    </li>
                                    <li id="joining-tab" data-tw-merge role="presentation"
                                        class="focus-visible:outline-none flex-1">
                                        <button type="button" data-tw-merge data-tw-target="#joining" role="tab"
                                            class="cursor-pointer block appearance-none px-3 py-2 border border-transparent text-slate-600 transition-colors dark:text-slate-400 [&.active]:text-slate-700 [&.active]:dark:text-white rounded-md py-1.5 dark:border-transparent [&.active]:text-slate-700 [&.active]:border [&.active]:shadow-sm [&.active]:font-medium [&.active]:border-slate-200 [&.active]:bg-white [&.active]:dark:text-slate-300 [&.active]:dark:bg-darkmode-400 [&.active]:dark:border-darkmode-400 w-full py-2">
                                            <i data-tw-merge="" data-lucide="user"
                                                class="inline-block h-5 w-5 mr-2 stroke-[1] "></i>
                                            Joining
                                        </button>
                                    </li>
                                    <li id="address-tab" data-tw-merge role="presentation"
                                        class="focus-visible:outline-none flex-1">
                                        <button type="button" data-tw-merge data-tw-target="#address" role="tab"
                                            class="cursor-pointer block appearance-none px-3 py-2 border border-transparent text-slate-600 transition-colors dark:text-slate-400 [&.active]:text-slate-700 [&.active]:dark:text-white rounded-md py-1.5 dark:border-transparent [&.active]:text-slate-700 [&.active]:border [&.active]:shadow-sm [&.active]:font-medium [&.active]:border-slate-200 [&.active]:bg-white [&.active]:dark:text-slate-300 [&.active]:dark:bg-darkmode-400 [&.active]:dark:border-darkmode-400 w-full py-2">
                                            <i data-tw-merge="" data-lucide="file"
                                                class="inline-block h-5 w-5 mr-2 stroke-[1] "></i>
                                            Address
                                        </button>
                                    </li>
                                    <li id="attendance-tab" data-tw-merge role="presentation"
                                        class="focus-visible:outline-none flex-1">
                                        <button type="button" data-tw-merge data-tw-target="#attendance" role="tab"
                                            class="cursor-pointer block appearance-none px-3 py-2 border border-transparent text-slate-600 transition-colors dark:text-slate-400 [&.active]:text-slate-700 [&.active]:dark:text-white rounded-md py-1.5 dark:border-transparent [&.active]:text-slate-700 [&.active]:border [&.active]:shadow-sm [&.active]:font-medium [&.active]:border-slate-200 [&.active]:bg-white [&.active]:dark:text-slate-300 [&.active]:dark:bg-darkmode-400 [&.active]:dark:border-darkmode-400 w-full py-2">
                                            <i data-tw-merge="" data-lucide="contact"
                                                class="inline-block h-5 w-5 mr-2 stroke-[1] "></i>
                                            Attendance
                                        </button>
                                    </li>
                                    <li id="salary-tab" data-tw-merge role="presentation"
                                        class="focus-visible:outline-none flex-1">
                                        <button type="button" data-tw-merge data-tw-target="#salary" role="tab"
                                            class="cursor-pointer block appearance-none px-3 py-2 border border-transparent text-slate-600 transition-colors dark:text-slate-400 [&.active]:text-slate-700 [&.active]:dark:text-white rounded-md py-1.5 dark:border-transparent [&.active]:text-slate-700 [&.active]:border [&.active]:shadow-sm [&.active]:font-medium [&.active]:border-slate-200 [&.active]:bg-white [&.active]:dark:text-slate-300 [&.active]:dark:bg-darkmode-400 [&.active]:dark:border-darkmode-400 w-full py-2">
                                            <i data-tw-merge="" data-lucide="contact"
                                                class="inline-block h-5 w-5 mr-2 stroke-[1] "></i>
                                            Salary
                                        </button>
                                    </li>
                                    <li id="personal-tab" data-tw-merge role="presentation"
                                        class="focus-visible:outline-none flex-1">
                                        <button type="button" data-tw-merge data-tw-target="#personal" role="tab"
                                            class="cursor-pointer block appearance-none px-3 py-2 border border-transparent text-slate-600 transition-colors dark:text-slate-400 [&.active]:text-slate-700 [&.active]:dark:text-white rounded-md py-1.5 dark:border-transparent [&.active]:text-slate-700 [&.active]:border [&.active]:shadow-sm [&.active]:font-medium [&.active]:border-slate-200 [&.active]:bg-white [&.active]:dark:text-slate-300 [&.active]:dark:bg-darkmode-400 [&.active]:dark:border-darkmode-400 w-full py-2">
                                            <i data-tw-merge="" data-lucide="contact"
                                                class="inline-block h-5 w-5 mr-2 stroke-[1] "></i>
                                            Personal
                                        </button>
                                    </li>
                                    <li id="profile-tab" data-tw-merge role="presentation"
                                        class="focus-visible:outline-none flex-1">
                                        <button type="button" data-tw-merge data-tw-target="#profile" role="tab"
                                            class="cursor-pointer block appearance-none px-3 py-2 border border-transparent text-slate-600 transition-colors dark:text-slate-400 [&.active]:text-slate-700 [&.active]:dark:text-white rounded-md py-1.5 dark:border-transparent [&.active]:text-slate-700 [&.active]:border [&.active]:shadow-sm [&.active]:font-medium [&.active]:border-slate-200 [&.active]:bg-white [&.active]:dark:text-slate-300 [&.active]:dark:bg-darkmode-400 [&.active]:dark:border-darkmode-400 w-full py-2">
                                            <i data-tw-merge="" data-lucide="contact"
                                                class="inline-block h-5 w-5 mr-2 stroke-[1] "></i>
                                            Profile
                                        </button>
                                    </li>
                                    <li id="exit-tab" data-tw-merge role="presentation"
                                        class="focus-visible:outline-none flex-1">
                                        <button type="button" data-tw-merge data-tw-target="#exit" role="tab"
                                            class="cursor-pointer block appearance-none px-3 py-2 border border-transparent text-slate-600 transition-colors dark:text-slate-400 [&.active]:text-slate-700 [&.active]:dark:text-white rounded-md py-1.5 dark:border-transparent [&.active]:text-slate-700 [&.active]:border [&.active]:shadow-sm [&.active]:font-medium [&.active]:border-slate-200 [&.active]:bg-white [&.active]:dark:text-slate-300 [&.active]:dark:bg-darkmode-400 [&.active]:dark:border-darkmode-400 w-full py-2">
                                            <i data-tw-merge="" data-lucide="contact"
                                                class="inline-block h-5 w-5 mr-2 stroke-[1] "></i>
                                            Exit
                                        </button>
                                    </li>
                                </ul>
                                <div class="box box--stacked flex flex-col p-5">
                                    <div class="tab-content mt-5">
                                        <div data-transition data-selector=".active"
                                            data-enter="transition-[visibility,opacity] ease-linear duration-150"
                                            data-enter-from="!p-0 !h-0 overflow-hidden invisible opacity-0"
                                            data-enter-to="visible opacity-100"
                                            data-leave="transition-[visibility,opacity] ease-linear duration-150"
                                            data-leave-from="visible opacity-100"
                                            data-leave-to="!p-0 !h-0 overflow-hidden invisible opacity-0" id="overview"
                                            role="tabpanel" aria-labelledby="overview-tab"
                                            class="tab-pane active leading-relaxed">
                                            @include('dashboard.hrms.employees.elm_employee_overview')
                                        </div>
                                        <div data-transition data-selector=".active"
                                            data-enter="transition-[visibility,opacity] ease-linear duration-150"
                                            data-enter-from="!p-0 !h-0 overflow-hidden invisible opacity-0"
                                            data-enter-to="visible opacity-100"
                                            data-leave="transition-[visibility,opacity] ease-linear duration-150"
                                            data-leave-from="visible opacity-100"
                                            data-leave-to="!p-0 !h-0 overflow-hidden invisible opacity-0" id="joining"
                                            role="tabpanel" aria-labelledby="joining-tab"
                                            class="tab-pane leading-relaxed">
                                            @include('dashboard.hrms.employees.elm_employee_joining')
                                        </div>
                                        <div data-transition data-selector=".active"
                                            data-enter="transition-[visibility,opacity] ease-linear duration-150"
                                            data-enter-from="!p-0 !h-0 overflow-hidden invisible opacity-0"
                                            data-enter-to="visible opacity-100"
                                            data-leave="transition-[visibility,opacity] ease-linear duration-150"
                                            data-leave-from="visible opacity-100"
                                            data-leave-to="!p-0 !h-0 overflow-hidden invisible opacity-0" id="address"
                                            role="tabpanel" aria-labelledby="address-tab"
                                            class="tab-pane leading-relaxed">
                                            @include('dashboard.hrms.employees.elm_employee_address_contact')
                                        </div>
                                        <div data-transition data-selector=".active"
                                            data-enter="transition-[visibility,opacity] ease-linear duration-150"
                                            data-enter-from="!p-0 !h-0 overflow-hidden invisible opacity-0"
                                            data-enter-to="visible opacity-100"
                                            data-leave="transition-[visibility,opacity] ease-linear duration-150"
                                            data-leave-from="visible opacity-100"
                                            data-leave-to="!p-0 !h-0 overflow-hidden invisible opacity-0" id="attendance"
                                            role="tabpanel" aria-labelledby="attendance-tab"
                                            class="tab-pane leading-relaxed">
                                            @include('dashboard.hrms.employees.elm_employee_attendance_leaves')
                                        </div>
                                        <div data-transition data-selector=".active"
                                            data-enter="transition-[visibility,opacity] ease-linear duration-150"
                                            data-enter-from="!p-0 !h-0 overflow-hidden invisible opacity-0"
                                            data-enter-to="visible opacity-100"
                                            data-leave="transition-[visibility,opacity] ease-linear duration-150"
                                            data-leave-from="visible opacity-100"
                                            data-leave-to="!p-0 !h-0 overflow-hidden invisible opacity-0" id="salary"
                                            role="tabpanel" aria-labelledby="salary-tab"
                                            class="tab-pane leading-relaxed">
                                            @include('dashboard.hrms.employees.elm_employee_salary')
                                        </div>
                                        <div data-transition data-selector=".active"
                                            data-enter="transition-[visibility,opacity] ease-linear duration-150"
                                            data-enter-from="!p-0 !h-0 overflow-hidden invisible opacity-0"
                                            data-enter-to="visible opacity-100"
                                            data-leave="transition-[visibility,opacity] ease-linear duration-150"
                                            data-leave-from="visible opacity-100"
                                            data-leave-to="!p-0 !h-0 overflow-hidden invisible opacity-0" id="personal"
                                            role="tabpanel" aria-labelledby="personal-tab"
                                            class="tab-pane leading-relaxed">
                                            @include('dashboard.hrms.employees.elm_employee_personal')
                                        </div>
                                        <div data-transition data-selector=".active"
                                            data-enter="transition-[visibility,opacity] ease-linear duration-150"
                                            data-enter-from="!p-0 !h-0 overflow-hidden invisible opacity-0"
                                            data-enter-to="visible opacity-100"
                                            data-leave="transition-[visibility,opacity] ease-linear duration-150"
                                            data-leave-from="visible opacity-100"
                                            data-leave-to="!p-0 !h-0 overflow-hidden invisible opacity-0" id="profile"
                                            role="tabpanel" aria-labelledby="profile-tab"
                                            class="tab-pane leading-relaxed">
                                            @include('dashboard.hrms.employees.elm_employee_profile')
                                        </div>
                                        <div data-transition data-selector=".active"
                                            data-enter="transition-[visibility,opacity] ease-linear duration-150"
                                            data-enter-from="!p-0 !h-0 overflow-hidden invisible opacity-0"
                                            data-enter-to="visible opacity-100"
                                            data-leave="transition-[visibility,opacity] ease-linear duration-150"
                                            data-leave-from="visible opacity-100"
                                            data-leave-to="!p-0 !h-0 overflow-hidden invisible opacity-0" id="exit"
                                            role="tabpanel" aria-labelledby="exit-tab" class="tab-pane leading-relaxed">
                                            @include('dashboard.hrms.employees.elm_employee_exit')
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <script src="{{ asset('dist/js/vendors/tab.js') }}"></script>
    @endsection
    @include('vendor-common.toastr')
    @push('js')
        <script>
            $(document).ready(function() {
                $("#employee-form").on('submit', async function(e) {
                    e.preventDefault();
                    const formData = $(this).serializeArray();
                    const data = {};
                    formData.forEach(field => {
                        data[field.name] = field.value;
                    });

                    const csrfToken = $('meta[name="csrf-token"]').attr('content');
                    data._token = csrfToken;
                    data.company_id = localStorage.getItem('company');
                    data.user_id = "a77061e8-8ed8-4919-9f9b-f975d87e0253";
                    data.employee_id = "a77061e8-8ed8-4919-9f9b-f975d87e0253";
                    $('.error-message').hide();

                    try {
                        const response = await $.ajax({
                            url: $(this).attr('action'),
                            type: 'POST',
                            contentType: 'application/json',
                            data: JSON.stringify(data),
                            dataType: 'json'
                        });

                        if (response.success) {
                            toastr.success(response.message);
                            // Optional redirection or other actions
                            setTimeout(function() {
                                history.back(-1);
                            }, 2000);
                        } else {
                            toastr.error(response.message);
                        }
                    } catch (xhr) {
                        console.log(xhr.responseText);
                        const response = JSON.parse(xhr.responseText);

                        if (response.status === "error" && response.code === 400) {
                            handleErrorResponse(response);
                        } else {
                            toastr.error('An error occurred while processing your request.');
                        }
                    }
                });
            });

            function handleErrorResponse(result) {
                const errorMessage = result.error;
                toastr.error('There were validation errors:');
                displayFormattedError(errorMessage);
            }

            function displayFormattedError(errorMessage) {
                $('.invalid-feedback').remove();
                $('.is-invalid').removeClass('is-invalid');

                const errorPattern = /\"([^\"]+)\"/g;
                let match;

                while ((match = errorPattern.exec(errorMessage)) !== null) {
                    const fieldName = match[1];
                    const input = $(`[name="${fieldName}"]`);

                    input.addClass('is-invalid');
                    input.before(
                        `<div class="error-message text-danger mt-1 text-xs text-slate-500 sm:ml-auto sm:mt-0 mb-2">${fieldName} is not allowed to be empty</div>`
                    );
                }
            }
        </script>
    @endpush
