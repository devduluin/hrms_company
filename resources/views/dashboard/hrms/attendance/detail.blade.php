@extends('layouts.dashboard.app')
@section('content')
<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
    @include('layouts.dashboard.menu')

    <div id="contents-page" class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
        <div class="container gap-y-5">
            <div class="flex flex-col gap-y-5 md:h-10 md:flex-row md:items-center">
                <div class="text-base font-medium">
                    Detail Attendance
                </div>
                <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                    <x-form.button id="back" label="Back to Summary" style="primary" icon="arrow-left" url="{{ url('dashboard/hrms/attendance/summary') }}" ></x-form.button>
                </div>
            </div>
            <div class="grid grid-cols-12 gap-x-6 gap-y-5 mt-3">
                {{-- <div class="box p-4 col-span-12">
                    <div>
                        <div id="employee_name" class="font-medium text-lg">
                           -
                        </div>
                        <div id="job">
                            Full Stack Developer
                        </div>
                    </div>
                </div> --}}
                <div class="box p-4 col-span-12">
                    <div class="mb-6 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
                        Personal Information
                    </div>
                    <div class=" grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 mt-4">
                        <div class="field">
                            <div>
                                <div id="label" class="text-s">
                                    First Name
                                </div>
                                <div id="first_name" class="text-m font-bold">
                                   -
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div>
                                <div id="label" class="text-m text-slate-300">
                                    Last Name
                                </div>
                                <div id="last_name" class="text-m font-bold">
                                    -
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div>
                                <div id="label" class="text-m">
                                    Email
                                </div>
                                <div id="personal_email" class="text-m font-bold">
                                    -
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div>
                                <div id="label" class="text-m">
                                    Phone
                                </div>
                                <div id="mobile_phone" class="text-m font-bold">
                                   -
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box p-4 col-span-12">
                    <div class=" mt-4 pb-5 text-[0.94rem] font-medium">
                        Attendance Details
                    </div>
                    <div id="attendance_date" class="ml-6 mb-6  p-2 text-xs font-regular bg-primary/10 text-primary rounded-2xl" style="display: inline-block ">
                        -
                    </div>
                    <div class="border-b border-dashed border-slate-300/70"></div>
                    <div class=" grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 mt-4">     
                        <div class=" grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 mt-2" id="checkin">
                            <div class="flex justify-center mt-4">
                                <img src="" alt=" Foto Absensi" style="width: 100px; height: 100px;" class="rounded-md shadow-md" />
                            </div>
                            <div class=" gap-5 ">
                                <div class="field ">
                                    <div id="field">
                                        <div id="label" class="text-m">
                                            Check in time
                                        </div>
                                        <div id="check_in" class="text-m font-bold">
                                            -
                                        </div>
                                    </div>
                                </div>
                                <div class="field mt-2">
                                    <div id="check_in">
                                        <div id="label" class="text-m">
                                            Status
                                        </div>
                                        <div id="status" class="text-m font-bold">
                                            -
                                        </div>
                                    </div>
                                </div>
                                <div class="field mt-2">
                                    <div>
                                        <div id="label" class="text-m">
                                            Check in Status
                                        </div>
                                        <div id="check_in_status" class="text-m font-bold">
                                            -
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 mt-4" id="checkin">
                            <div class="flex justify-center mt-4" id="photo">
                                <img src="" alt=" Foto Absensi" style="width: 100px; height: 100px;" class="rounded-md shadow-md" />
                            </div>
                            <div class=" gap-5 ">
                                <div class="field ">
                                    <div id="field">
                                        <div id="label" class="text-m">
                                            Check out time
                                        </div>
                                        <div id="check_out" class="text-m font-bold">
                                            17.03
                                        </div>
                                    </div>
                                </div>
                                <div class="field mt-2">
                                    <div id="check_out">
                                        <div id="label" class="text-m">
                                            Status
                                        </div>
                                        <div id="status" class="text-m font-bold">
                                            -
                                        </div>
                                    </div>
                                </div>
                                <div class="field mt-2">
                                    <div>
                                        <div id="label" class="text-m">
                                            Check out Status
                                        </div>
                                        <div id="check_out_status" class="text-m font-bold">
                                            -
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6 mt-6 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
                        Location
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 mt-4" id="evidence">
                        <div class="justify-center" id="map_checkin">
                            <div class="label mb-4">
                                Check in Location
                            </div>
                            <div id="map_checkin">
                                <img src="" alt="Map Checkout" style="width: 400px; height: 400px;" class="rounded-md shadow-md" />
                            </div>
                        </div>
                        <div class="justify-center" id="map_checkout">
                            <div class="label mb-4">
                                Check out Location
                            </div>
                            <div id="map_checkout">
                                <img src="" alt="Map Checkout" style="width: 400px; height: 400px;" class="rounded-md shadow-md" />
                            </div>
                        </div>
                    </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
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

                $('#employee_name').html(employee.first_name);
                $('#first_name').html(employee.first_name);
                $('#last_name').html(employee.last_name);
                $('#personal_email').html(employee.addressContact.personal_email);
                $('#mobile_phone').html(employee.addressContact.mobile_phone);

                $("#attendance_date").html(attendance.attendance_date);
                $("#check_in").html(attendance.time_in);
                $("#check_in_status").html(attendance.checkin_status);
                $("#check_out").html(attendance.time_out ? attendance.time_out : '-');
                $("#check_out_status").html(attendance.checkout_status);
                $("#status").html(attendance.attendance_status);
                $('#photo').html(`<img src="${attendance.photo_in}" alt=" photo" style="width: 100px; height: 100px;" class="rounded-md shadow-md" />`)
            }).catch((err) => {
                console.log(err);

            });
        }
    </script>
@endpush
