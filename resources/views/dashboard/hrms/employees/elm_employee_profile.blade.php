@if (isset($employee_id))
    <form id="profile-form" method="post" action="{{ $apiEmployeeUrl }}/employee_profile/{{ $employee_id }}"
        autocomplete="off" novalidate class="profile-form">
    @else
        <form id="profile-form" method="post" action="{{ $apiEmployeeUrl }}/employee_profile" autocomplete="off" novalidate
            class="profile-form">
@endif
@csrf
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
            <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">

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
            <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">

            </div>
        </div>
    </div>
    <div class="flex-1 sm:w-full w-80 mt-3 xl:mt-0">
        <input data-tw-merge="" type="date" placeholder="Select a date"
            class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80">
    </div>
</div>
<div class="mt-6 flex  md:justify-end">
    <x-form.button label="Save changes" id="profile-btn" style="primary" type="button" icon="save" />
</div>

</form>
