{{-- <form id="employee-joining-form" method="post" action="http://localhost:4444/api/v1/employee" autocomplete="off" novalidate
    class="employee-joining-form">
    @csrf --}}
<div class="grid grid-cols-1 gap-5 mt-0">
    <x-form.textarea rows="9" id="cover_letter" name="cover_letter" label="Bio/Cover Letter" />
    <small class="mt-0 mb-4 block">Short biography for website and other publications.</small>
</div>
<div class="mt-0 w-full border-t border-slate-200/60 dark:border-darkmode-400">
</div>
<div class="mb-6 mt-4 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
    <div data-tw-merge class="accordion">
        <div data-tw-merge
            class="accordion-item py-4 first:-mt-4 last:-mb-4 [&amp;:not(:last-child)]:border-b [&amp;:not(:last-child)]:border-slate-200/60 [&amp;:not(:last-child)]:dark:border-darkmode-400">
            <div class="accordion-header" id="faq-accordion-1">
                <button data-tw-merge data-tw-toggle="collapse" data-tw-target="#faq-accordion-1-collapse"
                    type="button" aria-expanded="true" aria-controls="faq-accordion-1-collapse"
                    class="accordion-button outline-none py-4 -my-4 font-medium w-full text-left dark:text-slate-400 [&amp;:not(.collapsed)]:text-primary [&amp;:not(.collapsed)]:dark:text-slate-300">Educational
                    Qualification</button>
            </div>
            <div id="faq-accordion-1-collapse" aria-labelledby="faq-accordion-1"
                class="accordion-collapse collapse mt-3 text-slate-700 leading-relaxed dark:text-slate-400 [&amp;.collapse:not(.show)]:hidden [&amp;.collapse.show]:visible show">
                <div data-tw-merge
                    class="accordion-body leading-relaxed text-slate-600 dark:text-slate-500 leading-relaxed text-slate-600 dark:text-slate-500">
                    {{-- Educational Form Here --}}
                </div>
            </div>
        </div>
        <div data-tw-merge
            class="accordion-item py-4 first:-mt-4 last:-mb-4 [&amp;:not(:last-child)]:border-b [&amp;:not(:last-child)]:border-slate-200/60 [&amp;:not(:last-child)]:dark:border-darkmode-400">
            <div class="accordion-header" id="faq-accordion-2">
                <button data-tw-merge data-tw-toggle="collapse" data-tw-target="#faq-accordion-2-collapse"
                    type="button" aria-expanded="true" aria-controls="faq-accordion-2-collapse"
                    class="accordion-button outline-none py-4 -my-4 font-medium w-full text-left dark:text-slate-400 [&amp;:not(.collapsed)]:text-primary [&amp;:not(.collapsed)]:dark:text-slate-300 collapsed">Previous
                    Work Experience</button>
            </div>
            <div id="faq-accordion-2-collapse" aria-labelledby="faq-accordion-2"
                class="accordion-collapse collapse mt-3 text-slate-700 leading-relaxed dark:text-slate-400 [&amp;.collapse:not(.show)]:hidden [&amp;.collapse.show]:visible">
                <div data-tw-merge
                    class="accordion-body leading-relaxed text-slate-600 dark:text-slate-500 leading-relaxed text-slate-600 dark:text-slate-500">
                    {{-- Work Experience Form Here --}}
                </div>
            </div>
        </div>
        <div data-tw-merge
            class="accordion-item py-4 first:-mt-4 last:-mb-4 [&amp;:not(:last-child)]:border-b [&amp;:not(:last-child)]:border-slate-200/60 [&amp;:not(:last-child)]:dark:border-darkmode-400">
            <div class="accordion-header" id="faq-accordion-3">
                <button data-tw-merge data-tw-toggle="collapse" data-tw-target="#faq-accordion-3-collapse"
                    type="button" aria-expanded="true" aria-controls="faq-accordion-3-collapse"
                    class="accordion-button outline-none py-4 -my-4 font-medium w-full text-left dark:text-slate-400 [&amp;:not(.collapsed)]:text-primary [&amp;:not(.collapsed)]:dark:text-slate-300 collapsed">How
                    History In Company</button>
            </div>
            <div id="faq-accordion-3-collapse" aria-labelledby="faq-accordion-3"
                class="accordion-collapse collapse mt-3 text-slate-700 leading-relaxed dark:text-slate-400 [&amp;.collapse:not(.show)]:hidden [&amp;.collapse.show]:visible">
                <div data-tw-merge
                    class="accordion-body leading-relaxed text-slate-600 dark:text-slate-500 leading-relaxed text-slate-600 dark:text-slate-500">
                    {{-- History in Company Form Here --}}
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <x-form.button label="Save changes" id="save-btn" style="primary" type="submit" icon="save" />

</form> --}}
{{-- @include('vendor-common.toastr') --}}
@include('vendor-common.accordion')
{{-- @push('js')
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
