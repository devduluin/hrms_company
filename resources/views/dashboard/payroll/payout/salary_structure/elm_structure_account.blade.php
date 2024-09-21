<form id="overview-form" method="post" action="">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-2">
        <div class=" gap-5 mt-2">
            <x-form.textarea label="Condition" id="condition" name="condition" rows="16">
            </x-form.textarea>
            <x-form.button id="expand" label="Expand" style="secondary">
            </x-form.button>
            <x-form.input id="amount" label="Amount" name="amount" required />
            <x-checkbox id="is_amount_based_on_formula"
                label="Amount based on formula"
                name="is_amount_based_on_formula"
                guidelines="" />
        </div>
        <div class="gap-y-6 mt-2">
            <div id="help">
                <h1 class="text-lg font-medium mb-2">Help</h1>
                <p>Notes:</p>
                <div id="description" class="ml-4 text-s gap-x-2">
                    <p>1. Use field base for using <span class="text-primary">base</span> salary of the Employee</p>
                    <p>2. Use salary component abbreviations in conditions and formulas. BS = Basic Salary</p>
                    <p>3. Use field name for employee details in conditions and formulas. Employment Type = employment_typeBranch = branch</p>
                    <p>3. Use field name for employee details in conditions and formulas. Employment Type = employment_typeBranch = branch</p>
                    <p>4. Use field name from Salary Slip in conditions and formulas. Payment Days = payment_daysLeave without pay = leave_without_pay</p>
                    <p>5. Direct Amount can also be enterd based on Conditions</p>
                </div>
            </div>
            <div id="example" class="mt-4">
                <h1 class="text-lg font-medium mb-2">Example</h1>
                <div id="description" class="ml-4 text-s gap-x-2">
                    <div id="desc1">
                        <p>1. Calculating Basic Salary based on base</p>
                        <p class="ml-4">Condition: base < 10000</p>
                        <p class="ml-4">Formula: Base * .2</p>
                    </div>
                    <div id="desc2">
                        <p>2. Calculating HRA based on Basic Salarys</p>
                        <p class="ml-4">Condition: BS > 2000</p>
                        <p class="ml-4">Formula: Base * .1</p>
                    </div>
                    <div id="desc2">
                        <p>2. Calculating TDS based on Employment Typeemployment_type</p>
                        <p class="ml-4">Condition: employment_type=="Intern"</p>
                        <p class="ml-4">Amount: 1000</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</form>