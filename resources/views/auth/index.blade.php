@extends('layouts.auth.app')
@section('content')
    <style>
        .validation-error {
            border-color: red;
            /* Highlight the input with a red border */
        }

        .validation-error-message {
            color: red;
            font-size: 0.9em;
            margin-top: 0.25em;
        }
    </style>
    <div id="auth-content"
        class="container grid grid-cols-12 px-5 py-10 sm:px-10 sm:py-14 md:px-36 lg:h-screen lg:max-w-[1550px] lg:py-0 lg:pl-14 lg:pr-12 xl:px-24 2xl:max-w-[1750px]">

        <div id="activate" style="display: none;"
            class="relative z-50 h-full col-span-12 p-7 sm:p-14 bg-white rounded-2xl lg:bg-transparent lg:pr-10 lg:col-span-5 xl:pr-24 2xl:col-span-4 lg:p-0 before:content-[''] before:absolute before:inset-0 before:-mb-3.5 before:bg-white/40 before:rounded-2xl before:mx-5">
            <div class="relative z-10 flex flex-col justify-center w-full h-full py-2 lg:py-32">
                <div class="mt-10">
                    <div class="flex flex-col items-center pt-5">
                        <div
                            class="flex items-center justify-center w-16 h-16 border-4 rounded-full border-white/70 bg-primary">
                            <i data-tw-merge="" data-lucide="check" class="h-8 w-8 stroke-[1.5] text-white"></i>
                        </div>
                        <div class="mt-5 text-xl font-medium text-center">
                            HRMS Account is Created
                        </div>
                        <div class="mt-0.5 px-8 text-center text-slate-500"><br>
                            Your domain <b>{{ url('/') }}</b> has been successfully created. Please <b>Activate</b>
                            your account and reload the page!
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="loading-indicator" style="display: none;"></div>
    </div>

    @include('layouts.auth.secondary')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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
                activate_account: {
                    path: '{{ url('/signup/activate_account') }}',
                    element: '{{ url('/elm/activate_account') }}'
                },
                forgot_password: {
                    path: '{{ url('/forgot_password') }}',
                    element: '{{ url('/elm/forgot_password') }}'
                }
            };

            function getQueryParams() {
                const params = new URLSearchParams(window.location.search);
                let paramObj = {};
                params.forEach((value, key) => {
                    paramObj[key] = value;
                });
                return params;
            }

            async function loadContent(url) {
                const params = getQueryParams();
                if(params){ url = url+'?'+params};
                try {
                    loadingIndicator.style.display = 'block';
                    const response = await fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': csrfToken
                        }
                    });
                    if (response.redirected != true) {

                        const data = await response.text();
                        authContent.innerHTML = data;
                        addFormSubmitListeners();
                    } else {
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
                if (initialPath == 'unactivated') {
                    activate.style.display = 'block';
                }

                const route = routes[initialPath];

                if (route) {
                    await loadContent(route.element);
                   // history.replaceState(initialPath, '', route.path);
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
                if (initialPath == 'unactivated') {
                    //activate.style.display = 'block';
                    const route = routes['signin'];

                    window.history.pushState('signin', '', route.path);
                    await loadContent(route.element);
                } else {
                    await initializeContent();
                }


            });

            async function addFormSubmitListeners() {
                const forms = authContent.querySelectorAll('form');
                forms.forEach(form => {
                    form.addEventListener('submit', async function(event) {
                        event.preventDefault();
                        const formData = new FormData(form);
                        const action = form.action;

                        try {
                            const response = await fetch(action, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': csrfToken,
                                    'X-Requested-With': 'XMLHttpRequest'
                                },
                                body: formData
                            });

                            const result = await response.json();
                            const item = result.result;
                            
                            if (response.status === 200) {
                                 
                                showSuccessNotification('success', result.message);
                                localStorage.setItem('app_token', result.app_token);
                                localStorage.setItem('name', result.name);
                                localStorage.setItem('account', result.account);
                                localStorage.setItem('company', result.company_id);
                                window.location.href = result.redirect;
                            } else if (response.status === 201) {
                                showSuccessNotification('success', result.message);
                                setTimeout(() => {
                                window.location.href = item.redirect;
                                }, "800");
                            } else if (response.status === 302) {
                                setTimeout(() => {
                                    window.location.href = routes['activate_account']['path']+'?user_id='+item.data.id+'&email='+item.data.email+'&phone='+item.data.phone
                                }, "800");
                            }else if (response.status === 303) {
                                showErrorNotification('error', result.message);
                                setTimeout(() => {
                                    window.location.href = routes['signin']['path'];
                                }, "800");
                            } else if (response.status === 422) {
                               
                                showErrorNotification('error', result.message);
                                handleValidationErrors(result.errors);
                            } else {
                                 
                                showErrorNotification('error', result.message);
                            }
                        } catch (error) {
                            console.error('Error submitting form:', error);
                            // toastr.error('An unexpected error occurred.');
                            showErrorNotification('error',
                                'An unexpected error occurred.');
                        }
                    });
                });
            }

            async function handleValidationErrors(errors) {
                // Clear previous error messages
                const errorElements = document.querySelectorAll('.validation-error-message');
                errorElements.forEach(el => el.remove());

                // Clear previous validation error classes
                const errorInputs = document.querySelectorAll('.validation-error');
                errorInputs.forEach(input => input.classList.remove('validation-error'));

                // Display new error messages and add validation-error class
                for (const [field, messages] of Object.entries(errors)) {
                    const input = document.getElementById(field);
                    if (input) {
                        input.classList.add('validation-error'); // Add the class to the input element

                        // Append error messages
                        messages.forEach(message => {
                            const errorElement = document.createElement('div');
                            errorElement.className =
                                'validation-error-message'; // Class for error messages
                            errorElement.style.color = 'red'; // Style as needed
                            errorElement.textContent = message;

                            // Append the error element after the input field
                            input.insertAdjacentElement('afterend', errorElement);
                        });
                    } else {
                        console.warn(`No input field found for ID: ${field}`);
                    }
                }
            }

            await initializeContent();
        });

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
                if(strength >= 3){
                const confirmPassword = document.getElementById('confirm-password')
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
                    const btnSignup = document.getElementById('btnSignup')
                    btnSignup.removeAttribute('disabled');
                //} else {
                    //btnSignup.setAttribute('disabled', 'disabled');
                //}
            } else {
                matchMessage.textContent = "Passwords do not match!";
                matchMessage.className = "text-orange-800 sm:text-sm";
            }
        }


    </script>
@endsection
