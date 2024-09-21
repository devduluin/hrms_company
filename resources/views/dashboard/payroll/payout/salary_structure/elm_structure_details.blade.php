

<form id="overview-form" method="post" action="">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-2">
            <x-form.input id="structure_name" label="Name" name="structure_name" required />
            <x-form.input id="company" label="Company" name="company" required />
            <x-form.input id="currency" label="Currency" name="currency" required />
            <x-form.input id="leave_head" label="Leave Head" name="leave_head" required />
            
            <x-checkbox id="is_active"
            label="Is Active"
            name="is_active"
            guidelines="" />
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-2">
        <x-form.input id="leave_encashment" label="Leave Encashment Amount Per Day (IDR)" name="leave_encashment" required />
        <x-form.input id="max_benefit" label="Max Benefit (IDR)" name="max_benefit" required />
        <x-form.select name="payroll_frequency" id="payroll_frequency" label="Payroll Frequency" class="tom-select w-full"
            data-placeholder="Select Frequency" url="{{ url('dashboard/hrms/designation') }}" required>
            <option value="male">Select Frequency</option>
            <option value="male">Mal</option>
            <option value="female">Female</option>
        </x-form.select>
        <x-checkbox id="is_salary_slip_based_on_timesheet"
            label="Salary Slip Based on Timesheet"
            name="is_salary_slip_based_on_timesheet"
            guidelines="" />

    </div>
</form>