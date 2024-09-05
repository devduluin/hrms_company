@extends('layouts.dashboard.app')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/tom-select.css') }}">

    <div
        class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')
        <div id="contents-page"
            class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
            <div class="container">
                <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                    <div class="col-span-12">
                        <div class=" flex flex-col mb-4 gap-x-3 md:h-10 md:flex-row md:items-center ">
                            <div class="text-base font-medium group-[.mode--light]:text-white">
                                {{ $page_title }}
                            </div>
                            <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                                <x-form.button label="Save changes" id="save-btn" style="primary" type="submit"
                                    icon="save" />
                            </div>
                        </div>
                        <div class="mt-1.5 flex flex-col">
                            <div class="box box--stacked flex flex-col p-5">
                                <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-3 gap-5 ">
                                    <x-form.input id="employee_name" label="Employee Name" name="employee_name" required />
                                    <x-form.datepicker id="claim_date" label="Claim Date" name="claim_date" required />
                                    <x-form.input id="company" label="Company" name="company" required />
                                </div>
                                <div class="grid grid-cols-2 gap-5 mt-4">

                                </div>
                                <div class="mb-6 mt-4 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
                                    Benefit
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5">
                                    <x-form.input id="reason" label="Claim Benefit For" name="reason" required />
                                    <x-form.input id="claimed_amount" label="Claim Amount" name="claimed_amount" required />
                                </div>
                                <div class="grid grid-cols-2 gap-5 mt-4">

                                </div>
                                <div class="mb-6 mt-4 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
                                    Expense Proof
                                </div>
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-blue-500" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M4 36V12a8 8 0 018-8h24a8 8 0 018 8v24a8 8 0 01-8 8H12a8 8 0 01-8-8z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M14 22l10-10m0 0l10 10m-10-10v18" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex justify-center items-center text-sm text-gray-600"">
                                        <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                            <span class="ml-auto">Upload File</span>
                                            <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                        </label>
                                    </div>
                                    <p class="text-xs text-gray-500">
                                        Supported formats: jpg
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection