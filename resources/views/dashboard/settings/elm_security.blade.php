<div class="box box--stacked flex flex-col p-5">
<form id="resetForm" action="{{ $apiUrlChangePassword }}">
    <div class="mb-6 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
    {{ $page_title }}
    </div>
    <div>
        <div class="mt-5 block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
            <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-64">
                <div class="text-left">
                    <div class="flex items-center">
                        <div class="font-medium">Current Password</div>
                        <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                            Required
                        </div>
                    </div>
                    <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                        Enter your current password to verify your identity.
                    </div>
                </div>
            </div>
<<<<<<< HEAD
            <div class="mt-3 w-full flex-1 xl:mt-0">
                <input name="current_password" data-tw-merge="" type="password" required placeholder="**********" class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                <button 
                            type="button" 
                            class="absolute inset-y-0 right-0 flex items-center pr-3 mr-4"
                            onclick="togglePassword('confirm-password')"
                            aria-label="Toggle password visibility"
                        >
                            <svg
                                class="h-4 w-7 text-gray-700" 
                                fill="none" 
                                xmlns="http://www.w3.org/2000/svg" 
                                viewBox="0 0 576 512"
                            >
                            <path 
                                id="eyeIconConfirm" 
                                fill="currentColor" 
                                d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z" 
                            />
                        </svg>
                    </button>
=======
            <div class="mt-3 w-full flex-1 xl:mt-0 relative">
                <input name="current_password" id="password" data-tw-merge="" type="password" required placeholder="P**********d" class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                <button 
                    type="button" 
                    class="absolute inset-y-0 right-0 flex items-center mr-3"
                    onclick="togglePassword('password')"
                    aria-label="Toggle password visibility"
                >
                    <svg
                        class="h-4 w-7 text-gray-700" 
                        fill="none" 
                        xmlns="http://www.w3.org/2000/svg" 
                        viewBox="0 0 576 512"
                    >
                        <path 
                            id="eyeIcon" 
                            fill="currentColor" 
                            d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z" 
                        />
                        
                    </svg>
                </button>
>>>>>>> 049213451d5eb5a639eca77b30b36c50412800fb
            </div>
        </div>
        <div class="mt-5 block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
            <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-64">
                <div class="text-left">
                    <div class="flex items-center">
                        <div class="font-medium">New Password</div>
                        <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                            Required
                        </div>
                    </div>
                    <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                        Create a new password for your account.
                    </div>
                </div>
            </div>
<<<<<<< HEAD
            <div class="mt-3 w-full flex-1 xl:mt-0">
                <input name="password" id="password" data-tw-merge="" oninput="checkPasswordStrength()" type="password" required placeholder="**********" class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                <button 
                        type="button" 
                        class="absolute inset-y-0 right-0 flex items-center pr-3 mr-4"
                        onclick="togglePassword('confirm-password')"
                        aria-label="Toggle password visibility"
                    >
                        <svg
                            class="h-4 w-7 text-gray-700" 
                            fill="none" 
                            xmlns="http://www.w3.org/2000/svg" 
                            viewBox="0 0 576 512"
                        >
                        <path 
                            id="eyeIconConfirm" 
                            fill="currentColor" 
                            d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z" 
                        />
                    </svg>
                </button>
                <div class="mt-3.5 grid h-1.5 w-full grid-cols-12 gap-4">
                    <div id="strength-level-1" class="col-span-3 h-full rounded border border-slate-400/20 bg-slate-400/30 [&.active]:border-theme-1/20 [&.active]:bg-theme-1/30">
                    </div>
                    <div id="strength-level-2" class="col-span-3 h-full rounded border border-slate-400/20 bg-slate-400/30 [&.active]:border-theme-1/20 [&.active]:bg-theme-1/30">
                    </div>
                    <div id="strength-level-3" class="col-span-3 h-full rounded border border-slate-400/20 bg-slate-400/30 [&.active]:border-theme-1/20 [&.active]:bg-theme-1/30">
                    </div>
                    <div id="strength-level-4" class="col-span-3 h-full rounded border border-slate-400/20 bg-slate-400/30 [&.active]:border-theme-1/20 [&.active]:bg-theme-1/30">
                    </div>
                </div>
=======
            <div class="mt-3 w-full flex-1 xl:mt-0 relative">
                <input name="password" id="newPassword" data-tw-merge="" type="password" required placeholder="P**********d" class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                <button 
                    type="button" 
                    class="absolute inset-y-0 right-0 flex items-center mr-3"
                    onclick="togglePassword('newPassword')"
                    aria-label="Toggle password visibility"
                >
                    <svg
                        class="h-4 w-7 text-gray-700" 
                        fill="none" 
                        xmlns="http://www.w3.org/2000/svg" 
                        viewBox="0 0 576 512"
                    >
                        <path 
                            id="newPasswordEyeIcon" 
                            fill="currentColor" 
                            d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z" 
                        />
                        
                    </svg>
                </button>
>>>>>>> 049213451d5eb5a639eca77b30b36c50412800fb
            </div>
        </div>
        <div class="mt-5 block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
            <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-64">
                <div class="text-left">
                    <div class="flex items-center">
                        <div class="font-medium">
                            Confirm New Password
                        </div>
                        <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                            Required
                        </div>
                    </div>
                    <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                        Please re-enter the new password you've just chosen.
                    </div>
                </div>
            </div>
            <div class="mt-3 w-full flex-1 xl:mt-0">
<<<<<<< HEAD
                <input name="password_confirmation" id="confirm-password" data-tw-merge="" oninput="validatePasswordMatch()" type="password" required placeholder="**********" class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                <button 
                            type="button" 
                            class="absolute inset-y-0 right-0 flex items-center pr-3 mr-4"
                            onclick="togglePassword('confirm-password')"
                            aria-label="Toggle password visibility"
                        >
                            <svg
                                class="h-4 w-7 text-gray-700" 
                                fill="none" 
                                xmlns="http://www.w3.org/2000/svg" 
                                viewBox="0 0 576 512"
                            >
                            <path 
                                id="eyeIconConfirm" 
                                fill="currentColor" 
                                d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z" 
                            />
                        </svg>
                    </button>
                    <div class="block text-xs text-slate-500/80 sm:text-sm" id="password-match-message"></div>
=======
                <div class="relative">
                    <input name="password_confirmation" id="confimPassword" data-tw-merge="" type="password" required placeholder="P**********d" class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                    <button 
                        type="button" 
                        class="absolute inset-y-0 right-0 flex items-center mr-3"
                        onclick="togglePassword('confimPassword')"
                        aria-label="Toggle password visibility"
                    >
                        <svg
                            class="h-4 w-7 text-gray-700" 
                            fill="none" 
                            xmlns="http://www.w3.org/2000/svg" 
                            viewBox="0 0 576 512"
                        >
                            <path 
                                id="confimPasswordEyeIcon" 
                                fill="currentColor" 
                                d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z" 
                            />
                            
                        </svg>
                    </button>
                </div>
>>>>>>> 049213451d5eb5a639eca77b30b36c50412800fb
                <div class="mt-4 text-slate-500">
                    <div class="font-medium">
                        Password requirements:
                    </div>
                    <ul class="mt-2.5 flex list-disc flex-col gap-1 pl-3 text-slate-500">
                        <li class="pl-0.5">
                            Passwords must be at least 8 characters long.
                        </li>
                        <li class="pl-0.5">
                            Include at least one numeric digit (0-9).
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-6 flex border-t border-dashed border-slate-300/70 pt-5 md:justify-end">
      
    </div>
</from>
</div>
