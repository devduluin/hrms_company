@extends('layouts.dashboard.app')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/tom-select.css') }}">

    <div
        class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')
        <div id="contents-page"
            class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
            <div class="container">
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
                        <div class="mt-1.5 flex flex-col">
                            <div class="box box--stacked flex flex-col p-5">
                                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 ">
                                    <form id="payroll-periode-form" method="post"
                                        action="http://apidev.duluin.com/api/v1/payroll_periodes/payroll_periode">
                                        @csrf
                                        <x-form.input id="name" label="Name" name="name" required />
                                        <input type="hidden" id="parent_company" name="parent_company" />
                                        <x-form.select id="company_id" name="company_id" label="Company"
                                            url="{{ url('dashboard/hrms/designation') }}"
                                            apiUrl="{{ $apiCompanyUrl }}/company/datatables" columns='["company_name"]'
                                            :selected="$company" :keys="[
                                                'company_id' => $company,
                                            ]">
                                            <option value="">Select Company</option>
                                        </x-form.select>
                                        <x-form.datepicker id="start_date" label="Start Date" name="start_date" required />
                                        <x-form.datepicker id="end_date" label="End Date" name="end_date" required />
                                        <x-form.datepicker id="pay_date" label="Payment Date" name="pay_date" required />
                                    </form>
                                </div>
                            </div>
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

            async function handleFormSubmission(formId) {
                const currentForm = $("#payroll-periode-form");
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
                        `{{ url('dashboard/hrms/payout/payroll_periode') }}/edit/${response.data.id}`;
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
