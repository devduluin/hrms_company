@if (isset($employee_id))
    <form id="exit-form" method="post" action="{{ $apiEmployeeUrl }}/employee_exit/{{ $employee_id }}" autocomplete="off"
        novalidate class="employee-attendance-form">
    @else
        <form id="exit-form" method="post" action="{{ $apiEmployeeUrl }}/employee_exit" autocomplete="off" novalidate
            class="employee-attendance-form">
@endif
@csrf
<div class="mb-6 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
    Exit
</div>
<div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-2 gap-5 mt-4">
    <x-form.datepicker id="resignation_letter_date" label="Resignation Letter Date" name="resignation_letter_date" />

    <x-form.datepicker id="exit_interview_held_on" label="Exit Interview Held On" name="exit_interview_held_on" />

    <x-form.select name="leave_encashed" id="leave_encashed" label="Leave Encashed?" class="tom-select w-full"
        data-placeholder="Select Status" url="{{ url('dashboard/hrms/designation') }}">
        <option value="">Select Status</option>
        <option value="yes">Yes</option>
        <option value="no">No</option>
    </x-form.select>

    <x-form.datepicker id="relieving_date" label="Relieving Date" name="relieving_date" />

    <x-form.input id="new_workplace" label="New Workplace" name="new_workplace" />
</div>
<div class="grid grid-cols-2 gap-5 mt-4">

</div>
<div class="mb-6 mt-4 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
    Feedback
</div>
<div class="grid grid-cols-2 gap-5 mt-4">
    <x-form.textarea rows="9" id="reason_for_leaving" name="reason_for_leaving" label="Reason for Leaving" />

    <x-form.textarea rows="9" id="feedback" name="feedback" label="Feedback" />
</div>
<div class="mt-6 flex border-t border-dashed border-slate-300/70 pt-5 md:justify-end">
    <x-form.button label="Save changes" id="exit-btn" style="primary" type="button" icon="save" />
</div>
</form>
