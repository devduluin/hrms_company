@extends('layouts.dashboard.app')
@section('content')

<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')
       
        
        <div id="contents-page" class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
            <div class="container">
            <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                <div class="col-span-12">
                    <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                        <div class="text-base font-medium group-[.mode--light]:text-white">
                            {{ $page_title ?? config('app.name') }}
                        </div>
                        <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                            <a href="{{ url('dashboard/hrms/company/list') }}" data-tw-merge="" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200"><i data-tw-merge="" data-lucide="arrow-left" class="stroke-[1] w-5 h-5 mx-auto block"></i>
                                back</a>
                        </div>
                    </div>
                    <div class="box mt-10">
                    <form id="form-submit">
                        <div class="p-7">
                            <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-2 gap-1 mt-5">
                                <input type="hidden" name="user_id" value="3c5b06b2-b224-4029-a7a9-a0291dbe723c">
                                <x-form.input id="company_name" label="Company   Name" name="company_name" required />
                                <x-form.input id="domain" label="Domain" name="domain" required />
                                <x-form.datepicker id="date_of_establishment" label="Date of establishment" name="date_of_establishment" required />
                                <x-form.select name="parent_company" id="parent_company" label="Parent Company" class="tom-select w-full"
                                data-placeholder="Select parent company" url="#" required>
                                <option value="c808a63e-f0c2-4979-8927-e9b1ed43f1ed">Select parent company</option>
                                </x-form.select>
                                <x-form.select name="status" id="status" label="Status" class="tom-select w-full"
                                data-placeholder="Select status" url="#" required>
                                <option value="">Select status</option>
                                <option value="enable">enable</option>
                                <option value="disbale">disbale</option>
                                </x-form.select>
                                <x-form.select name="default_currency" id="default_currency" label="Default currency" class="tom-select w-full"
                                data-placeholder="Select default currency" url="#" required>
                                <option value="">Select default currency</option>
                                <option value="IDR">IDR</option>
                                <option value="USD">USD</option>
                                </x-form.select>
                                <input type="hidden" name="default_holiday_list" value="off">
                            </div>
                            <div class="mt-5">
                                <button type="submit" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200">  <i data-tw-merge="" data-lucide="send" class="stroke-[1] w-5 h-5 mx-auto block"></i>
                                    Save changes</button>
                                <button type="reset" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200"> <i data-tw-merge="" data-lucide="rotate-ccw" class="stroke-[1] w-5 h-5 mx-auto block"></i>
                                    Reset</button>
                            </div>
                            
                        </div>
                    </div>
                </form>
                </div>
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
@push('js')
<script type="text/javascript">
    $(document).ready(function() {
        getCompanybyId();
    });

    async function getCompanybyId() {
        try {
            const response = await fetch('http://apidev.duluin.com/api/v1/company/54601ab0-cd67-46a3-864b-b30a4771ebc9', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer xN9P6a8sL2bV3iR4fC5J6Q7kT8yU9wZ0' 
                },
            });

            const result = await response.json();
            
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            //tampilkan data pada form
            document.getElementById('company_name').value = result.data.company_name;
            document.getElementById('domain').value = result.data.domain;
            document.getElementById('date_of_establishment').value = result.data.date_of_establishment;
            document.getElementById('parent_company').value = result.data.parent_company;
            document.getElementById('status').value = result.data.status;
            document.getElementById('default_currency').value = result.data.default_currency;

            showSuccessNotification(result.message, "The operation was completed successfully.");

        } catch (error) {
            console.error('Error:', error);
            alert('An error occurred while submitting the data');
        }
    }

    document.getElementById('form-submit').addEventListener('submit', async function (event) {
        event.preventDefault();

        const formData = new FormData(this);

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

        try {
            const response = await fetch('http://apidev.duluin.com/api/v1/company/54601ab0-cd67-46a3-864b-b30a4771ebc9', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer xN9P6a8sL2bV3iR4fC5J6Q7kT8yU9wZ0' 
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
