@if (isset($employee_id))
    <form id="address-form" method="post" action="{{ $apiEmployeeUrl }}/employee_address_contact/{{ $employee_id }}"
        autocomplete="off" novalidate class="employee-joining-form">
    @else
        <form id="address-form" method="post" action="{{ $apiEmployeeUrl }}/employee_address_contact" autocomplete="off"
            novalidate class="employee-joining-form">
@endif
@csrf
<div class="mb-6 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
    Address & Contact
</div>
<div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-2 gap-5 mt-4">
    <x-form.input id="company_email" label="Company Email" name="company_email" />
    <x-form.select name="prefered_contact_email" id="prefered_contact_email" label="Prefered Contact Email"
        class="tom-select w-full" data-placeholder="Select Prefered Contact Email"
        url="{{ url('dashboard/hrms/designation') }}">
        <option value="">Select Contact Email Prefered</option>
        <option value="company_email">Company Email</option>
        <option value="personal">Personal Email</option>
        <option value="user_id">User ID</option>
    </x-form.select>
</div>
<div class="grid grid-cols-2 gap-5 mt-4">

</div>
<div class="mb-6 mt-4 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
    Address
</div>
<div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-2 gap-5 mt-4">
    <x-form.input id="current_address" label="Current Address" name="current_address" />
    <x-form.input id="permanent_address" label="Permanent Address" name="permanent_address" />
</div>
<div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-2 gap-5 mt-4">
    <x-form.select name="current_address_status" id="current_address_status" label="Current Address Status"
        class="tom-select w-full" data-placeholder="Select Status" url="{{ url('dashboard/hrms/designation') }}">
        <option value="">Select Status</option>
        <option value="rented">Rented</option>
        <option value="owned">Owned</option>
    </x-form.select>
    <x-form.select name="permanent_address_status" id="permanent_address_status" label="Permanent Address Status"
        class="tom-select w-full" data-placeholder="Select Status" url="{{ url('dashboard/hrms/designation') }}">
        <option value="">Select Status</option>
        <option value="rented">Rented</option>
        <option value="owned">Owned</option>
    </x-form.select>
</div>
<div class="grid grid-cols-2 gap-5 mt-4">

</div>
<div class="mb-6 mt-4 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
    Emergency Contact
</div>
<div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-2 gap-5 mt-4">
    <x-form.input id="emergency_contact_name" label="Emergency Contact Name" name="emergency_contact_name" />
    <x-form.input id="emergency_phone" label="Emergency Phone" name="emergency_phone" />
    <x-form.input id="relation" label="Relation" name="relation" />
</div>
<div class="grid grid-cols-2 gap-5 mt-4">

</div>
<div class="mb-6 mt-4 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">

</div>
<x-form.button label="Save changes" id="address-btn" style="primary" type="button" icon="save" />
</form>
