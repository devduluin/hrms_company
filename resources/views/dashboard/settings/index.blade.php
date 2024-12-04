@extends('layouts.dashboard.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/tom-select.css') }}">
    <div
        class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')

        <div
            class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
            <div class="container">
                <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                    <div class="col-span-12">
                        <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                            <div class="text-base font-medium group-[.mode--light]:text-white">
                                HRMS Settings
                            </div>
                            <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                                <button onclick="history.go(-1)"
                                    class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md w-24">
                                    <i data-tw-merge="" data-lucide="arrow-left" class="mr-3 h-4 w-4 stroke-[1.3]"></i> Back
                                </button>
                                <button id="submitButton" data-tw-merge=""
                                    class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-blue-theme border-blue-theme text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200"><i
                                        data-tw-merge="" data-lucide="save" class="mr-3 h-4 w-4 stroke-[1.3]"></i>
                                    <span id="loadingText">Save Changes</span></button>
                            </div>
                        </div>
                        <div class="mt-3.5 grid grid-cols-12 gap-x-6 gap-y-10">
                            <div id="menus-page" class="relative col-span-12 xl:col-span-3">
                                <div class="sticky top-[104px]">
                                    <div class="box box--stacked flex flex-col px-5 pb-6 pt-5">

                                        <a id="#" href="{{ url('dashboard/settings/user_account') }}"
                                            class="menu-item flex items-center py-3 first:-mt-3 last:-mb-3 [&.active]:text-primary [&.active]:font-medium hover:text-primary">
                                            <i data-tw-merge="" data-lucide="user-check"
                                                class="mr-3 h-4 w-4 stroke-[1.3]"></i>
                                            My Account
                                        </a>
                                        <a id="email_setting" href="#"
                                            class="menu-item flex items-center py-3 first:-mt-3 last:-mb-3 [&.active]:text-primary [&.active]:font-medium hover:text-primary">
                                            <i data-tw-merge="" data-lucide="mail-check"
                                                class="mr-3 h-4 w-4 stroke-[1.3]"></i>
                                            Email Settings
                                        </a>
                                        <a id="" href="{{ url('dashboard/settings/security') }}"
                                            class="menu-item flex items-center py-3 first:-mt-3 last:-mb-3 [&.active]:text-primary [&.active]:font-medium hover:text-primary">
                                            <i data-tw-merge="" data-lucide="key-round"
                                                class="mr-3 h-4 w-4 stroke-[1.3]"></i>
                                            Security
                                        </a>
                                        <a id="#" href="{{ url('dashboard/settings/preferences') }}"
                                            class="menu-item flex items-center py-3 first:-mt-3 last:-mb-3 [&.active]:text-primary [&.active]:font-medium hover:text-primary">
                                            <i data-tw-merge="" data-lucide="package-check"
                                                class="mr-3 h-4 w-4 stroke-[1.3]"></i>
                                            Preferences
                                        </a>
                                        <!-- <a id="notification_setting" href="#"
                                            class="menu-item flex items-center py-3 first:-mt-3 last:-mb-3 [&.active]:text-primary [&.active]:font-medium hover:text-primary">
                                            <i data-tw-merge="" data-lucide="bell-dot"
                                                class="mr-3 h-4 w-4 stroke-[1.3]"></i>
                                            Notification Settings
                                        </a> -->
                                        <a id="deactivation" href="#"
                                            class="menu-item flex items-center py-3 first:-mt-3 last:-mb-3 [&.active]:text-primary [&.active]:font-medium hover:text-primary">
                                            <i data-tw-merge="" data-lucide="trash2" class="mr-3 h-4 w-4 stroke-[1.3]"></i>
                                            Account Deactivation
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div id="contents-page" class="col-span-12 flex flex-col gap-y-7 xl:col-span-9">
                                <div id="loading-indicator" class="items-center" style="display: none;">Loading Content...
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        let loadingText = document.getElementById('loadingText');
        let submitButton = document.getElementById("submitButton");

        async function initializeForm(formName) {
            const form = document.getElementById(formName);
            if (!form) {
                submitButton.disabled = true;
            } else if(form) {
                submitButton.disabled = false;
                // Add event listener to submit button without invoking it immediately
                submitButton.addEventListener('click', (event) => handleSubmit(event, form, submitButton, loadingText));
            }else{
                
            }
       
            
        }

        async function handleSubmit(event, form, submitButton, loadingText) {
             
            // Change button state to loading
            submitButton.disabled = true;
            loadingText.innerHTML = 'Saving...'; // Optionally add a class for styling

            // Trigger form validation
            if (!form.reportValidity()) {
                // If form is invalid, stop the submission
                submitButton.disabled = false;
                loadingText.innerHTML = 'Save Changes';
                return;
            }
            const formData = new FormData(form);
            const data = Object.fromEntries(formData.entries());
            const formMethod = form.getAttribute('method'); 
            try {
                const response = await fetch(form.action, {
                    method: formMethod || 'POST',
                    body: JSON.stringify(data),
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${appToken}`,
                        'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`
                    }
                });
                const result = await response.json();
                if (response.ok) {
                    //console.log('Form submitted successfully');
                    await populateFormInputs();
                    showSuccessNotification(result.message, "The operation was completed successfully.");
                    if(form.id == 'settingForm'){
                        const apiUrl = '{{ $apiUrl }}/users/user';
                        await populateFormInputs(apiUrl);
                    }else if(form.id == 'settingForm-3'){
                        location.reload();
                    }
                } else {
                    //console.error('Error submitting form');
                    
                     
                    showErrorNotification('error', result.message);
                }
            } catch (error) {
                console.error('Error submitting form', error);
            } finally {
                // Restore button state
                submitButton.disabled = false;
                loadingText.innerHTML = 'Save Changes';
            }
        }
    </script>
    <script src="{{ asset('dist/js/vendors/tom-select.js') }}"></script>
    <script src="{{ asset('dist/js/components/base/tom-select.js') }}"></script>
    <script>
        
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        document.addEventListener('DOMContentLoaded', async function() {
            const menu = document.getElementById("menus-page");
            const content = document.getElementById("contents-page");
            const loadingIndicator = document.getElementById("loading-indicator");
            
            const routes = {
                settings: {
                    path: '{{ url('/dashboard/settings') }}',
                    element: '{{ url('/dashboard/settings/elm/user_account') }}',
                },
                user_account: {
                    path: '{{ url('/dashboard/settings/user_account') }}',
                    element: '{{ url('/dashboard/settings/elm/user_account') }}',
                    form: 'settingForm',
                },
                email_setting: {
                    path: '{{ url('/dashboard/settings/email_setting') }}',
                    element: '{{ url('/dashboard/settings/elm/email_setting') }}',
                    form: '',
                },
                security: {
                    path: '{{ url('/dashboard/settings/security') }}',
                    element: '{{ url('/dashboard/settings/elm/security') }}',
                    form: 'resetForm',
                },
                preferences: {
                    path: '{{ url('/dashboard/settings/preferences') }}',
                    element: '{{ url('/dashboard/settings/elm/preferences') }}',
                    form: 'settingForm-3',
                },
                notification_setting: {
                    path: '{{ url('/dashboard/settings/notification_setting') }}',
                    element: '{{ url('/dashboard/settings/elm/notification_setting') }}',
                },
                deactivation: {
                    path: '{{ url('/dashboard/settings/deactivation') }}',
                    element: '{{ url('/dashboard/settings/elm/deactivation') }}',
                }
            };

            async function loadContent(route) {
                const url = route.element;
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
                    if (window.location.pathname.split('/').pop() === 'deactivation') {
                        submitButton.style.display = 'none';
                    } else {
                        submitButton.style.display = '';
                    }
                     
                    console.log();
                    await initializeForm(route.form);
                    initializeTomSelect();
                    if(route.form == 'settingForm'){
                        const apiUrl = '{{ $apiUrl }}/users/user';
                        await populateFormInputs(apiUrl);
                    }else if(route.form == 'settingForm-3'){
                        const apiUrl = '{{ $apiUrl }}/v1/companies/company/'+localStorage.getItem('company');
                        await populateFormInputs(apiUrl);
                    }
                    
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
                     
                    await loadContent(route);
                    
                    history.replaceState(initialPath, '', route.path);
                    setActiveClassByPath();
                    updateBreadcrumb();
                }
            }

            menu.addEventListener('click', async function(event) {
                const id = event.target?.id;
                const route = routes[id];
                 
                if (route) {
                    event.preventDefault();
                    window.history.pushState(id, '', route.path);
                    await loadContent(route);
                    setActiveClassByPath();
                    updateBreadcrumb();
                }
            });

            window.addEventListener('popstate', async function(event) {
                const route = routes[event.state];
                if (route) {
                    await loadContent(route);
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

        async function populateFormInputs(apiUrl) {
                try {
                    const appToken = localStorage.getItem('app_token');
                    const response = await fetch(apiUrl, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': csrfToken,
                            'Authorization': `Bearer ${appToken}`,
                            'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`
                        }
                    });
                    const results = await response.json();
                     

                    const name = document.getElementById('name');
                    const phone = document.getElementById('phone');
                    const email = document.getElementById('email');
                    const last_login = document.getElementById('last_login');
                    const last_login_ip = document.getElementById('last_login_ip');
                    if (name) {
                        name.value = results.result.name;
                    }
                    if (email) {
                        email.value = results.result.email;
                    }
                    if (phone) {
                        phone.value = results.result.phone;
                    }
                    if (last_login) {
                        last_login.value = results.result.last_login;
                    }
                    if (last_login_ip) {
                        last_login_ip.value = results.result.last_login_ip;
                    }
                    if(results.data){
                    $("#language").val(results.data.language);
                    $("#time_zoneSelect").val(results.data.time_zoneSelect);

                    const languageSelect = $('#language')[0].tomselect;
                    const languageValue = results.data.language;
                    if (!languageSelect.options[languageValue]) {
                        languageSelect.addOption({
                            value: languageValue,
                            text: languageValue
                        });
                    }
                    languageSelect.setValue(languageValue);

                    const time_zoneSelect = $('#time_zone')[0].tomselect;
                    const time_zoneValue = results.data.time_zone;
                    if (!time_zoneSelect.options[time_zoneValue]) {
                        time_zoneSelect.addOption({
                            value: time_zoneValue,
                            text: time_zoneValue
                        });
                    }
                    time_zoneSelect.setValue(time_zoneValue);
                    }
                } catch (error) {
                    console.error('Error fetching user data:', error);
                }
            }
        
        function checkPasswordStrength() {
            const password = document.getElementById('password').value;
            
            let strength = 0;

            // Criteria for password strength
            if (password.length >= 8) strength++;  // Length check
            if (/[A-Z]/.test(password)) strength++;  // Uppercase check
            if (/[a-z]/.test(password)) strength++;  // Lowercase check
            if (/[0-9]/.test(password)) strength++;  // Numbers check
            if (/[\W]/.test(password)) strength++;   // Special character check

            // Reset all strength levels
            resetStrengthLevels();

            // Activate levels based on strength
            activateStrengthLevels(strength);

            const confirmPassword = document.getElementById('confirm-password').value;
            if(confirmPassword.length >= 1){
            validatePasswordMatch(); // Check password match when the main password changes
            }
        }

        function resetStrengthLevels() {
            // Remove 'active' class from all levels
            for (let i = 1; i <= 4; i++) {
                document.getElementById(`strength-level-${i}`).classList.remove('active');
            }
        }

        function activateStrengthLevels(strength) {
            // Activate the levels based on the strength
            for (let i = 1; i <= strength && i <= 4; i++) {
                document.getElementById(`strength-level-${i}`).classList.add('active');
            }
                const confirmPassword = document.getElementById('confirm-password')
                if(strength >= 3){
                
                    confirmPassword.removeAttribute('disabled');
                } else {
                    confirmPassword.setAttribute('disabled', 'disabled');
                }

        }


        function validatePasswordMatch(strength) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm-password').value;
            const matchMessage = document.getElementById('password-match-message');

            if (password === confirmPassword) {
                matchMessage.textContent = "";
                
                
                //if(strength >= 3){
                     
                //} else {
                    //btnSignup.setAttribute('disabled', 'disabled');
                //}
            } else {
                matchMessage.textContent = "Passwords do not match!";
                matchMessage.className = "text-orange-800 sm:text-sm";
            }
        }

        function setIconAtributte(iconPath, passwordFieldId) {
            if (passwordFieldId.type === "password") {
                passwordFieldId.type = "text";
                iconPath.setAttribute("d", "M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z");
            } else {
                passwordFieldId.type = "password";
                iconPath.setAttribute("d", "M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z");
            }
        }

        function togglePassword(passwordFieldType) {
            const passwordField = document.getElementById(passwordFieldType);
            const eyeIconPath = document.getElementById("eyeIcon");
            const eyeIconConfirmPath = document.getElementById("eyeIconConfirm");

            if (passwordFieldType === 'confirm-password'){
                setIconAtributte(eyeIconConfirmPath, passwordField);
                console.log(passwordField.type);
            } else {
                setIconAtributte(eyeIconPath, passwordField);            
            }
        }
    </script>
@endsection
