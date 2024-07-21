@extends('layouts.auth.app')
@section('content')
<div id="auth-content" class="container grid grid-cols-12 px-5 py-10 sm:px-10 sm:py-14 md:px-36 lg:h-screen lg:max-w-[1550px] lg:py-0 lg:pl-14 lg:pr-12 xl:px-24 2xl:max-w-[1750px]">
    
        <div id="activate" style="display: none;" class="relative z-50 h-full col-span-12 p-7 sm:p-14 bg-white rounded-2xl lg:bg-transparent lg:pr-10 lg:col-span-5 xl:pr-24 2xl:col-span-4 lg:p-0 before:content-[''] before:absolute before:inset-0 before:-mb-3.5 before:bg-white/40 before:rounded-2xl before:mx-5">  
        <div class="relative z-10 flex flex-col justify-center w-full h-full py-2 lg:py-32">
                <div class="mt-10">
                    <div class="flex flex-col items-center pt-5">
                        <div class="flex items-center justify-center w-16 h-16 border-4 rounded-full border-white/70 bg-primary">
                            <i data-tw-merge="" data-lucide="check" class="h-8 w-8 stroke-[1.5] text-white"></i>
                        </div>
                        <div class="mt-5 text-xl font-medium text-center">
                         HRMS Account is Created
                        </div>
                        <div class="mt-0.5 px-8 text-center text-slate-500"><br>
                            Your domain  <b>{{ url('/') }}</b> has been successfully created. Please <b>Activate</b> 
                            your account and reload the page!
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="loading-indicator" style="display: none;"></div>
</div>

@include('layouts.auth.secondary')
<script>
	
document.addEventListener('DOMContentLoaded', async function() {
    const authContent = document.getElementById("auth-content");
    const loadingIndicator = document.getElementById("loading-indicator");
    const activate = document.getElementById("activate");
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    const routes = {
        signup: {
            path: '{{ url('/signup') }}',
            element: '{{ url('/elm/signup') }}'
        },
        signin: {
            path: '{{ url('/signin') }}',
            element: '{{ url('/elm/signin') }}'
        },
        forgot_password: {
            path: '{{ url('/forgot_password') }}',
            element: '{{ url('/elm/forgot_password') }}'
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
            if(response.redirected != true){
            
                const data = await response.text();
                authContent.innerHTML = data;
            }else{
                activate.style.display = 'block';
            }
        } catch (error) {
            console.error('Error loading content:', error);
        } finally {
            loadingIndicator.style.display = 'none';
        }
    }

    async function initializeContent() {
        const initialPath = window.location.pathname.split('/').pop();
        if(initialPath == 'unactivated'){
            activate.style.display = 'block';
        }
        
        const route = routes[initialPath];

        if (route) {
            await loadContent(route.element);
            history.replaceState(initialPath, '', route.path);
        }
    }

    authContent.addEventListener('click', async function(event) {
        const id = event.target?.id;
        const route = routes[id];

        if (route) {
            event.preventDefault();
            window.history.pushState(id, '', route.path);
            await loadContent(route.element);
        }
    });

    window.addEventListener('popstate', async function(event) {
        const route = routes[event.state];
        if (route) {
            await loadContent(route.element);
        }
    });
	
	window.addEventListener('focus', async function() {
        const initialPath = window.location.pathname.split('/').pop();
        if(initialPath == 'unactivated'){
            //activate.style.display = 'block';
            const route = routes['signin'];
        
		    window.history.pushState('signin', '', route.path);
            await loadContent(route.element);
        }else{
            await initializeContent();
        }
		
        
	});

    await initializeContent();
});

</script>
@endsection
    