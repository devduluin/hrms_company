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
                        <a href="{{ url('dashboard/hrms/employee') }}" class="flex items-center gap-x-1.5 rounded-full border border-slate-300/70 px-3 py-0.5 hover:bg-slate-50" href="#">
                            <i data-tw-merge="" data-lucide="users2" class="h-4 w-4 stroke-[1.3]"></i>
                            Employees
                        </a>
                        <a href="{{ url('/dashboard/hrms/payout') }}" class="flex items-center gap-x-1.5 rounded-full border border-slate-300/70 px-3 py-0.5 hover:bg-slate-50" href="#">
                            <i data-tw-merge="" data-lucide="coins" class="h-4 w-4 stroke-[1.3]"></i>
                            Salary Payout
                        </a>
                        <a href="{{ url('/dashboard/hrms/attendance') }}" class="flex items-center gap-x-1.5 rounded-full border border-slate-300/70 px-3 py-0.5 hover:bg-slate-50" href="#">
                            <i data-tw-merge="" data-lucide="calendar" class="h-4 w-4 stroke-[1.3]"></i>
                            Shift & Attendance
                        </a>
                        <a href="{{ url('/dashboard/hrms/leave') }}"  class="flex items-center gap-x-1.5 rounded-full border border-slate-300/70 px-3 py-0.5 hover:bg-slate-50" href="#">
                            <i data-tw-merge="" data-lucide="briefcase" class="h-4 w-4 stroke-[1.3]"></i>
                            Leave
                        </a>
                        <div data-tw-merge="" data-tw-placement="bottom-end" class="dropdown relative"><a data-tw-toggle="dropdown" aria-expanded="false" href="javascript:;" class="cursor-pointer flex items-center gap-x-1.5 rounded-full border border-slate-300/70 px-3 py-0.5 hover:bg-slate-50">More
                                <i data-tw-merge="" data-lucide="chevron-down" class="-ml-0.5 h-4 w-4 stroke-[1.3]"></i>
                            </a>
                            <div data-transition="" data-selector=".show" data-enter="transition-all ease-linear duration-150" data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1" data-enter-to="!mt-1 visible opacity-100 translate-y-0" data-leave="transition-all ease-linear duration-150" data-leave-from="!mt-1 visible opacity-100 translate-y-0" data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1" class="dropdown-menu absolute z-[9999] hidden">
                                <div data-tw-merge="" class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600 w-40">
                                    <a href="{{ route('hrms.company') }}"  class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge="" data-lucide="app-window" class="stroke-[1] mr-2 h-4 w-4"></i>
                                    Companies</a>
                                    <a href="{{ route('hrms.hr_setting') }}" class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge="" data-lucide="settings" class="stroke-[1] mr-2 h-4 w-4"></i>
                                    Settings</a>
                                     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 
               
            </div>
        </div>
    </div>
</div>
@push('js')
<script>
    (() => {
        let companyId = localStorage.getItem('company');
        var t = document.querySelector("#quick-search"); // Defined 't' correctly
        var o = tailwind.Modal.getOrCreateInstance(t);
        let resultsContainer = $(".global-search").first();
        let debounceTimer;
        let controller;  // To hold the AbortController for canceling requests

        let errorPage =`<div class="flex flex-col items-center justify-center pb-28 group-[.global-search--show-result]:hidden">
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
            </div>`;

        // Static Menu Data
        const menuData = [
            { label: "Menu", title: "Attendance", description: "Go to the attendance", url: "{{ url('/dashboard/hrms/attendance/attendance') }}" },
            { label: "Menu", title: "Attendance Request", description: "Go to the attendance request", url: "{{ url('/dashboard/hrms/attendance/request') }}" },
            { label: "Menu", title: "Attendance Summary", description: "Go to the attendance summary", url: "{{ url('/dashboard/hrms/attendance/summary') }}" },
            { label: "Menu", title: "Attendance Report", description: "Go to the attendance report", url: "{{ url('/dashboard/hrms/attendance/report') }}" },
            { label: "Menu", title: "Account", description: "Configure your account", url: "{{ url('dashboard/settings/user_account') }}" },
            { label: "Menu", title: "Employees", description: "Go to the employee", url: "{{ url('dashboard/hrms/employee') }}" }
        ];

        // Function to render static menu
        function renderMenu(filteredMenuData) {
            let menuHTML = '';
            if (filteredMenuData.length > 0) {
                menuHTML = `
                        <div class="border-t border-dashed px-5 py-4">
                        <div class="flex items-center">
                            <div class="text-xs uppercase text-slate-500">Menu</div>
                             
                        </div>
                        `;
                filteredMenuData.forEach((menuItem) => {
                    const { label, title, description, url } = menuItem;
                    
                    menuHTML += `
                        <div class="mt-3.5 flex flex-col gap-1">
                        <a href="${url}" class="flex items-center gap-2.5 rounded-md border border-transparent p-1 hover:border-slate-100 hover:bg-slate-50/80 hover:bg-slate-50">
                        <div class="truncate font-medium">${title}</div>
                        <div class="hidden text-slate-500 sm:block">${description}</div>
                           
                        </a>
                        </div>
                    `;
                    
                });
                menuHTML += `</div>`;
            }
            return menuHTML;
        }

        const debounce = (func, delay) => {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(func, delay);
        };

        // Reusable function for AJAX requests
        const fetchResults = async (endpoint, query, options = {}) => {
            if (controller) controller.abort();  // Cancel previous request
            controller = new AbortController();
            const { signal } = controller;

            const { method = "GET", body = null } = options;
            const headers = {
                'Authorization': `Bearer ${appToken}`,
                'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`
            };

            try {
                const response = await $.ajax({
                    url: endpoint,
                    method: method,
                    headers: headers,
                    data: method === "GET" ? { query: query } : null,
                    contentType: headers["Content-Type"] || "application/json",
                    dataType: "json",
                    data: method === "POST" && body ? JSON.stringify(body) : undefined,
                    signal: signal  // Attach the abort signal
                });
                return response;
            } catch (error) {
                 
                return null; 
            }
        };

        // Show modal when Ctrl+K or Cmd+K is pressed
        document.onkeydown = function (e) {
            (e.ctrlKey || e.metaKey) && e.key === "k" && o.show();
        };

        // Focus the input field when the modal is shown
        $(t).on("shown.tw.modal", function () {
            $(t).find("input").first()[0].focus();
        });

        // Add event listener for input changes
        $(t).find("input").first().on("input", async function (e) {
            const query = e.target.value;
            $(".global-search__keyword").first().html(`"${query}"`);

            // If input is empty, reset the results and UI
            if (query.length < 1) {
                resultsContainer.addClass("global-search--show-result");
                resultsContainer.empty();
                $(".global-search__results").first().empty();
                return; // Stop further execution
            }

            debounce(async () => {

                // Filter static menu items based on query
                const filteredMenuData = menuData.filter(item =>
                    item.title.toLowerCase().includes(query.toLowerCase())
                );

                // Render static filtered menu
                let filteredMenuHTML = renderMenu(filteredMenuData);
                resultsContainer.empty().append(filteredMenuHTML);
                
                if (query.length > 0) {
                    resultsContainer.removeClass("global-search--show-result");
                    const defaultBody = {
                        draw: 1,
                        start: 0,
                        length: 4,
                        company_id: companyId,
                        search: query,
                    };
                    const dapartmentUrl = apiUrl + '/v1/companies/department/datatables';
                    const employeetUrl = apiUrl + '/v1/employees/employee/datatables';

                    const requests = [
                        {
                            endpoint: dapartmentUrl,
                            method: "POST",
                            body: { ...defaultBody, search: query },
                            value: { 
                                label: "Department", 
                                title: "department_name", 
                                description: "createdAt", 
                                create: "create", 
                                detail: "update", 
                                url: "id" },
                            linkTemplate: "{{ url('dashboard/hrms/department') }}"
                        },
                        {
                            endpoint: employeetUrl,
                            method: "POST",
                            body: { ...defaultBody, search: query },
                            value: { 
                                label: "Employee", 
                                title: "fullname", 
                                description: ["designation_id_rel", "designation_name"],
                                create: "new_employee", 
                                detail: "edit_employee", 
                                url: "id"
                             },
                            linkTemplate: "{{ url('dashboard/hrms/employee') }}"
                        },
                    ];

                    //resultsContainer.empty(); // Clear previous results

                    try {
                        // Fetch results for all requests
                        const responses = await Promise.all(
                            requests.map(({ endpoint, method, headers, body }) =>
                                fetchResults(endpoint, query, { method, headers, body })
                            )
                        );

                        const groupedResults = new Map();
                        
                        // Process responses
                        responses.forEach((response, index) => {
                            if (response && response.data && response.data.length > 0) {
                                const { value, linkTemplate } = requests[index];
                                console.log(responses);
                                response.data.forEach((item) => {
                                    if (item) {
                                        const label = value.label;
                                        const detail = value.detail;
                                        const create = value.create;
                                        const title = item[value.title];
                                        const url = linkTemplate+'/'+detail+'/'+item[value.url],
                                              linkCreate = linkTemplate+'/'+create;

                                        let description;

                                        // Check if description is an array (nested keys) or a string
                                        if (Array.isArray(value.description)) {
                                            description = item;
                                            for (let key of value.description) {
                                                description = description ? description[key] : undefined;
                                            }
                                        } else {
                                            // If it's a string, directly access the description
                                            description = item[value.description];
                                        }

                                        description = description || "No description available"; // Fallback value

                                        // Check if group exists, if not, create it
                                        if (!groupedResults.has(label)) {
                                            groupedResults.set(label, new Map());
                                        }
                                        console.log(groupedResults);
                                        // Use a unique key (e.g., URL or title) to prevent duplicates
                                        const uniqueKey = url;  // Ensure the key is unique
                                        const group = groupedResults.get(label);
                                        if (!group.has(uniqueKey)) {
                                            group.set(uniqueKey, { title, description, url, linkCreate });
                                        }
                                    }
                                });
                            }
                        });

                        // Render grouped results
                        groupedResults.forEach((group, label) => {
                            let createUrl = '';
                            let groupHTML = `
                                <div class="border-t border-dashed px-5 py-4">
                                    <div class="flex items-center">
                                        <div class="text-xs uppercase text-slate-500">${label}</div>
                                        
                                    </div>
                                    <div class="mt-3.5 flex flex-col gap-1">
                            `;

                            group.forEach(({ title, description, url, linkCreate }) => {
                                createUrl = linkCreate;
                                let customClass = 'truncate font-medium';
                                if(title == '+ Add Department'){
                                    customClass = 'truncate font-medium text-primary';
                                };
                                groupHTML += `
                                    <a href="${url}" class="flex items-center gap-2.5 rounded-md border border-transparent p-1 hover:border-slate-100 hover:bg-slate-50/80">
                                        <div class="${customClass}">${title}</div>
                                        <div class="hidden text-slate-500 sm:block">${description}</div>
                                    </a>
                                `;
                            });

                            groupHTML += `
                                     
                            
                                    <a href="${createUrl}" class="flex items-center gap-2.5 rounded-md border border-transparent p-1 hover:border-slate-100 hover:bg-slate-50/80">
                                        <div class="truncate font-medium text-primary">+ Add ${label}</div>
                                        <div class="hidden text-slate-500 sm:block">...</div>
                                    </a>
                                
                                    
                                    </div>
                                </div>
                            `;

                            resultsContainer.append(groupHTML);
                        });

                        // Handle case when no results are found
                        if (resultsContainer.children().length === 0) {
                            //resultsContainer.next();
                            resultsContainer.append(errorPage);
                        }
                    } catch (error) {
                        //console.error("Failed to fetch search results:", error);
                        //resultsContainer.empty();
                        resultsContainer.append(errorPage);
                    }
                }
            }, 500); // Adjust delay as needed (300ms is typical)
        });
    })();
</script>



@endpush