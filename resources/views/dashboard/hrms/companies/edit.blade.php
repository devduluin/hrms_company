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
                                <button onclick="history.go(-1)"
                                    class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md w-24">
                                    <i data-tw-merge="" data-lucide="arrow-left" class="mr-3 h-4 w-4 stroke-[1.3]"></i> Back
                                </button>
                            </div>
                        </div>
                        <div class="mt-1.5 flex flex-col">
                            <input type="hidden" name="employee_id" id="employee_id" value="" />
                            @include('dashboard.hrms.companies.tabs')
                            <div class="box box--stacked flex flex-col p-5">
                                @include('dashboard.hrms.companies.tab-content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('dist/js/vendors/tab.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            const initialTab = $('ul[role="tablist"] li:first-child button');
            initialTab.addClass('active');
            $(initialTab.data('tw-target')).addClass('active').removeAttr('style').show();

            let lastActiveTabId = initialTab.data('tw-target');
            const appToken = localStorage.getItem('app_token');

            $('ul[role="tablist"] li button[role="tab"]').on('click', async function(e) {
                const newTabId = $(this).data('tw-target');

                if (lastActiveTabId !== newTabId) {
                    e.preventDefault();
                    await handleFormSubmission(lastActiveTabId);
                    lastActiveTabId = newTabId;

                    $(lastActiveTabId + "-btn").click(async function(e) {
                        console.log(lastActiveTabId + "-form");
                        e.preventDefault();
                        await handleFormSubmission(lastActiveTabId);
                    });
                }
            });

            $(lastActiveTabId + "-btn").click(async function(e) {
                e.preventDefault();
                await handleFormSubmission(lastActiveTabId);
            });

        $(document).ready(function() {
            getCompanybyId();
        });

        async function getCompanybyId() {
            var param = {
                url: "{{ $apiUrl }}",
                method: "GET"
            }

            await transAjax(param).then((result) => {
                const data = result.data;
                $('#company_name').val(data.company_name);
                $('#domain').val(data.domain);
                $('#date_of_establishment').val(data.date_of_establishment);
                $('#parent_company').val(data.parent_company);
                $('#status').val(data.status);
                $('#default_currency').val(data.default_currency);
                showSuccessNotification(result.message, "The operation was completed successfully.");
            }).catch((error) => {
                console.log(error);
            });
        }

        //update company
        $("#updateCompany").submit(async function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            const data = {
                company_name: formData.get('company_name'),
                domain: formData.get('domain'),
                date_of_establishment: formData.get('date_of_establishment'),
                // parent_company: formData.get('parent_company'),
                parent_company: '54601ab0-cd67-46a3-864b-b30a4771ebc9',
                status: formData.get('status'),
                default_currency: formData.get('default_currency'),
                default_holiday_list: formData.get('default_holiday_list')
            };

            var param = {
                url: "{{ $apiUrl }}",
                method: "PATCH",
                data: data,
                processData: false,
                contentType: false,
                cache: false
            }

            await transAjax(param).then((result) => {
                console.log(result);
            }).catch((error) => {
                console.log(error);
            });
        });


        // document.getElementById('form-submit').addEventListener('submit', async function(event) {
        //     event.preventDefault();

        //     const formData = new FormData(this);

        //     const data = {
        //         company_name: formData.get('company_name'),
        //         domain: formData.get('domain'),
        //         date_of_establishment: formData.get('date_of_establishment'),
        //         // parent_company: formData.get('parent_company'),
        //         parent_company: '54601ab0-cd67-46a3-864b-b30a4771ebc9',
        //         status: formData.get('status'),
        //         default_currency: formData.get('default_currency'),
        //         default_holiday_list: formData.get('default_holiday_list')
        //     };

        //     try {
        //         const response = await fetch(
        //             'http://apidev.duluin.com/api/v1/company/54601ab0-cd67-46a3-864b-b30a4771ebc9', {
        //                 method: 'POST',
        //                 headers: {
        //                     'Content-Type': 'application/json',
        //                     'Authorization': 'Bearer xN9P6a8sL2bV3iR4fC5J6Q7kT8yU9wZ0'
        //                 },
        //                 body: JSON.stringify(data)
        //             });

        //         const responseData = await response.json();

        //         if (!response.ok) {
        //             throw new Error('Network response was not ok');
        //         }

        //         showSuccessNotification(responseData.message, "The operation was completed successfully.");

        //     } catch (error) {
        //         console.error('Error:', error);
        //         alert('An error occurred while submitting the data');
        //     }
        // });

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
