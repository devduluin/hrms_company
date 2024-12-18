@extends('layouts.dashboard.app')
@section('content')
<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
    @include('layouts.dashboard.menu')

    <div class="content transition-[margin,width] duration-100 px-5 pt-[56px] pb-16 relative z-20 content--compact xl:ml-[275px] [&amp;.content--compact]:xl:ml-[91px]">
            <div class="mt-[65px] flex flex-col gap-y-5 md:h-10 md:flex-row md:items-center">
                <div class="text-lg font-medium group-[.mode--light]:text-white">
                {{ $page_title ?? '' }}
                </div>
                <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                <button onclick="history.go(-1)"
                            class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md w-24">
                            <i data-tw-merge="" data-lucide="arrow-left" class="mr-3 h-4 w-4 stroke-[1.3]"></i> Back
                        </button>
                        <div id="approval" hidden data-tw-merge="" data-tw-placement="bottom-end" class="dropdown relative"><button data-tw-merge="" data-tw-toggle="dropdown" aria-expanded="false" class="transition duration-200 border shadow-md inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-secondary/70 bg-secondary/70 text-slate-500 dark:border-darkmode-100/40 dark:text-slate-300 [&:hover:not(:disabled)]:bg-secondary/20 [&:hover:not(:disabled)]:dark:bg-darkmode-100/10 w-full sm:w-auto">
                            <i data-tw-merge="" data-lucide="menu" class="mr-2 h-4 w-4 stroke-[1.3]"></i>
                                Approval
                                <i data-tw-merge="" data-lucide="chevron-down" class="ml-2 h-4 w-4 stroke-[1.3]"></i></button>
                            <div data-transition="" data-selector=".show" data-enter="transition-all ease-linear duration-150" data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1" data-enter-to="!mt-1 visible opacity-100 translate-y-0" data-leave="transition-all ease-linear duration-150" data-leave-from="!mt-1 visible opacity-100 translate-y-0" data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1" class="dropdown-menu absolute z-[9999] hidden">
                                <div data-tw-merge="" class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600 w-40">
                                    <a onClick="approval(`submit`)" class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item">
                                        <i data-tw-merge="" data-lucide="navigation" class="stroke-[1] mr-2 h-4 w-4"></i>
                                        Submit</a>
                                    <a onClick="approval(`approved`)" class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item">
                                        <i data-tw-merge="" data-lucide="check" class="stroke-[1] mr-2 h-4 w-4"></i>
                                        Approve</a>
                                    <a onClick="approval(`rejected`)" class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item">
                                        <i data-tw-merge="" data-lucide="x" class="stroke-[1] mr-2 h-4 w-4"></i>
                                        Reject</a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="mt-3.5 grid grid-cols-10 gap-5">
                <div class="col-span-12 xl:col-span-4">
                <div class="box flex flex-col p-5">
                        <div class="relative mt-3 rounded-[0.6rem] border border-slate-200/80 dark:border-darkmode-400">
                            <div class="absolute left-0 -mt-2 ml-4 bg-white px-3 text-xs uppercase text-slate-500">
                                <div class="-mt-px">Employee Details</div>
                            </div>
                            <div class="flex flex-col gap-5 p-5">
                                <div class="overflow-auto xl:overflow-visible">
                                <table class="w-full text-left border-b border-dashed border-slate-200/80">
                                    <tbody>
                                        <tr class="[&amp;_td]:first:pt-5 [&amp;_td]:last:border-b-0 [&amp;_td]:last:pb-5">
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p class="whitespace-nowrap font-bold">ID</p>
                                            </td>
                                            <td class="px-1 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">:</td>
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p id="employeeId">-</p>
                                            </td>
                                        </tr>
                                        <tr class="[&amp;_td]:first:pt-5 [&amp;_td]:last:border-b-0 [&amp;_td]:last:pb-5">
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p class="whitespace-nowrap font-bold">Name</p>
                                            </td>
                                            <td class="px-1 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">:</td>
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p id="name">-</p>
                                            </td>
                                        </tr>
                                        <tr class="[&amp;_td]:first:pt-5 [&amp;_td]:last:border-b-0 [&amp;_td]:last:pb-5">
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p class="whitespace-nowrap font-bold">Email</p>
                                            </td>
                                            <td class="px-1 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">:</td>
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p id="email">-</p>
                                            </td>
                                        </tr>
                                        <tr class="[&amp;_td]:first:pt-5 [&amp;_td]:last:border-b-0 [&amp;_td]:last:pb-5">
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p class="whitespace-nowrap font-bold">Mobile Phone</p>
                                            </td>
                                            <td class="px-1 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">:</td>
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p id="phone">-</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box flex flex-col p-5 mt-5">
                        <div class="relative mt-3 rounded-[0.6rem] border border-slate-200/80 dark:border-darkmode-400">
                            <div class="absolute left-0 -mt-2 ml-4 bg-white px-3 text-xs uppercase text-slate-500">
                                <div class="-mt-px">Shift Details</div>
                            </div>
                            <div class="flex flex-col gap-5 p-5">
                                <div class="overflow-auto xl:overflow-visible">
                                <table class="w-full text-left border-b border-dashed border-slate-200/80">
                                    <tbody>
                                        <tr class="[&amp;_td]:first:pt-5 [&amp;_td]:last:border-b-0 [&amp;_td]:last:pb-5">
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p class="whitespace-nowrap font-bold">Shift Name</p>
                                            </td>
                                            <td class="px-1 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">:</td>
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p id="shift_type_name">-</p>
                                            </td>
                                        </tr>
                                        <tr class="[&amp;_td]:first:pt-5 [&amp;_td]:last:border-b-0 [&amp;_td]:last:pb-5">
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p class="whitespace-nowrap font-bold">Shift Periode</p>
                                            </td>
                                            <td class="px-1 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">:</td>
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p id="shift_periode">-</p>
                                            </td>
                                        </tr>
                                        <tr class="[&amp;_td]:first:pt-5 [&amp;_td]:last:border-b-0 [&amp;_td]:last:pb-5">
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p class="whitespace-nowrap font-bold">Shift Time</p>
                                            </td>
                                            <td class="px-1 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">:</td>
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p id="shift_time">-</p>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 flex flex-col gap-7 xl:col-span-6">
                    
                    

                    <div class="box flex flex-col p-5">
                        <div class="relative mt-3 rounded-[0.6rem] border border-slate-200/80 dark:border-darkmode-400">
                            <div class="absolute left-0 -mt-2 ml-4 bg-white px-3 text-xs uppercase text-slate-500">
                                <div class="-mt-px">Attendance Request Details</div>
                            </div>
                            <div class="mt-2.5 flex flex-col gap-5 p-5">
                                <div class="overflow-auto xl:overflow-visible">
                                <table class="w-full text-left border-b border-dashed border-slate-200/80">
                                    <tbody>
                                       
                                        <tr class="[&amp;_td]:first:pt-5 [&amp;_td]:last:border-b-0 [&amp;_td]:last:pb-5">
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p class="whitespace-nowrap font-bold">Reason</p>
                                            </td>
                                            <td class="px-1 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">:</td>
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p id="reason">-</p>
                                            </td>
                                        </tr>
                                        <tr class="[&amp;_td]:first:pt-5 [&amp;_td]:last:border-b-0 [&amp;_td]:last:pb-5">
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p class="whitespace-nowrap font-bold">From Date</p>
                                            </td>
                                            <td class="px-1 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">:</td>
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p id="from_date">-</p>
                                            </td>
                                        </tr>
                                        <tr class="[&amp;_td]:first:pt-5 [&amp;_td]:last:border-b-0 [&amp;_td]:last:pb-5">
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p class="whitespace-nowrap font-bold">To Date</p>
                                            </td>
                                            <td class="px-1 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">:</td>
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p id="to_date">-</p>
                                            </td>
                                        </tr>
                                        <tr class="[&amp;_td]:first:pt-5 [&amp;_td]:last:border-b-0 [&amp;_td]:last:pb-5">
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p class="whitespace-nowrap font-bold">Explanation</p>
                                            </td>
                                            <td class="px-1 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">:</td>
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p id="explanation">-</p>
                                            </td>
                                        </tr>
                                        <tr class="[&amp;_td]:first:pt-5 [&amp;_td]:last:border-b-0 [&amp;_td]:last:pb-5">
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p class="whitespace-nowrap font-bold">Attachment</p>
                                            </td>
                                            <td class="px-1 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">:</td>
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p id="attachment">-</p>
                                            </td>
                                        </tr>
                                        <tr class="[&amp;_td]:first:pt-5 [&amp;_td]:last:border-b-0 [&amp;_td]:last:pb-5">
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p class="whitespace-nowrap font-bold">Status</p>
                                            </td>
                                            <td class="px-1 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">:</td>
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p id="status">-</p>
                                            </td>
                                        </tr>
                                        <tr class="[&amp;_td]:first:pt-5 [&amp;_td]:last:border-b-0 [&amp;_td]:last:pb-5">
                                            <td colspan="3" class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                </div>
                            </div>
                        </div>
                    </div>

                     
                </div>
            </div>
            <div class="grid grid-cols-12 gap-x-6 gap-y-5 mt-5">
                
                </div>
            </div>
        </div>
     
</div>
@endsection
@push('js')
<script defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7T5886HCdj0jMOWhW_aliRYP6NUnjSzE&libraries=geometry&callback">
</script>
    <script type="text/javascript">
        $(document).ready(function() {
            getPersonalEmployee();
        });

        function getAttachment(data, type, row, meta) {
            if (data) {

                return `<a target="_blank" class="text-primary font-medium" href="${data}">Download</a>`;
            }
            return 'N/A';
        }

        
        function getPersonalEmployee()
        {
            var param = {
                url: "{{ $apiUrl }}",
                method: "GET",
            }

            transAjax(param).then((result) => {
                let employee = result.data.employee_id_rel;
                let attendance = result.data;
                
                 

                $('#employeeId').html(employee.employee_id);
                $('#name').html('<a class="text-info" href="{{ url('/dashboard/hrms/employee/edit_employee') }}/'+employee.id+'">'+employee.first_name + ' ' + employee.last_name+' <i class="fa-solid fa-arrow-up-right-from-square ml-2"></i></a>');
                $('#email').html(employee.addressContact?.personal_email);
                $('#phone').html(employee.addressContact?.mobile_phone);

               // $("#attendance_date").html(formatDateToReadable(attendance.attendance_date));
                $("#reason").html(attendance.reason);
                $("#from_date").html(formatDateToReadable(attendance.from_date));
                $("#to_date").html(formatDateToReadable(attendance.to_date));
                $("#explanation").html(attendance.explanation);
                $("#attendance_status").html(getAttendanceStatus(attendance.status));

                if (attendance.shift_assigment_id_rel?.shift_type_id_rel?.shift_type_name) {
                    $('#shift_type_name').html('<a class="text-info" href="{{ url('/dashboard/hrms/attendance/shift_type/update') }}/'+attendance.shift_assigment_id_rel.shift_type_id_rel.id+'">'+attendance.shift_assigment_id_rel.shift_type_id_rel.shift_type_name+' <i class="fa-solid fa-arrow-up-right-from-square ml-2"></i></a>');
                    
                }

                if (attendance.shift_assigment_id_rel?.start_date) {
                    $('#shift_periode').html(formatDateToReadable(attendance.shift_assigment_id_rel.start_date)+' - '+formatDateToReadable(attendance.shift_assigment_id_rel.end_date));
                    
                }

                if (attendance.shift_assigment_id_rel?.shift_type_id_rel) {
                    $('#shift_time').html(attendance.shift_assigment_id_rel.shift_type_id_rel.start_time+' - '+attendance.shift_assigment_id_rel.shift_type_id_rel.end_time);
                    
                }
                
                $("#status").html(getStatus(attendance.status));
                //if(attendance.status == 'submit' || attendance.status == 'rejected'){
                    $("#approval").attr("hidden", false)
                //}
                $("#attachment").html(`<a onclick="downloadFile('${attendance.attachment}')" class="text-info font-medium" href="javascript:void(0)"><i class="fa-solid fa-cloud-arrow-down"></i> Download</a>`);
                
            }).catch((err) => {
                console.log(err);
            });
        }

        function getAttendanceStatus(data) {
            
            if (data === 'approved') {
                return `<div class="flex capitalize text-success"><div class="whitespace-nowrap"><i data-tw-merge data-lucide="check" class="text-success"></i> ${data}</div></div>`;
            } else  if (data === 'submit') {
                return `<div class="flex capitalize text-warning"><div class="whitespace-nowrap"><i data-tw-merge data-lucide="check" class="text-success"></i> ${data}</div></div>`;
            } else {
                return `<div class="flex capitalize text-danger"><div class="whitespace-nowrap">${data}</div></div>`;
            }
        }

        function formatDateToReadable(dateString) {
            // Create a new Date object from the input string
            const date = new Date(dateString);

            // Options for formatting the date
            const options = {
                weekday: 'long',  // Full day name
                year: 'numeric',  // Full year
                month: 'long',    // Full month name
                day: 'numeric'    // Day of the month
            };

            // Format the date using Intl.DateTimeFormat
            return new Intl.DateTimeFormat('id-ID', options).format(date);
        }

        function getStatus(data) {
            
            if (data === 'approved') {
                return `<div class="flex capitalize text-success"><div class="whitespace-nowrap"><i data-tw-merge data-lucide="check" class="text-success"></i> Approved</div></div>`;
            } else  if (data === 'submit') {
                return `<div class="flex capitalize text-warning"><div class="whitespace-nowrap"><i data-tw-merge data-lucide="check" class="text-success"></i> Submit</div></div>`;
            }else{
                return `<div class="flex capitalize text-danger"><div class="whitespace-nowrap"> Rejected</div></div>`;
            }
        }

        function initMap(value, target) {
            if (!value){
                return
            }
            let coordinates = value.split(',');
            let lat = coordinates[0];
            let long = coordinates[1];

            const mapOptions = {
                zoom: 16,
                center: { lat: parseFloat(lat), lng: parseFloat(long) },
                disableDefaultUI: false,
                scrollWheel: true,
                draggable: false
            };

            const map = new google.maps.Map(document.getElementById(target), mapOptions);

            const marker = new google.maps.Marker({
                position: mapOptions.center,
                map: map,
                draggable: false
            });
        }

        function approval(val){
            Swal.fire({
                    title: "Are you sure?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, "+val+" it!"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        //alert(val);
                        const data = {status : val };
                        try {
                            $.ajax({
                                url: "{{ $apiUrlApproval }}",
                                type: "PATCH",
                                contentType: 'application/json',
                                headers: {
                                    'Authorization': `Bearer ${appToken}`,
                                    'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`
                                },
                                data: JSON.stringify(data),
                                dataType: 'json',
                                success: function(response) {  
                                    if (response.success == true) {
                                        showSuccessNotification(response.message, "The operation was completed successfully.");
                                        setTimeout(() => {
                                            window.location= "{{ url('dashboard/hrms/attendance/request') }}";
                                        }, 800);
                                    } else {
                                        showErrorNotification('error', response.message);
                                    }
                                }
                            });

                             
                        } catch (xhr) {
                            showErrorNotification('error', xhr.responseText);
                        }
                         
                    }else{
                        
                    }
                });
        }

         
    </script>
@endpush
@include('vendor-common.sweetalert')
