<div class="side-menu__content z-10 xl:ml-0 xl:z-0 fixed shadow-xl xl:shadow-none w-[275px] border-dotted border-slate-100/60 duration-300 transition-[width,margin] group-[.side-menu--collapsed]:xl:w-[100px] group-[.side-menu--collapsed.side-menu--on-hover]:xl:border-slate-50 group-[.side-menu--collapsed.side-menu--on-hover]:xl:border-solid group-[.side-menu--collapsed.side-menu--on-hover]:xl:shadow-[6px_0_12px_-4px_#0000000f] group-[.side-menu--collapsed.side-menu--on-hover]:xl:w-[275px] xl:pt-[65px] xl:pl-2.5 xl:relative overflow-hidden border-r h-screen flex flex-col before:content-[''] before:transition-colors before:w-screen before:h-screen before:absolute before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat before:bg-slate-10 group-[.side-menu--collapsed.side-menu--on-hover]:xl:before:bg-white after:content-[''] after:fixed after:inset-0 after:bg-black/80 after:z-[-1] after:xl:hidden group-[.side-menu--mobile-menu-open]:ml-0 group-[.side-menu--mobile-menu-open]:after:block -ml-[275px] after:hidden">
    <div class="close-mobile-menu fixed ml-[275px] w-10 h-10 items-center justify-center xl:hidden [&.close-mobile-menu--mobile-menu-open]:flex hidden">
        <a class="ml-5 mt-5" href="#">
            <i data-tw-merge="" data-lucide="x" class="stroke-[1] h-8 w-8 text-white"></i>
        </a>
    </div>
    <div class="scrollable-ref w-full h-full z-20 px-5 mt-3.5 overflow-y-auto overflow-x-hidden bg-white pb-10 [-webkit-mask-image:-webkit-linear-gradient(top,rgba(10,0,0,0),black_30px)] [&:-webkit-scrollbar]:w-0 [&:-webkit-scrollbar]:bg-transparent [&_.simplebar-content]:p-0 [&_.simplebar-track.simplebar-vertical]:w-[10px] [&_.simplebar-track.simplebar-vertical]:mr-0.5 [&_.simplebar-track.simplebar-vertical_.simplebar-scrollbar]:before:bg-slate-400/30">
        <ul class="scrollable">
            <li class="mt-4">
                <a href="{{ url('/dashboard/hrms/') }}" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="layout-dashboard" class="stroke-[1] w-5 h-5 side-menu__link__icon blue-icon"></i>
                    <div class="side-menu__link__title">Quick Overview</div>
                </a>
                
                <!-- END: Second Child -->
            </li>
            
            <li class="side-menu__divider">
                HR OPERATIONS
            </li>
            
            <!-- <li>
                <a href="{{ url('/dashboard/hrms/recruitment/') }}" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="user" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Recruitment</div>
                </a>
                
                END: Second Child -->
            <!-- </li> -->
            
            <li>
                <a href="{{ url('/dashboard/hrms/employee') }}" class="side-menu__link">
                    <i data-tw-merge="" data-lucide="users" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Employee</div>
                </a>
                
                <!-- END: Second Child -->
            </li>
            
            <li>
                <a href="{{ url('/dashboard/hrms/claim') }}" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="wallet-cards" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Expense Claim</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="{{ url('/dashboard/hrms/attendance') }}" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="calendar" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Shift & Attendance</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li>
                <a href="{{ url('/dashboard/hrms/leave') }}" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="briefcase" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Leaves</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li class="side-menu__divider">
                PAYROLL
            </li>
            <li>
                <a href="{{ url('/dashboard/hrms/payout') }}" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="coins" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Salary Payout</div>
                </a>
                <a onClick="redirectTo($(this))" href="javascript:void(0);" data-title="Duluin Gajian Partner" data-href="https://partner.duluin.com" data-target="_blank" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="percent-square" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Duluin Gajian</div>
                </a>
                <!-- BEGIN: Second Child -->
                <!-- END: Second Child -->
            </li>
            <li class="side-menu__divider">
                COMPANY
            </li>
            <li>
                <a href="#" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="rss" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Publication</div>
                    <div class="ml-2.5 rounded-md border bg-blue-young bg-blue-theme px-2 py-0.5 text-xs text-white dark:bg-darkmode-300 dark:text-slate-400 items-end">
                        Soon
                    </div>
                </a>
                <!-- BEGIN: Second Child -->
            </li>
            <li>
                <a href="{{ route('hrms.company') }}" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="app-window" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Companies</div>
                </a>
                <!-- BEGIN: Second Child -->
            </li>
            <li>
                <a href="{{ route('hrms.hr_setting') }}" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="settings" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Settings</div>
                </a>
                <!-- BEGIN: Second Child -->
            </li>
            <li>
                <a href="{{ url('/dashboard/settings/user_account') }}" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="user" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">My Account</div>
                </a>
                <!-- BEGIN: Second Child -->
            </li>
            <li>
                <a href="{{ url('/dashboard/users') }}" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="user-plus" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Users</div>
                </a>
                <!-- BEGIN: Second Child -->
            </li>
            <li>
                <!-- <a href="{{ url('/dashboard/hrms/graph') }}" class="side-menu__link ">
                    <i data-tw-merge="" data-lucide="user-plus" class="stroke-[1] w-5 h-5 side-menu__link__icon"></i>
                    <div class="side-menu__link__title">Graph</div>
                </a> -->
                <!-- BEGIN: Second Child -->
            </li>
        </ul>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const menuLinks = document.querySelectorAll(".side-menu__link");
    const currentPath = window.location.pathname;

    menuLinks.forEach((link) => {
        const linkPath = new URL(link.href).pathname;
         
        if (link.getAttribute("href") === "#") {
            return;
        }
        // Check if the link path matches
        if (linkPath === currentPath) {
            link.classList.add("side-menu__link--active");
        } else {
            link.classList.remove("side-menu__link--active");
        }
    });
});

</script>