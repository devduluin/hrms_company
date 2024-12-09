@extends('layouts.dashboard.app')

<header class="bg-white shadow-md py-2 px-6">
    <div class="header-bottom__area header-bottom__plr-5 header-bottom__transparent z-index-3 white-bg">
        <div class="container-fluid g-0">
            <div class="flex g-0 align-items-center">
                <div class="col-xl-2 col-lg-2 col-md-6 col-6">
                    <img class="h-14 w-auto" src="{{ asset('img/logo/Logo-Duluin.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</header>

    <div style="background: linear-gradient(135deg, #1DA4A4, #076759); height: calc(100vh - 68px);" class="flex">
        
            <div class="hidden lg:flex h-full w-1/2 justify-center">
                <img src="{{ asset('img/hero-img-duluin-v6.webp') }}" class="mt-10" loading="lazy" alt="">
            </div>
            <div class="w-3/4 min-h-64 max-h-80 place-content-center justify-center">
                <div class="rounded overflow-hidden shadow-lg bg-white w-3/4 justify-center">
                    <div class="flex flex-col px-6 py-4">
                        <div class="font-bold text-xl mb-2" id="success">The Coldest Sunset</div>
                        <div id="success-icon" class="m-20 flex justify-center"></div>
                        <div class="text-gray-700 text-base text-center" id="message">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                        </div>
                    </div>
                </div>
            </div>
        
    </div>

</div>

@push('js')
    <script>
        let success = "";
        let message = "";

        async function fetchData() {
            try {
                const urlParams = new URLSearchParams(window.location.search);
                success = urlParams.get("success");
                message = urlParams.get("message");

                if (success === "true") {
                    document.getElementById("success").textContent = "Verification Success";
                    document.getElementById("success").classList = "text-success font-bold text-xl mb-2 text-center";
                    document.getElementById("success-icon").innerHTML = "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' class='w-16'><path fill='green' fill-rule='evenodd' d='M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z' clip-rule='evenodd' /></svg>";
                    document.getElementById("message").textContent = JSON.parse(message) || "You have successfully verified your account";
                } else
                if (success === "false") {
                    document.getElementById("success").textContent = "Verification Failed";
                    document.getElementById("success").classList = "text-red-600 font-bold text-xl mb-2 text-center";
                    document.getElementById("success-icon").innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="red" class="w-16"><path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" /></svg>';
                    document.getElementById("message").textContent = JSON.parse(message);
                }
            } catch (error) {
                console.error("Error fetching data:", error);
                document.getElementById("success").textContent = "Verification Failed";
                document.getElementById("success").classList = "text-red-600 font-bold text-xl mb-2 text-center";
                document.getElementById("success-icon").innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="red" class="w-16"><path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" /></svg>';
                document.getElementById("message").textContent = JSON.parse(error);
            }
        }

        document.addEventListener("DOMContentLoaded", fetchData);
    </script>
@endpush