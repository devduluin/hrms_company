@extends('layouts.dashboard.app')
@section('content')

<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
@include('layouts.dashboard.menu')
    <div class="content transition-[margin,width] duration-100 px-5 pt-[56px] pb-16 relative z-20 content--compact xl:ml-[275px] [&amp;.content--compact]:xl:ml-[91px]">
        <div class="container mt-[65px]">
            <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                <div class="text-base font-medium group-[.mode--light]:text-white">
                    {{ $title ?? '' }}
                </div>
                <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                    <a href="{{ url('dashboard/hrms') }}" data-tw-merge="" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200"><i data-tw-merge="" data-lucide="arrow-left" class="stroke-[1] w-5 h-5 mx-auto block"></i>
                        back to dashboard</a>
                    <a href="{{ url('dashboard/hrms') }}" data-tw-merge="" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="plus" class="lucide lucide-plus stroke-[1] w-5 h-5 mx-auto block"><path d="M5 12h14"></path><path d="M12 5v14"></path></svg>
                        Add new holiday date</a>
                </div>
            </div>
            <div class="mt-3.5 gap-x-6 gap-y-10">
                <!-- <div class="relative col-span-12 xl:col-span-3">
                    <div class="sticky top-[104px]">
                        @include('components._asside_company')
                    </div>
                </div> -->
                <div class="col-span-12 flex flex-col gap-y-7 xl:col-span-9">
                    <div class="box box--stacked flex flex-col p-5">
                        <x-datatable id="applicantTable" :url="'http://apidev.duluin.com/api/v1/leave-type/datatable'" method="POST" class="display">
                            <x-slot:thead>
                                <th data-value="leave_type_name">Leave type name</th>
                                <th data-value="maximum_leave_allocation_allowed">Maximum leave allocation allowed</th>
                                <th data-value="applicable_after_working_days">Applicable after working days</th>
                            </x-slot:thead>
                        </x-datatable>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="preview relative [&.hide]:overflow-hidden [&.hide]:h-0">
    <div class="text-center">
        <div id="success-notification-content" class="py-5 pl-5 pr-14 bg-white border border-slate-200/60 rounded-lg shadow-xl dark:bg-darkmode-600 dark:text-slate-300 dark:border-darkmode-600 hidden flex">
            <i data-tw-merge="" data-lucide="check-circle" class="stroke-[1] w-5 h-5 text-success"></i>
            <div class="ml-4 mr-4">
                <div class="font-medium" id="success-title">...</div>
                <div class="mt-1 text-slate-500" id="success-message">
                   ...
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
    <script>
        function getStatus(data, type, row, meta) {
            
            if (data === 'active') {
                return `<div class="flex items-center justify-center text-success"><div class="ml-1.5 whitespace-nowrap"><i data-tw-merge data-lucide="check" class="text-success"></i> Active</div></div>`;
            } else {
                return `<div class="flex items-center justify-center text-danger"><div class="ml-1.5 whitespace-nowrap">Inactive</div></div>`;
            }
        }

        function getActionBtn(data, type, row, meta) {
            return `<div data-tw-merge data-tw-placement="bottom-end" class="dropdown relative"><button data-tw-merge data-tw-toggle="dropdown" aria-expanded="false" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed text-xs py-1.5 px-2 bg-primary border-primary text-white dark:border-primary w-24 w-24">Action</button>
    <div data-transition data-selector=".show" data-enter="transition-all ease-linear duration-150" data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1" data-enter-to="!mt-1 visible opacity-100 translate-y-0" data-leave="transition-all ease-linear duration-150" data-leave-from="!mt-1 visible opacity-100 translate-y-0" data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1" class="dropdown-menu absolute z-[9999] hidden">
        <div data-tw-merge class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600 w-40">
            <div class="p-2 font-medium">
                Export Tools
            </div>
            <div class="h-px my-2 -mx-2 bg-slate-200/60 dark:bg-darkmode-400">
            </div>
            <a class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge data-lucide="printer" class="stroke-[1] w-5 h-5 w-4 h-4 mr-2 w-4 h-4 mr-2"></i>
                Print</a>
            <a class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge data-lucide="external-link" class="stroke-[1] w-5 h-5 w-4 h-4 mr-2 w-4 h-4 mr-2"></i>
                Excel</a>
            <a class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge data-lucide="file-text" class="stroke-[1] w-5 h-5 w-4 h-4 mr-2 w-4 h-4 mr-2"></i>
                CSV</a>
            <a class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge data-lucide="archive" class="stroke-[1] w-5 h-5 w-4 h-4 mr-2 w-4 h-4 mr-2"></i>
                PDF</a>
        </div>
    </div>
</div>`;
        }
    </script>
@endpush