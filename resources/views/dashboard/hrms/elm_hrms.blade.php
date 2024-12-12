
<div class="grid grid-cols-12 gap-x-6 gap-y-10">
    <div class="col-span-12 flex flex-col gap-y-12 2xl:col-span-12">
        <div>
            <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center" style="justify-content: space-between;">
                <div class="text-base font-medium 2xl:group-[.mode--light]:text-white">
                    Statistics
                </div>
                <div class="">
                    <a href="{{ url('dashboard/hrms/graph') }}" data-tw-merge=""
                        class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&:hover:not(:disabled)]:bg-slate-100 [&:hover:not(:disabled)]:border-slate-100 [&:hover:not(:disabled)]:dark:border-darkmode-300/80 [&:hover:not(:disabled)]:dark:bg-darkmode-300/80 w-18">
                    More
                    <i data-tw-merge="" data-lucide="chevron-right" class=" h-4 w-4 stroke-[1.3]"></i></a>
                </div>
            </div>
            <div class="box box--stacked mt-3.5">
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
                        apiUrl="http://apidev.duluin.com/api/v1/employees/employee/report/gender-chart?company_id=c8f745e0-aa6e-458b-bb70-4dda3e2accea"
                        itemData="gender"
                    />
                
                    <x-chart.donut 
                        id="genderChart"
                        label="Staff per Department"
                        apiUrl="http://apidev.duluin.com/api/v1/employees/employee/report/department-chart?company_id=c8f745e0-aa6e-458b-bb70-4dda3e2accea"
                        itemData="department_id"
                    />

                    <x-chart.donut 
                        id="amountChart"
                        label="Expense Claim Amount"
                        apiUrl="https://apidev.duluin.com/api/v1/payroll/expense_claim/report/chart?company_id=c8f745e0-aa6e-458b-bb70-4dda3e2accea"
                        itemData="status"
                    />
                </div>
            </div>
            <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center mt-4">
                <div class="text-base font-medium 2xl:group-[.mode--light]:text-white">
                    Main Quick Features
                </div>
            </div>
            <div class="box box--stacked mt-3.5">
                <div class="grid grid-cols-2 gap-y-5 border-b px-5 py-10 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-4">
                    {{--<a id="employees" class="flex flex-col items-center" href="{{ url('/dashboard/hrms/recruitment/') }}">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full border border-info/10 bg-info/10">
                            <i data-tw-merge="" data-lucide="users" class="stroke-[1] h-6 w-6 fill-info/10 text-info"></i>
                        </div>
                        <div class="mt-3 text-slate-500">Recruitment</div>
                    </a>--}}
                    <a class="flex flex-col items-center" href="{{ url('/dashboard/hrms/employee') }}">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full border border-info/10 bg-info/10">
                            <i data-tw-merge="" data-lucide="users" class="stroke-[1] h-6 w-6 fill-info/10
                            text-info"></i>
                        </div>
                        <div class="mt-3 text-slate-500">Employee</div>
                    </a>
                    <a class="flex flex-col items-center" href="{{ url('/dashboard/hrms/attendance') }}">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full border border-info/10 bg-info/10">
                            <i data-tw-merge="" data-lucide="calendar" class="stroke-[1] h-6 w-6 fill-info/10 text-info"></i>
                        </div>
                        <div class="mt-3 text-slate-500">Shift & Attendance</div>
                    </a>

                    <a class="flex flex-col items-center" href="{{ url('/dashboard/hrms/claim') }}">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full border border-info/10 bg-info/10">
                            <i data-tw-merge="" data-lucide="wallet-cards" class="stroke-[1] h-6 w-6 fill-info/10
                            text-info"></i>
                        </div>
                        <div class="mt-3 text-slate-500">Expense Claim</div>
                    </a>
                    <a class="flex flex-col items-center" href="{{ url('/dashboard/hrms/leave') }}">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full border border-info/10 bg-info/10">
                            <i data-tw-merge="" data-lucide="calendar-off" class="stroke-[1] h-6 w-6 fill-info/10
                            text-info"></i>
                        </div>
                        <div class="mt-3 text-slate-500">Leave</div>
                    </a>
                    <a class="flex flex-col items-center" href="{{ url('/dashboard/hrms/payout') }}">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full border border-info/10 bg-info/10">
                            <i data-tw-merge="" data-lucide="circle-dollar-sign" class="stroke-[1] h-6 w-6 fill-info/10 text-info"></i>
                        </div>
                        <div class="mt-3 text-slate-500">Payroll</div>
                    </a>
                    <a class="flex flex-col items-center" href="{{ route('hrms.company') }}">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full border border-info/10 bg-info/10">
                            <i data-tw-merge="" data-lucide="home" class="stroke-[1] h-6 w-6 fill-info/10
                            text-info"></i>
                        </div>
                        <div class="mt-3 text-slate-500">Company</div>
                    </a>
                    <a class="flex flex-col items-center" href="{{ url('/dashboard/settings/user_account') }}">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full border border-info/10 bg-info/10">
                            <i data-tw-merge="" data-lucide="user" class="stroke-[1] h-6 w-6 fill-info/10
                            text-info"></i>
                        </div>
                        <div class="mt-3 text-slate-500">My Account</div>
                    </a>
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center mt-4">
            <div class="text-base font-medium 2xl:group-[.mode--light]:text-white">
                Other Quick Action
            </div>
        </div>
        <div class="box p-4">
            <div class="text-m font-medium mt-4">
                Adding
            </div>
            <div class="text-xs font-medium mt-2">
                Easily add new items, tasks, or details with just a few clicks. With each addition, you're enhancing your experience and creating a more tailored environment that suits your needs
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5 mt-4">
                {{--<x-action  label="New Job Applicant" icon="plus" url="{{ url('/dashboard/hrms/recruitment/create_applicant') }}" />--}}
                <x-action  label="New Employee" icon="plus" url="{{ url('/dashboard/hrms/employee/new_employee') }}" />
                <x-action  label="Add Expense Claim" icon="plus" url="{{ url('/dashboard/hrms/claim/expense/create')
                }}" />
                <x-action  label="New Shift Assignment" icon="plus" url="{{ url
                ('/dashboard/hrms/attendance/shift-assignment/create') }}" />
                <x-action  label="Create Salary Slip" icon="plus" url="{{ url
                ('/dashboard/hrms/payout/salary_slip/create')
                }}" />
                {{--<x-action  label="New Income Tax Slab" icon="plus" url="{{ url('/dashboard/hrms/payout/income_tax') }}" />--}}
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
