<form id="overview-form" method="post" action="">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-3 gap-5 mt-4">
            <x-form.input id="journal_entry" label="Journal Entry" name="journal_entry" required />
            <x-form.input id="bank_name" label="Bank Name" name="bank_name" required />
            <x-form.input id="bank_account" label="Bank Account No" name="bank_account" required />
        </div>
</form>
