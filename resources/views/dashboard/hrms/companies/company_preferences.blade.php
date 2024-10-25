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


