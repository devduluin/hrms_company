    @if (isset($employee_id))
        <form id="overview-form" method="post" action="{{ $apiEmployeeUrl }}/employee/{{ $employee_id }}">
        @else
            <form id="overview-form" method="post" action="{{ $apiEmployeeUrl }}/employee">
    @endif
    @csrf
    <div class="mb-6 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
        Overview
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-2 gap-5 mt-4">
        <x-form.input id="employee_card_id" label="Employee ID Number" name="employee_card_id" required />
        <x-form.input id="first_name" label="First Name" name="first_name" required />
        <x-form.input id="last_name" label="Last Name" name="last_name" required />
        <x-form.input id="phone_number" label="Phone Number" name="phone_number" required />
        <x-form.input id="personal_email" label="Personal Email" name="personal_email" required />
        <x-form.select name="gender" id="gender" label="Gender" class="tom-select w-full"
            data-placeholder="Select Gender" url="{{ url('dashboard/hrms/designation') }}" required>
            <option value="">Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </x-form.select>

        <x-form.datepicker id="date_of_joining" label="Joining Date" name="date_of_joining" required />

        <x-form.datepicker id="date_of_birth" label="Date of Birth" name="date_of_birth" required />

        <x-form.input id="place_of_birth" label="Place of Birth" name="place_of_birth" required />

        <x-form.input id="identity_card_number" label="Identity Card Number" name="identity_card_number" />

        <x-form.select name="salutation" id="salutation" label="Salutation" class="tom-select w-full"
            data-placeholder="Select salutation" url="{{ url('dashboard/hrms/salutation') }}" required>
            <option value="">Select salutation</option>
            <option value="mr">Mr.</option>
            <option value="mrs">Mrs.</option>
            <option value="ms">Ms.</option>
        </x-form.select>

        <x-form.select name="status" id="status" label="Status" class="tom-select w-full"
            data-placeholder="Select Status" url="{{ url('dashboard/hrms/status') }}" required>
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
        <input type="hidden" id="parent_company" name="parent_company" />
        <x-form.select id="company_id" name="company_id" label="Company" url="{{ url('dashboard/hrms/designation') }}"
            apiUrl="{{ $apiCompanyUrl }}/company/datatables" columns='["company_name"]' :selected="$company"
            :keys="[
                'company_id' => $company,
            ]">
            <option value="">Select Company</option>
        </x-form.select>

        <x-form.select id="designation_id" name="designation_id" label="Designation"
            url="{{ url('dashboard/hrms/designation') }}" apiUrl="{{ $apiCompanyUrl }}/designation/datatables"
            columns='["designation_name"]' :keys="[
                'company_id' => $company,
                'search',
            ]">
        </x-form.select>

        <x-form.select id="branch_id" name="branch_id" label="Branch" url="{{ url('dashboard/hrms/branch') }}"
            apiUrl="http://apidev.duluin.com/api/v1/companies/branch/datatable" columns='["branch_name"]'
            :keys="[
                'company_id' => $company,
            ]">
            <option value="">Select Branch</option>
        </x-form.select>

        <x-form.select id="department_id" name="department_id" label="Department"
            url="{{ url('dashboard/hrms/department') }}" apiUrl="{{ $apiCompanyUrl }}/department/datatables"
            columns='["department_name"]' :keys="[
                'company_id' => $company,
            ]">
            <option value="">Select Department</option>
        </x-form.select>

        <x-form.select id="report_to" name="report_to" label="Reports to"
            url="{{ url('dashboard/hrms/designation') }}" apiUrl="{{ $apiEmployeeUrl }}/employee/datatables"
            columns='["first_name","last_name"]' :keys="[
                'company_id' => $company,
            ]">
            <option value="">Select Employee</option>
        </x-form.select>

        <x-form.select id="grade_id" name="grade_id" label="Grade" url="{{ url('dashboard/hrms/designation') }}"
            apiUrl="http://apidev.duluin.com/api/v1/companies/employee-grade/datatables" columns='["employee_grade_name"]'
            :keys="[
                'company_id' => $company,
            ]">
            <option value="">Select Grade</option>
        </x-form.select>

        <x-form.select id="employee_type_id" name="employee_type_id" label="Employment Type"
            url="{{ url('dashboard/hrms/designation') }}" apiUrl="http://apidev.duluin.com/api/v1/companies/employment-type/datatables"
            columns='["employment_type_name"]' :keys="[
                'company_id' => $company,
            ]">
            <option value="">Select Employment Type</option>
        </x-form.select>

    </div>
    <div class="grid grid-cols-2 gap-5 mt-4">

    </div>
    <div class="mt-6 flex border-t border-dashed border-slate-300/70 pt-5 md:justify-end">
        <x-form.button label="Save changes" id="overview-btn" style="primary" type="button" icon="save" />
    </div>
    </form>
