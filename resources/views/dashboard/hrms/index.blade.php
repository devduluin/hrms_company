@extends('layouts.dashboard.app')
@section('content')

<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')
       
        
        <div id="contents-page" class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
            <div class="container">
            @include('dashboard.hrms.elm_hrms')
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
