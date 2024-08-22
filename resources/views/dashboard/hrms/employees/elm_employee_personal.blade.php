{{-- <form id="employee-joining-form" method="post" action="http://localhost:4444/api/v1/employee" autocomplete="off" novalidate
    class="employee-joining-form">
    @csrf --}}
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
        url="{{ url('dashboard/hrms/designation') }}" apiUrl="{{ $data['apiCompanyUrl'] }}/branch/datatables"
        columns='["branch_name"]' :keys="[
            'company_id' => $data['company'],
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
{{-- <x-form.button label="Save changes" id="save-btn" style="primary" type="submit" icon="save" />
</form>
@include('vendor-common.toastr')
@push('js')
    <script>
        $(document).ready(function() {
            $("#employee-joining-form").on('submit', async function(e) {
                e.preventDefault();
                const formData = $(this).serializeArray();
                const data = {};
                formData.forEach(field => {
                    data[field.name] = field.value;
                });

                const csrfToken = $('meta[name="csrf-token"]').attr('content');
                data._token = csrfToken;
                data.company_id = localStorage.getItem('company');
                data.user_id = "a77061e8-8ed8-4919-9f9b-f975d87e0253";
                data.employee_id = "a77061e8-8ed8-4919-9f9b-f975d87e0253";
                $('.error-message').hide();

                try {
                    const response = await $.ajax({
                        url: $(this).attr('action'),
                        type: 'POST',
                        contentType: 'application/json',
                        data: JSON.stringify(data),
                        dataType: 'json'
                    });

                    if (response.success) {
                        toastr.success(response.message);
                        // Optional redirection or other actions
                        setTimeout(function() {
                            history.back(-1);
                        }, 2000);
                    } else {
                        toastr.error(response.message);
                    }
                } catch (xhr) {
                    console.log(xhr.responseText);
                    const response = JSON.parse(xhr.responseText);

                    if (response.status === "error" && response.code === 400) {
                        handleErrorResponse(response);
                    } else {
                        toastr.error('An error occurred while processing your request.');
                    }
                }
            });
        });

        function handleErrorResponse(result) {
            const errorMessage = result.error;
            toastr.error('There were validation errors:');
            displayFormattedError(errorMessage);
        }

        function displayFormattedError(errorMessage) {
            $('.invalid-feedback').remove();
            $('.is-invalid').removeClass('is-invalid');

            const errorPattern = /\"([^\"]+)\"/g;
            let match;

            while ((match = errorPattern.exec(errorMessage)) !== null) {
                const fieldName = match[1];
                const input = $(`[name="${fieldName}"]`);

                input.addClass('is-invalid');
                input.before(
                    `<div class="error-message text-danger mt-1 text-xs text-slate-500 sm:ml-auto sm:mt-0 mb-2">${fieldName} is not allowed to be empty</div>`
                );
            }
        }
    </script>
@endpush --}}
