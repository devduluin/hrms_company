{{-- <form id="employee-joining-form" method="post" action="http://localhost:4444/api/v1/employee" autocomplete="off" novalidate
    class="employee-joining-form">
    @csrf --}}
<div class="mb-6 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
    Address & Contact
</div>
<div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-2 gap-5 mt-4">
    <x-form.input id="phone_number" label="Mobile" name="phone_number" />
    <x-form.input id="personal_email" label="Personal Email" name="personal_email" />
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
