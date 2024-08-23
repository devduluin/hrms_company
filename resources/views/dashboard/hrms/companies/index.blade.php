@extends('layouts.dashboard.app')
@section('content')

<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')
       
        
        <div id="contents-page" class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
            <div class="container">
                <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                    <div class="col-span-12">
                        <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                            <div class="text-base font-medium group-[.mode--light]:text-white">
                                {{ $title }}
                            </div>
                            <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                                <a href="{{ route('hrms.company.create') }}" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="plus" class="lucide lucide-plus stroke-[1] w-5 h-5 mx-auto block"><path d="M5 12h14"></path><path d="M12 5v14"></path></svg>
                                    Add New Company</a>
                            </div>
                        </div>
                        <div class="mt-3.5">
                            <div class="box box--stacked flex flex-col">
                                <div class="flex flex-col gap-y-2 p-5 sm:flex-row sm:items-center">
                                    <div>
                                        <div class="relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="search" class="lucide lucide-search absolute inset-y-0 left-0 z-10 my-auto ml-3 h-4 w-4 stroke-[1.3] text-slate-500"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></svg>
                                            <input type="text" placeholder="Search company..." class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 rounded-[0.5rem] pl-9 sm:w-64">
                                        </div>
                                    </div>
                                </div>
                                <div class="overflow-hidden">
                                    <div class="-mx-5 grid grid-cols-12 border-y border-dashed px-5">
                                        <div class="col-span-12 flex flex-col border-b border-r border-dashed border-slate-300/80 px-5 py-5 sm:col-span-6 xl:col-span-3 [&amp;:nth-child(4n)]:border-r-0 [&amp;:nth-last-child(-n+4)]:border-b-0">
                                            <div class="image-fit h-52 overflow-hidden rounded-lg before:absolute before:left-0 before:top-0 before:z-10 before:block before:h-full before:w-full  before:from-slate-900/90 before:to-black/20">
                                                <img class="rounded-md" src="{{ asset('img/logo/duluin.jpg') }}" alt="Tailwise - Admin Dashboard Template">
                                            </div>
                                            <div class="pt-5">
                                                <div class="mb-5 mt-auto flex flex-col gap-3.5 border-b border-dashed border-slate-300/70 pb-5">
                                                    <div class="flex items-center">
                                                        <div class="text-base font-medium">DULUIN</div>
                                                        <div class="ml-auto">
                                                            <div class="flex items-center rounded-md border border-success/10 bg-success/10 px-1.5 py-px text-xs font-medium text-success">
                                                                <span class="-mt-px">
                                                                    Active
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex items-center">
                                                    <a class="mr-auto flex items-center text-primary" href="{{ route('hrms.company.show') }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="kanban-square" class="lucide lucide-kanban-square mr-1.5 h-4 w-4 stroke-[1.3]"><rect width="18" height="18" x="3" y="3" rx="2"></rect><path d="M8 7v7"></path><path d="M12 7v4"></path><path d="M16 7v9"></path></svg>
                                                        Preview
                                                    </a>
                                                    <a class="mr-3 flex items-center" href="#">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="check-square" class="lucide lucide-check-square mr-1.5 h-4 w-4 stroke-[1.3]"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                                        Edit
                                                    </a>
                                                    <a class="flex items-center text-danger" href="#">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="trash2" class="lucide lucide-trash2 mr-1.5 h-4 w-4 stroke-[1.3]"><path d="M3 6h18"></path><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path><line x1="10" x2="10" y1="11" y2="17"></line><line x1="14" x2="14" y1="11" y2="17"></line></svg>
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-span-12 flex flex-col border-b border-r border-dashed border-slate-300/80 px-5 py-5 sm:col-span-6 xl:col-span-3 [&amp;:nth-child(4n)]:border-r-0 [&amp;:nth-last-child(-n+4)]:border-b-0">
                                            <div class="image-fit h-52 overflow-hidden rounded-lg before:absolute before:left-0 before:top-0 before:z-10 before:block before:h-full before:w-full  before:from-slate-900/90 before:to-black/20">
                                                <img class="rounded-md" src="{{ asset('img/logo/duluin.jpg') }}" alt="Tailwise - Admin Dashboard Template">
                                            </div>
                                            <div class="pt-5">
                                                <div class="mb-5 mt-auto flex flex-col gap-3.5 border-b border-dashed border-slate-300/70 pb-5">
                                                    <div class="flex items-center">
                                                        <div class="text-base font-medium">DULUIN</div>
                                                        <div class="ml-auto">
                                                            <div class="flex items-center rounded-md border border-success/10 bg-success/10 px-1.5 py-px text-xs font-medium text-success">
                                                                <span class="-mt-px">
                                                                    Active
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex items-center">
                                                    <a class="mr-auto flex items-center text-primary" href="{{ route('hrms.company.show') }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="kanban-square" class="lucide lucide-kanban-square mr-1.5 h-4 w-4 stroke-[1.3]"><rect width="18" height="18" x="3" y="3" rx="2"></rect><path d="M8 7v7"></path><path d="M12 7v4"></path><path d="M16 7v9"></path></svg>
                                                        Preview
                                                    </a>
                                                    <a class="mr-3 flex items-center" href="#">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="check-square" class="lucide lucide-check-square mr-1.5 h-4 w-4 stroke-[1.3]"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                                        Edit
                                                    </a>
                                                    <a class="flex items-center text-danger" href="#">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="trash2" class="lucide lucide-trash2 mr-1.5 h-4 w-4 stroke-[1.3]"><path d="M3 6h18"></path><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path><line x1="10" x2="10" y1="11" y2="17"></line><line x1="14" x2="14" y1="11" y2="17"></line></svg>
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-span-12 flex flex-col border-b border-r border-dashed border-slate-300/80 px-5 py-5 sm:col-span-6 xl:col-span-3 [&amp;:nth-child(4n)]:border-r-0 [&amp;:nth-last-child(-n+4)]:border-b-0">
                                            <div class="image-fit h-52 overflow-hidden rounded-lg before:absolute before:left-0 before:top-0 before:z-10 before:block before:h-full before:w-full  before:from-slate-900/90 before:to-black/20">
                                                <img class="rounded-md" src="{{ asset('img/logo/duluin.jpg') }}" alt="Tailwise - Admin Dashboard Template">
                                            </div>
                                            <div class="pt-5">
                                                <div class="mb-5 mt-auto flex flex-col gap-3.5 border-b border-dashed border-slate-300/70 pb-5">
                                                    <div class="flex items-center">
                                                        <div class="text-base font-medium">DULUIN</div>
                                                        <div class="ml-auto">
                                                            <div class="flex items-center rounded-md border border-success/10 bg-success/10 px-1.5 py-px text-xs font-medium text-success">
                                                                <span class="-mt-px">
                                                                    Active
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex items-center">
                                                    <a class="mr-auto flex items-center text-primary" href="{{ route('hrms.company.show') }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="kanban-square" class="lucide lucide-kanban-square mr-1.5 h-4 w-4 stroke-[1.3]"><rect width="18" height="18" x="3" y="3" rx="2"></rect><path d="M8 7v7"></path><path d="M12 7v4"></path><path d="M16 7v9"></path></svg>
                                                        Preview
                                                    </a>
                                                    <a class="mr-3 flex items-center" href="#">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="check-square" class="lucide lucide-check-square mr-1.5 h-4 w-4 stroke-[1.3]"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                                        Edit
                                                    </a>
                                                    <a class="flex items-center text-danger" href="#">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="trash2" class="lucide lucide-trash2 mr-1.5 h-4 w-4 stroke-[1.3]"><path d="M3 6h18"></path><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path><line x1="10" x2="10" y1="11" y2="17"></line><line x1="14" x2="14" y1="11" y2="17"></line></svg>
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-span-12 flex flex-col border-b border-r border-dashed border-slate-300/80 px-5 py-5 sm:col-span-6 xl:col-span-3 [&amp;:nth-child(4n)]:border-r-0 [&amp;:nth-last-child(-n+4)]:border-b-0">
                                            <div class="image-fit h-52 overflow-hidden rounded-lg before:absolute before:left-0 before:top-0 before:z-10 before:block before:h-full before:w-full  before:from-slate-900/90 before:to-black/20">
                                                <img class="rounded-md" src="{{ asset('img/logo/duluin.jpg') }}" alt="Tailwise - Admin Dashboard Template">
                                            </div>
                                            <div class="pt-5">
                                                <div class="mb-5 mt-auto flex flex-col gap-3.5 border-b border-dashed border-slate-300/70 pb-5">
                                                    <div class="flex items-center">
                                                        <div class="text-base font-medium">DULUIN</div>
                                                        <div class="ml-auto">
                                                            <div class="flex items-center rounded-md border border-success/10 bg-success/10 px-1.5 py-px text-xs font-medium text-success">
                                                                <span class="-mt-px">
                                                                    Active
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex items-center">
                                                    <a class="mr-auto flex items-center text-primary" href="{{ route('hrms.company.show') }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="kanban-square" class="lucide lucide-kanban-square mr-1.5 h-4 w-4 stroke-[1.3]"><rect width="18" height="18" x="3" y="3" rx="2"></rect><path d="M8 7v7"></path><path d="M12 7v4"></path><path d="M16 7v9"></path></svg>
                                                        Preview
                                                    </a>
                                                    <a class="mr-3 flex items-center" href="#">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="check-square" class="lucide lucide-check-square mr-1.5 h-4 w-4 stroke-[1.3]"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                                        Edit
                                                    </a>
                                                    <a class="flex items-center text-danger" href="#">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="trash2" class="lucide lucide-trash2 mr-1.5 h-4 w-4 stroke-[1.3]"><path d="M3 6h18"></path><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path><line x1="10" x2="10" y1="11" y2="17"></line><line x1="14" x2="14" y1="11" y2="17"></line></svg>
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-reverse flex flex-col-reverse flex-wrap items-center gap-y-2 p-5 sm:flex-row">
                                    <nav class="mr-auto w-full flex-1 sm:w-auto">
                                        <ul class="flex w-full mr-0 sm:mr-auto sm:w-auto">
                                            <li class="flex-1 sm:flex-initial">
                                                <a class="transition duration-200 border items-center justify-center py-2 rounded-md cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed min-w-0 sm:min-w-[40px] shadow-none font-normal flex border-transparent text-slate-800 sm:mr-2 dark:text-slate-300 px-1 sm:px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="chevrons-left" class="lucide lucide-chevrons-left stroke-[1] h-4 w-4"><path d="m11 17-5-5 5-5"></path><path d="m18 17-5-5 5-5"></path></svg></a>
                                            </li>
                                            <li class="flex-1 sm:flex-initial">
                                                <a class="transition duration-200 border items-center justify-center py-2 rounded-md cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed min-w-0 sm:min-w-[40px] shadow-none font-normal flex border-transparent text-slate-800 sm:mr-2 dark:text-slate-300 px-1 sm:px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-left" class="lucide lucide-chevron-left stroke-[1] h-4 w-4"><path d="m15 18-6-6 6-6"></path></svg></a>
                                            </li>
                                            <li class="flex-1 sm:flex-initial">
                                                <a class="transition duration-200 border items-center justify-center py-2 rounded-md cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed min-w-0 sm:min-w-[40px] shadow-none font-normal flex border-transparent text-slate-800 sm:mr-2 dark:text-slate-300 px-1 sm:px-3 !box dark:bg-darkmode-400">1</a>
                                            </li>
                                
                                            <li class="flex-1 sm:flex-initial">
                                                <a class="transition duration-200 border items-center justify-center py-2 rounded-md cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed min-w-0 sm:min-w-[40px] shadow-none font-normal flex border-transparent text-slate-800 sm:mr-2 dark:text-slate-300 px-1 sm:px-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="chevrons-right" class="lucide lucide-chevrons-right stroke-[1] h-4 w-4"><path d="m6 17 5-5-5-5"></path><path d="m13 17 5-5-5-5"></path></svg></a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <select class="disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1 rounded-[0.5rem] sm:w-20">
                                        <option>10</option>
                                        <option>25</option>
                                        <option>35</option>
                                        <option>50</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<div class="preview relative [&.hide]:overflow-hidden [&.hide]:h-0">
    <div class="text-center">
        <div id="success-notification-content" class="py-5 pl-5 pr-14 bg-white border border-slate-200/60 rounded-lg shadow-xl dark:bg-darkmode-600 dark:text-slate-300 dark:border-darkmode-600 hidden flex">
            <i data-tw-merge="" data-lucide="check-circle" class="stroke-[1] w-5 h-5 text-success"></i>
            <div class="ml-4 mr-4">
                <div class="font-medium" id="success-title">...</div>
                <div class="mt-1 text-slate-500" id="success-message">
                   ...
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
    $(document).ready(function() {
        getCompanies();
    });

    let companyId = localStorage.getItem('company');
    async function getCompanies() {
        try {
            const response = await fetch('http://localhost:4444/api/v1/company', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer xN9P6a8sL2bV3iR4fC5J6Q7kT8yU9wZ0' 
                },
            });

            const result = await response.json();
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            //tampilkan data company

            // showSuccessNotification(result.message, "The operation was completed successfully.");

        } catch (error) {
            console.error('Error:', error);
            alert('An error occurred while submitting the data');
        }
    }

    // document.getElementById('formUpdateCompany').addEventListener('submit', async function (event) {
    //     event.preventDefault();

    //     const formData = new FormData(this);

    //     const data = {
    //         company_name: formData.get('company_name'),
    //         domain: formData.get('domain'),
    //         date_of_establishment: formData.get('date_of_establishment'),
    //         // parent_company: formData.get('parent_company'),
    //         parent_company: '54601ab0-cd67-46a3-864b-b30a4771ebc9',
    //         status: formData.get('status'),
    //         default_currency: formData.get('default_currency'),
    //         default_holiday_list: formData.get('default_holiday_list')
    //     };

    //     console.log(data);
        

    //     try {
    //         const response = await fetch('http://localhost:4444/api/v1/company/'+companyId, {
    //             method: 'PATCH',
    //             headers: {
    //                 'Content-Type': 'application/json',
    //                 'Authorization': 'Bearer xN9P6a8sL2bV3iR4fC5J6Q7kT8yU9wZ0' 
    //             },
    //             body: JSON.stringify(data)
    //         });

    //         const responseData = await response.json();
            
    //         if (!response.ok) {
    //             throw new Error('Network response was not ok');
    //         }

    //         showSuccessNotification(responseData.message, "The operation was completed successfully.");

    //     } catch (error) {
    //         console.error('Error:', error);
    //         alert('An error occurred while submitting the data');
    //     }
    // });

    // function showSuccessNotification(title, message) {
    //     var notificationContent = document.getElementById("success-notification-content");
    //     document.getElementById("success-title").textContent = title;
    //     document.getElementById("success-message").textContent = message;

    //     Toastify({
    //         node: $("#success-notification-content")
    //             .clone()
    //             .removeClass("hidden")[0],
    //         duration: 3000,
    //         newWindow: true,
    //         close: true,
    //         gravity: "top",
    //         position: "right",
    //         stopOnFocus: true,
    //     }).showToast();
    // }
</script>
@endpush
