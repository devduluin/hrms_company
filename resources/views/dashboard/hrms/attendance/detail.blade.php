@extends('layouts.dashboard.app')
@section('content')
<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
    @include('layouts.dashboard.menu')

    <div id="contents-page" class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
        <div class="container gap-y-5">
            <div class="flex flex-col gap-y-5 md:h-10 md:flex-row md:items-center">
                <div class="text-base font-medium">
                {{ $page_title ?? '' }}
                </div>
                <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                <button onclick="history.go(-1)"
                            class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md w-24">
                            <i data-tw-merge="" data-lucide="arrow-left" class="mr-3 h-4 w-4 stroke-[1.3]"></i> Back
                        </button>
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
                    <div class="box flex flex-col p-5 mt-5">
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
                </div>
                <div class="col-span-12 flex flex-col gap-7 xl:col-span-7">
                    
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
                                                <p class="whitespace-nowrap font-bold">Attendance Date</p>
                                            </td>
                                            <td class="px-1 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">:</td>
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p id="attendance_date">-</p>
                                            </td>
                                        </tr>
                                        <tr class="[&amp;_td]:first:pt-5 [&amp;_td]:last:border-b-0 [&amp;_td]:last:pb-5">
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p class="whitespace-nowrap font-bold">Attendance Status</p>
                                            </td>
                                            <td class="px-1 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">:</td>
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p id="attendance_status">-</p>
                                            </td>
                                        </tr>
                                        <tr class="[&amp;_td]:first:pt-5 [&amp;_td]:last:border-b-0 [&amp;_td]:last:pb-5">
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p class="whitespace-nowrap font-bold">Checkin Time</p>
                                            </td>
                                            <td class="px-1 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">:</td>
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p id="check_in">-</p>
                                            </td>
                                        </tr>
                                        <tr class="[&amp;_td]:first:pt-5 [&amp;_td]:last:border-b-0 [&amp;_td]:last:pb-5">
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p class="whitespace-nowrap font-bold">Checkout Time</p>
                                            </td>
                                            <td class="px-1 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">:</td>
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p id="check_out">-</p>
                                            </td>
                                        </tr>
                                        <tr class="[&amp;_td]:first:pt-5 [&amp;_td]:last:border-b-0 [&amp;_td]:last:pb-5">
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p class="whitespace-nowrap font-bold">Check-in Status</p>
                                            </td>
                                            <td class="px-1 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">:</td>
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p id="check_in_status">-</p>
                                            </td>
                                        </tr>
                                        <tr class="[&amp;_td]:first:pt-5 [&amp;_td]:last:border-b-0 [&amp;_td]:last:pb-5">
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p class="whitespace-nowrap font-bold">Lat long</p>
                                            </td>
                                            <td class="px-1 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">:</td>
                                            <td class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
                                                <p id="latlong">-</p>
                                            </td>
                                        </tr>
                                        <tr class="[&amp;_td]:first:pt-5 [&amp;_td]:last:border-b-0 [&amp;_td]:last:pb-5">
                                            <td colspan="3" class="px-2 border-b dark:border-darkmode-300 border-dashed py-3.5 dark:bg-darkmode-600">
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
                $("#check_out").html(attendance.time_out);
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
