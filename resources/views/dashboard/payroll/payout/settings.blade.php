@extends('layouts.dashboard.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/tom-select.css') }}">
    <div
        class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')
        <div id="contents-page"
            class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
            <div class="container bpx">
                <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                    <div class="col-span-12">
                        <div class=" flex flex-col mb-4 gap-x-3 md:h-10 md:flex-row md:items-center ">
                            <div class="text-base font-medium group-[.mode--light]:text-white">
                                {{ $page_title }}
                            </div>
                            <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                                <x-form.button label="Save changes" id="save-btn" style="primary" type="submit" icon="save" />
                            </div>
                        </div>
                        <div class="box box--stacked flex flex-col p-5">
                            <form id="overview-form" method="post" action="">
                                @csrf
                                <div class="mb-6 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
                                   Working Days and Hours
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-4">
                                    <x-form.input id="max_work_hour" label="Max working hours against Timesheet" name="max_work_hour" required />
                                    <x-form.input id="daily_salary" label="Fraction of Daily Salary for Half Day" name="daily_salary" required />
                                    <x-checkbox id="deduct_for_exemption_proof" label="Include holidays in Total no of Working Days" name="deduct_for_exemption_proof" guidelines="If checked, total no. of working days will include holidays, and this will reduce the value of Salary Per Day" />
                                    <x-checkbox id="deduct_for_exemption_proof" label="Consider Marked Attendance on Holidays" name="deduct_for_exemption_proof" guidelines="If checked, deduct payment days for absent attendance on holidays. By default, holidays are considered as paid" />
                                </div>
                                <div class="grid grid-cols-2 gap-5 mt-4">

                                </div>
                                <div class="mb-6 mt-4 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
                                    Salary Slip
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-4">
                                    <x-checkbox id="disable_rounded_total" label="Disabled Rounded Total" name="disable_rounded_total" guidelines="If checked, hides and disables Rounded Total Field in Salary Slip" />
                                    <x-checkbox id="show_leave_balance" label="Show Leave Balances in Salary Slip" name="show_leave_balance" />
                                </div>

                                <div class="grid grid-cols-2 gap-5 mt-4">
                            </form>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
@endsection

