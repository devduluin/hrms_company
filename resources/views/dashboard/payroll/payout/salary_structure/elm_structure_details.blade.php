<form id="details-form" method="post" action="http://apidev.duluin.com/api/v1/salary_structures/salary_structure">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-2">
        <x-form.input id="name" label="Name" name="name" required />
        <x-form.select id="company_id" name="company_id" label="Company" url="{{ url('dashboard/hrms/designation') }}"
            apiUrl="{{ $apiCompanyUrl }}/company/datatables" columns='["company_name"]' :selected="$company"
            :keys="[
                'company_id' => $company,
            ]">
            <option value="">Select Company</option>
        </x-form.select>
        <x-form.select name="currency" id="currency" label="Payroll Currency" class="tom-select w-full"
            data-placeholder="Select Currency" required>
            <option value="">Select Currency</option>
            <option value="idr">Rupiah</option>
        </x-form.select>

        <x-checkbox id="is_active" label="Is Active" name="is_active" guidelines="" />
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-2">
        <x-form.input id="leave_enchashment_amount" label="Leave Encashment Amount Per Day (IDR)"
            name="leave_enchashment_amount" required />
        <x-form.input id="max_benefits" label="Max Benefit (IDR)" name="max_benefits" required />
        <x-form.select name="payroll_frequency" id="payroll_frequency" label="Payroll Frequency"
            class="tom-select w-full" data-placeholder="Select Frequency" url="{{ url('dashboard/hrms/designation') }}"
            required>
            <option value="">Select Frequency</option>
            <option value="monthly">Monthly</option>
            <option value="weekly">Weekly</option>
            <option value="daily">Daily</option>
        </x-form.select>
        <x-checkbox id="is_salary_slip_based_on_timesheet" label="Salary Slip Based on Timesheet"
            name="is_salary_slip_based_on_timesheet" guidelines="" />
    </div>
    <div class="mt-6 flex border-t border-dashed border-slate-300/70 pt-5 md:justify-end">
        <x-form.button label="Save changes" id="details-btn" style="primary" type="button" icon="save" />
    </div>
</form>
