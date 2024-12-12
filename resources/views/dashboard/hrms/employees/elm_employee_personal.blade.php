<div class="mb-6 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
    Personal
</div>
<x-dropzonefile folder="employees" employee="{{ isset($employee_id) ? $employee_id : null }}"
    action="http://apidev.duluin.com/api/users/file_uploader" label="Employee Picture" id="employee_picture" />
<div id="employee_picture_box" class="hidden"></div>
<div class="border border-dashed rounded-md border-slate-300/80 hidden" id="avatar_box_container">
    <div class="grid grid-cols-9 gap-5 px-5 pt-5 sm:grid-cols-10">
        <div class="relative h-48 w-48 col-span-3 cursor-pointer image-fit zoom-in md:col-span-2">
            <img class="rounded-lg" id="avatar_box" alt="Tailwise - Admin Dashboard Template">
            <span data-placement="top"
                class="tooltip cursor-pointer absolute top-0 right-0 w-5 h-5 -mt-2 -mr-2 bg-white rounded-full"
                id="deleteImage"><span
                    class="flex items-center justify-center w-full h-full text-white border rounded-full border-danger/50 bg-danger/80">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" data-lucide="x" class="lucide lucide-x h-4 w-4 stroke-[1.3]">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </span></span>
        </div>
    </div>
</div>
@if (isset($employee_id))
    <form id="personal-form" method="post" action="{{ $apiEmployeeUrl }}/employee_personal_data/{{ $employee_id }}"
        autocomplete="off" novalidate class="personal-form">
    @else
        <form id="personal-form" method="post" action="{{ $apiEmployeeUrl }}/employee_personal_data" autocomplete="off"
            novalidate class="personal-form">
@endif
@csrf
<div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-2 gap-5 mt-4">
    <input type="hidden" name="avatar" id="avatar">

    <x-form.select name="marital_status" id="marital_status" label="Marital Status" class="tom-select w-full"
        data-placeholder="Select Status" url="{{ url('dashboard/hrms/designation') }}">
        <option value="">Select Status</option>
        <option value="single">Single</option>
        <option value="married">Married</option>
        <option value="divorced">Divorced</option>
        <option value="widowed">Widowed</option>
    </x-form.select>

    <x-form.select name="blood_group" id="blood_group" label="Blood Group" class="tom-select w-full"
        data-placeholder="Select Blood" url="{{ url('dashboard/hrms/designation') }}">
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
    </x-form.select>
</div>
<div class="grid grid-cols-2 gap-5 mt-4">
    <x-form.textarea id="family_background" name="family_background" label="Family Background" />

    <x-form.textarea id="health_detail" name="health_detail" label="Health Detail" />
</div>
{{-- <div class="mb-6 mt-4 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
    Health Insurance
</div>
<div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-2 gap-5 mt-2">
    <x-form.select id="health_insurance" name="health_insurance" label="Health Insurance Provider"
        url="{{ url('dashboard/hrms/designation') }}" apiUrl="{{ $apiCompanyUrl }}/branch/datatables"
        columns='["branch_name"]' :keys="[
            'company_id' => $company,
        ]">
        <option value="">Select Provider</option>
    </x-form.select>
</div> --}}
<div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-2 gap-5 mt-4">

</div>
<div class="mb-6 mt-4 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
    Passport Details
</div>
<div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-2 gap-5 mt-4">
    <x-form.input id="passport_number" label="Passport Number" name="passport_number" />

    <x-form.datepicker id="date_of_issued" label="Date of Issued" name="date_of_issued" required />

    <x-form.datepicker id="valid_upto" label="Valid up To" name="valid_upto" required />

    <x-form.input id="place_of_issued" label="Place of Issued" name="place_of_issued" />
</div>
<div class="grid grid-cols-2 gap-5 mt-4">

</div>
<div class="mt-6 flex border-t border-dashed border-slate-300/70 pt-5 md:justify-end">
    <x-form.button label="Save changes" id="personal-btn" style="primary" type="button" icon="save" />
</div>
</form>
