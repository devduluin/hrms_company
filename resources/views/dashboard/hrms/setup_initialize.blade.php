@extends('layouts.dashboard.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/tom-select.css') }}">
    <div
        class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.top_menu_min')

        <div
            class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact">
            <div class="container">
                <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                    <div class="col-span-12">
                        <div class="flex flex-col gap-y-3 md:h-10 md:flex-row mb-7 md:items-center">
                            
                             
                        </div>
                        <div class="mt-3.5 grid grid-cols-12 gap-x-6 gap-y-10">
                             
                            <div id="contents-page" class="col-span-12 flex flex-col gap-y-7 xl:col-span-12">
                             
                            <div class="col-span-6 flex flex-col items-center justify-end sm:col-span-3 xl:col-span-2 pt-[137px]">
                                <span class="h-20 w-20">
                                    <svg class="h-full w-full" width="20" viewBox="0 0 105 105" xmlns="http://www.w3.org/2000/svg" fill="#2d3748">
                                        <circle cx="12.5" cy="12.5" r="12.5">
                                            <animate values="1;.2;1" attributeName="fill-opacity" begin="0s" dur="1s" calcMode="linear" repeatCount="indefinite" />
                                        </circle>
                                        <circle cx="12.5" cy="52.5" r="12.5" fill-opacity=".5">
                                            <animate values="1;.2;1" attributeName="fill-opacity" begin="100ms" dur="1s" calcMode="linear" repeatCount="indefinite" />
                                        </circle>
                                        <circle cx="52.5" cy="12.5" r="12.5">
                                            <animate values="1;.2;1" attributeName="fill-opacity" begin="300ms" dur="1s" calcMode="linear" repeatCount="indefinite" />
                                        </circle>
                                        <circle cx="52.5" cy="52.5" r="12.5">
                                            <animate values="1;.2;1" attributeName="fill-opacity" begin="600ms" dur="1s" calcMode="linear" repeatCount="indefinite" />
                                        </circle>
                                        <circle cx="92.5" cy="12.5" r="12.5">
                                            <animate values="1;.2;1" attributeName="fill-opacity" begin="800ms" dur="1s" calcMode="linear" repeatCount="indefinite" />
                                        </circle>
                                        <circle cx="92.5" cy="52.5" r="12.5">
                                            <animate values="1;.2;1" attributeName="fill-opacity" begin="400ms" dur="1s" calcMode="linear" repeatCount="indefinite" />
                                        </circle>
                                        <circle cx="12.5" cy="92.5" r="12.5">
                                            <animate values="1;.2;1" attributeName="fill-opacity" begin="700ms" dur="1s" calcMode="linear" repeatCount="indefinite" />
                                        </circle>
                                        <circle cx="52.5" cy="92.5" r="12.5">
                                            <animate values="1;.2;1" attributeName="fill-opacity" begin="500ms" dur="1s" calcMode="linear" repeatCount="indefinite" />
                                        </circle>
                                        <circle cx="92.5" cy="92.5" r="12.5">
                                            <animate values="1;.2;1" attributeName="fill-opacity" begin="200ms" dur="1s" calcMode="linear" repeatCount="indefinite" />
                                        </circle>
                                    </svg>
                                </span>
                                <div class="text-sm items-center text-center pt-5 font-normal group-[.mode--light]:text-white">
                                Hi {{ ucwords($user['name']) }},<br> <span class="text-base text-primary pt-2" id="text-preloader">Please wait ! we're preparing your HRMS dashboard.</span>
                                </div>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
<script>
    
    const textPreloader = document.getElementById("text-preloader");
    const preloadMessages = [
        "Please wait! We're preparing your HRMS dashboard.",
        "Loading your data... this won't take long.",
        "Hang tight! Setting up your dashboard.",
        "Almost there... Just a moment.",
        "Gathering everything you need!"
    ];

    function changePreloadText() {
        let messageIndex = 0;
        return setInterval(() => {
            messageIndex = (messageIndex + 1) % preloadMessages.length;
            textPreloader.textContent = preloadMessages[messageIndex];
        }, 4000); // Change text every 2 seconds
    }

    // Start changing preload text
    const preloadInterval = changePreloadText();

    function stopPreloadText(text) {
        clearInterval(preloadInterval); // Stop the interval
        textPreloader.textContent = text;  // Final message
    }
    const data= {"user_id": "{{ $user['id'] }}"};
    async function initialize() {
        try {
            const response = await fetch("{{ $apiUrl }}", {
                method: 'POST',
                data: data,
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer {{ $token }}'
                }
            });

            const result = await response.json();
            console.log(response.status);
            if (response.status == 201) {
                
                setInterval(() => {
                    stopPreloadText("Dashboard HRMS is ready!");
                    window.location.href = "{{ url('dashboard/hrms/?initialize=success') }}";
                }, 10000); 
            } else {
                stopPreloadText(result.message);
                setInterval(() => {
                    initialize()
                }, 10000); 
            }
        } catch (error) {
            console.error('Error submitting form', error);
        } finally {
            // Restore button state
            
            
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        initialize();
    });
</script>

    
@endsection
