<form id="overview-form" method="post" action="">
        @csrf
        <div class="mb-6 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
            Overview
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-4">
            <x-form.input id="employee_name" label="Employee Name" name="employee_name" required />
            <x-form.input id="company" label="Company" name="company" required />
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
            <x-form.input id="payroll_frequency" label="Payroll Frequency" name="payroll_frequency" required />
            <x-form.input id="salary_stucture" label="Salary Structure" name="salary_structure" required />
            <x-form.datepicker id="start_date" label="Start Date" name="start_date" required />
            <x-form.datepicker id="end_date" label="End Date" name="end_date" required />
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-2 gap-5 mt-8">
            <x-checkbox id="deduct_for_exemption_proof" label="Deduct Tax for Unsubmitted Tax Exemption Proof" name="deduct_for_exemption_proof"  />
            <x-checkbox id="deduct_for_exemption_proof" label="Deduct Tax for Unsubmitted Tax Exemption Proof" name="deduct_for_exemption_proof"  />
            <x-checkbox id="deduct_for_exemption_proof" label="Deduct Tax for Unsubmitted Tax Exemption Proof" name="deduct_for_exemption_proof"  />
        </div>
    </form>
