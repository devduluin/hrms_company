<div class="relative z-50 h-full col-span-12 p-7 sm:p-14 bg-white rounded-2xl lg:bg-transparent lg:pr-10 lg:col-span-5 xl:pr-24 2xl:col-span-4 lg:p-0 before:content-[''] before:absolute before:inset-0 before:-mb-3.5 before:bg-white/40 before:rounded-2xl before:mx-5">
        <div class="relative z-10 flex flex-col justify-center w-full h-full py-2 lg:py-32">
            <div class="flex h-[55px] w-[55px] items-center justify-center rounded-[0.8rem] border border-primary/30">
                <div class="relative flex h-[50px] w-[50px] items-center justify-center rounded-[0.6rem] bg-white bg-gradient-to-b from-theme-1/90 to-theme-2/90">
                    <div class="relative h-[26px] w-[26px] -rotate-45 [&_div]:bg-white">
                        <div class="absolute inset-y-0 left-0 my-auto h-[75%] w-[20%] rounded-full opacity-50"></div>
                        <div class="absolute inset-0 m-auto h-[120%] w-[20%] rounded-full"></div>
                        <div class="absolute inset-y-0 right-0 my-auto h-[75%] w-[20%] rounded-full opacity-50"></div>
                    </div>
                </div>
            </div>
            <div class="mt-10">
                <div class="text-2xl font-medium">Sign In</div>
                <div class="mt-2.5 text-slate-600">
                    Don't have an account?
                    <a class="font-medium text-primary" href="#" id="signup">
                        Sign Up
                    </a>
                </div>
                <form id="login-form" method="post" action="{{ url('auth/signin') }}" autocomplete="off" novalidate class="login-form"> 
                @csrf
                <div class="mt-6">
                    <label data-tw-merge="" class="inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right">
                        Email*
                    </label>
                    <input name="email" id="email" data-tw-merge="" type="text" placeholder="Your Email" class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm shadow-sm placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 block rounded-[0.6rem] border-slate-300/80 px-4 py-3.5">
                    <label data-tw-merge="" class="inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right mt-4">
                        Password
                    </label>
                    <div class="relative">
                        <input name="password" id="password" data-tw-merge="" type="password" placeholder="************" class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm shadow-sm placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 block rounded-[0.6rem] border-slate-300/80 px-4 py-3.5">
                        <button 
                            type="button" 
                            class="absolute inset-y-0 right-0 flex items-center pr-3 mr-5"
                            onclick="togglePassword('password')"
                            aria-label="Toggle password visibility"
                        >
                            <svg 
                                id="eyeIcon" 
                                class="h-5 w-5 text-gray-700" 
                                fill="none" 
                                xmlns="http://www.w3.org/2000/svg" 
                                viewBox="0 0 576 512"
                            >
                                <path 
                                    id="icon" 
                                    fill="currentColor" 
                                    d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"
                                />
                            </svg>
                        </button>
                    </div>
                    <div class="flex mt-4 text-xs text-slate-500 sm:text-sm">
                        <div class="flex items-center mr-auto">
                            <input name="remember_me" data-tw-merge="" type="checkbox" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&[type='radio']]:checked:bg-primary [&[type='radio']]:checked:border-primary [&[type='radio']]:checked:border-opacity-10 [&[type='checkbox']]:checked:bg-primary [&[type='checkbox']]:checked:border-primary [&[type='checkbox']]:checked:border-opacity-10 [&:disabled:not(:checked)]:bg-slate-100 [&:disabled:not(:checked)]:cursor-not-allowed [&:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&:disabled:checked]:opacity-70 [&:disabled:checked]:cursor-not-allowed [&:disabled:checked]:dark:bg-darkmode-800/50 mr-2.5 border" id="remember-me">
                            <label class="cursor-pointer select-none" for="remember-me">
                                Remember me
                            </label>
                        </div>
                        <a id="forgot_password" href="{{ url('forgot_password') }}">Forgot Password?</a>
                    </div>
                    <div class="mt-5 text-center xl:mt-8 xl:text-left">
                        <button type="submit" class="transition duration-200 border shadow-sm inline-flex items-center justify-center px-3 font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary rounded-full w-full bg-gradient-to-r from-theme-1/70 to-theme-2/70 py-3.5 xl:mr-3">Sign In</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
