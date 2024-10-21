@extends('layouts.dashboard.app')
@section('content')
<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
    @include('layouts.dashboard.menu')

    <div id="contents-page" class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
        <div class="container gap-y-5">
            <div class="flex flex-col gap-y-5 md:h-10 md:flex-row md:items-center">
                <div class="text-base font-medium">
                    Attendance
                </div>
                <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                    <a href="{{ route('hrms.attendance.summary') }}" type="button" class="btn btn-primary transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary shadow-md w-100">
                        <svg class="mr-2 h-4 w-4 stroke-[1.3]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
                        Back</a>
                </div>
            </div>
            <div class="mt-3.5 grid grid-cols-10 gap-5">
                <div class="col-span-12 xl:col-span-3">
                    <div class="box flex flex-col p-5">
                        <div class="flex flex-col gap-5">
                            <div class="relative mt-3 rounded-[0.6rem] border border-slate-200/80 dark:border-darkmode-400">
                                <div class="absolute left-0 -mt-2 ml-4 bg-white px-3 text-xs uppercase text-slate-500">
                                    <div class="-mt-px">Photo chekin</div>
                                </div>
                                <div class="mt-2.5 flex flex-col p-4">
                                    <div class="flex items-center">
                                        <div class="flex" id="photo_in">
                                            <img src="" alt=" Foto Absensi" class="rounded-md shadow-md" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 flex flex-col gap-7 xl:col-span-7">
                    <div class="box flex flex-col p-5">
                        <div class="relative mt-3 rounded-[0.6rem] border border-slate-200/80 dark:border-darkmode-400">
                            <div class="absolute left-0 -mt-2 ml-4 bg-white px-3 text-xs uppercase text-slate-500">
                                <div class="-mt-px">Employee Details</div>
                            </div>
                            <div class="mt-2.5 flex flex-col gap-5 p-5">
                                <div class="overflow-auto xl:overflow-visible">
                                    <table class="w-full text-left border-b border-dashed border-slate-200/80">
                                        <tbody>
                                            <tr class="[&amp;_td]:first:pt-5 [&amp;_td]:last:border-b-0 [&amp;_td]:last:pb-5">
                                                <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                    <div class="flex items-center">
                                                        <p class="whitespace-nowrap font-medium" href="#">
                                                           <span class="font-bold">ID:</span> <span id="employeeId">-</span>
                                                        </p>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="[&amp;_td]:first:pt-5 [&amp;_td]:last:border-b-0 [&amp;_td]:last:pb-5">
                                                <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                    <div class="flex items-center">
                                                        <p class="whitespace-nowrap font-medium" href="#">
                                                           <span class="font-bold">Name:</span> <span id="name">-</span>
                                                        </p>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="[&amp;_td]:first:pt-5 [&amp;_td]:last:border-b-0 [&amp;_td]:last:pb-5">
                                                <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                    <div class="flex items-center">
                                                        <p class="whitespace-nowrap font-medium" href="#">
                                                           <span class="font-bold">Email:</span> <span id="email">-</span>
                                                        </p>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="[&amp;_td]:first:pt-5 [&amp;_td]:last:border-b-0 [&amp;_td]:last:pb-5">
                                                <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                    <div class="flex items-center">
                                                        <p class="whitespace-nowrap font-medium" href="#">
                                                           <span class="font-bold">Mobile Phone:</span> <span id="phone">-</span>
                                                        </p>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box flex flex-col p-5">
                        <div class="relative rounded-[0.6rem] border border-slate-200/80 dark:border-darkmode-400">
                            <div class="absolute left-0 -mt-2 ml-4 bg-white px-3 text-xs uppercase text-slate-500">
                                <div class="-mt-px">Attendance Details</div>
                            </div>
                            <div class="mt-2.5 flex flex-col gap-5 p-5">
                                <div class="overflow-auto xl:overflow-visible">
                                    <table class="w-full text-left border-b border-dashed border-slate-200/80">
                                        <tbody>
                                            <tr class="[&amp;_td]:first:pt-5 [&amp;_td]:last:border-b-0 [&amp;_td]:last:pb-5">
                                                <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                    <div class="flex items-center">
                                                        <p class="whitespace-nowrap font-medium" href="#">
                                                           <span class="font-bold">Attendance Date:</span> <span id="attendance_date">-</span>
                                                        </p>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="[&amp;_td]:first:pt-5 [&amp;_td]:last:border-b-0 [&amp;_td]:last:pb-5">
                                                <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                    <div class="flex items-center">
                                                        <p class="whitespace-nowrap font-medium" href="#">
                                                           <span class="font-bold">Attendance Status:</span> <span id="attendance_status">-</span>
                                                        </p>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="[&amp;_td]:first:pt-5 [&amp;_td]:last:border-b-0 [&amp;_td]:last:pb-5">
                                                <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                    <div class="flex items-center">
                                                        <p class="whitespace-nowrap font-medium" href="#">
                                                           <span class="font-bold">Checkin Time:</span> <span id="check_in">-</span>
                                                        </p>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="[&amp;_td]:first:pt-5 [&amp;_td]:last:border-b-0 [&amp;_td]:last:pb-5">
                                                <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                    <div class="flex items-center">
                                                        <p class="whitespace-nowrap font-medium" href="#">
                                                           <span class="font-bold">Check in status:</span> <span id="check_in_status">-</span>
                                                        </p>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="[&amp;_td]:first:pt-5 [&amp;_td]:last:border-b-0 [&amp;_td]:last:pb-5">
                                                <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                    <div class="flex items-center">
                                                        <p class="whitespace-nowrap font-medium" href="#">
                                                           <span class="font-bold">Lat long:</span> <span id="latlong">-</span>
                                                        </p>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="[&amp;_td]:first:pt-5 [&amp;_td]:last:border-b-0 [&amp;_td]:last:pb-5">
                                                <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                    <div class="flex items-center">
                                                        <div id="map" style="height: 400px; width: 100%;"></div>
                                                    </div>
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

        async function getPersonalEmployee()
        {
            var param = {
                url: "{{ $apiUrl }}",
                method: "GET",
            }

            await transAjax(param).then((result) => {
                let employee = result.data.employee_id_rel;
                let attendance = result.data;

                console.log(attendance);

                $('#employeeId').html(employee.employee_id);
                $('#name').html(employee.first_name + ' ' + employee.last_name);
                $('#email').html(employee.addressContact.personal_email);
                $('#phone').html(employee.addressContact.mobile_phone);

                $("#attendance_date").html(attendance.attendance_date);
                $("#check_in").html(attendance.time_in);
                $("#attendance_status").html(attendance.attendance_status);
                $("#check_in_status").html(attendance.checkin_status);
                $("#latlong").html(attendance.latlong_in);
                $('#photo_in').html(`<img src="${attendance.photo_in}" alt="photo" style="width: 100%; hegight:50%;" class="rounded-md shadow-md" />`)
                initMap(attendance.latlong_in);
            }).catch((err) => {
                console.log(err);
            });
        }

        function initMap(value) {

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

            const map = new google.maps.Map(document.getElementById('map'), mapOptions);

            const marker = new google.maps.Marker({
                position: mapOptions.center,
                map: map,
                draggable: false
            });
        }
    </script>
@endpush
