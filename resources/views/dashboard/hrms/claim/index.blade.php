@extends('layouts.dashboard.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<style>.show{display:block;}</style>
<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')
        <div id="contents-page" class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
            <div class="container">
                <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                    <div class="col-span-12">
                        <div class="mt-3.5 flex flex-col gap-8">
                            <div class="box box--stacked flex flex-col p-5">
                                <div class="grid grid-cols-3 gap-5">
                                    <div class="box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                        <div class="text-base text-slate-500">Expense Claims</div>
                                        <div class="mt-1.5 text-2xl font-medium text-right">457,204</div>
                                        <div class="col-2">
                                            <div class="flex justify-end gap-2">
                                                <div class="mt-2 flex rounded-full border border-danger/10 bg-danger/10 py-[2px] pl-[7px] pr-8 text-xs font-medium text-danger">
                                                    <i data-tw-merge="" data-lucide="arrow-down" class="ml-px mr-2 h-4 w-4 stroke-[1.5] side-menu__link_icon"></i>
                                                    3%
                                                </div>
                                                <div class="pt-3 whitespace-nowrap text-xs text-slate-500">
                                                    this month
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                        <div class="text-base text-slate-500">Approve Claims</div>
                                        <div class="mt-1.5 text-2xl font-medium text-right">122,721</div>
                                        <div class="col-2">
                                            <div class="flex justify-end gap-2">
                                                <div class="mt-2 flex items-left rounded-full border border-danger/10 bg-danger/10 py-[2px] pl-[7px] pr-8 text-xs font-medium text-danger">
                                                    <i data-tw-merge="" data-lucide="arrow-down" class=" flex ml-px h-4 w-4 stroke-[1.5] side-menu__link_icon"></i>
                                                    3%
                                                </div>
                                                <div class="pt-3 whitespace-nowrap text-xs text-slate-500">
                                                    this month
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                        <div class="text-base text-slate-500">Rejected Claims</div>
                                        <div class="font-mediumm mt-1.5 text-2xl text-right">489,223</div>
                                        <div class="col-2">
                                            <div class="flex justify-end gap-2">
                                                <div class="mt-2 flex items-left rounded-full border border-danger/10 bg-danger/10 py-[2px] pl-[7px] pr-8 text-xs font-medium text-danger">
                                                    <i data-tw-merge="" data-lucide="arrow-down" class="flex ml-px h-4 w-4 stroke-[1.5] side-menu__link_icon"></i>
                                                    3%
                                                </div>
                                                <div class="pt-3 whitespace-nowrap text-xs text-slate-500">
                                                    this month
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div class="flex flex-col box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                    <div class="flex items-center justify-between gap-10 sm:col-span-1">
                                        <div class="  flex pr-12">
                                            <div class="font-medium mt-1.5 text-xl">
                                                Expense Claims Frequency
                                            </div>
                                        </div>
                                        <div class="select-with-icon">
                                            <select data-tw-merge="" class="align-self-stretch ml-auto  flex flex-col gap-x-3 gap-y-2 sm:ml-auto sm:flex-row disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1 mt-2 flex-1">
                                                <option value="This Month">
                                                    This Month
                                                </option>
                                                <option value="Last Month">
                                                    Last Month
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex justify-content-center align-items-center">
                                    </div>
                                </div>
                                <div class="flex flex-col box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                    <div class="col-2 justify-content-between">
                                        <div class="flex justify-between items-center gap-10">
                                            <div class=" mr-auto flex pr-12">
                                                <div class="g-col-6 font-medium mt-1.5 text-xl">
                                                    Claims by Type
                                                </div>
                                            </div>
                                            <div class="select-with-icon">
                                                <select data-tw-merge="" class="align-self-stretch ml-auto  flex flex-col gap-x-3 gap-y-2 sm:ml-auto sm:flex-row disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1 mt-2 flex-1">
                                                    <option value="This Month">
                                                        This Month
                                                    </option>
                                                    <option value="Last Month">
                                                        Last Month
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex justify-content-center align-items-center">
                                            <canvas id="jobOfferStatusChart" class="jobOfferStatusChart" width="200" height="200"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5 mt-4">
                    <div class="text-left">
                        <a class="flex items-center" href="{{ url('/dashboard/hrms/claim/summary') }}">
                            <div class="font-medium mr-2">Expense Claim Summary</div>
                            <i data-tw-merge="" data-lucide="arrow-up-right" class="inline-block h-5 w-5 mr-2 stroke-[1] "></i>
                        </a>    
                    </div>
                    <div class="text-left">
                        <a class="flex items-center" href="">
                            <div class="font-medium mr-2">Add New Claim</div>
                            <i data-tw-merge="" data-lucide="arrow-up-right" class="inline-block h-5 w-5 mr-2 stroke-[1] "></i>
                        </a>    
                    </div>
                    <div class="text-left">
                        <a class="flex items-center" href="{{ url('/dashboard/hrms/claim/travel_request') }}">
                            <div class="font-medium mr-2">Add New Travel</div>
                            <i data-tw-merge="" data-lucide="arrow-up-right" class="inline-block h-5 w-5 mr-2 stroke-[1] "></i>
                        </a>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection