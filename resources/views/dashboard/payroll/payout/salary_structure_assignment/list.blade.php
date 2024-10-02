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
                                <a href="{{ url('dashboard/hrms/payout/salary_structure_assignment/create') }}"
                                    data-tw-merge=""
                                    class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200"><i
                                        data-tw-merge="" data-lucide="pen-line" class="mr-2 h-4 w-4 stroke-[1.3]"></i>
                                    Add New Assignment</a>
                            </div>
                        </div>
                        <div class="mt-3.5 flex flex-col gap-8">
                            <div class="box box--stacked flex flex-col">
                                <div class="table gap-y-2 p-5 sm:flex-row sm:items-center">
                                    <div>
                                        <x-datatable id="employeeTable"
                                            url="http://apidev.duluin.com/api/v1/salary_structure_assignments/salary_structure_assignment/employeeDatatables"
                                            method="POST" class="display">
                                            <x-slot:thead>
                                                <th data-value="employee_id_rel" data-render="getEmployee">Name</th>
                                                <th data-value="salaryStructureAssignment.salaryStructure.name">Salary
                                                    Structure</th>
                                                <th data-value="salaryStructureAssignment.salaryStructure.is_active"
                                                    data-render="getStatus">Status
                                                </th>
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
            const url = `{{ url('dashboard/hrms/payout/salary_structure_assignment/edit') }}/${data}`;
            // console.log(url);
            return `<div data-tw-merge data-tw-placement="bottom-end" class="dropdown relative"><button data-tw-merge data-tw-toggle="dropdown" aria-expanded="false" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary">Action</button>
                <div data-transition data-selector=".show" data-enter="transition-all ease-linear duration-150" data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1" data-enter-to="!mt-1 visible opacity-100 translate-y-0" data-leave="transition-all ease-linear duration-150" data-leave-from="!mt-1 visible opacity-100 translate-y-0" data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1" class="dropdown-menu absolute z-[9999] hidden">
                    <div data-tw-merge class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600 w-40">
                        <a class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item"><i data-tw-merge data-lucide="file-text" class="stroke-[1] w-5 h-5 w-4 h-4 mr-2 w-4 h-4 mr-2"></i>
                            Hapus</a>
                    </div>
                </div>
            </div>`;
        }

        function getEmployee(data, type, row, meta) {
            if (data && typeof data !== undefined) {
                return data.first_name + ' ' + data.last_name;
            }
            return 'N/A';
        }

        function getStatus(data, type, row, meta) {
            if (data) {
                return `<div class="flex items-center justify-center text-success"><div class="ml-1.5 whitespace-nowrap"><i data-tw-merge data-lucide="check" class="text-success"></i> Active</div></div>`;
            } else {
                return `<div class="flex items-center justify-center text-danger"><div class="ml-1.5 whitespace-nowrap">Inactive</div></div>`;
            }
        }

        async function initializeContent() {
            // await fetchLatestEmployees();
            // await ApexCharts();
        }

        initializeContent();
    </script>
@endpush
