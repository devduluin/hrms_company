<form id="overview-form" method="post" action="">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-4">
            <div>
                <div class="mb-4">
                    Earnings
                </div>
                <x-table_custom h1="No" h2="Component" h3="Amount(IDR)" ></x-table_custom>
                <div class="mt-4">
                    <x-form.button id="add_row" label="Add Row" style="tertiary">
                    </x-form.button>
                </div>
            </div>
            <div>
                <div class="mb-4">
                    Deduction
                </div>
                <x-table_custom h1="No" h2="Component" h3="Amount(IDR)"></x-table_custom>
                <div class="mt-4">
                    <x-form.button id="add_row" label="Add Row" style="tertiary">
                    </x-form.button>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-5 mt-4">

        </div>
        <div class="mb-6 mt-4 border-b border-dashed border-slate-300/70 pb-5 text-[0.94rem] font-medium">
            Totals
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-4">
            <x-form.input id="gross_pay" label="Gross Pay" name="Rp 0,00" required />
            <x-form.input id="total_deduction" label="Total Deduction" name="total_deduction" required />
            <x-form.input id="gross_pay_company" label="Gross Pay (Company Currency)" name="gross_pay_company" required />
            <x-form.input id="total_deduction_company" label="Total Deduction (Company Currency)" name="total_deduction_company" required />
            <x-form.input id="gross_year_to_date" label="Gross Year to Date" name="gross_year_to_date" required />
            <x-form.input id="gross_year_to_date_company" label="Gross Year to Date (Company Currency)" name="gross_year_to_date_company" required />
        </div>
        
    </form>
