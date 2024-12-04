@extends('layouts.dashboard.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/tom-select.css') }}">
    <div
        class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.top_menu_min')

        <div
            class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
            <div class="container">
                <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                    <div class="col-span-12">
                        <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                            <div class="text-base font-medium group-[.mode--light]:text-white">
                            Hi {{ ucwords($user['name']) }}, Complete Your Registration Below !
                            </div>
                             
                        </div>
                        <div class="mt-3.5 grid grid-cols-12 gap-x-6 gap-y-10">
                             
                            <div id="contents-page" class="col-span-12 flex flex-col gap-y-7 xl:col-span-9">
                            
                            <form id="settingForm" method="post"  action="{{ url('auth/complete_company_register') }}">
                            @csrf
                               <div class="box box--stacked flex flex-col p-5">
                                <div class="mb-6 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
                                    {{ $page_title }}
                                </div>
                                <div>
                                    <div class="relative mb-4 mt-7 rounded-[0.6rem] border border-slate-200/80 dark:border-darkmode-400 bg-primary/[0.03]">
                                        <div class="absolute left-0 -mt-2 ml-4 bg-white px-3 text-xs uppercase text-slate-500">
                                            <div class="-mt-px">Duluin Gajian</div>
                                        </div>
                                        <div class="mt-4 flex flex-col gap-3.5 px-5 py-2">
                                            <div class="preview relative [&amp;.hide]:overflow-hidden [&amp;.hide]:h-0">
                                                <div class="y-2 mb-5">
                                                    <div class="flex items-center my-2">
                                                        <input type="checkbox" onchange="toggleCheckbox(this)" id="gajian_check" name="gajian_check" class="form-checkbox transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;[type='radio']]:checked:bg-primary [&amp;[type='radio']]:checked:border-primary [&amp;[type='radio']]:checked:border-opacity-10 [&amp;[type='checkbox']]:checked:bg-primary [&amp;[type='checkbox']]:checked:border-primary [&amp;[type='checkbox']]:checked:border-opacity-10 [&amp;:disabled:not(:checked)]:bg-slate-100 [&amp;:disabled:not(:checked)]:cursor-not-allowed [&amp;:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&amp;:disabled:checked]:opacity-70 [&amp;:disabled:checked]:cursor-not-allowed [&amp;:disabled:checked]:dark:bg-darkmode-800/50">

                                                        <label for="gajian_check" class="text-[0.94rem] font-medium ml-2 block text-gray-900">
                                                            Apakah perusahaan anda sudah menjadi partner Duluin Gajian ?
                                                        </label>
                                                            </div>
                                                    <div class="mt-1.5 mr-5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                                                        
                                                    </div>
                                                </div>
                                                <div class="py-2" id="gajian" hidden>
                                                    <div class="mt-5 block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                        <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                            <div class="text-left">
                                                                <div class="flex items-center">
                                                                    <div class="font-medium">Company Name</div>
                                                                     
                                                                </div>
                                                                <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                                                                    Please specify the company.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mt-3 w-full flex-1 xl:mt-0">
                                                            <select name="secondary_id" id="secondary_id" data-placeholder="Select your company" class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                                                                 
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>
                                                <p class="leading-relaxed text-warning">
                                                    Mengizinkan Duluin HRMS untuk mengakses data-data pada Platform Duluin Gajian.
                                                </p>
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="relative mb-4 mt-7 rounded-[0.6rem] border border-slate-200/80 dark:border-darkmode-400">
                                        <div class="absolute left-0 -mt-2 ml-4 bg-white px-3 text-xs uppercase text-slate-500">
                                            <div class="-mt-px"></div>
                                        </div>
                                        <div class="mt-4 flex flex-col gap-3.5 px-5 py-2">
                                            <div class="preview relative [&amp;.hide]:overflow-hidden [&amp;.hide]:h-0">
                                                
                                            
                                   

                                            <div class="mt-5 block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                    <div class="text-left">
                                                        <div class="flex items-center">
                                                            <div class="font-medium">Company Name</div>
                                                            <div
                                                                class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                                                Required
                                                            </div>
                                                        </div>
                                                        <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                                                            Enter the primary line of your company name.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-3 w-full flex-1 xl:mt-0">
                                                    <input type="hidden" name="user_id" value="{{ $user['id'] }}">
                                                    <input data-tw-merge="" name="company_name" type="text" placeholder="PT. XYZ "
                                                        class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                                                </div>
                                            </div>

                                            

                                            <div class="mt-5 block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                    <div class="text-left">
                                                        <div class="flex items-center">
                                                            <div class="font-medium">Default Currency</div>
                                                            <div
                                                                class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                                                Required
                                                            </div>
                                                        </div>
                                                        <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                                                            Please specify the default you currency.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-3 w-full flex-1 xl:mt-0">
                                                    <select name="default_currency" data-placeholder="Select your currency" class="tom-select disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                                                        <option value="IDR">
                                                            IDR
                                                        </option>
                                                    
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mt-5 block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                    <div class="text-left">
                                                        <div class="flex items-center">
                                                            <div class="font-medium">Language</div>
                                                            <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                                                Required
                                                            </div>
                                                        </div>
                                                        <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                                                            Select your preferred language from the available
                                                            options.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-3 w-full flex-1 xl:mt-0">
                                                    <select id="languageSelect" name="language" data-title="Language" data-placeholder="Select your language" class="tom-select disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                                                        <option value="en">
                                                            English
                                                        </option>
                                                        <option value="id">
                                                            Bahasa
                                                        </option> 
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mt-5 block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                    <div class="text-left">
                                                        <div class="flex items-center">
                                                            <div class="font-medium">Time Zone</div>
                                                            <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                                                Required
                                                            </div>
                                                        </div>
                                                        <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                                                            Select your current time zone from the list of
                                                            available options.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-3 w-full flex-1 xl:mt-0">
                                                    <select id="timezoneSelect" name="timezone" data-title="Time Zone" data-url="{{ url('dashboard/settings/timezone') }}" data-placeholder="Select your timezone" class="tom-select disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                                                        <option value="Asia/Jakarta">
                                                            Asia/Jakarta (WIB)
                                                        </option>
                                                        <option value="Asia/Ujung_Pandang">
                                                            Asia/Ujung_Pandang (WITA)
                                                        </option>
                                                        <option value="Asia/Jayapura">
                                                            Asia/Jayapura (WIT)
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mt-5 block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                    <div class="text-left">
                                                        <div class="flex items-center">
                                                            <div class="font-medium">Official Domain</div>
                                                            
                                                        </div>
                                                        <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                                                            Enter the official domain or website address.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-3 w-full flex-1 xl:mt-0">
                                                    <input data-tw-merge="" name="domain" type="text" placeholder="www.xyz.com"
                                                        class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                                                </div>
                                            </div>
                                            <div class="mt-5 block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                    <div class="text-left">
                                                        <div class="flex items-center">
                                                            <div class="font-medium">Date of Establishment</div>
                                                        </div>
                                                        <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                                                            This field is optional and can be used to provide date of establishment your company.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-3 w-full flex-1 xl:mt-0">
                                                    <input data-tw-merge="" name="date_of_establishment" type="date" placeholder="Y-m-d"
                                                        class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                                                </div>
                                            </div>
                                            
                                            <div class="block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                                <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                                                    <div class="text-left">
                                                        <div class="flex items-center">
                                                            <div class="font-medium">Address Line</div>
                                                            <div
                                                                class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                                                Required
                                                            </div>
                                                        </div>
                                                        <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                                                            Enter the primary line of physical address,
                                                            This location will be used to set distance of presensi employees.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-3 w-full flex-1 xl:mt-0">
                                                    <input id="latlong" name="latlong" type="hidden" />
                                                    <textarea name="address" id="start-search" data-tw-merge="" type="text" placeholder="Address Line"
                                                        class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10"></textarea>
                                                </div>
                                            </div>

                                            <div class="mt-6 flex border-t border-dashed border-slate-300/70 pt-5 md:justify-end">
                                            </div>
                                            <div id="map" style="height: 400px" class="mt-5 block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
                                            
                                                <div ></div>
                                            </div>

                                        </div>
                                        <div class="mt-6 flex border-t border-dashed border-slate-300/70 pt-5 md:justify-end">
                                        </div>
                                        <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                                            <button id="submitButton" data-tw-merge=""
                                                class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-blue-theme border-blue-theme text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200"><i
                                                    data-tw-merge="" data-lucide="external-link" class="mr-3 h-4 w-4 stroke-[1.3]"></i>
                                                <span id="loadingText">Complete Registration</span></button>
                                        </div>

                                        </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="{{ asset('dist/js/vendors/tom-select.js') }}"></script>
    <script src="{{ asset('dist/js/components/base/tom-select.js') }}"></script>
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7T5886HCdj0jMOWhW_aliRYP6NUnjSzE&loading=async&libraries=places&libraries=marker&region=id&callback=initialize&v=weekly"></script>
    <script>

    function toggleCheckbox(elm) {
        if(elm.checked){
            $('#gajian').attr('hidden', false);
            $.ajax({
                url: 'https://dashboard.duluin.com/api/meta/companies',
                 
                type: 'GET',
                dataType: 'JSON',
                success: function(response) {
                    let html = '';
                    if (response.data.length == 0) {
                        html += '<option value="">ID tidak ditemukan</option>';
                    } else {
                       // $('select[name=company_id]').attr('disabled', false);

                        html += '<option selected value="">Select your company</option>';
                        $.each(response.data, function(k, v) {
                            html += '<option value="' + v.company_id + '">';
                            html += v.company_name.toUpperCase();
                            html += '</option>';
                        })
                    }

                    $('select[name=secondary_id]').html(html);
                }
            })
        }else{
            $('#gajian').attr('hidden', true);
            $('input[name=company_name]').val('');
        }
    }

    $("#secondary_id").on('change', function() {
        let secondary_id = $(this).val();
        let company_name = $("#secondary_id option:selected").text();

        if(secondary_id){
            $('input[name=company_name]').val(company_name);
        }else{
            $('input[name=company_name]').val('');
        }
         
    });

    async function initialize() {
        await google.maps.importLibrary("places");
        await google.maps.importLibrary("marker")
        let mapOptions, map, marker, searchBox, infoWindow = '',
            addressEl = document.getElementById('start-search'),
            element = document.getElementById('map'),
            latLong = document.getElementById('latlong');
            

        mapOptions = {
            zoom: 5,
            center: new google.maps.LatLng(-2.2496319, 109.9386476),
            disableDefaultUI: false,
            scrollWheel: true,
            draggable: true,
            mapId: 'e325f37817b4c9e2'
        };

        map = new google.maps.Map(element, mapOptions);

        marker = new google.maps.marker.AdvancedMarkerElement({
            position: null,
            map: map,
            gmpDraggable: true,
        });

        const options = {
            bounds: new google.maps.LatLngBounds(),
            componentRestrictions: { country: "id" }
        };

        searchBox = new google.maps.places.Autocomplete(addressEl, options);

        searchBox.addListener('place_changed', function () {
            let places = searchBox.getPlace(),
                bounds = new google.maps.LatLngBounds(),
                lat = places.geometry.location.lat(),
                long = places.geometry.location.lng();

            bounds.extend(places.geometry.location);
            marker.position = places.geometry.location;
            map.fitBounds(bounds);
            map.setZoom(15);
            latLong.value = `${lat},${long}`;
        });

        marker.addListener("dragend", function (event) {
            const position = marker.position;
             
            let lat = position.lat,
                long = position.lng

            let geocoder = new google.maps.Geocoder();
            geocoder.geocode({ latLng: marker.position }, function (results, status) {
                if (status === google.maps.GeocoderStatus.OK && results[0]) {
                    let address = results[0].formatted_address;
                    let pin = results[0].address_components[results[0].address_components.length - 1].long_name;
                    addressEl.value = address;
                    latLong.value = `${lat},${long}`;
                    
                    if (infoWindow) infoWindow.close();
                    infoWindow = new google.maps.InfoWindow({ content: address });
                    infoWindow.open(map, marker);
                }
            });
        });

    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };

          map.setCenter(pos);
		  marker.setPosition(pos);
		  map.setZoom(15);
		 
		lat = position.coords.latitude;
        long = position.coords.longitude;

        let geocoder = new google.maps.Geocoder();
        geocoder.geocode({ latLng: marker.getPosition() }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {  // This line can also be written like if ( status == google.maps.GeocoderStatus.OK ) {
                if (results[0]) {
                    var address = results[0].formatted_address;
                    var pin =
                        results[0].address_components[
                            results[0].address_components.length - 1
                        ].long_name;
                }
                addressEl.value = address;
                latLong.value = lat + ',' + long;
                posCode.value = pin

            } else {
                console.log('Geocode was not successful for the following reason: ' + status);
            }

            
            if (infoWindow) {
                infoWindow.close();
            }
 
            infoWindow = new google.maps.InfoWindow({
                content: 'Geser sesuai titik anda berada'
            });

            setTimeout(() => {infoWindow.open(map, marker);}, 1000);
			setTimeout(() => {infoWindow.close();}, 4000);
             
        });
		 
        },
        () => {
          
        }
      );
    } else {
      
      handleLocationError(false, infoWindow, map.getCenter());
    }
    }
</script>

    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const submitButton = document.getElementById("submitButton");

        function initializeForm() {
            const form = document.getElementById('settingForm');
            const loadingText = document.getElementById('loadingText');
        
            async function handleSubmit(event) {
                event.preventDefault();
                // Change button state to loading
                submitButton.disabled = true;
                loadingText.innerHTML = 'Saving...'; // Optionally add a class for styling

                // Trigger form validation
                if (!form.reportValidity()) {
                    // If form is invalid, stop the submission
                    submitButton.disabled = false;
                    loadingText.innerHTML = 'Complete Registration';
                    return;
                }
                const formData = new FormData(form);
                const data = Object.fromEntries(formData.entries());

                try {
                    const response = await fetch(form.action, {
                        method: 'POST',
                        body: JSON.stringify(data),
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': 'Bearer {{ $token }}'
                        }
                    });

                    const result = await response.json();

                    if (response.ok) {
                        localStorage.setItem('company', result.company_id);
                        window.location.href = result.url;
                    } else {
                        showErrorNotification('error', result.message);
                         
                    }
                } catch (error) {
                    console.error('Error submitting form', error);
                } finally {
                    // Restore button state
                    submitButton.disabled = false;
                    loadingText.innerHTML = 'Complete Registration';
                }
            }

            // Prevent the form from submitting normally
            if (form) submitButton.addEventListener('click', handleSubmit);
        }
        initializeForm();
        initializeTomSelect();
    </script>
    
@endsection
