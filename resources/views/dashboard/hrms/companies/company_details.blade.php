@csrf
<form id="formUpdateCompanySetting">
    <div class="p-7">
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-2">
            <x-form.input id="employee_naming_by" label="Employee Naming By"
                name="employee_naming_by" required />
            <input type="hidden" name="user_id" value="3c5b06b2-b224-4029-a7a9-a0291dbe723c">
            <x-form.input id="standard_working_hours" label="Standard Working Hours"
                name="standard_working_hours" required />
            <x-form.input type="date" id="retirement_age" label="Retirement Age"
                name="retirement_age" required />
            <x-form.input type="text" id="sender" label="Sender"
                name="sender" required />
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-3 gap-2 my-2">
            <x-checkbox id="sender" label="Send Leave Notification"
                name="sender"  />
            <x-checkbox id="sender" label="Allow multiple shift assignments for same date"
                name="sender"  />
            <x-checkbox id="sender" label="Check vacancies on job offer creation"
                name="sender"  />
            <x-checkbox id="sender" label="Send interview reminder"
                name="sender"  />
            <x-checkbox id="sender" label="Auto leave encashment"
                name="sender"  />
            <x-checkbox id="sender" label="Leave approver mandatory in leave application"
                name="sender"  />
            <x-checkbox id="sender" label="Send interview feedback reminder"
                name="sender"  />
            <x-checkbox id="sender" label="Allow employee checkin from mobile app"
                name="sender"  />
            <x-checkbox id="sender" label="Allow geolocation tracking"
                name="sender"  />
            <x-checkbox id="sender" label="Show leaves of all department members in calendar"
                name="sender"  />
            <x-checkbox id="sender" label="Restrict backdated leave application"
                name="sender"  />
            <x-checkbox id="sender" label="Expense Approver Mandatory in Expense Claim"
                name="sender"  />
        
        </div>
       
    </div>
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

