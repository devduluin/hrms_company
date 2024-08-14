@extends('layouts.dashboard.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('dist/css/vendors/tom-select.css') }}">

<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
    @include('layouts.dashboard.menu')        
    <div id="contents-page" class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
        <div class="container">
            <div class="flex flex-col mb-4 gap-y-3 md:h-10 md:flex-row md:items-center">
                <div class="text-base font-medium group-[.mode--light]:text-white">
                    {{ $data['page_title'] }}
                </div>
                <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                <button id="submitButton" data-tw-merge="" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-blue-theme border-blue-theme text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200"><i data-tw-merge="" data-lucide="external-link" class="mr-3 h-4 w-4 stroke-[1.3]"></i>
                <span id="loadingText">Save Changes</span></button>
                </div>
            </div>  
            <div class="mt-1.5 flex flex-col">
                <div class="box box--stacked flex flex-col p-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-4">
                    <div class="mt-2 flex-row xl:items-center">
                        <div class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-4 xl:w-60">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Applicant Name</div>
                                    <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                        Required
                                    </div>
                                </div>
                                <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="flex-1 sm:w-full  w-80 mt-3 xl:mt-0">
                            <input data-tw-merge="" type="text" placeholder="Product name" class="flex disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                            <div data-tw-merge="" class="text-xs text-slate-500 mt-2">
                                Maximum character 0/70
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 flex-row xl:items-center">
                        <div class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-4 xl:w-60">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Job Opening</div>
                                    <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                        Required
                                    </div>
                                </div>
                                <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="flex-1 sm:w-full w-80 mt-3 xl:mt-0">
                            <input data-tw-merge="" type="text" placeholder="Product name" class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                            <div data-tw-merge="" class="text-xs text-slate-500 mt-2">
                                Maximum character 0/70
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 flex-row xl:items-center">
                        <div class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-4 xl:w-60">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Email Address</div>
                                    <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                        Required
                                    </div>
                                </div>
                                <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="flex-1 sm:w-full w-80 mt-3 xl:mt-0 ">
                            <input data-tw-merge="" type="email" placeholder="example@gmail.com" class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                            <div data-tw-merge="" class="text-xs text-slate-500 mt-2">
                                Maximum character 0/70
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 flex-row xl:items-center">
                        <div class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-4 xl:w-60">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Designation</div>
                                    <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                        Required
                                    </div>
                                </div>
                                <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                                
                                </div>
                            </div>
                        </div>
                        <div class="flex-1 sm:w-full  w-80 mt-3 xl:mt-0">
                        <select data-placeholder="Designation" data-title="Designation" data-url="{{ url('dashboard/hrms/designation') }}" class="tom-select w-full">
                                <option value="0">
                                    Toys & Games
                                </option>
                                <option value="1">
                                    Food & Grocery
                                </option>
                                <option value="2">
                                    Books
                                </option>
                                <option value="3">
                                    Electronics
                                </option>
                                <option value="4">
                                    Home & Garden
                                </option>
                                <option value="5">
                                    Furniture
                                </option>
                                <option value="6">
                                    Sports & Outdoors
                                </option>
                                <option value="7">
                                    Beauty & Personal Care
                                </option>
                                <option value="8">
                                    Jewelry
                                </option>
                                <option value="9">
                                    Clothing
                                </option>
                            </select>
                            <div class="mt-1.5 mr-5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                                    Choose a more specific subcategory that closely
                                    matches your designation. 
                                </div>
                        </div>
                    </div>
                    <div class="mt-2 flex-row xl:items-center">
                        <div class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-4 xl:w-60">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Phone Number</div>
                                    <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                        Required
                                    </div>
                                </div>
                                <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="flex-1 sm:w-full  w-80 mt-3 xl:mt-0">
                            <input data-tw-merge="" type="number" placeholder="" class="flex disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                            <div data-tw-merge="" class="text-xs text-slate-500 mt-2">
                                Maximum character 0/70
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 flex-row xl:items-center">
                        <div class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-4 xl:w-60">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Status</div>
                                    <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                        Required
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex-1 sm:w-full  w-80 mt-3 xl:mt-0">
                            <select data-placeholder="Status" data-title="Status" data-url="{{ url('dashboard/hrms/Status') }}" class="tom-select w-full">
                                    <option value="0">
                                        Inactive
                                    </option>
                                    <option value="1">
                                        Suspended
                                    </option>
                                    <option value="2">
                                        Left
                                    </option> 
                            </select>
                            <div class="mt-1.5 mr-5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                                    Choose a more specific subcategory that closely
                                    matches your designation. 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container mt-8 ">
                    <label class="block text-sm font-medium text-gray-700">Resume</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-blue-500" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M4 36V12a8 8 0 018-8h24a8 8 0 018 8v24a8 8 0 01-8 8H12a8 8 0 01-8-8z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M14 22l10-10m0 0l10 10m-10-10v18" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex justify-center items-center text-sm text-gray-600"">
                                    <span class="mx-1">Drag & drop files or</span>
                                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                        <span class="ml-auto">Browse</span>
                                        <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                    </label>
                                </div>
                                <p class="text-xs text-gray-500">
                                    Supported formats: pdf, jpg, gif, doc, docx, csv
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>  
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('dist/js/vendors/tab.js') }}"></script> 
<script src="{{ asset('dist/js/vendors/tom-select.js') }}"></script>
<script src="{{ asset('dist/js/components/base/tom-select.js') }}"></script> 
<script>
    initializeTomSelect();
</script>

