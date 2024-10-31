@extends('layouts.dashboard.app') 
@section('content')
<div class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
    @include('layouts.dashboard.menu')
    <div id="contents-page" class="content transition-[margin,width] duration-100 px-5 xl:mr-2.5 mt-[75px] pt-[31px] pb-16 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[100px]">
        <div class="container">
            <div class="flex col-2 md:h-10 md:flex-row md:items-center">
                    <!-- <div class="text-base font-medium group-[.mode--light]:text-white">
                    {{ $page_title }}
                    </div> -->
            </div>
            <div class="box box--stacked flex flex-col">
                <div class="flex flex-col gap-y-2 p-5 sm:flex-row sm:items-center">
                    <div class="text-base font-medium group-[.mode--light]:text-white">
                        {{ $page_title }}
                    </div>
                    <div class="flex flex-col gap-x-3 gap-y-2 sm:ml-auto sm:flex-row">
                        <a href="{{ route("hrms.attendance") }}"
                        class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md w-24">
                        <i data-tw-merge="" data-lucide="arrow-left" class="mr-3 h-4 w-4 stroke-[1.3]"></i> Back
                        </a>
                        
                        <div data-tw-merge="" data-tw-placement="bottom-end" class="dropdown relative inline-block"><button data-tw-merge="" data-tw-toggle="dropdown" aria-expanded="false" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-blue-theme border-blue-theme text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200">
                            <svg class="mr-2 h-4 w-4 stroke-[1.3]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-list-restart"><path d="M21 6H3"/><path d="M7 12H3"/><path d="M7 18H3"/><path d="M12 18a5 5 0 0 0 9-3 4.5 4.5 0 0 0-4.5-4.5c-1.33 0-2.54.54-3.41 1.41L11 14"/><path d="M11 10v4h4"/></svg>
                                Update Shift Assignment</button>
                            <div data-transition="" data-selector=".show" data-enter="transition-all ease-linear duration-150" data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1" data-enter-to="!mt-1 visible opacity-100 translate-y-0" data-leave="transition-all ease-linear duration-150" data-leave-from="!mt-1 visible opacity-100 translate-y-0" data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1" class="dropdown-menu absolute z-[9999] hidden">
                                <div data-tw-merge="" class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600">
                                    <div class="p-2">
                                        <div>
                                            <div class="text-left text-slate-500">
                                                Select Shift
                                            </div>
                                            <select data-tw-merge="" onchange="getShiftId(this.value)" id="shift" class="shift-type disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1 mt-2 flex-1">
                                        
                                            </select>
            <div class="grid grid-cols-12 gap-x-6 gap-y-10">
                <div class="col-span-12">
                    <div class="mt-1.5 flex flex-col">
                        <div class="box flex flex-col p-5">
                            <div class="flex flex-col mb-4 gap-y-3 md:h-10 md:flex-row md:items-center">
                                <div class="text-base font-medium group-[.mode--light]:text-white">
                                    Shift Assignment
                                </div>
                                <div class="flex flex-col gap-x-1 sm:flex-row md:ml-auto" id="assignShiftContainer">
                                    <x-filter></x-filter>
                                    <x-shift></x-shift>
                                    <a href="{{ route('hrms.shift-assignment.create') }}" type="button" class="btn btn-primary transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary shadow-md w-100">
                                        <svg class="mr-2 h-4 w-4 stroke-[1.3]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                                        New  Shift Assignment</a>
                                    </button>                                
                                </div>
                            </div>
                            <x-datatable id="employeeTable"
                                url="$apiUrl"
                                method="POST" class="display">
                                <x-slot:thead>
                                    <th data-value="id" data-render="getCheckBox" orderable="false">
                                        <input type="checkbox" id="select-all" />
                                    </th>
                                    <th data-value="employee_id_rel" data-render="getEmployee">Employee Name</th>
                                    <th data-value="salaryStructureAssignment.salaryStructure.name">Company</th>
                                    <th data-value="salaryStructureAssignment.salaryStructure.is_active"
                                        data-render="getStatus">Shift Type
                                    </th>
                                    <th data-value="status" data-render="status">Status</th>
                                    <th data-value="id" data-render="getActionBtn">Action</th>
                                </x-slot:thead>
                            </x-datatable>
                        </div>
                        <div class=" fixed z-10 flex items-center justify-center " id="modalOverlay" >
                            <div class="modal fade box p-4 inset-0 z-50 hidden" id="assignShiftModal"  tabindex="-1" aria-labelledby="assignShiftModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered bg-white rounded-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="assignShiftModalLabel">Assign Shift</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="mt-4 flex items-center">
                                            <button type="button" data-tw-merge="" 
                                                class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&:hover:not(:disabled)]:bg-slate-100 [&:hover:not(:disabled)]:border-slate-100 [&:hover:not(:disabled)]:dark:border-darkmode-300/80 [&:hover:not(:disabled)]:dark:bg-darkmode-300/80 ml-auto w-32">
                                                Close
                                            </button>
                                            <form id="updateShiftAssignment">
                                                <button id="submitButton" type="submit" data-tw-merge="" 
                                                    class="mt-3 transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary ml-2 w-32">
                                                    Apply
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('hrms.shift-assignment.create') }}" type="button" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-blue-theme border-blue-theme text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200">
                            <svg class="mr-2 h-4 w-4 stroke-[1.3]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                            New Shift Assignment</a>
                        </button>                                
                    </div>
                </div>
                <div class="box box--stacked flex flex-col">
                    <div class="table gap-y-2 p-5 sm:flex-row sm:items-center">
                        <div class="overflow-auto xl:overflow-visible">
                            <x-datatable id="shiftAssignmentTable" :url="$apiShiftAssignmentDataTable" method="POST" class="display">
                                <x-slot:thead>
                                    <th data-value="employee_id" data-render="getCheckBox" orderable="false">
                                        <input type="checkbox" name="employee_id" id="select-all" />
                                    </th>
                                    <th data-value="employee_id_rel"  data-render="getName">Employee Name</th>
                                    <th data-value="company_id_rel" data-render="getCompany">Company</th>
                                    <th data-value="shift_type_id_rel" data-render="getShiftTypeName">Shift Type</th>
                                    <th style="text-align: center" data-value="shift_type_id_rel" data-render="shiftStartTime">Shift Time</th>
                                </x-slot:thead>
                            </x-datatable>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('dist/js/vendors/tab.js') }}"></script> 
<script src="{{ asset('dist/js/vendors/tom-select.js') }}"></script>
<script src="{{ asset('dist/js/components/base/tom-select.js') }}"></script> 


<script>
    $(document).ready(function() {
        $('#select-all').on('click', function() {
            var isChecked = $(this).is(':checked');
            $('#employeeTable tbody input[type="checkbox"]').prop('checked', isChecked);
            toggleCustomButton();
        });

        $('#employeeTable').on('change', 'tbody input[type="checkbox"]', function() {
            if (!this.checked) {
                $('#select-all').prop('checked', false);
            }
            toggleCustomButton();
        });

        function toggleCustomButton() {
            var anyChecked = $('#employeeTable tbody input[type="checkbox"]:checked').length > 0;
            if (anyChecked) {
                employeeTable.buttons('.custom-btn').enable();
                $('.custom-btn').removeClass('d-none');
            } else {
                employeeTable.buttons('.custom-btn').disable();
                $('.custom-btn').addClass('d-none');
            }
        }

        employeeTable.buttons('.custom-btn').disable();

        $(".custom-btn").click(function() {
            var checkedValues = [];
            $('#employeeTable tbody input[type="checkbox"]:checked').each(function() {
                var rowData = JSON.parse($(this).val());
                checkedValues.push({
                    'employee_id': rowData.id,
                    'first_name': rowData.first_name,
                    'last_name': rowData.last_name,
                    'personal_email': rowData.addressContact.personal_email,
                    'company': rowData.company_id_rel.company_name,
                    'company_id': rowData.company_id,
                    'domain': rowData.company_id_rel.domain
                });
            });
            var jsonCheckedValues = JSON.stringify(checkedValues);
            handleNotification(checkedValues);
        });
    });


    $(document).ready(function() {
        // Fungsi untuk cek semua checkbox
        $('#selectAll').on('click', function() {
            $('tbody input[type="checkbox"]').prop('checked', this.checked);
            toggleAssignShiftButton();
        });

        // Event listener untuk setiap checkbox di dalam tbody
        $('tbody').on('change', 'input[type="checkbox"]', function() {
            toggleAssignShiftButton();
        });

        // Event listener untuk menampilkan modal dan background abu-abu
        $('#assignShiftButton').on('click', function() {
            $('#modalOverlay').removeClass('hidden'); // Tampilkan overlay
            $('#assignShiftModal').removeClass('hidden'); // Tampilkan modal
        });

        // Fungsi untuk menampilkan, menyembunyikan, dan mengubah label tombol Assign Shift
        function toggleAssignShiftButton() {
            var checkedCount = $('tbody input[type="checkbox"]:checked').length;

            if (checkedCount > 0) {
                $('#assignShiftButton').prop('disabled', false);
                $('#assignShiftButton').html('Assign Shift (' + checkedCount + ')');
            } else {
                $('#assignShiftButton').prop('disabled', true);
                $('#assignShiftButton').html('Assign Shift');
            }
        }
    });
</script>

@endsection
