@extends('layouts.dashboard.app')
@section('content')
    <div
        class="hurricane before:content-[''] before:z-[-1] before:w-screen before:bg-slate-50 before:top-0 before:h-screen before:fixed before:bg-texture-black before:bg-contain before:bg-fixed before:bg-[center_-20rem] before:bg-no-repeat">
        @include('layouts.dashboard.menu')
        <div
            class="content transition-[margin,width] duration-100 px-5 pt-[56px] pb-16 relative z-20 content--compact xl:ml-[275px] [&amp;.content--compact]:xl:ml-[91px]">
            <form id="form-submit">
                <div class="container mt-[65px]">
                    <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                        <div class="text-base font-medium group-[.mode--light]:text-white">
                            {{ $page_title ?? '' }}
                        </div>
                        <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                            <button onclick="history.go(-1)"
                                class="transition duration-200 border inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 shadow-md w-24">
                                <i data-tw-merge="" data-lucide="arrow-left" class="mr-3 h-4 w-4 stroke-[1.3]"></i> Back
                            </button>
                            <button id="submitBtn" data-tw-merge="" type="submit"
                                class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-blue-theme border-blue-theme text-white dark:border-primary group-[.mode--light]:!border-transparent group-[.mode--light]:!bg-white/[0.12] group-[.mode--light]:!text-slate-200"><i
                                    data-tw-merge="" data-lucide="save" class="mr-3 h-4 w-4 stroke-[1.3]"></i>
                                <span id="loadingText">Save Changes</span>
                            </button>
                        </div>
                    </div>
                    <div class="mt-3.5 grid grid-cols-12 gap-x-6 gap-y-10">
                        <div class="col-span-12 flex flex-col gap-y-7 sm:col-span-12 xl:col-span-12">
                            <div class="box box--stacked flex flex-col p-5">

                                <div
                                    class="relative mb-4 mt-4 rounded-[0.6rem] border border-slate-200/80 dark:border-darkmode-400 mr-5">
                                    <div class="absolute left-0 -mt-2 ml-4 bg-white px-3 text-xs uppercase text-slate-500">
                                        <div class="-mt-px">Payslip Detail</div>
                                    </div>
                                    <div class="mt-2 flex flex-col px-5 pb-5">
                                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5">
                                            <x-form.select id="company_id" name="company_id" label="Company"
                                                url="{{ url('dashboard/hrms/designation') }}" :apiUrl="$apiCompanyUrl"
                                                columns='["company_name"]' :selected="$company" :keys="[
                                                    'company_id' => $company,
                                                ]">
                                                <option value="">Select Company</option>
                                            </x-form.select>
                                            <div class="gap-x-6 gap-y-10 ">
                                                <div class="py-2">
                                                    <div class="mt-3 flex-row xl:items-center" placholder="">
                                                        <div
                                                            class="inline-block mb-2 sm:mb-0 sm:mr-5 sm:text-right xl:mr-4">
                                                            <div class="text-left">
                                                                <div class="flex items-center">
                                                                    <div class="font-medium" for="posting_date">Posting Date
                                                                    </div>
                                                                    <div
                                                                        class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                                                                        Required
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="flex-1 sm:w-full  w-96  gap-1 mt-3 xl:mt-0">
                                                            <input id="posting_date" type="text" name="posting_date"
                                                                data-single-mode="true" value="" required=""
                                                                class="datepicker disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 ">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5">
                                            <div class="gap-x-6 gap-y-10 ">
                                                <div class="py-2">
                                                    <x-form.select name="currency" id="currency" label="Currency"
                                                        class="tom-select w-full" data-placeholder="Select Currency"
                                                        url="{{ url('dashboard/hrms/designation') }}" required>
                                                        <option value="IDR">IDR</option>
                                                    </x-form.select>
                                                </div>
                                            </div>
                                            <div class="gap-x-6 gap-y-10">
                                                <div class="py-2">
                                                    <x-form.select name="payroll_frequency" id="payroll_frequency"
                                                        label="Payroll Frequency" class="tom-select w-full"
                                                        data-placeholder="Select Frequency" url="#" required>
                                                        <option value="">Select Payroll Frequency</option>
                                                        <option value="monthly">Monthly</option>
                                                        <option value="weekly">Weekly</option>
                                                        <option value="daily">Daily</option>
                                                    </x-form.select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5">
                                            <div class="gap-x-6 gap-y-10 ">
                                                <div class="py-2">
                                                    <x-form.datepicker id="start_date" label="Start Date" name="start_date"
                                                        required />
                                                </div>
                                            </div>
                                            <div class="gap-x-6 gap-y-10">
                                                <div class="py-2">
                                                    <x-form.datepicker id="end_date" label="End Date" name="end_date"
                                                        required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="relative mb-4 mt-4 rounded-[0.6rem] border border-slate-200/80 dark:border-darkmode-400 mr-5">
                                    <div class="absolute left-0 -mt-2 ml-4 bg-white px-3 text-xs uppercase text-slate-500">
                                        <div class="-mt-px">Select Employee</div>
                                    </div>
                                    <div class="mt-2 flex flex-col gap-3.5 px-5 pb-5">
                                        <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-3 gap-5">
                                            <div class="gap-x-6 gap-y-10 ">
                                                <div class="">
                                                    <x-form.select id="department_id" name="department_id"
                                                        data-method="POST" label=""
                                                        url="{{ url('dashboard/hrms/department/create') }}"
                                                        apiUrl="{{ $apiDepartmentUrl }}" columns='["department_name"]'
                                                        :keys="[
                                                            'company_id' => $company_id,
                                                        ]">
                                                        <option value="">Select Department</option>
                                                    </x-form.select>
                                                </div>
                                            </div>


                                            <div class="gap-x-6 gap-y-10 ">
                                                <div class="">
                                                    <x-form.select id="company_id" name="company_id" class="filter"
                                                        data-method="POST" label=""
                                                        url="{{ url('dashboard/hrms/company/create') }}"
                                                        apiUrl="{{ $apiCompanyUrl }}" columns='["company_name"]'
                                                        :keys="[
                                                            'company_id' => $company_id,
                                                        ]">
                                                        <option value="">Select Company</option>
                                                    </x-form.select>
                                                </div>
                                            </div>

                                            <div class="gap-x-6 gap-y-10 ">
                                                <div class="">
                                                    <x-form.select id="designation_id" name="designation_id"
                                                        class="filter" data-method="POST" label=""
                                                        url="{{ url('dashboard/hrms/designation/create') }}"
                                                        apiUrl="{{ $apiDesignationUrl }}" columns='["designation_name"]'
                                                        :keys="[
                                                            'company_id' => $company_id,
                                                        ]">
                                                        <option value="">Select Designation</option>
                                                    </x-form.select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="mt-2   pb-5">
                                        <div class="grid grid-cols-1 md:grid-cols-1 xl:grid-cols-1 gap-5">
                                            <div class="table gap-y-2 p-5 sm:flex-row sm:items-center">
                                                <div>
                                                    <x-datatable id="employeeTable" dtcomponent="true" :url="$apiUrlEmployee . '/datatables'"
                                                        method="POST" class="display" :filter="[
                                                            'designation_id' => '#designation_id',
                                                            'department_id' => '#department_id',
                                                            'company_id' => '#company_id',
                                                        ]">
                                                        <x-slot:thead>
                                                            <th data-value="id" width="40px">
                                                                <input type="checkbox" id="select-all" />
                                                            </th>
                                                            <th data-value="no" width="60px">No.</th>
                                                            <th data-value="first_name" searchable="true"
                                                                orderable="true" searchable="true"
                                                                data-render="getFullName">Full Name
                                                            </th>


                                                            <th data-value="grade_id_rel" data-render="getGrade"
                                                                orderable="false">
                                                                Grade
                                                            </th>
                                                            <th data-value="designation_id_rel"
                                                                data-render="getDesignation" orderable="false">
                                                                Designation
                                                            </th>
                                                            <th data-value="department_id_rel" data-render="getDepartment"
                                                                orderable="false">Department
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
            </form>
        </div>
    </div>
    <div class="preview relative [&.hide]:overflow-hidden [&.hide]:h-0">
        <div class="text-center">
            <div id="success-notification-content"
                class="py-5 pl-5 pr-14 bg-white border border-slate-200/60 rounded-lg shadow-xl dark:bg-darkmode-600 dark:text-slate-300 dark:border-darkmode-600 hidden flex">
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
    <script src="{{ asset('dist') }}/js/vendors/litepicker.js"></script>
    <script src="{{ asset('dist') }}/js/components/base/litepicker.js"></script>
    <script type="text/javascript">
        //simpan payload data attendance dari data detail employee
        let employee_id = '';
        let company_id = '{{ $company_id }}';

        $("#payroll_frequency").on("change", async function() {
            const payrollFrequency = $(this).val();
            const currentDate = new Date();
            let startDate, endDate;

            if (payrollFrequency === "monthly") {
                const year = currentDate.getFullYear();
                const month = currentDate.getMonth();
                startDate = new Date(year, month, 1 + 1);
                endDate = new Date(year, month + 1);
            } else if (payrollFrequency === "weekly") {
                const dayOfWeek = currentDate.getDay();
                const diffToMonday = currentDate.getDate() - dayOfWeek + (dayOfWeek === 0 ? -6 :
                    1);
                startDate = new Date(currentDate.setDate(diffToMonday));
                endDate = new Date(currentDate.setDate(startDate.getDate() + 6));
            } else {
                startDate = new Date();
                endDate = new Date();
            }
            $("#start_date").val(startDate.toISOString().split('T')[0]);
            $("#end_date").val(endDate.toISOString().split('T')[0]);
        });

        $("#form-submit").submit(async function(e) {
            e.preventDefault();
            var employee_ids = [];
            $('#employeeTable tbody input[type="checkbox"]:checked').each(function() {
                var rowData = JSON.parse($(this).val());
                employee_ids.push({
                    id: rowData.id
                })
            })
            const company_id_selected = $('#company_id option:selected').val();
            if (company_id_selected != '') {
                company_id = company_id_selected;
            } else {
                company_id = '{{ $company_id }}';
            }

            var dataAssignment = {
                employees: employee_ids,
                company_id: company_id,
                start_date: $('#start_date').val(),
                end_date: $('#end_date').val(),
                posting_date: $('#posting_date').val(),
                currency_id: $('#currency').val(),
                payroll_frequency: $('#payroll_frequency').val(),
                payment_method: 'bank',
                account_id: 'test',
            }
            var data = JSON.stringify(dataAssignment);

            $('#loadingText').html('Saving...');
            $(this).attr('disable', true);

            var param = {
                url: "{{ $apiPayslip }}",
                method: "POST",
                data: data,
                processData: false,
                contentType: 'application/json',
                cache: false,
                dataType: 'json'
            }

            await transAjax(param).then((result) => {
                showSuccessNotification(result.message, "The operation was completed successfully.");
                $('#loadingText').html('Save Changes');
                $(this).attr('disable', false);
                setTimeout(() => {
                    window.location.href = "/dashboard/hrms/payout/salary_slip";
                }, 500);
            }).catch((xhr) => {
                $('#loadingText').html('Save Changes');
                $(this).attr('disable', false);
                const response = JSON.parse(xhr.responseText);
                handleErrorResponse(response);
            });
        });


        function handleErrorResponse(result) {
            const errorString = result.error || 'An error occurred.';
            const errorMessages = errorString.split(', ');

            $('.error-message').remove();

            const errorPattern = /\"([^\"]+)\"/g;
            let match;

            while ((match = errorPattern.exec(errorMessages)) !== null) {
                const field = match[1];
                if (field !== 'employee_id') {

                    let fieldName = field.replace(/_/g, " ").replace(/\b\w/g, char => char.toUpperCase());
                    const input = $(`[name="${field}"]`);

                    input.addClass('border-danger');
                    input.before(
                        `<div class="error-message text-danger mt-1 text-xs sm:ml-auto sm:mt-0 mb-2">${fieldName} is not allowed to be empty</div>`
                    );
                }
            }

            const firstErrorField = $('.error-message').first();
            if (firstErrorField.length) {
                $('html, body').animate({
                    scrollTop: firstErrorField.offset().top - 100
                }, 500);
            }
        }
        // Updated getCheckBox function

        function getFullName(data, type, row, meta) {
            if (row.fullname == null) {
                return row?.first_name + ' ' + row?.last_name;
            }
            return row?.fullname;
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

        $('#select-all').on('click', function() {
            var isChecked = $(this).is(':checked');
            $('#employeeTable tbody input[type="checkbox"]').prop('checked', isChecked);
            toggleCustomButton();
        });

        $('#department_id').change(function() {
            employeeTable.ajax.reload();
        });

        $('#company_id').change(function() {
            employeeTable.ajax.reload();
        });

        $('#designation_id').change(function() {
            employeeTable.ajax.reload();
        });
    </script>
@endpush
