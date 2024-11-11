@extends('layouts.dashboard.app')
@section('content')

<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
@include('layouts.dashboard.menu')
    <div class="content transition-[margin,width] duration-100 px-5 pt-[56px] pb-16 relative z-20 content--compact xl:ml-[275px] [&amp;.content--compact]:xl:ml-[91px]">
        <form id="form-submit">
            <input type="hidden" name="latlong" />
            <div class="container mt-[65px]">
                <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                    <div class="text-base font-medium group-[.mode--light]:text-white">
                        {{ $page_title ?? '' }}
                    </div>
                    <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                        <button onclick="history.go(-1)"
                            class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md w-24">
                            <i data-tw-merge="" data-lucide="arrow-left" class="mr-3 h-4 w-4 stroke-[1.3]"></i> Back
                        </button>
                        <button id="submitBtn" data-tw-merge="" type="submit"
                                class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-blue-theme border-blue-theme text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200"><i
                                    data-tw-merge="" data-lucide="save" class="mr-3 h-4 w-4 stroke-[1.3]"></i>
                                <span id="loadingText">Save Changes</span>
                        </button>
                    </div>
                </div>
                <div class="mt-3.5 grid grid-cols-12 gap-x-6 gap-y-10">
                    <div class="col-span-12 flex flex-col gap-y-7 sm:col-span-12 xl:col-span-12">
                        <div class="box box--stacked flex flex-col p-5">
                            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-4">
                                <div class="gap-x-6 gap-y-10 ">
                                    <div class="py-2">
                                        <x-form.select id="employee_id" name="employee_id" data-method="POST" required label="Employee Name" url="{{ url('dashboard/hrms/employee/create') }}"
                                            apiUrl="{{ $apiUrlEmployee }}/datatables" columns='["first_name", "last_name"]'  
                                            :keys="[
                                                'company_id' => $company_id,
                                            ]">
                                            <option value="">Select Employee</option>
                                        </x-form.select>
                                    </div>
                                    <div class="py-2">
                                        <div class="mt-3 flex-row xl:items-center" placholder="">
                                            <div class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-4">
                                                <div class="text-left">
                                                    <div class="flex items-center">
                                                        <div class="font-medium" for="start_time">Department</div>
                                                                            
                                                    </div>
                                                    <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-1 sm:w-full  w-96  gap-1 mt-3 xl:mt-0">
                                                <input id="department" readonly type="text" name="" value="" class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-2">
                                    <x-form.input id="company" label="Company" name="" readonly />
                                    </div>
                                </div>
                                <div class="gap-x-6 gap-y-10 "></div>
                                <div class="gap-x-6 gap-y-10 ">
                                    <div class="py-2">
                                        <div class="mt-3 flex-row xl:items-center" placholder="">
                                            <div class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-4">
                                                <div class="text-left">
                                                    <div class="flex items-center">
                                                        <div class="font-medium" for="start_time">Shift Name</div>
                                                                            
                                                    </div>
                                                    <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-1 sm:w-full  w-96  gap-1 mt-3 xl:mt-0">
                                                <input id="shift_type_name" readonly type="text" name="" value="" class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-2">
                                        <div class="mt-3 flex-row xl:items-center" placholder="">
                                            <div class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-4">
                                                <div class="text-left">
                                                    <div class="flex items-center">
                                                        <div class="font-medium" for="start_time">Start Date</div>
                                                                <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                                                Required
                                                            </div>                
                                                    </div>
                                                    <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-1 sm:w-full  w-96  gap-1 mt-3 xl:mt-0">
                                                <input id="start_date" type="text" name="start_date" data-single-mode="true" value=""  required="" class="datepicker disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-2">
                                        <div class="mt-3 flex-row xl:items-center" placholder="">
                                            <div class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-4">
                                                <div class="text-left">
                                                    <div class="flex items-center">
                                                        <div class="font-medium" for="start_time">End Date</div>
                                                                <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                                                Required
                                                            </div>                
                                                    </div>
                                                    <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-1 sm:w-full  w-96  gap-1 mt-3 xl:mt-0">
                                                <input id="end_date" type="text" name="end_date" data-single-mode="true" value="" required="" class="datepicker disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gap-x-6 gap-y-10 ">
                                    <div class="py-2">
                                        <div class="mt-3 flex-row xl:items-center" placholder="">
                                            <div class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-4">
                                                <div class="text-left">
                                                    <div class="flex items-center">
                                                        <div class="font-medium" for="time_in">Checkin Time</div>
                                                                <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                                                Required
                                                            </div>                
                                                    </div>
                                                    <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-1 sm:w-full  w-96  gap-1 mt-3 xl:mt-0">
                                                <input id="time_in" type="time" name="time_in" data-single-mode="true" value="" placeholder="Start Time" required="true" class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-2">
                                        <div class="mt-3 flex-row xl:items-center" placholder="">
                                            <div class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-4">
                                                <div class="text-left">
                                                    <div class="flex items-center">
                                                        <div class="font-medium" for="time_out">Checkout Time</div>
                                                                          
                                                    </div>
                                                    <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-1 sm:w-full  w-96  gap-1 mt-3 xl:mt-0">
                                                <input id="time_out" type="time" name="time_out" data-single-mode="true" value="" placeholder="Start Time" class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="py-2">
                                        <div class="mt-3 flex-row xl:items-center">
                                            <div class="mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-64">
                                                <div class="text-left">
                                                    <div class="flex items-center">
                                                        <div class="font-medium">Status</div>
                                                    </div>
                                                </div>
                                                <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3"></div>
                                            </div>
                                            <div class="mt-3 w-96 flex-1 xl:mt-0">
                                                <select required name="status" id="status" data-title="Language" data-placeholder="Select your language" class="tom-select w-full" sclass="tom-select disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10"">
                                                    <option value="present">
                                                        Present
                                                    </option>
                                                    <option value="absent">
                                                        Absent
                                                    </option>
                                                    <option value="leave">
                                                        Leave
                                                    </option>
                                                    <option value="wfo">
                                                        WFO
                                                    </option>
                                                    <option value="wfh">
                                                        WFH
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        </div>
                                    
                                    <div id="leave" class="py-2" hidden>
                                    <x-form.select id="leave_type_id" name="leave_type_id" data-method="POST" label="Leave Type Name" url="{{ url('dashboard/hrms/employee/create') }}"
                                        apiUrl="{{ $apiUrlLeaveType }}" columns='["leave_type_name"]'  
                                        :keys="[
                                            'company_id' => $company_id,
                                        ]">
                                        <option value="">Select Leave Type</option>
                                    </x-form.select>
                                    </div>
                                    </div>
                                
                            </div>
                            <div class="gap-x-6 gap-y-10">
                                <x-form.textarea id="reason" name="reason" label="Reason"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
<script src="{{ asset('dist') }}/js/vendors/litepicker.js"></script>
<script src="{{ asset('dist') }}/js/components/base/litepicker.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        setCurrentTime();
    });

    const timeInInput = document.getElementById('time_in');
    const timeOutInput = document.getElementById('time_out');

    // Function to format time to 'HH:MM'
    function setCurrentTime() {
        const now = new Date();
        
        const options = { timeZone: 'Asia/Jakarta', hour12: false, hour: '2-digit', minute: '2-digit' };
        const jakartaTime = now.toLocaleTimeString('en-GB', options); // 'en-GB' is used for 24-hour format
        
        // Set the value of the time inputs to the Jakarta time
        timeInInput.value = jakartaTime;
        //timeOutInput.value = jakartaTime;
    }

    // Call the function to set the current time
    setCurrentTime();

    //simpan payload data attendance dari data detail employee
    var employee_id = '';
    var company_id = '';
    var latlong = '';
    //tampilkan employee berdasarkan employee_id
    async function getDetailEmployee(value) 
    {
       var param = {
        url: "{{ $apiUrlEmployee }}/" + value,
        method: "GET",
       }

       await transAjax(param).then((result) => {
        const employee = result.data
        employee_id = employee.id;
        getDetailShift(employee_id);
        company_id =  employee.company_id
        latlong = employee.company_id_rel.latlong;
        if (employee.department_id_rel?.department_name) {
            $('#department').val(employee.department_id_rel.department_name);
        }

        if (employee.company_id_rel?.company_name) {
            $('#company').val(employee.company_id_rel.company_name);
        }
       }).catch((error) => {
        console.log(error);
       });
    }

    async function getDetailShift(value) 
    {
       var param = {
        url: "{{ $apiUrlShiftEmployee }}/" + value,
        method: "GET",
       }

       await transAjax(param).then((result) => {
        const shift = result.data
        if (shift.shift_type_id_rel?.shift_type_name) {
            $('#shift_type_name').val(shift.shift_type_id_rel.shift_type_name);
        }
        shift_type_name

       }).catch((error) => {
        console.log(error);
       });
    }
    
    $('#employee_id').change(function() {
        const selectedValue = $(this).val();

        getDetailEmployee(selectedValue);
        
    });

    $('#status').change(function() {
        const selectedValue = $(this).val();

        if(selectedValue == 'leave'){
            $('#leave').show();
        }else{
            $('#leave').hide();
        }
    });

    $("#form-submit").submit(async function(e) {
        e.preventDefault();

        var dataAttendance = {
            employee_id: employee_id,
            company_id: company_id,
            latlong: latlong,
            start_date: $('#start_date').val(),
            end_date: $('#end_date').val(),
            time_in: $('#time_in').val(),
            time_out: $('#time_out').val(),
            status: $('#status option:selected').val(),
            leave_type_id: $('#leave_type_id option:selected').val(),
            reason: $('#reason').val()
        }
        var data = JSON.stringify(dataAttendance);
        console.log(data);

        $('#loadingText').html('Saving...');
        $(this).attr('disable', true);

        var param = {
            url: "{{ $apiAttendance }}",
            method: "POST",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
        }
        
        await transAjax(param).then((result) => {
            showSuccessNotification(result.message, "The operation was completed successfully.");
            $('#loadingText').html('Save Changes');
            $(this).attr('disable', false);
            setTimeout(() => {
                window.location.href = "/dashboard/hrms/attendance/summary";
            }, 3000);
        }).catch((error) => {
            $('#loadingText').html('Save Changes');
            $(this).attr('disable', false);
            showErrorNotification('error', error.message);
        });
    });
    </script>
@endpush