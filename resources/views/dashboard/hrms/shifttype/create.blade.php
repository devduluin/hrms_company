@extends('layouts.dashboard.app')
@section('content')

<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')
       
        
        <div id="contents-page" class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
            <form id="form-submit">
            <div class="container">
                <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                        <div class="col-span-12">
                            <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                                <div class="text-base font-medium group-[.mode--light]:text-white">
                                    {{ $page_title ?? config('app.name') }}
                                </div>
                                <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                                    <a href="{{ route("hrms.attendance") }}"
                                    class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md w-24">
                                    <i data-tw-merge="" data-lucide="arrow-left" class="mr-3 h-4 w-4 stroke-[1.3]"></i> Back
                                    </a> 
                                    <button type="submit" id="btn_submit"
                                    class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-blue-theme border-blue-theme text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200"><i data-tw-merge="" data-lucide="save" class="mr-3 h-4 w-4 stroke-[1.3]"></i> Save Changes
                                    </button> 
                                </div>
                            </div>
                            <div class="box mt-5">
                                <div class="p-7">
                                    <div class="grid md:grid-cols-3 xl:grid-cols-4">
                                        <input type="hidden" name="user_id" value="3c5b06b2-b224-4029-a7a9-a0291dbe723c">
                                        <x-form.input id="shift_type_name" label="Shift Type Name" name="shift_type_name" required />
                                        <x-form.input type="datetime-local" id="start_time" label="Start Time" name="Start Time" required />
                                        <x-form.input type="datetime-local" id="end_time" label="End Time" name="end_time" required />
                                        <x-form.input type="time" id="time_tolerance" label="Time Tolerance" name="time_tolerance" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
    $("#form-submit").submit(async function store(e) {
        e.preventDefault();

        //inisialisasi data shift type 
        var formData = {
            company_id: localStorage.getItem('company'),
            shift_type_name: $("#shift_type_name").val(),
            start_time: $("#start_time").val(),
            end_time: $("#end_time").val(),
            time_tolerance: $("#time_tolerance").val(),
        };
        
        var param = {
            url: "{{ $apiUrlShiftType }}",
            method: "POST",
            data: JSON.stringify(formData),
            processData: false,
            contentType: false,
            cache: false
        }

        saving(true);
        await transAjax(param).then((result) => {
            showSuccessNotification(result.message, "The operation was completed successfully.");
            saving(false);
            setTimeout(() => {
                window.location.href = "/dashboard/hrms/shift-type";
            }, 3000);
        }).catch((error) => {
            saving(false);
            showErrorNotification(error.message, "An error occurred while processing your request.")
        });

        function saving(state) {
            if(state) {
                $("#btn_submit").html('Saving...');
                $("#btn_submit").attr('disabled', 'disabled');
            }else {
                $("#btn_submit").html('Saving Changes');
                $("#btn_submit").removeAttr('disabled');
            }
         }
    });
</script>
@endpush
