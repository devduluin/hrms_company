<form id="overview-form" method="post" action="{{ $apiPayrollUrl }}/salary_component">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-2">
        <div class=" gap-5 mt-2">
            <input type="hidden" id="parent_company" name="parent_company" />
            <x-form.select id="company_id" name="company_id" label="Company" url="{{ url('dashboard/hrms/designation') }}"
                apiUrl="{{ $apiCompanyUrl }}/company/datatables" columns='["company_name"]' :keys="[
                    'company_id' => $company,
                ]">
                <option value="">Select Company</option>
            </x-form.select>
            <x-form.input id="name" label="Name" name="name" required />
            <x-form.select name="type" id="type" label="Type" class="tom-select w-full"
                data-placeholder="Select Type" url="{{ url('dashboard/hrms/designation') }}" required>
                <option value="earning">Earning</option>
                <option value="deduction">Deduction</option>
            </x-form.select>
            <x-form.input id="description" label="Description" name="description" required />
        </div>
        <div class="gap-y-6 mt-2">
            <x-checkbox label="Depends on Payment Days" name="depends_on_payment_day" id="depends_on_payment_day"
                guidelines="" />
            <x-checkbox label="Is Tax Applicable" name="is_tax_applicable" id="is_tax_applicable" guidelines="" />
            <x-checkbox label="Deduct Full Tax on Selected Payroll Date" name="deduct_tax_on_payroll_date"
                id="deduct_tax_on_payroll_date" guidelines="" />
            <x-checkbox label="Round to the Nearest Integer" name="round_nearest_integer" id="round_nearest_integer"
                guidelines="" />
            {{--            <x-checkbox id="is_statistical_component" --}}
            {{--                label="Statistical Component" --}}
            {{--                name="is_statistical_component" id="is_statistical_component" --}}
            {{--                guidelines="If enabled, the value specified or calculated in this component will not contribute to the earnings or deduction. However, it's value can be referenced by other components that can be added or deducted" /> --}}
            <x-checkbox label="Do Not Include in Total" name="include_in_total" id="include_in_total" guidelines="" />
            <x-checkbox label="Remove if Zero Valued" name="remove_if_zero" id="remove_if_zero"
                guidelines="If enabled, the component will not be displayed in the salary slip if the amount is zero" />
            <x-checkbox id="is_disable" label="Disable" name="is_disable" guidelines="" />
            <x-checkbox id="is_basic_deduction" label="Basic Deduction" name="is_basic_deduction" guidelines="" />
        </div>
    </div>
    <div class="grid grid-cols-2 gap-5 mt-4">

    </div>
    {{--    <div class="mb-6 mt-4 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium"> --}}
    {{--        Account --}}
    {{--    </div> --}}
    {{--    <x-table_custom h1="No" h2="Company" h3="Account"> --}}
    {{--    </x-table_custom> --}}
    <div class="grid grid-cols-2 gap-5 mt-4">

    </div>
    <div class="mt-6 flex border-t border-dashed border-slate-300/70 pt-5 md:justify-end">
        <x-form.button label="Save changes" id="overview-btn" style="primary" type="button" icon="save" />
    </div>
</form>
