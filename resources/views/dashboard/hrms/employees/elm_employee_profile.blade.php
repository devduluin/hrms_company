@if (isset($employee_id))
    <form id="profile-form" method="post" action="{{ $apiEmployeeUrl }}/employee_profile/{{ $employee_id }}"
        autocomplete="off" novalidate class="profile-form">
    @else
        <form id="profile-form" method="post" action="{{ $apiEmployeeUrl }}/employee_profile" autocomplete="off" novalidate
            class="profile-form">
@endif
@csrf
<div class="grid grid-cols-1 gap-5 mt-0">
    <x-form.textarea rows="9" id="bio_cover_letter" name="bio_cover_letter" label="Bio/Cover Letter" />
</div>
<div class="mt-0 w-full border-t border-slate-200/60 dark:border-darkmode-400">
</div>
</form>
<div class="mb-6 mt-4 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">

    <div data-tw-merge class="accordion">
        <div data-tw-merge
            class="accordion-item py-4 first:-mt-4 last:-mb-4 [&amp;:not(:last-child)]:border-b [&amp;:not(:last-child)]:border-slate-200/60 [&amp;:not(:last-child)]:dark:border-darkmode-400 p-4 first:mt-0 last:mb-0 border border-slate-200/60 mt-3 dark:border-darkmode-400">
            <div class="accordion-header" id="faq-accordion-5">
                <button data-tw-merge data-tw-toggle="collapse" data-tw-target="#faq-accordion-5-collapse"
                    type="button" aria-expanded="true" aria-controls="faq-accordion-5-collapse"
                    class="accordion-button outline-none py-4 -my-4 font-medium w-full text-left dark:text-slate-400 [&amp;:not(.collapsed)]:text-primary [&amp;:not(.collapsed)]:dark:text-slate-300">Educational
                    Qualification</button>
            </div>
            <div id="faq-accordion-5-collapse" aria-labelledby="faq-accordion-5"
                class="accordion-collapse collapse mt-3 text-slate-700 leading-relaxed dark:text-slate-400 [&amp;.collapse:not(.show)]:hidden [&amp;.collapse.show]:visible show">
                <div data-tw-merge
                    class="accordion-body leading-relaxed text-slate-600 dark:text-slate-500 leading-relaxed text-slate-600 dark:text-slate-500">
                    @include('dashboard.hrms.employees.employee_profile_component.elm_employee_profile_educational')
                </div>
            </div>
        </div>
        <div data-tw-merge
            class="accordion-item py-4 first:-mt-4 last:-mb-4 [&amp;:not(:last-child)]:border-b [&amp;:not(:last-child)]:border-slate-200/60 [&amp;:not(:last-child)]:dark:border-darkmode-400 p-4 first:mt-0 last:mb-0 border border-slate-200/60 mt-3 dark:border-darkmode-400">
            <div class="accordion-header" id="faq-accordion-6">
                <button data-tw-merge data-tw-toggle="collapse" data-tw-target="#faq-accordion-6-collapse"
                    type="button" aria-expanded="true" aria-controls="faq-accordion-6-collapse"
                    class="accordion-button outline-none py-4 -my-4 font-medium w-full text-left dark:text-slate-400 [&amp;:not(.collapsed)]:text-primary [&amp;:not(.collapsed)]:dark:text-slate-300 collapsed">Previous
                    Work Experience</button>
            </div>
            <div id="faq-accordion-6-collapse" aria-labelledby="faq-accordion-6"
                class="accordion-collapse collapse mt-3 text-slate-700 leading-relaxed dark:text-slate-400 [&amp;.collapse:not(.show)]:hidden [&amp;.collapse.show]:visible">
                <div data-tw-merge
                    class="accordion-body leading-relaxed text-slate-600 dark:text-slate-500 leading-relaxed text-slate-600 dark:text-slate-500">
                    @include('dashboard.hrms.employees.employee_profile_component.elm_employee_profile_experience')
                </div>
            </div>
        </div>
        {{-- <div data-tw-merge
            class="accordion-item py-4 first:-mt-4 last:-mb-4 [&amp;:not(:last-child)]:border-b [&amp;:not(:last-child)]:border-slate-200/60 [&amp;:not(:last-child)]:dark:border-darkmode-400 p-4 first:mt-0 last:mb-0 border border-slate-200/60 mt-3 dark:border-darkmode-400">
            <div class="accordion-header" id="faq-accordion-7">
                <button data-tw-merge data-tw-toggle="collapse" data-tw-target="#faq-accordion-7-collapse"
                    type="button" aria-expanded="true" aria-controls="faq-accordion-7-collapse"
                    class="accordion-button outline-none py-4 -my-4 font-medium w-full text-left dark:text-slate-400 [&amp;:not(.collapsed)]:text-primary [&amp;:not(.collapsed)]:dark:text-slate-300 collapsed">History
                    in Company</button>
            </div>
            <div id="faq-accordion-7-collapse" aria-labelledby="faq-accordion-7"
                class="accordion-collapse collapse mt-3 text-slate-700 leading-relaxed dark:text-slate-400 [&amp;.collapse:not(.show)]:hidden [&amp;.collapse.show]:visible">
                <div data-tw-merge
                    class="accordion-body leading-relaxed text-slate-600 dark:text-slate-500 leading-relaxed text-slate-600 dark:text-slate-500">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's
                    standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                    scrambled it to make
                    a type specimen book. It has survived not only five centuries, but also the leap into electronic
                    typesetting,
                    remaining essentially unchanged.
                </div>
            </div>
        </div> --}}
    </div>
</div>
<div class="mt-6 flex  md:justify-end">
    <x-form.button label="Save changes" id="profile-btn" style="primary" type="button" icon="save" />
</div>
@pushOnce('js')
    <script src="{{ asset('dist/js/vendors/accordion.js') }}"></script>
@endPushOnce
