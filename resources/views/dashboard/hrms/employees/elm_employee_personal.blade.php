<form id="personal-form" method="post" action="{{ $apiEmployeeUrl }}/employee_personal_data" autocomplete="off" novalidate
    class="personal-form">
    @csrf
    <div class="mb-6 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
        Personal
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-2 gap-5 mt-4">
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
            <option value="a+">A+</option>
            <option value="a-">A-</option>
            <option value="b+">B+</option>
            <option value="b-">B-</option>
            <option value="ab+">AB+</option>
            <option value="ab-">AB-</option>
            <option value="o+">O+</option>
            <option value="o-">O-</option>
        </x-form.select>
    </div>
    <div class="grid grid-cols-2 gap-5 mt-4">
        <x-form.textarea id="family_background" name="family_background" label="Family Background" />

        <x-form.textarea id="health_detail" name="health_detail" label="Health Detail" />
    </div>
    <div class="mb-6 mt-4 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
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
    </div>
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
    <div class="mb-6 mt-4 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">

    </div>
    <x-form.button label="Save changes" id="personal-btn" style="primary" type="button" icon="save" />
</form>
