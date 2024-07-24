@extends('layouts.dashboard.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')
       
        <div id="contents-page" class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
            <div class="container">
                <div class="font-medium text-xl mb-8">
                  New Job Applicant
                </div>
                <div class="grid grid-cols-2 gap-5 mt-4">
                    <div>
                        <label for="applicant-name" class="block text-sm font-medium text-gray-700">Applicant Name</label>
                        <input type="text" id="applicant-name" name="applicant-name" class="mt-5 p-2 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="job-opening" class="block text-sm font-medium text-gray-700">Job Opening</label>
                        <input type="text" id="job-opening" name="job-opening" class="mt-5 p-2 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-5 mt-4">
                    <div>
                        <label for="applicant-name" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input type="text" id="applicant-name" name="applicant-name" class="mt-5 p-2 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="job-opening" class="block text-sm font-medium text-gray-700">Designation</label>
                        <input type="text" id="job-opening" name="job-opening" class="mt-5 p-2 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-5 mt-4">
                    <div>
                        <label for="applicant-name" class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <input type="text" id="applicant-name" name="applicant-name" class="mt-5 p-2 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="job-opening" class="block text-sm font-medium text-gray-700">Status</label>
                        <input type="text" id="job-opening" name="job-opening" class="mt-5 p-2 block w-full border border-gray-200 rounded-md  focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
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
                                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                        <span class="ml-auto">Browse</span>
                                        <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                    </label>
                                    <span class="mx-1">or drag & drop files</span>
                                </div>
                                <p class="text-xs text-gray-500">
                                    Supported formats: pdf, jpg, gif, doc, docx, csv
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end gap-5 mt-4 mx-auto ">
                    <div>
                      <a href="" class="inline-flex items-center px-4 py-2 bg-white border border-blue-600 text-blue-600 text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                          Cancel
                      </a>
                    </div>
                    <div>
                      <a href="" class="inline-flex items-center px-4 py-2 bg-blue-600 border  text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                          Save
                      </a>
                    </div>
                </div>
                <div id="loading-indicator" class="items-center" style="display: none;"></div>
            </div>
        </div>
        
        
    
</div>
<script>
document.addEventListener('DOMContentLoaded', async function() {
    const menu = document.getElementById("contents-page");
    const content = document.getElementById("contents-page");
    const loadingIndicator = document.getElementById("loading-indicator");
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    const routes = {
        
        employees: {
            path: '{{ url('/dashboard/hrms/employees') }}',
            element: '{{ url('/dashboard/hrms/elm/employees') }}'
        },
        duluin_gajian: {
            path: '{{ url('/dashboard/hrms/duluin_gajian') }}',
            element: '{{ url('/dashboard/hrms/elm/duluin_gajian') }}'
        },
       
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
    let target = event.target;
        while (target && target.tagName !== 'A') {
            target = target.parentElement;
        }
        
        if (target) {
            const id = target?.id;
            const route = routes[id];            
            if (route) {
                event.preventDefault();
                window.history.pushState(id, '', route.path);
                await loadContent(route.element);
                setActiveClassByPath();
                updateBreadcrumb();
            }
        }
    });

    window.addEventListener('popstate', async function(event) {
        const route = routes[event.state];
        console.log(route);
        if (route) {
            await loadContent(route.element);
            setActiveClassByPath();
            updateBreadcrumb();
        }else {
        
        location.reload();
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

