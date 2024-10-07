@csrf

    <div class="box box--stacked flex flex-col p-1.5">
        <div
            class="relative h-60 w-full rounded-[0.6rem] bg-gradient-to-b from-theme-1/95 to-theme-2/95">
            <div
                class="w-full h-full relative overflow-hidden before:content-[''] before:absolute before:inset-0 before:bg-texture-white before:-mt-[50rem] after:content-[''] after:absolute after:inset-0 after:bg-texture-white after:-mt-[50rem]">
            </div>
            <div class="absolute inset-x-0 top-0 mx-auto mt-36 h-32 w-32">
                <div
                    class="box image-fit h-full w-full overflow-hidden rounded-full border-[6px] border-white">
                    <img src="{{ asset('img/logo/duluin.jpg') }}"
                        alt="Tailwise - Admin Dashboard Template">
                </div>
                <div
                    class="box absolute bottom-0 right-0 mb-2.5 mr-2.5 h-5 w-5 rounded-full border-2 border-white bg-success">
                </div>
            </div>
        </div>
        <div
            class="flex flex-col gap-y-3 rounded-[0.6rem] bg-slate-50 p-5 pt-12 sm:flex-row sm:items-end">
            <button
                class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed text-primary dark:border-primary [&amp;:hover:not(:disabled)]:bg-primary/10 border-primary/50 sm:ml-auto"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" data-lucide="image"
                    class="lucide lucide-image mr-2.5 h-4 w-4 stroke-[1.3]">
                    <rect width="18" height="18" x="3" y="3" rx="2"
                        ry="2"></rect>
                    <circle cx="9" cy="9" r="2"></circle>
                    <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path>
                </svg>
                Upload Cover</button>
        </div>
    </div>
    <x-form.input id="company_name" label="Company Name" name="company name" required />
    <x-form.input id="domain" label="Domain" name="domain" required />
    <x-form.datepicker id="date_of_establishment" label="Date Of Establishment" name="date_of_establishment" required />
    <x-form.select name="currency" id="currency" label="Default Currency" class=" w-full"
        data-placeholder="Select Currency"  required>
        <option value="">Select Gender</option>
        <option value="male">IDR</option>
        <option value="female">USD</option>
    </x-form.select>
</form>

   

