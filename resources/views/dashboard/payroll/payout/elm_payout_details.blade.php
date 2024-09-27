<form id="overview-form" method="post" action="">
    @csrf
    <div class="mb-6 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
        Overview
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-4">
        <x-form.select id="employee_id" name="employee_id" label="Employee"
            url="{{ url('dashboard/hrms/employee/new_employee') }}" apiUrl="{{ $apiEmployeeUrl }}/employee/datatables"
            columns='["first_name","last_name"]' :keys="[
                'company_id' => $company,
            ]">
        </x-form.select>
        <input type="hidden" id="employee" name="employee" />
        <x-form.select id="company_id" name="company_id" label="Company" url="{{ url('dashboard/hrms/designation') }}"
            apiUrl="{{ $apiCompanyUrl }}/company/datatables" columns='["company_name"]' :selected="$company"
            :keys="[
                'company_id' => $company,
            ]">
            <option value="">Select Company</option>
        </x-form.select>
        <x-form.datepicker id="posting_date" label="Posting Date" name="posting_date" required />
        <x-form.select name="currency" id="currency" label="Currency" class="tom-select w-full"
            data-placeholder="Select Currency" url="{{ url('dashboard/hrms/designation') }}" required>
            <option value="">Select Currency</option>
            <option value="male">Dollar</option>
            <option value="female">Indonesian Rupiah</option>
        </x-form.select>
    </div>
    <div class="grid grid-cols-2 gap-5 mt-4">

    </div>
    <div class="mb-6 mt-4 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
        Payroll Info
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-4">
        <x-form.select name="payroll_frequency" id="payroll_frequency" label="Payroll Frequency" class="tom-select w-full"
                       data-placeholder="Select Currency" url="#" required>
            <option value="monthly">Monthly</option>
            <option value="weekly">Weekly</option>
            <option value="daily">Daily</option>
        </x-form.select>
        <x-form.select id="salary_stucture" name="salary_stucture" label="Salary Structure"
                       url="#" apiUrl="{{ $apiPayrollUrl }}/salary_structure/datatables"
                       columns='["name"]' :keys="[
                'company_id' => $company,
            ]" required>
        </x-form.select>
        <x-form.datepicker id="start_date" label="Start Date" name="start_date" required />
        <x-form.datepicker id="end_date" label="End Date" name="end_date" required />
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-2 gap-5 mt-8">
        <x-checkbox id="deduct_for_unclaimed_employee_benefits" label="Deduct Tax For Unclaimed Employee Benefits"
            name="deduct_for_unclaimed_employee_benefits" />
        <x-checkbox id="deduct_for_unsubmitted_tax_exemption_proof" label="Deduct Tax For Unsubmitted Tax Exemption Proof"
            name="deduct_for_unsubmitted_tax_exemption_proof" />
    </div>
</form>
