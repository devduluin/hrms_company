<form id="profile-form" method="post" action="{{ $apiEmployeeUrl }}/employee_profile" autocomplete="off" novalidate
    class="profile-form">
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
    <x-form.button label="Save changes" id="profile-btn" style="primary" type="button" icon="save" />

</form>
