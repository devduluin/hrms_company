@extends('layouts.dashboard.app') 
@section('content')
<link rel="stylesheet" href="{{ asset('dist/css/vendors/tom-select.css') }}">

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
            <div class="grid grid-cols-12 gap-x-6 gap-y-5">
                <div class="box p-4 col-span-12">
                    <div>
                        <div id="employee_name" class="font-medium text-lg">
                            Muahammad Idris
                        </div>
                        <div id="job">
                            Full Stack Developer
                        </div>
                    </div>
                </div>
                <div class="box p-4 col-span-12">
                    <div class="mb-6 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
                        Personal Information
                    </div>
                    <div class=" grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 mt-4">
                        <div class="field">
                            <div id="first_name">
                                <div id="label" class="text-s">
                                    First Name
                                </div>
                                <div id="description" class="text-m font-bold">
                                    Muhammad
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div id="first_name">
                                <div id="label" class="text-m text-slate-300">
                                    Last Name
                                </div>
                                <div id="description" class="text-m font-bold">
                                    Idris
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div id="first_name">
                                <div id="label" class="text-m">
                                    Email
                                </div>
                                <div id="description" class="text-m font-bold">
                                    idris@duluin.com
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div id="first_name">
                                <div id="label" class="text-m">
                                    Phone
                                </div>
                                <div id="description" class="text-m font-bold">
                                    08128923
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box p-4 col-span-12">
                    <div class="mb-6 mt-4 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
                        Attendance Details
                    </div>
                    <div class="flex justify-center">
                        <img src="" alt=" Foto Absensi" style="width: 100px; height: 100px;" class="rounded-md shadow-md" />
                    </div>
                    <div class=" grid grid-cols-1 md:grid-cols-3 xl:grid-cols-4 gap-5 mt-4">
                        <div class="field my-4">
                            <div id="check_in">
                                <div id="label" class="text-m">
                                    Check in time
                                </div>
                                <div id="description" class="text-m font-bold">
                                    09.30
                                </div>
                            </div>
                        </div>
                        <div class="field my-4">
                            <div id="check_out">
                                <div id="label" class="text-m">
                                    Check out time
                                </div>
                                <div id="description" class="text-m font-bold">
                                    17.03
                                </div>
                            </div>
                        </div>
                        <div class="field my-4">
                            <div id="check_in">
                                <div id="label" class="text-m">
                                    Status
                                </div>
                                <div id="description" class="text-m font-bold">
                                    WFO
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<script>
    initializeTomSelect();
</script>

@endsection