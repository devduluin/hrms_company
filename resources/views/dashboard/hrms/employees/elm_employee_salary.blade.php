{{-- <form id="employee-attendance-form" method="post" action="http://localhost:4444/api/v1/employee" autocomplete="off"
    novalidate class="employee-attendance-form">
    @csrf --}}
<div class="mb-6 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
    Salary
</div>
<div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-2 gap-5 mt-4">
    <x-form.input id="cost_to_company" label="Cost to Company (CTC)" name="cost_to_company" />

    <x-form.select id="payroll_cost_center" name="payroll_cost_center" label="Payroll Cost Center"
        url="{{ url('dashboard/hrms/designation') }}" apiUrl="{{ $apiCompanyUrl }}/company/datatables"
        columns='["company_name"]' :selected="$company" :keys="[
            'company_id' => $company,
        ]">
        <option value="">Select Company</option>
    </x-form.select>

    <x-form.select name="salary_currency" id="salary_currency" label="Salary Currency" class="tom-select w-full"
        data-placeholder="Select salutation" url="{{ url('dashboard/hrms/designation') }}">
        <option value="">Select currency</option>
    </x-form.select>

    <x-form.select name="salary_mode" id="salary_mode" label="Salary Mode" class="tom-select w-full"
        data-placeholder="Select salutation" url="{{ url('dashboard/hrms/designation') }}">
        <option value="">Select mode</option>
    </x-form.select>
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
            $("#employee-attendance-form").on('submit', async function(e) {
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
