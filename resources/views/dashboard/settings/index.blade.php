@extends('layouts.dashboard.app')
@section('content')

<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')

        <div class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
            <div class="container">
                <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                    <div class="col-span-12">
                        <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                            <div class="text-base font-medium group-[.mode--light]:text-white">
                                HRMS Settings
                            </div>
                            <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                                <button data-tw-merge="" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200"><i data-tw-merge="" data-lucide="external-link" class="mr-3 h-4 w-4 stroke-[1.3]"></i>
                                    Go to My Profile</button>
                            </div>
                        </div>
                        <div class="mt-3.5 grid grid-cols-12 gap-x-6 gap-y-10">
                            <div id="menus-page" class="relative col-span-12 xl:col-span-3">
                                <div class="sticky top-[104px]">
                                    <div class="box box--stacked flex flex-col px-5 pb-6 pt-5">
                                        <a id="settings" href="#" class="menu-item flex items-center py-3 first:-mt-3 last:-mb-3 [&.active]:text-primary [&.active]:font-medium hover:text-primary">
                                            <i data-tw-merge="" data-lucide="app-window" class="mr-3 h-4 w-4 stroke-[1.3]"></i>
                                            Profile Info
                                        </a>
                                        <a id="email_setting" href="#" class="menu-item flex items-center py-3 first:-mt-3 last:-mb-3 [&.active]:text-primary [&.active]:font-medium hover:text-primary">
                                            <i data-tw-merge="" data-lucide="mail-check" class="mr-3 h-4 w-4 stroke-[1.3]"></i>
                                            Email Settings
                                        </a>
                                        <a id="security" href="#" class="menu-item flex items-center py-3 first:-mt-3 last:-mb-3 [&.active]:text-primary [&.active]:font-medium hover:text-primary">
                                            <i data-tw-merge="" data-lucide="key-round" class="mr-3 h-4 w-4 stroke-[1.3]"></i>
                                            Security
                                        </a>
                                        <a id="preferences" href="#" class="menu-item flex items-center py-3 first:-mt-3 last:-mb-3 [&.active]:text-primary [&.active]:font-medium hover:text-primary">
                                            <i data-tw-merge="" data-lucide="package-check" class="mr-3 h-4 w-4 stroke-[1.3]"></i>
                                            Preferences
                                        </a>
                                        <a id="notification_setting" href="#" class="menu-item flex items-center py-3 first:-mt-3 last:-mb-3 [&.active]:text-primary [&.active]:font-medium hover:text-primary">
                                            <i data-tw-merge="" data-lucide="bell-dot" class="mr-3 h-4 w-4 stroke-[1.3]"></i>
                                            Notification Settings
                                        </a>
                                        <a id="deactivation" href="#" class="menu-item flex items-center py-3 first:-mt-3 last:-mb-3 [&.active]:text-primary [&.active]:font-medium hover:text-primary">
                                            <i data-tw-merge="" data-lucide="trash2" class="mr-3 h-4 w-4 stroke-[1.3]"></i>
                                            Account Deactivation
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div  id="contents-page" class="col-span-12 flex flex-col gap-y-7 xl:col-span-9">
                                <div id="loading-indicator" class="items-center" style="display: none;">Loading Content...</div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</div>
<script>
document.addEventListener('DOMContentLoaded', async function() {
    const menu = document.getElementById("menus-page");
    const content = document.getElementById("contents-page");
    const loadingIndicator = document.getElementById("loading-indicator");
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    const routes = {
        settings: {
            path: '{{ url('/dashboard/settings') }}',
            element: '{{ url('/dashboard/settings/elm/settings') }}'
        },
        email_setting: {
            path: '{{ url('/dashboard/settings/email_setting') }}',
            element: '{{ url('/dashboard/settings/elm/email_setting') }}'
        },
        security: {
            path: '{{ url('/dashboard/settings/security') }}',
            element: '{{ url('/dashboard/settings/elm/security') }}'
        },
        preferences: {
            path: '{{ url('/dashboard/settings/preferences') }}',
            element: '{{ url('/dashboard/settings/elm/preferences') }}'
        },
        notification_setting: {
            path: '{{ url('/dashboard/settings/notification_setting') }}',
            element: '{{ url('/dashboard/settings/elm/notification_setting') }}'
        },
        deactivation: {
            path: '{{ url('/dashboard/settings/deactivation') }}',
            element: '{{ url('/dashboard/settings/elm/deactivation') }}'
        }
    };

    async function loadContent(url) {
        try {
            loadingIndicator.style.display = 'block';
            const response = await fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': csrfToken
                }
            });
            const data = await response.text();
            content.innerHTML = data;
        } catch (error) {
            console.error('Error loading content:', error);
        } finally {
            loadingIndicator.style.display = 'none';
        }
    }

    async function initializeContent() {
        const initialPath = window.location.pathname.split('/').pop();
        const route = routes[initialPath];

        if (route) {
            await loadContent(route.element);
            history.replaceState(initialPath, '', route.path);
            setActiveClassByPath();
            updateBreadcrumb();
        }
    }

    menu.addEventListener('click', async function(event) {
        const id = event.target?.id;
        const route = routes[id];
        console.log(id);
        if (route) {
            event.preventDefault();
            window.history.pushState(id, '', route.path);
            await loadContent(route.element);
            setActiveClassByPath();
            updateBreadcrumb();
        }
    });

    window.addEventListener('popstate', async function(event) {
        const route = routes[event.state];
        if (route) {
            await loadContent(route.element);
            setActiveClassByPath();
            updateBreadcrumb();
        }
    });

    function setActiveClassByPath() {
        const currentPath = window.location.pathname.split('/').pop();
        const routeKey = Object.keys(routes).find(key => routes[key].path.endsWith(currentPath));
        
        if (routeKey) {
            const menuItems = menu.querySelectorAll('.menu-item');
            menuItems.forEach(item => item.classList.remove('active'));

            const activeItem = menu.querySelector(`#${routeKey}`);
            if (activeItem) {
                activeItem.classList.add('active');
            }
        }
    }

    await initializeContent();
});

</script>
@endsection
