@if (isset($employee_id))
    <form id="joining-form" method="post" action="{{ $apiEmployeeUrl }}/employee_joining/{{ $employee_id }}">
    @else
        <form id="joining-form" method="post" action="{{ $apiEmployeeUrl }}/employee_joining">
@endif
@csrf
<div class="mb-6 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
    Joining
</div>
<div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-2 gap-5 mt-4">
    {{--<x-form.select id="applicant_id" name="applicant_id" label="Job Applicant" url="{{ url('dashboard/hrms/applicant') }}"
        apiUrl="{{ $apiCompanyUrl }}/applicant/datatables" columns='["applicant_name"]' :keys="[
            'company_id' => $company,
        ]">
        <option value="">Select Applicant</option>
    </x-form.select>--}}
    <x-form.datepicker id="confirmation_date" label="Confirmation Date" name="confirmation_date" />
    <x-form.input id="notice_day" type="number" label="Exit Notice (days)" name="notice_day" />
    <x-form.datepicker id="offer_date" label="Offer Date" name="offer_date" />
    <x-form.datepicker id="contract_end_date" label="Contract End Date" name="contract_end_date" />
    <x-form.datepicker id="date_of_retirement" label="Date of Retirement" name="date_of_retirement" />
</div>
<div class="grid grid-cols-2 gap-5 mt-4">

</div>
<div class="grid grid-cols-2 gap-5 mt-4">

</div>
<div class="mt-6 flex border-t border-dashed border-slate-300/70 pt-5 md:justify-end">
    <x-form.button label="Save changes" id="joining-btn" style="primary" type="button" icon="save" />
</div>
</form>
