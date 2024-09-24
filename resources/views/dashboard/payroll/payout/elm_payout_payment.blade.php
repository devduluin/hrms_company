<form id="overview-form" method="post" action="">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-2 gap-5 mt-4">
            <x-form.input id="first_name" label="Absent Days" name="first_name" required />
           
        </div>
        <div class="gap-y-6 mt-2">
            <div id="help">
                <p>Note: Payment Days calculation are based on these Payroll Settings</p>
                <div id="description" class="mt-4 mb-4 text-s gap-x-2">
                    <p>Payroll Based On: Attendance</p>
                    <p>Consider Unmarked Attendance as: Absent</p>
                    <p>Consider Marked Attendance on Holidays: Disabled</p>
                </div>
                <p>Click here to change the configuration and then resave salary slip</p>
            </div>
        </div>
       
    </form>
