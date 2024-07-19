<div id="quick-search" aria-hidden="true" tabindex="-1" class="modal group bg-gradient-to-b from-theme-1/50 via-theme-2/50 to-black/50 transition-[visibility,opacity] w-screen h-screen fixed left-0 top-0 overflow-y-hidden z-[60] [&:not(.show)]:duration-[0s,0.2s] [&:not(.show)]:delay-[0.2s,0s] [&:not(.show)]:invisible [&:not(.show)]:opacity-0 [&.show]:visible [&.show]:opacity-100 [&.show]:duration-[0s,0.1s]">
    <div class="relative mx-auto my-2 w-[95%] scale-95 transition-transform group-[.show]:scale-100 sm:mt-40 sm:w-[600px] lg:w-[700px]">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex w-12 items-center justify-center">
                <i data-tw-merge="" data-lucide="search" class="stroke-[1] w-5 h-5 -mr-1.5 text-slate-500"></i>
            </div>
            <input data-tw-merge="" type="text" placeholder="Quick search..." class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full border-slate-200 placeholder:text-slate-400/90 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 rounded-lg border-0 py-3.5 pl-12 pr-14 text-base shadow-lg focus:ring-0">
            <div class="absolute inset-y-0 right-0 flex w-14 items-center">
                <div class="mr-auto rounded-[0.4rem] border bg-slate-100 px-2 py-1 text-xs text-slate-500/80">
                    ESC
                </div>
            </div>
        </div>
        <div class="global-search global-search--show-result group relative z-10 mt-1 max-h-[468px] overflow-y-auto rounded-lg bg-white pb-1 shadow-lg sm:max-h-[615px]">
            <div class="flex flex-col items-center justify-center pb-28 pt-20 group-[.global-search--show-result]:hidden">
                <i data-tw-merge="" data-lucide="search-x" class="h-20 w-20 fill-theme-1/5 stroke-[0.5] text-theme-1/20"></i>
                <div class="mt-5 text-xl font-medium">
                    No result found
                </div>
                <div class="mt-3 w-2/3 text-center leading-relaxed text-slate-500">
                    No results found for
                    <span class="global-search__keyword font-medium italic"></span>
                    . Please try a different search term or check your
                    spelling.
                </div>
            </div>
            <div class="hidden group-[.global-search--show-result]:block">
                <div class="px-5 py-4">
                    <div class="flex items-center">
                        <div class="text-xs uppercase text-slate-500">
                            Start your search here...
                        </div>
                    </div>
                    <div class="mt-3.5 flex flex-wrap gap-2">
                        <a class="flex items-center gap-x-1.5 rounded-full border border-slate-300/70 px-3 py-0.5 hover:bg-slate-50" href="#">
                            <i data-tw-merge="" data-lucide="users2" class="h-4 w-4 stroke-[1.3]"></i>
                            Users
                        </a>
                        <a class="flex items-center gap-x-1.5 rounded-full border border-slate-300/70 px-3 py-0.5 hover:bg-slate-50" href="#">
                            <i data-tw-merge="" data-lucide="building2" class="h-4 w-4 stroke-[1.3]"></i>
                            Departments
                        </a>
                        <a class="flex items-center gap-x-1.5 rounded-full border border-slate-300/70 px-3 py-0.5 hover:bg-slate-50" href="#">
                            <i data-tw-merge="" data-lucide="kanban-square" class="h-4 w-4 stroke-[1.3]"></i>
                            Products
                        </a>
                        <a class="flex items-center gap-x-1.5 rounded-full border border-slate-300/70 px-3 py-0.5 hover:bg-slate-50" href="#">
                            <i data-tw-merge="" data-lucide="mail-check" class="h-4 w-4 stroke-[1.3]"></i>
                            Mails
                        </a>
                        <div data-tw-merge="" data-tw-placement="bottom-end" class="dropdown relative"><a data-tw-toggle="dropdown" aria-expanded="false" href="javascript:;" class="cursor-pointer flex items-center gap-x-1.5 rounded-full border border-slate-300/70 px-3 py-0.5 hover:bg-slate-50">More
                                <i data-tw-merge="" data-lucide="chevron-down" class="-ml-0.5 h-4 w-4 stroke-[1.3]"></i>
                            </a>
                            <div data-transition="" data-selector=".show" data-enter="transition-all ease-linear duration-150" data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1" data-enter-to="!mt-1 visible opacity-100 translate-y-0" data-leave="transition-all ease-linear duration-150" data-leave-from="!mt-1 visible opacity-100 translate-y-0" data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1" class="dropdown-menu absolute z-[9999] hidden">
                                <div data-tw-merge="" class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600 w-40">
                                    <a class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge="" data-lucide="map" class="stroke-[1] mr-2 h-4 w-4"></i>
                                        Locations</a>
                                    <a class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge="" data-lucide="file-check" class="stroke-[1] mr-2 h-4 w-4"></i>
                                        Projects</a>
                                    <a class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge="" data-lucide="printer" class="stroke-[1] mr-2 h-4 w-4"></i>
                                        Devices</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-t border-dashed px-5 py-4">
                    <div class="flex items-center">
                        <div class="text-xs uppercase text-slate-500">
                            Users
                        </div>
                        <a class="ml-auto text-xs text-slate-500" href="#">
                            See All
                        </a>
                    </div>
                    <div class="mt-3.5 flex flex-col gap-1">
                        <a class="flex items-center gap-2.5 rounded-md border border-transparent p-1 hover:border-slate-100 hover:bg-slate-50/80" href="#">
                            <div class="image-fit zoom-in box h-6 w-6 overflow-hidden rounded-full border-2 border-slate-200/70">
                                <img src="dist/images/users/user7-50x50.jpg" alt="Tailwise - Admin Dashboard Template">
                            </div>
                            <div class="truncate font-medium">
                                Johnny Depp
                            </div>
                            <div class="hidden text-slate-500 sm:block">
                                Denver, USA
                            </div>
                        </a>
                        <a class="flex items-center gap-2.5 rounded-md border border-transparent p-1 hover:border-slate-100 hover:bg-slate-50/80" href="#">
                            <div class="image-fit zoom-in box h-6 w-6 overflow-hidden rounded-full border-2 border-slate-200/70">
                                <img src="dist/images/users/user1-50x50.jpg" alt="Tailwise - Admin Dashboard Template">
                            </div>
                            <div class="truncate font-medium">
                                Tom Hanks
                            </div>
                            <div class="hidden text-slate-500 sm:block">
                                New York, USA
                            </div>
                        </a>
                        <a class="flex items-center gap-2.5 rounded-md border border-transparent p-1 hover:border-slate-100 hover:bg-slate-50/80" href="#">
                            <div class="image-fit zoom-in box h-6 w-6 overflow-hidden rounded-full border-2 border-slate-200/70">
                                <img src="dist/images/users/user8-50x50.jpg" alt="Tailwise - Admin Dashboard Template">
                            </div>
                            <div class="truncate font-medium">
                                Cate Blanchett
                            </div>
                            <div class="hidden text-slate-500 sm:block">
                                Houston, USA
                            </div>
                        </a>
                    </div>
                </div>
                <div class="border-t border-dashed px-5 py-4">
                    <div class="flex items-center">
                        <div class="text-xs uppercase text-slate-500">
                            Departments
                        </div>
                        <a class="ml-auto text-xs text-slate-500" href="#">
                            See All
                        </a>
                    </div>
                    <div class="mt-3.5 flex flex-col gap-1">
                        <a class="flex items-center gap-2.5 rounded-md border border-transparent p-1 hover:border-slate-100 hover:bg-slate-50/80" href="#">
                            <div class="zoom-in box flex h-6 w-6 items-center justify-center overflow-hidden rounded-md border border-theme-1/10 bg-theme-1/10">
                                <i data-tw-merge="" data-lucide="store" class="h-3.5 w-3.5 stroke-[1.3] text-theme-1"></i>
                            </div>
                            <div class="truncate font-medium">
                                Product Management
                            </div>
                            <div class="hidden text-slate-500 sm:block">
                                Kyrgyzstan
                            </div>
                        </a>
                        <a class="flex items-center gap-2.5 rounded-md border border-transparent p-1 hover:border-slate-100 hover:bg-slate-50/80" href="#">
                            <div class="zoom-in box flex h-6 w-6 items-center justify-center overflow-hidden rounded-md border border-theme-1/10 bg-theme-1/10">
                                <i data-tw-merge="" data-lucide="store" class="h-3.5 w-3.5 stroke-[1.3] text-theme-1"></i>
                            </div>
                            <div class="truncate font-medium">
                                Customer Support
                            </div>
                            <div class="hidden text-slate-500 sm:block">
                                Bouvet Island
                            </div>
                        </a>
                        <a class="flex items-center gap-2.5 rounded-md border border-transparent p-1 hover:border-slate-100 hover:bg-slate-50/80" href="#">
                            <div class="zoom-in box flex h-6 w-6 items-center justify-center overflow-hidden rounded-md border border-theme-1/10 bg-theme-1/10">
                                <i data-tw-merge="" data-lucide="store" class="h-3.5 w-3.5 stroke-[1.3] text-theme-1"></i>
                            </div>
                            <div class="truncate font-medium">
                                Marketing
                            </div>
                            <div class="hidden text-slate-500 sm:block">
                                Haiti
                            </div>
                        </a>
                    </div>
                </div>
                <div class="border-t border-dashed px-5 py-4">
                    <div class="flex items-center">
                        <div class="text-xs uppercase text-slate-500">
                            Products
                        </div>
                        <a class="ml-auto text-xs text-slate-500" href="#">
                            See All
                        </a>
                    </div>
                    <div class="mt-3.5 flex flex-col gap-1">
                        <a class="flex items-center gap-2.5 rounded-md border border-transparent p-1 hover:border-slate-100 hover:bg-slate-50/80" href="#">
                            <div class="image-fit zoom-in box h-6 w-6 overflow-hidden rounded-full border-2 border-slate-200/70">
                                <img src="dist/images/products/product2-400x400.jpg" alt="Tailwise - Admin Dashboard Template">
                            </div>
                            <div class="truncate font-medium">
                                High-Performance Laptop
                            </div>
                            <div class="hidden text-slate-500 sm:block">
                                Food & Grocery
                            </div>
                        </a>
                        <a class="flex items-center gap-2.5 rounded-md border border-transparent p-1 hover:border-slate-100 hover:bg-slate-50/80" href="#">
                            <div class="image-fit zoom-in box h-6 w-6 overflow-hidden rounded-full border-2 border-slate-200/70">
                                <img src="dist/images/products/product4-400x400.jpg" alt="Tailwise - Admin Dashboard Template">
                            </div>
                            <div class="truncate font-medium">
                                Smartphone Charging Dock
                            </div>
                            <div class="hidden text-slate-500 sm:block">
                                Home & Garden
                            </div>
                        </a>
                        <a class="flex items-center gap-2.5 rounded-md border border-transparent p-1 hover:border-slate-100 hover:bg-slate-50/80" href="#">
                            <div class="image-fit zoom-in box h-6 w-6 overflow-hidden rounded-full border-2 border-slate-200/70">
                                <img src="dist/images/products/product4-400x400.jpg" alt="Tailwise - Admin Dashboard Template">
                            </div>
                            <div class="truncate font-medium">
                                Wireless Noise-Cancelling Headphones
                            </div>
                            <div class="hidden text-slate-500 sm:block">
                                Food & Grocery
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>