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

   
@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            getCompanybyId();
        });

        let companyId = localStorage.getItem('company');
        const appToken = localStorage.getItem('app_token');
        async function getCompanybyId() {
            try {
                const response = await fetch(`{{ $companyApiUrl }}/company/` + companyId, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${appToken}`,
                        'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`
                    },
                });

                const result = await response.json();
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }

                //tampilkan data company
                document.getElementById('company_name').value = result.data.company_name;
                document.getElementById('domain').value = result.data.domain;
                document.getElementById('date_of_establishment').value = result.data.date_of_establishment;
                document.getElementById('default_holiday_list').value = result.data.default_holiday_list;
                document.getElementById('status').value = result.data.status;
                document.getElementById('default_currency').value = result.data.default_currency;

                showSuccessNotification(result.message, "The operation was completed successfully.");

            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred while submitting the data');
            }
        }

        document.getElementById('formUpdateCompany').addEventListener('submit', async function(event) {
            event.preventDefault();

            const formData = new FormData(this);

            const data = {
                company_name: formData.get('company_name'),
                domain: formData.get('domain'),
                date_of_establishment: formData.get('date_of_establishment'),
                // parent_company: formData.get('parent_company'),
                parent_company: localStorage.getItem('company'),
                status: formData.get('status'),
                default_currency: formData.get('default_currency'),
                default_holiday_list: formData.get('default_holiday_list')
            };

            console.log(data);


            try {
                const response = await fetch(`{{ $companyApiUrl }}/company/` + companyId, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${appToken}`,
                        'X-Forwarded-Host': `${window.location.protocol}//${window.location.hostname}`
                    },
                    body: JSON.stringify(data)
                });

                const responseData = await response.json();

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }

                showSuccessNotification(responseData.message, "The operation was completed successfully.");

            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred while submitting the data');
            }
        });

        function showSuccessNotification(title, message) {
            var notificationContent = document.getElementById("success-notification-content");
            document.getElementById("success-title").textContent = title;
            document.getElementById("success-message").textContent = message;

            Toastify({
                node: $("#success-notification-content")
                    .clone()
                    .removeClass("hidden")[0],
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
            }).showToast();
        }
    </script>
@endpush
