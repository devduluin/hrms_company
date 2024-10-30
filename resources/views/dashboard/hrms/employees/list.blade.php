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
                                <a href="{{ url('dashboard/hrms/employee/import_employee') }}" data-tw-merge=""
                                    class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&:hover:not(:disabled)]:bg-slate-100 [&:hover:not(:disabled)]:border-slate-100 [&:hover:not(:disabled)]:dark:border-darkmode-300/80 [&:hover:not(:disabled)]:dark:bg-darkmode-300/80 w-48"><i
                                        data-tw-merge="" data-lucide="upload" class="mr-2 h-4 w-4 stroke-[1.3]"></i>
                                    Import Data</a>
                                <a href="{{ url('dashboard/hrms/employee/new_employee') }}" data-tw-merge=""
                                    class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200"><i
                                        data-tw-merge="" data-lucide="plus" class="mr-2 h-4 w-4 stroke-[1.3]"></i>
                                    Add New Employee</a>
                            </div>
                        </div>
                        <div class="mt-3.5 flex flex-col gap-8">
                            <div class="box box--stacked flex flex-col p-5">
                                <div class="grid grid-cols-4 gap-5">
                                    <div
                                        class="box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                        <div class="text-base text-slate-500">Total Employees</div>
                                        <div class="mt-1.5 text-2xl font-medium" id="totalEmployeesCount">0</div>
                                    </div>
                                    <div
                                        class="box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                        <div class="text-base text-slate-500">Employees Active</div>
                                        <div class="mt-1.5 text-2xl font-medium" id="totalEmployeesActive">0</div>
                                    </div>
                                    <div
                                        class="box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                        <div class="text-base text-slate-500">Employee Leave</div>
                                        <div class="font-mediumm mt-1.5 text-2xl" id="totalEmployeesLeave">0</div>
                                    </div>
                                    <div
                                        class="box col-span-4 rounded-[0.6rem] border border-dashed border-slate-300/80 p-5 shadow-sm md:col-span-2 xl:col-span-1">
                                        <div class="text-base text-slate-500">New Employee</div>
                                        <div class="font-mediumm mt-1.5 text-2xl" id="totalNewEmployee">0</div>
                                    </div>
                                </div>
                            </div>
                            <div class="box box--stacked mt-3.5 p-5">
                                <div class="flex flex-col gap-y-5 lg:flex-row lg:items-center">
                                    <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row sm:items-center">
                                        <div class="relative">
                                            <x-form.select id="company_id" name="company_id" label="Company"
                                                url="{{ url('dashboard/hrms/designation') }}"
                                                apiUrl="{{ $apiCompanyUrl }}/company/datatables" columns='["company_name"]'
                                                :selected="$company" :keys="[
                                                    'company_id' => $company,
                                                ]">
                                                <option value="">Select Company</option>
                                            </x-form.select>
                                        </div>
                                        <div class="relative">
                                            <x-form.select id="designation_id" name="designation_id" label="Designation"
                                                url="{{ url('dashboard/hrms/designation') }}"
                                                apiUrl="{{ $apiCompanyUrl }}/designation/datatables"
                                                columns='["designation_name"]' :keys="[
                                                    'company_id' => $company,
                                                    'search',
                                                ]">
                                            </x-form.select>
                                        </div>
                                        <div class="relative">
                                            <button id="applyFilter" data-tw-merge
                                                class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary w-24 w-24">Primary</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box box--stacked flex flex-col">
                                <div class="table gap-y-2 p-5 sm:flex-row sm:items-center">
                                    <div>
                                        <x-datatable id="employeeTable" :url="$apiUrl . '/employee/datatables'" method="POST" class="display"
                                            customButton="true" customButtonText="Send Verification Email"
                                            customButtonFunction="sendEmailVerification()" :filter="[
                                                'first_name' => '#name',
                                                'designation_id' => '#designation_id',
                                            ]">
                                            <x-slot:thead>
                                                <th data-value="id" data-render="getCheckBox" orderable="false">
                                                    <input type="checkbox" id="select-all" />
                                                </th>
                                                <th data-value="id" data-render="getId" orderable="true">#</th>
                                                <th data-value="first_name" searchable="true" orderable="true"
                                                    searchable="true">First Name
                                                </th>
                                                <th data-value="last_name" searchable="true" orderable="true">Last Name
                                                </th>
                                                <th data-value="company_id_rel" data-render="getCompany" orderable="false">
                                                    Company
                                                </th>
                                                <th data-value="grade_id_rel" data-render="getGrade" orderable="false">
                                                    Grade
                                                </th>
                                                <th data-value="designation_id_rel" data-render="getDesignation"
                                                    orderable="false">
                                                    Designation
                                                </th>
                                                <th data-value="department_id_rel" data-render="getDepartment"
                                                    orderable="false">Department
                                                </th>
                                                <th data-value="branch_id_rel" data-render="getBranch" orderable="false">
                                                    Branch
                                                </th>
                                                <th data-value="status" data-render="getStatus" orderable="false">Status
                                                </th>
                                                <th data-value="is_verified" data-render="getMobileStatus"
                                                    orderable="false">Mobile</th>
                                                <th data-value="id" data-render="getActionBtn" orderable="false">Action
                                                </th>
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

            $('#applyFilter').click(function() {
                employeeTable.ajax.reload();
            });
        });

        function handleNotification(checkedValues) {
            $.ajax({
                url: `{{ $apiGateway }}/bulk_send_verification_email`,
                method: 'POST',
                contentType: 'application/json',
                headers: {
                    'Authorization': `Bearer ${appToken}`,
                    'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`
                },
                crossDomain: true,
                data: JSON.stringify(checkedValues),
                dataType: 'json',
                success: function(data) {
                    showSuccessNotification('success', 'Verification email sent successfully.');
                    $("#verification-btn").hide();
                },
                error: function(error) {
                    showErrorNotification('error', 'Failed to send verification email.');
                }
            });
        }

        // Updated getCheckBox function
        function getCheckBox(data, type, row, meta) {
            return `<input type="checkbox" name="selected_employees[]" value='${JSON.stringify(row)}'>`;
        }

        function getId(data, type, row, meta) {
            return meta.row + 1;
        }

        function getStatus(data, type, row, meta) {
            if (data === 'active') {
                return `<div class="flex items-center justify-center text-success"><div class="ml-1.5 whitespace-nowrap"><i data-tw-merge data-lucide="check" class="text-success"></i> Active</div></div>`;
            } else {
                return `<div class="flex items-center justify-center text-danger"><div class="ml-1.5 whitespace-nowrap">Inactive</div></div>`;
            }
        }

        function getMobileStatus(data, type, row, meta) {
            if (data) {
                return `<div class="flex items-center justify-center text-success"><div class="ml-1.5 whitespace-nowrap"><i data-tw-merge data-lucide="check" class="text-success"></i> Active</div></div>`;
            } else {
                return `<div class="flex items-center justify-center text-danger"><div class="ml-1.5 whitespace-nowrap">N/A</div></div>`;
            }
        }

        function getCompany(data, type, row, meta) {
            if (data !== null) {
                return data?.company_name ?? 'N/A';
            }
            return 'N/A';
        }

        function getDesignation(data, type, row, meta) {
            if (data !== null) {
                return data?.designation_name ?? 'N/A';
            }
            return 'N/A';
        }

        function getDepartment(data, type, row, meta) {
            if (data !== null) {
                return data?.department_name ?? 'N/A';
            }
            return 'N/A';
        }

        function getBranch(data, type, row, meta) {
            if (data !== null) {
                return data?.branch_name ?? 'N/A';
            }
            return 'N/A';
        }

        function getGrade(data, type, row, meta) {
            if (data !== null) {
                return data?.employee_grade_name ?? 'N/A';
            }
            return 'N/A';
        }

        function getActionBtn(data, type, row, meta) {
            const url = `{{ url('dashboard/hrms/employee/edit_employee') }}/${data}`;
            return `<div data-tw-merge data-tw-placement="bottom-end" class="dropdown relative"><button data-tw-merge data-tw-toggle="dropdown" aria-expanded="false" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary">Action</button>
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

        async function initializeContent() {
            await fetchLatestEmployees();
            // await ApexCharts();
        }

        async function fetchLatestEmployees() {
            try {
                const appToken = localStorage.getItem('app_token');
                const company_id = localStorage.getItem('company');
                const requestOptions = {
                    method: "GET",
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${appToken}`,
                        'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`
                    },
                };

                const url = `{{ $apiUrl }}/employee/employees_summary/${company_id}`;
                const response = await fetch(url, requestOptions);

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const employees = await response.json();
                const employeeData = employees.data;
                $("#totalEmployeesCount").html(employeeData.employees_total);
                $("#totalEmployeesActive").html(employeeData.employees_active);
                $("#totalEmployeesLeave").html(employeeData.employees_leave);
                $("#totalNewEmployee").html(employeeData.new_employees);
                console.log(employeeData);
            } catch (error) {
                console.error('Error fetching employees:', error);
            }
        }

        initializeContent();
    </script>
@endpush
