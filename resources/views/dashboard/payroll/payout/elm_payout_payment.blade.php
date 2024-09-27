<form id="overview-form" method="post" action="">
    @csrf
    <div class="grid grid-cols-2 md:grid-cols-4 xl:grid-cols-2 gap-5 mt-4">
        <x-form.input id="working_days" label="Working Days" name="working_days" readonly />
        <x-form.input id="absent_days" label="Absent Days" name="absent_days" readonly />
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 xl:grid-cols-2 gap-5 mt-4">
        <x-form.input value="0" id="leave_without_pay" label="Leave without pay" name="leave_without_pay" required
            readonly />
        <x-form.input id="present_days" label="Present Days" name="present_days" required readonly />
    </div>
    <div class="mb-6 mt-4 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">

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
