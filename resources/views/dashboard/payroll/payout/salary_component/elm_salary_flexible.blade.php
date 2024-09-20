<form id="flexible-form" method="post" action="">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-5 mt-4">
        <div class=" gap-5 mt-2">
            <x-checkbox id="is_flexible_benefit"
                label="Is Flexible Benefit"
                name="is_flexible_benefit" />
            <x-form.input id="max_benefit" label="Max Benefit Amount" name="max_benefit" required />
        </div>
        <div class="gap-y-6 mt-2">
            <x-checkbox id="is_pay_against_benefit_claim"
                label="Pay Against Benefit Claim"
                name="is_pay_against_benefit_claim"
                guidelines="" />
            <x-checkbox id="is_only_tax_impact"
                label="Only Tax Impact (Cannot Claim But Part of Taxable Income)"
                name="is_only_tax_impact"
                guidelines="" />
            <x-checkbox id="is_create_separate_entry"
                label="Create Separate Payment Entry Against Benefit Claim"
                name="is_create_separate_entry"
                guidelines="" />
        </div>
    </div>
</form>
