<form id="overview-form" method="post" action="">
    @csrf
        <div class=" gap-5 mt-2">
            <div class="mb-4">
                Earnings
            </div>
            <x-table_custom h1="No" h2="Component" h3="Abbr" h4="Amount(IDR)" h5="Depends On" h6="Is Tax Applicable" h7="Amount Based On Formula" h8="Formula"></x-table_custom>
            <div class="mt-4">
                <x-form.button id="add_row" label="Add Row" style="tertiary">
                </x-form.button>
            </div>
            <div class="mt-6 mb-4">
                Deduction
            </div>
            <x-table_custom h1="No" h2="Component" h3="Abbr" h4="Amount(IDR)" h5="Depends On" h6="Is Tax Applicable" h7="Amount Based On Formula" h8="Formula"></x-table_custom>
            <div class="mt-4">
                <x-form.button id="add_row" label="Add Row" style="tertiary">
                </x-form.button>
            </div>
        </div>
</form>