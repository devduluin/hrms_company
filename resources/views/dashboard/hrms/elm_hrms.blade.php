
<div class="grid grid-cols-12 gap-x-6 gap-y-10">
    <div class="col-span-12 flex flex-col gap-y-12 2xl:col-span-12">
         
            <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center mb-3" style="justify-content: space-between;">
                <div class="text-lg text-base font-medium 2xl:group-[.mode--light]:text-white">
                    Attendance Statistics
                </div>
                <ul data-tw-merge="" role="tablist" class=" p-0.5 border dark:border-darkmode-400 flex box w-auto rounded-[0.6rem] border-slate-200 bg-white group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] md:ml-auto">
                    <li id="example-1-tab" data-tw-merge="" role="presentation" class="focus-visible:outline-none flex-1 bg-slate-50 first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] group-[.mode--light]:bg-transparent [&_button.active]:text-current group-[.mode--light]:[&_button.active]:border-transparent group-[.mode--light]:[&_button.active]:bg-white/[0.12]">
                        <button data-tw-merge="" data-tw-target="#example-1" role="tab" class="cursor-pointer block appearance-none px-3 border border-transparent transition-colors dark:text-slate-400 [&.active]:text-slate-700 py-1.5 dark:border-transparent [&.active]:border [&.active]:shadow-sm [&.active]:font-medium [&.active]:border-slate-200 [&.active]:bg-white [&.active]:dark:text-slate-300 [&.active]:dark:bg-darkmode-400 [&.active]:dark:border-darkmode-400 active w-full whitespace-nowrap rounded-[0.6rem] text-slate-500 group-[.mode--light]:text-slate-200 md:w-24">Daily</button>
                    </li>
                    <li id="example-2-tab" data-tw-merge="" role="presentation" class="focus-visible:outline-none flex-1 bg-slate-50 first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] group-[.mode--light]:bg-transparent [&_button.active]:text-current group-[.mode--light]:[&_button.active]:border-transparent group-[.mode--light]:[&_button.active]:bg-white/[0.12]">
                        <button data-tw-merge="" data-tw-target="#example-2" role="tab" class="cursor-pointer block appearance-none px-3 border border-transparent transition-colors dark:text-slate-400 [&.active]:text-slate-700 py-1.5 dark:border-transparent [&.active]:border [&.active]:shadow-sm [&.active]:font-medium [&.active]:border-slate-200 [&.active]:bg-white [&.active]:dark:text-slate-300 [&.active]:dark:bg-darkmode-400 [&.active]:dark:border-darkmode-400 w-full whitespace-nowrap rounded-[0.6rem] text-slate-500 group-[.mode--light]:text-slate-200 md:w-24">Weekly</button>
                    </li>
                    <li id="example-3-tab" data-tw-merge="" role="presentation" class="focus-visible:outline-none flex-1 bg-slate-50 first:rounded-l-[0.6rem] last:rounded-r-[0.6rem] group-[.mode--light]:bg-transparent [&_button.active]:text-current group-[.mode--light]:[&_button.active]:border-transparent group-[.mode--light]:[&_button.active]:bg-white/[0.12]">
                        <button data-tw-merge="" data-tw-target="#example-3" role="tab" class="cursor-pointer block appearance-none px-3 border border-transparent transition-colors dark:text-slate-400 [&.active]:text-slate-700 py-1.5 dark:border-transparent [&.active]:border [&.active]:shadow-sm [&.active]:font-medium [&.active]:border-slate-200 [&.active]:bg-white [&.active]:dark:text-slate-300 [&.active]:dark:bg-darkmode-400 [&.active]:dark:border-darkmode-400 w-full whitespace-nowrap rounded-[0.6rem] text-slate-500 group-[.mode--light]:text-slate-200 md:w-24">Monthly</button>
                    </li>
                </ul>
                <div class="ml-5">
                    <a href="{{ url('dashboard/hrms/graph') }}" data-tw-merge=""
                        class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&:hover:not(:disabled)]:bg-slate-100 [&:hover:not(:disabled)]:border-slate-100 [&:hover:not(:disabled)]:dark:border-darkmode-300/80 [&:hover:not(:disabled)]:dark:bg-darkmode-300/80 w-18">
                    Show More
                    <i data-tw-merge="" data-lucide="chevron-right" class=" h-4 w-4 stroke-[1.3]"></i></a>
                </div>
            </div>
            <div class="box box--stacked mt-3.5 mb-2">
                <div class="box box--stacked p-5">
                    <div class="mb-1 mt-2">
                        <div class="mb-1 mt-2">
                            <div class="w-auto h-[150px]">
                                <canvas class="chart report-bar-chart-5"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 flex flex-wrap items-center justify-center gap-x-5 gap-y-3">
                        <div class="flex items-center text-slate-500">
                            <div class="mr-2 h-2 w-2 rounded-full border border-primary/60 bg-primary/60" style="background: rgba(37 99 235);"></div>
                            Total Present
                        </div>
                        <div class="flex items-center text-slate-500">
                            <div class="mr-2 h-2 w-2 rounded-full border border-slate-500/60 bg-slate-500/60" style="background: rgba(239 68 68);"></div>
                            Total Absent
                        </div>
                    </div>
                </div>  
            </div>
            <div class="mt-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    <x-chart.donut 
                        id="genderChart"
                        label="Gender Distribution"
                        apiUrl="{{ $apiGenderChartUrl }}"
                        itemData="gender"
                    />
                
                     <x-chart.donut 
                        id="genderChart"
                        label="Employees Department"
                        apiUrl="{{ $apiDepartmentChartrUrl }}"
                        itemData="department_id"
                    />

                    <x-chart.donut 
                        id="statusEmployeeChart"
                        label="Status Employee"
                        apiUrl="{{ $apiStatusEmployeeUrl }}"
                        itemData="status"
                    /> 
                </div>
            </div>
            <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center mt-5 mb-3">
                <div class="mt-5 ml-2 text-lg text-base font-medium 2xl:group-[.mode--light]:text-white">
                    Main Quick Features
                    <div class="text-sm font-medium pt-2 mr-5">
                    Here, you can swiftly manage your tasks with just a few clicks. Whether you need to manage employees. Dive in and streamline your workday!
                    </div>
                </div>
                <div class="mt-5 flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                    <a a onClick="redirectTo($(this))" href="javascript:void(0);" data-title="Duluin HRMS Documentation" data-href="https://docs.hrms.duluin.com" data-target="_blank"
                        class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md w-52">
                        <i data-tw-merge="" data-lucide="book-open" class="mr-3 h-4 w-4 stroke-[1.3]"></i> Read Documentation
                    </a>
                    
                </div>
            </div>
            <div class="box box--stacked p-4 mt-5 mb-5">
                <div class="grid grid-cols-2 gap-y-5 border-b px-5 py-10 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-4">
                    {{--<a id="employees" class="flex flex-col items-center" href="{{ url('/dashboard/hrms/recruitment/') }}">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full border border-info/10 bg-info/10">
                            <i data-tw-merge="" data-lucide="users" class="stroke-[1] h-6 w-6 fill-info/10 text-info"></i>
                        </div>
                        <div class="mt-3 text-slate-500">Recruitment</div>
                    </a>--}}
                    <a class="flex flex-col items-center relative col-span-4 flex-1 overflow-hidden rounded-[0.6rem] border bg-slate-50/50 p-5 sm:col-span-2 xl:col-span-1 mx-2" href="{{ url('/dashboard/hrms/employee') }}">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full border border-info/10 bg-info/10">
                            <i data-tw-merge="" data-lucide="users" class="stroke-[1] h-6 w-6 fill-info/10
                            text-info"></i>
                        </div>
                        <div class="mt-3 text-slate-500">Employee</div>
                    </a>
                    <a class="flex flex-col items-center relative col-span-4 flex-1 overflow-hidden rounded-[0.6rem] border bg-slate-50/50 p-5 sm:col-span-2 xl:col-span-1 mx-2" href="{{ url('/dashboard/hrms/attendance') }}">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full border border-info/10 bg-info/10">
                            <i data-tw-merge="" data-lucide="calendar" class="stroke-[1] h-6 w-6 fill-info/10 text-info"></i>
                        </div>
                        <div class="mt-3 text-slate-500">Shift & Attendance</div>
                    </a>

                    <a class="flex flex-col items-center relative col-span-4 flex-1 overflow-hidden rounded-[0.6rem] border bg-slate-50/50 p-5 sm:col-span-2 xl:col-span-1 mx-2" href="{{ url('/dashboard/hrms/claim') }}">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full border border-info/10 bg-info/10">
                            <i data-tw-merge="" data-lucide="wallet-cards" class="stroke-[1] h-6 w-6 fill-info/10
                            text-info"></i>
                        </div>
                        <div class="mt-3 text-slate-500">Expense Claim</div>
                    </a>
                    <a class="flex flex-col items-center relative col-span-4 flex-1 overflow-hidden rounded-[0.6rem] border bg-slate-50/50 p-5 sm:col-span-2 xl:col-span-1 mx-2" href="{{ url('/dashboard/hrms/leave') }}">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full border border-info/10 bg-info/10">
                            <i data-tw-merge="" data-lucide="calendar-off" class="stroke-[1] h-6 w-6 fill-info/10
                            text-info"></i>
                        </div>
                        <div class="mt-3 text-slate-500">Leave</div>
                    </a>
                    <a class="flex flex-col items-center relative col-span-4 flex-1 overflow-hidden rounded-[0.6rem] border bg-slate-50/50 p-5 sm:col-span-2 xl:col-span-1 mx-2" href="{{ url('/dashboard/hrms/payout') }}">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full border border-info/10 bg-info/10">
                            <i data-tw-merge="" data-lucide="circle-dollar-sign" class="stroke-[1] h-6 w-6 fill-info/10 text-info"></i>
                        </div>
                        <div class="mt-3 text-slate-500">Payroll</div>
                    </a>
                    <a class="flex flex-col items-center relative col-span-4 flex-1 overflow-hidden rounded-[0.6rem] border bg-slate-50/50 p-5 sm:col-span-2 xl:col-span-1 mx-2" href="{{ route('hrms.company') }}">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full border border-info/10 bg-info/10">
                            <i data-tw-merge="" data-lucide="app-window" class="stroke-[1] h-6 w-6 fill-info/10
                            text-info"></i>
                        </div>
                        <div class="mt-3 text-slate-500">Company</div>
                    </a>
                    <a class="flex flex-col items-center relative col-span-4 flex-1 overflow-hidden rounded-[0.6rem] border bg-slate-50/50 p-5 sm:col-span-2 xl:col-span-1 mx-1" href="{{ url('/dashboard/settings/user_account') }}">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full border border-info/10 bg-info/10">
                            <i data-tw-merge="" data-lucide="user" class="stroke-[1] h-6 w-6 fill-info/10
                            text-info"></i>
                        </div>
                        <div class="mt-3 text-slate-500">My Account</div>
                    </a>
                    <a class="flex flex-col items-center relative col-span-4 flex-1 overflow-hidden rounded-[0.6rem] border bg-slate-50/50 p-5 sm:col-span-2 xl:col-span-1 mx-1" href="{{ url('/dashboard/hrms/hr_setting') }}">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full border border-info/10 bg-info/10">
                            <i data-tw-merge="" data-lucide="settings" class="stroke-[1] h-6 w-6 fill-info/10
                            text-info"></i>
                        </div>
                        <div class="mt-3 text-slate-500">Settings</div>
                    </a>
                </div>
            </div>
         
        <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center mt-5 mb-3">
            <div class="mt-5 ml-2 text-lg text-base font-medium 2xl:group-[.mode--light]:text-white">
                Other Quick Action
                <div class="text-sm font-medium pt-2 mr-5">
                Here, you can swiftly manage your tasks with just a few clicks. Whether you need to manage employees. Dive in and streamline your workday!
                </div>
            </div>
            <div class="mt-5 flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                <a a onClick="redirectTo($(this))" href="javascript:void(0);" data-title="Duluin HRMS Documentation" data-href="https://docs.hrms.duluin.com" data-target="_blank"
                    class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md w-52">
                    <i data-tw-merge="" data-lucide="book-open" class="mr-3 h-4 w-4 stroke-[1.3]"></i> Read Documentation
                </a>
                 
            </div>
            
        </div>
        
        <div class="box box--stacked p-4 mt-5">
             
            
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5 mt-4">
                {{--<x-action  label="New Job Applicant" icon="plus" url="{{ url('/dashboard/hrms/recruitment/create_applicant') }}" />--}}
                <x-action  label="New Employee" icon="plus" url="{{ url('/dashboard/hrms/employee/new_employee') }}" />
                
                <x-action  label="New Shift Assignment" icon="plus" url="{{ url
                ('/dashboard/hrms/attendance/shift-assignment/create') }}" />
                
                <x-action  label="New Holiday List" icon="plus" url="{{ url('/dashboard/hrms/leave/holiday_list') }}" />
                <x-action  label="New Live Type" icon="plus" url="{{ url('/dashboard/hrms/leave-type') }}" />
                <x-action  label="Add Expense Claim" icon="plus" url="{{ url('/dashboard/hrms/claim/expense/create')}}" />
                <x-action  label="Create Salary Slip" icon="plus" url="{{ url('/dashboard/hrms/payout/salary_slip/create')}}" />
                {{--<x-action  label="New Employee Benefit Claim" icon="plus" url="{{ url('/dashboard/hrms/payout/benefit_claim') }}" />--}}
            </div>
            {{--<div class="text-m font-medium mt-4">
                Summary
            </div>
            <div class="text-xs font-medium mt-2">
                This section provides an overall view of the key points covered. Here, you’ll find a quick breakdown of the essential information, allowing you to get a clear understanding
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5 mt-4">
                <x-action  label="Expense Claim Summary" icon="book-text" url="{{ url('/dashboard/hrms/claim/summary') }}" />
                <x-action  label="Attendance Summary" icon="book-text" url="{{ url('/dashboard/hrms/attendance/summary') }}" />
            </div>
            <div class="text-m font-medium mt-4">
                List
            </div>
            <div class="text-xs font-medium mt-2">
                list is a simple and effective way to organize information, making it easy for users to scan and absorb details quickly.
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5 mt-4">
                <x-action  label="Employee Travel List" icon="list" url="{{ url('/dashboard/hrms/claim/travel_list') }}" />
                <x-action  label="Shift List" icon="list" url="{{ url('/dashboard/hrms/attendance/shift_list') }}" />
                <x-action  label="Income Tax Slab List" icon="list" url="{{ url('/dashboard/hrms/payout/tax_slab_list') }}" />
                <x-action  label="Employee Benefit Claim List" icon="list" url="{{ url('/dashboard/hrms/payout/benefit_list') }}" />
            </div>
            <div class="text-m font-medium mt-4">
                Settings
            </div>
            <div class="text-xs font-medium mt-2">
                ASettings allow you to customize your app experience. Whether you're managing your company payroll
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5 mt-4">
                <x-action  label="Payroll Setting" icon="settings" url="{{ url('/dashboard/hrms/payout/settings') }}" />
            </div>--}}
        </div>
    </div>
</div>
