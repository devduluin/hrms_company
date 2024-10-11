@extends('layouts.dashboard.app')
@section('content')

<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
@include('layouts.dashboard.menu')
    <div class="content transition-[margin,width] duration-100 px-5 pt-[56px] pb-16 relative z-20 content--compact xl:ml-[275px] [&amp;.content--compact]:xl:ml-[91px]">
        <div class="container mt-[65px]">
            <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                <div class="text-base font-medium group-[.mode--light]:text-white">
                    {{ $title ?? '' }}
                </div>
                <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                    <a href="{{ route('hrms.designation') }}" data-tw-merge="" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200"><i data-tw-merge="" data-lucide="arrow-left" class="stroke-[1] w-5 h-5 mx-auto block"></i>
                        back</a>
                </div>
            </div>
            <div class="mt-3.5 grid grid-cols-12 gap-x-6 gap-y-10">
                <!-- <div class="relative col-span-12 xl:col-span-3">
                    <div class="sticky top-[104px]">
                        @include('components._asside_company')
                    </div>
                </div> -->
                <div class="col-span-12 flex flex-col gap-y-7 xl:col-span-12">
                    <form id="form-submit">
                        <div class="box box--stacked flex flex-col p-5">
                            <div>
                                <x-form._input id="designation_name" name="designation_name" label="Designation name" required="true" placholder=""/>
                            </div>
                     
                            <div class="mt-6 flex border-t border-dashed border-slate-300/70 pt-5">
                                <div class="mt-5">
                                    <button type="submit" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200">  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="send" class="lucide lucide-send stroke-[1] w-5 h-5 mx-auto block"><path d="m22 2-7 20-4-9-9-4Z"></path><path d="M22 2 11 13"></path></svg>
                                        Submit</button>
                                    <button type="reset" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed  border-primary text-primary dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="rotate-ccw" class="lucide lucide-rotate-ccw stroke-[1] w-5 h-5 mx-auto block"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path><path d="M3 3v5h5"></path></svg>
                                        Reset</button>
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
@push('js')
    <script type="text/javascript">
        let companyId = localStorage.getItem('company');

        document.getElementById('form-submit').addEventListener('submit', async function (event) {
        event.preventDefault();

        const formData = new FormData(this);

        const data = {
            company_id: companyId,
            designation_name: formData.get('designation_name'),
        };

        try {
            const response = await fetch('http://apidev.duluin.com/api/v1/designation', {
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

        // setTimeout(function() {
        //     window.location.href = "/dashboard/hrms/currency";
        // }, 3000); 

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