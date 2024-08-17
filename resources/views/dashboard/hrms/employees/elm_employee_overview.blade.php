<form id="employee-form" method="post" action="http://localhost:4444/api/v1/employee" autocomplete="off" novalidate
    class="employee-form">
    @csrf
    <div class="mb-6 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
        Overview
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-2 gap-5 mt-4">
        <x-form.input id="first_name" label="First Name" name="first_name" required />
        <x-form.input id="last_name" label="Last Name" name="last_name" required />
        <x-form.select name="gender" id="gender" label="Gender" class="tom-select w-full"
            data-placeholder="Select Gender" url="{{ url('dashboard/hrms/designation') }}" required>
            <option value="">Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </x-form.select>

        <x-form.datepicker id="date_of_joining" label="Joining Date" name="date_of_joining" required />

        <x-form.datepicker id="date_of_birth" label="Date of Birth" name="date_of_birth" required />

        <x-form.select name="salutation" id="salutation" label="Salutation" class="tom-select w-full"
            data-placeholder="Select salutation" url="{{ url('dashboard/hrms/designation') }}" required>
            <option value="">Select salutation</option>
            <option value="mr">Mr.</option>
            <option value="mrs">Mrs.</option>
            <option value="ms">Ms.</option>
        </x-form.select>

        <x-form.select name="status" id="status" label="Status" class="tom-select w-full"
            data-placeholder="Select Status" url="{{ url('dashboard/hrms/designation') }}" required>
            <option value="">Select Status</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
            <option value="suspended">Suspended</option>
            <option value="left">Left</option>
        </x-form.select>
    </div>
    <div class="grid grid-cols-2 gap-5 mt-4">

    </div>
    <div class="mb-6 mt-4 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
        Company Details
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-2 gap-5 mt-4">
        <x-form.select id="company_id" name="company_id" label="Company" url="{{ url('dashboard/hrms/designation') }}"
            apiUrl="{{ $data['apiCompanyUrl'] }}/company/datatables" columns='["company_name"]' :selected="$data['company']"
            :keys="[
                'company_id' => $data['company'],
            ]">
            <option value="">Select Company</option>
        </x-form.select>

        <x-form.select id="designation_id" name="designation_id" label="Designation"
            url="{{ url('dashboard/hrms/designation') }}" apiUrl="{{ $data['apiCompanyUrl'] }}/designation/datatables"
            columns='["designation_name"]' :keys="[
                'company_id' => $data['company'],
            ]">
            <option value="">Select Designation</option>
        </x-form.select>

        <x-form.select id="branch_id" name="branch_id" label="Branch" url="{{ url('dashboard/hrms/designation') }}"
            apiUrl="{{ $data['apiCompanyUrl'] }}/branch/datatables" columns='["branch_name"]' :keys="[
                'company_id' => $data['company'],
            ]">
            <option value="">Select Branch</option>
        </x-form.select>

        <x-form.select id="department_id" name="department_id" label="Department"
            url="{{ url('dashboard/hrms/designation') }}" apiUrl="{{ $data['apiCompanyUrl'] }}/department/datatables"
            columns='["department_name"]' :keys="[
                'company_id' => $data['company'],
            ]">
            <option value="">Select Department</option>
        </x-form.select>

        <x-form.select id="report_to" name="report_to" label="Reports to" url="{{ url('dashboard/hrms/designation') }}"
            apiUrl="{{ $data['apiEmployeeUrl'] }}/employee/datatables" columns='["first_name","last_name"]'
            :keys="[
                'company_id' => $data['company'],
            ]">
            <option value="">Select Employee</option>
        </x-form.select>

        <x-form.select id="grade_id" name="grade_id" label="Grade" url="{{ url('dashboard/hrms/designation') }}"
            apiUrl="{{ $data['apiCompanyUrl'] }}/employee-grade/datatables" columns='["employee_grade_name"]'
            :keys="[
                'company_id' => $data['company'],
            ]">
            <option value="">Select Grade</option>
        </x-form.select>

        <x-form.select id="employee_type_id" name="employee_type_id" label="Employment Type"
            url="{{ url('dashboard/hrms/designation') }}"
            apiUrl="{{ $data['apiCompanyUrl'] }}/employment-type/datatables" columns='["employment_type_name"]'
            :keys="[
                'company_id' => $data['company'],
            ]">
            <option value="">Select Employment Type</option>
        </x-form.select>

    </div>
    <div class="grid grid-cols-2 gap-5 mt-4">

    </div>
    <div class="mb-6 mt-4 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">

    </div>
    <x-form.button label="Save changes" id="save-btn" style="primary" type="submit" icon="save" />
</form>
@include('vendor-common.toastr')
@push('js')
    <script>
        $(document).ready(function() {
            $("#employee-form").on('submit', async function(e) {
                e.preventDefault();
                const formData = $(this).serializeArray();
                const data = {};
                formData.forEach(field => {
                    data[field.name] = field.value;
                });

                const csrfToken = $('meta[name="csrf-token"]').attr('content');
                data._token = csrfToken;
                data.company_id = localStorage.getItem('company');
                data.user_id = "a77061e8-8ed8-4919-9f9b-f975d87e0253";
                data.employee_id = "a77061e8-8ed8-4919-9f9b-f975d87e0253";
                $('.error-message').hide();

                try {
                    const response = await $.ajax({
                        url: $(this).attr('action'),
                        type: 'POST',
                        contentType: 'application/json',
                        data: JSON.stringify(data),
                        dataType: 'json'
                    });

                    if (response.success) {
                        toastr.success(response.message);
                        // Optional redirection or other actions
                        setTimeout(function() {
                            history.back(-1);
                        }, 2000);
                    } else {
                        toastr.error(response.message);
                    }
                } catch (xhr) {
                    console.log(xhr.responseText);
                    const response = JSON.parse(xhr.responseText);

                    if (response.status === "error" && response.code === 400) {
                        handleErrorResponse(response);
                    } else {
                        toastr.error('An error occurred while processing your request.');
                    }
                }
            });
        });

        function handleErrorResponse(result) {
            const errorMessage = result.error;
            toastr.error('There were validation errors:');
            displayFormattedError(errorMessage);
        }

        function displayFormattedError(errorMessage) {
            $('.invalid-feedback').remove();
            $('.is-invalid').removeClass('is-invalid');

            const errorPattern = /\"([^\"]+)\"/g;
            let match;

            while ((match = errorPattern.exec(errorMessage)) !== null) {
                const fieldName = match[1];
                const input = $(`[name="${fieldName}"]`);

                input.addClass('is-invalid');
                input.before(
                    `<div class="error-message text-danger mt-1 text-xs text-slate-500 sm:ml-auto sm:mt-0 mb-2">${fieldName} is not allowed to be empty</div>`
                );
            }
        }
    </script>
@endpush
