<div class="mb-6 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
    Overview
</div>
<div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-2 gap-5 mt-4">
    <x-form.input id="first_name" label="First Name" name="first_name" required />
    <x-form.input id="last_name" label="Last Name" name="last_name" required />
    <x-form.select name="gender" id="gender" label="Gender" class="tom-select w-full" data-placeholder="Select Gender"
        url="{{ url('dashboard/hrms/designation') }}" required>
        <option value="">Select Gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </x-form.select>

    <x-form.datepicker id="joining_date" label="Joining Date" name="joining_date" required />

    <x-form.datepicker id="date_of_birth" label="Date of Birth" name="date_of_birth" required />

    <x-form.select name="salutation" id="salutation" label="Salutation" class="tom-select w-full"
        data-placeholder="Select salutation" url="{{ url('dashboard/hrms/designation') }}" required>
        <option value="">Select salutation</option>
        <option value="Mr">Mr.</option>
        <option value="Mrs">Mrs.</option>
        <option value="Ms">Ms.</option>
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
    <x-form.select id="company" name="company" label="Company" url="{{ url('dashboard/hrms/designation') }}"
        apiUrl="{{ $data['apiCompanyUrl'] }}/company/datatables" columns='["company_name"]' :selected="$data['company']"
        :keys="[
            'company_id' => $data['company'],
        ]" />

    <x-form.select id="designation" name="designation" label="Designation" url="{{ url('dashboard/hrms/designation') }}"
        apiUrl="{{ $data['apiCompanyUrl'] }}/designation/datatables" columns='["designation_name"]' :keys="[
            'company_id' => $data['company'],
        ]" />

    <x-form.select id="branch" name="branch" label="Branch" url="{{ url('dashboard/hrms/designation') }}"
        apiUrl="{{ $data['apiCompanyUrl'] }}/branch/datatables" columns='["branch_name"]' :keys="[
            'company_id' => $data['company'],
        ]" />

    <x-form.select id="department" name="department" label="Department" url="{{ url('dashboard/hrms/designation') }}"
        apiUrl="{{ $data['apiCompanyUrl'] }}/department/datatables" columns='["department_name"]' :keys="[
            'company_id' => $data['company'],
        ]" />

    <x-form.select id="report_to" name="report_to" label="Reports to" url="{{ url('dashboard/hrms/designation') }}"
        apiUrl="{{ $data['apiEmployeeUrl'] }}/employee/datatables" columns='["first_name","last_name"]'
        :keys="[
            'company_id' => $data['company'],
        ]" />

    <x-form.select id="grade" name="grade" label="Grade" url="{{ url('dashboard/hrms/designation') }}"
        apiUrl="http://localhost:4444/api/v1/employees/datatables" columns='["first_name", "last_name"]' />

    <x-form.select id="employment_type" name="employment_type" label="Employment Type"
        url="{{ url('dashboard/hrms/designation') }}" apiUrl="http://localhost:4444/api/v1/employee/datatables"
        columns='["first_name", "last_name"]' />

</div>
<div class="grid grid-cols-2 gap-5 mt-4">

</div>
