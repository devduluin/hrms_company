@if (isset($employee_id))
    <form id="attendance-form" method="post" action="{{ $apiEmployeeUrl }}/employee_attendance_leave/{{ $employee_id }}"
        autocomplete="off" novalidate class="attendance-form">
    @else
        <form id="attendance-form" method="post" action="{{ $apiEmployeeUrl }}/employee_attendance_leave"
            autocomplete="off" novalidate class="attendance-form">
@endif
@csrf
<div class="mb-6 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
    Attendances & Leaves
</div>
<div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-2 gap-5 mt-4">
    <x-form.input id="attendance_device_id" label="Attendance Device ID" name="attendance_device_id" required />
    <x-form.select id="holiday_list" name="holiday_list" label="Holiday List"
        url="{{ url('dashboard/hrms/designation') }}" apiUrl="{{ $apiCompanyUrl }}/holiday-list/datatables"
        columns='["holiday_list_name"]' :keys="[
            'company_id' => $company,
        ]">
        <option value="">Select Holiday List</option>
    </x-form.select>
    <x-form.select id="default_ship" name="default_ship" label="Default Ship"
        url="{{ url('dashboard/hrms/designation') }}" apiUrl="{{ $apiCompanyUrl }}/shift-type/datatable"
        columns='["shift_type_name"]' :keys="[
            'company_id' => $company,
        ]">
        <option value="">Select Shift Type</option>
    </x-form.select>
</div>
<div class="grid grid-cols-2 gap-5 mt-4">

</div>
<div class="mb-6 mt-4 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
    Approvers
</div>
<div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-2 gap-5 mt-4">
    <x-form.select id="expense_approver" name="expense_approver" label="Expense Approver"
        url="{{ url('dashboard/hrms/designation') }}" apiUrl="{{ $apiEmployeeUrl }}/employee/datatables"
        columns='["first_name","last_name"]' :keys="[
            'company_id' => $company,
        ]">
        <option value="">Select Approver</option>
    </x-form.select>

    <x-form.select id="ship_request_approver" name="ship_request_approver" label="Shift Request Approver"
        url="{{ url('dashboard/hrms/designation') }}" apiUrl="{{ $apiEmployeeUrl }}/employee/datatables"
        columns='["first_name","last_name"]' :keys="[
            'company_id' => $company,
        ]">
        <option value="">Select Approver</option>
    </x-form.select>

    <x-form.select id="leave_approver" name="leave_approver" label="Leave Approver"
        url="{{ url('dashboard/hrms/designation') }}" apiUrl="{{ $apiEmployeeUrl }}/employee/datatables"
        columns='["first_name","last_name"]' :keys="[
            'company_id' => $company,
        ]">
        <option value="">Select Approver</option>
    </x-form.select>
</div>
<div class="grid grid-cols-2 gap-5 mt-4">

</div>
<div class="grid grid-cols-2 gap-5 mt-4">

</div>
<div class="mt-6 flex border-t border-dashed border-slate-300/70 pt-5 md:justify-end">
    <x-form.button label="Save changes" id="attendance-btn" style="primary" type="button" icon="save" />
</div>
</form>
