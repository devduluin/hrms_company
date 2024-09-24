

<form id="overview-form" method="post" action="">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-2">
            <x-form.input id="structure_name" label="Name" name="structure_name" required />
            <x-form.select id="company_id" name="company_id" label="Company" url="{{ url('dashboard/hrms/designation') }}"
                           apiUrl="{{ $apiCompanyUrl }}/company/datatables" columns='["company_name"]' :selected="$company"
                           :keys="[
                    'company_id' => $company,
                ]">
                <option value="">Select Company</option>
            </x-form.select>
            <x-form.select name="currency" id="currency" label="Currency" class="tom-select w-full"
                           data-placeholder="Select Currency" url="{{ url('dashboard/hrms/designation') }}" required>
                <option value="">Select Currency</option>
                <option value="male">Dollar</option>
                <option value="female">Indonesian Rupiah</option>
            </x-form.select>

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
            <option value="">Select Frequency</option>
            <option value="monthly">Monthly</option>
            <option value="weekly">Weekly</option>
            <option value="daily">Daily</option>
        </x-form.select>
        <x-checkbox id="is_salary_slip_based_on_timesheet"
            label="Salary Slip Based on Timesheet"
            name="is_salary_slip_based_on_timesheet"
            guidelines="" />

    </div>
</form>
