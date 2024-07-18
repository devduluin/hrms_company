@extends('layouts.auth.app')
@section('content')
<div id="auth-content" class="container grid grid-cols-12 px-5 py-10 sm:px-10 sm:py-14 md:px-36 lg:h-screen lg:max-w-[1550px] lg:py-0 lg:pl-14 lg:pr-12 xl:px-24 2xl:max-w-[1750px]">
    <div id="loading-indicator" style="display: none;">Loading...</div>
</div>

@include('layouts.auth.secondary')
<script>
document.addEventListener('DOMContentLoaded', async function() {
    const authContent = document.getElementById("auth-content");
    const loadingIndicator = document.getElementById("loading-indicator");
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
            const data = await response.text();
            authContent.innerHTML = data;
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

    await initializeContent();
});

</script>
@endsection
    