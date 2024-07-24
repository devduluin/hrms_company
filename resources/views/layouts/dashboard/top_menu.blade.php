

<div class="fixed top-0 inset-x-0 mt-2.5 z-10 mx-2.5 h-[65px] bg-linear-gradient-to-r from-[#2970FF] to-[#0040C1] rounded-[0.6rem] shadow-lg flex before:content-[''] before:absolute before:inset-x-0 before:-mt-2.5 before:h-2.5 before:backdrop-blur" style="background: linear-gradient(90deg, #2970FF 0%, #0040C1 100%);">
    <div class="side-menu__content flex-none flex items-center z-10 px-5 gap-4 h-full bg-blue-600 rounded-[0.6rem] xl:w-[275px] overflow-hidden relative duration-300  group-[.side-menu--collapsed]:xl:w-[100px] group-[.side-menu--collapsed.side-menu--on-hover]:xl:w-[275px] group-[.side-menu--collapsed.side-menu--on-hover]:xl:shadow-[6px_0_12px_-4px_#0000001f] before:content-[''] before:hidden before:xl:block before:absolute before:right-0 before:border-r before:border-dotted before:border-white/[0.15] before:h-4/6 before:group-[.side-menu--collapsed.side-menu--on-hover]:xl:hidden after:content-[''] after:hidden after:xl:block after:absolute after:w-full after:h-full after:bg-[length:100vw_65px] after:z-[-1] after:bg-blue-600   ">
        <a class="ml-2.5 hidden items-center transition-[margin]  xl:flex group-[.side-menu--collapsed.side-menu--on-hover]:xl:ml-2.5 group-[.side-menu--collapsed]:xl:ml-6" href="#">
            <div class="transition-transform ease-in-out group-[.side-menu--collapsed.side-menu--on-hover]:xl:-rotate-180">
                <div class="relative h-[18px] w-[18px] -rotate-45 [&_div]:bg-white">
                    <div class="absolute inset-y-0 left-0 my-auto h-[75%] w-[21%] rounded-full opacity-50">
                    </div>
                    <div class="absolute inset-0 m-auto h-[120%] w-[21%] rounded-full"></div>
                    <div class="absolute inset-y-0 right-0 my-auto h-[75%] w-[21%] rounded-full opacity-50">
                    </div>
                </div>
            </div>
            <div class="ml-3.5 font-medium text-white transition-opacity group-[.side-menu--collapsed.side-menu--on-hover]:xl:opacity-100 group-[.side-menu--collapsed]:xl:opacity-0">
                {{ $data['title'] }}
            </div>
        </a>
        <a class="toggle-compact-menu ml-auto hidden h-[20px] w-[20px] items-center justify-center rounded-full border border-white/40 text-white transition-[opacity,transform] hover:bg-white/5 group-[.side-menu--collapsed]:xl:rotate-180 group-[.side-menu--collapsed.side-menu--on-hover]:xl:opacity-100 group-[.side-menu--collapsed]:xl:opacity-0 3xl:flex" href="#">
            <i data-tw-merge="" data-lucide="arrow-left" class="h-3.5 w-3.5 stroke-[1.3]"></i>
        </a>
        <div class="flex items-center gap-1 xl:hidden">
            <a class="open-mobile-menu rounded-full p-2 hover:bg-white/5" href="#">
                <i data-tw-merge="" data-lucide="align-justify" class="stroke-[1] h-[18px] w-[18px] text-white"></i>
            </a>
            <a class="rounded-full p-2 hover:bg-white/5" data-tw-toggle="modal" data-tw-target="#quick-search" href="javascript:;">
                <i data-tw-merge="" data-lucide="search" class="stroke-[1] h-[18px] w-[18px] text-white"></i>
            </a>
        </div>
    </div>
    <div class="absolute inset-x-0 h-full pl-[84px] transition-[padding] duration-100 xl:-ml-2.5 xl:pl-[275px] group-[.side-menu--collapsed]:xl:pl-[100px]">
        <div class="flex h-full w-full items-center px-5">
            <!-- BEGIN: Breadcrumb -->
            <nav aria-label="breadcrumb" class="flex hidden flex-1 xl:block">
                <ol id="breadcrumb" class="flex items-center text-white dark:text-slate-300 text-white/90">
                    <li class="">
                        <a href="#"></a>
                    </li>
                    
                     
                </ol>
            </nav>
            <!-- END: Breadcrumb -->
            <!-- BEGIN: Search -->
            <div class="relative hidden flex-1 justify-center xl:flex" data-tw-toggle="modal" data-tw-target="#quick-search">
                <div class="flex w-[350px] cursor-pointer items-center rounded-[0.5rem] bg-white/[0.12] px-3.5 py-2 text-white/60 transition-colors hover:bg-white/20">
                    <i data-tw-merge="" data-lucide="search" class="stroke-[1] h-[18px] w-[18px]"></i>
                    <div class="ml-2.5 mr-auto">Quick search...</div>
                    <div>⌘</div>
                </div>
            </div>

            @include('layouts.dashboard.quick_search')
            
            <!-- END: Search -->
            <!-- BEGIN: Notification & User Menu -->
            <div class="flex flex-1 items-center">
                <div class="ml-auto flex items-center gap-1">
                    <a class="rounded-full p-2 hover:bg-white/5" data-tw-toggle="modal" data-tw-target="#activities-panel" href="javascript:;">
                        <i data-tw-merge="" data-lucide="layout-grid" class="stroke-[1] h-[18px] w-[18px] text-white"></i>
                    </a>
                    <a class="request-full-screen rounded-full p-2 hover:bg-white/5" href="#">
                        <i data-tw-merge="" data-lucide="expand" class="stroke-[1] h-[18px] w-[18px] text-white"></i>
                    </a>
                    <a class="rounded-full p-2 hover:bg-white/5" data-tw-toggle="modal" data-tw-target="#notifications-panel" href="javascript:;">
                        <i data-tw-merge="" data-lucide="bell" class="stroke-[1] h-[18px] w-[18px] text-white"></i>
                    </a>
                </div>
                <div data-tw-merge="" data-tw-placement="bottom-end" class="dropdown relative ml-5"><button data-tw-toggle="dropdown" aria-expanded="false" class="cursor-pointer image-fit h-[36px] w-[36px] overflow-hidden rounded-full border-[3px] border-white/[0.15]"><img src="dist/images/users/user10-50x50.jpg" alt="Tailwise - Admin Dashboard Template">
                    </button>
                    <div data-transition="" data-selector=".show" data-enter="transition-all ease-linear duration-150" data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1" data-enter-to="!mt-1 visible opacity-100 translate-y-0" data-leave="transition-all ease-linear duration-150" data-leave-from="!mt-1 visible opacity-100 translate-y-0" data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1" class="dropdown-menu absolute z-[9999] hidden">
                        <div data-tw-merge="" class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600 mt-1 w-56">
                             
                            <a href="{{ url('dashboard/settings/email_setting') }}" class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge="" data-lucide="inbox" class="stroke-[1] mr-2 h-4 w-4"></i>
                                Email Settings</a>
                            <a href="{{ url('dashboard/settings/security') }}" class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge="" data-lucide="lock" class="stroke-[1] mr-2 h-4 w-4"></i>
                                Reset Password</a>
                            <div class="h-px my-2 -mx-2 bg-slate-200/60 dark:bg-darkmode-400">
                            </div>
                            <a href="{{ url('dashboard/settings') }}" class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge="" data-lucide="users" class="stroke-[1] mr-2 h-4 w-4"></i>
                                Profile Info</a>
                            <a href="{{ url('/') }}" class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge="" data-lucide="power" class="stroke-[1] mr-2 h-4 w-4"></i>
                                Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div data-tw-backdrop="" aria-hidden="true" tabindex="-1" id="activities-panel" class="modal group bg-gradient-to-b from-theme-1/50 via-theme-2/50 to-black/50 transition-[visibility,opacity] w-screen h-screen fixed left-0 top-0 [&:not(.show)]:duration-[0s,0.2s] [&:not(.show)]:delay-[0.2s,0s] [&:not(.show)]:invisible [&:not(.show)]:opacity-0 [&.show]:visible [&.show]:opacity-100 [&.show]:duration-[0s,0.4s]">
                    <div data-tw-merge="" class="ml-auto h-screen flex flex-col bg-white relative shadow-md transition-[margin-right] duration-[0.6s] -mr-[100%] group-[.show]:mr-0 dark:bg-darkmode-600 sm:w-[460px] w-72 rounded-[0.75rem_0_0_0.75rem/1.1rem_0_0_1.1rem]"><a class="absolute inset-y-0 left-0 right-auto my-auto -ml-[60px] flex h-8 w-8 items-center justify-center rounded-full border border-white/90 bg-white/5 text-white/90 transition-all hover:rotate-180 hover:scale-105 hover:bg-white/10 focus:outline-none sm:-ml-[105px] sm:h-14 sm:w-14" data-tw-dismiss="modal" href="javascript:;">
                            <i data-tw-merge="" data-lucide="x" class="stroke-[1] h-8 w-8"></i>
                        </a>
                        <div data-tw-merge="" class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 px-6 py-5">
                            <h2 class="mr-auto text-base font-medium">Latest Activities</h2>
                        </div>
                        <div data-tw-merge="" class="overflow-y-auto flex-1 p-0">
                            <div class="flex flex-col gap-3.5 px-5 py-3">
                                <div class="relative overflow-hidden before:absolute before:inset-y-0 before:left-0 before:ml-[14px] before:w-px before:bg-slate-200/60 before:content-[''] before:dark:bg-darkmode-400">
                                    <div class="mb-3 last:mb-0 relative first:before:content-[''] first:before:h-1/2 first:before:w-5 first:before:bg-white first:before:absolute last:after:content-[''] last:after:h-1/2 last:after:w-5 last:after:bg-white last:after:absolute last:after:bottom-0">
                                        <div class="px-4 py-3 ml-8 before:content-[''] before:ml-1 before:absolute before:w-5 before:h-5 before:bg-slate-200 before:rounded-full before:inset-y-0 before:my-auto before:left-0 before:dark:bg-darkmode-300 before:z-10 after:content-[''] after:absolute after:w-1.5 after:h-1.5 after:bg-slate-500 after:rounded-full after:inset-y-0 after:my-auto after:left-0 after:ml-[11px] after:dark:bg-darkmode-200 after:z-10">
                                            <a class="font-medium text-primary" href="#">
                                                Uploaded video files
                                            </a>
                                            <div class="mt-1.5 flex flex-col gap-y-1.5 text-[0.8rem] leading-relaxed text-slate-500 sm:flex-row sm:items-center">
                                                Shared video tutorials
                                                <span class="group flex items-center text-xs font-medium rounded-md sm:ml-2 border px-1.5 py-px mr-auto sm:mr-0 [&.primary]:text-primary [&.primary]:bg-primary/10 [&.primary]:border-primary/10 [&.success]:text-success [&.success]:bg-success/10 [&.success]:border-success/10 [&.warning]:text-warning [&.warning]:bg-warning/10 [&.warning]:border-warning/10 [&.info]:text-info [&.info]:bg-info/10 [&.info]:border-info/10 info">
                                                    <span class="mr-1.5 h-1.5 w-1.5 rounded-full group-[.info]:bg-info/80 group-[.primary]:bg-primary/80 group-[.success]:bg-success/80 group-[.warning]:bg-warning/80"></span>
                                                    <span class="-mt-px">Completed</span>
                                                </span>
                                            </div>
                                            <div class="my-3.5 grid grid-cols-1 gap-4">
                                                <div class="flex items-center rounded-[0.6rem] border border-slate-200/80 bg-slate-50/70 py-4 pl-5 pr-2.5">
                                                    <div class="hidden w-10 sm:block">
                                                        <div class="relative block bg-center bg-no-repeat bg-contain before:content-[''] before:pt-[100%] before:w-full before:block bg-file-icon-directory">
                                                        </div>
                                                    </div>
                                                    <div class="mr-auto sm:ml-3.5">
                                                        <div class="max-w-[8rem] truncate font-medium text-primary">
                                                            video1.mp4
                                                        </div>
                                                        <div class="mt-1 text-xs text-slate-500">
                                                            15MB
                                                        </div>
                                                    </div>
                                                    <div data-tw-merge="" data-tw-placement="bottom-end" class="dropdown relative"><button data-tw-toggle="dropdown" aria-expanded="false" class="cursor-pointer h-5 w-5 text-slate-500"><i data-tw-merge="" data-lucide="more-vertical" class="stroke-[1] h-4 w-4"></i>
                                                        </button>
                                                        <div data-transition="" data-selector=".show" data-enter="transition-all ease-linear duration-150" data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1" data-enter-to="!mt-1 visible opacity-100 translate-y-0" data-leave="transition-all ease-linear duration-150" data-leave-from="!mt-1 visible opacity-100 translate-y-0" data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1" class="dropdown-menu absolute z-[9999] hidden">
                                                            <div data-tw-merge="" class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600 w-40">
                                                                <a class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge="" data-lucide="copy" class="stroke-[1] mr-2 h-4 w-4"></i>
                                                                    Copy Link</a>
                                                                <a class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge="" data-lucide="trash" class="stroke-[1] mr-2 h-4 w-4"></i>
                                                                    Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex items-center rounded-[0.6rem] border border-slate-200/80 bg-slate-50/70 py-4 pl-5 pr-2.5">
                                                    <div class="hidden w-10 sm:block">
                                                        <div class="relative block bg-center bg-no-repeat bg-contain before:content-[''] before:pt-[100%] before:w-full before:block bg-file-icon-directory">
                                                        </div>
                                                    </div>
                                                    <div class="mr-auto sm:ml-3.5">
                                                        <div class="max-w-[8rem] truncate font-medium text-primary">
                                                            video2.mov
                                                        </div>
                                                        <div class="mt-1 text-xs text-slate-500">
                                                            12.5MB
                                                        </div>
                                                    </div>
                                                    <div data-tw-merge="" data-tw-placement="bottom-end" class="dropdown relative"><button data-tw-toggle="dropdown" aria-expanded="false" class="cursor-pointer h-5 w-5 text-slate-500"><i data-tw-merge="" data-lucide="more-vertical" class="stroke-[1] h-4 w-4"></i>
                                                        </button>
                                                        <div data-transition="" data-selector=".show" data-enter="transition-all ease-linear duration-150" data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1" data-enter-to="!mt-1 visible opacity-100 translate-y-0" data-leave="transition-all ease-linear duration-150" data-leave-from="!mt-1 visible opacity-100 translate-y-0" data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1" class="dropdown-menu absolute z-[9999] hidden">
                                                            <div data-tw-merge="" class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600 w-40">
                                                                <a class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge="" data-lucide="copy" class="stroke-[1] mr-2 h-4 w-4"></i>
                                                                    Copy Link</a>
                                                                <a class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge="" data-lucide="trash" class="stroke-[1] mr-2 h-4 w-4"></i>
                                                                    Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-1.5 text-xs text-slate-500">
                                                Fri Dec 2020
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 last:mb-0 relative first:before:content-[''] first:before:h-1/2 first:before:w-5 first:before:bg-white first:before:absolute last:after:content-[''] last:after:h-1/2 last:after:w-5 last:after:bg-white last:after:absolute last:after:bottom-0">
                                        <div class="px-4 py-3 ml-8 before:content-[''] before:ml-1 before:absolute before:w-5 before:h-5 before:bg-slate-200 before:rounded-full before:inset-y-0 before:my-auto before:left-0 before:dark:bg-darkmode-300 before:z-10 after:content-[''] after:absolute after:w-1.5 after:h-1.5 after:bg-slate-500 after:rounded-full after:inset-y-0 after:my-auto after:left-0 after:ml-[11px] after:dark:bg-darkmode-200 after:z-10">
                                            <a class="font-medium text-primary" href="#">
                                                Received 5 new emails
                                            </a>
                                            <div class="mt-1.5 flex flex-col gap-y-1.5 text-[0.8rem] leading-relaxed text-slate-500 sm:flex-row sm:items-center">
                                                Inbox updates
                                                <span class="group flex items-center text-xs font-medium rounded-md sm:ml-2 border px-1.5 py-px mr-auto sm:mr-0 [&.primary]:text-primary [&.primary]:bg-primary/10 [&.primary]:border-primary/10 [&.success]:text-success [&.success]:bg-success/10 [&.success]:border-success/10 [&.warning]:text-warning [&.warning]:bg-warning/10 [&.warning]:border-warning/10 [&.info]:text-info [&.info]:bg-info/10 [&.info]:border-info/10 warning">
                                                    <span class="mr-1.5 h-1.5 w-1.5 rounded-full group-[.info]:bg-info/80 group-[.primary]:bg-primary/80 group-[.success]:bg-success/80 group-[.warning]:bg-warning/80"></span>
                                                    <span class="-mt-px">Info</span>
                                                </span>
                                            </div>
                                            <div class="my-3.5 grid grid-cols-1 gap-4">
                                                <div class="flex items-center rounded-[0.6rem] border border-slate-200/80 bg-slate-50/70 py-4 pl-5 pr-2.5">
                                                    <div class="hidden w-10 sm:block">
                                                        <div class="relative block bg-center bg-no-repeat bg-contain before:content-[''] before:pt-[100%] before:w-full before:block bg-file-icon-directory">
                                                        </div>
                                                    </div>
                                                    <div class="mr-auto sm:ml-3.5">
                                                        <div class="max-w-[8rem] truncate font-medium text-primary">
                                                            presentation1.pptx
                                                        </div>
                                                        <div class="mt-1 text-xs text-slate-500">
                                                            5.2MB
                                                        </div>
                                                    </div>
                                                    <div data-tw-merge="" data-tw-placement="bottom-end" class="dropdown relative"><button data-tw-toggle="dropdown" aria-expanded="false" class="cursor-pointer h-5 w-5 text-slate-500"><i data-tw-merge="" data-lucide="more-vertical" class="stroke-[1] h-4 w-4"></i>
                                                        </button>
                                                        <div data-transition="" data-selector=".show" data-enter="transition-all ease-linear duration-150" data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1" data-enter-to="!mt-1 visible opacity-100 translate-y-0" data-leave="transition-all ease-linear duration-150" data-leave-from="!mt-1 visible opacity-100 translate-y-0" data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1" class="dropdown-menu absolute z-[9999] hidden">
                                                            <div data-tw-merge="" class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600 w-40">
                                                                <a class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge="" data-lucide="copy" class="stroke-[1] mr-2 h-4 w-4"></i>
                                                                    Copy Link</a>
                                                                <a class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge="" data-lucide="trash" class="stroke-[1] mr-2 h-4 w-4"></i>
                                                                    Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex items-center rounded-[0.6rem] border border-slate-200/80 bg-slate-50/70 py-4 pl-5 pr-2.5">
                                                    <div class="hidden w-10 sm:block">
                                                        <div class="relative block bg-center bg-no-repeat bg-contain before:content-[''] before:pt-[100%] before:w-full before:block bg-file-icon-directory">
                                                        </div>
                                                    </div>
                                                    <div class="mr-auto sm:ml-3.5">
                                                        <div class="max-w-[8rem] truncate font-medium text-primary">
                                                            presentation2.ppt
                                                        </div>
                                                        <div class="mt-1 text-xs text-slate-500">
                                                            4.5MB
                                                        </div>
                                                    </div>
                                                    <div data-tw-merge="" data-tw-placement="bottom-end" class="dropdown relative"><button data-tw-toggle="dropdown" aria-expanded="false" class="cursor-pointer h-5 w-5 text-slate-500"><i data-tw-merge="" data-lucide="more-vertical" class="stroke-[1] h-4 w-4"></i>
                                                        </button>
                                                        <div data-transition="" data-selector=".show" data-enter="transition-all ease-linear duration-150" data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1" data-enter-to="!mt-1 visible opacity-100 translate-y-0" data-leave="transition-all ease-linear duration-150" data-leave-from="!mt-1 visible opacity-100 translate-y-0" data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1" class="dropdown-menu absolute z-[9999] hidden">
                                                            <div data-tw-merge="" class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600 w-40">
                                                                <a class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge="" data-lucide="copy" class="stroke-[1] mr-2 h-4 w-4"></i>
                                                                    Copy Link</a>
                                                                <a class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge="" data-lucide="trash" class="stroke-[1] mr-2 h-4 w-4"></i>
                                                                    Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-1.5 text-xs text-slate-500">
                                                Sat May 2021
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 last:mb-0 relative first:before:content-[''] first:before:h-1/2 first:before:w-5 first:before:bg-white first:before:absolute last:after:content-[''] last:after:h-1/2 last:after:w-5 last:after:bg-white last:after:absolute last:after:bottom-0">
                                        <div class="px-4 py-3 ml-8 before:content-[''] before:ml-1 before:absolute before:w-5 before:h-5 before:bg-slate-200 before:rounded-full before:inset-y-0 before:my-auto before:left-0 before:dark:bg-darkmode-300 before:z-10 after:content-[''] after:absolute after:w-1.5 after:h-1.5 after:bg-slate-500 after:rounded-full after:inset-y-0 after:my-auto after:left-0 after:ml-[11px] after:dark:bg-darkmode-200 after:z-10">
                                            <a class="font-medium text-primary" href="#">
                                                Posted a status update
                                            </a>
                                            <div class="mt-1.5 flex flex-col gap-y-1.5 text-[0.8rem] leading-relaxed text-slate-500 sm:flex-row sm:items-center">
                                                Shared thoughts on the project
                                                <span class="group flex items-center text-xs font-medium rounded-md sm:ml-2 border px-1.5 py-px mr-auto sm:mr-0 [&.primary]:text-primary [&.primary]:bg-primary/10 [&.primary]:border-primary/10 [&.success]:text-success [&.success]:bg-success/10 [&.success]:border-success/10 [&.warning]:text-warning [&.warning]:bg-warning/10 [&.warning]:border-warning/10 [&.info]:text-info [&.info]:bg-info/10 [&.info]:border-info/10 warning">
                                                    <span class="mr-1.5 h-1.5 w-1.5 rounded-full group-[.info]:bg-info/80 group-[.primary]:bg-primary/80 group-[.success]:bg-success/80 group-[.warning]:bg-warning/80"></span>
                                                    <span class="-mt-px">Success</span>
                                                </span>
                                            </div>
                                            <div class="mt-1.5 text-xs text-slate-500">
                                                Wed Oct 2021
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 last:mb-0 relative first:before:content-[''] first:before:h-1/2 first:before:w-5 first:before:bg-white first:before:absolute last:after:content-[''] last:after:h-1/2 last:after:w-5 last:after:bg-white last:after:absolute last:after:bottom-0">
                                        <div class="px-4 py-3 ml-8 before:content-[''] before:ml-1 before:absolute before:w-5 before:h-5 before:bg-slate-200 before:rounded-full before:inset-y-0 before:my-auto before:left-0 before:dark:bg-darkmode-300 before:z-10 after:content-[''] after:absolute after:w-1.5 after:h-1.5 after:bg-slate-500 after:rounded-full after:inset-y-0 after:my-auto after:left-0 after:ml-[11px] after:dark:bg-darkmode-200 after:z-10">
                                            <a class="font-medium text-primary" href="#">
                                                Received a friend request
                                            </a>
                                            <div class="mt-1.5 flex flex-col gap-y-1.5 text-[0.8rem] leading-relaxed text-slate-500 sm:flex-row sm:items-center">
                                                Friend request from John
                                                <span class="group flex items-center text-xs font-medium rounded-md sm:ml-2 border px-1.5 py-px mr-auto sm:mr-0 [&.primary]:text-primary [&.primary]:bg-primary/10 [&.primary]:border-primary/10 [&.success]:text-success [&.success]:bg-success/10 [&.success]:border-success/10 [&.warning]:text-warning [&.warning]:bg-warning/10 [&.warning]:border-warning/10 [&.info]:text-info [&.info]:bg-info/10 [&.info]:border-info/10 primary">
                                                    <span class="mr-1.5 h-1.5 w-1.5 rounded-full group-[.info]:bg-info/80 group-[.primary]:bg-primary/80 group-[.success]:bg-success/80 group-[.warning]:bg-warning/80"></span>
                                                    <span class="-mt-px">New</span>
                                                </span>
                                            </div>
                                            <div class="my-3.5 w-40 rounded-[0.6rem] border bg-slate-50/80 p-1 sm:w-[80%]">
                                                <div class="grid grid-cols-3 overflow-hidden rounded-[0.6rem]">
                                                    <div class="image-fit h-12 cursor-pointer overflow-hidden border border-slate-100 saturate-[.6] hover:saturate-100 sm:h-20">
                                                        <img src="dist/images/projects/project10-400x400.jpg" alt="Tailwise - Admin Dashboard Template">
                                                    </div>
                                                    <div class="image-fit h-12 cursor-pointer overflow-hidden border border-slate-100 saturate-[.6] hover:saturate-100 sm:h-20">
                                                        <img src="dist/images/projects/project9-400x400.jpg" alt="Tailwise - Admin Dashboard Template">
                                                    </div>
                                                    <div class="image-fit h-12 cursor-pointer overflow-hidden border border-slate-100 saturate-[.6] hover:saturate-100 sm:h-20">
                                                        <img src="dist/images/projects/project4-400x400.jpg" alt="Tailwise - Admin Dashboard Template">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-1.5 text-xs text-slate-500">
                                                Wed Mar 2021
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 last:mb-0 relative first:before:content-[''] first:before:h-1/2 first:before:w-5 first:before:bg-white first:before:absolute last:after:content-[''] last:after:h-1/2 last:after:w-5 last:after:bg-white last:after:absolute last:after:bottom-0">
                                        <div class="px-4 py-3 ml-8 before:content-[''] before:ml-1 before:absolute before:w-5 before:h-5 before:bg-slate-200 before:rounded-full before:inset-y-0 before:my-auto before:left-0 before:dark:bg-darkmode-300 before:z-10 after:content-[''] after:absolute after:w-1.5 after:h-1.5 after:bg-slate-500 after:rounded-full after:inset-y-0 after:my-auto after:left-0 after:ml-[11px] after:dark:bg-darkmode-200 after:z-10">
                                            <a class="font-medium text-primary" href="#">
                                                Logged in successfully
                                            </a>
                                            <div class="mt-1.5 flex flex-col gap-y-1.5 text-[0.8rem] leading-relaxed text-slate-500 sm:flex-row sm:items-center">
                                                Accessed the dashboard
                                                <span class="group flex items-center text-xs font-medium rounded-md sm:ml-2 border px-1.5 py-px mr-auto sm:mr-0 [&.primary]:text-primary [&.primary]:bg-primary/10 [&.primary]:border-primary/10 [&.success]:text-success [&.success]:bg-success/10 [&.success]:border-success/10 [&.warning]:text-warning [&.warning]:bg-warning/10 [&.warning]:border-warning/10 [&.info]:text-info [&.info]:bg-info/10 [&.info]:border-info/10 warning">
                                                    <span class="mr-1.5 h-1.5 w-1.5 rounded-full group-[.info]:bg-info/80 group-[.primary]:bg-primary/80 group-[.success]:bg-success/80 group-[.warning]:bg-warning/80"></span>
                                                    <span class="-mt-px">Success</span>
                                                </span>
                                            </div>
                                            <div class="my-3.5 w-40 rounded-[0.6rem] border bg-slate-50/80 p-1 sm:w-[80%]">
                                                <div class="grid grid-cols-3 overflow-hidden rounded-[0.6rem]">
                                                    <div class="image-fit h-12 cursor-pointer overflow-hidden border border-slate-100 saturate-[.6] hover:saturate-100 sm:h-20">
                                                        <img src="dist/images/projects/project9-400x400.jpg" alt="Tailwise - Admin Dashboard Template">
                                                    </div>
                                                    <div class="image-fit h-12 cursor-pointer overflow-hidden border border-slate-100 saturate-[.6] hover:saturate-100 sm:h-20">
                                                        <img src="dist/images/projects/project1-400x400.jpg" alt="Tailwise - Admin Dashboard Template">
                                                    </div>
                                                    <div class="image-fit h-12 cursor-pointer overflow-hidden border border-slate-100 saturate-[.6] hover:saturate-100 sm:h-20">
                                                        <img src="dist/images/projects/project1-400x400.jpg" alt="Tailwise - Admin Dashboard Template">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-1.5 text-xs text-slate-500">
                                                Fri Oct 2020
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div data-tw-backdrop="" aria-hidden="true" tabindex="-1" id="notifications-panel" class="modal group bg-gradient-to-b from-theme-1/50 via-theme-2/50 to-black/50 transition-[visibility,opacity] w-screen h-screen fixed left-0 top-0 [&:not(.show)]:duration-[0s,0.2s] [&:not(.show)]:delay-[0.2s,0s] [&:not(.show)]:invisible [&:not(.show)]:opacity-0 [&.show]:visible [&.show]:opacity-100 [&.show]:duration-[0s,0.4s]">
                    <div data-tw-merge="" class="ml-auto h-screen flex flex-col bg-white relative shadow-md transition-[margin-right] duration-[0.6s] -mr-[100%] group-[.show]:mr-0 dark:bg-darkmode-600 sm:w-[460px] w-72 rounded-[0.75rem_0_0_0.75rem/1.1rem_0_0_1.1rem]"><a class="absolute inset-y-0 left-0 right-auto my-auto -ml-[60px] flex h-8 w-8 items-center justify-center rounded-full border border-white/90 bg-white/5 text-white/90 transition-all hover:rotate-180 hover:scale-105 hover:bg-white/10 focus:outline-none sm:-ml-[105px] sm:h-14 sm:w-14" data-tw-dismiss="modal" href="javascript:;">
                            <i data-tw-merge="" data-lucide="x" class="stroke-[1] h-8 w-8"></i>
                        </a>
                        <div data-tw-merge="" class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 px-6 py-5">
                            <h2 class="mr-auto text-base font-medium">Notifications</h2>
                            <button data-tw-merge="" class="transition duration-200 border shadow-sm items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-secondary text-slate-500 dark:border-darkmode-100/40 dark:text-slate-300 [&:hover:not(:disabled)]:bg-secondary/20 [&:hover:not(:disabled)]:dark:bg-darkmode-100/10 hidden sm:flex"><i data-tw-merge="" data-lucide="shield-check" class="stroke-[1] mr-2 h-4 w-4"></i>
                                Mark all as
                                read</button>
                        </div>
                        <div data-tw-merge="" class="overflow-y-auto flex-1 p-0">
                            <div class="flex flex-col gap-0.5 p-3">
                                <a class="flex items-center rounded-xl px-3 py-2.5 hover:bg-slate-100/80" href="#">
                                    <div>
                                        <div class="image-fit h-11 w-11 overflow-hidden rounded-full border-2 border-slate-200/70">
                                            <img src="dist/images/users/user8-50x50.jpg" alt="Tailwise - Admin Dashboard Template">
                                        </div>
                                    </div>
                                    <div class="sm:ml-5">
                                        <div class="font-medium">Received a friend request</div>
                                        <div class="mt-0.5 text-slate-500">
                                            Friend request from John
                                        </div>
                                        <div class="my-3.5 w-40 rounded-[0.6rem] border bg-slate-50/80 p-1 sm:w-56">
                                            <div class="grid grid-cols-3 overflow-hidden rounded-[0.6rem]">
                                                <div class="image-fit h-12 cursor-pointer overflow-hidden border border-slate-100 saturate-[.6] hover:saturate-100 sm:h-16">
                                                    <img src="dist/images/projects/project5-400x400.jpg" alt="Tailwise - Admin Dashboard Template">
                                                </div>
                                                <div class="image-fit h-12 cursor-pointer overflow-hidden border border-slate-100 saturate-[.6] hover:saturate-100 sm:h-16">
                                                    <img src="dist/images/projects/project4-400x400.jpg" alt="Tailwise - Admin Dashboard Template">
                                                </div>
                                                <div class="image-fit h-12 cursor-pointer overflow-hidden border border-slate-100 saturate-[.6] hover:saturate-100 sm:h-16">
                                                    <img src="dist/images/projects/project4-400x400.jpg" alt="Tailwise - Admin Dashboard Template">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-1.5 text-xs text-slate-500">
                                            Thu Sep 2021
                                        </div>
                                    </div>
                                </a>
                                <a class="flex items-center rounded-xl px-3 py-2.5 hover:bg-slate-100/80" href="#">
                                    <div>
                                        <div class="image-fit h-11 w-11 overflow-hidden rounded-full border-2 border-slate-200/70">
                                            <img src="dist/images/users/user8-50x50.jpg" alt="Tailwise - Admin Dashboard Template">
                                        </div>
                                    </div>
                                    <div class="sm:ml-5">
                                        <div class="font-medium">Posted a status update</div>
                                        <div class="mt-0.5 text-slate-500">
                                            Shared thoughts on the project
                                        </div>
                                        <div class="mt-1.5 text-xs text-slate-500">
                                            Fri Jun 2020
                                        </div>
                                    </div>
                                    <div class="ml-auto h-2 w-2 flex-none rounded-full border border-primary/40 bg-primary/40">
                                    </div>
                                </a>
                                <a class="flex items-center rounded-xl px-3 py-2.5 hover:bg-slate-100/80" href="#">
                                    <div>
                                        <div class="image-fit h-11 w-11 overflow-hidden rounded-full border-2 border-slate-200/70">
                                            <img src="dist/images/users/user8-50x50.jpg" alt="Tailwise - Admin Dashboard Template">
                                        </div>
                                    </div>
                                    <div class="sm:ml-5">
                                        <div class="font-medium">Uploaded video files</div>
                                        <div class="mt-0.5 text-slate-500">
                                            Shared video tutorials
                                        </div>
                                        <div class="mt-1.5 text-xs text-slate-500">
                                            Mon May 2021
                                        </div>
                                    </div>
                                    <div class="ml-auto h-2 w-2 flex-none rounded-full border border-primary/40 bg-primary/40">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
            <!-- END: Notification & User Menu -->
        </div>
    </div>
</div>

<script>
        function updateBreadcrumb() {
            // Get the breadcrumb element
            const breadcrumb = document.getElementById('breadcrumb');

            // Clear existing breadcrumb items (except the first one)
            while (breadcrumb.children.length > 1) {
                breadcrumb.removeChild(breadcrumb.lastChild);
            }

            // Get the current URL path
            const path = window.location.pathname;

            // Split the path into segments
            const segments = path.split('/').filter(segment => segment);

            // Initialize the URL for the breadcrumb links
            let url = '';

            // Loop through the segments and create breadcrumb items
            segments.forEach((segment, index) => {
                url += '/' + segment;

                // Create a list item for the breadcrumb
                const li = document.createElement('li');
                li.className = 'relative ml-5 pl-0.5 before:content-[""] before:w-[14px] before:h-[14px] before:bg-chevron-white before:transform before:rotate-[-90deg] before:bg-[length:100%] before:-ml-[1.125rem] before:absolute before:my-auto before:inset-y-0 dark:before:bg-chevron-white';

                if (index === segments.length - 1) {
                    li.classList.add('text-white/70');
                }

                // Format the segment text
                const formattedSegment = segment
                    .replace(/_/g, ' ') // Replace underscores with spaces
                    .replace(/\b\w/g, char => char.toUpperCase()); // Capitalize each word

                // Create an anchor element for the breadcrumb link
                const a = document.createElement('a');
                a.href = url;
                a.textContent = formattedSegment;

                // Append the anchor to the list item
                li.appendChild(a);

                // Append the list item to the breadcrumb
                breadcrumb.appendChild(li);
            });
        }

        // Update the breadcrumb on initial load
        updateBreadcrumb();

        
    </script>