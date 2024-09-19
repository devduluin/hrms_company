
<form id="overview-form" method="post" action="">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-2">
        <div class=" gap-5 mt-2">
            <x-form.input id="employee_name" label=" Name" name="employee_name" required />
            <x-form.input id="abbr" label="Abbr" name="abbr" required />
            <x-form.select name="type" id="type" label="Type" class="tom-select w-full"
                data-placeholder="Select Type" url="{{ url('dashboard/hrms/designation') }}" required>
                <option value="male">Earning</option>
                <option value="female">Deduction</option>
            </x-form.select>
            <x-form.input id="description" label="Description" name="description" required />
        </div>
        <div class="gap-y-6 mt-2">
            <x-checkbox id="is_depends_on_payment_days"
                label="Depends on Payment Days"
                name="is_depends_on_payment_days"
                guidelines="" />
            <x-checkbox id="is_tax_applicable"
                label="Is Tax Applicable"
                name="is_tax_applicable"
                guidelines="" />
            <x-checkbox id="is_deduct_full_tax_on_selected_payroll_date"
                label="Deduct Full Tax on Selected Payroll Date"
                name="is_deduct_full_tax_on_selected_payroll_date"
                guidelines="" />
            <x-checkbox id="is_round_to_the_nearest_integer"
                label="Round to the Nearest Integer"
                name="is_round_to_the_nearest_integer"
                guidelines="" />
            <x-checkbox id="is_statistical_component"
                label="Statistical Component"
                name="is_statistical_component"
                guidelines="If enabled, the value specified or calculated in this component will not contribute to the earnings or deduction. However, it's value can be referenced by other components that can be added or deducted" />
            <x-checkbox id="is_do_not_include_in_total"
                label="Do Not Include in Total"
                name="is_do_not_include_in_total"
                guidelines="" />
            <x-checkbox id="is_remove_if_zero_valued"
                label="Remove if Zero Valued"
                name="is_remove_if_zero_valued"
                guidelines="If enabled, the component will not be displayed in the salary slip if the amount is zero" />
            <x-checkbox id="is_disable"
                label="Disable"
                name="is_disable"
                guidelines="" />
        </div>
    </div>
    <div class="grid grid-cols-2 gap-5 mt-4">

    </div>
    <div class="mb-6 mt-4 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
        Account
    </div>
    <x-table_custom h1="No" h2="Company" h3="Account">
    </x-table_custom>
</form>
