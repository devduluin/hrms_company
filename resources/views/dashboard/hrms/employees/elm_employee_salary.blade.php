<form id="salary-form" method="post" action="{{ $apiEmployeeUrl }}/employee_salary" autocomplete="off" novalidate
    class="salary-form">
    @csrf
    <div class="mb-6 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
        Salary
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-2 gap-5 mt-4">
        <x-form.input id="cost_to_company" label="Cost to Company (CTC)" name="cost_to_company" />

        <x-form.select id="payroll_cost_center" name="payroll_cost_center" label="Payroll Cost Center"
            url="{{ url('dashboard/hrms/designation') }}" apiUrl="{{ $apiCompanyUrl }}/company/datatables"
            columns='["company_name"]' :selected="$company" :keys="[
                'company_id' => $company,
            ]">
            <option value="">Select Company</option>
        </x-form.select>

        <x-form.select name="salary_currency" id="salary_currency" label="Salary Currency" class="tom-select w-full"
            data-placeholder="Select salutation" url="{{ url('dashboard/hrms/designation') }}">
            <option value="">Select currency</option>
        </x-form.select>

        <x-form.select name="salary_mode" id="salary_mode" label="Salary Mode" class="tom-select w-full"
            data-placeholder="Select salutation" url="{{ url('dashboard/hrms/designation') }}">
            <option value="">Select mode</option>
        </x-form.select>
    </div>
    <div class="grid grid-cols-2 gap-5 mt-4">

    </div>
    <div class="mt-6 flex border-t border-dashed border-slate-300/70 pt-5 md:justify-end">
        <x-form.button label="Save changes" id="salary-btn" style="primary" type="button" icon="save" />
    </div>
</form>
