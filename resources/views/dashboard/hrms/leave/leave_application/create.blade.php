@extends('layouts.dashboard.app')
@section('content')
    <div
        class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')
        <div id="contents-page"
            class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
            <div class="container">
                <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                    <div class="col-span-12">
                        <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                            <div class="text-base font-medium group-[.mode--light]:text-white">
                                {{ $page_title }}
                            </div>
                            <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                                <x-form.button label="Save changes" id="earning-btn" style="primary" type="button" icon="save" />
                            </div>
                        </div>
                        <div class="mt-3.5 flex flex-col gap-8">
                            <div class="box box--stacked flex flex-col">
                                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-2 p-4">
                                    <x-form.input id="series" label="Series" name="series" required />
                                    <x-form.select name="type" id="leave_type" label="Leave Type" class="tom-select w-full"
                                        data-placeholder="Select Type" url="{{ url('dashboard/hrms/leave_type') }}" required>
                                        <option value="earning">Sakit</option>
                                        <option value="deduction">Casual</option>
                                    </x-form.select>
                                    <x-form.input id="employee" label="Employee" name="employee" required />                               
                                    <x-form.input id="company" label="Company" name="company" required />
                                </div>
                                <div class="ml-4  mt-4 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
                                    Dates & Reason
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 p-4">
                                    <div>
                                        <x-form.input id="from_date" label="From Date" name="from_date" required />
                                        <x-form.input id="_date" label="To Date" name="to_date" required />
                                    </div>
                                    <div>
                                        <x-form.textarea id="reason" label="Reason" name="reason" required />   
                                    </div>
                                </div>
                                <div class="ml-4 mt-4 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
                                    Approval
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-2 p-4">
                                    <x-form.input id="leave_approver" label="Leave Approver" name="leave_approver" required />
                                    <x-form.datepicker id="date_of_establishment" label="Date Of Establishment" name="date_of_establishment" required />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection