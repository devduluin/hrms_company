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
                        <div class=" flex flex-col mb-4 gap-x-3 md:h-10 md:flex-row md:items-center ">
                            <div class="text-base font-medium group-[.mode--light]:text-white">
                                {{ $page_title }}
                            </div>
                            <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                                <button onclick="history.go(-1)"
                                    class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-primary text-primary dark:border-primary shadow-md w-100"  href="{{ $url ?? '' }}"> 
                                    <i data-tw-merge="" data-lucide="arrow-left" class="mr-3 h-4 w-4 stroke-[1.3]"></i> Back
                                </button>
                                <x-form.button label="Save changes" id="save-btn" style="primary" type="submit"
                                    icon="save" />
                            </div>
                        </div>
                        <div class="mt-1.5 flex flex-col">
                            <input type="hidden" name="employee_id" id="employee_id" value="" />
                            @include('dashboard.payroll.payout.tabs')
                            <div class="box box--stacked flex flex-col p-5">
                                @include('dashboard.payroll.payout.tab-content')
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
            // Initialize the first tab as active
            const initialTab = $('ul[role="tablist"] li:first-child button');
            initialTab.addClass('active');
            $(initialTab.data('tw-target')).addClass('active').removeAttr('style').show();

            let lastActiveTabId = initialTab.data('tw-target');
            console.log(lastActiveTabId);
            const appToken = localStorage.getItem('app_token');

            $('ul[role="tablist"] li button[role="tab"]').on('click', async function(e) {
                const newTabId = $(this).data('tw-target');

                if (lastActiveTabId !== newTabId) {
                    e.preventDefault();
                    await handleFormSubmission(lastActiveTabId);
                    lastActiveTabId = newTabId;
                    console.log(lastActiveTabId);

                    $(lastActiveTabId + "-btn").click(async function(e) {
                        console.log(lastActiveTabId + "-form");
                        e.preventDefault();
                        await handleFormSubmission(lastActiveTabId);
                    });
                }
            });

            $(lastActiveTabId + "-btn").click(async function(e) {
                console.log(lastActiveTabId + "-form");
                e.preventDefault();
                await handleFormSubmission(lastActiveTabId);
            });

            async function handleFormSubmission(formId) {
                const currentForm = $(formId + "-form");
                const data = serializeFormData(currentForm);
                const employeeId = $("#employee_id").val();
                data._token = $('meta[name="csrf-token"]').attr('content');
                data.company_id = localStorage.getItem('company');
                data.employee_id = employeeId;
                $('.error-message').hide();

                if (employeeId == "" && formId !== "#overview") {
                    toastr.error("Please create Employee Overview data first");
                }

                try {
                    const response = await $.ajax({
                        url: currentForm.attr('action'),
                        type: 'POST',
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
                        console.log(xhr.responseText);
                        const response = JSON.parse(xhr.responseText);
                        handleErrorResponse(response, formId);
                    } else {
                        toastr.error('An error occurred while processing your request.');
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
                        toastr.success(response.message);

                        // send email notification
                        handleNotification(response);
                    } else {
                        toastr.success("Data has been updated successfully");
                    }
                    // console.log("Employee ID : ", response.data.employee.id);
                    $("#employee_id").val(response.data.employee.id);
                } else {
                    toastr.error(response.message);
                }
            }

            function handleNotification(response) {
                console.log(response);
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
                        employee_id: response.data.employee.id,
                        company_id: response.data.employee.company_id,
                        personal_email: response.data.addressData.personal_email,
                        phone_number: response.data.addressData.mobile_phone,
                        first_name: response.data.employee.first_name,
                        last_name: response.data.employee.last_name,
                    },
                    dataType: 'json',
                    success: function(data) {
                        toastr.success('Verification email sent successfully.');
                    },
                    error: function(error) {
                        toastr.error('Failed to send verification email.');
                    }
                });
            }

            // Global variable to hold the observer
            // let observer = null;

            // function activateTab(tabId) {
            //     $('ul[role="tablist"] li button').removeClass('active');
            //     $('.tab-pane').removeClass('active').hide();

            //     $(`ul[role="tablist"] li button[data-tw-target="${tabId}"]`).addClass('active');
            //     const tabContent = $(tabId);
            //     tabContent.addClass('active').show();

            //     // Disconnect the previous observer if it exists
            //     if (observer) {
            //         observer.disconnect();
            //     }

            //     // Create a new observer
            //     observer = new MutationObserver(function(mutationsList) {
            //         for (let mutation of mutationsList) {
            //             if (mutation.type === 'attributes' && mutation.attributeName === 'style') {
            //                 if (tabContent.css('display') === 'none') {
            //                     tabContent.css({
            //                         'display': 'block',
            //                         'visibility': 'visible',
            //                         'opacity': '1'
            //                     });
            //                 }
            //             }
            //         }
            //     });

            //     observer.observe(tabContent[0], {
            //         attributes: true
            //     });
            // }


            // function handleErrorResponse(result, tabId) {
            //     const errorString = result.error || 'An error occurred.';
            //     toastr.error(`There were validation errors on tab ${tabId}`);
            //     const errorMessages = errorString.split(', ');

            //     $('.error-message').remove();

            //     const errorPattern = /\"([^\"]+)\"/g;
            //     let match;

            //     while ((match = errorPattern.exec(errorMessages)) !== null) {
            //         const field = match[1];
            //         if (field !== 'employee_id') {
            //             let fieldName = field.replace(/_/g, " ").replace(/\b\w/g, char => char.toUpperCase());
            //             const input = $(`[name="${field}"]`);

            //             input.addClass('is-invalid');
            //             input.before(
            //                 `<div class="error-message text-danger mt-1 text-xs text-slate-500 sm:ml-auto sm:mt-0 mb-2">${fieldName} is not allowed to be empty</div>`
            //             );
            //             // toastr.error(`${fieldName} is not allowed to be empty`);
            //         }
            //     }

            //     const firstErrorField = $('.error-message').first();
            //     if (firstErrorField.length) {
            //         $('html, body').animate({
            //             scrollTop: firstErrorField.offset().top - 100
            //         }, 500);
            //     }
            // }
        });
    </script>
@endpush
