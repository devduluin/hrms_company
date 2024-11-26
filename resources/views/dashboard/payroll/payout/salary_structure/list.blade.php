@extends('layouts.dashboard.app')
@section('content')
    <div
        class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')
        <div id="contents-page"
            class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
            <div class="container">
                <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                    <div class="col-span-12">
                        <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                            <div class="text-base font-medium group-[.mode--light]:text-white">
                                {{ $page_title }} 
                            </div>
                            <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                                <button onclick="history.go(-1)"
                                class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md w-24">
                                    <i data-tw-merge="" data-lucide="arrow-left" class="mr-3 h-4 w-4 stroke-[1.3]"></i> Back
                                </button>
                                <a href="{{ url('dashboard/hrms/payout/salary_structure_assignment/create') }}"
                                    data-tw-merge=""
                                    class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium text-xs cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-slate-200 text-slate-700 dark:border-danger shadow-md w-100"><i
                                        data-tw-merge="" data-lucide="user" class="mr-2 h-4 w-4 stroke-[1.3]"></i>
                                    Assign Salary Structure</a>
                                <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                                <div data-tw-merge="" data-tw-placement="bottom-end" class="dropdown relative inline-block"><button data-tw-merge="" data-tw-toggle="dropdown" aria-expanded="false" class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md  w-full sm:w-auto"><i data-tw-merge="" data-lucide="arrow-down-wide-narrow" class="mr-2 h-4 w-4 stroke-[1.3]"></i>
                                    Filter
                                    <span id="countFilter" class="ml-2 flex h-5 items-center justify-center rounded-full border bg-slate-100 px-1.5 text-xs font-medium">
                                        
                                </span></button>
                                <div data-transition="" data-selector=".show" data-enter="transition-all ease-linear duration-150" data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1" data-enter-to="!mt-1 visible opacity-100 translate-y-0" data-leave="transition-all ease-linear duration-150" data-leave-from="!mt-1 visible opacity-100 translate-y-0" data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1" class="dropdown-menu absolute z-[9999] hidden">
                                    <div data-tw-merge="" class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600">
                                        <div class="p-2">
                                            <form method="GET" id="filterTable">
                                                <div class="mt-3">
                                                    <div class="text-left text-slate-500">
                                                        Status
                                                    </div>
                                                    <select required name="is_active" id="is_active" data-title="Language" data-placeholder="Select Type" class="tom-select w-full" sclass="tom-select disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10"">
                                                        <option value="">Select Status</option>
                                                        <option value="1"> Active </option>
                                                        <option value="0"> Inactive </option>
                                                    </select>
                                                </div>
                                                <div class="mt-4 flex items-center">
                                                    <button type="reset" data-tw-merge="" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&:hover:not(:disabled)]:bg-slate-100 [&:hover:not(:disabled)]:border-slate-100 [&:hover:not(:disabled)]:dark:border-darkmode-300/80 [&:hover:not(:disabled)]:dark:bg-darkmode-300/80 ml-auto w-32">Reset</button>
                                                    <button type="submit" data-tw-merge="" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary ml-2 w-32">Apply</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <a href="{{ url('dashboard/hrms/payout/salary_structure/create') }}" data-tw-merge=""
                                    class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200"><i
                                        data-tw-merge="" data-lucide="plus" class="mr-2 h-4 w-4 stroke-[1.3]"></i>
                                    Add New Salary Structure</a>
                            </div>
                        </div>
                        </div>
                        <div class="mt-3.5 flex flex-col gap-8">
                            <div class="box box--stacked flex flex-col">
                                <div class="table gap-y-2 p-5 sm:flex-row sm:items-center">
                                    <div>
                                        <x-datatable id="employeeTable"
                                            url="http://apidev.duluin.com/api/v1/salary_structures/salary_structure/datatables"
                                            method="POST" class="display"
                                            :filter="[
                                                'is_active' => '#is_active',
                                            ]">
                                            <x-slot:thead>
                                                <th data-value="id" data-render="getId">#</th>
                                                <th data-value="name">Name</th>
                                                <th data-value="is_active" data-render="getStatus">Status</th>
                                                <th data-value="id" data-render="getActionBtn">Action</th>
                                            </x-slot:thead>
                                        </x-datatable>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        function getActionBtn(data, type, row, meta) {
            const url = `{{ url('dashboard/hrms/payout/salary_structure/edit') }}/${data?.id}`;
            // console.log(url);
            return `<div data-tw-merge data-tw-placement="bottom-end" class="dropdown relative"><button data-tw-merge data-tw-toggle="dropdown" aria-expanded="false" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none  [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed text-xs py-1.5 px-2 w-20">
            <i class="fa-solid fa-list text-base"></i></button>
                <div data-transition data-selector=".show" data-enter="transition-all ease-linear duration-150" data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1" data-enter-to="!mt-1 visible opacity-100 translate-y-0" data-leave="transition-all ease-linear duration-150" data-leave-from="!mt-1 visible opacity-100 translate-y-0" data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1" class="dropdown-menu absolute z-[9999] hidden">
                    <div data-tw-merge class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600 w-40">
                        <a class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge data-lucide="printer" class="stroke-[1] w-5 h-5 w-4 h-4 mr-2 w-4 h-4 mr-2"></i>
                            Detail</a>
                        <a href="` + url + `" class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge data-lucide="external-link" class="stroke-[1] w-5 h-5 w-4 h-4 mr-2 w-4 h-4 mr-2"></i>
                            Edit</a>
                        <a class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge data-lucide="file-text" class="stroke-[1] w-5 h-5 w-4 h-4 mr-2 w-4 h-4 mr-2"></i>
                            Hapus</a>
                    </div>
                </div>
            </div>`;
        }

        function getStatus(data, type, row, meta) {
            console.log(data);
            if (data) {
                return `<div class="flex items-center justify-center text-success"><div class="ml-1.5 whitespace-nowrap"><i data-tw-merge data-lucide="check" class="text-success"></i> Active</div></div>`;
            } else {
                return `<div class="flex items-center justify-center text-danger"><div class="ml-1.5 whitespace-nowrap">Inactive</div></div>`;
            }
        }

        function getId(data, type, row, meta) {
            return meta.row + 1;
        }

        async function initializeContent() {
            // await fetchLatestEmployees();
            // await ApexCharts();
        }

        initializeContent();

        $(document).ready(function () {
            const urlParams = new URLSearchParams(window.location.search);
            let activeFilterCount = 0;

            const handleFilter = (paramName, selectorId) => {
                if (urlParams.has(paramName)) {
                    const paramValue = urlParams.get(paramName);
                    const $selectElement = $(`#${selectorId}`);
                    if ($selectElement.length > 0) {
                        $selectElement.val(paramValue).change();
                        if (paramValue) activeFilterCount++;
                    }
                }
            };

            // Call the function for each filter
            handleFilter("is_active", "is_active");

            const $countFilter = $("#countFilter");
            if ($countFilter.length > 0) {
                $countFilter.text(activeFilterCount);
            }
        });
    </script>
@endpush
