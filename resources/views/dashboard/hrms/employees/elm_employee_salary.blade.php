@if (isset($employee_id))
    <form id="salary-form" method="post" action="{{ $apiEmployeeUrl }}/employee_salary/{{ $employee_id }}"
        autocomplete="off" novalidate class="salary-form">
    @else
        <form id="salary-form" method="post" action="{{ $apiEmployeeUrl }}/employee_salary" autocomplete="off" novalidate
            class="salary-form">
@endif
@csrf
<div class="mb-6 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
    Salary
</div>
<div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-2 gap-5 mt-4">
    <x-form.input id="cost_to_company" label="Cost to Company (CTC)" name="cost_to_company" />

    {{-- <x-form.select id="payroll_cost_center" name="payroll_cost_center" label="Payroll Cost Center"
        url="{{ url('dashboard/hrms/designation') }}" apiUrl="{{ $apiPayrollUrl }}/cost_center/datatables"
        columns='["cost_center_name"]' :selected="$company" :keys="['company_id' => $company]">
        <option value="">Select Cost Center</option>
    </x-form.select> --}}

    <x-form.select name="salary_currency" id="salary_currency" label="Salary Currency" class="tom-select w-full"
        data-placeholder="Select salutation" url="{{ url('dashboard/hrms/designation') }}">
        <option value="">Select currency</option>
        <option value="IDR">Rupiah</option>
    </x-form.select>

    <x-form.select name="salary_mode" id="salary_mode" label="Salary Mode" class="tom-select w-full"
        data-placeholder="Select Salary Mode" url="{{ url('dashboard/hrms/designation') }}">
        <option value="">Select mode</option>
        <option value="bank">Bank Transfer</option>
        <option value="cash">Cash</option>
    </x-form.select>

</div>
<div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-2 gap-5 mt-4 bank_transfer_box hidden">
    <x-form.input name="bank_name" id="bank_name" label="Bank Name" placeholder="Type Bank Name" />
    <x-form.input name="bank_account_number" id="bank_account_number" label="Bank Account Number"
        placeholder="Type Bank Account
    Number" />
    <x-form.input name="bank_account_holder" id="bank_account_holder" label="Bank Account Holder Name"
        placeholder="Type Bank
    Account
    Holder Name" />
</div>
<div class="grid grid-cols-2 gap-5 mt-4">

</div>
<div class="mt-6 flex border-t border-dashed border-slate-300/70 pt-5 md:justify-end">
    <x-form.button label="Save changes" id="salary-btn" style="primary" type="button" icon="save" />
</div>
</form>
