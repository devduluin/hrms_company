<div class="box box--stacked flex flex-col p-5">
<form id="settingForm-3" method="PATCH" action="{{ $companyUrl.'/'.$company }}">
    <div class="mb-6 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
    {{ $page_title }}
    </div>
    <div>
        <div class="mt-5 block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
            <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                <div class="text-left">
                    <div class="flex items-center">
                        <div class="font-medium">Language</div>
                        <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                            Required
                        </div>
                    </div>
                    <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                        Select your preferred language from the available
                        options.
                    </div>
                </div>
            </div>
            <div class="mt-3 w-full flex-1 xl:mt-0">
                <select id="language" name="language" data-title="Language" data-placeholder="Select your language" class="tom-select w-full">
                    <option value="en">
                        English
                    </option>
                    <option value="id">
                        Bahasa
                    </option> 
                </select>
            </div>
        </div>
        <div class="mt-5 block flex-col pt-5 first:mt-0 first:pt-0 sm:flex xl:flex-row xl:items-center">
            <div class="mb-2 inline-block sm:mb-0 sm:mr-5 sm:text-right xl:mr-14 xl:w-60">
                <div class="text-left">
                    <div class="flex items-center">
                        <div class="font-medium">Time Zone</div>
                        <div class="ml-2.5 rounded-md border border-slate-200 bg-slate-100 px-2 py-0.5 text-xs text-slate-500 dark:bg-darkmode-300 dark:text-slate-400">
                            Required
                        </div>
                    </div>
                    <div class="mt-1.5 text-xs leading-relaxed text-slate-500/80 xl:mt-3">
                        Select your current time zone from the list of
                        available options.
                    </div>
                </div>
            </div>
            <div class="mt-3 w-full flex-1 xl:mt-0">
                <select id="time_zone" name="time_zone" data-title="Time Zone" data-url="{{ url('dashboard/settings/timezone') }}" data-placeholder="Select your timezone" class="tom-select w-full">
                    <option value="Asia/Jakarta">
                        Asia/Jakarta (WIB)
                    </option>
                    <option value="Asia/Ujung_Pandang">
                        Asia/Ujung_Pandang (WITA)
                    </option>
                    <option value="Asia/Jayapura">
                        Asia/Jayapura (WIT)
                    </option>
                </select>
            </div>
        </div>
        
    </div>
    <div class="mt-6 flex border-t border-dashed border-slate-300/70 pt-5 md:justify-end">
        
    </div>
</from>
</div>

