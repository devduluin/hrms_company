@extends('layouts.dashboard.app')
@section('content')

<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')
       
        
        <div id="contents-page" class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
            <div class="container mt-5">
                <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                    <div class="col-span-12">
                        <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                            <div class="text-base font-medium group-[.mode--light]:text-white">
                                Company profile
                            </div>
                            <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                                <a href="{{ route('hrms.company.setting') }}" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-settings mr-2"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/></svg>
                                    Company setting</a>
                            </div>
                        </div>
                        <div class="mt-3.5 grid grid-cols-12 gap-x-6 gap-y-10">
                            <div class="relative col-span-12 xl:col-span-3">
                                <div class="sticky top-[104px]">
                                    @include('components._asside_company')
                                </div>
                            </div>
                            <div class="col-span-12 flex flex-col gap-y-7 xl:col-span-9">
                                <div class="box box--stacked flex flex-col p-1.5">
                                    <div class="relative h-60 w-full rounded-[0.6rem] bg-gradient-to-b from-theme-1/95 to-theme-2/95">
                                        <div class="w-full h-full relative overflow-hidden before:content-[''] before:absolute before:inset-0 before:bg-texture-white before:-mt-[50rem] after:content-[''] after:absolute after:inset-0 after:bg-texture-white after:-mt-[50rem]"></div>
                                        <div class="absolute inset-x-0 top-0 mx-auto mt-36 h-32 w-32">
                                            <div class="box image-fit h-full w-full overflow-hidden rounded-full border-[6px] border-white">
                                                <img src="{{ asset('img/logo/duluin.jpg') }}" alt="Tailwise - Admin Dashboard Template">
                                            </div>
                                            <div class="box absolute bottom-0 right-0 mb-2.5 mr-2.5 h-5 w-5 rounded-full border-2 border-white bg-success">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col gap-y-3 rounded-[0.6rem] bg-slate-50 p-5 pt-12 sm:flex-row sm:items-end">
                                        <button class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed text-primary dark:border-primary [&amp;:hover:not(:disabled)]:bg-primary/10 border-primary/50 sm:ml-auto"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="image" class="lucide lucide-image mr-2.5 h-4 w-4 stroke-[1.3]"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect><circle cx="9" cy="9" r="2"></circle><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path></svg>
                                            Upload Cover</button>
                                    </div>
                                </div>

                                <form id="formUpdateCompany">
                                <div class="box box--stacked flex flex-col p-5">
                                    <div>
                                        <div class="mt-5 block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                            <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-64">
                                                <div class="text-left">
                                                    <div class="flex items-center">
                                                        <div class="font-medium">Company Name</div>
                                                        <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                                            Required
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-3 w-full flex-1 xl:mt-0">
                                                <input id="company_name" name="company_name" type="text" class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                                            </div>
                                        </div>
                                        <div class="mt-5 block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                            <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-64">
                                                <div class="text-left">
                                                    <div class="flex items-center">
                                                        <div class="font-medium">Domain</div>
                                                        <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                                            Required
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-3 w-full flex-1 xl:mt-0">
                                                <input id="domain" name="domain" type="text" class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                                            </div>
                                        </div>
                                        <div class="mt-5 block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                            <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-64">
                                                <div class="text-left">
                                                    <div class="flex items-center">
                                                        <div class="font-medium">Date Of Establishment</div>
                                                        <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                                            Required
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-3 w-full flex-1 xl:mt-0">
                                                <input id="date_of_establishment" name="date_of_establishment" type="date" class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                                            </div>
                                        </div>
                                        <div class="mt-5 block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                            <x-form._select 
                                                name="default_holiday_list" 
                                                id="default_holiday_list" 
                                                label="Default holiday list" 
                                                required
                                            >
                                                <option value="on">on</option>
                                                <option value="off">off</option>
                                            </x-form._select>
                                        </div>
                                        <div class="mt-5 block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                            <x-form._select 
                                                name="default_currency" 
                                                id="default_currency" 
                                                label="Default currency" 
                                                required
                                            >
                                                <option value="IDR">IDR</option>
                                                <option value="USD">USD</option>
                                            </x-form._select>
                                        </div>
                                        <div class="mt-5 block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                            <x-form._select 
                                                name="status" 
                                                id="status" 
                                                label="Status" 
                                                required
                                            >
                                                <option value="enable">enable</option>
                                                <option value="disbale">disable</option>
                                            </x-form._select>
                                        </div>
                                    </div>
                                    <div class="mt-6 flex border-t border-dashed border-slate-300/70 pt-5 md:justify-end">
                                        <button type="submit" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed text-primary dark:border-primary [&amp;:hover:not(:disabled)]:bg-primary/10 w-full border-primary/50 px-4 md:w-auto">Save Changes</button>
                                    </div>
                                </form>
                                </div>
                            </div>
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

    let companyId = localStorage.getItem('company');
    async function getCompanybyId() {
        try {
            const response = await fetch('http://localhost:4444/api/v1/company/'+companyId, {
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

            //tampilkan data company
            document.getElementById('company_name').value = result.data.company_name;
            document.getElementById('domain').value = result.data.domain;
            document.getElementById('date_of_establishment').value = result.data.date_of_establishment;
            document.getElementById('default_holiday_list').value = result.data.default_holiday_list;
            document.getElementById('status').value = result.data.status;
            document.getElementById('default_currency').value = result.data.default_currency;

            showSuccessNotification(result.message, "The operation was completed successfully.");

        } catch (error) {
            console.error('Error:', error);
            alert('An error occurred while submitting the data');
        }
    }

    document.getElementById('formUpdateCompany').addEventListener('submit', async function (event) {
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

        console.log(data);
        

        try {
            const response = await fetch('http://localhost:4444/api/v1/company/'+companyId, {
                method: 'PATCH',
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
